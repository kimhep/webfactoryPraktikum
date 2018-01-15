<?php
session_start();
require("config.php");
$submittedUsername = $_POST['username'];
$submittedPassword = $_POST['password'];
if($submittedUsername !== null && $submittedPassword !== null){
    $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email 
            FROM users 
            WHERE 
                username = :username 
        ";
    $query_params = array(
        ':username' => $submittedUsername
    );

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }

    $login_ok = false;
    $row = $stmt->fetch();
    if($row){
        $check_password = hash('sha256', $submittedPassword . $row['salt']);
        if($check_password === $row['password']){
            $login_ok = true;
        }
    }

    if($login_ok){
        unset($row['salt']);
        unset($row['password']);
        $_SESSION['name'] = $submittedUsername;
        $_SESSION['login'] = "ok";
        header("Location: willkommen.php");
        die("Redirecting to: willkommen.php");
    } else {
        print("Login Failed.");
    }
}
?>