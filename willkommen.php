<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] === "ok") {
    ?>
<!DOCTYPE html>
<html>
<?php include("head.html");?>
<body>
<style>
    .jumbotron {
        color: #6233a0;
    }
</style>

<?php include("navigation.php");?>

<main>
<div class="jumbotron">
<h1>Willkommen</h1>
<p>Du hast dich erfolgreich eingeloggt.</p>
</main>
</body>
</html>
    <?php
} else {
    header("Location: index.php");
}
?>