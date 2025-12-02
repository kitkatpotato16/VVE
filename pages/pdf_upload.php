<?php
session_start();
require "config.php";

if (!isset($_SESSION["user_id"])) {
    die("Niet ingelogd.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_FILES["pdf"]) || $_FILES["pdf"]["error"] !== 0) {
        die("Uploadfout.");
    }

    $file = $_FILES["pdf"];

    // Controleer PDF MIME-type
    $allowedTypes = [
        "application/pdf",
        "application/x-pdf",
        "application/acrobat",
        "applications/vnd.pdf"
    ];

    if (!in_array($file["type"], $allowedTypes)) {
        die("Alleen PDF-bestanden zijn toegestaan.");
    }

    // Uploadmap
    $uploadDir = __DIR__ . "/../uploads/";
    
    // Bestaat de map?
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $uniqueName = uniqid("pdf_") . ".pdf";
    $uploadPath = $uploadDir . $uniqueName;

    if (!move_uploaded_file($file["tmp_name"], $uploadPath)) {
        die("Upload mislukt.");
    }

    // In database opslaan
    $stmt = $conn->prepare("
        INSERT INTO documents (user_id, filename, original_name)
        VALUES (?, ?, ?)
    ");
    $stmt->execute([
        $_SESSION["user_id"],
        $uniqueName,
        $file["name"]
    ]);

    header("Location: ../pages/documenten.php?upload=success");
    exit;
}
?>
