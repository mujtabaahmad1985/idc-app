-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: db708552296.db.1and1.com
-- Generation Time: Dec 18, 2018 at 06:10 AM
-- Server version: 5.5.60-0+deb7u1-log
-- PHP Version: 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db708552296`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `activity_id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `report_type_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `activity_description` text,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`activity_id`, `user_id`, `report_type_id`, `report_id`, `activity_description`, `date_time`) VALUES
(1, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> logged at 20/11/2017 11:06:52 on <a href=\'#\'>Sonomatic Reporting Database</a>.', '2017-11-20 09:06:52'),
(2, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> added dropdown value of <strong>test</strong> at 20/11/2017 12:35:54</a>. ', '2017-11-20 10:35:54'),
(3, NULL, NULL, NULL, '<a href=\'#\'>Super Admin</a> is logged out at 20/11/2017 13:32:14', '2017-11-20 11:32:14'),
(4, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> logged at 20/11/2017 13:32:58 on <a href=\'#\'>Sonomatic Reporting Database</a>.', '2017-11-20 11:32:58'),
(5, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Head Manager</a> as manager. ', '2017-11-20 11:42:41'),
(6, NULL, NULL, NULL, '<a href=\'#\'>Super Admin</a> is logged out at 20/11/2017 13:43:15', '2017-11-20 11:43:15'),
(7, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 20/11/2017 13:43:33 on <a href=\'#\'>Sonomatic Reporting Database</a>.', '2017-11-20 11:43:33'),
(8, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 21/11/2017 10:09:29 on <a href=\'#\'>Sonomatic Reporting Database</a>.', '2017-11-21 08:09:29'),
(9, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added dropdown value of <strong>Test Technique</strong> at 21/11/2017 10:48:33</a>. ', '2017-11-21 08:48:33'),
(10, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added dropdown value of <strong>Material Tested 1</strong> at 21/11/2017 12:50:35</a>. ', '2017-11-21 10:50:35'),
(11, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> created account for <a href=\'#\'>Head Technicains</a> as technician. ', '2017-11-22 08:46:40'),
(12, NULL, NULL, NULL, '<a href=\'#\'>Head Manager</a> is logged out at 23/11/2017 11:25:23', '2017-11-23 09:25:24'),
(13, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 23/11/2017 11:27:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-23 09:27:41'),
(14, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 23/11/2017 16:01:20 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-23 14:01:20'),
(15, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 29/11/2017 16:06:46 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-29 14:06:46'),
(16, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 123.', '2017-11-29 15:09:19'),
(17, NULL, NULL, NULL, '<a href=\'#\'>Head Manager</a> is logged out at 29/11/2017 17:12:04', '2017-11-29 15:12:04'),
(18, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 29/11/2017 17:52:49 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-29 15:52:49'),
(19, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 30/11/2017 11:33:21 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-30 09:33:21'),
(20, NULL, NULL, NULL, '<a href=\'#\'>Head Manager</a> is logged out at 30/11/2017 14:01:07', '2017-11-30 12:01:07'),
(21, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 30/11/2017 14:01:13 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-30 12:01:13'),
(22, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 30/11/2017 14:04:20 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-30 12:04:20'),
(23, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 30/11/2017 14:49:47 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-30 12:49:47'),
(24, NULL, NULL, NULL, '<a href=\'#\'>Head Manager</a> is logged out at 30/11/2017 14:51:24', '2017-11-30 12:51:24'),
(25, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 30/11/2017 14:51:28 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-30 12:51:28'),
(26, NULL, NULL, NULL, '<a href=\'#\'>Head Manager</a> is logged out at 30/11/2017 14:52:38', '2017-11-30 12:52:38'),
(27, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 30/11/2017 15:26:50 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-11-30 13:26:50'),
(28, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 01/12/2017 13:20:05 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-01 11:20:05'),
(29, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 06/12/2017 08:21:50 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-06 06:21:50'),
(30, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 07/12/2017 11:01:08 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-07 09:01:08'),
(31, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 11/12/2017 04:36:57 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-11 02:36:57'),
(32, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 12/12/2017 10:38:56 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-12 08:38:56'),
(33, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 12/12/2017 10:41:09 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-12 08:41:09'),
(34, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 13/12/2017 11:54:49 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-13 09:54:49'),
(35, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 14/12/2017 09:41:38 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-14 07:41:38'),
(36, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-14 10:36:59'),
(37, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-14 10:52:56'),
(38, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-14 10:57:19'),
(39, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 14/12/2017 13:41:46 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-14 11:41:46'),
(40, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-14 12:31:40'),
(41, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-14 12:32:36'),
(42, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-14 12:33:54'),
(43, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-14 12:40:41'),
(44, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 15/12/2017 09:53:28 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-15 07:53:28'),
(45, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 15/12/2017 09:53:29 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-15 07:53:29'),
(46, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-15 07:54:04'),
(47, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 15/12/2017 10:35:52 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-15 08:35:52'),
(48, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-17 15:08:58'),
(49, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> added a job with job number as 1.', '2017-12-17 15:13:49'),
(50, 2, NULL, NULL, '<a href=\'#\'>Head Manager</a> logged at 18/12/2017 10:32:33 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-18 08:32:33'),
(51, NULL, NULL, NULL, '<a href=\'#\'>Head Manager</a> is logged out at 18/12/2017 11:01:42', '2017-12-18 09:01:42'),
(52, 3, NULL, NULL, '<a href=\'#\'>Head Technicains</a> logged at 18/12/2017 11:02:01 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-18 09:02:01'),
(53, 3, NULL, NULL, '<a href=\'#\'>Head Technicains</a> logged at 18/12/2017 17:51:04 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-18 15:51:04'),
(54, 3, NULL, NULL, '<a href=\'#\'>Head Technicains</a> logged at 19/12/2017 04:27:28 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-19 02:27:28'),
(55, 2, NULL, NULL, '<a href=\'#\'> </a> logged at 19/12/2017 07:53:51 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-19 05:53:51'),
(56, 2, NULL, NULL, '<a href=\'#\'> </a> added a job with job number as 1.', '2017-12-19 05:58:25'),
(57, 2, NULL, NULL, '<a href=\'#\'> </a> added a job with job number as 1.', '2017-12-19 06:00:18'),
(58, 2, NULL, NULL, '<a href=\'#\'> </a> added a job with job number as 1.', '2017-12-19 06:26:46'),
(59, 2, NULL, NULL, '<a href=\'#\'> </a> added a job with job number as 1.', '2017-12-19 06:59:03'),
(60, 3, NULL, NULL, '<a href=\'#\'>Head Technicains</a> created account for <a href=\'#\'>Dev Supervision</a> as technician. ', '2017-12-19 07:00:39'),
(61, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/12/2017 11:38:26 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-19 09:38:26'),
(62, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 19/12/2017 11:39:14', '2017-12-19 09:39:14'),
(63, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/12/2017 11:39:56 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-19 09:39:56'),
(64, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2017-12-19 09:43:32'),
(65, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 21/12/2017 11:21:05 on <a href=\'#\'>Ionix Reporting Database</a>.', '2017-12-21 09:21:05'),
(66, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/01/2018 10:35:15 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-19 08:35:15'),
(67, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 22/01/2018 11:50:23 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-22 09:50:23'),
(68, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-01-22 10:14:04'),
(69, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 22/01/2018 13:09:10 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-22 11:09:10'),
(70, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-01-22 11:29:40'),
(71, NULL, NULL, NULL, NULL, '2018-01-22 11:34:25'),
(72, NULL, NULL, NULL, NULL, '2018-01-22 11:38:25'),
(73, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 23/01/2018 10:55:24 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-23 08:55:24'),
(74, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 24/01/2018 10:29:40 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-24 08:29:40'),
(75, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 25/01/2018 10:49:37 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-25 08:49:37'),
(76, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 25/01/2018 15:59:44 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-25 13:59:44'),
(77, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 26/01/2018 12:28:18 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-26 10:28:18'),
(78, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 29/01/2018 09:56:11 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-29 07:56:11'),
(79, NULL, NULL, NULL, NULL, '2018-01-29 08:06:27'),
(80, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-01-29 08:10:22'),
(81, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 29/01/2018 10:24:45 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-29 08:24:45'),
(82, NULL, NULL, NULL, NULL, '2018-01-29 09:01:12'),
(83, NULL, NULL, NULL, NULL, '2018-01-29 09:25:23'),
(84, NULL, NULL, NULL, NULL, '2018-01-29 09:29:39'),
(85, NULL, NULL, NULL, NULL, '2018-01-29 09:32:49'),
(86, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-01-29 09:34:31'),
(87, NULL, NULL, NULL, NULL, '2018-01-29 09:36:29'),
(88, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 29/01/2018 11:39:42 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-29 09:39:42'),
(89, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 29/01/2018 11:41:35 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-29 09:41:35'),
(90, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 29/01/2018 13:47:20 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-29 11:47:20'),
(91, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 05:17:09 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 03:17:09'),
(92, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 05:40:21 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 03:40:21'),
(93, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 05:48:37 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 03:48:37'),
(94, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 07:50:57 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 05:50:57'),
(95, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 09:06:19', '2018-01-30 07:06:19'),
(96, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 09:06:33 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 07:06:33'),
(97, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 10:21:01 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 08:21:01'),
(98, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added company  <a href=\'#\'>Dev-client', '2018-01-30 08:21:59'),
(99, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Client Dev</a> as client. ', '2018-01-30 08:23:25'),
(100, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 10:23:49', '2018-01-30 08:23:49'),
(101, 6, NULL, NULL, '<a href=\'#\'>Client Dev</a> logged at 30/01/2018 10:24:00 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 08:24:00'),
(102, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 10:51:05', '2018-01-30 08:51:05'),
(103, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 10:51:55 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 08:51:55'),
(104, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 10:52:18', '2018-01-30 08:52:18'),
(105, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 10:53:13 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 08:53:13'),
(106, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 10:53:15 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 08:53:15'),
(107, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 12:52:27 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 10:52:27'),
(108, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 13:05:29 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 11:05:29'),
(109, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 13:05:39 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 11:05:39'),
(110, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 13:05:56 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 11:05:56'),
(111, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-01-30 11:08:51'),
(112, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Scott Seeley</a> as technician. ', '2018-01-30 11:17:34'),
(113, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 14:17:47', '2018-01-30 12:17:47'),
(114, NULL, NULL, NULL, '<a href=\'#\'>Client Dev</a> is logged out at 30/01/2018 14:19:36', '2018-01-30 12:19:36'),
(115, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 14:19:52 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 12:19:52'),
(116, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 14:23:29', '2018-01-30 12:23:29'),
(117, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 14:23:55 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 12:23:55'),
(118, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 14:36:35', '2018-01-30 12:36:35'),
(119, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/01/2018 14:36:59 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 12:36:59'),
(120, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> is changed password at30/01/2018 14:41:01', '2018-01-30 12:41:01'),
(121, NULL, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> is logged out at 30/01/2018 14:41:12', '2018-01-30 12:41:12'),
(122, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 14:41:21 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 12:41:21'),
(123, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is changed password at30/01/2018 14:41:22', '2018-01-30 12:41:22'),
(124, NULL, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> is logged out at 30/01/2018 14:41:25', '2018-01-30 12:41:25'),
(125, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is changed password at30/01/2018 14:41:36', '2018-01-30 12:41:36'),
(126, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 14:42:25 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 12:42:25'),
(127, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 30/01/2018 14:43:58', '2018-01-30 12:43:58'),
(128, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 14:45:52 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 12:45:52'),
(129, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 14:57:26 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 12:57:26'),
(130, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 15:07:09 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 13:07:09'),
(131, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 30/01/2018 16:05:33 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-30 14:05:33'),
(132, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 31/01/2018 05:28:46 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 03:28:46'),
(133, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 31/01/2018 05:33:49 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 03:33:49'),
(134, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 31/01/2018 09:18:36 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 07:18:36'),
(135, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 31/01/2018 09:59:23 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 07:59:23'),
(136, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 31/01/2018 10:01:48 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 08:01:48'),
(137, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 31/01/2018 10:12:43 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 08:12:43'),
(138, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 31/01/2018 10:13:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 08:13:41'),
(139, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 31/01/2018 10:13:53 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 08:13:53'),
(140, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 31/01/2018 10:50:57 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-01-31 09:50:57'),
(141, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 06/02/2018 08:02:33 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-06 07:02:33'),
(142, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 06/02/2018 08:31:16 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-06 07:31:16'),
(143, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 07/02/2018 11:20:35 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-07 10:20:35'),
(144, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 09/02/2018 11:12:47 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-09 10:12:47'),
(145, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 09/02/2018 11:20:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-09 10:20:41'),
(146, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 28/02/2018 13:12:12 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-28 12:12:12'),
(147, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 28/02/2018 15:09:18 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-28 14:09:18'),
(148, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-02-28 14:11:28'),
(149, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Ovean Super</a> as technician. ', '2018-02-28 14:11:39'),
(150, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Ocean Tech1</a> as technician. ', '2018-02-28 14:12:47'),
(151, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 28/02/2018 15:16:02 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-02-28 14:16:02'),
(152, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/03/2018 06:22:24 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 05:22:24'),
(153, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/03/2018 06:23:53 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 05:23:53'),
(154, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 01/03/2018 10:42:58 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 09:42:58'),
(155, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 01/03/2018 11:06:39 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 10:06:39'),
(156, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 01/03/2018 11:10:22 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 10:10:22'),
(157, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 01/03/2018 11:19:59 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 10:19:59'),
(158, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/03/2018 11:22:01 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 10:22:01'),
(159, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Demo Demo</a> as technician. ', '2018-03-01 10:25:20'),
(160, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Demo Demo</a> as technician. ', '2018-03-01 10:25:36'),
(161, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Demo Demo</a> as technician. ', '2018-03-01 10:25:53'),
(162, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Demo Demo</a> as technician. ', '2018-03-01 10:26:03'),
(163, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> created account for <a href=\'#\'>Demo Demo</a> as technician. ', '2018-03-01 10:27:02'),
(164, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 01/03/2018 11:59:00 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 10:59:00'),
(165, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/03/2018 12:34:52 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 11:34:52'),
(166, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 01/03/2018 12:39:26', '2018-03-01 11:39:26'),
(167, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/03/2018 12:40:03 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 11:40:03'),
(168, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/03/2018 16:36:23 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 15:36:23'),
(169, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 01/03/2018 16:51:48', '2018-03-01 15:51:48'),
(170, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/03/2018 17:01:31 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-01 16:01:31'),
(171, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 02/03/2018 09:30:14 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-02 08:30:14'),
(172, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 02/03/2018 10:22:29 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-02 09:22:29'),
(173, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as NEw Client TEST Report.', '2018-03-02 09:41:08'),
(174, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 02/03/2018 11:12:39 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-02 10:12:39'),
(175, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 02/03/2018 11:23:13 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-02 10:23:13'),
(176, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 02/03/2018 11:36:39 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-02 10:36:39'),
(177, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 02/03/2018 11:36:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-02 10:36:42'),
(178, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-03-02 10:52:00'),
(179, NULL, NULL, NULL, '<a href=\'#\'></a> added a job with job number as 1.', '2018-03-02 12:29:42'),
(180, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 02/03/2018 13:29:51 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-02 12:29:51'),
(181, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 05/03/2018 06:37:37 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-05 05:37:37'),
(182, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 05/03/2018 11:42:20 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-05 10:42:20'),
(183, NULL, NULL, NULL, NULL, '2018-03-05 10:43:47'),
(184, NULL, NULL, NULL, NULL, '2018-03-05 11:52:54'),
(185, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-03-05 11:54:37'),
(186, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 06/03/2018 13:30:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-06 12:30:41'),
(187, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 07/03/2018 21:38:44 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-07 20:38:44'),
(188, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> added a job with job number as 12345.', '2018-03-07 20:45:02'),
(189, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> added a job with job number as 1.', '2018-03-07 20:52:45'),
(190, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 08/03/2018 11:01:46 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-08 10:01:46'),
(191, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as My New Job.', '2018-03-08 10:03:50'),
(192, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 09/03/2018 08:05:37 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-09 07:05:37'),
(193, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/03/2018 10:53:47 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-13 09:53:47'),
(194, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 13/03/2018 10:55:33', '2018-03-13 09:55:33'),
(195, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/03/2018 10:56:06 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-13 09:56:06'),
(196, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as Test Job Number.', '2018-03-13 10:03:51'),
(197, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 13/03/2018 11:09:40', '2018-03-13 10:09:40'),
(198, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/03/2018 11:10:17 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-13 10:10:17'),
(199, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 13/03/2018 11:18:39', '2018-03-13 10:18:40'),
(200, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/03/2018 11:20:11 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-13 10:20:11'),
(201, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as Test Job Number.', '2018-03-13 10:26:34'),
(202, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-03-13 10:32:07'),
(203, NULL, NULL, NULL, NULL, '2018-03-13 10:59:57'),
(204, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 13/03/2018 12:07:12', '2018-03-13 11:07:12'),
(205, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/03/2018 12:07:39 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-13 11:07:39'),
(206, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-03-13 11:08:13'),
(207, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 13/03/2018 12:10:25', '2018-03-13 11:10:25'),
(208, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/03/2018 12:10:39 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-13 11:10:39'),
(209, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> added a job with job number as 1.', '2018-03-13 11:11:16'),
(210, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 15/03/2018 07:02:32 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-15 06:02:32'),
(211, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 15/03/2018 13:39:28 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-15 12:39:28'),
(212, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 15/03/2018 13:53:50 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-15 12:53:50'),
(213, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 15/03/2018 16:58:34 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-15 15:58:34'),
(214, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 16/03/2018 10:45:34 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-16 09:45:34'),
(215, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 18/03/2018 14:13:43 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-18 13:13:43'),
(216, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/03/2018 13:27:38 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-19 12:27:38'),
(217, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/03/2018 15:51:16 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-19 14:51:16'),
(218, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 20/03/2018 10:32:23 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-20 09:32:23'),
(219, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 20/03/2018 10:32:23 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-20 09:32:23'),
(220, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 20/03/2018 10:46:35 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-20 09:46:35'),
(221, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 20/03/2018 11:21:05 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-20 10:21:05'),
(222, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-03-20 10:22:09'),
(223, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 22/03/2018 11:52:03 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-22 10:52:03'),
(224, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 22/03/2018 12:20:03 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-22 11:20:03'),
(225, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 24/03/2018 11:14:43 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-24 10:14:43'),
(226, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 27/03/2018 10:29:18 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-27 08:29:18'),
(227, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 28/03/2018 10:24:54 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-28 08:24:54'),
(228, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> added a job with job number as -.', '2018-03-28 08:32:21'),
(229, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> added a job with job number as Demo Test.', '2018-03-28 08:58:39'),
(230, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 28/03/2018 13:42:39 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-28 11:42:39'),
(231, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 29/03/2018 02:48:40 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-29 00:48:40'),
(232, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 29/03/2018 02:48:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-29 00:48:41'),
(233, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 30/03/2018 10:03:17 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-03-30 08:03:17'),
(234, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 04/04/2018 06:30:49 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-04 04:30:49'),
(235, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 04/04/2018 14:07:30 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-04 12:07:30'),
(236, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-04 12:35:12'),
(237, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-04 12:41:56'),
(238, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-04 12:46:53'),
(239, NULL, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> is logged out at 04/04/2018 14:59:55', '2018-04-04 12:59:55'),
(240, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 04/04/2018 15:02:26 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-04 13:02:26'),
(241, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-04 13:04:44'),
(242, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 05/04/2018 15:04:24 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-05 13:04:24'),
(243, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 05/04/2018 18:47:31 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-05 16:47:31'),
(244, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 06/04/2018 15:01:21 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-06 13:01:21'),
(245, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 06/04/2018 17:50:45 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-06 15:50:45'),
(246, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 09/04/2018 10:52:08 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-09 08:52:08'),
(247, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 09/04/2018 15:10:49 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-09 13:10:49'),
(248, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 09/04/2018 15:38:19 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-09 13:38:19'),
(249, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-09 14:06:00'),
(250, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-09 14:12:37'),
(251, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 6.03.', '2018-04-09 14:18:20'),
(252, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 09/04/2018 16:45:46 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-09 14:45:46'),
(253, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 10/04/2018 05:24:59 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-10 03:24:59'),
(254, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 10/04/2018 05:24:59 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-10 03:24:59'),
(255, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 12/04/2018 10:59:12 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-12 08:59:12'),
(256, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 12/04/2018 15:08:54 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-12 13:08:54'),
(257, 14, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 12/04/2018 20:10:22 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-12 18:10:22'),
(258, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 13/04/2018 09:56:11 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-13 07:56:11'),
(259, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-13 08:19:50'),
(260, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 13/04/2018 19:06:07 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-13 17:06:07'),
(261, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 15/04/2018 08:40:14 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-15 06:40:14'),
(262, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 15/04/2018 08:41:06', '2018-04-15 06:41:06'),
(263, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 16/04/2018 12:47:52 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 10:47:52'),
(264, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:48:59'),
(265, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:49:37'),
(266, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:50:26'),
(267, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:51:16'),
(268, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:53:38'),
(269, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:54:06'),
(270, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:55:26'),
(271, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:55:51'),
(272, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:56:24'),
(273, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:56:48'),
(274, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:57:38'),
(275, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> added a job with job number as 1.', '2018-04-16 10:58:27'),
(276, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 16/04/2018 17:44:51 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 15:44:51'),
(277, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 16/04/2018 18:57:25 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 16:57:25'),
(278, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 16/04/2018 19:55:18 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 17:55:18'),
(279, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 16/04/2018 20:18:58 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 18:18:58'),
(280, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 16/04/2018 20:18:59 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 18:18:59'),
(281, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 16/04/2018 20:23:15 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 18:23:15'),
(282, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 16/04/2018 20:31:42 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 18:31:42'),
(283, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 16/04/2018 20:31:43 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 18:31:43'),
(284, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 17/04/2018 01:50:31 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 23:50:31'),
(285, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 17/04/2018 01:50:32 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-16 23:50:32'),
(286, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 17/04/2018 12:34:59 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-17 10:34:59'),
(287, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 17/04/2018 12:52:28 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-17 10:52:28'),
(288, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 17/04/2018 21:19:30 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-17 19:19:30'),
(289, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 18/04/2018 11:08:57 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-18 09:08:57'),
(290, 13, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 18/04/2018 12:00:00 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-18 10:00:00'),
(291, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 18/04/2018 18:06:21 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-18 16:06:21'),
(292, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 18/04/2018 23:38:40 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-18 21:38:40'),
(293, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 18/04/2018 23:38:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-18 21:38:41'),
(294, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 18/04/2018 23:38:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-18 21:38:41'),
(295, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 19/04/2018 09:39:11 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-19 07:39:11'),
(296, NULL, NULL, NULL, '<a href=\'#\'>Demo Demo</a> is logged out at 19/04/2018 09:42:57', '2018-04-19 07:42:57'),
(297, 14, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 19/04/2018 09:43:25 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-19 07:43:25'),
(298, NULL, NULL, NULL, '<a href=\'#\'>Demo Demo</a> is logged out at 19/04/2018 09:44:58', '2018-04-19 07:44:58'),
(299, 12, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 19/04/2018 09:45:16 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-19 07:45:16'),
(300, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/04/2018 10:25:47 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-19 08:25:47'),
(301, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/04/2018 11:02:29 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-19 09:02:29'),
(302, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 19/04/2018 11:03:16', '2018-04-19 09:03:16'),
(303, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 19/04/2018 20:18:41 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-19 18:18:41'),
(304, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 20/04/2018 11:50:14 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-20 09:50:14'),
(305, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 26/04/2018 18:45:25 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-04-26 16:45:25'),
(306, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 02/05/2018 11:53:17 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-02 09:53:17'),
(307, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 02/05/2018 13:04:33 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-02 11:04:33'),
(308, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 02/05/2018 13:04:45', '2018-05-02 11:04:45'),
(309, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 02/05/2018 13:10:13 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-02 11:10:13'),
(310, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 02/05/2018 18:21:33 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-02 16:21:33'),
(311, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 02/05/2018 18:21:35 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-02 16:21:36'),
(312, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 07/05/2018 13:48:40 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-07 11:48:40'),
(313, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 07/05/2018 13:54:28 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-07 11:54:28'),
(314, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 08/05/2018 10:41:47 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-08 08:41:47'),
(315, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 08/05/2018 12:08:07 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-08 10:08:07'),
(316, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 09/05/2018 16:29:03 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-09 14:29:03'),
(317, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 15/05/2018 12:51:33 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-15 10:51:33'),
(318, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 15/05/2018 13:07:24 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-15 11:07:24'),
(319, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 15/05/2018 15:32:40 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-15 13:32:40'),
(320, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 22/05/2018 06:31:27 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-22 04:31:27'),
(321, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 22/05/2018 13:53:20 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-22 11:53:20'),
(322, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 25/05/2018 08:33:46 on <a href=\'#\'>Ionix Reporting Database</a>.', '2018-05-25 06:33:46'),
(323, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 25/05/2018 12:05:28 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-05-25 10:05:28'),
(324, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 05/06/2018 11:02:26 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-05 09:02:26'),
(325, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 12/06/2018 15:20:18 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-12 13:20:18'),
(326, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 12/06/2018 15:20:19 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-12 13:20:19'),
(327, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 12/06/2018 16:07:02 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-12 14:07:02'),
(328, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/06/2018 07:50:52 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-13 05:50:52'),
(329, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 13/06/2018 07:51:59', '2018-06-13 05:51:59'),
(330, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 13/06/2018 11:29:02 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-13 09:29:02'),
(331, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 13/06/2018 11:31:20 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-13 09:31:20'),
(332, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 13/06/2018 11:32:00', '2018-06-13 09:32:00'),
(333, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 18/06/2018 12:14:26 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-18 10:14:26'),
(334, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 20/06/2018 18:38:00 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-20 16:38:00'),
(335, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 21/06/2018 13:55:45 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-21 11:55:45'),
(336, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 21/06/2018 16:00:54 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-21 14:00:54'),
(337, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 21/06/2018 16:01:13', '2018-06-21 14:01:13'),
(338, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 21/06/2018 17:32:00 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-21 15:32:00'),
(339, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 22/06/2018 11:56:31 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-22 09:56:31'),
(340, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 22/06/2018 15:43:38 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-22 13:43:38'),
(341, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 25/06/2018 15:38:52 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-25 13:38:52'),
(342, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 25/06/2018 16:29:36 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-25 14:29:36'),
(343, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 27/06/2018 13:52:02 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-27 11:52:02'),
(344, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 27/06/2018 13:52:55 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-27 11:52:55'),
(345, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 28/06/2018 11:14:24 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-28 09:14:24'),
(346, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 29/06/2018 14:02:00 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-06-29 12:02:00'),
(347, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/07/2018 09:08:05 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-01 07:08:05'),
(348, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 01/07/2018 09:08:15', '2018-07-01 07:08:15'),
(349, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 01/07/2018 09:13:27 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-01 07:13:27'),
(350, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 02/07/2018 10:32:46 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-02 08:32:46'),
(351, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 02/07/2018 10:32:49 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-02 08:32:49'),
(352, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 03/07/2018 10:30:13 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-03 08:30:13'),
(353, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 03/07/2018 13:55:51 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-03 11:55:51'),
(354, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 04/07/2018 06:02:35 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-04 04:02:35'),
(355, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 04/07/2018 06:08:37', '2018-07-04 04:08:37'),
(356, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> logged at 04/07/2018 06:09:22 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-04 04:09:22'),
(357, NULL, NULL, NULL, '<a href=\'#\'>Super Admin</a> is logged out at 04/07/2018 06:10:30', '2018-07-04 04:10:30');
INSERT INTO `tbl_activity` (`activity_id`, `user_id`, `report_type_id`, `report_id`, `activity_description`, `date_time`) VALUES
(358, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 04/07/2018 06:10:35 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-04 04:10:35'),
(359, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 04/07/2018 10:32:13 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-04 08:32:13'),
(360, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 05/07/2018 10:25:50 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-05 08:25:50'),
(361, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 06/07/2018 20:05:35 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-06 18:05:35'),
(362, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 09/07/2018 11:32:32 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-09 09:32:32'),
(363, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 10/07/2018 11:37:41 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-10 09:37:41'),
(364, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 12/07/2018 19:55:53 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-12 17:55:53'),
(365, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 18/07/2018 23:45:09 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-18 21:45:09'),
(366, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 19/07/2018 10:53:26 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-19 08:53:26'),
(367, 2, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> logged at 19/07/2018 12:18:35 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-19 10:18:35'),
(368, NULL, NULL, NULL, '<a href=\'#\'>Dev Supervision</a> is logged out at 19/07/2018 12:18:47', '2018-07-19 10:18:47'),
(369, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> logged at 19/07/2018 12:18:51 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-19 10:18:51'),
(370, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Tim Stevenson</a> as technician. ', '2018-07-19 10:28:38'),
(371, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Jason Jenkins </a> as technician. ', '2018-07-19 10:30:58'),
(372, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 10:32:43'),
(373, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 10:37:40'),
(374, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 10:53:19'),
(375, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 10:54:09'),
(376, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 10:56:13'),
(377, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 10:57:11'),
(378, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 10:58:59'),
(379, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Mujtaba Ahmad</a> as technician. ', '2018-07-19 11:01:48'),
(380, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Tim Stevenson</a> as technician. ', '2018-07-19 11:03:14'),
(381, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Jason Jenkins</a> as technician. ', '2018-07-19 11:11:10'),
(382, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Bamboo Zhong</a> as technician. ', '2018-07-19 11:13:21'),
(383, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>David Martin</a> as technician. ', '2018-07-19 11:20:57'),
(384, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Alex Mortin</a> as technician. ', '2018-07-19 11:28:41'),
(385, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Ian Leslie</a> as technician. ', '2018-07-19 11:40:05'),
(386, 30, NULL, NULL, '<a href=\'#\'>Ian Leslie</a> logged at 19/07/2018 13:46:39 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-19 11:46:39'),
(387, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Tom Rowlands</a> as technician. ', '2018-07-19 11:50:19'),
(388, 1, NULL, NULL, '<a href=\'#\'>Super Admin</a> created account for <a href=\'#\'>Huw Lewis</a> as technician. ', '2018-07-19 11:54:13'),
(389, 32, NULL, NULL, '<a href=\'#\'>Huw Lewis</a> logged at 20/07/2018 09:20:47 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-20 07:20:47'),
(390, 32, NULL, NULL, '<a href=\'#\'>Huw Lewis</a> profile is updated at  20/07/2018 09:21:16', '2018-07-20 07:21:16'),
(391, 27, NULL, NULL, '<a href=\'#\'>Bamboo Zhong</a> logged at 20/07/2018 14:19:39 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-20 12:19:39'),
(392, NULL, NULL, NULL, '<a href=\'#\'>Bamboo Zhong</a> is logged out at 20/07/2018 14:55:27', '2018-07-20 12:55:27'),
(393, 26, NULL, NULL, '<a href=\'#\'>Jason Jenkins</a> logged at 20/07/2018 16:43:18 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-20 14:43:18'),
(394, 26, NULL, NULL, '<a href=\'#\'>Jason Jenkins</a> profile is updated at  20/07/2018 16:43:44', '2018-07-20 14:43:44'),
(395, 26, NULL, NULL, '<a href=\'#\'> </a> profile is updated at  20/07/2018 16:43:49', '2018-07-20 14:43:49'),
(396, 26, NULL, NULL, '<a href=\'#\'> </a> profile is updated at  20/07/2018 16:43:55', '2018-07-20 14:43:55'),
(397, 26, NULL, NULL, '<a href=\'#\'> </a> profile is updated at  20/07/2018 16:44:09', '2018-07-20 14:44:09'),
(398, 26, NULL, NULL, '<a href=\'#\'> </a> profile is updated at  20/07/2018 16:44:30', '2018-07-20 14:44:30'),
(399, 26, NULL, NULL, '<a href=\'#\'> </a> profile is updated at  20/07/2018 16:45:48', '2018-07-20 14:45:48'),
(400, 27, NULL, NULL, '<a href=\'#\'>Bamboo Zhong</a> logged at 20/07/2018 17:02:17 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-20 15:02:17'),
(401, 29, NULL, NULL, '<a href=\'#\'>Alex Mortin</a> logged at 23/07/2018 09:51:30 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-23 07:51:30'),
(402, 29, NULL, NULL, '<a href=\'#\'>Alex Mortin</a> logged at 23/07/2018 09:51:41 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-23 07:51:41'),
(403, 29, NULL, NULL, '<a href=\'#\'>Alex Mortin</a> logged at 23/07/2018 09:55:04 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-23 07:55:04'),
(404, 30, NULL, NULL, '<a href=\'#\'>Ian Leslie</a> logged at 23/07/2018 18:02:53 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-23 16:02:53'),
(405, 30, NULL, NULL, '<a href=\'#\'>Ian Leslie</a> logged at 23/07/2018 18:02:59 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-23 16:02:59'),
(406, 30, NULL, NULL, '<a href=\'#\'>Ian Leslie</a> logged at 23/07/2018 18:03:02 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-23 16:03:02'),
(407, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 24/07/2018 11:58:21 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-24 09:58:21'),
(408, NULL, NULL, NULL, '<a href=\'#\'> </a> is logged out at 24/07/2018 12:02:33', '2018-07-24 10:02:33'),
(409, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 24/07/2018 12:02:56 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-24 10:02:56'),
(410, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 24/07/2018 12:03:03 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-24 10:03:03'),
(411, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 24/07/2018 12:22:18 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-24 10:22:18'),
(412, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 24/07/2018 12:35:33 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-24 10:35:33'),
(413, 26, NULL, NULL, '<a href=\'#\'> </a> logged at 24/07/2018 16:36:30 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-24 14:36:30'),
(414, 26, NULL, NULL, '<a href=\'#\'> </a> profile is updated at  24/07/2018 16:54:35', '2018-07-24 14:54:35'),
(415, 26, NULL, NULL, '<a href=\'#\'>Jason Jenkins</a> profile is updated at  24/07/2018 16:58:47', '2018-07-24 14:58:47'),
(416, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 25/07/2018 09:08:05 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-25 07:08:05'),
(417, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 25/07/2018 18:10:20 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-25 16:10:20'),
(418, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 26/07/2018 07:39:57 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-26 05:40:00'),
(419, 10, NULL, NULL, '<a href=\'#\'>Demo Demo</a> logged at 31/07/2018 17:22:57 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-31 15:22:57'),
(420, NULL, NULL, NULL, '<a href=\'#\'>Demo Demo</a> is logged out at 31/07/2018 17:23:51', '2018-07-31 15:23:51'),
(421, 25, NULL, NULL, '<a href=\'#\'>Tim Stevenson</a> logged at 31/07/2018 17:23:57 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-07-31 15:23:57'),
(422, 7, NULL, NULL, '<a href=\'#\'>Scott Seeley</a> logged at 13/08/2018 13:40:41 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-08-13 11:40:41'),
(423, 31, NULL, NULL, '<a href=\'#\'>Tom Rowlands</a> logged at 17/08/2018 13:49:47 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-08-17 11:49:47'),
(424, 26, NULL, NULL, '<a href=\'#\'>Jason Jenkins</a> logged at 17/08/2018 17:30:15 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-08-17 15:30:15'),
(425, 25, NULL, NULL, '<a href=\'#\'>Tim Stevenson</a> logged at 24/08/2018 10:35:41 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-08-24 08:35:41'),
(426, 25, NULL, NULL, '<a href=\'#\'>Tim Stevenson</a> is changed password at24/08/2018 10:36:08', '2018-08-24 08:36:08'),
(427, 25, NULL, NULL, '<a href=\'#\'>Tim Stevenson</a> added company  <a href=\'#\'>TATA Steel UK', '2018-08-24 08:38:38'),
(428, 25, NULL, NULL, '<a href=\'#\'>Tim Stevenson</a> added a job with job number as TRND00001.', '2018-08-24 08:47:10'),
(429, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 27/08/2018 05:27:22 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-08-27 03:27:22'),
(430, NULL, NULL, NULL, '<a href=\'#\'> </a> is logged out at 27/08/2018 05:28:15', '2018-08-27 03:28:15'),
(431, 3, NULL, NULL, '<a href=\'#\'>Head Technicains</a> logged at 27/08/2018 05:38:55 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-08-27 03:38:55'),
(432, 3, NULL, NULL, '<a href=\'#\'>Head Technicains</a> logged at 27/08/2018 19:03:48 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-08-27 17:03:48'),
(433, NULL, NULL, NULL, '<a href=\'#\'>Head Technicains</a> is logged out at 27/08/2018 19:05:11', '2018-08-27 17:05:11'),
(434, 32, NULL, NULL, '<a href=\'#\'> </a> logged at 17/12/2018 11:00:50 on <a href=\'#\'>TRND Reporting Database</a>.', '2018-12-17 10:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_text` text,
  `user_id` varchar(12) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `report_type_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `comment_type` tinyint(1) DEFAULT NULL COMMENT '1=comments,2=report,3=activity',
  `parent_comment_id` int(11) DEFAULT NULL,
  `is_edit_report` enum('no','yes') DEFAULT 'no',
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` text,
  `company_email` varchar(150) DEFAULT NULL,
  `company_url` varchar(100) DEFAULT NULL,
  `company_phone` varchar(100) DEFAULT NULL,
  `company_logo` varchar(150) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_address`, `company_email`, `company_url`, `company_phone`, `company_logo`, `join_date`) VALUES
(2, 'Testing Client ', '...', 'scott@rdtsoftware.com', NULL, 'scott seeley', '2998c7dfbec6cf1433be1a3f1cf8fe3e.jpg', '2016-06-14 09:00:56'),
(3, 'TATA Steel UK', 'Port Talbot,\r\nUK', 'jjenkins@oceaneering.com', NULL, 'Siddhartha Chatterji', '42a422f932581233493873d0fe9cb3f8.jpg', '2018-08-24 08:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_defects`
--

