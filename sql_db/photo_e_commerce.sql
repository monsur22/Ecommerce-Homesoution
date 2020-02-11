-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 03:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Car', 0, '2019-07-28 00:50:57', '2019-10-18 06:01:22'),
(4, 'Nature', 0, '2019-07-28 00:51:04', '2019-10-18 06:01:40'),
(5, 'Art', 0, '2019-07-28 00:51:10', '2019-10-18 06:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cricketers`
--

CREATE TABLE `cricketers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `start_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cricketers`
--

INSERT INTO `cricketers` (`id`, `Name`, `image`, `category`, `end_time`, `start_value`, `status`, `created_at`, `updated_at`) VALUES
(2, 'wergh', 'public/Cricketer/2019/gut5A-053949-pNo.jpg', '4', '2019-07-09 18:12:00', '200', '0', '2019-07-28 11:39:49', '2019-07-28 11:39:49'),
(3, '1234', 'public/Cricketer/2019/bextB-054420-DwB.jpg', '5', '2019-07-28 00:30:00', '200', '0', '2019-07-28 11:44:20', '2019-07-28 11:44:20'),
(4, 'wergh', NULL, '4', '2019-07-17 16:05:00', '200', '0', '2019-07-28 12:05:53', '2019-07-28 12:05:53'),
(5, 'wergh', NULL, '4', '2019-07-29 00:07:00', NULL, '0', '2019-07-28 12:07:17', '2019-07-28 12:07:17'),
(6, NULL, NULL, NULL, NULL, NULL, '0', '2019-07-28 12:09:40', '2019-07-28 12:09:40'),
(7, NULL, NULL, NULL, NULL, NULL, '0', '2019-07-28 14:16:27', '2019-07-28 14:16:27'),
(8, NULL, NULL, NULL, NULL, NULL, '0', '2019-07-28 18:18:58', '2019-07-28 18:18:58');

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
(3, '2019_07_19_133737_create_categories_table', 2),
(4, '2019_07_19_135351_create_adapt_posts_table', 3),
(5, '2019_07_22_033740_create_volunteers_table', 4),
(6, '2019_07_22_050244_create_contacts_table', 4),
(7, '2019_07_22_065521_create_request_controllers_table', 5),
(8, '2019_07_22_070503_create_request_posts_table', 6),
(9, '2019_07_28_065352_create_cricketers_table', 7),
(10, '2019_07_31_091549_create_products_table', 8),
(11, '2019_09_25_103611_create_shippings_table', 9),
(12, '2019_09_25_110415_create_payments_table', 10),
(13, '2019_09_25_110432_create_order_details_table', 10),
(14, '2019_09_25_110501_create_orders_table', 10),
(15, '2019_02_24_193233_create_verify_tokens_table', 11),
(16, '2019_02_25_080504_create_singups_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `order_total` double(10,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `customer_id`, `shipping_id`, `order_qty`, `order_total`, `user_id`, `order_status`, `created_at`, `updated_at`) VALUES
(9, '2019-09-28', 25, 16, 2, 550.00, '25', 'Pending', '2019-09-28 15:31:06', '2019-09-28 15:31:06'),
(10, '2019-10-17', 2, 17, 1, 300.00, '25', 'Pending', '2019-10-17 03:55:48', '2019-10-17 03:55:48'),
(11, '2019-10-17', 2, 18, 1, 250.00, '5', 'Pending', '2019-10-17 04:00:50', '2019-10-17 04:00:50'),
(12, '2019-10-17', 2, 19, 1, 250.00, '5', 'Pending', '2019-10-17 04:18:13', '2019-10-17 04:18:13'),
(13, '2019-10-17', 2, 20, 1, 300.00, '25', 'Pending', '2019-10-17 04:22:17', '2019-10-17 04:22:17'),
(14, '2019-10-17', 2, 21, 1, 250.00, '5', 'Pending', '2019-10-17 15:00:37', '2019-10-17 15:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `user_id`, `customer_id`, `product_name`, `product_url`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(10, 9, 2, '25', NULL, 'Testing', NULL, 300.00, 1, '2019-09-28 15:31:06', '2019-09-28 15:31:06'),
(11, 9, 1, '5', NULL, 'Image', NULL, 250.00, 1, '2019-09-28 15:31:06', '2019-09-28 15:31:06'),
(12, 10, 1, '5', NULL, 'Image', NULL, 250.00, 1, '2019-09-28 16:46:19', '2019-09-28 16:46:19'),
(13, 10, 2, '25', NULL, 'Testing', NULL, 300.00, 1, '2019-10-17 03:55:49', '2019-10-17 03:55:49'),
(14, 11, 1, '5', NULL, 'Image', 'public/Product_image/2019/IWlO5-081842-xbp.jpg', 250.00, 1, '2019-10-17 04:00:50', '2019-10-17 04:00:50'),
(15, 12, 1, '5', '2', 'Image', 'public/Product_image/2019/IWlO5-081842-xbp.jpg', 250.00, 1, '2019-10-17 04:18:14', '2019-10-17 04:18:14'),
(16, 13, 2, '25', '2', 'Testing', 'public/Product_image/2019/AbxoU-090526-nUn.jpg', 300.00, 1, '2019-10-17 04:22:17', '2019-10-17 04:22:17'),
(17, 14, 1, '5', '2', 'Image', 'public/Product_image/2019/IWlO5-081842-xbp.jpg', 250.00, 1, '2019-10-17 15:00:37', '2019-10-17 15:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('monsurahmedshafiq@gmail.com', '$2y$10$FtSYux0rCqIaoGPqOf8N4.m1sIJWTV4DsEVD7gqg5W4987lTq3pXW', '2019-09-10 13:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(9, 9, 'Cash', 'Pending', '2019-09-28 15:31:06', '2019-09-28 15:31:06'),
(10, 10, 'Cash', 'Pending', '2019-09-28 16:46:19', '2019-09-28 16:46:19'),
(11, 10, 'Cash', 'Pending', '2019-10-17 03:55:49', '2019-10-17 03:55:49'),
(12, 11, 'Cash', 'Pending', '2019-10-17 04:00:50', '2019-10-17 04:00:50'),
(13, 12, 'Cash', 'Pending', '2019-10-17 04:18:14', '2019-10-17 04:18:14'),
(14, 13, 'Cash', 'Pending', '2019-10-17 04:22:17', '2019-10-17 04:22:17'),
(15, 14, 'Cash', 'Pending', '2019-10-17 15:00:37', '2019-10-17 15:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productuniq_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `Price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`, `productuniq_id`, `image`, `category`, `description`, `Price`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Image', NULL, 'public/Product_image/2019/IWlO5-081842-xbp.jpg', '3', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', '250', 5, '1', '2019-07-31 03:52:02', '2019-09-27 06:23:06'),
(2, 'Testing', NULL, 'public/Product_image/2019/AbxoU-090526-nUn.jpg', '5', 'In a study recently published in the scientific journal Nature, a team of more than 150 scientists from 26 countries combined a large dataset from almost 2,000 sharks tracked across the world’s oceans. Studying the movements of these animals, the scientists identified the areas where multiple shark species aggregate, “shark hotspots”, which correspond to productive regions such as the Gulf Stream and the California Current. They then assessed the overlap of shark hotspots with the global distribution of fishing effort, focusing in particular on industrial longline fisheries.', '300', 25, '1', '2019-09-26 15:05:26', '2019-09-26 15:05:33'),
(3, 'wergh', NULL, 'public/Product_image/2019/LcQtz-090237-JLa.png', '4', 'asdfghjk', '12389', 2, '1', '2019-10-17 15:02:37', '2019-10-17 15:02:50'),
(4, 'Tata', '517628268', 'public/Product_image/2019/NyiRv-122512-Iql.jpg', '3', 'dfdfsf dfd', '250', 3, '1', '2019-10-18 06:25:13', '2019-10-18 06:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `request_posts`
--

CREATE TABLE `request_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_address` text COLLATE utf8mb4_unicode_ci,
  `request_user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_posts`
--

INSERT INTO `request_posts` (`id`, `title`, `post_id`, `post_category`, `post_image`, `post_user_id`, `request_user_id`, `post_address`, `request_user_email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Alaska malamuti', '4', '2', 'public/image/2019/cerHF-040912-MEv.jpg', '2', '2', '30/1,sukrabad,dhanmondi,dhaka\r\ncharpara,karimgonj,kishoregonj', NULL, '0', '2019-07-22 20:38:36', '2019-07-22 20:38:36'),
(3, 'Alaska malamuti', '4', '2', 'public/image/2019/cerHF-040912-MEv.jpg', '2', '3', '30/1,sukrabad,dhanmondi,dhaka\r\ncharpara,karimgonj,kishoregonj', NULL, '1', '2019-07-22 21:15:38', '2019-07-22 23:30:13'),
(4, 'Best Cat', '5', '1', 'public/image/2019/oYJdy-042909-N4V.jpg', '2', '2', '30/1,sukrabad,dhanmondi,dhaka\r\ncharpara,karimgonj,kishoregonj', 'user@email.com', '0', '2019-07-23 21:34:43', '2019-07-23 21:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `phone`, `email`, `address`, `message`, `created_at`, `updated_at`) VALUES
(16, 'Monsur Ahmed Shafifq', '12345678', 'monsurahmedshafiq@gmail.com', '30/1,sukrabad,dhanmondi,dhaka', 'asdfgh', '2019-09-28 15:31:01', '2019-09-28 15:31:01'),
(17, 'Md. Julfiker Ali', '123', 'nahianahmedcse@gmail.com', 'asdf', '123tyjk', '2019-10-17 03:55:44', '2019-10-17 03:55:44'),
(18, 'Nahian Ahmed', '123', 'admin@admin.com', 'asdfg', 'sdfghj', '2019-10-17 03:59:35', '2019-10-17 03:59:35'),
(19, 'Md. Julfiker Ali', '123', 'admin@email.com', 'House: 29-31, Road: 1, Sector: 2, Block: D, Aftabnagar, Dhaka.', 'dfghj', '2019-10-17 04:18:09', '2019-10-17 04:18:09'),
(20, 'Nahian Ahmed', '01714415122', 'admin@admin.com', 'qwert', 'sdfgh', '2019-10-17 04:22:12', '2019-10-17 04:22:12'),
(21, 'Monsur Ahmed Shafifq', '09876546789098', 'monsurahmedshafiq@gmail.com', '30/1,sukrabad,dhanmondi,dhaka', 'dfghjk', '2019-10-17 15:00:23', '2019-10-17 15:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `singups`
--

CREATE TABLE `singups` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `singups`
--

INSERT INTO `singups` (`id`, `firstname`, `lastname`, `pnumber`, `email`, `user_role`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'Admin', '12345678', 'admin@gmail.com', 'admin', '$2y$10$W2ITqg6C5SP0CRvaYsYbyeo70zkNa9PgvNLm2lc6rfv2oxNVBoxDm', '2019-10-11 14:11:10', '2019-10-11 14:15:48'),
(3, 'Monsur Ahmed', 'Shafiq', '12345678', 'monsurahmedshafiq@gmail.com', 'user', '$2y$10$W2ITqg6C5SP0CRvaYsYbyeo70zkNa9PgvNLm2lc6rfv2oxNVBoxDm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$0kItZMsJ.zMnwLOeGhvBEOM62nPGjFGM7zqh6MKepaokMQFivqxES', 'admin', NULL, '2019-07-11 10:35:20', '2019-07-11 10:35:20'),
(2, 'User', 'user@email.com', '2019-09-15 16:27:20', '$2y$10$PpEo2SfUyUkbRcuNN78oEOBrHmjxTss9KvYyDt0NonqxhzSdrDjkC', 'user', NULL, '2019-07-11 10:37:14', '2019-07-11 10:37:14'),
(3, 'User 2', 'user2@email.com', NULL, '$2y$10$QPiaK5PATHsTNBMcxuUcZ.InYxFK9VEhksXnRP/ZzKPk6dw.q4eq.', 'user', NULL, '2019-07-22 20:59:17', '2019-07-22 20:59:17'),
(6, 'User', 'user3@email.com', NULL, '$2y$10$SgKR36BuEIB3MfiTdMywku4Sgxpo1cF6g5IfGTe7SffC32S4XUjgK', 'user', NULL, '2019-08-05 14:47:40', '2019-08-05 14:47:40'),
(25, 'Monsur Ahmed Shafifq', 'monsurahmedshafiq@gmail.com', '2019-09-15 16:27:20', '$2y$10$HJiTpqe2kdAiBFIHr4eki.w7V6s4KdqdQNYceyS56pNcSPe.UMmFi', 'user', NULL, '2019-09-10 12:45:57', '2019-09-15 16:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `verify_tokens`
--

CREATE TABLE `verify_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_tokens`
--

INSERT INTO `verify_tokens` (`id`, `firstname`, `lastname`, `token`, `pnumber`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Monsur Ahmed', 'Shafiq', '992276164', '12345678', 'monsurahmedshafiq@gmail.com', '$2y$10$HBpfFRjsHpLy62KWNaCWkOSooOe9LYjKX3pNIq/CV64ND96pEe.oi', '2019-10-18 06:03:41', '2019-10-18 06:03:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cricketers`
--
ALTER TABLE `cricketers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_posts`
--
ALTER TABLE `request_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singups`
--
ALTER TABLE `singups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_tokens`
--
ALTER TABLE `verify_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cricketers`
--
ALTER TABLE `cricketers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_posts`
--
ALTER TABLE `request_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `singups`
--
ALTER TABLE `singups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `verify_tokens`
--
ALTER TABLE `verify_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
