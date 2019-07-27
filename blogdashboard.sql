-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 06:11 PM
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
-- Database: `blogdashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'accessories', '2019-07-05 12:16:25', '2019-07-05 12:16:25'),
(3, 'category1', '2019-07-25 10:08:48', '2019-07-25 10:08:48'),
(4, 'category2', '2019-07-25 10:09:47', '2019-07-25 10:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `name`, `mobile`, `type`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'asss', 12333, 'complaint1', 'lorem ipsum', '2019-07-03 12:08:04', '2019-07-03 12:08:04'),
(2, 2, 'asss', 12333, 'complaint1', 'lorem ipsum', '2019-07-24 07:56:02', '2019-07-24 07:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_05_09_103437_create_roles_table', 1),
(9, '2019_05_09_120445_add_photo_id_column_to_users_table', 1),
(10, '2019_05_09_120622_create_photos_table', 1),
(11, '2019_05_11_114731_create_products_table', 1),
(12, '2019_05_11_114813_create_categories_table', 1),
(13, '2019_05_21_001834_add_api_token_column_to_users_table', 1),
(14, '2019_05_27_231054_create_orders_table', 1),
(15, '2019_06_23_160504_create_carts_table', 1),
(16, '2019_06_29_111027_add_verify_code_column_to_users_table', 1),
(17, '2019_06_29_131954_create_offers_table', 1),
(18, '2019_06_30_152413_create_complaints_table', 1),
(19, '2019_06_30_170223_add_mobile_column_to_users_table', 1),
(20, '2019_06_30_182026_create_favorites_table', 1),
(21, '2019_07_01_101254_add_address_column_to_order_table', 2),
(23, '2019_07_01_120734_add_block_column_to_user', 3),
(24, '2019_07_02_095930_create_notifications_table', 4),
(25, '2019_07_02_100252_create_user_notifications_table', 4),
(26, '2019_07_02_113022_add_offer_id_column_to_notifications_table', 5),
(28, '2019_07_02_121333_add_status_column_to_offers_table', 6),
(29, '2019_07_02_132814_create_packages_table', 7),
(30, '2019_07_02_162543_create_sponsers_table', 8),
(31, '2019_07_02_164135_add_flag_column_to_packages_table', 9),
(32, '2019_07_03_094518_create_sponsers_table', 10),
(33, '2019_07_03_094956_create_user_packages_table', 11),
(39, '2019_07_03_101954_create_sponser_add_table', 12),
(40, '2019_07_03_122505_add_top_ad_to_products_table', 13),
(41, '2019_07_22_141707_create_product_offers_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `offer_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `order_id`, `offer_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'تم تعديل الطلب', NULL, NULL),
(2, 1, NULL, 'تم تعديل الطلب', '2019-07-02 08:32:55', '2019-07-02 08:32:55'),
(3, 3, NULL, 'تم تعديل الطلب', '2019-07-02 08:35:43', '2019-07-02 08:35:43'),
(4, 4, NULL, 'تم انشاء طلب جديد', '2019-07-02 08:57:19', '2019-07-02 08:57:19'),
(6, 3, NULL, 'تم الغاء الطلب', '2019-07-02 09:02:41', '2019-07-02 09:02:41'),
(22, NULL, 18, 'تم اضافه عرض جديد', '2019-07-02 09:49:59', '2019-07-02 09:49:59'),
(23, NULL, 18, 'تم تعديلع العرض ', '2019-07-02 09:52:52', '2019-07-02 09:52:52'),
(24, NULL, 19, 'تم اضافه عرض جديد', '2019-07-02 10:32:15', '2019-07-02 10:32:15'),
(25, NULL, 4, 'تم تعديلع العرض ', '2019-07-02 10:33:48', '2019-07-02 10:33:48'),
(26, 4, NULL, 'تم تعديل الطلب', '2019-07-03 09:30:01', '2019-07-03 09:30:01'),
(27, 5, NULL, 'تم انشاء طلب جديد', '2019-07-03 09:30:48', '2019-07-03 09:30:48'),
(28, 5, NULL, 'تم الغاء الطلب', '2019-07-03 09:35:33', '2019-07-03 09:35:33'),
(29, 4, NULL, 'تم تعديل الطلب', '2019-07-03 09:35:43', '2019-07-03 09:35:43'),
(30, 7, NULL, 'تم انشاء طلب جديد', '2019-07-05 12:18:57', '2019-07-05 12:18:57'),
(31, 7, NULL, 'تم تعديل الطلب', '2019-07-05 12:20:36', '2019-07-05 12:20:36'),
(32, NULL, 20, 'تم اضافه عرض جديد', '2019-07-05 12:21:17', '2019-07-05 12:21:17'),
(33, NULL, 19, 'تم تعديلع العرض ', '2019-07-05 12:21:33', '2019-07-05 12:21:33'),
(34, 1, NULL, 'تم تعديل الطلب', '2019-07-22 09:59:50', '2019-07-22 09:59:50'),
(35, 6, NULL, 'تم تعديل الطلب', '2019-07-22 10:00:06', '2019-07-22 10:00:06'),
(36, NULL, 3, 'تم تعديلع العرض ', '2019-07-25 11:11:48', '2019-07-25 11:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `new_price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product_id`, `new_price`, `created_at`, `updated_at`, `status`) VALUES
(3, 1, 9000, '2019-07-02 09:41:34', '2019-07-25 11:11:48', 0),
(4, 1, 900, '2019-07-02 09:41:54', '2019-07-02 10:33:48', 1),
(5, 1, 900, '2019-07-02 09:42:51', '2019-07-02 09:42:51', 0),
(7, 1, 900, '2019-07-02 09:43:15', '2019-07-02 09:43:15', 0),
(8, 1, 900, '2019-07-02 09:43:31', '2019-07-02 09:43:31', 0),
(20, 1, 390, '2019-07-05 12:21:17', '2019-07-05 12:21:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deliver_time` time NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `status`, `deliver_time`, `address`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '00:02:09', '25 st street', '2019-05-28 22:00:00', '2019-07-22 09:59:49'),
(4, 4, 1, 1, '00:02:09', 'شارع مصر', '2019-07-02 08:57:19', '2019-07-03 09:35:43'),
(6, 2, 1, 1, '00:00:03', '233street', '2019-07-03 12:01:43', '2019-07-22 10:00:05'),
(7, 2, 4, 1, '00:00:54', '33rerr', '2019-07-05 12:18:57', '2019-07-05 12:18:57'),
(8, 2, 1, 0, '00:00:03', '233street', '2019-07-22 13:36:11', '2019-07-22 13:36:11'),
(9, 2, 1, 0, '00:00:03', '233street', '2019-07-24 07:45:17', '2019-07-24 07:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'package1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, porro.', 1000, '1 day', NULL, NULL),
(2, 'package32', 'updated ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus, upsuscipit quo ducimus atque, molestias ea quisquam ab minus exercitationem quidem, perspiciatis ad pariatur! Perspiciatis fugiat optio beatae odit dignissimos laboriosam magnam sapiente eius laudantium eveniet repellendus doloribus dicta illo asperiores voluptas', 2000, '7 يوم', NULL, '2019-07-03 07:42:29'),
(4, 'package4', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae, doloremque?', 299, '7 يوم', '2019-07-05 12:22:34', '2019-07-05 12:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `path`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', NULL, NULL),
(2, '10.jpg', '2019-07-01 11:47:15', '2019-07-01 11:54:13'),
(3, '10.jpg', '2019-07-01 12:00:11', '2019-07-01 12:00:11'),
(4, '10.jpg', '2019-07-22 08:37:21', '2019-07-22 08:37:21'),
(5, '12.jpg', '2019-07-22 08:41:35', '2019-07-22 08:41:35'),
(6, '8.jpg', '2019-07-22 08:43:17', '2019-07-22 08:43:17'),
(7, '8.jpg', '2019-07-24 12:02:49', '2019-07-24 12:02:49'),
(8, '12.jpg', '2019-07-24 12:05:25', '2019-07-24 12:05:25'),
(9, '8.jpg', '2019-07-24 12:07:34', '2019-07-24 12:07:34'),
(10, '8.jpg', '2019-07-24 12:09:16', '2019-07-24 12:09:16'),
(11, '8.jpg', '2019-07-24 12:10:59', '2019-07-24 12:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `top_ad` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `photo_id`, `name`, `description`, `price`, `created_at`, `updated_at`, `top_ad`) VALUES
(1, 1, 1, 'mobile1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem possimus aperiam fuga enim magnam quasi tempore perspiciatis quidem nulla saepe.', 1000.00, NULL, '2019-07-05 12:09:55', 1),
(2, 2, 1, 'camera', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim, obcaecati?', 1200.00, NULL, '2019-07-03 12:28:13', 1),
(3, 2, 1, 'product1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, recusandae!', 102.00, NULL, '2019-07-03 12:30:08', 1),
(4, 3, 1, 'product2', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, recusandae!', 504.00, NULL, '2019-07-05 12:09:32', 1),
(6, 1, 0, 'headphone', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, quaerat!', 1200.00, '2019-07-05 12:14:28', '2019-07-05 12:14:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_offers`
--

CREATE TABLE `product_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_offers`
--

INSERT INTO `product_offers` (`id`, `product_id`, `offer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(2, 'User', '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(3, 'Customer', '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(4, 'Sales', '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(5, 'shop', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsers`
--

CREATE TABLE `sponsers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsers`
--

INSERT INTO `sponsers` (`id`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(1, 1000, 'hour', NULL, NULL),
(3, 20000, 'day', NULL, NULL),
(4, 103, '3days', '2019-07-03 09:16:33', '2019-07-25 11:31:40'),
(5, 500, '3days', '2019-07-25 11:29:21', '2019-07-25 11:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `sponser_add`
--

CREATE TABLE `sponser_add` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `sponser_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponser_add`
--

INSERT INTO `sponser_add` (`id`, `user_id`, `product_id`, `sponser_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, NULL, NULL),
(2, 5, 2, 1, NULL, NULL),
(3, 4, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_id` int(10) UNSIGNED DEFAULT NULL,
  `verify_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `block` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `photo_id`, `verify_code`, `mobile`, `block`, `created_at`, `updated_at`) VALUES
(3, 2, 'Judy Carroll', 'timmy.rodriguez@example.org', '2019-07-02 07:43:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oPuWf2QQES', 'KXewiEP7VY', 0, '1749', 227085, 1, '2019-07-02 07:43:40', '2019-07-05 11:18:43'),
(4, 5, 'Burley Corkery', 'xmann@example.org', '2019-07-02 07:43:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uVFXnAvdkO', '33HhlwB3ft', 2, '1081', 46858, 1, '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(5, 5, 'Lucius Wehner', 'dayton.ernser@example.com', '2019-07-02 07:43:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nAx37tDr0W', '0wVOpR8h1w', 1, '1793', 53698, 0, '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(6, 3, 'Emelie Weber', 'vmayer@example.com', '2019-07-02 07:43:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZnWpu0QEJO', 'DF9pcVp1JZ', 1, '1293', 30512, 0, '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(7, 4, 'Rickie Roob', 'jaren.rodriguez@example.com', '2019-07-02 07:43:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yscoK5kANw', '4lSmz0mPOn', 2, '1502', 62373, 1, '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(8, 4, 'Nicklaus Friesen', 'delaney.hodkiewicz@example.com', '2019-07-02 07:43:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wHeqI3q1xz', 'xiyEk88vzd', 3, '1239', 7806, 0, '2019-07-02 07:43:40', '2019-07-02 07:43:40'),
(12, 3, 'amal', 'amal@yahoo.com', NULL, '12345678', NULL, NULL, 0, NULL, 12345678, 1, '2019-07-05 11:19:36', '2019-07-05 11:19:36'),
(13, 1, 'admin2', 'admin2@yahoo.com', NULL, '$2y$10$y/I.zl5npB.Vy6DMUKd.DOTiEbXqM812F8KIa1MDBwtpNIZfsJ8Bq', NULL, NULL, 0, NULL, NULL, 1, '2019-07-22 08:37:21', '2019-07-22 08:42:26'),
(14, 3, 'user1', 'user@mail.com', NULL, '123456', NULL, NULL, 6, NULL, 12333322, 1, '2019-07-22 08:43:17', '2019-07-22 08:43:17'),
(15, NULL, 'adem', 'adem@yahoo.com', NULL, '$2y$10$WZU.yFyGzSiZFaZD7rNp6OhOEQpDtwnHo8RvWD2ppJ55AAm.46/Ma', NULL, NULL, NULL, NULL, NULL, 1, '2019-07-22 11:15:56', '2019-07-22 11:15:56'),
(16, 1, 'admin', 'admin@mail.com', NULL, '$2y$10$znKNfi5CENFLHQ7aQAR4LeQdoWM2MpUd7WOceGbo3WrmZE1VtDWVa', NULL, 'fbUru3VBy7eMbFPF7SP1O3RL0jOtkBmBEWCzQvrBBAv616J87E8L4TGyt6w1', NULL, NULL, NULL, 1, '2019-07-25 12:54:03', '2019-07-25 12:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `notification_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `notification_id`, `created_at`, `updated_at`) VALUES
(1, 16, 1, NULL, NULL),
(2, 16, 2, NULL, NULL),
(3, 3, 2, NULL, NULL),
(5, 4, 3, NULL, NULL),
(6, 3, 5, NULL, NULL),
(7, 4, 8, NULL, NULL),
(8, 2, 20, NULL, NULL),
(9, 3, 20, NULL, NULL),
(10, 4, 20, NULL, NULL),
(11, 5, 20, NULL, NULL),
(12, 6, 20, NULL, NULL),
(13, 7, 20, NULL, NULL),
(14, 8, 20, NULL, NULL),
(15, 9, 20, NULL, NULL),
(16, 10, 20, NULL, NULL),
(26, 2, 22, NULL, NULL),
(27, 3, 22, NULL, NULL),
(28, 4, 22, NULL, NULL),
(29, 5, 22, NULL, NULL),
(30, 6, 22, NULL, NULL),
(31, 7, 22, NULL, NULL),
(32, 8, 22, NULL, NULL),
(33, 9, 22, NULL, NULL),
(34, 10, 22, NULL, NULL),
(35, 2, 23, NULL, NULL),
(36, 3, 23, NULL, NULL),
(37, 4, 23, NULL, NULL),
(38, 5, 23, NULL, NULL),
(39, 6, 23, NULL, NULL),
(40, 7, 23, NULL, NULL),
(41, 8, 23, NULL, NULL),
(42, 9, 23, NULL, NULL),
(43, 10, 23, NULL, NULL),
(44, 2, 24, NULL, NULL),
(45, 3, 24, NULL, NULL),
(46, 4, 24, NULL, NULL),
(47, 5, 24, NULL, NULL),
(48, 6, 24, NULL, NULL),
(49, 7, 24, NULL, NULL),
(50, 8, 24, NULL, NULL),
(51, 9, 24, NULL, NULL),
(52, 10, 24, NULL, NULL),
(53, 2, 25, NULL, NULL),
(54, 3, 25, NULL, NULL),
(55, 4, 25, NULL, NULL),
(56, 5, 25, NULL, NULL),
(57, 6, 25, NULL, NULL),
(58, 7, 25, NULL, NULL),
(59, 8, 25, NULL, NULL),
(60, 9, 25, NULL, NULL),
(61, 10, 25, NULL, NULL),
(62, 3, 26, NULL, NULL),
(63, 3, 27, NULL, NULL),
(64, 3, 28, NULL, NULL),
(65, 4, 29, NULL, NULL),
(66, 2, 30, NULL, NULL),
(67, 2, 31, NULL, NULL),
(68, 2, 32, NULL, NULL),
(69, 3, 32, NULL, NULL),
(70, 4, 32, NULL, NULL),
(71, 5, 32, NULL, NULL),
(72, 6, 32, NULL, NULL),
(73, 7, 32, NULL, NULL),
(74, 8, 32, NULL, NULL),
(75, 9, 32, NULL, NULL),
(76, 12, 32, NULL, NULL),
(77, 2, 33, NULL, NULL),
(78, 3, 33, NULL, NULL),
(79, 4, 33, NULL, NULL),
(80, 5, 33, NULL, NULL),
(81, 6, 33, NULL, NULL),
(82, 7, 33, NULL, NULL),
(83, 8, 33, NULL, NULL),
(84, 9, 33, NULL, NULL),
(85, 12, 33, NULL, NULL),
(86, 3, 34, NULL, NULL),
(87, 2, 35, NULL, NULL),
(88, 2, 36, NULL, NULL),
(89, 3, 36, NULL, NULL),
(90, 4, 36, NULL, NULL),
(91, 5, 36, NULL, NULL),
(92, 6, 36, NULL, NULL),
(93, 7, 36, NULL, NULL),
(94, 8, 36, NULL, NULL),
(95, 12, 36, NULL, NULL),
(96, 14, 36, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

CREATE TABLE `user_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_packages`
--

INSERT INTO `user_packages` (`id`, `user_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsers`
--
ALTER TABLE `sponsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponser_add`
--
ALTER TABLE `sponser_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_offers`
--
ALTER TABLE `product_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsers`
--
ALTER TABLE `sponsers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponser_add`
--
ALTER TABLE `sponser_add`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
