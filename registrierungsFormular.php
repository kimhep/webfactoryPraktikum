<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] === "ok") {
    ?>
    <p>Bitte logge dich aus, um ein neues Konto anzulegen</p>
    <?php
} else {
    ?>

    <!DOCTYPE html>
    <html>
    <?php include("head.html"); ?>
    <body>
    <?php include("navigation.php"); ?>

    <style>
        .btn-info {
            background-color: #f76511;
        }
    </style>
    <body>

    <main class="container">
        <div class="jumbotron orange-font">
            <h1>Mein Praktikumsbericht - Registrierung</h1>

            <form action="register.php" method="post">
                <label>Name:</label>
                <input type="text" name="username"/><br>
                <label>E-Mail:</label>
                <input type="text" name="email"/><br>
                <label>Passwort:</label>
                <input type="password" name="password" value=""/><br>
                <input type="submit" class="btn btn-info" value="Register"/>
            </form>

    </body>


    </body>
    </html>
    <?php
}
?>