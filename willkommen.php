<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
    ?>

<!DOCTYPE html>
<html>
<?php include("head.html");?>
<body>
<?php include("navigation.php");?>

<main>
<div class="jumbotron orange-font">
<h1>Willkommen</h1>
<p>Du hast dich erfolgreich eingelockt.</p>
</main>
</body>
</html>
    <?php
} else {
    header("Location: index.php");
}
?>