<?php
session_start();
require "../php/config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION["user_id"];

$stmt = $conn->prepare("SELECT * FROM documents WHERE user_id = ?");
$stmt->execute([$id]);
$docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Documenten</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<h2>Mijn documenten</h2>

<?php if (isset($_GET["upload"]) && $_GET["upload"] === "success") : ?>
    <p style="color:green;">PDF succesvol toegevoegd!</p>
<?php endif; ?>

<h3>PDF uploaden:</h3>

<form action="../php/pdf_upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="pdf" accept="application/pdf" required>
    <button type="submit">Upload PDF</button>
</form>

<br><hr><br>

<h3>Beschikbare documenten:</h3>

<?php if (count($docs) === 0): ?>
    <p>Geen documenten gevonden.</p>
<?php else: ?>
    <ul>
        <?php foreach ($docs as $d): ?>
            <li>
                <a href="../pdf/<?php echo $d['filename']; ?>" target="_blank">
                    📄 <?php echo htmlspecialchars($d['original_name']); ?>
                </a>
                (<?php echo $d['uploaded_at']; ?>)
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="dashboard.php">⬅ Terug naar dashboard</a>

</body>
</html>
