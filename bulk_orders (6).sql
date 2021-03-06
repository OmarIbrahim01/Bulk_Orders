-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2018 at 02:30 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulk_orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `company` text COLLATE utf8mb4_unicode_ci,
  `country` text COLLATE utf8mb4_unicode_ci,
  `city` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `phone2` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `total`, `name`, `company`, `country`, `city`, `address`, `shipping_address`, `phone`, `phone2`, `email`, `status_id`, `created_at`, `updated_at`) VALUES
(9, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-21 06:35:27', '2018-03-21 06:35:27'),
(10, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-21 06:36:42', '2018-03-21 06:36:42'),
(8, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-21 06:35:05', '2018-03-21 06:35:05'),
(7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-19 07:59:45', '2018-03-19 07:59:45'),
(5, 1, 12373800, 'Omar', 'Reyanaa', 'Egypt', 'Cairo', 'qweqweqwe', 'asdasdsad', '32161261', NULL, 'omar@live.com', 2, '2018-03-19 06:53:48', '2018-03-19 06:53:57'),
(6, 1, 73800, 'Ibrahim', 'Reyana', 'UAE', 'Dubai', 'qweqweqwe', 'asdasdasd', '21551', NULL, 'omar@live.com', 2, '2018-03-19 06:58:11', '2018-03-19 07:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 111, '2018-03-18 09:40:42', '2018-03-18 09:40:42'),
(8, 3, 1, 600, '2018-03-18 12:36:40', '2018-03-18 12:36:40'),
(9, 3, 1, 500, '2018-03-18 12:36:43', '2018-03-18 12:36:43'),
(10, 3, 2, 455, '2018-03-18 12:36:46', '2018-03-18 12:36:46'),
(14, 4, 1, 50, '2018-03-19 06:35:25', '2018-03-19 06:35:25'),
(12, 4, 2, 98, '2018-03-19 05:55:02', '2018-03-19 05:55:02'),
(15, 4, 2, 50, '2018-03-19 06:35:36', '2018-03-19 06:35:36'),
(16, 5, 1, 123123, '2018-03-19 06:53:51', '2018-03-19 06:53:51'),
(17, 5, 2, 123, '2018-03-19 06:53:53', '2018-03-19 06:53:53'),
(18, 6, 1, 123, '2018-03-19 07:59:36', '2018-03-19 07:59:36'),
(19, 6, 2, 123, '2018-03-19 07:59:38', '2018-03-19 07:59:38'),
(50, 7, 1, 50, '2018-03-26 11:33:11', '2018-03-26 11:33:11'),
(48, 7, 1, 200, '2018-03-26 10:59:56', '2018-03-26 10:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2018_03_15_074317_create_products_table', 1),
(30, '2018_03_15_074510_create_carts_table', 1),
(31, '2018_03_15_074546_create_items_table', 1),
(32, '2018_03_15_110148_create_product_images_table', 1),
(33, '2018_03_16_150227_create_order_statuses_table', 1),
(34, '2018_03_26_105919_create_min_quantities_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

DROP TABLE IF EXISTS `order_statuses`;
CREATE TABLE IF NOT EXISTS `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(2, 'Requested', 'qweqweqweqweqweqwe', NULL, NULL),
(3, 'Reviewing', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensions` text COLLATE utf8mb4_unicode_ci,
  `thickness` text COLLATE utf8mb4_unicode_ci,
  `weight` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `min_quantity` int(11) DEFAULT NULL,
  `main_image_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `dimensions`, `thickness`, `weight`, `price`, `min_quantity`, `main_image_path`, `created_at`, `updated_at`) VALUES
(1, 'A4 Maqutte', 'Wooden maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.', '21x29.7', '12', NULL, 100, NULL, '/img/A4 Maqutte/main.jpg', '2018-03-19 22:00:00', '2018-03-28 06:25:48'),
(2, 'A3 Maqutte', 'Wooden maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.', '29.7x42', '12', NULL, 200, NULL, '/img/A3 Maqutte/main.jpg', '2018-03-19 22:00:00', '2018-03-19 22:00:00'),
(3, 'A2 Maqutte', 'Wooden maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.', '40x60', '12', NULL, 350, NULL, '/img/A2 Maqutte/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(4, 'A0 Maqutte', 'Wooden maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.', '120x80', '12', NULL, 550, NULL, '/img/A0 Maqutte/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(5, 'Medal Small', 'Wooden medal cut to design size with custom high quality printed acrylic front side,\r\nyou can choose from hundreds of our designs.', '6x9', '3', NULL, 50, NULL, '/img/Medal Small/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(6, 'Medal Medium', 'Wooden medal cut to design size with custom high quality printed acrylic front side,\r\nyou can choose from hundreds of our designs.', '7x10.5', '3', NULL, 100, NULL, '/img/Medal Medium/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(7, 'Medal Large', 'Wooden medal cut to design size with custom high quality printed acrylic front side,\r\nyou can choose from hundreds of our designs.', '8x12', '3', NULL, 150, NULL, '/img/Medal Large/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(8, 'Name Tag', 'Wooden name-tag cut to design size with custom high quality printed acrylic front side,\r\nyou can choose from hundreds of our designs.', '8x4', '3', NULL, 50, NULL, '/img/Name Tag/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(9, 'Coaster', 'Wooden mug-coaster with custom high quality printed acrylic front side,\r\nyou can choose from hundreds of our designs.', '9x9', '3', NULL, 100, NULL, '/img/Coaster/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(10, '1.8M Maqutte', 'Wooden maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.', '200x120', '12', NULL, 1200, NULL, '/img/1.8M Maqutte/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(11, '1.8M 3D Maqutte', 'Wooden 3D maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.', '200x120', '12', NULL, 1600, NULL, '/img/1.8M 3D Maqutte/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(12, 'A0 3D Maqutte', 'Wooden 3D maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.', '120x80', '12', NULL, 800, NULL, '/img/A0 3D Maqutte/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(17, 'A4 Puzzle', 'Wooden Puzzle maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.\r\n', '21x29.7', '12', NULL, 150, NULL, '/img/A4 Puzzle/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(18, 'A3 Puzzle', 'Wooden Puzzle maquette cut to design size with custom high quality printed acrylic front side\r\nand a wooden backstand,\r\nyou can choose from hundreds of our designs.\r\n', '29.7x42', '12', NULL, 300, NULL, '/img/A3 Puzzle/main.jpg', '2018-03-20 22:00:00', '2018-03-20 22:00:00'),
(27, 'qqqqq', 'qq', '12x12', '12', '50', 200, 5, '/img/qqqqq/main.jpg', '2018-03-29 08:01:45', '2018-03-29 08:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, '/img/A4 Maqutte/1.jpg', NULL, NULL),
(2, 1, '/img/A4 Maqutte/2.jpg', NULL, NULL),
(3, 1, '/img/A4 Maqutte/3.jpg', NULL, NULL),
(4, 2, '/img/A3 Maqutte/1.jpg', NULL, NULL),
(5, 2, '/img/A3 Maqutte/2.jpg', NULL, NULL),
(6, 3, '/img/A2 Maqutte/1.jpg', NULL, NULL),
(7, 3, '/img/A2 Maqutte/2.jpg', NULL, NULL),
(8, 3, '/img/A2 Maqutte/3.jpg', NULL, NULL),
(9, 4, '/img/A0 Maqutte/1.jpg', NULL, NULL),
(10, 4, '/img/A0 Maqutte/2.jpg', NULL, NULL),
(11, 4, '/img/A0 Maqutte/3.jpg', NULL, NULL),
(12, 5, '/img/Medal Small/1.jpg', NULL, NULL),
(13, 5, '/img/Medal Small/2.jpg', NULL, NULL),
(14, 5, '/img/Medal Small/3.jpg', NULL, NULL),
(15, 5, '/img/Medal Small/4.jpg', NULL, NULL),
(16, 5, '/img/Medal Small/5.jpg', NULL, NULL),
(17, 5, '/img/Medal Small/6.jpg', NULL, NULL),
(18, 6, '/img/Medal Medium/1.jpg', NULL, NULL),
(19, 6, '/img/Medal Medium/2.jpg', NULL, NULL),
(20, 6, '/img/Medal Medium/3.jpg', NULL, NULL),
(21, 6, '/img/Medal Medium/4.jpg', NULL, NULL),
(22, 6, '/img/Medal Medium/5.jpg', NULL, NULL),
(23, 6, '/img/Medal Medium/6.jpg', NULL, NULL),
(24, 7, '/img/Medal Large/1.jpg', NULL, NULL),
(25, 7, '/img/Medal Large/2.jpg', NULL, NULL),
(26, 7, '/img/Medal Large/3.jpg', NULL, NULL),
(27, 7, '/img/Medal Large/4.jpg', NULL, NULL),
(28, 7, '/img/Medal Large/5.jpg', NULL, NULL),
(29, 7, '/img/Medal Large/6.jpg', NULL, NULL),
(30, 8, '/img/Name Tag/1.jpg', NULL, NULL),
(31, 9, '/img/Coaster/1.jpg', NULL, NULL),
(32, 9, '/img/Coaster/2.jpg', NULL, NULL),
(102, 27, '/img/qqqqq/hostgator domains.png', '2018-03-29 08:01:45', '2018-03-29 08:01:45'),
(92, 23, '/img/bbb/adminnote1.PNG', '2018-03-28 06:37:29', '2018-03-28 06:37:29'),
(88, 21, '/img/zxczxczxc/hack1.PNG', '2018-03-28 06:35:14', '2018-03-28 06:35:14'),
(101, 27, '/img/qqqqq/adminnote1.PNG', '2018-03-29 08:01:45', '2018-03-29 08:01:45'),
(100, 27, '/img/qqqqq/adminnote.PNG', '2018-03-29 08:01:45', '2018-03-29 08:01:45'),
(86, 19, '/img/qweqweqwe/ssl.PNG', '2018-03-28 06:26:40', '2018-03-28 06:26:40'),
(98, 24, '/img/qwe/antivirus.PNG', '2018-03-28 07:00:42', '2018-03-28 07:00:42'),
(83, 19, '/img/qweqweqwe/adminnote1.PNG', '2018-03-28 06:26:40', '2018-03-28 06:26:40'),
(85, 19, '/img/qweqweqwe/name-domains.png', '2018-03-28 06:26:40', '2018-03-28 06:26:40'),
(74, 11, '/img/1.8M 3D Maqutte/2.jpg', NULL, NULL),
(76, 17, '/img/A4 Puzzle/1.jpg', NULL, NULL),
(77, 18, '/img/A3 Puzzle/1.jpg', NULL, NULL),
(71, 12, '/img/A0 3D Maqutte/2.jpg', NULL, NULL),
(73, 11, '/img/1.8M 3D Maqutte/1.jpg', NULL, NULL),
(72, 12, '/img/A0 3D Maqutte/3.jpg', NULL, NULL),
(70, 12, '/img/A0 3D Maqutte/1.jpg', NULL, NULL),
(103, 27, '/img/qqqqq/name-domains.png', '2018-03-29 08:01:45', '2018-03-29 08:01:45'),
(99, 24, '/img/qwe/name-domains.png', '2018-03-28 07:00:42', '2018-03-28 07:00:42'),
(97, 24, '/img/qwe/adminnote1.PNG', '2018-03-28 07:00:42', '2018-03-28 07:00:42'),
(96, 24, '/img/qwe/adminnote.PNG', '2018-03-28 07:00:42', '2018-03-28 07:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'min_quantity', '1000', '2018-03-23 22:00:00', '2018-03-28 12:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `country`, `address`, `phone`, `mobile`, `email`, `password`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Omar', 'Reyana', 'Egypt', 'alfnanfveajnfae', '1231231232133', NULL, 'omar@live.com', '$2y$10$4KRg.M58YhmjCQFYEQubYu9i9v0NIdfXs/QsNF9b6rN6rzPa6xgbm', 1, 'IVq7XtwwaBUiJYDO9XHruXGfwZukFaQttnmGzUSJ3IjPfy41ODvRF4M3iWdZ', NULL, NULL),
(2, 'Jumbo', 'Reyanaad', 'Egypty', '22a;i', '01111111111111', '090990909099099', 'jumbo@live.com', '$2y$10$VrJgKyOu.YeHik73G9ng..tLsTXx7QU5KhPCbqUQJtn35RNe2SB1i', 0, 'QbecRxiZTDkkKNVvceFEaUYOhluFQFdDeNfhdVFagzBEeOlIcFcQssF79uFz', '2018-03-18 07:25:42', '2018-03-18 07:25:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
