<?php
require_once "../config/db.php";

$stmt = $pdo->query("SELECT COUNT(*) AS total_jobs FROM jobs");
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Database Test</title>
</head>
<body>
    <h1>Database connected successfully.</h1>
    <p>Total jobs: <?php echo $result["total_jobs"]; ?></p>
</body>
</html>