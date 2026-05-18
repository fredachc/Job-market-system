<?php
require_once "../config/db.php";

// 取得篩選條件
$search = $_GET["search"] ?? "";
$platform = $_GET["platform"] ?? "";
$experience_level = $_GET["experience_level"] ?? "";
$degree_required = $_GET["degree_required"] ?? "";
$salary_25k = $_GET["salary_25k"] ?? "";
//Step7 : add the deleted function
$deleted = $_GET["deleted"] ?? "";

// 建立 SQL 基礎
$sql = "SELECT * FROM jobs WHERE 1=1";
$params = [];

// 搜尋 job title / company / skills
if (!empty($search)) {
    $sql .= " AND (
        job_title LIKE :search
        OR company LIKE :search
        OR skills LIKE :search
    )";
    $params[":search"] = "%" . $search . "%";
}

// 按 platform 篩選
if (!empty($platform)) {
    $sql .= " AND platform = :platform";
    $params[":platform"] = $platform;
}

// 按 experience_level 篩選
if (!empty($experience_level)) {
    $sql .= " AND experience_level = :experience_level";
    $params[":experience_level"] = $experience_level;
}

// 按 degree_required 篩選
if (!empty($degree_required)) {
    $sql .= " AND degree_required = :degree_required";
    $params[":degree_required"] = $degree_required;
}

// 只顯示 25K 或以上
if ($salary_25k === "yes") {
    $sql .= " AND salary_avg >= 25000";
}

$sql .= " ORDER BY salary_avg DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 取得 filter 下拉選單資料
$platforms = $pdo->query("SELECT DISTINCT platform FROM jobs ORDER BY platform")->fetchAll(PDO::FETCH_COLUMN);
$experience_levels = $pdo->query("SELECT DISTINCT experience_level FROM jobs ORDER BY experience_level")->fetchAll(PDO::FETCH_COLUMN);
// Step3: 修改下拉式清單的排放位置
$degree_options = $pdo->query("
    SELECT DISTINCT degree_required 
    FROM jobs 
    ORDER BY 
        CASE
        WHEN degree_required = 'No' THEN 1
            WHEN degree_required = 'Yes' THEN 2
            WHEN degree_required = 'Unknown' THEN 3
            ELSE 4
        END    
    ")->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Market System - Job List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Step4 -->
<?php include "../includes/navbar.php"; ?>

<div class="container-fluid mt-4">

    <div class="mb-4">
        <h1 class="fw-bold">HK IT Job Market Intelligence System</h1>
    <!-- Step8-->
        <?php if ($deleted === "1"): ?>
            <div class="alert alert-success">
                Job record deleted successfully.
            </div>
        <?php endif; ?>
        <p class="text-muted">
            A web-based system for managing and analyzing Hong Kong IT job market data.
        </p>
    </div>

    <!-- Filter Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            Search & Filter
        </div>

        <div class="card-body">
            <form method="GET" action="jobs.php" class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Search</label>
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Job title, company, skills"
                        value="<?php echo htmlspecialchars($search); ?>"
                    >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Platform</label>
                    <select name="platform" class="form-select">
                        <option value="">All Platforms</option>
                        <?php foreach ($platforms as $p): ?>
                            <option value="<?php echo htmlspecialchars($p); ?>"
                                <?php if ($platform === $p) echo "selected"; ?>>
                                <?php echo htmlspecialchars($p); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Experience</label>
                    <select name="experience_level" class="form-select">
                        <option value="">All Levels</option>
                        <?php foreach ($experience_levels as $level): ?>
                            <option value="<?php echo htmlspecialchars($level); ?>"
                                <?php if ($experience_level === $level) echo "selected"; ?>>
<!-- Step2: 這裡是更改了下拉式選單的unknown -->
                                <?php echo htmlspecialchars($level === "Unknown" ? "Not Specified" : $level); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Degree Required</label>
                    <select name="degree_required" class="form-select">
                        <option value="">All</option>
                        <?php foreach ($degree_options as $degree): ?>
                            <option value="<?php echo htmlspecialchars($degree); ?>"
                                <?php if ($degree_required === $degree) echo "selected"; ?>>
                                <?php echo htmlspecialchars($degree === "Unknown" ? "Not Specified" : $degree); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="salary_25k" 
                            value="yes"
                            id="salary_25k"
                            <?php if ($salary_25k === "yes") echo "checked"; ?>
                        >
                        <label class="form-check-label" for="salary_25k">
                            Salary ≥ HKD 25K
                        </label>
                    </div>
                </div>

                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        Filter
                    </button>
                </div>

                <div class="col-md-12">
                    <a href="jobs.php" class="btn btn-outline-secondary btn-sm">
                        Reset Filters
                    </a>
                </div>

            </form>
        </div>
    </div>

    <!-- Job Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Job Records - Sorted by Average Salary
        </div>

        <div class="card-body">

            <p class="text-muted">
                Showing records: <?php echo count($jobs); ?>
            </p>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Platform</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Avg Salary</th>
                            <th>Experience</th>
                            <th>Degree Required</th>
                            <th>Work Mode</th>
                            <th>Quality Score</th>
<!-- Step5 Add the view button -->
                            <th style="min-width: 190px;">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (count($jobs) > 0): ?>
                            <?php foreach ($jobs as $job): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($job["id"]); ?></td>
                                    <td><?php echo htmlspecialchars($job["platform"]); ?></td>
                                    <td><?php echo htmlspecialchars($job["job_title"]); ?></td>
                                    <td><?php echo htmlspecialchars($job["company"]); ?></td>
                                    <td><?php echo htmlspecialchars($job["location"]); ?></td>
<!-- step1: 把unknown修改為Not specified, 不是更改daabase內的資料, 是令UI顯示更專業 -->
                                    <td>
                                        HKD <?php echo number_format((float)$job["salary_avg"], 0); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars(
                                                $job["experience_level"] === "Unknown" ? "Not specified" : $job["experience_level"]
                                            ); 
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars(
                                                $job["degree_required"] === "Unknown" ? "Not specified" : $job["degree_required"]
                                            ); 
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars(
                                                $job["work_mode"] === "Unknown" ? "Not specified" : $job["work_mode"]
                                            ); 
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($job["quality_score"]); ?></td>
                                    <td class="text-nowrap">
                                        <div class="d-flex gap-2">
<!-- Step6 -->
                                        <a href="job_detail.php?id=<?php echo $job["id"]; ?>" 
                                            class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
<!-- Step9 edit function -->
                                        <a href="edit_job.php?id=<?php echo $job["id"]; ?>" 
                                            class="btn btn-sm btn-outline-warning">
                                            Edit
                                        </a>
<!-- Step8 -->
                                        <form method="POST" 
                                            action="delete_job.php" 
                                            onsubmit="return confirm('Are you sure you want to delete this job record?');">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($job["id"]); ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Delete
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center text-muted">
                                    No matching job records found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>