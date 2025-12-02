<?php
session_start();
require "../php/config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $old = $_POST["old"];
    $new = $_POST["new"];
    $id  = $_SESSION["user_id"];

    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($old, $user["password"])) {
        $message = "❌ Oud wachtwoord klopt niet.";
    } else {
        $hashed = password_hash($new, PASSWORD_DEFAULT);

        $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update->execute([$hashed, $id]);

        $message = "✅ Wachtwoord succesvol gewijzigd!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Wachtwoord wijzigen</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<h2>Wachtwoord wijzigen</h2>

<p><?php echo $message; ?></p>

<form method="post">
    <label>Oud wachtwoord:</label><br>
    <input type="password" name="old" required><br><br>

    <label>Nieuw wachtwoord:</label><br>
    <input type="password" name="new" required><br><br>

    <button type="submit">Opslaan</button>
</form>

<a href="gegevens.php">⬅ Terug</a>

</body>
</html>
