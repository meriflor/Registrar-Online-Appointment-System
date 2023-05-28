-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 04:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msumsat-registrardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_title`, `announcement_text`, `created_at`, `updated_at`) VALUES
(1, 'Closed Transactions on April 28, 2023', 'This is an important announcement from the Office of the Registrar. Due to necessary maintenance and upgrades, our registration system will be temporarily down for one week, starting Monday, April 10th at 8:00 am and ending Monday, April 17th at 8:00 am.  ', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(2, 'Closed Transactions on April 21, 2023', 'We would like to inform you that our registrar\'s office will be closed on April 21 2023, in observance of Eid al-Fitr, the festival of breaking the fast that marks the end of Ramadan.\r\n            ', '2023-05-08 05:04:57', '2023-05-08 05:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_purpose` text NOT NULL,
  `acad_year` varchar(255) DEFAULT NULL,
  `appointment_date` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `a_transfer` tinyint(1) NOT NULL,
  `a_transfer_school` varchar(255) DEFAULT NULL,
  `b_transfer` tinyint(1) NOT NULL,
  `b_transfer_school` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `num_copies` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `booking_number` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `app_purpose`, `acad_year`, `appointment_date`, `payment_method`, `proof_of_payment`, `a_transfer`, `a_transfer_school`, `b_transfer`, `b_transfer_school`, `status`, `num_copies`, `remarks`, `booking_number`, `user_id`, `form_id`, `created_at`, `updated_at`) VALUES
