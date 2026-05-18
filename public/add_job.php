<?php
require_once "../config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $platform = $_POST["platform"] ?? "";
    $job_title = $_POST["job_title"] ?? "";
    $company = $_POST["company"] ?? "";
    $location = $_POST["location"] ?? "";
    $salary_min = $_POST["salary_min"] ?? 0;
    $salary_max = $_POST["salary_max"] ?? 0;
    $experience_level = $_POST["experience_level"] ?? "Unknown";
    $degree_required = $_POST["degree_required"] ?? "Unknown";
    $job_type = $_POST["job_type"] ?? "";
    $work_mode = $_POST["work_mode"] ?? "";
    $skills = $_POST["skills"] ?? "";
    $benefits = $_POST["benefits"] ?? "";
    $quality_score = $_POST["quality_score"] ?? 0;
    $date_collected = $_POST["date_collected"] ?? date("Y-m-d");

    // 自動計算 average salary
    $salary_avg = 0;
    if (is_numeric($salary_min) && is_numeric($salary_max)) {
        $salary_avg = ($salary_min + $salary_max) / 2;
    }

    // 建立 salary text
    $salary_text = "HKD " . number_format((float)$salary_min, 0) . " - " . number_format((float)$salary_max, 0);

    // 簡單 validation
    if (empty($platform) || empty($job_title) || empty($company)) {
        $message = "Platform, job title, and company are required.";
    } elseif ($salary_min > $salary_max) {
        $message = "Salary minimum cannot be greater than salary maximum.";
    } else {
        $stmt = $pdo->prepare("
            INSERT INTO jobs (
                platform,
                job_title,
                company,
                location,
                salary_text,
                salary_min,
                salary_max,
                salary_avg,
                experience_text,
                experience_years,
                experience_level,
                degree_text,
                degree_required,
                job_type,
                work_mode,
                skills,
                benefits,
                quality_score,
                date_collected
            ) VALUES (
                :platform,
                :job_title,
                :company,
                :location,
                :salary_text,
                :salary_min,
                :salary_max,
                :salary_avg,
                :experience_text,
                :experience_years,
                :experience_level,
                :degree_text,
                :degree_required,
                :job_type,
                :work_mode,
                :skills,
                :benefits,
                :quality_score,
                :date_collected
            )
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
            ":date_collected" => $date_collected
        ]);

        header("Location: jobs.php");
        exit();
    }
}

function selected($value, $target) {
    return $value === $target ? "selected" : "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Job - HK IT Job Market System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php include "../includes/navbar.php"; ?>

<div class="container mt-4">

    <div class="mb-4">
        <h1 class="fw-bold">Add New Job Record</h1>
        <p class="text-muted">
            Add a new job posting record into the job market database.
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

            <form method="POST" action="add_job.php" class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Platform *</label>
                    <input type="text" name="platform" class="form-control" placeholder="e.g. JobsDB" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Job Title *</label>
                    <input type="text" name="job_title" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Company *</label>
                    <input type="text" name="company" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Salary Min</label>
                    <input type="number" name="salary_min" class="form-control" min="0" step="1">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Salary Max</label>
                    <input type="number" name="salary_max" class="form-control" min="0" step="1">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Experience Level</label>
                    <select name="experience_level" class="form-select">
                        <option value="Entry">Entry</option>
                        <option value="Junior">Junior</option>
                        <option value="Mid">Mid</option>
                        <option value="Senior">Senior</option>
                        <option value="Unknown">Not specified</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Degree Required</label>
                    <select name="degree_required" class="form-select">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                        <option value="Unknown">Not specified</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Job Type</label>
                    <input type="text" name="job_type" class="form-control" placeholder="e.g. Full-time">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Work Mode</label>
                    <input type="text" name="work_mode" class="form-control" placeholder="e.g. On-site / Hybrid">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Skills</label>
                    <textarea name="skills" class="form-control" rows="3" placeholder="e.g. SQL, Excel, Power BI, ERP"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Benefits</label>
                    <textarea name="benefits" class="form-control" rows="3" placeholder="e.g. Medical, Bonus, Birthday Leave"></textarea>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Quality Score</label>
                    <input type="number" name="quality_score" class="form-control" min="0" max="10" step="1" value="0">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Date Collected</label>
                    <input type="date" name="date_collected" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-primary">
                        Save Job
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