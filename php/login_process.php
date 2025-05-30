<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $user["username"];
            header("Location: ../index.html?login=success");
            exit();
        } else {
            header("Location: ../login.html?error=wrong_password");
            exit();
        }
    } else {
        header("Location: ../login.html?error=user_not_found");
        exit();
    }
}
?>
