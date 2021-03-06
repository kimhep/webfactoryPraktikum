<?php
require("config.php");
if(!empty($_POST))
{
    // Ensure that the user fills out fields
    if(empty($_POST["username"]))
    { die("Please enter a username."); }
    if(empty($_POST['password']))
    { die("Please enter a password."); }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    { die("Invalid E-Mail Address"); }

    // Username überprüfung
    $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        ";
    $query_params = array( ':username' => $_POST['username'] );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $row = $stmt->fetch();
    if($row){ die("This username is already in use"); }
    $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        ";
    $query_params = array(
        ':email' => $_POST['email']
    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());}
    $row = $stmt->fetch();
    if($row){ die("This email address is already registered"); }

    // Reihe zu Datenbank hnzufügen
    $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email 
            ) 
        ";

    // Security measures
    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
    $password = hash('sha256', $_POST['password'] . $salt);
    $query_params = array(
        ':username' => $_POST['username'],
        ':password' => $password,
        ':salt' => $salt,
        ':email' => $_POST['email']
    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    header('Location: erfolgreichRegistriert.php');
    die("Redirecting to index.php");
}
?>

