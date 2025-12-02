<?php
session_start();
require "../php/config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newname = trim($_POST["newname"]);
    $id = $_SESSION["user_id"];

    if (strlen($newname) < 2) {
        $message = "❌ Naam moet minimaal 2 tekens bevatten.";
    } else {
        $update = $conn->prepare("UPDATE users SET username = ? WHERE id = ?");
        $update->execute([$newname, $id]);

        $_SESSION["username"] = $newname;
        $message = "✅ Naam succesvol gewijzigd!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Naam wijzigen</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<h2>Naam wijzigen</h2>

<p><?php echo $message; ?></p>

<form method="post">
    <label>Nieuwe naam:</label><br>
    <input type="text" name="newname" required><br><br>

    <button type="submit">Opslaan</button>
</form>

<a href="gegevens.php">⬅ Terug</a>

</body>
</html>
