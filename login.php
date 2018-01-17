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
    $userFromDatabase = $stmt->fetch();
    if($userFromDatabase){
        $check_password = hash('sha256', $submittedPassword . $userFromDatabase['salt']);
        if($check_password === $userFromDatabase['password']){
            $login_ok = true;
        }
    }

    if($login_ok){
        unset($userFromDatabase['salt']);
        unset($userFromDatabase['password']);
        $_SESSION['name'] = $submittedUsername;
        $_SESSION['user_id'] = $userFromDatabase['id'];
        $_SESSION['login'] = "ok";
        header("Location: willkommen.php");
        die("Redirecting to: willkommen.php");
    } else {
        print("Login Failed.");
    }
}
?>