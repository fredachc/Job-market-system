# HK IT Job Market Intelligence System

A PHP + MySQL web-based business system simulation project designed to demonstrate practical workflows commonly used in:

* Application Support
* ERP Support
* Business System Support
* Reporting Support
* Data Operations

This project simulates how internal business systems manage, validate, approve, monitor, and report Hong Kong IT job market data through structured staging and production workflows.

---

Project Purpose

The purpose of this project is to transform raw Hong Kong IT job market data into a structured internal-style business management system.

Instead of building only a static dashboard, this project demonstrates how enterprise systems handle:

* Data staging
* Validation workflows
* Error monitoring
* Approval processes
* Production data protection
* Reporting and operational analysis
* Data quality management

The project focuses on simulating real-world business system operations and support workflows commonly handled by:

* Application Support teams
* ERP support teams
* Business systems teams
* Reporting and operations support teams

---

System Workflow

```text
Add Job Record
↓
Store in jobs_staging
↓
Run Validation Checks
↓
Generate Error Logs
↓
Fix Validation Issues
↓
Re-run Validation
↓
Approve Record
↓
Move to Production Table (jobs)
↓
Display on Dashboard and Reports
```

---

System Architerture

```text
Frontend (Bootstrap UI)
↓
PHP Business Logic
↓
Validation Scripts
↓
MySQL Database
    ├── jobs_staging
    ├── jobs
    └── error_logs
↓
Dashboard / Reports / Monitoring
```

---

Key Features

1. Dashboard Overview

The dashboard provides key business and operational reporting metrics, including:

* Total number of job records
* Average salary
* Median salary
* HKD 25K+ job percentage
* Degree not required percentage
* Platform salary comparison
* Average quality score

The dashboard simulates internal reporting systems used for operational analysis and business monitoring.

---

2. Job Records Management

The system allows users to manage and maintain structured job posting records through a web-based interface.

Features include:

* View job records
* Search by title, company, or skills
* Filter by platform
* Filter by experience level
* Filter by degree requirement
* Salary range filtering

---

3. CRUD Operations

The project supports full CRUD functionality:

* Create new records
* Read and search records
* Update records
* Delete records

CRUD operations are separated from production approval workflow to simulate enterprise-style data control.

---
4. Staging Workflow

# 'jobs_staging'

instead of directly affecting the production table.

This staging workflow helps protect production data quality before approval.

The staging process simulates simplified ETL and business system workflows commonly used in enterprise systems.

---

5. Data Validation and Error Monitoring

The system includes automated validation logic and issue tracking features.

Current validation checks include:

* Missing salary detection
* Duplicate record detection
* Invalid data monitoring

Detected issues are automatically logged into:
