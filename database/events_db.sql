-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 05:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_group`
--

CREATE TABLE `ac_group` (
  `id` int(11) NOT NULL,
  `acgroup_id` int(11) NOT NULL,
  `acgroup_name` varchar(64) DEFAULT NULL,
  `acgroup_holidayValid` tinyint(1) DEFAULT NULL,
  `acgroup_verifystytle` int(11) DEFAULT NULL,
  `timezone1` int(11) DEFAULT NULL,
  `timezone2` int(11) DEFAULT NULL,
  `timezone3` int(11) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ac_group`
--

INSERT INTO `ac_group` (`id`, `acgroup_id`, `acgroup_name`, `acgroup_holidayValid`, `acgroup_verifystytle`, `timezone1`, `timezone2`, `timezone3`, `terminal_id`) VALUES
(1, 1, 'Group1', 0, 0, NULL, NULL, NULL, 1),
(2, 2, 'Group2', 0, 0, NULL, NULL, NULL, 1),
(3, 3, 'Group3', 0, 0, NULL, NULL, NULL, 1),
(4, 4, 'Group4', 0, 0, NULL, NULL, NULL, 1),
(5, 5, 'Group5', 0, 0, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_holidaysetting`
--

CREATE TABLE `ac_holidaysetting` (
  `holiday_id` int(11) NOT NULL,
  `holiday_name` varchar(64) DEFAULT NULL,
  `holiday_start` datetime DEFAULT NULL,
  `holiday_end` datetime DEFAULT NULL,
  `acTimezoneId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_timezone`
--

CREATE TABLE `ac_timezone` (
  `timezone_id` int(11) NOT NULL,
  `timezone_name` varchar(64) DEFAULT NULL,
  `timezone_SunStart` datetime DEFAULT NULL,
  `timezone_SunEnd` datetime DEFAULT NULL,
  `timezone_MonStart` datetime DEFAULT NULL,
  `timezone_MonEnd` datetime DEFAULT NULL,
  `timezone_TuesStart` datetime DEFAULT NULL,
  `timezone_TuesEnd` datetime DEFAULT NULL,
  `timezone_WedStart` datetime DEFAULT NULL,
  `timezone_WedEnd` datetime DEFAULT NULL,
  `timezone_ThursStart` datetime DEFAULT NULL,
  `timezone_ThursEnd` datetime DEFAULT NULL,
  `timezone_FriStart` datetime DEFAULT NULL,
  `timezone_FriEnd` datetime DEFAULT NULL,
  `timezone_SatStart` datetime DEFAULT NULL,
  `timezone_SatEnd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_unlockcomb`
--

CREATE TABLE `ac_unlockcomb` (
  `id` int(11) NOT NULL,
  `unlockComb_id` int(11) NOT NULL,
  `unlockComb_name` varchar(64) DEFAULT NULL,
  `acgroup1` int(11) DEFAULT NULL,
  `acgroup2` int(11) DEFAULT NULL,
  `acgroup3` int(11) DEFAULT NULL,
  `acgroup4` int(11) DEFAULT NULL,
  `acgroup5` int(11) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ac_unlockcomb`
--

INSERT INTO `ac_unlockcomb` (`id`, `unlockComb_id`, `unlockComb_name`, `acgroup1`, `acgroup2`, `acgroup3`, `acgroup4`, `acgroup5`, `terminal_id`) VALUES
(1, 1, 'Combination1', 1, NULL, NULL, NULL, NULL, 1),
(2, 2, 'Combination2', NULL, NULL, NULL, NULL, NULL, 1),
(3, 3, 'Combination3', NULL, NULL, NULL, NULL, NULL, 1),
(4, 4, 'Combination4', NULL, NULL, NULL, NULL, NULL, 1),
(5, 5, 'Combination5', NULL, NULL, NULL, NULL, NULL, 1),
(6, 6, 'Combination6', NULL, NULL, NULL, NULL, NULL, 1),
(7, 7, 'Combination7', NULL, NULL, NULL, NULL, NULL, 1),
(8, 8, 'Combination8', NULL, NULL, NULL, NULL, NULL, 1),
(9, 9, 'Combination9', NULL, NULL, NULL, NULL, NULL, 1),
(10, 10, 'Combination10', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_userprivilege`
--

CREATE TABLE `ac_userprivilege` (
  `id` int(11) NOT NULL,
  `isUserGroup` tinyint(1) DEFAULT NULL,
  `verifystytle` int(11) DEFAULT NULL,
  `disable` tinyint(1) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `terminal_id` int(11) NOT NULL,
  `timezone1` int(11) DEFAULT NULL,
  `timezone2` int(11) DEFAULT NULL,
  `timezone3` int(11) DEFAULT NULL,
  `acgroup_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `log_time` varchar(255) NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_break`
--

CREATE TABLE `att_break` (
  `id` int(11) NOT NULL,
  `break_name` varchar(64) DEFAULT NULL,
  `break_start` datetime NOT NULL,
  `break_end` datetime NOT NULL,
  `break_deductminute` int(11) DEFAULT NULL,
  `break_autodeduct` tinyint(1) DEFAULT NULL,
  `break_needcheck` tinyint(1) DEFAULT NULL,
  `break_advance` datetime DEFAULT NULL,
  `break_delay` datetime DEFAULT NULL,
  `break_ValidWorkTime` tinyint(1) DEFAULT NULL,
  `break_overcount` tinyint(1) DEFAULT NULL,
  `break_overcount_paycode` int(11) DEFAULT NULL,
  `break_overminutes` int(11) DEFAULT NULL,
  `break_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_break_details`
--

CREATE TABLE `att_break_details` (
  `id` int(11) NOT NULL,
  `breakout` datetime DEFAULT NULL,
  `breakin` datetime DEFAULT NULL,
  `minutes` int(11) DEFAULT NULL,
  `roundminutes` int(11) DEFAULT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `ddetail_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_break_timetable`
--

CREATE TABLE `att_break_timetable` (
  `break_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_daytype`
--

CREATE TABLE `att_daytype` (
  `id` int(11) NOT NULL,
  `dt_code` int(11) NOT NULL,
  `dt_desc` varchar(32) DEFAULT NULL,
  `export_code` varchar(32) DEFAULT NULL,
  `sign` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_daytype`
--

INSERT INTO `att_daytype` (`id`, `dt_code`, `dt_desc`, `export_code`, `sign`) VALUES
(1, 0, 'Unknown', '', 'UN'),
(2, 1, 'Weekend', '', 'WK'),
(3, 2, 'OffDuty', '', 'OD'),
(4, 3, 'NormalWork', '', 'N'),
(5, 4, 'Holiday', '', 'H'),
(6, 5, 'Leave', '', 'L'),
(7, 6, 'OverTime', '', 'OT');

-- --------------------------------------------------------

--
-- Table structure for table `att_day_details`
--

CREATE TABLE `att_day_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `att_date` datetime NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL,
  `roundin` datetime DEFAULT NULL,
  `roundout` datetime DEFAULT NULL,
  `workedMinutes` int(11) DEFAULT NULL,
  `rworkedMinutes` int(11) DEFAULT NULL,
  `breakMinutes` int(11) DEFAULT NULL,
  `breakRealMinutes` int(11) DEFAULT NULL,
  `sortindex` int(11) NOT NULL,
  `iuser1` int(11) DEFAULT NULL,
  `iuser2` int(11) DEFAULT NULL,
  `iuser3` int(11) DEFAULT NULL,
  `cuser1` varchar(64) DEFAULT NULL,
  `cuser2` varchar(64) DEFAULT NULL,
  `cuser3` varchar(64) DEFAULT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `wc` int(11) DEFAULT NULL,
  `workcode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_day_summary`
--

CREATE TABLE `att_day_summary` (
  `id` int(11) NOT NULL,
  `att_date` datetime NOT NULL,
  `item_results` decimal(19,5) DEFAULT NULL,
  `recordsFrom` datetime NOT NULL,
  `recordsTo` datetime NOT NULL,
  `iuser1` int(11) DEFAULT NULL,
  `iuser2` int(11) DEFAULT NULL,
  `iuser3` int(11) DEFAULT NULL,
  `cuser1` varchar(64) DEFAULT NULL,
  `cuser2` varchar(64) DEFAULT NULL,
  `cuser3` varchar(64) DEFAULT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `dt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `paycode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_departmentleavetype`
--

CREATE TABLE `att_departmentleavetype` (
  `id` int(11) NOT NULL,
  `dl_code` int(11) NOT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_department_shift`
--

CREATE TABLE `att_department_shift` (
  `id` int(11) NOT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `modifyDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_department_shift`
--

INSERT INTO `att_department_shift` (`id`, `startDate`, `endDate`, `department_id`, `shift_id`, `modifyDate`) VALUES
(1, '2000-01-01 00:00:00', '3000-01-01 00:00:00', 1, 1, '2023-10-10 22:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `att_department_smartshift`
--

CREATE TABLE `att_department_smartshift` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_employeeleavetype`
--

CREATE TABLE `att_employeeleavetype` (
  `id` int(11) NOT NULL,
  `el_code` int(11) NOT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_employee_shift`
--

CREATE TABLE `att_employee_shift` (
  `id` int(11) NOT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `modifyDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_employee_smartshift`
--

CREATE TABLE `att_employee_smartshift` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_employee_temp_shift`
--

CREATE TABLE `att_employee_temp_shift` (
  `id` int(11) NOT NULL,
  `schDate` datetime DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `dayTypeCode` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `paycode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_employee_zone`
--

CREATE TABLE `att_employee_zone` (
  `employee_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_exceptionassign`
--

CREATE TABLE `att_exceptionassign` (
  `id` int(11) NOT NULL,
  `exception_date` datetime DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `dayTypeCode` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `paycode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_flexibletimetable`
--

CREATE TABLE `att_flexibletimetable` (
  `id` int(11) NOT NULL,
  `dayChangeAt` datetime DEFAULT NULL,
  `requireWork` int(11) DEFAULT NULL,
  `firstInLastOut` tinyint(1) DEFAULT NULL,
  `enableOT` tinyint(1) DEFAULT NULL,
  `otl1available` tinyint(1) DEFAULT NULL,
  `otl1minutes` int(11) DEFAULT NULL,
  `otl2available` tinyint(1) DEFAULT NULL,
  `otl2minutes` int(11) DEFAULT NULL,
  `otl3available` tinyint(1) DEFAULT NULL,
  `otl3minutes` int(11) DEFAULT NULL,
  `timetable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_punches`
--

CREATE TABLE `att_punches` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `punch_time` datetime NOT NULL,
  `workcode` int(11) DEFAULT NULL,
  `workstate` int(11) DEFAULT NULL,
  `verifycode` varchar(64) DEFAULT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `punch_type` varchar(64) DEFAULT NULL,
  `operator` varchar(64) DEFAULT NULL,
  `operator_reason` varchar(255) DEFAULT NULL,
  `operator_time` datetime DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `attendance_event` varchar(64) DEFAULT NULL,
  `login_combination` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `annotation` varchar(255) DEFAULT NULL,
  `processed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_punches`
--

INSERT INTO `att_punches` (`id`, `employee_id`, `punch_time`, `workcode`, `workstate`, `verifycode`, `terminal_id`, `punch_type`, `operator`, `operator_reason`, `operator_time`, `IsSelect`, `middleware_id`, `attendance_event`, `login_combination`, `status`, `annotation`, `processed`) VALUES
(11, 2, '2023-08-22 08:18:03', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(12, 2, '2023-08-22 08:18:12', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(13, 2, '2023-08-22 08:18:24', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(14, 2, '2023-08-22 08:18:48', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(15, 1, '2023-10-11 10:22:28', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(16, 1, '2023-10-11 10:24:46', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(17, 1, '2023-10-11 10:24:48', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(18, 2, '2023-10-11 10:24:51', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(19, 1, '2023-10-11 10:24:53', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(20, 1, '2023-10-11 10:24:55', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(21, 1, '2023-10-11 10:24:57', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(22, 1, '2023-10-11 10:25:31', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(23, 1, '2023-10-11 10:25:33', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(24, 1, '2023-10-11 10:25:35', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(25, 3, '2023-10-11 11:19:49', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(26, 1, '2023-10-20 13:30:49', 0, 255, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(27, 1, '2023-10-20 13:41:33', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(28, 4, '2023-10-20 13:41:36', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(29, 2, '2023-10-20 13:41:58', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(30, 3, '2023-10-20 13:42:00', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(31, 4, '2023-10-20 13:42:06', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(32, 1, '2023-10-20 13:57:06', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(33, 1, '2023-10-20 13:57:08', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(34, 3, '2023-10-20 13:57:15', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(35, 4, '2023-10-20 13:57:17', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(36, 1, '2023-10-20 23:38:49', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(37, 3, '2023-10-20 23:38:52', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(38, 4, '2023-10-20 23:38:54', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(39, 1, '2023-10-20 23:57:46', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(40, 3, '2023-10-20 23:57:51', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0),
(41, 4, '2023-10-20 23:57:53', 0, 0, '1', 1, '0', NULL, NULL, NULL, 0, 0, NULL, 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `att_shift`
--

CREATE TABLE `att_shift` (
  `id` int(11) NOT NULL,
  `shift_name` varchar(64) NOT NULL,
  `cycle_available` tinyint(1) NOT NULL,
  `cycle_type` int(11) DEFAULT NULL,
  `cycle_parameter` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `defaultShift` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_shift`
--

INSERT INTO `att_shift` (`id`, `shift_name`, `cycle_available`, `cycle_type`, `cycle_parameter`, `start_date`, `defaultShift`) VALUES
(1, 'Default', 1, 1, 1, '2014-06-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `att_shift_details`
--

CREATE TABLE `att_shift_details` (
  `id` int(11) NOT NULL,
  `shift_date` datetime NOT NULL,
  `dayTypeCode` int(11) DEFAULT NULL,
  `timetable_paycode` int(11) DEFAULT NULL,
  `shift_id` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_shift_details`
--

INSERT INTO `att_shift_details` (`id`, `shift_date`, `dayTypeCode`, `timetable_paycode`, `shift_id`, `timetable_id`) VALUES
(1, '2014-06-30 00:00:00', 0, 0, 1, 1),
(2, '2014-07-01 00:00:00', 0, 0, 1, 1),
(3, '2014-07-02 00:00:00', 0, 0, 1, 1),
(4, '2014-07-03 00:00:00', 0, 0, 1, 1),
(5, '2014-07-04 00:00:00', 0, 0, 1, 1),
(6, '2014-07-05 00:00:00', 0, 0, 1, NULL),
(7, '2014-07-06 00:00:00', 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `att_statisticitem`
--

CREATE TABLE `att_statisticitem` (
  `id` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `item_desc` varchar(32) DEFAULT NULL,
  `item_type` int(11) DEFAULT NULL,
  `export_code` varchar(32) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `sign` varchar(2) DEFAULT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `item_Mode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_statisticitem`
--

INSERT INTO `att_statisticitem` (`id`, `item_code`, `item_desc`, `item_type`, `export_code`, `isDeleted`, `sign`, `yearlyLimit`, `item_Mode`) VALUES
(1, 1, 'requireWork', 0, '', 0, 'W', 365.00000, 0),
(2, 2, 'actualWork', 0, '', 0, 'AW', 365.00000, 0),
(3, 3, 'roundWork', 0, '', 0, 'RW', 365.00000, 0),
(4, 4, 'overtime1', 0, '', 0, 'O1', 365.00000, 0),
(5, 5, 'overtime2', 0, '', 0, 'O2', 365.00000, 0),
(6, 6, 'overtime3', 0, '', 0, 'O3', 365.00000, 0),
(7, 7, 'lateCome', 0, '', 0, 'L', 365.00000, 0),
(8, 8, 'earlyOut', 0, '', 0, 'E', 365.00000, 0),
(9, 9, 'absence', 0, '', 0, 'A', 365.00000, 0),
(10, 10, 'break', 0, '', 0, 'B', 365.00000, 0),
(11, 11, 'sick', 0, '', 0, 'SL', 365.00000, 1),
(12, 12, 'vacation', 0, '', 0, 'VL', 365.00000, 1),
(13, 13, 'personalLeave', 0, '', 0, 'PL', 365.00000, 1),
(14, 14, 'annualLeave', 0, '', 0, 'AL', 365.00000, 1),
(15, 15, 'businessLeave', 0, '', 0, 'BL', 365.00000, 1),
(16, 16, 'missingTime', 0, '', 0, 'MT', 365.00000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `att_terminal`
--

CREATE TABLE `att_terminal` (
  `id` int(11) NOT NULL,
  `terminal_no` int(11) NOT NULL,
  `terminal_status` int(11) NOT NULL,
  `terminal_name` varchar(64) DEFAULT NULL,
  `terminal_location` text DEFAULT NULL,
  `terminal_category` int(11) NOT NULL,
  `terminal_type` varchar(32) DEFAULT NULL,
  `terminal_connectpwd` varchar(32) DEFAULT NULL,
  `terminal_domainname` varchar(32) DEFAULT NULL,
  `terminal_dateformat` varchar(32) DEFAULT NULL,
  `terminal_tcpip` varchar(32) DEFAULT NULL,
  `AGR_version` varchar(32) DEFAULT NULL,
  `terminal_port` int(11) DEFAULT NULL,
  `terminal_baudrate` int(11) DEFAULT NULL,
  `terminal_users` int(11) DEFAULT NULL,
  `terminal_fingerprints` int(11) DEFAULT NULL,
  `terminal_faces` int(11) DEFAULT NULL,
  `terminal_palms` int(11) DEFAULT NULL,
  `terminal_fvs` int(11) DEFAULT NULL,
  `terminal_punches` int(11) DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `terminal_sn` bigint(20) DEFAULT NULL,
  `terminal_sns` varchar(20) DEFAULT NULL,
  `policy` int(11) DEFAULT NULL,
  `first_connect` tinyint(1) DEFAULT NULL,
  `terminal_desc` varchar(64) DEFAULT NULL,
  `terminal_photostamp` varchar(64) DEFAULT NULL,
  `terminal_AttLogStamp` varchar(64) DEFAULT NULL,
  `isfromWDMS` int(11) DEFAULT NULL,
  `connection_model` int(11) DEFAULT NULL,
  `terminal_zem` varchar(24) DEFAULT NULL,
  `terminal_firmversion` varchar(24) DEFAULT NULL,
  `terminal_admins` int(11) DEFAULT NULL,
  `p2pUID` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_terminal`
--

INSERT INTO `att_terminal` (`id`, `terminal_no`, `terminal_status`, `terminal_name`, `terminal_location`, `terminal_category`, `terminal_type`, `terminal_connectpwd`, `terminal_domainname`, `terminal_dateformat`, `terminal_tcpip`, `AGR_version`, `terminal_port`, `terminal_baudrate`, `terminal_users`, `terminal_fingerprints`, `terminal_faces`, `terminal_palms`, `terminal_fvs`, `terminal_punches`, `IsSelect`, `terminal_sn`, `terminal_sns`, `policy`, `first_connect`, `terminal_desc`, `terminal_photostamp`, `terminal_AttLogStamp`, `isfromWDMS`, `connection_model`, `terminal_zem`, `terminal_firmversion`, `terminal_admins`, `p2pUID`) VALUES
(1, 1, 1, 'home', NULL, 1, 'ZK3969', '', NULL, 'YYYYMMDD', '192.168.100.201', '10', 4370, 0, 1, 1, 0, 0, 0, 4, 0, 0, 'A667232260059', 1, 1, NULL, NULL, NULL, 0, 0, 'ZLM60_TFT', 'Ver 6.60 Sep 27 2019', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `att_terminal_events`
--

CREATE TABLE `att_terminal_events` (
  `id` int(11) NOT NULL,
  `occurtime` datetime DEFAULT NULL,
  `actionname` varchar(128) DEFAULT NULL,
  `contentdata` text DEFAULT NULL,
  `verifymode` varchar(128) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_terminal_events`
--

INSERT INTO `att_terminal_events` (`id`, `occurtime`, `actionname`, `contentdata`, `verifymode`, `terminal_id`) VALUES
(1, '2023-10-11 10:24:59', NULL, 'Connecting To Device 192.168.100.201', NULL, 1),
(2, '2023-10-11 10:25:00', NULL, 'Succeeded To Connect With Device 192.168.100.201', NULL, 1),
(3, '2023-10-11 10:24:46', 'Identify', NULL, 'FP', 1),
(4, '2023-10-11 10:24:48', 'Identify', NULL, 'FP', 1),
(5, '2023-10-11 10:24:51', 'Identify', NULL, 'FP', 1),
(6, '2023-10-11 10:24:53', 'Identify', NULL, 'FP', 1),
(7, '2023-10-11 10:24:55', 'Identify', NULL, 'FP', 1),
(8, '2023-10-11 10:24:57', 'Identify', NULL, 'FP', 1),
(9, '2023-10-11 10:25:31', 'Identify', NULL, 'FP', 1),
(10, '2023-10-11 10:25:33', 'Identify', NULL, 'FP', 1),
(11, '2023-10-11 10:25:35', 'Identify', NULL, 'FP', 1),
(12, '2023-10-11 11:19:42', 'Enroll Finger', NULL, 'Enroll Finger', 1),
(13, '2023-10-11 11:19:49', 'Identify', NULL, 'FP', 1),
(14, '2023-10-18 19:28:29', NULL, 'Connecting To Device 192.168.100.201', NULL, 1),
(15, '2023-10-18 19:28:31', NULL, 'Succeeded To Connect With Device 192.168.100.201', NULL, 1),
(16, '2023-10-18 23:57:22', NULL, 'Failed To Connect With Device 192.168.100.201', NULL, 1),
(17, '2023-10-20 13:32:16', NULL, 'Connecting To Device 192.168.100.201', NULL, 1),
(18, '2023-10-20 13:32:19', NULL, 'Succeeded To Connect With Device 192.168.100.201', NULL, 1),
(19, '2023-10-20 13:41:33', 'Identify', NULL, 'FP', 1),
(20, '2023-10-20 13:41:36', 'Identify', NULL, 'FP', 1),
(21, '2023-10-20 13:41:58', 'Identify', NULL, 'FP', 1),
(22, '2023-10-20 13:42:00', 'Identify', NULL, 'FP', 1),
(23, '2023-10-20 13:42:06', 'Identify', NULL, 'FP', 1),
(24, '2023-10-20 13:57:06', 'Identify', NULL, 'FP', 1),
(25, '2023-10-20 13:57:08', 'Identify', NULL, 'FP', 1),
(26, '2023-10-20 13:57:15', 'Identify', NULL, 'FP', 1),
(27, '2023-10-20 13:57:17', 'Identify', NULL, 'FP', 1),
(28, '2023-10-20 20:17:59', NULL, 'Failed To Connect With Device 192.168.100.201', NULL, 1),
(29, '2023-10-20 23:38:59', NULL, 'Succeeded To Connect With Device 192.168.100.201', NULL, 1),
(30, '2023-10-20 23:38:49', 'Identify', NULL, 'FP', 1),
(31, '2023-10-20 23:38:52', 'Identify', NULL, 'FP', 1),
(32, '2023-10-20 23:39:15', NULL, 'Succeeded To Connect With Device 192.168.100.201', NULL, 1),
(33, '2023-10-20 23:38:54', 'Identify', NULL, 'FP', 1),
(34, '2023-10-20 23:57:46', 'Identify', NULL, 'FP', 1),
(35, '2023-10-20 23:57:51', 'Identify', NULL, 'FP', 1),
(36, '2023-10-20 23:57:53', 'Identify', NULL, 'FP', 1),
(37, '2023-10-21 00:23:12', NULL, 'Failed To Connect With Device 192.168.100.201', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `att_terminal_zone`
--

CREATE TABLE `att_terminal_zone` (
  `terminal_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_terminal_zone`
--

INSERT INTO `att_terminal_zone` (`terminal_id`, `zone_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `att_timetable`
--

CREATE TABLE `att_timetable` (
  `id` int(11) NOT NULL,
  `timetableType` int(11) DEFAULT NULL,
  `timetable_color` int(11) DEFAULT NULL,
  `timetable_name` varchar(64) DEFAULT NULL,
  `timetable_start` datetime DEFAULT NULL,
  `timetable_end` datetime DEFAULT NULL,
  `timetable_checkin_begin` datetime DEFAULT NULL,
  `timetable_checkout_end` datetime DEFAULT NULL,
  `usedForSmartShift` tinyint(1) DEFAULT NULL,
  `timetable_checkin_end` datetime DEFAULT NULL,
  `timetable_checkout_begin` datetime DEFAULT NULL,
  `requireWork` int(11) DEFAULT NULL,
  `timetable_late` tinyint(1) DEFAULT NULL,
  `timetable_latecome` int(11) DEFAULT NULL,
  `timetable_early` tinyint(1) DEFAULT NULL,
  `timetable_earlyout` int(11) DEFAULT NULL,
  `countAbsentLateExceed` tinyint(1) DEFAULT NULL,
  `countAbsentLateExceedMins` int(11) DEFAULT NULL,
  `withoutInAsLateAllDay` tinyint(1) DEFAULT NULL,
  `countAbsentEarlyExceed` tinyint(1) DEFAULT NULL,
  `countAbsentEarlyExceedMins` int(11) DEFAULT NULL,
  `withoutOutAsEarlyAllDay` tinyint(1) DEFAULT NULL,
  `enableOT` tinyint(1) DEFAULT NULL,
  `earlyComeAsWork` tinyint(1) DEFAULT NULL,
  `countEarlyComeExceedMins` int(11) DEFAULT NULL,
  `lateOutAsWork` tinyint(1) DEFAULT NULL,
  `countLateOutExceedMins` int(11) DEFAULT NULL,
  `firstInLastOut` tinyint(1) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_timetable`
--

INSERT INTO `att_timetable` (`id`, `timetableType`, `timetable_color`, `timetable_name`, `timetable_start`, `timetable_end`, `timetable_checkin_begin`, `timetable_checkout_end`, `usedForSmartShift`, `timetable_checkin_end`, `timetable_checkout_begin`, `requireWork`, `timetable_late`, `timetable_latecome`, `timetable_early`, `timetable_earlyout`, `countAbsentLateExceed`, `countAbsentLateExceedMins`, `withoutInAsLateAllDay`, `countAbsentEarlyExceed`, `countAbsentEarlyExceedMins`, `withoutOutAsEarlyAllDay`, `enableOT`, `earlyComeAsWork`, `countEarlyComeExceedMins`, `lateOutAsWork`, `countLateOutExceedMins`, `firstInLastOut`, `isDefault`) VALUES
(1, 0, -16744193, 'Default', '1990-01-01 09:00:00', '1990-01-01 18:00:00', '1990-01-01 07:00:00', '1990-01-01 22:00:00', 1, '1990-01-01 22:00:00', '1990-01-01 07:00:00', 1, 0, 5, 0, 5, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `att_timetable_roundrule`
--

CREATE TABLE `att_timetable_roundrule` (
  `id` int(11) NOT NULL,
  `timefrom` datetime NOT NULL,
  `timeto` datetime NOT NULL,
  `roundtime` datetime NOT NULL,
  `timetable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_workcode`
--

CREATE TABLE `att_workcode` (
  `id` int(11) NOT NULL,
  `wc_code` int(11) NOT NULL,
  `wc_name` varchar(255) NOT NULL,
  `middleware_code` varchar(64) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `wc_type` bigint(20) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `hourly_payment` decimal(19,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `att_workstate`
--

CREATE TABLE `att_workstate` (
  `id` int(11) NOT NULL,
  `ws_code` int(11) NOT NULL,
  `ws_alias` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_workstate`
--

INSERT INTO `att_workstate` (`id`, `ws_code`, `ws_alias`) VALUES
(1, 0, 'CheckStatus1'),
(2, 1, 'CheckStatus2'),
(3, 2, 'CheckStatus3'),
(4, 3, 'CheckStatus4'),
(5, 4, 'CheckStatus5'),
(6, 5, 'CheckStatus6'),
(7, 6, 'CheckStatus7');

-- --------------------------------------------------------

--
-- Table structure for table `att_zone`
--

CREATE TABLE `att_zone` (
  `id` int(11) NOT NULL,
  `zone_code` int(11) NOT NULL,
  `clientID` bigint(20) DEFAULT NULL,
  `ZoneName` varchar(64) NOT NULL,
  `zoneID` bigint(20) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `iuser1` int(11) DEFAULT NULL,
  `cuser1` varchar(64) DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `defaultZone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `att_zone`
--

INSERT INTO `att_zone` (`id`, `zone_code`, `clientID`, `ZoneName`, `zoneID`, `description`, `iuser1`, `cuser1`, `IsSelect`, `defaultZone`) VALUES
(1, 1, -1996014937374211145, 'Area1', 1, NULL, 0, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BSN', 'BSN', 'active', '2023-10-11 03:17:52', '2023-10-11 03:17:52'),
(2, 'BSCS', 'BSCS', 'active', '2023-10-20 05:22:37', '2023-10-20 05:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CONCERT', '2023-10-18', 'inactive', '2023-10-18 11:42:06', '2023-10-20 15:57:13'),
(2, 'BASKETBALL', '2023-10-20', 'active', '2023-10-20 06:08:00', '2023-10-20 06:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gate_attendances`
--

CREATE TABLE `gate_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `date_log` varchar(255) NOT NULL,
  `time_log` varchar(255) NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `log_count` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gate_attendances`
--

INSERT INTO `gate_attendances` (`id`, `student_id`, `course`, `event`, `date_log`, `time_log`, `log_type`, `log_count`, `status`, `created_at`, `updated_at`) VALUES
(1, '208', 'BSCS', '1', '2023-10-20', '13:57:06', 'login', '0', 'logged in', '2023-10-20 05:57:45', '2023-10-20 05:57:45'),
(2, '12121', 'BSN', '1', '2023-10-20', '13:57:15', 'login', '0', 'logged in', '2023-10-20 05:57:45', '2023-10-20 05:57:45'),
(3, '222', 'BSN', '1', '2023-10-20', '13:57:17', 'login', '0', 'logged in', '2023-10-20 05:57:46', '2023-10-20 05:57:46'),
(4, '208', 'BSCS', '1', '2023-10-20', '23:38:49', 'logout', '0', 'logged out', '2023-10-20 15:39:15', '2023-10-20 15:39:15'),
(5, '12121', 'BSN', '1', '2023-10-20', '23:38:52', 'logout', '0', 'logged out', '2023-10-20 15:39:21', '2023-10-20 15:39:21'),
(6, '222', 'BSN', '1', '2023-10-20', '23:38:54', 'logout', '0', 'logged out', '2023-10-20 15:39:21', '2023-10-20 15:39:21'),
(7, '208', 'BSCS', '2', '2023-10-20', '23:57:46', 'login', '0', 'logged in', '2023-10-20 15:58:10', '2023-10-20 15:58:10'),
(8, '12121', 'BSN', '2', '2023-10-20', '23:57:51', 'login', '0', 'logged in', '2023-10-20 15:58:16', '2023-10-20 15:58:16'),
(9, '222', 'BSN', '2', '2023-10-20', '23:57:53', 'login', '0', 'logged in', '2023-10-20 15:58:22', '2023-10-20 15:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendancerule`
--

CREATE TABLE `hr_attendancerule` (
  `id` int(11) NOT NULL,
  `smartShiftDisplayColor` int(11) DEFAULT NULL,
  `requirePunchForLeave` tinyint(1) DEFAULT NULL,
  `activeAttStatus` tinyint(1) DEFAULT NULL,
  `minimumTime` int(11) DEFAULT NULL,
  `hourlyDayChangeAt` datetime DEFAULT NULL,
  `hourlyFirstInLastOut` tinyint(1) DEFAULT NULL,
  `hourlyActiveAttStatus` tinyint(1) DEFAULT NULL,
  `hourlyMinimumTime` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_attendancerule`
--

INSERT INTO `hr_attendancerule` (`id`, `smartShiftDisplayColor`, `requirePunchForLeave`, `activeAttStatus`, `minimumTime`, `hourlyDayChangeAt`, `hourlyFirstInLastOut`, `hourlyActiveAttStatus`, `hourlyMinimumTime`, `company_id`) VALUES
(1, 0, 1, 0, 5, '2023-10-10 00:00:00', 1, 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_biotemplate`
--

CREATE TABLE `hr_biotemplate` (
  `id` int(11) NOT NULL,
  `valid_flag` int(11) NOT NULL,
  `is_duress` int(11) NOT NULL,
  `bio_type` int(11) NOT NULL,
  `version` varchar(20) NOT NULL,
  `data_format` int(11) NOT NULL,
  `template_no` int(11) NOT NULL,
  `template_no_index` int(11) NOT NULL,
  `template_data` text DEFAULT NULL,
  `size` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_company`
--

CREATE TABLE `hr_company` (
  `id` int(11) NOT NULL,
  `cmp_code` varchar(10) DEFAULT NULL,
  `cmp_dateformat` varchar(64) DEFAULT NULL,
  `cmp_timeformat` varchar(64) DEFAULT NULL,
  `cmp_name` varchar(64) NOT NULL,
  `cmp_operationmode` int(11) DEFAULT NULL,
  `cmp_address1` text DEFAULT NULL,
  `cmp_address2` text DEFAULT NULL,
  `cmp_city` varchar(64) DEFAULT NULL,
  `cmp_state` varchar(64) DEFAULT NULL,
  `cmp_country` varchar(64) DEFAULT NULL,
  `cmp_postal` varchar(6) DEFAULT NULL,
  `cmp_phone` varchar(13) DEFAULT NULL,
  `cmp_fax` varchar(13) DEFAULT NULL,
  `cmp_email` varchar(64) DEFAULT NULL,
  `cmp_logo` mediumblob DEFAULT NULL,
  `cmp_showlogoInreport` tinyint(1) DEFAULT NULL,
  `cmp_website` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_company`
--

INSERT INTO `hr_company` (`id`, `cmp_code`, `cmp_dateformat`, `cmp_timeformat`, `cmp_name`, `cmp_operationmode`, `cmp_address1`, `cmp_address2`, `cmp_city`, `cmp_state`, `cmp_country`, `cmp_postal`, `cmp_phone`, `cmp_fax`, `cmp_email`, `cmp_logo`, `cmp_showlogoInreport`, `cmp_website`) VALUES
(1, '1', NULL, NULL, 'Company', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_delete_employee`
--

CREATE TABLE `hr_delete_employee` (
  `id` int(11) NOT NULL,
  `emp_pin` varchar(255) NOT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_department`
--

CREATE TABLE `hr_department` (
  `id` int(11) NOT NULL,
  `dept_code` int(11) NOT NULL,
  `dept_name` varchar(64) NOT NULL,
  `dept_parentcode` int(11) NOT NULL,
  `useCode` tinyint(1) DEFAULT NULL,
  `dept_operationmode` int(11) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `defaultDepartment` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_department`
--

INSERT INTO `hr_department` (`id`, `dept_code`, `dept_name`, `dept_parentcode`, `useCode`, `dept_operationmode`, `middleware_id`, `defaultDepartment`, `company_id`) VALUES
(1, 1, 'Department', 0, 1, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee`
--

CREATE TABLE `hr_employee` (
  `id` int(11) NOT NULL,
  `emp_pin` varchar(9) NOT NULL,
  `emp_ssn` varchar(64) DEFAULT NULL,
  `emp_role` varchar(64) DEFAULT NULL,
  `emp_firstname` varchar(64) NOT NULL,
  `emp_lastname` varchar(64) DEFAULT NULL,
  `emp_username` varchar(64) DEFAULT NULL,
  `emp_pwd` varchar(64) DEFAULT NULL,
  `emp_timezone` varchar(64) DEFAULT NULL,
  `emp_phone` varchar(13) DEFAULT NULL,
  `emp_payroll_id` varchar(64) DEFAULT NULL,
  `emp_payroll_type` varchar(64) DEFAULT NULL,
  `emp_pin2` varchar(64) DEFAULT NULL,
  `emp_photo` mediumblob DEFAULT NULL,
  `emp_privilege` varchar(64) DEFAULT NULL,
  `emp_group` varchar(64) DEFAULT NULL,
  `emp_hiredate` datetime DEFAULT NULL,
  `emp_address` varchar(64) DEFAULT NULL,
  `emp_active` int(11) NOT NULL,
  `emp_firedate` datetime DEFAULT NULL,
  `emp_firereason` text DEFAULT NULL,
  `emp_emergencyphone1` varchar(13) DEFAULT NULL,
  `emp_emergencyphone2` varchar(13) DEFAULT NULL,
  `emp_emergencyname` varchar(64) DEFAULT NULL,
  `emp_emergencyaddress` varchar(64) DEFAULT NULL,
  `emp_cardNumber` varchar(24) DEFAULT NULL,
  `emp_country` varchar(64) DEFAULT NULL,
  `emp_city` varchar(64) DEFAULT NULL,
  `emp_state` varchar(64) DEFAULT NULL,
  `emp_postal` varchar(6) DEFAULT NULL,
  `emp_fax` varchar(13) DEFAULT NULL,
  `emp_email` varchar(64) DEFAULT NULL,
  `emp_title` varchar(64) DEFAULT NULL,
  `emp_hourlyrate1` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate2` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate3` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate4` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate5` decimal(19,5) DEFAULT NULL,
  `emp_gender` int(11) DEFAULT NULL,
  `emp_birthday` datetime DEFAULT NULL,
  `emp_operationmode` int(11) DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `nationalID` varchar(64) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_employee`
--

INSERT INTO `hr_employee` (`id`, `emp_pin`, `emp_ssn`, `emp_role`, `emp_firstname`, `emp_lastname`, `emp_username`, `emp_pwd`, `emp_timezone`, `emp_phone`, `emp_payroll_id`, `emp_payroll_type`, `emp_pin2`, `emp_photo`, `emp_privilege`, `emp_group`, `emp_hiredate`, `emp_address`, `emp_active`, `emp_firedate`, `emp_firereason`, `emp_emergencyphone1`, `emp_emergencyphone2`, `emp_emergencyname`, `emp_emergencyaddress`, `emp_cardNumber`, `emp_country`, `emp_city`, `emp_state`, `emp_postal`, `emp_fax`, `emp_email`, `emp_title`, `emp_hourlyrate1`, `emp_hourlyrate2`, `emp_hourlyrate3`, `emp_hourlyrate4`, `emp_hourlyrate5`, `emp_gender`, `emp_birthday`, `emp_operationmode`, `IsSelect`, `middleware_id`, `nationalID`, `department_id`, `position_id`) VALUES
(1, '208', '', '', '208', '208', '', '', '', '', '', '', '', NULL, '0', '', '2023-10-11 00:00:00', '', 1, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, 0, NULL, 0, 0, 0, '', 1, 2),
(2, '1', '', '', '1', '1', '', '', '', '', '', '', '', NULL, '0', '', '2023-10-11 00:00:00', '', 1, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, 0, NULL, 0, 0, 0, '', 1, 2),
(3, '12121', '', '', '12121', '12121', '', '', '', '', '', '', '', NULL, '0', '', '2023-10-11 00:00:00', '', 1, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, 0, NULL, 0, 0, 0, '', 1, 2),
(4, '222', '', '', '222', '222', '', '', '', '', '', '', '', NULL, '0', '', '2023-10-20 00:00:00', '', 1, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, 0, NULL, 0, 0, 0, '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_group`
--

CREATE TABLE `hr_employee_group` (
  `employee_id` int(11) NOT NULL,
  `groupItem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_group`
--

CREATE TABLE `hr_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(64) NOT NULL,
  `employees` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_groupitem`
--

CREATE TABLE `hr_groupitem` (
  `id` int(11) NOT NULL,
  `grp_item_id` int(11) NOT NULL,
  `grp_item_desc` varchar(64) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_holiday_details`
--

CREATE TABLE `hr_holiday_details` (
  `id` int(11) NOT NULL,
  `hor_code` int(11) DEFAULT NULL,
  `hor_name` varchar(255) DEFAULT NULL,
  `HolidaysOTMode` int(11) DEFAULT NULL,
  `HolidaysOTEnabled` tinyint(1) DEFAULT NULL,
  `HolidaysOT1Limit` decimal(19,5) DEFAULT NULL,
  `HolidaysOT2Limit` decimal(19,5) DEFAULT NULL,
  `HolidaysOT3Limit` decimal(19,5) DEFAULT NULL,
  `hor_cycleType` int(11) DEFAULT NULL,
  `hor_days` int(11) DEFAULT NULL,
  `hor_date` datetime DEFAULT NULL,
  `hor_month_cycleYear` int(11) DEFAULT NULL,
  `hor_day_cycleYear` int(11) DEFAULT NULL,
  `hor_month_cycleDate` int(11) DEFAULT NULL,
  `hor_weeks_cycleDate` int(11) DEFAULT NULL,
  `hor_week_cycleDate` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_payclass`
--

CREATE TABLE `hr_payclass` (
  `id` int(11) NOT NULL,
  `WeekDayOTMode` int(11) DEFAULT NULL,
  `SundayOT1Limit` decimal(19,5) DEFAULT NULL,
  `SundayOT2Limit` decimal(19,5) DEFAULT NULL,
  `SundayOT3Limit` decimal(19,5) DEFAULT NULL,
  `MondayOT1Limit` decimal(19,5) DEFAULT NULL,
  `MondayOT2Limit` decimal(19,5) DEFAULT NULL,
  `MondayOT3Limit` decimal(19,5) DEFAULT NULL,
  `TuesdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `TuesdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `TuesdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `WednesdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `WednesdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `WednesdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `ThursdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `ThursdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `ThursdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `FridayOT1Limit` decimal(19,5) DEFAULT NULL,
  `FridayOT2Limit` decimal(19,5) DEFAULT NULL,
  `FridayOT3Limit` decimal(19,5) DEFAULT NULL,
  `SaturdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `SaturdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `SaturdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `WeekendsOTMode` int(11) DEFAULT NULL,
  `WeekendsOTEnabled` tinyint(1) DEFAULT NULL,
  `WeekendsOT1Limit` decimal(19,5) DEFAULT NULL,
  `WeekendsOT2Limit` decimal(19,5) DEFAULT NULL,
  `WeekendsOT3Limit` decimal(19,5) DEFAULT NULL,
  `WeekendSet` varchar(20) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_payclass`
--

INSERT INTO `hr_payclass` (`id`, `WeekDayOTMode`, `SundayOT1Limit`, `SundayOT2Limit`, `SundayOT3Limit`, `MondayOT1Limit`, `MondayOT2Limit`, `MondayOT3Limit`, `TuesdayOT1Limit`, `TuesdayOT2Limit`, `TuesdayOT3Limit`, `WednesdayOT1Limit`, `WednesdayOT2Limit`, `WednesdayOT3Limit`, `ThursdayOT1Limit`, `ThursdayOT2Limit`, `ThursdayOT3Limit`, `FridayOT1Limit`, `FridayOT2Limit`, `FridayOT3Limit`, `SaturdayOT1Limit`, `SaturdayOT2Limit`, `SaturdayOT3Limit`, `WeekendsOTMode`, `WeekendsOTEnabled`, `WeekendsOT1Limit`, `WeekendsOT2Limit`, `WeekendsOT3Limit`, `WeekendSet`, `company_id`) VALUES
(1, 1, 480.00000, 660.00000, 840.00000, 480.00000, 660.00000, 840.00000, 480.00000, 660.00000, 840.00000, 480.00000, 660.00000, 840.00000, 480.00000, 660.00000, 840.00000, 480.00000, 660.00000, 840.00000, 480.00000, 660.00000, 840.00000, 1, 0, 480.00000, 660.00000, 840.00000, '6,0,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_paycode`
--

CREATE TABLE `hr_paycode` (
  `id` int(11) NOT NULL,
  `pc_code` int(11) NOT NULL,
  `pc_desc` varchar(32) DEFAULT NULL,
  `pc_type` int(11) DEFAULT NULL,
  `export_code` varchar(32) DEFAULT NULL,
  `pc_delete` tinyint(1) DEFAULT NULL,
  `sign` varchar(2) DEFAULT NULL,
  `min_value` decimal(19,5) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `round_type` int(11) DEFAULT NULL,
  `deduct` tinyint(1) DEFAULT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `pc_Mode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_paycode`
--

INSERT INTO `hr_paycode` (`id`, `pc_code`, `pc_desc`, `pc_type`, `export_code`, `pc_delete`, `sign`, `min_value`, `unit`, `round_type`, `deduct`, `yearlyLimit`, `pc_Mode`) VALUES
(1, 0, NULL, 0, NULL, 0, NULL, 0.00000, 0, 0, 0, 365.00000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_position`
--

CREATE TABLE `hr_position` (
  `id` int(11) NOT NULL,
  `posi_code` int(11) NOT NULL,
  `posi_name` varchar(64) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `posi_parentcode` int(11) NOT NULL,
  `defaultPosition` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_position`
--

INSERT INTO `hr_position` (`id`, `posi_code`, `posi_name`, `description`, `posi_parentcode`, `defaultPosition`, `company_id`) VALUES
(1, 1, 'Manager', NULL, 0, 1, 1),
(2, 2, 'Staff', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_template`
--

CREATE TABLE `hr_template` (
  `id` int(11) NOT NULL,
  `effective` int(11) NOT NULL,
  `template_type` int(11) DEFAULT NULL,
  `template_len` int(11) DEFAULT NULL,
  `template_str` mediumtext DEFAULT NULL,
  `isForce` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `template_index` int(11) NOT NULL,
  `action_group` int(11) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `pwd_str` varchar(255) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logtypes`
--

CREATE TABLE `logtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logtypes`
--

INSERT INTO `logtypes` (`id`, `log_type`, `created_at`, `updated_at`) VALUES
(1, '0', NULL, '2023-10-20 15:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `middle_message_id` bigint(20) NOT NULL,
  `message_code` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `message_type` int(11) DEFAULT NULL,
  `send_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message2entity`
--

CREATE TABLE `message2entity` (
  `id` int(11) NOT NULL,
  `readed` int(11) NOT NULL,
  `accept_emp_id` int(11) DEFAULT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_zone`
--

CREATE TABLE `message_zone` (
  `zone_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_16_020153_create_roles_table', 1),
(6, '2021_02_16_020246_create_role_user_table', 1),
(7, '2021_05_07_081614_create_students_table', 1),
(8, '2021_05_07_081804_create_school_years_table', 1),
(9, '2021_05_07_082500_create_attendances_table', 1),
(10, '2021_05_08_172936_create_settings_table', 1),
(11, '2023_08_02_214859_create_events_table', 1),
(12, '2023_08_02_230257_create_courses_table', 1),
(13, '2023_08_14_155455_add_gender_column_students_table', 1),
(14, '2023_10_11_102922_create_logtypes_table', 2),
(16, '2023_10_20_133744_create_gate_attendances_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_departmentworkcode`
--

CREATE TABLE `pay_departmentworkcode` (
  `id` int(11) NOT NULL,
  `wc_code` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `hourly_payment` decimal(19,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_empdetail`
--

CREATE TABLE `pay_empdetail` (
  `id` int(11) NOT NULL,
  `payment_type` smallint(6) DEFAULT NULL,
  `bank_name` varchar(60) DEFAULT NULL,
  `bank_account` int(11) DEFAULT NULL,
  `bank_accounts` varchar(60) DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `national_ids` varchar(60) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `agent_ids` varchar(60) DEFAULT NULL,
  `agent_account` int(11) DEFAULT NULL,
  `agent_accounts` varchar(60) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_employeeworkcode`
--

CREATE TABLE `pay_employeeworkcode` (
  `id` int(11) NOT NULL,
  `wc_code` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `hourly_payment` decimal(19,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_formula`
--

CREATE TABLE `pay_formula` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `PaymentType` smallint(6) DEFAULT NULL,
  `Enabled` tinyint(1) DEFAULT NULL,
  `FormulaType` smallint(6) DEFAULT NULL,
  `FormulaExpression` varchar(255) DEFAULT NULL,
  `Remarks` varchar(150) DEFAULT NULL,
  `IsSystem` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_formularesult`
--

CREATE TABLE `pay_formularesult` (
  `Id` int(11) NOT NULL,
  `formulaType` int(11) NOT NULL,
  `formula_id` int(11) DEFAULT NULL,
  `salaryRecord_Id` int(11) DEFAULT NULL,
  `Result` decimal(19,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_loandetail`
--

CREATE TABLE `pay_loandetail` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `hireDate` datetime NOT NULL,
  `loanDate` datetime NOT NULL,
  `loanAmount` decimal(19,5) NOT NULL,
  `interestRate` double NOT NULL,
  `totalAmount` decimal(19,5) NOT NULL,
  `repaymentStart` datetime NOT NULL,
  `repaymentPeriod` int(11) NOT NULL,
  `perPeriod` decimal(19,5) NOT NULL,
  `actualAmount` decimal(19,5) NOT NULL,
  `loanType` int(11) NOT NULL,
  `loanReason` text DEFAULT NULL,
  `approvedBy` text NOT NULL,
  `remark` text DEFAULT NULL,
  `repayType` int(11) NOT NULL,
  `settled` tinyint(1) DEFAULT NULL,
  `settledDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_loanrepayment`
--

CREATE TABLE `pay_loanrepayment` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `PayRecordID` int(11) NOT NULL,
  `TimePeriod` varchar(255) NOT NULL,
  `periodStart` datetime NOT NULL,
  `periodEnd` datetime NOT NULL,
  `amount` decimal(19,5) NOT NULL,
  `repaid` decimal(19,5) NOT NULL,
  `remain` decimal(19,5) NOT NULL,
  `TotalRemain` decimal(19,5) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_reimbursement`
--

CREATE TABLE `pay_reimbursement` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `RDate` datetime NOT NULL,
  `amount` decimal(19,5) NOT NULL,
  `investType` int(11) NOT NULL,
  `typeOther` varchar(255) DEFAULT NULL,
  `approvedBy` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `forCash` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_salaryrecord`
--

CREATE TABLE `pay_salaryrecord` (
  `Id` int(11) NOT NULL,
  `TimePeriod` varchar(255) DEFAULT NULL,
  `DateStart` datetime NOT NULL,
  `DateEnd` datetime NOT NULL,
  `ePin` varchar(9) DEFAULT NULL,
  `BasicSalary` decimal(19,5) NOT NULL,
  `OtherEarnings` longblob DEFAULT NULL,
  `OtherDeductions` longblob DEFAULT NULL,
  `TotalOtherEarnings` decimal(19,5) NOT NULL,
  `TotalOtherDeductions` decimal(19,5) NOT NULL,
  `NetPay` decimal(19,5) NOT NULL,
  `createTime` datetime NOT NULL,
  `ReimbursementTotal` decimal(19,5) DEFAULT NULL,
  `RepaymentTotal` decimal(19,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_salarysetting`
--

CREATE TABLE `pay_salarysetting` (
  `id` int(11) NOT NULL,
  `forDepartment` tinyint(1) DEFAULT NULL,
  `dCode` int(11) DEFAULT NULL,
  `ePin` varchar(9) DEFAULT NULL,
  `salaryMode` smallint(6) NOT NULL,
  `w_StartFrom` smallint(6) NOT NULL,
  `b_StartFrom` smallint(6) NOT NULL,
  `s_StartFrom_First` smallint(6) NOT NULL,
  `s_StartFrom_Second` smallint(6) NOT NULL,
  `m_StartFrom` smallint(6) NOT NULL,
  `salaryDayRoundEnabled` tinyint(1) DEFAULT NULL,
  `salary_day_from1` decimal(19,5) DEFAULT NULL,
  `salary_day_to1` decimal(19,5) DEFAULT NULL,
  `salary_day_as1` decimal(19,5) DEFAULT NULL,
  `salary_day_from2` decimal(19,5) DEFAULT NULL,
  `salary_day_to2` decimal(19,5) DEFAULT NULL,
  `salary_day_as2` decimal(19,5) DEFAULT NULL,
  `salary_day_from3` decimal(19,5) DEFAULT NULL,
  `salary_day_to3` decimal(19,5) DEFAULT NULL,
  `salary_day_as3` decimal(19,5) DEFAULT NULL,
  `salary_day_above` decimal(19,5) DEFAULT NULL,
  `salary_day_as` decimal(19,5) DEFAULT NULL,
  `salaryHourRoundEnabled` tinyint(1) DEFAULT NULL,
  `salary_hour_from1` decimal(19,5) DEFAULT NULL,
  `salary_hour_to1` decimal(19,5) DEFAULT NULL,
  `salary_hour_as1` decimal(19,5) DEFAULT NULL,
  `salary_hour_from2` decimal(19,5) DEFAULT NULL,
  `salary_hour_to2` decimal(19,5) DEFAULT NULL,
  `salary_hour_as2` decimal(19,5) DEFAULT NULL,
  `salary_hour_from3` decimal(19,5) DEFAULT NULL,
  `salary_hour_to3` decimal(19,5) DEFAULT NULL,
  `salary_hour_as3` decimal(19,5) DEFAULT NULL,
  `wageHourRoundEnabled` tinyint(1) DEFAULT NULL,
  `wage_hour_from1` decimal(19,5) DEFAULT NULL,
  `wage_hour_to1` decimal(19,5) DEFAULT NULL,
  `wage_hour_as1` decimal(19,5) DEFAULT NULL,
  `wage_hour_from2` decimal(19,5) DEFAULT NULL,
  `wage_hour_to2` decimal(19,5) DEFAULT NULL,
  `wage_hour_as2` decimal(19,5) DEFAULT NULL,
  `wage_hour_from3` decimal(19,5) DEFAULT NULL,
  `wage_hour_to3` decimal(19,5) DEFAULT NULL,
  `wage_hour_as3` decimal(19,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_salarystructure`
--

CREATE TABLE `pay_salarystructure` (
  `Id` int(11) NOT NULL,
  `forDepartment` tinyint(1) DEFAULT NULL,
  `dCode` int(11) DEFAULT NULL,
  `ePin` varchar(9) DEFAULT NULL,
  `effective_date` datetime NOT NULL,
  `BasicSalary` decimal(19,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_salarystructure_formula`
--

CREATE TABLE `pay_salarystructure_formula` (
  `id` int(11) NOT NULL,
  `Formula_Id` int(11) DEFAULT NULL,
  `SalaryStructure_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pushqueue`
--

CREATE TABLE `pushqueue` (
  `id` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Destination` varchar(32) NOT NULL,
  `cuser1` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reporttemplate`
--

CREATE TABLE `reporttemplate` (
  `ID` int(11) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `Template` longblob DEFAULT NULL,
  `ReportID` varchar(64) NOT NULL,
  `Name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reporttemplate`
--

INSERT INTO `reporttemplate` (`ID`, `Title`, `Template`, `ReportID`, `Name`) VALUES
(1, 'Transactions Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d020000000603000000135472616e73616374696f6e73205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_01', 'AttendanceReport_01'),
(2, 'Daily Total Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d020000000603000000124461696c7920546f74616c205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_02', 'AttendanceReport_02'),
(3, 'TimeCard Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d0200000006030000000f54696d6543617264205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_03', 'AttendanceReport_03'),
(4, 'Total TimeCard Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d02000000060300000015546f74616c2054696d6543617264205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_04', 'AttendanceReport_04'),
(5, 'Early Out Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d020000000603000000104561726c79204f7574205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_05', 'AttendanceReport_05'),
(6, 'Late Come Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d020000000603000000104c61746520436f6d65205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_06', 'AttendanceReport_06'),
(7, 'Absence Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d0200000006030000000e416273656e6365205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_07', 'AttendanceReport_07'),
(8, 'Employee Shift Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d02000000060300000015456d706c6f796565205368696674205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_08', 'AttendanceReport_08'),
(9, 'Exception Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d02000000060300000010457863657074696f6e205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_09', 'AttendanceReport_09'),
(10, 'Hours Summary Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d02000000060300000014486f7572732053756d6d617279205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_10', 'AttendanceReport_10'),
(11, 'TimeCard List Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d0200000006030000001454696d6543617264204c697374205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_11', 'AttendanceReport_11'),
(12, 'Attendance Card Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d02000000060300000016417474656e64616e63652043617264205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_12', 'AttendanceReport_12'),
(13, 'Daily Attendance Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d020000000603000000174461696c7920417474656e64616e6365205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_13', 'AttendanceReport_13'),
(14, 'Monthly Summary Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d020000000603000000164d6f6e74686c792053756d6d617279205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_14', 'AttendanceReport_14'),
(15, 'Flexible Schedule Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000385a4b54696d654e65742e456e7469746965732e5265706f72742e417474656e64616e63655265706f727454656d706c617465456e7469747909000000163c5469746c653e6b5f5f4261636b696e674669656c64193c466f726d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c640101010000000303010101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d02000000060300000018466c657869626c65205363686564756c65205265706f72740a0a0100000a0a0a0b, 'AttendanceReport_15', 'AttendanceReport_15'),
(16, 'Employee Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000365a4b54696d654e65742e456e7469746965732e5265706f72742e456d706c6f7965655265706f727454656d706c617465456e7469747908000000163c5469746c653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c641d3c44697370616c794669656c643e6b5f5f4261636b696e674669656c6401000000030301030101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d9b0153797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b5a4b54696d654e65742e476c6f62616c2e436f72652e53656c6563746564436f6c756d6e496e666f2c205a4b54696d654e65742e476c6f62616c2e436f72652c2056657273696f6e3d332e322e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c5d5d0200000006030000000f456d706c6f796565205265706f72740100000a0a0a0a0b, 'EmployeeReport_01', 'EmployeeReport_01'),
(17, 'Employee Information Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000365a4b54696d654e65742e456e7469746965732e5265706f72742e456d706c6f7965655265706f727454656d706c617465456e7469747908000000163c5469746c653e6b5f5f4261636b696e674669656c64293c53656c656374416c6c456d706c6f796565436865636b65643e6b5f5f4261636b696e674669656c64233c53656c65637447726f7570436865636b65643e6b5f5f4261636b696e674669656c642a3c53656c656374456d706c6f7965654c697374436865636b65643e6b5f5f4261636b696e674669656c64223c53656c656374656447726f75704c6973743e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c641d3c44697370616c794669656c643e6b5f5f4261636b696e674669656c6401000000030301030101017e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7e53797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b53797374656d2e496e7433322c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d9b0153797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b5a4b54696d654e65742e476c6f62616c2e436f72652e53656c6563746564436f6c756d6e496e666f2c205a4b54696d654e65742e476c6f62616c2e436f72652c2056657273696f6e3d332e322e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c5d5d0200000006030000001b456d706c6f79656520496e666f726d6174696f6e205265706f72740100000a0a0a0a0b, 'EmployeeReport_02', 'EmployeeReport_02'),
(18, 'Formula Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000355a4b54696d654e65742e456e7469746965732e5265706f72742e506179726f6c6c5265706f727454656d706c617465456e7469747908000000163c5469746c653e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64193c46726f6d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64153c796561723e6b5f5f4261636b696e674669656c64173c706572696f643e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c641d3c44697370616c794669656c643e6b5f5f4261636b696e674669656c6401030303000001038e0153797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b5a4b54696d654e65742e456e7469746965732e48522e456d706c6f7965652c205a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c5d5d7153797374656d2e4e756c6c61626c6560315b5b53797374656d2e4461746554696d652c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7153797374656d2e4e756c6c61626c6560315b5b53797374656d2e4461746554696d652c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d08089b0153797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b5a4b54696d654e65742e476c6f62616c2e436f72652e53656c6563746564436f6c756d6e496e666f2c205a4b54696d654e65742e476c6f62616c2e436f72652c2056657273696f6e3d332e322e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c5d5d0200000006030000000e466f726d756c61205265706f72740a0a0a00000000000000000a0a0b, 'PayrollReport_01', 'PayrollReport_01'),
(19, 'Pay Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000355a4b54696d654e65742e456e7469746965732e5265706f72742e506179726f6c6c5265706f727454656d706c617465456e7469747908000000163c5469746c653e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64193c46726f6d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64153c796561723e6b5f5f4261636b696e674669656c64173c706572696f643e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c641d3c44697370616c794669656c643e6b5f5f4261636b696e674669656c6401030303000001038e0153797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b5a4b54696d654e65742e456e7469746965732e48522e456d706c6f7965652c205a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c5d5d7153797374656d2e4e756c6c61626c6560315b5b53797374656d2e4461746554696d652c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7153797374656d2e4e756c6c61626c6560315b5b53797374656d2e4461746554696d652c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d08089b0153797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b5a4b54696d654e65742e476c6f62616c2e436f72652e53656c6563746564436f6c756d6e496e666f2c205a4b54696d654e65742e476c6f62616c2e436f72652c2056657273696f6e3d332e322e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c5d5d0200000006030000000a506179205265706f72740a0a0a00000000000000000a0a0b, 'PayrollReport_02', 'PayrollReport_02'),
(20, 'Custom Fields Report', 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0501000000345a4b54696d654e65742e456e7469746965732e5265706f72742e437573746f6d5265706f727454656d706c617465456e7469747905000000163c5469746c653e6b5f5f4261636b696e674669656c64263c53656c6563746564456d706c6f796565734c6973743e6b5f5f4261636b696e674669656c64193c46726f6d446174653e6b5f5f4261636b696e674669656c64173c546f446174653e6b5f5f4261636b696e674669656c64183c4f7264657242793e6b5f5f4261636b696e674669656c6401030303018e0153797374656d2e436f6c6c656374696f6e732e47656e657269632e4c69737460315b5b5a4b54696d654e65742e456e7469746965732e48522e456d706c6f7965652c205a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c5d5d7153797374656d2e4e756c6c61626c6560315b5b53797374656d2e4461746554696d652c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d7153797374656d2e4e756c6c61626c6560315b5b53797374656d2e4461746554696d652c206d73636f726c69622c2056657273696f6e3d342e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d623737613563353631393334653038395d5d02000000060300000014437573746f6d204669656c6473205265706f72740a0a0a0a0b, 'CustomReport_01', 'CustomReport_01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-10-11 03:14:23', '2023-10-11 03:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-10-11 03:14:24', '2023-10-11 03:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `rpt_reportentity`
--

CREATE TABLE `rpt_reportentity` (
  `id` int(11) NOT NULL,
  `reportType` int(11) NOT NULL,
  `reportName` varchar(64) NOT NULL,
  `DType` int(11) NOT NULL,
  `DateFrom` datetime NOT NULL,
  `DateTo` datetime NOT NULL,
  `ColHeaderHeight` double DEFAULT NULL,
  `RowHeight` double DEFAULT NULL,
  `paperKind` int(11) NOT NULL,
  `Landscape` tinyint(1) NOT NULL,
  `FontName` varchar(64) DEFAULT NULL,
  `FontSize` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rpt_reportfield`
--

CREATE TABLE `rpt_reportfield` (
  `id` int(11) NOT NULL,
  `fieldKey` varchar(64) NOT NULL,
  `Sort` int(11) NOT NULL,
  `Checked` tinyint(1) NOT NULL,
  `columnWidth` double NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cy` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `id_number`, `first_name`, `last_name`, `middle_name`, `contact_number`, `address`, `course`, `status`, `created_at`, `updated_at`, `gender`) VALUES
(1, '3', '12121', 'SDADS', 'DSADS', 'DSADS', 'sadas', 'sdads', 'BSN', 'active', '2023-10-11 03:18:08', '2023-10-11 03:18:09', 'MALE'),
(2, '4', '222', 'DSAS', 'SDASDA', 'SDADAS', '23222', '12111', 'BSN', 'active', '2023-10-20 05:22:21', '2023-10-20 05:22:21', 'MALE'),
(3, '5', '333', 'FW', 'SSX', 'FS', '2322', '11221', 'BSCS', 'active', '2023-10-20 05:22:54', '2023-10-20 05:22:54', 'FEMALE'),
(4, '6', '1', 'GGG', 'GFGFF', 'DDFDFG', 'hjhj', 'klkjkjk', 'BSCS', 'active', '2023-10-20 05:24:23', '2023-10-20 05:24:23', 'FEMALE'),
(5, '7', '208', 'FGHFGHFH', 'GHFHJGFGH', 'GHFGHFGHF', 'ghhjghj', 'qhjghjg', 'BSCS', 'active', '2023-10-20 05:24:45', '2023-10-20 05:24:45', 'FEMALE');

-- --------------------------------------------------------

--
-- Table structure for table `sys_config`
--

CREATE TABLE `sys_config` (
  `ID` int(11) NOT NULL,
  `ConfigType` smallint(6) NOT NULL,
  `Data` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_config`
--

INSERT INTO `sys_config` (`ID`, `ConfigType`, `Data`) VALUES
(1, 4, 0x0001000000ffffffff01000000000000000c02000000495a4b54696d654e65742e456e7469746965732c2056657273696f6e3d332e302e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c0c030000004c5a4b54696d654e65742e476c6f62616c2e436f72652c2056657273696f6e3d332e322e302e302c2043756c747572653d6e65757472616c2c205075626c69634b6579546f6b656e3d6e756c6c05010000002c5a4b54696d654e65742e456e7469746965732e53797374656d2e53797374656d4f7074696f6e456e74697479040000001e3c64656c65746570756e636865733e6b5f5f4261636b696e674669656c641b3c64617465666f726d61743e6b5f5f4261636b696e674669656c641b3c74696d65666f726d61743e6b5f5f4261636b696e674669656c641d3c63616c656e646172747970653e6b5f5f4261636b696e674669656c640001010401225a4b54696d654e65742e476c6f62616c2e436f72652e43616c656e6461725479706503000000020000000006040000000a4d4d2f64642f7979797906050000000548483a6d6d05faffffff225a4b54696d654e65742e476c6f62616c2e436f72652e43616c656e64617254797065010000000776616c75655f5f000803000000000000000b);

-- --------------------------------------------------------

--
-- Table structure for table `sys_datafilter`
--

CREATE TABLE `sys_datafilter` (
  `id` int(11) NOT NULL,
  `datafilter_desc` varchar(64) NOT NULL,
  `data_ranger` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_datafilter`
--

INSERT INTO `sys_datafilter` (`id`, `datafilter_desc`, `data_ranger`) VALUES
(1, 'cmp', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `sys_log`
--

CREATE TABLE `sys_log` (
  `id` int(11) NOT NULL,
  `TableName` varchar(50) DEFAULT NULL,
  `OperateType` varchar(50) DEFAULT NULL,
  `Operator` varchar(50) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_log`
--

INSERT INTO `sys_log` (`id`, `TableName`, `OperateType`, `Operator`, `log_date`, `message`) VALUES
(1, '', 'Login', 'admin', '2023-10-10 22:00:27', 'Login System'),
(2, '', 'ChangeDatabase', 'admin', '2023-10-10 22:00:44', 'ChangeDatabase'),
(3, '', 'Login', 'admin', '2023-10-10 22:15:55', 'Login System'),
(4, '', 'Login', 'admin', '2023-10-11 10:17:32', 'Login System'),
(5, '', '', 'admin', '2023-10-11 10:19:13', 'Connect Device '),
(6, 'Terminal', 'Create', 'admin', '2023-10-11 10:19:23', 'Add a Terminal(home)'),
(7, '', 'Login', 'admin', '2023-10-16 17:22:06', 'Login System'),
(8, '', 'Login', 'admin', '2023-10-18 19:27:57', 'Login System'),
(9, '', '', 'admin', '2023-10-18 19:28:21', 'Connect Device '),
(10, '', 'Login', 'admin', '2023-10-20 13:31:53', 'Login System'),
(11, '', '', 'admin', '2023-10-20 13:32:06', 'Connect Device ');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE `sys_menu` (
  `id` int(11) NOT NULL,
  `MenuFlag` varchar(50) NOT NULL,
  `MenuNo` varchar(50) NOT NULL,
  `ParentNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `MenuFlag`, `MenuNo`, `ParentNo`) VALUES
(1, 'Config', '050505', '0505'),
(2, 'EmailSet', '050510', '0505'),
(3, 'Role', '050515', '0505'),
(4, 'User', '050520', '0505'),
(5, 'OperatorLog', '050525', '0505'),
(6, 'Database', '050530', '0505'),
(7, 'Companies', '051005', '0510'),
(8, 'Employees', '051010', '0510'),
(9, 'Departments', '051015', '0510'),
(10, 'Position', '051020', '0510'),
(11, 'Rules', '051505', '0515'),
(12, 'DayType', '051510', '0515'),
(13, 'PayCode', '051515', '0515'),
(14, 'Timetable', '051520', '0515'),
(15, 'Shifts', '051525', '0515'),
(16, 'Schedule', '051530', '0515'),
(17, 'TemporarySchedule', '051535', '0515'),
(18, 'ExceptionAssign', '051540', '0515'),
(19, 'DeviceManagement', '052005', '0520'),
(20, 'TerminalGroup', '052010', '0520'),
(21, 'DataSync', '052015', '0520'),
(22, 'ImportExport', '052020', '0520'),
(23, 'workcode', '052025', '0520'),
(24, 'Message', '052030', '0520'),
(25, 'ACTimezone', '052505', '0525'),
(26, 'ACGroup', '052510', '0525'),
(27, 'ACUnlockComb', '052515', '0525'),
(28, 'UserACPrivilege', '052520', '0525'),
(29, 'UploadACPrivilege', '052525', '0525'),
(30, 'PayrollSettings', '052705', '0527'),
(31, 'PayDetail', '052710', '0527'),
(32, 'PayFormula', '052715', '0527'),
(33, 'PaySalaryStructure', '052720', '0527'),
(34, 'ReimbursementDetail', '052725', '0527'),
(35, 'LoanDetail', '052730', '0527'),
(36, 'SalaryAdvance', '052735', '0527'),
(37, 'PayrollRecords', '052740', '0527'),
(38, 'PayrollReport', '052745', '0527'),
(39, 'Punches', '053005', '0530'),
(40, 'Calculate', '053010', '0530'),
(41, 'AttReport', '053015', '0530');

-- --------------------------------------------------------

--
-- Table structure for table `sys_privilege`
--

CREATE TABLE `sys_privilege` (
  `id` int(11) NOT NULL,
  `privilege_name` varchar(64) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_privilege`
--

INSERT INTO `sys_privilege` (`id`, `privilege_name`, `menu_id`) VALUES
(1, 'Select', 1),
(2, 'Update', 1),
(3, 'Select', 2),
(4, 'Update', 2),
(5, 'Select', 3),
(6, 'Update', 3),
(7, 'Delete', 3),
(8, 'Select', 4),
(9, 'Update', 4),
(10, 'Delete', 4),
(11, 'Select', 5),
(12, 'Delete', 5),
(13, 'Export', 5),
(14, 'Select', 6),
(15, 'InitialDB', 6),
(16, 'BackupDB', 6),
(17, 'RestoreDB', 6),
(18, 'ChangeDB', 6),
(19, 'Select', 7),
(20, 'Update', 7),
(21, 'Select', 8),
(22, 'Update', 8),
(23, 'Delete', 8),
(24, 'Import', 8),
(25, 'Export', 8),
(26, 'BatchUpdate', 8),
(27, 'Select', 9),
(28, 'Update', 9),
(29, 'Delete', 9),
(30, 'Select', 10),
(31, 'Update', 10),
(32, 'Delete', 10),
(33, 'Select', 11),
(34, 'Update', 11),
(35, 'Select', 12),
(36, 'Update', 12),
(37, 'Select', 13),
(38, 'Update', 13),
(39, 'Delete', 13),
(40, 'Assign', 13),
(41, 'Select', 14),
(42, 'Update', 14),
(43, 'Delete', 14),
(44, 'Select', 15),
(45, 'Update', 15),
(46, 'Delete', 15),
(47, 'Select', 16),
(48, 'Update', 16),
(49, 'Select', 17),
(50, 'Update', 17),
(51, 'Select', 18),
(52, 'Update', 18),
(53, 'Delete', 18),
(54, 'Select', 19),
(55, 'Update', 19),
(56, 'Delete', 19),
(57, 'DownloadPunches', 19),
(58, 'SearchTerminal', 19),
(59, 'DownloadPhotos', 19),
(60, 'Select', 20),
(61, 'Update', 20),
(62, 'Delete', 20),
(63, 'AssignEmployee', 20),
(64, 'Select', 21),
(65, 'DataSync', 21),
(66, 'Select', 22),
(67, 'Select', 23),
(68, 'Update', 23),
(69, 'Delete', 23),
(70, 'Select', 24),
(71, 'Update', 24),
(72, 'Delete', 24),
(73, 'Select', 25),
(74, 'Update', 25),
(75, 'Delete', 25),
(76, 'Select', 26),
(77, 'Update', 26),
(78, 'Delete', 26),
(79, 'Select', 27),
(80, 'Update', 27),
(81, 'Select', 28),
(82, 'Update', 28),
(83, 'Delete', 28),
(84, 'Select', 29),
(85, 'Assign2Device', 29),
(86, 'Select', 30),
(87, 'Update', 30),
(88, 'Select', 31),
(89, 'Update', 31),
(90, 'Select', 32),
(91, 'Update', 32),
(92, 'Delete', 32),
(93, 'Select', 33),
(94, 'Update', 33),
(95, 'Delete', 33),
(96, 'Select', 34),
(97, 'Update', 34),
(98, 'Delete', 34),
(99, 'Select', 35),
(100, 'Update', 35),
(101, 'Delete', 35),
(102, 'Select', 36),
(103, 'Update', 36),
(104, 'Delete', 36),
(105, 'Select', 37),
(106, 'Update', 37),
(107, 'Delete', 37),
(108, 'PayCalculate', 37),
(109, 'Select', 38),
(110, 'Select', 39),
(111, 'Update', 39),
(112, 'Delete', 39),
(113, 'Import', 39),
(114, 'Export', 39),
(115, 'Select', 40),
(116, 'Update', 40),
(117, 'Select', 41),
(118, 'Update', 41),
(119, 'Delete', 41),
(120, 'View', 41);

-- --------------------------------------------------------

--
-- Table structure for table `sys_role`
--

CREATE TABLE `sys_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(64) NOT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `role_type` int(11) DEFAULT NULL,
  `defaultRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_role`
--

INSERT INTO `sys_role` (`id`, `role_name`, `remark`, `role_type`, `defaultRole`) VALUES
(1, 'Administrator', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_role_datafilter`
--

CREATE TABLE `sys_role_datafilter` (
  `role_df_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_role_datafilter`
--

INSERT INTO `sys_role_datafilter` (`role_df_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_role_rights`
--

CREATE TABLE `sys_role_rights` (
  `role_pri_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_role_rights`
--

INSERT INTO `sys_role_rights` (`role_pri_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `user_pwd` varchar(32) DEFAULT NULL,
  `user_email` varchar(64) NOT NULL,
  `remark` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`id`, `username`, `user_pwd`, `user_email`, `remark`) VALUES
(1, '48558BDE88AEAC17', '135D65CAE9F2DC19', 'gege@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_role`
--

CREATE TABLE `sys_user_role` (
  `role_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_user_role`
--

INSERT INTO `sys_user_role` (`role_id`, `userid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `api_token` varchar(60) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `status`, `usertype`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@lssti.com', 'admin', NULL, '$2y$10$sT1jP2GEpIE2taBagev5yemLxqslJslwoEWzBmtC.BjsOiGFGF69G', 'active', 'admin', NULL, NULL, '2023-10-11 03:14:24', '2023-10-11 03:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `workcode_zone`
--

CREATE TABLE `workcode_zone` (
  `zone_id` int(11) NOT NULL,
  `workcode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zkproto_control_queue`
--

CREATE TABLE `zkproto_control_queue` (
  `id` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `replace_zoneId` bigint(20) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `sendout_time` datetime DEFAULT NULL,
  `return_time` datetime DEFAULT NULL,
  `return_flag` int(11) DEFAULT NULL,
  `language_str` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zkproto_sync_queue`
--

CREATE TABLE `zkproto_sync_queue` (
  `id` int(11) NOT NULL,
  `op_id` bigint(20) NOT NULL,
  `action` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `pressedtime` bigint(20) NOT NULL,
  `zone_clientID` bigint(20) DEFAULT NULL,
  `sendout_time` datetime DEFAULT NULL,
  `return_time` datetime DEFAULT NULL,
  `return_flag` int(11) DEFAULT NULL,
  `language_str` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_group`
--
ALTER TABLE `ac_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acgroup_id` (`acgroup_id`,`terminal_id`),
  ADD KEY `timezone1` (`timezone1`),
  ADD KEY `timezone2` (`timezone2`),
  ADD KEY `timezone3` (`timezone3`),
  ADD KEY `terminal_id` (`terminal_id`);

--
-- Indexes for table `ac_holidaysetting`
--
ALTER TABLE `ac_holidaysetting`
  ADD PRIMARY KEY (`holiday_id`),
  ADD KEY `acTimezoneId` (`acTimezoneId`);

--
-- Indexes for table `ac_timezone`
--
ALTER TABLE `ac_timezone`
  ADD PRIMARY KEY (`timezone_id`);

--
-- Indexes for table `ac_unlockcomb`
--
ALTER TABLE `ac_unlockcomb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unlockComb_id` (`unlockComb_id`,`terminal_id`),
  ADD KEY `acgroup1` (`acgroup1`),
  ADD KEY `acgroup2` (`acgroup2`),
  ADD KEY `acgroup3` (`acgroup3`),
  ADD KEY `acgroup4` (`acgroup4`),
  ADD KEY `acgroup5` (`acgroup5`),
  ADD KEY `terminal_id` (`terminal_id`);

--
-- Indexes for table `ac_userprivilege`
--
ALTER TABLE `ac_userprivilege`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`,`terminal_id`),
  ADD KEY `employee_id_2` (`employee_id`),
  ADD KEY `terminal_id` (`terminal_id`),
  ADD KEY `timezone1` (`timezone1`),
  ADD KEY `timezone2` (`timezone2`),
  ADD KEY `timezone3` (`timezone3`),
  ADD KEY `acgroup_id` (`acgroup_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_break`
--
ALTER TABLE `att_break`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_break_details`
--
ALTER TABLE `att_break_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ddetail_id` (`ddetail_id`);

--
-- Indexes for table `att_break_timetable`
--
ALTER TABLE `att_break_timetable`
  ADD KEY `timetable_id` (`timetable_id`),
  ADD KEY `break_id` (`break_id`);

--
-- Indexes for table `att_daytype`
--
ALTER TABLE `att_daytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_day_details`
--
ALTER TABLE `att_day_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workcode_id` (`workcode_id`);

--
-- Indexes for table `att_day_summary`
--
ALTER TABLE `att_day_summary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dt_id` (`dt_id`);

--
-- Indexes for table `att_departmentleavetype`
--
ALTER TABLE `att_departmentleavetype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `att_department_shift`
--
ALTER TABLE `att_department_shift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `att_department_smartshift`
--
ALTER TABLE `att_department_smartshift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `att_employeeleavetype`
--
ALTER TABLE `att_employeeleavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_employee_shift`
--
ALTER TABLE `att_employee_shift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `att_employee_smartshift`
--
ALTER TABLE `att_employee_smartshift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `att_employee_temp_shift`
--
ALTER TABLE `att_employee_temp_shift`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schDate` (`schDate`,`employee_id`,`timetable_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `timetable_id` (`timetable_id`);

--
-- Indexes for table `att_employee_zone`
--
ALTER TABLE `att_employee_zone`
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `att_exceptionassign`
--
ALTER TABLE `att_exceptionassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_flexibletimetable`
--
ALTER TABLE `att_flexibletimetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timetable_id` (`timetable_id`);

--
-- Indexes for table `att_punches`
--
ALTER TABLE `att_punches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `terminal_id` (`terminal_id`);

--
-- Indexes for table `att_shift`
--
ALTER TABLE `att_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_shift_details`
--
ALTER TABLE `att_shift_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `att_statisticitem`
--
ALTER TABLE `att_statisticitem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_code` (`item_code`);

--
-- Indexes for table `att_terminal`
--
ALTER TABLE `att_terminal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_terminal_events`
--
ALTER TABLE `att_terminal_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terminal_id` (`terminal_id`);

--
-- Indexes for table `att_terminal_zone`
--
ALTER TABLE `att_terminal_zone`
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `terminal_id` (`terminal_id`);

--
-- Indexes for table `att_timetable`
--
ALTER TABLE `att_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_timetable_roundrule`
--
ALTER TABLE `att_timetable_roundrule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timetable_id` (`timetable_id`);

--
-- Indexes for table `att_workcode`
--
ALTER TABLE `att_workcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_workstate`
--
ALTER TABLE `att_workstate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_zone`
--
ALTER TABLE `att_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gate_attendances`
--
ALTER TABLE `gate_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_attendancerule`
--
ALTER TABLE `hr_attendancerule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `hr_biotemplate`
--
ALTER TABLE `hr_biotemplate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr_company`
--
ALTER TABLE `hr_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_delete_employee`
--
ALTER TABLE `hr_delete_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_department`
--
ALTER TABLE `hr_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `hr_employee`
--
ALTER TABLE `hr_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_employee_group`
--
ALTER TABLE `hr_employee_group`
  ADD KEY `groupItem_id` (`groupItem_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr_group`
--
ALTER TABLE `hr_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_groupitem`
--
ALTER TABLE `hr_groupitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `hr_holiday_details`
--
ALTER TABLE `hr_holiday_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `hr_payclass`
--
ALTER TABLE `hr_payclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `hr_paycode`
--
ALTER TABLE `hr_paycode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_position`
--
ALTER TABLE `hr_position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `hr_template`
--
ALTER TABLE `hr_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `logtypes`
--
ALTER TABLE `logtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `send_emp_id` (`send_emp_id`);

--
-- Indexes for table `message2entity`
--
ALTER TABLE `message2entity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accept_emp_id` (`accept_emp_id`,`message_id`),
  ADD KEY `accept_emp_id_2` (`accept_emp_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `message_zone`
--
ALTER TABLE `message_zone`
  ADD KEY `message_id` (`message_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pay_departmentworkcode`
--
ALTER TABLE `pay_departmentworkcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_empdetail`
--
ALTER TABLE `pay_empdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_employeeworkcode`
--
ALTER TABLE `pay_employeeworkcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_formula`
--
ALTER TABLE `pay_formula`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pay_formularesult`
--
ALTER TABLE `pay_formularesult`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `salaryRecord_Id` (`salaryRecord_Id`);

--
-- Indexes for table `pay_loandetail`
--
ALTER TABLE `pay_loandetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_loanrepayment`
--
ALTER TABLE `pay_loanrepayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_reimbursement`
--
ALTER TABLE `pay_reimbursement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_salaryrecord`
--
ALTER TABLE `pay_salaryrecord`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pay_salarysetting`
--
ALTER TABLE `pay_salarysetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_salarystructure`
--
ALTER TABLE `pay_salarystructure`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pay_salarystructure_formula`
--
ALTER TABLE `pay_salarystructure_formula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SalaryStructure_Id` (`SalaryStructure_Id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pushqueue`
--
ALTER TABLE `pushqueue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporttemplate`
--
ALTER TABLE `reporttemplate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rpt_reportentity`
--
ALTER TABLE `rpt_reportentity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rpt_reportfield`
--
ALTER TABLE `rpt_reportfield`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_id` (`report_id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_config`
--
ALTER TABLE `sys_config`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ConfigType` (`ConfigType`);

--
-- Indexes for table `sys_datafilter`
--
ALTER TABLE `sys_datafilter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_log`
--
ALTER TABLE `sys_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_privilege`
--
ALTER TABLE `sys_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `sys_role`
--
ALTER TABLE `sys_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_role_datafilter`
--
ALTER TABLE `sys_role_datafilter`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_df_id` (`role_df_id`);

--
-- Indexes for table `sys_role_rights`
--
ALTER TABLE `sys_role_rights`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_pri_id` (`role_pri_id`);

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_user_role`
--
ALTER TABLE `sys_user_role`
  ADD KEY `userid` (`userid`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `workcode_zone`
--
ALTER TABLE `workcode_zone`
  ADD KEY `workcode_id` (`workcode_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `zkproto_control_queue`
--
ALTER TABLE `zkproto_control_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zkproto_sync_queue`
--
ALTER TABLE `zkproto_sync_queue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_group`
--
ALTER TABLE `ac_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ac_unlockcomb`
--
ALTER TABLE `ac_unlockcomb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ac_userprivilege`
--
ALTER TABLE `ac_userprivilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_break`
--
ALTER TABLE `att_break`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_break_details`
--
ALTER TABLE `att_break_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_daytype`
--
ALTER TABLE `att_daytype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `att_day_details`
--
ALTER TABLE `att_day_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_day_summary`
--
ALTER TABLE `att_day_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_departmentleavetype`
--
ALTER TABLE `att_departmentleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_department_shift`
--
ALTER TABLE `att_department_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `att_department_smartshift`
--
ALTER TABLE `att_department_smartshift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_employeeleavetype`
--
ALTER TABLE `att_employeeleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_employee_shift`
--
ALTER TABLE `att_employee_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_employee_smartshift`
--
ALTER TABLE `att_employee_smartshift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_employee_temp_shift`
--
ALTER TABLE `att_employee_temp_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_exceptionassign`
--
ALTER TABLE `att_exceptionassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_flexibletimetable`
--
ALTER TABLE `att_flexibletimetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_punches`
--
ALTER TABLE `att_punches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `att_shift`
--
ALTER TABLE `att_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `att_shift_details`
--
ALTER TABLE `att_shift_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `att_statisticitem`
--
ALTER TABLE `att_statisticitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `att_terminal`
--
ALTER TABLE `att_terminal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `att_terminal_events`
--
ALTER TABLE `att_terminal_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `att_timetable`
--
ALTER TABLE `att_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `att_timetable_roundrule`
--
ALTER TABLE `att_timetable_roundrule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_workcode`
--
ALTER TABLE `att_workcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `att_workstate`
--
ALTER TABLE `att_workstate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `att_zone`
--
ALTER TABLE `att_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gate_attendances`
--
ALTER TABLE `gate_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hr_attendancerule`
--
ALTER TABLE `hr_attendancerule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_biotemplate`
--
ALTER TABLE `hr_biotemplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_company`
--
ALTER TABLE `hr_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_delete_employee`
--
ALTER TABLE `hr_delete_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_department`
--
ALTER TABLE `hr_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_employee`
--
ALTER TABLE `hr_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hr_group`
--
ALTER TABLE `hr_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_groupitem`
--
ALTER TABLE `hr_groupitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_holiday_details`
--
ALTER TABLE `hr_holiday_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_payclass`
--
ALTER TABLE `hr_payclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_paycode`
--
ALTER TABLE `hr_paycode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_position`
--
ALTER TABLE `hr_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hr_template`
--
ALTER TABLE `hr_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logtypes`
--
ALTER TABLE `logtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message2entity`
--
ALTER TABLE `message2entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pay_departmentworkcode`
--
ALTER TABLE `pay_departmentworkcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_empdetail`
--
ALTER TABLE `pay_empdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_employeeworkcode`
--
ALTER TABLE `pay_employeeworkcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_formula`
--
ALTER TABLE `pay_formula`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_formularesult`
--
ALTER TABLE `pay_formularesult`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_loandetail`
--
ALTER TABLE `pay_loandetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_loanrepayment`
--
ALTER TABLE `pay_loanrepayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_reimbursement`
--
ALTER TABLE `pay_reimbursement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_salaryrecord`
--
ALTER TABLE `pay_salaryrecord`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_salarysetting`
--
ALTER TABLE `pay_salarysetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_salarystructure`
--
ALTER TABLE `pay_salarystructure`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_salarystructure_formula`
--
ALTER TABLE `pay_salarystructure_formula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pushqueue`
--
ALTER TABLE `pushqueue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reporttemplate`
--
ALTER TABLE `reporttemplate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rpt_reportentity`
--
ALTER TABLE `rpt_reportentity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rpt_reportfield`
--
ALTER TABLE `rpt_reportfield`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sys_config`
--
ALTER TABLE `sys_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_datafilter`
--
ALTER TABLE `sys_datafilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_log`
--
ALTER TABLE `sys_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sys_privilege`
--
ALTER TABLE `sys_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `sys_role`
--
ALTER TABLE `sys_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zkproto_control_queue`
--
ALTER TABLE `zkproto_control_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zkproto_sync_queue`
--
ALTER TABLE `zkproto_sync_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_group`
--
ALTER TABLE `ac_group`
  ADD CONSTRAINT `FK_GroupTerminal` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`),
  ADD CONSTRAINT `FK_GroupTimezone1` FOREIGN KEY (`timezone1`) REFERENCES `ac_timezone` (`timezone_id`),
  ADD CONSTRAINT `FK_GroupTimezone2` FOREIGN KEY (`timezone2`) REFERENCES `ac_timezone` (`timezone_id`),
  ADD CONSTRAINT `FK_GroupTimezone3` FOREIGN KEY (`timezone3`) REFERENCES `ac_timezone` (`timezone_id`);

--
-- Constraints for table `ac_holidaysetting`
--
ALTER TABLE `ac_holidaysetting`
  ADD CONSTRAINT `FK_HolidayTimezone` FOREIGN KEY (`acTimezoneId`) REFERENCES `ac_timezone` (`timezone_id`);

--
-- Constraints for table `ac_unlockcomb`
--
ALTER TABLE `ac_unlockcomb`
  ADD CONSTRAINT `FK_UnlockCombGroup1` FOREIGN KEY (`acgroup1`) REFERENCES `ac_group` (`id`),
  ADD CONSTRAINT `FK_UnlockCombGroup2` FOREIGN KEY (`acgroup2`) REFERENCES `ac_group` (`id`),
  ADD CONSTRAINT `FK_UnlockCombGroup3` FOREIGN KEY (`acgroup3`) REFERENCES `ac_group` (`id`),
  ADD CONSTRAINT `FK_UnlockCombGroup4` FOREIGN KEY (`acgroup4`) REFERENCES `ac_group` (`id`),
  ADD CONSTRAINT `FK_UnlockCombGroup5` FOREIGN KEY (`acgroup5`) REFERENCES `ac_group` (`id`),
  ADD CONSTRAINT `FK_UnlockCombTerminal` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`);

--
-- Constraints for table `ac_userprivilege`
--
ALTER TABLE `ac_userprivilege`
  ADD CONSTRAINT `FK_PrivilegeEmployee` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  ADD CONSTRAINT `FK_PrivilegeGroup` FOREIGN KEY (`acgroup_id`) REFERENCES `ac_group` (`id`),
  ADD CONSTRAINT `FK_PrivilegeTerminal` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`),
  ADD CONSTRAINT `FK_PrivilegeTimezone1` FOREIGN KEY (`timezone1`) REFERENCES `ac_timezone` (`timezone_id`),
  ADD CONSTRAINT `FK_PrivilegeTimezone2` FOREIGN KEY (`timezone2`) REFERENCES `ac_timezone` (`timezone_id`),
  ADD CONSTRAINT `FK_PrivilegeTimezone3` FOREIGN KEY (`timezone3`) REFERENCES `ac_timezone` (`timezone_id`);

--
-- Constraints for table `att_break_details`
--
ALTER TABLE `att_break_details`
  ADD CONSTRAINT `FK_DayBreakDetail` FOREIGN KEY (`ddetail_id`) REFERENCES `att_day_details` (`id`);

--
-- Constraints for table `att_break_timetable`
--
ALTER TABLE `att_break_timetable`
  ADD CONSTRAINT `FK_BreakTimetable` FOREIGN KEY (`break_id`) REFERENCES `att_break` (`id`),
  ADD CONSTRAINT `FK_TimetableBreak` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`);

--
-- Constraints for table `att_day_details`
--
ALTER TABLE `att_day_details`
  ADD CONSTRAINT `FK5750ACFDB793422` FOREIGN KEY (`workcode_id`) REFERENCES `att_workcode` (`id`);

--
-- Constraints for table `att_day_summary`
--
ALTER TABLE `att_day_summary`
  ADD CONSTRAINT `FKF0203FAD7E0E749D` FOREIGN KEY (`dt_id`) REFERENCES `att_daytype` (`id`);

--
-- Constraints for table `att_departmentleavetype`
--
ALTER TABLE `att_departmentleavetype`
  ADD CONSTRAINT `FKD5CD312CDB5DF20` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`id`);

--
-- Constraints for table `att_department_shift`
--
ALTER TABLE `att_department_shift`
  ADD CONSTRAINT `FKF4135670114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`),
  ADD CONSTRAINT `FKF4135670CDB5DF20` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`id`);

--
-- Constraints for table `att_department_smartshift`
--
ALTER TABLE `att_department_smartshift`
  ADD CONSTRAINT `FK7F8948B6CDB5DF20` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`id`);

--
-- Constraints for table `att_employee_shift`
--
ALTER TABLE `att_employee_shift`
  ADD CONSTRAINT `FK416E74B1114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`);

--
-- Constraints for table `att_employee_smartshift`
--
ALTER TABLE `att_employee_smartshift`
  ADD CONSTRAINT `FKD343B318114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`);

--
-- Constraints for table `att_employee_temp_shift`
--
ALTER TABLE `att_employee_temp_shift`
  ADD CONSTRAINT `FKF1AE72E11A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`),
  ADD CONSTRAINT `FKF1AE72E50F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`);

--
-- Constraints for table `att_employee_zone`
--
ALTER TABLE `att_employee_zone`
  ADD CONSTRAINT `FK_EmployeeZone` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  ADD CONSTRAINT `FK_ZoneEmployee` FOREIGN KEY (`zone_id`) REFERENCES `att_zone` (`id`);

--
-- Constraints for table `att_flexibletimetable`
--
ALTER TABLE `att_flexibletimetable`
  ADD CONSTRAINT `FK27B969F611A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`);

--
-- Constraints for table `att_punches`
--
ALTER TABLE `att_punches`
  ADD CONSTRAINT `FK63030A9050F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  ADD CONSTRAINT `FK63030A9060342464` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`);

--
-- Constraints for table `att_shift_details`
--
ALTER TABLE `att_shift_details`
  ADD CONSTRAINT `FK78355A14114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`);

--
-- Constraints for table `att_terminal_events`
--
ALTER TABLE `att_terminal_events`
  ADD CONSTRAINT `FKA0FC950260342464` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`);

--
-- Constraints for table `att_terminal_zone`
--
ALTER TABLE `att_terminal_zone`
  ADD CONSTRAINT `FK_TerminalZone` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`),
  ADD CONSTRAINT `FK_ZoneTerminal` FOREIGN KEY (`zone_id`) REFERENCES `att_zone` (`id`);

--
-- Constraints for table `att_timetable_roundrule`
--
ALTER TABLE `att_timetable_roundrule`
  ADD CONSTRAINT `FK25F61BD011A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`);

--
-- Constraints for table `hr_attendancerule`
--
ALTER TABLE `hr_attendancerule`
  ADD CONSTRAINT `FKA0F2A3B0F2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`);

--
-- Constraints for table `hr_biotemplate`
--
ALTER TABLE `hr_biotemplate`
  ADD CONSTRAINT `FKF43C035350F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`);

--
-- Constraints for table `hr_department`
--
ALTER TABLE `hr_department`
  ADD CONSTRAINT `FK9B3B5975F2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`);

--
-- Constraints for table `hr_employee_group`
--
ALTER TABLE `hr_employee_group`
  ADD CONSTRAINT `FK_EmployeeGroup` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  ADD CONSTRAINT `FK_GroupEmployee` FOREIGN KEY (`groupItem_id`) REFERENCES `hr_groupitem` (`id`);

--
-- Constraints for table `hr_groupitem`
--
ALTER TABLE `hr_groupitem`
  ADD CONSTRAINT `FK263AEC8DC3D7F91B` FOREIGN KEY (`group_id`) REFERENCES `hr_group` (`id`);

--
-- Constraints for table `hr_holiday_details`
--
ALTER TABLE `hr_holiday_details`
  ADD CONSTRAINT `FK2463BBCCF2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`);

--
-- Constraints for table `hr_payclass`
--
ALTER TABLE `hr_payclass`
  ADD CONSTRAINT `FK3210FA9BF2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`);

--
-- Constraints for table `hr_position`
--
ALTER TABLE `hr_position`
  ADD CONSTRAINT `FKB21F1618F2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`);

--
-- Constraints for table `hr_template`
--
ALTER TABLE `hr_template`
  ADD CONSTRAINT `FKC59C763C50F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MessageSendEmployee` FOREIGN KEY (`send_emp_id`) REFERENCES `hr_employee` (`id`);

--
-- Constraints for table `message2entity`
--
ALTER TABLE `message2entity`
  ADD CONSTRAINT `FK_MessageAcceptEmployee` FOREIGN KEY (`accept_emp_id`) REFERENCES `hr_employee` (`id`),
  ADD CONSTRAINT `FK_MessageEntity` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`);

--
-- Constraints for table `message_zone`
--
ALTER TABLE `message_zone`
  ADD CONSTRAINT `FK_MessageZone` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`),
  ADD CONSTRAINT `FK_ZoneMessage` FOREIGN KEY (`zone_id`) REFERENCES `att_zone` (`id`);

--
-- Constraints for table `pay_formularesult`
--
ALTER TABLE `pay_formularesult`
  ADD CONSTRAINT `FK_SalaryRecordFormula` FOREIGN KEY (`salaryRecord_Id`) REFERENCES `pay_salaryrecord` (`Id`);

--
-- Constraints for table `pay_salarystructure_formula`
--
ALTER TABLE `pay_salarystructure_formula`
  ADD CONSTRAINT `FK_SalaryStructureFormula` FOREIGN KEY (`SalaryStructure_Id`) REFERENCES `pay_salarystructure` (`Id`);

--
-- Constraints for table `rpt_reportfield`
--
ALTER TABLE `rpt_reportfield`
  ADD CONSTRAINT `FK121C82E566D4B2E5` FOREIGN KEY (`report_id`) REFERENCES `rpt_reportentity` (`id`);

--
-- Constraints for table `sys_privilege`
--
ALTER TABLE `sys_privilege`
  ADD CONSTRAINT `FK_MenuPrivilege` FOREIGN KEY (`menu_id`) REFERENCES `sys_menu` (`id`);

--
-- Constraints for table `sys_role_datafilter`
--
ALTER TABLE `sys_role_datafilter`
  ADD CONSTRAINT `FK_DataFilterRole` FOREIGN KEY (`role_df_id`) REFERENCES `sys_datafilter` (`id`),
  ADD CONSTRAINT `FK_RoleDataFilter` FOREIGN KEY (`role_id`) REFERENCES `sys_role` (`id`);

--
-- Constraints for table `sys_role_rights`
--
ALTER TABLE `sys_role_rights`
  ADD CONSTRAINT `FK_PrivilegeRole` FOREIGN KEY (`role_pri_id`) REFERENCES `sys_privilege` (`id`),
  ADD CONSTRAINT `FK_RolePrivilege` FOREIGN KEY (`role_id`) REFERENCES `sys_role` (`id`);

--
-- Constraints for table `sys_user_role`
--
ALTER TABLE `sys_user_role`
  ADD CONSTRAINT `FK_RoleUser` FOREIGN KEY (`role_id`) REFERENCES `sys_role` (`id`),
  ADD CONSTRAINT `FK_UserRole` FOREIGN KEY (`userid`) REFERENCES `sys_user` (`id`);

--
-- Constraints for table `workcode_zone`
--
ALTER TABLE `workcode_zone`
  ADD CONSTRAINT `FK_WorkcodeZone` FOREIGN KEY (`workcode_id`) REFERENCES `att_workcode` (`id`),
  ADD CONSTRAINT `FK_ZoneWorkcode` FOREIGN KEY (`zone_id`) REFERENCES `att_zone` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
