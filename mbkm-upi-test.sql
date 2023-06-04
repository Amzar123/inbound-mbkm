-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2023 at 11:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbkm-upi-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(191) DEFAULT NULL,
  `event` varchar(191) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `commentable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commentable_type` varchar(191) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(191) DEFAULT NULL,
  `order` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` varchar(150) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `user_id`, `created_at`, `updated_at`) VALUES
('749e2551-b1ae-4f61-bc5c-f6778278183c', 'top-34-ruby-on-rail-interview-questions.pdf', 5, '2023-02-12 06:39:11', '2023-02-12 06:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `mime_type` varchar(191) DEFAULT NULL,
  `disk` varchar(191) NOT NULL,
  `conversions_disk` varchar(191) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\User', 5, 'fa6f0cbf-c331-4003-94ee-316220bc8b5d', 'users', 'DSC_1560_copy(1)', '3kQUGGfFbN9JFLxzfGU0Eo8bEUs31DkQ4neTnere.jpg', 'image/jpeg', 'media', 'media', 1622932, '[]', '[]', '[]', '[]', 1, '2023-02-12 03:26:58', '2023-02-12 03:26:58'),
(23, 'App\\Models\\User', 5, '020ee9f9-8a5c-431d-be96-e00fa8c20d23', 'files', 'top-34-ruby-on-rail-interview-questions', 'Eh71vPiA2T9mKhOQvhFdCbK96413g9DYSyPUV439.pdf', 'application/pdf', 'media', 'media', 117544, '[]', '[]', '[]', '[]', 2, '2023-02-12 06:39:11', '2023-02-12 06:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_11_062135_create_posts_table', 1),
(4, '2018_03_12_062135_create_categories_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2020_02_19_173641_create_settings_table', 1),
(8, '2020_02_19_173700_create_userprofiles_table', 1),
(9, '2020_02_19_173711_create_notifications_table', 1),
(10, '2020_02_22_115918_create_user_providers_table', 1),
(11, '2020_05_01_163442_create_tags_table', 1),
(12, '2020_05_01_163833_create_polymorphic_taggables_table', 1),
(13, '2020_05_04_151517_create_comments_table', 1),
(14, '2022_04_01_132914_create_media_table', 1),
(15, '2022_04_01_133918_create_permission_tables', 1),
(16, '2022_04_01_134140_create_activity_log_table', 1),
(17, '2022_04_01_134141_add_event_column_to_activity_log_table', 1),
(18, '2022_04_01_134142_add_batch_uuid_column_to_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `guard_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_backend', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(2, 'edit_settings', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(3, 'view_logs', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(4, 'view_users', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(5, 'add_users', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(6, 'edit_users', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(7, 'delete_users', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(8, 'restore_users', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(9, 'block_users', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(10, 'view_roles', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(11, 'add_roles', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(12, 'edit_roles', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(13, 'delete_roles', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(14, 'restore_roles', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(15, 'view_backups', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(16, 'add_backups', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(17, 'create_backups', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(18, 'download_backups', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(19, 'delete_backups', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(20, 'view_posts', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(21, 'add_posts', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(22, 'edit_posts', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(23, 'delete_posts', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(24, 'restore_posts', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(25, 'view_categories', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(26, 'add_categories', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(27, 'edit_categories', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(28, 'delete_categories', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(29, 'restore_categories', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(30, 'view_tags', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(31, 'add_tags', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(32, 'edit_tags', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(33, 'delete_tags', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(34, 'restore_tags', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(35, 'view_comments', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(36, 'add_comments', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(37, 'edit_comments', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(38, 'delete_comments', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(39, 'restore_comments', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(191) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `featured_image` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_og_image` varchar(191) DEFAULT NULL,
  `meta_og_url` varchar(191) DEFAULT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_by_name` varchar(191) DEFAULT NULL,
  `created_by_alias` varchar(191) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `guard_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(2, 'administrator', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(3, 'manager', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(4, 'executive', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(5, 'user', 'web', '2023-01-24 08:54:08', '2023-01-24 08:54:08'),
(6, 'program studi', 'web', '2023-02-12 00:56:02', '2023-02-12 00:56:02'),
(7, 'akademik', 'web', '2023-02-12 00:56:36', '2023-02-12 00:56:36');
(8, 'mahasiswa', 'web', '2023-02-12 00:56:36', '2023-02-12 00:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `val` text DEFAULT NULL,
  `type` char(20) NOT NULL DEFAULT 'string',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects_taken_students`
--

CREATE TABLE `subjects_taken_students` (
  `subject_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `sks` int(11) NOT NULL,
  `dosen` varchar(100) NOT NULL,
  `kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_taken_students`
--

INSERT INTO `subjects_taken_students` (`subject_id`, `user_id`, `name`, `created_at`, `updated_at`, `sks`, `dosen`, `kode`) VALUES
('ae23024b-8b22-4ac9-8c6d-db52265e6288', 5, 'Kalkulus', '2023-02-13 04:15:00', '2023-02-13 04:15:00', 3, 'Bu dosen', ''),
('284c5319-1062-468b-ba0d-c65328953d71', 5, 'Matematika dasar', '2023-02-13 04:15:00', '2023-02-13 04:15:00', 2, 'Bu dosen', '2'),
('2dbf722f-e208-4976-9139-347dacfd4abc', 5, 'Alpro', '2023-02-13 03:43:10', '2023-02-13 03:43:10', 3, 'Rosa', 'KOO5'),
('8b8ca83a-b7f5-4098-bb4c-cdef2dcab683', 5, 'Alpro', '2023-02-13 03:43:33', '2023-02-13 03:43:33', 3, 'Rosa', 'KOO5');

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

CREATE TABLE `userprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `url_website` varchar(191) DEFAULT NULL,
  `url_facebook` varchar(191) DEFAULT NULL,
  `url_twitter` varchar(191) DEFAULT NULL,
  `url_instagram` varchar(191) DEFAULT NULL,
  `url_linkedin` varchar(191) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `user_metadata` text DEFAULT NULL,
  `last_ip` varchar(191) DEFAULT NULL,
  `login_count` int(11) NOT NULL DEFAULT 0,
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `nik` varchar(50) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `nim_asal` varchar(50) DEFAULT NULL,
  `pt_asal` varchar(100) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `user_id`, `name`, `username`, `email`, `mobile`, `gender`, `url_website`, `url_facebook`, `url_twitter`, `url_instagram`, `url_linkedin`, `date_of_birth`, `address`, `bio`, `avatar`, `user_metadata`, `last_ip`, `login_count`, `last_login`, `email_verified_at`, `status`, `nik`, `nisn`, `nim_asal`, `pt_asal`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super Admin', '100001', 'super@admin.com', '+12483171988', 'Female', NULL, NULL, NULL, NULL, NULL, '2017-03-26', NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 16, '2023-01-29 03:43:03', NULL, 1, NULL, NULL, NULL, '', NULL, 1, NULL, '2023-01-24 08:54:07', '2023-01-29 03:43:03', NULL),
(2, 2, 'Admin Istrator', '100002', 'admin@admin.com', '(210) 875-9350', 'Other', NULL, NULL, NULL, NULL, NULL, '1985-04-21', NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 1, '2023-02-12 03:24:50', NULL, 1, NULL, NULL, NULL, '', NULL, 2, NULL, '2023-01-24 08:54:08', '2023-02-12 03:24:50', NULL),
(3, 3, 'Manager', '100003', 'manager@manager.com', '(206) 915-0555', 'Male', NULL, NULL, NULL, NULL, NULL, '1973-08-04', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-24 08:54:08', '2023-01-24 08:54:08', NULL),
(4, 4, 'Executive User', '100004', 'executive@executive.com', '1-331-943-1285', 'Male', NULL, NULL, NULL, NULL, NULL, '2021-04-02', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-24 08:54:08', '2023-01-24 08:54:08', NULL),
(5, 5, 'General User', '100005', 'user@user.com', '(304) 791-9341', 'Female', NULL, NULL, NULL, NULL, NULL, '1977-08-05', 'Bandung', NULL, 'http://localhost:8000/media/6/3kQUGGfFbN9JFLxzfGU0Eo8bEUs31DkQ4neTnere.jpg', NULL, '127.0.0.1', 21, '2023-02-13 02:53:12', NULL, 1, '1298192819829', '123456789', '2008433', 'Universitas Pendidikan Indonesia', NULL, 5, NULL, '2023-01-24 08:54:08', '2023-02-13 02:53:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT 'img/default-avatar.jpg',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `mobile`, `gender`, `date_of_birth`, `email_verified_at`, `password`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', '100001', 'super@admin.com', '+12483171988', 'Female', '2017-03-26', '2023-01-24 08:54:06', '$2y$10$0bNJL9omoxZeaNvUus5xkeA45iBlDgzZxV6JfZvg1u7jxEcsZzrCq', 'img/default-avatar.jpg', 1, NULL, '2023-01-24 08:54:06', '2023-01-24 08:54:06', NULL),
(2, 'Admin Istrator', '100002', 'admin@admin.com', '(210) 875-9350', 'Other', '1985-04-21', '2023-01-24 08:54:06', '$2y$10$.6gjsFU4qMNgR/wIU.zjCuK6boY7Sb7SvUsKMZ5ZFJ3VOEYgJENWC', 'img/default-avatar.jpg', 1, NULL, '2023-01-24 08:54:06', '2023-01-24 08:54:06', NULL),
(3, 'Manager', '100003', 'manager@manager.com', '(206) 915-0555', 'Male', '1973-08-04', '2023-01-24 08:54:06', '$2y$10$BOhNMKMcBlgOITHd7JdkNuNFjvBT.BojuU092KMGpmOUEtCSjWVd.', 'img/default-avatar.jpg', 1, NULL, '2023-01-24 08:54:06', '2023-01-24 08:54:06', NULL),
(4, 'Executive User', '100004', 'executive@executive.com', '1-331-943-1285', 'Male', '2021-04-02', '2023-01-24 08:54:06', '$2y$10$.qwbQlxav/8d6c6TgmmoZuagZezyJt9sFcCEt.9twoCoxRZ04JdZ.', 'img/default-avatar.jpg', 1, NULL, '2023-01-24 08:54:06', '2023-01-24 08:54:06', NULL),
(5, 'General User', '100005', 'user@user.com', '(304) 791-9341', 'Female', '1977-08-05', '2023-01-24 08:54:06', '$2y$10$UiMqm66JpgLklmw.YS2OLOPzHTXYL7ZzdYOp/mfV1mLX39yQT4UbW', 'http://localhost:8000/media/23/Eh71vPiA2T9mKhOQvhFdCbK96413g9DYSyPUV439.pdf', 1, NULL, '2023-01-24 08:54:06', '2023-02-12 06:39:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_providers`
--

CREATE TABLE `user_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(191) NOT NULL,
  `provider_id` varchar(191) NOT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_providers`
--
ALTER TABLE `user_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_providers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofiles`
--
ALTER TABLE `userprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_providers`
--
ALTER TABLE `user_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_providers`
--
ALTER TABLE `user_providers`
  ADD CONSTRAINT `user_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
