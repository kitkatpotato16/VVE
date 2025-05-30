<?php
$host = "localhost";
$dbname = "vve_db";
$username = "root";
$password = ""; // gebruik je eigen wachtwoord als je die hebt ingesteld

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>
