<?php
require_once "../config/db.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    die("Job ID is missing.");
}

$stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = :id");
$stmt->execute([":id" => $id]);
$job = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$job) {
    die("Job record not found.");
}

function displayValue($value) {
    if ($value === null || $value === "" || $value === "Unknown") {
        return "Not specified";
    }
    return htmlspecialchars($value);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Detail - HK IT Job Market System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php include "../includes/navbar.php"; ?>

<div class="container mt-4">

    <div class="mb-4">
        <a href="jobs.php" class="btn btn-outline-secondary btn-sm">
            ← Back to Job Records
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Job Detail
        </div>

        <div class="card-body">

            <h2 class="fw-bold mb-2">
                <?php echo displayValue($job["job_title"]); ?>
            </h2>

            <p class="text-muted mb-4">
                <?php echo displayValue($job["company"]); ?> |
                <?php echo displayValue($job["platform"]); ?>
            </p>

            <div class="row mb-4">

                <div class="col-md-3">
                    <div class="border rounded p-3 bg-light">
                        <p class="text-muted mb-1">Average Salary</p>
                        <h4 class="fw-bold">
                            HKD <?php echo number_format((float)$job["salary_avg"], 0); ?>
                        </h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="border rounded p-3 bg-light">
                        <p class="text-muted mb-1">Experience Level</p>
                        <h4 class="fw-bold">
                            <?php echo displayValue($job["experience_level"]); ?>
                        </h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="border rounded p-3 bg-light">
                        <p class="text-muted mb-1">Degree Required</p>
                        <h4 class="fw-bold">
                            <?php echo displayValue($job["degree_required"]); ?>
                        </h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="border rounded p-3 bg-light">
                        <p class="text-muted mb-1">Quality Score</p>
                        <h4 class="fw-bold">
                            <?php echo displayValue($job["quality_score"]); ?>
                        </h4>
                    </div>
                </div>

            </div>

            <table class="table table-bordered">
                <tr>
                    <th style="width: 25%;">Location</th>
                    <td><?php echo displayValue($job["location"]); ?></td>
                </tr>

                <tr>
                    <th>Salary Range</th>
                    <td>
                        HKD <?php echo number_format((float)$job["salary_min"], 0); ?>
                        -
                        HKD <?php echo number_format((float)$job["salary_max"], 0); ?>
                    </td>
                </tr>

                <tr>
                    <th>Salary Text</th>
                    <td><?php echo displayValue($job["salary_text"]); ?></td>
                </tr>

                <tr>
                    <th>Experience Text</th>
                    <td><?php echo displayValue($job["experience_text"]); ?></td>
                </tr>

                <tr>
                    <th>Degree Text</th>
                    <td><?php echo displayValue($job["degree_text"]); ?></td>
                </tr>

                <tr>
                    <th>Job Type</th>
                    <td><?php echo displayValue($job["job_type"]); ?></td>
                </tr>

                <tr>
                    <th>Work Mode</th>
                    <td><?php echo displayValue($job["work_mode"]); ?></td>
                </tr>

                <tr>
                    <th>Skills</th>
                    <td><?php echo displayValue($job["skills"]); ?></td>
                </tr>

                <tr>
                    <th>Benefits</th>
                    <td><?php echo displayValue($job["benefits"]); ?></td>
                </tr>

                <tr>
                    <th>Date Collected</th>
                    <td><?php echo displayValue($job["date_collected"]); ?></td>
                </tr>

                <tr>
                    <th>Job URL</th>
                    <td>
                        <?php if (!empty($job["job_url"])): ?>
                            <a href="<?php echo htmlspecialchars($job["job_url"]); ?>" target="_blank">
                                Open Job Posting
                            </a>
                        <?php else: ?>
                            Not specified
                        <?php endif; ?>
                    </td>
                </tr>
            </table>

        </div>
    </div>

</div>

</body>
</html>