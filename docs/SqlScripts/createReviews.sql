-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2021 a las 01:22:20
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chandis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `rating` double(8,2) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  CONSTRAINT reviews_eco_product_foreign FOREIGN KEY (eco_product_id) REFERENCES eco_products(id),
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

--
-- Volcado de datos para la tabla `reviews`
--


INSERT IGNORE INTO `reviews` (`id`, `rating`, `title`, `message`, `eco_product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4.00, 'Student', 'Meh', 4, 4, NULL, NULL),
(2, 5.00, 'Hiiii', 'WOW', 4, 4, '2021-04-07 03:53:13', NULL),
(3, 3.00, 'Freak', 'A lot', 4, 4, '2021-04-06 23:13:02', NULL),
(4, 4.00, 'Awesome', 'The best straw ever', 4, 4, '2021-04-04 20:45:28', NULL),
(5, 3.00, 'Basic', 'Not a great product', 4, 4, '2021-04-04 20:49:28', NULL),
(6, 5.00, 'Top tier', 'Amazing product', 4, 4, '2021-04-04 20:49:28', NULL),
(7, 3.00, 'Not great', 'Not a great product', 5, 3, '2021-04-04 20:00:28', NULL),
(8, 3.00, 'Expected more', 'What i said, expected more', 5, 3, '2021-04-04 20:03:28', NULL),
(9, 5.00, 'LOVE IT', 'I have been amazed at how easy this works', 5, 3, '2021-03-11 20:49:28', NULL),
(10, 5.00, 'Hype', 'I have been thoroughly impressed by this', 6, 3, '2021-03-04 20:49:28', NULL),
(11, 1.00, 'I hate it', 'Not satisfied for the price & everything', 6, 3, '2021-03-04 20:49:00', NULL),
(12, 1.00, 'The worst', 'After using this for a few months I have to say this is the worst', 6, 1, '2021-03-04 20:05:28', NULL),
(13, 2.00, 'Impossible to clean & so messy', 'Had to throw it away after the third use bc it’s impossible to clean and SO messy', 7, 2, '2021-02-04 20:49:01', NULL),
(14, 5.00, 'Not expensive', 'Just as the title says. Not too much money for the size and quality of it.', 7, 1, '2021-02-04 20:50:28', NULL),
(15, 5.00, 'So convenient', 'You get what you pay for', 7, 2, '2021-02-05 20:49:28', NULL),
(16, 3.00, 'Just OK', 'This was recommended on a blog I read, so I figured it is good', 8, 2, '2021-04-05 20:46:55', NULL),
(17, 4.00, 'Good buy', 'Love this product', 8, 1, '2021-04-05 20:49:28', NULL),
(18, 2.00, 'Don’t buy', 'Very poor quality and customer service', 8, 1, '2021-04-01 20:33:28', NULL),
(19, 5.00, 'Wonderfull', 'Super cute product', 8, 1, '2021-04-01 22:49:28', NULL),
(20, 4.00, 'What i expected', 'Absolutely what i expected', 9, 1, '2021-04-02 21:49:28', NULL),
(21, 5.00, 'Just buy it', 'Kids love it', 9, 1, '2021-04-02 22:49:28', NULL),
(22, 3.00, 'Freak', 'A lot', 4, 1, '2021-04-06 23:13:02', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reviews`
--

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews` AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reviews`
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

