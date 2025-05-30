<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Extra validatie
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Ongeldig e-mailadres.");
    }

    if (strlen($password) < 6) {
        die("Wachtwoord moet minstens 6 tekens lang zijn.");
    }

    // Check of e-mail al bestaat
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        die("E-mailadres is al geregistreerd.");
    }

    // Wachtwoord hashen
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Gebruiker opslaan
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $hashedPassword])) {
        header("Location: ../pages/login.html?success=1");
        exit();
    } else {
        echo "Registratie mislukt.";
    }
} else {
    echo "Ongeldige aanvraagmethode.";
}
?>
