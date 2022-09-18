-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 05:54 AM
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
-- Table structure for table `eco_products`
--

CREATE TABLE `eco_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `facts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emision` double(8,2) NOT NULL,
  `product_life` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_eco_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eco_products`
--

INSERT INTO `eco_products` (`id`, `name`, `price`, `stock`, `facts`, `description`, `categories`, `emision`, `product_life`, `photo`, `not_eco_product_id`, `created_at`, `updated_at`) VALUES
(4, 'Bamboo Straws', 13.20, 0, 'Bamboo is the FASTEST growing land plant in the world... The only thing that grows quicker is giant sea kelp in the ocean!', 'A wonderful Six pack of ecological and reusable bamboo straws. Includes straw cleaner and a little bag.', 'straws, bamboo, daily use', 38.80, 3650, 'bambooStraw.jpg', 1, '2021-04-04 03:44:51', '2021-04-04 03:44:51'),
(5, 'Metalic Straw', 11.00, 25, 'Unlike some alternatives like bamboo or glass straws, stainless steel straws don\'t break easily and can even hold up against rust.', 'A wonderful four pack of ecological and reusable colorful metalic straws. Includes straw cleaner.', 'daily use, straw, metalic', 217.00, 3650, 'metalicStraws.jpg', 1, '2021-04-04 03:44:51', '2021-04-04 03:44:51'),
(6, 'Paper Straw', 7.00, 123, 'Paper is biodegradable and comes from trees, which is a renewable resource.', 'A pack of 40 colorful paper straws.', 'Daily use, straw, paper', 1.38, 1, 'paperStraws.jpg', 1, '2021-04-15 03:48:40', '2021-04-15 03:48:40'),
(7, 'Collapsible straw', 7.99, 123, 'Did you know that straws are among the top 10 items found during beach clean ups? That makes them a major threat to marine and bird life around the world.', 'Two amazing stainless steel collapsible straws, pink and blue. Whit box.', 'Daily use, straw, collapsible', 222.00, 3650, 'collapsibleStraw.jpg', 1, '2021-04-13 03:48:40', '2021-04-13 03:48:40'),
(8, 'Bamboo Toothbrush', 9.99, 699, 'Bamboo Toothbrushes are VEGAN!', 'Four colorful bamboo toothbrush.', 'Daily use, bamboo, toothbrush, vegan', 90.00, 90, 'bambooToothbrush.jpg', 4, '2021-04-06 03:51:37', '2021-04-06 03:51:37'),
(9, 'Reusable makeup remover cotton pads', 9.99, 699, 'Cotton pads are vegan!', '16 Reusable makeup remover cotton pads, 12 are soft bamboo and 4 are scrub bamboo.', 'Daily use, bamboo, toothbrush, vegan', 32.40, 360, 'reusable-makeup-remover-pads-bamboo.jpg', 5, '2021-04-23 03:51:37', '2021-04-23 03:51:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eco_products`
--
ALTER TABLE `eco_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eco_products_not_eco_product_foreign` (`not_eco_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eco_products`
--
ALTER TABLE `eco_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eco_products`
--
ALTER TABLE `eco_products`
  ADD CONSTRAINT `eco_products_not_eco_product_foreign` FOREIGN KEY (`not_eco_product`) REFERENCES `not_eco_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
