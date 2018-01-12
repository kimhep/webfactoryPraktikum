<!DOCTYPE html>
<html>
<?php include("head.html");?>
<body>
<?php include("navigation.html");?>

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
    <input type="text" name="username" value="" /><br>
    <label>E-mail:</label>
    <input type="text" name="email" value="" /><br>
    <label>Passwort:</label>
    <input type="password" name="password" value="" /><br>
    <input type="submit" class="btn btn-info" value="Register" />
</form>

</body>


</body>
</html>
