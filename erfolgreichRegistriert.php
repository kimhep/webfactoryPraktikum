<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] === "ok") {
    header("Location: index.php");
    ?>
    <?php
    } else {

}
?>
    <!DOCTYPE html>
    <html>
    <?php include("head.html");?>
    <body>
    <?php include("navigation.php");?>
    <style>
        .jumbotron {
            color: #7134c1;
            font-family: 'EB Garamond', serif;
        }
        .font {
            font-family: 'EB Garamond', serif;
        }
    </style>

    <main>
        <div class="jumbotron">
            <h1 class="font">Herzlichen Glückwunsch!</h1>
            <p class="font">Du hast dich erfolgreich registriert.</p>
    </main>
    </body>
    </html>

