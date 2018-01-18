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
    <style>
        .jumbotron {
            color: #6233a0;
        }
    </style>

    <?php include("navigation.php"); ?>

    <style>
        .btn-info {
            background-color: #6233a0;
        }
    </style>
    <body>

    <main class="container">
        <div class="jumbotron">
            <h1>Mein Praktikumsbericht - Registrierung</h1>

            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="usr">Username:</label>
                    <input type="text" name="username" class="form-control" id="usr">
                </div><div class="form-group">
                    <label for="usr">Passwort:</label>
                    <input type="password" name="password" class="form-control" id="usr">
                </div><div class="form-group">
                    <label for="usr">E-Mail:</label>
                    <input type="text" name="email" class="form-control" id="usr">

                </div>
                <div>
                    <input type="submit" class="btn btn-info" value="Register"/></br>
                </div>
            </form>

    </body>
    </html>
    <?php
}
?>