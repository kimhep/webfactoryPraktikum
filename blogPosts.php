

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
    font-family: 'EB Garamond', serif;
}
.headline {
    color: #6233a0;
    font-family: 'EB Garamond', serif;
}
    .jumbotron {
        font-family: 'EB Garamond', serif;
        font-size: large;
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
                    $beitragLoeschenLink = "";
                    if($blogPost['user_id'] == $_SESSION['user_id']) {
                        $beitragLoeschenLink = "<a href='beitragLoeschen.php?beitragId=" . $blogPost['id'] .  "'>Löschen</a>";
                    }
                    echo
                          "<li>"
                        . "<h2 class='headline'>" . htmlspecialchars($blogPost['title']) . "</h2>"
                        . "<p>Autor: " . htmlspecialchars($autor) . "</p>"
                        . "<p >Erstellt am: " . $erstellungsDatum->format('d.m.Y H:i') . "</p>"
                        . "<p>" . htmlspecialchars($blogPost['teaser']) . "<form action='blogPostsArtikel.php' method='get'>"
                        . "<input type='hidden' name='blogId' value='" . $blogPost['id'] . "'>"
                        . "<a href='blogPostsArtikel.php?blogId=" . $blogPost['id'] .  "'>...zum Artikel</a>"
                        . $beitragLoeschenLink
                        . "</li>";
                }
            echo "</ul>\n";

            ?>
        </main>
    </body>
</html>