CREATE TABLE `tbl_defects` (
  `defect_id` int(11) NOT NULL,
  `defect_title` varchar(50) DEFAULT NULL,
  `is_delete` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drop_down_data`
--

CREATE TABLE `tbl_drop_down_data` (
  `drop_down_id` int(11) NOT NULL,
  `drop_down_text` text,
  `report_type_id` int(11) DEFAULT NULL,
  `drop_down_type` int(11) DEFAULT NULL COMMENT '1=procedure,2=technique,3=acceptance,4=technique_standard,5=diagonstic,6=surface_condition',
  `location` varchar(50) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drop_down_data`
--

INSERT INTO `tbl_drop_down_data` (`drop_down_id`, `drop_down_text`, `report_type_id`, `drop_down_type`, `location`, `date_time`, `is_delete`) VALUES
(1, NULL, NULL, NULL, 'Australia ', '2016-06-03 05:30:40', NULL),
(2, 'test', 2, 1, NULL, '2017-11-20 10:35:54', NULL),
(3, 'Test Technique', 2, 2, NULL, '2017-11-21 08:48:33', NULL),
(4, 'Material Tested 1', 2, 8, NULL, '2017-11-21 10:50:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `job_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `job_number` varchar(50) DEFAULT NULL,
  `w_i_no` varchar(50) DEFAULT NULL,
  `po_number` varchar(50) DEFAULT NULL,
  `project_name` varchar(50) DEFAULT NULL,
  `axapta_number` varchar(50) DEFAULT NULL,
  `request_number` varchar(250) DEFAULT NULL,
  `number_of_spool` varchar(50) DEFAULT '1',
  `ndt_procedure_no` varchar(100) DEFAULT NULL,
  `procedure_iss` varchar(255) DEFAULT NULL,
  `calculation_file` varchar(255) DEFAULT NULL,
  `report_file` varchar(255) DEFAULT NULL,
  `procedure_rev` varchar(10) DEFAULT NULL,
  `ndt_technique_no` varchar(100) DEFAULT NULL,
  `technique_iss` varchar(100) DEFAULT NULL,
  `technique_rev` varchar(10) DEFAULT NULL,
  `inspection_std` varchar(200) DEFAULT NULL,
  `inspection_std_iss` varchar(100) DEFAULT NULL,
  `inspection_std_rev` varchar(10) DEFAULT NULL,
  `component_identification` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `drawing_id_number` varchar(50) DEFAULT NULL,
  `material_tested` varchar(200) DEFAULT NULL,
  `manfacturing_process` varchar(200) DEFAULT NULL,
  `job_description` varchar(500) DEFAULT NULL,
  `bay` varchar(20) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `is_delete` datetime DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_id`, `client_id`, `manager_id`, `job_number`, `w_i_no`, `po_number`, `project_name`, `axapta_number`, `request_number`, `number_of_spool`, `ndt_procedure_no`, `procedure_iss`, `calculation_file`, `report_file`, `procedure_rev`, `ndt_technique_no`, `technique_iss`, `technique_rev`, `inspection_std`, `inspection_std_iss`, `inspection_std_rev`, `component_identification`, `address`, `drawing_id_number`, `material_tested`, `manfacturing_process`, `job_description`, `bay`, `due_date`, `is_delete`, `date_time`) VALUES
(27, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:48:59'),
(28, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:49:37'),
(29, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:50:26'),
(30, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:51:16'),
(31, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:53:38'),
(32, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:54:06'),
(33, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:55:26'),
(34, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:55:51'),
(35, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:56:24'),
(36, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:56:48'),
(37, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:57:38'),
(38, 2, NULL, '1', NULL, 'DEMO02', NULL, NULL, NULL, '1', 'HotSense', '1', NULL, NULL, 'a', 'Inspection +', '1', 'a', 'n/a', '1', 'a', NULL, 'Oceaneering, Site 3, Unit 5 Castell close, Swansea SA7 9FH', NULL, 'Carbon steel', 'Seam weld', 'Demonstration of system on site at Oceaneering', NULL, '2018-04-16', NULL, '2018-04-16 10:58:27'),
(39, 3, NULL, 'TRND00001', NULL, 'n/a', NULL, NULL, NULL, '1', 'TRND', '1', NULL, NULL, '1', 'TRND', '1', '1', 'EN 14127', '2011', '0', NULL, 'Port Talbot Steel Works, SA13 2NG', NULL, 'Carbon Steel', 'n/a', 'TRND trial.', NULL, '2018-08-17', NULL, '2018-08-24 08:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `id` char(24) NOT NULL COMMENT 'location id',
  `name` varchar(255) NOT NULL COMMENT 'location description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `name`) VALUES
('eee100000000060000500002', 'loc 1'),
('eee101000000000000000000', 'Loc2'),
('eee103000000000000000000', 'Loc3'),
('eee105000000000000000000', 'Loc4'),
('eee108000000000000000000', 'Loc5'),
('eee112000000000000000000', ''),
('eee117000000000000000000', 'Loc6'),
('eee121000000000000000000', 'Loc7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_activities`
--

CREATE TABLE `tbl_login_activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `user_agent_detail` varchar(255) DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `time_enter` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_leave` datetime NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login_activities`
--

INSERT INTO `tbl_login_activities` (`id`, `user_id`, `user_agent`, `user_agent_detail`, `login_ip`, `time_enter`, `time_leave`, `date_time`) VALUES
(1, 1, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '202.69.15.78', '2017-11-20 09:06:52', '0000-00-00 00:00:00', '2017-11-20 11:06:52'),
(2, 1, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '202.69.15.78', '2017-11-20 11:32:58', '0000-00-00 00:00:00', '2017-11-20 13:32:58'),
(3, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '202.69.15.78', '2017-11-20 11:43:33', '0000-00-00 00:00:00', '2017-11-20 13:43:33'),
(4, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.54.12.200', '2017-11-21 08:09:29', '0000-00-00 00:00:00', '2017-11-21 10:09:29'),
(5, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '39.47.198.83', '2017-11-23 09:27:41', '0000-00-00 00:00:00', '2017-11-23 11:27:41'),
(6, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '37.111.128.60', '2017-11-23 14:01:20', '0000-00-00 00:00:00', '2017-11-23 16:01:20'),
(7, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '39.41.216.210', '2017-11-29 14:06:46', '0000-00-00 00:00:00', '2017-11-29 16:06:46'),
(8, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '39.41.216.210', '2017-11-29 15:52:49', '0000-00-00 00:00:00', '2017-11-29 17:52:49'),
(9, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.152.63', '2017-11-30 09:33:21', '0000-00-00 00:00:00', '2017-11-30 11:33:21'),
(10, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.152.63', '2017-11-30 12:01:13', '0000-00-00 00:00:00', '2017-11-30 14:01:13'),
(11, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '37.111.128.78', '2017-11-30 12:04:20', '0000-00-00 00:00:00', '2017-11-30 14:04:20'),
(12, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.152.63', '2017-11-30 12:49:47', '0000-00-00 00:00:00', '2017-11-30 14:49:47'),
(13, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.152.63', '2017-11-30 12:51:28', '0000-00-00 00:00:00', '2017-11-30 14:51:28'),
(14, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.152.63', '2017-11-30 13:26:50', '0000-00-00 00:00:00', '2017-11-30 15:26:50'),
(15, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.152.63', '2017-12-01 11:20:05', '0000-00-00 00:00:00', '2017-12-01 13:20:05'),
(16, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '37.111.128.0', '2017-12-06 06:21:50', '0000-00-00 00:00:00', '2017-12-06 08:21:50'),
(17, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.156.14', '2017-12-07 09:01:08', '0000-00-00 00:00:00', '2017-12-07 11:01:08'),
(18, 2, 'Google Chrome 62.0.3202.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', '37.111.128.122', '2017-12-11 02:36:57', '0000-00-00 00:00:00', '2017-12-11 04:36:57'),
(19, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.156.14', '2017-12-12 08:38:56', '0000-00-00 00:00:00', '2017-12-12 10:38:56'),
(20, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.156.14', '2017-12-12 08:41:09', '0000-00-00 00:00:00', '2017-12-12 10:41:09'),
(21, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.156.14', '2017-12-13 09:54:49', '0000-00-00 00:00:00', '2017-12-13 11:54:49'),
(22, 2, 'Google Chrome 63.0.3239.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '39.41.176.196', '2017-12-14 07:41:38', '0000-00-00 00:00:00', '2017-12-14 09:41:38'),
(23, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.156.14', '2017-12-14 11:41:46', '0000-00-00 00:00:00', '2017-12-14 13:41:46'),
(24, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.156.14', '2017-12-15 07:53:28', '0000-00-00 00:00:00', '2017-12-15 09:53:28'),
(25, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.156.14', '2017-12-15 07:53:29', '0000-00-00 00:00:00', '2017-12-15 09:53:29'),
(26, 2, 'Google Chrome 63.0.3239.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '37.111.128.24', '2017-12-15 08:35:52', '0000-00-00 00:00:00', '2017-12-15 10:35:52'),
(27, 2, 'Google Chrome 63.0.3239.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '37.111.128.33', '2017-12-18 08:32:33', '0000-00-00 00:00:00', '2017-12-18 10:32:33'),
(28, 3, 'Google Chrome 63.0.3239.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '37.111.128.33', '2017-12-18 09:02:01', '0000-00-00 00:00:00', '2017-12-18 11:02:01'),
(29, 3, 'Google Chrome 63.0.3239.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '37.111.128.33', '2017-12-18 15:51:04', '0000-00-00 00:00:00', '2017-12-18 17:51:04'),
(30, 3, 'Google Chrome 63.0.3239.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', '37.111.128.33', '2017-12-19 02:27:28', '0000-00-00 00:00:00', '2017-12-19 04:27:28'),
(31, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '159.253.162.117', '2017-12-19 05:53:51', '0000-00-00 00:00:00', '2017-12-19 07:53:51'),
(32, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '185.81.194.26', '2017-12-19 09:38:26', '0000-00-00 00:00:00', '2017-12-19 11:38:26'),
(33, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '185.81.194.26', '2017-12-19 09:39:56', '0000-00-00 00:00:00', '2017-12-19 11:39:56'),
(34, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.152.39', '2017-12-21 09:21:05', '0000-00-00 00:00:00', '2017-12-21 11:21:05'),
(35, 2, 'Google Chrome 64.0.3282.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.85 Safari/537.36', '202.69.15.106', '2018-01-19 08:35:15', '0000-00-00 00:00:00', '2018-01-19 10:35:15'),
(36, 2, 'Google Chrome 64.0.3282.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.100 Safari/537.36', '37.111.128.48', '2018-01-22 09:50:23', '0000-00-00 00:00:00', '2018-01-22 11:50:23'),
(37, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '86.141.205.215', '2018-01-22 11:09:10', '0000-00-00 00:00:00', '2018-01-22 13:09:10'),
(38, 2, 'Google Chrome 64.0.3282.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.100 Safari/537.36', '202.69.12.237', '2018-01-23 08:55:24', '0000-00-00 00:00:00', '2018-01-23 10:55:24'),
(39, 2, 'Google Chrome 64.0.3282.113', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.113 Safari/537.36', '37.111.128.22', '2018-01-24 08:29:40', '0000-00-00 00:00:00', '2018-01-24 10:29:40'),
(40, 2, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '37.111.128.22', '2018-01-25 08:49:37', '0000-00-00 00:00:00', '2018-01-25 10:49:37'),
(41, 2, 'Google Chrome 50.0.2661.89', 'Mozilla/5.0 (Linux; Android 5.1.1; VF-1397 Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Safari/537.36', '85.255.234.180', '2018-01-25 13:59:44', '0000-00-00 00:00:00', '2018-01-25 15:59:44'),
(42, 2, 'Mozilla Firefox 57.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '31.52.155.208', '2018-01-26 10:28:18', '0000-00-00 00:00:00', '2018-01-26 12:28:18'),
(43, 2, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '37.111.128.203', '2018-01-29 07:56:11', '0000-00-00 00:00:00', '2018-01-29 09:56:11'),
(44, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-29 08:24:45', '0000-00-00 00:00:00', '2018-01-29 10:24:45'),
(45, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-29 09:39:42', '0000-00-00 00:00:00', '2018-01-29 11:39:42'),
(46, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-29 09:41:35', '0000-00-00 00:00:00', '2018-01-29 11:41:35'),
(47, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-29 11:47:20', '0000-00-00 00:00:00', '2018-01-29 13:47:20'),
(48, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-30 03:17:09', '0000-00-00 00:00:00', '2018-01-30 05:17:09'),
(49, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-30 03:40:21', '0000-00-00 00:00:00', '2018-01-30 05:40:21'),
(50, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-30 03:48:37', '0000-00-00 00:00:00', '2018-01-30 05:48:37'),
(51, 2, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '39.41.183.69', '2018-01-30 05:50:57', '0000-00-00 00:00:00', '2018-01-30 07:50:57'),
(52, 2, 'Apple Safari 602.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) CriOS/56.0.2924.75 Mobile/14E5239e Safari/602.1', '219.91.211.20', '2018-01-30 07:06:33', '0000-00-00 00:00:00', '2018-01-30 09:06:33'),
(53, 2, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '39.41.183.69', '2018-01-30 08:21:01', '0000-00-00 00:00:00', '2018-01-30 10:21:01'),
(54, 6, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '39.41.183.69', '2018-01-30 08:24:00', '0000-00-00 00:00:00', '2018-01-30 10:24:00'),
(55, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-30 08:51:55', '0000-00-00 00:00:00', '2018-01-30 10:51:55'),
(56, 2, 'Google Chrome 63.0.3239.111', 'Mozilla/5.0 (Linux; Android 8.0.0; ONEPLUS A5000 Build/OPR6.170623.013) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36', '106.193.171.206', '2018-01-30 08:53:13', '0000-00-00 00:00:00', '2018-01-30 10:53:13'),
(57, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-30 08:53:15', '0000-00-00 00:00:00', '2018-01-30 10:53:15'),
(58, 2, 'Google Chrome 64.0.3282.123', 'Mozilla/5.0 (Linux; Android 7.0; SM-J730GM Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.123 Mobile Safari/537.36', '49.35.239.233', '2018-01-30 10:52:27', '0000-00-00 00:00:00', '2018-01-30 12:52:27'),
(59, 2, 'Google Chrome 63.0.3239.111', 'Mozilla/5.0 (Linux; Android 5.1; XT1052 Build/LPAS23.12-15.5-1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36', '49.35.27.183', '2018-01-30 11:05:29', '0000-00-00 00:00:00', '2018-01-30 13:05:29'),
(60, 2, 'Google Chrome 63.0.3239.111', 'Mozilla/5.0 (Linux; Android 7.1.1; Infinix Zero 4 Plus Build/NMF26O) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36', '202.69.12.248', '2018-01-30 11:05:39', '0000-00-00 00:00:00', '2018-01-30 13:05:39'),
(61, 2, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '31.52.156.27', '2018-01-30 11:05:56', '0000-00-00 00:00:00', '2018-01-30 13:05:56'),
(62, 7, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '39.41.48.120', '2018-01-30 12:19:52', '0000-00-00 00:00:00', '2018-01-30 14:19:52'),
(63, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '31.52.156.27', '2018-01-30 12:23:55', '0000-00-00 00:00:00', '2018-01-30 14:23:55'),
(64, 2, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '202.69.12.248', '2018-01-30 12:36:59', '0000-00-00 00:00:00', '2018-01-30 14:36:59'),
(65, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '31.52.156.27', '2018-01-30 12:41:21', '0000-00-00 00:00:00', '2018-01-30 14:41:21'),
(66, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '31.52.156.27', '2018-01-30 12:42:25', '0000-00-00 00:00:00', '2018-01-30 14:42:25'),
(67, 7, 'Google Chrome 63.0.3239.111', 'Mozilla/5.0 (Linux; Android 7.1.1; Infinix Zero 4 Plus Build/NMF26O) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36', '202.69.12.248', '2018-01-30 12:45:52', '0000-00-00 00:00:00', '2018-01-30 14:45:52'),
(68, 7, 'Google Chrome 50.0.2661.89', 'Mozilla/5.0 (Linux; Android 5.1.1; VF-1397 Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Safari/537.36', '31.52.156.27', '2018-01-30 12:57:26', '0000-00-00 00:00:00', '2018-01-30 14:57:26'),
(69, 7, 'Google Chrome 4.0', 'Mozilla/5.0 (Linux; Android 4.4.3; HTC_Desire_510 Build/KTU84L) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/38.0.0.0 Mobile Safari/537.36', '39.41.48.120', '2018-01-30 13:07:09', '0000-00-00 00:00:00', '2018-01-30 15:07:09'),
(70, 7, 'Google Chrome 64.0.3282.116', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-T365 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.116 Safari/537.36', '31.52.156.27', '2018-01-30 14:05:33', '0000-00-00 00:00:00', '2018-01-30 16:05:33'),
(71, 7, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '202.69.12.250', '2018-01-31 03:28:46', '0000-00-00 00:00:00', '2018-01-31 05:28:46'),
(72, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-31 03:33:49', '0000-00-00 00:00:00', '2018-01-31 05:33:49'),
(73, 2, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '202.69.12.250', '2018-01-31 07:18:36', '0000-00-00 00:00:00', '2018-01-31 09:18:36'),
(74, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.159.198', '2018-01-31 07:59:23', '0000-00-00 00:00:00', '2018-01-31 09:59:23'),
(75, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-31 08:01:48', '0000-00-00 00:00:00', '2018-01-31 10:01:48'),
(76, 2, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '202.69.12.250', '2018-01-31 08:12:43', '0000-00-00 00:00:00', '2018-01-31 10:12:43'),
(77, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.159.198', '2018-01-31 08:13:41', '0000-00-00 00:00:00', '2018-01-31 10:13:41'),
(78, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '219.91.211.20', '2018-01-31 08:13:53', '0000-00-00 00:00:00', '2018-01-31 10:13:53'),
(79, 7, 'Google Chrome 64.0.3282.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', '202.69.12.250', '2018-01-31 09:50:57', '0000-00-00 00:00:00', '2018-01-31 10:50:57'),
(80, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '39.41.14.131', '2018-02-06 07:02:33', '0000-00-00 00:00:00', '2018-02-06 08:02:33'),
(81, 2, 'Google Chrome 63.0.3239.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '39.41.14.131', '2018-02-06 07:31:16', '0000-00-00 00:00:00', '2018-02-06 08:31:16'),
(82, 2, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36', '202.69.12.252', '2018-02-07 10:20:35', '0000-00-00 00:00:00', '2018-02-07 11:20:35'),
(83, 2, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36', '202.69.12.22', '2018-02-09 10:12:47', '0000-00-00 00:00:00', '2018-02-09 11:12:47'),
(84, 2, 'Mozilla Firefox 46.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', '89.237.101.38', '2018-02-09 10:20:41', '0000-00-00 00:00:00', '2018-02-09 11:20:41'),
(85, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '202.69.15.229', '2018-02-28 12:12:12', '0000-00-00 00:00:00', '2018-02-28 13:12:12'),
(86, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '31.51.36.104', '2018-02-28 14:09:18', '0000-00-00 00:00:00', '2018-02-28 15:09:18'),
(87, 2, 'Mozilla Firefox 45.0', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0', '89.237.78.205', '2018-02-28 14:16:02', '0000-00-00 00:00:00', '2018-02-28 15:16:02'),
(88, 2, 'Google Chrome 64.0.3282.137', 'Mozilla/5.0 (Linux; Android 7.1.1; Infinix Zero 4 Plus Build/NMF26O) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.137 Mobile Safari/537.36', '37.111.128.13', '2018-03-01 05:22:24', '0000-00-00 00:00:00', '2018-03-01 06:22:24'),
(89, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '37.111.128.13', '2018-03-01 05:23:53', '0000-00-00 00:00:00', '2018-03-01 06:23:53'),
(90, 7, 'Google Chrome 65.0.3325.85', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-T365 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.85 Safari/537.36', '81.129.152.162', '2018-03-01 09:42:58', '0000-00-00 00:00:00', '2018-03-01 10:42:58'),
(91, 7, 'Google Chrome 65.0.3325.109', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-T365 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.109 Safari/537.36', '81.129.152.162', '2018-03-01 10:06:39', '0000-00-00 00:00:00', '2018-03-01 11:06:39'),
(92, 7, 'Google Chrome 65.0.3325.109', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-T365 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.109 Safari/537.36', '81.129.152.162', '2018-03-01 10:10:22', '0000-00-00 00:00:00', '2018-03-01 11:10:22'),
(93, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '81.129.152.162', '2018-03-01 10:19:59', '0000-00-00 00:00:00', '2018-03-01 11:19:59'),
(94, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '37.111.128.13', '2018-03-01 10:22:01', '0000-00-00 00:00:00', '2018-03-01 11:22:01'),
(95, 7, 'Google Chrome 65.0.3325.109', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-T365 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.109 Safari/537.36', '81.129.152.162', '2018-03-01 10:59:00', '0000-00-00 00:00:00', '2018-03-01 11:59:00'),
(96, 2, 'Google Chrome 64.0.3282.137', 'Mozilla/5.0 (Linux; Android 7.1.1; Infinix Zero 4 Plus Build/NMF26O) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.137 Mobile Safari/537.36', '37.111.128.13', '2018-03-01 11:34:52', '0000-00-00 00:00:00', '2018-03-01 12:34:52'),
(97, 2, 'Google Chrome 4.0', 'Mozilla/5.0 (Linux; Android 4.4.3; HTC_Desire_510 Build/KTU84L) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/38.0.0.0 Mobile Safari/537.36', '39.41.26.182', '2018-03-01 11:40:03', '0000-00-00 00:00:00', '2018-03-01 12:40:03'),
(98, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '86.180.212.140', '2018-03-01 15:36:23', '0000-00-00 00:00:00', '2018-03-01 16:36:23'),
(99, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '86.180.212.140', '2018-03-01 16:01:31', '0000-00-00 00:00:00', '2018-03-01 17:01:31'),
(100, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '86.180.212.140', '2018-03-02 08:30:14', '0000-00-00 00:00:00', '2018-03-02 09:30:14'),
(101, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '37.111.128.8', '2018-03-02 09:22:29', '0000-00-00 00:00:00', '2018-03-02 10:22:29'),
(102, 2, 'Google Chrome 64.0.3282.137', 'Mozilla/5.0 (Linux; Android 7.1.1; Infinix Zero 4 Plus Build/NMF26O) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.137 Mobile Safari/537.36', '39.41.12.41', '2018-03-02 10:12:39', '0000-00-00 00:00:00', '2018-03-02 11:12:39'),
(103, 7, 'Google Chrome 56.0.2924.87', 'Mozilla/5.0 (Linux; Android 5.1.1; SAMSUNG SM-T365 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/6.4 Chrome/56.0.2924.87 Safari/537.36', '81.129.152.162', '2018-03-02 10:23:13', '0000-00-00 00:00:00', '2018-03-02 11:23:13'),
(104, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '81.129.152.162', '2018-03-02 10:36:39', '0000-00-00 00:00:00', '2018-03-02 11:36:39'),
(105, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '81.129.152.162', '2018-03-02 10:36:41', '0000-00-00 00:00:00', '2018-03-02 11:36:41'),
(106, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '37.111.128.134', '2018-03-02 12:29:51', '0000-00-00 00:00:00', '2018-03-02 13:29:51'),
(107, 2, 'Mozilla Firefox 38.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', '5.28.181.192', '2018-03-05 05:37:37', '0000-00-00 00:00:00', '2018-03-05 06:37:37'),
(108, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '81.152.120.123', '2018-03-05 10:42:20', '0000-00-00 00:00:00', '2018-03-05 11:42:20'),
(109, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '37.111.128.183', '2018-03-06 12:30:41', '0000-00-00 00:00:00', '2018-03-06 13:30:41'),
(110, 10, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '2a02:c7f:ae81:c000:3061:13a6:37f0:52fc', '2018-03-07 20:38:44', '0000-00-00 00:00:00', '2018-03-07 21:38:44'),
(111, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '37.111.128.236', '2018-03-08 10:01:46', '0000-00-00 00:00:00', '2018-03-08 11:01:46'),
(112, 2, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '37.111.128.37', '2018-03-09 07:05:37', '0000-00-00 00:00:00', '2018-03-09 08:05:37'),
(113, 2, 'Google Chrome 65.0.3325.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', '37.111.128.139', '2018-03-13 09:53:47', '0000-00-00 00:00:00', '2018-03-13 10:53:47'),
(114, 2, 'Google Chrome 65.0.3325.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', '37.111.128.139', '2018-03-13 09:56:06', '0000-00-00 00:00:00', '2018-03-13 10:56:06'),
(115, 2, 'Google Chrome 65.0.3325.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', '37.111.128.139', '2018-03-13 10:10:17', '0000-00-00 00:00:00', '2018-03-13 11:10:17'),
(116, 2, 'Google Chrome 65.0.3325.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', '37.111.128.139', '2018-03-13 10:20:11', '0000-00-00 00:00:00', '2018-03-13 11:20:11'),
(117, 2, 'Google Chrome 65.0.3325.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', '37.111.128.139', '2018-03-13 11:07:39', '0000-00-00 00:00:00', '2018-03-13 12:07:39'),
(118, 2, 'Google Chrome 65.0.3325.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', '37.111.128.139', '2018-03-13 11:10:39', '0000-00-00 00:00:00', '2018-03-13 12:10:39'),
(119, 2, 'Mozilla Firefox 46.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', '89.237.109.103', '2018-03-15 06:02:32', '0000-00-00 00:00:00', '2018-03-15 07:02:32'),
(120, 7, 'Mozilla Firefox 58.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2a00:23c0:104:b401:797f:11c0:6f6:ada3', '2018-03-15 12:39:28', '0000-00-00 00:00:00', '2018-03-15 13:39:28'),
(121, 10, 'Google Chrome 58.0.3029.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '185.81.194.26', '2018-03-15 12:53:50', '0000-00-00 00:00:00', '2018-03-15 13:53:50'),
(122, 10, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '185.81.194.26', '2018-03-15 15:58:34', '0000-00-00 00:00:00', '2018-03-15 16:58:34'),
(123, 2, 'Google Chrome 65.0.3325.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', '81.129.25.195', '2018-03-16 09:45:34', '0000-00-00 00:00:00', '2018-03-16 10:45:34'),
(124, 2, 'Mozilla Firefox 46.0', 'Mozilla/5.0 (Windows NT 6.1; rv:46.0) Gecko/20100101 Firefox/46.0', '89.237.109.103', '2018-03-18 13:13:43', '0000-00-00 00:00:00', '2018-03-18 14:13:43'),
(125, 2, 'Google Chrome 65.0.3325.146', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', '202.69.15.77', '2018-03-19 12:27:38', '0000-00-00 00:00:00', '2018-03-19 13:27:37'),
(126, 2, 'Google Chrome 65.0.3325.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', '81.129.25.195', '2018-03-19 14:51:16', '0000-00-00 00:00:00', '2018-03-19 15:51:16'),
(127, 10, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '185.81.194.26', '2018-03-20 09:32:23', '0000-00-00 00:00:00', '2018-03-20 10:32:22'),
(128, 10, 'Google Chrome 64.0.3282.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '185.81.194.26', '2018-03-20 09:32:23', '0000-00-00 00:00:00', '2018-03-20 10:32:23'),
(129, 2, 'Google Chrome 65.0.3325.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', '81.129.25.195', '2018-03-20 09:46:35', '0000-00-00 00:00:00', '2018-03-20 10:46:35'),
(130, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:d58c:a88d:8789:caa0', '2018-03-20 10:21:05', '0000-00-00 00:00:00', '2018-03-20 11:21:05'),
(131, 2, 'Mozilla Firefox 46.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', '89.237.111.70', '2018-03-22 10:52:03', '0000-00-00 00:00:00', '2018-03-22 11:52:03'),
(132, 2, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '81.129.25.195', '2018-03-22 11:20:03', '0000-00-00 00:00:00', '2018-03-22 12:20:03'),
(133, 2, 'Mozilla Firefox 45.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0', '89.237.111.70', '2018-03-24 10:14:43', '0000-00-00 00:00:00', '2018-03-24 11:14:43'),
(134, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '185.81.194.26', '2018-03-27 08:29:18', '0000-00-00 00:00:00', '2018-03-27 10:29:18'),
(135, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '185.81.194.26', '2018-03-28 08:24:54', '0000-00-00 00:00:00', '2018-03-28 10:24:54'),
(136, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:1560:d4ec:e0ef:7c95', '2018-03-28 11:42:39', '0000-00-00 00:00:00', '2018-03-28 13:42:39'),
(137, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_6 like Mac OS X) AppleWebKit/604.5.6 (KHTML, like Gecko) Version/11.0 Mobile/15D100 Safari/604.1', '213.205.242.121', '2018-03-29 00:48:40', '0000-00-00 00:00:00', '2018-03-29 02:48:40'),
(138, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_6 like Mac OS X) AppleWebKit/604.5.6 (KHTML, like Gecko) Version/11.0 Mobile/15D100 Safari/604.1', '213.205.242.121', '2018-03-29 00:48:41', '0000-00-00 00:00:00', '2018-03-29 02:48:41'),
(139, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.118.255', '2018-03-30 08:03:17', '0000-00-00 00:00:00', '2018-03-30 10:03:17'),
(140, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.107.169', '2018-04-04 04:30:49', '0000-00-00 00:00:00', '2018-04-04 06:30:49'),
(141, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:9ddc:41d8:af91:6d24', '2018-04-04 12:07:30', '0000-00-00 00:00:00', '2018-04-04 14:07:30'),
(142, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:9ddc:41d8:af91:6d24', '2018-04-04 13:02:26', '0000-00-00 00:00:00', '2018-04-04 15:02:26'),
(143, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '194.70.49.2', '2018-04-05 13:04:24', '0000-00-00 00:00:00', '2018-04-05 15:04:24'),
(144, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '2a00:23c0:4960:db01:29b9:7f35:d24b:8540', '2018-04-05 16:47:31', '0000-00-00 00:00:00', '2018-04-05 18:47:31'),
(145, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '185.81.194.26', '2018-04-06 13:01:21', '0000-00-00 00:00:00', '2018-04-06 15:01:21'),
(146, 10, 'Google Chrome 46.0.2486.0', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586', '185.81.194.26', '2018-04-06 15:50:45', '0000-00-00 00:00:00', '2018-04-06 17:50:45'),
(147, 10, 'Google Chrome 46.0.2486.0', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586', '185.81.194.26', '2018-04-09 08:52:08', '0000-00-00 00:00:00', '2018-04-09 10:52:08'),
(148, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '81.152.23.53', '2018-04-09 13:10:49', '0000-00-00 00:00:00', '2018-04-09 15:10:49'),
(149, 10, 'Google Chrome 46.0.2486.0', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586', '185.81.194.26', '2018-04-09 13:38:19', '0000-00-00 00:00:00', '2018-04-09 15:38:19'),
(150, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '185.81.194.26', '2018-04-09 14:45:45', '0000-00-00 00:00:00', '2018-04-09 16:45:45'),
(151, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '2a02:c7f:921e:dd00:bcfb:73c8:9c76:c042', '2018-04-10 03:24:59', '0000-00-00 00:00:00', '2018-04-10 05:24:59'),
(152, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '2a02:c7f:921e:dd00:bcfb:73c8:9c76:c042', '2018-04-10 03:24:59', '0000-00-00 00:00:00', '2018-04-10 05:24:59'),
(153, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.101.210', '2018-04-12 08:59:12', '0000-00-00 00:00:00', '2018-04-12 10:59:12'),
(154, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '194.70.49.2', '2018-04-12 13:08:54', '0000-00-00 00:00:00', '2018-04-12 15:08:54'),
(155, 14, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '2a02:c7d:1a84:d100:fd8d:8213:8cca:6e48', '2018-04-12 18:10:22', '0000-00-00 00:00:00', '2018-04-12 20:10:22'),
(156, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '81.152.23.53', '2018-04-13 07:56:11', '0000-00-00 00:00:00', '2018-04-13 09:56:11'),
(157, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '178.101.160.116', '2018-04-13 17:06:07', '0000-00-00 00:00:00', '2018-04-13 19:06:07'),
(158, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.69.69', '2018-04-15 06:40:14', '0000-00-00 00:00:00', '2018-04-15 08:40:14'),
(159, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '81.152.19.191', '2018-04-16 10:47:52', '0000-00-00 00:00:00', '2018-04-16 12:47:52'),
(160, 2, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '37.111.128.93', '2018-04-16 15:44:51', '0000-00-00 00:00:00', '2018-04-16 17:44:51'),
(161, 10, 'Google Chrome 58.0.3029.110', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '24.54.179.64', '2018-04-16 16:57:25', '0000-00-00 00:00:00', '2018-04-16 18:57:25'),
(162, 10, 'Google Chrome 58.0.3029.110', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '24.54.179.64', '2018-04-16 17:55:18', '0000-00-00 00:00:00', '2018-04-16 19:55:18'),
(163, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '24.54.179.65', '2018-04-16 18:18:58', '0000-00-00 00:00:00', '2018-04-16 20:18:58'),
(164, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '24.54.179.65', '2018-04-16 18:18:59', '0000-00-00 00:00:00', '2018-04-16 20:18:59'),
(165, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '81.152.19.191', '2018-04-16 18:23:15', '0000-00-00 00:00:00', '2018-04-16 20:23:15'),
(166, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '24.54.179.65', '2018-04-16 18:31:42', '0000-00-00 00:00:00', '2018-04-16 20:31:42'),
(167, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '24.54.179.65', '2018-04-16 18:31:43', '0000-00-00 00:00:00', '2018-04-16 20:31:43'),
(168, 10, 'Google Chrome 58.0.3029.110', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '24.54.179.64', '2018-04-16 23:50:31', '0000-00-00 00:00:00', '2018-04-17 01:50:31'),
(169, 10, 'Google Chrome 58.0.3029.110', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '24.54.179.64', '2018-04-16 23:50:32', '0000-00-00 00:00:00', '2018-04-17 01:50:32'),
(170, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:b15f:944c:8d84:c0de', '2018-04-17 10:34:59', '0000-00-00 00:00:00', '2018-04-17 12:34:59'),
(171, 2, 'Mozilla Firefox 46.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', '89.237.69.69', '2018-04-17 10:52:28', '0000-00-00 00:00:00', '2018-04-17 12:52:28'),
(172, 10, 'Google Chrome 58.0.3029.110', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '24.54.179.78', '2018-04-17 19:19:30', '0000-00-00 00:00:00', '2018-04-17 21:19:30'),
(173, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:f424:e5d:ef45:c617', '2018-04-18 09:08:57', '0000-00-00 00:00:00', '2018-04-18 11:08:57'),
(174, 13, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '194.70.49.2', '2018-04-18 10:00:00', '0000-00-00 00:00:00', '2018-04-18 12:00:00'),
(175, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '31.52.152.11', '2018-04-18 16:06:21', '0000-00-00 00:00:00', '2018-04-18 18:06:21'),
(176, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '213.205.198.4', '2018-04-18 21:38:40', '0000-00-00 00:00:00', '2018-04-18 23:38:40'),
(177, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '213.205.198.4', '2018-04-18 21:38:41', '0000-00-00 00:00:00', '2018-04-18 23:38:41'),
(178, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '213.205.198.4', '2018-04-18 21:38:41', '0000-00-00 00:00:00', '2018-04-18 23:38:41'),
(179, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '194.70.49.2', '2018-04-19 07:39:11', '0000-00-00 00:00:00', '2018-04-19 09:39:11'),
(180, 14, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '194.70.49.2', '2018-04-19 07:43:25', '0000-00-00 00:00:00', '2018-04-19 09:43:25'),
(181, 12, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '194.70.49.2', '2018-04-19 07:45:16', '0000-00-00 00:00:00', '2018-04-19 09:45:16'),
(182, 2, 'Mozilla Firefox 46.0', 'Mozilla/5.0 (Windows NT 6.1; rv:46.0) Gecko/20100101 Firefox/46.0', '89.237.69.69', '2018-04-19 08:25:47', '0000-00-00 00:00:00', '2018-04-19 10:25:47'),
(183, 2, 'Mozilla Firefox 45.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0', '89.237.69.69', '2018-04-19 09:02:29', '0000-00-00 00:00:00', '2018-04-19 11:02:29'),
(184, 10, 'Google Chrome 58.0.3029.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '24.54.179.76', '2018-04-19 18:18:41', '0000-00-00 00:00:00', '2018-04-19 20:18:41'),
(185, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:cd5d:36ed:4200:b572', '2018-04-20 09:50:14', '0000-00-00 00:00:00', '2018-04-20 11:50:14'),
(186, 10, 'Google Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '141.170.19.38', '2018-04-26 16:45:25', '0000-00-00 00:00:00', '2018-04-26 18:45:25'),
(187, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2a00:23c0:104:b401:251f:68e7:4592:f', '2018-05-02 09:53:17', '0000-00-00 00:00:00', '2018-05-02 11:53:17'),
(188, 2, 'Google Chrome 66.0.3359.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '202.69.12.242', '2018-05-02 11:04:33', '0000-00-00 00:00:00', '2018-05-02 13:04:33'),
(189, 2, 'Google Chrome 66.0.3359.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '202.69.12.242', '2018-05-02 11:10:13', '0000-00-00 00:00:00', '2018-05-02 13:10:13'),
(190, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '213.205.242.170', '2018-05-02 16:21:33', '0000-00-00 00:00:00', '2018-05-02 18:21:33'),
(191, 10, 'Apple Safari 11.0', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1', '213.205.242.170', '2018-05-02 16:21:35', '0000-00-00 00:00:00', '2018-05-02 18:21:35'),
(192, 7, 'Mozilla Firefox 59.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '81.132.155.70', '2018-05-07 11:48:40', '0000-00-00 00:00:00', '2018-05-07 13:48:40'),
(193, 10, 'Google Chrome 66.0.3359.139', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '2a00:23c3:67cb:2201:cd94:3634:e842:6226', '2018-05-07 11:54:28', '0000-00-00 00:00:00', '2018-05-07 13:54:28'),
(194, 10, 'Google Chrome 66.0.3359.139', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '2a00:23c3:67cb:2201:799b:d0f7:b575:64dc', '2018-05-08 08:41:47', '0000-00-00 00:00:00', '2018-05-08 10:41:47'),
(195, 10, 'Google Chrome 66.0.3359.139', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '2a00:23c3:67cb:2201:84d2:4857:41ba:8f19', '2018-05-08 10:08:07', '0000-00-00 00:00:00', '2018-05-08 12:08:07'),
(196, 10, 'Google Chrome 66.0.3359.139', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', '2a00:23c3:67cb:2201:c185:e4f6:cb63:f15c', '2018-05-09 14:29:03', '0000-00-00 00:00:00', '2018-05-09 16:29:03'),
(197, 10, 'Google Chrome 51.0.2704.79', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', '185.81.194.26', '2018-05-15 10:51:33', '0000-00-00 00:00:00', '2018-05-15 12:51:33'),
(198, 10, 'Google Chrome 51.0.2704.79', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', '185.81.194.26', '2018-05-15 11:07:24', '0000-00-00 00:00:00', '2018-05-15 13:07:24'),
(199, 10, 'Google Chrome 51.0.2704.79', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', '185.81.194.26', '2018-05-15 13:32:40', '0000-00-00 00:00:00', '2018-05-15 15:32:40'),
(200, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '5.28.165.189', '2018-05-22 04:31:27', '0000-00-00 00:00:00', '2018-05-22 06:31:27'),
(201, 10, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '185.81.194.26', '2018-05-22 11:53:20', '0000-00-00 00:00:00', '2018-05-22 13:53:20'),
(202, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '5.28.165.189', '2018-05-25 06:33:46', '0000-00-00 00:00:00', '2018-05-25 08:33:46'),
(203, 10, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '185.81.194.26', '2018-05-25 10:05:28', '0000-00-00 00:00:00', '2018-05-25 12:05:28'),
(204, 10, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '185.81.194.26', '2018-06-05 09:02:26', '0000-00-00 00:00:00', '2018-06-05 11:02:26'),
(205, 10, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '185.81.194.26', '2018-06-12 13:20:18', '0000-00-00 00:00:00', '2018-06-12 15:20:18'),
(206, 10, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '185.81.194.26', '2018-06-12 13:20:19', '0000-00-00 00:00:00', '2018-06-12 15:20:19'),
(207, 10, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '185.81.194.26', '2018-06-12 14:07:02', '0000-00-00 00:00:00', '2018-06-12 16:07:02'),
(208, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.79.203', '2018-06-13 05:50:52', '0000-00-00 00:00:00', '2018-06-13 07:50:52'),
(209, 7, 'Mozilla Firefox 60.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0', '2a00:23c0:104:b401:996e:6486:718d:1f29', '2018-06-13 09:29:02', '0000-00-00 00:00:00', '2018-06-13 11:29:02');
INSERT INTO `tbl_login_activities` (`id`, `user_id`, `user_agent`, `user_agent_detail`, `login_ip`, `time_enter`, `time_leave`, `date_time`) VALUES
(210, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.79.203', '2018-06-13 09:31:20', '0000-00-00 00:00:00', '2018-06-13 11:31:20'),
(211, 10, 'Google Chrome 64.0.3282.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '185.81.194.26', '2018-06-18 10:14:26', '0000-00-00 00:00:00', '2018-06-18 12:14:26'),
(212, 10, 'Google Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '185.81.194.26', '2018-06-20 16:38:00', '0000-00-00 00:00:00', '2018-06-20 18:38:00'),
(213, 10, 'Google Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '185.81.194.26', '2018-06-21 11:55:45', '0000-00-00 00:00:00', '2018-06-21 13:55:45'),
(214, 2, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.112.239', '2018-06-21 14:00:54', '0000-00-00 00:00:00', '2018-06-21 16:00:54'),
(215, 10, 'Google Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '185.81.194.26', '2018-06-21 15:32:00', '0000-00-00 00:00:00', '2018-06-21 17:32:00'),
(216, 10, 'Google Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '185.81.194.26', '2018-06-22 09:56:31', '0000-00-00 00:00:00', '2018-06-22 11:56:31'),
(217, 10, 'Google Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '185.81.194.26', '2018-06-22 13:43:38', '0000-00-00 00:00:00', '2018-06-22 15:43:38'),
(218, 10, 'Google Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '185.81.194.26', '2018-06-25 13:38:52', '0000-00-00 00:00:00', '2018-06-25 15:38:52'),
(219, 10, 'Google Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', '185.81.194.26', '2018-06-25 14:29:36', '0000-00-00 00:00:00', '2018-06-25 16:29:36'),
(220, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '185.81.194.26', '2018-06-27 11:52:02', '0000-00-00 00:00:00', '2018-06-27 13:52:02'),
(221, 7, 'Mozilla Firefox 60.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0', '2a00:23c0:104:b401:64af:3e8a:2fa2:9669', '2018-06-27 11:52:55', '0000-00-00 00:00:00', '2018-06-27 13:52:55'),
(222, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '185.81.194.26', '2018-06-28 09:14:24', '0000-00-00 00:00:00', '2018-06-28 11:14:24'),
(223, 7, 'Mozilla Firefox 60.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0', '2a00:23c0:104:b401:9970:c1fc:ee21:8aa5', '2018-06-29 12:02:00', '0000-00-00 00:00:00', '2018-06-29 14:02:00'),
(224, 2, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '182.182.250.51', '2018-07-01 07:08:05', '0000-00-00 00:00:00', '2018-07-01 09:08:05'),
(225, 2, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '182.182.250.51', '2018-07-01 07:13:27', '0000-00-00 00:00:00', '2018-07-01 09:13:27'),
(226, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '185.81.194.26', '2018-07-02 08:32:46', '0000-00-00 00:00:00', '2018-07-02 10:32:46'),
(227, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '185.81.194.26', '2018-07-02 08:32:49', '0000-00-00 00:00:00', '2018-07-02 10:32:49'),
(228, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '194.70.49.2', '2018-07-03 08:30:13', '0000-00-00 00:00:00', '2018-07-03 10:30:13'),
(229, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '194.70.49.2', '2018-07-03 11:55:51', '0000-00-00 00:00:00', '2018-07-03 13:55:51'),
(230, 2, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '182.183.1.40', '2018-07-04 04:02:35', '0000-00-00 00:00:00', '2018-07-04 06:02:35'),
(231, 1, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '182.183.1.40', '2018-07-04 04:09:22', '0000-00-00 00:00:00', '2018-07-04 06:09:22'),
(232, 2, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '182.183.1.40', '2018-07-04 04:10:35', '0000-00-00 00:00:00', '2018-07-04 06:10:35'),
(233, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '194.70.49.2', '2018-07-04 08:32:13', '0000-00-00 00:00:00', '2018-07-04 10:32:13'),
(234, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '92.207.181.22', '2018-07-05 08:25:50', '0000-00-00 00:00:00', '2018-07-05 10:25:50'),
(235, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '185.81.194.26', '2018-07-06 18:05:35', '0000-00-00 00:00:00', '2018-07-06 20:05:35'),
(236, 2, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '37.111.128.112', '2018-07-09 09:32:32', '0000-00-00 00:00:00', '2018-07-09 11:32:32'),
(237, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '194.70.49.2', '2018-07-10 09:37:41', '0000-00-00 00:00:00', '2018-07-10 11:37:41'),
(238, 7, 'Mozilla Firefox 61.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '2a00:23c0:104:b401:c43a:c7e:c06f:c577', '2018-07-12 17:55:53', '0000-00-00 00:00:00', '2018-07-12 19:55:53'),
(239, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '217.158.98.196', '2018-07-18 21:45:09', '0000-00-00 00:00:00', '2018-07-18 23:45:09'),
(240, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '2a00:23c0:4960:db01:a4ed:1fe9:1d6a:56c9', '2018-07-19 08:53:26', '0000-00-00 00:00:00', '2018-07-19 10:53:25'),
(241, 2, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '37.111.128.234', '2018-07-19 10:18:35', '0000-00-00 00:00:00', '2018-07-19 12:18:35'),
(242, 1, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '37.111.128.234', '2018-07-19 10:18:51', '0000-00-00 00:00:00', '2018-07-19 12:18:51'),
(243, 30, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '109.154.132.42', '2018-07-19 11:46:39', '0000-00-00 00:00:00', '2018-07-19 13:46:39'),
(244, 32, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '194.70.49.2', '2018-07-20 07:20:47', '0000-00-00 00:00:00', '2018-07-20 09:20:47'),
(245, 27, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '31.210.133.196', '2018-07-20 12:19:39', '0000-00-00 00:00:00', '2018-07-20 14:19:39'),
(246, 26, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '194.70.49.2', '2018-07-20 14:43:18', '0000-00-00 00:00:00', '2018-07-20 16:43:18'),
(247, 27, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '31.210.133.196', '2018-07-20 15:02:17', '0000-00-00 00:00:00', '2018-07-20 17:02:17'),
(248, 29, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '31.210.133.196', '2018-07-23 07:51:30', '0000-00-00 00:00:00', '2018-07-23 09:51:30'),
(249, 29, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '31.210.133.196', '2018-07-23 07:51:41', '0000-00-00 00:00:00', '2018-07-23 09:51:41'),
(250, 29, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '31.210.133.196', '2018-07-23 07:55:04', '0000-00-00 00:00:00', '2018-07-23 09:55:04'),
(251, 30, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '2a00:23c0:4960:db01:4103:6f6d:13fb:da90', '2018-07-23 16:02:53', '0000-00-00 00:00:00', '2018-07-23 18:02:53'),
(252, 30, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '2a00:23c0:4960:db01:4103:6f6d:13fb:da90', '2018-07-23 16:02:59', '0000-00-00 00:00:00', '2018-07-23 18:02:59'),
(253, 30, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '2a00:23c0:4960:db01:4103:6f6d:13fb:da90', '2018-07-23 16:03:02', '0000-00-00 00:00:00', '2018-07-23 18:03:02'),
(254, 32, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '37.111.128.210', '2018-07-24 09:58:21', '0000-00-00 00:00:00', '2018-07-24 11:58:21'),
(255, 32, 'Unknown ?', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15G77 [FBAN/MessengerForiOS;FBAV/160.0.0.49.95;FBBV/101168249;FBDV/iPhone10,6;FBMD/iPhone;FBSN/iOS;FBSV/11.4.1;FBSS/3;FBCR/vodafoneUK;FBID/phone;FBLC/', '185.73.151.161', '2018-07-24 10:02:56', '0000-00-00 00:00:00', '2018-07-24 12:02:56'),
(256, 32, 'Unknown ?', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15G77 [FBAN/MessengerForiOS;FBAV/160.0.0.49.95;FBBV/101168249;FBDV/iPhone10,6;FBMD/iPhone;FBSN/iOS;FBSV/11.4.1;FBSS/3;FBCR/vodafoneUK;FBID/phone;FBLC/', '185.73.151.161', '2018-07-24 10:03:03', '0000-00-00 00:00:00', '2018-07-24 12:03:03'),
(257, 32, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '119.158.122.234', '2018-07-24 10:22:18', '0000-00-00 00:00:00', '2018-07-24 12:22:18'),
(258, 32, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '37.111.128.210', '2018-07-24 10:35:33', '0000-00-00 00:00:00', '2018-07-24 12:35:33'),
(259, 26, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '194.70.49.2', '2018-07-24 14:36:30', '0000-00-00 00:00:00', '2018-07-24 16:36:30'),
(260, 32, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '37.111.128.220', '2018-07-25 07:08:05', '0000-00-00 00:00:00', '2018-07-25 09:08:05'),
(261, 7, 'Mozilla Firefox 61.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '2a00:23c0:104:b401:210a:5002:6686:7eb9', '2018-07-25 16:10:20', '0000-00-00 00:00:00', '2018-07-25 18:10:20'),
(262, 32, 'Google Chrome 68.0.3440.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', '202.69.15.82', '2018-07-26 05:39:55', '0000-00-00 00:00:00', '2018-07-26 07:39:52'),
(263, 10, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '185.81.194.26', '2018-07-31 15:22:57', '0000-00-00 00:00:00', '2018-07-31 17:22:57'),
(264, 25, 'Google Chrome 67.0.3396.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '185.81.194.26', '2018-07-31 15:23:57', '0000-00-00 00:00:00', '2018-07-31 17:23:57'),
(265, 7, 'Mozilla Firefox 61.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '2a00:23c0:104:b401:18cf:12da:6bf5:49cc', '2018-08-13 11:40:41', '0000-00-00 00:00:00', '2018-08-13 13:40:41'),
(266, 31, 'Google Chrome 68.0.3440.106', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '194.70.49.2', '2018-08-17 11:49:47', '0000-00-00 00:00:00', '2018-08-17 13:49:47'),
(267, 26, 'Google Chrome 68.0.3440.106', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '194.70.49.2', '2018-08-17 15:30:15', '0000-00-00 00:00:00', '2018-08-17 17:30:15'),
(268, 25, 'Google Chrome 68.0.3440.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '185.81.194.26', '2018-08-24 08:35:41', '0000-00-00 00:00:00', '2018-08-24 10:35:41'),
(269, 32, 'Google Chrome 68.0.3440.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '37.111.128.164', '2018-08-27 03:27:22', '0000-00-00 00:00:00', '2018-08-27 05:27:22'),
(270, 3, 'Google Chrome 68.0.3440.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '37.111.128.164', '2018-08-27 03:38:55', '0000-00-00 00:00:00', '2018-08-27 05:38:55'),
(271, 3, 'Google Chrome 60.0.3112.113', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', '89.237.101.197', '2018-08-27 17:03:48', '0000-00-00 00:00:00', '2018-08-27 19:03:48'),
(272, 32, 'Google Chrome 71.0.3578.98', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', '202.69.15.66', '2018-12-17 10:00:50', '0000-00-00 00:00:00', '2018-12-17 11:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media`
--

CREATE TABLE `tbl_media` (
  `id` int(11) NOT NULL,
  `report_type` varchar(255) DEFAULT NULL,
  `media_type` varchar(255) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `spool_report_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `text_desc` text,
  `media_objects` longtext,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_media`
--

INSERT INTO `tbl_media` (`id`, `report_type`, `media_type`, `report_id`, `spool_report_id`, `file_name`, `text_desc`, `media_objects`, `date_time`, `is_delete`) VALUES
(20, 'ultrasonic', NULL, 26, 31, 'e99224df6eeee668229c2e8602bdc465.jpg', '', NULL, '2018-04-16 17:58:53', NULL),
(21, 'ultrasonic', NULL, 35, 33, 'b16a87a6847a767a30e8e189254d741c.jpg', '', NULL, '2018-07-03 10:16:51', NULL),
(22, 'ultrasonic', NULL, 38, 43, 'ee6aa3965cd381609c2615771bb2c1b3.JPG', 'INX02190 patch 12', NULL, '2018-08-24 09:02:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_sign_required`
--

CREATE TABLE `tbl_notification_sign_required` (
  `sign_required_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `spool_report_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `is_sign` enum('no','yes') DEFAULT 'no',
  `sign_for` enum('technician','supervision') DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notify`
--

CREATE TABLE `tbl_notify` (
  `notify_id` int(11) NOT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `report_type` int(11) DEFAULT NULL,
  `reporty_id` int(11) DEFAULT NULL,
  `spool_id` int(11) DEFAULT NULL,
  `spool_report_id` int(11) DEFAULT NULL,
  `rad_type_notification` tinyint(4) DEFAULT NULL COMMENT '1=radiographer,2=rad interpreter',
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `permission_id` int(11) NOT NULL,
  `role_id` tinyint(4) DEFAULT NULL,
  `permission_section` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`permission_id`, `role_id`, `permission_section`) VALUES
(1, 2, 'create_technician'),
(2, 2, 'create_client'),
(3, 2, 'edit_report'),
(4, 2, 'view_report'),
(5, 1, 'create_manager'),
(6, 2, 'delete_report'),
(7, 3, 'create_report'),
(8, 3, 'view_report'),
(9, 4, 'view_report'),
(10, 2, 'create_job'),
(11, 2, 'create_user'),
(12, 3, 'view_project_list'),
(13, 3, 'inspect_report'),
(14, 1, 'create_client'),
(15, 1, 'create_technician'),
(16, 1, 'view_report'),
(17, 1, 'create_job'),
(18, 2, 'view_report_dashboard'),
(19, 3, 'view_report_dashboard'),
(20, 4, 'view_report_dashboard'),
(21, 1, 'create_user'),
(22, 1, 'view_user_info'),
(23, 1, 'view_report_dashboard_project'),
(24, 2, 'view_report_dashboard_project'),
(25, 3, 'view_report_dashboard_project'),
(26, 1, 'view_completed_report'),
(27, 2, 'view_completed_report'),
(28, 3, 'view_completed_report'),
(29, 1, 'view_pending_report'),
(30, 2, 'view_pending_report'),
(31, 3, 'view_pending_report'),
(32, 3, 'view_rejected_report'),
(33, 3, 'view_rejected_report'),
(34, 3, 'view_rejected_report'),
(35, 4, 'view_completed_report'),
(36, 3, 'start_report'),
(37, 2, 'view_project_list'),
(38, 1, 'view_dashboard'),
(39, 2, 'view_dashboard'),
(40, 2, 'view_transmissal'),
(41, 4, 'view_transmissal'),
(42, 2, 'view_bay_manager'),
(43, 1, 'view_configuration_panel'),
(44, 1, 'view_detail_completed_report'),
(45, 2, 'view_detail_completed_report'),
(46, 3, 'view_detail_completed_report'),
(47, 1, 'delete_report'),
(48, 5, 'view_technician_list'),
(49, 2, 'start_report'),
(50, 2, 'view_rejected_report'),
(51, 1, 'delete_job'),
(52, 2, 'view_job'),
(53, 3, 'view_job'),
(54, 4, 'view_job'),
(55, 4, 'view_project_list_for_client'),
(56, 1, 'view_completed_reports_link'),
(57, 2, 'view_completed_reports_link'),
(58, 3, 'view_completed_reports_link'),
(59, 2, 'create_spool'),
(60, 3, 'create_spool'),
(61, 4, 'view_comments'),
(62, 2, 'view_edit_company'),
(63, 2, 'edit_spool'),
(64, 2, 'edit_drawing'),
(65, 4, 'view_completed_reports_link'),
(66, 1, 'delete_job'),
(67, 5, 'create_manager'),
(68, 5, 'create_client'),
(69, 5, 'create_technician'),
(70, 5, 'view_report'),
(71, 5, 'create_job'),
(72, 5, 'create_user'),
(73, 5, 'view_user_info'),
(74, 5, 'view_report_dashboard_project'),
(75, 5, 'view_completed_report'),
(76, 5, 'view_pending_report'),
(77, 5, 'view_dashboard'),
(78, 5, 'view_configuration_panel'),
(79, 5, 'view_detail_completed_report'),
(80, 5, 'delete_report'),
(81, 5, 'delete_job'),
(82, 5, 'view_completed_reports_link'),
(83, 5, 'delete_job'),
(98, 5, 'change_technician'),
(99, 1, 'view_live_tracker'),
(100, 2, 'view_live_tracker'),
(101, 3, 'view_live_tracker'),
(102, 2, 'view_reject'),
(103, 2, 'delete_spool_report_start'),
(104, 1, 'delete_spool_report_start'),
(105, 5, 'delete_spool_report_start'),
(106, 1, 'view_notified_reports'),
(107, 2, 'view_notified_reports'),
(108, 5, 'view_notified_reports'),
(109, 3, 'create_job'),
(110, 2, 'delete_job'),
(111, 2, 'view_reject'),
(112, 2, 'manager_required_sign'),
(113, 4, 'edit_internally_externally_reports'),
(114, 2, 'view_incomplete_report'),
(115, 3, 'view_incomplete_report'),
(116, 2, 'view_user_info'),
(117, 2, 'view_configuration_panel'),
(118, 2, 'create_duplicate_report'),
(119, 3, 'create_duplicate_report'),
(120, 2, 'create_report_start'),
(121, 3, 'create_report_start'),
(122, 3, 'create_user'),
(123, 3, 'create_technician'),
(124, 3, 'create_client'),
(125, 3, 'view_dashboard'),
(126, 3, 'view_user_info');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `report_title` varchar(40) DEFAULT NULL,
  `report_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `report_title`, `report_description`) VALUES
(1, 'UltraSonic', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` tinyint(4) NOT NULL,
  `role_title` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_title`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Technician'),
(4, 'Client'),
(5, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spools`
--

CREATE TABLE `tbl_spools` (
  `spool_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `spool_name` varchar(255) DEFAULT NULL,
  `drawing_no` varchar(255) DEFAULT NULL,
  `is_delete` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_spools`
--

INSERT INTO `tbl_spools` (`spool_id`, `job_id`, `spool_name`, `drawing_no`, `is_delete`, `update_date`, `date_time`) VALUES
(31, 27, '4\" SCH40 ORD STEEL', '0012345', NULL, NULL, '2018-04-16 10:48:59'),
(32, 28, '4\" SCH40 ORD STEEL', '001234567', NULL, NULL, '2018-04-16 10:49:37'),
(33, 29, '4\" SCH40 ORD STEEL', '00112233', NULL, NULL, '2018-04-16 10:50:26'),
(34, 30, '4\" SCH40 ORD STEEL', '0011223344', NULL, NULL, '2018-04-16 10:51:16'),
(35, 31, '4\" SCH40 ORD STEEL', '0012343', NULL, NULL, '2018-04-16 10:53:38'),
(36, 32, '4\" SCH40 ORD STEEL', '*Please confirm', NULL, NULL, '2018-04-16 10:54:06'),
(37, 33, '4\" SCH40 ORD STEEL', '*Please confirm', NULL, NULL, '2018-04-16 10:55:26'),
(38, 34, '4\" SCH40 ORD STEEL', '*Please confirm', NULL, NULL, '2018-04-16 10:55:51'),
(39, 35, '4\" SCH40 ORD STEEL', '*Please confirm', NULL, NULL, '2018-04-16 10:56:24'),
(40, 36, '4\" SCH40 ORD STEEL', '*Please confirm', NULL, NULL, '2018-04-16 10:56:48'),
(41, 37, '4\" SCH40 ORD STEEL', '*Please confirm', NULL, NULL, '2018-04-16 10:57:38'),
(42, 38, '4\" SCH40 ORD STEEL', '*Please confirm', NULL, NULL, '2018-04-16 10:58:27'),
(43, 39, 'NPS 12\", Sch 40, 11 bar Energy line Loop 3, Section F-W', 'n/a', NULL, NULL, '2018-08-24 08:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spool_reports`
--

CREATE TABLE `tbl_spool_reports` (
  `spool_report_id` int(11) NOT NULL,
  `spool_id` int(11) DEFAULT NULL,
  `report_type_id` int(11) DEFAULT NULL,
  `reject_counter` int(11) DEFAULT '0',
  `is_pre_post` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=default,1=pre,post=2',
  `status` enum('start','process','tech-1','supervisor','completed') NOT NULL DEFAULT 'start',
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spool_reports`
--

INSERT INTO `tbl_spool_reports` (`spool_report_id`, `spool_id`, `report_type_id`, `reject_counter`, `is_pre_post`, `status`, `date_time`, `is_delete`) VALUES
(31, 31, 1, 0, 1, 'process', '2018-04-16 10:48:59', NULL),
(32, 32, 1, 0, 1, 'process', '2018-04-16 10:49:37', NULL),
(33, 33, 1, 0, 1, 'process', '2018-04-16 10:50:26', NULL),
(34, 34, 1, 0, 1, 'process', '2018-04-16 10:51:16', NULL),
(35, 35, 1, 0, 1, 'process', '2018-04-16 10:53:38', NULL),
(36, 36, 1, 0, 1, 'process', '2018-04-16 10:54:06', NULL),
(37, 37, 1, 0, 1, 'process', '2018-04-16 10:55:26', NULL),
(38, 38, 1, 0, 1, 'process', '2018-04-16 10:55:51', NULL),
(39, 39, 1, 0, 1, 'process', '2018-04-16 10:56:24', NULL),
(40, 40, 1, 0, 1, 'process', '2018-04-16 10:56:48', NULL),
(41, 41, 1, 0, 1, 'process', '2018-04-16 10:57:38', NULL),
(42, 42, 1, 0, 1, 'process', '2018-04-16 10:58:27', NULL),
(43, 43, 1, 0, 1, 'process', '2018-08-24 08:47:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thickness`
--

CREATE TABLE `tbl_thickness` (
  `id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `spool_report_id` int(11) DEFAULT NULL,
  `spool_id` int(11) DEFAULT NULL,
  `test_point` varchar(255) DEFAULT NULL,
  `feature` varchar(255) DEFAULT NULL,
  `daimeter` varchar(255) DEFAULT NULL,
  `normal_thick` varchar(255) DEFAULT NULL,
  `min_thick` varchar(255) DEFAULT NULL,
  `location` char(24) DEFAULT NULL,
  `max_thick` varchar(255) DEFAULT NULL,
  `ascan_image` text,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_thickness`
--

INSERT INTO `tbl_thickness` (`id`, `report_id`, `job_id`, `spool_report_id`, `spool_id`, `test_point`, `feature`, `daimeter`, `normal_thick`, `min_thick`, `location`, `max_thick`, `ascan_image`, `comment`) VALUES
(23, 26, 27, 31, 31, '', '', '', '', '', NULL, '5.72', 'scan_22944f3ec4b6ee0ffd4ece890f0bc49f.png', ''),
(24, 27, 38, 42, 42, '1', 'straight section', '114.3', '22.48', '10', 'eee100000000060000500002', '30', 'scan_7ac32ebbcc538464ec7e049a1613d26c.png', ''),
(25, 28, 37, 41, 41, '1', 'straight section', '114.3', '6.02', 'A', NULL, '', 'report_images', ''),
(26, 29, 36, 40, 40, '1', 'straight section', '114.3', '6.02', 'A', NULL, '', 'report_images', ''),
(27, 30, 35, 39, 39, '1', 'straight section', '114.3', '6.02', 'A', NULL, '', 'report_images', ''),
(28, 31, 34, 38, 38, '1', 'straight section', '114.3', '6.02', 'A', NULL, '', 'report_images', ''),
(29, 32, 32, 36, 36, '1', 'straight section', '114.3', '6.02', 'A', NULL, '', 'report_images', ''),
(30, 33, 31, 35, 35, '1', 'straight section', '114.3', '6.02', 'A', NULL, '', 'report_images', ''),
(31, 34, 30, 34, 34, '1', 'straight section', '114.3', '6.02', 'A', NULL, '', 'report_images', ''),
(32, 35, 29, 33, 33, '1', 'straight section', '114.3', '6.02', '5.60', NULL, '10.6', 'scan_edaa491a28f8f14ba3265e3897f43061.png', ''),
(33, 36, 28, 32, 32, '1', 'straight section', '114.3', '6.02', 'A', NULL, '4.92', 'scan_4278be3ee91fdb91c0000daf3a68164e.png', ''),
(34, 37, 33, 37, 37, '1', 'straight section', '114.3', '6.02', 'A', NULL, '5.02', 'scan_851334f4b58f636dde415985b3c333f5.png', ''),
(35, 38, 39, 43, 43, '', '', '', '', '', NULL, '', 'report_images', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ultrasonic_report`
--

CREATE TABLE `tbl_ultrasonic_report` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `spool_report_id` int(11) DEFAULT NULL,
  `spool_id` int(11) DEFAULT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `supervision_id` int(11) DEFAULT NULL,
  `report_status` enum('pending,','waiting_for_sign_tech','waiting_for_sign_supervision','approved','save-as-draft') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serail_no` varchar(255) DEFAULT NULL,
  `probe_type_no` varchar(255) DEFAULT NULL,
  `probe_serail_no` varchar(255) DEFAULT NULL,
  `angle_i` varchar(255) DEFAULT NULL,
  `frequency_i` varchar(255) DEFAULT NULL,
  `angle_ii` varchar(255) DEFAULT NULL,
  `flaw_detector_manufacture` varchar(255) DEFAULT NULL,
  `crystle_size_i` varchar(255) DEFAULT NULL,
  `crystle_size_ii` varchar(255) DEFAULT NULL,
  `frequency_ii` varchar(255) DEFAULT NULL,
  `senstivity_sett_i` varchar(255) DEFAULT NULL,
  `senstivity_sett_ii` varchar(255) DEFAULT NULL,
  `rang_i` varchar(255) DEFAULT NULL,
  `rang_ii` varchar(255) DEFAULT NULL,
  `couplant` varchar(255) DEFAULT NULL,
  `test_temp` varchar(255) DEFAULT NULL,
  `surface` varchar(255) DEFAULT NULL,
  `test_restriction` varchar(255) DEFAULT NULL,
  `set_performance` varchar(255) DEFAULT NULL,
  `probe_performance` varchar(255) DEFAULT NULL,
  `call_block` varchar(255) DEFAULT NULL,
  `ident` varchar(255) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `check_date` date DEFAULT NULL,
  `acceptance_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ultrasonic_report`
--

INSERT INTO `tbl_ultrasonic_report` (`id`, `job_id`, `spool_report_id`, `spool_id`, `technician_id`, `supervision_id`, `report_status`, `created_at`, `deleted_at`, `last_modified`, `model`, `serail_no`, `probe_type_no`, `probe_serail_no`, `angle_i`, `frequency_i`, `angle_ii`, `flaw_detector_manufacture`, `crystle_size_i`, `crystle_size_ii`, `frequency_ii`, `senstivity_sett_i`, `senstivity_sett_ii`, `rang_i`, `rang_ii`, `couplant`, `test_temp`, `surface`, `test_restriction`, `set_performance`, `probe_performance`, `call_block`, `ident`, `thickness`, `inspection_date`, `check_date`, `acceptance_date`) VALUES
(38, 39, 43, 43, 25, NULL, NULL, '2018-08-24 08:52:08', NULL, NULL, 'HT', '002', 'INX 02190', 'HS0310-25-113913Ex', '0', '5 ', '0', 'WAND', '10', '-', '-', '29.2', '-', '25', '-', 'Ag', '230', 'SA2.5', 'none', 'Yes', 'Yes', 'integrated', '304', '25', NULL, NULL, NULL),
(37, 33, 37, 37, 10, NULL, NULL, '2018-04-19 18:37:00', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '-', '-', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '-', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(36, 28, 32, 32, 7, NULL, NULL, '2018-04-16 18:30:11', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(35, 29, 33, 33, 7, NULL, NULL, '2018-04-16 18:29:19', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(34, 30, 34, 34, 7, NULL, NULL, '2018-04-16 18:28:41', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(33, 31, 35, 35, 7, NULL, NULL, '2018-04-16 18:28:05', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(32, 32, 36, 36, 7, NULL, NULL, '2018-04-16 18:27:25', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(31, 34, 38, 38, 7, NULL, NULL, '2018-04-16 18:26:46', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(30, 35, 39, 39, 7, NULL, NULL, '2018-04-16 18:26:01', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(29, 36, 40, 40, 7, NULL, NULL, '2018-04-16 18:25:26', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(28, 37, 41, 41, 7, NULL, NULL, '2018-04-16 18:24:50', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(27, 38, 42, 42, 7, NULL, NULL, '2018-04-16 18:24:04', NULL, NULL, 'WAND', '1', 'HS0310-25-111911', 'INX1812', '0', '3', '0', 'Inductosense', '10', '1', '1', 'a', 'a', '24', '24', 'Ag foil / 100 um', '350', 'SA2.5', '1', 'No', 'No', '304 SS, 25 mm', 'INX1812', '25', NULL, NULL, NULL),
(26, 27, 31, 31, 10, NULL, NULL, '2018-04-16 17:15:35', NULL, NULL, 'HT', '0000', '2085', 'HS0310-25', '0', '3', '0', 'IND', '10', '-', '-', '0', '0', '25', '-', 'Ag', '21', 'White', 'NACE DEMO', 'No', 'No', 'DL', '2085', '5.5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE `tbl_useraccounts` (
  `user_id` int(11) NOT NULL,
  `role_id` tinyint(4) DEFAULT NULL COMMENT 'From tbl_role',
  `user_email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `v_password` varchar(100) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` int(1) NOT NULL DEFAULT '1',
  `is_send_notification` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`user_id`, `role_id`, `user_email`, `username`, `password`, `v_password`, `join_date`, `user_status`, `is_send_notification`) VALUES
(1, 1, 'scott@rdtsoftware.com', 'super.admin', '6818b37356304192c4e8f4b9fd92ce42', 'gE0nX2vk', '2017-11-13 07:56:44', 1, 'Yes'),
(3, 3, 'mujtaba@rdtsoftware.com', 'dev-tech2', 'd2e9c16d52400eb7e5ecdaa615ed55c7', 'Op)b2VhN', '2017-11-22 08:46:40', 1, 'Yes'),
(5, 3, 'sccot@gmail.com', 'dev-sup1', '84cb087c025ebac513f8a0b80d8c4bf0', '2EgkFG5c', '2017-12-19 07:00:39', 1, 'Yes'),
(6, 4, 'dev-client@gmail.com', 'dev-client1', '60543c233137471c9a794209cf990565', 'qEWwTbV&', '2018-01-30 08:23:25', 1, 'Yes'),
(7, 3, 'scott@rdtsoftware.com', 'scottseeley', 'c2b5d7537140f9806f86ae3117947334', 'welcome75', '2018-01-30 11:17:34', 1, 'Yes'),
(8, 3, 'Ovean-Super1@ionix.com', 'Ovean-Super1', '24f9c88181bb47c926613f80c7785a30', 'O10Spqy_', '2018-02-28 14:11:39', 1, 'Yes'),
(9, 3, 'Ocean-Tech1@ionix.com', 'Ocean-Tech1', '7f7f025f0b453640d674cccaedbf1cf1', '8IyxkM&b', '2018-02-28 14:12:47', 1, 'Yes'),
(10, 3, 'demo@ionix.com', 'Demo1', 'd8721a18e9b54c01abdce53445620699', 'Gs6H1mY1', '2018-03-01 10:25:20', 1, 'Yes'),
(12, 3, 'demo3@ionix.com', 'Demo3', 'f5406834fb0a2da4a1d81123631e70b5', '@J1U9U6S', '2018-03-01 10:25:53', 1, 'Yes'),
(13, 3, 'demo4@ionix.com', 'Demo4', '04bc6ee5703358c87c66576973432cda', 'ANk0Hyf9', '2018-03-01 10:26:03', 1, 'Yes'),
(14, 3, 'demo2@ionix.com', 'Demo2', 'a059c7b370c84749f0ec2ed3de655341', 'vEwL%34D', '2018-03-01 10:27:02', 1, 'Yes'),
(25, 3, 'tim.stevenson@ionix.at', 'tim.stevenson', '6e5625667e845f47c5276242b9fa1977', 'X%)99567', '2018-07-19 11:03:14', 1, 'Yes'),
(26, 3, 'jjenkins@oceaneering.com', 'jason.jenkins', 'ba9beb6aacf2a3cb1cfb9f2e302c0c6c', '89Yc^YIm', '2018-07-19 11:11:10', 1, 'Yes'),
(27, 3, 'bamboo@inductosense.com', 'bamboo.zhong', '311d29abd182984ecdb44ad86c2f40e5', 'CU7PDS@Y', '2018-07-19 11:13:21', 1, 'Yes'),
(28, 3, 'david.martin@ionix.at', 'dvid.martin', '9e97fe81d0cd9eaa794b9af129c9cc67', 'W@D^P&fZ', '2018-07-19 11:20:57', 1, 'Yes'),
(29, 3, 'alex@inductosense.com', 'alex.mortin', '991d47d3d833f0195b912cc15e6c54df', '@iXp5g&q', '2018-07-19 11:28:41', 1, 'Yes'),
(30, 3, 'ileslie@oceaneering.com', 'ianl.eslie', '4a1ffcf3b13dbf35fff07ce1e3d0d7b6', 'JH5e&DBE', '2018-07-19 11:40:05', 1, 'Yes'),
(31, 3, 'trowlands@oceaneering.com', 'tom.rowlands', 'fb391681fe3edb9c0d69ed27c5cc34ae', '@FVt(Oif', '2018-07-19 11:50:19', 1, 'Yes'),
(32, 3, '', 'huw.lewis', '0e5657b78405edd021cffb3622ce1a36', 'VCNM0kev', '2018-07-19 11:54:13', 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userclients`
--

CREATE TABLE `tbl_userclients` (
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `digital_signature` varchar(100) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usermanagers`
--

CREATE TABLE `tbl_usermanagers` (
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `digital_signature` varchar(100) DEFAULT NULL,
  `is_qualified` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertechnicians`
--

CREATE TABLE `tbl_usertechnicians` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `digital_signature` varchar(100) DEFAULT NULL,
  `is_qualified` tinyint(4) NOT NULL,
  `techncician_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Radiographer, 2=RAD Interpreter'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertechnicians`
--

INSERT INTO `tbl_usertechnicians` (`user_id`, `first_name`, `last_name`, `position`, `qualification`, `digital_signature`, `is_qualified`, `techncician_type`) VALUES
(3, 'Head', 'technicains', 'technisain', 'PCN LII', '0d1ab910e2ed44737b31b21b2341e7c0.jpg', 0, 0),
(5, 'dev', 'supervision', 'supervision', 'PCN LII', '0f32d747158d8cb4e7730cde53d25854.jpg', 0, 0),
(7, 'scott', 'seeley', 'tech', 'PCN LII,PNC LIII,ASNT LII,ASNT LIII,CSWIP 3.01,CSWIP 3.1', 'a9f2b58b3546eb8ac8047e4b6ecc93ba.jpg', 0, 0),
(8, 'Ovean', 'Super', 'Supervisor', 'PCN LII', '0d1ab910e2ed44737b31b21b2341e7c0.jpg', 0, 0),
(9, 'Ocean', 'Tech1', 'technicain', 'PCN LII', '0d1ab910e2ed44737b31b21b2341e7c0.jpg', 0, 0),
(10, 'Demo', 'Demo', 'technicain', 'PCN LII', '43571854339e04e6ee340db7b1cd92e0.jpg', 0, 0),
(12, 'Demo', 'Demo', 'Supervisor', 'PCN LII', 'fb7c9f6a9cb9af65c2cb5aedd40d7339.jpg', 0, 0),
(13, 'Demo', 'Demo', 'Supervisor', 'PCN LII', '0cc70a2b767638a34abc2c81bd5f3236.jpg', 0, 0),
(14, 'Demo', 'Demo', 'technicain', 'PCN LII', '03acd4a4a986703a11ff5b95d69c8a18.jpg', 0, 0),
(25, 'Tim', 'Stevenson', 'Supervisor', 'PCN LII,PNC LIII,ASNT LII,ASNT LIII,CSWIP 3.01,CSWIP 3.1', 'a0a752fe5a2e193e2b06d20a4c00b6e9.jpg', 0, 0),
(26, 'Jason', 'Jenkins', 'Validation Manager', 'PCN LIII, ASNT LIII', 'e597267e595d33fa33c30dbfeb00ba54.jpg', 0, 0),
(27, 'Bamboo', 'Zhong', 'Supervisor', 'PCN LII', '6ed41e876b8f7ded96610ff33fd6b7b1.jpg', 0, 0),
(28, 'David', 'Martin', 'Supervisor', 'PCN LII', '7c9a2c2c3ab6f576266c0f58f8fa481f.jpg', 0, 0),
(29, 'Alex', 'Mortin', 'Supervisor', 'PCN LII,PNC LIII,ASNT LII,ASNT LIII,CSWIP 3.01,CSWIP 3.1', 'ef001ae1eca4b6e9373a9f7158e30232.jpg', 0, 0),
(30, 'Ian', 'Leslie', 'Supervisor', 'PCN LII,PNC LIII,ASNT LII,ASNT LIII,CSWIP 3.01,CSWIP 3.1', '0502a17d0f64f48ab8547ff4038efd2b.jpg', 0, 0),
(31, 'Tom', 'Rowlands', 'Technician', 'PCN LII', '99e27a136fa60c6c125104112fcce32f.jpg', 0, 0),
(32, NULL, NULL, NULL, NULL, 'e766147b6e933cf7ff23fd5cbc243bb3.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_defects`
--
ALTER TABLE `tbl_defects`
  ADD PRIMARY KEY (`defect_id`);

--
-- Indexes for table `tbl_drop_down_data`
--
ALTER TABLE `tbl_drop_down_data`
  ADD PRIMARY KEY (`drop_down_id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `client_id` (`client_id`,`manager_id`),
  ADD KEY `technicain_id` (`manager_id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_activities`
--
ALTER TABLE `tbl_login_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification_sign_required`
--
ALTER TABLE `tbl_notification_sign_required`
  ADD PRIMARY KEY (`sign_required_id`);

--
-- Indexes for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_spools`
--
ALTER TABLE `tbl_spools`
  ADD PRIMARY KEY (`spool_id`);

--
-- Indexes for table `tbl_spool_reports`
--
ALTER TABLE `tbl_spool_reports`
  ADD PRIMARY KEY (`spool_report_id`);

--
-- Indexes for table `tbl_thickness`
--
ALTER TABLE `tbl_thickness`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location` (`location`);

--
-- Indexes for table `tbl_ultrasonic_report`
--
ALTER TABLE `tbl_ultrasonic_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spool_id` (`spool_id`);

--
-- Indexes for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_userclients`
--
ALTER TABLE `tbl_userclients`
  ADD KEY `user_id` (`user_id`,`company_id`),
  ADD KEY `copmany_id` (`company_id`);

--
-- Indexes for table `tbl_usermanagers`
--
ALTER TABLE `tbl_usermanagers`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_usertechnicians`
--
ALTER TABLE `tbl_usertechnicians`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `activity_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_defects`
--
ALTER TABLE `tbl_defects`
  MODIFY `defect_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_drop_down_data`
--
ALTER TABLE `tbl_drop_down_data`
  MODIFY `drop_down_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_login_activities`
--
ALTER TABLE `tbl_login_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;
--
-- AUTO_INCREMENT for table `tbl_media`
--
ALTER TABLE `tbl_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_notification_sign_required`
--
ALTER TABLE `tbl_notification_sign_required`
  MODIFY `sign_required_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_spools`
--
ALTER TABLE `tbl_spools`
  MODIFY `spool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_spool_reports`
--
ALTER TABLE `tbl_spool_reports`
  MODIFY `spool_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_thickness`
--
ALTER TABLE `tbl_thickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_ultrasonic_report`
--
ALTER TABLE `tbl_ultrasonic_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD CONSTRAINT `tbl_jobs_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD CONSTRAINT `tbl_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_thickness`
--
ALTER TABLE `tbl_thickness`
  ADD CONSTRAINT `tbl_thickness_ibfk_1` FOREIGN KEY (`location`) REFERENCES `tbl_locations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD CONSTRAINT `tbl_useraccounts_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_userclients`
--
ALTER TABLE `tbl_userclients`
  ADD CONSTRAINT `tbl_userclients_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tbl_company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_userclients_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_useraccounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_usermanagers`
--
ALTER TABLE `tbl_usermanagers`
  ADD CONSTRAINT `tbl_usermanagers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_useraccounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_usertechnicians`
--
ALTER TABLE `tbl_usertechnicians`
  ADD CONSTRAINT `tbl_usertechnicians_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_useraccounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
