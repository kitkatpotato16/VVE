<?php
session_start();
require "../php/config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newemail = trim($_POST["newemail"]);
    $id = $_SESSION["user_id"];

    if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Ongeldig e-mailadres.";
    } else {
        // Check of e-mail al bestaat
        $check = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $check->execute([$newemail, $id]);

        if ($check->rowCount() > 0) {
            $message = "❌ E-mailadres is al in gebruik.";
        } else {
            $update = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
            $update->execute([$newemail, $id]);

            $_SESSION["email"] = $newemail;
            $message = "✅ E-mail succesvol gewijzigd!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email wijzigen</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<h2>Email wijzigen</h2>

<p><?php echo $message; ?></p>

<form method="post">
    <label>Nieuw e-mailadres:</label><br>
    <input type="email" name="newemail" required><br><br>

    <button type="submit">Opslaan</button>
</form>

<a href="gegevens.php">⬅ Terug</a>

</body>
</html>
