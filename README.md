# HK IT Job Market Intelligence System

A web-based job market data management and analysis system built with **PHP, MySQL, Bootstrap, and Chart.js**.

This project analyzes Hong Kong IT-related job posting data and provides insights into salary levels, experience requirements, degree requirements, platform differences, and in-demand skills.

---

## Project Purpose

The purpose of this project is to transform raw Hong Kong IT job posting data into a usable internal-style web system.

Instead of only creating a static Excel dashboard, this project demonstrates how job market data can be stored, managed, searched, updated, and analyzed through a web-based system.

The system is designed to support:

- Salary benchmarking
- IT job market analysis
- Career planning
- Skill demand analysis
- Job record management
- Data quality handling

---

## Key Features

### 1. Dashboard Overview

The dashboard provides key job market metrics, including:

- Total number of job records
- Average salary
- Median salary
- Number and percentage of jobs offering HKD 25K or above
- Degree not required percentage
- Average quality score
- Top platform by average salary

### 2. Job Records Management

The system allows users to view and manage job posting records through a web interface.

Features include:

- View all job records
- Search by job title, company, or skills
- Filter by platform
- Filter by experience requirement
- Filter by degree requirement
- Filter jobs with salary equal to or above HKD 25K

### 3. CRUD Functions

The system supports basic CRUD operations:

- Create: Add new job records
- Read: View job list and job detail pages
- Update: Edit existing job records
- Delete: Remove job records with confirmation

### 4. Job Detail Page

Each job record has a detail page showing:

- Job title
- Company
- Platform
- Location
- Salary range
- Average salary
- Experience requirement
- Degree requirement
- Job type
- Work mode
- Skills
- Benefits
- Quality score
- Date collected
- Job URL, if available

### 5. Salary Benchmark Analysis

The dashboard includes salary analysis to compare salary levels across different experience requirements and job platforms.

This helps evaluate whether a salary target, such as HKD 25K per month, is more commonly associated with entry-level, junior-level, or mid-level roles.

### 6. Skill Demand Analysis

The system analyzes skill requirements from job postings and groups similar skills into normalized categories.

Examples of normalized skill categories include:

- IT Support / Helpdesk
- SQL / Database
- Business Analysis
- Excel / Reporting
- Power BI
- ERP
- Networking
- Windows / Microsoft 365
- Programming - Java
- Programming - C# / .NET

This avoids fragmented skill labels such as "Support", "IT Support", and "Helpdesk" being counted separately.

---

## Tech Stack

- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- Chart.js
- XAMPP
- phpMyAdmin

---

## Database Design

The project uses two main database tables:

### `jobs`

This is the main table used by the system.

It stores cleaned and structured job posting records used by:

- Dashboard
- Job records page
- Job detail page
- Add job function
- Edit job function
- Delete job function

### `jobs_staging`

This is a staging table used during CSV import.

Raw CSV data is first imported into `jobs_staging` before being inserted into the main `jobs` table.

This helps check and clean data before it affects the main system.

Example issues handled during import:

- Header row imported as data
- Date formatting problems
- Missing or unclear values
- Raw data inconsistencies

Although this is a small project, the staging table demonstrates a simplified ETL-style workflow:

```text
CSV Raw Data
↓
jobs_staging
↓
Validation / Cleaning
↓
jobs
↓
Dashboard and Web System
