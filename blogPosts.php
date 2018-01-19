

<!DOCTYPE html>
<html>
<?php include("head.html");?>
    <body>
<style>
ul.demo {
    list-style-type: none;
    margin: 5%;
    padding: 5%;
    word-wrap: break-word
}
.buttonAsLink {
    background:none!important;
    color:inherit;
    border:none;
    padding:0!important;
    font: inherit;
    /*border is optional*/
    border-bottom:1px solid #444;
    cursor: pointer;
}
</style>
    <?php include("navigation.php");?>
        <div class="jumbotron ">
            <h1>Mein Praktikumsbericht - Blogeinträge</h1>
        </div>
        <main>
            <?php
            require "config.php";
            try {
                $stmt = $db->prepare("SELECT id, user_id, title, teaser, text, erstellungsDatum FROM posts ORDER BY erstellungsDatum DESC");
                $stmt->execute();
                $blogPosts = $stmt->fetchAll();
            } catch (PDOException $ex) {
                die("Fehler beim holen der blogPosts: " . $ex->getMessage());
            }
            echo "<ul class='demo'>\n";
                foreach ($blogPosts as $blogPost) {
                    $erstellungsDatum = new DateTime($blogPost['erstellungsDatum']);
                    try {
                        $stmt = $db->prepare("SELECT username FROM users WHERE id = ?");
                        $stmt->execute([$blogPost['user_id']]);
                        $autor = $stmt->fetchColumn();
                    } catch (PDOException $ex) {
                        die("Fehler beim holen des Autors: " . $ex->getMessage());
                    }
                    echo
                          "<li>"
                        . "<h2>" . htmlspecialchars($blogPost['title']) . "</h2>"
                        . "<p>Autor: " . htmlspecialchars($autor) . "</p>"
                        . "<p>Erstellt am: " . $erstellungsDatum->format('d.m.Y H:i') . "</p>"
                        . "<p>" . htmlspecialchars($blogPost['teaser']) . "<form action='blogPostsArtikel.php' method='get'>"
                        . "<input type='hidden' name='blogId' value='" . $blogPost['id'] . "'>"
                        . "<button class='buttonAsLink' type='submit'>...zum Artikel</button></form>"
                        . "</li>";
                }
            echo "</ul>\n";

            ?>
        </main>
    </body>
</html>
