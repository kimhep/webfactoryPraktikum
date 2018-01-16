<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] === "ok") {
    ?>
    <!DOCTYPE html>
    <html>
    <?php include("head.html"); ?>
    <body>
    <?php include("navigation.php"); ?>

    <?php include("beitragErstellenFormular.html") ?>

    <?php include("scripts.html"); ?>
    </body>
    </html>

    <?php
 } else { ?>
<p>Du musst eingeloggt sein um Beiträge posten zu können</p>
<?php
}
?>