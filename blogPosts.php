

<!DOCTYPE html>
<html>
<?php include("head.html");?>
    <body>
<style>
p   {

}
ul.demo {
    list-style-type: none;
    margin: 3%;
    padding: 3%;


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
                $stmt = $db->prepare("SELECT user_id, title, text, erstellungsDatum FROM posts ORDER BY erstellungsDatum DESC");
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
                        . "<h2 class=''>" . htmlspecialchars($blogPost['title']) . "</h2>"
                        . "<p class=''>Autor: " . htmlspecialchars($autor) . "</p>"
                        . "<p>Erstellt am: " . $erstellungsDatum->format('d.m.Y H:i') . "</p>"
                        . "<p>" . html_entity_decode($blogPost['text']) . "</p>"
                        . "</li>";
                }
            echo "</ul>\n";

            ?>
        </main>
    </body>
</html>
