-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 05, 2022 lúc 10:03 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'fa-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2022-06-23 06:55:36', '2022-06-23 06:55:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$2A2jE83dDdEmkFsSmluFYeeO9x7YBXsjEosc9AzKzvDas22rEs81e', 'Administrator', NULL, NULL, '2022-06-23 06:55:36', '2022-06-23 06:55:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `delivery` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `orderNumber`, `userName`, `email`, `phone`, `image_path`, `name`, `content`, `price`, `amount`, `size`, `type`, `status`, `delivery`, `created_at`, `updated_at`) VALUES
(35, '1548569256', 'admin', 'admin@gmail.com', 967771606, 'set4in1.jpg', 'SET 5 in 1', '', 30, 1, 'xs', 1, 1, 3, '2022-07-27 09:06:51', '2022-08-02 14:06:42'),
(36, '1458289664', 'admin', 'admin@gmail.com', 967771606, 'set3-legging.jpg', 'SET Legging', '', 7, 1, 'xs', 2, 0, 0, '2022-07-27 09:07:09', '2022-07-31 13:11:07'),
(37, '1176662748', 'admin', 'admin@gmail.com', 133264, 'shoes2.jpg', 'Sản Phẩm 2', '', 9, 1, '36', 3, 0, 0, '2022-07-27 09:07:53', '2022-08-02 14:08:41'),
(41, '1024694405', 'admin', 'admin@gmail.com', 967771606, 'shoes2.jpg', 'Sản Phẩm 2', '', 9, 1, '36', 3, 1, 3, '2022-07-28 02:58:13', '2022-07-28 14:34:03'),
(42, '2120663733', 'dangduc', 'ducden164@gmail.com', 967771606, 'Set Đồ Tập GYM.jpg', 'Sét Đồ Tập GYM', '654asd5', 30, 1, 'xs', 1, 1, 2, '2022-08-02 13:39:41', '2022-08-02 14:05:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `fullname`, `email`, `phone`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Đức', 'Nguyễn Đăng', 'ducden164@gmail.com', '0967771606', 'tôi muốn mua hàng', 1, '2022-07-26 14:00:08', '2022-07-31 14:01:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `demos`
--

CREATE TABLE `demos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `female_products`
--

CREATE TABLE `female_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `female_products`
--

INSERT INTO `female_products` (`id`, `name`, `price`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'SET Drifit', 9, '', 'set1-drifit.png', NULL, NULL),
(2, 'SET BatMan', 10, '', 'set2-batman.png', NULL, NULL),
(3, 'SET Legging', 7, '', 'set3-legging.jpg', NULL, NULL),
(4, 'SET-Optimized', 2, '', 'set4_optimized.jpeg', NULL, NULL),
(5, 'SET Legging', 30, '', 'set5-legging.png', NULL, NULL),
(6, 'SET Showdow', 10, '', 'set6-x-showdow.png', NULL, NULL),
(7, 'SET SportMan', 10, '', 'set7-SportMan.jpg', NULL, NULL),
(8, 'SET Basketball', 10, '', 'sp8-Basketball.jpg', NULL, NULL),
(9, 'Sản Phẩm 9', 10, '', 'sp9.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `male_products`
--

CREATE TABLE `male_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `male_products`
--

INSERT INTO `male_products` (`id`, `name`, `price`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'Áo Lưới Tập GYM YOGA', 23, 'đẹp', 'Áo Lưới Tập GYM YOGA.jpg', NULL, '2022-07-26 13:19:28'),
(3, 'Đồ GYM YOGA', 7, '', 'sp3.jpg', NULL, NULL),
(4, 'Áo Bra', 2, '', 'sp4.png', NULL, NULL),
(5, 'SET 5 in 1', 30, '', 'set4in1.jpg', NULL, NULL),
(6, 'Đồ tập GYM YOGA', 10, '', 'sp8.png', NULL, NULL),
(7, 'Đồ tập GYM YOGA', 10, '', 'sp10.png', NULL, NULL),
(8, 'Áo Croptop lưới cao cấp', 10, '', 'ao-croptop-luoi.png', NULL, NULL),
(9, 'Đồ GYM YOGA', 10, '', 'sp6.jpg', NULL, NULL),
(12, 'Sét Đồ Tập GYM', 30, '654asd5', 'Set Đồ Tập GYM.jpg', '2022-07-08 01:31:26', '2022-07-08 16:58:52'),
(13, 'Áo Tập GYM, YOGA', 20, 'chất bao đẹp', 'Áo Tập GYM.jpg', '2022-07-08 16:59:53', '2022-07-08 16:59:53'),
(14, 'abc', 1273, 'adahj', 'YaGa Louro SE44.jpg', '2022-07-09 02:28:35', '2022-07-09 02:28:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_16_161426_create_demos_table', 1),
(6, '2022_06_17_015704_create_spmales_table', 1),
(7, '2022_06_19_143241_create_male_products_table', 1),
(8, '2016_01_04_173148_create_admin_tables', 2),
(10, '2022_06_29_031651_create_female_products_table', 4),
(12, '2022_06_29_060750_create_shoes_products_table', 5),
(16, '2022_06_30_163105_create_contacts_table', 6),
(18, '2022_07_24_150024_create_carts_table', 7),
(19, '2022_06_30_040799_create_order_products_table', 8),
(24, '2022_06_30_040786_create_order_products_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderNumber` int(255) NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameItem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`id`, `orderNumber`, `userName`, `email`, `phone`, `image_path`, `nameItem`, `price`, `size`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(2, 0, 'admin', 'admin@gmail.com', 967771606, 'sp8.png', 'Đồ tập GYM YOGA', 10, 'xs', 1, '', '2022-07-25 16:01:19', '2022-07-25 16:01:19'),
(3, 0, 'admin', 'admin@gmail.com', 967771606, 'sp8.png', 'Đồ tập GYM YOGA', 10, 'xs', 1, 'nữ', '2022-07-25 16:05:50', '2022-07-25 16:05:50'),
(4, 0, 'admin', 'admin@gmail.com', 967771606, 'sp8.png', 'Đồ tập GYM YOGA', 10, 'xs', 1, 'nữ', '2022-07-25 16:08:24', '2022-07-25 16:08:24'),
(5, 0, 'admin', 'admin@gmail.com', 967771606, 'sp6.jpg', 'Đồ GYM YOGA', 10, 'xs', 1, 'nữ', '2022-07-25 16:09:17', '2022-07-25 16:09:17'),
(6, 0, 'admin', 'admin@gmail.com', 967771606, 'sp6.jpg', 'Đồ GYM YOGA', 10, 'xs', 1, 'nữ', '2022-07-25 16:09:53', '2022-07-25 16:09:53'),
(7, 0, 'admin', 'admin@gmail.com', 967771606, 'sp6.jpg', 'Đồ GYM YOGA', 10, 'xs', 1, 'nữ', '2022-07-25 16:10:14', '2022-07-25 16:10:14'),
(8, 0, 'admin', 'admin@gmail.com', 967771606, 'sp6.jpg', 'Đồ GYM YOGA', 10, 'xs', 1, 'nữ', '2022-07-25 16:11:25', '2022-07-25 16:11:25'),
(9, 0, 'admin', 'admin@gmail.com', 11231231, 'sp8-Basketball.jpg', 'SET Basketball', 10, 'xs', 1, 'nam', '2022-07-26 09:26:15', '2022-07-26 09:26:15'),
(10, 0, 'admin', 'admin@gmail.com', 12378913, 'set7-SportMan.jpg', 'SET SportMan', 10, 'xs', 1, 'nam', '2022-07-26 10:12:12', '2022-07-26 10:12:12'),
(11, 0, 'admin', 'admin@gmail.com', 2131, 'set5-legging.png', 'SET Legging', 30, 'xs', 1, 'nam', '2022-07-26 10:34:40', '2022-07-26 10:34:40'),
(12, 0, 'admin', 'admin@gmail.com', 123, 'ADIDAS EDGE LŨ 3 EG1293.webp', 'Sản Phẩm 11001', 912, '36', 1, 'shoe', '2022-07-26 14:23:55', '2022-07-26 14:23:55'),
(13, 0, 'admin', 'admin@gmail.com', 123, 'ADIDAS EDGE LŨ 3 EG1293.webp', 'Sản Phẩm 11001', 912, '36', 1, 'shoe', '2022-07-26 14:26:32', '2022-07-26 14:26:32'),
(14, 0, 'admin', 'admin@gmail.com', 466, 'shoes4.jpg', 'Sản Phẩm 4', 9, '36', 1, 'shoe', '2022-07-26 14:31:48', '2022-07-26 14:31:48'),
(15, 0, 'dangduc', 'ducden164@gmail.com', 2112, 'shoes8.jpg', 'Sản Phẩm 8', 9, '41', 2, 'shoe', '2022-07-27 02:34:12', '2022-07-27 02:34:12'),
(16, 0, 'dangduc', 'ducden164@gmail.com', 2112, 'shoes8.jpg', 'Sản Phẩm 8', 9, '41', 2, 'shoe', '2022-07-27 02:34:37', '2022-07-27 02:34:37'),
(17, 0, 'dangduc', 'ducden164@gmail.com', 2112, 'shoes8.jpg', 'Sản Phẩm 8', 9, '41', 2, 'shoe', '2022-07-27 02:35:05', '2022-07-27 02:35:05'),
(18, 0, 'dangduc', 'ducden164@gmail.com', 2112, 'shoes8.jpg', 'Sản Phẩm 8', 9, '41', 2, 'shoe', '2022-07-27 02:36:03', '2022-07-27 02:36:03'),
(19, 0, 'admin', 'admin@gmail.com', 321, 'shoes2.jpg', 'Sản Phẩm 2', 9, '36', 1, '3', '2022-07-27 04:48:12', '2022-07-27 04:48:12'),
(20, 0, 'admin', 'admin@gmail.com', 4312, 'sp8.png', 'Đồ tập GYM YOGA', 10, 'xs', 1, '1', '2022-07-27 04:48:17', '2022-07-27 04:48:17'),
(21, 0, 'admin', 'admin@gmail.com', 123, 'set2-batman.png', 'SET BatMan', 10, 'xs', 1, '2', '2022-07-27 04:48:21', '2022-07-27 04:48:21'),
(22, 1004, 'admin', 'admin@gmail.com', 10101, 'sp4.png', 'Áo Bra', 2, 'xs', 1, '1', '2022-07-27 06:43:57', '2022-07-27 06:43:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$QDQdXmDff8JRqdZDRL/9..p9/VficqF.kl8fMfhfcCuwt4.FSB9Km', '2022-06-30 01:48:00'),
('admin@gmail.com', '$2y$10$QDQdXmDff8JRqdZDRL/9..p9/VficqF.kl8fMfhfcCuwt4.FSB9Km', '2022-06-30 01:48:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoes_products`
--

CREATE TABLE `shoes_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shoes_products`
--

INSERT INTO `shoes_products` (`id`, `name`, `price`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'Sản Phẩm 2', 9, '', 'shoes2.jpg', NULL, NULL),
(3, 'Sản Phẩm 3', 9, '', 'shoes3.jpg', NULL, NULL),
(4, 'Sản Phẩm 4', 9, '', 'shoes4.jpg', NULL, NULL),
(5, 'Sản Phẩm 5', 9, '', 'shoes5.jpg', NULL, NULL),
(6, 'Sản Phẩm 6', 9, '', 'shoes6.jpg', NULL, NULL),
(7, 'Sản Phẩm 7', 9, '', 'shoes10.jpg', NULL, NULL),
(8, 'Sản Phẩm 8', 9, '', 'shoes8.jpg', NULL, NULL),
(9, 'Sản Phẩm 9', 9, '', 'shoes9.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spmales`
--

CREATE TABLE `spmales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `spmales`
--

INSERT INTO `spmales` (`id`, `name`, `price`, `content`, `created_at`, `updated_at`) VALUES
(1, 'sp 1', 10, 'abc', '2022-06-29 20:42:42', '2022-06-29 20:42:42'),
(2, 'adad', 1231, 'cam_8.png', '2022-06-29 23:42:55', '2022-06-29 23:42:55'),
(3, 'duc', 1234, 'admin_optimized.jpg', '2022-06-30 00:00:21', '2022-06-30 00:00:21'),
(4, 'dangduc', 2234234, 'rule3.png', '2022-06-30 00:16:40', '2022-06-30 00:16:40'),
(5, 'áo bát nam', 12312414, 'rule1_2.png', '2022-06-30 00:17:41', '2022-06-30 00:17:41'),
(6, 'tesst anh', 128391289, 'Home (15).png', '2022-06-30 00:32:11', '2022-06-30 00:32:11'),
(7, 'dangduc', 12411251, 'memo_173904 (1).mp4', '2022-06-30 00:43:16', '2022-06-30 00:43:16'),
(8, 'dangduc123', 1231, 'memo_173904.mp4', '2022-06-30 00:43:45', '2022-06-30 00:43:45'),
(9, 'dangduc123', 1231, 'memo_173904.mp4', '2022-06-30 00:45:53', '2022-06-30 00:45:53'),
(10, 'dangduc123', 1231, 'memo_173904.mp4', '2022-06-30 00:45:56', '2022-06-30 00:45:56'),
(11, 'test', 2321, 'C:\\xampp\\tmp\\php32F6.tmp', '2022-06-30 08:23:42', '2022-06-30 08:23:42'),
(12, 'adaddadasda', 215489451, 'C:\\xampp\\tmp\\phpEC2A.tmp', '2022-06-30 08:31:02', '2022-06-30 08:31:02'),
(13, 'chào', 1209310, 'VN.png', '2022-06-30 08:36:17', '2022-06-30 08:36:17'),
(14, 'chào', 1209310, 'VN.png', '2022-06-30 08:36:37', '2022-06-30 08:36:37'),
(15, 'demo1', 123, 'kenjin_message_メッセージ_4.png', '2022-07-01 07:35:36', '2022-07-01 07:35:36'),
(16, 'demo1', 123, 'C:\\xampp\\tmp\\php18EE.tmp', '2022-07-01 07:39:28', '2022-07-01 07:39:28'),
(17, 'demo1', 123, 'C:\\xampp\\tmp\\phpDCCB.tmp', '2022-07-01 07:40:18', '2022-07-01 07:40:18'),
(18, 'dangduc', 123, 'C:\\xampp\\tmp\\php382B.tmp', '2022-07-01 07:40:41', '2022-07-01 07:40:41'),
(19, 'aoasas', 1120, 'C:\\xampp\\tmp\\php6B1A.tmp', '2022-07-01 18:50:29', '2022-07-01 18:50:29'),
(20, 'dangduc', 231, 'C:\\xampp\\tmp\\php7F7B.tmp', '2022-07-01 18:54:56', '2022-07-01 18:54:56'),
(21, 'dangduc', 13123, 'C:\\xampp\\tmp\\php7716.tmp', '2022-07-01 19:08:00', '2022-07-01 19:08:00'),
(22, 'test', 100, 'kenjin_イベント一覧 _ List event_3.png', '2022-07-01 19:18:33', '2022-07-01 19:18:33'),
(23, 'dangduc', 231, 'Home (2).png', '2022-07-01 19:27:25', '2022-07-01 19:27:25'),
(24, 'dangduc', 1, 'kenjin_イベント一覧 _ List event_1.png', '2022-07-02 00:03:19', '2022-07-02 00:03:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, NULL, '$2y$10$Qes.AyfWBcV8onk.MJL4Su5.J7EbyGjQ2aDJBVl4VWLwwVGQZO4D.', NULL, '2022-06-23 06:45:07', '2022-06-23 06:45:07'),
(9, 'dangduc', 'ducden164@gmail.com', 0, NULL, '$2y$10$3j3OVCvHBIuRUw5X4mT7kOt5aVM2rzkc7aiEmVNAhixCnAxT7iTVm', NULL, '2022-07-24 10:10:24', '2022-07-31 14:58:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Chỉ mục cho bảng `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Chỉ mục cho bảng `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Chỉ mục cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `demos`
--
ALTER TABLE `demos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `female_products`
--
ALTER TABLE `female_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `male_products`
--
ALTER TABLE `male_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `shoes_products`
--
ALTER TABLE `shoes_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `spmales`
--
ALTER TABLE `spmales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `demos`
--
ALTER TABLE `demos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `female_products`
--
ALTER TABLE `female_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `male_products`
--
ALTER TABLE `male_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shoes_products`
--
ALTER TABLE `shoes_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `spmales`
--
ALTER TABLE `spmales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
