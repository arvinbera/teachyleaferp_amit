-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 01:41 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LKG', '2021-11-04 08:50:19', '2021-11-04 08:50:19', NULL),
(2, 'Class One', '2021-11-11 22:54:09', '2021-11-11 22:54:09', NULL),
(3, 'Class Two', '2021-11-11 22:54:18', '2021-11-11 22:54:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Principal', '2021-11-04 19:57:04', '2021-11-04 19:57:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'same as user_id',
  `date` date NOT NULL,
  `attendance_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attendance_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2021-11-07', 'On_Leave', '2021-11-06 23:08:15', '2021-11-06 23:08:15', NULL),
(2, 4, '2021-11-07', 'On_Leave', '2021-11-06 23:08:15', '2021-11-06 23:08:15', NULL),
(3, 3, '2021-11-08', 'Absent', '2021-11-06 23:08:50', '2021-11-07 00:16:20', '2021-11-07 00:16:20'),
(4, 4, '2021-11-08', 'Present', '2021-11-06 23:08:50', '2021-11-07 00:16:20', '2021-11-07 00:16:20'),
(5, 3, '2021-11-08', 'Absent', '2021-11-07 00:16:20', '2021-11-07 00:16:20', NULL),
(6, 4, '2021-11-08', 'Absent', '2021-11-07 00:16:20', '2021-11-07 00:16:20', NULL),
(7, 3, '2021-11-09', 'Present', '2021-11-07 00:16:37', '2021-11-07 00:16:37', NULL),
(8, 4, '2021-11-09', 'Present', '2021-11-07 00:16:37', '2021-11-07 00:16:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'First Terminal Examination', '2021-11-04 08:52:02', '2021-11-04 08:52:02', NULL),
(2, 'Second Terminal Examination', '2021-11-04 08:52:14', '2021-11-04 08:52:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fees_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `session_id`, `class_id`, `student_id`, `fees_category_id`, `date`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 1, '2021-11', 90, '2021-11-07 21:16:51', '2021-11-07 21:16:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fees_amounts`
--

CREATE TABLE `fees_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_amounts`
--

INSERT INTO `fees_amounts` (`id`, `fees_category_id`, `class_id`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 100, '2021-11-07 10:07:35', '2021-11-07 10:07:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fees_categories`
--

CREATE TABLE `fees_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_categories`
--

INSERT INTO `fees_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Registration Fees', '2021-11-07 08:47:00', '2021-11-07 08:47:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'O', '10', '90', '100', '9', '10', 'Outstanding', '2021-11-04 09:01:25', '2021-11-04 09:01:25', NULL),
(2, 'E', '9', '80', '89', '8', '8.9', 'Excellent', '2021-11-04 09:44:15', '2021-11-04 09:44:15', NULL),
(3, 'A', '8', '70', '79', '7', '7.9', 'Good', '2021-11-11 22:58:39', '2021-11-11 22:58:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'same as user_id',
  `leave_category_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `leave_category_id`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '2021-11-10', '2021-11-11', '2021-11-06 07:33:41', '2021-11-06 07:33:41', NULL),
(2, 3, 3, '2021-11-17', '2021-11-18', '2021-11-06 07:34:21', '2021-11-06 07:49:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_categories`
--

CREATE TABLE `leave_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_categories`
--

INSERT INTO `leave_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Casual Leave', '2021-11-06 06:41:38', '2021-11-06 06:41:38', NULL),
(2, 'Medical Leave', '2021-11-06 06:43:11', '2021-11-06 06:43:11', NULL),
(3, 'Birthday', '2021-11-06 07:34:21', '2021-11-06 07:34:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'same as user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `subject_assigning_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `id_no`, `session_id`, `class_id`, `exam_type_id`, `subject_assigning_id`, `marks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2021/0001', 1, 1, 1, 1, 92, '2021-11-04 09:00:23', '2021-11-04 09:00:23', NULL),
(2, 2, '2021/0001', 1, 1, 1, 2, 88, '2021-11-04 09:00:45', '2021-11-04 09:00:45', NULL),
(3, 2, '2021/0001', 1, 1, 2, 1, 99, '2021-11-08 06:16:41', '2021-11-08 06:16:41', NULL),
(4, 2, '2021/0001', 1, 1, 2, 2, 85, '2021-11-08 06:16:59', '2021-11-08 06:16:59', NULL),
(5, 5, '2022/0003', 2, 2, 1, 3, 78, '2021-11-11 22:59:32', '2021-11-11 22:59:32', NULL),
(6, 2, '2021/0001', 2, 2, 1, 3, 76, '2021-11-11 22:59:33', '2021-11-11 22:59:33', NULL),
(7, 5, '2022/0003', 2, 2, 1, 4, 92, '2021-11-11 22:59:53', '2021-11-11 22:59:53', NULL),
(8, 2, '2021/0001', 2, 2, 1, 4, 85, '2021-11-11 22:59:53', '2021-11-11 22:59:53', NULL),
(9, 5, '2022/0003', 2, 2, 2, 3, 76, '2021-11-11 23:01:07', '2021-11-11 23:01:07', NULL),
(10, 2, '2021/0001', 2, 2, 2, 3, 76, '2021-11-11 23:01:07', '2021-11-11 23:01:07', NULL),
(11, 5, '2022/0003', 2, 2, 2, 4, 76, '2021-11-11 23:03:09', '2021-11-11 23:03:09', NULL),
(12, 2, '2021/0001', 2, 2, 2, 4, 75, '2021-11-11 23:03:09', '2021-11-11 23:03:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2021_10_23_082807_create_classes_table', 1),
(30, '2021_10_23_120613_create_sessions_table', 1),
(31, '2021_10_23_152736_create_sections_table', 1),
(32, '2021_10_23_155542_create_shifts_table', 1),
(33, '2021_10_23_164355_create_fees_categories_table', 1),
(34, '2021_10_23_171314_create_fees_amounts_table', 1),
(35, '2021_10_24_145151_create_exam_types_table', 1),
(36, '2021_10_25_020100_create_subjects_table', 1),
(37, '2021_10_25_023006_create_subject_assignings_table', 1),
(38, '2021_10_25_141356_create_designations_table', 1),
(39, '2021_10_25_161252_create_student_assignings_table', 1),
(40, '2021_10_25_161912_create_student_feewaive_table', 1),
(41, '2021_10_28_023746_create_marks_table', 1),
(42, '2021_10_28_124151_create_grades_table', 1),
(43, '2021_10_29_092635_create_fees_table', 1),
(44, '2021_10_30_045818_create_salary_logs_table', 1),
(45, '2021_11_06_110749_create_leave_categories_table', 2),
(46, '2021_11_06_111009_create_leaves_table', 2),
(47, '2021_11_07_020024_create_employee_attendances_table', 3),
(48, '2021_11_07_131102_create_salary_table', 4),
(49, '2021_11_07_163345_create_other_expenses_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `other_expenses`
--

CREATE TABLE `other_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_expenses`
--

INSERT INTO `other_expenses` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-11-08', 0, NULL, NULL, '2021-11-07 19:19:07', '2021-11-07 19:19:07', NULL),
(2, '2021-11-08', 100, 'Marker', NULL, '2021-11-07 19:25:42', '2021-11-07 19:25:42', NULL),
(3, '2021-11-08', 100, 'Pencil', NULL, '2021-11-07 19:26:37', '2021-11-07 19:26:37', NULL),
(4, '2021-11-08', 1000, 'ting', 'bf424cb7b0dea050a42b9739eb261a3a.jpg', '2021-11-07 19:29:24', '2021-11-07 19:48:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'same as user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2021-11', 11600, '2021-11-07 09:58:36', '2021-11-07 09:58:36', NULL),
(2, 4, '2021-11', 13533.333333333, '2021-11-07 09:58:36', '2021-11-07 09:58:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_logs`
--

CREATE TABLE `salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'same as user_id',
  `previous_salary` double DEFAULT NULL,
  `present_salary` double DEFAULT NULL,
  `increment` double DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_logs`
--

INSERT INTO `salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment`, `effective_from`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 10000, 10000, 0, NULL, '2021-11-04 19:58:41', '2021-11-04 19:58:41', NULL),
(2, 3, 10000, 11000, 1000, '2021-11-06', '2021-11-06 00:54:50', '2021-11-06 00:54:50', NULL),
(3, 3, 11000, 12000, 1000, '2021-11-06', '2021-11-06 00:57:29', '2021-11-06 00:57:29', NULL),
(4, 4, 14000, 14000, 0, NULL, '2021-11-06 23:05:11', '2021-11-06 23:05:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-2022', '2021-11-04 08:50:00', '2021-11-04 08:50:00', NULL),
(2, '2022-2023', '2021-11-11 22:53:45', '2021-11-11 22:53:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_assignings`
--

CREATE TABLE `student_assignings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'same as user_id',
  `session_id` int(11) NOT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_assignings`
--

INSERT INTO `student_assignings` (`id`, `student_id`, `session_id`, `shift_id`, `class_id`, `section_id`, `roll_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, NULL, 1, NULL, 1, '2021-11-04 08:59:39', '2021-11-07 08:48:15', NULL),
(2, 5, 2, NULL, 2, NULL, 1, '2021-11-11 22:56:30', '2021-11-11 22:57:13', NULL),
(3, 2, 2, NULL, 2, NULL, NULL, '2021-11-11 22:57:28', '2021-11-11 22:57:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_feewaive`
--

CREATE TABLE `student_feewaive` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_assigning_id` int(11) NOT NULL,
  `fees_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_feewaive`
--

INSERT INTO `student_feewaive` (`id`, `student_assigning_id`, `fees_category_id`, `discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10, '2021-11-04 08:59:39', '2021-11-07 10:06:07', NULL),
(2, 2, 1, 0, '2021-11-11 22:56:30', '2021-11-11 22:56:30', NULL),
(3, 1, 1, 0, '2021-11-11 22:57:28', '2021-11-11 22:57:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bengali', '2021-11-04 08:50:40', '2021-11-04 08:50:40', NULL),
(2, 'English', '2021-11-04 08:50:50', '2021-11-04 08:50:50', NULL),
(3, 'Sanskrit', '2021-11-04 08:51:00', '2021-11-04 08:51:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_assignings`
--

CREATE TABLE `subject_assignings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_marks` double NOT NULL,
  `pass_marks` double NOT NULL,
  `subjective_marks` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_assignings`
--

INSERT INTO `subject_assignings` (`id`, `class_id`, `subject_id`, `full_marks`, `pass_marks`, `subjective_marks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 100, 30, 100, '2021-11-04 08:51:41', '2021-11-04 08:51:41', NULL),
(2, 1, 2, 100, 30, 100, '2021-11-04 08:51:41', '2021-11-04 08:51:41', NULL),
(3, 2, 1, 100, 30, 100, '2021-11-11 22:55:05', '2021-11-11 22:55:05', NULL),
(4, 2, 2, 100, 30, 100, '2021-11-11 22:55:05', '2021-11-11 22:55:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admins, employees, students',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin, operator, gen_user',
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_current` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_permanent` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `generated_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: inactive, 1: active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `role`, `profile_photo`, `phone`, `father_name`, `father_phone`, `mother_name`, `address_current`, `address_permanent`, `gender`, `religion`, `dob`, `id_no`, `joining_date`, `generated_password`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Amit Kumar Das', 'amit.inverse@gmail.com', NULL, '$2y$10$lRGlO/T20wrlOA3C.4zVlego4GrbGfdxuAg17S3wto7RmD/fg.zr6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-11-04 08:49:40', '2021-11-04 08:49:40', NULL),
(2, 'Rebecca Black', 'rebecca@gmail.com', NULL, '$2y$10$etFrtlZQ45OMyTpDLX1Dn.ThMLektbLHt4WnaxzZptIg5Kq8VN.bC', 'students', NULL, '28e209b61a52482a0ae1cb9f5959c792.jpg', '9876543210', 'Mr. Black', '9876543210', 'Mrs. Black', '43, Vivekananda Sarani', '43, Vivekananda Sarani', 'Female', 'Hindu', '2021-11-01', '2021/0001', NULL, '3075', NULL, NULL, 1, NULL, '2021-11-04 08:59:39', '2021-11-04 08:59:39', NULL),
(3, 'Albert Einstein', 'albert@gmail.com', NULL, '$2y$10$ZYs6Jwo/G.bOHRKXwx0erOF9jv8y3XQQeMnmyxh07xgQSlMIr/Cvm', 'employees', NULL, '9ec51f6eb240fb631a35864e13737bca.jpg', '9876543210', 'Mr. Einstein', '9876543210', 'Mrs. Einstein', '43, Vivekananda Sarani,\r\nMadhyamgram', '43, Vivekananda Sarani,\r\nMadhyamgram', 'Male', 'Hindu', '2020-11-20', 'e2021/0001', '2021-11-01', '9636', 1, 12000, 1, NULL, '2021-11-04 19:58:41', '2021-11-06 00:57:29', NULL),
(4, 'Rabindra Nath Tagore', 'rabindra@gmail.com', NULL, '$2y$10$jh5req0pUtCm3dMlNi8TLOYLnvfG3Gqe6QA2pLhVH7ESviT8/qPKC', 'employees', NULL, NULL, '9999999999', 'Mr. Tagore', '8989898989', 'Mrs. Tagore', '43, Ra', '43, Ra', 'Male', 'Hindu', '2021-11-01', 'e2021/0004', '2021-11-07', '4823', 1, 14000, 1, NULL, '2021-11-06 23:05:11', '2021-11-06 23:05:11', NULL),
(5, 'Kaushik Nath', NULL, NULL, '$2y$10$M/bFKqQnCV.bEtbghbOi/e5V..lpzMzlKt7Y8UNxH16Nm3.xwxkb6', 'students', NULL, NULL, NULL, 'Mr. Nath', '9', 'Mrs. Nath', '9', '9', 'Male', 'Hindu', '2021-11-12', '2022/0003', NULL, '6568', NULL, NULL, 1, NULL, '2021-11-11 22:56:30', '2021-11-11 22:56:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_name_unique` (`name`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_amounts`
--
ALTER TABLE `fees_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_categories`
--
ALTER TABLE `fees_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fees_categories_name_unique` (`name`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_categories`
--
ALTER TABLE `leave_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_categories_name_unique` (`name`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_expenses`
--
ALTER TABLE `other_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_logs`
--
ALTER TABLE `salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_name_unique` (`name`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shifts_name_unique` (`name`);

--
-- Indexes for table `student_assignings`
--
ALTER TABLE `student_assignings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_feewaive`
--
ALTER TABLE `student_feewaive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `subject_assignings`
--
ALTER TABLE `subject_assignings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fees_amounts`
--
ALTER TABLE `fees_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fees_categories`
--
ALTER TABLE `fees_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_categories`
--
ALTER TABLE `leave_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `other_expenses`
--
ALTER TABLE `other_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_logs`
--
ALTER TABLE `salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_assignings`
--
ALTER TABLE `student_assignings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_feewaive`
--
ALTER TABLE `student_feewaive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_assignings`
--
ALTER TABLE `subject_assignings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
