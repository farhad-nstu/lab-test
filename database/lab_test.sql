-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 07:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_lists`
--

CREATE TABLE `block_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block_lists`
--

INSERT INTO `block_lists` (`id`, `user_id`, `ip`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, '5.161.62.218', 'd91j5c', '2022-03-01 18:50:25', '2022-03-01 18:50:25'),
(2, 1, '5.161.62.218', 'd91j5c', '2022-03-01 18:59:30', '2022-03-01 18:59:30'),
(3, 1, '5.161.62.218', 'd91j5c', '2022-03-01 19:15:49', '2022-03-01 19:15:49'),
(4, 1, '5.161.62.218', 'd91j5c', '2022-03-01 19:21:46', '2022-03-01 19:21:46');

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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `link`, `user_id`, `ip`, `location`, `latitude`, `longitude`, `browser`, `os`, `device`, `prev_browser`, `created_at`, `updated_at`) VALUES
(1, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-02-01 17:40:18', '2022-03-01 17:40:18'),
(2, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:49:49', '2022-03-01 18:49:49'),
(3, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:49:56', '2022-03-01 18:49:56'),
(4, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:50:02', '2022-03-01 18:50:02'),
(5, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:50:17', '2022-03-01 18:50:17'),
(6, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:51:58', '2022-03-01 18:51:58'),
(7, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:59:10', '2022-03-01 18:59:10'),
(8, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:59:14', '2022-03-01 18:59:14'),
(9, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:59:17', '2022-03-01 18:59:17'),
(10, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 18:59:23', '2022-03-01 18:59:23'),
(11, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 19:06:35', '2022-03-01 19:06:35'),
(12, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 19:15:34', '2022-03-01 19:15:34'),
(13, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 19:15:42', '2022-03-01 19:15:42'),
(14, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 19:15:46', '2022-03-01 19:15:46'),
(15, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 19:21:34', '2022-03-01 19:21:34'),
(16, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 19:21:38', '2022-03-01 19:21:38'),
(17, 'd91j5c', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-01 19:21:41', '2022-03-01 19:21:41'),
(18, 'wrz3gv', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-03 05:30:56', '2022-03-03 05:30:56'),
(19, 'wrz3gv', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-03 05:35:34', '2022-03-03 05:35:34'),
(20, 'wrz3gv', 1, '5.161.62.218', 'Washington, DC, US', '38.9072', '-77.0369', 'Chrome', 'Windows', 'Desktop', NULL, '2022-03-03 05:38:54', '2022-03-03 05:38:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_26_212008_create_logs_table', 1),
(6, '2022_02_26_215206_create_url_shorts_table', 2),
(7, '2022_03_01_235626_create_block_lists_table', 3);

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
-- Table structure for table `url_shorts`
--

CREATE TABLE `url_shorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `click_limitation` int(11) DEFAULT NULL,
  `expiry_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `url_shorts`
--

INSERT INTO `url_shorts` (`id`, `link`, `click_limitation`, `expiry_time`, `created_at`, `updated_at`) VALUES
(1, 'd91j5c', NULL, '2022-03-28', '2022-02-26 15:55:38', '2022-02-26 15:55:38'),
(2, 'w1j9xa', NULL, '2022-02-28', '2022-02-26 15:55:48', '2022-02-26 15:55:48'),
(3, 'wrz3gv', 3, '2022-03-31', '2022-03-03 05:21:10', '2022-03-03 05:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1 for admin and 2 for user',
  `user_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `user_photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Forhad', 'forhad@gmail.com', '01735693811', '$2y$10$Oa3BHHUPuqi4x5Ey7Kc/lenNRxZRzGK4OgRIBlNRg1dp69SGhjUWm', '1', NULL, NULL, '2022-02-26 15:50:40', '2022-02-26 15:50:40'),
(2, 'test-user', 'test-user@gmail.com', '01234123211', '$2y$10$VC1KkkJfp26sw6oZUh6J2e10jPtLWrFEl0CRHjAdIBGWZ/ZGDxvg.', '2', '1646284500.jpeg', NULL, '2022-03-03 05:15:00', '2022-03-03 05:20:19'),
(3, 'test-2', 'test-2@gmail.com', '0123453211', '$2y$10$ESiQQeEJKoVVT1IfV1uT.ebu6o7/J3hGAT9PFjxwJob9cIRjBkEm2', '2', NULL, NULL, '2022-03-03 05:41:01', '2022-03-03 05:41:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_lists`
--
ALTER TABLE `block_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_lists_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `url_shorts`
--
ALTER TABLE `url_shorts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_shorts_link_unique` (`link`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block_lists`
--
ALTER TABLE `block_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `url_shorts`
--
ALTER TABLE `url_shorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block_lists`
--
ALTER TABLE `block_lists`
  ADD CONSTRAINT `block_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
