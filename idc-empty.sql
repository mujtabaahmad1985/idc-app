-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2020 at 04:54 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
