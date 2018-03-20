-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2018 at 03:06 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `total`, `name`, `company`, `country`, `city`, `address`, `shipping_address`, `phone`, `phone2`, `email`, `status_id`, `created_at`, `updated_at`) VALUES
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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(34, 7, 1, 600, '2018-03-20 12:42:26', '2018-03-20 12:42:26'),
(33, 7, 1, 5000, '2018-03-20 06:38:39', '2018-03-20 06:38:39'),
(32, 7, 1, 5000, '2018-03-20 06:17:51', '2018-03-20 06:17:51');

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(33, '2018_03_16_150227_create_order_statuses_table', 1);

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
  `price` int(11) NOT NULL,
  `min_quantity` int(11) DEFAULT NULL,
  `main_image_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `min_quantity`, `main_image_path`, `created_at`, `updated_at`) VALUES
(1, 'A4 Maqutte', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It use', 100, 500, '/img/a4/main.jpg', '2018-03-19 22:00:00', '2018-03-19 22:00:00'),
(2, 'A3 Maqutte', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It use', 500, 100, '/img/a3/main.jpg', '2018-03-19 22:00:00', '2018-03-19 22:00:00'),
(3, 'A2 Maqutte', 'asdasdasd', 100, 500, 'img/a2/main.jpg', NULL, NULL),
(4, 'A0 Maqutte', 'asdasdasd', 100, 100, '/img/a0/main.jpg', NULL, NULL),
(5, 'Medal Small', 'qweqwe', 100, 100, '/img/medal_small/main.jpg', NULL, NULL),
(6, 'Medal Medium', 'qwewqe', 122, 1212, 'img/medal_medium/main.jpg', NULL, NULL),
(7, 'A2 Maqutte', 'asdasdasd', 100, 500, 'img/a2/main.jpg', NULL, NULL),
(8, 'A0 Maqutte', 'asdasdasd', 100, 100, '/img/a0/main.jpg', NULL, NULL),
(9, 'Medal Small', 'qweqwe', 100, 100, '/img/medal_small/main.jpg', NULL, NULL),
(10, 'Medal Medium', 'qwewqe', 122, 1212, 'img/medal_medium/main.jpg', NULL, NULL),
(11, 'Medal Large', 'qweqwe', 122, 122, '/img/medal_large/main.jpg', NULL, NULL),
(12, 'Name Tag', 'asdasd', 122, 122, '/img/name_tag/main.jpg', NULL, NULL),
(13, 'Coaster', 'qweqeqwe', 122, 122, '/img/coaster/main.jpg', NULL, NULL),
(14, '1.8M Maqutte', 'qweqeqwe', 122, 122, '/img/1.8m/main.jpg', NULL, NULL),
(15, '1.8M 3D Maqutte', 'asdasd', 122, 122, '/img/1.8m_3d/main.jpg', NULL, NULL),
(16, 'A0 3D Maqutte', 'asdasd', 222, 222, '/img/a0_3d/main.jpg', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, '/img/a4/1.jpg', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `country`, `address`, `phone`, `mobile`, `email`, `password`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Omar', 'Reyana', 'Egypt', 'alfnanfveajnfae', '1231231232133', NULL, 'omar@live.com', '$2y$10$4KRg.M58YhmjCQFYEQubYu9i9v0NIdfXs/QsNF9b6rN6rzPa6xgbm', 0, 'CZwbuHRrr3NDuuQSVn6nFbBpRx3u4qwuvpdsis2WX7MxE2MLe47q88g78hSY', NULL, NULL),
(2, 'Jumbo', 'Reyanaad', 'Egypty', '22a;i', '01111111111111', '090990909099099', 'jumbo@live.com', '$2y$10$VrJgKyOu.YeHik73G9ng..tLsTXx7QU5KhPCbqUQJtn35RNe2SB1i', 0, 'QbecRxiZTDkkKNVvceFEaUYOhluFQFdDeNfhdVFagzBEeOlIcFcQssF79uFz', '2018-03-18 07:25:42', '2018-03-18 07:25:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
