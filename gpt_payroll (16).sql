-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 05:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpt_payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `org_allowance`
--

CREATE TABLE `org_allowance` (
  `id` int(11) NOT NULL,
  `org_id` varchar(20) NOT NULL,
  `housing` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `lunch` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_allowance`
--

INSERT INTO `org_allowance` (`id`, `org_id`, `housing`, `transport`, `lunch`, `medical`, `date_added`) VALUES
(1, 'kibiki@gmail.com', 30, 10, 10, 10, '2024-05-10 20:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `org_charge`
--

CREATE TABLE `org_charge` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `charge_name` text NOT NULL,
  `charge_code` varchar(10) NOT NULL,
  `charge_amount` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_charge`
--

INSERT INTO `org_charge` (`id`, `org_id`, `charge_name`, `charge_code`, `charge_amount`, `date_added`) VALUES
(1, 'kibiki@gmail.com', 'Late Coming', 'LCO', 50, '2024-05-26 23:35:20'),
(2, 'vbc-kitwe@gmail.com', 'LC', '332', 50, '2024-10-05 14:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `org_charge_sheet`
--

CREATE TABLE `org_charge_sheet` (
  `id` int(11) NOT NULL,
  `org_id` varchar(40) NOT NULL,
  `employee_id` varchar(40) NOT NULL,
  `date_clock` date DEFAULT NULL,
  `charge_code` varchar(10) NOT NULL,
  `charge_amount` int(11) NOT NULL,
  `date_year` int(11) NOT NULL,
  `date_month` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_charge_sheet`
--

INSERT INTO `org_charge_sheet` (`id`, `org_id`, `employee_id`, `date_clock`, `charge_code`, `charge_amount`, `date_year`, `date_month`, `date_added`) VALUES
(1, 'kibiki@gmail.com', '446569/67/1', '2024-05-01', 'LTC001', 50, 2024, 5, '2024-05-24 13:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `org_department`
--

CREATE TABLE `org_department` (
  `id` int(11) NOT NULL,
  `org_id` varchar(20) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_department`
--

INSERT INTO `org_department` (`id`, `org_id`, `department_name`, `department_code`, `date_added`) VALUES
(1, 'vbc-kitwe@gmail.com', 'Finance', 'f1', '2024-10-05 14:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `org_emp_management`
--

CREATE TABLE `org_emp_management` (
  `id` int(11) NOT NULL,
  `org_id` varchar(50) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `oname` text NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_emp_management`
--

INSERT INTO `org_emp_management` (`id`, `org_id`, `fname`, `lname`, `oname`, `employee_id`, `phone`, `dob`, `email`, `address`, `date_added`) VALUES
(2, 'kibiki@gmail.com', '', '', '', '446569/67/1', '', '', '', '', '2024-05-10 20:12:09'),
(6, 'vbc-kitwe@gmail.com', 'Christopher', 'Chipasha', '', '222093/67/1', '0955558741', '2024-02-01', 'chris.vbc@gmail.com', 'Chachacha', '2024-06-01 12:54:51'),
(7, 'vbc-kitwe@gmail.com', 'Flaviour', 'Banda', 'Kaungu', '321324/60/1', '0977845745', '1987-03-07', 'flaviour.vbc@gmail.com', 'Ndeke Presidential', '2024-06-01 13:59:58'),
(8, 'vbc-kitwe@gmail.com', 'Bwalya', 'Bwalya', '', '908437/66/1', '0968774888', '2024-05-25', 'bwalya26@gmail.com', 'Arusha Street', '2024-06-01 13:01:58'),
(9, 'vbc-kitwe@gmail.com', 'John', 'Nsululu', '', '213212/1/1', '0973000857', '2024-05-23', 'deedstech@hotmail.com', 'KANTANTA STREET', '2024-06-01 13:02:46'),
(12, 'vbc-kitwe@gmail.com', 'Bwalya', 'Bwalya', '', '932121/65/2', '0968774888', '2024-06-20', 'bwalya26@gmail.com', 'Arusha Street', '2024-06-01 13:12:16'),
(14, 'vbc-kitwe@gmail.com', 'NADI', 'CHAVULA', '', '932121/65/11', '0969596109', '2024-09-02', 'greenpinetech.ltd@gmail.com', '3 BATH CRESCENT PARKLANDS', '2024-09-18 23:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `org_folder`
--

CREATE TABLE `org_folder` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `link` varchar(200) NOT NULL,
  `image_link` varchar(200) NOT NULL,
  `folder_name` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_folder`
--

INSERT INTO `org_folder` (`id`, `org_id`, `link`, `image_link`, `folder_name`, `date_added`) VALUES
(1, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-04 19:13:04'),
(2, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-04 19:27:31'),
(3, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-04 19:28:09'),
(4, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-04 19:28:24'),
(5, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-04 19:29:23'),
(6, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-05 19:49:10'),
(7, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-05 19:49:55'),
(8, '8ea2044a5f3a22ee5886aaaa4b069e', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100233', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100233', '2024-05-05 19:52:33'),
(9, '1ea2cd7b3de776e9ae80d06f03c050', '../admin/documents/organisations/SLUMBA ACCOUNTING_10023100231', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_10023100231', '2024-05-05 20:02:15'),
(10, '1f77938b0b4ca97c501b05f664019a', '../admin/documents/organisations/SLUMBA ACCOUNTING_100231002310', '<img src=\'logo/folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>', 'SLUMBA ACCOUNTING_100231002310', '2024-05-05 20:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `org_folder_file_payslips`
--

CREATE TABLE `org_folder_file_payslips` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `folder_year` int(11) NOT NULL,
  `folder_month` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_link` varchar(200) NOT NULL,
  `image_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_folder_file_payslips`
--

INSERT INTO `org_folder_file_payslips` (`id`, `org_id`, `folder_year`, `folder_month`, `file_name`, `file_link`, `image_link`) VALUES
(1, '123456', 2024, 5, 'payroll_summary_Sat 05 24.pdf', 'documents/backups/organisations/_123456/payroll_summary/2024/05/payroll_summary_Sat 05 24.pdf', '<img src=\'../logo/pdf.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(2, '123456', 2024, 5, 'payroll_summary_Sat 05 24.pdf', 'documents/backups/organisations/_123456/payroll_summary/2024/05/payroll_summary_Sat 05 24.pdf', '<img src=\'../logo/pdf.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(3, 'kibiki@gmail.com', 2024, 5, 'payroll_summary_Tue 05 24.pdf', 'documents/backups/organisations/_kibiki@gmail.com/payroll_summary/2024/05/payroll_summary_Tue 05 24.pdf', '<img src=\'../logo/pdf.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>');

-- --------------------------------------------------------

--
-- Table structure for table `org_folder_file_summary`
--

CREATE TABLE `org_folder_file_summary` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `folder_year` int(11) NOT NULL,
  `folder_month` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_link` varchar(200) NOT NULL,
  `image_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_folder_file_summary`
--

INSERT INTO `org_folder_file_summary` (`id`, `org_id`, `folder_year`, `folder_month`, `file_name`, `file_link`, `image_link`) VALUES
(1, '123456', 2024, 5, 'payroll_summary_Sat 05 24.pdf', 'documents/backups/organisations/_123456/payroll_summary/2024/05/payroll_summary_Sat 05 24.pdf', '<img src=\'../logo/pdf.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(2, '123456', 2024, 5, 'payroll_summary_Sat 05 24.pdf', 'documents/backups/organisations/_123456/payroll_summary/2024/05/payroll_summary_Sat 05 24.pdf', '<img src=\'../logo/pdf.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(3, 'kibiki@gmail.com', 2024, 5, 'payroll_summary_Fri 05 24.pdf', 'documents/backups/organisations/_kibiki@gmail.com/payroll_summary/2024/05/payroll_summary_Fri 05 24.pdf', '<img src=\'../logo/pdf.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>');

-- --------------------------------------------------------

--
-- Table structure for table `org_folder_month_payslips`
--

CREATE TABLE `org_folder_month_payslips` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `folder_year` int(11) NOT NULL,
  `folder_month` int(11) NOT NULL,
  `image_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_folder_month_payslips`
--

INSERT INTO `org_folder_month_payslips` (`id`, `org_id`, `folder_year`, `folder_month`, `image_link`) VALUES
(1, '123456', 2024, 5, '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(2, 'kibiki@gmail.com', 2024, 5, '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>');

-- --------------------------------------------------------

--
-- Table structure for table `org_folder_month_summary`
--

CREATE TABLE `org_folder_month_summary` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `folder_year` int(11) NOT NULL,
  `folder_month` int(11) NOT NULL,
  `image_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_folder_month_summary`
--

INSERT INTO `org_folder_month_summary` (`id`, `org_id`, `folder_year`, `folder_month`, `image_link`) VALUES
(0, '123456', 2024, 5, '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(0, 'kibiki@gmail.com', 2024, 5, '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>');

-- --------------------------------------------------------

--
-- Table structure for table `org_folder_year_payslips`
--

CREATE TABLE `org_folder_year_payslips` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `folder_name` varchar(200) NOT NULL,
  `image_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_folder_year_payslips`
--

INSERT INTO `org_folder_year_payslips` (`id`, `org_id`, `folder_name`, `image_link`) VALUES
(1, '123456', '2024', '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(2, 'kibiki@gmail.com', '2024', '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>');

-- --------------------------------------------------------

--
-- Table structure for table `org_folder_year_summary`
--

CREATE TABLE `org_folder_year_summary` (
  `id` int(11) NOT NULL,
  `org_id` varchar(30) NOT NULL,
  `folder_name` varchar(200) NOT NULL,
  `image_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_folder_year_summary`
--

INSERT INTO `org_folder_year_summary` (`id`, `org_id`, `folder_name`, `image_link`) VALUES
(1, '123456', '2024', '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>'),
(2, 'kibiki@gmail.com', '2024', '<img src=\'../logo/in_folder.png\' width=\'100px\' height=\'auto\' alt=\'Folder\' title=\'Organisation Folder\'>');

-- --------------------------------------------------------

--
-- Table structure for table `org_position`
--

CREATE TABLE `org_position` (
  `id` int(11) NOT NULL,
  `org_id` varchar(20) NOT NULL,
  `position_name` text NOT NULL,
  `position_code` varchar(10) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_position`
--

INSERT INTO `org_position` (`id`, `org_id`, `position_name`, `position_code`, `department_code`, `date_added`) VALUES
(1, 'vbc-kitwe@gmail.com', 'ACCOUNTS CLERK', '121', 'f1', '2024-10-05 14:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `org_salary_management`
--

CREATE TABLE `org_salary_management` (
  `id` int(11) NOT NULL,
  `org_id` varchar(40) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `department` text NOT NULL,
  `position` text NOT NULL,
  `salary_type` text DEFAULT NULL,
  `s_fixed` int(11) NOT NULL,
  `s_hourly` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_salary_management`
--

INSERT INTO `org_salary_management` (`id`, `org_id`, `employee_id`, `department`, `position`, `salary_type`, `s_fixed`, `s_hourly`, `date_added`) VALUES
(1, 'kibiki@gmail.com', '446569/67/1', '', '', '5000', 0, 0, '2024-05-10 20:11:38'),
(2, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:28:36'),
(3, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:29:17'),
(4, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:30:02'),
(5, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:30:18'),
(6, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:30:43'),
(7, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:30:54'),
(8, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:33:01'),
(9, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:37:27'),
(10, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:38:18'),
(11, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:39:15'),
(12, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:40:08'),
(13, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:40:39'),
(14, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:40:59'),
(15, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:42:08'),
(16, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:42:40'),
(17, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:43:20'),
(18, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:43:38'),
(19, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:43:52'),
(20, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:44:13'),
(21, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:44:33'),
(22, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 15:45:13'),
(23, 'kibiki@gmail.com', '', '', '', 'hourly', 0, 0, '2024-05-23 15:45:22'),
(24, 'kibiki@gmail.com', '', '', '', 'hourly', 0, 0, '2024-05-23 15:46:17'),
(25, 'kibiki@gmail.com', '', '', '', 'hourly', 0, 0, '2024-05-23 15:49:28'),
(26, 'kibiki@gmail.com', '', '', '', 'hourly', 0, 0, '2024-05-23 16:00:13'),
(27, 'kibiki@gmail.com', '', '', '', 'hourly', 0, 0, '2024-05-23 16:02:22'),
(28, 'kibiki@gmail.com', '', '', '', 'hourly', 0, 0, '2024-05-23 16:03:05'),
(29, 'kibiki@gmail.com', '446569/67/1', '', '', 'fixed', 0, 0, '2024-05-23 16:56:15'),
(30, 'vbc-kitwe@gmail.com', '222093/67/1', 'f1', '121', 'hourly', 0, 100, '2024-10-05 14:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `org_supa_admin`
--

CREATE TABLE `org_supa_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_supa_admin`
--

INSERT INTO `org_supa_admin` (`id`, `email`, `password`) VALUES
(1, 'greenpinepayroll@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `org_supa_register`
--

CREATE TABLE `org_supa_register` (
  `id` int(11) NOT NULL,
  `org_id` varchar(50) NOT NULL,
  `org_name` text NOT NULL,
  `org_address` varchar(200) NOT NULL,
  `tpin` varchar(20) NOT NULL,
  `org_email` varchar(200) NOT NULL,
  `org_phone` varchar(30) NOT NULL,
  `org_type` text NOT NULL,
  `status` int(11) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_supa_register`
--

INSERT INTO `org_supa_register` (`id`, `org_id`, `org_name`, `org_address`, `tpin`, `org_email`, `org_phone`, `org_type`, `status`, `currency`, `date_added`) VALUES
(1, '8ea2044a5f3a22ee5886aaaa4b069e29', 'SLUMBA ACCOUNTING', 'MEGA COMPLEX', '10023100233', 'info@slumbaaccounting.com.zm', '0977874512', 'Accounting Firm', 1, '', '2024-06-15 22:26:03'),
(11, '3a7209b147078c2b39f6c769063f8bba', 'GREEN PINE TECHNOLOGIES LIMITED', '3 BATH CRESCENT PARKLANDS', '1003777333', 'greenpinetech@greenhostzm.net', '0969596109', 'Accounting Firm', 1, '', '2024-06-15 22:26:06'),
(12, '0cb31163cdcfce32f38264fa1dca7460', 'Kibiki College of Education', 'Kasempa', '1112211212', 'kibiki@gmail.com', '0966558874', 'College', 2, '', '2024-05-08 18:13:26'),
(17, '4276c2f06e4dceb90f03d4222ac6153b', 'Victory Bible Church - Kitwe', 'CBU Nkana East Gate', '1000334211', 'vbc-kitwe@gmail.com', '0955555515', 'Accounting Firm', 1, 'ZMW', '2024-06-01 12:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `org_supa_statutory`
--

CREATE TABLE `org_supa_statutory` (
  `id` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `pension` int(11) NOT NULL,
  `region` text NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_supa_statutory`
--

INSERT INTO `org_supa_statutory` (`id`, `health`, `pension`, `region`, `date_updated`) VALUES
(1, 5, 5, 'Zambia', '2024-06-13 20:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `org_supa_tax`
--

CREATE TABLE `org_supa_tax` (
  `id` int(11) NOT NULL,
  `band_1` int(11) NOT NULL,
  `range_1_start` int(11) NOT NULL,
  `band_2` int(11) NOT NULL,
  `range_2_start` int(11) NOT NULL,
  `band_3` int(11) NOT NULL,
  `range_3_start` int(11) NOT NULL,
  `region` text NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_supa_tax`
--

INSERT INTO `org_supa_tax` (`id`, `band_1`, `range_1_start`, `band_2`, `range_2_start`, `band_3`, `range_3_start`, `region`, `date_updated`) VALUES
(1, 20, 5100, 30, 7100, 37, 9200, 'Zambia', '2024-10-05 14:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `org_supa_type`
--

CREATE TABLE `org_supa_type` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `type_code` varchar(10) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_supa_type`
--

INSERT INTO `org_supa_type` (`id`, `type`, `type_code`, `date_added`) VALUES
(1, 'Accounting Firm', 'AF001', '2024-05-04 19:09:56'),
(2, 'Mining Contractor', '1234', '2024-10-05 14:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `org_time_attendance`
--

CREATE TABLE `org_time_attendance` (
  `id` int(11) NOT NULL,
  `org_id` varchar(40) NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `lunch` int(11) DEFAULT NULL,
  `max_hours` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_time_attendance`
--

INSERT INTO `org_time_attendance` (`id`, `org_id`, `clock_in`, `clock_out`, `lunch`, `max_hours`, `date_added`) VALUES
(3, 'kibiki@gmail.com', '08:00:00', '17:00:00', 1, 9, '2024-05-18 09:35:40'),
(5, 'vbc-kitwe@gmail.com', '08:00:00', '17:00:00', 1, 8, '2024-10-05 14:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `org_time_sheet`
--

CREATE TABLE `org_time_sheet` (
  `id` int(11) NOT NULL,
  `org_id` varchar(40) NOT NULL,
  `employee_id` varchar(30) DEFAULT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `total_time` time DEFAULT NULL,
  `date_clock` date DEFAULT NULL,
  `date_month` int(11) DEFAULT NULL,
  `date_year` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `org_time_sheet`
--

INSERT INTO `org_time_sheet` (`id`, `org_id`, `employee_id`, `clock_in`, `clock_out`, `total_time`, `date_clock`, `date_month`, `date_year`, `date_added`) VALUES
(1, 'kibiki@gmail.com', '446569/67/1', '08:00:34', '17:00:34', '09:00:34', '2024-05-01', 5, 2024, '2024-05-18 12:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `temp_table_id`
--

CREATE TABLE `temp_table_id` (
  `id` int(11) NOT NULL,
  `org_id` varchar(20) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `oname` text NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `net_pay` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `password_changed` int(11) NOT NULL,
  `security_question` text NOT NULL,
  `security_answer` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `password_changed`, `security_question`, `security_answer`, `date_added`) VALUES
(1, 'kibiki@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 'City', 'Mufulira', '2024-10-05 14:56:36'),
(8, 'vbc-kitwe@gmail.com', 'e612d23189ac6eaa11164e725474b644', 2, 'City', 'Kitwe', '2024-06-01 12:42:50'),
(10, 'info@slumbaaccounting.com.zm', '8ea2044a5f3a22ee5886aaaa4b069e29', 1, '', '', '2024-06-15 22:26:03'),
(11, 'greenpinetech@greenhostzm.net', '3a7209b147078c2b39f6c769063f8bba', 1, '', '', '2024-06-15 22:26:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `org_allowance`
--
ALTER TABLE `org_allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_charge`
--
ALTER TABLE `org_charge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charge_code` (`charge_code`);

--
-- Indexes for table `org_charge_sheet`
--
ALTER TABLE `org_charge_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_department`
--
ALTER TABLE `org_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_emp_management`
--
ALTER TABLE `org_emp_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_folder`
--
ALTER TABLE `org_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_folder_file_payslips`
--
ALTER TABLE `org_folder_file_payslips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_folder_file_summary`
--
ALTER TABLE `org_folder_file_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_folder_month_payslips`
--
ALTER TABLE `org_folder_month_payslips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_folder_year_payslips`
--
ALTER TABLE `org_folder_year_payslips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_folder_year_summary`
--
ALTER TABLE `org_folder_year_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_position`
--
ALTER TABLE `org_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_salary_management`
--
ALTER TABLE `org_salary_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_supa_admin`
--
ALTER TABLE `org_supa_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_supa_register`
--
ALTER TABLE `org_supa_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_id` (`org_id`);

--
-- Indexes for table `org_supa_statutory`
--
ALTER TABLE `org_supa_statutory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_supa_tax`
--
ALTER TABLE `org_supa_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_supa_type`
--
ALTER TABLE `org_supa_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_time_attendance`
--
ALTER TABLE `org_time_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_time_sheet`
--
ALTER TABLE `org_time_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_table_id`
--
ALTER TABLE `temp_table_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `org_allowance`
--
ALTER TABLE `org_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_charge`
--
ALTER TABLE `org_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `org_charge_sheet`
--
ALTER TABLE `org_charge_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_department`
--
ALTER TABLE `org_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_emp_management`
--
ALTER TABLE `org_emp_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `org_folder`
--
ALTER TABLE `org_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `org_folder_file_payslips`
--
ALTER TABLE `org_folder_file_payslips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `org_folder_file_summary`
--
ALTER TABLE `org_folder_file_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `org_folder_month_payslips`
--
ALTER TABLE `org_folder_month_payslips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `org_folder_year_payslips`
--
ALTER TABLE `org_folder_year_payslips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `org_folder_year_summary`
--
ALTER TABLE `org_folder_year_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `org_position`
--
ALTER TABLE `org_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_salary_management`
--
ALTER TABLE `org_salary_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `org_supa_admin`
--
ALTER TABLE `org_supa_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_supa_register`
--
ALTER TABLE `org_supa_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `org_supa_statutory`
--
ALTER TABLE `org_supa_statutory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_supa_tax`
--
ALTER TABLE `org_supa_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_supa_type`
--
ALTER TABLE `org_supa_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `org_time_attendance`
--
ALTER TABLE `org_time_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `org_time_sheet`
--
ALTER TABLE `org_time_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_table_id`
--
ALTER TABLE `temp_table_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
