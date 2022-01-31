-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2020 at 04:53 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idc`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `activity_type` enum('patient','doctor','administrator','staff') DEFAULT NULL,
  `activity_title` varchar(255) DEFAULT NULL,
  `activity_description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1518 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity_type`, `activity_title`, `activity_description`, `created_by`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 190, 'patient', 'edit a field', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Insurance By,insurance Number\"', 1, '2018-03-01 07:55:19', NULL, '2018-03-01 12:55:19'),
(2, 189, 'patient', 'edit field(s)', 'sohail Ahmad(25082189) is updated in IDCSG CRM with \"Email\"', 1, '2018-03-01 09:02:13', NULL, '2018-03-01 14:02:13'),
(3, 189, 'patient', 'edit field(s)', 'sohail Ahmad(25082189) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-03-01 09:08:08', NULL, '2018-03-01 14:08:08'),
(4, 189, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 09:30 - 11:45 at 1.3.2018', 1, '2018-03-01 10:17:45', NULL, '2018-03-01 15:17:45'),
(5, 189, 'patient', 'booked appointment', 'Appointment update for \"Wisdom Tooth Operation\" from 10:00 - 12:15 at ', 1, '2018-03-01 10:59:29', NULL, '2018-03-01 15:59:29'),
(6, 189, 'patient', 'booked appointment', 'Appointment update for \"Wisdom Tooth Operation\" from 10:15 - 12:30 at ', 1, '2018-03-01 10:59:44', NULL, '2018-03-01 15:59:44'),
(7, 189, 'patient', 'booked appointment', 'Appointment update for \"Wisdom Tooth Operation\" from 12:15 - 14:30 at ', 1, '2018-03-01 10:59:50', NULL, '2018-03-01 15:59:50'),
(8, 189, 'patient', 'deleted appointment', 'Appointment deleted for \"Wisdom Tooth Operation\" from 12:15 - 14:30 at 2018-03-01', 1, '2018-03-01 11:02:14', NULL, '2018-03-01 16:02:14'),
(13, 190, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:45 - 11:45 at 28.02.2018', 1, '2018-03-05 10:18:04', NULL, '2018-03-05 15:18:04'),
(21, 190, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 12:15 at 7.3.2018', 1, '2018-03-07 11:34:36', NULL, '2018-03-07 16:34:36'),
(23, 7, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:30 - 10:30 at 8.3.2018', 1, '2018-03-07 22:43:54', NULL, '2018-03-08 03:43:54'),
(24, 190, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:00 - 10:00 at 9.3.2018', 1, '2018-03-07 22:46:16', NULL, '2018-03-08 03:46:16'),
(26, 190, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 10:15 at 6.3.2018', 1, '2018-03-08 11:07:18', NULL, '2018-03-08 16:07:18'),
(40, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 12:15 at 15.03.2018', 1, '2018-03-13 07:52:54', NULL, '2018-03-13 12:52:54'),
(41, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 13:45 at 15.03.2018', 1, '2018-03-13 07:55:47', NULL, '2018-03-13 12:55:47'),
(42, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:15 - 12:00 at 2018-03-15', 1, '2018-03-13 08:18:47', NULL, '2018-03-13 13:18:47'),
(43, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:15 - 13:30 at 2018-03-15', 1, '2018-03-13 08:18:49', NULL, '2018-03-13 13:18:49'),
(44, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:45 - 17:45 at 16.03.2018', 1, '2018-03-13 08:19:16', NULL, '2018-03-13 13:19:16'),
(45, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:00 at 17.03.2018', 1, '2018-03-13 11:37:02', NULL, '2018-03-13 16:37:02'),
(48, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:45 at 14.03.2018', 1, '2018-03-14 05:40:19', NULL, '2018-03-14 10:40:19'),
(49, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 10:30 at 14.03.2018', 1, '2018-03-14 05:58:15', NULL, '2018-03-14 10:58:15'),
(50, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 12:45 at 2018-03-14', 1, '2018-03-14 06:03:34', NULL, '2018-03-14 11:03:34'),
(51, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 13:00 at 2018-03-14', 1, '2018-03-14 06:04:17', NULL, '2018-03-14 11:04:17'),
(52, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 13:15 at 2018-03-14', 1, '2018-03-14 06:04:20', NULL, '2018-03-14 11:04:20'),
(53, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:30 - 16:15 at 2018-03-14', 1, '2018-03-14 06:17:13', NULL, '2018-03-14 11:17:13'),
(54, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:00 - 10:15 at 2018-03-14', 1, '2018-03-14 06:17:14', NULL, '2018-03-14 11:17:14'),
(55, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 11:00 at 2018-03-14', 1, '2018-03-14 06:17:16', NULL, '2018-03-14 11:17:16'),
(56, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:30 at 2018-03-14', 1, '2018-03-14 06:17:18', NULL, '2018-03-14 11:17:18'),
(57, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 16:30 - 17:00 at 2018-03-14', 1, '2018-03-14 06:17:21', NULL, '2018-03-14 11:17:21'),
(58, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 17:15 - 18:15 at 2018-03-14', 1, '2018-03-14 06:17:23', NULL, '2018-03-14 11:17:23'),
(59, 85, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:15 - 13:45 at 17.03.2018', 1, '2018-03-14 06:18:12', NULL, '2018-03-14 11:18:12'),
(61, 85, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 12:00 at 19.03.2018', 1, '2018-03-14 09:37:38', NULL, '2018-03-14 14:37:38'),
(63, 85, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 10:45 - 11:45 at 17.03.2018', 1, '2018-03-15 04:31:44', NULL, '2018-03-15 09:31:44'),
(64, 7, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:30 - 11:45 at 17.03.2018', 1, '2018-03-15 04:32:12', NULL, '2018-03-15 09:32:12'),
(65, 7, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 14:15 - 14:30 at 2018-03-17', 1, '2018-03-15 04:32:23', NULL, '2018-03-15 09:32:23'),
(66, 7, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 14:15 - 15:45 at 2018-03-17', 1, '2018-03-15 04:32:25', NULL, '2018-03-15 09:32:25'),
(67, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:15 at 2018-03-14', 1, '2018-03-15 04:32:29', NULL, '2018-03-15 09:32:29'),
(68, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:00 at 2018-03-14', 1, '2018-03-15 04:32:34', NULL, '2018-03-15 09:32:34'),
(69, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 13:15 at 2018-03-14', 1, '2018-03-15 04:32:35', NULL, '2018-03-15 09:32:35'),
(70, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:30 - 16:45 at 17.03.2018', 1, '2018-03-15 04:33:05', NULL, '2018-03-15 09:33:05'),
(71, 7, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 12:45 - 14:15 at 11.03.2018', 1, '2018-03-15 04:33:23', NULL, '2018-03-15 09:33:23'),
(72, 7, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 11:30 - 13:45 at 12.03.2018', 1, '2018-03-15 04:33:45', NULL, '2018-03-15 09:33:45'),
(73, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:45 at 19.03.2018', 1, '2018-03-15 05:26:29', NULL, '2018-03-15 10:26:29'),
(87, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 10:45 at 21.03.2018', 1, '2018-03-20 07:17:39', NULL, '2018-03-20 12:17:39'),
(90, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 12:30 at 2018-03-21', 1, '2018-03-21 00:14:48', NULL, '2018-03-21 05:14:48'),
(91, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 13:00 at 2018-03-21', 1, '2018-03-21 00:14:51', NULL, '2018-03-21 05:14:51'),
(92, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 12:15 at 2018-03-21', 1, '2018-03-21 00:15:41', NULL, '2018-03-21 05:15:41'),
(93, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 12:00 at 2018-03-21', 1, '2018-03-21 00:15:44', NULL, '2018-03-21 05:15:44'),
(104, 137, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:00 - 11:45 at 26.03.2018', 1, '2018-03-26 10:26:36', NULL, '2018-03-26 15:26:36'),
(106, 75, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:30 at 01.04.2018', 1, '2018-03-27 09:32:38', NULL, '2018-03-27 14:32:38'),
(107, 128, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:30 at 01.04.2018', 1, '2018-03-27 09:34:48', NULL, '2018-03-27 14:34:48'),
(108, 36, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:30 - 11:15 at 28.03.2018', 1, '2018-03-27 09:38:42', NULL, '2018-03-27 14:38:42'),
(109, 72, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:30 at 27.03.2018', 1, '2018-03-27 09:49:00', NULL, '2018-03-27 14:49:00'),
(110, 29, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:45 at 27.03.2018', 1, '2018-03-27 09:52:13', NULL, '2018-03-27 14:52:13'),
(111, 123, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:30 at 27.03.2018', 1, '2018-03-27 09:53:37', NULL, '2018-03-27 14:53:37'),
(113, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:45 - 09:45 at 30.03.2018', 1, '2018-03-29 11:44:39', NULL, '2018-03-29 16:44:39'),
(115, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:45 - 11:15 at 2018-03-30', 1, '2018-03-30 10:26:59', NULL, '2018-03-30 15:26:59'),
(117, 36, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:15 - 12:00 at 2018-03-28', 1, '2018-03-31 01:57:08', NULL, '2018-03-31 06:57:08'),
(126, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 12:15 at 06.04.2018', 1, '2018-04-03 11:50:10', NULL, '2018-04-03 16:50:10'),
(127, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 12:15 at 06.04.2018', 1, '2018-04-03 11:50:53', NULL, '2018-04-03 16:50:53'),
(130, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 12:15 at 06.04.2018', 1, '2018-04-05 02:02:03', NULL, '2018-04-05 07:02:03'),
(133, 190, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:15 - 13:30 at ', 1, '2018-04-06 11:16:43', NULL, '2018-04-06 16:16:43'),
(134, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 13:15 at 2018-04-06', 1, '2018-04-06 11:17:08', NULL, '2018-04-06 16:17:08'),
(135, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 12:15 at 2018-04-06', 1, '2018-04-06 11:17:09', NULL, '2018-04-06 16:17:09'),
(136, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 12:30 at 2018-04-06', 1, '2018-04-06 11:17:10', NULL, '2018-04-06 16:17:10'),
(137, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 12:30 at 2018-04-07', 1, '2018-04-06 11:17:11', NULL, '2018-04-06 16:17:11'),
(138, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 12:45 at 2018-04-06', 1, '2018-04-06 11:17:14', NULL, '2018-04-06 16:17:14'),
(139, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:45 - 11:30 at 2018-04-07', 1, '2018-04-06 11:17:25', NULL, '2018-04-06 16:17:25'),
(140, 75, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:00 at 2018-04-07', 1, '2018-04-06 11:17:28', NULL, '2018-04-06 16:17:28'),
(143, 29, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:45 at ', 1, '2018-04-08 00:43:29', NULL, '2018-04-08 05:43:29'),
(144, 104, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 12:00 - 13:00 at ', 1, '2018-04-08 00:44:18', NULL, '2018-04-08 05:44:18'),
(145, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:15 at ', 1, '2018-04-08 00:49:23', NULL, '2018-04-08 05:49:23'),
(146, 29, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 11:00 at ', 1, '2018-04-08 00:52:26', NULL, '2018-04-08 05:52:26'),
(148, 29, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 11:00 at ', 1, '2018-04-08 06:44:35', NULL, '2018-04-08 11:44:35'),
(149, 29, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 11:00 at ', 1, '2018-04-08 06:44:43', NULL, '2018-04-08 11:44:43'),
(151, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:15 at ', 1, '2018-04-08 09:04:04', NULL, '2018-04-08 14:04:04'),
(152, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 11:30 at ', 1, '2018-04-08 10:43:05', NULL, '2018-04-08 15:43:05'),
(154, 36, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 12:45 - 12:45 at ', 1, '2018-04-09 00:07:44', NULL, '2018-04-09 05:07:44'),
(155, 36, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 12:45 - 13:00 at ', 1, '2018-04-09 00:11:10', NULL, '2018-04-09 05:11:10'),
(156, 7, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:15 - 13:45 at ', 1, '2018-04-09 01:14:04', NULL, '2018-04-09 06:14:04'),
(157, 14, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 14:00 - 14:15 at ', 1, '2018-04-09 01:14:21', NULL, '2018-04-09 06:14:21'),
(160, 190, 'patient', 'Add address', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with address Bank of America Merril Lynch test', 1, '2018-04-09 10:59:07', NULL, '2018-04-09 15:59:07'),
(168, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Salutation\"', 1, '2018-04-11 09:47:47', NULL, '2018-04-11 14:47:47'),
(169, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Salutation\"', 1, '2018-04-11 09:53:14', NULL, '2018-04-11 14:53:14'),
(170, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Insurance File\"', 1, '2018-04-11 11:34:55', NULL, '2018-04-11 16:34:55'),
(172, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Card Number\"', 1, '2018-04-12 10:03:42', NULL, '2018-04-12 15:03:42'),
(173, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-04-12 10:10:02', NULL, '2018-04-12 15:10:02'),
(174, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-04-12 10:42:13', NULL, '2018-04-12 15:42:13'),
(175, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Card Number\"', 1, '2018-04-12 10:48:24', NULL, '2018-04-12 15:48:24'),
(176, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-04-12 10:51:33', NULL, '2018-04-12 15:51:33'),
(177, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"New Contact Number[]\"', 1, '2018-04-12 10:59:48', NULL, '2018-04-12 15:59:48'),
(178, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"New Contact Number[]\"', 1, '2018-04-12 11:02:17', NULL, '2018-04-12 16:02:17'),
(181, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Document File\"', 1, '2018-04-13 01:30:13', NULL, '2018-04-13 06:30:13'),
(184, 191, 'patient', 'New patient added', 'Mujtaba ahmad(25082191) is added in IDCSG CRM', 1, '2018-04-13 10:27:25', NULL, '2018-04-13 15:27:25'),
(185, 192, 'patient', 'New patient added', 'Mujtaba Ahmad(25082192) is added in IDCSG CRM', 1, '2018-04-13 10:30:26', NULL, '2018-04-13 15:30:26'),
(186, 193, 'patient', 'New patient added', 'Mujtaba (25082193) is added in IDCSG CRM', 1, '2018-04-13 10:32:59', NULL, '2018-04-13 15:32:59'),
(187, 194, 'patient', 'New patient added', 'Mujtaba (25082194) is added in IDCSG CRM', 1, '2018-04-13 10:38:01', NULL, '2018-04-13 15:38:01'),
(190, 7, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:15 - 14:15 at ', 1, '2018-04-18 05:11:44', NULL, '2018-04-18 10:11:44'),
(193, 191, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 11:15 - 12:15 at ', 1, '2018-04-19 10:16:01', NULL, '2018-04-19 15:16:01'),
(235, 191, 'patient', 'deleted appointment', 'Appointment deleted for \"Wisdom Tooth Operation\" from 11:15 - 12:15 at 2018-04-20', 37, '2018-04-30 10:54:25', NULL, '2018-04-30 15:54:25'),
(236, 7, 'patient', 'deleted appointment', 'Appointment deleted for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:15 at 2018-04-09', 37, '2018-04-30 10:55:07', NULL, '2018-04-30 15:55:07'),
(242, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 09:49:54', NULL, '2018-05-14 14:49:54'),
(243, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 09:50:07', NULL, '2018-05-14 14:50:07'),
(244, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 09:57:59', NULL, '2018-05-14 14:57:59'),
(245, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:07:27', NULL, '2018-05-14 15:07:27'),
(246, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:08:06', NULL, '2018-05-14 15:08:06'),
(247, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:10:01', NULL, '2018-05-14 15:10:01'),
(248, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:10:15', NULL, '2018-05-14 15:10:15'),
(249, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:10:39', NULL, '2018-05-14 15:10:39'),
(250, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:10:48', NULL, '2018-05-14 15:10:48'),
(251, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:11:17', NULL, '2018-05-14 15:11:17'),
(252, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:11:43', NULL, '2018-05-14 15:11:43'),
(253, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:13:25', NULL, '2018-05-14 15:13:25'),
(254, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:13:54', NULL, '2018-05-14 15:13:54'),
(255, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:14:23', NULL, '2018-05-14 15:14:23'),
(256, 190, 'patient', 'edit field(s)', 'Hafsa Mujtaba(25082190) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-14 10:14:45', NULL, '2018-05-14 15:14:45'),
(265, 194, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 10:45 at ', 1, '2018-05-20 11:56:05', NULL, '2018-05-20 16:56:05'),
(269, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-05-21 10:48:26', NULL, '2018-05-21 15:48:26'),
(270, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-21 10:56:25', NULL, '2018-05-21 15:56:25'),
(271, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-21 10:56:37', NULL, '2018-05-21 15:56:37'),
(272, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-21 10:56:45', NULL, '2018-05-21 15:56:45'),
(273, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-21 11:01:52', NULL, '2018-05-21 16:01:52'),
(274, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-21 11:02:02', NULL, '2018-05-21 16:02:02'),
(275, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-05-21 11:15:15', NULL, '2018-05-21 16:15:15'),
(276, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Card Number,occupation\"', 1, '2018-05-21 11:17:28', NULL, '2018-05-21 16:17:28'),
(277, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Comapny Name\"', 1, '2018-05-21 11:19:36', NULL, '2018-05-21 16:19:36'),
(278, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Zipcode\"', 1, '2018-05-21 11:23:17', NULL, '2018-05-21 16:23:17'),
(279, 194, 'patient', 'edit field(s)', 'Mujtaba Ahmad(25082194) is updated in IDCSG CRM with \"Email\"', 1, '2018-05-21 11:23:52', NULL, '2018-05-21 16:23:52'),
(280, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Last Name,contact Number,state\"', 1, '2018-05-21 11:48:02', NULL, '2018-05-21 16:48:02'),
(281, 194, 'patient', 'Updated address', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with address Mohet Sector\r\nTehsil Ghazi', 1, '2018-05-21 11:48:02', NULL, '2018-05-21 16:48:02'),
(282, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Insurance By\"', 1, '2018-05-21 11:55:41', NULL, '2018-05-21 16:55:41'),
(283, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Is Medication\"', 1, '2018-05-21 12:03:14', NULL, '2018-05-21 17:03:14'),
(284, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Is Medication\"', 1, '2018-05-21 12:04:02', NULL, '2018-05-21 17:04:02'),
(285, 194, 'patient', 'added medical section', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with medical section.', 1, '2018-05-21 12:04:02', NULL, '2018-05-21 17:04:02'),
(286, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Is Allegric\"', 1, '2018-05-21 12:06:21', NULL, '2018-05-21 17:06:21'),
(288, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Ilnessess[]\"', 1, '2018-05-21 12:25:08', NULL, '2018-05-21 17:25:08'),
(291, 194, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:30 - 12:15 at ', 1, '2018-05-22 08:26:03', NULL, '2018-05-22 13:26:03'),
(292, 194, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 09:45 - 10:30 at ', 35, '2018-05-22 08:26:17', NULL, '2018-05-22 13:26:17'),
(310, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Email\"', 1, '2018-05-30 22:49:33', NULL, '2018-05-31 03:49:33'),
(311, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Email,comapny Name,city,zipcode\"', 1, '2018-05-30 22:49:38', NULL, '2018-05-31 03:49:38'),
(312, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Email,contact Number\"', 1, '2018-05-30 22:52:33', NULL, '2018-05-31 03:52:33'),
(313, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-05-30 23:07:29', NULL, '2018-05-31 04:07:29'),
(314, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-05-30 23:07:47', NULL, '2018-05-31 04:07:47'),
(315, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-05-31 00:45:39', NULL, '2018-05-31 05:45:39'),
(316, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-05-31 00:46:29', NULL, '2018-05-31 05:46:29'),
(317, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-05-31 00:55:52', NULL, '2018-05-31 05:55:52'),
(318, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"Contact Number\"', 1, '2018-05-31 00:56:04', NULL, '2018-05-31 05:56:04'),
(319, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"New Contact Number[]\"', 1, '2018-05-31 00:57:37', NULL, '2018-05-31 05:57:37'),
(320, 194, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082194) is updated in IDCSG CRM with \"New Contact Number[]\"', 1, '2018-05-31 00:58:20', NULL, '2018-05-31 05:58:20'),
(324, 191, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:45 - 13:00 at ', 1, '2018-06-01 10:33:45', NULL, '2018-06-01 15:33:45'),
(329, 75, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:15 at ', 1, '2018-06-06 22:10:26', NULL, '2018-06-07 03:10:26'),
(342, 191, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 12:00 at ', 1, '2018-06-09 23:24:49', NULL, '2018-06-10 04:24:49'),
(345, 195, 'patient', 'New patient added', 'Mujtaba ahmad(25082195) is added in IDCSG CRM', 1, '2018-06-11 01:33:55', NULL, '2018-06-11 06:33:55'),
(347, 195, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082195) is updated in IDCSG CRM with \"Occupation,email\"', 1, '2018-06-11 11:49:40', NULL, '2018-06-11 16:49:40'),
(348, 195, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082195) is updated in IDCSG CRM with \"Salutation\"', 1, '2018-06-11 11:53:40', NULL, '2018-06-11 16:53:40'),
(349, 195, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082195) is updated in IDCSG CRM with \"Insurance By\"', 1, '2018-06-11 11:54:24', NULL, '2018-06-11 16:54:24'),
(350, 195, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082195) is updated in IDCSG CRM with \"State\"', 1, '2018-06-11 12:12:46', NULL, '2018-06-11 17:12:46'),
(351, 196, 'patient', 'New patient added', 'gggg ssss(25082196) is added in IDCSG CRM', 1, '2018-06-11 12:19:45', NULL, '2018-06-11 17:19:45'),
(352, 196, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082196) is updated in IDCSG CRM with \"First Name,last Name,contact Number,email,comapny Name,city,zipcode\"', 1, '2018-06-11 12:20:24', NULL, '2018-06-11 17:20:24'),
(353, 196, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082196) is updated in IDCSG CRM with \"State\"', 1, '2018-06-11 12:20:29', NULL, '2018-06-11 17:20:29'),
(354, 196, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082196) is updated in IDCSG CRM with \"New Contact Number[]\"', 1, '2018-06-11 12:21:13', NULL, '2018-06-11 17:21:13'),
(356, 197, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:30 at ', 1, '2018-06-11 23:57:10', NULL, '2018-06-12 04:57:10'),
(357, 197, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:30 at ', 1, '2018-06-11 23:57:42', NULL, '2018-06-12 04:57:42'),
(358, 197, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:00 - 11:30 at ', 1, '2018-06-11 23:58:04', NULL, '2018-06-12 04:58:04'),
(359, 197, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 11:00 - 11:30 at ', 1, '2018-06-11 23:58:31', NULL, '2018-06-12 04:58:31'),
(362, 197, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:30 - 15:45 at ', 1, '2018-06-12 11:38:19', NULL, '2018-06-12 16:38:19'),
(364, 197, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:45 - 12:15 at 2018-06-15', 1, '2018-06-12 22:58:53', NULL, '2018-06-13 03:58:53'),
(365, 197, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 12:15 - 12:45 at 2018-06-15', 1, '2018-06-12 23:01:44', NULL, '2018-06-13 04:01:44'),
(384, 137, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 14:45 - 15:30 at ', 1, '2018-06-23 11:20:48', NULL, '2018-06-23 16:20:48'),
(386, 128, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 16:00 - 17:00 at ', 1, '2018-06-23 11:24:37', NULL, '2018-06-23 16:24:37'),
(387, 128, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 16:00 - 17:00 at ', 1, '2018-06-23 11:24:39', NULL, '2018-06-23 16:24:39'),
(389, 137, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:45 at 2018-06-19', 1, '2018-06-23 12:47:10', NULL, '2018-06-23 17:47:10'),
(390, 128, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:45 - 12:45 at 2018-06-20', 1, '2018-06-23 12:47:35', NULL, '2018-06-23 17:47:35'),
(403, 172, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:00 - 11:45 at ', 1, '2018-06-28 06:03:59', NULL, '2018-06-28 11:03:59'),
(405, 198, 'patient', 'New patient added', 'Mujtaba ahmad(25082198) is added in IDCSG CRM', 1, '2018-06-29 23:53:59', NULL, '2018-06-30 04:53:59'),
(409, 198, 'patient', 'edit field(s)', 'Mujtaba ahmad(25082198) is updated in IDCSG CRM with \"Date Of Birth\"', 1, '2018-07-02 10:33:18', NULL, '2018-07-02 15:33:18'),
(412, 197, 'patient', 'edit field(s)', 'Sir Han(25082197) is updated in IDCSG CRM with \"Salutation,date Of Birth,contact Number,card Number,occupation,comapny Name,city,state,zipcode,insurance By,insurance Number\"', 1, '2018-07-03 12:23:55', NULL, '2018-07-03 17:23:55'),
(413, 197, 'patient', 'added medical section', 'Sir Han(25082197) is updated in IDCSG CRM with medical section.', 1, '2018-07-03 12:23:55', NULL, '2018-07-03 17:23:55'),
(429, 1122, 'patient', 'edit field(s)', 'Saif Ur(25082631) is updated in IDCSG CRM with \"Salutation,date Of Birth,card Number,occupation,comapny Name,city,state,zipcode,insurance By,insurance Number,is Medication,is Allegric,ilnessess[]\"', 1, '2018-07-13 23:28:37', NULL, '2018-07-14 04:28:37'),
(430, 1122, 'patient', 'added medical section', 'Saif Ur(25082631) is updated in IDCSG CRM with medical section.', 1, '2018-07-13 23:28:37', NULL, '2018-07-14 04:28:37'),
(431, 1130, 'patient', 'New patient added', 'Mujtaba ahmad(25083123) is added in IDCSG CRM', 1, '2018-07-14 00:05:44', NULL, '2018-07-14 05:05:44'),
(432, 1131, 'patient', 'New patient added', 'Mujtaba ahmad(25083131) is added in IDCSG CRM', 1, '2018-07-14 00:10:46', NULL, '2018-07-14 05:10:46'),
(433, 1132, 'patient', 'New patient added', 'Mujtaba ahmad(25083132) is added in IDCSG CRM', 1, '2018-07-14 01:36:48', NULL, '2018-07-14 06:36:48'),
(434, 1132, 'patient', 'edit field(s)', 'Mujtaba ahmad(25083132_ghfhfghfgh) is updated in IDCSG CRM with \"Unique Id Operator,unique Id\"', 1, '2018-07-14 01:42:49', NULL, '2018-07-14 06:42:49'),
(444, 1133, 'patient', 'New patient added', 'Mujtaba ahmad(25083133) is added in IDCSG CRM', 1, '2018-07-19 12:08:39', NULL, '2018-07-19 17:08:39'),
(445, 1134, 'patient', 'New patient added', 'Mujtaba ahmad(25083134) is added in IDCSG CRM', 1, '2018-07-19 12:30:01', NULL, '2018-07-19 17:30:01'),
(446, 172, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:00 - 12:00 at 2018-06-27', 1, '2018-07-19 12:37:18', NULL, '2018-07-19 17:37:18'),
(447, 192, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:00 at ', 1, '2018-07-19 12:43:07', NULL, '2018-07-19 17:43:07'),
(449, 1134, 'patient', 'edit field(s)', 'muji ustad(25083134) is updated in IDCSG CRM with \"First Name,last Name\"', 1, '2018-07-19 23:18:22', NULL, '2018-07-20 04:18:22'),
(450, 1134, 'patient', 'edit field(s)', 'muji terst ustad test(25083134) is updated in IDCSG CRM with \"First Name,last Name\"', 1, '2018-07-19 23:19:16', NULL, '2018-07-20 04:19:16'),
(453, 1133, 'patient', 'edit field(s)', 'Mujtaba ahmad(25083133) is updated in IDCSG CRM with \"Ilnessess[]\"', 1, '2018-07-20 11:25:28', NULL, '2018-07-20 16:25:28'),
(455, 191, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 14:15 at ', 1, '2018-07-20 23:17:36', NULL, '2018-07-21 04:17:36'),
(457, 1135, 'patient', 'New patient added', 'Mujtaba ahmad(25083135) is added in IDCSG CRM', 1, '2018-07-21 23:57:01', NULL, '2018-07-22 04:57:01'),
(458, 132, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:30 at ', 1, '2018-07-22 02:30:07', NULL, '2018-07-22 07:30:07'),
(459, 132, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:15 - 09:45 at ', 1, '2018-07-22 02:32:02', NULL, '2018-07-22 07:32:02'),
(461, 760, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:15 at ', 1, '2018-07-22 05:02:54', NULL, '2018-07-22 10:02:54'),
(462, 1059, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:00 - 11:15 at ', 1, '2018-07-22 05:04:31', NULL, '2018-07-22 10:04:31'),
(465, 1135, 'patient', 'edit field(s)', 'Mujtaba ahmad() is updated in IDCSG CRM with \"Unique Id Operator,patient Unique Id\"', 1, '2018-07-23 12:16:26', NULL, '2018-07-23 17:16:26'),
(466, 1135, 'patient', 'edit field(s)', 'Mujtaba ahmad() is updated in IDCSG CRM with \"Unique Id Operator,patient Unique Id\"', 1, '2018-07-23 12:25:15', NULL, '2018-07-23 17:25:15'),
(467, 1135, 'patient', 'edit field(s)', 'Mujtaba ahmad() is updated in IDCSG CRM with \"Unique Id Operator,patient Unique Id,patient Email\"', 1, '2018-07-23 12:29:57', NULL, '2018-07-23 17:29:57'),
(468, 1136, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2018-07-23 12:59:11', NULL, '2018-07-23 17:59:11'),
(469, 1137, 'patient', 'New patient added', 'Mujtaba sdafadsf ahmad334443434() is added in IDCSG CRM', 1, '2018-07-23 13:00:16', NULL, '2018-07-23 18:00:16'),
(470, 1137, 'patient', 'edit field(s)', 'Mujtaba sdafadsfe3e333 ahmad334443434() is updated in IDCSG CRM with \"First Name\"', 1, '2018-07-23 13:00:34', NULL, '2018-07-23 18:00:34'),
(473, 1059, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 11:15 at ', 1, '2018-07-23 22:57:59', NULL, '2018-07-24 03:57:59'),
(474, 760, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:15 at ', 1, '2018-07-23 22:59:07', NULL, '2018-07-24 03:59:07'),
(475, 760, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 13:45 at ', 1, '2018-07-23 23:01:43', NULL, '2018-07-24 04:01:43'),
(478, 1138, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2018-07-24 11:03:07', NULL, '2018-07-24 16:03:07'),
(480, 1136, 'patient', 'edit field(s)', 'Mujtaba ahmad() is updated in IDCSG CRM with \"Group1\"', 1, '2018-07-25 12:19:27', NULL, '2018-07-25 17:19:27'),
(482, 1139, 'patient', 'New patient added', 'rt rt() is added in IDCSG CRM', 1, '2018-07-26 12:39:22', NULL, '2018-07-26 17:39:22'),
(495, 35, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:35 - 12:00 at ', 1, '2018-08-13 10:32:08', NULL, '2018-08-13 15:32:08'),
(496, 31, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:05 - 12:30 at ', 1, '2018-08-13 10:32:40', NULL, '2018-08-13 15:32:40'),
(497, 31, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:05 - 12:30 at 2018-08-13', 1, '2018-08-13 10:32:45', NULL, '2018-08-13 15:32:45'),
(498, 31, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:05 - 12:30 at 2018-08-13', 1, '2018-08-13 10:33:03', NULL, '2018-08-13 15:33:03'),
(499, 31, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:05 - 12:30 at ', 1, '2018-08-13 10:33:48', NULL, '2018-08-13 15:33:48'),
(505, 37, 'patient', 'New patient added', 'e e() is added in IDCSG CRM', 1, '2018-08-26 21:56:03', NULL, '2018-08-27 02:56:03'),
(506, 38, 'patient', 'New patient added', 'ds sd() is added in IDCSG CRM', 1, '2018-08-26 21:59:23', NULL, '2018-08-27 02:59:23'),
(508, 39, 'patient', 'New patient added', '1 1() is added in IDCSG CRM', 1, '2018-08-26 23:15:37', NULL, '2018-08-27 04:15:37'),
(527, 40, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:10 - 13:15 at ', 1, '2018-09-06 22:46:39', NULL, '2018-09-07 03:46:39'),
(528, 40, 'patient', 'booked appointment', 'Appointment booked for \"Training\" from 14:10 - 14:40 at ', 1, '2018-09-06 22:52:09', NULL, '2018-09-07 03:52:09'),
(529, 40, 'patient', 'booked appointment', 'Appointment booked for \"Extraction\" from 11:15 - 11:30 at ', 1, '2018-09-07 00:15:05', NULL, '2018-09-07 05:15:05'),
(530, 40, 'patient', 'booked appointment', 'Appointment booked for \"testtesttest\" from 10:25 - 10:50 at ', 1, '2018-09-07 00:17:21', NULL, '2018-09-07 05:17:21'),
(533, 41, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:05 - 11:25 at ', 1, '2018-09-11 01:09:25', NULL, '2018-09-11 06:09:25'),
(534, 40, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:05 - 10:30 at ', 1, '2018-09-12 07:51:32', NULL, '2018-09-12 12:51:32'),
(535, 41, 'patient', 'booked appointment', 'Appointment booked for \"EXAMINATION AND DIAGNOSIS\" from 10:30 - 11:05 at ', 1, '2018-09-12 07:52:07', NULL, '2018-09-12 12:52:07'),
(536, 41, 'patient', 'updated appointment', 'Appointment update for \"EXAMINATION AND DIAGNOSIS\" from 10:30 - 11:05 at ', 1, '2018-09-12 07:52:25', NULL, '2018-09-12 12:52:25'),
(538, 40, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 11:00 at ', 1, '2018-09-13 05:35:23', NULL, '2018-09-13 10:35:23'),
(539, 40, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 11:00 - 11:20 at ', 1, '2018-09-13 05:36:02', NULL, '2018-09-13 10:36:02'),
(540, 40, 'patient', 'updated appointment', 'Appointment update for \"Wisdom Tooth Operation\" from 11:00 - 11:20 at 2018-09-13', 1, '2018-09-13 05:36:08', NULL, '2018-09-13 10:36:08'),
(541, 40, 'patient', 'updated appointment', 'Appointment update for \"Wisdom Tooth Operation\" from 11:00 - 11:20 at 2018-09-13', 1, '2018-09-13 05:36:22', NULL, '2018-09-13 10:36:22'),
(542, 40, 'patient', 'updated appointment', 'Appointment update for \"Wisdom Tooth Operation\" from 11:15 - 11:35 at 2018-09-13', 1, '2018-09-13 05:36:56', NULL, '2018-09-13 10:36:56'),
(543, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:05 - 10:30 at ', 1, '2018-09-13 05:37:31', NULL, '2018-09-13 10:37:31'),
(544, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:50 - 10:15 at 2018-09-13', 1, '2018-09-13 05:37:42', NULL, '2018-09-13 10:37:42'),
(545, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:20 at ', 1, '2018-09-13 05:42:02', NULL, '2018-09-13 10:42:02'),
(546, 13, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:05 - 11:35 at ', 1, '2018-09-13 06:03:21', NULL, '2018-09-13 11:03:21'),
(547, 32, 'patient', 'booked appointment', 'Appointment booked for \"Extraction\" from 11:45 - 11:55 at ', 1, '2018-09-13 06:04:32', NULL, '2018-09-13 11:04:32'),
(548, 35, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:20 - 10:40 at ', 1, '2018-09-13 06:05:56', NULL, '2018-09-13 11:05:56'),
(549, 31, 'patient', 'booked appointment', 'Appointment booked for \"EXAMINATION AND DIAGNOSIS\" from 10:05 - 10:15 at ', 1, '2018-09-13 06:06:29', NULL, '2018-09-13 11:06:29'),
(550, 6, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:50 - 10:05 at ', 1, '2018-09-13 06:08:06', NULL, '2018-09-13 11:08:06'),
(554, 3, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:05 - 11:05 at ', 1, '2018-09-25 05:00:10', NULL, '2018-09-25 10:00:10'),
(555, 41, 'patient', 'edit field(s)', 'Mujtaba Ahmad() is updated in IDCSG CRM with \"Salutation,contact Number,card Number,occupation,comapny Name,first Name,last Name,city,state,zipcode,insurance By,insurance Number,is Medication,is Allergic,ilnessess[]\"', 1, '2018-09-25 07:08:02', NULL, '2018-09-25 12:08:02'),
(556, 41, 'patient', 'added medical section', 'Mujtaba Ahmad() is updated in IDCSG CRM with medical section.', 1, '2018-09-25 07:08:02', NULL, '2018-09-25 12:08:02'),
(557, 41, 'patient', 'edit field(s)', 'Mujtaba Ahmad() is updated in IDCSG CRM with \"Is Allergic\"', 1, '2018-09-25 07:08:21', NULL, '2018-09-25 12:08:21'),
(559, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:10 - 13:05 at ', 1, '2018-09-26 12:02:54', NULL, '2018-09-26 17:02:54'),
(560, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:25 - 13:25 at ', 1, '2018-09-26 12:09:12', NULL, '2018-09-26 17:09:12'),
(561, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:25 - 13:25 at ', 1, '2018-09-26 12:11:55', NULL, '2018-09-26 17:11:55'),
(562, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:25 - 13:25 at ', 1, '2018-09-26 12:13:10', NULL, '2018-09-26 17:13:10'),
(563, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:25 - 13:25 at ', 1, '2018-09-26 12:14:29', NULL, '2018-09-26 17:14:29'),
(564, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:25 - 13:25 at ', 1, '2018-09-26 12:16:08', NULL, '2018-09-26 17:16:08'),
(565, 41, 'patient', 'deleted appointment', 'Appointment deleted for \"Annual Check-Up, Scaling and Polishing\" from 12:25 - 13:25 at 2018-09-13', 1, '2018-09-26 12:33:44', NULL, '2018-09-26 17:33:44'),
(566, 41, 'patient', 'deleted appointment', 'Appointment deleted for \"Emergency Consultation or Treatment\" from 11:05 - 11:25 at 2018-09-11', 1, '2018-09-26 12:34:46', NULL, '2018-09-26 17:34:46'),
(571, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 14:15 - 14:40 at ', 1, '2018-10-03 04:04:03', NULL, '2018-10-03 09:04:03'),
(572, 40, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 16:05 - 16:05 at ', 1, '2018-10-03 04:14:55', NULL, '2018-10-03 09:14:55'),
(573, 40, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 16:00 - 17:35 at ', 1, '2018-10-03 04:15:06', NULL, '2018-10-03 09:15:06'),
(574, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:10 - 16:30 at ', 1, '2018-10-03 04:23:49', NULL, '2018-10-03 09:23:49'),
(575, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:10 - 15:30 at ', 1, '2018-10-03 04:24:58', NULL, '2018-10-03 09:24:58'),
(576, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:07 - 15:37 at ', 1, '2018-10-03 04:26:22', NULL, '2018-10-03 09:26:22'),
(579, 40, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:05 - 16:05 at ', 1, '2018-10-05 05:56:31', NULL, '2018-10-05 10:56:31'),
(580, 40, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 12:55 at 2018-10-05', 1, '2018-10-05 05:57:09', NULL, '2018-10-05 10:57:09'),
(583, 40, 'patient', 'edit field(s)', 'Mujtaba ahmad() is updated in IDCSG CRM with \"Ilnessess[]\"', 1, '2018-10-07 10:29:22', NULL, '2018-10-07 15:29:22'),
(587, 40, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:55 - 15:20 at ', 1, '2018-10-11 04:22:58', NULL, '2018-10-11 09:22:58'),
(588, 40, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:50 - 14:35 at ', 1, '2018-10-11 04:25:35', NULL, '2018-10-11 09:25:35'),
(590, 40, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:20 - 12:55 at ', 1, '2018-10-12 07:37:02', NULL, '2018-10-12 12:37:02'),
(619, 41, 'patient', 'edit field(s)', 'Mujtaba Ahmad() is updated in IDCSG CRM with \"Unique Id Operator,reminder[]\"', 1, '2018-10-30 10:49:22', NULL, '2018-10-30 15:49:22'),
(620, 41, 'patient', 'edit field(s)', 'Mujtaba Ahmad() is updated in IDCSG CRM with \"Reminder[]\"', 1, '2018-10-30 11:07:59', NULL, '2018-10-30 16:07:59'),
(679, 40, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:05 - 12:55 at ', 1, '2018-11-26 08:48:26', NULL, '2018-11-26 13:48:26'),
(687, 40, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:35 - 12:05 at ', 1, '2018-12-03 06:19:10', NULL, '2018-12-03 11:19:10'),
(692, 42, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2018-12-05 08:46:22', NULL, '2018-12-05 13:46:22'),
(694, NULL, NULL, 'Directory creation', 'Directory name <strong></strong>', 1, '2018-12-06 12:25:57', NULL, '2018-12-06 17:25:57'),
(695, NULL, NULL, 'Directory creation', 'Directory name <strong>My Media Files</strong>', 1, '2018-12-06 12:56:52', NULL, '2018-12-06 17:56:52'),
(698, NULL, NULL, 'Directory creation', 'Directory name <strong>testse</strong>', 1, '2018-12-08 08:13:54', NULL, '2018-12-08 13:13:54'),
(699, NULL, NULL, 'Directory creation', 'Directory name <strong>eeeee</strong>', 1, '2018-12-08 08:15:11', NULL, '2018-12-08 13:15:11'),
(700, NULL, NULL, 'Directory creation', 'Directory name <strong>yerd</strong>', 1, '2018-12-08 08:17:22', NULL, '2018-12-08 13:17:22'),
(701, NULL, NULL, 'Directory creation', 'Directory name <strong>eeeee</strong>', 1, '2018-12-08 08:18:25', NULL, '2018-12-08 13:18:25'),
(702, NULL, NULL, 'Directory creation', 'Directory name <strong>rrrrr</strong>', 1, '2018-12-08 08:18:53', NULL, '2018-12-08 13:18:53'),
(703, NULL, NULL, 'Directory creation', 'Directory name <strong>My Personal</strong>', 1, '2018-12-08 08:43:26', NULL, '2018-12-08 13:43:26'),
(704, NULL, NULL, 'Directory creation', 'Directory name <strong>no</strong>', 1, '2018-12-08 08:45:14', NULL, '2018-12-08 13:45:14');
INSERT INTO `activities` (`id`, `user_id`, `activity_type`, `activity_title`, `activity_description`, `created_by`, `created_at`, `deleted_at`, `updated_at`) VALUES
(705, NULL, NULL, 'Directory creation', 'Directory name <strong>noi</strong>', 1, '2018-12-08 08:47:14', NULL, '2018-12-08 13:47:14'),
(706, NULL, NULL, 'Directory creation', 'Directory name <strong>assa</strong>', 1, '2018-12-08 08:50:58', NULL, '2018-12-08 13:50:58'),
(708, 41, 'patient', 'deleted appointment', 'Appointment deleted for \"Annual Check-Up, Scaling and Polishing\" from 14:07 - 15:37 at 2018-10-03', 1, '2018-12-10 07:50:15', NULL, '2018-12-10 12:50:15'),
(718, 43, 'patient', 'New patient added', 'Mujtabaa ahmadaaaa() is added in IDCSG CRM', 1, '2018-12-18 09:57:51', NULL, '2018-12-18 14:57:51'),
(721, 44, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2018-12-20 05:31:30', NULL, '2018-12-20 10:31:30'),
(722, 45, 'patient', 'New patient added', 'Qazi Sami() is added in IDCSG CRM', 1, '2018-12-20 08:34:26', NULL, '2018-12-20 13:34:26'),
(723, 46, 'patient', 'New patient added', 'Qazi Sami() is added in IDCSG CRM', 1, '2018-12-20 08:43:52', NULL, '2018-12-20 13:43:52'),
(724, 47, 'patient', 'New patient added', 'Qazi Sami() is added in IDCSG CRM', 1, '2018-12-20 08:49:30', NULL, '2018-12-20 13:49:30'),
(742, 286, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', NULL, '2019-01-08 09:14:10', NULL, '2019-01-08 14:14:10'),
(743, 287, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', NULL, '2019-01-08 09:48:45', NULL, '2019-01-08 14:48:45'),
(745, NULL, NULL, 'Directory creation', 'Directory name <strong>my personal</strong>', NULL, '2019-01-09 08:26:52', NULL, '2019-01-09 13:26:52'),
(757, 288, 'patient', 'New patient added', 'sss ddddd() is added in IDCSG CRM', 1, '2019-01-12 00:28:50', NULL, '2019-01-12 05:28:50'),
(758, 289, 'patient', 'New patient added', 'gh ds() is added in IDCSG CRM', 1, '2019-01-12 01:31:49', NULL, '2019-01-12 06:31:49'),
(762, 290, 'patient', 'New patient added', 'Sohail ahmad() is added in IDCSG CRM', 1, '2019-01-14 08:54:49', NULL, '2019-01-14 13:54:49'),
(763, 291, 'patient', 'New patient added', 'Muji Text() is added in IDCSG CRM', 1, '2019-01-14 09:03:50', NULL, '2019-01-14 14:03:50'),
(1517, 38, 'patient', 'booked appointment', 'Appointment booked for \"3D Modelling Mandible\" from 14:00 - 14:30 at ', 1, '2020-12-02 01:21:11', NULL, '2020-12-02 06:21:11'),
(1516, 32, 'patient', 'booked appointment', 'Appointment booked for \"SCALING AND POLISHING per 20 minutes\" from 12:00 - 13:00 at ', 1, '2020-12-02 01:16:38', NULL, '2020-12-02 06:16:38'),
(1515, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 17:00 - 17:30 at ', 1, '2020-12-01 05:23:50', NULL, '2020-12-01 10:23:50'),
(1514, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 17:15 - 17:45 at 2020-11-05', 1, '2020-11-05 07:17:44', NULL, '2020-11-05 12:17:44'),
(1513, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 17:15 - 17:45 at ', 1, '2020-11-05 07:12:13', NULL, '2020-11-05 12:12:13'),
(1512, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 17:00 - 17:30 at ', 1, '2020-09-21 05:39:22', NULL, '2020-09-21 10:39:22'),
(1511, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:00 - 17:00 at ', 1, '2020-09-15 05:21:04', NULL, '2020-09-15 10:21:04'),
(1510, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:15 - 12:45 at ', 1, '2020-09-15 02:20:37', NULL, '2020-09-15 07:20:37'),
(1509, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:30 at ', 1, '2020-09-15 02:19:24', NULL, '2020-09-15 07:19:24'),
(1508, 39, 'patient', 'booked appointment', 'Appointment booked for \"\" from 13:45 - 14:15 at ', 1, '2020-09-15 02:18:04', NULL, '2020-09-15 07:18:04'),
(1507, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 14:30 - 15:00 at ', 1, '2020-09-14 04:12:15', NULL, '2020-09-14 09:12:15'),
(1506, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:00 at ', 1, '2020-09-14 01:50:10', NULL, '2020-09-14 06:50:10'),
(1505, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 11:00 at ', 1, '2020-09-14 01:41:33', NULL, '2020-09-14 06:41:33'),
(1504, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:30 at ', 1, '2020-09-14 01:41:03', NULL, '2020-09-14 06:41:03'),
(1503, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:45 - 12:15 at ', 1, '2020-09-14 01:40:30', NULL, '2020-09-14 06:40:30'),
(1502, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:50 - 12:00 at ', 1, '2020-09-04 00:59:00', NULL, '2020-09-04 05:59:00'),
(1501, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 11:45 at ', 1, '2020-09-04 00:51:54', NULL, '2020-09-04 05:51:54'),
(1500, 39, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 14:30 - 15:00 at ', 1, '2020-08-30 23:20:07', NULL, '2020-08-31 04:20:07'),
(1499, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 14:30 - 15:00 at ', 1, '2020-08-30 23:18:16', NULL, '2020-08-31 04:18:16'),
(1498, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:30 - 14:00 at ', 1, '2020-08-30 23:10:55', NULL, '2020-08-31 04:10:55'),
(1497, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:30 - 13:00 at ', 1, '2020-08-30 23:10:24', NULL, '2020-08-31 04:10:24'),
(1496, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:00 at ', 1, '2020-08-30 23:02:37', NULL, '2020-08-31 04:02:37'),
(817, 292, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2019-01-21 01:01:10', NULL, '2019-01-21 06:01:10'),
(818, 293, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2019-01-21 01:26:14', NULL, '2019-01-21 06:26:14'),
(819, 294, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2019-01-21 01:26:44', NULL, '2019-01-21 06:26:44'),
(820, 295, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2019-01-21 01:28:16', NULL, '2019-01-21 06:28:16'),
(1495, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 11:15 at ', 1, '2020-08-30 23:00:20', NULL, '2020-08-31 04:00:20'),
(1494, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:00 at ', 1, '2020-08-30 22:56:26', NULL, '2020-08-31 03:56:26'),
(1493, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:00 - 17:00 at ', 1, '2020-08-25 22:09:13', NULL, '2020-08-26 03:09:13'),
(1492, 32, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:00 at ', 1, '2020-08-23 23:22:51', NULL, '2020-08-24 04:22:51'),
(1491, 35, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:00 - 09:30 at ', 1, '2020-08-23 23:22:21', NULL, '2020-08-24 04:22:21'),
(1490, 31, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:00 - 09:30 at ', 1, '2020-08-23 22:47:00', NULL, '2020-08-24 03:47:00'),
(1489, 1, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:00 - 10:00 at ', 1, '2020-08-23 22:30:55', NULL, '2020-08-24 03:30:55'),
(1488, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:00 - 10:00 at ', 1, '2020-08-23 22:30:19', NULL, '2020-08-24 03:30:19'),
(1487, 37, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 09:15 - 09:45 at ', 1, '2020-08-23 22:08:24', NULL, '2020-08-24 03:08:24'),
(1486, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:15 - 09:45 at ', 1, '2020-08-23 22:07:40', NULL, '2020-08-24 03:07:40'),
(1485, 27, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:00 at ', 1, '2020-08-21 22:38:43', NULL, '2020-08-22 03:38:43'),
(1484, 4, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:30 at ', 1, '2020-08-21 22:37:38', NULL, '2020-08-22 03:37:38'),
(1483, 2, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:00 at ', 1, '2020-08-21 22:37:14', NULL, '2020-08-22 03:37:14'),
(1482, 8, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:30 - 14:00 at ', 1, '2020-08-21 22:36:10', NULL, '2020-08-22 03:36:10'),
(1481, 18, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:30 at ', 1, '2020-08-21 22:35:35', NULL, '2020-08-22 03:35:35'),
(1480, 14, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:30 - 13:00 at ', 1, '2020-08-21 22:35:07', NULL, '2020-08-22 03:35:07'),
(1479, 11, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 12:30 at ', 1, '2020-08-21 22:34:35', NULL, '2020-08-22 03:34:35'),
(1478, 3, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:00 at ', 1, '2020-08-21 22:34:17', NULL, '2020-08-22 03:34:17'),
(1477, 6, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 11:00 - 11:30 at ', 1, '2020-08-21 22:33:38', NULL, '2020-08-22 03:33:38'),
(1476, 1, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:00 at ', 1, '2020-08-21 22:33:22', NULL, '2020-08-22 03:33:22'),
(1475, 17, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:30 at ', 1, '2020-08-21 22:33:02', NULL, '2020-08-22 03:33:02'),
(1474, 9, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 09:30 - 10:00 at ', 1, '2020-08-21 22:32:44', NULL, '2020-08-22 03:32:44'),
(1473, 15, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 13:30 - 14:00 at ', 1, '2020-08-21 22:31:18', NULL, '2020-08-22 03:31:18'),
(1472, 13, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:30 at ', 1, '2020-08-21 22:30:49', NULL, '2020-08-22 03:30:49'),
(1471, 13, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 12:30 - 13:00 at ', 1, '2020-08-21 22:30:19', NULL, '2020-08-22 03:30:19'),
(1470, 26, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 12:30 at ', 1, '2020-08-21 22:29:56', NULL, '2020-08-22 03:29:56'),
(1469, 23, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:30 - 12:00 at ', 1, '2020-08-21 22:29:36', NULL, '2020-08-22 03:29:36'),
(1468, 30, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:00 at ', 1, '2020-08-21 22:29:01', NULL, '2020-08-22 03:29:01'),
(1467, 29, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:30 at ', 1, '2020-08-21 22:28:17', NULL, '2020-08-22 03:28:17'),
(1466, 16, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:00 at ', 1, '2020-08-21 22:27:55', NULL, '2020-08-22 03:27:55'),
(1465, 1, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 10:30 at ', 1, '2020-08-21 22:27:28', NULL, '2020-08-22 03:27:28'),
(1464, 31, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:00 at ', 1, '2020-08-21 22:27:09', NULL, '2020-08-22 03:27:09'),
(1463, 5, 'patient', 'booked appointment', 'Appointment booked for \"\" from 09:00 - 09:30 at ', 1, '2020-08-21 22:26:46', NULL, '2020-08-22 03:26:46'),
(1462, 45, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 08:30 - 09:00 at ', 1, '2020-08-21 22:26:25', NULL, '2020-08-22 03:26:25'),
(1461, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:30 at ', 1, '2020-08-20 22:15:59', NULL, '2020-08-21 03:15:59'),
(1460, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:00 at ', 1, '2020-08-20 22:10:55', NULL, '2020-08-21 03:10:55'),
(1459, 37, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 11:00 - 12:00 at ', 1, '2020-08-17 01:05:25', NULL, '2020-08-17 06:05:25'),
(1458, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:45 - 12:15 at 2020-08-17', 1, '2020-08-17 00:38:05', NULL, '2020-08-17 05:38:05'),
(1457, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 10:45 - 11:15 at 2020-08-17', 1, '2020-08-17 00:38:03', NULL, '2020-08-17 05:38:03'),
(1456, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:45 - 12:15 at 2020-08-17', 1, '2020-08-17 00:38:00', NULL, '2020-08-17 05:38:00'),
(1455, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 11:45 at ', 1, '2020-08-17 00:37:50', NULL, '2020-08-17 05:37:50'),
(1454, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:30 - 10:00 at 2020-08-17', 1, '2020-08-16 23:25:07', NULL, '2020-08-17 04:25:07'),
(1453, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:45 - 10:15 at 2020-08-17', 1, '2020-08-16 23:25:06', NULL, '2020-08-17 04:25:06'),
(1452, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 10:15 - 10:45 at 2020-08-17', 1, '2020-08-16 23:25:06', NULL, '2020-08-17 04:25:06'),
(1451, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 10:45 - 11:15 at 2020-08-17', 1, '2020-08-16 23:25:00', NULL, '2020-08-17 04:25:00'),
(1450, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:30 - 10:00 at 2020-08-17', 1, '2020-08-16 23:24:51', NULL, '2020-08-17 04:24:51'),
(1449, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:00 - 11:30 at 2020-08-17', 1, '2020-08-16 23:24:51', NULL, '2020-08-17 04:24:51'),
(1448, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 10:00 - 10:30 at 2020-08-17', 1, '2020-08-16 23:24:46', NULL, '2020-08-17 04:24:46'),
(1447, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 10:30 - 11:00 at 2020-08-17', 1, '2020-08-16 23:24:45', NULL, '2020-08-17 04:24:45'),
(1446, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:00 - 11:30 at 2020-08-17', 1, '2020-08-16 23:24:41', NULL, '2020-08-17 04:24:41'),
(1445, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:30 - 10:00 at 2020-08-17', 1, '2020-08-16 23:24:36', NULL, '2020-08-17 04:24:36'),
(1444, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:45 - 09:15 at 2020-08-17', 1, '2020-08-16 23:24:02', NULL, '2020-08-17 04:24:02'),
(1443, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:45 - 10:15 at 2020-08-17', 1, '2020-08-16 23:24:01', NULL, '2020-08-17 04:24:01'),
(1442, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:30 - 09:00 at 2020-08-17', 1, '2020-08-16 23:24:01', NULL, '2020-08-17 04:24:01'),
(1441, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 07:15 - 07:45 at 2020-08-17', 1, '2020-08-16 23:24:00', NULL, '2020-08-17 04:24:00'),
(1440, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:00 - 08:30 at 2020-08-17', 1, '2020-08-16 23:23:59', NULL, '2020-08-17 04:23:59'),
(1439, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:45 - 09:15 at 2020-08-17', 1, '2020-08-16 23:23:59', NULL, '2020-08-17 04:23:59'),
(1438, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:30 - 10:00 at 2020-08-17', 1, '2020-08-16 23:23:00', NULL, '2020-08-17 04:23:00'),
(1437, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:30 - 09:00 at 2020-08-17', 1, '2020-08-16 23:21:33', NULL, '2020-08-17 04:21:33'),
(1436, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:30 - 09:00 at 2020-08-21', 1, '2020-08-16 23:21:32', NULL, '2020-08-17 04:21:32'),
(1435, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:30 - 09:00 at 2020-08-20', 1, '2020-08-16 23:21:31', NULL, '2020-08-17 04:21:31'),
(1434, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:30 - 09:00 at 2020-08-19', 1, '2020-08-16 23:21:31', NULL, '2020-08-17 04:21:31'),
(918, 296, 'patient', 'New patient added', 'Mr Ijaz() is added in IDCSG CRM', 1, '2019-01-29 07:39:13', NULL, '2019-01-29 12:39:13'),
(919, 297, 'patient', 'New patient added', 'Hafsa Mujtaba() is added in IDCSG CRM', 1, '2019-01-29 07:42:47', NULL, '2019-01-29 12:42:47'),
(1433, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:30 - 09:00 at 2020-08-18', 1, '2020-08-16 23:21:30', NULL, '2020-08-17 04:21:30'),
(1432, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:30 - 09:00 at 2020-08-17', 1, '2020-08-16 23:20:02', NULL, '2020-08-17 04:20:02'),
(1431, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 06:45 - 07:15 at 2020-08-17', 1, '2020-08-16 23:20:00', NULL, '2020-08-17 04:20:00'),
(1430, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 07:15 - 07:45 at 2020-08-17', 1, '2020-08-16 23:19:59', NULL, '2020-08-17 04:19:59'),
(1429, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:00 - 08:30 at 2020-08-17', 1, '2020-08-16 23:19:59', NULL, '2020-08-17 04:19:59'),
(1428, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:45 - 09:15 at 2020-08-17', 1, '2020-08-16 23:19:58', NULL, '2020-08-17 04:19:58'),
(1427, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:45 - 10:15 at 2020-08-17', 1, '2020-08-16 23:19:52', NULL, '2020-08-17 04:19:52'),
(1426, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:45 - 10:15 at 2020-08-18', 1, '2020-08-16 23:19:51', NULL, '2020-08-17 04:19:51'),
(1425, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:45 - 10:15 at 2020-08-17', 1, '2020-08-16 23:07:12', NULL, '2020-08-17 04:07:12'),
(1424, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:30 - 10:00 at 2020-08-17', 1, '2020-08-16 23:06:09', NULL, '2020-08-17 04:06:09'),
(1423, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:45 - 10:15 at 2020-08-17', 1, '2020-08-16 22:54:38', NULL, '2020-08-17 03:54:38'),
(1422, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 07:30 - 08:00 at 2020-08-17', 1, '2020-08-16 22:53:44', NULL, '2020-08-17 03:53:44'),
(1421, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:15 - 08:45 at 2020-08-17', 1, '2020-08-16 22:53:43', NULL, '2020-08-17 03:53:43'),
(1420, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 10:30 - 11:00 at 2020-08-17', 1, '2020-08-16 22:53:41', NULL, '2020-08-17 03:53:41'),
(1419, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:45 - 10:15 at 2020-08-17', 1, '2020-08-16 22:39:05', NULL, '2020-08-17 03:39:05'),
(946, 298, 'patient', 'New patient added', 'gg gg() is added in IDCSG CRM', 1, '2019-02-05 04:41:49', NULL, '2019-02-05 09:41:49'),
(1418, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 10:15 - 10:45 at 2020-08-17', 1, '2020-08-16 22:37:46', NULL, '2020-08-17 03:37:46'),
(949, 299, 'patient', 'New patient added', 'coffee2 Tea() is added in IDCSG CRM', 1, '2019-02-05 06:16:03', NULL, '2019-02-05 11:16:03'),
(1417, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 08:45 - 09:15 at 2020-08-17', 1, '2020-08-16 22:37:46', NULL, '2020-08-17 03:37:46'),
(1416, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:15 - 11:45 at 2020-08-17', 1, '2020-08-16 22:37:45', NULL, '2020-08-17 03:37:45'),
(953, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:05 - 13:20 at ', 1, '2019-02-06 01:46:37', NULL, '2019-02-06 06:46:37'),
(1415, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 12:30 - 13:00 at 2020-08-17', 1, '2020-08-16 22:37:44', NULL, '2020-08-17 03:37:44'),
(955, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 20:05 - 20:35 at ', 1, '2019-02-07 10:30:02', NULL, '2019-02-07 15:30:02'),
(956, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 15:05 - 15:20 at ', 1, '2019-02-07 10:31:03', NULL, '2019-02-07 15:31:03'),
(1414, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 12:30 - 13:00 at 2020-08-17', 1, '2020-08-16 22:37:44', NULL, '2020-08-17 03:37:44'),
(1413, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 14:15 - 14:45 at 2020-08-17', 1, '2020-08-16 22:37:42', NULL, '2020-08-17 03:37:42'),
(1412, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 12:30 - 13:00 at 2020-08-17', 1, '2020-08-16 22:37:42', NULL, '2020-08-17 03:37:42'),
(1411, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 09:30 - 10:00 at 2020-08-17', 1, '2020-08-16 22:37:41', NULL, '2020-08-17 03:37:41'),
(1410, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:00 - 11:30 at 2020-08-17', 1, '2020-08-16 22:32:48', NULL, '2020-08-17 03:32:48'),
(1409, 39, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:30 - 11:00 at ', 1, '2020-08-16 22:32:11', NULL, '2020-08-17 03:32:11'),
(1408, 37, 'patient', 'updated appointment', 'Appointment update for \"Extraction\" from 15:45 - 16:20 at ', 1, '2020-08-13 04:35:52', NULL, '2020-08-13 09:35:52'),
(1407, 37, 'patient', 'booked appointment', 'Appointment booked for \"Extraction\" from 15:45 - 16:35 at ', 1, '2020-08-13 04:34:43', NULL, '2020-08-13 09:34:43'),
(1406, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 15:30 - 16:00 at ', 1, '2020-08-13 04:34:15', NULL, '2020-08-13 09:34:15'),
(1405, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 16:45 - 17:15 at ', 1, '2020-08-12 08:23:00', NULL, '2020-08-12 13:23:00'),
(1404, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 16:45 - 17:15 at ', 1, '2020-08-12 08:21:18', NULL, '2020-08-12 13:21:18'),
(1403, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:45 - 17:15 at ', 1, '2020-08-12 08:20:59', NULL, '2020-08-12 13:20:59'),
(1402, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 15:45 - 16:05 at 2020-08-10', 1, '2020-08-12 08:20:32', NULL, '2020-08-12 13:20:32'),
(1401, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 16:00 - 16:20 at 2020-08-10', 1, '2020-08-12 08:20:24', NULL, '2020-08-12 13:20:24'),
(1400, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 15:45 - 16:05 at ', 1, '2020-08-12 08:19:59', NULL, '2020-08-12 13:19:59'),
(1399, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 15:45 - 15:55 at ', 1, '2020-08-12 08:19:28', NULL, '2020-08-12 13:19:28'),
(1398, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:45 - 04:45 at ', 1, '2020-08-12 08:06:27', NULL, '2020-08-12 13:06:27'),
(1397, 39, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 15:45 - 16:30 at 2020-08-10', 1, '2020-08-12 07:49:08', NULL, '2020-08-12 12:49:08'),
(1396, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:45 - 15:30 at 2020-08-10', 1, '2020-08-12 05:44:45', NULL, '2020-08-12 10:44:45'),
(1395, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:15 - 15:00 at 2020-08-10', 1, '2020-08-12 05:44:44', NULL, '2020-08-12 10:44:44'),
(1394, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:15 - 15:00 at 2020-08-10', 1, '2020-08-12 05:44:43', NULL, '2020-08-12 10:44:43'),
(1393, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:15 - 15:00 at 2020-08-10', 1, '2020-08-10 05:22:33', NULL, '2020-08-10 10:22:33'),
(1392, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 14:15 - 15:00 at 2020-08-10', 1, '2020-08-10 05:22:32', NULL, '2020-08-10 10:22:32'),
(1391, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 17:15 - 18:00 at ', 1, '2020-08-10 03:59:05', NULL, '2020-08-10 08:59:05'),
(1390, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 17:40 - 18:20 at ', 1, '2020-08-10 03:58:30', NULL, '2020-08-10 08:58:30'),
(1389, 39, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 17:15 - 18:00 at ', 1, '2020-08-10 03:57:25', NULL, '2020-08-10 08:57:25'),
(1388, 45, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 14:25 - 15:00 at ', 1, '2020-08-06 23:11:30', NULL, '2020-08-07 04:11:30'),
(1387, 42, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 09:00 - 09:45 at ', 1, '2020-08-06 22:36:40', NULL, '2020-08-07 03:36:40'),
(1386, 39, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 10:40 at 2020-07-24', 1, '2020-07-24 02:15:20', NULL, '2020-07-24 07:15:20'),
(1385, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 09:55 at ', 1, '2020-07-24 00:17:16', NULL, '2020-07-24 05:17:16'),
(1384, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:35 at ', 1, '2020-07-24 00:14:30', NULL, '2020-07-24 05:14:30'),
(1383, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:30 - 10:15 at ', 1, '2020-07-24 00:13:53', NULL, '2020-07-24 05:13:53'),
(1382, 39, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 12:35 at ', 1, '2020-07-24 00:12:46', NULL, '2020-07-24 05:12:46'),
(1381, 32, 'patient', 'booked appointment', 'Appointment booked for \"\" from 11:55 - 12:05 at ', 1, '2020-07-24 00:09:14', NULL, '2020-07-24 05:09:14'),
(1011, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 17:55 - 18:10 at ', 1, '2019-04-08 10:26:44', NULL, '2019-04-08 15:26:44'),
(1012, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:35 - 22:05 at ', 1, '2019-04-08 10:39:53', NULL, '2019-04-08 15:39:53'),
(1013, 47, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 17:05 - 17:50 at ', 1, '2019-04-08 11:12:29', NULL, '2019-04-08 16:12:29'),
(1014, 47, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:20 - 12:35 at ', 1, '2019-04-08 11:14:11', NULL, '2019-04-08 16:14:11'),
(1380, 39, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 12:15 - 12:40 at ', 1, '2020-07-24 00:08:37', NULL, '2020-07-24 05:08:37'),
(1379, 39, 'patient', 'booked appointment', 'Appointment booked for \"\" from 09:30 - 09:35 at ', 1, '2020-07-23 22:42:04', NULL, '2020-07-24 03:42:04'),
(1378, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 08:35 - 08:50 at ', 1, '2020-07-23 22:41:19', NULL, '2020-07-24 03:41:19'),
(1018, 41, 'patient', 'updated appointment', 'Appointment update for \"Extraction\" from 11:30 - 22:10 at ', 1, '2019-04-10 09:58:38', NULL, '2019-04-10 14:58:38'),
(1019, 41, 'patient', 'updated appointment', 'Appointment update for \"EXAMINATION AND DIAGNOSIS\" from 11:30 - 22:10 at ', 1, '2019-04-10 10:00:27', NULL, '2019-04-10 15:00:27'),
(1020, 41, 'patient', 'updated appointment', 'Appointment update for \"EXAMINATION AND DIAGNOSIS\" from 11:30 - 22:10 at ', 1, '2019-04-10 10:01:30', NULL, '2019-04-10 15:01:30'),
(1021, 47, 'patient', 'updated appointment', 'Appointment update for \"Wisdom Tooth Operation\" from 12:25 - 13:40 at ', 1, '2019-04-10 10:01:57', NULL, '2019-04-10 15:01:57'),
(1377, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:45 - 10:20 at ', 1, '2020-07-23 22:40:02', NULL, '2020-07-24 03:40:02'),
(1376, 40, 'patient', 'updated appointment', 'Appointment update for \"CROWN - Zirconia\" from 11:30 - 13:45 at 2020-07-23', 1, '2020-07-22 22:43:05', NULL, '2020-07-23 03:43:05'),
(1375, 40, 'patient', 'updated appointment', 'Appointment update for \"CROWN - Zirconia\" from 11:30 - 11:45 at ', 1, '2020-07-22 22:42:57', NULL, '2020-07-23 03:42:57'),
(1027, 300, 'patient', 'New patient added', 'Mujtaba11 ahmad11() is added in IDCSG CRM', 1, '2019-04-15 10:25:37', NULL, '2019-04-15 15:25:37'),
(1028, 301, 'patient', 'New patient added', 'Mujtaba ahmad() is added in IDCSG CRM', 1, '2019-04-15 10:29:20', NULL, '2019-04-15 15:29:20'),
(1374, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:45 - 14:15 at ', 1, '2020-07-22 22:42:15', NULL, '2020-07-23 03:42:15'),
(1373, 41, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 12:00 - 13:10 at ', 1, '2020-07-22 22:40:36', NULL, '2020-07-23 03:40:36'),
(1372, 40, 'patient', 'booked appointment', 'Appointment booked for \"\" from 11:30 - 11:25 at ', 1, '2020-07-22 22:40:03', NULL, '2020-07-23 03:40:03'),
(1371, 32, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 13:05 at ', 1, '2020-07-22 01:46:37', NULL, '2020-07-22 06:46:37'),
(1370, 38, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 11:30 - 12:15 at ', 1, '2020-06-18 23:55:14', NULL, '2020-06-19 04:55:14'),
(1369, 39, 'patient', 'New patient added', 'jam jam() is added in IDCSG CRM', NULL, '2020-06-08 07:29:04', NULL, '2020-06-08 12:29:04'),
(1368, 37, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:00 - 11:20 at 2020-04-15', 1, '2020-06-01 22:22:01', NULL, '2020-06-02 03:22:01'),
(1367, 37, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:50 at 2020-04-15', 1, '2020-06-01 22:21:59', NULL, '2020-06-02 03:21:59'),
(1366, 37, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 13:20 at 2020-04-15', 1, '2020-06-01 22:21:58', NULL, '2020-06-02 03:21:58'),
(1365, 37, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 13:50 at 2020-04-15', 1, '2020-06-01 22:21:55', NULL, '2020-06-02 03:21:55'),
(1364, 37, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 13:50 at 2020-04-15', 1, '2020-05-25 21:03:04', NULL, '2020-05-26 02:03:04'),
(1363, 37, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 12:50 at 2020-04-15', 1, '2020-05-25 20:56:07', NULL, '2020-05-26 01:56:07'),
(1362, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:50 at ', 1, '2020-04-15 08:43:26', NULL, '2020-04-15 13:43:26'),
(1361, 37, 'patient', 'booked appointment', 'Appointment booked for \"SCALING AND POLISHING per 20 minutes\" from 14:20 - 14:55 at ', 1, '2020-03-10 23:07:10', NULL, '2020-03-11 04:07:10'),
(1360, 37, 'patient', 'booked appointment', 'Appointment booked for \"EXAMINATION AND DIAGNOSIS\" from 10:40 - 11:30 at ', 1, '2020-03-10 23:06:35', NULL, '2020-03-11 04:06:35'),
(1359, NULL, NULL, 'Directory creation', 'Directory name <strong>Digital Images</strong>', 1, '2020-02-24 00:31:17', NULL, '2020-02-24 05:31:17'),
(1358, NULL, NULL, 'Directory creation', 'Directory name <strong>Saved Items</strong>', 1, '2020-02-20 05:25:33', NULL, '2020-02-20 10:25:33'),
(1357, NULL, NULL, 'Directory creation', 'Directory name <strong>Saved Items</strong>', 1, '2020-02-20 05:17:51', NULL, '2020-02-20 10:17:51'),
(1356, NULL, NULL, 'Directory creation', 'Directory name <strong>Saved Items</strong>', 1, '2020-02-20 05:17:11', NULL, '2020-02-20 10:17:11'),
(1355, NULL, NULL, 'Directory creation', 'Directory name <strong>Saved Items</strong>', 1, '2020-02-20 05:14:46', NULL, '2020-02-20 10:14:46'),
(1354, NULL, NULL, 'Directory creation', 'Directory name <strong>MY New iamges</strong>', 1, '2020-02-20 04:56:49', NULL, '2020-02-20 09:56:49'),
(1353, NULL, NULL, 'Directory creation', 'Directory name <strong>MY New iamges</strong>', 1, '2020-02-20 04:55:29', NULL, '2020-02-20 09:55:29'),
(1352, NULL, NULL, 'Directory creation', 'Directory name <strong>test</strong>', 1, '2020-02-19 12:42:54', NULL, '2020-02-19 17:42:54'),
(1351, NULL, NULL, 'Directory creation', 'Directory name <strong>My Videos</strong>', 1, '2020-02-17 23:09:06', NULL, '2020-02-18 04:09:06'),
(1350, 38, 'patient', 'New patient added', 'Khaiso Hamlet() is added in IDCSG CRM', 1, '2020-02-14 10:10:55', NULL, '2020-02-14 15:10:55'),
(1349, NULL, NULL, 'Directory creation', 'Directory name <strong></strong>', 1, '2020-02-05 23:16:30', NULL, '2020-02-06 04:16:30'),
(1348, 37, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 14:00 - 14:30 at ', 1, '2020-02-03 11:29:22', NULL, '2020-02-03 16:29:22'),
(1347, NULL, NULL, 'Directory creation', 'Directory name <strong>My Images</strong>', 1, '2020-02-03 01:17:58', NULL, '2020-02-03 06:17:58'),
(1346, NULL, NULL, 'Directory creation', 'Directory name <strong>Saved Items</strong>', 1, '2020-02-03 01:17:42', NULL, '2020-02-03 06:17:42'),
(1345, 37, 'patient', 'New patient added', 'kaloo khan() is added in IDCSG CRM', 240, '2020-01-29 00:17:13', NULL, '2020-01-29 05:17:13'),
(1344, NULL, NULL, 'Directory creation', 'Directory name <strong>My Images</strong>', 240, '2020-01-15 00:48:38', NULL, '2020-01-15 05:48:38'),
(1343, 374, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 16:15 - 16:40 at ', 1, '2020-01-14 06:05:28', NULL, '2020-01-14 11:05:28'),
(1342, 374, 'patient', 'New patient added', 'Chis mish() is added in IDCSG CRM', NULL, '2020-01-14 06:00:45', NULL, '2020-01-14 11:00:45'),
(1341, NULL, NULL, 'Directory creation', 'Directory name <strong>test22</strong>', 1, '2020-01-09 12:25:17', NULL, '2020-01-09 17:25:17'),
(1340, NULL, NULL, 'Directory creation', 'Directory name <strong>test</strong>', 1, '2020-01-09 12:25:06', NULL, '2020-01-09 17:25:06'),
(1339, NULL, NULL, 'Directory creation', 'Directory name <strong>z</strong>', 1, '2020-01-08 12:01:20', NULL, '2020-01-08 17:01:20'),
(1338, NULL, NULL, 'Directory creation', 'Directory name <strong>sssssss</strong>', 1, '2020-01-08 12:00:19', NULL, '2020-01-08 17:00:19'),
(1337, NULL, NULL, 'Directory creation', 'Directory name <strong>sdfsd</strong>', 1, '2020-01-08 11:47:05', NULL, '2020-01-08 16:47:05'),
(1336, NULL, NULL, 'Directory creation', 'Directory name <strong>sdfsd</strong>', 1, '2020-01-08 11:46:22', NULL, '2020-01-08 16:46:22'),
(1335, NULL, NULL, 'Directory creation', 'Directory name <strong>sdfsd</strong>', 1, '2020-01-08 11:43:56', NULL, '2020-01-08 16:43:56'),
(1334, NULL, NULL, 'Directory creation', 'Directory name <strong>f</strong>', 1, '2020-01-08 11:43:12', NULL, '2020-01-08 16:43:12'),
(1333, NULL, NULL, 'Directory creation', 'Directory name <strong>ss</strong>', 1, '2020-01-08 11:32:26', NULL, '2020-01-08 16:32:26'),
(1332, NULL, NULL, 'Directory creation', 'Directory name <strong>test2</strong>', 1, '2020-01-08 11:31:35', NULL, '2020-01-08 16:31:35'),
(1331, NULL, NULL, 'Directory creation', 'Directory name <strong>test</strong>', 1, '2020-01-08 11:31:19', NULL, '2020-01-08 16:31:19'),
(1330, NULL, NULL, 'Directory creation', 'Directory name <strong>My Documents3</strong>', 1, '2020-01-08 10:46:28', NULL, '2020-01-08 15:46:28'),
(1329, NULL, NULL, 'Directory creation', 'Directory name <strong>My Documents2</strong>', 1, '2020-01-08 10:45:52', NULL, '2020-01-08 15:45:52'),
(1328, NULL, NULL, 'Directory creation', 'Directory name <strong>My Documents</strong>', 1, '2020-01-08 10:45:00', NULL, '2020-01-08 15:45:00'),
(1327, NULL, NULL, 'Directory creation', 'Directory name <strong>My Images</strong>', 1, '2020-01-08 10:19:26', NULL, '2020-01-08 15:19:26'),
(1326, 233, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 13:20 - 13:35 at ', 1, '2019-12-02 10:44:33', NULL, '2019-12-02 15:44:33'),
(1325, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:55 - 18:15 at ', 1, '2019-11-22 05:44:42', NULL, '2019-11-22 10:44:42'),
(1324, 41, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 15:45 - 16:00 at ', 1, '2019-11-21 12:20:12', NULL, '2019-11-21 17:20:12'),
(1323, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 15:00 - 15:30 at ', 1, '2019-11-21 12:19:30', NULL, '2019-11-21 17:19:30'),
(1322, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 15:00 - 15:30 at ', 1, '2019-11-21 04:32:58', NULL, '2019-11-21 09:32:58'),
(1321, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 18:00 - 18:45 at 2019-11-19', 1, '2019-11-18 23:31:28', NULL, '2019-11-19 04:31:28'),
(1320, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:00 - 12:45 at ', 1, '2019-11-18 23:30:43', NULL, '2019-11-19 04:30:43'),
(1319, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:55 at 2019-11-15', 1, '2019-11-17 11:16:33', NULL, '2019-11-17 16:16:33'),
(1318, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:55 at 2019-11-15', 1, '2019-11-17 11:16:31', NULL, '2019-11-17 16:16:31'),
(1317, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:55 at 2019-11-15', 1, '2019-11-17 10:54:25', NULL, '2019-11-17 15:54:25'),
(1316, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 15:30 - 16:25 at 2019-11-15', 1, '2019-11-17 10:54:18', NULL, '2019-11-17 15:54:18'),
(1315, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:55 at 2019-11-15', 1, '2019-11-17 10:11:25', NULL, '2019-11-17 15:11:25'),
(1314, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:55 at 2019-11-15', 1, '2019-11-17 10:11:08', NULL, '2019-11-17 15:11:08'),
(1313, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:55 at 2019-11-15', 1, '2019-11-17 10:11:03', NULL, '2019-11-17 15:11:03'),
(1312, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:55 at 2019-11-15', 1, '2019-11-17 10:10:54', NULL, '2019-11-17 15:10:54'),
(1311, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:30 - 13:25 at 2019-11-15', 1, '2019-11-17 10:10:42', NULL, '2019-11-17 15:10:42'),
(1310, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:30 - 13:25 at 2019-11-15', 1, '2019-11-17 10:10:39', NULL, '2019-11-17 15:10:39'),
(1309, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:30 - 13:25 at 2019-11-15', 1, '2019-11-17 10:10:37', NULL, '2019-11-17 15:10:37'),
(1308, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 11:55 at 2019-11-15', 1, '2019-11-17 10:10:31', NULL, '2019-11-17 15:10:31'),
(1307, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:30 - 13:25 at 2019-11-15', 1, '2019-11-17 10:10:29', NULL, '2019-11-17 15:10:29'),
(1306, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:30 - 13:25 at 2019-11-15', 1, '2019-11-17 10:10:07', NULL, '2019-11-17 15:10:07'),
(1305, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 11:40 at 2019-11-15', 1, '2019-11-17 10:10:03', NULL, '2019-11-17 15:10:03'),
(1304, 291, 'patient', 'booked appointment', 'Appointment booked for \"Extraction\" from 12:30 - 12:45 at ', 1, '2019-11-17 08:59:07', NULL, '2019-11-17 13:59:07'),
(1303, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 11:40 at 2019-11-15', 1, '2019-11-17 05:15:25', NULL, '2019-11-17 10:15:25'),
(1302, 295, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 14:10 - 15:05 at ', 1, '2019-11-15 04:53:00', NULL, '2019-11-15 09:53:00'),
(1301, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 11:40 at ', 1, '2019-11-15 04:52:35', NULL, '2019-11-15 09:52:35'),
(1300, 287, 'patient', 'updated appointment', 'Appointment update for \"Emergency Consultation or Treatment\" from 11:30 - 12:30 at 2019-11-13', 1, '2019-11-15 00:54:26', NULL, '2019-11-15 05:54:26'),
(1299, 301, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:30 - 12:00 at 2019-11-13', 1, '2019-11-15 00:28:37', NULL, '2019-11-15 05:28:37'),
(1298, 301, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 14:00 - 14:30 at ', 1, '2019-11-12 22:37:45', NULL, '2019-11-13 03:37:45'),
(1297, 287, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 12:30 - 13:30 at ', 1, '2019-11-12 22:35:03', NULL, '2019-11-13 03:35:03'),
(1296, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:45 - 17:10 at ', 1, '2019-11-12 12:26:34', NULL, '2019-11-12 17:26:34'),
(1295, 291, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:20 - 16:35 at ', 1, '2019-11-12 12:12:30', NULL, '2019-11-12 17:12:30'),
(1294, 286, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 16:15 - 16:45 at ', 1, '2019-11-12 12:12:05', NULL, '2019-11-12 17:12:05'),
(1293, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 01:00 at ', 1, '2019-11-12 12:11:36', NULL, '2019-11-12 17:11:36'),
(1292, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 13:00 - 13:25 at ', 1, '2019-11-12 12:10:51', NULL, '2019-11-12 17:10:51'),
(1291, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 13:40 at 2019-11-12', 1, '2019-11-12 12:10:22', NULL, '2019-11-12 17:10:22'),
(1290, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 13:10 at ', 1, '2019-11-12 11:51:07', NULL, '2019-11-12 16:51:07'),
(1289, 300, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 01:05 at ', 1, '2019-11-12 11:50:30', NULL, '2019-11-12 16:50:30'),
(1288, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:45 - 13:15 at ', 1, '2019-11-12 11:49:00', NULL, '2019-11-12 16:49:00'),
(1287, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:46 - 12:09 at ', 1, '2019-11-12 11:47:33', NULL, '2019-11-12 16:47:33'),
(1148, 287, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 22:05 - 22:40 at ', 1, '2019-09-16 11:55:13', NULL, '2019-09-16 16:55:13'),
(1149, 294, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 17:15 - 17:45 at ', 1, '2019-09-16 11:55:43', NULL, '2019-09-16 16:55:43'),
(1150, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 17:10 - 17:50 at 2019-09-16', 1, '2019-09-16 11:55:53', NULL, '2019-09-16 16:55:53'),
(1151, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 17:10 - 17:50 at 2019-09-16', 1, '2019-09-16 11:56:12', NULL, '2019-09-16 16:56:12'),
(1152, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 15:10 - 15:50 at 2019-09-16', 1, '2019-09-16 11:56:33', NULL, '2019-09-16 16:56:33'),
(1153, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 15:10 - 17:05 at 2019-09-16', 1, '2019-09-16 11:56:51', NULL, '2019-09-16 16:56:51'),
(1154, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 15:10 - 17:05 at 2019-09-16', 1, '2019-09-16 11:58:21', NULL, '2019-09-16 16:58:21'),
(1155, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 15:25 - 17:20 at 2019-09-16', 1, '2019-09-16 12:00:25', NULL, '2019-09-16 17:00:25');
INSERT INTO `activities` (`id`, `user_id`, `activity_type`, `activity_title`, `activity_description`, `created_by`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1156, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 15:25 - 17:20 at 2019-09-16', 1, '2019-09-16 12:00:37', NULL, '2019-09-16 17:00:37'),
(1157, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 15:25 - 16:05 at 2019-09-16', 1, '2019-09-16 12:00:40', NULL, '2019-09-16 17:00:40'),
(1158, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 13:55 - 14:35 at 2019-09-16', 1, '2019-09-16 12:00:41', NULL, '2019-09-16 17:00:41'),
(1159, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:55 - 12:35 at 2019-09-16', 1, '2019-09-16 12:03:15', NULL, '2019-09-16 17:03:15'),
(1160, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:25 - 11:05 at 2019-09-16', 1, '2019-09-16 12:04:31', NULL, '2019-09-16 17:04:31'),
(1161, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:10 - 10:50 at 2019-09-16', 1, '2019-09-16 12:04:42', NULL, '2019-09-16 17:04:42'),
(1162, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:55 - 10:35 at 2019-09-16', 1, '2019-09-16 12:04:46', NULL, '2019-09-16 17:04:46'),
(1163, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:55 - 10:35 at 2019-09-16', 1, '2019-09-16 12:09:29', NULL, '2019-09-16 17:09:29'),
(1164, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:55 - 12:20 at 2019-09-16', 1, '2019-09-16 12:09:35', NULL, '2019-09-16 17:09:35'),
(1165, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 09:05 - 09:55 at ', 1, '2019-09-16 12:13:32', NULL, '2019-09-16 17:13:32'),
(1166, 294, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 09:55 - 12:20 at 2019-09-17', 1, '2019-09-16 12:14:19', NULL, '2019-09-16 17:14:19'),
(1286, 300, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:46 - 01:04 at ', 1, '2019-11-12 11:45:00', NULL, '2019-11-12 16:45:00'),
(1285, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:16 - 12:44 at ', 1, '2019-11-12 11:44:30', NULL, '2019-11-12 16:44:30'),
(1284, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:35 - 12:15 at 2019-11-12', 1, '2019-11-12 11:43:38', NULL, '2019-11-12 16:43:38'),
(1283, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:20 - 12:00 at 2019-11-12', 1, '2019-11-12 11:43:36', NULL, '2019-11-12 16:43:36'),
(1282, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:35 - 12:15 at 2019-11-12', 1, '2019-11-12 11:43:30', NULL, '2019-11-12 16:43:30'),
(1281, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:20 - 12:00 at 2019-11-12', 1, '2019-11-12 11:43:24', NULL, '2019-11-12 16:43:24'),
(1280, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 12:05 - 12:45 at 2019-11-12', 1, '2019-11-12 11:43:22', NULL, '2019-11-12 16:43:22'),
(1279, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 12:06 - 12:14 at ', 1, '2019-11-12 11:43:14', NULL, '2019-11-12 16:43:14'),
(1278, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:30 - 11:15 at ', 1, '2019-11-12 11:36:54', NULL, '2019-11-12 16:36:54'),
(1182, 301, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:50 - 14:40 at ', 1, '2019-10-12 05:27:46', NULL, '2019-10-12 10:27:46'),
(1183, 301, 'patient', 'booked appointment', 'Appointment booked for \"EXTRACTION - Anterior\" from 17:40 - 18:30 at ', 1, '2019-10-12 05:29:24', NULL, '2019-10-12 10:29:24'),
(1184, 301, 'patient', 'booked appointment', 'Appointment booked for \"FILLINGS - Composite - 2 Surface\" from 15:30 - 16:00 at ', 1, '2019-10-12 05:30:03', NULL, '2019-10-12 10:30:03'),
(1277, 292, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:35 - 10:35 at ', 1, '2019-11-12 11:32:05', NULL, '2019-11-12 16:32:05'),
(1276, 294, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 10:35 - 10:40 at ', 1, '2019-11-11 23:56:05', NULL, '2019-11-12 04:56:05'),
(1275, 300, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:35 - 10:40 at ', 1, '2019-11-11 23:53:27', NULL, '2019-11-12 04:53:27'),
(1274, 301, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:35 - 10:40 at ', 1, '2019-11-11 23:36:25', NULL, '2019-11-12 04:36:25'),
(1190, 301, 'patient', 'booked appointment', 'Appointment booked for \"BRIDGE - Full Porcelain Per Unit\" from 11:05 - 14:45 at ', 1, '2019-10-16 09:08:55', NULL, '2019-10-16 14:08:55'),
(1191, 301, 'patient', 'booked appointment', 'Appointment booked for \"EXAMINATION AND DIAGNOSIS\" from 12:20 - 15:05 at ', 1, '2019-10-16 09:15:21', NULL, '2019-10-16 14:15:21'),
(1273, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:35 - 10:40 at ', 1, '2019-11-11 23:35:23', NULL, '2019-11-12 04:35:23'),
(1272, 300, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:35 - 10:35 at ', 1, '2019-11-11 23:33:03', NULL, '2019-11-12 04:33:03'),
(1271, 292, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:50 - 10:55 at ', 1, '2019-11-11 23:32:33', NULL, '2019-11-12 04:32:33'),
(1270, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:20 - 10:30 at ', 1, '2019-11-11 23:30:13', NULL, '2019-11-12 04:30:13'),
(1269, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:35 - 11:00 at ', 1, '2019-11-11 23:29:27', NULL, '2019-11-12 04:29:27'),
(1268, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:50 - 10:55 at ', 1, '2019-11-11 23:28:48', NULL, '2019-11-12 04:28:48'),
(1267, 295, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:20 - 11:20 at ', 1, '2019-11-11 23:04:16', NULL, '2019-11-12 04:04:16'),
(1266, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:05 - 10:30 at ', 1, '2019-11-11 23:03:49', NULL, '2019-11-12 04:03:49'),
(1265, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 10:25 at ', 1, '2019-11-10 23:54:00', NULL, '2019-11-11 04:54:00'),
(1264, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:05 - 10:05 at ', 1, '2019-11-10 23:53:38', NULL, '2019-11-11 04:53:38'),
(1263, 297, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 12:45 at 2019-11-05', 1, '2019-11-05 10:39:00', NULL, '2019-11-05 15:39:00'),
(1210, 41, 'patient', 'booked appointment', 'Appointment booked for \"EXAMINATION AND DIAGNOSIS\" from 16:50 - 17:35 at ', 1, '2019-10-26 07:37:39', NULL, '2019-10-26 12:37:39'),
(1211, 297, 'patient', 'booked appointment', 'Appointment booked for \"FILLINGS - Amalgam - 2 Surface\" from 13:50 - 13:55 at ', 1, '2019-10-26 07:38:18', NULL, '2019-10-26 12:38:18'),
(1262, 297, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:45 - 12:30 at 2019-11-05', 1, '2019-11-05 10:38:47', NULL, '2019-11-05 15:38:47'),
(1261, 300, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:00 - 12:45 at 2019-11-05', 1, '2019-11-05 10:38:36', NULL, '2019-11-05 15:38:36'),
(1260, 297, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 10:15 - 12:00 at 2019-11-05', 1, '2019-11-05 10:37:45', NULL, '2019-11-05 15:37:45'),
(1259, 300, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:05 - 12:40 at ', 1, '2019-11-05 09:25:22', NULL, '2019-11-05 14:25:22'),
(1258, 47, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 18:05 - 16:40 at ', 1, '2019-11-05 05:21:43', NULL, '2019-11-05 10:21:43'),
(1257, 297, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 10:20 - 17:55 at ', 1, '2019-11-05 05:21:15', NULL, '2019-11-05 10:21:15'),
(1256, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:05 at 2019-11-04', 1, '2019-11-04 11:55:55', NULL, '2019-11-04 16:55:55'),
(1255, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:05 at 2019-11-04', 1, '2019-11-04 11:55:38', NULL, '2019-11-04 16:55:38'),
(1254, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:05 at 2019-11-04', 1, '2019-11-04 11:55:21', NULL, '2019-11-04 16:55:21'),
(1253, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:05 at 2019-11-04', 1, '2019-11-04 11:52:19', NULL, '2019-11-04 16:52:19'),
(1252, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:05 at 2019-11-04', 1, '2019-11-04 11:52:06', NULL, '2019-11-04 16:52:06'),
(1229, 41, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:20 - 10:55 at ', 1, '2019-10-28 22:23:59', NULL, '2019-10-29 03:23:59'),
(1251, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 13:50 at 2019-11-04', 1, '2019-11-04 11:51:56', NULL, '2019-11-04 16:51:56'),
(1231, 295, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:05 - 11:25 at ', 1, '2019-10-29 11:01:03', NULL, '2019-10-29 16:01:03'),
(1232, 300, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 11:05 - 11:55 at ', 1, '2019-10-29 11:01:43', NULL, '2019-10-29 16:01:43'),
(1234, 41, 'patient', 'booked appointment', 'Appointment booked for \"Emergency Consultation or Treatment\" from 10:20 - 10:25 at ', 1, '2019-10-29 12:12:59', NULL, '2019-10-29 17:12:59'),
(1235, 41, 'patient', 'booked appointment', 'Appointment booked for \"\" from 10:35 - 10:50 at ', 1, '2019-10-29 12:13:24', NULL, '2019-10-29 17:13:24'),
(1236, 41, 'patient', 'updated appointment', 'Appointment update for \"\" from 10:30 - 11:25 at 2019-10-20', 1, '2019-10-29 12:13:28', NULL, '2019-10-29 17:13:28'),
(1250, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 12:50 at 2019-11-04', 1, '2019-11-04 11:51:37', NULL, '2019-11-04 16:51:37'),
(1249, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 12:35 at 2019-11-04', 1, '2019-11-04 11:51:34', NULL, '2019-11-04 16:51:34'),
(1248, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 12:35 at 2019-11-04', 1, '2019-11-04 11:51:16', NULL, '2019-11-04 16:51:16'),
(1247, 41, 'patient', 'updated appointment', 'Appointment update for \"Annual Check-Up, Scaling and Polishing\" from 11:15 - 12:35 at 2019-11-04', 1, '2019-11-04 11:50:57', NULL, '2019-11-04 16:50:57'),
(1246, 41, 'patient', 'booked appointment', 'Appointment booked for \"Annual Check-Up, Scaling and Polishing\" from 11:20 - 12:30 at ', 1, '2019-11-04 11:50:53', NULL, '2019-11-04 16:50:53'),
(1245, 41, 'patient', 'booked appointment', 'Appointment booked for \"Wisdom Tooth Operation\" from 10:20 - 10:55 at ', 1, '2019-11-03 09:41:38', NULL, '2019-11-03 14:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `set_as_main` enum('Yes','No') DEFAULT 'No',
  `address` text,
  `street_no` varchar(255) DEFAULT NULL,
  `apartments_no` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `patient_id`, `set_as_main`, `address`, `street_no`, `apartments_no`, `house_no`, `city`, `country`, `zipcode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'No', 'Blk 201 B Tampines #01-1085', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(2, 2, 'No', '5 Balmoral Rd #11-02', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(3, 3, 'No', '5 Balmoral Rd #11-02', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(4, 4, 'No', '5 Balmoral Rd #11-02', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(5, 5, 'No', 'Blk 120 Bukit Merah View #07-06', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(6, 6, 'No', 'Blk - 364, #02-475, Clemeti Ave #2 ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(7, 7, 'No', 'Blk 428 Ubi Ave 1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(8, 8, 'No', 'Blk 241 Compassvale Walk ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(9, 9, 'No', '25 Moonstone Lane #18-04 ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41', NULL),
(10, 10, 'No', '25 Moonstone Lane #18-04', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(11, 11, 'No', '1 Rhu Cross Costa Rhu #12-05', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(12, 12, 'No', 'NIL ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(13, 13, 'No', '501 B Wellington Circle ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(14, 14, 'No', 'Trilight , 7 Newton Road #08-05 ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(15, 15, 'No', '55 Meyer rd Sealvonton Meyer #13-06', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(16, 16, 'No', '131 Bedok Reservoir Rd #04-1329 ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(17, 17, 'No', '21 Jalan Raja Udang The Arte #23-02', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(18, 18, 'No', '82 Tiong Poh Road ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42', NULL),
(19, 19, 'No', '52 Choa Chu Kang North 7 #16-29 ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(20, 20, 'No', 'Blk 301 Jalan Bukit Ho Shwe #05-01', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(21, 21, 'No', 'Blk 6 Boon Lay Drive #12-0 Summerdale ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(22, 22, 'No', 'No 113 91 st Street Yangoon ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(23, 23, 'No', 'BlK 234,#10-492,Compassvale ', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(24, 24, 'No', 'BlK 639 PASIR RIS DRI #10 546', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(25, 25, 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(26, 26, 'No', 'BlK 307,# 06-105, Bukit Batok Street 31', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(27, 27, 'No', 'BIK 631,# 12-228, Senja Road', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(28, 28, 'No', 'BIK 105,# 16-11 Henderson crescent', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43', NULL),
(29, 29, 'No', '7A Kappel road 12-01 Tangjongpagor complex', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(30, 30, 'No', 'Sembawang Close 320# 15-271', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(31, 31, 'No', '8 Cross Street, Class pass Singapore', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(32, 32, 'No', '505 Dunman Road, # 02-03', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(33, 33, 'No', 'BlK 637,#15-119, Jurong West street 61', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(34, 34, 'No', '-', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(35, 35, 'No', '259 Arcadia Road, #10-01Hillcrest Arcadia', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(36, 36, 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44', NULL),
(37, 37, 'No', NULL, '9 rue de bellefond', NULL, NULL, 'Oaris', 'France', '75009', '2020-05-13 12:53:04', '2020-05-13 17:53:04', NULL),
(38, 37, 'No', NULL, 'Mohet Sector', 'Ghazi', 'Ghazi, Haripur, Pakistan', 'Haripur', 'Pakistan', '22860', '2020-05-13 12:55:21', '2020-05-13 17:55:21', NULL),
(39, 37, 'Yes', NULL, '9 rue de bellefond', '#123', 'house #37', 'Oaris', 'France', '75009', '2020-05-13 13:05:34', '2020-05-13 18:05:34', NULL),
(40, 37, 'No', NULL, NULL, NULL, NULL, 'Oaris', NULL, NULL, '2020-05-15 12:38:09', '2020-05-15 17:38:09', NULL),
(41, 37, 'No', NULL, NULL, NULL, NULL, 'Oaris', NULL, NULL, '2020-05-21 12:52:17', '2020-05-21 17:52:17', NULL),
(42, 39, 'No', NULL, '9 rue de bellefond', NULL, NULL, 'Oaris', 'France', '75009', '2020-06-08 07:29:05', '2020-06-08 12:29:05', NULL),
(43, 45, 'No', NULL, 'Test', '223', 'Ghazi, Haripur, Pakistan', 'Test', 'Pakistan', '12345', '2020-08-07 00:14:00', '2020-08-07 05:14:00', NULL),
(44, 45, 'No', NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2020-08-07 00:14:13', '2020-08-07 05:14:13', NULL),
(45, 45, 'No', NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2020-08-07 00:14:27', '2020-08-07 05:14:27', NULL),
(46, 45, 'No', NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2020-08-07 00:22:44', '2020-08-07 05:22:44', NULL),
(47, 45, 'No', NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2020-08-07 00:28:20', '2020-08-07 05:28:20', NULL),
(48, 45, 'No', NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2020-08-07 00:34:17', '2020-08-07 05:34:17', NULL),
(49, 45, 'No', NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2020-08-07 00:35:24', '2020-08-07 05:35:24', NULL),
(50, 45, 'No', NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2020-08-07 00:35:57', '2020-08-07 05:35:57', NULL),
(51, 37, 'No', NULL, NULL, NULL, NULL, 'Oaris', NULL, NULL, '2020-11-24 00:45:19', '2020-11-24 05:45:19', NULL),
(52, 37, 'No', NULL, 'Mohet Sector', NULL, NULL, 'Haripur', 'Pakistan', '22860', '2020-11-24 00:46:50', '2020-11-24 05:46:50', NULL),
(53, 37, 'No', NULL, NULL, NULL, NULL, 'Haripur', NULL, NULL, '2020-11-26 01:15:05', '2020-11-26 06:15:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location` int(11) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `patient` bigint(20) DEFAULT NULL,
  `notes` text,
  `appointment_type` enum('appointment','block_time') DEFAULT 'appointment',
  `status` enum('pending','cancelled','completed','deleted','checkin') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `location`, `service`, `doctor`, `room`, `booking_date`, `booking_end_date`, `start_time`, `end_time`, `patient`, `notes`, `appointment_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 4, 3, '2020-02-03', '1970-01-01', '14:00:00', '14:30:00', 37, NULL, 'appointment', 'pending', '2020-02-03 11:29:22', '2020-02-03 16:29:22', NULL),
(2, 1, 5, 1, 2, '2020-03-11', '1970-01-01', '10:40:00', '11:30:00', 37, 'TEST', 'appointment', 'pending', '2020-03-10 23:06:34', '2020-03-11 04:06:34', NULL),
(3, 1, 6, 1, 4, '2020-03-11', '1970-01-01', '14:20:00', '14:55:00', 37, 'test', 'appointment', 'pending', '2020-03-10 23:07:10', '2020-03-11 04:07:10', NULL),
(4, 1, 1, 4, 3, '2020-04-15', '1970-01-01', '10:00:00', '11:20:00', 37, NULL, 'appointment', 'pending', '2020-04-15 08:43:26', '2020-06-02 03:22:01', NULL),
(5, 1, 3, 4, 2, '2020-06-19', '1970-01-01', '11:30:00', '12:15:00', 38, NULL, 'appointment', 'pending', '2020-06-18 23:55:14', '2020-06-19 04:55:14', NULL),
(6, 1, 3, 1, 2, '2020-06-19', '1970-01-01', '11:30:00', '12:15:00', 29, NULL, 'appointment', 'pending', '2020-06-18 23:55:14', '2020-06-19 04:55:14', NULL),
(7, 1, 3, 1, 2, '2020-06-19', '1970-01-01', '11:30:00', '12:15:00', 30, NULL, 'appointment', 'completed', '2020-06-18 23:55:14', '2020-06-19 04:55:14', NULL),
(8, 1, 3, 1, 2, '2020-06-19', '1970-01-01', '11:30:00', '12:15:00', 37, NULL, 'appointment', 'completed', '2020-06-18 23:55:14', '2020-06-19 04:55:14', NULL),
(9, 1, 1, 1, 3, '2020-07-22', '1970-01-01', '12:45:00', '13:05:00', 32, NULL, 'appointment', 'pending', '2020-07-22 01:46:37', '2020-07-22 06:46:37', NULL),
(10, 4, 34, 8, 4, '2020-07-23', '1970-01-01', '11:30:00', '13:45:00', 40, NULL, 'appointment', 'checkin', '2020-07-22 22:40:03', '2020-07-23 05:42:46', NULL),
(11, 4, 2, 9, 6, '2020-07-23', '1970-01-01', '12:00:00', '13:10:00', 41, NULL, 'appointment', 'pending', '2020-07-22 22:40:36', '2020-07-23 03:40:36', NULL),
(12, 1, 1, 1, 4, '2020-07-23', '1970-01-01', '13:45:00', '14:15:00', 37, NULL, 'appointment', 'pending', '2020-07-22 22:42:15', '2020-07-23 03:42:15', NULL),
(13, 1, NULL, 1, 1, '2020-07-23', '2020-07-23', '11:00:00', '12:00:00', NULL, NULL, 'block_time', 'pending', '2020-07-22 22:49:41', '2020-07-23 03:49:41', NULL),
(14, -1, NULL, -1, -1, '2020-07-23', '2020-07-23', '09:00:00', '11:00:00', NULL, NULL, 'block_time', 'pending', '2020-07-22 22:50:21', '2020-07-23 03:50:21', NULL),
(15, 1, 1, 1, 2, '2020-07-24', '1970-01-01', '09:45:00', '10:20:00', 37, NULL, 'appointment', 'pending', '2020-07-23 22:40:02', '2020-07-24 03:40:02', NULL),
(16, 2, 1, 1, 4, '2020-07-24', '1970-01-01', '08:35:00', '08:50:00', 37, NULL, 'appointment', 'pending', '2020-07-23 22:41:19', '2020-07-24 03:41:19', NULL),
(17, 1, 95, 1, 2, '2020-07-24', '1970-01-01', '09:30:00', '09:35:00', 39, NULL, 'appointment', 'pending', '2020-07-23 22:42:04', '2020-07-24 03:42:04', NULL),
(18, 4, 2, 8, 2, '2020-07-24', '1970-01-01', '12:15:00', '12:40:00', 39, 'test', 'appointment', 'pending', '2020-07-24 00:08:37', '2020-07-24 05:08:37', NULL),
(19, 4, 96, 9, 3, '2020-07-24', '1970-01-01', '11:55:00', '12:05:00', 32, NULL, 'appointment', 'pending', '2020-07-24 00:09:14', '2020-07-24 05:09:14', NULL),
(20, 1, 1, 1, 2, '2020-07-24', '1970-01-01', '12:00:00', '12:35:00', 39, NULL, 'appointment', 'pending', '2020-07-24 00:12:46', '2020-07-24 05:12:46', NULL),
(21, 3, 1, 6, 3, '2020-07-24', '1970-01-01', '09:30:00', '10:15:00', 39, NULL, 'appointment', 'pending', '2020-07-24 00:13:53', '2020-07-24 05:13:53', NULL),
(22, 3, 1, 8, 2, '2020-07-24', '1970-01-01', '09:30:00', '10:35:00', 39, NULL, 'appointment', 'pending', '2020-07-24 00:14:30', '2020-07-24 05:14:30', NULL),
(23, 3, 1, 8, 3, '2020-07-24', '1970-01-01', '10:15:00', '10:40:00', 39, NULL, 'appointment', 'pending', '2020-07-24 00:17:16', '2020-07-24 07:15:19', NULL),
(24, 4, 2, 8, 6, '2020-08-07', '1970-01-01', '09:00:00', '09:45:00', 42, NULL, 'appointment', 'pending', '2020-08-06 22:36:40', '2020-08-07 03:36:40', NULL),
(25, 4, 2, 9, 5, '2020-08-07', '1970-01-01', '14:25:00', '15:00:00', 45, NULL, 'appointment', 'pending', '2020-08-06 23:11:30', '2020-08-07 04:11:30', NULL),
(26, 1, 2, 4, 3, '2020-08-10', '1970-01-01', '15:45:00', '16:05:00', 39, NULL, 'appointment', 'pending', '2020-08-10 03:57:25', '2020-08-12 13:20:32', NULL),
(27, 1, 1, 4, 2, '2020-08-10', '1970-01-01', '17:40:00', '18:20:00', 39, NULL, 'appointment', 'cancelled', '2020-08-10 03:58:30', '2020-08-10 08:58:42', NULL),
(28, 1, 1, 1, 2, '2020-08-10', '1970-01-01', '16:45:00', '17:15:00', 39, NULL, 'appointment', 'pending', '2020-08-10 03:59:05', '2020-08-12 13:23:00', NULL),
(29, -1, NULL, -1, -1, '2020-08-12', '2020-08-12', '10:00:00', '10:30:00', NULL, 'meeting', 'block_time', 'pending', '2020-08-11 22:46:32', '2020-08-12 03:46:32', NULL),
(30, -1, NULL, -1, -1, '2020-08-13', '2020-08-13', '10:05:00', '12:35:00', NULL, NULL, 'block_time', 'pending', '2020-08-12 23:29:46', '2020-08-13 04:29:46', NULL),
(31, -1, NULL, 6, 3, '2020-08-13', '2020-08-13', '13:00:00', '14:15:00', NULL, NULL, 'block_time', 'pending', '2020-08-13 02:03:41', '2020-08-13 07:03:41', NULL),
(32, 1, 1, 4, 3, '2020-08-13', '1970-01-01', '15:30:00', '16:00:00', 39, NULL, 'appointment', 'pending', '2020-08-13 04:34:15', '2020-08-13 09:34:15', NULL),
(33, 1, 4, 6, 6, '2020-08-13', '1970-01-01', '15:45:00', '16:20:00', 37, NULL, 'appointment', 'pending', '2020-08-13 04:34:43', '2020-08-13 09:35:52', NULL),
(34, 1, 2, 4, 4, '2020-08-17', '1970-01-01', '11:45:00', '12:15:00', 39, NULL, 'appointment', 'pending', '2020-08-16 22:32:11', '2020-08-17 05:38:05', NULL),
(35, 4, 1, 4, 4, '2020-08-17', '1970-01-01', '11:15:00', '11:45:00', 37, NULL, 'appointment', 'pending', '2020-08-17 00:37:50', '2020-08-17 05:37:50', NULL),
(36, 4, 2, 4, 4, '2020-08-18', '1970-01-01', '11:00:00', '12:00:00', 37, NULL, 'appointment', 'pending', '2020-08-17 01:05:25', '2020-08-17 06:05:25', NULL),
(37, 4, 1, 8, 3, '2020-08-21', '1970-01-01', '09:30:00', '10:00:00', 37, NULL, 'appointment', 'pending', '2020-08-20 22:10:55', '2020-08-21 03:10:55', NULL),
(38, 5, 1, 9, 5, '2020-08-22', '1970-01-01', '11:00:00', '11:30:00', 37, 'a', 'appointment', 'pending', '2020-08-20 22:15:59', '2020-08-21 03:15:59', NULL),
(39, 1, 1, 1, 3, '2020-08-22', '1970-01-01', '08:30:00', '09:00:00', 45, NULL, 'appointment', 'pending', '2020-08-21 22:26:25', '2020-08-22 03:26:25', NULL),
(40, 1, 97, 1, 3, '2020-08-22', '1970-01-01', '09:00:00', '09:30:00', 5, NULL, 'appointment', 'pending', '2020-08-21 22:26:46', '2020-08-22 03:26:46', NULL),
(41, 1, 1, 1, 3, '2020-08-22', '1970-01-01', '09:30:00', '10:00:00', 31, NULL, 'appointment', 'pending', '2020-08-21 22:27:09', '2020-08-22 03:27:09', NULL),
(42, 1, 1, 1, 3, '2020-08-22', '1970-01-01', '10:00:00', '10:30:00', 1, NULL, 'appointment', 'pending', '2020-08-21 22:27:28', '2020-08-22 03:27:28', NULL),
(43, 1, 1, 1, 3, '2020-08-22', '1970-01-01', '10:30:00', '11:00:00', 16, NULL, 'appointment', 'cancelled', '2020-08-21 22:27:55', '2020-08-22 03:28:48', NULL),
(44, 1, 1, 1, 3, '2020-08-22', '1970-01-01', '11:00:00', '11:30:00', 29, NULL, 'appointment', 'pending', '2020-08-21 22:28:17', '2020-08-22 03:28:17', NULL),
(45, 1, 1, 4, 3, '2020-08-22', '1970-01-01', '10:30:00', '11:00:00', 30, NULL, 'appointment', 'pending', '2020-08-21 22:29:01', '2020-08-22 03:29:01', NULL),
(46, 1, 2, 1, 3, '2020-08-22', '1970-01-01', '11:30:00', '12:00:00', 23, NULL, 'appointment', 'pending', '2020-08-21 22:29:36', '2020-08-22 03:29:36', NULL),
(47, 1, 1, 1, 3, '2020-08-22', '1970-01-01', '12:00:00', '12:30:00', 26, NULL, 'appointment', 'pending', '2020-08-21 22:29:56', '2020-08-22 03:29:56', NULL),
(48, 1, 3, 1, 3, '2020-08-22', '1970-01-01', '12:30:00', '13:00:00', 13, NULL, 'appointment', 'pending', '2020-08-21 22:30:19', '2020-08-22 03:30:19', NULL),
(49, 1, 1, 1, 3, '2020-08-22', '1970-01-01', '13:00:00', '13:30:00', 13, NULL, 'appointment', 'pending', '2020-08-21 22:30:49', '2020-08-22 03:30:49', NULL),
(50, 1, 2, 1, 3, '2020-08-22', '1970-01-01', '13:30:00', '14:00:00', 15, NULL, 'appointment', 'pending', '2020-08-21 22:31:18', '2020-08-22 03:31:18', NULL),
(51, 1, 2, 1, 4, '2020-08-22', '1970-01-01', '09:30:00', '10:00:00', 9, NULL, 'appointment', 'pending', '2020-08-21 22:32:44', '2020-08-22 03:32:44', NULL),
(52, 1, 1, 1, 4, '2020-08-22', '1970-01-01', '10:00:00', '10:30:00', 17, NULL, 'appointment', 'pending', '2020-08-21 22:33:02', '2020-08-22 03:33:02', NULL),
(53, 1, 1, 1, 4, '2020-08-22', '1970-01-01', '10:30:00', '11:00:00', 1, NULL, 'appointment', 'pending', '2020-08-21 22:33:22', '2020-08-22 03:33:22', NULL),
(54, 1, 3, 1, 4, '2020-08-22', '1970-01-01', '11:00:00', '11:30:00', 6, NULL, 'appointment', 'pending', '2020-08-21 22:33:38', '2020-08-22 03:33:38', NULL),
(55, 1, 1, 1, 4, '2020-08-22', '1970-01-01', '11:30:00', '12:00:00', 3, NULL, 'appointment', 'pending', '2020-08-21 22:34:17', '2020-08-22 03:34:17', NULL),
(56, 1, 1, 1, 4, '2020-08-22', '1970-01-01', '12:00:00', '12:30:00', 11, NULL, 'appointment', 'pending', '2020-08-21 22:34:35', '2020-08-22 03:34:35', NULL),
(57, 1, 1, 1, 4, '2020-08-22', '1970-01-01', '12:30:00', '13:00:00', 14, NULL, 'appointment', 'pending', '2020-08-21 22:35:07', '2020-08-22 03:35:07', NULL),
(58, 1, 1, 1, 4, '2020-08-22', '1970-01-01', '13:00:00', '13:30:00', 18, NULL, 'appointment', 'pending', '2020-08-21 22:35:35', '2020-08-22 03:35:35', NULL),
(59, 1, 1, 1, 4, '2020-08-22', '1970-01-01', '13:30:00', '14:00:00', 8, NULL, 'appointment', 'pending', '2020-08-21 22:36:10', '2020-08-22 03:36:10', NULL),
(60, 1, 1, 4, 5, '2020-08-22', '1970-01-01', '09:30:00', '10:00:00', 2, NULL, 'appointment', 'pending', '2020-08-21 22:37:14', '2020-08-22 03:37:14', NULL),
(61, 1, 1, 4, 5, '2020-08-22', '1970-01-01', '10:00:00', '10:30:00', 4, NULL, 'appointment', 'pending', '2020-08-21 22:37:38', '2020-08-22 03:37:38', NULL),
(62, 1, 1, 6, 5, '2020-08-22', '1970-01-01', '10:30:00', '11:00:00', 27, NULL, 'appointment', 'pending', '2020-08-21 22:38:43', '2020-08-22 03:38:43', NULL),
(63, 1, 1, NULL, 4, '2020-08-24', '1970-01-01', '09:15:00', '09:45:00', 39, NULL, 'appointment', 'pending', '2020-08-23 22:07:40', '2020-08-24 03:07:40', NULL),
(64, 4, 2, 4, 5, '2020-08-24', '1970-01-01', '09:15:00', '09:45:00', 37, 's', 'appointment', 'pending', '2020-08-23 22:08:24', '2020-08-24 03:08:24', NULL),
(65, 1, 1, 1, 1, '2020-08-24', '1970-01-01', '09:00:00', '10:00:00', 39, NULL, 'appointment', 'pending', '2020-08-23 22:30:19', '2020-08-24 03:30:19', NULL),
(66, 1, 1, 6, 1, '2020-08-24', '1970-01-01', '09:00:00', '10:00:00', 1, NULL, 'appointment', 'pending', '2020-08-23 22:30:55', '2020-08-24 03:30:55', NULL),
(67, 1, 1, 4, 1, '2020-08-24', '1970-01-01', '09:00:00', '09:30:00', 31, NULL, 'appointment', 'pending', '2020-08-23 22:47:00', '2020-08-24 03:47:00', NULL),
(68, 1, 1, 9, 2, '2020-08-24', '1970-01-01', '09:00:00', '09:30:00', 35, NULL, 'appointment', 'pending', '2020-08-23 23:22:21', '2020-08-24 04:22:21', NULL),
(69, 3, 1, 11, 1, '2020-08-24', '1970-01-01', '09:30:00', '10:00:00', 32, NULL, 'appointment', 'pending', '2020-08-23 23:22:51', '2020-08-24 04:22:51', NULL),
(70, -1, NULL, 4, -1, '2020-08-25', '2020-08-25', '10:30:00', '12:00:00', NULL, NULL, 'block_time', 'pending', '2020-08-24 22:21:38', '2020-08-25 03:21:38', NULL),
(71, 2, NULL, 1, -1, '2020-08-25', '2020-08-25', '14:00:00', '17:00:00', NULL, NULL, 'block_time', 'pending', '2020-08-24 22:29:45', '2020-08-25 03:29:45', NULL),
(72, 1, 1, 1, 1, '2020-08-26', '1970-01-01', '16:00:00', '17:00:00', 39, NULL, 'appointment', 'pending', '2020-08-25 22:09:13', '2020-08-26 03:09:13', NULL),
(73, 1, 1, 1, 2, '2020-08-31', '1970-01-01', '09:30:00', '10:00:00', 39, NULL, 'appointment', 'pending', '2020-08-30 22:56:26', '2020-08-31 03:56:26', NULL),
(74, 1, 1, 1, 2, '2020-08-31', '1970-01-01', '10:45:00', '11:15:00', 37, NULL, 'appointment', 'pending', '2020-08-30 23:00:20', '2020-08-31 04:00:20', NULL),
(75, 1, 1, 1, 2, '2020-08-31', '1970-01-01', '11:30:00', '12:00:00', 39, NULL, 'appointment', 'pending', '2020-08-30 23:02:37', '2020-08-31 04:02:37', NULL),
(76, 1, 1, 1, 2, '2020-08-31', '1970-01-01', '12:30:00', '13:00:00', 39, NULL, 'appointment', 'pending', '2020-08-30 23:10:24', '2020-08-31 04:10:24', NULL),
(77, 1, 1, 1, 2, '2020-08-31', '1970-01-01', '13:30:00', '14:00:00', 39, NULL, 'appointment', 'pending', '2020-08-30 23:10:55', '2020-08-31 04:10:55', NULL),
(78, 1, 1, 1, 2, '2020-09-01', '1970-01-01', '14:30:00', '15:00:00', 39, NULL, 'appointment', 'pending', '2020-08-30 23:18:16', '2020-08-31 04:18:16', NULL),
(79, 1, 2, 7, 2, '2020-08-31', '1970-01-01', '14:30:00', '15:00:00', 39, NULL, 'appointment', 'pending', '2020-08-30 23:20:07', '2020-08-31 04:20:07', NULL),
(80, 1, 1, 1, 1, '2020-09-04', '1970-01-01', '11:15:00', '11:45:00', 39, NULL, 'appointment', 'pending', '2020-09-04 00:51:54', '2020-09-04 05:51:54', NULL),
(81, 1, 1, 1, 1, '2020-09-04', '1970-01-01', '11:50:00', '12:00:00', 39, NULL, 'appointment', 'cancelled', '2020-09-04 00:59:00', '2020-09-04 05:59:15', NULL),
(82, 1, 1, 1, 2, '2020-09-14', '1970-01-01', '11:45:00', '12:15:00', 39, NULL, 'appointment', 'pending', '2020-09-14 01:40:30', '2020-09-14 06:40:30', NULL),
(83, 1, 1, 1, 2, '2020-09-15', '1970-01-01', '13:00:00', '13:30:00', 37, NULL, 'appointment', 'pending', '2020-09-14 01:41:03', '2020-09-14 06:41:03', NULL),
(84, 1, 1, 1, 2, '2020-09-15', '1970-01-01', '10:00:00', '11:00:00', 37, NULL, 'appointment', 'pending', '2020-09-14 01:41:33', '2020-09-14 06:41:33', NULL),
(85, 1, 1, 1, 2, '2020-09-15', '1970-01-01', '11:30:00', '12:00:00', 37, NULL, 'appointment', 'pending', '2020-09-14 01:50:10', '2020-09-14 06:50:10', NULL),
(86, 1, 1, 1, 2, '2020-09-18', '1970-01-01', '14:30:00', '15:00:00', 39, NULL, 'appointment', 'pending', '2020-09-14 04:12:15', '2020-09-14 09:12:15', NULL),
(87, 1, 98, 1, 2, '2020-09-15', '1970-01-01', '13:45:00', '14:15:00', 39, NULL, 'appointment', 'pending', '2020-09-15 02:18:04', '2020-09-15 07:18:04', NULL),
(88, 1, 1, 1, 2, '2020-09-23', '1970-01-01', '10:00:00', '10:30:00', 39, NULL, 'appointment', 'pending', '2020-09-15 02:19:24', '2020-09-15 07:19:24', NULL),
(89, 1, 1, 1, 3, '2020-09-23', '1970-01-01', '12:15:00', '12:45:00', 39, NULL, 'appointment', 'pending', '2020-09-15 02:20:37', '2020-09-15 07:20:37', NULL),
(90, 1, 1, 1, 3, '2020-09-17', '1970-01-01', '16:00:00', '17:00:00', 37, NULL, 'appointment', 'pending', '2020-09-15 05:21:04', '2020-09-15 10:21:04', NULL),
(91, 1, 1, 1, 2, '2020-09-22', '1970-01-01', '17:00:00', '17:30:00', 39, NULL, 'appointment', 'pending', '2020-09-21 05:39:22', '2020-09-21 10:39:22', NULL),
(92, 1, 1, 1, 2, '2020-11-05', '1970-01-01', '17:15:00', '17:45:00', 39, NULL, 'appointment', 'pending', '2020-11-05 07:12:13', '2020-11-05 12:17:44', NULL),
(93, 1, 1, 1, 1, '2020-12-02', '1970-01-01', '09:30:00', '10:00:00', 39, NULL, 'appointment', 'pending', '2020-12-01 05:22:46', '2020-12-01 10:22:46', NULL),
(94, 1, 1, 1, 1, '2020-12-02', '1970-01-01', '16:00:00', '17:00:00', 39, NULL, 'appointment', 'pending', '2020-12-01 05:23:18', '2020-12-01 10:23:18', NULL),
(95, 1, 1, 1, 1, '2020-12-02', '1970-01-01', '17:00:00', '17:30:00', 39, NULL, 'appointment', 'pending', '2020-12-01 05:23:43', '2020-12-01 10:23:43', NULL),
(96, 1, 6, 4, 2, '2020-12-02', '1970-01-01', '12:00:00', '13:00:00', 32, NULL, 'appointment', 'pending', '2020-12-02 01:16:38', '2020-12-02 06:16:38', NULL),
(97, 1, 16, 4, 2, '2020-12-02', '1970-01-01', '14:00:00', '14:30:00', 38, NULL, 'appointment', 'pending', '2020-12-02 01:21:00', '2020-12-02 06:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_activities`
--

DROP TABLE IF EXISTS `appointment_activities`;
CREATE TABLE IF NOT EXISTS `appointment_activities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `status` enum('created','cancel','completed','checkin','updated','deleted') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_activities`
--

INSERT INTO `appointment_activities` (`id`, `user_id`, `appointment_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 9, NULL, '2020-07-22 01:46:37', '2020-07-22 01:46:37', NULL),
(2, 1, 10, 'created', '2020-07-22 22:40:03', '2020-07-22 22:40:03', NULL),
(3, 1, 11, 'created', '2020-07-22 22:40:36', '2020-07-22 22:40:36', NULL),
(4, 1, 12, 'created', '2020-07-22 22:42:15', '2020-07-22 22:42:15', NULL),
(5, 1, 10, 'updated', '2020-07-22 22:42:57', '2020-07-22 22:42:57', NULL),
(6, 1, 10, 'updated', '2020-07-22 22:43:05', '2020-07-22 22:43:05', NULL),
(7, 160, 10, 'checkin', '2020-07-23 00:42:46', '2020-07-23 00:42:46', NULL),
(8, 1, 15, 'created', '2020-07-23 22:40:02', '2020-07-23 22:40:02', NULL),
(9, 1, 16, 'created', '2020-07-23 22:41:19', '2020-07-23 22:41:19', NULL),
(10, 1, 17, 'created', '2020-07-23 22:42:04', '2020-07-23 22:42:04', NULL),
(11, 1, 18, 'created', '2020-07-24 00:08:37', '2020-07-24 00:08:37', NULL),
(12, 1, 19, 'created', '2020-07-24 00:09:14', '2020-07-24 00:09:14', NULL),
(13, 1, 20, 'created', '2020-07-24 00:12:46', '2020-07-24 00:12:46', NULL),
(14, 1, 21, 'created', '2020-07-24 00:13:53', '2020-07-24 00:13:53', NULL),
(15, 1, 22, 'created', '2020-07-24 00:14:30', '2020-07-24 00:14:30', NULL),
(16, 1, 23, 'created', '2020-07-24 00:17:16', '2020-07-24 00:17:16', NULL),
(17, 1, 23, 'updated', '2020-07-24 02:15:20', '2020-07-24 02:15:20', NULL),
(18, 1, 24, 'created', '2020-08-06 22:36:40', '2020-08-06 22:36:40', NULL),
(19, 1, 25, 'created', '2020-08-06 23:11:30', '2020-08-06 23:11:30', NULL),
(20, 1, 26, 'created', '2020-08-10 03:57:25', '2020-08-10 03:57:25', NULL),
(21, 1, 27, 'created', '2020-08-10 03:58:30', '2020-08-10 03:58:30', NULL),
(22, 1, 27, '', '2020-08-10 03:58:42', '2020-08-10 03:58:42', NULL),
(23, 1, 28, 'created', '2020-08-10 03:59:05', '2020-08-10 03:59:05', NULL),
(24, 1, 28, 'updated', '2020-08-10 05:22:32', '2020-08-10 05:22:32', NULL),
(25, 1, 28, 'updated', '2020-08-10 05:22:33', '2020-08-10 05:22:33', NULL),
(26, 1, 28, 'updated', '2020-08-12 05:44:43', '2020-08-12 05:44:43', NULL),
(27, 1, 28, 'updated', '2020-08-12 05:44:44', '2020-08-12 05:44:44', NULL),
(28, 1, 28, 'updated', '2020-08-12 05:44:45', '2020-08-12 05:44:45', NULL),
(29, 1, 26, 'updated', '2020-08-12 07:49:08', '2020-08-12 07:49:08', NULL),
(30, 1, 28, 'updated', '2020-08-12 08:06:27', '2020-08-12 08:06:27', NULL),
(31, 1, 26, 'updated', '2020-08-12 08:19:28', '2020-08-12 08:19:28', NULL),
(32, 1, 26, 'updated', '2020-08-12 08:19:59', '2020-08-12 08:19:59', NULL),
(33, 1, 26, 'updated', '2020-08-12 08:20:24', '2020-08-12 08:20:24', NULL),
(34, 1, 26, 'updated', '2020-08-12 08:20:32', '2020-08-12 08:20:32', NULL),
(35, 1, 28, 'updated', '2020-08-12 08:20:59', '2020-08-12 08:20:59', NULL),
(36, 1, 28, 'updated', '2020-08-12 08:21:18', '2020-08-12 08:21:18', NULL),
(37, 1, 28, 'updated', '2020-08-12 08:23:00', '2020-08-12 08:23:00', NULL),
(38, 1, 32, 'created', '2020-08-13 04:34:15', '2020-08-13 04:34:15', NULL),
(39, 1, 33, 'created', '2020-08-13 04:34:43', '2020-08-13 04:34:43', NULL),
(40, 1, 33, 'updated', '2020-08-13 04:35:52', '2020-08-13 04:35:52', NULL),
(41, 1, 34, 'created', '2020-08-16 22:32:11', '2020-08-16 22:32:11', NULL),
(42, 1, 34, 'updated', '2020-08-16 22:32:48', '2020-08-16 22:32:48', NULL),
(43, 1, 34, 'updated', '2020-08-16 22:37:41', '2020-08-16 22:37:41', NULL),
(44, 1, 34, 'updated', '2020-08-16 22:37:42', '2020-08-16 22:37:42', NULL),
(45, 1, 34, 'updated', '2020-08-16 22:37:42', '2020-08-16 22:37:42', NULL),
(46, 1, 34, 'updated', '2020-08-16 22:37:44', '2020-08-16 22:37:44', NULL),
(47, 1, 34, 'updated', '2020-08-16 22:37:44', '2020-08-16 22:37:44', NULL),
(48, 1, 34, 'updated', '2020-08-16 22:37:45', '2020-08-16 22:37:45', NULL),
(49, 1, 34, 'updated', '2020-08-16 22:37:46', '2020-08-16 22:37:46', NULL),
(50, 1, 34, 'updated', '2020-08-16 22:37:46', '2020-08-16 22:37:46', NULL),
(51, 1, 34, 'updated', '2020-08-16 22:39:05', '2020-08-16 22:39:05', NULL),
(52, 1, 34, 'updated', '2020-08-16 22:53:41', '2020-08-16 22:53:41', NULL),
(53, 1, 34, 'updated', '2020-08-16 22:53:43', '2020-08-16 22:53:43', NULL),
(54, 1, 34, 'updated', '2020-08-16 22:53:44', '2020-08-16 22:53:44', NULL),
(55, 1, 34, 'updated', '2020-08-16 22:54:38', '2020-08-16 22:54:38', NULL),
(56, 1, 34, 'updated', '2020-08-16 23:06:09', '2020-08-16 23:06:09', NULL),
(57, 1, 34, 'updated', '2020-08-16 23:07:12', '2020-08-16 23:07:12', NULL),
(58, 1, 34, 'updated', '2020-08-16 23:19:51', '2020-08-16 23:19:51', NULL),
(59, 1, 34, 'updated', '2020-08-16 23:19:52', '2020-08-16 23:19:52', NULL),
(60, 1, 34, 'updated', '2020-08-16 23:19:58', '2020-08-16 23:19:58', NULL),
(61, 1, 34, 'updated', '2020-08-16 23:19:59', '2020-08-16 23:19:59', NULL),
(62, 1, 34, 'updated', '2020-08-16 23:19:59', '2020-08-16 23:19:59', NULL),
(63, 1, 34, 'updated', '2020-08-16 23:20:00', '2020-08-16 23:20:00', NULL),
(64, 1, 34, 'updated', '2020-08-16 23:20:02', '2020-08-16 23:20:02', NULL),
(65, 1, 34, 'updated', '2020-08-16 23:21:30', '2020-08-16 23:21:30', NULL),
(66, 1, 34, 'updated', '2020-08-16 23:21:31', '2020-08-16 23:21:31', NULL),
(67, 1, 34, 'updated', '2020-08-16 23:21:31', '2020-08-16 23:21:31', NULL),
(68, 1, 34, 'updated', '2020-08-16 23:21:32', '2020-08-16 23:21:32', NULL),
(69, 1, 34, 'updated', '2020-08-16 23:21:33', '2020-08-16 23:21:33', NULL),
(70, 1, 34, 'updated', '2020-08-16 23:23:00', '2020-08-16 23:23:00', NULL),
(71, 1, 34, 'updated', '2020-08-16 23:23:59', '2020-08-16 23:23:59', NULL),
(72, 1, 34, 'updated', '2020-08-16 23:23:59', '2020-08-16 23:23:59', NULL),
(73, 1, 34, 'updated', '2020-08-16 23:24:00', '2020-08-16 23:24:00', NULL),
(74, 1, 34, 'updated', '2020-08-16 23:24:01', '2020-08-16 23:24:01', NULL),
(75, 1, 34, 'updated', '2020-08-16 23:24:01', '2020-08-16 23:24:01', NULL),
(76, 1, 34, 'updated', '2020-08-16 23:24:02', '2020-08-16 23:24:02', NULL),
(77, 1, 34, 'updated', '2020-08-16 23:24:36', '2020-08-16 23:24:36', NULL),
(78, 1, 34, 'updated', '2020-08-16 23:24:41', '2020-08-16 23:24:41', NULL),
(79, 1, 34, 'updated', '2020-08-16 23:24:45', '2020-08-16 23:24:45', NULL),
(80, 1, 34, 'updated', '2020-08-16 23:24:46', '2020-08-16 23:24:46', NULL),
(81, 1, 34, 'updated', '2020-08-16 23:24:51', '2020-08-16 23:24:51', NULL),
(82, 1, 34, 'updated', '2020-08-16 23:24:51', '2020-08-16 23:24:51', NULL),
(83, 1, 34, 'updated', '2020-08-16 23:25:00', '2020-08-16 23:25:00', NULL),
(84, 1, 34, 'updated', '2020-08-16 23:25:06', '2020-08-16 23:25:06', NULL),
(85, 1, 34, 'updated', '2020-08-16 23:25:06', '2020-08-16 23:25:06', NULL),
(86, 1, 34, 'updated', '2020-08-16 23:25:07', '2020-08-16 23:25:07', NULL),
(87, 1, 35, 'created', '2020-08-17 00:37:50', '2020-08-17 00:37:50', NULL),
(88, 1, 34, 'updated', '2020-08-17 00:38:00', '2020-08-17 00:38:00', NULL),
(89, 1, 34, 'updated', '2020-08-17 00:38:03', '2020-08-17 00:38:03', NULL),
(90, 1, 34, 'updated', '2020-08-17 00:38:05', '2020-08-17 00:38:05', NULL),
(91, 1, 36, 'created', '2020-08-17 01:05:25', '2020-08-17 01:05:25', NULL),
(92, 1, 37, 'created', '2020-08-20 22:10:55', '2020-08-20 22:10:55', NULL),
(93, 1, 38, 'created', '2020-08-20 22:15:59', '2020-08-20 22:15:59', NULL),
(94, 1, 39, 'created', '2020-08-21 22:26:25', '2020-08-21 22:26:25', NULL),
(95, 1, 40, 'created', '2020-08-21 22:26:46', '2020-08-21 22:26:46', NULL),
(96, 1, 41, 'created', '2020-08-21 22:27:09', '2020-08-21 22:27:09', NULL),
(97, 1, 42, 'created', '2020-08-21 22:27:28', '2020-08-21 22:27:28', NULL),
(98, 1, 43, 'created', '2020-08-21 22:27:55', '2020-08-21 22:27:55', NULL),
(99, 1, 44, 'created', '2020-08-21 22:28:17', '2020-08-21 22:28:17', NULL),
(100, 1, 43, '', '2020-08-21 22:28:48', '2020-08-21 22:28:48', NULL),
(101, 1, 45, 'created', '2020-08-21 22:29:01', '2020-08-21 22:29:01', NULL),
(102, 1, 46, 'created', '2020-08-21 22:29:36', '2020-08-21 22:29:36', NULL),
(103, 1, 47, 'created', '2020-08-21 22:29:56', '2020-08-21 22:29:56', NULL),
(104, 1, 48, 'created', '2020-08-21 22:30:19', '2020-08-21 22:30:19', NULL),
(105, 1, 49, 'created', '2020-08-21 22:30:49', '2020-08-21 22:30:49', NULL),
(106, 1, 50, 'created', '2020-08-21 22:31:18', '2020-08-21 22:31:18', NULL),
(107, 1, 51, 'created', '2020-08-21 22:32:44', '2020-08-21 22:32:44', NULL),
(108, 1, 52, 'created', '2020-08-21 22:33:02', '2020-08-21 22:33:02', NULL),
(109, 1, 53, 'created', '2020-08-21 22:33:22', '2020-08-21 22:33:22', NULL),
(110, 1, 54, 'created', '2020-08-21 22:33:38', '2020-08-21 22:33:38', NULL),
(111, 1, 55, 'created', '2020-08-21 22:34:17', '2020-08-21 22:34:17', NULL),
(112, 1, 56, 'created', '2020-08-21 22:34:35', '2020-08-21 22:34:35', NULL),
(113, 1, 57, 'created', '2020-08-21 22:35:07', '2020-08-21 22:35:07', NULL),
(114, 1, 58, 'created', '2020-08-21 22:35:35', '2020-08-21 22:35:35', NULL),
(115, 1, 59, 'created', '2020-08-21 22:36:10', '2020-08-21 22:36:10', NULL),
(116, 1, 60, 'created', '2020-08-21 22:37:14', '2020-08-21 22:37:14', NULL),
(117, 1, 61, 'created', '2020-08-21 22:37:38', '2020-08-21 22:37:38', NULL),
(118, 1, 62, 'created', '2020-08-21 22:38:43', '2020-08-21 22:38:43', NULL),
(119, 1, 63, 'created', '2020-08-23 22:07:40', '2020-08-23 22:07:40', NULL),
(120, 1, 64, 'created', '2020-08-23 22:08:24', '2020-08-23 22:08:24', NULL),
(121, 1, 65, 'created', '2020-08-23 22:30:19', '2020-08-23 22:30:19', NULL),
(122, 1, 66, 'created', '2020-08-23 22:30:55', '2020-08-23 22:30:55', NULL),
(123, 1, 67, 'created', '2020-08-23 22:47:00', '2020-08-23 22:47:00', NULL),
(124, 1, 68, 'created', '2020-08-23 23:22:21', '2020-08-23 23:22:21', NULL),
(125, 1, 69, 'created', '2020-08-23 23:22:51', '2020-08-23 23:22:51', NULL),
(126, 1, 72, 'created', '2020-08-25 22:09:13', '2020-08-25 22:09:13', NULL),
(127, 1, 73, 'created', '2020-08-30 22:56:26', '2020-08-30 22:56:26', NULL),
(128, 1, 74, 'created', '2020-08-30 23:00:20', '2020-08-30 23:00:20', NULL),
(129, 1, 75, 'created', '2020-08-30 23:02:37', '2020-08-30 23:02:37', NULL),
(130, 1, 76, 'created', '2020-08-30 23:10:24', '2020-08-30 23:10:24', NULL),
(131, 1, 77, 'created', '2020-08-30 23:10:55', '2020-08-30 23:10:55', NULL),
(132, 1, 78, 'created', '2020-08-30 23:18:16', '2020-08-30 23:18:16', NULL),
(133, 1, 79, 'created', '2020-08-30 23:20:07', '2020-08-30 23:20:07', NULL),
(134, 1, 80, 'created', '2020-09-04 00:51:54', '2020-09-04 00:51:54', NULL),
(135, 1, 81, 'created', '2020-09-04 00:59:00', '2020-09-04 00:59:00', NULL),
(136, 1, 81, 'checkin', '2020-09-04 00:59:09', '2020-09-04 00:59:09', NULL),
(137, 1, 81, '', '2020-09-04 00:59:15', '2020-09-04 00:59:15', NULL),
(138, 1, 82, 'created', '2020-09-14 01:40:30', '2020-09-14 01:40:30', NULL),
(139, 1, 83, 'created', '2020-09-14 01:41:03', '2020-09-14 01:41:03', NULL),
(140, 1, 84, 'created', '2020-09-14 01:41:33', '2020-09-14 01:41:33', NULL),
(141, 1, 85, 'created', '2020-09-14 01:50:10', '2020-09-14 01:50:10', NULL),
(142, 1, 86, 'created', '2020-09-14 04:12:15', '2020-09-14 04:12:15', NULL),
(143, 1, 87, 'created', '2020-09-15 02:18:04', '2020-09-15 02:18:04', NULL),
(144, 1, 88, 'created', '2020-09-15 02:19:24', '2020-09-15 02:19:24', NULL),
(145, 1, 89, 'created', '2020-09-15 02:20:37', '2020-09-15 02:20:37', NULL),
(146, 1, 90, 'created', '2020-09-15 05:21:04', '2020-09-15 05:21:04', NULL),
(147, 1, 91, 'created', '2020-09-21 05:39:22', '2020-09-21 05:39:22', NULL),
(148, 1, 92, 'created', '2020-11-05 07:12:13', '2020-11-05 07:12:13', NULL),
(149, 1, 92, 'updated', '2020-11-05 07:17:44', '2020-11-05 07:17:44', NULL),
(150, 1, 93, 'created', '2020-12-01 05:22:46', '2020-12-01 05:22:46', NULL),
(151, 1, 94, 'created', '2020-12-01 05:23:18', '2020-12-01 05:23:18', NULL),
(152, 1, 95, 'created', '2020-12-01 05:23:43', '2020-12-01 05:23:43', NULL),
(153, 1, 96, 'created', '2020-12-02 01:16:38', '2020-12-02 01:16:38', NULL),
(154, 1, 97, 'created', '2020-12-02 01:21:00', '2020-12-02 01:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_sessions`
--

DROP TABLE IF EXISTS `appointment_sessions`;
CREATE TABLE IF NOT EXISTS `appointment_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `tooth_area` text,
  `treatment_done` text,
  `notes` text,
  `pre_advice` text,
  `complaints` text,
  `findings` text,
  `post_treatment_advice` text,
  `medications` text,
  `pre_medications` text,
  `radiographs` text,
  `consent` int(11) DEFAULT NULL,
  `next_visit` text,
  `lab_id` int(11) DEFAULT NULL,
  `material_id` varchar(255) DEFAULT NULL,
  `referral` int(11) DEFAULT NULL,
  `to_order` text,
  `communication` text,
  `is_paid` enum('Yes','No') DEFAULT NULL,
  `doctor_by` int(11) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_sessions`
--

INSERT INTO `appointment_sessions` (`id`, `appointment_id`, `patient_id`, `tooth_area`, `treatment_done`, `notes`, `pre_advice`, `complaints`, `findings`, `post_treatment_advice`, `medications`, `pre_medications`, `radiographs`, `consent`, `next_visit`, `lab_id`, `material_id`, `referral`, `to_order`, `communication`, `is_paid`, `doctor_by`, `paid_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 37, '1,4', NULL, NULL, NULL, 'd, d, d', 'as, wq', NULL, '', '7', NULL, NULL, '03/03/2020', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2020-03-19 10:51:50', '2020-05-14 23:20:11', '2020-05-14 23:20:11'),
(2, 3, 37, '', NULL, NULL, 'Advice1, Advice2', 'test, test2', 'Finding1, Finding2', 'treatone', '7,29', '81', 'Radio1, Radio2', NULL, '03/23/2020', NULL, NULL, NULL, 'to odrder', 'email_receive', NULL, 4, NULL, '2020-03-23 02:00:32', '2020-07-18 00:47:08', NULL),
(3, 3, 37, '7', NULL, NULL, NULL, NULL, NULL, NULL, '81', '81', NULL, NULL, '03/27/2020', NULL, NULL, NULL, NULL, '', NULL, 1, NULL, '2020-03-23 02:16:24', '2020-07-18 00:45:08', NULL),
(4, 2, 37, '', NULL, NULL, NULL, NULL, NULL, NULL, '29', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2020-03-23 23:49:51', '2020-03-23 23:49:51', NULL),
(5, 4, 37, '1,4', NULL, NULL, 'den, tooch, deny', 'pain in teach, swelling, jaws', 'finding, find2', 'toocg', '', '', 'test, test2', NULL, NULL, 1, '1', NULL, 'to odrder', '', NULL, 4, NULL, '2020-04-20 23:31:41', '2020-07-18 00:34:28', NULL),
(6, 4, 37, '1,4', NULL, NULL, NULL, 'test', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '1', NULL, NULL, '', NULL, NULL, NULL, '2020-04-29 22:00:56', '2020-06-01 22:23:01', '2020-06-01 22:23:01'),
(7, 5, 38, '', NULL, NULL, NULL, 'test, test, 2', 'res, res, ttes', NULL, '79', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2020-06-18 23:56:00', '2020-06-18 23:56:00', NULL),
(8, 12, 37, '', 'tttestyyerw', 'yes', 'test', 'test', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2020-07-23 00:10:40', '2020-07-23 00:48:37', NULL),
(9, 4, 37, '', 'test', 'test', NULL, 'test', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2020-07-23 01:33:00', '2020-07-23 01:33:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `archive_patients`
--

DROP TABLE IF EXISTS `archive_patients`;
CREATE TABLE IF NOT EXISTS `archive_patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) DEFAULT NULL,
  `patient_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_id` bigint(20) DEFAULT NULL,
  `salutation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comapny_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `change_of_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `reminder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `registered_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `archive_address` text COLLATE utf8mb4_unicode_ci,
  `archive_phone` text COLLATE utf8mb4_unicode_ci,
  `archive_medical_info` text COLLATE utf8mb4_unicode_ci,
  `archive_illness` text COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartments_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_patients`
--

INSERT INTO `archive_patients` (`id`, `patient_id`, `patient_unique_id`, `custom_code`, `referral_id`, `salutation`, `patient_name`, `first_name`, `last_name`, `patient_phone`, `patient_email`, `date_of_birth`, `gender`, `code`, `phone`, `nationality`, `card_type`, `card_number`, `occupation`, `comapny_name`, `referral_name`, `referral_code`, `insurance_by`, `insurance_number`, `city`, `state`, `zipcode`, `address`, `change_of_address`, `reminder`, `created_at`, `registered_at`, `updated_at`, `deleted_at`, `archive_address`, `archive_phone`, `archive_medical_info`, `archive_illness`, `profile_picture`, `family`, `patient_type`, `apartments_no`, `street_no`, `house_no`, `country`, `expiry_date`) VALUES
(1, 37, '25082037', NULL, NULL, 'Mr', 'kaloo khan', 'kaloo', 'khan', NULL, 'kaloo.khan@idcsg.com', '2014-01-01', NULL, NULL, NULL, NULL, 'IC Number', '444', NULL, NULL, 'Search Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-13 17:53:04', NULL, NULL, NULL, NULL, NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 37, '25082037', NULL, NULL, 'Mr', 'kaloo khan', 'kaloo', 'khan', NULL, 'kaloo.khan@idcsg.com', '2014-01-01', NULL, NULL, NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', '0', NULL, 'AIA', NULL, 'Oaris', NULL, '75009', NULL, NULL, NULL, '2020-05-13 17:55:21', NULL, NULL, NULL, '', NULL, '', 'null', NULL, NULL, NULL, NULL, '9 rue de bellefond', NULL, NULL, NULL),
(3, 37, '25082037', NULL, NULL, 'Mr', 'kaloo khan', 'kaloo', 'khan', NULL, 'mujtabaahmad1985@gmail.com', '2014-01-01', NULL, NULL, NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', NULL, NULL, 'AIA', NULL, 'Haripur', NULL, '22860', NULL, NULL, NULL, '2020-05-13 18:05:34', NULL, NULL, NULL, ',', NULL, '', 'null', NULL, NULL, NULL, 'Ghazi', 'Mohet Sector', 'Ghazi, Haripur, Pakistan', NULL, NULL),
(4, 37, '25082037', NULL, NULL, 'Mr', 'kaloo khan', 'kaloo', 'khan', NULL, 'mujtabaahmad1985@gmail.com', '2014-01-01', NULL, NULL, NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', NULL, NULL, 'AIA', NULL, 'Oaris', NULL, '75009', NULL, NULL, NULL, '2020-05-15 17:38:09', NULL, NULL, NULL, ',,', NULL, '', 'null', NULL, NULL, NULL, '#123', '9 rue de bellefond', 'house #37', NULL, NULL),
(5, 37, '25082037', NULL, NULL, 'Mr', 'kaloo khan', 'kaloo', 'khan', NULL, 'mujtabaahmad1985@gmail.com', '2014-01-01', NULL, NULL, NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', NULL, NULL, 'AIA', '1234567', 'Oaris', NULL, NULL, NULL, NULL, NULL, '2020-05-21 17:52:17', NULL, NULL, NULL, ',,,', NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 38, '25082038', NULL, NULL, 'Mr', 'Khaiso Hamlet', 'Khaiso', 'Hamlet', NULL, 'khaiso@gmail.com', '2015-03-02', 'Male', NULL, NULL, NULL, 'IC Number', NULL, NULL, NULL, 'Search Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'email_receive,post_receive', '2020-05-21 17:52:48', NULL, NULL, NULL, NULL, NULL, '', '[\"head_neck_injuries\",\"heart_disease\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 45, '25082043', NULL, NULL, 'Mr', 'yahoo00', '', '', '+3765555', 'may00@gmail.com', NULL, NULL, '376', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-07 05:14:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 45, NULL, NULL, 35, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '12345678', 'sabeel.ahmad@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, '25082034', 'AIA', '11236', 'Test', NULL, '12345', NULL, NULL, NULL, '2020-08-07 05:14:13', NULL, NULL, NULL, '', NULL, '', '[\"high_blood_pressure\",\"gastric_problems\",\"head_neck_injuries\"]', NULL, NULL, NULL, '223', 'Test', 'Ghazi, Haripur, Pakistan', NULL, NULL),
(9, 45, NULL, NULL, NULL, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '+376', 'sabeel.ahmad@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, NULL, 'AIA', '11236', 'Test', NULL, NULL, NULL, NULL, NULL, '2020-08-07 05:14:27', NULL, NULL, NULL, ',', NULL, '', '[\"allergie\",\"gastric_problems\",\"asthma\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 45, NULL, NULL, 35, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '+376', 'sabeel.ahmad@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, '25082034', 'AIA', '11236', 'Test', NULL, NULL, NULL, NULL, NULL, '2020-08-07 05:22:44', NULL, NULL, NULL, ',,', NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 45, NULL, NULL, NULL, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '+376', 'sabeel.ahmad@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, NULL, 'AIA', '11236', 'Test', NULL, NULL, NULL, NULL, NULL, '2020-08-07 05:28:20', NULL, NULL, NULL, ',,,', NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 45, NULL, NULL, NULL, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '+376', 'sabeel.ahmad@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, NULL, 'AIA', '11236', 'Test', NULL, NULL, NULL, NULL, NULL, '2020-08-07 05:34:17', NULL, NULL, NULL, ',,,,', NULL, '', '[\"heart_disease\",\"heart_disease\",\"herpes\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 45, NULL, NULL, NULL, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '+376', 'sabeel.ahmad@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, NULL, 'AIA', '11236', 'Test', NULL, NULL, NULL, NULL, NULL, '2020-08-07 05:35:24', NULL, NULL, NULL, ',,,,,', NULL, '', '[\"heart_disease\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 45, NULL, NULL, NULL, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '+376', 'may00@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, NULL, 'AIA', '11236', 'Test', NULL, NULL, NULL, NULL, NULL, '2020-08-07 05:35:57', NULL, NULL, NULL, ',,,,,,', NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 37, '25082037', NULL, 40, 'Mr', 'kaloo khan', 'kaloo', 'khan', NULL, 'mujtabaahmad1985@gmail.com', '2014-01-01', NULL, NULL, NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', NULL, '25082038', 'AIA', '1234567', 'Oaris', NULL, NULL, NULL, NULL, NULL, '2020-11-24 05:45:19', NULL, NULL, NULL, ',,,,', NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 37, '25082037', NULL, 40, 'Mr', 'kaloo khan', 'kaloo', 'khan', '+9673265987469', 'mujtabaahmad1985@gmail.com', '2014-01-01', NULL, '967', NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', NULL, '25082038', 'AIA', '1234567', 'Oaris', NULL, NULL, NULL, NULL, NULL, '2020-11-24 05:46:50', NULL, NULL, NULL, ',,,,,', NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 37, '25082037', NULL, 40, 'Mr', 'kaloo khan', 'kaloo', 'khan', '+9673265987469', 'mujtabaahmad1985@gmail.com', '2014-01-01', NULL, '967', NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', NULL, '25082038', 'AIA', '1234567', 'Haripur', NULL, '22860', NULL, NULL, NULL, '2020-11-26 06:15:05', NULL, NULL, NULL, ',,,,,,', NULL, '', 'null', NULL, NULL, NULL, NULL, 'Mohet Sector', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `archive_staffs`
--

DROP TABLE IF EXISTS `archive_staffs`;
CREATE TABLE IF NOT EXISTS `archive_staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `salutation` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_code` varchar(12) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text,
  `gender` varchar(20) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `id_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Area 1', '2019-01-02 11:26:38', '2019-01-02 11:26:38', NULL),
(2, 'Area2', '2019-01-02 11:27:17', '2019-01-02 11:27:17', NULL),
(3, 'Area3', '2019-01-02 23:18:42', '2019-01-02 23:18:42', NULL),
(4, 'test', '2019-01-04 06:24:16', '2019-01-04 06:24:16', NULL),
(5, 'w', '2019-01-04 06:28:41', '2019-01-04 06:28:41', NULL),
(6, 'berw', '2019-01-04 06:29:38', '2019-01-04 06:29:38', NULL),
(7, 'berwd', '2019-01-04 06:30:08', '2019-01-04 06:30:08', NULL),
(8, 'asdfdaf', '2019-01-04 06:30:37', '2019-01-04 06:30:37', NULL),
(9, 'adfafdfadsf', '2019-01-04 06:40:54', '2019-01-04 06:40:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `area_sessions`
--

DROP TABLE IF EXISTS `area_sessions`;
CREATE TABLE IF NOT EXISTS `area_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_sessions`
--

INSERT INTO `area_sessions` (`id`, `session_id`, `area_id`, `created_at`, `updated_at`) VALUES
(16, 9, 3, '2019-01-04 06:02:30', '2019-01-04 06:02:30'),
(25, 12, 9, '2019-01-16 12:15:18', '2019-01-16 12:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_flags`
--

DROP TABLE IF EXISTS `assigned_flags`;
CREATE TABLE IF NOT EXISTS `assigned_flags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `flag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_flags`
--

INSERT INTO `assigned_flags` (`id`, `patient_id`, `flag_id`, `created_at`, `updated_at`) VALUES
(61, 297, 5, '2019-09-17 23:31:35', '2019-09-17 23:31:35'),
(52, 301, 10, '2019-06-13 12:01:03', '2019-06-13 12:01:03'),
(51, 301, 8, '2019-06-13 12:01:03', '2019-06-13 12:01:03'),
(50, 301, 7, '2019-06-13 12:01:03', '2019-06-13 12:01:03'),
(49, 301, 2, '2019-06-13 12:01:03', '2019-06-13 12:01:03'),
(60, 297, 2, '2019-09-17 23:31:35', '2019-09-17 23:31:35'),
(59, 297, 1, '2019-09-17 23:31:35', '2019-09-17 23:31:35'),
(62, 297, 6, '2019-09-17 23:31:35', '2019-09-17 23:31:35'),
(67, 374, 8, '2020-01-16 06:59:30', '2020-01-16 06:59:30'),
(66, 374, 1, '2020-01-16 06:59:30', '2020-01-16 06:59:30'),
(68, 374, 10, '2020-01-16 06:59:30', '2020-01-16 06:59:30'),
(74, 37, 2, '2020-02-13 00:05:37', '2020-02-13 00:05:37'),
(73, 37, 1, '2020-02-13 00:05:37', '2020-02-13 00:05:37'),
(75, 37, 5, '2020-02-13 00:05:37', '2020-02-13 00:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

DROP TABLE IF EXISTS `availabilities`;
CREATE TABLE IF NOT EXISTS `availabilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctors_id` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `days` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `all_day` enum('No','Yes') DEFAULT NULL,
  `repeat_occurrence` varchar(255) DEFAULT NULL,
  `time_repeat` int(11) DEFAULT NULL,
  `type_time_repeat` varchar(255) DEFAULT NULL,
  `days_options` varchar(255) DEFAULT NULL,
  `end_repeat_date` date DEFAULT NULL,
  `custom_end` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `doctors_id`, `location`, `start_time`, `end_time`, `days`, `created_at`, `deleted_at`, `updated_at`, `start_date`, `end_date`, `all_day`, `repeat_occurrence`, `time_repeat`, `type_time_repeat`, `days_options`, `end_repeat_date`, `custom_end`) VALUES
(1, 7, 1, '09:00:00', '14:00:00', NULL, '2020-09-15 00:50:54', NULL, '2020-11-05 12:12:00', '2020-09-15', '2020-09-18', NULL, 'no-repeat', NULL, NULL, NULL, NULL, NULL),
(2, 7, 1, '09:00:00', '19:00:00', NULL, '2020-09-15 00:50:54', NULL, '2020-11-05 12:12:00', '2020-09-21', '2020-09-21', NULL, 'mon-fri', 1, 'week', 'tue,wed,thu', '2020-09-30', 'custom_end_date'),
(3, 7, 1, '09:00:00', '11:00:00', NULL, '2020-09-15 00:51:27', NULL, '2020-11-05 12:12:00', '2020-09-15', '2020-09-18', NULL, 'daily', NULL, NULL, NULL, NULL, NULL),
(4, 10, 1, '08:30:00', '10:00:00', NULL, '2020-09-22 22:08:28', NULL, '2020-09-23 03:08:28', '2020-09-23', '2020-09-23', NULL, 'no-repeat', NULL, NULL, NULL, NULL, NULL),
(5, 10, 1, '08:30:00', '10:00:00', NULL, '2020-09-22 22:08:28', NULL, '2020-09-23 03:08:28', '2020-09-29', '2020-09-30', NULL, 'no-repeat', NULL, NULL, NULL, NULL, NULL),
(6, 10, 1, '08:30:00', '10:00:00', NULL, '2020-09-22 22:08:28', NULL, '2020-09-23 03:08:28', '2020-09-23', '2020-09-23', NULL, 'no-repeat', NULL, NULL, NULL, NULL, NULL),
(7, 21, 1, '08:30:00', '21:30:00', NULL, '2020-09-22 22:09:00', NULL, '2020-09-23 03:09:00', '2020-09-23', '2020-09-23', NULL, 'no-repeat', NULL, NULL, NULL, NULL, NULL),
(8, 21, 1, '08:30:00', '21:30:00', NULL, '2020-09-22 22:09:00', NULL, '2020-09-23 03:09:00', '2020-09-23', '2020-09-30', NULL, 'mon-fri', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_processes`
--

DROP TABLE IF EXISTS `booking_processes`;
CREATE TABLE IF NOT EXISTS `booking_processes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(255) DEFAULT NULL,
  `field_label` varchar(255) DEFAULT NULL,
  `field_type` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_processes`
--

INSERT INTO `booking_processes` (`id`, `field_name`, `field_label`, `field_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'email', 'Email', 'Yes/No', 'No', '2017-10-30 22:12:00', '2019-04-29 17:11:09', NULL),
(2, 'phone', 'Phone', 'Yes/No', 'No', '2017-10-23 00:16:16', '2019-04-29 17:11:11', NULL),
(116, 'whatsapp', 'whatsapp', 'approval-options', NULL, '2019-05-08 20:35:08', '2019-05-09 01:35:08', NULL),
(117, 'sms', 'sms', 'approval-options', NULL, '2019-05-08 20:41:37', '2019-05-09 01:41:37', NULL),
(127, 'easy', 'Easy', 'payment', NULL, '2020-04-27 21:28:33', '2020-04-28 02:28:33', NULL),
(128, 'deposit', 'Deposit', 'payment', NULL, '2020-04-27 21:28:33', '2020-04-28 02:28:33', NULL),
(129, 'visa', 'Visa', 'payment', NULL, '2020-04-27 21:28:33', '2020-04-28 02:28:33', NULL),
(130, 'insurance-aia', 'Insurance AIA', 'payment', NULL, '2020-04-27 21:28:33', '2020-04-28 02:28:33', NULL),
(131, 'easy-paisa', 'Easy Paisa', 'payment', NULL, '2020-04-27 21:28:33', '2020-04-28 02:28:33', NULL),
(133, 'approve-customer', 'approve-customer', 'update_booking_request', NULL, '2020-10-26 23:02:50', '2020-10-27 04:02:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clinical_details`
--

DROP TABLE IF EXISTS `clinical_details`;
CREATE TABLE IF NOT EXISTS `clinical_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `contact_code` varchar(20) DEFAULT NULL,
  `mobile_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinical_details`
--

INSERT INTO `clinical_details` (`id`, `location_id`, `website`, `email`, `contact_number`, `mobile_number`, `created_at`, `updated_at`, `deleted_at`, `contact_code`, `mobile_code`) VALUES
(1, 1, 'http://www.upwork.com', 'upwork@gmail.com', '931234545324', '9321342423423', '2017-10-16 10:31:14', '2017-12-07 15:33:56', '2017-12-07 15:33:56', '+93', '+93'),
(2, 2, 'http://www.idcsg.com', 'staffidcsg@gmail.com', '+95 953335195', '+95 953335195', '2017-10-16 10:36:33', '2019-06-25 10:59:04', '2019-06-25 10:59:04', '95', '95'),
(3, 1, 'http://www.thesharpcode.com', 'mujtabaahmad1985@gmail.com', '+683 345345', '+683 44443', '2017-10-18 19:41:23', '2018-01-05 02:33:46', '2018-01-05 02:33:46', NULL, NULL),
(4, 1, 'http://www.idcsg.com', 'admin@idcsg.com', '+65 63720082', '+65 96870775', '2017-11-29 11:02:02', '2018-02-07 12:02:13', NULL, NULL, NULL),
(5, 1, 'http://www.thesharpcode.com', 'mujtabaahmad1985@gmail.com', '3459635387', '+12365478', '2018-01-05 07:38:00', '2018-01-16 04:12:11', '2018-01-16 04:12:11', NULL, NULL),
(6, 1, NULL, 'mujtabaahmad1985@gmail.com', '+93', '+93 4', '2019-04-21 00:56:05', '2019-04-21 05:56:05', NULL, NULL, NULL),
(7, 1, 'https://wwwaz1-ls1.a2hosting.com:2083/cpsess1600015434/frontend/paper_lantern/index.html', 'mujtabaahmad1985@gmail.com', '+355 777', '+93332432', '2019-04-21 01:07:15', '2019-05-09 07:57:48', NULL, '355', '358'),
(8, NULL, NULL, NULL, NULL, NULL, '2019-05-09 02:45:39', '2019-05-09 07:45:39', NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, '2019-05-09 02:53:11', '2019-05-09 07:53:11', NULL, NULL, NULL),
(10, 2, NULL, 'mujtabaahmad1985@gmail.com', '+358 56556', '+93 5655', '2019-05-09 03:00:13', '2019-05-09 08:00:13', NULL, '358', '93');

-- --------------------------------------------------------

--
-- Table structure for table `consents`
--

DROP TABLE IF EXISTS `consents`;
CREATE TABLE IF NOT EXISTS `consents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) DEFAULT NULL,
  `consent_form_id` int(11) DEFAULT NULL,
  `treatment_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `patient_signature` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `procedures` text,
  `addtional_procedures` text,
  `medications` varchar(255) DEFAULT NULL,
  `alternative_options` text,
  `consent_for` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consents`
--

INSERT INTO `consents` (`id`, `patient_id`, `consent_form_id`, `treatment_id`, `appointment_id`, `doctor_id`, `patient_signature`, `created_at`, `updated_at`, `deleted_at`, `procedures`, `addtional_procedures`, `medications`, `alternative_options`, `consent_for`) VALUES
(1, 37, 1, NULL, NULL, 9, '031120200507.jpg', '2020-11-03 00:07:03', '2020-11-03 05:07:03', NULL, 'SCALING AND POLISHING per 20 minutes', 'SCALING AND POLISHING per 20 minutes,FILLINGS - Composite - 2 Surface', 'k,l,h,ln,l;', 'kl', 'Mujtaba Ahmad'),
(2, 37, 1, NULL, NULL, 4, '031120200536.jpg', '2020-11-03 00:36:37', '2020-11-03 05:36:37', NULL, 'Emergency Consultation or Treatment', 'Extraction,SCALING AND POLISHING per 20 minutes', 'Acetaminophen,Adderall,Amitriptyline,Amlodipine,Amoxicillin', 'Atorvastatin', 'Rizwan Ahmad'),
(3, 37, 1, NULL, NULL, 8, '171120200423.jpg', '2020-11-16 23:23:56', '2020-11-17 04:23:56', NULL, 'Emergency Consultation or Treatment', 'Emergency Consultation or Treatment,Extraction', 'Acetaminophen,Adderall,Amitriptyline,Amlodipine,Amlodipine', 'scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Le', 'Charli'),
(4, 37, 1, NULL, NULL, 1, '181120200634.jpg', '2020-11-18 01:34:42', '2020-11-18 06:34:42', NULL, 'Emergency Consultation or Treatment', 'Emergency Consultation or Treatment,Extraction,EXAMINATION AND DIAGNOSIS', 'Acetaminophen,Adderall,Amitriptyline,Amlodipine,Amlodipine', 'scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Le', 'Charli'),
(5, 37, 1, NULL, NULL, 1, NULL, '2020-11-18 01:34:56', '2020-11-23 05:59:34', '2020-11-23 05:59:34', 'Emergency Consultation or Treatment', 'Emergency Consultation or Treatment,Extraction,EXAMINATION AND DIAGNOSIS', 'Acetaminophen,Adderall,Amitriptyline,Amlodipine,Amlodipine', 'scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Le', 'Charli'),
(6, 37, 3, NULL, NULL, 1, '201120200749.jpg', '2020-11-18 01:35:09', '2020-11-23 05:53:28', NULL, 'Emergency Consultation or Treatment', 'Emergency Consultation or Treatment,Extraction,EXAMINATION AND DIAGNOSIS', 'Acetaminophen,Adderall,Amitriptyline,Amlodipine,Amlodipine', 'scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Le', 'Charli');

-- --------------------------------------------------------

--
-- Table structure for table `consent_forms`
--

DROP TABLE IF EXISTS `consent_forms`;
CREATE TABLE IF NOT EXISTS `consent_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consent_forms`
--

INSERT INTO `consent_forms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Consent for dental implant and surgical procedure', NULL, NULL),
(2, 'Consent for removing and changing of amalgam fillings', NULL, NULL),
(3, 'Consent for tooth extraction and other surgical procedures', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `short_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `short_name`) VALUES
(1, 'Afghanistan', '93', 'AF'),
(2, 'Aland Islands', '358', 'AX'),
(3, 'Albania', '355', 'AL'),
(4, 'Algeria', '213', 'DZ'),
(5, 'American Samoa', '1684', 'AS'),
(6, 'Andorra', '376', 'AD'),
(7, 'Angola', '244', 'AO'),
(8, 'Anguilla', '1264', 'AI'),
(9, 'Antigua and Barbuda', '1268', 'AG'),
(10, 'Argentina', '54', 'AR'),
(11, 'Armenia', '374', 'AM'),
(12, 'Aruba', '297', 'AW'),
(13, 'Australia', '61', 'AU'),
(14, 'Austria', '43', 'AT'),
(15, 'Azerbaijan', '994', 'AZ'),
(16, 'Bahamas', '1242', 'BS'),
(17, 'Bahrain', '973', 'BH'),
(18, 'Bangladesh', '880', 'BD'),
(19, 'Barbados', '1246', 'BB'),
(20, 'Belarus', '375', 'BY'),
(21, 'Belgium', '32', 'BE'),
(22, 'Belize', '501', 'BZ'),
(23, 'Benin', '229', 'BJ'),
(24, 'Bermuda', '1441', 'BM'),
(25, 'Bhutan', '975', 'BT'),
(26, 'Bolivia (Plurinational State of)', '591', 'BO'),
(27, 'Bonaire, Sint Eustatius and Saba', '599', 'BQ'),
(28, 'Bosnia and Herzegovina', '387', 'BA'),
(29, 'Botswana', '267', 'BW'),
(30, 'Brazil', '55', 'BR'),
(31, 'British Indian Ocean Territory', '246', 'IO'),
(32, 'Brunei Darussalam', '673', 'BN'),
(33, 'Bulgaria', '359', 'BG'),
(34, 'Burkina Faso', '226', 'BF'),
(35, 'Burundi', '257', 'BI'),
(36, 'Cabo Verde', '238', 'CV'),
(37, 'Cambodia', '855', 'KH'),
(38, 'Cameroon', '237', 'CM'),
(39, 'Canada', '1', 'CA'),
(40, 'Cayman Islands', '1345', 'KY'),
(41, 'Central African Republic', '236', 'CF'),
(42, 'Chad', '235', 'TD'),
(43, 'Chile', '56', 'CL'),
(44, 'China', '86', 'CN'),
(45, 'Christmas Island', '61', 'CX'),
(46, 'Cocos (Keeling) Islands', '672', 'CC'),
(47, 'Colombia', '57', 'CO'),
(48, 'Comoros', '269', 'KM'),
(49, 'Cook Islands', '682', 'CK'),
(50, 'Costa Rica', '506', 'CR'),
(51, 'Croatia', '385', 'HR'),
(52, 'Cuba', '53', 'CU'),
(53, 'CuraÃ§ao', '599', 'CW'),
(54, 'Cyprus', '357', 'CY'),
(55, 'Czech Republic', '420', 'CZ'),
(57, 'Democratic Republic of the Congo', '243', 'CD'),
(58, 'Denmark', '45', 'DK'),
(59, 'Djibouti', '253', 'DJ'),
(60, 'Dominica', '1767', 'DM'),
(61, 'Dominican Republic', '1809', 'DO'),
(62, 'Ecuador', '593', 'EC'),
(63, 'Egypt', '20', 'EG'),
(64, 'El Salvador', '503', 'SV'),
(65, 'Equatorial Guinea', '240', 'GQ'),
(66, 'Eritrea', '291', 'ER'),
(67, 'Estonia', '372', 'EE'),
(68, 'Ethiopia', '251', 'ET'),
(69, 'Falkland Islands', NULL, 'FK'),
(70, 'Faroe Islands', '298', 'FO'),
(71, 'Federated States of Micronesia', '691', 'FM'),
(72, 'Fiji', '679', 'FJ'),
(73, 'Finland', '358', 'FI'),
(74, 'Former Yugoslav Republic of Macedonia', '389', 'MK'),
(75, 'France', '33', 'FR'),
(76, 'French Guiana', '594', 'GF'),
(77, 'French Polynesia', '689', 'PF'),
(78, 'French Southern Territories', '260', 'TF'),
(79, 'Gabon', '241', 'GA'),
(80, 'Gambia', '220', 'GM'),
(81, 'Georgia', '995', 'GE'),
(82, 'Germany', '49', 'DE'),
(83, 'Ghana', '233', 'GH'),
(84, 'Gibraltar', '350', 'GI'),
(85, 'Greece', '30', 'GR'),
(86, 'Greenland', '299', 'GL'),
(87, 'Grenada', '1473', 'GD'),
(88, 'Guadeloupe', '590', 'GP'),
(89, 'Guam', '1671', 'GU'),
(90, 'Guatemala', '502', 'GT'),
(91, 'Guernsey', '44', 'GG'),
(92, 'Guinea', '224', 'GN'),
(93, 'Guinea-Bissau', '245', 'GW'),
(94, 'Guyana', '592', 'GY'),
(95, 'Haiti', '509', 'HT'),
(97, 'Honduras', '504', 'HN'),
(98, 'Hong Kong', '852', 'HK'),
(99, 'Hungary', '36', 'HU'),
(100, 'Iceland', '354', 'IS'),
(101, 'India', '91', 'IN'),
(102, 'Indonesia', '62', 'ID'),
(103, 'Iran (Islamic Republic of)', '98', 'IR'),
(104, 'Iraq', '964', 'IQ'),
(105, 'Ireland', '353', 'IE'),
(106, 'Isle of Man', '44', 'IM'),
(107, 'Israel', '972', 'IL'),
(108, 'Italy', '39', 'IT'),
(109, 'Jamaica', '1876', 'JM'),
(110, 'Japan', '81', 'JP'),
(111, 'Jersey', '44', 'JE'),
(112, 'Jordan', '962', 'JO'),
(113, 'Kazakhstan', '7', 'KZ'),
(114, 'Kenya', '254', 'KE'),
(115, 'Kiribati', '686', 'KI'),
(116, 'Kuwait', '965', 'KW'),
(117, 'Kyrgyzstan', '996', 'KG'),
(118, 'Laos', NULL, 'LA'),
(119, 'Latvia', '371', 'LV'),
(120, 'Lebanon', '961', 'LB'),
(121, 'Lesotho', '266', 'LS'),
(122, 'Liberia', '231', 'LR'),
(123, 'Libya', '218', 'LY'),
(124, 'Liechtenstein', '423', 'LI'),
(125, 'Lithuania', '370', 'LT'),
(126, 'Luxembourg', '352', 'LU'),
(127, 'Macau', '853', 'MO'),
(128, 'Madagascar', '261', 'MG'),
(129, 'Malawi', '265', 'MW'),
(130, 'Malaysia', '60', 'MY'),
(131, 'Maldives', '960', 'MV'),
(132, 'Mali', '223', 'ML'),
(133, 'Malta', '356', 'MT'),
(134, 'Marshall Islands', '692', 'MH'),
(135, 'Martinique', '596', 'MQ'),
(136, 'Mauritania', '222', 'MR'),
(137, 'Mauritius', '230', 'MU'),
(138, 'Mayotte', '269', 'YT'),
(139, 'Mexico', '52', 'MX'),
(140, 'Moldova', '373', 'MD'),
(141, 'Monaco', '377', 'MC'),
(142, 'Mongolia', '976', 'MN'),
(143, 'Montenegro', '382', 'ME'),
(144, 'Montserrat', '1664', 'MS'),
(145, 'Morocco', '212', 'MA'),
(146, 'Mozambique', '258', 'MZ'),
(147, 'Myanmar', '95', 'MM'),
(148, 'Namibia', '264', 'NA'),
(149, 'Nauru', '674', 'NR'),
(150, 'Nepal', '977', 'NP'),
(151, 'Netherlands', '31', 'NL'),
(152, 'New Caledonia', '687', 'NC'),
(153, 'New Zealand', '64', 'NZ'),
(154, 'Nicaragua', '505', 'NI'),
(155, 'Niger', '227', 'NE'),
(156, 'Nigeria', '234', 'NG'),
(157, 'Niue', '683', 'NU'),
(158, 'Norfolk Island', '672', 'NF'),
(159, 'North Korea', NULL, 'KP'),
(160, 'Northern Mariana Islands', '1670', 'MP'),
(161, 'Norway', '47', 'NO'),
(162, 'Oman', '968', 'OM'),
(163, 'Pakistan', '92', 'PK'),
(164, 'Palau', '680', 'PW'),
(165, 'Panama', '507', 'PA'),
(166, 'Papua New Guinea', '675', 'PG'),
(167, 'Paraguay', '595', 'PY'),
(168, 'Peru', '51', 'PE'),
(169, 'Philippines', '63', 'PH'),
(170, 'Pitcairn', '0', 'PN'),
(171, 'Poland', '48', 'PL'),
(172, 'Portugal', '351', 'PT'),
(173, 'Puerto Rico', '1787', 'PR'),
(174, 'Qatar', '974', 'QA'),
(175, 'Republic of the Congo', NULL, 'CG'),
(176, 'Romania', '40', 'RO'),
(177, 'Russia', NULL, 'RU'),
(178, 'Rwanda', '250', 'RW'),
(179, 'RÃ©union', NULL, 'RE'),
(180, 'Saint BarthÃ©lemy', NULL, 'BL'),
(181, 'Saint Helena, Ascension and Tristan da Cunha', NULL, 'SH'),
(182, 'Saint Kitts and Nevis', '1869', 'KN'),
(183, 'Saint Lucia', '1758', 'LC'),
(184, 'Saint Martin', '590', 'MF'),
(185, 'Saint Pierre and Miquelon', '508', 'PM'),
(186, 'Saint Vincent and the Grenadines', '1784', 'VC'),
(187, 'Samoa', '684', 'WS'),
(188, 'San Marino', '378', 'SM'),
(189, 'Sao Tome and Principe', '239', 'ST'),
(190, 'Saudi Arabia', '966', 'SA'),
(191, 'Senegal', '221', 'SN'),
(192, 'Serbia', '381', 'RS'),
(193, 'Seychelles', '248', 'SC'),
(194, 'Sierra Leone', '232', 'SL'),
(195, 'Singapore', '65', 'SG'),
(196, 'Sint Maarten', '1', 'SX'),
(197, 'Slovakia', '421', 'SK'),
(198, 'Slovenia', '386', 'SI'),
(199, 'Solomon Islands', '677', 'SB'),
(200, 'Somalia', '252', 'SO'),
(201, 'South Africa', '27', 'ZA'),
(202, 'South Georgia and the South Sandwich Islands', '0', 'GS'),
(203, 'South Korea', NULL, 'KR'),
(204, 'South Sudan', '211', 'SS'),
(205, 'Spain', '34', 'ES'),
(206, 'Sri Lanka', '94', 'LK'),
(207, 'State of Palestine', NULL, 'PS'),
(208, 'Sudan', '249', 'SD'),
(209, 'Suriname', '597', 'SR'),
(210, 'Svalbard and Jan Mayen', '47', 'SJ'),
(211, 'Swaziland', '268', 'SZ'),
(212, 'Sweden', '46', 'SE'),
(213, 'Switzerland', '41', 'CH'),
(214, 'Syrian Arab Republic', '963', 'SY'),
(215, 'Taiwan', NULL, 'TW'),
(216, 'Tajikistan', '992', 'TJ'),
(217, 'Tanzania', NULL, 'TZ'),
(218, 'Thailand', '66', 'TH'),
(219, 'Timor-Leste', '670', 'TL'),
(220, 'Togo', '228', 'TG'),
(221, 'Tokelau', '690', 'TK'),
(222, 'Tonga', '676', 'TO'),
(223, 'Trinidad and Tobago', '1868', 'TT'),
(224, 'Tunisia', '216', 'TN'),
(225, 'Turkey', '90', 'TR'),
(226, 'Turkmenistan', '7370', 'TM'),
(227, 'Turks and Caicos Islands', '1649', 'TC'),
(228, 'Tuvalu', '688', 'TV'),
(229, 'Uganda', '256', 'UG'),
(230, 'Ukraine', '380', 'UA'),
(231, 'United Arab Emirates', '971', 'AE'),
(232, 'United Kingdom', '44', 'GB'),
(233, 'United States Minor Outlying Islands', '1', 'UM'),
(234, 'United States of America', NULL, 'US'),
(235, 'Uruguay', '598', 'UY'),
(236, 'Uzbekistan', '998', 'UZ'),
(237, 'Vanuatu', '678', 'VU'),
(238, 'Venezuela (Bolivarian Republic of)', NULL, 'VE'),
(239, 'Vietnam', NULL, 'VN'),
(240, 'Virgin Islands (British)', NULL, 'VG'),
(241, 'Virgin Islands (U.S.)', NULL, 'VI'),
(242, 'Wallis and Futuna', '681', 'WF'),
(243, 'Western Sahara', '212', 'EH'),
(244, 'Yemen', '967', 'YE'),
(245, 'Zambia', '260', 'ZM'),
(246, 'Zimbabwe', '263', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `digital_images`
--

DROP TABLE IF EXISTS `digital_images`;
CREATE TABLE IF NOT EXISTS `digital_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `coutry` varchar(50) DEFAULT NULL,
  `zip_code` varchar(15) DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `fname`, `lname`, `phone_number`, `mobile_number`, `email`, `city`, `coutry`, `zip_code`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'Mujtaba', 'Ahmad', '123', NULL, 'mujtaba@yahoo.com', NULL, NULL, NULL, NULL, '2017-09-10 05:14:32', '2017-12-10 14:50:31', NULL),
(4, 10, 'Marlar', 'Tun', '+6597617132', '11111', 'mtunn@gmail.com', NULL, NULL, NULL, 'd', '2017-09-18 09:02:54', '2019-10-26 16:50:03', NULL),
(5, 11, 'lwin', 'Min Thu', '09978771011', NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-09 11:25:18', '2019-10-26 16:52:54', '2019-10-26 16:52:54'),
(6, 12, 'Soe', 'Nyunt San', '0943165533', NULL, 'soenyuntsan@idcsg.com', NULL, NULL, NULL, NULL, '2018-01-05 08:10:26', '2018-01-05 03:11:17', NULL),
(7, 20, 'Tufail', 'Ijaz', '9877452588', '25984', 'tufail.ijaz@gmail.com', NULL, NULL, NULL, NULL, '2018-04-18 10:43:27', '2018-04-18 15:59:09', NULL),
(8, 21, 'Noma', 'Tech', NULL, NULL, 'noma@test.com', NULL, NULL, NULL, NULL, '2018-04-18 10:52:41', '2018-04-18 15:52:41', NULL),
(9, 159, 'Mujtabat', 'ahmadt', '12345678', NULL, 'mujtabaahmad198335@gmail.com', NULL, NULL, NULL, 'test', '2019-04-22 05:59:41', '2019-04-22 10:59:41', NULL),
(10, 236, 'Mujtaba', 'ahmad', '03459635387', '+923459635387', 'sofia_shs@hotmail.com', NULL, NULL, NULL, NULL, '2019-10-26 10:23:55', '2019-10-26 16:54:43', '2019-10-26 16:54:43'),
(11, 239, 'Mujtaba', 'ahmad', '03459635387', '03459635387', 'mujtabaahmad1985u77@gmail.com', NULL, NULL, NULL, NULL, '2019-10-26 10:31:20', '2019-10-26 15:31:20', NULL),
(12, 283, 'New Doctor', 'Saab', '234', 'd', 'doctor1@gmail.com', NULL, NULL, NULL, '123', '2020-09-01 22:50:22', '2020-09-02 03:50:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_services`
--

DROP TABLE IF EXISTS `doctor_services`;
CREATE TABLE IF NOT EXISTS `doctor_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` text,
  `service_type` varchar(20) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `buffer_time` varchar(30) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `online_booking` varchar(100) DEFAULT NULL,
  `notice_time` varchar(50) DEFAULT NULL,
  `description` text,
  `payment` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_unit` varchar(10) DEFAULT NULL,
  `book_restriction` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_services`
--

INSERT INTO `doctor_services` (`id`, `service_name`, `service_type`, `duration`, `buffer_time`, `location`, `color`, `online_booking`, `notice_time`, `description`, `payment`, `price`, `price_unit`, `book_restriction`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Annual Check-Up, Scaling and Polishing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 120, NULL, NULL, '2017-09-13 11:17:56', '2017-09-14 05:59:58', NULL),
(2, 'Emergency Consultation or Treatment', 'One-to-One', '00:15:00', '20-minutes-before', NULL, NULL, NULL, NULL, 'This appointment is only for patients who are in pain or have a problem that requires immediate attention. We will only be able to address your immediate concern and may need to reschedule you for another time for any additional or further treatment.', NULL, 185, NULL, NULL, '2017-09-13 23:23:06', '2017-09-14 04:23:06', NULL),
(3, 'Wisdom Tooth Operation', 'One-to-One', '01:00:00', '20-minutes-before', NULL, NULL, NULL, NULL, 'A wisdom tooth operation is a minor surgery. It is important for you to come 10 minutes before your appointment time to allow us to go through the details of your procedure and to take your prescribed medications before the start of the operation.', NULL, 800, NULL, NULL, '2017-09-14 10:16:56', '2017-09-14 06:16:56', NULL),
(4, 'Extraction', NULL, '00:30:00', 'None', NULL, NULL, NULL, NULL, 'Normal Extraction', NULL, 80, NULL, NULL, '2017-10-05 11:48:20', '2017-10-05 07:48:20', NULL),
(5, 'EXAMINATION AND DIAGNOSIS', 'One-to-One', '00:25:00', '30-minutes-before', NULL, NULL, NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', NULL, 120, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(6, 'SCALING AND POLISHING per 20 minutes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(7, 'X-RAY (Intraoral)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(8, 'X-RAY (Extraoral)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(9, 'CT Full Scan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(10, 'CT Half Scan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(11, 'CT Quarter Scan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(12, 'CT Single Tooth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(13, '3D Modelling Full Face1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(14, '3D Modelling Half Face', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(15, '3D Modelling Maxila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(16, '3D Modelling Mandible', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(17, 'FILLINGS - Amalgam - 1 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(18, 'FILLINGS - Amalgam - 2 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(19, 'FILLINGS - Amalgam - 3 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(20, 'FILLINGS - Amalgam - 4 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(21, 'FILLINGS - Composite - 1 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(22, 'FILLINGS - Composite - 2 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(23, 'FILLINGS - Composite - 3 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(24, 'FILLINGS - Composite - 4 Surface', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(25, 'RECEMENTATION of CROWN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(26, 'RECEMENTATION of BRIDGE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(27, 'RECEMENTATION of VENEER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(28, 'VENEER - Composite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(29, 'VENEER - Full Porcelain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(30, 'VENEER - Zirconia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(31, 'VENEER - Lumineers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(32, 'CROWN - Composite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(33, 'CROWN - Full Porcelain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(34, 'CROWN - Zirconia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(35, 'CROWN - Lumineers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(36, 'BRIDGE - Composite Per Unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(37, 'BRIDGE - Full Porcelain Per Unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(38, 'BRIDGE - Zirconia Per Unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(39, 'BRIDGE - Lumineers Per Unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(40, 'EXTRACTION - Anterior', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(41, 'EXTRACTION - Anterior', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(42, 'EXTRACTION - Surgical', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(43, 'IMPACTED WIDOM TOOTH OPERATION', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(44, 'INCISION AND DRAINAGE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(45, 'IMPLANT SURGERY per tooth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(46, 'IMPLANT PROTHETICS per tooth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(47, 'BONE GRAFT per tooth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(48, 'SINUS LIFT per Tooth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(49, 'GUM TREATMENT per quadrant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(50, 'GUM SURGERY per tooth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(51, 'DENTURE- Acrylic Base', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(52, 'DENTURE- Flexible Base', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(53, 'DENTURE- Chrome Base', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(54, 'DENTURE - Maxillla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(55, 'DENTURE - Mandible', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(56, 'ADDITION of per TOOTH to Exiting Denture', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(57, 'ADDITION of per CLASP to Existing Denture', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(58, 'ACRYLIC TOOTH FOR DENTURE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(59, 'ROOTCANAL TREATMENT SINGLE CANAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(60, 'ROOTCANAL TREATMENT DOUBLE CANAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(61, 'ROOTCANAL TREATMENT TRIPLE CANAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(62, 'ROOTCANAL TREATMENT COMPLEX OR REDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(63, 'SUTURE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(64, 'BLEACHING - Clinical', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(65, 'BLEACHING - Intra-Coronal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(66, 'BLEACHING - HOME Bleaching Kit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(67, 'SPLINT - DUAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(68, 'SPLINT - HARD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(69, 'POST & CORE - Metal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(70, 'POST & CORE - Plastic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(71, 'POST & CORE - Porcelain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(72, 'EMERGENCY TREATMENT - After office hours call charge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(73, 'RELATIVE ANALGESIA / OXYGEN MASK per 1/2 hour', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(74, 'INTRAVENOUS SEDATION per 1/2 hour', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(75, 'COSMETIC - Recontouring', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(76, 'RUBBER DAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(77, 'DENTINE PIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(78, 'INJECTION per Cartridge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(79, 'MEDICATION', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-19 06:33:54', NULL, NULL),
(80, 'Whitening', 'One-to-One', '01:00:00', NULL, NULL, NULL, NULL, NULL, 'Philip Zoom', NULL, 550, NULL, NULL, '2017-10-23 07:57:05', '2017-10-23 03:57:05', NULL),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2018-04-18 10:50:28', '2018-04-18 15:50:28', '2018-04-18 15:50:37'),
(82, 'test test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2018-04-18 11:00:26', '2018-04-18 16:00:26', NULL),
(83, 'tessst', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2018-04-18 11:15:12', '2018-04-18 16:15:12', NULL),
(84, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-06 22:45:38', '2018-09-07 03:45:38', NULL),
(85, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-06 22:46:39', '2018-09-07 03:46:39', NULL),
(86, 'Training', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-06 22:52:09', '2018-09-07 03:52:09', NULL),
(87, 'testtesttest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-07 00:17:21', '2018-09-07 05:17:21', NULL),
(88, 'tewt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2019-04-10 10:25:32', '2019-04-10 15:25:32', NULL),
(89, 'tewt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2019-04-10 10:25:32', '2019-04-10 15:25:32', NULL),
(90, 'tewttest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2019-04-10 10:27:06', '2019-04-10 15:27:06', NULL),
(91, 'tewttest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2019-04-24 11:24:26', '2019-04-24 16:24:26', NULL),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-29 12:13:24', '2019-10-29 17:13:24', '2020-04-24 06:26:38'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2020-04-24 01:30:19', '2020-04-24 06:30:19', '2020-04-24 06:34:26'),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-22 22:40:03', '2020-07-23 03:40:03', NULL),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-23 22:42:04', '2020-07-24 03:42:04', NULL),
(96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-24 00:09:14', '2020-07-24 05:09:14', NULL),
(97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-21 22:26:46', '2020-08-22 03:26:46', NULL),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-15 02:18:04', '2020-09-15 07:18:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `document_title` varchar(255) DEFAULT NULL,
  `user_type` enum('patient','staff') DEFAULT NULL,
  `document_type` enum('insurance','medical','profile','document') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `folder_id`, `document`, `document_title`, `user_type`, `document_type`, `created_at`, `updated_at`) VALUES
(1, 37, 2, 'screencapture-dev-bloodtolife-2020-01-27-16-12-03.png', 'screencapture-dev-bloodtolife-2020-01-27-16-12-03.png', 'patient', 'document', '2020-02-03 01:18:18', '2020-02-03 06:18:18'),
(2, 37, 2, 'screencapture-dev-bloodtolife-2020-01-27-16-13-34.png', 'screencapture-dev-bloodtolife-2020-01-27-16-13-34.png', 'patient', 'document', '2020-02-03 01:18:18', '2020-02-03 06:18:18'),
(3, 37, 2, 'idc-services-and-price-list-2019-doc.docx', 'idc-services-and-price-list-2019-doc.docx', 'patient', 'document', '2020-02-03 01:18:19', '2020-02-03 06:18:19'),
(4, 37, 1, '3303867-programming-wallpapers-5086ce81dd7a4c9c5e5ce9f1b9f91034-1.jpg', '3303867-programming-wallpapers-5086ce81dd7a4c9c5e5ce9f1b9f91034-1.jpg', 'patient', 'document', '2020-02-03 01:18:47', '2020-02-03 06:18:47'),
(5, 37, 1, 'img-20191208-wa0010.jpg', 'img-20191208-wa0010.jpg', 'patient', 'document', '2020-02-03 01:18:47', '2020-02-03 06:18:47'),
(6, 37, 1, 'responsive-image3.png', 'responsive-image3.png', 'patient', 'document', '2020-02-03 01:18:47', '2020-02-03 06:18:47'),
(7, 37, 1, 'screencapture-dev-bloodtolife-2020-01-27-16-12-03.png', 'screencapture-dev-bloodtolife-2020-01-27-16-12-03.png', 'patient', 'document', '2020-02-03 01:18:47', '2020-02-03 06:18:47'),
(8, 37, 1, 'als-resume.pdf', 'als-resume.pdf', 'patient', 'document', '2020-02-17 05:45:24', '2020-02-17 10:45:24'),
(9, 37, 1, 'idc-services-and-price-list-2019-doc.docx', 'idc-services-and-price-list-2019-doc.docx', 'patient', 'document', '2020-02-17 06:01:42', '2020-02-17 11:01:42'),
(10, 37, 7, 'dental-xrays.jpg', 'dental-xrays.jpg', 'patient', 'document', '2020-02-24 00:31:48', '2020-02-24 05:31:48'),
(11, 37, 7, 'images.jpg', 'images.jpg', 'patient', 'document', '2020-02-24 00:31:48', '2020-02-24 05:31:48'),
(12, 37, 7, 'kyx5opnhxwzscjxuwd3hhm05yrve9xqeb2swxrhkhmssyzomgk2kqt4fnluyrh04.jpg', 'kyx5opnhxwzscjxuwd3hhm05yrve9xqeb2swxrhkhmssyzomgk2kqt4fnluyrh04.jpg', 'patient', 'document', '2020-02-24 00:31:48', '2020-02-24 05:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `drug_allergies`
--

DROP TABLE IF EXISTS `drug_allergies`;
CREATE TABLE IF NOT EXISTS `drug_allergies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_allergies`
--

INSERT INTO `drug_allergies` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'New1', '2018-12-21 10:53:37', '2019-02-25 11:29:11', NULL),
(2, 'New1', '2018-12-21 10:54:20', '2018-12-21 10:54:20', NULL),
(3, 'Regixs', '2018-12-21 10:58:23', '2019-02-25 11:31:20', NULL),
(4, 'Bariksin-test 123', '2018-12-22 11:14:27', '2019-05-31 12:37:28', NULL),
(5, 'Bariksin1', '2018-12-22 11:14:36', '2018-12-22 11:14:36', NULL),
(6, 'Panadol', '2018-12-22 11:16:31', '2018-12-22 11:16:31', NULL),
(7, 'Seta 100mg', '2018-12-22 11:17:43', '2018-12-22 11:17:43', NULL),
(17, 'ffffffffff', '2020-03-03 01:05:13', '2020-03-03 01:05:13', NULL),
(9, 'Seta', '2019-02-25 11:38:50', '2019-02-25 11:38:50', NULL),
(10, 'ogmentins', '2019-02-25 11:39:41', '2019-05-12 11:03:16', NULL),
(15, 'ggggggg', '2019-05-31 12:17:42', '2019-05-31 12:17:42', NULL),
(16, 'ggggggg', '2019-05-31 12:18:25', '2019-05-31 12:18:25', NULL),
(18, 'ffggggggggggggg', '2020-03-03 01:06:06', '2020-03-03 01:06:06', NULL),
(19, 'kkkkk', '2020-03-03 01:07:39', '2020-03-03 01:07:39', NULL),
(20, 'fgfgfgfgfgfgfgfgfgfg', '2020-03-03 01:21:16', '2020-03-03 01:21:16', NULL),
(21, 'hhhhff', '2020-03-03 01:25:43', '2020-03-03 01:25:43', NULL),
(22, 'hhhhff', '2020-03-03 01:27:49', '2020-03-03 01:27:49', NULL),
(23, '555555', '2020-03-03 01:28:32', '2020-03-03 01:28:32', NULL),
(24, 'dfd', '2020-03-03 01:29:03', '2020-03-03 01:29:03', NULL),
(25, 'New Srug', '2020-03-05 02:18:07', '2020-03-05 02:18:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

DROP TABLE IF EXISTS `folders`;
CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `staff_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `folder_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `parent_id`, `staff_id`, `patient_id`, `folder_name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, NULL, 37, 'Saved Items', 'saved-items', '2020-02-03 01:17:42', '2020-02-03 06:17:42', NULL),
(2, 0, NULL, 37, 'My Images', 'my-images', '2020-02-03 01:17:58', '2020-02-20 05:50:30', NULL),
(3, 0, NULL, 37, 'MY New iamges', 'my-new-iamges', '2020-02-05 23:16:30', '2020-02-20 10:26:01', '2020-02-20 10:26:01'),
(4, 0, NULL, 38, 'Saved Items', NULL, '2020-02-14 10:10:55', '2020-02-14 15:10:55', NULL),
(5, 0, NULL, 38, 'Digital Images', NULL, '2020-02-14 10:10:55', '2020-02-14 15:10:55', NULL),
(6, 0, NULL, 37, 'My Videos', 'my-videos', '2020-02-17 23:09:06', '2020-02-18 04:09:06', NULL),
(7, 0, NULL, 37, 'Digital Images', 'digital-images', '2020-02-24 00:31:17', '2020-02-24 05:31:17', NULL),
(8, 0, NULL, 39, 'Saved Items', NULL, '2020-06-08 07:29:04', '2020-06-08 12:29:04', NULL),
(9, 0, NULL, 39, 'Digital Images', NULL, '2020-06-08 07:29:04', '2020-06-08 12:29:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `status` enum('pending','paid') DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `paid_via` varchar(20) DEFAULT NULL,
  `other_payment_info` varchar(255) DEFAULT NULL,
  `submitted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `appointment_id`, `patient_id`, `status`, `total_amount`, `paid_via`, `other_payment_info`, `submitted_by`, `created_at`, `updated_at`) VALUES
(1, 4, 37, 'paid', '874.08', 'Cash', NULL, 1, '2020-05-21 12:08:49', '2020-07-10 02:05:57'),
(2, 3, 37, 'paid', '184', 'Bank Transfer', 'AC-1234567', 1, '2020-05-21 12:11:29', '2020-05-21 12:11:45'),
(3, 2, 37, 'paid', '120', 'Cash', NULL, 1, '2020-05-21 12:12:04', '2020-05-21 12:12:04'),
(4, 5, 38, 'paid', '940', 'Cash', NULL, 1, '2020-06-18 23:57:23', '2020-06-18 23:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

DROP TABLE IF EXISTS `labs`;
CREATE TABLE IF NOT EXISTS `labs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  `address` text,
  `email` varchar(255) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`id`, `name`, `phone_number`, `address`, `email`, `registration_number`, `bank_account`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lab1', '003232534', 'Mohet Sector\r\nTehsil Ghazi', 'lab1@idcsg.com', 'idc-lab-001', 'ac-00079', '2020-05-04 11:54:50', '2020-05-04 11:57:02', NULL),
(2, 'Lab2', '092384', 'Ghazi, Haripur, Pakistan', 'lab2@email.com', '009-idc-09', 'tu-io-90023', '2020-05-04 12:00:28', '2020-05-04 12:00:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `leave_start_date` date DEFAULT NULL,
  `leave_end_date` date DEFAULT NULL,
  `number_of_leave` int(11) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `reason_of_leave` text,
  `status` enum('waiting','approved','rejected','ask-for-reschedule') DEFAULT NULL,
  `reason_of_rejection` text,
  `approved_by` int(11) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `linked_social_accounts`
--

DROP TABLE IF EXISTS `linked_social_accounts`;
CREATE TABLE IF NOT EXISTS `linked_social_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `provider_name` text,
  `provider_id` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `zip_code` varchar(15) DEFAULT NULL,
  `address` tinytext,
  `country` varchar(100) DEFAULT NULL,
  `notes` text,
  `color_show` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `zip_code`, `address`, `country`, `notes`, `color_show`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'International Dental Centre,Singapore', '069249', '6 Gemmill Lane, Singapore 069249', NULL, NULL, '#3aa17d', '2017-09-10 10:20:49', '2017-09-10 15:20:49', NULL),
(2, 'International Dental Centre, Myanmar', '11061', 'Inya Lake Hotel, Room no.005, 37 Kaba Aye Pagoda Road, Yangon, Myanmar', NULL, NULL, NULL, '2018-01-05 07:58:10', '2018-01-16 04:13:27', NULL),
(3, 'Test Location', NULL, NULL, NULL, NULL, NULL, '2018-04-18 11:10:46', '2018-04-18 16:10:46', NULL),
(4, 'TEST TEST', NULL, NULL, NULL, NULL, NULL, '2018-04-18 11:11:32', '2018-04-18 16:11:32', NULL),
(5, 'TEST TESTsssx', '12345', 'Testx5', NULL, NULL, NULL, '2019-04-22 05:26:46', '2019-04-22 10:28:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_activities`
--

DROP TABLE IF EXISTS `login_activities`;
CREATE TABLE IF NOT EXISTS `login_activities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `login_ip` varchar(100) DEFAULT NULL,
  `user_agent` text,
  `device` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plateform` varchar(255) DEFAULT NULL,
  `version` int(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=357 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_activities`
--

INSERT INTO `login_activities` (`id`, `login_ip`, `user_agent`, `device`, `model`, `token`, `session_id`, `user_id`, `created_at`, `updated_at`, `plateform`, `version`, `browser`) VALUES
(1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '', '', NULL, NULL, 1, '2019-10-31 10:24:16', '2019-10-31 11:05:40', NULL, NULL, NULL),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 35, '2019-10-31 11:05:40', '2019-10-31 11:05:40', '', NULL, NULL),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 35, '2019-10-31 11:38:37', '2019-10-31 11:38:37', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-01 11:25:38', '2019-11-03 00:44:39', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 7, '2019-11-01 07:57:29', '2019-11-01 11:26:08', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 7, '2019-11-01 11:26:08', '2019-11-02 00:17:22', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 'desktop', '', NULL, NULL, 1, '2019-11-03 00:44:39', '2019-11-03 23:45:53', 'Windows 10 x64', NULL, 'Firefox 71.0'),
(7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 7, '2019-11-02 00:17:22', '2019-11-02 23:42:36', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 7, '2019-11-02 23:42:36', '2019-11-03 06:35:38', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 7, '2019-11-03 06:35:38', '2020-05-13 01:41:03', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 'desktop', '', '$2y$10$kHue6AfnzgmkvaqHLF7U9u9tVylm5uIJuzl5TCnEaxspcIclDs5Iq', NULL, 158, '2019-11-03 00:43:58', '2019-11-03 00:43:58', 'Windows 10 x64', NULL, 'Firefox 71.0'),
(12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-03 23:45:53', '2019-11-05 05:20:43', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(218, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 7, '2020-05-13 01:41:03', '2020-07-13 01:44:50', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-05 05:20:43', '2019-11-06 01:02:58', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-06 01:02:58', '2019-11-07 09:01:12', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-07 09:01:12', '2019-11-10 23:48:17', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'desktop', '', '$2y$10$Qc7bA3hPDr0wk8WQDWSn/.JqkHUCweJj0tmQnQgEXPM2egV5ofKsC', NULL, 62, '2019-11-06 08:20:31', '2019-11-06 08:20:31', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-10 23:48:17', '2019-11-11 07:11:48', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-11 07:11:48', '2019-11-11 22:37:57', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-11 22:37:58', '2019-11-12 11:13:24', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-12 11:13:24', '2019-11-12 22:34:25', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-12 22:34:25', '2019-11-13 23:12:22', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-13 23:12:22', '2019-11-14 06:40:30', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-14 06:40:30', '2019-11-15 00:28:11', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-15 00:28:12', '2019-11-17 01:51:44', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 35, '2019-11-17 01:51:44', '2019-11-18 22:25:14', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-18 22:25:14', '2019-11-19 22:47:23', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-19 22:47:23', '2019-11-20 23:05:20', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-20 23:05:20', '2019-11-21 04:32:09', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-21 04:32:09', '2019-11-24 04:43:57', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(30, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-24 04:43:57', '2019-11-25 10:12:20', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-25 10:12:20', '2019-11-25 23:12:17', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-25 23:12:17', '2019-11-27 00:09:09', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(33, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-27 00:09:09', '2019-11-27 08:11:30', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-11-27 08:11:30', '2019-12-02 09:19:05', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(35, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-02 09:19:06', '2019-12-03 09:04:08', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-03 09:04:08', '2019-12-05 00:33:25', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(37, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-05 00:33:25', '2019-12-08 11:41:29', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-08 11:41:29', '2019-12-11 22:30:23', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(39, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-11 22:30:23', '2019-12-12 08:18:00', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(40, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-12 08:18:00', '2019-12-14 09:51:01', 'Windows 10 x64', NULL, 'Chrome 78.0'),
(41, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-14 09:51:01', '2019-12-15 00:15:10', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(42, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-15 00:15:10', '2019-12-16 06:34:41', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(43, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-16 06:34:41', '2019-12-16 23:48:28', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(44, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-16 23:48:29', '2019-12-17 23:04:28', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(45, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-17 23:04:28', '2019-12-18 10:58:35', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(46, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-18 10:58:35', '2019-12-19 00:17:12', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(47, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-19 00:17:12', '2019-12-20 04:22:20', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(48, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-20 04:22:20', '2019-12-24 00:32:43', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(49, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-24 00:32:43', '2019-12-24 11:40:26', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(50, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-24 11:40:26', '2019-12-24 22:48:26', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(51, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-24 22:48:26', '2019-12-26 04:47:36', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(52, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-26 04:47:36', '2019-12-27 10:09:06', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(53, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-27 10:09:06', '2019-12-30 00:08:39', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(54, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2019-12-30 00:08:39', '2020-01-01 00:58:38', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(55, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-01 00:58:39', '2020-01-02 01:43:19', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(56, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-02 01:43:19', '2020-01-02 23:16:45', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(57, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-02 23:16:45', '2020-01-04 04:55:26', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(58, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-04 04:55:26', '2020-01-05 05:12:25', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(59, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-05 05:12:25', '2020-01-05 22:43:59', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(60, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-05 22:43:59', '2020-01-07 00:06:34', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(61, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-07 00:06:34', '2020-01-08 00:48:24', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(62, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-08 00:48:24', '2020-01-08 05:33:18', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(63, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-08 05:33:18', '2020-01-08 10:17:23', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(64, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-08 10:17:23', '2020-01-08 23:46:23', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(65, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-08 23:46:23', '2020-01-09 10:34:17', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(66, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-09 10:34:17', '2020-01-10 04:16:28', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(67, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-10 04:16:28', '2020-01-10 23:28:40', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(68, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-10 23:28:40', '2020-01-12 00:02:13', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(69, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-12 00:02:13', '2020-01-12 07:07:39', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(70, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-12 07:07:40', '2020-01-12 11:13:59', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(71, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-12 11:13:59', '2020-01-12 22:58:37', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(72, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-12 22:58:37', '2020-01-13 05:18:34', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(73, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-13 05:18:34', '2020-01-13 09:43:21', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(74, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-13 09:43:22', '2020-01-14 05:53:30', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(75, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-14 05:53:30', '2020-01-15 00:08:41', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(77, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-15 00:08:41', '2020-01-16 00:57:22', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(76, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-14 06:04:44', '2020-01-15 00:09:45', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(78, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-15 00:09:45', '2020-01-15 00:38:24', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(82, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-16 00:57:22', '2020-01-16 05:31:26', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(79, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-15 00:38:24', '2020-01-15 05:11:24', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(80, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-15 05:11:24', '2020-01-15 22:25:59', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(81, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-15 22:25:59', '2020-01-16 05:11:58', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(83, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-16 05:11:58', '2020-01-16 23:27:14', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(84, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-16 05:31:26', '2020-01-16 09:19:26', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(86, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-16 23:27:14', '2020-01-17 04:04:13', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(85, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-16 09:19:26', '2020-01-20 10:32:43', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(89, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-20 10:32:43', '2020-01-20 22:18:24', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(87, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-17 04:04:13', '2020-01-17 07:57:51', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(88, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-17 07:57:52', '2020-01-29 00:06:06', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(99, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 240, '2020-01-29 00:06:06', '2020-01-29 00:22:01', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(90, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-20 22:18:24', '2020-01-21 03:50:23', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(91, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-21 03:50:23', '2020-01-21 07:54:55', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(92, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-21 07:54:55', '2020-01-22 09:57:41', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(93, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-22 09:57:41', '2020-01-22 22:19:07', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(94, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-22 22:19:08', '2020-01-23 02:14:25', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(95, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-23 02:14:25', '2020-01-23 22:29:23', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(96, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-23 22:29:23', '2020-01-28 10:21:15', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(97, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-28 10:21:15', '2020-01-28 23:21:00', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(98, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-28 23:21:01', '2020-01-30 00:06:54', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(102, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-30 00:06:54', '2020-01-31 00:16:47', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(101, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', '$2y$10$xr/8.rpY3Gnq9npOKwb3VeQGL3nNLlJDJhRJNWEOcOwl6gk2ebEHW', NULL, 240, '2020-01-29 00:22:01', '2020-01-29 00:22:01', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(100, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 277, '2020-01-29 00:19:19', '2020-06-07 03:06:15', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(236, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 277, '2020-06-07 03:06:15', '2020-06-07 23:29:05', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(103, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-31 00:16:47', '2020-01-31 04:07:59', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(104, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-31 04:07:59', '2020-01-31 07:33:54', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(105, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-01-31 07:33:54', '2020-02-02 23:10:45', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(106, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-02 23:10:45', '2020-02-03 11:27:52', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(107, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-03 11:27:52', '2020-02-04 00:24:15', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(108, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-04 00:24:15', '2020-02-04 04:49:49', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(109, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-04 04:49:49', '2020-02-04 10:57:46', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(110, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-04 10:57:46', '2020-02-04 22:54:53', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(111, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-04 22:54:53', '2020-02-05 10:02:00', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(112, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-05 10:02:00', '2020-02-05 22:58:49', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(113, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-05 22:58:49', '2020-02-06 23:29:59', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(114, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-06 23:29:59', '2020-02-12 07:20:58', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(115, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-12 07:20:58', '2020-02-12 23:08:38', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(116, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-12 23:08:39', '2020-02-13 06:57:36', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(117, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-13 06:57:36', '2020-02-13 23:03:26', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(118, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-13 23:03:26', '2020-02-14 09:44:07', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(119, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-14 09:44:07', '2020-02-17 00:15:44', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(120, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-17 00:15:44', '2020-02-17 05:32:54', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(121, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-17 05:32:54', '2020-02-17 22:56:45', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(122, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-17 22:56:45', '2020-02-19 04:39:53', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(123, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-19 04:39:53', '2020-02-19 09:30:13', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(124, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-19 09:30:13', '2020-02-20 00:24:29', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(125, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-20 00:24:29', '2020-02-20 04:54:09', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(126, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-20 04:54:09', '2020-02-20 05:45:45', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(127, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-20 05:45:45', '2020-02-20 11:15:56', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(128, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-20 11:15:56', '2020-02-23 12:09:36', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(129, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-23 12:09:36', '2020-02-24 00:29:39', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(130, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-24 00:29:39', '2020-02-26 22:33:54', 'Windows 10 x64', NULL, 'Chrome 79.0'),
(131, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-26 22:33:55', '2020-02-27 01:30:50', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(132, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-27 01:30:50', '2020-02-27 23:02:10', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(133, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-02-27 23:02:10', '2020-03-01 22:53:51', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(134, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-01 22:53:51', '2020-03-02 09:58:13', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(135, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-02 09:58:13', '2020-03-02 22:58:55', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(136, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-02 22:58:55', '2020-03-03 23:10:03', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(137, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-03 23:10:03', '2020-03-04 05:35:23', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(138, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-04 05:35:23', '2020-03-04 23:20:04', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(139, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-04 23:20:04', '2020-03-05 05:02:38', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(140, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-05 05:02:38', '2020-03-05 09:00:51', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(141, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-05 09:00:51', '2020-03-05 23:22:04', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(142, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-05 23:22:04', '2020-03-08 00:51:08', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(143, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-08 00:51:09', '2020-03-10 22:58:02', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(144, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-10 22:58:02', '2020-03-11 03:57:32', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(145, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-11 03:57:32', '2020-03-11 07:13:45', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(146, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-11 07:13:45', '2020-03-11 22:36:17', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(147, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-11 22:36:17', '2020-03-12 22:33:06', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(148, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-12 22:33:06', '2020-03-13 05:49:08', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(149, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-13 05:49:08', '2020-03-15 22:16:21', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(150, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-15 22:16:21', '2020-03-16 07:21:24', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(151, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-16 07:21:24', '2020-03-16 22:33:51', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(152, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-16 22:33:51', '2020-03-18 06:06:10', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(153, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-18 06:06:10', '2020-03-18 23:17:43', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(154, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-18 23:17:43', '2020-03-19 06:37:54', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(155, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-19 06:37:54', '2020-03-19 09:50:49', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(156, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-19 09:50:49', '2020-03-19 22:40:02', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(157, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-19 22:40:02', '2020-03-20 01:28:35', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(158, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-20 01:28:35', '2020-03-20 07:33:29', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(159, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-20 07:33:29', '2020-03-22 23:19:37', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(160, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-22 23:19:37', '2020-03-23 22:23:59', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(161, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-23 22:23:59', '2020-03-24 22:54:51', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(162, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-24 22:54:51', '2020-03-25 23:50:12', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(163, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-25 23:50:12', '2020-03-26 23:02:41', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(164, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-26 23:02:41', '2020-03-29 22:45:09', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(165, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-29 22:45:09', '2020-03-30 05:49:03', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(166, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-30 05:49:04', '2020-03-30 22:52:14', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(167, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-30 22:52:14', '2020-03-31 06:37:56', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(168, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-31 06:37:56', '2020-03-31 10:46:09', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(169, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-31 10:46:09', '2020-03-31 23:10:01', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(170, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-03-31 23:10:01', '2020-04-01 10:38:32', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(171, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-01 10:38:32', '2020-04-01 23:42:02', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(172, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-01 23:42:02', '2020-04-02 10:22:25', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(173, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-02 10:22:25', '2020-04-02 22:31:00', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(174, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-02 22:31:00', '2020-04-06 02:07:59', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(175, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-06 02:07:59', '2020-04-06 11:23:18', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(176, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-06 11:23:18', '2020-04-06 22:28:26', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(177, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-06 22:28:27', '2020-04-07 22:37:44', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(178, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-07 22:37:44', '2020-04-08 03:38:33', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(179, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-08 03:38:33', '2020-04-08 22:44:30', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(180, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-08 22:44:30', '2020-04-10 01:48:35', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(181, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-10 01:48:35', '2020-04-12 22:41:15', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(182, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-12 22:41:15', '2020-04-13 22:40:58', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(183, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-13 22:40:58', '2020-04-14 22:35:30', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(184, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-14 22:35:30', '2020-04-15 01:05:40', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(185, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-15 01:05:40', '2020-04-15 05:00:35', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(186, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-15 05:00:36', '2020-04-15 06:53:47', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(187, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-15 06:53:47', '2020-04-15 23:25:20', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(188, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-15 23:25:20', '2020-04-16 23:29:15', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(189, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-16 23:29:15', '2020-04-17 05:11:29', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(190, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-17 05:11:29', '2020-04-19 22:19:34', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(191, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-19 22:19:34', '2020-04-20 23:27:31', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(192, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-20 23:27:31', '2020-04-22 23:08:42', 'Windows 10 x64', NULL, 'Chrome 80.0'),
(193, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-22 23:08:42', '2020-04-23 05:23:26', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(194, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-23 05:23:26', '2020-04-23 10:06:22', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(195, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-23 10:06:22', '2020-04-23 22:59:34', 'Windows 10 x64', NULL, 'Chrome 81.0');
INSERT INTO `login_activities` (`id`, `login_ip`, `user_agent`, `device`, `model`, `token`, `session_id`, `user_id`, `created_at`, `updated_at`, `plateform`, `version`, `browser`) VALUES
(196, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-23 22:59:34', '2020-04-26 22:29:33', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(197, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-26 22:29:33', '2020-04-27 20:05:10', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(198, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-27 20:05:10', '2020-04-28 01:00:42', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(199, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-28 01:00:42', '2020-04-28 11:48:34', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(200, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-28 11:48:34', '2020-04-28 22:25:55', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(201, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-28 22:25:55', '2020-04-29 04:35:49', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(202, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-29 04:35:49', '2020-04-29 11:32:16', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(203, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-29 11:32:16', '2020-04-29 20:35:34', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(204, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-29 20:35:34', '2020-04-30 01:45:19', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(205, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-30 01:45:20', '2020-04-30 11:32:31', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(206, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-30 11:32:32', '2020-04-30 20:17:53', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(207, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-04-30 20:17:53', '2020-05-01 01:33:24', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(208, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-01 01:33:24', '2020-05-04 05:43:14', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(209, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-04 05:43:14', '2020-05-04 10:25:06', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(210, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-04 10:25:06', '2020-05-04 11:49:06', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(211, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-04 11:49:07', '2020-05-04 22:17:01', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(212, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-04 22:17:01', '2020-05-05 05:58:04', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(213, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-05 05:58:05', '2020-05-05 11:36:53', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(214, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-05 11:36:53', '2020-05-07 07:15:30', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(215, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-07 07:15:31', '2020-05-07 20:20:16', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(216, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-07 20:20:17', '2020-05-11 22:32:14', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(217, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-11 22:32:14', '2020-05-13 02:15:27', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(219, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-13 02:15:27', '2020-05-13 12:20:45', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(271, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', '$2y$10$2FXVOoH7A/hKTcKhuhXijuE8vkMPSLbsxbVFj.CXvXDS/FiapMjo.', NULL, 7, '2020-07-13 01:44:50', '2020-07-13 01:44:50', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(220, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-13 12:20:45', '2020-05-13 22:15:55', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(221, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-13 22:15:55', '2020-05-14 22:34:32', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(222, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-14 22:34:32', '2020-05-15 12:26:24', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(223, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-15 12:26:24', '2020-05-18 22:20:43', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(224, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-18 22:20:43', '2020-05-20 22:22:08', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(225, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-20 22:22:08', '2020-05-20 23:56:02', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(226, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-20 23:56:02', '2020-05-21 11:52:06', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(227, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-21 11:52:06', '2020-05-25 20:55:46', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(228, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-05-25 20:55:46', '2020-06-01 22:19:21', 'Windows 10 x64', NULL, 'Chrome 81.0'),
(229, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-01 22:19:21', '2020-06-03 23:22:49', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(230, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-03 23:22:49', '2020-06-04 07:13:28', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(231, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-04 07:13:28', '2020-06-04 12:12:38', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(232, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-04 12:12:38', '2020-06-04 12:17:07', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(234, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-04 12:17:07', '2020-06-04 23:49:17', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(233, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', '$2y$10$QUGgHSNo/B8Upj.F44hJM.nsVOeoBXZ6AJ57vyL7pAxkCZ7Ewcnty', NULL, 8, '2020-06-04 12:16:02', '2020-06-04 12:16:02', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(235, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-04 23:49:17', '2020-06-07 03:22:12', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(237, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-07 03:22:13', '2020-06-07 04:18:18', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(239, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', '$2y$10$YBCDrBNwxof.IiZZlhN1..p6avZaskFvwm.sd6QoeDa2OP2wxroRG', NULL, 277, '2020-06-07 23:29:05', '2020-06-07 23:29:05', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(238, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-07 04:18:18', '2020-06-08 07:35:07', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(240, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-08 07:35:07', '2020-06-11 22:31:29', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(245, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-11 22:31:30', '2020-06-13 07:48:53', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(241, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 279, '2020-06-08 07:55:06', '2020-06-08 08:16:39', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(242, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 279, '2020-06-08 08:16:39', '2020-06-08 08:18:35', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(243, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', NULL, NULL, 279, '2020-06-08 08:18:35', '2020-06-08 08:19:01', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(244, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'desktop', '', '$2y$10$g0Ywl0/k08uerN/oYq1kL.gcPcIb.o./ZfFzj9AHU/kk421wmSHxO', NULL, 279, '2020-06-08 08:19:01', '2020-06-08 08:19:01', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(246, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-13 07:48:53', '2020-06-14 00:39:42', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(247, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-14 00:39:42', '2020-06-14 06:40:42', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(248, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-14 06:40:42', '2020-06-15 22:40:41', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(249, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-15 22:40:41', '2020-06-16 22:21:00', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(250, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-16 22:21:00', '2020-06-18 10:03:07', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(251, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-18 10:03:07', '2020-06-18 23:44:17', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(252, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-18 23:44:17', '2020-06-21 06:57:43', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(253, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-21 06:57:44', '2020-06-21 23:10:56', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(254, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-21 23:10:56', '2020-06-22 04:34:11', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(255, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-22 04:34:11', '2020-06-22 23:01:53', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(256, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-22 23:01:53', '2020-06-23 22:36:36', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(257, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-23 22:36:37', '2020-06-24 22:30:37', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(258, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-24 22:30:37', '2020-06-26 23:36:27', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(259, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-26 23:36:27', '2020-06-28 00:27:53', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(260, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-28 00:27:53', '2020-06-28 10:04:00', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(261, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-28 10:04:00', '2020-06-30 04:19:39', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(262, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-30 04:19:39', '2020-06-30 22:48:52', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(263, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-06-30 22:48:52', '2020-07-05 22:55:53', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(264, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-05 22:55:53', '2020-07-06 11:09:17', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(265, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-06 11:09:17', '2020-07-07 22:33:16', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(266, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-07 22:33:16', '2020-07-08 22:37:25', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(267, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-08 22:37:25', '2020-07-09 01:14:26', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(268, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-09 01:14:26', '2020-07-09 22:35:01', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(269, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-09 22:35:01', '2020-07-12 22:49:32', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(270, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-12 22:49:33', '2020-07-13 22:24:31', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(272, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-13 22:24:31', '2020-07-15 00:33:20', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(273, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-15 00:33:20', '2020-07-15 22:51:53', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(274, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-15 22:51:53', '2020-07-16 07:46:11', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(275, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-16 07:46:11', '2020-07-17 01:24:48', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(276, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-17 01:24:48', '2020-07-17 22:57:52', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(277, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-17 22:57:52', '2020-07-20 23:11:59', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(278, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-20 23:11:59', '2020-07-22 01:43:57', 'Windows 10 x64', NULL, 'Chrome 83.0'),
(279, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-22 01:43:57', '2020-07-22 22:37:58', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(280, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-22 22:37:58', '2020-07-23 22:32:28', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(281, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-23 22:32:28', '2020-07-26 22:24:10', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(282, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-26 22:24:10', '2020-07-28 23:30:15', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(283, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-07-28 23:30:15', '2020-08-06 22:36:08', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(284, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-06 22:36:08', '2020-08-10 03:55:41', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(285, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-10 03:55:41', '2020-08-10 22:43:11', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(286, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-10 22:43:11', '2020-08-11 22:45:55', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(287, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-11 22:45:55', '2020-08-12 05:20:02', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(288, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-12 05:20:02', '2020-08-12 23:29:27', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(289, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-12 23:29:27', '2020-08-13 04:33:03', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(290, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-13 04:33:03', '2020-08-13 23:26:39', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(291, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-13 23:26:39', '2020-08-14 05:20:39', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(292, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-14 05:20:39', '2020-08-16 10:28:57', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(293, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-16 10:28:57', '2020-08-16 10:33:42', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(294, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-16 10:33:42', '2020-08-16 10:37:54', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(295, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-16 10:37:54', '2020-08-16 22:31:10', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(296, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-16 22:31:10', '2020-08-18 01:10:37', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(297, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-18 01:10:37', '2020-08-19 22:57:22', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(298, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-19 22:57:22', '2020-08-20 22:01:05', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(299, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-20 22:01:05', '2020-08-21 22:25:54', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(300, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-21 22:25:54', '2020-08-23 22:02:26', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(301, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-23 22:02:26', '2020-08-24 22:21:12', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(302, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-24 22:21:12', '2020-08-24 22:32:37', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(303, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-24 22:32:37', '2020-08-24 22:46:43', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(304, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-24 22:46:43', '2020-08-25 22:08:11', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(305, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-25 22:08:11', '2020-08-26 23:05:49', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(306, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-26 23:05:49', '2020-08-27 22:49:52', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(307, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-27 22:49:52', '2020-08-28 23:14:21', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(308, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-28 23:14:21', '2020-08-30 21:57:08', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(309, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-08-30 21:57:08', '2020-09-01 22:49:45', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(310, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-01 22:49:45', '2020-09-02 22:51:38', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(311, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-02 22:51:38', '2020-09-02 22:52:03', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(312, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-02 22:52:03', '2020-09-03 22:13:36', 'Windows 10 x64', NULL, 'Chrome 84.0'),
(313, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-03 22:13:36', '2020-09-07 22:32:19', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(314, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-07 22:32:19', '2020-09-08 23:20:45', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(315, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-08 23:20:45', '2020-09-09 22:45:23', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(316, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-09 22:45:23', '2020-09-11 00:01:48', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(317, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-11 00:01:48', '2020-09-13 22:24:25', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(318, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-13 22:24:25', '2020-09-14 01:23:43', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(319, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-14 01:23:43', '2020-09-14 22:49:10', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(320, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-14 22:49:10', '2020-09-15 04:57:55', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(321, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-15 04:57:55', '2020-09-20 22:36:58', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(322, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-20 22:36:59', '2020-09-21 05:12:18', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(323, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-21 05:12:18', '2020-09-22 22:07:33', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(324, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-09-22 22:07:33', '2020-10-19 07:25:42', 'Windows 10 x64', NULL, 'Chrome 85.0'),
(325, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-10-19 07:25:42', '2020-10-25 23:07:34', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(326, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-10-25 23:07:34', '2020-10-26 22:58:10', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(327, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-10-26 22:58:10', '2020-10-27 23:33:20', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(328, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-10-27 23:33:20', '2020-10-28 22:58:24', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(329, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-10-28 22:58:24', '2020-11-01 00:26:38', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(330, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-01 00:26:38', '2020-11-01 09:17:09', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(331, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-01 09:17:09', '2020-11-01 23:07:45', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(332, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.67', 'desktop', '', NULL, NULL, 1, '2020-11-01 23:07:45', '2020-11-01 23:20:04', 'Windows 10 x64', NULL, 'Microsoft Edge 85.0'),
(333, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-01 23:20:04', '2020-11-02 23:25:12', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(334, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-02 23:25:13', '2020-11-04 23:47:16', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(335, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-04 23:47:16', '2020-11-05 00:26:20', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(336, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-05 00:26:20', '2020-11-05 00:28:03', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(337, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-05 00:28:03', '2020-11-05 05:05:16', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(338, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-05 05:05:16', '2020-11-05 23:42:40', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(339, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-05 23:42:40', '2020-11-08 23:46:48', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(340, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-08 23:46:48', '2020-11-09 03:48:12', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(341, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-09 03:48:12', '2020-11-09 23:17:01', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(342, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-09 23:17:01', '2020-11-09 23:17:02', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(343, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-09 23:17:02', '2020-11-12 01:01:02', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(344, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.193 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-12 01:01:02', '2020-11-12 23:17:05', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(345, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.193 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-12 23:17:05', '2020-11-16 22:56:43', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(346, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-16 22:56:43', '2020-11-17 23:35:54', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(347, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-17 23:35:54', '2020-11-19 23:14:04', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(348, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-19 23:14:04', '2020-11-23 00:31:09', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(349, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-23 00:31:09', '2020-11-24 00:04:07', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(350, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-24 00:04:07', '2020-11-25 23:46:45', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(351, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-25 23:46:45', '2020-11-30 00:09:46', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(352, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-30 00:09:46', '2020-11-30 23:36:29', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(353, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-11-30 23:36:29', '2020-12-01 03:52:25', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(354, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-12-01 03:52:25', '2020-12-02 00:07:54', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(355, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', NULL, NULL, 1, '2020-12-02 00:07:55', '2020-12-07 00:47:03', 'Windows 10 x64', NULL, 'Chrome 86.0'),
(356, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'desktop', '', '$2y$10$5vcahCosTedKffeKJ9pdzea4h55N54scZMhZzjSHSC.YD/w8K6fv.', NULL, 1, '2020-12-07 00:47:03', '2020-12-07 00:47:03', 'Windows 10 x64', NULL, 'Chrome 86.0');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `phone_number`, `email`, `address`, `created_at`, `updated_at`, `deleted_at`, `logo`) VALUES
(1, 'Premer Pharma Attock', '05729265479', NULL, 'Attock', '2020-07-16 04:10:23', NULL, NULL, 'manufacture1.png'),
(2, 'CCL Pharmaceutical Ltd', '051-3659745', NULL, 'Islamabad', '2020-07-16 04:10:23', NULL, NULL, 'manufacture2.png');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Amalgam', '200.00', 'Amalgam', '2020-04-30 12:09:46', '2020-04-30 12:18:14', NULL),
(2, 'Calcium-based cement', '80.00', NULL, '2020-04-30 12:11:37', '2020-04-30 12:27:06', NULL),
(3, 'Caries sealants', '90.00', 'Caries sealants', '2020-04-30 12:12:24', '2020-04-30 12:12:24', NULL),
(4, 'Composite resin', '150.00', 'Composite resin', '2020-04-30 12:12:37', '2020-04-30 12:30:11', NULL),
(5, 'Dental biomaterials', '200.00', 'Dental biomaterials', '2020-04-30 12:12:50', '2020-04-30 12:28:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
CREATE TABLE IF NOT EXISTS `media_files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `directory_name` varchar(255) DEFAULT NULL,
  `media_file_name` varchar(255) DEFAULT NULL,
  `media_file_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `patient_id`, `appointment_id`, `directory_name`, `media_file_name`, `media_file_type`, `created_at`, `updated_at`) VALUES
(1, 8, NULL, '25082007-saw-klo-htoo', 'proposal.txt', 'text/plain', '2020-10-26 23:11:51', '2020-10-27 04:11:51'),
(2, 8, NULL, '25082007-saw-klo-htoo', 'livetv-thumb.jpg', 'image/jpeg', '2020-10-26 23:35:42', '2020-10-27 04:35:42'),
(3, 8, NULL, '25082007-saw-klo-htoo', 'thumb1.jpg', 'image/jpeg', '2020-10-26 23:35:42', '2020-10-27 04:35:42'),
(4, 8, NULL, '25082007-saw-klo-htoo', 'thumb3.jpg', 'image/jpeg', '2020-10-26 23:35:42', '2020-10-27 04:35:42'),
(5, 8, NULL, '25082007-saw-klo-htoo', 'thumb2.jpg', 'image/jpeg', '2020-10-26 23:35:42', '2020-10-27 04:35:42'),
(6, 8, NULL, '25082007-saw-klo-htoo', 'thumb4.jpg', 'image/jpeg', '2020-10-26 23:35:42', '2020-10-27 04:35:42'),
(7, 37, NULL, '25082037-kaloo-khan', '14.jpg', 'image/jpeg', '2020-11-23 01:22:48', '2020-11-23 06:22:48'),
(8, 37, NULL, '25082037-kaloo-khan', '15.jpg', 'image/jpeg', '2020-11-23 01:22:48', '2020-11-23 06:22:48'),
(9, 37, NULL, '25082037-kaloo-khan', '16.jpg', 'image/jpeg', '2020-11-23 01:22:49', '2020-11-23 06:22:49'),
(10, 37, NULL, '25082037-kaloo-khan', '21.jpg', 'image/jpeg', '2020-11-23 01:22:49', '2020-11-23 06:22:49'),
(11, 37, NULL, '25082037-kaloo-khan', '22.jpg', 'image/jpeg', '2020-11-23 01:22:49', '2020-11-23 06:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `medicals`
--

DROP TABLE IF EXISTS `medicals`;
CREATE TABLE IF NOT EXISTS `medicals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `is_medication` enum('Yes','No') DEFAULT NULL,
  `medication` text,
  `allegric` text,
  `is_allegric` enum('Yes','No') DEFAULT NULL,
  `illness` longtext,
  `others` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicals`
--

INSERT INTO `medicals` (`id`, `patient_id`, `is_medication`, `medication`, `allegric`, `is_allegric`, `illness`, `others`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(2, 2, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(3, 3, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(4, 4, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(5, 5, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(6, 6, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(7, 7, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(8, 8, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 15:26:41'),
(9, 9, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(10, 10, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(11, 11, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(12, 12, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(13, 13, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(14, 14, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(15, 15, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(16, 16, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(17, 17, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(18, 18, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 15:26:42'),
(19, 19, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(20, 20, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(21, 21, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(22, 22, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(23, 23, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(24, 24, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(25, 25, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(26, 26, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(27, 27, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(28, 28, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 15:26:43'),
(29, 29, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(30, 30, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(31, 31, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(32, 32, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(33, 33, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(34, 34, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(35, 35, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(36, 36, NULL, NULL, '', 'No', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 15:26:44'),
(37, 37, 'No', NULL, NULL, 'No', '[\"asthma\",\"diabetes\",\"epilepsy\"]', NULL, '2020-01-29 00:17:13', '2020-11-26 06:15:05'),
(38, 38, 'No', NULL, NULL, 'No', '[\"head_neck_injuries\",\"heart_disease\"]', NULL, '2020-02-14 10:10:55', '2020-02-14 15:10:55'),
(39, 39, 'No', 'test', 'test 3', 'No', '[\"allergie\",\"high_blood_pressure\",\"gastric_problems\",\"asthma\",\"respiratory\"]', 'test', '2020-06-08 07:29:05', '2020-06-08 12:29:05'),
(40, 45, 'No', NULL, NULL, 'No', '[\"gastric_problems\",\"asthma\",\"head_neck_injuries\"]', NULL, '2020-08-07 00:14:00', '2020-08-07 05:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `medical_conditions`
--

DROP TABLE IF EXISTS `medical_conditions`;
CREATE TABLE IF NOT EXISTS `medical_conditions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_conditions`
--

INSERT INTO `medical_conditions` (`id`, `name`, `slug`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'High Blood Pressure', 'high-blood-pressure', NULL, NULL, NULL),
(2, 'Gastric Problems', NULL, NULL, NULL, NULL),
(3, 'Asthma', NULL, NULL, NULL, NULL),
(4, 'Head/Neck Injuries', NULL, NULL, NULL, NULL),
(5, 'Diabetes', NULL, NULL, NULL, NULL),
(6, 'Heart Disease', NULL, NULL, NULL, NULL),
(7, 'Liver Problems', NULL, NULL, NULL, NULL),
(8, 'Epilepsy', NULL, NULL, NULL, NULL),
(9, 'Herpes', NULL, NULL, NULL, NULL),
(10, 'Respiratory', NULL, NULL, NULL, NULL),
(11, 'Allergic', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medical_histories`
--

DROP TABLE IF EXISTS `medical_histories`;
CREATE TABLE IF NOT EXISTS `medical_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `date_of_history` timestamp NULL DEFAULT NULL,
  `medical_history_text` longtext,
  `illness` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_histories`
--

INSERT INTO `medical_histories` (`id`, `patient_id`, `date_of_history`, `medical_history_text`, `illness`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 37, '2020-01-30 19:00:00', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that i', '5,6', '2020-01-31 01:43:42', '2020-01-31 01:43:42', NULL),
(2, 37, '2020-02-02 19:00:00', 'it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites s', '7,9', '2020-02-03 01:07:51', '2020-02-03 01:07:51', NULL),
(3, 37, '2020-03-04 19:00:00', 'ssss', '6,7', '2020-03-05 05:19:48', '2020-03-05 05:19:48', NULL),
(4, 37, '2020-03-04 19:00:00', 'thanks', '6', '2020-03-05 05:21:40', '2020-03-05 05:21:40', NULL),
(5, 37, '2020-03-04 19:00:00', 'ATEST', '11', '2020-03-05 05:48:30', '2020-03-06 07:44:22', '2020-03-06 07:44:22'),
(6, 37, '2020-03-04 19:00:00', 'ATEST', '11', '2020-03-05 05:48:38', '2020-03-06 07:43:19', '2020-03-06 07:43:19'),
(7, 37, '2020-03-04 19:00:00', 'ATEST', '11', '2020-03-05 05:49:37', '2020-03-06 07:44:19', '2020-03-06 07:44:19'),
(8, 37, '2020-03-04 19:00:00', 'ATEST', '11', '2020-03-05 05:50:04', '2020-03-06 07:44:17', '2020-03-06 07:44:17'),
(9, 37, '2020-03-04 19:00:00', 'ATEST', '11', '2020-03-05 05:50:30', '2020-03-06 07:44:13', '2020-03-06 07:44:13'),
(10, 37, '2020-03-04 19:00:00', 'fff', '2', '2020-03-05 05:51:33', '2020-03-05 05:51:33', NULL),
(11, 37, '2020-03-04 19:00:00', 'fff', '2', '2020-03-05 05:52:44', '2020-03-05 05:52:44', NULL),
(12, 37, '2020-03-12 19:00:00', 'ssssssdds', '2', '2020-03-13 01:33:12', '2020-03-16 02:45:31', '2020-03-16 02:45:31'),
(13, 39, '2020-06-23 19:00:00', 'test', '1,2', '2020-06-24 02:13:24', '2020-06-24 02:13:24', NULL),
(14, 39, '2020-06-23 19:00:00', 'test', '3', '2020-06-24 02:17:46', '2020-06-24 02:17:46', NULL),
(15, 31, '2020-06-23 19:00:00', 'test', '4', '2020-06-24 02:21:46', '2020-06-24 02:21:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medication_brands`
--

DROP TABLE IF EXISTS `medication_brands`;
CREATE TABLE IF NOT EXISTS `medication_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_brands`
--

INSERT INTO `medication_brands` (`id`, `brand_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kokando', '2019-12-19 10:19:03', '2020-04-02 22:33:15', NULL),
(2, 'Mikrobac Dent', '2019-12-19 10:42:11', '2020-04-02 22:34:52', NULL),
(3, 'GSK', '2019-12-19 10:59:53', '2020-04-02 22:37:54', NULL),
(4, 'Denu', '2020-04-02 22:39:05', '2020-04-02 22:39:05', NULL),
(5, 'Ecocaine 2%', '2020-04-03 04:57:39', NULL, NULL),
(6, 'Safety', '2020-04-03 04:57:39', NULL, NULL),
(7, 'Baby Wipe', '2020-04-03 04:58:17', NULL, NULL),
(8, 'Shofu', '2020-04-03 04:58:17', NULL, NULL),
(9, 'Hovid', '2020-04-03 04:58:34', NULL, NULL),
(10, 'Fairprice', '2020-04-03 04:58:34', NULL, NULL),
(11, 'Albion', '2020-04-03 04:58:51', NULL, NULL),
(12, 'Ethicon', '2020-04-03 04:58:51', NULL, NULL),
(13, 'W&H', '2020-04-03 04:59:03', NULL, NULL),
(14, 'SDI', '2020-04-03 04:59:03', NULL, NULL),
(15, 'ICM Pharma', '2020-04-03 04:59:18', NULL, NULL),
(16, 'Polysorb', '2020-04-03 04:59:18', NULL, NULL),
(17, 'Korea United Pharm.INC', '2020-04-03 04:59:32', NULL, NULL),
(18, 'Ocean Health', '2020-04-03 04:59:32', NULL, NULL),
(19, 'Micro Labs Limited', '2020-04-03 04:59:58', NULL, NULL),
(20, 'Home Proud', '2020-04-03 04:59:58', NULL, NULL),
(21, 'Arms and Hammer', '2020-04-03 05:00:11', NULL, NULL),
(22, 'Budget', '2020-04-03 05:00:11', NULL, NULL),
(23, 'FairPrice', '2020-04-03 05:00:29', NULL, NULL),
(24, 'Magiclean', '2020-04-03 05:00:29', NULL, NULL),
(25, 'Cap Limau', '2020-04-03 05:00:47', NULL, NULL),
(26, 'Latex Vibrant', '2020-04-03 05:00:47', NULL, NULL),
(27, 'Nitrile Sonic', '2020-04-03 05:01:08', NULL, NULL),
(28, 'Woodpecker', '2020-04-03 05:01:08', NULL, NULL),
(29, 'Belmont', '2020-04-03 05:03:47', NULL, NULL),
(30, 'Osteem SM-5 Set', '2020-04-03 05:03:47', NULL, NULL),
(31, 'Fluimucil A', '2020-04-03 05:04:03', NULL, NULL),
(32, 'Systane', '2020-04-03 05:04:03', NULL, NULL),
(33, 'Stada', '2020-04-03 05:04:15', NULL, NULL),
(34, 'MD Pharmaceuticals', '2020-04-03 05:04:15', NULL, NULL),
(35, 'Oral B', '2020-04-03 05:04:51', NULL, NULL),
(36, 'Pearlie White', '2020-04-03 05:04:51', NULL, NULL),
(37, 'NBF', '2020-04-03 05:05:18', NULL, NULL),
(38, 'NBF', '2020-04-03 05:05:18', NULL, NULL),
(39, 'President Toothpaste', '2020-04-03 05:05:36', NULL, NULL),
(40, 'Sentin Toothpaste', '2020-04-03 05:05:36', NULL, NULL),
(41, 'Colgate  Total', '2020-04-03 05:05:48', NULL, NULL),
(42, 'Melilea organic', '2020-04-03 05:05:48', NULL, NULL),
(43, '10pcs/Box ', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(108, '', '2020-04-17 01:45:51', '2020-04-17 01:45:51', NULL),
(45, 'Woodpecket', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(46, '100% polyester', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(47, '48 Cotton + 52 polyeaster ', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(48, 'Oscar ( Cotton + polyeaster  ) ', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(49, 'Tri Blend ( 50 % poly easter , 25% cotton , 25 % rayon ) ', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(50, 'Tatron 100% Poly easter ', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(51, '1 box 10 Syringes ', '2020-04-09 03:18:26', '2020-04-09 03:18:26', NULL),
(53, '$19.00 ', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(54, '10/Box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(55, '10tabs/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(56, '50/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(57, '1box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(58, '1pc/bag 50/ctn', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(59, '1 box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(60, '2 syringe/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(61, '5L canister', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(62, 'Pump', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(63, '150 sheets', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(64, '4.5g Tube/Box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(65, '100Caps/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(66, '1.2g syringe', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(67, '(fine)FG 102-6643     5pcs/pack', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(68, '1 pack of 125Bibs 1box 4pack', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(69, '200sheets', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(70, '1roll', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(71, '100/ box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(72, '12 pcs/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(73, '2.2m Tube/Box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(74, '50 caps', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(75, '4L/bot', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(76, '36/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(77, '12pieces/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(78, '6ML Bottle/Box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(79, '100tabs/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(80, '60 tabs/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(81, '500tabs/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(82, '2gx2 syringes - 10 Disposable tips / Unit', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(83, '24x28', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(84, '2.5 gms', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(85, '30ml bot', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(86, '1 cotton mop head', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(87, '1pktx5kg', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(88, '6 rolls/pack', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(89, '5L', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(90, '1.5L', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(91, '3 litres', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(92, '500ml', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(93, '85G', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(94, '640ml', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(95, '1 cartoon( 100 pcs / box 10 box / cartoon )', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(96, '1', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(97, '10cap /Box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(98, '30vials/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(99, '50caps/box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(100, '24', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(101, '10pcs/pk', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(102, '50m/pcs', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(103, '30g/tube', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(104, '1 tube/ box', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(105, '150 g tube', '2020-04-10 01:39:20', '2020-04-10 01:39:20', NULL),
(106, 'd', '2020-04-10 01:39:21', '2020-04-10 01:39:21', NULL),
(107, '10 tubes/per box', '2020-04-10 01:39:21', '2020-04-10 01:39:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medication_categories`
--

DROP TABLE IF EXISTS `medication_categories`;
CREATE TABLE IF NOT EXISTS `medication_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_categories`
--

INSERT INTO `medication_categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Consumables', 0, '2019-12-25 16:43:13', '2020-04-01 11:18:07', NULL),
(2, 'Equipment', 0, '2019-12-25 16:43:13', NULL, NULL),
(3, 'Sales', 0, '2020-03-31 07:27:28', '2020-03-31 07:27:28', NULL),
(4, 'Sales Item', 0, '2020-03-31 07:29:30', '2020-03-31 07:29:30', NULL),
(5, 'Medication', 1, '2020-03-31 07:39:55', '2020-03-31 07:39:55', NULL),
(6, 'Oral Surgery Dental Material', 1, '2020-03-31 10:46:46', '2020-04-01 11:19:01', NULL),
(7, 'Disposable', 1, '2020-04-03 05:08:11', NULL, NULL),
(8, 'Oral Hygiene Dental Product', 1, '2020-04-03 05:08:11', NULL, NULL),
(9, 'Oral Hygiene Dental Product', 1, '2020-04-03 05:18:13', NULL, NULL),
(10, 'Dental Material', 1, '2020-04-03 05:18:13', NULL, NULL),
(11, 'House Keeping', 1, '2020-04-03 05:18:55', NULL, NULL),
(12, 'Sterilisation and Disinfection', 1, '2020-04-03 05:18:55', NULL, NULL),
(13, 'Consevative Dental Materials', 1, '2020-04-03 05:19:09', NULL, NULL),
(14, 'Oral Hygiene', 1, '2020-04-09 02:03:11', '2020-04-09 02:03:11', NULL),
(15, 'Prosthetic', 2, '2020-04-09 02:03:11', '2020-04-09 02:03:11', NULL),
(16, 'Ceila Chair Part', 2, '2020-04-09 02:03:11', '2020-04-09 02:03:11', NULL),
(17, 'Preventative', 2, '2020-04-09 02:03:11', '2020-04-09 02:03:11', NULL),
(18, 'Implant', 2, '2020-04-09 02:03:11', '2020-04-09 02:03:11', NULL),
(19, 'Dental Product', 4, '2020-04-09 02:03:11', '2020-04-09 02:03:11', NULL),
(20, 'Supplement', 4, '2020-04-09 02:03:11', '2020-04-09 02:03:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medication_patients`
--

DROP TABLE IF EXISTS `medication_patients`;
CREATE TABLE IF NOT EXISTS `medication_patients` (
  `patient_id` int(11) DEFAULT NULL,
  `pre_medical_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_patients`
--

INSERT INTO `medication_patients` (`patient_id`, `pre_medical_id`, `created_at`, `updated_at`) VALUES
(37, 10, NULL, NULL),
(37, 58, NULL, NULL),
(37, 11, NULL, NULL),
(37, 7, NULL, NULL),
(39, 73, NULL, NULL),
(39, 7, NULL, NULL),
(39, 22, NULL, NULL),
(39, 10, NULL, NULL),
(31, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_folders`
--

DROP TABLE IF EXISTS `message_folders`;
CREATE TABLE IF NOT EXISTS `message_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `patient_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_id` bigint(20) DEFAULT NULL,
  `salutation` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comapny_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartments_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `change_of_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `reminder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `registered_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `patient_unique_id`, `custom_code`, `referral_id`, `salutation`, `patient_name`, `first_name`, `last_name`, `patient_phone`, `patient_email`, `date_of_birth`, `gender`, `code`, `phone`, `nationality`, `card_type`, `card_number`, `occupation`, `comapny_name`, `referral_name`, `referral_code`, `insurance_by`, `insurance_number`, `city`, `state`, `zipcode`, `country`, `apartments_no`, `house_no`, `street_no`, `address`, `change_of_address`, `reminder`, `profile_picture`, `family`, `patient_type`, `expiry_date`, `created_at`, `registered_at`, `updated_at`, `deleted_at`) VALUES
(1, 241, '25082000', '25082000', NULL, NULL, 'Soe Maung Maung ', 'Soe Maung', 'Maung ', '81914891', '', '1985-12-10', 'Male', NULL, NULL, NULL, NULL, 'G6089956N', '', 'Universal Manufacturing ', '', '', '', '', NULL, NULL, '522201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-27 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(2, 242, '25082001', '25082001', NULL, NULL, 'Reina Nakahara ', 'Reina Nakahara', '', '97202158', 'marie.nakahara@gmail.com', '2006-04-25', 'Female', NULL, NULL, NULL, NULL, 'T0676798I', '', '', 'Mari Nakahara', '', '', '', NULL, NULL, '259786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-29 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(3, 243, '25082002', '25082002', NULL, NULL, 'Mireu Nakahara ', 'Mireu Nakahara', '', '97202158', 'marie.nakahara@gmail.com', '2008-08-24', 'Female', NULL, NULL, NULL, NULL, 'T0875346B', '', '', 'Mari Nakahara', '', '', '', NULL, NULL, '259786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-29 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(4, 244, '25082003', '25082003', NULL, NULL, 'Ria Nakahara ', 'Ria Nakahara', '', '97202158', 'marie.nakahara@gmail.com', '2003-02-22', 'Female', NULL, NULL, NULL, NULL, 'T0377027Z', '', '', 'Mari Nakahara', '', '', '', NULL, NULL, '259786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-29 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(5, 245, '25082004', '25082004', NULL, NULL, 'Nang Kham May ', 'Nang Kham', 'May ', '87267212', 'khammaymay050@gmail.com', '1991-12-12', 'Female', NULL, NULL, NULL, NULL, 'G0915260T', 'Nurse', '', 'Burmese.com', '', '', '', NULL, NULL, '152120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-29 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(6, 246, '25082005', '25082005', NULL, NULL, 'Wint War Khine ', 'Wint War', 'Khine ', '96226041', '', '1982-10-27', 'Female', NULL, NULL, NULL, NULL, 'S8274295F', '', '', '', '', '', '', NULL, NULL, '120364', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-29 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(7, 247, '25082006', '25082006', NULL, NULL, 'Wang Zhi Shuang ', 'Wang Zhi', 'Shuang ', '', '', '1985-09-22', 'Male', NULL, NULL, NULL, NULL, 'G2429992P', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-29 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(8, 248, '25082007', '25082007', NULL, NULL, 'Saw Klo Htoo ', 'Saw Klo', 'Htoo ', '86187368', '', '1977-07-22', 'Female', NULL, NULL, NULL, NULL, 'G8188466N', '', 'Globe Marine Electrical ', 'Burmese.com', '', '', '', NULL, NULL, '540241', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-30 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(9, 249, '25082008', '25082008', NULL, NULL, 'Jonathan Ng ', 'Jonathan Ng', '', '96653986', '', '2006-10-20', 'Female', NULL, NULL, NULL, NULL, 'G31766849M', 'Student ', '', '', '', '', '', NULL, NULL, '328465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-31 19:00:00', NULL, '2020-01-28 15:26:41', NULL),
(10, 250, '25082009', '25082009', NULL, NULL, 'Ng Aik Chin ', 'Ng Aik', 'Chin ', '96653986', '', '1971-09-17', 'Male', NULL, NULL, NULL, NULL, 'G3360821M', 'Engineer', '', '', '', '', '', NULL, NULL, '328465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-31 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(11, 251, '25082010', '25082010', NULL, NULL, 'Anusha Taara Dutt', 'Anusha Taara', 'Dutt', '81686219', '', '2007-02-26', 'Female', NULL, NULL, NULL, NULL, 'T0705718G', 'Student ', '', '', '', '', '', NULL, NULL, '437431', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-31 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(12, 252, '25082011', '25082011', NULL, NULL, 'Thein Zaw Oo ', 'Thein Zaw', 'Oo ', '90810690', '', '1987-06-01', 'Male', NULL, NULL, NULL, NULL, 'G6713065R ', 'Construction worker ', 'Winnier Engineering Pte Ltd ', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(13, 253, '25082012', '25082012', NULL, NULL, 'Yin Mar Aye ', 'Yin Mar', 'Aye ', '97951724', '', '1984-04-10', 'Female', NULL, NULL, NULL, NULL, 'G0684087L', 'Engineer', 'Lta', '', '', '', '', NULL, NULL, '752501', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(14, 254, '25082013', '25082013', NULL, NULL, 'Fiona English ', 'Fiona English', '', '81455185', '', '1993-02-27', 'Female', NULL, NULL, NULL, NULL, 'G3352869N', 'business development ', '', '', '', '', '', NULL, NULL, '307945', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(15, 255, '25082014', '25082014', 37, NULL, 'David Mitchel ', 'David Mitchel', '', '91810533', 'dcutmitchell@gmail.com', '1973-05-01', 'Male', NULL, NULL, NULL, NULL, '63089432X', '', '', 'AIA', '', '', '', NULL, NULL, '437928', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 19:00:00', NULL, '2020-11-24 05:22:51', NULL),
(16, 256, '25082015', '25082015', NULL, NULL, 'Nay Myo Oo ', 'Nay Myo', 'Oo ', '81834234', 'nnaayy@gmail.com', '1978-12-09', 'Male', NULL, NULL, NULL, NULL, 'G6020893Q', 'Engineer ', '', '', '', '', '', NULL, NULL, '470131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-02 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(17, 257, '25082016', '25082016', NULL, NULL, 'Smitha Unnikrishnan ', 'Smitha Unnikrishnan', '', '85910310', 'smithaunni@gmial.com', '1980-04-20', 'Female', NULL, NULL, NULL, NULL, 'G5476823R', '', '', '', '', '', '', NULL, NULL, '329215', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-02 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(18, 258, '25082017', '25082017', NULL, NULL, 'Gaston Angelp Soto Denegri ', '', '', '97567905', '', '1982-09-11', 'Female', NULL, NULL, NULL, NULL, 'G3060800W', 'Senior Art director', 'BBH ', '', '', '', '', NULL, NULL, '160082', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-02 19:00:00', NULL, '2020-01-28 15:26:42', NULL),
(19, 259, '25082018', '25082018', NULL, NULL, 'Thein Zaw ', 'Thein Zaw', '', '97210894', '', '1986-05-30', 'Male', NULL, NULL, NULL, NULL, 'G8142059P', '', 'Vopak Terminal Singapore ', '', '', '', '', NULL, NULL, '689528', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-02 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(20, 260, '25082019', '25082019', NULL, NULL, 'Kyaw Khin ', 'Kyaw Khin', '', '92303864', '', '1938-01-18', 'Male', NULL, NULL, NULL, NULL, 'G0661042R', 'Retired', '', '', '', '', '', NULL, NULL, '169568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-03 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(21, 261, '25082020', '25082020', NULL, NULL, 'Aung Si Thu ', 'Aung Si', 'Thu ', '91547567', '', '1987-04-30', 'Male', NULL, NULL, NULL, NULL, 'G5167187U', 'Engineer', 'Asia Pacific Shipyard', '', '', '', '', NULL, NULL, '649927', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-03 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(22, 262, '25082021', '25082021', NULL, NULL, 'Ye Tun ', 'Ye Tun', '', '85771294', 'dryetun551@gmail.com ', '1964-01-22', 'Male', NULL, NULL, NULL, NULL, 'MA988204', 'Doctor', '', 'Mga Hnin Soe ', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-03 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(23, 263, '25082022', '25082022', NULL, NULL, 'Lee Siew Boon ', 'Lee Siew', 'Boon ', '85699831', '', '1970-02-18', 'Female', NULL, NULL, NULL, NULL, 'S7073553I', '', '', '', '', '', '', NULL, NULL, '540234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-05 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(24, 264, '25082023', '25082023', NULL, NULL, 'Josephine Kwok ', 'Josephine Kwok', '', '98455764', '', '1972-04-14', 'Female', NULL, NULL, NULL, NULL, 'S7214770G', '', '', '', '', '', '', NULL, NULL, '510639', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-05 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(25, 265, '25082024', '25082024', NULL, NULL, 'Thwe Thwe Oo ', 'Thwe Thwe', 'Oo ', '', '', NULL, 'Female', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-05 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(26, 266, '25082025', '25082025', NULL, NULL, 'Kay Zin Win Ko', 'Kay Zin', 'Win Ko', '83531343', 'kzinwinko@gmail.com', '1993-06-14', 'Female', NULL, NULL, NULL, NULL, 'G3355394W', '', '', '', '', '', '', NULL, NULL, '650307', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-05 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(27, 267, '25082026', '25082026', 38, NULL, 'Xo Nwa Zi', 'Xo Nwa', 'Zi', '91038348', 'xonwayzi@gmail.com', '1998-12-22', 'Female', NULL, NULL, NULL, NULL, 'G1829023K', '', '', 'Myat Saydanar Clinic', '', '', '', NULL, NULL, '670631', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-06 19:00:00', NULL, '2020-11-24 05:25:46', NULL),
(28, 268, '25082027', '25082027', NULL, NULL, 'Myo Win Khine ', 'Myo Win', 'Khine ', '97232772', '', '1962-10-26', 'Male', NULL, NULL, NULL, NULL, 'S2726518I', '', '', '', '', '', '', NULL, NULL, '150105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-07 19:00:00', NULL, '2020-01-28 15:26:43', NULL),
(29, 269, '25082028', '25082028', 38, NULL, 'Thin Thin Khaing', 'Thin Thin', 'Khaing', '96962140', '', '1980-05-30', 'Female', NULL, NULL, NULL, NULL, 'G0679002Q', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-07 19:00:00', NULL, '2020-11-24 05:26:03', NULL),
(30, 270, '25082029', '25082029', NULL, NULL, 'Nay Win Myint ', 'Nay Win', 'Myint ', '87323790', '', '1985-06-18', 'Male', NULL, NULL, NULL, NULL, 'G5169270U', '', '', '', '', '', '', NULL, NULL, '750320', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-07 19:00:00', NULL, '2020-01-28 15:26:44', NULL),
(31, 240, '25082030', '25082030', NULL, NULL, 'Claire Goodill ', 'Claire Goodill', '', '86185148', 'chismish@yahoo.com', '1991-05-13', 'Female', NULL, NULL, NULL, NULL, '-', '', '', '', '', '', '', NULL, NULL, '48424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-09 19:00:00', NULL, '2020-01-28 15:26:44', NULL),
(32, 272, '25082031', '25082031', 37, NULL, 'Chee Hsin Yee ', 'Chee Hsin', 'Yee ', '67497168', '', '1998-04-08', 'Female', NULL, NULL, NULL, NULL, 'S9812839E', '', '', '', '', '', '', NULL, NULL, '439198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-09 19:00:00', NULL, '2020-11-23 07:19:47', NULL),
(33, 273, '25082032', '25082032', NULL, NULL, 'Ng Poh Seng ', 'Ng Poh', 'Seng ', '', '', '1968-11-16', 'Male', NULL, NULL, NULL, NULL, 'S6844639B', '', '', '', '', '', '', NULL, NULL, '640637', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-09 19:00:00', NULL, '2020-01-28 15:26:44', NULL),
(34, 274, '25082033', '25082033', NULL, NULL, 'Myo Kyaw Oo', 'Myo Kyaw', 'Oo', '98692639', '', '1970-09-28', 'Male', NULL, NULL, NULL, NULL, 'G8522736Q', '', '', '', '', '', '', NULL, NULL, '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-09 19:00:00', NULL, '2020-01-28 15:26:44', NULL),
(35, 275, '25082034', '25082034', NULL, NULL, 'Kenza Brouwer ', 'Kenza Brouwer', '', '98296840', '', '2000-01-21', 'Female', NULL, NULL, NULL, NULL, 'T0002847E', '', '', '', '', '', '', NULL, NULL, '289852', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 19:00:00', NULL, '2020-01-28 15:26:44', NULL),
(36, 276, '25082034', '25082034', NULL, NULL, '', '', '', '', '', NULL, 'Female', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 10:26:44', NULL, '2020-01-28 15:26:44', NULL),
(37, 277, '25082037', NULL, 40, 'Mr', 'kaloo khan', 'kaloo', 'khan', '+9673265987469', 'mujtabaahmad1985@gmail.com', '2014-01-01', NULL, '967', NULL, NULL, 'IC Number', '444', 'Software developer', 'PlayFeedz', NULL, '25082038', 'AIA', '1234567', 'Haripur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-29 00:17:13', NULL, '2020-11-26 06:15:05', NULL),
(38, 278, '25082038', NULL, 37, 'Mr', 'Khaiso Hamlet', 'Khaiso', 'Hamlet', NULL, 'khaiso@gmail.com', '2015-03-02', 'Male', NULL, NULL, NULL, 'IC Number', NULL, NULL, NULL, NULL, '25082037', 'AIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'post_receive', NULL, NULL, NULL, NULL, '2020-02-14 10:10:55', NULL, '2020-05-21 17:52:48', NULL),
(39, 279, '25082039', NULL, 37, 'Mr', 'jam jam', 'jam', 'jam', '+168463256485', 'jamjam@yahoo.com', '2016-03-02', NULL, '1684', NULL, 'Albania', 'FIN Number', '2323', 'Software developer', 'PlayFeedz', NULL, '25082037', 'SHENTON', '333222', 'Oaris', NULL, '75009', NULL, NULL, NULL, '9 rue de bellefond', NULL, NULL, 'sms_receive', NULL, NULL, NULL, NULL, '2020-06-08 07:29:04', NULL, '2020-06-08 12:29:04', NULL),
(40, NULL, '25082040', NULL, NULL, 'Mr', 'd', '', '', '+93', 'd@d.h', NULL, NULL, '93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-22 22:40:03', NULL, '2020-07-23 03:40:03', NULL),
(41, NULL, '25082041', NULL, NULL, 'Mr', 'y', '', '', '+9355555555555', 'y@y.vbf', NULL, NULL, '93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-22 22:40:36', NULL, '2020-07-23 03:40:36', NULL),
(42, NULL, '25082042', NULL, NULL, 'Mr', 'testtesttest', '', '', '+358', 'mujtabaahmadttest@gmail.com', NULL, NULL, '358', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-06 22:36:40', NULL, '2020-08-07 03:36:40', NULL),
(43, 280, '25082043', NULL, NULL, 'Mr', 'yahoo', '', '', '+3765555', 'may@yahoo.com', NULL, NULL, '376', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-06 23:00:06', NULL, '2020-08-07 04:00:06', NULL),
(44, 281, '25082043', NULL, NULL, 'Mr', 'yahoo0', '', '', '+3765555', 'may0@yahoo.com', NULL, NULL, '376', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-06 23:08:16', NULL, '2020-08-07 04:08:16', NULL),
(45, 282, NULL, NULL, NULL, 'Mr', 'Sabeel Ahmad', 'Sabeel', 'Ahmad', '+376', 'may00@gmail.com', '2002-03-26', NULL, '376', NULL, 'Andorra', 'IC Number', '1236478', NULL, 'Test', NULL, NULL, 'AIA', '11236', 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-06 23:11:25', NULL, '2020-08-07 05:35:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_drug_allergies`
--

DROP TABLE IF EXISTS `patient_drug_allergies`;
CREATE TABLE IF NOT EXISTS `patient_drug_allergies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `drug_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_drug_allergies`
--

INSERT INTO `patient_drug_allergies` (`id`, `patient_id`, `drug_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 39, 7, '2020-06-24 02:17:03', '2020-06-24 02:17:03', NULL),
(26, 39, 4, '2020-06-24 02:13:40', '2020-06-24 02:13:40', NULL),
(22, 37, 23, '2020-03-03 01:28:32', '2020-03-03 01:28:32', NULL),
(27, 39, 3, '2020-06-24 02:16:56', '2020-06-24 02:16:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_flags`
--

DROP TABLE IF EXISTS `patient_flags`;
CREATE TABLE IF NOT EXISTS `patient_flags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_flags`
--

INSERT INTO `patient_flags` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'VIP', '#5e35b1', NULL, NULL),
(2, 'Drug Allergy, Critical Medical History', '#d50000', NULL, NULL),
(5, 'Difficult Patients', '#fae102', '2019-05-28 08:06:52', '2019-05-29 01:58:47'),
(6, 'Banned Patient', '#020202', '2019-05-28 23:57:20', '2019-05-28 23:57:20'),
(7, 'Deceased', '#1f00f7', '2019-05-28 23:57:48', '2019-05-28 23:57:48'),
(8, 'Special Needs', '#40ed0a', '2019-05-28 23:58:22', '2019-05-28 23:58:22'),
(10, 'Good', '#0c1bf4', '2019-06-13 07:00:54', '2019-06-13 07:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `patient_sessions`
--

DROP TABLE IF EXISTS `patient_sessions`;
CREATE TABLE IF NOT EXISTS `patient_sessions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `session_date_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `objectives` text,
  `change_from_previous_session` text,
  `current_symtoms` text,
  `notes` text,
  `conclusion` int(11) DEFAULT NULL,
  `to-do-list` text,
  `file_name` varchar(255) DEFAULT NULL,
  `treatment_done` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_title`, `created_at`, `updated_at`) VALUES
(8, 'Easy', '2019-05-12 11:04:30', '2019-05-12 16:04:30'),
(2, 'Deposit', '2017-10-22 10:50:54', '2017-10-22 15:50:54'),
(5, 'Visa', '2017-10-25 07:27:57', '2017-10-25 03:27:57'),
(6, 'Insurance AIA', '2017-10-25 10:47:08', '2017-10-25 06:47:08'),
(9, 'Easy Paisa', '2019-05-12 11:04:38', '2019-05-12 16:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_title` varchar(255) NOT NULL,
  `permission_slug` varchar(255) DEFAULT NULL,
  `permission_description` text,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_title`, `permission_slug`, `permission_description`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'View Dashboard', 'view_dashboard', 'View dashboard for all elements', NULL, NULL, NULL, NULL),
(2, 'Patient Managment', 'view_pantient_management', 'View Patient Management', NULL, NULL, NULL, NULL),
(3, 'Add Patient', 'add_patient', 'View Add Patient', 2, NULL, NULL, NULL),
(4, 'Edit Patient', 'edit_patient', 'View Edit Patient', 2, NULL, NULL, NULL),
(5, 'Calendar', 'calendar', 'Calendar', NULL, NULL, NULL, NULL),
(6, 'Add Appointment', 'add_appointment', 'Add Appointment', 35, NULL, NULL, NULL),
(7, 'Filters Appointments', 'filters_appointments', 'Filtering appointment by doctors, location, and services', 5, NULL, NULL, NULL),
(8, 'Filter By Room', 'filter_by_room', 'Filter appointment by room', 5, NULL, NULL, NULL),
(9, 'Filter by Staff', 'filter_by_staff', 'Filter appointments by Staff', 5, NULL, NULL, NULL),
(10, 'Filter by doctor only', 'filter_by_doctor_only', 'Filter appointments only for doctors', 5, NULL, NULL, NULL),
(11, 'Filter by location only', 'filter_by_loation_only', 'Filter appointment only with locations', 5, NULL, NULL, NULL),
(12, 'Filter by services only', 'filter_by_service_only', 'Filter appointment only by services', 5, NULL, NULL, NULL),
(13, 'Change Patient Unique Number', 'change_patient_unique_number', 'Patient unique number can be changed', 2, NULL, NULL, NULL),
(14, 'Add Treatment Card', 'add_treatment_card', 'Can add treatment card', 35, NULL, NULL, NULL),
(15, 'Edit Treatment Card', 'edit_treatment_card', NULL, 35, NULL, NULL, NULL),
(16, 'Edit Appointment', 'edit_appointment', 'Can edit an appointment', 35, NULL, NULL, NULL),
(17, 'View Patient', 'view_patient', 'View list of patient', 2, NULL, NULL, NULL),
(18, 'Setup', 'setup', 'Setup Menu', NULL, NULL, NULL, NULL),
(19, 'Availability', 'availability', 'Show availability for doctors', 18, NULL, NULL, NULL),
(20, 'Booking Process', 'booking_process', NULL, 18, NULL, NULL, NULL),
(21, 'Clinical Detail', 'clinical_detail', 'Clinical Details ', 18, NULL, NULL, NULL),
(22, 'Clinical Location', 'clinical_location', 'Clinical Location for Clinical Detail', 18, NULL, NULL, NULL),
(23, 'Contact Data', 'contact_data', 'Contact Data', 18, NULL, NULL, NULL),
(24, 'Doctors List', 'doctors_list', 'Doctors List', 18, NULL, NULL, NULL),
(25, 'Export Data', 'export_data', 'Export data into csv', 18, NULL, NULL, NULL),
(26, 'Import Data', 'import_data', 'Import data from gmail, outlook and csv', 18, NULL, NULL, NULL),
(27, 'Patient Advice', 'patient_advice', 'Patient Advices', 18, NULL, NULL, NULL),
(28, 'Patient Education', 'patient_education', 'Patient Educations', 18, NULL, NULL, NULL),
(29, 'Patient Treatment History', 'patient_treatment_history', NULL, 18, NULL, NULL, NULL),
(30, 'Payments', 'payments', 'Payments', 18, NULL, NULL, NULL),
(31, 'Products', 'products', 'Products', 18, NULL, NULL, NULL),
(32, 'Rooms', 'rooms', 'Rooms', 18, NULL, NULL, NULL),
(33, 'Services', 'services', 'Services', 18, NULL, NULL, NULL),
(34, 'Forms', 'forms', 'Forms', 18, NULL, NULL, NULL),
(35, 'Appointments', 'appointments', 'Appointment\'s Permissions', NULL, NULL, NULL, NULL),
(36, 'Delete Appointment', 'delete_appointment', 'Delete Appointment', 35, NULL, NULL, NULL),
(37, 'Drag Appointment at Calendar', 'drag_appointment', NULL, 35, NULL, NULL, NULL),
(38, 'Resize Appointment at Calendar', 'resize_appointment', 'Resize Appointment at Calendar by using drag and resizing ', 35, NULL, NULL, NULL),
(39, 'Show appointment Detail', 'show_appointment_detail', 'Show appointment Detail', 35, NULL, NULL, NULL),
(40, 'View Patient List', 'view_patient_list', NULL, 1, NULL, NULL, NULL),
(41, 'View Recent Appointments', 'view_recent_appointments', NULL, 1, NULL, NULL, NULL),
(42, 'View Patient - With Action List', 'view_patient_with_action_list', NULL, 2, NULL, NULL, NULL),
(43, 'View Patient - With Action List', 'view_patient_with_action_list', NULL, 1, NULL, NULL, NULL),
(44, 'Can View Contact Information', 'can_view_contact_information', NULL, 2, NULL, NULL, NULL),
(45, 'Block Time', 'block_time', NULL, 5, NULL, NULL, NULL),
(46, 'Update Appointment', 'update_appointment', NULL, 35, NULL, NULL, NULL),
(47, 'Confirm Appointment', 'confirm_appointment', NULL, 35, NULL, NULL, NULL),
(48, 'Edit Patient Biodata', 'edit_patient_bio_data', NULL, 2, NULL, NULL, NULL),
(49, 'View Patient Past Data', 'show_patient_past_data', NULL, 2, NULL, NULL, NULL),
(50, 'Doctors', 'Doctors', NULL, NULL, NULL, NULL, NULL),
(51, 'Add Doctor', 'add_doctor', NULL, 50, NULL, NULL, NULL),
(52, 'Edit Doctor', 'edit_doctor', NULL, 50, NULL, NULL, NULL),
(53, 'View Doctor', 'view_doctor', NULL, 50, NULL, NULL, NULL),
(54, 'Add Appointments to Other Doctors ', NULL, NULL, 50, NULL, NULL, NULL),
(55, 'Delete Doctor', NULL, NULL, 50, NULL, NULL, NULL),
(56, 'Setup Permission', NULL, NULL, 50, NULL, NULL, NULL),
(57, 'Availability', NULL, NULL, 50, NULL, NULL, NULL),
(58, 'Appointments', NULL, NULL, 50, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_users`
--

DROP TABLE IF EXISTS `permissions_users`;
CREATE TABLE IF NOT EXISTS `permissions_users` (
  `permission_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pre_medicals`
--

DROP TABLE IF EXISTS `pre_medicals`;
CREATE TABLE IF NOT EXISTS `pre_medicals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity_signal` int(11) DEFAULT '3',
  `in_stock` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `sub_category_id`, `product_title`, `quantity_signal`, `in_stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 43, 4, 19, 'Tooth Mousse', 3, 11, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(2, 108, 0, 0, 'High Vac Suction', 3, 260, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(3, 3, 1, 5, 'Zinnat 500mg', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(4, 5, 1, 6, 'Local Anaesthetic', 3, 264, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(5, 6, 1, 7, 'Gloves XS Powder Free', 3, 494, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(6, 1, 1, 7, 'Gown (Lab Coat)', 3, 4350, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(7, 108, 1, 8, 'Denture Box - S (Blue)', 3, 650, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(8, 108, 1, 8, 'Denture Box - S (Yellow)', 3, 646, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(9, 4, 1, 10, 'Base Liner', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(10, 4, 1, 10, 'DENU Base Liner', 3, 78, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(11, 2, 1, 11, 'Cleaner and Disinfectant for Medical and Dental Aspirator', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(12, 2, 1, 12, 'Mikrobac Pump', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(13, 7, 1, 11, 'Sanitising Wipes', 3, 65, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(14, 8, 1, 13, 'Beautifil II 4.5g # A1', 3, 22, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(15, 8, 1, 13, 'Beautifil II 4.5g # A2', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(16, 8, 1, 13, 'Beautifil II 4.5g # A3', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(17, 8, 1, 13, 'Beautifil II 4.5g Shade B1', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(18, 8, 1, 13, 'Beautifil II 4.5g Shade B2', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(19, 9, 1, 5, ' Amoxicillin 250mg', 3, 6500, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(20, 5, 1, 6, 'Local Anaesthetic', 3, 22, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(21, 108, 1, 10, 'Oral Surgery Bur', 3, 78, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(22, 108, 1, 7, 'Dental Bibs Blue \n(33cm x 45cm)', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(23, 10, 1, 11, 'Facial Tissue', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(24, 108, 1, 11, 'Sterilization Reel 200mm', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(25, 11, 1, 10, 'Braun Blade No 15', 3, 1300, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(26, 12, 1, 6, 'Vicryl Vio 75cm', 3, 156, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(27, 1, 1, 7, 'Gown (Lab Coat)', 3, 200, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(28, 13, 1, 6, 'Irrigation Drip Set 2.2m \n(Sterilisable )', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(29, 14, 1, 10, 'RIVA Light cure', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(30, 15, 1, 14, 'Orasol Antiseptic Mouthwash', 3, 39, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(31, 16, 1, 10, 'Polysorb 4cm', 3, 468, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(32, 12, 1, 7, 'Suture - Vicryl  4', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(33, 8, 1, 13, 'Beauti Bond ', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(34, 17, 1, 5, 'Augmentin 625mg', 3, 1300, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(35, 18, 1, 5, 'Buffered C-1000 ', 3, 2340, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(36, 3, 1, 5, 'Zyrtec D 10mg', 3, 1300, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(37, 19, 1, 5, 'Mefril 250mg', 3, 26000, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(38, 14, 1, 10, 'Flowable Composite', 3, 78, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(39, 4, 1, 10, 'Denu Flow A2, A3', 3, 104, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(40, 108, 1, 7, 'Black Garbage Bag', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(41, 108, 1, 7, 'Ointment Box', 3, 5200, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(42, 108, 1, 7, 'Orosol Bottle', 3, 5200, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(43, 20, 1, 11, 'Floor Mop Head', 3, 78, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(44, 21, 1, 11, 'Baking Soda', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(45, 22, 1, 11, 'Kitchen Towel', 3, 156, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(46, 22, 1, 11, 'Dishwashing liquid', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(47, 10, 1, 11, 'Drinking water', 3, 468, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(48, 24, 1, 11, 'Floor Cleaner', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(49, 24, 1, 11, 'Toilet Bleach', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(50, 10, 1, 11, 'Toilet Paper', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(51, 25, 1, 11, 'Vinegar', 3, 26, '2020-06-30 06:19:15', '2020-07-13 22:30:42', NULL),
(52, 26, 1, 7, 'Gloves', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(53, 27, 1, 7, 'Gloves ', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(54, 28, 2, 15, 'Light Cure Machine', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(55, 29, 2, 16, 'Saliva Ejector tip holder', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(56, 45, 2, 17, 'Piezo Scaler UDSpEMS', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(57, 30, 2, 18, 'Hand Held Control Panel ', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(58, 30, 2, 18, 'Bottle Holder', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(59, 30, 2, 18, 'Hose Pump', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(60, 30, 2, 18, 'Hose fixation', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(61, 30, 2, 18, 'Foot Control', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(62, 30, 2, 18, 'Surgical Motor', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(63, 30, 2, 18, 'Coolant Hose', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(64, 30, 2, 18, 'Handpiece Tray', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(65, 30, 2, 18, 'Contra Angle Handpiece', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(66, 30, 2, 18, 'Motor Cable', 3, 13, '2020-06-30 06:19:15', '2020-07-13 22:30:43', NULL),
(67, 3, 3, 5, 'Zinnat 500mg', 3, 0, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(68, 31, 3, 5, 'Fluimucil Tablet 600mg 10\'s', 3, 117, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(69, 32, 3, 5, 'Systane Ultra Uni-Dose Eye Drop 30x0.7ml', 3, 26, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(70, 33, 3, 5, 'Tramadol 50 STADA Capsule 50\'s', 3, 26, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(71, 34, 3, 5, 'Probiotic', 3, 26, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(72, 35, 4, 8, 'Satin Floss', 3, 744, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(73, 36, 4, 8, 'Interdental \nBrush XXS', 3, 156, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(74, 36, 4, 8, 'Interdental \nBrush XXXS', 3, 156, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(75, 36, 4, 8, 'Interdental Brush  S', 3, 156, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(76, 36, 4, 8, 'Satin Floss', 3, 36, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(77, 37, 4, 19, 'NBF Gel', 3, 1240, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(78, 37, 4, 19, 'NBF Gel', 3, 40, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(79, 39, 4, 8, 'President Toothpaste', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(80, 40, 4, 8, 'Sentin Toothpaste', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(81, 41, 4, 19, 'Toothpaste ( Whitening )', 3, 780, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(82, 42, 4, 20, 'Melilia Organic Powder', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(83, 108, 4, 19, 'NBF Gel', 3, 20, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(84, 46, 0, 0, 'Scrub Suit ( Top only ) ', 3, 750, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL),
(85, 108, 0, 0, 'Scrub Suit ( Top only ) ', 3, 30, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(86, 47, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(87, 48, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(88, 48, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(89, 48, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(90, 49, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(91, 50, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(92, 49, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(93, 50, 0, 0, 'Scrub Suit ( Top only ) ', 3, 0, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(94, 51, 0, 0, 'Bleaching/Whitening - HOME KIT', 3, 130, '2020-06-30 06:19:16', '2020-07-13 22:30:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

DROP TABLE IF EXISTS `product_purchases`;
CREATE TABLE IF NOT EXISTS `product_purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `shipping_cost` float DEFAULT NULL,
  `inv_date` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `order_qty` varchar(255) DEFAULT NULL,
  `previous_stock` int(11) DEFAULT NULL,
  `price_unit` varchar(255) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `total_price_7_percent` varchar(255) DEFAULT NULL,
  `total_price_7_percent_shipping` varchar(255) DEFAULT NULL,
  `sale_price_cast_markup` varchar(255) DEFAULT NULL,
  `sold_by` varchar(255) DEFAULT NULL,
  `commission` varchar(255) DEFAULT NULL,
  `used_for` text,
  `quantity_signal` int(11) DEFAULT NULL,
  `minimum_order_qty_signal` varchar(255) DEFAULT NULL,
  `next_order_date` varchar(255) DEFAULT NULL,
  `profit_per_unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `product_id`, `shipping_cost`, `inv_date`, `expiry_date`, `order_qty`, `previous_stock`, `price_unit`, `discount`, `total_price_7_percent`, `total_price_7_percent_shipping`, `sale_price_cast_markup`, `sold_by`, `commission`, `used_for`, `quantity_signal`, `minimum_order_qty_signal`, `next_order_date`, `profit_per_unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, '2018-03-10', '2020-04-04', '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(2, 2, NULL, '2016-03-06', '1970-01-01', '20', NULL, '4.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(3, 3, NULL, '2017-10-07', '2020-02-21', '0', NULL, '41.73 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(4, 4, NULL, '2018-03-05', '2020-10-19', '0', NULL, '70.62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(5, 5, NULL, '2018-12-05', '2023-08-30', '38', NULL, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(6, 6, NULL, '2018-12-05', '1970-01-01', '150', NULL, '80.25 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(7, 7, NULL, '2018-02-06', '1970-01-01', '50', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(8, 8, NULL, '2018-02-06', '1970-01-01', '50', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(9, 9, NULL, '2018-12-06', '1970-01-01', '2', NULL, '27.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(10, 10, NULL, '2019-08-08', '2020-12-20', '6', NULL, '84,000.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(11, 11, NULL, '2018-12-07', '2020-09-30', '1', NULL, '118.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(12, 12, NULL, '2018-12-07', '1970-01-01', '2', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(13, 13, NULL, '2018-12-12', '2020-07-04', '5', NULL, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(14, 14, NULL, '2021-01-19', '1970-01-01', '2', NULL, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(15, 15, NULL, '2021-01-19', '2021-01-09', '2', NULL, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(16, 16, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(17, 17, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(18, 18, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(19, 19, NULL, '2025-01-19', '2021-01-04', '500', NULL, '37.45 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(20, 20, NULL, '2019-03-04', '2020-09-20', '22', NULL, '706.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(21, 21, NULL, '2017-07-12', '1970-01-01', '6', NULL, '59.50 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(22, 22, NULL, '1970-01-01', '1970-01-01', '0', NULL, '5.72 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(23, 23, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(24, 24, NULL, '2013-12-18', '1970-01-01', '2', NULL, '90.95 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(25, 25, NULL, '2014-12-18', '2023-02-28', '100', NULL, '32.10 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(26, 26, NULL, '2014-12-18', '2023-03-31', '12', NULL, '101.65 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(27, 27, NULL, '2017-08-18', '1970-01-01', '200', NULL, '107.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(28, 28, NULL, '2018-01-19', '2023-05-31', '1', NULL, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(29, 29, NULL, '2019-02-18', '2020-08-20', '1', NULL, '147.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(30, 30, NULL, '2019-02-19', '2021-11-30', '3', NULL, '99.54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(31, 31, NULL, '2020-12-18', '2020-05-20', '36', NULL, '230.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(32, 32, NULL, '2020-12-18', '2023-01-03', '0', NULL, '100.75 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(33, 33, NULL, '2021-01-19', '2021-06-30', '2', NULL, '96.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(34, 34, NULL, '2025-01-19', '2020-04-20', '100', NULL, '63.13 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(35, 35, NULL, '2025-01-19', '2020-12-20', '180', NULL, '52.64 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(36, 36, NULL, '2025-01-19', '2022-01-04', '100', NULL, '84.53 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(37, 37, NULL, '2025-01-29', '2020-07-23', '2000', NULL, '59.92 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(38, 38, NULL, '2029-12-18', '2020-10-20', '6', NULL, '72.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(39, 39, NULL, '2018-08-08', '2020-02-21', '8', NULL, '73.04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(40, 40, NULL, '2030-01-19', '1970-01-01', '2', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(41, 41, NULL, '2030-01-19', '1970-01-01', '400', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(42, 42, NULL, '2030-01-19', '1970-01-01', '400', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(43, 43, NULL, '2019-01-30', '1970-01-01', '6', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(44, 44, NULL, '2031-12-18', '2020-01-20', '2', NULL, '16.37 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(45, 45, NULL, '2031-12-18', '1970-01-01', '12', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(46, 46, NULL, '2018-12-31', '1970-01-01', '0', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(47, 47, NULL, '2018-12-31', '2020-05-12', '36', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(48, 48, NULL, '2018-12-31', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(49, 49, NULL, '2018-12-31', '1970-01-01', '0', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(50, 50, NULL, '2018-12-31', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(51, 51, NULL, '2018-12-31', '2020-11-21', '2', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(52, 52, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(53, 53, NULL, '1970-01-01', '1970-01-01', '0', NULL, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(54, 54, NULL, '2015-11-18', '1970-01-01', '0', NULL, '480.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(55, 55, NULL, '2019-03-19', '1970-01-01', '1', NULL, '34.24 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(56, 56, NULL, '2019-12-18', '1970-01-01', '0', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(57, 57, NULL, '2029-07-19', '1970-01-01', '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(58, 58, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(59, 59, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(60, 60, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(61, 61, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(62, 62, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(63, 63, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(64, 64, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(65, 65, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(66, 66, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(67, 67, NULL, '2017-10-07', '2020-02-21', '0', NULL, '41.22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:15', '2020-06-30 06:19:15', NULL),
(68, 68, NULL, '2019-02-08', '2020-06-21', '9', NULL, '13.30 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(69, 69, NULL, '2019-02-08', '2020-07-20', '2', NULL, '20.97 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(70, 70, NULL, '2019-02-08', '2020-12-21', '2', NULL, '40.77 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(71, 71, NULL, '1970-01-01', '2020-01-06', '2', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(72, 72, NULL, '2018-08-10', '1970-01-01', '24', NULL, '117.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(73, 73, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(74, 74, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(75, 75, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(76, 76, NULL, '2019-09-01', '1970-01-01', '36', NULL, '150.12 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(77, 77, NULL, '2019-03-05', '2020-05-21', '40', NULL, '254.55 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(78, 78, NULL, '2019-08-07', '2020-03-21', '40', NULL, '255.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(79, 79, NULL, '1970-01-01', '1970-01-01', '0', NULL, '134.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(80, 80, NULL, '2019-08-07', '2019-12-01', '0', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(81, 81, NULL, '2013-12-18', '2021-09-30', '60', NULL, '225.34 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(82, 82, NULL, '2021-08-18', '1970-01-01', '0', NULL, '82.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(83, 83, NULL, '2029-12-18', '2020-01-12', '20', NULL, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(84, 84, NULL, '2027-03-19', '1970-01-01', '30', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(85, 85, NULL, '2027-03-19', '1970-01-01', '30', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(86, 86, NULL, '1970-01-01', '1970-01-01', '0', NULL, '209.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(87, 87, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(88, 88, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(89, 89, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(90, 90, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(91, 91, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(92, 92, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(93, 93, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(94, 94, NULL, '1970-01-01', '2020-01-31', '10', NULL, '85.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-30 06:19:16', '2020-06-30 06:19:16', NULL),
(95, 1, NULL, '2018-03-10', '2020-04-04', '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:56:33', '2020-07-05 22:56:33', NULL),
(96, 1, NULL, '2018-03-10', '2020-04-04', '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:56:41', '2020-07-05 22:56:41', NULL),
(97, 1, NULL, '2018-03-10', '2020-04-04', '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(98, 2, NULL, '2016-03-06', '1970-01-01', '20', NULL, '4.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(99, 3, NULL, '2017-10-07', '2020-02-21', '0', NULL, '41.73 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(100, 4, NULL, '2018-03-05', '2020-10-19', '0', NULL, '70.62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(101, 5, NULL, '2018-12-05', '2023-08-30', '38', NULL, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(102, 6, NULL, '2018-12-05', '1970-01-01', '150', NULL, '80.25 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(103, 7, NULL, '2018-02-06', '1970-01-01', '50', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(104, 8, NULL, '2018-02-06', '1970-01-01', '50', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(105, 9, NULL, '2018-12-06', '1970-01-01', '2', NULL, '27.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(106, 10, NULL, '2019-08-08', '2020-12-20', '6', NULL, '84,000.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:24', '2020-07-05 22:57:24', NULL),
(107, 11, NULL, '2018-12-07', '2020-09-30', '1', NULL, '118.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(108, 12, NULL, '2018-12-07', '1970-01-01', '2', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(109, 13, NULL, '2018-12-12', '2020-07-04', '5', NULL, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(110, 14, NULL, '2021-01-19', '1970-01-01', '2', NULL, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(111, 15, NULL, '2021-01-19', '2021-01-09', '2', NULL, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(112, 16, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(113, 17, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(114, 18, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(115, 19, NULL, '2025-01-19', '2021-01-04', '500', NULL, '37.45 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(116, 4, NULL, '2019-03-04', '2020-09-20', '22', NULL, '706.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(117, 21, NULL, '2017-07-12', '1970-01-01', '6', NULL, '59.50 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(118, 22, NULL, '1970-01-01', '1970-01-01', '0', NULL, '5.72 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(119, 23, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(120, 24, NULL, '2013-12-18', '1970-01-01', '2', NULL, '90.95 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(121, 25, NULL, '2014-12-18', '2023-02-28', '100', NULL, '32.10 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(122, 26, NULL, '2014-12-18', '2023-03-31', '12', NULL, '101.65 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(123, 6, NULL, '2017-08-18', '1970-01-01', '200', NULL, '107.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(124, 28, NULL, '2018-01-19', '2023-05-31', '1', NULL, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(125, 29, NULL, '2019-02-18', '2020-08-20', '1', NULL, '147.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(126, 30, NULL, '2019-02-19', '2021-11-30', '3', NULL, '99.54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(127, 31, NULL, '2020-12-18', '2020-05-20', '36', NULL, '230.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(128, 32, NULL, '2020-12-18', '2023-01-03', '0', NULL, '100.75 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(129, 33, NULL, '2021-01-19', '2021-06-30', '2', NULL, '96.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(130, 34, NULL, '2025-01-19', '2020-04-20', '100', NULL, '63.13 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(131, 35, NULL, '2025-01-19', '2020-12-20', '180', NULL, '52.64 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(132, 36, NULL, '2025-01-19', '2022-01-04', '100', NULL, '84.53 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(133, 37, NULL, '2025-01-29', '2020-07-23', '2000', NULL, '59.92 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(134, 38, NULL, '2029-12-18', '2020-10-20', '6', NULL, '72.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(135, 39, NULL, '2018-08-08', '2020-02-21', '8', NULL, '73.04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(136, 40, NULL, '2030-01-19', '1970-01-01', '2', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(137, 41, NULL, '2030-01-19', '1970-01-01', '400', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(138, 42, NULL, '2030-01-19', '1970-01-01', '400', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(139, 43, NULL, '2019-01-30', '1970-01-01', '6', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(140, 44, NULL, '2031-12-18', '2020-01-20', '2', NULL, '16.37 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(141, 45, NULL, '2031-12-18', '1970-01-01', '12', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(142, 46, NULL, '2018-12-31', '1970-01-01', '0', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(143, 47, NULL, '2018-12-31', '2020-05-12', '36', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(144, 48, NULL, '2018-12-31', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(145, 49, NULL, '2018-12-31', '1970-01-01', '0', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(146, 50, NULL, '2018-12-31', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(147, 51, NULL, '2018-12-31', '2020-11-21', '2', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(148, 52, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(149, 52, NULL, '1970-01-01', '1970-01-01', '0', NULL, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(150, 54, NULL, '2015-11-18', '1970-01-01', '0', NULL, '480.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(151, 55, NULL, '2019-03-19', '1970-01-01', '1', NULL, '34.24 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(152, 56, NULL, '2019-12-18', '1970-01-01', '0', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(153, 57, NULL, '2029-07-19', '1970-01-01', '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(154, 58, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(155, 59, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(156, 60, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(157, 61, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(158, 62, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(159, 63, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(160, 64, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(161, 65, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(162, 66, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(163, 3, NULL, '2017-10-07', '2020-02-21', '0', NULL, '41.22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(164, 68, NULL, '2019-02-08', '2020-06-21', '9', NULL, '13.30 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(165, 69, NULL, '2019-02-08', '2020-07-20', '2', NULL, '20.97 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(166, 70, NULL, '2019-02-08', '2020-12-21', '2', NULL, '40.77 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(167, 71, NULL, '1970-01-01', '2020-01-06', '2', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(168, 72, NULL, '2018-08-10', '1970-01-01', '24', NULL, '117.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(169, 73, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(170, 74, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(171, 75, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(172, 72, NULL, '2019-09-01', '1970-01-01', '36', NULL, '150.12 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(173, 77, NULL, '2019-03-05', '2020-05-21', '40', NULL, '254.55 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(174, 77, NULL, '2019-08-07', '2020-03-21', '40', NULL, '255.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(175, 79, NULL, '1970-01-01', '1970-01-01', '0', NULL, '134.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(176, 80, NULL, '2019-08-07', '2019-12-01', '0', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(177, 81, NULL, '2013-12-18', '2021-09-30', '60', NULL, '225.34 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(178, 82, NULL, '2021-08-18', '1970-01-01', '0', NULL, '82.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(179, 77, NULL, '2029-12-18', '2020-01-12', '20', NULL, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(180, 84, NULL, '2027-03-19', '1970-01-01', '30', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(181, 84, NULL, '2027-03-19', '1970-01-01', '30', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(182, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '209.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(183, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(184, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(185, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(186, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(187, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(188, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(189, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(190, 94, NULL, '1970-01-01', '2020-01-31', '10', NULL, '85.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-05 22:57:25', '2020-07-05 22:57:25', NULL),
(191, 1, 0, '2018-03-10', '2020-04-04', '1', NULL, '150', 0, '160.50', NULL, '160.50', NULL, '0', NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:45', '2020-07-10 00:37:57', NULL),
(192, 2, NULL, '2016-03-06', '1970-01-01', '20', NULL, '4.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:45', '2020-07-06 11:13:45', NULL),
(193, 3, NULL, '2017-10-07', '2020-02-21', '0', NULL, '41.73 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(194, 4, NULL, '2018-03-05', '2020-10-19', '0', NULL, '70.62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(195, 5, NULL, '2018-12-05', '2023-08-30', '38', NULL, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(196, 6, NULL, '2018-12-05', '1970-01-01', '150', NULL, '80.25 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(197, 7, NULL, '2018-02-06', '1970-01-01', '50', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(198, 8, NULL, '2018-02-06', '1970-01-01', '50', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(199, 9, NULL, '2018-12-06', '1970-01-01', '2', NULL, '27.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(200, 10, NULL, '2019-08-08', '2020-12-20', '6', NULL, '84,000.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(201, 11, NULL, '2018-12-07', '2020-09-30', '1', NULL, '118.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(202, 12, NULL, '2018-12-07', '1970-01-01', '2', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(203, 13, NULL, '2018-12-12', '2020-07-04', '5', NULL, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(204, 14, NULL, '2021-01-19', '1970-01-01', '2', NULL, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(205, 15, NULL, '2021-01-19', '2021-01-09', '2', NULL, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(206, 16, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(207, 17, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(208, 18, NULL, '2021-01-19', '1970-01-01', '1', NULL, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(209, 19, NULL, '2025-01-19', '2021-01-04', '500', NULL, '37.45 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(210, 4, NULL, '2019-03-04', '2020-09-20', '22', NULL, '706.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(211, 21, NULL, '2017-07-12', '1970-01-01', '6', NULL, '59.50 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(212, 22, NULL, '1970-01-01', '1970-01-01', '0', NULL, '5.72 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(213, 23, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(214, 24, NULL, '2013-12-18', '1970-01-01', '2', NULL, '90.95 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(215, 25, NULL, '2014-12-18', '2023-02-28', '100', NULL, '32.10 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:46', '2020-07-06 11:13:46', NULL),
(216, 26, NULL, '2014-12-18', '2023-03-31', '12', NULL, '101.65 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(217, 6, NULL, '2017-08-18', '1970-01-01', '200', NULL, '107.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(218, 28, NULL, '2018-01-19', '2023-05-31', '1', NULL, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(219, 29, NULL, '2019-02-18', '2020-08-20', '1', NULL, '147.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(220, 30, NULL, '2019-02-19', '2021-11-30', '3', NULL, '99.54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(221, 31, NULL, '2020-12-18', '2020-05-20', '36', NULL, '230.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(222, 32, NULL, '2020-12-18', '2023-01-03', '0', NULL, '100.75 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(223, 33, NULL, '2021-01-19', '2021-06-30', '2', NULL, '96.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(224, 34, NULL, '2025-01-19', '2020-04-20', '100', NULL, '63.13 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(225, 35, NULL, '2025-01-19', '2020-12-20', '180', NULL, '52.64 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(226, 36, NULL, '2025-01-19', '2022-01-04', '100', NULL, '84.53 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(227, 37, NULL, '2025-01-29', '2020-07-23', '2000', NULL, '59.92 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(228, 38, NULL, '2029-12-18', '2020-10-20', '6', NULL, '72.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(229, 39, NULL, '2018-08-08', '2020-02-21', '8', NULL, '73.04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(230, 40, NULL, '2030-01-19', '1970-01-01', '2', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(231, 41, NULL, '2030-01-19', '1970-01-01', '400', NULL, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(232, 42, NULL, '2030-01-19', '1970-01-01', '400', NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(233, 43, NULL, '2019-01-30', '1970-01-01', '6', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(234, 44, NULL, '2031-12-18', '2020-01-20', '2', NULL, '16.37 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(235, 45, NULL, '2031-12-18', '1970-01-01', '12', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(236, 46, NULL, '2018-12-31', '1970-01-01', '0', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(237, 47, NULL, '2018-12-31', '2020-05-12', '36', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(238, 48, NULL, '2018-12-31', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(239, 49, NULL, '2018-12-31', '1970-01-01', '0', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:47', '2020-07-06 11:13:47', NULL),
(240, 50, NULL, '2018-12-31', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(241, 51, NULL, '2018-12-31', '2020-11-21', '2', NULL, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(242, 52, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(243, 52, NULL, '1970-01-01', '1970-01-01', '0', NULL, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(244, 54, NULL, '2015-11-18', '1970-01-01', '0', NULL, '480.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(245, 55, NULL, '2019-03-19', '1970-01-01', '1', NULL, '34.24 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(246, 56, NULL, '2019-12-18', '1970-01-01', '0', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(247, 57, NULL, '2029-07-19', '1970-01-01', '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(248, 58, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(249, 59, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(250, 60, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(251, 61, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(252, 62, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(253, 63, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(254, 64, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(255, 65, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(256, 66, NULL, '2029-07-19', '1970-01-01', '1', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(257, 3, NULL, '2017-10-07', '2020-02-21', '0', NULL, '41.22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(258, 68, NULL, '2019-02-08', '2020-06-21', '9', NULL, '13.30 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(259, 69, NULL, '2019-02-08', '2020-07-20', '2', NULL, '20.97 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(260, 70, NULL, '2019-02-08', '2020-12-21', '2', NULL, '40.77 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(261, 71, NULL, '1970-01-01', '2020-01-06', '2', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(262, 72, NULL, '2018-08-10', '1970-01-01', '24', NULL, '117.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(263, 73, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(264, 74, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(265, 75, NULL, '2019-09-01', '1970-01-01', '12', NULL, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(266, 72, NULL, '2019-09-01', '1970-01-01', '36', NULL, '150.12 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(267, 77, NULL, '2019-03-05', '2020-05-21', '40', NULL, '254.55 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(268, 77, NULL, '2019-08-07', '2020-03-21', '40', NULL, '255.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:48', '2020-07-06 11:13:48', NULL),
(269, 79, NULL, '1970-01-01', '1970-01-01', '0', NULL, '134.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(270, 80, NULL, '2019-08-07', '2019-12-01', '0', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(271, 81, 0, '2013-12-18', '2021-09-30', '60', NULL, '225', 0, '240.75', NULL, '240.75', NULL, '0', NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-10 00:31:38', NULL),
(272, 82, NULL, '2021-08-18', '1970-01-01', '0', NULL, '82.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(273, 77, NULL, '2029-12-18', '2020-01-12', '20', NULL, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(274, 84, NULL, '2027-03-19', '1970-01-01', '30', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(275, 84, NULL, '2027-03-19', '1970-01-01', '30', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL);
INSERT INTO `product_purchases` (`id`, `product_id`, `shipping_cost`, `inv_date`, `expiry_date`, `order_qty`, `previous_stock`, `price_unit`, `discount`, `total_price_7_percent`, `total_price_7_percent_shipping`, `sale_price_cast_markup`, `sold_by`, `commission`, `used_for`, `quantity_signal`, `minimum_order_qty_signal`, `next_order_date`, `profit_per_unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(276, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '209.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(277, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(278, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(279, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(280, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(281, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(282, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(283, 84, NULL, '1970-01-01', '1970-01-01', '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(284, 94, NULL, '1970-01-01', '2020-01-31', '10', NULL, '85.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 11:13:49', '2020-07-06 11:13:49', NULL),
(285, 1, NULL, '2018-03-10', '2020-04-04', '1', 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(286, 2, NULL, '2016-03-06', '1970-01-01', '20', 240, '4.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(287, 3, NULL, '2017-10-07', '2020-02-21', '0', 0, '41.73 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(288, 4, NULL, '2018-03-05', '2020-10-19', '0', 242, '70.62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(289, 5, NULL, '2018-12-05', '2023-08-30', '38', 456, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(290, 6, NULL, '2018-12-05', '1970-01-01', '150', 4000, '80.25 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(291, 7, NULL, '2018-02-06', '1970-01-01', '50', 600, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(292, 8, NULL, '2018-02-06', '1970-01-01', '50', 596, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(293, 9, NULL, '2018-12-06', '1970-01-01', '2', 24, '27.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(294, 10, NULL, '2019-08-08', '2020-12-20', '6', 72, '84,000.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(295, 11, NULL, '2018-12-07', '2020-09-30', '1', 12, '118.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(296, 12, NULL, '2018-12-07', '1970-01-01', '2', 24, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(297, 13, NULL, '2018-12-12', '2020-07-04', '5', 60, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(298, 14, NULL, '2021-01-19', '1970-01-01', '2', 20, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(299, 15, NULL, '2021-01-19', '2021-01-09', '2', 24, '77.04 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(300, 16, NULL, '2021-01-19', '1970-01-01', '1', 12, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(301, 17, NULL, '2021-01-19', '1970-01-01', '1', 12, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(302, 18, NULL, '2021-01-19', '1970-01-01', '1', 12, '38.52 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(303, 19, NULL, '2025-01-19', '2021-01-04', '500', 6000, '37.45 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(304, 4, NULL, '2019-03-04', '2020-09-20', '22', 242, '706.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(305, 21, NULL, '2017-07-12', '1970-01-01', '6', 72, '59.50 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(306, 22, NULL, '1970-01-01', '1970-01-01', '0', 0, '5.72 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(307, 23, NULL, '1970-01-01', '1970-01-01', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(308, 24, NULL, '2013-12-18', '1970-01-01', '2', 24, '90.95 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(309, 25, NULL, '2014-12-18', '2023-02-28', '100', 1200, '32.10 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(310, 26, NULL, '2014-12-18', '2023-03-31', '12', 144, '101.65 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(311, 6, NULL, '2017-08-18', '1970-01-01', '200', 4150, '107.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(312, 28, NULL, '2018-01-19', '2023-05-31', '1', 12, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(313, 29, NULL, '2019-02-18', '2020-08-20', '1', 12, '147.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(314, 30, NULL, '2019-02-19', '2021-11-30', '3', 36, '99.54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(315, 31, NULL, '2020-12-18', '2020-05-20', '36', 432, '230.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(316, 32, NULL, '2020-12-18', '2023-01-03', '0', 0, '100.75 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(317, 33, NULL, '2021-01-19', '2021-06-30', '2', 24, '96.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(318, 34, NULL, '2025-01-19', '2020-04-20', '100', 1200, '63.13 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(319, 35, NULL, '2025-01-19', '2020-12-20', '180', 2160, '52.64 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(320, 36, NULL, '2025-01-19', '2022-01-04', '100', 1200, '84.53 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(321, 37, NULL, '2025-01-29', '2020-07-23', '2000', 24000, '59.92 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(322, 38, NULL, '2029-12-18', '2020-10-20', '6', 72, '72.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(323, 39, NULL, '2018-08-08', '2020-02-21', '8', 96, '73.04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(324, 40, NULL, '2030-01-19', '1970-01-01', '2', 24, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(325, 41, NULL, '2030-01-19', '1970-01-01', '400', 4800, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(326, 42, NULL, '2030-01-19', '1970-01-01', '400', 4800, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(327, 43, NULL, '2019-01-30', '1970-01-01', '6', 72, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(328, 44, NULL, '2031-12-18', '2020-01-20', '2', 24, '16.37 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(329, 45, NULL, '2031-12-18', '1970-01-01', '12', 144, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(330, 46, NULL, '2018-12-31', '1970-01-01', '0', 0, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(331, 47, NULL, '2018-12-31', '2020-05-12', '36', 432, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(332, 48, NULL, '2018-12-31', '1970-01-01', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(333, 49, NULL, '2018-12-31', '1970-01-01', '0', 0, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(334, 50, NULL, '2018-12-31', '1970-01-01', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(335, 51, NULL, '2018-12-31', '2020-11-21', '2', 24, '#REF!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(336, 52, NULL, '1970-01-01', '1970-01-01', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(337, 52, NULL, '1970-01-01', '1970-01-01', '0', 0, '179.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:42', '2020-07-13 22:30:42', NULL),
(338, 54, NULL, '2015-11-18', '1970-01-01', '0', 0, '480.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(339, 55, NULL, '2019-03-19', '1970-01-01', '1', 12, '34.24 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(340, 56, NULL, '2019-12-18', '1970-01-01', '0', 0, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(341, 57, NULL, '2029-07-19', '1970-01-01', '1', 12, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(342, 58, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(343, 59, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(344, 60, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(345, 61, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(346, 62, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(347, 63, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(348, 64, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(349, 65, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(350, 66, NULL, '2029-07-19', '1970-01-01', '1', 12, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(351, 3, NULL, '2017-10-07', '2020-02-21', '0', 0, '41.22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(352, 68, NULL, '2019-02-08', '2020-06-21', '9', 108, '13.30 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(353, 69, NULL, '2019-02-08', '2020-07-20', '2', 24, '20.97 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(354, 70, NULL, '2019-02-08', '2020-12-21', '2', 24, '40.77 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(355, 71, NULL, '1970-01-01', '2020-01-06', '2', 24, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(356, 72, NULL, '2018-08-10', '1970-01-01', '24', 684, '117.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(357, 73, NULL, '2019-09-01', '1970-01-01', '12', 144, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(358, 74, NULL, '2019-09-01', '1970-01-01', '12', 144, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(359, 75, NULL, '2019-09-01', '1970-01-01', '12', 144, '74.76 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(360, 72, NULL, '2019-09-01', '1970-01-01', '36', 708, '150.12 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(361, 77, NULL, '2019-03-05', '2020-05-21', '40', 1140, '254.55 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(362, 77, NULL, '2019-08-07', '2020-03-21', '40', 1180, '255.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(363, 79, NULL, '1970-01-01', '1970-01-01', '0', 0, '134.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(364, 80, NULL, '2019-08-07', '2019-12-01', '0', 0, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(365, 81, NULL, '2013-12-18', '2021-09-30', '60', 720, '225.34 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(366, 82, NULL, '2021-08-18', '1970-01-01', '0', 0, '82.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(367, 77, NULL, '2029-12-18', '2020-01-12', '20', 1220, '0.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(368, 84, NULL, '2027-03-19', '1970-01-01', '30', 690, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(369, 84, NULL, '2027-03-19', '1970-01-01', '30', 720, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(370, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '209.00 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(371, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(372, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(373, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(374, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(375, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(376, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(377, 84, NULL, '1970-01-01', '1970-01-01', '0', 750, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL),
(378, 94, NULL, '1970-01-01', '2020-01-31', '10', 120, '85.60 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-13 22:30:43', '2020-07-13 22:30:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_id` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `pay_via` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

DROP TABLE IF EXISTS `purchase_order_items`;
CREATE TABLE IF NOT EXISTS `purchase_order_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

DROP TABLE IF EXISTS `referrals`;
CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `reason_of_referral` text,
  `medical_history` text NOT NULL,
  `notes` text NOT NULL,
  `x_rays` varchar(255) NOT NULL,
  `smoker` varchar(255) NOT NULL,
  `medications` text NOT NULL,
  `allergies` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `short_name`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Room1', 'R1', '#1c5fc0', '2017-09-10 10:38:37', '2018-10-05 10:56:55', NULL),
(2, 'Room2.', 'R2.', '#0000ff', '2017-09-10 10:41:28', '2018-03-19 16:36:38', NULL),
(3, 'Cone Beam Consult Room', 'CBCT', '#a95353', '2017-10-13 05:53:29', '2018-09-13 11:03:47', NULL),
(4, 'Walk IN', 'W-n', '#ff9900', '2018-03-19 11:53:04', '2018-03-19 16:53:04', NULL),
(5, 'Presentation', 'presentation', '#0c343d', '2018-04-09 09:13:03', '2018-04-09 14:13:03', NULL),
(6, 'Scan', 'Scan', '#ff00ff', '2018-04-09 09:13:20', '2018-04-09 14:13:20', NULL),
(7, 'Test', 'test', '#caa423', '2018-04-11 11:51:51', '2018-04-11 16:51:59', '2018-04-11 16:51:59'),
(8, 'Room3', 'R-3', '#863636', '2018-10-15 04:52:10', '2018-10-15 09:52:10', NULL),
(9, 'Room4', 'Room4', '#ffed00', '2018-10-15 04:52:26', '2019-04-24 03:44:07', NULL),
(10, 'Room5', 'Room5', '#f00', '2018-10-15 04:52:39', '2019-05-09 09:19:23', '2019-05-09 09:19:23'),
(11, 'Room7', 'Room7', '#f00', '2018-10-15 04:52:53', '2019-05-09 09:19:16', '2019-05-09 09:19:16'),
(12, 'Room6', 'Room6', '#f00', '2018-10-15 04:53:12', '2019-05-09 09:19:09', '2019-05-09 09:19:09'),
(13, 'Room9', 'Room9', '#f00', '2018-10-15 04:53:31', '2019-05-09 09:18:49', '2019-05-09 09:18:49'),
(14, 'Room10', 'Room10', '#f00', '2018-10-15 04:53:46', '2019-05-09 09:18:43', '2019-05-09 09:18:43'),
(15, 'Room1111', 'Room111144', '#f00', '2019-04-23 11:42:18', '2019-04-24 03:53:32', '2019-04-24 03:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `save_items`
--

DROP TABLE IF EXISTS `save_items`;
CREATE TABLE IF NOT EXISTS `save_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_doctors`
--

DROP TABLE IF EXISTS `service_doctors`;
CREATE TABLE IF NOT EXISTS `service_doctors` (
  `doctor_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session_descriptions`
--

DROP TABLE IF EXISTS `session_descriptions`;
CREATE TABLE IF NOT EXISTS `session_descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_descriptions`
--

INSERT INTO `session_descriptions` (`id`, `session_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 12, 'ccc', '2019-01-16 12:15:03', '2019-01-16 12:15:03', NULL),
(3, 9, 'eeeedasefw', '2019-01-05 09:59:04', '2019-01-05 09:59:04', NULL),
(4, 10, 'phir youn huwa', '2019-01-05 09:59:37', '2019-01-05 09:59:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session_items`
--

DROP TABLE IF EXISTS `session_items`;
CREATE TABLE IF NOT EXISTS `session_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `appointment_session_id` int(11) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_price` varchar(50) DEFAULT NULL,
  `item_discount` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_items`
--

INSERT INTO `session_items` (`id`, `patient_id`, `product_id`, `appointment_id`, `appointment_session_id`, `item_quantity`, `item_price`, `item_discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(44, 37, 14, 4, 5, 2, '77.04 ', '30', '2020-07-10 01:59:58', '2020-07-10 01:59:58', NULL),
(16, 37, 1, 4, 1, 1, '120', '0', '2020-06-26 22:30:28', '2020-04-26 22:30:28', NULL),
(17, 37, 39, 4, 1, 1, '73', '0', '2020-06-24 19:00:00', '2020-04-26 22:30:28', NULL),
(24, 37, 7, 3, 2, 1, '50', '0', '2020-06-23 23:01:21', '2020-04-26 23:01:21', NULL),
(20, 37, 79, 4, 3, 1, '134', '0', '2020-06-23 22:33:45', '2020-04-26 22:33:45', NULL),
(28, 37, 16, 4, 6, 1, '38.52 ', '0', '2020-06-22 23:49:32', '2020-05-11 23:49:32', NULL),
(27, 37, 14, 4, 6, 1, '77.04 ', '0', '2020-06-21 19:00:00', '2020-05-11 23:49:32', NULL),
(42, 37, 1, 4, 5, 2, '150', '10', '2020-07-10 01:59:58', '2020-07-10 01:59:58', NULL),
(32, 38, 79, 5, 7, 1, '140', '10', '2020-06-20 23:57:11', '2020-06-18 23:57:11', NULL),
(43, 37, 8, 4, 5, 2, '50', '20', '2020-07-10 01:59:58', '2020-07-10 01:59:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `salutation` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_code` varchar(12) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text,
  `gender` varchar(20) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `id_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `salutation`, `date_of_birth`, `first_name`, `last_name`, `email`, `phone_code`, `contact_number`, `address`, `gender`, `zip_code`, `designation`, `profile_picture`, `created_at`, `updated_at`, `deleted_at`, `state`, `city`, `country`, `nationality`, `start_date`, `end_date`, `id_no`) VALUES
(1, 35, 'Mrs', '2015-02-01', 'Sofia.', 'ahmad', 'sofia_shs@hotmail.com', NULL, '3459635387', NULL, 'Female', '22860', NULL, 'image_1541522608_1.png', '2018-04-22 02:12:38', '2019-11-06 06:56:11', NULL, NULL, 'Haripur', NULL, 'Pakistan', '2018-10-22', '2018-10-28', '2444234'),
(4, 43, 'Mr', '2018-07-30', 'Mujtaba', 'ahmad', NULL, '93', '+12345633', 'Test', 'Male', '12345', 'Head Nurse', NULL, '2018-07-06 11:12:12', '2018-10-15 05:31:47', '2018-10-15 05:31:47', NULL, 'Test', NULL, NULL, NULL, NULL, NULL),
(3, 37, NULL, NULL, 'Mujtaba', 'Ahmad', NULL, NULL, '+123456', 'Ghazi, Haripur, Pakistan', 'Male', '22860', NULL, NULL, '2018-04-28 09:58:18', '2018-05-06 04:16:12', '2018-05-06 04:16:12', 'North-West Frontier', 'Ghazi', NULL, 'Pakistan', NULL, NULL, NULL),
(5, 58, 'Mr', '1985-10-20', 'Mujtabaa', 'ahmada', 'mujtabaahmad1985@gmail.com.pk', '681', '+967343453453454888', 'Mohet SectorTehsil Ghazis', 'Male', NULL, 'Software Engineers', 'image_1541518662_5.png', '2018-10-14 01:57:45', '2018-11-06 15:37:42', NULL, 'sss', 'Haripurs', NULL, 'Palau', '2018-11-06', '2018-11-28', '123459877'),
(6, 59, 'Mr', '1970-01-01', 'Mujtaba', 'ahmad', 'mujtabaahmad19805@gmail.com', NULL, '34596353870', 'Mohet Sector\r\nTehsil Ghazi', 'Male', '22860', NULL, NULL, '2018-11-05 09:14:47', '2018-11-05 14:14:47', NULL, 'None (International)', 'Haripur', NULL, 'Pakistan', NULL, NULL, NULL),
(7, 60, 'Mr', '1990-11-18', 'Mujtaba', 'ahmad', 'mujtabaahmad198055@gmail.com', NULL, '345963538705', 'Mohet Sector\r\nTehsil Ghazi', 'Male', '22860', NULL, NULL, '2018-11-05 09:15:10', '2018-11-05 14:17:44', NULL, 'None (International)', 'Haripur', NULL, 'Pakistan', NULL, NULL, NULL),
(8, 61, 'sdfsdf', NULL, 'asdfddfas', 'sdfsdf', 'sdf@dasf.dfh', '93', '+93234234324', NULL, 'Male', NULL, NULL, NULL, '2018-11-05 09:52:34', '2018-11-05 14:52:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 62, 'Mr', '2013-06-01', 'Mujtaba', 'ahmad', 'mujtabaahmad1985ddd@gmail.com', NULL, '34596353872222', NULL, 'Male', '22860', NULL, NULL, '2018-11-05 10:25:02', '2019-11-06 13:49:06', NULL, 'None (International)', 'Haripur', NULL, 'Pakistan', NULL, NULL, NULL),
(10, 63, 'asdf', NULL, 'a', 'sd', 'mujtabaahmad1985ssssss@gmail.com', NULL, '3459635387333', 'Mohet Sector\r\nTehsil Ghazi', 'Male', '22860', NULL, NULL, '2018-11-05 10:25:54', '2018-11-05 15:25:54', NULL, 'None (International)', 'Haripur', NULL, 'Pakistan', NULL, NULL, NULL),
(11, 161, 'Mr', '2014-01-01', 'Mujtaba', 'ahmad', 'mujtabaahmad1985443444@gmail.com', '358', '+35844444', NULL, NULL, NULL, NULL, NULL, '2019-05-11 11:07:38', '2019-05-11 16:07:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 162, 'Mr', '2014-01-01', 'Mujtaba', 'ahmad', 'mujtabaahmad1985443444e@gmail.com', '358', '+358444443', NULL, NULL, NULL, NULL, NULL, '2019-05-11 11:08:18', '2019-05-11 16:08:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 163, 'Mr', '2014-01-01', 'Mujtaba', 'ahmad', 'mujtabaahmad19854433444e@gmail.com', '358', '+3584444433', NULL, NULL, NULL, NULL, NULL, '2019-05-11 11:08:34', '2019-05-11 16:08:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tooth_areas`
--

DROP TABLE IF EXISTS `tooth_areas`;
CREATE TABLE IF NOT EXISTS `tooth_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tooth_areas`
--

INSERT INTO `tooth_areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Crown.', '2019-02-25 12:00:02', '2019-06-04 00:35:40'),
(4, 'Gumline', '2019-04-04 09:15:03', '2019-04-04 09:15:03'),
(5, 'Root', '2019-04-04 09:15:10', '2019-04-04 09:15:10'),
(6, 'Enamel', '2019-04-04 09:15:16', '2019-04-04 09:15:16'),
(7, 'Dentin', '2019-04-04 09:15:24', '2019-04-04 09:15:24'),
(8, 'Pulp', '2019-04-04 09:15:33', '2019-04-04 09:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

DROP TABLE IF EXISTS `treatments`;
CREATE TABLE IF NOT EXISTS `treatments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) DEFAULT NULL,
  `appointment_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `treatment_done` text,
  `complaint` text,
  `finding` text,
  `x_rays` varchar(255) DEFAULT NULL,
  `advice` text,
  `pre_med` text,
  `recall` varchar(255) DEFAULT NULL,
  `medication` text,
  `post_treatment_advice` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_descriptions`
--

DROP TABLE IF EXISTS `treatment_descriptions`;
CREATE TABLE IF NOT EXISTS `treatment_descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `element_key` varchar(255) DEFAULT NULL,
  `value` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_dones`
--

DROP TABLE IF EXISTS `treatment_dones`;
CREATE TABLE IF NOT EXISTS `treatment_dones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `treatment_description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_dones`
--

INSERT INTO `treatment_dones` (`id`, `patient_id`, `appointment_id`, `treatment_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 37, 3, 'Test description', '2020-03-13 06:17:13', '2020-03-16 02:45:37', '2020-03-16 02:45:37'),
(2, 37, 3, 'Test description1', '2020-03-13 06:22:40', '2020-03-16 02:46:32', '2020-03-16 02:46:32'),
(3, 37, 3, 'Test description2', '2020-03-13 06:23:01', '2020-03-16 02:46:29', '2020-03-16 02:46:29'),
(4, 37, 3, 'sum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', '2020-03-16 00:31:54', '2020-03-16 00:31:54', NULL),
(5, 37, 3, 'Sum Has Been The Industry\'s Standard Dummy Text Ever Since The 1500s, When An Unknown Printer Took A Galley Of Type And Scrambled It To Make A Type Specimen Book. It Has Survived Not Only Five Centuries, But Also The Leap Into Electronic Typesetting, Remaining Essentially Unchanged. It Was Popularised In The 1960s With The Release Of Let', '2020-03-16 00:43:16', '2020-03-16 02:49:30', '2020-03-16 02:49:30'),
(6, 37, 3, 'ee', '2020-03-16 00:44:24', '2020-03-16 02:46:19', '2020-03-16 02:46:19'),
(7, 37, 3, 'zx', '2020-03-16 00:44:53', '2020-03-16 02:46:22', '2020-03-16 02:46:22'),
(8, 37, 3, 'sdsdd', '2020-03-16 00:45:42', '2020-03-16 02:46:24', '2020-03-16 02:46:24'),
(9, 37, 3, 'sddswee', '2020-03-16 00:47:08', '2020-03-16 02:46:26', '2020-03-16 02:46:26'),
(10, 37, 3, 'red alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It use', '2020-03-16 01:00:05', '2020-03-16 01:00:05', NULL),
(11, 37, 2, 'sdssds', '2020-03-16 01:05:02', '2020-03-16 01:05:02', NULL),
(12, 37, 2, 'sdddddssss', '2020-03-16 01:15:35', '2020-03-16 01:15:35', NULL),
(13, 37, 2, '55555555555', '2020-03-16 01:23:59', '2020-03-16 01:23:59', NULL),
(14, 37, 1, 'dddddddddddddddddd', '2020-03-16 01:24:06', '2020-03-16 01:24:06', NULL),
(15, 37, 3, 'terst', '2020-03-16 02:49:34', '2020-03-16 02:51:15', '2020-03-16 02:51:15'),
(16, 37, 3, 'ssssss', '2020-03-16 02:51:09', '2020-03-16 02:51:12', '2020-03-16 02:51:12'),
(17, 37, 4, 'ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining', '2020-04-20 23:30:09', '2020-04-20 23:30:09', NULL),
(18, 38, 5, 'test', '2020-06-18 23:55:25', '2020-06-18 23:55:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_products`
--

DROP TABLE IF EXISTS `treatment_products`;
CREATE TABLE IF NOT EXISTS `treatment_products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `discount` float DEFAULT '0',
  `quantity` int(11) DEFAULT '1',
  `original_price` float DEFAULT NULL,
  `price_charged` float DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` enum('administrator','subadmin','staff','doctor','patient','receptionist','finance') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approved','suspended','deleted','pending') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secure_link_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=284 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `status`, `password`, `remember_token`, `secure_link_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin', 'admin@idcsg.com', 'approved', '$2y$10$2/0J3Gr1cDZf/Z4Gt6D9jui4O4G8pMCTp6w7enOc79UT9qsKh.O0K', 'Dd4QRAvIg5fgSqGSn2knX1QwxDTV802KNy3sscUmrBK8QVZ2ofJj5AWMAljg', NULL, '2017-08-23 10:15:34', '2020-12-07 00:47:03'),
(8, 'doctor', 'mujtaba-ahmad', 'mujtabaahmad1985@gmail.com', 'approved', '$2y$10$rFtSg/SFpI/7Efzw6C9Meu1pcAPw1kPcVxLcf/uBJCl4MGY6E6u0G', 'dSRdzJJfDlg9pD4xB9oyIINgkD4Ala1Ds7fzoBRKeEycqPAyJhrtm1pl4Hh6', NULL, '2017-09-10 05:15:58', '2020-06-04 12:16:02'),
(7, 'doctor', 'mujtaba-ahmad', 'mujtaba@yahoo.com', 'approved', '$2y$10$RrQ0o4eFTV/wkBzG8BuGAullC3edA2YILwAEbyQOuYFou3h5ck9yq', 'YKbVLgysEvxFOcoMkI2biJEYLLDsr6ne3CN0qiTWwXQLMsi09RyxK5JDp8Rp', NULL, '2017-09-10 05:14:32', '2020-07-13 01:44:50'),
(9, 'doctor', 'marlar-tun', 'mtun@gmail.com', 'approved', '$2y$10$JzBVlFSXfq64wnCFHCbrguyXvMKh2Lm6AanXoG1XLD9ZvM63Hoo06', NULL, NULL, '2017-09-11 18:29:10', '2017-09-11 18:29:10'),
(10, 'doctor', 'marlar-tun', 'mtunn@gmail.com', 'approved', '$2y$10$lcfCUV21U42DLjJPPfhZNOqWf6xD9jBZodzOHVtbYHs4Bt020n3UC', NULL, NULL, '2017-09-18 09:02:54', '2019-10-26 11:50:03'),
(11, 'doctor', 'lwin-min thu', 'lwinminthu89@gmail.com', 'approved', '$2y$10$0D8D3Sm4.M.BvqrA8FU24OlK69uhWPmFqVG5ehVxTqE8fpAtzUoh.', NULL, NULL, '2017-10-09 11:25:18', '2017-10-09 11:25:18'),
(12, 'doctor', 'dr.soe-nyunt san', 'soenyuntsan@idcsg.com', 'approved', '$2y$10$q7D5jBVXopMgHD0SFeNTUu2lMc9t0oC0N13FOICz2ss9q8UC1m6yK', NULL, NULL, '2018-01-05 08:10:26', '2018-01-05 08:10:26'),
(13, 'patient', 'shamsu huda-s', '25082156', 'approved', '$2y$10$xtgnnbNWSCxDSQfgY0y0kOaeG4ukaPkrnj4pP0wUHTxr6eN7FZfCC', NULL, NULL, '2018-02-28 23:29:54', '2018-02-28 23:29:54'),
(14, 'patient', 'sohail-ahmad', '25082189', 'approved', '$2y$10$QuWs6AIXQgD3jj.YbDWuWOl4xgxnuDt7LhadFPByHIfLKLKVLQd/W', NULL, NULL, '2018-02-28 23:31:15', '2018-02-28 23:31:15'),
(15, 'patient', 'hafsa-mujtaba', '25082190', 'approved', '$2y$10$2Xu3bfDVgURsdNJLyHSy7OxpIKB/hO/CzMIRH/gfdpG1RQknKmTjq', NULL, NULL, '2018-02-28 23:31:52', '2018-02-28 23:31:52'),
(16, 'patient', 'mujtaba-ahmad', '25082191', 'approved', '$2y$10$TsWrBApDO8tlsF.fdyYNRevEn4aUfIVhUXPvXymivTMrAMeU2zK9y', NULL, NULL, '2018-04-13 10:27:25', '2018-04-13 10:27:25'),
(17, 'patient', 'mujtaba-ahmad', '25082192', 'approved', '$2y$10$x0DbPhu4WY5qTglFpMNFAuEyc9G75EcOcoX96i5sxP/46B2dKlM1u', NULL, NULL, '2018-04-13 10:30:26', '2018-04-13 10:30:26'),
(18, 'patient', 'mujtaba-', '25082193', 'approved', '$2y$10$ntPFQs0DfZrfxS9gXh0omOJNHkBZxzKNouqsgSXRo2sLDngh4N3/m', NULL, NULL, '2018-04-13 10:32:59', '2018-04-13 10:32:59'),
(19, 'patient', 'mujtaba-', '25082194', 'approved', '$2y$10$rAWAx.huWZ8TMOZThU66a.KBkio2RRsyo6ulsp80rXfgh3qKl4i4W', NULL, NULL, '2018-04-13 10:38:01', '2018-04-13 10:38:01'),
(20, 'doctor', 'tufail-ijaz', 'tufail.ijaz@gmail.com', 'approved', '$2y$10$8KA0dKhm6YXjdWuVfI56ReRyyUuOk.BiGjr1OogY/WEbH.i5BbwvS', NULL, NULL, '2018-04-18 10:43:27', '2018-04-18 10:43:27'),
(21, 'doctor', 'noma-tech', 'noma@test.com', 'approved', '$2y$10$DGbaEw3sLtifVpU.tIt7HerT5pLNGEUZFF6zqlPYFHgm/HrNiG0qG', NULL, NULL, '2018-04-18 10:52:41', '2018-04-18 10:52:41'),
(35, 'subadmin', 'sofia-hameed-98', 'sofia_shs@hotmail.com', 'approved', '$2y$10$OXusC4D5Wex1aTtuaIXD1.H6zLxBwelG6OaRQDQuJK1p2qkYP6tHK', 'w0S4m9nzUu5jrp1g12s2RNHBNH8LJkV4lF6jZtRP0x8zmxmV8mPmp0aLOkFj', NULL, '2018-04-22 02:12:38', '2019-11-06 02:08:53'),
(37, 'staff', 'mujtaba-ahmad-33', 'mujtabaahmad1985@hotmal.com', 'approved', '$2y$10$x5nUwi.54bnQl34YQFJzLek.Rr31tnpglI5rk4QtilTaohY8s12qG', 'zEadqgqG8FjF3bRsHRrYMq3DC66m6MxuqCGVaWIbhTa9bQIhrY7L7JQXSSR5', NULL, '2018-04-28 09:58:18', '2019-10-30 10:58:29'),
(38, 'patient', 'mujtaba-ahmad', 'mujtaba', NULL, '$2y$10$5xGPGRNpTkb/8eDRoDj19.O1vML1dkRqsh94/Pddbmop6fnIsi3V6', NULL, NULL, '2018-06-11 01:33:55', '2018-06-11 01:33:55'),
(39, 'patient', 'gggg-ssss', 'muji@yaho.com', NULL, '$2y$10$3fbOw/fx6KvUlG6KWdw93eURqmPLWjIktOJQQ7HhNYM6UMCm6RShS', NULL, NULL, '2018-06-11 12:19:45', '2018-06-11 12:19:45'),
(40, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985@gmail.com', NULL, '$2y$10$ebTmt6OGPcICBr32IIpk7OmNtttWCG8erZ2.Yjq3r7SZ94loc6OUC', NULL, NULL, '2018-06-29 23:53:59', '2018-06-29 23:53:59'),
(41, 'staff', 'mujtaba-ahmad-89', 'mujtabaahmad1985@gmail.com', 'approved', '$2y$10$LxISYatOGV8cLX2NrmpNW.COp1ujw28xuXA1LfumCIQeIEKHyHLFm', NULL, NULL, '2018-07-05 12:13:38', '2018-07-05 12:13:38'),
(42, 'staff', 'mujtaba-ahmad-94', 'mujtabaahmad19859999@gmail.com', 'pending', '$2y$10$PPY8qvynNM4g/muFpBrAgejHAe/qGoW1OTGi3tJt3z9RxOMpRLuEC', NULL, NULL, '2018-07-06 11:01:29', '2018-07-06 11:01:29'),
(43, 'staff', 'mujtaba-ahmad-40', 'mujtabaahmad1ds985@gmail.com', 'pending', '$2y$10$5oa3pjxnx2FOJrX/TmUp1OlBBiyZWyOYE/Ivxkad5LK7FIJySeqDi', NULL, NULL, '2018-07-06 11:12:12', '2018-07-06 11:12:12'),
(44, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985@gmail.com', NULL, '$2y$10$yV/zBn14ocxheMALvfkydeVpXaq3Y4zR8Fs/Qo9gIOn19XixcXd8W', NULL, NULL, '2018-07-14 00:05:44', '2018-07-14 00:05:44'),
(45, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-5455@gmail.com', NULL, '$2y$10$LArdASKPP0aj.HNovxP6Y.PZ5ECuF2axH6mv9vwFEocKma50m.rj6', NULL, NULL, '2018-07-14 00:10:46', '2018-07-14 00:10:46'),
(46, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-heatea@gmail.com', NULL, '$2y$10$5wIHhao5J0Pb5PWGzmNsuOf89JQ4jyl7skiz9tfb7FEcaCv9wlpPK', NULL, NULL, '2018-07-14 01:36:48', '2018-07-14 01:36:48'),
(47, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-test@gmail.com', NULL, '$2y$10$QLEn6VhNKZmmwUbgGeHGbupcKLKnSa36ee2LXKRtoDeSgDMupjvGq', NULL, NULL, '2018-07-19 12:08:39', '2018-07-19 12:08:39'),
(48, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-p@gmail.com', NULL, '$2y$10$avO.R3obnnT7cd3OfEMPDeJ6rl0HhVezqgov1OHRqoexzyE739Sg6', NULL, NULL, '2018-07-19 12:30:01', '2018-07-19 12:30:01'),
(49, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985@gmail.com23223', NULL, '$2y$10$ydkthWRQptdQabODo/tmz.4l0UpCBO5lY0UKU.kMHSespCvmpvR4i', NULL, NULL, '2018-07-21 23:57:01', '2018-07-21 23:57:01'),
(50, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985@gmail.comasdfasdf', NULL, '$2y$10$bdvZTXTmjjfhofadSN.vT.xVd89oCMefBGA7hgpCgJwNouEks5Nli', NULL, NULL, '2018-07-23 12:59:11', '2018-07-23 12:59:11'),
(51, 'patient', 'mujtaba sdafadsf-ahmad334443434', 'mujtabaahmad1985@gmail.com33333333', NULL, '$2y$10$9xta0.xlbJ/AzH4RX88x4eTfc0AabUKihfQpDc2SVPTtikLq23YXe', NULL, NULL, '2018-07-23 13:00:16', '2018-07-23 13:00:16'),
(52, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985@gmail.com333333322', NULL, '$2y$10$Q6nblL5JwvPaR4Zhz6TxQeJMCKibm4Cik6wtjCuJrrsnSuPNUjvW2', NULL, NULL, '2018-07-24 11:03:07', '2018-07-24 11:03:07'),
(53, 'patient', 'rt-rt', 'test@test.sd', NULL, '$2y$10$ykHoFCOOUZDS6dO9e.EwLeakMg2mYhrrRrz0.S8hJxpsndUGo4hya', NULL, NULL, '2018-07-26 12:39:22', '2018-07-26 12:39:22'),
(54, 'patient', 'e-e', '+933333333', NULL, '$2y$10$hJnQkZlctnD9/HFsCsdlQ.1vHXQYl7.bNLQCDhGMp37kyMkgrFEL6', NULL, NULL, '2018-08-26 21:56:03', '2018-08-26 21:56:03'),
(55, 'patient', 'ds-sd', '4444444', NULL, '$2y$10$lUzRPDnencrcH23aeRxaiufQdKme1EBocxMN1RWhne8gvTavfVUNm', NULL, NULL, '2018-08-26 21:59:23', '2018-08-26 21:59:23'),
(56, 'patient', '1-1', 'mujtabaahmad1985@gmail.com', NULL, '$2y$10$BZc8FzrkdRDREOoC6aWn9uHDygMdCCQ1dEszHqeh7RS5NASMWtjRy', NULL, NULL, '2018-08-26 23:15:37', '2018-08-26 23:15:37'),
(57, 'patient', 'admin1atidccom', 'mujtabaahmad1985999999999999@gmail.com', 'approved', '$2y$10$fVh3LfVnS6NuTjxvSKmCEOwxdxCh9his9J6nY7igtvnHU6F7kDw5S', NULL, NULL, '2018-08-27 06:51:59', '2018-08-27 06:51:59'),
(58, 'staff', 'mujtaba-ahmad-25', 'mujtabaahmad1985@gmail.com.pk', 'approved', '$2y$10$FT5RYNkBJahUoZjGNwepdOovFfqVpysvx0S6DYs2JlOhk/oIqP4YW', 'sANANfCWUsabZCtrm1RmuERxx8XBrCMDoHR7rSMvKYYmREiOWdkfxppgh537', NULL, '2018-10-14 01:57:45', '2018-11-12 08:48:55'),
(59, 'staff', 'mujtaba-ahmad-86', 'mujtabaahmad19805@gmail.com', 'suspended', '$2y$10$C36mz21HefyTVKYWP4Ahoeu4ID3NzbbSVEkod1TEUjzWu6OJhRgEG', NULL, NULL, '2018-11-05 09:14:47', '2019-04-24 12:23:35'),
(60, 'staff', 'mujtaba-ahmad-53', 'mujtabaahmad198055@gmail.com', 'approved', '$2y$10$/XtrFqy0J9zw16oE12WA2e2XfPEyEB80On98wETChnnn8qZ8j3aJu', NULL, NULL, '2018-11-05 09:15:10', '2018-11-08 09:46:48'),
(61, 'staff', 'asdfddfas-sdfsdf-25', 'sdf@dasf.dfh', 'suspended', '$2y$10$JQ/Q0JyVCt/t/1zlVM/tqulu7lrLTUZrjkV11iFxw.MVvfcB/gfRy', NULL, NULL, '2018-11-05 09:52:34', '2018-11-08 10:47:15'),
(62, 'receptionist', 'mujtaba-ahmad-13', 'mujtabaahmad1985ddd@gmail.com', 'approved', '$2y$10$hhwl5bY2Ei5J12YWFUodN.JuIzsOTlPQuwoGCmSbk00UqpfLmKZlO', NULL, NULL, '2018-11-05 10:25:02', '2019-11-06 08:49:06'),
(63, 'staff', 'a-sd-78', 'mujtabaahmad1985ssssss@gmail.com', 'approved', '$2y$10$qI1RlnDfLBJ3A1SXSY3G6u.dw3DsO9grMsYWFNGzF1SuHcsZcZjaq', NULL, NULL, '2018-11-05 10:25:54', '2018-11-08 09:26:05'),
(64, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-test@gmail.com', NULL, '$2y$10$NgSsJz6qN4q.InO.8CQt0u1O8BT8lsm1irGq2OU7QbWmhMdeYQgXi', NULL, NULL, '2018-12-05 08:45:53', '2018-12-05 08:45:53'),
(65, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-test@gmail.com', NULL, '$2y$10$GV/eMzCKJkdJRP8zEIZ..OqLWDJyznuexYTv5VBRTbvp3QlzUqlye', NULL, NULL, '2018-12-05 08:46:06', '2018-12-05 08:46:06'),
(66, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-test@gmail.com', NULL, '$2y$10$umUQwuOoWlyTuAdimaehF.Cn.TpIdrLALZmkTliQnyvLxD8W1rg92', NULL, NULL, '2018-12-05 08:46:22', '2018-12-05 08:46:22'),
(67, 'patient', 'mujtabaa-ahmadaaaa', 'mujtabaahmadaaaaaa1985@gmail.com', NULL, '$2y$10$ambQBWW8a2BkEEVXEXPYmuAz85zjAHkLcv4RAwoir9DSq35hrE8py', NULL, NULL, '2018-12-18 09:57:51', '2018-12-18 09:57:51'),
(68, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-house@gmail.com', NULL, '$2y$10$J3FoA0w5CO4SAMfGjCbfWedbGoGgqZaZJlYr/MzdiRUqCc4Gw1P7S', NULL, NULL, '2018-12-20 05:31:30', '2018-12-20 05:31:30'),
(69, 'patient', 'qazi-sami', 'qazi.sami@hotmail.com', NULL, '$2y$10$11AeYJv0GrR/PpBLMK0PhuDUNyw76liG6pUvh2yiBz7x7jwzRdltq', NULL, NULL, '2018-12-20 08:33:16', '2018-12-20 08:33:16'),
(70, 'patient', 'qazi-sami', 'qazi.sami@hotmail.com', NULL, '$2y$10$NEVpGIk.u0TSanxc8v88DuG1a1S8XaeYBPdSqy8ulqEOCfSbrq1de', NULL, NULL, '2018-12-20 08:34:26', '2018-12-20 08:34:26'),
(71, 'patient', 'qazi-sami', 'qazi.sami.1@hotmail.com', NULL, '$2y$10$27v3oLMQqU.qvWT6qzQ4cuRqAvvU6g/NM3KbfQg3CNYcWHXid.hJe', NULL, NULL, '2018-12-20 08:43:52', '2018-12-20 08:43:52'),
(72, 'patient', 'qazi-sami', 'qazi.sami.12@hotmail.com', NULL, '$2y$10$uFFtvRFuam6WHfhAER5qEeJo.xBtCBmklaa5eoCQl7GygXPlyOkn6', NULL, NULL, '2018-12-20 08:49:30', '2018-12-20 08:49:30'),
(73, 'patient', '-', '', NULL, '$2y$10$VIilEJv0weYGgs9ZInlHbu6f7vaumpcgKm0dkBfJumwjw/Pxjpwsq', NULL, NULL, '2019-01-07 23:54:37', '2019-01-07 23:54:37'),
(74, 'patient', '-', 'marie.nakahara@gmail.com', NULL, '$2y$10$JYEq99pI79ILCYw3ALDmcOtl9gA83w2Ihn/k0TY0/qzqT.jFcv7B.', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(75, 'patient', '-', 'marie.nakahara@gmail.com', NULL, '$2y$10$stmoT6sAl2kISdHwcqrY0uTwOG4xGdbn8HgG/8Cw/RHYhDY51pqvK', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(76, 'patient', '-', 'marie.nakahara@gmail.com', NULL, '$2y$10$outa3/Z.iG0zcI0rAB7A3u8kpRCuiCdyaaAP82TIjV27sC3cIlDwe', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(77, 'patient', '-', 'khammaymay050@gmail.com', NULL, '$2y$10$IpXERVo/5Ccmnufvd8j1NuwkAkIrqq6g33PyFDu/G5fbVTcOxwGYS', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(78, 'patient', '-', '', NULL, '$2y$10$gyMCHmRwVUtuPkd2w8R8b.p6Lbola661t79Ycg3UICeFuQUAtkxQ.', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(79, 'patient', '-', '', NULL, '$2y$10$2pF4mpSzUvkaUfyFUlYQ..8CKnv7gveziQdiGoM1T2qgmOF.rskgO', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(80, 'patient', '-', '', NULL, '$2y$10$VMl9RwBAWzugigP.7z0xPOHtc.J/pjYfS61HPYW6h90JkA7uW6w22', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(81, 'patient', '-', '', NULL, '$2y$10$8TryunnS9Zp9NBCYSSm7Zuu54QP2SGjnaGqHx51DlBOrCEGFTUbFq', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(82, 'patient', '-', '', NULL, '$2y$10$mGZI/5YvQo6HI67ezPZyber8XRuE/6bSL56B7ygGBWo5mYLeIaYMO', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(83, 'patient', '-', '', NULL, '$2y$10$OfA6PgDPS5rF0hGEfr2r2uguC8J63v8nO7i9GuLsMoUrGFRFyiWg6', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(84, 'patient', '-', '', NULL, '$2y$10$7NaNrANNUr3s8SKz89FHoODvFw350G4ur1GVIuEjiVIj1807mVNmq', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(85, 'patient', '-', '', NULL, '$2y$10$BJdr7tA55zuBkJnzcIIBgOzw3Jt3YS9eYFp9rVjdiukC4lFs/KzTK', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(86, 'patient', '-', '', NULL, '$2y$10$ybexbIggu9aOuH55mOUTReA9Ae0C56iuP6O6mao9TnEf0fFUwtjIi', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(87, 'patient', '-', 'dcutmitchell@gmail.com', NULL, '$2y$10$P2MjvBfdmhrwfO8pwTRvR.WZXDGTMzH0RQtSd7UPT5Ea3J.kWab5a', NULL, NULL, '2019-01-07 23:54:38', '2019-01-07 23:54:38'),
(88, 'patient', '-', 'nnaayy@gmail.com', NULL, '$2y$10$x7DXvXXzySvm7fjmly3H1u6HnispByNFnwlxH4hVHKawqNoXSCr4C', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(89, 'patient', '-', 'smithaunni@gmial.com', NULL, '$2y$10$UQ9KSdleBSAWMsBtsA/dO.xATPimhB7COcgT3g1gE45vRnamRvFPW', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(90, 'patient', '-', '', NULL, '$2y$10$XCXn2mFyCL7o/wnbHGqpWu0uN9TYT/oHjZzQbQsj2D3dqMsQQ9oHK', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(91, 'patient', '-', '', NULL, '$2y$10$U0rSEfVJdyPCPWqqujXZdeUw9tsOMRqwloVqNc7YhbOP55SV3tOQG', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(92, 'patient', '-', '', NULL, '$2y$10$mR636fKviJxHETapRzDKauvY55rr/DShWrM2rDCW8qMfGCpmCCnhu', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(93, 'patient', '-', '', NULL, '$2y$10$kL1nBKqFfkKWQ9f9iUsynew/Z/wsVRw/nCYTat7RON8YTXfcUAdtm', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(94, 'patient', '-', 'dryetun551@gmail.com ', NULL, '$2y$10$k71KMX48xfuAJgBq773lNOng.08YoSGaX1RMEq8zq.ODh6sOYgGTi', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(95, 'patient', '-', '', NULL, '$2y$10$9sl6dsLq64L.RtE3/UWzvuw.0homOTiRDcdntnCWsavMAl4Jj7462', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(96, 'patient', '-', '', NULL, '$2y$10$GKISqx6BbipHyDvWHOG0x.8NGVN45892HvUlYveBMS8FqOdHYZG6G', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(97, 'patient', '-', '', NULL, '$2y$10$gsgHzpD6.7N8T142npsUzen9HqvbD22U11tO/LIpobmXHySl6EOty', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(98, 'patient', '-', 'kzinwinko@gmail.com', NULL, '$2y$10$lnFynQURX.78AoRXMwpOS.vjynv/5WJ9SEpF5Vl0v/XhN2YbijZBe', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(99, 'patient', '-', 'xonwayzi@gmail.com', NULL, '$2y$10$NM0IUfSubdWi8kuUf1NGJ.rsYkhdgZkHBPba8ZqU9ujgVTteOKrc.', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(100, 'patient', '-', '', NULL, '$2y$10$uLGXLdqeEWw.ATM3NdOLauyZS09Fj3HGQywcVIqSvoUHLCyQq62yS', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(101, 'patient', '-', '', NULL, '$2y$10$exbAixTkwx.hV6K/VA5ZXes.bhy5VLrPNeSBHw.xMe7ehi1VKgzYy', NULL, NULL, '2019-01-07 23:54:39', '2019-01-07 23:54:39'),
(102, 'patient', '-', '', NULL, '$2y$10$zGA.ekpfRDvbaHEpWEIGt.9DpewvzFEmN4WN5YfraLMFTEnQliD4.', NULL, NULL, '2019-01-07 23:54:40', '2019-01-07 23:54:40'),
(103, 'patient', '-', 'cgoodill@gmail.com', NULL, '$2y$10$4u2DrQy9xxEE0anZ8kYrM.6y9ZkNXaHfgi.OZ6RtpB5cmhzH.XEe2', NULL, NULL, '2019-01-07 23:54:40', '2019-01-07 23:54:40'),
(104, 'patient', '-', '', NULL, '$2y$10$wEWxG4pbRUaUsNZdD1Mai.bd47EunbmkD18PhAvaxAl/UUyPmGYBu', NULL, NULL, '2019-01-07 23:54:40', '2019-01-07 23:54:40'),
(105, 'patient', '-', '', NULL, '$2y$10$FOTqBkQ1l3h4robGWtU5JebTdVk8o2AJMoqnPBh9TXW0i9UKInFHq', NULL, NULL, '2019-01-07 23:54:40', '2019-01-07 23:54:40'),
(106, 'patient', '-', '', NULL, '$2y$10$VLqc9/clXN1zoeFDxBZ03.h5XNhi3l9xi3dO/lkQHsJIH/qAFdCGy', NULL, NULL, '2019-01-07 23:54:40', '2019-01-07 23:54:40'),
(107, 'patient', '-', '', NULL, '$2y$10$BS8Ar1UlZvd/iH5PsXl5teGRt4Z3Nd0l7EYeNs1Sh5AWDbe.//Zhe', NULL, NULL, '2019-01-07 23:54:40', '2019-01-07 23:54:40'),
(108, 'patient', '-', '', NULL, '$2y$10$Xpg08ZSb/7O7K1XpffW0fejGkvQcccrJXhgYG7nbv1r0DycZRo1z.', NULL, NULL, '2019-01-07 23:54:40', '2019-01-07 23:54:40'),
(109, 'patient', '-', 'minkhine@gmail.com', NULL, '$2y$10$vqp6dTRfHxXLyrTCPVpbRO3M1CiIqkLxLlCtHOib7FuHc49IB967y', NULL, NULL, '2019-01-08 00:08:39', '2019-01-08 00:08:39'),
(110, 'patient', '-', 'nina.jinadasa@gmail.com', NULL, '$2y$10$XjjDJOWOdao2x0WwVb4H9O7iCuTcEFuE8NpnbLzfupvQyVelvRqtm', NULL, NULL, '2019-01-08 00:08:39', '2019-01-08 00:08:39'),
(111, 'patient', '-', 'kyawnyein51@gmail.com', NULL, '$2y$10$SlrNIMyzvKaKVHuttJ.J2.6Sf7W3BzFiPUd1qJRC5ghi0/IP6VUva', NULL, NULL, '2019-01-08 00:08:39', '2019-01-08 00:08:39'),
(112, 'patient', '-', 'kj-ng84@yahoo.com', NULL, '$2y$10$e8MzJkp8XH9ID1x8iW2dm.hg.CwWvxJsFHZHYZK9JX5MWNglzdQtW', NULL, NULL, '2019-01-08 00:08:39', '2019-01-08 00:08:39'),
(113, 'patient', '-', '', NULL, '$2y$10$xFAEmDheIf5vGWsmlwbatuWLsFuied/SDl8hfnlc0qasq7gVTMcgK', NULL, NULL, '2019-01-08 00:08:39', '2019-01-08 00:08:39'),
(114, 'patient', '-', 'jsechoo_gmail.com', NULL, '$2y$10$LvFZIz0eC225CddkSJWE6O8xgsy86ECtHKsCNyRqQYyR0OpOrK03a', NULL, NULL, '2019-01-08 00:08:39', '2019-01-08 00:08:39'),
(115, 'patient', '-', 'quenna.qdo@gmail.com', NULL, '$2y$10$nknmahjG2HUrj33OjHCfUOwwXA4eOywrg7zked2IG9Q0s799sbhv6', NULL, NULL, '2019-01-08 00:08:39', '2019-01-08 00:08:39'),
(116, 'patient', '-', '', NULL, '$2y$10$qv8wyx7bqiWsmhBiC/tXxO3fKqso/qGOMBasRxxn/KxS9tuei4ROq', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(117, 'patient', '-', 'wailynnhtun88@gmail.com', NULL, '$2y$10$fg4OI7QcXvNQk.bWpbqerOYLyeGHbLeuKD4LdOtf6bW/mxqGfzZjm', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(118, 'patient', '-', 'shonabibby@icloud.com', NULL, '$2y$10$I/4UTr.G5lqCImGk/tz00eskeIKIqSiVxOFkNhsuGnLzdvkPI1pO.', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(119, 'patient', '-', 'rmjpetit@gmail.com', NULL, '$2y$10$Rfe6UFxP3Lka2wYC9p0VbOoIpy.DTafQG1VOBBfSsl/eBMSJ8gsDK', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(120, 'patient', '-', '', NULL, '$2y$10$OxZGBJsYOHr8avBk12gCgOOctmg3F91ThaxCxVq70sUa2HMT4Jx/G', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(121, 'patient', '-', '', NULL, '$2y$10$un5xJEWryl3LYaPPHaMmM.iuj2c8TZK9klsRSl8cnL2I5q8VgXdqa', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(122, 'patient', '-', '', NULL, '$2y$10$KlibSlpcIKjLKp4FkH4mGeoLayCdib4/5QJ3IfGie.Punan2qM0sC', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(123, 'patient', '-', '', NULL, '$2y$10$sEq9w1wyOD8CFcsKQLZ6D./bW4uYt80/0fsh.gQ8J/8NvebXtGE1S', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(124, 'patient', '-', 'wd.waiphyo@gmail.com', NULL, '$2y$10$ZKvx/kuxGJPEJZg/UPQfBuTjdaKDArQx74HpT.dYkNQQ6LmRcT9g2', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(125, 'patient', '-', 'NA', NULL, '$2y$10$p8NUV31wDYn3nJJeebKPyeb.jNiIumzdo9/BDpzckE3b58Ro31hsm', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(126, 'patient', '-', 'hlaing.war@gmail.com', NULL, '$2y$10$GI65ipDubAwJ7eIw0oVPEOSk76yd099jz4Oy6PchUDZfhNJNCdCc2', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(127, 'patient', '-', 'hhwin73@gmail.com', NULL, '$2y$10$qnbdi3wK3Y72QVEl2FPb..pSo6t7oJGjkT9Earv3rvA99kKyKXLx.', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(128, 'patient', '-', '', NULL, '$2y$10$zRhHmGrqDrfTQoHsPC3aVOSr.hielz.9ei5GicDg5nopLT.FuaUS.', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(129, 'patient', '-', 'thidarrmyint@gmail.com', NULL, '$2y$10$95puYhQ8N/43vOIc9Oohv.VfI6pMGXFhk8fEzHhE21Vbs2Gv3U.S.', NULL, NULL, '2019-01-08 00:08:40', '2019-01-08 00:08:40'),
(130, 'patient', '-', 'ha1318@hiltoncollege.com', NULL, '$2y$10$UvjapvYABYB34Z8dYPbdKeDt/BhD0qeGbeDcYl0eftWdAwOYGkP5q', NULL, NULL, '2019-01-08 00:08:41', '2019-01-08 00:08:41'),
(131, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985-1985@gmail.com', NULL, '$2y$10$qDmK9j0v66t8aHqoLv8kW.8YouFLW2cXZ1khwRpkdd7peVRyT2PPW', NULL, NULL, '2019-01-08 09:14:10', '2019-01-08 09:14:10'),
(132, 'patient', 'mujtaba-ahmad', 'mujtabaahmad198566644@gmail.com', NULL, '$2y$10$aeO/bJ7TlrOFwZxGY8NCuOvtzpbxxXshzBWVQMi9Y2XuN9Axv5oe2', NULL, NULL, '2019-01-08 09:48:45', '2019-01-08 09:48:45'),
(133, 'patient', 'sss-ddddd', 'm@h.k', NULL, '$2y$10$3jxkMXl9tmrbwFkD4cpwzOYSlLYm/gwOS5xBlfRJ9o0.hqzv29WZG', NULL, NULL, '2019-01-12 00:28:50', '2019-01-12 00:28:50'),
(134, 'patient', 'gh-ds', 'dsd@gh.com', NULL, '$2y$10$iA0FBmwFNzQVJGkk26smFey3ABCyJ5keXLSFAVW2TTYE4Itzm/CEa', NULL, NULL, '2019-01-12 01:31:49', '2019-01-12 01:31:49'),
(135, 'patient', 'sohail-ahmad', 'sohail.ahmad@hotmail.com', NULL, '$2y$10$vJIRQfUm4RcPFD9ddny/PO3OMhYdQcPjhfHQhzlr2tcKM75JtDoJK', NULL, NULL, '2019-01-14 08:54:49', '2019-01-14 08:54:49'),
(136, 'patient', 'muji-text', 'muji.text@yahoo.com', NULL, '$2y$10$MGV7p4kUluhjU6bmjOx7he47dcfC0Vq87IERwGRQMIyHGO4GRj4Hq', NULL, NULL, '2019-01-14 09:03:50', '2019-01-14 09:03:50'),
(137, 'patient', 'mujtaba-ahmad', 'mujtabaahmad19859999999@gmail.com', NULL, '$2y$10$7UB7IgmQKe6GfTcAJCzH9.tCK2aD8MPDDanQQyuVR9GlWzLPaN0Wq', NULL, NULL, '2019-01-21 01:01:10', '2019-01-21 01:01:10'),
(138, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985e3ee@gmail.com', NULL, '$2y$10$5kkfpOE8SQtZ8PF1VV9e4ea3Hl5q3YajA6j3E4onPi/2nxYZd.bbG', NULL, NULL, '2019-01-21 01:26:14', '2019-01-21 01:26:14'),
(139, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985e3eee@gmail.com', NULL, '$2y$10$2Sckl/JJEz3ux65rZVvyyeIlhxayA.caOW.X4wiW9ECRo4T.Ex80W', NULL, NULL, '2019-01-21 01:26:44', '2019-01-21 01:26:44'),
(140, 'patient', 'mujtaba-ahmad', 'mujtabaahmad19853e3eee@gmail.com', NULL, '$2y$10$KVJ2AyA157rW2ijHcGWvYe05q9W2v3YBzyYG81gfBM47Dv8nsoNX6', NULL, NULL, '2019-01-21 01:28:16', '2019-01-21 01:28:16'),
(141, 'patient', 'mr-ijaz', 'ijaz@ahma.com', NULL, '$2y$10$T8NqCTtU12QcjOLqYR9i9uSi1WV5IpQ5OtVFYf/.2MWAyZX9AD.wW', NULL, NULL, '2019-01-29 07:39:13', '2019-01-29 07:39:13'),
(142, 'patient', 'hafsa-mujtaba', 'hafsa.mujtaba.ahmad@yahoo.com', NULL, '$2y$10$y.QXkneUxHIWh/62gMdCM.a.SBQLKbW63PMXfZnGtTl/fp.xuHE2O', NULL, NULL, '2019-01-29 07:42:47', '2019-01-29 07:42:47'),
(143, 'patient', 'gg-gg', 'g@g.kio', NULL, '$2y$10$fmnFak0OamOn5Ls8OVYv6OgVhGHtKOEYOWvC8lzQgsZW0GXUWhUWa', NULL, NULL, '2019-02-05 04:41:49', '2019-02-05 04:41:49'),
(144, 'patient', 'coffee2-tea', 'misscoffee@gmail.com', NULL, '$2y$10$c44VbkaH/MY3OqZBbqTT3OO9S4y7fRoj.UnHe9a9FRlAGyA2KFa8C', NULL, NULL, '2019-02-05 06:16:03', '2019-02-05 06:16:03'),
(164, 'patient', 'soe maung-maung ', '', NULL, '$2y$10$J9LNGInuSbkeMoBds7xtqOsXV/M5q7B6VRcr348A8xzJRcesAr5Fq', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(163, 'staff', 'mujtaba-ahmad-1', 'mujtabaahmad19854433444e@gmail.com', 'pending', '$2y$10$poin9eUsNjr4QVeHcuA/X.5pQ4tu85aPyWRQ0FenX3KV1i.8ioSR2', NULL, NULL, '2019-05-11 11:08:34', '2019-05-11 11:08:34'),
(162, 'staff', 'mujtaba-ahmad-88', 'mujtabaahmad1985443444e@gmail.com', 'pending', '$2y$10$oOzYe0inwBy9EX8NojVAwOuK0E76gmLOMze5OcLIS2seYxBrB1zoW', NULL, NULL, '2019-05-11 11:08:18', '2019-05-11 11:08:18'),
(161, 'staff', 'mujtaba-ahmad-89', 'mujtabaahmad1985443444@gmail.com', 'pending', '$2y$10$tDjhCKiuhmguOnP0/Vxkvem6VL4pypyiNuhqd2BgXryqzIJ9UEAOW', NULL, NULL, '2019-05-11 11:07:38', '2019-05-11 11:07:38'),
(160, 'staff', 'mujtaba-ahmad-28', 'mujtabaahmad198544444@gmail.com', 'pending', '$2y$10$QHo24oo5i0T4zKzxGkxvfOk6GM/N8winTJRvAR6SLjX2eM.k6WsEW', NULL, NULL, '2019-05-11 11:07:01', '2019-05-11 11:07:01'),
(159, 'doctor', 'mujtabat-ahmadt', 'mujtabaahmad198335@gmail.com', 'pending', '$2y$10$lpxfeMIrK2lpjC55.rSHleLCQkN1fIVY78ZTmOuUUJ1TNBX/99VJS', NULL, NULL, '2019-04-22 05:59:41', '2019-04-22 05:59:41'),
(158, 'patient', 'mujtaba-ahmad', 'mujtabaahmad1985@hotmail.com', NULL, '$2y$10$gQPueu.uLMk.IdSRb2DRm.xSrm5wnD.KVM8lEJdhF23iVFHYDpfW2', 'ZX0UWawHVeVjq5gSeG3i2Z5NzdlDHmWQZ15pxq4oFo9aN4MebjVrPHhR2c8a', NULL, '2019-04-15 10:29:20', '2019-10-30 11:07:23'),
(157, 'patient', 'mujtaba11-ahmad11', 'mujtabaahmad155667777985@gmail.com', NULL, '$2y$10$O2xnuSw9bao8n64NlaoPq.7n7TgSOstVwJYYiy6gIzl3EIkSreZd6', NULL, NULL, '2019-04-15 10:25:37', '2019-04-15 10:25:37'),
(156, 'patient', 'mujtaba11-ahmad11', 'mujtabaahmad155667777985@gmail.com', NULL, '$2y$10$JX3eIQBuRPBuPRa2M9I7YuTS0pJUOwe9N.9jG5OLJqDXZM9cdkCgC', NULL, NULL, '2019-04-15 10:24:46', '2019-04-15 10:24:46'),
(165, 'patient', 'reina nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$eI11elEC7f4ry0ebtKW3bum22NqKDQHAtA/csOmeRbdyu4KJoO3Qm', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(166, 'patient', 'mireu nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$o6yhoxE/THgjRueWIvKrHOlN8MHqnB3CC1WABN7ubmyZxxXkSX.RK', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(167, 'patient', 'ria nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$8Fhe3vmEzu9qjpivCcbeje5k2CbRMsY2/ZvA90WEH0BADgv/0tO86', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(168, 'patient', 'nang kham-may ', 'khammaymay050@gmail.com', NULL, '$2y$10$D.i5eb/bjoEvgddrCbTtDe8Hu7peol7ADrnS7wjZAXfciPHMT6mum', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(169, 'patient', 'wint war-khine ', '', NULL, '$2y$10$MTDOmdRFkl0TegVQ7Pd1BuPYt7sPP/CnyMUmBJdIJEvvwORY3qAVe', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(170, 'patient', 'wang zhi-shuang ', '', NULL, '$2y$10$.v3x3GGiCPQis9L9TgK1aup2hpvCjLaRg7NGfkm5EjRRmDlOWfgiO', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(171, 'patient', 'saw klo-htoo ', '', NULL, '$2y$10$vjC79avnjytlZUGOfZqBA.6fOgT7VCCibobBNPjxf2H4f9CLF9UwC', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(172, 'patient', 'jonathan ng-', '', NULL, '$2y$10$fcsNK6PEmr5zoV8rTe4KH.pENzr148QeUM8TpAo0vJDj/znARj3PK', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(173, 'patient', 'ng aik-chin ', '', NULL, '$2y$10$ia/OohuqrdJdkW2yB3a42O1uFUDgsgIa48TjMgZdJcqBO21avGQYy', NULL, NULL, '2019-05-21 12:08:57', '2019-05-21 12:08:57'),
(174, 'patient', 'anusha taara-dutt', '', NULL, '$2y$10$bCAZEndJ2tYhkV/bg10bSOFUGtHlT4lG65XJ5R.XuhA9l.LReYJae', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(175, 'patient', 'thein zaw-oo ', '', NULL, '$2y$10$hHLO5qjAWTZedpqGegeuU.AK94YVmo6qIYy3u8f2V4cg2pq6agHO.', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(176, 'patient', 'yin mar-aye ', '', NULL, '$2y$10$PXUNtUomDvpxAlqYF8FHvuk7Fgq99b8elcfSvQWK/zywgAI6sGXWO', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(177, 'patient', 'fiona english-', '', NULL, '$2y$10$c/1vaaoOsnPiAGCXIZlROeh.o6CqtEnxK34IZU0UEVCru8ZRlaJuy', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(178, 'patient', 'david mitchel-', 'dcutmitchell@gmail.com', NULL, '$2y$10$ZPY.I1OvHZ9sPlkHaqcY5u.v0QgdYY9RefeomwUL82/RD5jXgpn1O', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(179, 'patient', 'nay myo-oo ', 'nnaayy@gmail.com', NULL, '$2y$10$R4QMYrbYqIUgUBcj/hKxTu4Ow.FZ3umu2UQG6iduRD6DCVQXoTGHq', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(180, 'patient', 'smitha unnikrishnan-', 'smithaunni@gmial.com', NULL, '$2y$10$0GRXo81tPJvHh5GnuuMleOpbHs1XO9LhhDJ9AmeaATXiae65SLN5W', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(181, 'patient', '-', '', NULL, '$2y$10$e./oS7eq0ms2jdpsGvukfO5c0r8C80QmxEImkBdSikUcoDOtjY5pq', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(182, 'patient', 'thein zaw-', '', NULL, '$2y$10$v5jP3sZJBpht2Ne/ce2fzeNs.3fAiGkrbacr7R0Ds4Ncr3QJ/h6CW', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(183, 'patient', 'kyaw khin-', '', NULL, '$2y$10$Z5J59LqJQXNLFfWyCfOmz.Ax1oY4LFIWSu5eQvA3V/5yZSKOWewIS', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(184, 'patient', 'aung si-thu ', '', NULL, '$2y$10$pOrEEzQs7K1oSXhAUBPxFOxlhAxRgdiP7HCaCf6EQ9YZH3jTuAhFO', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(185, 'patient', 'ye tun-', 'dryetun551@gmail.com ', NULL, '$2y$10$0m8kabk3LSE2SGZdewQd4eLFyM6uSSSL4iF0txCtI0hVR9QyhvkCS', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(186, 'patient', 'lee siew-boon ', '', NULL, '$2y$10$415nJMezOonSbhdsSE9zW.HeYHNQ4KZQdkoBPnUwpHofE.m.9C2gm', NULL, NULL, '2019-05-21 12:08:58', '2019-05-21 12:08:58'),
(187, 'patient', 'josephine kwok-', '', NULL, '$2y$10$EPcbF12H4e.i6XFrl2HBOO1/82X1yXK0WgG7SgNiwum5fWS1tdFYe', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(188, 'patient', 'thwe thwe-oo ', '', NULL, '$2y$10$MpQIwM4M93lUgD61PlkKgemv2WMGZG3cgQSg8P58NxjC4EGfWd532', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(189, 'patient', 'kay zin-win ko', 'kzinwinko@gmail.com', NULL, '$2y$10$qBXRJOFsM5eyZqKmozEeS.5A5PSBYmJvhPIQEmN0m03oFR6auTmda', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(190, 'patient', 'xo nwa-zi', 'xonwayzi@gmail.com', NULL, '$2y$10$2.UTupBDeHpabYFQ4zFG4.dN43mOldVAVahAlcMScn3YAHA9vPSm.', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(191, 'patient', 'myo win-khine ', '', NULL, '$2y$10$Kr0pPn/0UIjqUxrh3a/qa.xPxo/6GndLHP5HhgJmx26uSyv3FCybG', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(192, 'patient', 'thin thin-khaing', '', NULL, '$2y$10$U9WjtTb9oVofs7Tt5t9equomrXRbiwCAG6/3C9S6fkffYs2v4DcLS', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(193, 'patient', 'nay win-myint ', '', NULL, '$2y$10$/eKMG3.A5DK5HV6rBD.cDOX8CxbtNYsoABD1HOEtLQjAFU0Zqaspe', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(194, 'patient', 'claire goodill-', 'cgoodill@gmail.com', NULL, '$2y$10$fBapAzKGWMdJ4TYenLXSrepdHBGS0fYpfUJ.RFoOhkrlca3prNEiG', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(195, 'patient', 'chee hsin-yee ', '', NULL, '$2y$10$RIAvJzGjN0a92mLhJkNy3ee8NVtb8J6SoPhYcXuy3YIte2O.st2Sm', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(196, 'patient', 'ng poh-seng ', '', NULL, '$2y$10$gf0qrDlwg/vCg06eR1P2S.Psk6zQ8G1b2I5Rvh73FHPqsCRMxBapa', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(197, 'patient', 'myo kyaw-oo', '', NULL, '$2y$10$HqZbn4z66DS3xnXIeiL6UurAk.lQvw6kQJRHheNJ1GJxVTJTZIC3a', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(198, 'patient', 'kenza brouwer-', '', NULL, '$2y$10$FkMQHUbamvF9nECe2vCl2OS6L0c7WHWgOBtNTwsFnCV7.svuEhQ6i', NULL, NULL, '2019-05-21 12:08:59', '2019-05-21 12:08:59'),
(199, 'patient', '-', '', NULL, '$2y$10$MneSX1HwLqum8/.jqBKEBu2JZfjfb.1DAnLzXxjV21PGHadh53r4C', NULL, NULL, '2019-05-21 12:09:00', '2019-05-21 12:09:00'),
(200, 'patient', 'soe maung-maung ', '', NULL, '$2y$10$Q96hjwDs/8VASVOweAgwEefpZliNUkwJLANZD307mBjfuVNt1rWf6', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(201, 'patient', 'reina nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$8A31xSnITZRLcwL34Yr7f.bXfrDzqincAz0JJIRVr2DZ0JDLqV9Hi', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(202, 'patient', 'mireu nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$.ORD3wpLAi3hvIog4LEOnOZHKriZUmAdAMPXWpCcIZHoQMHnGg4qy', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(203, 'patient', 'ria nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$KLkWSwvytdUIBm0rulCLhuiyPaO9Z81wqdkTPy7SQ9fuWJlUnVXrq', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(204, 'patient', 'nang kham-may ', 'khammaymay050@gmail.com', NULL, '$2y$10$BGXmfxIpoq0AM0EvmJCm0uPrL9ntfEcPcSEgeMIfT9PDVFoOhx6ie', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(205, 'patient', 'wint war-khine ', '', NULL, '$2y$10$GN1/TPFsd1TvI5Ln00cQHeNxKlRZ2oGEjVYQ3KB4FGA6iiLK9k09K', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(206, 'patient', 'wang zhi-shuang ', '', NULL, '$2y$10$5yxWJmj5X7ZVZqy4zNYzWe/WxFBxtOPFmORTo3lAYDtTHs2AD/r/O', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(207, 'patient', 'saw klo-htoo ', '', NULL, '$2y$10$oO51KOU7rYKosWW2C.J47ObX8lWRHr1T.DMNEUnmnIHCACOjBCGlO', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(208, 'patient', 'jonathan ng-', '', NULL, '$2y$10$GedWZdL1//7T/DwZyeBm4u5zcYWCIWccQgY76cmsXfeXqcEsgXJOW', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(209, 'patient', 'ng aik-chin ', '', NULL, '$2y$10$Dd140rh79goqPFLqJOTon.ofjH2sfjO4kT86kL9H7YYiGGJUQKd.2', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(210, 'patient', 'anusha taara-dutt', '', NULL, '$2y$10$v/p1OamDqwK2pRoGtEvCv.jVHpdCf3LMzNhKA79nnzy58/C8B8xy2', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(211, 'patient', 'thein zaw-oo ', '', NULL, '$2y$10$mujXCdCceXecqGR/EAeW4eHy3XgNJbFh2PU8RFCLnux929IbEYlBO', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(212, 'patient', 'yin mar-aye ', '', NULL, '$2y$10$1RKevdkq/ax0p/gVxXUjlOsrdbx82Q7yUXOiioOAbiVuj/ss8E882', NULL, NULL, '2019-05-21 12:09:56', '2019-05-21 12:09:56'),
(213, 'patient', 'fiona english-', '', NULL, '$2y$10$D.Qt/XPPf2RJj3S6cEFPk.YFTnRGng9HrL9On88lnRUeDI7msWhYC', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(214, 'patient', 'david mitchel-', 'dcutmitchell@gmail.com', NULL, '$2y$10$hRkGdnOnLTXCI/.29f4Kk.xMsD3KS.b9XIPpTBdEC4/ZNBCMg0/sS', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(215, 'patient', 'nay myo-oo ', 'nnaayy@gmail.com', NULL, '$2y$10$HBnMFfujIzW26SP2W2gNTeRPw9Abd17oevCJm94vSsGK5dbZMKS3C', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(216, 'patient', 'smitha unnikrishnan-', 'smithaunni@gmial.com', NULL, '$2y$10$3dmgIRoVAcQjZVUjQkfWCeZzuPNMX6ufJUrMa08kA80d59M9ityuO', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(217, 'patient', '-', '', NULL, '$2y$10$t/Q/s8cmzP0ukQYQzQZ6Gu7V6LKlDAJ31JzLEzYwHQOT2vkmiECnO', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(218, 'patient', 'thein zaw-', '', NULL, '$2y$10$dy4tugPCYRpiPvkHxCk6fuWGawcJ1s/a/94mBUla/q4g75VL4yd0m', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(219, 'patient', 'kyaw khin-', '', NULL, '$2y$10$zpTYuUjo0dzN6LIBrf9lXeJPKANndMSCZDlKTrHsjVNhV3r9pC3d2', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(220, 'patient', 'aung si-thu ', '', NULL, '$2y$10$BbmWiRKDvwUgsOvdCSrP/OQ6FxFp03zv81dM9UKsXYoRmfwmPCEKO', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(221, 'patient', 'ye tun-', 'dryetun551@gmail.com ', NULL, '$2y$10$TaSpbIglw0nZb1kzBrzR1.D3p.sfB5sJxq9CfLLOJSG7A0v4PegEa', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(222, 'patient', 'lee siew-boon ', '', NULL, '$2y$10$PAeTE8N7svLgyj8xs0SoaeGELyZrgwLqKt.rvoCKXjuzSHkt/26li', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(223, 'patient', 'josephine kwok-', '', NULL, '$2y$10$5qbRP1tTdsGPKy1mss0QTeCsdpJWQc64WHH48I3pY6NkHhPcf1o..', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(224, 'patient', 'thwe thwe-oo ', '', NULL, '$2y$10$pK2CmmjPojNwyUPDp9WOYOplVb95pfOperzMG8xtA8lHj1b1IxsyK', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(225, 'patient', 'kay zin-win ko', 'kzinwinko@gmail.com', NULL, '$2y$10$T3/NkK.Ggo9gmuylz1YPEOgSEbmDA2qLtaL.mdpYL3FejRYFpELQG', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(226, 'patient', 'xo nwa-zi', 'xonwayzi@gmail.com', NULL, '$2y$10$SYLCyxfANAYlfgXSaHhtAeL/OcNzWUVb6V7DzQfnlvyZvWUvUqKKO', NULL, NULL, '2019-05-21 12:09:57', '2019-05-21 12:09:57'),
(227, 'patient', 'myo win-khine ', '', NULL, '$2y$10$vKMZszsLvqC6oAolC9F4RO/ooPrXnHn.JiPK8uDpnJdE3AHIVTlou', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(228, 'patient', 'thin thin-khaing', '', NULL, '$2y$10$Gmsk/5ZykWjnFAxuOeSxgO1JMZHDGfy6WP4oNB4gJCSD7LuxZ2xN.', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(229, 'patient', 'nay win-myint ', '', NULL, '$2y$10$eV0pVV3zEu6/waEYzf7rkOCBoOc9wKN.N/ImZLt3tL2J2by4m3Kpq', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(230, 'patient', 'claire goodill-', 'cgoodill@gmail.com', NULL, '$2y$10$RHNPq7WpmzjuXd6nKhCCZuSTf2b0A1GXxRa0xjHPYrmCs2MxfyyrG', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(231, 'patient', 'chee hsin-yee ', '', NULL, '$2y$10$madK2zsa1HAPh7RMIgRTEOiC4LOOdxXyQB0Ib57x9hJjtYaAtv3iq', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(232, 'patient', 'ng poh-seng ', '', NULL, '$2y$10$D1oDRjHaXNOmYpf25z.lKOzvpikpoIBeKCi2CpkHnqvDmFtCepPey', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(233, 'patient', 'myo kyaw-oo', '', NULL, '$2y$10$d6nQKiiWJED19dr2iY5BZ.otIou7wAC3EmZAhcJWT2HbwjroMi08S', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(234, 'patient', 'kenza brouwer-', '', NULL, '$2y$10$vXQwWez.w8aF9tKxSyCoR.ZAYuB9.8EpaurGYG1Z3A0eFRlbisyoi', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(235, 'patient', '-', '', NULL, '$2y$10$BEyHrP2OWUlGHfrGQtPta.QoU/iEzLtRRxIp748m/sHNAqWUKXGSO', NULL, NULL, '2019-05-21 12:09:58', '2019-05-21 12:09:58'),
(281, 'patient', 'yahoo0-25082043', 'may0@yahoo.com', NULL, '', NULL, NULL, '2020-08-06 23:08:16', '2020-08-06 23:08:16'),
(236, 'doctor', 'mujtaba-ahmad', 'sofia_shs@hotmail.com', 'pending', '$2y$10$je2b/WX/Lx550g0CNwQ1zuQxAo7lQ6s7KXhkwwVqpAx0bUtDDKcFa', NULL, NULL, '2019-10-26 10:23:55', '2019-10-26 10:23:55'),
(237, 'doctor', 'mujtaba-ahmad', 'sofia_shs11@hotmail.com', 'pending', '$2y$10$oWp7khUD6I1jWBCeyn7ZPOxSxf6.C/40MdD8xkYtZ2UpMd8W25TUm', NULL, NULL, '2019-10-26 10:29:09', '2019-10-26 10:29:09'),
(238, 'doctor', 'mujtaba-ahmad', 'sofia_shs1@hotmail.com', 'pending', '$2y$10$uDCzO5YPzZQaVnQKCDTTmeax0gYJVH3BfKSKDgAHav3fKmiPqywSC', NULL, NULL, '2019-10-26 10:29:48', '2019-10-26 10:29:48'),
(239, 'doctor', 'mujtaba-ahmad', 'mujtabaahmad1985u77@gmail.com', 'pending', '$2y$10$NpuOMtO.eHc1.E/UgpUIJeMTw4mBsbj3pXqhdnMXKuJUkU0AXADOO', NULL, NULL, '2019-10-26 10:31:10', '2019-10-26 10:31:10'),
(240, 'patient', 'chis-mish', 'chismish@yahoo.com', 'approved', '$2y$10$EvXOGlZCiPhQ.3EVt7OcKOW0FxUG8pidi7alAg9u9Wsgd9KulzgFW', NULL, NULL, '2020-01-14 06:00:45', '2020-01-29 00:22:01'),
(241, 'patient', 'soe maung-maung ', '', NULL, '$2y$10$v3/Xo.n8KmU9N0WYpW2AhuVja.VOHXxiY4b6ZPHoY1wi6aYqlMyF6', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(242, 'patient', 'reina nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$el.iEsnmsvVjmf1KzbpgXeC9FL8xEF/HAwCBmWKjtKaYOwYbh8RBO', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(243, 'patient', 'mireu nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$wxZ2HY71aj23eXIvHS0MnuX5nVxZxS0e2Np8V65ZaUn3pGwcTI4xi', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(244, 'patient', 'ria nakahara-', 'marie.nakahara@gmail.com', NULL, '$2y$10$MPACPSj9Yz65zazyby9I4.gDg8DXQlRw.1pRq5jmXHpp/c7YE0F82', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(245, 'patient', 'nang kham-may ', 'khammaymay050@gmail.com', NULL, '$2y$10$h09WAA4mUzeIm93Bww00ju.F5teV4i.sKZYyV7I/IQ.zKIPW3TL9W', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(246, 'patient', 'wint war-khine ', '', NULL, '$2y$10$9TNMdPfa./FEFP4A.Td6EO.Str9WLHNbhBcQ.t0sdJ7xlCZKQYcvi', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(247, 'patient', 'wang zhi-shuang ', '', NULL, '$2y$10$n2PgHO7UiKrfNxM7xzrKIOHP2rTtOr7k2GTH/02TmMcUw/lKqThmC', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(248, 'patient', 'saw klo-htoo ', '', NULL, '$2y$10$u1JhZsaxG9Qv1BhB5arSZupwBz7OZprlwZgW9JTsYOKYmuzuuKIha', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(249, 'patient', 'jonathan ng-', '', NULL, '$2y$10$xIq/hiA61rul1odZ5njvEuMpfKRobtvKSPKzjy6RCBGQmIyD3wOnu', NULL, NULL, '2020-01-28 10:26:41', '2020-01-28 10:26:41'),
(250, 'patient', 'ng aik-chin ', '', NULL, '$2y$10$1n5PdljcODwB/eoYbFc23.RuwdHp6hvChogqXjR3HCKqFeIXqIH2W', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(251, 'patient', 'anusha taara-dutt', '', NULL, '$2y$10$sr7pgXvOfYiAODGvlrGFTO1Oc8Bql54c5GI9E8lxGq7vET5s0AbEu', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(252, 'patient', 'thein zaw-oo ', '', NULL, '$2y$10$2lCdPfWfAYKgl52w5kVVyulEnvZcYQSjwmKlJrLm0rsLGwRpGtBzG', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(253, 'patient', 'yin mar-aye ', '', NULL, '$2y$10$JEbjevD.fEyGGiPN37eaGeLnIJfxWHAuVLLixIIQBr2MKIhnBs0hi', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(254, 'patient', 'fiona english-', '', NULL, '$2y$10$/oiDgoW/Gc9YdxH.l2R28eQmQhNVYCtjfuNPo/XT4BzP296T01wJG', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(255, 'patient', 'david mitchel-', 'dcutmitchell@gmail.com', NULL, '$2y$10$06UicqkWn8VmBzyhwoZ0guDOJy2P.Z4ooDjFaDUYH4HNtw8YFq0Q6', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(256, 'patient', 'nay myo-oo ', 'nnaayy@gmail.com', NULL, '$2y$10$uu.At4BbliIswlmde30TNOGYypBwnJ4xMJftJElkbKD2BIK56AMZy', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(257, 'patient', 'smitha unnikrishnan-', 'smithaunni@gmial.com', NULL, '$2y$10$vFGMZRcBDeJ8LML/Ek64SuIqmhFbmySf.lEGdtLnz/UY0dwpbKVPi', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(258, 'patient', '-', '', NULL, '$2y$10$qiE5.rT4meO0JRumWPJwZeDPppCUkEWQTryJcJktG1f7p91eBadzm', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(259, 'patient', 'thein zaw-', '', NULL, '$2y$10$zsb5uMQHzltfRPGSxz7F.Ofyx15weUlM/eZVWGo6RH1zZhEisuSPW', NULL, NULL, '2020-01-28 10:26:42', '2020-01-28 10:26:42'),
(260, 'patient', 'kyaw khin-', '', NULL, '$2y$10$AIlafGAHd8xCruHjjz.xMuWSTzV90R0aXud1S7/HaCiDSG9HVEZHe', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(261, 'patient', 'aung si-thu ', '', NULL, '$2y$10$OUZ01kyGe5reFtMpV.TOleh9uZCe0B1fmX9ixg41b2xFhLyvoVrCG', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(262, 'patient', 'ye tun-', 'dryetun551@gmail.com ', NULL, '$2y$10$4/BggWvJ4xYyqg1UyUwW7.z6n8B6WFBAHmFsLi4cv7BEICyZbZVie', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(263, 'patient', 'lee siew-boon ', '', NULL, '$2y$10$YAfR3iVlF64ENOLUXeAsau7YYy5brqIyr6XEhOI1IYsQeKeQ65B9W', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(264, 'patient', 'josephine kwok-', '', NULL, '$2y$10$Psm1N/dOJ.k1RQ5JABnGdODcAoymYRwcnnZUgizFuvqCSk.EAqy2G', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(265, 'patient', 'thwe thwe-oo ', '', NULL, '$2y$10$W4T383EmYeRcpHVkFmwCZ.LXfPftq3FYu9Cc/G8m7XiKcYG1eJJ1K', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(266, 'patient', 'kay zin-win ko', 'kzinwinko@gmail.com', NULL, '$2y$10$s0TOZY5.59vNNQHFtWMSM.nxp9T9fyv14j7jowTwj.KdxFyMuCfB.', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(267, 'patient', 'xo nwa-zi', 'xonwayzi@gmail.com', NULL, '$2y$10$cgXWwO2AdR02KR3eUbgvser3VfDuhJME9tcjL5feI2OHEMFDQyP.K', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(268, 'patient', 'myo win-khine ', '', NULL, '$2y$10$B/kq2avtOJ508dFQHlszUOSWvDOGRDn018O9PpgkDzX9MD4t1lm0a', NULL, NULL, '2020-01-28 10:26:43', '2020-01-28 10:26:43'),
(269, 'patient', 'thin thin-khaing', '', NULL, '$2y$10$UIVDKk3rNhiDJWJaw0Wa8uRinwEJxQpHIIMvXCoIxz/5C8FYGc8pC', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(270, 'patient', 'nay win-myint ', '', NULL, '$2y$10$jHSdZFTmTiC0enjbLfb/o.SxFEiAHpYt4p62pQG.I1IwHMLyHw5Tu', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(271, 'patient', 'claire goodill-', 'chismish1@yahoo.com', 'approved', '$2y$10$kYGgaCm2pLV5xsFNGmn/Ueljeyj2BiY0b3Ge3wR6TNze7LXRt06XG', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(272, 'patient', 'chee hsin-yee ', '', NULL, '$2y$10$xrnJHR.kdQ21GFGumpn0hOI79pjs9LfZimwSAv53YpKqDZYkJfEEm', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(273, 'patient', 'ng poh-seng ', '', NULL, '$2y$10$n1TTCplifDjDkWegamCLren/JbakkDDrgQZbqq19vQbBFxmo1IgI6', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(274, 'patient', 'myo kyaw-oo', '', NULL, '$2y$10$TnrHFD70liBNxMEsSXb8Qeu31aS4PWNIEQkuMmZTTGArVlOMOykaS', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(275, 'patient', 'kenza brouwer-', '', NULL, '$2y$10$TqXilous79yMdNBDma0QYeo.x5/n4fwZV0NLfqlT/7ppcV7LfdtRO', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(276, 'patient', '-', '', NULL, '$2y$10$.NgtNWxoVLYT8NcaMu397eJfUCPb.CGedWJ29TuK4q9gPsF1m2brO', NULL, NULL, '2020-01-28 10:26:44', '2020-01-28 10:26:44'),
(277, 'patient', 'kaloo-khan', 'mujtabaahmad1985@gmail.com', 'approved', '$2y$10$jC.BCu/x69rbsZL5pskDvOpIYduw9/f/msA7yJWbSxHP1r.9TSplK', NULL, NULL, '2020-01-29 00:17:13', '2020-11-24 00:45:19'),
(278, 'patient', 'khaiso-hamlet', 'khaiso@gmail.com', NULL, '$2y$10$zsubTFMD5KQ9by006XduCuVAXSb8nX0E5NXSzKE0l/xUOv6tfHY6C', NULL, NULL, '2020-02-14 10:10:55', '2020-02-14 10:10:55'),
(279, 'patient', 'jam-jam', 'jamjam@yahoo.com', 'approved', '$2y$10$YLBHnciKkutMbW6ed1zGrOABIIweG6Wbdq2hPlkCsTemeSemO0Szi', NULL, NULL, '2020-06-08 07:29:04', '2020-06-08 08:19:01'),
(280, NULL, 'yahoo-25082043', 'may@yahoo.com', NULL, '', NULL, NULL, '2020-08-06 23:00:06', '2020-08-06 23:00:06'),
(282, 'patient', 'yahoo00-25082043', 'may00@gmail.com', NULL, '', NULL, NULL, '2020-08-06 23:11:25', '2020-08-07 00:35:24'),
(283, 'doctor', 'new doctor-saab', 'doctor1@gmail.com', 'pending', '$2y$10$aGdOkcUsNLW0RMrbkbrhcuM/KcrUdb8l5C5ERdGOU6fctA1a5vUou', NULL, NULL, '2020-09-01 22:50:15', '2020-09-01 22:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE IF NOT EXISTS `user_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `email_addresses` text,
  `email_content` longtext,
  `subject` varchar(255) DEFAULT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `message_folder_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `sender_id`, `receiver_id`, `email_addresses`, `email_content`, `subject`, `status`, `message_folder_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 277, NULL, '<p>test</p>', 'Need update on project', 'unread', 0, '2020-04-30 11:58:32', '2020-04-30 11:58:32', NULL),
(2, 7, 1, NULL, '<p>test</p>', 'test', 'read', 0, '2020-05-13 01:42:45', '2020-05-13 02:10:28', NULL),
(3, 1, 7, NULL, 'well , i got what you want.&nbsp;<br><hr><p>test</p>', 'Re:test', 'read', 0, '2020-05-13 02:17:30', '2020-05-13 02:17:45', NULL),
(4, 1, 280, NULL, '<p>asaassa</p>', 'English', 'unread', 0, '2020-08-06 23:05:25', '2020-08-06 23:05:25', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
