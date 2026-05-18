<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: jobs.php");
    exit();
}

$id = $_POST["id"] ?? null;

if (!$id || !is_numeric($id)) {
    die("Invalid job ID.");
}

$stmt = $pdo->prepare("DELETE FROM jobs WHERE id = :id");
$stmt->execute([":id" => $id]);

header("Location: jobs.php?deleted=1");
exit();
?>