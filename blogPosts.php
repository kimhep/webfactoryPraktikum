<!DOCTYPE html>
<html>
<?php include("head.html");?>
    <body>

    <?php include("navigation.php");?>
        <main>
            <?php
            require "config.php";
            try {
                $stmt = $db->prepare("SELECT user_id, title, text, erstellungsDatum FROM posts");
                $stmt->execute();
                $blogPosts = $stmt->fetchAll();
            } catch (PDOException $ex) {
                die("Fehler beim holen der blogPosts: " . $ex->getMessage());
            }

            echo "<ul>\n";
                foreach ($blogPosts as $blogPost) {
                    try {
                        $stmt = $db->prepare("SELECT username FROM users WHERE id = ?");
                        $stmt->execute([$blogPost['user_id']]);
                        $autor = $stmt->fetchColumn();
                    } catch (PDOException $ex) {
                        die("Fehler beim holen des Autors: " . $ex->getMessage());
                    }
                    echo "<li>"
                        . "<h2>" . htmlspecialchars($blogPost['title']) . "</h2>"
                        . "<p>" . htmlspecialchars($blogPost['text']) . "</p>"
                        . "<p>Autor:" . htmlspecialchars($autor) . "</p>"
                        . "</li>";
                }
            echo "</ul>\n";
            ?>
        </main>
    </body>
</html>
