<?php
require_once "../config/db.php";

// Total jobs
$stmt = $pdo->query("SELECT COUNT(*) AS total_jobs FROM jobs");
$total_jobs = $stmt->fetch(PDO::FETCH_ASSOC)["total_jobs"];

// Average salary
$stmt = $pdo->query("SELECT AVG(salary_avg) AS avg_salary FROM jobs");
$avg_salary = $stmt->fetch(PDO::FETCH_ASSOC)["avg_salary"];

// Median salary
$stmt = $pdo->query("
    SELECT salary_avg
    FROM jobs
    WHERE salary_avg IS NOT NULL
    ORDER BY salary_avg
");
$salaries = $stmt->fetchAll(PDO::FETCH_COLUMN);

//Step10*
// Top skills demand
// Top skills demand - normalized skill categories
$stmt = $pdo->query("
    SELECT skills 
    FROM jobs 
    WHERE skills IS NOT NULL 
      AND skills <> ''
      AND skills <> 'Unknown'
");
$skills_rows = $stmt->fetchAll(PDO::FETCH_COLUMN);

$skill_counts = [];

// Define normalized skill categories
$skill_patterns = [
    "IT Support / Helpdesk" => [
        "it support", "helpdesk", "help desk", "technical support", "support"
    ],
    "SQL / Database" => [
        "sql", "mysql", "database", "db"
    ],
    "Business Analysis" => [
        "business analyst", "business analysis", "ba"
    ],
    "Excel / Reporting" => [
        "excel", "reporting", "report"
    ],
    "Power BI" => [
        "power bi", "powerbi"
    ],
    "ERP" => [
        "erp", "dynamics", "sap"
    ],
    "Networking" => [
        "network", "networking", "lan", "wan", "tcp/ip"
    ],
    "Windows / Microsoft 365" => [
        "windows", "microsoft 365", "office 365", "m365", "o365"
    ],
    "Programming - Java" => [
        "java"
    ],
    "Programming - C# / .NET" => [
        "c#", ".net", "dotnet", "asp.net"
    ],
    "Hardware" => [
        "hardware", "pc", "printer", "desktop", "laptop"
    ],
    "Python" => [
        "python"
    ],
    "PHP" => [
        "php"
    ],
    "VBA" => [
        "vba"
    ]
];

// Count each skill category once per job posting
foreach ($skills_rows as $skills_text) {
    $text = strtolower($skills_text);

    foreach ($skill_patterns as $category => $patterns) {
        foreach ($patterns as $pattern) {
            if (strpos($text, strtolower($pattern)) !== false) {
                if (!isset($skill_counts[$category])) {
                    $skill_counts[$category] = 0;
                }

                $skill_counts[$category]++;
                break; // avoid counting the same category twice in one job posting
            }
        }
    }
}
arsort($skill_counts);
$top_skills = array_slice($skill_counts, 0, 10, true);
//

// Step11*
// Average salary by experience requirement
$stmt = $pdo->query("
    SELECT 
        experience_level,
        AVG(salary_avg) AS avg_salary,
        COUNT(*) AS total_jobs
    FROM jobs
    WHERE salary_avg IS NOT NULL
    GROUP BY experience_level
    ORDER BY 
        CASE 
            WHEN experience_level = 'Entry' THEN 1
            WHEN experience_level = 'Junior' THEN 2
            WHEN experience_level = 'Mid' THEN 3
            WHEN experience_level = 'Senior' THEN 4
            WHEN experience_level = 'Unknown' THEN 5
            ELSE 6
        END
");
$salary_by_experience = $stmt->fetchAll(PDO::FETCH_ASSOC);
//

$salary_count = count($salaries);
$median_salary = 0;

if ($salary_count > 0) {
    $middle = floor($salary_count / 2);

    if ($salary_count % 2 == 0) {
        $median_salary = ($salaries[$middle - 1] + $salaries[$middle]) / 2;
    } else {
        $median_salary = $salaries[$middle];
    }
}

// Jobs >= 25K
$stmt = $pdo->query("SELECT COUNT(*) AS jobs_25k FROM jobs WHERE salary_avg >= 25000");
$jobs_25k = $stmt->fetch(PDO::FETCH_ASSOC)["jobs_25k"];

$jobs_25k_percentage = 0;
if ($total_jobs > 0) {
    $jobs_25k_percentage = ($jobs_25k / $total_jobs) * 100;
}

// Degree not required
$stmt = $pdo->query("SELECT COUNT(*) AS degree_no FROM jobs WHERE degree_required = 'No'");
$degree_no = $stmt->fetch(PDO::FETCH_ASSOC)["degree_no"];

$degree_no_percentage = 0;
if ($total_jobs > 0) {
    $degree_no_percentage = ($degree_no / $total_jobs) * 100;
}

// Average quality score
$stmt = $pdo->query("SELECT AVG(quality_score) AS avg_quality FROM jobs");
$avg_quality = $stmt->fetch(PDO::FETCH_ASSOC)["avg_quality"];

// Top platform by average salary
$stmt = $pdo->query("
    SELECT platform, AVG(salary_avg) AS avg_platform_salary
    FROM jobs
    GROUP BY platform
    ORDER BY avg_platform_salary DESC
    LIMIT 1
");
$top_platform = $stmt->fetch(PDO::FETCH_ASSOC);

// Experience distribution
$stmt = $pdo->query("
    SELECT experience_level, COUNT(*) AS total
    FROM jobs
    GROUP BY experience_level
    ORDER BY 
        CASE 
            WHEN experience_level = 'Entry' THEN 1
            WHEN experience_level = 'Junior' THEN 2
            WHEN experience_level = 'Mid' THEN 3
            WHEN experience_level = 'Senior' THEN 4
            WHEN experience_level = 'Unknown' THEN 5
            ELSE 6
        END
");
$experience_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Degree distribution
$stmt = $pdo->query("
    SELECT degree_required, COUNT(*) AS total
    FROM jobs
    GROUP BY degree_required
    ORDER BY 
        CASE 
            WHEN degree_required = 'No' THEN 1
            WHEN degree_required = 'Yes' THEN 2
            WHEN degree_required = 'Unknown' THEN 3
            ELSE 4
        END
");
$degree_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Platform average salary
$stmt = $pdo->query("
    SELECT platform, AVG(salary_avg) AS avg_salary
    FROM jobs
    GROUP BY platform
    ORDER BY avg_salary DESC
");
$platform_salary_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - HK IT Job Market Intelligence System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

<!-- Step4 -->
<?php include "../includes/navbar.php"; ?>

<div class="container-fluid mt-4">
<div class="mb-4">
    <h1 class="page-title">HK IT Job Market Intelligence System</h1>
    <p class="page-subtitle mb-2">
        Dashboard overview of Hong Kong IT job posting data, focusing on salary level,
        experience requirements, degree requirements, and platform comparison.
    </p>

    <div class="d-flex flex-wrap gap-2 mb-3">
        <span class="badge bg-primary">PHP + MySQL</span>
        <span class="badge bg-secondary">Bootstrap</span>
        <span class="badge bg-success">Chart.js</span>
        <span class="badge bg-dark"><?php echo number_format($total_jobs); ?> job records</span>
    </div>

    <a href="jobs.php" class="btn btn-outline-primary btn-sm">
        View Job Records
    </a>
    </div>
    <!-- Executive Summary -->

<div class="mb-4">
    <div class="dashboard-section-title">Executive Summary</div>

    <div class="card insight-card">
        <div class="card-body">
            <ul class="mb-0">
                <li>
                    The average salary is 
                    <strong>HKD <?php echo number_format($avg_salary, 0); ?></strong>,
                    while the median salary is 
                    <strong>HKD <?php echo number_format($median_salary, 0); ?></strong>.
                </li>
                <li>
                    <strong><?php echo number_format($jobs_25k_percentage, 1); ?>%</strong>
                    of collected job postings offer an average salary of HKD 25K or above.
                </li>
                <li>
                    Degree is not clearly required in 
                    <strong><?php echo number_format($degree_no_percentage, 1); ?>%</strong>
                    of collected job postings.
                </li>
                <li>
                    The dashboard keeps unclear requirements as 
                    <strong>Not specified</strong> to preserve data transparency.
                </li>
            </ul>
        </div>
    </div>
</div>

    <!-- KPI Cards -->
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <p class="kpi-label">Total Jobs</p>
                    <div class="kpi-value"><?php echo number_format($total_jobs); ?></div>
                    <div class="kpi-note">Collected job postings</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <p class="kpi-label">Average Salary</p>
                    <div class="kpi-value">HKD <?php echo number_format($avg_salary, 0); ?></div>
                    <div class="kpi-note">Mean salary based on salary_avg</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <p class="kpi-label">Median Salary</p>
                    <div class="kpi-value">HKD <?php echo number_format($median_salary, 0); ?></div>
                    <div class="kpi-note">Less affected by extreme values</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <p class="kpi-label">Jobs ≥ HKD 25K</p>
                    <div class="kpi-value">
                        <?php echo number_format($jobs_25k); ?>
                        <span class="fs-6 text-muted">
                            (<?php echo number_format($jobs_25k_percentage, 1); ?>%)
                        </span>
                    </div>
                    <div class="kpi-note">Target salary benchmark</div>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card kpi-card">
                <div class="card-body">
                    <p class="text-muted mb-1">Degree Not Required</p>
                    <h3 class="fw-bold"><?php echo number_format($degree_no_percentage, 1); ?>%</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ccard kpi-card">
                <div class="card-body">
                    <p class="text-muted mb-1">Average Quality Score</p>
                    <h3 class="fw-bold"><?php echo number_format($avg_quality, 1); ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <p class="text-muted mb-1">Top Platform by Average Salary</p>
                    <h3 class="fw-bold">
                        <?php echo htmlspecialchars($top_platform["platform"]); ?>
                        <small class="text-muted fs-6">
                            HKD <?php echo number_format($top_platform["avg_platform_salary"], 0); ?>
                        </small>
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Charts -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    Job Count by Experience Requirement
                </div>
                <div class="card-body">
                    <canvas id="experienceChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    Degree Requirement Distribution
                </div>
                <div class="card-body">
                    <canvas id="degreeChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    Average Salary by Platform
                </div>
                <div class="card-body">
                    <canvas id="platformSalaryChart"></canvas>
                </div>
            </div>
        </div>

<div class="row g-4 mt-1">

    <div class="col-md-8">
        <div class="card chart-card">
            <div class="card-header bg-dark text-white">
                Top 10 In-Demand Skills
            </div>
            <div class="card-body">
                <canvas id="skillsChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card chart-card">
            <div class="card-header bg-dark text-white">
                Skill Demand Insight
            </div>
            <div class="card-body data-note">
                <p>
                    This chart summarizes the most frequently mentioned skills from the collected job postings.
                </p>
                <p>
                    It helps identify which technical and business skills are more commonly requested in Hong Kong IT-related roles.
                </p>
                <p class="mb-0">
                    This can support career planning, skill prioritization, and salary target analysis.
                </p>
            </div>
            </div>
        </div>
    </div>

<div class="row g-4 mt-1">

    <div class="col-md-8">
        <div class="card chart-card">
            <div class="card-header bg-dark text-white">
                Average Salary by Experience Requirement
            </div>
            <div class="card-body">
                <canvas id="salaryExperienceChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card chart-card">
            <div class="card-header bg-dark text-white">
                Salary Benchmark Insight
            </div>
            <div class="card-body data-note">
                <p>
                    This chart compares average salary levels across different experience requirements.
                </p>
                <p>
                    It helps evaluate whether the HKD 25K salary target is more commonly associated with entry-level,
                    junior-level, or mid-level roles.
                </p>
                <p class="mb-0">
                    This supports salary benchmarking and career planning decisions.
                </p>
            </div>
            </div>
        </div>
    </div>


    </div>
</div>

<script>
const experienceLabels = [
    <?php foreach ($experience_data as $row): ?>
        "<?php echo $row["experience_level"] === "Unknown" ? "Not specified" : htmlspecialchars($row["experience_level"]); ?>",
    <?php endforeach; ?>
];

const experienceValues = [
    <?php foreach ($experience_data as $row): ?>
        <?php echo $row["total"]; ?>,
    <?php endforeach; ?>
];

new Chart(document.getElementById("experienceChart"), {
    type: "bar",
    data: {
        labels: experienceLabels,
        datasets: [{
            label: "Job Postings",
            data: experienceValues
        }]
    }
});

const degreeLabels = [
    <?php foreach ($degree_data as $row): ?>
        "<?php echo $row["degree_required"] === "Unknown" ? "Not specified" : htmlspecialchars($row["degree_required"]); ?>",
    <?php endforeach; ?>
];

const degreeValues = [
    <?php foreach ($degree_data as $row): ?>
        <?php echo $row["total"]; ?>,
    <?php endforeach; ?>
];

new Chart(document.getElementById("degreeChart"), {
    type: "doughnut",
    data: {
        labels: degreeLabels,
        datasets: [{
            label: "Number of Jobs",
            data: degreeValues
        }]
    }
});

const platformLabels = [
    <?php foreach ($platform_salary_data as $row): ?>
        "<?php echo htmlspecialchars($row["platform"]); ?>",
    <?php endforeach; ?>
];

const platformSalaryValues = [
    <?php foreach ($platform_salary_data as $row): ?>
        <?php echo round($row["avg_salary"], 0); ?>,
    <?php endforeach; ?>
];

new Chart(document.getElementById("platformSalaryChart"), {
    type: "bar",
    data: {
        labels: platformLabels,
        datasets: [{
            label: "Average Salary",
            data: platformSalaryValues
        }]
    }
});


const skillLabels = <?php echo json_encode(array_keys($top_skills)); ?>;
const skillValues = <?php echo json_encode(array_values($top_skills)); ?>;
new Chart(document.getElementById("skillsChart"), {
    type: "bar",
    data: {
        labels: skillLabels,
        datasets: [{
            label: "Number of Mentions",
            data: skillValues
        }]
    },
    options: {
        indexAxis: "y",
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        }
    }
});

//Step11*
const salaryExperienceLabels = [
    <?php foreach ($salary_by_experience as $row): ?>
        "<?php echo $row["experience_level"] === "Unknown" ? "Not specified" : htmlspecialchars($row["experience_level"]); ?>",
    <?php endforeach; ?>
];

const salaryExperienceValues = [
    <?php foreach ($salary_by_experience as $row): ?>
        <?php echo round($row["avg_salary"], 0); ?>,
    <?php endforeach; ?>
];

new Chart(document.getElementById("salaryExperienceChart"), {
    type: "bar",
    data: {
        labels: salaryExperienceLabels,
        datasets: [{
            label: "Average Salary (HKD)",
            data: salaryExperienceValues
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>


<div class="mt-4 mb-5">
    <div class="dashboard-section-title">Data Notes</div>

    <div class="card chart-card">
        <div class="card-body data-note">
            <p class="mb-1">
                <strong>Dataset:</strong>
                <?php echo number_format($total_jobs); ?> Hong Kong IT-related job postings.
            </p>

            <p class="mb-1">
                <strong>Salary metric:</strong>
                Average salary is calculated from salary_min and salary_max.
            </p>

            <p class="mb-1">
                <strong>Experience and degree classification:</strong>
                Job postings without clear requirements are shown as “Not specified”.
            </p>

            <p class="mb-0">
                <strong>Purpose:</strong>
                This system is designed to support job market analysis, salary benchmarking,
                and career planning decisions.
            </p>
        </div>
    </div>
</div>

</body>
</html>