(1, 'Mag kuha kog certificate para sa akong ge applyan', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 3, NULL, 'MSUMSAT2023-05-0001-70', 5, 4, '2023-05-08 05:23:04', '2023-05-08 05:41:17'),
(2, 'I would like to request this form for my job purposes', '2022-2023', 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 2, NULL, 'MSUMSAT2023-05-0002-63', 5, 1, '2023-05-08 05:24:47', '2023-05-08 05:41:25'),
(3, 'I would like also to request this since for my remembrance', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, 'Reschedule your appointment you dont have yet a grades', 'MSUMSAT2023-05-0003-31', 5, 10, '2023-05-08 05:26:20', '2023-05-08 06:40:50'),
(4, 'mo kuha ko ani kay need sa akong new school', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 2, NULL, 'MSUMSAT2023-05-0004-63', 5, 8, '2023-05-08 05:27:00', '2023-05-08 06:38:36'),
(5, 'Nawala akong COR, mag request kog utro para naa nakoy copy', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 1, NULL, 'MSUMSAT2023-05-0005-57', 5, 12, '2023-05-08 05:27:54', '2023-05-08 06:04:49'),
(6, 'Mag transfer ko', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0006-16', 5, 7, '2023-05-08 05:28:34', '2023-05-08 05:28:34'),
(7, 'para maka apply nakog work gepangitaan ko ani', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 2, NULL, 'MSUMSAT2023-05-0007-87', 6, 6, '2023-05-08 05:32:10', '2023-05-08 06:04:54'),
(8, 'for my verification and authentication,', NULL, 'May 08, 2023', 'GCash', 'images/proof-of-payment/1683552803_343316076_2633899090090848_3018882089072182299_n.jpg', 0, 'null', 0, 'null', 'Claimed', 1, NULL, 'MSUMSAT2023-05-0008-25', 6, 3, '2023-05-08 05:33:23', '2023-05-08 06:05:00'),
(9, 'gamiton nako para sa akong pag process sa ubang papers', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 1, NULL, 'MSUMSAT2023-05-0009-53', 6, 8, '2023-05-08 05:34:15', '2023-05-08 06:05:08'),
(10, 'para naa koy remembrance sa akong pag graduate', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 1, NULL, 'MSUMSAT2023-05-0010-82', 6, 10, '2023-05-08 05:34:55', '2023-05-08 06:05:14'),
(11, 'gepangitaan ko ani sa akong new school', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0011-88', 6, 4, '2023-05-08 05:35:43', '2023-05-08 05:35:43'),
(12, 'para naa koy remembrance sa akong pag skwela sa MSAT', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0012-44', 6, 10, '2023-05-08 05:36:56', '2023-05-08 05:36:56'),
(13, 'Ge pangitaan ko sa akong new school', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 1, NULL, 'MSUMSAT2023-05-0013-47', 7, 2, '2023-05-08 05:49:34', '2023-05-08 06:05:19'),
(14, 'Mag transfer ko to another school', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 1, NULL, 'MSUMSAT2023-05-0014-75', 7, 7, '2023-05-08 05:50:51', '2023-05-08 06:05:25'),
(15, 'mangayu kog certification para sa akong requirements', NULL, 'May 08, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 4, NULL, 'MSUMSAT2023-05-0015-69', 7, 4, '2023-05-08 05:52:00', '2023-05-08 06:05:31'),
(16, 'Para naakoy remembrance sa akong pag skwela sa MSAT', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0016-89', 7, 10, '2023-05-08 05:53:20', '2023-05-08 05:53:20'),
(17, 'Para naakoy remembrance sa akong pag skwela sa MSAT', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0017-32', 7, 10, '2023-05-08 05:53:51', '2023-05-08 05:53:51'),
(18, 'For my own copy purposes', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Ready to Claim', 1, NULL, 'MSUMSAT2023-05-0018-11', 8, 12, '2023-05-08 05:57:33', '2023-05-08 06:38:07'),
(19, 'For my own copy For my own copy purposespurposes', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0019-13', 8, 12, '2023-05-08 05:58:03', '2023-05-08 05:58:03'),
(20, 'For my credential', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Ready to Claim', 2, NULL, 'MSUMSAT2023-05-0020-25', 8, 7, '2023-05-08 05:58:47', '2023-05-08 06:38:14'),
(21, 'I want to claim my diploma', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0021-40', 8, 9, '2023-05-08 06:00:07', '2023-05-08 06:00:07'),
(22, 'nawala akong id, mag pa issue kog utro maam/sir', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0022-32', 8, 13, '2023-05-08 06:00:55', '2023-05-08 06:00:55'),
(23, 'para sa akong work na requirments', NULL, 'May 15, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0023-31', 8, 6, '2023-05-08 06:01:42', '2023-05-08 06:01:42'),
(24, 'For my job purposes', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0024-56', 9, 6, '2023-05-08 06:13:14', '2023-05-08 06:13:14'),
(25, 'For my job purposes', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0025-16', 9, 6, '2023-05-08 06:13:42', '2023-05-08 06:13:42'),
(26, 'For authentication', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Claimed', 1, NULL, 'MSUMSAT2023-05-0026-66', 9, 5, '2023-05-08 06:15:19', '2023-05-08 06:38:28'),
(27, 'requesting for releasing my diploma', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'On Process', 1, NULL, 'MSUMSAT2023-05-0027-77', 9, 9, '2023-05-08 06:16:18', '2023-05-08 06:37:14'),
(28, 'for my schoolarship', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0028-69', 9, 8, '2023-05-08 06:18:12', '2023-05-08 06:18:13'),
(29, 'For my remembrance', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'On Process', 1, NULL, 'MSUMSAT2023-05-0029-69', 10, 10, '2023-05-08 06:33:25', '2023-05-08 06:37:21'),
(30, 'For my remembrance', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0030-53', 10, 10, '2023-05-08 06:33:46', '2023-05-08 06:33:46'),
(31, 'Requesting for my dismissal', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'On Process', 1, NULL, 'MSUMSAT2023-05-0031-42', 10, 2, '2023-05-08 06:34:23', '2023-05-08 06:37:51'),
(32, 'Requesting for my dismissal', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0032-60', 10, 2, '2023-05-08 06:34:54', '2023-05-08 06:34:54'),
(33, 'For my job request', NULL, 'May 09, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0033-52', 10, 3, '2023-05-08 06:35:29', '2023-05-08 06:35:30'),
(34, 'For my job request', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0034-69', 10, 3, '2023-05-08 06:36:00', '2023-05-08 06:36:00'),
(35, 'For my job request', NULL, 'May 15, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0035-41', 10, 3, '2023-05-08 06:36:35', '2023-05-08 06:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_slots`
--

CREATE TABLE `appointment_slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `slot_date` date NOT NULL,
  `available_slots` int(11) NOT NULL DEFAULT 0,
  `is_disabled` tinyint(1) NOT NULL DEFAULT 0,
  `appointment_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_slots`
--

INSERT INTO `appointment_slots` (`id`, `slot_date`, `available_slots`, `is_disabled`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, '2023-05-11', 20, 0, NULL, '2023-05-08 05:10:06', '2023-05-08 05:10:06'),
(2, '2023-05-08', 10, 0, NULL, '2023-05-08 13:12:11', '2023-05-08 13:12:11'),
(3, '2023-05-09', 20, 0, NULL, '2023-05-08 05:13:18', '2023-05-08 05:13:18'),
(4, '2023-05-15', 50, 0, NULL, '2023-05-08 05:14:01', '2023-05-08 05:14:01'),
(5, '2023-05-16', 10, 0, NULL, '2023-05-08 05:14:14', '2023-05-08 05:14:14'),
(6, '2023-05-17', 20, 0, NULL, '2023-05-08 05:14:23', '2023-05-08 05:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `resched` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `appointment_id`, `resched`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 0, '2023-05-08 05:23:04', '2023-05-08 05:23:04'),
(2, 5, 2, 0, '2023-05-08 05:24:47', '2023-05-08 05:24:47'),
(3, 5, 3, 1, '2023-05-08 05:26:20', '2023-05-08 06:40:50'),
(4, 5, 4, 0, '2023-05-08 05:27:00', '2023-05-08 05:27:00'),
(5, 5, 5, 0, '2023-05-08 05:27:54', '2023-05-08 05:27:54'),
(6, 5, 6, 0, '2023-05-08 05:28:34', '2023-05-08 05:28:34'),
(7, 6, 7, 0, '2023-05-08 05:32:10', '2023-05-08 05:32:10'),
(8, 6, 8, 0, '2023-05-08 05:33:23', '2023-05-08 05:33:23'),
(9, 6, 9, 0, '2023-05-08 05:34:15', '2023-05-08 05:34:15'),
(10, 6, 10, 0, '2023-05-08 05:34:55', '2023-05-08 05:34:55'),
(11, 6, 11, 0, '2023-05-08 05:35:43', '2023-05-08 05:35:43'),
(12, 6, 12, 0, '2023-05-08 05:36:56', '2023-05-08 05:36:56'),
(13, 7, 13, 0, '2023-05-08 05:49:34', '2023-05-08 05:49:34'),
(14, 7, 14, 0, '2023-05-08 05:50:51', '2023-05-08 05:50:51'),
(15, 7, 15, 0, '2023-05-08 05:52:00', '2023-05-08 05:52:00'),
(16, 7, 16, 0, '2023-05-08 05:53:20', '2023-05-08 05:53:20'),
(17, 7, 17, 0, '2023-05-08 05:53:51', '2023-05-08 05:53:51'),
(18, 8, 18, 0, '2023-05-08 05:57:33', '2023-05-08 05:57:33'),
(19, 8, 19, 0, '2023-05-08 05:58:03', '2023-05-08 05:58:03'),
(20, 8, 20, 0, '2023-05-08 05:58:47', '2023-05-08 05:58:47'),
(21, 8, 21, 0, '2023-05-08 06:00:07', '2023-05-08 06:00:07'),
(22, 8, 22, 0, '2023-05-08 06:00:55', '2023-05-08 06:00:55'),
(23, 8, 23, 0, '2023-05-08 06:01:42', '2023-05-08 06:01:42'),
(24, 9, 24, 0, '2023-05-08 06:13:14', '2023-05-08 06:13:14'),
(25, 9, 25, 0, '2023-05-08 06:13:42', '2023-05-08 06:13:42'),
(26, 9, 26, 0, '2023-05-08 06:15:19', '2023-05-08 06:15:19'),
(27, 9, 27, 0, '2023-05-08 06:16:18', '2023-05-08 06:16:18'),
(28, 9, 28, 0, '2023-05-08 06:18:13', '2023-05-08 06:18:13'),
(29, 10, 29, 0, '2023-05-08 06:33:25', '2023-05-08 06:33:25'),
(30, 10, 30, 0, '2023-05-08 06:33:46', '2023-05-08 06:33:46'),
(31, 10, 31, 0, '2023-05-08 06:34:23', '2023-05-08 06:34:23'),
(32, 10, 32, 0, '2023-05-08 06:34:54', '2023-05-08 06:34:54'),
(33, 10, 33, 0, '2023-05-08 06:35:30', '2023-05-08 06:35:30'),
(34, 10, 34, 0, '2023-05-08 06:36:00', '2023-05-08 06:36:00'),
(35, 10, 35, 0, '2023-05-08 06:36:35', '2023-05-08 06:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `created_at`, `updated_at`) VALUES
(1, 'Secondary High School', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(2, 'Secondary Senior High School', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(3, 'Bachelor of Science in Computer Science', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(4, 'Bachelor of Technology and Livelihood Education', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(5, 'Bachelor of Technical-Vocational Teacher Education', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(6, 'Bachelor of Science in Hospitality Management', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(7, 'Bachelor of Industrial Technology Major in Drafting', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(8, 'Bachelor of Industrial Technology Major in Garments Fashion and Design', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(9, 'Bachelor of Industrial Technology Major in Mechanical Technology', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(10, 'Bachelor of Industrial  Technology Major in Food and Service Management', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(11, 'Bachelor of Industrial Technology Major in Electrical Technology', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(12, 'Bachelor of Industrial Technology Major in Automotive Technology', '2023-05-08 05:04:57', '2023-05-08 05:04:57');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faqs_title` varchar(255) NOT NULL,
  `faqs_subtext` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faqs_title`, `faqs_subtext`, `created_at`, `updated_at`) VALUES
(1, 'Is my personal information safe when using the online appointment system?', 'Yes, your personal information is safe when using the online appointment system. We use industry-standard security protocols to protect your information and ensure that it is kept confidential.\r\n            ', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(2, 'What services can I book an appointment for using the online appointment system?', 'You can book an appointment for a variety of services, including student registration, transcript requests, and academic advising. Check the online appointment system for a full list of available services.\r\n            ', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(3, 'What should I do if I have a question or concern that is not addressed in the FAQs?', 'If you have a question or concern that is not addressed in the FAQs, please contact the Registrar\'s Office directly for assistance. You can find contact information on our website.\r\n            ', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(4, 'How far in advance should I book an appointment with the Registrar\'s Office?', 'We recommend booking your appointment at least a week in advance to ensure availability. Some services may have specific deadlines, so be sure to check the online appointment system for details.\r\n            ', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(5, 'Can I walk in for an appointment without booking in advance?', 'We strongly encourage clients to book their appointments in advance using the online appointment system. However, if you need immediate assistance and cannot book an appointment in advance, you may walk in and speak with a staff member if they are available. Please note that walk-ins may experience longer wait times and may not be able to receive the same level of service as those with appointments. \r\n            ', '2023-05-08 05:04:57', '2023-05-08 05:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `form_requirements` text NOT NULL,
  `form_process` varchar(255) NOT NULL,
  `form_avail` text NOT NULL,
  `form_who_avail` text NOT NULL,
  `form_max_time` text NOT NULL,
  `fee` int(11) NOT NULL,
  `fee_type` text NOT NULL,
  `pages` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `form_requirements`, `form_process`, `form_avail`, `form_who_avail`, `form_max_time`, `fee`, `fee_type`, `pages`, `created_at`, `updated_at`) VALUES
(1, 'Issuance of Transcript of Records', 'Clearance Form ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Students, Their Parents or Duly Authorized Representative ', '15 working days', 50, 'per page', '4', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(2, 'Issuance of Honorable Dismissal or Transfer Credentials', 'Clearance Form ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Students, Their Parents or Duly Authorized Representative  ', '3 working days', 50, 'per page', '4', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(3, 'CAV', 'TOR/ Diploma (Original and Photocopy) ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '3 working days', 50, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(4, 'Issuance of Certification', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '3 working days', 50, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(5, 'Authentication', 'Clearance Form and Documents for Authentication ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '1 working days', 20, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(6, 'Issuance of Form 137 (For Employment)', 'Clearance Form and Request Form issued by the Requesting School ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '5 working days', 50, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(7, 'Issuance of Form 137 (For Transfer Credential)', 'Clearance Form and Request Form issued by the Requesting School ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '5 working days', 0, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(8, 'Issuance of Form 138', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '30 minutes', 0, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(9, 'Issuance of Diploma', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '30 minutes (if diploma is already available)', 50, 'Collected as part of graduation fee', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(10, 'Issuance of Yearbook', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '30 minutes (if yearbook is already available)', 0, 'Collected as part of graduation fee', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(11, 'Re-issuance of Diploma', 'Affidavit of Loss', '15 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '15 minutes (if yearbook is already available)', 250, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(12, 'Re-issuance of COR', 'Affidavit of Loss', '15 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Students', '15 minutes', 20, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57'),
(13, 'Re-issuance of ID Card', 'Affidavit of Loss', '15 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Students', '15 minutes', 125, 'None', '1', '2023-05-08 05:04:57', '2023-05-08 05:04:57');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_04_02_023555_create_users_table', 1),
(5, '2023_04_02_215423_add_role_to_users_table', 1),
(6, '2023_04_03_132809_create_forms_table', 1),
(7, '2023_04_08_103243_create_appointments_table', 1),
(8, '2023_04_08_141501_create_bookings_table', 1),
(9, '2023_04_15_124648_create_announcements_table', 1),
(10, '2023_04_15_124801_create_faqs_table', 1),
(11, '2023_04_22_155709_create_appointment_slots_table', 1),
(12, '2023_05_07_030729_create_notifications_table', 1),
(13, '2023_05_07_075304_create_courses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('504fa04d-3e56-4dd3-a9c2-c1a64368d8ee', 'App\\Notifications\\AppRemarksUpdate', 'App\\Models\\User', 5, '{\"remarks\":\"Reschedule your appointment\",\"app_id\":\"3\",\"notif_type\":\"remarks\",\"title\":\"Appointment Rescheduling Request\",\"doc\":\"Issuance of Yearbook\",\"resched\":\"1\"}', NULL, '2023-05-08 06:40:52', '2023-05-08 06:40:52');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `acadYear` varchar(255) DEFAULT NULL,
  `gradYear` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `middleName`, `suffix`, `address`, `school_id`, `cell_no`, `civil_status`, `email`, `birthdate`, `status`, `gender`, `course`, `password`, `acadYear`, `gradYear`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'Admin', '', '', 'Tubod Lanao del Norte', '100949', '09357257056', 'Single', 'admin@gmail.com', '2000-08-17', 'Admin', 'Male', '', '$2y$10$D/UwxQsIXTg1G0ti.u6H1ufJ6/dKgBtAHCZIjBUT8WPP/B8zXEDC.', '2022-2023', '', '2023-05-08 05:04:57', '2023-05-08 05:04:57', 1),
(5, 'Olympio', 'Sumbilon', 'B', 'Jr', 'Tubod Lanao Del Norte', '1009449', '9066885153', 'Single', 'olympiosumbilon37@gmail.com', '2000-08-17', 'Undergraduate College Student (Bachelor\'s Degree Program)', 'Male', 'Bachelor of Science in Computer Science', '$2y$10$hOBkFylw4rd1VVCB1hh4BuswGcUOtL.Qe6TlIv9Ir.6s1Tp9lw53O', '2022-2023', NULL, '2023-05-08 05:21:00', '2023-05-08 05:21:00', 0),
(6, 'Marjie', 'Betacura', 'C', '', 'Maigo Lanao del Norte', '1009463', '09389812867', 'Single', 'mar.betacura@gmail.com', '2000-07-25', 'Undergraduate College Student (Bachelor\'s Degree Program)', 'Female', 'Bachelor of Science in Computer Science', '$2y$10$i1iz2HkMGA0vLbXU7bHEl.zHFgatL65kmTTdvalXUiRHscglUuXNO', '2018-2019', NULL, '2023-05-08 05:31:15', '2023-05-08 05:31:15', 0),
(7, 'Norsaifa', 'Musor', 'A', '', 'Linamon Lanao Del Norte', '1009522', '09501864540', 'Single', 'yinjayhan@gmail.com', '1999-08-29', 'Undergraduate College Student (Bachelor\'s Degree Program)', 'Female', 'Bachelor of Science in Computer Science', '$2y$10$9rq7P9tidoiFOtETz0U.oO3MqpRJfXB4LNvs7ibw.PbqOiVNcm5CS', '2022-2023', NULL, '2023-05-08 05:46:56', '2023-05-08 05:46:56', 0),
(8, 'Honey Bee', 'Ratonel', 'A', '', 'Maigo Lanao del Norte', '1009476', '09381784796', 'Single', 'ratonilhoneybee@gmail.com', '2000-06-01', 'Undergraduate College Student (Bachelor\'s Degree Program)', 'Female', 'Bachelor of Science in Computer Science', '$2y$10$FaudY376sDZjCdfwidRqXu42JI6ZRV1Uth4j5Bckl2BX5qPxHkzSa', '2018-2019', NULL, '2023-05-08 05:56:08', '2023-05-08 05:56:08', 0),
(9, 'John Carlo', 'Cabug', 'G', '', 'Maigo Lanao del Norte', '1005262', '09361768927', 'Single', 'johncarlocabug.03@gmail.com', '2001-08-25', 'Undergraduate College Student (Bachelor\'s Degree Program)', 'Male', 'Bachelor of Science in Computer Science', '$2y$10$QHqIdct8TAwT0P0rSm/weeJER6mciY8FurWqxTTnNZ/C4FXdBMwFa', '2018-2023', NULL, '2023-05-08 06:12:11', '2023-05-08 06:12:11', 0),
(10, 'Haziel Mae', 'Merto', 'R', '', 'Tubod Lanao Del Norte', '1009986', '09350628321', 'Single', 'mertohaziel@gmail.com', '2000-07-01', 'Undergraduate College Student (Bachelor\'s Degree Program)', 'Female', 'Bachelor of Science in Computer Science', '$2y$10$qH3zg3K6sDZA3H2.j8uhMuTiBmhdLNqklN02OpYVyawMGPMxUp0Hu', '2018-2019', NULL, '2023-05-08 06:32:26', '2023-05-08 06:32:26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_booking_number_unique` (`booking_number`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_form_id_foreign` (`form_id`);

--
-- Indexes for table `appointment_slots`
--
ALTER TABLE `appointment_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_slots_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `appointment_slots`
--
ALTER TABLE `appointment_slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `appointment_slots`
--
ALTER TABLE `appointment_slots`
  ADD CONSTRAINT `appointment_slots_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
