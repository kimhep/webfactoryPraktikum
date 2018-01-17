<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] === "ok") {
    ?>
<?php
require("config.php");
if(!empty($_POST)) {
    // sicherstellen, dass alles ausgefüllt ist
    if (empty($_POST["titel"])) {
        die("Bitte fülle Titel aus.");
    }
    if (empty($_POST["text"])) {
        die("Bitte fülle Text aus.");
    };

    // Tabelle ausfüllen
    $query = "INSERT INTO posts (user_id, title, text, erstellungsDatum) VALUES (?, ?, ?, NOW())";

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute([$_SESSION["user_id"], $_POST["titel"], $_POST["text"]]);
    } catch (PDOException $ex) {
        echo "Fehler beim Ausführen der Query: " . $ex->getMessage();
    }
    $db = null;
    header('Location: blogPosts.php');
} else {
    die("Deine Formulareingaben konnten nicht gesendet werden.");
}
?>
<?php
} else {
    ?>
<p>Du musst eingeloggt sein um Beiträge posten zu können</p>
<?php
}
    ?>
