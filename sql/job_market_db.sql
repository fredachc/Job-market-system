-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-05-17 09:22:40
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `job_market_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `platform` varchar(100) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary_text` varchar(255) DEFAULT NULL,
  `salary_min` decimal(10,2) DEFAULT NULL,
  `salary_max` decimal(10,2) DEFAULT NULL,
  `salary_avg` decimal(10,2) DEFAULT NULL,
  `experience_text` varchar(255) DEFAULT NULL,
  `experience_years` decimal(4,1) DEFAULT NULL,
  `experience_level` varchar(100) DEFAULT NULL,
  `degree_text` varchar(255) DEFAULT NULL,
  `degree_required` varchar(50) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `work_mode` varchar(100) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `quality_score` int(11) DEFAULT NULL,
  `job_url` text DEFAULT NULL,
  `date_collected` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `jobs`
--

INSERT INTO `jobs` (`id`, `platform`, `job_title`, `company`, `location`, `salary_text`, `salary_min`, `salary_max`, `salary_avg`, `experience_text`, `experience_years`, `experience_level`, `degree_text`, `degree_required`, `job_type`, `work_mode`, `skills`, `benefits`, `quality_score`, `job_url`, `date_collected`, `created_at`) VALUES
(1, 'CTgoodjobs', 'IT Support', 'Unknown', 'Kowloon City', '$18,000-20,000', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Junior', 'Diploma', 'Yes', 'Full time', 'On-site', 'IT support', 'annual leave, sick leave, promotion, maternity leave, medical', 5, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(2, 'CTgoodjobs', 'Enterprise Architect', 'Unknown', 'NT', '$60,000-70,000', 60000.00, 70000.00, 65000.00, '7+ years', 7.0, 'Senior', '', 'Unknown', 'Permanent', 'On-site', 'architecture', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(3, 'CTgoodjobs', 'Security Engineer', 'Unknown', 'Sai Ying Pun', '$20,000-25,000', 20000.00, 25000.00, 22500.00, '5+ years', 5.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'security', 'medical', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(4, 'CTgoodjobs', 'DevOps AI Engineer', 'Unknown', 'Sai Ying Pun', '$30,000-35,000', 30000.00, 35000.00, 32500.00, '2+ years', 2.0, 'Junior', '', 'Unknown', 'Full time', 'On-site', 'devops ai', 'medical', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(5, 'CTgoodjobs', 'Business Analyst', 'Seamatch', 'HK', '$20,000-28,000', 20000.00, 28000.00, 24000.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full', 'On-site', 'BA', '5-day week', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(6, 'CTgoodjobs', 'Helpdesk Engineer', 'Swing', 'HK', '$18,000-20,000', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Junior', 'Diploma', 'Yes', 'Full', 'Shift', 'helpdesk', 'annual leave, 5-day week', 2, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(7, 'CTgoodjobs', 'Core Banking BA', 'IT Solutions', 'HK', 'HKD 17,001 - 24,999', 17001.00, 24999.00, 21000.00, 'Entry', 0.0, 'Entry', 'Yes', 'Yes', 'Full', 'On-site', 'BA', '5-day week', 1, '', '2026-05-06', '2026-05-16 04:29:54'),
(8, 'CTgoodjobs', 'IT Support Engineer', 'IT-ec', 'HK', '$18,000-20,000', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Entry', 'Diploma', 'Yes', 'Full', 'On-site', 'support', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(9, 'CTgoodjobs', 'IT Admin Coordinator', 'KOS', 'HK', '$20,000-30,000', 20000.00, 30000.00, 25000.00, '2.5 years', 2.5, 'Junior', 'Degree', 'Yes', 'Full', 'On-site', 'admin', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(10, 'CTgoodjobs', 'IT Helpdesk', 'CL', 'HK', '$15,000-18,000', 15000.00, 18000.00, 16500.00, '1 year', 1.0, 'Entry', 'Diploma', 'No', 'Full', 'Shift', 'support', '5-day week', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(11, 'CTgoodjobs', 'System Support', 'Tech Advance', 'HK', '$22,000-26,000', 22000.00, 26000.00, 24000.00, '2 years', 2.0, 'Junior', 'Diploma', 'Yes', 'Full', 'On-site', 'system', '5-day week, medical, transport allowance', 3, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(12, 'CTgoodjobs', 'IT Assistant', 'Tech Trans', 'HK', '$21,000-23,000', 21000.00, 23000.00, 22000.00, '', 0.0, 'Unknown', '', 'Unknown', 'Full', 'On-site', 'coordination', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(13, 'CTgoodjobs', 'Power Platform Dev', 'GlobalExec', 'HK', '$25,000-35,000', 25000.00, 35000.00, 30000.00, '1-2 years', 1.5, 'Junior', 'Dip', 'Yes', 'Full', 'On-site', 'power platform', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(14, 'CTgoodjobs', 'Onsite Support', 'CL', 'HK', '$18,750-21,000', 18750.00, 21000.00, 19875.00, '1-2 years', 1.5, 'Entry', 'Diploma', 'No', 'Full', 'On-site', 'support', '5-day week, medical', 2, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(15, 'CTgoodjobs', 'Technical Specialist', 'Primetech', 'HK', '$18,000-23,000', 18000.00, 23000.00, 20500.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full', 'Shift', 'network', '5-day week, overtime, WFH', 3, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(16, 'CTgoodjobs', 'Power Platform Dev', 'GlobalExec', 'HK', '$25,000-35,000', 25000.00, 35000.00, 30000.00, '1-2 years', 1.5, 'Junior', 'Dip', 'Yes', 'Full', 'On-site', 'power platform', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(17, 'CTgoodjobs', 'IT Support AD', 'CL', 'HK', '$16,000-22,000', 16000.00, 22000.00, 19000.00, '2 years', 2.0, 'Entry', 'Diploma', 'No', 'Full', 'On-site', 'support', '5-day week, medical', 2, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(18, 'CTgoodjobs', 'Integration Developer', 'Spiakl', 'HK', '$24,000-26,000', 24000.00, 26000.00, 25000.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full', 'On-site', 'integration', '5-day week, medical, gratuity', 3, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(19, 'CTgoodjobs', 'System Engineer', 'Primetech', 'HK', '$18,000-23,000', 18000.00, 23000.00, 20500.00, '3 years', 3.0, 'Junior', 'Diploma', 'No', 'Full', 'Hybrid', 'system', '5-day week, WFH', 2, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(20, 'CTgoodjobs', 'Deskside Support', 'CL', 'HK', '$18,000-22,000', 18000.00, 22000.00, 20000.00, '2 years', 2.0, 'Entry', 'Diploma', 'Yes', 'Full', 'On-site', 'support', '5-day week, medical', 2, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(21, 'JobsDB', 'Analyst Programmer', 'SGS Hong Kong Limited', 'Yuen Long', '22000-28000', 22000.00, 28000.00, 25000.00, '2-3 years', 2.5, 'Junior', 'Degree holder', 'Yes', 'Full time', 'On-site', 'C#, .NET, JS', 'medical, bonus, training, career development', 4, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(22, 'JobsDB', 'IT Support', 'Fwone Science & Technology', 'Central', '21000-22000', 21000.00, 22000.00, 21500.00, '2 years', 2.0, 'Junior', 'Higher Diploma', 'No', 'Full time', 'On-site', 'Microsoft365, support', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(23, 'JobsDB', 'Onsite IT Support Engineer', 'DXC', 'Central', '25000-30000', 25000.00, 30000.00, 27500.00, '2 years', 2.0, 'Junior', 'Unknown', 'Unknown', 'Full time', 'On-site', 'Windows, hardware', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(24, 'JobsDB', 'Deskside Support Specialist', 'EIRE', 'Central', '30000-35000', 30000.00, 35000.00, 32500.00, '1 year', 1.0, 'Junior', 'Bachelor', 'Yes', 'Contract', 'On-site', 'support, network', 'medical,dental,retirement,leave,training', 5, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(25, 'JobsDB', 'Full Stack Developer', 'ADECCO', 'Central', '32000-43000', 32000.00, 43000.00, 37500.00, '5 years', 5.0, 'Senior', 'Unknown', 'Unknown', 'Contract', 'On-site', 'Java,C#,API', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(26, 'JobsDB', 'Analyst Programmer', 'Taylor Coulter', 'Wan Chai', '38000-45000', 38000.00, 45000.00, 41500.00, '2 years', 2.0, 'Junior', 'Degree', 'Yes', 'Full time', 'On-site', '.NET,React', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(27, 'JobsDB', 'Programmer', 'CL Technical', 'Ho Man Tin', '30000-40000', 30000.00, 40000.00, 35000.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'SQL,Oracle,Tableau', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(28, 'JobsDB', 'Java Developer', 'Wealth Mgmt Cube', 'Central', '25000-32000', 25000.00, 32000.00, 28500.00, 'Unknown', 0.0, 'Unknown', 'Bachelor', 'Yes', 'Full time', 'On-site', 'Spring,SQL', 'training', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(29, 'JobsDB', 'AV Programmer', 'Nanpeng', 'Kowloon Bay', '22000-26000', 22000.00, 26000.00, 24000.00, '2 years', 2.0, 'Junior', 'Unknown', 'Unknown', 'Full time', 'On-site', 'Crestron,QSYS', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(30, 'JobsDB', 'Backend Engineer', 'Huandong', 'Sha Tin', '18000-25000', 18000.00, 25000.00, 21500.00, 'fresh', 0.5, 'Entry', 'Bachelor', 'Yes', 'Full time', 'On-site', 'PHP,MySQL', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(31, 'JobsDB', 'Systems Engineer', 'Nicoll Curtin', 'HK Island', '30000-45000', 30000.00, 45000.00, 37500.00, '5 years', 5.0, 'Senior', 'Degree', 'Yes', 'Full time', 'On-site', 'Azure,AWS', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(32, 'JobsDB', 'Project Engineer', 'SmartHire', 'Yuen Long', '20000-25000', 20000.00, 25000.00, 22500.00, '3 years', 3.0, 'Mid', 'Diploma', 'No', 'Full time', 'On-site', 'AutoCAD', 'medical,dental', 2, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(33, 'JobsDB', 'Business Analyst', 'Ignite', 'HK Island', '40000-45000', 40000.00, 45000.00, 42500.00, '3 years', 3.0, 'Mid', 'Unknown', 'Unknown', 'Full time', 'On-site', 'SQL,Agile', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(34, 'JobsDB', 'Cloud Engineer', 'APJ', 'Kowloon Bay', '40000-45000', 40000.00, 45000.00, 42500.00, '5 years', 5.0, 'Senior', 'Degree', 'Yes', 'Contract', 'On-site', 'Cloud,FinOps', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(35, 'JobsDB', 'C++ Developer', 'Pinpoint', 'Central', '40000-55000', 40000.00, 55000.00, 47500.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'C++,Linux', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(36, 'JobsDB', 'QA Tester', 'ADECCO', 'Kowloon', '20000-25000', 20000.00, 25000.00, 22500.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'QA,UAT', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(37, 'JobsDB', 'Senior Backend Engineer', 'TEKsystems', 'Kwun Tong', '35000-45000', 35000.00, 45000.00, 40000.00, '5 years', 5.0, 'Senior', 'Unknown', 'Unknown', 'Full time', 'Hybrid', 'Java,API,Cloud', 'WFH', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(38, 'JobsDB', 'Sales Executive', 'TRIUS', 'Kowloon', '20000-23000', 20000.00, 23000.00, 21500.00, '1 year', 1.0, 'Junior', 'Degree', 'Yes', 'Full time', 'On-site', 'CRM,sales', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(39, 'JobsDB', 'Technical Support', 'Osmium', 'TST', '20000-24000', 20000.00, 24000.00, 22000.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'Shift', 'Jira,support', 'WFH', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(40, 'JobsDB', 'Automation Engineer', 'ASK IT', 'Central', '28000-30000', 28000.00, 30000.00, 29000.00, '2 years', 2.0, 'Junior', 'Bachelor', 'Yes', 'Full time', 'On-site', 'RPA,AI,AWS', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(41, 'Labour Department', 'Data Center Operator', 'SS DATA LIMITED', 'New Territories, Hong Kong', '$18,000 - $22,000 per month', 18000.00, 22000.00, 20000.00, '1 year', 1.0, 'Junior', 'Diploma/Certificate', 'No', 'Full time', 'Shift', 'data center operations, facilities management, helpdesk, monitoring', 'time-off in lieu, medical insurance, year-end bonus', 3, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(42, 'Labour Department', 'Data Center Operator', 'ACME UNIVERSAL DEVELOPMENT COMPANY', 'Kowloon Bay, Hong Kong', 'HKD 10,600 - 14,000', 10600.00, 14000.00, 12300.00, 'Junior', 0.0, 'Junior', 'Unknown', 'Unknown', 'Full time', 'Shift', 'data center operations', 'overtime, bonus, discount, training, promotion', 5, '', '2026-05-06', '2026-05-16 04:29:54'),
(43, 'Labour Department', 'IT Project Engineer', 'PRIMETECH TECHNOLOGY LIMITED', 'Hong Kong', '$16,000 - $18,000', 16000.00, 18000.00, 17000.00, '6 months', 0.5, 'Entry', 'Secondary 5', 'Unknown', 'Full time', 'On-site', 'IT support, Windows', 'overtime, bank holiday, training', 3, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(44, 'Labour Department', 'Software Engineer', 'REASONABLE SOFTWARE HOUSE LIMITED', 'Shenzhen', '$18,000 - $25,000', 18000.00, 25000.00, 21500.00, '1 year', 1.0, 'Junior', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'JavaScript, C#', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(45, 'Labour Department', 'IT Technician', 'CL TECHNICAL SERVICES LIMITED', 'Shek Mun, Hong Kong', '$14,000 - $15,000', 14000.00, 15000.00, 14500.00, '', 0.0, 'Unknown', 'Secondary 5', 'Unknown', 'Full time', 'On-site', 'helpdesk', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(46, 'Labour Department', 'AI Software Engineer', 'BYTEWISE CODING LIMITED', 'Wan Chai, Hong Kong', '$20,000 - $25,000', 20000.00, 25000.00, 22500.00, '', 0.0, 'Unknown', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'Python, AI', 'annual leave, bonus, medical', 3, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(47, 'Labour Department', 'IT Officer', 'TAI PO BAPTIST CHURCH SOCIAL SERVICE', 'Tai Po Market, Hong Kong', '$23,000 - $25,000', 23000.00, 25000.00, 24000.00, '3 years', 3.0, 'Mid', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'CRM, support', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(48, 'Labour Department', 'Software Development Engineer', '-', 'Sai Ying Pun, Hong Kong', '$26,000 - $26,500', 26000.00, 26500.00, 26250.00, '1 year 3 months', 1.3, 'Junior', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'Java, backend', 'double pay, allowance', 4, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(49, 'Labour Department', 'Network Engineer', 'PRIMETECH TECHNOLOGY LIMITED', 'Hong Kong', '$22,000 - $30,000', 22000.00, 30000.00, 26000.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'networking', 'overtime, bank holiday, training', 3, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(50, 'Labour Department', 'Java Programmer', 'SOFTWARE BOX TECHNOLOGY LIMITED', 'Tsuen Wan, Hong Kong', '$20,000 - $30,000', 20000.00, 30000.00, 25000.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'Java, MySQL', 'double pay', 1, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(51, 'Labour Department', 'Deskside Support Engineer', 'CL TECHNICAL SERVICES LIMITED', 'Hong Kong', '$18,000 - $22,000', 18000.00, 22000.00, 20000.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'deskside support', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(52, 'Labour Department', 'Java Junior Programmer', 'CL TECHNICAL SERVICES LIMITED', 'Hong Kong', '$15,000 - $18,000', 15000.00, 18000.00, 16500.00, '', 0.0, 'Unknown', 'Sub-degree', 'No', 'Full time', 'On-site', 'Java dev', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(53, 'Labour Department', 'Web Programmer', 'CL TECHNICAL SERVICES LIMITED', 'Hong Kong', '$15,000 - $28,000', 15000.00, 28000.00, 21500.00, '1 year', 1.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'web dev', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(54, 'Labour Department', 'Business Analyst (EA)', 'CLASSY WHEELER LIMITED', 'Kowloon Bay, Hong Kong', '$28,000 - $35,000', 28000.00, 35000.00, 31500.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'BA, ERP', 'annual leave, bank holiday', 2, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(55, 'Labour Department', 'IT Support Assistant', 'I SUNDAY TRAVEL LIMITED', 'Shenzhen', '$16,000 - $18,000', 16000.00, 18000.00, 17000.00, '2 years', 2.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'IT support, system maintenance, network, security', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(56, 'Labour Department', 'IT Support Technician', 'EASY GREAT TECHNOLOGY LIMITED', 'Hong Kong', '$18,000 - $20,000 per month', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'IT support, troubleshooting, hardware, software, networking, email systems', 'overtime allowance, annual leave, medical, promotion opportunity', 4, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(57, 'Labour Department', 'Technician Manager / Manageress', 'HONG KONG HOUSE AGENCY LIMITED', 'Hong Kong', '$28,000 - $32,000', 28000.00, 32000.00, 30000.00, '5 years', 5.0, 'Senior', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'business development, channel partnership, digital tools, CRM, cross-border operations', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(58, 'Labour Department', 'Data Analyst', 'ORIENT EXPRESS INTERNATIONAL LIMITED', 'Quarry Bay, Hong Kong', '$30,000 per month', 30000.00, 30000.00, 30000.00, '2 years', 2.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'Python, data analysis, BI dashboard, data modelling, NLP, big data', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(59, 'Labour Department', 'IT Technical cum Helpdesk Support Technician', 'CTI GROUP HK LIMITED', 'Central, Hong Kong', '$20,000 - $26,000 per month', 20000.00, 26000.00, 23000.00, '2 years', 2.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'IT support, helpdesk, networking, troubleshooting, hardware, software, system maintenance', '', 0, NULL, '2026-05-06', '2026-05-16 04:29:54'),
(60, 'Labour Department', 'Programmer (EA)', 'JOB EXPRESS RECRUITMENT AGENCY LIMITED', 'Hong Kong', '$14,000 - $22,000', 14000.00, 22000.00, 18000.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', '.NET, Java, Python, SQL', 'bank holiday', 1, NULL, '2026-05-06', '2026-05-16 04:29:54');

-- --------------------------------------------------------

--
-- 資料表結構 `jobs_staging`
--

CREATE TABLE `jobs_staging` (
  `platform` varchar(100) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary_text` varchar(255) DEFAULT NULL,
  `salary_min` decimal(10,2) DEFAULT NULL,
  `salary_max` decimal(10,2) DEFAULT NULL,
  `salary_avg` decimal(10,2) DEFAULT NULL,
  `experience_text` varchar(255) DEFAULT NULL,
  `experience_years` decimal(4,1) DEFAULT NULL,
  `experience_level` varchar(100) DEFAULT NULL,
  `degree_text` varchar(255) DEFAULT NULL,
  `degree_required` varchar(50) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `work_mode` varchar(100) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `quality_score` int(11) DEFAULT NULL,
  `date_collected` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `jobs_staging`
--

INSERT INTO `jobs_staging` (`platform`, `job_title`, `company`, `location`, `salary_text`, `salary_min`, `salary_max`, `salary_avg`, `experience_text`, `experience_years`, `experience_level`, `degree_text`, `degree_required`, `job_type`, `work_mode`, `skills`, `benefits`, `quality_score`, `date_collected`) VALUES
('CTgoodjobs', 'IT Support', 'Unknown', 'Kowloon City', '$18,000-20,000', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Junior', 'Diploma', 'Yes', 'Full time', 'On-site', 'IT support', 'annual leave, sick leave, promotion, maternity leave, medical', 5, '0000-00-00'),
('CTgoodjobs', 'Enterprise Architect', 'Unknown', 'NT', '$60,000-70,000', 60000.00, 70000.00, 65000.00, '7+ years', 7.0, 'Senior', '', 'Unknown', 'Permanent', 'On-site', 'architecture', '', 0, '0000-00-00'),
('CTgoodjobs', 'Security Engineer', 'Unknown', 'Sai Ying Pun', '$20,000-25,000', 20000.00, 25000.00, 22500.00, '5+ years', 5.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'security', 'medical', 1, '0000-00-00'),
('CTgoodjobs', 'DevOps AI Engineer', 'Unknown', 'Sai Ying Pun', '$30,000-35,000', 30000.00, 35000.00, 32500.00, '2+ years', 2.0, 'Junior', '', 'Unknown', 'Full time', 'On-site', 'devops ai', 'medical', 1, '0000-00-00'),
('CTgoodjobs', 'Business Analyst', 'Seamatch', 'HK', '$20,000-28,000', 20000.00, 28000.00, 24000.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full', 'On-site', 'BA', '5-day week', 1, '0000-00-00'),
('CTgoodjobs', 'Helpdesk Engineer', 'Swing', 'HK', '$18,000-20,000', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Junior', 'Diploma', 'Yes', 'Full', 'Shift', 'helpdesk', 'annual leave, 5-day week', 2, '0000-00-00'),
('CTgoodjobs', 'Core Banking BA', 'IT Solutions', 'HK', '$17,000-24,999', 17000.00, 24999.00, 21000.00, '1 year', 1.0, 'Entry', 'Degree', 'Yes', 'Full', 'On-site', 'BA', '5-day week', 1, '0000-00-00'),
('CTgoodjobs', 'IT Support Engineer', 'IT-ec', 'HK', '$18,000-20,000', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Entry', 'Diploma', 'Yes', 'Full', 'On-site', 'support', '', 0, '0000-00-00'),
('CTgoodjobs', 'IT Admin Coordinator', 'KOS', 'HK', '$20,000-30,000', 20000.00, 30000.00, 25000.00, '2.5 years', 2.5, 'Junior', 'Degree', 'Yes', 'Full', 'On-site', 'admin', '', 0, '0000-00-00'),
('CTgoodjobs', 'IT Helpdesk', 'CL', 'HK', '$15,000-18,000', 15000.00, 18000.00, 16500.00, '1 year', 1.0, 'Entry', 'Diploma', 'No', 'Full', 'Shift', 'support', '5-day week', 1, '0000-00-00'),
('CTgoodjobs', 'System Support', 'Tech Advance', 'HK', '$22,000-26,000', 22000.00, 26000.00, 24000.00, '2 years', 2.0, 'Junior', 'Diploma', 'Yes', 'Full', 'On-site', 'system', '5-day week, medical, transport allowance', 3, '0000-00-00'),
('CTgoodjobs', 'IT Assistant', 'Tech Trans', 'HK', '$21,000-23,000', 21000.00, 23000.00, 22000.00, '', 0.0, 'Unknown', '', 'Unknown', 'Full', 'On-site', 'coordination', '', 0, '0000-00-00'),
('CTgoodjobs', 'Power Platform Dev', 'GlobalExec', 'HK', '$25,000-35,000', 25000.00, 35000.00, 30000.00, '1-2 years', 1.5, 'Junior', 'Dip', 'Yes', 'Full', 'On-site', 'power platform', '', 0, '0000-00-00'),
('CTgoodjobs', 'Onsite Support', 'CL', 'HK', '$18,750-21,000', 18750.00, 21000.00, 19875.00, '1-2 years', 1.5, 'Entry', 'Diploma', 'No', 'Full', 'On-site', 'support', '5-day week, medical', 2, '0000-00-00'),
('CTgoodjobs', 'Technical Specialist', 'Primetech', 'HK', '$18,000-23,000', 18000.00, 23000.00, 20500.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full', 'Shift', 'network', '5-day week, overtime, WFH', 3, '0000-00-00'),
('CTgoodjobs', 'Power Platform Dev', 'GlobalExec', 'HK', '$25,000-35,000', 25000.00, 35000.00, 30000.00, '1-2 years', 1.5, 'Junior', 'Dip', 'Yes', 'Full', 'On-site', 'power platform', '', 0, '0000-00-00'),
('CTgoodjobs', 'IT Support AD', 'CL', 'HK', '$16,000-22,000', 16000.00, 22000.00, 19000.00, '2 years', 2.0, 'Entry', 'Diploma', 'No', 'Full', 'On-site', 'support', '5-day week, medical', 2, '0000-00-00'),
('CTgoodjobs', 'Integration Developer', 'Spiakl', 'HK', '$24,000-26,000', 24000.00, 26000.00, 25000.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full', 'On-site', 'integration', '5-day week, medical, gratuity', 3, '0000-00-00'),
('CTgoodjobs', 'System Engineer', 'Primetech', 'HK', '$18,000-23,000', 18000.00, 23000.00, 20500.00, '3 years', 3.0, 'Junior', 'Diploma', 'No', 'Full', 'Hybrid', 'system', '5-day week, WFH', 2, '0000-00-00'),
('CTgoodjobs', 'Deskside Support', 'CL', 'HK', '$18,000-22,000', 18000.00, 22000.00, 20000.00, '2 years', 2.0, 'Entry', 'Diploma', 'Yes', 'Full', 'On-site', 'support', '5-day week, medical', 2, '0000-00-00'),
('JobsDB', 'Analyst Programmer', 'SGS Hong Kong Limited', 'Yuen Long', '22000-28000', 22000.00, 28000.00, 25000.00, '2-3 years', 2.5, 'Junior', 'Degree holder', 'Yes', 'Full time', 'On-site', 'C#, .NET, JS', 'medical, bonus, training, career development', 4, '0000-00-00'),
('JobsDB', 'IT Support', 'Fwone Science & Technology', 'Central', '21000-22000', 21000.00, 22000.00, 21500.00, '2 years', 2.0, 'Junior', 'Higher Diploma', 'No', 'Full time', 'On-site', 'Microsoft365, support', '', 0, '0000-00-00'),
('JobsDB', 'Onsite IT Support Engineer', 'DXC', 'Central', '25000-30000', 25000.00, 30000.00, 27500.00, '2 years', 2.0, 'Junior', 'Unknown', 'Unknown', 'Full time', 'On-site', 'Windows, hardware', '', 0, '0000-00-00'),
('JobsDB', 'Deskside Support Specialist', 'EIRE', 'Central', '30000-35000', 30000.00, 35000.00, 32500.00, '1 year', 1.0, 'Junior', 'Bachelor', 'Yes', 'Contract', 'On-site', 'support, network', 'medical,dental,retirement,leave,training', 5, '0000-00-00'),
('JobsDB', 'Full Stack Developer', 'ADECCO', 'Central', '32000-43000', 32000.00, 43000.00, 37500.00, '5 years', 5.0, 'Senior', 'Unknown', 'Unknown', 'Contract', 'On-site', 'Java,C#,API', '', 0, '0000-00-00'),
('JobsDB', 'Analyst Programmer', 'Taylor Coulter', 'Wan Chai', '38000-45000', 38000.00, 45000.00, 41500.00, '2 years', 2.0, 'Junior', 'Degree', 'Yes', 'Full time', 'On-site', '.NET,React', '', 0, '0000-00-00'),
('JobsDB', 'Programmer', 'CL Technical', 'Ho Man Tin', '30000-40000', 30000.00, 40000.00, 35000.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'SQL,Oracle,Tableau', '', 0, '0000-00-00'),
('JobsDB', 'Java Developer', 'Wealth Mgmt Cube', 'Central', '25000-32000', 25000.00, 32000.00, 28500.00, 'Unknown', 0.0, 'Unknown', 'Bachelor', 'Yes', 'Full time', 'On-site', 'Spring,SQL', 'training', 1, '0000-00-00'),
('JobsDB', 'AV Programmer', 'Nanpeng', 'Kowloon Bay', '22000-26000', 22000.00, 26000.00, 24000.00, '2 years', 2.0, 'Junior', 'Unknown', 'Unknown', 'Full time', 'On-site', 'Crestron,QSYS', '', 0, '0000-00-00'),
('JobsDB', 'Backend Engineer', 'Huandong', 'Sha Tin', '18000-25000', 18000.00, 25000.00, 21500.00, 'fresh', 0.5, 'Entry', 'Bachelor', 'Yes', 'Full time', 'On-site', 'PHP,MySQL', '', 0, '0000-00-00'),
('JobsDB', 'Systems Engineer', 'Nicoll Curtin', 'HK Island', '30000-45000', 30000.00, 45000.00, 37500.00, '5 years', 5.0, 'Senior', 'Degree', 'Yes', 'Full time', 'On-site', 'Azure,AWS', '', 0, '0000-00-00'),
('JobsDB', 'Project Engineer', 'SmartHire', 'Yuen Long', '20000-25000', 20000.00, 25000.00, 22500.00, '3 years', 3.0, 'Mid', 'Diploma', 'No', 'Full time', 'On-site', 'AutoCAD', 'medical,dental', 2, '0000-00-00'),
('JobsDB', 'Business Analyst', 'Ignite', 'HK Island', '40000-45000', 40000.00, 45000.00, 42500.00, '3 years', 3.0, 'Mid', 'Unknown', 'Unknown', 'Full time', 'On-site', 'SQL,Agile', '', 0, '0000-00-00'),
('JobsDB', 'Cloud Engineer', 'APJ', 'Kowloon Bay', '40000-45000', 40000.00, 45000.00, 42500.00, '5 years', 5.0, 'Senior', 'Degree', 'Yes', 'Contract', 'On-site', 'Cloud,FinOps', '', 0, '0000-00-00'),
('JobsDB', 'C++ Developer', 'Pinpoint', 'Central', '40000-55000', 40000.00, 55000.00, 47500.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'C++,Linux', '', 0, '0000-00-00'),
('JobsDB', 'QA Tester', 'ADECCO', 'Kowloon', '20000-25000', 20000.00, 25000.00, 22500.00, '3 years', 3.0, 'Mid', 'Degree', 'Yes', 'Full time', 'On-site', 'QA,UAT', '', 0, '0000-00-00'),
('JobsDB', 'Senior Backend Engineer', 'TEKsystems', 'Kwun Tong', '35000-45000', 35000.00, 45000.00, 40000.00, '5 years', 5.0, 'Senior', 'Unknown', 'Unknown', 'Full time', 'Hybrid', 'Java,API,Cloud', 'WFH', 1, '0000-00-00'),
('JobsDB', 'Sales Executive', 'TRIUS', 'Kowloon', '20000-23000', 20000.00, 23000.00, 21500.00, '1 year', 1.0, 'Junior', 'Degree', 'Yes', 'Full time', 'On-site', 'CRM,sales', '', 0, '0000-00-00'),
('JobsDB', 'Technical Support', 'Osmium', 'TST', '20000-24000', 20000.00, 24000.00, 22000.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'Shift', 'Jira,support', 'WFH', 1, '0000-00-00'),
('JobsDB', 'Automation Engineer', 'ASK IT', 'Central', '28000-30000', 28000.00, 30000.00, 29000.00, '2 years', 2.0, 'Junior', 'Bachelor', 'Yes', 'Full time', 'On-site', 'RPA,AI,AWS', '', 0, '0000-00-00'),
('Labour Department', 'Data Center Operator', 'SS DATA LIMITED', 'New Territories, Hong Kong', '$18,000 - $22,000 per month', 18000.00, 22000.00, 20000.00, '1 year', 1.0, 'Junior', 'Diploma/Certificate', 'No', 'Full time', 'Shift', 'data center operations, facilities management, helpdesk, monitoring', 'time-off in lieu, medical insurance, year-end bonus', 3, '0000-00-00'),
('Labour Department', 'Data Center Operator', 'ACME UNIVERSAL DEVELOPMENT COMPANY', 'Kowloon Bay, Hong Kong', '$10,600 - $14,000', 10600.00, 14000.00, 12300.00, '1 year', 1.0, 'Junior', 'Secondary 5', 'Unknown', 'Full time', 'Shift', 'data center operations', 'overtime, bonus, discount, training, promotion', 5, '0000-00-00'),
('Labour Department', 'IT Project Engineer', 'PRIMETECH TECHNOLOGY LIMITED', 'Hong Kong', '$16,000 - $18,000', 16000.00, 18000.00, 17000.00, '6 months', 0.5, 'Entry', 'Secondary 5', 'Unknown', 'Full time', 'On-site', 'IT support, Windows', 'overtime, bank holiday, training', 3, '0000-00-00'),
('Labour Department', 'Software Engineer', 'REASONABLE SOFTWARE HOUSE LIMITED', 'Shenzhen', '$18,000 - $25,000', 18000.00, 25000.00, 21500.00, '1 year', 1.0, 'Junior', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'JavaScript, C#', '', 0, '0000-00-00'),
('Labour Department', 'IT Technician', 'CL TECHNICAL SERVICES LIMITED', 'Shek Mun, Hong Kong', '$14,000 - $15,000', 14000.00, 15000.00, 14500.00, '', 0.0, 'Unknown', 'Secondary 5', 'Unknown', 'Full time', 'On-site', 'helpdesk', '', 0, '0000-00-00'),
('Labour Department', 'AI Software Engineer', 'BYTEWISE CODING LIMITED', 'Wan Chai, Hong Kong', '$20,000 - $25,000', 20000.00, 25000.00, 22500.00, '', 0.0, 'Unknown', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'Python, AI', 'annual leave, bonus, medical', 3, '0000-00-00'),
('Labour Department', 'IT Officer', 'TAI PO BAPTIST CHURCH SOCIAL SERVICE', 'Tai Po Market, Hong Kong', '$23,000 - $25,000', 23000.00, 25000.00, 24000.00, '3 years', 3.0, 'Mid', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'CRM, support', '', 0, '0000-00-00'),
('Labour Department', 'Software Development Engineer', '-', 'Sai Ying Pun, Hong Kong', '$26,000 - $26,500', 26000.00, 26500.00, 26250.00, '1 year 3 months', 1.3, 'Junior', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'Java, backend', 'double pay, allowance', 4, '0000-00-00'),
('Labour Department', 'Network Engineer', 'PRIMETECH TECHNOLOGY LIMITED', 'Hong Kong', '$22,000 - $30,000', 22000.00, 30000.00, 26000.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'networking', 'overtime, bank holiday, training', 3, '0000-00-00'),
('Labour Department', 'Java Programmer', 'SOFTWARE BOX TECHNOLOGY LIMITED', 'Tsuen Wan, Hong Kong', '$20,000 - $30,000', 20000.00, 30000.00, 25000.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'Java, MySQL', 'double pay', 1, '0000-00-00'),
('Labour Department', 'Deskside Support Engineer', 'CL TECHNICAL SERVICES LIMITED', 'Hong Kong', '$18,000 - $22,000', 18000.00, 22000.00, 20000.00, '2 years', 2.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'deskside support', '', 0, '0000-00-00'),
('Labour Department', 'Java Junior Programmer', 'CL TECHNICAL SERVICES LIMITED', 'Hong Kong', '$15,000 - $18,000', 15000.00, 18000.00, 16500.00, '', 0.0, 'Unknown', 'Sub-degree', 'No', 'Full time', 'On-site', 'Java dev', '', 0, '0000-00-00'),
('Labour Department', 'Web Programmer', 'CL TECHNICAL SERVICES LIMITED', 'Hong Kong', '$15,000 - $28,000', 15000.00, 28000.00, 21500.00, '1 year', 1.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'web dev', '', 0, '0000-00-00'),
('Labour Department', 'Business Analyst (EA)', 'CLASSY WHEELER LIMITED', 'Kowloon Bay, Hong Kong', '$28,000 - $35,000', 28000.00, 35000.00, 31500.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', 'BA, ERP', 'annual leave, bank holiday', 2, '0000-00-00'),
('Labour Department', 'IT Support Assistant', 'I SUNDAY TRAVEL LIMITED', 'Shenzhen', '$16,000 - $18,000', 16000.00, 18000.00, 17000.00, '2 years', 2.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'IT support, system maintenance, network, security', '', 0, '0000-00-00'),
('Labour Department', 'IT Support Technician', 'EASY GREAT TECHNOLOGY LIMITED', 'Hong Kong', '$18,000 - $20,000 per month', 18000.00, 20000.00, 19000.00, '1 year', 1.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'IT support, troubleshooting, hardware, software, networking, email systems', 'overtime allowance, annual leave, medical, promotion opportunity', 4, '0000-00-00'),
('Labour Department', 'Technician Manager / Manageress', 'HONG KONG HOUSE AGENCY LIMITED', 'Hong Kong', '$28,000 - $32,000', 28000.00, 32000.00, 30000.00, '5 years', 5.0, 'Senior', 'Bachelor Degree', 'Yes', 'Full time', 'On-site', 'business development, channel partnership, digital tools, CRM, cross-border operations', '', 0, '0000-00-00'),
('Labour Department', 'Data Analyst', 'ORIENT EXPRESS INTERNATIONAL LIMITED', 'Quarry Bay, Hong Kong', '$30,000 per month', 30000.00, 30000.00, 30000.00, '2 years', 2.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'Python, data analysis, BI dashboard, data modelling, NLP, big data', '', 0, '0000-00-00'),
('Labour Department', 'IT Technical cum Helpdesk Support Technician', 'CTI GROUP HK LIMITED', 'Central, Hong Kong', '$20,000 - $26,000 per month', 20000.00, 26000.00, 23000.00, '2 years', 2.0, 'Junior', 'Sub-degree', 'No', 'Full time', 'On-site', 'IT support, helpdesk, networking, troubleshooting, hardware, software, system maintenance', '', 0, '0000-00-00'),
('Labour Department', 'Programmer (EA)', 'JOB EXPRESS RECRUITMENT AGENCY LIMITED', 'Hong Kong', '$14,000 - $22,000', 14000.00, 22000.00, 18000.00, '1 year', 1.0, 'Junior', 'Diploma', 'No', 'Full time', 'On-site', '.NET, Java, Python, SQL', 'bank holiday', 1, '0000-00-00');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
