-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 04:44 AM
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
-- Database: `registrardb`
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
(1, 'Closed Transactions on April 28, 2023', 'This is an important announcement from the Office of the Registrar. Due to necessary maintenance and upgrades, our registration system will be temporarily down for one week, starting Monday, April 10th at 8:00 am and ending Monday, April 17th at 8:00 am.  ', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(2, 'Closed Transactions on April 21, 2023', 'We would like to inform you that our registrar\'s office will be closed on April 21 2023, in observance of Eid al-Fitr, the festival of breaking the fast that marks the end of Ramadan.\r\n            ', '2023-05-06 16:44:18', '2023-05-06 16:44:18');

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
(1, 'fsfse', '2023', 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'B000001', 2, 1, '2023-05-06 16:46:09', '2023-05-06 16:46:09'),
(2, 'afsefesf', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'B000002', 2, 4, '2023-05-06 17:01:07', '2023-05-06 17:01:07'),
(3, 'asfsdf', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 2, NULL, 'B000003', 5, 4, '2023-05-06 17:04:40', '2023-05-06 17:04:40'),
(4, 'asdfsdf', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'B000004', 6, 4, '2023-05-06 17:19:34', '2023-05-06 17:19:34'),
(5, 'for appliying job', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT-2023-05-000005', 4, 5, '2023-05-06 17:28:31', '2023-05-06 17:28:31'),
(6, 'SFSEFE', NULL, 'May 11, 2023', 'Walk-in', NULL, 0, 'null', 0, 'null', 'Pending', 1, NULL, 'MSUMSAT2023-05-0006-60', 4, 8, '2023-05-06 17:31:11', '2023-05-06 17:31:11');

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
(1, '2023-05-11', 10, 0, NULL, '2023-05-06 16:45:28', '2023-05-06 16:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2023-05-06 16:46:09', '2023-05-06 16:46:09'),
(2, 2, 2, '2023-05-06 17:01:07', '2023-05-06 17:01:07'),
(3, 5, 3, '2023-05-06 17:04:40', '2023-05-06 17:04:40'),
(4, 6, 4, '2023-05-06 17:19:34', '2023-05-06 17:19:34'),
(5, 4, 5, '2023-05-06 17:28:31', '2023-05-06 17:28:31'),
(6, 4, 6, '2023-05-06 17:31:11', '2023-05-06 17:31:11');

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
(1, 'Is my personal information safe when using the online appointment system?', 'Yes, your personal information is safe when using the online appointment system. We use industry-standard security protocols to protect your information and ensure that it is kept confidential.\r\n            ', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(2, 'What services can I book an appointment for using the online appointment system?', 'You can book an appointment for a variety of services, including student registration, transcript requests, and academic advising. Check the online appointment system for a full list of available services.\r\n            ', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(3, 'What should I do if I have a question or concern that is not addressed in the FAQs?', 'If you have a question or concern that is not addressed in the FAQs, please contact the Registrar\'s Office directly for assistance. You can find contact information on our website.\r\n            ', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(4, 'How far in advance should I book an appointment with the Registrar\'s Office?', 'We recommend booking your appointment at least a week in advance to ensure availability. Some services may have specific deadlines, so be sure to check the online appointment system for details.\r\n            ', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(5, 'Can I walk in for an appointment without booking in advance?', 'We strongly encourage clients to book their appointments in advance using the online appointment system. However, if you need immediate assistance and cannot book an appointment in advance, you may walk in and speak with a staff member if they are available. Please note that walk-ins may experience longer wait times and may not be able to receive the same level of service as those with appointments. \r\n            ', '2023-05-06 16:44:18', '2023-05-06 16:44:18');

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
(1, 'Issuance of Transcript of Records', 'Clearance Form ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Students, Their Parents or Duly Authorized Representative ', '15 working days', 50, 'per page', '4', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(2, 'Issuance of Honorable Dismissal or Transfer Credentials', 'Clearance Form ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Students, Their Parents or Duly Authorized Representative  ', '3 working days', 50, 'per page', '4', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(3, 'CAV', 'TOR/ Diploma (Original and Photocopy) ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '3 working days', 50, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(4, 'Issuance of Certification', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '3 working days', 50, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(5, 'Authentication', 'Clearance Form and Documents for Authentication ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '1 working days', 20, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(6, 'Issuance of Form 137 (For Employment)', 'Clearance Form and Request Form issued by the Requesting School ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '5 working days', 50, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(7, 'Issuance of Form 137 (For Transfer Credential)', 'Clearance Form and Request Form issued by the Requesting School ', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '5 working days', 0, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(8, 'Issuance of Form 138', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '30 minutes', 0, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(9, 'Issuance of Diploma', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '30 minutes (if diploma is already available)', 50, 'Collected as part of graduation fee', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(10, 'Issuance of Yearbook', 'Clearance Form', '30 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '30 minutes (if yearbook is already available)', 0, 'Collected as part of graduation fee', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(11, 'Re-issuance of Diploma', 'Affidavit of Loss', '15 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Graduates, Their Parents or Duly Authorized Representative ', '15 minutes (if yearbook is already available)', 250, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(12, 'Re-issuance of COR', 'Affidavit of Loss', '15 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Students', '15 minutes', 20, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18'),
(13, 'Re-issuance of ID Card', 'Affidavit of Loss', '15 minutes', 'Monday to Friday (8:00 AM to 5:00 PM) ', 'Students', '15 minutes', 125, 'None', '1', '2023-05-06 16:44:18', '2023-05-06 16:44:18');

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
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2023_04_02_023555_create_users_table', 1),
(27, '2023_04_02_215423_add_role_to_users_table', 1),
(28, '2023_04_03_132809_create_forms_table', 1),
(29, '2023_04_08_103243_create_appointments_table', 1),
(30, '2023_04_08_141501_create_bookings_table', 1),
(31, '2023_04_15_124648_create_announcements_table', 1),
(32, '2023_04_15_124801_create_faqs_table', 1),
(33, '2023_04_22_155709_create_appointment_slots_table', 1);

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
(1, 'Admin', 'Admin', '', '', 'Tubod Lanao del Norte', '100949', '09357257056', 'Single', 'admin@gmail.com', '2000-08-17', 'Admin', 'Male', '', '$2y$10$izqcVSJQl8SkvQKC2vAHHuYo1FFUy.wySl4ZRTUQSoQArh.O9.X86', '2022-2023', '', '2023-05-06 16:44:18', '2023-05-06 16:44:18', 1),
(2, 'Olympio', 'Sumbilon', 'B', 'Jr.', 'Tubod Lanao del Norte', '100949', '09357258656', 'Single', 'olympio@gmail.com', '2000-08-17', 'Undergraduate college', 'Male', 'Bachelor of Science in Computer Science', '$2y$10$h3NsLIRQrpzz6BCKkwDaJOUsWX7HFaPIbK.yoANgN44BpjIyJbAcC', '2022-2023', '', '2023-05-06 16:44:18', '2023-05-06 16:44:18', 0),
(3, 'Meriflor', 'Gonoy', 'N', '', 'Libertad Kolambugan Lanao del Norte', '100950', '09357258681', 'Single', 'meriflor@gmail.com', '2000-10-21', 'Undergraduate college', 'Female', 'Bachelor of Science in Hospitality Management', '$2y$10$jtY6aYe7qooiYAl937ZC7OBUazsJSl37Sr1ugr0.ZD1ERea4CaZ3G', '2022-2023', '', '2023-05-06 16:44:19', '2023-05-06 16:44:19', 0),
(4, 'Bryan', 'Ladion', '', '', 'Kauswagan Lanao del Norte', '100951', '09357258601', 'Single', 'bryan@gmail.com', '2000-07-18', 'Undergraduate college', 'Male', 'Bachelor of Technology and Livelihood Education', '$2y$10$57s/BpwjBrcOQO4J5g1cc.DBo5pdfnyr./L3oY3RTaAcv4Fi0m6Ci', '2022-2023', '', '2023-05-06 16:44:19', '2023-05-06 16:44:19', 0),
(5, 'Olympio', 'Sumbilon', '', '', 'TCES', '1213', '09357258657', 'Single', 'olympiosumbilon17@gmail.com', '2000-08-17', 'undergraduate_student', 'Male', 'Bachelor of Science in Computer Science', '$2y$10$j.jG9ll0.5DeHusp5NsitOolW8s096dYAsE5yZFwZ6j.uEvdTjU2a', '2023', NULL, '2023-05-06 17:04:06', '2023-05-06 17:04:06', 0),
(6, 'Jeanlou', 'Dongon', 'O.', '', 'TCES', '12321312', '9066825154', 'Single', 'olympiosumbilon37@gmail.co', '2000-08-17', 'undergraduate_student', 'Female', 'Bachelor of Industrial Technology Major in Drafting', '$2y$10$LsaBLzq.u7ntIIANjm4.8eVaa2pIneRjNthF4ZanIuyXpi8U5skuO', '2021', NULL, '2023-05-06 17:10:01', '2023-05-06 17:10:01', 0);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment_slots`
--
ALTER TABLE `appointment_slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
