-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2018 at 11:12 AM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurpreet_nanny`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hourly Price',
  `alt_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allergies_or_aversions` text COLLATE utf8mb4_unicode_ci,
  `worked_before` text COLLATE utf8mb4_unicode_ci,
  `children_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` text COLLATE utf8mb4_unicode_ci,
  `address_2` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role`, `email`, `password`, `first_name`, `last_name`, `image`, `gender`, `education`, `mobile`, `price`, `alt_mobile`, `allergies_or_aversions`, `worked_before`, `children_age`, `address_1`, `address_2`, `country`, `city`, `state`, `zip`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'gurpreet@avainfotech.com', '$2y$10$cHwZCBJHKr1qBG0AEVK.teiAjgjoeyu5MR119LIwdL.G/tNNNbQ5i', 'Barbie', 'Deinhoffs', '15282769875b5cc265cf4135803a46b3a210120f5b.jpg', 'male', 'Currently in College', '29369292', NULL, '29369292', 'no', 'yjjyyy', '2', 'Schlesische Str. 16, 10997, Berlin, Germany', NULL, NULL, 'Berlin', 'IL', '10997', 'XNASxh7Xu1pwwAzoceZV9S24S8rnsoOkZoeTWewDuEWPwNLtBBBgn0mWotxb', 1, NULL, '2018-06-06 03:53:07'),
