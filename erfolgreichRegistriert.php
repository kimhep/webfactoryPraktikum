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
        }
    </style>

    <main>
        <div class="jumbotron">
            <h1>Willkommen</h1>
            <p>Du hast dich erfolgreich registriert.</p>
    </main>
    </body>
    </html>

