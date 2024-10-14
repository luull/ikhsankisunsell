-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 04:09 PM
-- Server version: 8.0.39
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kisuncell`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `endpoint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_code` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_19_051248_add_profile_fields_to_users_table', 1),
(5, '2024_06_25_034150_add_profile_photo_to_users_table', 1),
(6, '2024_08_12_024747_create_api_keys_table', 1),
(7, '2024_08_12_024842_create_api_logs_table', 1),
(8, '2024_09_17_035742_create_products_table', 1),
(9, '2024_09_17_042853_drop_transaction_table', 1),
(10, '2024_09_18_124725_drop_transactions_table', 1),
(11, '2024_09_24_041737_create_transactions_table', 1),
(12, '2024_10_08_113247_add_transfer_proof_to_transactions_table', 2),
(13, '2024_10_08_135949_add_product_id_to_transactions_table', 3),
(14, '2024_10_08_140641_change_product_id_to_product_code_in_transactions_table', 4),
(15, '2024_10_08_141634_create_personal_access_tokens_table', 5),
(16, '2024_10_09_115055_rename_produk_to_name_in_products_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `provider`, `product_name`, `kode_produk`, `harga`, `description`, `created_at`, `updated_at`) VALUES
(6, 'XL', 'XL 5.000', 'XL5', 5660.00, 'Pulsa XL 5000', '2024-10-14 13:43:48', NULL),
(7, 'XL', 'XL 10.000', 'XL10', 10950.00, 'Pulsa XL 10.000', '2024-10-14 13:43:48', NULL),
(8, 'XL', 'XL 25.000', 'XL25', 25750.00, 'Pulsa XL 25.000', '2024-10-14 13:43:48', NULL),
(9, 'XL', 'XL 50.000', 'XL50', 50800.00, 'Pulsa XL 50.000', '2024-10-14 13:43:48', NULL),
(10, 'Telkomsel', 'Telkomsel 5.000', 'TLKM5', 5235.00, 'Pulsa Telkomsel 5000', '2024-10-14 13:43:48', NULL),
(11, 'Telkomsel', 'Telkomsel 10.000', 'TLKM10', 10350.00, 'Pulsa Telkomsel 10.000', '2024-10-14 13:43:48', NULL),
(12, 'Telkomsel', 'Telkomsel 25.000', 'TLKM25', 24750.00, 'Pulsa Telkomsel 25.000', '2024-10-14 13:43:48', NULL),
(13, 'Telkomsel', 'Telkomsel 50.000', 'TLKM50', 50700.00, 'Pulsa Telkomsel 50.000', '2024-10-14 13:43:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ERZ11N33r1UHVQVqKn6UiYpN0SeDQZdsxXWyLyn5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', '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', 1728910778),
('qzBnhahhRBnC4bNvScSRatlgRrAqEwwR8vLb1OVO', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', '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', 1728911300);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transfer_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `ref_id`, `user_id`, `product_code`, `produk`, `provider`, `no_hp`, `amount`, `status`, `payment_reference`, `created_at`, `updated_at`, `transfer_proof`) VALUES
(12, '88fdd43e-3a73-4cf8-9022-2fd2320361b9', '1', 'TLKM5', 'Telkomsel 5.000', 'Telkomsel', '081586298430', 5235, 'approved', NULL, '2024-10-14 05:09:21', '2024-10-14 05:56:22', 'transfer_proofs/kOLP2LeeMQYN3kjHAXYbiWYdUBi6gsxAfJ7A34uK.jpg'),
(13, '2b7e3228-fc50-4fbd-9ea0-85f6ab05af89', '1', 'AX5', 'Axis 5.000', 'Axis', '081586298430', 5595, 'approved', NULL, '2024-10-14 05:59:28', '2024-10-14 06:00:17', 'transfer_proofs/YomSj1TEQg94Ke9BmKaPZLSceDZJHDPKADIgbg0S.jpg'),
(14, '7a36d24e-8bbb-45b3-9069-121c0d2fd537', '1', 'AX5', 'Axis 5.000', 'Axis', '081586298430', 5595, 'pending', NULL, '2024-10-14 06:04:21', '2024-10-14 06:04:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `no_hp`, `email`, `role`, `profile_photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bagus', '1234567891', 'bagus123@gmail.com', 'customer', NULL, NULL, '$2y$12$jurM4eV88W92Vwpd9.mtouJz.1EkgtIC1M4AEgthq13StwGOFc2kG', NULL, '2024-06-17 14:16:19', '2024-10-05 18:06:20'),
(2, 'bujang', '0812223313', 'mamang@gmail.com', 'customer', NULL, NULL, '$2y$12$XXow.VGYch/MNMU9KGsZnecdZTjdbzHc5Uvh2/sjE/M8la/LYnkGC', NULL, '2024-07-01 14:10:07', '2024-07-06 22:00:13'),
(3, 'faddam', '088844443322', 'faddam123@gmail.com', 'customer', NULL, NULL, '$2y$12$Jd7bpk30h4ys0nD7nhNCEe4yuun5dtpOo/15Nn2puKzU8LwJLVqE2', NULL, '2024-07-09 13:26:39', '2024-07-09 13:26:39'),
(4, 'faddam', '0888767878686', 'faddam11@gmail.com', 'customer', NULL, NULL, '$2y$12$gFXXdlUDvUgv3Gyb4uZOROITsDRVTrk/UHt7hhBXBKSUthrJviRtm', NULL, '2024-07-15 13:49:02', '2024-07-15 13:49:02'),
(5, 'admin', '08213217372', 'admin@gmail.com', 'admin', NULL, NULL, '$2y$12$OzhDQeD5j..ThHMev8ttVuj2/yvHsQeCsBzpOjhwKSf/Wgxd8nvYy', NULL, '2024-10-07 08:18:21', '2024-10-07 08:18:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
