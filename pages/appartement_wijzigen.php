<?php
session_start();
require "../php/config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newapartment = trim($_POST["apartment"]);
    $id = $_SESSION["user_id"];

    if (!is_numeric($newapartment)) {
        $message = "❌ Appartementnummer moet een getal zijn.";
    } else {
        $update = $conn->prepare("UPDATE users SET apartment = ? WHERE id = ?");
        $update->execute([$newapartment, $id]);

        $_SESSION["apartment"] = $newapartment;
        $message = "✅ Appartementnummer succesvol gewijzigd!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appartement wijzigen</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<h2>Appartement wijzigen</h2>

<p><?php echo $message; ?></p>

<form method="post">
    <label>Nieuw appartementnummer:</label><br>
    <input type="number" name="apartment" required><br><br>

    <button type="submit">Opslaan</button>
</form>

<a href="gegevens.php">⬅ Terug</a>

</body>
</html>
