-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 05:44 AM
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
-- Table structure for table `not_eco_products`
--

CREATE TABLE IF NOT EXISTS `not_eco_products` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `emision` double(8,2) NOT NULL,
  `product_life` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

--
-- Dumping data for table `not_eco_products`
--

INSERT IGNORE INTO `not_eco_products` (`id`, `name`, `price`, `emision`, `product_life`, `created_at`, `updated_at`) VALUES
(1, 'Common Straw', 0.01, 1.46, 1, '2021-03-23 04:20:10', '2021-03-23 04:20:10'),
(4, 'Common Toothbrush', 2.74, 160.00, 90, '2021-04-04 03:42:00', '2021-04-04 03:42:00'),
(5, 'Common makeup remover pads', 2.99, 19.70, 1, '2021-04-04 03:42:00', '2021-04-04 03:42:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `not_eco_products`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `not_eco_products`
--
ALTER TABLE `not_eco_products` AUTO_INCREMENT=6;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;