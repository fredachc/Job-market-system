<?php
require_once "../config/db.php";

$id = $_GET["id"] ?? $_POST["id"] ?? null;
$message = "";

if (!$id || !is_numeric($id)) {
    die("Invalid job ID.");
}

// 如果提交表單，就更新資料
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $platform = trim($_POST["platform"] ?? "");
    $job_title = trim($_POST["job_title"] ?? "");
    $company = trim($_POST["company"] ?? "");
    $location = trim($_POST["location"] ?? "");

    $salary_min = (float)($_POST["salary_min"] ?? 0);
    $salary_max = (float)($_POST["salary_max"] ?? 0);

    $experience_level = $_POST["experience_level"] ?? "Unknown";
    $degree_required = $_POST["degree_required"] ?? "Unknown";
    $job_type = trim($_POST["job_type"] ?? "");
    $work_mode = trim($_POST["work_mode"] ?? "");
    $skills = trim($_POST["skills"] ?? "");
    $benefits = trim($_POST["benefits"] ?? "");
    $quality_score = (int)($_POST["quality_score"] ?? 0);
    $date_collected = $_POST["date_collected"] ?? date("Y-m-d");
    $job_url = trim($_POST["job_url"] ?? "");

    if (empty($platform) || empty($job_title) || empty($company)) {
        $message = "Platform, job title, and company are required.";
    } elseif ($salary_min > $salary_max) {
        $message = "Salary minimum cannot be greater than salary maximum.";
    } else {

        $salary_avg = ($salary_min + $salary_max) / 2;
        $salary_text = "HKD " . number_format($salary_min, 0) . " - " . number_format($salary_max, 0);

        $stmt = $pdo->prepare("
            UPDATE jobs
            SET
                platform = :platform,
                job_title = :job_title,
                company = :company,
                location = :location,
                salary_text = :salary_text,
                salary_min = :salary_min,
                salary_max = :salary_max,
                salary_avg = :salary_avg,
                experience_text = :experience_text,
                experience_years = :experience_years,
                experience_level = :experience_level,
                degree_text = :degree_text,
                degree_required = :degree_required,
                job_type = :job_type,
                work_mode = :work_mode,
                skills = :skills,
                benefits = :benefits,
                quality_score = :quality_score,
                job_url = :job_url,
                date_collected = :date_collected
            WHERE id = :id
        ");

        $stmt->execute([
            ":platform" => $platform,
            ":job_title" => $job_title,
            ":company" => $company,
            ":location" => $location,
            ":salary_text" => $salary_text,
            ":salary_min" => $salary_min,
            ":salary_max" => $salary_max,
            ":salary_avg" => $salary_avg,
            ":experience_text" => $experience_level,
            ":experience_years" => 0,
            ":experience_level" => $experience_level,
            ":degree_text" => $degree_required,
            ":degree_required" => $degree_required,
            ":job_type" => $job_type,
            ":work_mode" => $work_mode,
            ":skills" => $skills,
            ":benefits" => $benefits,
            ":quality_score" => $quality_score,
            ":job_url" => $job_url,
            ":date_collected" => $date_collected,
            ":id" => $id
        ]);

        header("Location: jobs.php?updated=1");
        exit();
    }
}

// 讀取原本資料
$stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = :id");
$stmt->execute([":id" => $id]);
$job = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$job) {
    die("Job record not found.");
}

function selected($value, $target) {
    return $value === $target ? "selected" : "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Job - HK IT Job Market System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php include "../includes/navbar.php"; ?>

<div class="container mt-4">

    <div class="mb-4">
        <h1 class="fw-bold">Edit Job Record</h1>
        <p class="text-muted">
            Update an existing job posting record in the database.
        </p>
    </div>

    <?php if (!empty($message)): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Job Information
        </div>

        <div class="card-body">

            <form method="POST" action="edit_job.php" class="row g-3">

                <input type="hidden" name="id" value="<?php echo htmlspecialchars($job["id"]); ?>">

                <div class="col-md-4">
                    <label class="form-label">Platform *</label>
                    <input 
                        type="text" 
                        name="platform" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["platform"]); ?>" 
                        required
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Job Title *</label>
                    <input 
                        type="text" 
                        name="job_title" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["job_title"]); ?>" 
                        required
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Company *</label>
                    <input 
                        type="text" 
                        name="company" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["company"]); ?>" 
                        required
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Location</label>
                    <input 
                        type="text" 
                        name="location" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["location"]); ?>"
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Salary Min</label>
                    <input 
                        type="number" 
                        name="salary_min" 
                        class="form-control" 
                        min="0" 
                        step="1"
                        value="<?php echo htmlspecialchars($job["salary_min"]); ?>"
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Salary Max</label>
                    <input 
                        type="number" 
                        name="salary_max" 
                        class="form-control" 
                        min="0" 
                        step="1"
                        value="<?php echo htmlspecialchars($job["salary_max"]); ?>"
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label">Experience Level</label>
                    <select name="experience_level" class="form-select">
                        <option value="Entry" <?php echo selected($job["experience_level"], "Entry"); ?>>Entry</option>
                        <option value="Junior" <?php echo selected($job["experience_level"], "Junior"); ?>>Junior</option>
                        <option value="Mid" <?php echo selected($job["experience_level"], "Mid"); ?>>Mid</option>
                        <option value="Senior" <?php echo selected($job["experience_level"], "Senior"); ?>>Senior</option>
                        <option value="Unknown" <?php echo selected($job["experience_level"], "Unknown"); ?>>Not specified</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Degree Required</label>
                    <select name="degree_required" class="form-select">
                        <option value="No" <?php echo selected($job["degree_required"], "No"); ?>>No</option>
                        <option value="Yes" <?php echo selected($job["degree_required"], "Yes"); ?>>Yes</option>
                        <option value="Unknown" <?php echo selected($job["degree_required"], "Unknown"); ?>>Not specified</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Job Type</label>
                    <input 
                        type="text" 
                        name="job_type" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["job_type"]); ?>"
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label">Work Mode</label>
                    <input 
                        type="text" 
                        name="work_mode" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["work_mode"]); ?>"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Skills</label>
                    <textarea name="skills" class="form-control" rows="3"><?php echo htmlspecialchars($job["skills"]); ?></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Benefits</label>
                    <textarea name="benefits" class="form-control" rows="3"><?php echo htmlspecialchars($job["benefits"]); ?></textarea>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Quality Score</label>
                    <input 
                        type="number" 
                        name="quality_score" 
                        class="form-control" 
                        min="0" 
                        max="10" 
                        step="1"
                        value="<?php echo htmlspecialchars($job["quality_score"]); ?>"
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label">Date Collected</label>
                    <input 
                        type="date" 
                        name="date_collected" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["date_collected"]); ?>"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Job URL</label>
                    <input 
                        type="url" 
                        name="job_url" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($job["job_url"]); ?>"
                        placeholder="https://..."
                    >
                </div>

                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-primary">
                        Update Job
                    </button>

                    <a href="jobs.php" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>