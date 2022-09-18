-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 04:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wecop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT IGNORE INTO `users` (`id`, `user_name`, `name`, `credit_card`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'catas', 'catalina', NULL, 'catalina.lopez1999@gmail.com', '$2y$10$qffTcEm3OoQGi2V7AmGpEOzHYHHDc7x7PKw8lywNKtQkB9pNcnv3i', 'admin', '2021-03-23 04:19:13', '2021-03-23 04:19:13'),
(2, 'Shiroke', 'Andrés Chaves', NULL, 'adchavesp@eafit.edu.co', '$2y$10$oiZxxr/5eIjCe5P6UYNiPOls5MqfrJI6nReuGPdQT7w8QEz4GF9sS', 'admin', '2021-04-04 07:22:06', '2021-04-04 07:22:06'),
(3, 'Fedex', 'Federico Perez', NULL, 'fperezm1@eafit.edu.co', '$2y$10$oQRl4nTCHl6c5YGO9BvDFu/DDjRx6tgvDGl9.dtvg6mRgRQEKF5MK', 'admin', '2021-04-04 07:23:35', '2021-04-04 07:23:35'),
(4, 'Pachito', 'Pedrito Gonzalez', NULL, 'pgonzalez@eafit.edu.co', '$2y$10$bjtYYiIRsoTZCyGQKamf6.MvFg87RTC4SYpxDUkw5S5oGM3AoISWG', 'client', '2021-04-04 07:24:30', '2021-04-04 07:24:30'),
(5, 'Chucho', 'Miguel Cardona', NULL, 'mcardona2@eafit.edu.co', '$2y$10$6i0Xwgv8VK05nYwsNjlTLelgMab0VUXVGYg/F/GQPUrQsTYtLcUdW', 'client', '2021-04-04 07:25:18', '2021-04-04 07:25:18'),
(6, 'Profe', 'Daniel Correa', NULL, 'dcorreab@eafit.edu.co', '$2y$10$XLGCedgdJZ5RR/avqVk0y.zRgExoYmtHqkWPn1D.OCDGBZ9Yg9c8S', 'admin', '2021-04-04 07:27:37', '2021-04-04 07:27:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
