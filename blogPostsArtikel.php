<!DOCTYPE html>

<html>
<?php include("head.html");?>
    <body>
        <?php include("navigation.php");?>
        <style>
            .headline {
                font-family: 'EB Garamond', serif;
                list-style-type: none;
                margin: 3%;
                padding: 3%;
                color: #6233a0;
            }
            .text {
                word-wrap: break-word;
               margin: 2%;
                padding: 2%;
                font-family: 'EB Garamond', serif;
                font-size: large;
            }
        </style>
        <?php
        require "config.php";
        try {
            $stmt = $db->prepare("SELECT title, user_id, text, erstellungsDatum FROM posts WHERE id = ?");
            $stmt->execute([$_GET['blogId']]);
            $blogPost = $stmt->fetch();
        } catch (PDOException $ex) {
            die("Fehler beim holen des BlogPosts: " . $ex->getMessage());
        }

        $erstellungsDatum = new DateTime($blogPost['erstellungsDatum']);
        try {
            $stmt = $db->prepare("SELECT username FROM users WHERE id = ?");
            $stmt->execute([$blogPost['user_id']]);
            $autor = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            die("Fehler beim holen des Autors: " . $ex->getMessage());
        }

        echo "<main><h1 class='headline'>" . htmlspecialchars($blogPost['title']) . "</h1>"
            . "<p class='text'>Autor: " . htmlspecialchars($autor) . "</p>"
            . "<p class='text'>Erstellt am: " . $erstellungsDatum->format('d.m.Y H:i') . "</p>"
            . "<p class='text'>" . html_entity_decode($blogPost['text']) ."</p></main>";
        ?>
    </body>
</html>