(7, 'nanny', 'kuldeepjha@avainfotech.com', '$2y$10$4LCc33o/8TYhYhhTUJrDDudALb5mvzTlugdcpeZDSM/ZmaKQRsre6', 'Kuldeep', 'Jha', '1525091027user.png', 'male', 'Currently in College', '4214124124', NULL, 'dgsdg', 'awsfasfsf', 'asfsafasf', 'dsgsdg', 'sacfasfgdsgdsg gurpreet', NULL, NULL, 'chandigarh', 'AK', '134101', 'NuWtjk1qmDaFd5FBAOGEBPTGfveediVzKU9pud4PeWVQiru46OTHavISu05M', 1, '2018-04-30 06:53:48', '2018-05-07 04:13:09'),
(8, 'nanny', 'prateek@avainfotech.com', '$2y$10$4HCePrcBw8B5VRsuqkFsJOVFB/tjhiHImc4wJ4OpY/v.T3srhKT82', 'Prateek', 'sharma', '1528277074noimage.png', 'male', 'Associates Degree', '4214124124', NULL, 'cszcfxz', 'gvfdsagd', 'asfsafasf', 'sfafasf', 'sacfasfgdsgdsg gurpreet', NULL, NULL, 'chandigarh', 'DC', '13410156', 'x53m0t6jBDZSC23ywOUWZ1jtpuHZYrq7O7G9DvjtjRrmAdXnnb2UiKj7qbPP', 1, '2018-05-07 04:11:42', '2018-06-06 03:54:34'),
(9, 'nanny', 'rahulsharma@avainfotech.com', '$2y$10$W6GiCK3882d83pGqyveSj.Vus3uD3ZQXMOQ6KhUYfjgVjNC46I952', 'rahul', 'sharma', '1528277085noimage.png', 'female', 'Associates Degree', '4214124124', NULL, NULL, 'awsfasfsf', 'dsgdsg', 'sfafasf', 'sacfasfgdsgdsg gurpreet', NULL, NULL, 'Yamuna nagar', 'DE', '134101', NULL, 1, '2018-05-08 04:35:35', '2018-06-08 05:02:37'),
(10, 'nanny', 'srishti@avainfotech.com', '$2y$10$ePg8OxbvUoD8aK0TTjMz5OUD/InoQRbCtTDy4lOLsHTqJm6KuVfom', 'Srishti', 'sharma', '1525773994user.png', 'female', 'Currently in College', '1412214', NULL, NULL, 'gvfdsagd', 'safasf', 'fasfas', 'Kurukshetra', NULL, NULL, 'Kurukshetra', 'DC', '160002', 'oSdgt5DzNM8iZ6BxofNVcCbqoTEmqCBVjgYSRrk6p0M1P5Yk0nu24xungxFZ', 1, '2018-05-08 04:36:34', '2018-05-08 04:36:34'),
(11, 'nanny', 'bhumika@avainfotech.com', '$2y$10$jlazgZErgCeXOULX33CaA.rxi1eEvfGJZPG3fiGsyYkf9pw7dvfoS', 'Bhumika', 'grover', '1525774291user.png', 'female', 'Currently in Graduate School', '4214124124', NULL, 'dgsdg', 'awsfasfsf', 'safasf', 'fasfas', 'sacfasfgdsgdsg gurpreet', NULL, NULL, 'dsgdsg', 'AA', '134101', NULL, 1, '2018-05-08 04:41:31', '2018-05-08 04:41:31'),
(13, 'nanny', 'shivani@avainfotech.com', '$2y$10$os4FxfwakWdZc/v8fRwJOuv7tDwpBC2ZsTK87iITIMxhBfeoxADle', 'Shivani', 'Sharma', NULL, 'female', 'Undergraduate Degree', '244234234', NULL, NULL, 'dfvsdgvds', 'xvzxvxzv', 'vxzvzxv', 'xvxzvzxv', NULL, NULL, 'chandigarh', 'CA', '134101', NULL, 1, '2018-06-07 04:25:07', '2018-06-07 04:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `admin_services`
--

CREATE TABLE `admin_services` (
  `id` int(11) NOT NULL,
  `title` varchar(355) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_services`
--

INSERT INTO `admin_services` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Driving', 1, '2018-05-23 00:23:11', '2018-06-05 04:03:54'),
(2, 'Multiple Infant Care', 1, '2018-05-22 00:31:01', '2018-05-23 00:19:32'),
(3, 'Overnight Care', 1, '2018-05-22 00:31:13', '2018-05-22 09:45:00'),
(4, 'Hotel Care', 1, '2018-05-22 00:31:25', '2018-05-22 09:45:00'),
(5, 'Nanny Share', 1, '2018-05-22 00:31:34', '2018-05-22 09:45:00'),
(7, 'Hotel/On-Site Event Care', 1, '2018-05-22 04:05:03', '2018-05-22 04:14:38'),
(8, 'Hotel Nanny Share', 1, '2018-05-22 04:05:23', '2018-05-22 04:13:14'),
(12, 'Shirts', 1, '2018-06-06 03:17:32', '2018-06-06 08:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `id` int(11) NOT NULL,
  `order_id` int(255) DEFAULT NULL,
  `admin_id` int(255) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkins`
--

INSERT INTO `checkins` (`id`, `order_id`, `admin_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2018-05-23 03:42:29', '2018-05-23 05:58:32', '2018-05-23 03:42:29', '2018-05-23 09:12:45'),
(2, 1, 8, '2018-05-24 00:07:20', '2018-05-24 04:12:56', '2018-05-24 00:07:20', '2018-05-24 05:39:51'),
(3, 1, 8, '2018-05-25 04:10:00', '2018-05-25 07:11:00', '2018-05-25 04:10:00', '2018-05-25 07:11:00'),
(4, 3, 8, '2018-05-25 03:15:18', '2018-05-25 03:16:14', '2018-05-25 03:15:18', '2018-05-25 03:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `child_prices`
--

CREATE TABLE `child_prices` (
  `id` int(11) NOT NULL,
  `price_id` int(255) DEFAULT NULL,
  `child` int(255) DEFAULT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_prices`
--

INSERT INTO `child_prices` (`id`, `price_id`, `child`, `price`, `created_at`, `updated_at`) VALUES
(148, 1, 4, '33.00', '2018-05-23 01:47:01', '2018-05-23 01:47:01'),
(116, 5, 4, '33.00', '2018-05-23 01:45:54', '2018-05-23 01:45:54'),
(115, 5, 3, '30.00', '2018-05-23 01:45:54', '2018-05-23 01:45:54'),
(114, 5, 2, '27.00', '2018-05-23 01:45:54', '2018-05-23 01:45:54'),
(120, 6, 4, '44.00', '2018-05-23 01:46:12', '2018-05-23 01:46:12'),
(147, 1, 3, '30.00', '2018-05-23 01:47:01', '2018-05-23 01:47:01'),
(146, 1, 2, '27.00', '2018-05-23 01:47:01', '2018-05-23 01:47:01'),
(145, 1, 1, '30.00', '2018-05-23 01:47:01', '2018-05-23 01:47:01'),
(151, 2, 4, '29.00', '2018-05-23 01:47:07', '2018-05-23 01:47:07'),
(150, 2, 3, '26.00', '2018-05-23 01:47:07', '2018-05-23 01:47:07'),
(149, 2, 2, '23.00', '2018-05-23 01:47:07', '2018-05-23 01:47:07'),
(154, 3, 4, '31.00', '2018-05-23 01:47:14', '2018-05-23 01:47:14'),
(153, 3, 3, '28.00', '2018-05-23 01:47:14', '2018-05-23 01:47:14'),
(152, 3, 2, '25.00', '2018-05-23 01:47:14', '2018-05-23 01:47:14'),
(75, 4, 4, '31.00', '2018-05-23 01:32:51', '2018-05-23 01:32:51'),
(74, 4, 3, '28.00', '2018-05-23 01:32:51', '2018-05-23 01:32:51'),
(73, 4, 2, '25.00', '2018-05-23 01:32:51', '2018-05-23 01:32:51'),
(119, 6, 3, '40.00', '2018-05-23 01:46:12', '2018-05-23 01:46:12'),
(118, 6, 2, '36.00', '2018-05-23 01:46:12', '2018-05-23 01:46:12'),
(117, 6, 1, '20.00', '2018-05-23 01:46:12', '2018-05-23 01:46:12'),
(128, 7, 4, '36.00', '2018-05-23 01:46:25', '2018-05-23 01:46:25'),
(127, 7, 3, '33.00', '2018-05-23 01:46:25', '2018-05-23 01:46:25'),
(126, 7, 2, '30.00', '2018-05-23 01:46:25', '2018-05-23 01:46:25'),
(125, 7, 1, '30.00', '2018-05-23 01:46:25', '2018-05-23 01:46:25'),
(132, 8, 4, '36.00', '2018-05-23 01:46:32', '2018-05-23 01:46:32'),
(131, 8, 3, '33.00', '2018-05-23 01:46:32', '2018-05-23 01:46:32'),
(130, 8, 2, '30.00', '2018-05-23 01:46:32', '2018-05-23 01:46:32'),
(129, 8, 1, '30.00', '2018-05-23 01:46:32', '2018-05-23 01:46:32'),
(124, 9, 4, '26.00', '2018-05-23 01:46:18', '2018-05-23 01:46:18'),
(123, 9, 3, '23.00', '2018-05-23 01:46:18', '2018-05-23 01:46:18'),
(122, 9, 2, '20.00', '2018-05-23 01:46:18', '2018-05-23 01:46:18'),
(121, 9, 1, '20.00', '2018-05-23 01:46:18', '2018-05-23 01:46:18'),
(136, 10, 4, '30.00', '2018-05-23 01:46:38', '2018-05-23 01:46:38'),
(135, 10, 3, '27.00', '2018-05-23 01:46:38', '2018-05-23 01:46:38'),
(134, 10, 2, '24.00', '2018-05-23 01:46:38', '2018-05-23 01:46:38'),
(133, 10, 1, '24.00', '2018-05-23 01:46:38', '2018-05-23 01:46:38'),
(140, 11, 4, '26.00', '2018-05-23 01:46:45', '2018-05-23 01:46:45'),
(139, 11, 3, '23.00', '2018-05-23 01:46:45', '2018-05-23 01:46:45'),
(138, 11, 2, '20.00', '2018-05-23 01:46:45', '2018-05-23 01:46:45'),
(137, 11, 1, '20.00', '2018-05-23 01:46:45', '2018-05-23 01:46:45'),
(144, 12, 4, '30.00', '2018-05-23 01:46:50', '2018-05-23 01:46:50'),
(143, 12, 3, '27.00', '2018-05-23 01:46:50', '2018-05-23 01:46:50'),
(142, 12, 2, '24.00', '2018-05-23 01:46:50', '2018-05-23 01:46:50'),
(141, 12, 1, '24.00', '2018-05-23 01:46:50', '2018-05-23 01:46:50'),
(106, 13, 1, '20.00', '2018-05-23 01:39:12', '2018-05-23 01:39:12'),
(107, 13, 2, '20.00', '2018-05-23 01:39:12', '2018-05-23 01:39:12'),
(108, 13, 3, '23.00', '2018-05-23 01:39:12', '2018-05-23 01:39:12'),
(109, 13, 4, '26.00', '2018-05-23 01:39:12', '2018-05-23 01:39:12'),
(166, 14, 4, '30.00', '2018-06-05 04:04:44', '2018-06-05 04:04:44'),
(165, 14, 3, '27.00', '2018-06-05 04:04:44', '2018-06-05 04:04:44'),
(164, 14, 2, '24.00', '2018-06-05 04:04:44', '2018-06-05 04:04:44'),
(163, 14, 1, '24.00', '2018-06-05 04:04:44', '2018-06-05 04:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(355) DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `message` text,
  `reply` text,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `reply`, `created_at`, `updated_at`) VALUES
(1, 'PRATEEK', 'prateek@avainfotech.com', '424454', 'good', '2018-06-01 08:33:13', '2018-06-01 08:34:01'),
(2, 'kuldeep', 'kuldeepjha@avainfotech.com', 'hdghjdgh', 'gkjhfjkhgjk', '2018-06-01 08:36:36', '2018-06-01 08:37:28'),
(3, 'PRATEEK', 'prateek@avainfotech.com', '52525', NULL, '2018-06-08 10:32:03', '2018-06-08 10:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `order_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `time` decimal(15,2) NOT NULL DEFAULT '0.00',
  `price_per_hour` decimal(15,2) NOT NULL DEFAULT '0.00',
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `due_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `cc_number` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(355) DEFAULT NULL,
  `amount_paid` decimal(15,2) DEFAULT '0.00',
  `payment_status` varchar(355) DEFAULT NULL,
  `payment_gateway` varchar(355) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = "unpaid", 1 = "paid"',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, '2018_04_25_120334_create_subscriptions_table', 2),
(4, '2018_04_27_054616_create_admins_table', 3),
(5, '2018_05_02_095051_create_nanny_unavailabilities_table', 4),
(6, '2018_05_04_062546_create_requests_table', 5),
(7, '2018_05_04_063145_create_request_dates_table', 6),
(8, '2018_05_08_074049_create_request_interests_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nanny_unavailabilities`
--

CREATE TABLE `nanny_unavailabilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mm/dd/yy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nanny_unavailabilities`
--

INSERT INTO `nanny_unavailabilities` (`id`, `admin_id`, `date`) VALUES
(11, 7, '05/16/2018'),
(12, 7, '05/04/2018'),
(13, 10, '05/17/2018'),
(14, 10, '05/18/2018'),
(15, 10, '05/24/2018'),
(16, 10, '05/22/2018'),
(17, 10, '05/21/2018'),
(31, 8, '05/30/2018'),
(32, 8, '05/29/2018'),
(33, 8, '06/14/2018'),
(34, 8, '06/19/2018'),
(35, 8, '06/11/2018'),
(36, 8, '06/30/2018'),
(37, 8, '06/15/2018'),
(38, 8, '06/13/2018');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `request_id` int(255) DEFAULT NULL,
  `admin_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `start_date` varchar(355) DEFAULT NULL COMMENT 'mm/dd/yy H:i:s',
  `end_date` varchar(355) DEFAULT NULL COMMENT 'mm/dd/yy H:i:s',
  `last_invoice` int(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0 = "Cancelled", 1 = "Ongoing", 2 = "Completed"',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `request_id`, `admin_id`, `user_id`, `start_date`, `end_date`, `last_invoice`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 3, '05/23/2018 00:15:00', '05/25/2018 03:30:00', NULL, 2, '2018-05-23 03:42:10', '2018-05-25 01:28:01'),
(2, 2, 7, 5, '05/26/2018 02:00:00', '05/26/2018 03:00:00', NULL, 2, '2018-05-25 03:05:12', '2018-05-25 21:30:01'),
(3, 3, 8, 5, '05/25/2018 02:45:00', '05/25/2018 04:00:00', NULL, 2, '2018-05-25 03:12:14', '2018-05-25 03:13:01'),
(4, 6, 8, 3, '05/25/2018 01:15:00', '05/28/2018 01:30:00', NULL, 2, '2018-05-25 06:20:07', '2018-05-27 20:00:01'),
(5, 10, 7, 5, '06/07/2018 00:45:00', '06/07/2018 02:45:00', NULL, 2, '2018-06-01 02:04:20', '2018-06-06 21:15:02'),
(6, 10, 8, 5, '06/07/2018 00:45:00', '06/07/2018 02:45:00', NULL, 2, '2018-06-01 02:04:45', '2018-06-06 21:15:02'),
(7, 8, 8, 5, '05/31/2018 01:15:00', '05/31/2018 02:30:00', NULL, 2, '2018-06-05 04:09:45', '2018-06-05 04:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kuldeepjha@avainfotech.com', '$2y$10$3f3tBPuGWQ3SrxsPQvvNMeeIEiXxLbKnc1XIsr74ROj0P2UfGV1rS', '2018-05-01 03:57:31'),
('prateek@avainfotech.com', '$2y$10$rVqJlmQubB98A0.Xlrq9R.4QdwOedvcB2chU3K0h9AtPQcTwQMlQy', '2018-06-07 02:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `service_id` int(255) NOT NULL,
  `type` varchar(355) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `service_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 'in a pinch', '2018-05-23 07:17:01', '2018-05-23 01:47:01'),
(2, 2, 'maintained care', '2018-05-23 07:17:07', '2018-05-23 01:47:07'),
(3, 5, 'maintained care', '2018-05-23 07:17:14', '2018-05-23 01:47:14'),
(4, 5, 'in a pinch', '2018-05-23 07:02:51', '2018-05-23 01:32:51'),
(5, 8, 'maintained care', '2018-05-23 07:15:54', '2018-05-23 01:45:54'),
(6, 8, 'in a pinch', '2018-05-23 07:16:12', '2018-05-23 01:46:12'),
(7, 7, 'maintained care', '2018-05-23 07:16:25', '2018-05-23 01:46:25'),
(8, 7, 'in a pinch', '2018-05-23 07:16:32', '2018-05-23 01:46:32'),
(9, 9, 'maintained care', '2018-05-23 07:16:18', '2018-05-23 01:46:18'),
(10, 9, 'in a pinch', '2018-05-23 07:16:38', '2018-05-23 01:46:38'),
(11, 4, 'maintained care', '2018-05-23 07:16:45', '2018-05-23 01:46:45'),
(12, 4, 'in a pinch', '2018-05-23 07:16:50', '2018-05-23 01:46:50'),
(13, 3, 'maintained care', '2018-05-23 01:39:12', '2018-05-23 07:09:12'),
(14, 3, 'in a pinch', '2018-06-05 09:34:44', '2018-06-05 04:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `services` text COLLATE utf8mb4_unicode_ci,
  `childs` int(255) DEFAULT NULL,
  `type` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` int(1) NOT NULL DEFAULT '2' COMMENT '0 = "Cancelled", 1 = "Active", 2 = "Pending", 3 = "Expired"',
  `recommended` int(255) NOT NULL DEFAULT '0',
  `recommended_admin` int(255) DEFAULT NULL,
  `assigned_admin` int(255) DEFAULT NULL,
  `assign_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `services`, `childs`, `type`, `comment`, `status`, `recommended`, `recommended_admin`, `assigned_admin`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 1, 'maintained care', 'test comment', 1, 0, NULL, 8, '2018-05-23 03:42:10', '2018-05-23 03:40:45', '2018-05-23 03:42:10'),
(2, 5, NULL, 2, 'maintained care', '', 1, 0, NULL, 7, '2018-05-25 03:05:12', '2018-05-25 01:57:37', '2018-05-25 03:05:12'),
(3, 5, NULL, 2, 'maintained care', '', 1, 0, NULL, 8, '2018-05-25 03:12:14', '2018-05-25 03:10:42', '2018-05-25 03:12:14'),
(4, 5, NULL, 2, 'maintained care', '', 2, 0, NULL, NULL, NULL, '2018-05-25 03:24:52', '2018-05-25 03:24:52'),
(6, 3, NULL, 3, 'maintained care', '', 1, 1, 8, 8, '2018-05-25 06:20:07', '2018-05-25 04:14:15', '2018-05-25 06:20:07'),
(7, 3, NULL, 3, 'in a pinch', '', 0, 0, NULL, NULL, NULL, '2018-05-28 00:24:29', '2018-05-28 07:25:02'),
(8, 5, NULL, 2, 'maintained care', '', 1, 0, NULL, 8, '2018-06-05 04:09:45', '2018-05-31 02:00:27', '2018-06-05 04:09:45'),
(9, 5, NULL, 2, 'maintained care', 'please reach on time', 2, 1, 7, NULL, NULL, '2018-06-01 01:30:33', '2018-06-01 01:30:33'),
(10, 5, NULL, 2, 'in a pinch', '', 1, 0, NULL, 8, '2018-06-01 02:04:45', '2018-06-01 01:32:35', '2018-06-01 02:04:45'),
(11, 5, NULL, 2, 'in a pinch', '', 0, 0, NULL, NULL, NULL, '2018-06-01 03:22:29', '2018-06-01 10:23:02'),
(12, 16, NULL, 4, 'maintained care', 'thfgjjkgggh', 2, 0, NULL, NULL, NULL, '2018-06-06 02:22:22', '2018-06-06 02:22:22'),
(13, 16, NULL, 4, 'in a pinch', 'gf', 0, 0, NULL, NULL, NULL, '2018-06-06 03:16:34', '2018-06-06 10:17:02'),
(14, 5, NULL, 2, 'maintained care', '', 2, 1, 7, NULL, NULL, '2018-06-08 04:11:57', '2018-06-08 04:11:57'),
(15, 5, NULL, 2, 'in a pinch', '', 0, 0, NULL, NULL, NULL, '2018-06-08 04:43:06', '2018-06-08 11:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `request_dates`
--

CREATE TABLE `request_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mm/dd/yy',
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_dates`
--

INSERT INTO `request_dates` (`id`, `request_id`, `date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, '05/24/2018', '01:15:00', '03:15:00', '2018-05-23 03:40:45', '2018-05-23 03:40:45'),
(2, 1, '05/25/2018', '00:15:00', '01:15:00', '2018-05-23 03:40:45', '2018-05-23 03:40:45'),
(3, 1, '05/23/2018', '00:15:00', '02:45:00', '2018-05-23 03:40:45', '2018-05-23 03:40:45'),
(6, 2, '05/26/2018', '02:00:00', '03:00:00', '2018-05-25 01:57:37', '2018-05-25 01:57:37'),
(7, 3, '05/25/2018', '02:45:00', '04:00:00', '2018-05-25 03:10:42', '2018-05-25 03:10:42'),
(8, 4, '05/26/2018', '04:00:00', '13:30:00', '2018-05-25 03:24:52', '2018-05-25 03:24:52'),
(13, 6, '05/25/2018', '01:15:00', '03:00:00', '2018-05-25 04:14:15', '2018-05-25 04:14:15'),
(14, 6, '05/28/2018', '00:30:00', '01:30:00', '2018-05-25 04:14:15', '2018-05-25 04:14:15'),
(15, 7, '05/28/2018', '01:30:00', '04:00:00', '2018-05-28 00:24:29', '2018-05-28 00:24:29'),
(16, 8, '05/31/2018', '01:15:00', '02:30:00', '2018-05-31 02:00:27', '2018-05-31 02:00:27'),
(17, 9, '06/01/2018', '00:30:00', '02:00:00', '2018-06-01 01:30:33', '2018-06-01 01:30:33'),
(18, 9, '06/04/2018', '12:15:00', '18:45:00', '2018-06-01 01:30:33', '2018-06-01 01:30:33'),
(19, 10, '06/07/2018', '00:45:00', '02:45:00', '2018-06-01 01:32:35', '2018-06-01 01:32:35'),
(20, 11, '06/01/2018', '04:15:00', '06:00:00', '2018-06-01 03:22:29', '2018-06-01 03:22:29'),
(21, 12, '06/13/2018', '02:15:00', '03:15:00', '2018-06-06 02:22:22', '2018-06-06 02:22:22'),
(22, 13, '06/13/2018', '04:00:00', '05:00:00', '2018-06-06 03:16:34', '2018-06-06 03:16:34'),
(23, 14, '06/15/2018', '04:00:00', '06:00:00', '2018-06-08 04:11:57', '2018-06-08 04:11:57'),
(24, 15, '06/08/2018', '04:00:00', '05:45:00', '2018-06-08 04:43:06', '2018-06-08 04:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `request_interests`
--

CREATE TABLE `request_interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_interests`
--

INSERT INTO `request_interests` (`id`, `request_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2018-05-23 03:41:20', '2018-05-23 03:41:20'),
(2, 1, 7, '2018-05-23 03:41:34', '2018-05-23 03:41:34'),
(3, 1, 10, '2018-05-23 03:41:51', '2018-05-23 03:41:51'),
(4, 2, 7, '2018-05-25 03:00:40', '2018-05-25 03:00:40'),
(5, 3, 8, '2018-05-25 03:10:59', '2018-05-25 03:10:59'),
(6, 8, 8, '2018-06-05 04:08:09', '2018-06-05 04:08:09'),
(7, 4, 8, '2018-06-05 04:08:14', '2018-06-05 04:08:14'),
(8, 12, 8, '2018-06-06 02:24:29', '2018-06-06 02:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `request_services`
--

CREATE TABLE `request_services` (
  `id` int(11) NOT NULL,
  `request_id` int(255) DEFAULT NULL,
  `service_id` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_services`
--

INSERT INTO `request_services` (`id`, `request_id`, `service_id`, `created_at`) VALUES
(1, 1, 7, '2018-05-23 03:40:45'),
(2, 1, 4, '2018-05-23 03:40:45'),
(3, 2, 8, '2018-05-25 01:57:37'),
(4, 2, 7, '2018-05-25 01:57:37'),
(5, 2, 9, '2018-05-25 01:57:37'),
(6, 3, 2, '2018-05-25 03:10:42'),
(7, 3, 5, '2018-05-25 03:10:42'),
(8, 4, 5, '2018-05-25 03:24:52'),
(14, 7, 7, '2018-05-28 00:24:29'),
(13, 6, 4, '2018-05-25 04:14:15'),
(12, 6, 7, '2018-05-25 04:14:15'),
(15, 8, 8, '2018-05-31 02:00:27'),
(16, 8, 7, '2018-05-31 02:00:27'),
(17, 9, 5, '2018-06-01 01:30:33'),
(18, 9, 8, '2018-06-01 01:30:33'),
(19, 9, 7, '2018-06-01 01:30:33'),
(20, 10, 2, '2018-06-01 01:32:35'),
(21, 10, 5, '2018-06-01 01:32:35'),
(22, 11, 2, '2018-06-01 03:22:29'),
(23, 12, 5, '2018-06-06 02:22:22'),
(24, 12, 8, '2018-06-06 02:22:22'),
(25, 12, 7, '2018-06-06 02:22:22'),
(26, 12, 9, '2018-06-06 02:22:22'),
(27, 13, 2, '2018-06-06 03:16:34'),
(28, 14, 8, '2018-06-08 04:11:57'),
(29, 14, 7, '2018-06-08 04:11:57'),
(30, 15, 2, '2018-06-08 04:43:06'),
(31, 15, 5, '2018-06-08 04:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `rating` int(1) DEFAULT '0',
  `review` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'First review', '2018-05-25 02:05:07', '2018-05-25 02:05:07'),
(2, 5, 4, 'nice experience', '2018-06-01 02:13:22', '2018-06-01 02:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(355) DEFAULT NULL,
  `content` text,
  `slug` varchar(355) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `content`, `slug`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Terms and conditions', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'terms-and-conditions', 2, '2018-05-30 10:09:02', '2018-05-30 10:09:02'),
(2, 'FAQ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'faq', 1, '2018-05-30 10:08:52', '2018-05-30 10:08:52'),
(3, 'About Us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about-us', 0, '2018-05-30 10:09:11', '2018-05-30 10:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_id` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `start_date`, `end_date`, `amount`, `profile_id`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '2018-05-25 06:23:06', '2018-06-25 06:23:06', '5.00', 'I-CBMMRXGA6SF0', 'Success', 'ongoing', '2018-05-25 00:53:06', '2018-05-25 00:53:06'),
(2, 5, '2018-05-25 06:24:43', '2018-06-25 06:24:43', '5.00', 'I-YN2EAAN5W4K2', 'Success', 'ongoing', '2018-05-25 00:54:43', '2018-05-25 00:54:43'),
(3, 9, '2018-05-25 06:26:51', '2018-06-25 06:26:51', '5.00', 'I-AWP32V46CSMV', 'Success', 'ongoing', '2018-05-25 00:56:51', '2018-05-25 00:56:51'),
(4, 15, '2018-05-31 08:57:02', '2018-07-01 08:57:02', '5.00', 'I-8N1TAP89EB47', 'Success', 'ongoing', '2018-05-31 03:27:02', '2018-05-31 03:27:02'),
(5, 16, '2018-06-06 07:29:46', '2018-07-06 07:29:46', '5.00', 'I-K60E2S3N692A', 'Success', 'ongoing', '2018-06-06 01:59:46', '2018-06-06 01:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `address_1` text COLLATE utf8mb4_unicode_ci,
  `address_2` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at_hotel` int(11) NOT NULL DEFAULT '0',
  `household_info` text COLLATE utf8mb4_unicode_ci,
  `pet_info` text COLLATE utf8mb4_unicode_ci,
  `q1` text COLLATE utf8mb4_unicode_ci,
  `q2` text COLLATE utf8mb4_unicode_ci,
  `q3` text COLLATE utf8mb4_unicode_ci,
  `q4` text COLLATE utf8mb4_unicode_ci,
  `q5` text COLLATE utf8mb4_unicode_ci,
  `a1` text COLLATE utf8mb4_unicode_ci,
  `a2` text COLLATE utf8mb4_unicode_ci,
  `a3` text COLLATE utf8mb4_unicode_ci,
  `a4` text COLLATE utf8mb4_unicode_ci,
  `a5` text COLLATE utf8mb4_unicode_ci,
  `hear_aboutus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `which_hear_aboutus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nanny_requirement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ages` text COLLATE utf8mb4_unicode_ci,
  `cc_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_expire_date_month` int(5) DEFAULT NULL,
  `cc_expire_date_year` int(5) DEFAULT NULL,
  `start_date` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Subscription start date',
  `end_date` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Subscription end date',
  `amount` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Subscription amount',
  `payment_status` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_id` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `subscribed` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `password`, `first_name1`, `last_name1`, `mobile1`, `first_name2`, `last_name2`, `mobile2`, `image`, `address_1`, `address_2`, `city`, `state`, `zip`, `at_hotel`, `household_info`, `pet_info`, `q1`, `q2`, `q3`, `q4`, `q5`, `a1`, `a2`, `a3`, `a4`, `a5`, `hear_aboutus`, `which_hear_aboutus`, `referred_by`, `gender`, `nanny_requirement`, `childs`, `ages`, `cc_number`, `cc_type`, `cc_expire_date_month`, `cc_expire_date_year`, `start_date`, `end_date`, `amount`, `payment_status`, `profile_id`, `status`, `subscribed`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'user', 'kuldeepjha@avainfotech.com', '$2y$10$GZWYal/8Yc0t4ISY4A1AM.3EEE9hFOg2wMjr4BC0FSjK841Z54cEK', 'Kuldeep', 'jha', '13121313131', NULL, NULL, NULL, '1527225520user.png', 'sacfasfgdsgdsg', NULL, 'chandigarh', 'CO', '134101', 0, 'sFsaf', 'afsfas', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', NULL, NULL, NULL, NULL, NULL, 'Web Search', 'erwer', NULL, 'male', 'female', '3', '[{\"age\":\"3\",\"gender\":\"male\"},{\"age\":\"6\",\"gender\":\"female\"},{\"age\":\"9\",\"gender\":\"male\"}]', NULL, NULL, NULL, NULL, '2018-05-25 06:23:06', '2018-06-25 06:23:06', '5.00', 'Success', 'I-CBMMRXGA6SF0', 1, 1, 'cJJH9jgU1F1H8DJBcKX5WgVkoQUbkfJblmPpEjHIEvtnDRvE4P5GsbEIAm32', '2018-04-24 05:59:42', '2018-05-31 04:00:06'),
(5, 'user', 'prateek@avainfotech.com', '$2y$10$WJsMrgYcbAHXqswBSoQR..30ON2kkZ96F8gxbhJ87IwwlEGC4pMw2', 'Prateek', 'sharma', '13121313131', NULL, NULL, NULL, NULL, 'sacfasfgdsgdsg', NULL, 'chandigarh', 'CO', '134101', 0, 'sczxczx', 'fasfasf', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', NULL, NULL, NULL, NULL, NULL, 'Web Search', 'google.com', NULL, 'male', 'female', '2', '[{\"age\":\"3\",\"gender\":\"male\"},{\"age\":\"5\",\"gender\":\"male\"}]', NULL, NULL, NULL, NULL, '2018-05-25 06:24:43', '2018-06-25 06:24:43', '5.00', 'Success', 'I-YN2EAAN5W4K2', 1, 1, 'YGOT4OWVjLWgA0AEnwgB60VegczdJwrkXcFQko01btcayYMxr8rCrWQ8l6X9', '2018-04-24 08:06:13', '2018-06-06 04:20:38'),
(8, 'user', 'gurpreet@avainfotech.com', '$2y$10$czXxOSUU/YA04ddpC18VaeNYMtLD7g5zRovLJK40vz9utUgsLiipK', 'Gurpreet', 'Singh', '242154r24512', NULL, NULL, NULL, NULL, 'sacfasfgdsgdsg gurpreet', NULL, 'chandigarh', 'AR', '134101', 0, 'eqawq', 'wqrqwr', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', NULL, NULL, NULL, NULL, NULL, 'Web Search', 'google', NULL, 'male', 'female', '1', '[{\"age\":\"3\",\"gender\":\"male\"}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'cErbfYE1TwlnK00QupAXerk70fOIim4flo0eCeSUQlBhpGTlH8IdSXnIktza', '2018-05-08 04:43:31', '2018-05-08 04:43:31'),
(9, 'user', 'srishti@avainfotech.com', '$2y$10$3Uos14eD0iblA.2rsPtpCehGlvj73tXiP4zleY8un8qwRA5QFV/jC', 'srishti', 'sharma', '13121313131', NULL, NULL, NULL, NULL, 'sacfasfgdsgdsg', NULL, 'chandigarh', 'CA', '134101', 0, 'wqrqw', 'wqrqwr', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', NULL, NULL, NULL, NULL, NULL, 'Social Media', 'facebook', NULL, 'female', 'female', '2', '[{\"age\":\"3\",\"gender\":\"male\"},{\"age\":\"5\",\"gender\":\"male\"}]', '5555555555554444', 'MasterCard', 11, 2019, '25 May, 2018 06:26 am', '25 Jun, 2018 06:26 am', '5.00', 'Success', 'I-AWP32V46CSMV', 1, 1, 'pDz4sISnDSAkbixgBHqLAgtJG2kUoQbTeEr6o8DJhxsqD7P6NUXwFdRymd61', '2018-05-08 04:44:39', '2018-05-25 00:56:51'),
(10, 'user', 'bhumika@avainfotech.com', '$2y$10$v8amLmu8k3HGUdM4k0QKt.MSu2zoJ3gJqKMaYIV3cYTXcETGQgPjq', 'bhumika', 'grover', '53465465464', NULL, NULL, NULL, NULL, 'sacfasfgdsgdsg', NULL, 'chandigarh', 'AK', '1312223', 0, 'eqawq', 'wqedqw', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', NULL, NULL, NULL, NULL, NULL, 'Print Advertising', 'aajtak', NULL, 'female', 'male', '3', '[{\"age\":\"3\",\"gender\":\"male\"},{\"age\":\"5\",\"gender\":\"male\"},{\"age\":\"7\",\"gender\":\"male\"}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2018-05-08 04:47:49', '2018-05-08 04:47:49'),
(11, 'user', 'nicolemariebright@gmail.com', '$2y$10$P23JX3wcJka5efJldo6vBe7bI57YHUEvpfZqzsSUKydG33qaCYdae', 'Nicole', 'Bright', '2066052050', NULL, NULL, NULL, NULL, '771 henderson rd', NULL, 'hood river', 'OR', '97031', 0, 'park on street', 'one dog', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', NULL, NULL, NULL, NULL, NULL, 'Friend Family', 'sue', NULL, 'female', NULL, '3', '[{\"age\":\"3\",\"gender\":\"male\"},{\"age\":\"5\",\"gender\":\"male\"},{\"age\":\"7\",\"gender\":\"male\"}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2018-05-30 10:09:17', '2018-05-30 10:09:17'),
(12, 'user', 'jamie.bright@gmail.com', '$2y$10$HMLfvaQO9vnLVy1J7yX0vOpc07alSZ2zmkybTXZ99lyDJLynGMs3O', 'Jamie', 'Bright', '503 799 2284', 'Nicole', 'Bright', '206 605 2050', NULL, '771 Henderson Road', NULL, 'Hood River', 'OR', '97031', 0, 'Corner house', 'Dog, do not touch', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', 'Mary Poppins', 'I don\'t know yet', 'Friends', 'strict', 'yes', 'Social Media', 'LinkedIn', 'Nicole', 'male', NULL, '2', '[{\"age\":\"3\",\"gender\":\"male\"},{\"age\":\"5\",\"gender\":\"male\"}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2018-05-30 10:48:14', '2018-05-30 10:48:14'),
(15, 'user', 'gurpreet123@avainfotech.com', '$2y$10$/sW4xU8.WIRP4I5IKciev.XPB.p8.YAG8WeESe/6i0kNHDUnl//Sy', 'Gurpreet', 'Singh', 'ffdsfsd', NULL, NULL, NULL, NULL, 'dfsdf', NULL, 'dfdsfsd', 'AR', 'dsfsdf', 0, 'dsfds', 'dsffs', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', NULL, NULL, NULL, NULL, NULL, 'Social Media', 'facebook', NULL, 'male', NULL, '3', '[{\"age\":\"3\",\"gender\":\"male\"},{\"age\":\"5\",\"gender\":\"male\"},{\"age\":\"7\",\"gender\":\"male\"}]', '2221000000000009', 'MasterCard', 11, 2019, '31 May, 2018 08:57 am', '01 Jul, 2018 08:57 am', '5.00', 'Success', 'I-8N1TAP89EB47', 0, 1, 'Tnl7wX8sXeMnI47w0NkZXmXL3wrwO25HF8FO6VUgNbXl8xd1JKfw0OEyKzxk', '2018-05-31 03:25:33', '2018-05-31 03:27:02'),
(16, 'user', 'ishabhardwaj@avainfotech.com', '$2y$10$IZKEezB6yMqxEZ9/.sE4tOFHwriQMc70rrYKgcmbfxht4QAgDHm56', 'ram', 'lal', '858585858', 'isha', 'lal', '5858585858585858', NULL, 'giuihiuhui', 'yhiughiuhgiu', 'hiuhhiuh', 'FL', 'h85868', 0, 'gyfuyfg', 'hihfkjhgkj', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', 'hfihgijhi', 'hfihgijhi', 'hjhijh', 'hijhijh', 'hijhijhijh345676', 'Print Advertising', 'fgvgdfhdhf', 'ghghugtyut', 'female', 'male', '4', '[{\"age\":\"8\",\"gender\":\"male\"},{\"age\":\"10\",\"gender\":\"male\"},{\"age\":\"6\",\"gender\":\"male\"},{\"age\":\"7\",\"gender\":\"male\"}]', '5555555555554444', 'MasterCard', 12, 2019, '06 Jun, 2018 07:29 am', '06 Jul, 2018 07:29 am', '13.00', 'Success', 'I-K60E2S3N692A', 0, 1, 'Ym1Mc6IWhgTeYMTfjxQHfU4mRDUuzHz9kUQouiMH5HFGjw8yPdiFU7bppLTP', '2018-06-06 01:56:52', '2018-06-06 03:05:48'),
(17, 'user', 'netin@avainfotech.com', '$2y$10$WmFCmzrAmJfmBjA90e0pxuEFVsK77xGQsbQRzgoiQdHdzUTTMUpKG', 'netin', 'sharma', '858585858', NULL, NULL, NULL, NULL, 'chandigarh', NULL, 'Chandigarh, India', 'AR', '123456', 0, 'ghjghg', 'hghghg', 'Please tell us what you’d like in a nanny? What are some important characteristics you’d like in a nanny?', 'How do you intend to use us (emergency, back up care, date night, part/full time, etc…)?', 'Type of childcare you have used in the past?', 'How would you describe your family or parenting style?', 'Are you ok with a male nanny?', 'ghkjgkjgj', 'ghghghkg', 'ghghkghkgg', 'gkgkjgkjgkjg', 'gkjgkjg', 'Print Advertising', 'ehtdddd', 'ssssssssssssssss', 'male', 'female', '4', '[{\"age\":\"8\",\"gender\":\"male\"},{\"age\":\"8\",\"gender\":\"male\"},{\"age\":\"8\",\"gender\":\"male\"},{\"age\":\"8\",\"gender\":\"male\"}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2018-06-06 03:09:19', '2018-06-06 03:09:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_services`
--
ALTER TABLE `admin_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_prices`
--
ALTER TABLE `child_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nanny_unavailabilities`
--
ALTER TABLE `nanny_unavailabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_dates`
--
ALTER TABLE `request_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_interests`
--
ALTER TABLE `request_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_services`
--
ALTER TABLE `request_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_services`
--
ALTER TABLE `admin_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `child_prices`
--
ALTER TABLE `child_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nanny_unavailabilities`
--
ALTER TABLE `nanny_unavailabilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request_dates`
--
ALTER TABLE `request_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `request_interests`
--
ALTER TABLE `request_interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request_services`
--
ALTER TABLE `request_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
