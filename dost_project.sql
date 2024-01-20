-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 03:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dost_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_no` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `employee_no`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Francis Belicario', 421232, 'Computer Scientist', '2023-07-18 23:57:05', '2023-07-18 23:57:05'),
(2, 'Clarence Abuzo', 242232, 'Researcher', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(3, 'Estefania Wuckert', 414748, 'Telecommunications Equipment Installer', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(4, 'Mateo Lesch', 385320, 'Painting Machine Operator', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(5, 'Maurine Dickens', 643538, 'Milling Machine Operator', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(6, 'Hildegard Lowe', 146598, 'Telephone Station Installer and Repairer', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(7, 'Peter Schumm Sr.', 772459, 'Lodging Manager', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(8, 'Fabian Boyle', 940939, 'Business Operations Specialist', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(9, 'Haley Jones', 671398, 'Educational Psychologist', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(10, 'Hollie Mosciski', 92221, 'Municipal Fire Fighter', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(11, 'Citlalli Hermann', 481730, 'Power Plant Operator', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(12, 'Beth Veum', 376043, 'Supervisor Correctional Officer', '2023-07-18 23:58:32', '2023-07-18 23:58:32'),
(13, 'Francis Belicario', 421232, 'Computer Scientist', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(14, 'Juston Kihn', 72508, 'Sawing Machine Tool Setter', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(15, 'Zander Mraz', 472409, 'Military Officer', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(16, 'Domingo Bayer', 499609, 'Transportation Worker', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(17, 'Ahmad White DDS', 782051, 'Tailor', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(18, 'Giovanny Deckow', 909470, 'Credit Authorizer', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(19, 'Willy Dooley', 75288, 'Pipefitter', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(20, 'Luella O\'Connell', 391709, 'Chemical Equipment Tender', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(21, 'Francisca Ferry', 188793, 'Furniture Finisher', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(22, 'Wilton Glover', 864370, 'Forensic Science Technician', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(23, 'Sydni Nienow III', 311292, 'Train Crew', '2023-07-19 00:00:06', '2023-07-19 00:00:06'),
(24, 'Kylle Adyzza Mendoza', 522854, 'Computer Scientist', NULL, NULL),
(25, 'Edfer Abello', 421232, 'Computer Scientist', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(26, 'Mac Ledner', 431373, 'Technical Specialist', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(27, 'Tre Rosenbaum ', 227745, 'Infantry Officer', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(28, 'Erica Hills', 421751, 'Semiconductor Processor', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(29, 'Elissa Cummings', 67086, 'Gas Appliance Repairer', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(30, 'Sid Stroman Sr.', 792728, 'Textile Machine Operator', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(31, 'Magnolia Osinski', 416706, 'Architectural Drafter', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(32, 'Tyrese Murazik DVM', 510082, 'Airline Pilot OR Copilot OR Flight Engineer', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(33, 'Marcus Cartwright', 809572, 'Sheriff', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(34, 'Antwon Keebler IV', 487548, 'Rail Transportation Worker', '2023-07-19 00:01:06', '2023-07-19 00:01:06'),
(35, 'Rigoberto Beer Jr.', 665247, 'Sales Person', '2023-07-19 00:01:06', '2023-07-19 00:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_07_012757_create_payrolls', 1),
(6, '2023_07_17_023010_create_employee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `serial_no` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_no` int(11) NOT NULL,
  `monthly_salary` double(10,2) NOT NULL,
  `hazard_rate` double(10,2) NOT NULL,
  `gross_hazard_pay` double(10,2) NOT NULL,
  `total_days` double(10,2) NOT NULL,
  `actual_hazard_pay` double(10,2) NOT NULL,
  `adjustment` double(10,2) NOT NULL,
  `net_hazard_pay` double(10,2) NOT NULL,
  `rate` double(10,2) NOT NULL,
  `withholding_tax` double(10,2) NOT NULL,
  `dempco` double(10,2) NOT NULL,
  `total_deductions` double(10,2) NOT NULL,
  `net_amount_due` double(10,2) NOT NULL,
  `select_period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`serial_no`, `name`, `designation`, `employee_no`, `monthly_salary`, `hazard_rate`, `gross_hazard_pay`, `total_days`, `actual_hazard_pay`, `adjustment`, `net_hazard_pay`, `rate`, `withholding_tax`, `dempco`, `total_deductions`, `net_amount_due`, `select_period`, `created_at`, `updated_at`) VALUES
(1, 'Zander Mraz', 'Military Officer', 472409, 39672.00, 30.00, 11901.60, 18.00, 9737.67, 0.00, 9737.67, 0.20, 1947.53, 0.00, 1947.53, 7790.14, 'May', '2023-07-19 00:04:27', '2023-07-19 00:14:03'),
(2, 'Giovanny Deckow', 'Credit Authorizer', 909470, 90078.00, 15.00, 13511.70, 22.00, 13511.70, 0.00, 13511.70, 0.25, 3377.93, 0.00, 3377.93, 10133.78, 'May', '2023-07-19 00:05:22', '2023-07-19 00:09:25'),
(3, 'Mac Ledner', 'Technical Specialist', 431373, 46725.00, 15.00, 7008.75, 22.00, 7008.75, 0.00, 7008.75, 0.20, 1401.75, 5607.00, 7008.75, 0.00, 'May', '2023-07-19 00:05:57', '2023-07-19 00:05:57'),
(4, 'Peter Schumm Sr.', 'Military Officer', 772459, 39672.00, 30.00, 11901.60, 21.00, 11360.62, 0.00, 11360.62, 0.20, 2272.12, 0.00, 2272.12, 9088.50, 'May', '2023-07-19 00:06:34', '2023-07-19 00:07:21'),
(5, 'Hollie Mosciski', 'Municipal Fire Fighter', 92221, 39672.00, 15.00, 5950.80, 22.00, 5950.80, 0.00, 5950.80, 0.20, 1190.16, 0.00, 1190.16, 4760.64, 'May', '2023-07-19 00:07:08', '2023-07-19 00:07:08'),
(6, 'Ahmad White DDS', 'Tailor', 782051, 42232.00, 13.00, 5490.16, 31.00, 7736.13, 1.00, 7735.13, 0.10, 773.51, 0.00, 773.51, 6961.62, 'June', '2023-07-19 00:12:31', '2023-07-19 00:12:31'),
(7, 'Elissa Cummings', 'Gas Appliance Repairer', 67086, 23200.00, 45.00, 10440.00, 22.00, 10440.00, 0.00, 10440.00, 0.35, 3654.00, 0.00, 3654.00, 6786.00, 'June', '2023-07-19 00:13:10', '2023-07-19 00:13:10'),
(8, 'Kylle Adyzza Mendoza', 'Military Officer', 522854, 4444.00, 99.00, 4399.56, 23.00, 4599.54, 0.00, 4599.54, 0.50, 2299.77, 0.00, 2299.77, 2299.77, 'February', '2023-07-19 00:13:44', '2023-08-01 17:02:57'),
(9, 'Domingo Bayer', 'Transportation Worker', 499609, 73232.00, 2.00, 1464.64, 28.00, 1864.09, 2.00, 1862.09, 0.00, 0.00, 0.00, 0.00, 1862.09, 'November', '2023-07-19 00:14:32', '2023-07-19 00:14:32'),
(10, 'Magnolia Osinski', 'Architectural Drafter', 416706, 25232.00, 23.00, 5803.36, 2.00, 527.58, 0.00, 527.58, 0.20, 105.52, 0.00, 105.52, 422.06, 'February', '2023-07-19 00:15:13', '2023-07-19 00:15:13'),
(11, 'Erica Hills', 'Semiconductor Processor', 421751, 52132.00, 22.00, 11469.04, 32.00, 16682.24, 12322.00, 4360.24, 0.90, 3924.22, 0.00, 3924.22, 436.02, 'March', '2023-07-19 00:16:37', '2023-07-19 00:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Charles', 'itscharlesm@gmail.com', NULL, '$2y$10$AqL3bhH0cmiDHCjILDJzXOpa0dnNnwvexKjwP4MljJDXyOTEHxT8K', NULL, '2023-07-18 23:51:59', '2023-07-18 23:51:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`serial_no`);

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `serial_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
