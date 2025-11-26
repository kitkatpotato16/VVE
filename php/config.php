<?php

//$host = "localhost";

$host = "database-5019083409.webspace-host.com"; // of de hostnaam die Strato je geeft
$dbname = "dbs15007694";     // jouw databasenaam
$username = "dbu3178284";    // jouw databasegebruikersnaam
$password = "Cratos27tief!";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage());
}
