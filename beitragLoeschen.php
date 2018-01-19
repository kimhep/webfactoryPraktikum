<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] === "ok") {
    require("config.php");
    if($_GET['beitragId']) {
        try {
            $stmt = $db->prepare("DELETE FROM posts WHERE id = ? AND user_id = ?");
            $stmt->execute([$_GET['beitragId'], $_SESSION['user_id']]);
        } catch (PDOException $ex) {
            die("Fehler beim Löschen des Beitrags: " . $ex->getMessage());
        }
        $db = null;
        header('Location: ./blogPosts.php');
        die();
    } else {
        die("Deine Formulareingaben konnten nicht gesendet werden.");
    }
} else {
?>
    <p>Du musst eingeloggt sein um Beiträge löschen zu können</p>
<?php
}
?>
