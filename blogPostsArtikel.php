<!DOCTYPE html>

<html>
<?php include("head.html");?>
<body>
<?php include("navigation.php");?>
<style>
    . {
        list-style-type: none;
        margin: 5%;
        padding: 5%;
        word-wrap: break-word
    }
</style>
<?php
require "config.php";
$stmt = $db->prepare("SELECT titel, text, erstellungsDatum FROM posts WHERE id = ?");
$stmt->execute();
$blogPosts = $stmt->fetchAll();
foreach ($blogPosts AS $row => $link) {
    echo
}
?>
