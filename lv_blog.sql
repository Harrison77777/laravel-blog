-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 08:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `role` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `description`, `image`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Harrison', 'ermhroy@gmail.com', '$2y$10$7xEOmUnTK2a/sRwGysWte.dTfhElqqSb8I2ElO.56PofFMHBjBEeO', 'I am the super admin', '5d081bb556fd6.jpg', 1, '2019-06-11 11:46:56', '2019-06-18 22:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'laravel', '5cfc061a146d3.png', '2019-06-08 19:01:46', '2019-06-08 19:01:46'),
(2, 'Vue js', 'vue-js', '5cfc06b10f07e.png', '2019-06-08 19:04:17', '2019-06-08 19:04:17'),
(3, 'Django framework', 'django-framework', '5cffe73724dba.jpg', '2019-06-11 17:39:04', '2019-06-11 17:39:04'),
(4, 'Picture', 'picture', '5d0535d5e12a1.png', '2019-06-15 18:15:51', '2019-06-15 18:15:51'),
(5, 'node.js', 'nodejs', '5d0535f202222.png', '2019-06-15 18:16:18', '2019-06-15 18:16:18'),
(6, 'Programming', 'programming', '5d3605e574abf.jpg', '2019-07-22 18:52:21', '2019-07-22 18:52:21'),
(7, 'PHP', 'php', '5d3605fae84cf.png', '2019-07-22 18:52:43', '2019-07-22 18:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 5, 2, '2019-06-12 11:54:45', '2019-06-12 11:54:45'),
(9, 8, 6, '2019-06-12 12:08:11', '2019-06-12 12:08:11'),
(10, 9, 6, '2019-06-12 12:10:10', '2019-06-12 12:10:10'),
(11, 8, 4, '2019-06-12 18:32:20', '2019-06-12 18:32:20'),
(12, 8, 2, '2019-06-12 18:32:20', '2019-06-12 18:32:20'),
(16, 10, 2, '2019-06-12 18:38:37', '2019-06-12 18:38:37'),
(20, 7, 2, '2019-06-12 19:04:04', '2019-06-12 19:04:04'),
(27, 11, 3, '2019-06-12 19:15:18', '2019-06-12 19:15:18'),
(28, 11, 2, '2019-06-12 19:15:18', '2019-06-12 19:15:18'),
(29, 11, 1, '2019-06-12 19:15:18', '2019-06-12 19:15:18'),
(30, 7, 3, '2019-06-12 20:11:25', '2019-06-12 20:11:25'),
(31, 7, 1, '2019-06-12 20:11:25', '2019-06-12 20:11:25'),
(33, 12, 2, '2019-06-13 22:31:31', '2019-06-13 22:31:31'),
(34, 12, 1, '2019-06-13 22:31:31', '2019-06-13 22:31:31'),
(35, 13, 2, '2019-06-14 17:40:17', '2019-06-14 17:40:17'),
(36, 13, 1, '2019-06-14 17:40:17', '2019-06-14 17:40:17'),
(37, 14, 3, '2019-06-15 17:29:48', '2019-06-15 17:29:48'),
(38, 15, 1, '2019-06-15 17:34:44', '2019-06-15 17:34:44'),
(39, 16, 3, '2019-06-15 17:40:21', '2019-06-15 17:40:21'),
(40, 16, 2, '2019-06-15 17:40:21', '2019-06-15 17:40:21'),
(41, 17, 2, '2019-06-15 18:37:05', '2019-06-15 18:37:05'),
(42, 17, 1, '2019-06-15 18:37:05', '2019-06-15 18:37:05'),
(43, 18, 5, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(44, 18, 3, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(45, 18, 2, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(46, 18, 1, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(47, 19, 5, '2019-06-25 10:09:11', '2019-06-25 10:09:11'),
(48, 19, 4, '2019-06-25 10:09:11', '2019-06-25 10:09:11'),
(49, 19, 3, '2019-06-25 10:09:11', '2019-06-25 10:09:11'),
(50, 19, 2, '2019-06-25 10:09:11', '2019-06-25 10:09:11'),
(51, 19, 3, '2019-07-14 07:19:26', '2019-07-14 07:19:26'),
(52, 19, 2, '2019-07-14 07:19:26', '2019-07-14 07:19:26'),
(53, 19, 1, '2019-07-14 07:19:26', '2019-07-14 07:19:26'),
(54, 20, 4, '2019-07-22 14:00:21', '2019-07-22 14:00:21'),
(55, 21, 4, '2019-07-22 17:20:34', '2019-07-22 17:20:34'),
(56, 22, 4, '2019-07-22 17:29:03', '2019-07-22 17:29:03'),
(57, 23, 4, '2019-07-22 17:47:23', '2019-07-22 17:47:23'),
(58, 19, 6, '2019-07-22 18:53:48', '2019-07-22 18:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(222, 'Success comment.', 18, 8, '2019-06-27 09:10:29', '2019-06-27 09:10:29'),
(223, 'Again comment.', 18, 8, '2019-06-27 09:10:40', '2019-06-27 09:10:40'),
(224, 'Nice post.', 18, 8, '2019-06-27 09:13:40', '2019-06-27 09:13:40'),
(225, 'Nice', 18, 8, '2019-06-27 09:13:49', '2019-06-27 09:13:49'),
(226, 'Test successful.', 18, 8, '2019-06-27 09:15:58', '2019-06-27 09:15:58'),
(227, 'Nice post.', 17, 8, '2019-07-14 07:23:41', '2019-07-14 07:23:41'),
(228, 'Nice Post.', 7, 8, '2019-07-17 16:59:37', '2019-07-17 16:59:37'),
(229, 'Nice', 7, 8, '2019-07-17 16:59:57', '2019-07-17 16:59:57'),
(230, 'dajfas', 7, 8, '2019-07-17 17:31:37', '2019-07-17 17:31:37'),
(231, 'e', 7, 8, '2019-07-17 17:31:53', '2019-07-17 17:31:53'),
(232, 'Nice post.', 5, 8, '2019-07-22 19:03:45', '2019-07-22 19:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_06_07_132108_create_tags_table', 3),
(6, '2019_06_08_234346_create_categories_table', 4),
(11, '2019_06_11_022809_create_admin_users_table', 8),
(13, '2019_06_07_000818_create_posts_table', 9),
(14, '2019_06_12_174734_create_post_tag_table', 10),
(15, '2019_06_12_175022_create_category_post_table', 10),
(16, '2014_10_12_000000_create_users_table', 11),
(17, '2019_06_14_032524_create_jobs_table', 12),
(18, '2019_06_15_212201_create_subscribes_table', 13),
(19, '2019_06_18_050253_create_post_user_table', 14),
(20, '2019_06_22_034838_create_comments_table', 15);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` bigint(20) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `admin_id`, `title`, `slug`, `description`, `image`, `view_count`, `status`, `is_approved`, `created_at`, `updated_at`) VALUES
(5, NULL, 1, 'Is laravel  always best for creating the modern web application ?', 'is-laravel-always-best-for-creating-the-modern-web-application', '<p>sdtwetwert rtwryeryed rterytertert</p>', '5d00e8045f33c.png', 21, 1, 1, '2019-06-12 11:54:44', '2019-07-22 18:22:35'),
(7, NULL, 1, 'Why we should learn node.js in 2019?', 'why-we-should-learn-nodejs-in-2019', '<p>Node.js is nice as well as powerful. Node.js can maintain many types of complexity.</p>', '5d00ea884e2c0.png', 22, 1, 1, '2019-06-12 12:05:29', '2019-07-22 17:19:11'),
(11, NULL, 1, 'How can we understand that, this is a good laptop ?', 'how-can-we-understand-that-this-is-a-good-laptop', '<p>dfsdsdhgsdysrtges</p>', '5d014f45c6782.jpg', 31, 1, 1, '2019-06-12 19:15:18', '2019-07-22 18:24:33'),
(13, 8, NULL, 'What is algolia realtime search ?', 'what-is-algolia-realtime-search', '<div>\r\n<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiatnulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div>\r\n</div>', '5d03dbffd1429.png', 18, 1, 1, '2019-06-14 17:40:17', '2019-07-22 19:00:37'),
(16, 8, NULL, 'Why Iphone so much famous ?', 'why-iphone-so-much-famous', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiatnulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', '5d052d84da239.jpg', 16, 1, 1, '2019-06-15 17:40:21', '2019-07-22 14:10:02'),
(17, 8, NULL, 'Why should you learn vue.js in 2019?', 'why-should-you-learn-vuejs-in-2019', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiatnulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', '5d053ad1225a9.png', 21, 1, 1, '2019-06-15 18:37:05', '2019-07-22 14:10:10'),
(18, 8, NULL, 'Why react.js is so much popular to create a modern web application ?', 'why-reactjs-is-so-much-popular-to-create-a-modern-web-application', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiatnulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', '5d053beb3f799.png', 32, 1, 1, '2019-06-15 18:41:47', '2019-07-22 17:36:52'),
(19, 8, 1, 'Why we should learn flatter in 2019?', 'why-we-should-learn-flatter-in-2019', '<p>sdfsdfsdfsdfsdf</p>', '5d35c0d5ac690.jpg', 2, 1, 1, '2019-07-22 13:57:41', '2019-07-22 18:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 5, 2, '2019-06-12 11:54:44', '2019-06-12 11:54:44'),
(7, 7, 2, '2019-06-12 12:05:29', '2019-06-12 12:05:29'),
(9, 8, 3, '2019-06-12 12:08:11', '2019-06-12 12:08:11'),
(10, 9, 1, '2019-06-12 12:10:10', '2019-06-12 12:10:10'),
(11, 8, 2, '2019-06-12 18:32:20', '2019-06-12 18:32:20'),
(12, 8, 1, '2019-06-12 18:32:20', '2019-06-12 18:32:20'),
(18, 10, 3, '2019-06-12 19:09:02', '2019-06-12 19:09:02'),
(19, 10, 2, '2019-06-12 19:09:09', '2019-06-12 19:09:09'),
(20, 10, 1, '2019-06-12 19:09:09', '2019-06-12 19:09:09'),
(22, 11, 5, '2019-06-12 19:15:18', '2019-06-12 19:15:18'),
(23, 11, 4, '2019-06-12 19:15:18', '2019-06-12 19:15:18'),
(24, 11, 2, '2019-06-12 19:15:18', '2019-06-12 19:15:18'),
(25, 7, 6, '2019-06-12 20:11:25', '2019-06-12 20:11:25'),
(26, 7, 5, '2019-06-12 20:11:25', '2019-06-12 20:11:25'),
(27, 7, 4, '2019-06-12 20:11:25', '2019-06-12 20:11:25'),
(28, 12, 6, '2019-06-13 22:31:32', '2019-06-13 22:31:32'),
(29, 12, 5, '2019-06-13 22:31:32', '2019-06-13 22:31:32'),
(30, 12, 4, '2019-06-13 22:31:32', '2019-06-13 22:31:32'),
(31, 12, 2, '2019-06-13 22:31:32', '2019-06-13 22:31:32'),
(32, 13, 4, '2019-06-14 17:40:17', '2019-06-14 17:40:17'),
(33, 13, 2, '2019-06-14 17:40:17', '2019-06-14 17:40:17'),
(34, 14, 6, '2019-06-15 17:29:49', '2019-06-15 17:29:49'),
(35, 15, 6, '2019-06-15 17:34:44', '2019-06-15 17:34:44'),
(36, 16, 6, '2019-06-15 17:40:21', '2019-06-15 17:40:21'),
(37, 16, 5, '2019-06-15 17:40:21', '2019-06-15 17:40:21'),
(38, 16, 4, '2019-06-15 17:40:21', '2019-06-15 17:40:21'),
(39, 16, 2, '2019-06-15 17:40:21', '2019-06-15 17:40:21'),
(40, 17, 6, '2019-06-15 18:37:05', '2019-06-15 18:37:05'),
(41, 17, 2, '2019-06-15 18:37:05', '2019-06-15 18:37:05'),
(42, 18, 6, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(43, 18, 5, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(44, 18, 4, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(45, 18, 2, '2019-06-15 18:41:47', '2019-06-15 18:41:47'),
(46, 19, 6, '2019-06-25 10:09:11', '2019-06-25 10:09:11'),
(47, 19, 5, '2019-06-25 10:09:11', '2019-06-25 10:09:11'),
(48, 19, 4, '2019-06-25 10:09:11', '2019-06-25 10:09:11'),
(49, 19, 6, '2019-07-14 07:19:26', '2019-07-14 07:19:26'),
(50, 19, 5, '2019-07-14 07:19:26', '2019-07-14 07:19:26'),
(51, 19, 4, '2019-07-14 07:19:26', '2019-07-14 07:19:26'),
(52, 19, 2, '2019-07-14 07:19:26', '2019-07-14 07:19:26'),
(53, 20, 5, '2019-07-22 14:00:21', '2019-07-22 14:00:21'),
(54, 21, 5, '2019-07-22 17:20:34', '2019-07-22 17:20:34'),
(55, 22, 5, '2019-07-22 17:29:03', '2019-07-22 17:29:03'),
(56, 23, 5, '2019-07-22 17:47:24', '2019-07-22 17:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `post_user`
--

CREATE TABLE `post_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_user`
--

INSERT INTO `post_user` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(108, 16, 8, '2019-06-19 20:00:59', '2019-06-19 20:00:59'),
(120, 18, 8, '2019-06-19 21:24:05', '2019-06-19 21:24:05'),
(122, 17, 8, '2019-06-19 21:26:10', '2019-06-19 21:26:10'),
(123, 13, 8, '2019-06-19 23:52:51', '2019-06-19 23:52:51'),
(126, 11, 8, '2019-06-23 22:41:02', '2019-06-23 22:41:02'),
(127, 7, 8, '2019-06-23 22:43:40', '2019-06-23 22:43:40'),
(128, 5, 8, '2019-07-22 18:22:49', '2019-07-22 18:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `session_id`, `created_at`, `updated_at`) VALUES
(2, 'ermhroy@gmail.com', NULL, '2019-06-15 15:58:51', '2019-06-15 15:58:51'),
(3, 'ermhoy7@gmail.com', NULL, '2019-06-15 15:59:36', '2019-06-15 15:59:36'),
(4, 'shagour@gmail.com', NULL, '2019-06-15 15:59:59', '2019-06-15 15:59:59'),
(6, 'banana@gmail.com', NULL, '2019-06-15 18:33:43', '2019-06-15 18:33:43'),
(7, 'nadim@gmail.com', NULL, '2019-06-17 23:26:44', '2019-06-17 23:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Vue js', 'vue-js', '2019-06-07 09:15:18', '2019-06-07 21:03:48'),
(4, 'Django framework', 'django-framework', '2019-06-07 14:17:52', '2019-06-07 14:17:52'),
(5, 'Ruby on rails', 'ruby-on-rails', '2019-06-07 14:43:39', '2019-06-07 14:43:39'),
(6, 'Laravel', 'laravel', '2019-06-07 21:09:58', '2019-06-07 21:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `status`, `email_verified_at`, `password`, `image`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Harrison', 'Harrison', 'ermhroy7@gmail.com', 1, NULL, '$2y$10$26nrqsDjvVHkhgJznGXEm.TjQlQPbwnJmDXm0Zdii./1ywNGSDW6C', '5d06d9e3b02b9.jpeg', 'I am an author on this blog site.', NULL, '2019-06-13 19:37:35', '2019-06-17 20:59:12'),
(47, 'Harrison', 'devHarrison', 'developer.harrison.api@gmail.com', 1, NULL, '$2y$10$D0AP3K61y5xiLg3WFWGsweh5kEexlrAz8xWtYuCQDudQ.PkFZOsPy', 'default.jpg', NULL, NULL, '2019-08-05 10:36:19', '2019-08-05 10:36:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_user`
--
ALTER TABLE `post_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_post_id_foreign` (`post_id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribes_email_unique` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `post_user`
--
ALTER TABLE `post_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_user`
--
ALTER TABLE `post_user`
  ADD CONSTRAINT `post_user_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
