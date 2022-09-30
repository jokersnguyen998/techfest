-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 29, 2022 lúc 11:54 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lara_exhibition`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_id` bigint(20) UNSIGNED NOT NULL,
  `speaker_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discussions`
--

INSERT INTO `discussions` (`id`, `name`, `submit_id`, `speaker_id`) VALUES
(1, 'Jon Zemlak', 1, 1),
(2, 'Jesus Feest DVM', 1, 2),
(3, 'Brannon Renner III', 1, 3),
(4, 'Orie Tillman III', 1, 4),
(5, 'Edmond Mueller', 1, 5),
(6, 'Dr. Mose Ruecker', 2, 6),
(7, 'Ms. Jennifer Carter', 2, 7),
(8, 'Dr. Reymundo Haley', 2, 8),
(9, 'Mrs. Valentine Stamm DVM', 2, 9),
(10, 'Columbus Brakus', 2, 10),
(11, 'Florian Keeling DDS', 3, 11),
(12, 'Dr. Eriberto Waters', 3, 12),
(13, 'Brielle Hegmann', 3, 13),
(14, 'Prof. Carlo Abernathy', 3, 14),
(15, 'Orland Witting', 3, 15);

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
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `file_path`, `link`, `position`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(75, '/storage/stalls/228/OY9mB0ETtuJjiUnd6my9.png', NULL, 1, 228, 'App\\Models\\Stall', '2022-09-26 20:53:39', '2022-09-26 23:52:56'),
(76, '/storage/stalls/228/NirkoUcgeeLCM7NZwv2K.jpg', NULL, 2, 228, 'App\\Models\\Stall', '2022-09-26 20:53:39', '2022-09-26 23:53:08'),
(77, '/storage/stalls/229/e3RU1eFHbV3ba5axy9ME.jpg', NULL, 1, 229, 'App\\Models\\Stall', '2022-09-27 00:36:59', '2022-09-27 00:36:59'),
(78, '/storage/stalls/229/j8Ng11nwxjj9kdvWIGSl.jpg', NULL, 2, 229, 'App\\Models\\Stall', '2022-09-27 00:37:06', '2022-09-27 00:37:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_history`
--

CREATE TABLE `login_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-14 00:27:50', '2022-09-14 00:27:50'),
(2, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-14 01:29:42', '2022-09-14 01:29:42'),
(3, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-14 01:46:05', '2022-09-14 01:46:05'),
(4, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-14 18:17:40', '2022-09-14 18:17:40'),
(5, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-14 20:37:51', '2022-09-14 20:37:51'),
(6, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-14 23:48:31', '2022-09-14 23:48:31'),
(7, 1, '192.168.1.3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6,2 Mobile/15E148 Safari/604.1', '2022-09-15 04:41:50', '2022-09-15 04:41:50'),
(8, 1, '192.168.1.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-15 04:44:03', '2022-09-15 04:44:03'),
(9, 1, '192.168.1.3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6,2 Mobile/15E148 Safari/604.1', '2022-09-15 10:45:23', '2022-09-15 10:45:23'),
(10, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-15 18:36:07', '2022-09-15 18:36:07'),
(11, 1, '10.0.0.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-15 20:39:54', '2022-09-15 20:39:54'),
(12, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-15 23:38:05', '2022-09-15 23:38:05'),
(13, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-16 06:26:56', '2022-09-16 06:26:56'),
(14, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-16 23:07:05', '2022-09-16 23:07:05'),
(15, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-18 23:58:58', '2022-09-18 23:58:58'),
(16, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-23 00:37:24', '2022-09-23 00:37:24'),
(17, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-25 18:20:01', '2022-09-25 18:20:01'),
(18, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-25 20:11:01', '2022-09-25 20:11:01'),
(19, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-26 21:02:24', '2022-09-26 21:02:24'),
(20, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-26 23:46:25', '2022-09-26 23:46:25'),
(21, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-27 21:03:43', '2022-09-27 21:03:43'),
(22, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-27 23:42:32', '2022-09-27 23:42:32'),
(23, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-09-29 00:24:54', '2022-09-29 00:24:54');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_09_14_065946_add_more_fields_to_users_table', 1),
(18, '2022_09_14_070208_create_login_history_table', 1),
(19, '2022_09_14_071443_create_stalls_table', 1),
(24, '2022_09_15_131105_create_images_table', 2),
(25, '2022_09_15_160936_create_posts_table', 3),
(26, '2022_09_16_063938_create_submits_table', 4),
(27, '2022_09_16_064548_create_speakers_table', 4),
(28, '2022_09_16_065224_create_discussions_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stall_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `stall_id`, `title`, `content`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 228, 'Gạo Ngọc đỏ hương dứa', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost:8000/storage/photos/1/HinhBaiViet/nhan.jpg\" /></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\">Trong đời sống x&atilde; hội hiện đại, người ti&ecirc;u d&ugrave;ng ng&agrave;y c&agrave;ng quan t&acirc;m đến chất lượng cũng như nguồn gốc xuất xứ của sản phẩm. Sản phẩm gạo sạch Thạnh Đạt lu&ocirc;n hướng đến mục ti&ecirc;u l&agrave; sản phẩm sạch, an to&agrave;n, đảm bảo chất lượng v&agrave; vệ sinh an to&agrave;n thực phẩm. Để chứng minh chất lượng v&agrave; nguồn gốc xuất xứ sản phẩm đến người ti&ecirc;u d&ugrave;ng, cần thiết phải x&acirc;y dựng hệ thống lưu trữ th&ocirc;ng tin sản phẩm thương hiệu gạo sạch Thạnh Đạt. Hệ thống sẽ l&agrave; nơi lưu trữ bộ cơ sở dữ liệu từ m&ocirc; h&igrave;nh mẫu v&agrave; được tr&iacute;ch xuất th&ocirc;ng qua m&atilde; QR code nhằm cung cấp những dữ liệu, th&ocirc;ng tin về sản phẩm gạo như: th&ocirc;ng tin về c&aacute;c giai đoạn gieo trồng, chăm s&oacute;c, thu hoạch, chế biến, ti&ecirc;u thụ; th&ocirc;ng tin về thuốc bảo vệ thực vật đ&atilde; sử dụng; th&ocirc;ng tin về h&igrave;nh ảnh, gi&aacute; cả sản phẩm cũng như những địa chỉ li&ecirc;n hệ cung ứng sản phẩm,&hellip; V&igrave; vậy việc x&acirc;y dựng m&ocirc; h&igrave;nh mẫu cũng như thu thập dữ liệu từ m&ocirc; h&igrave;nh mẫu l&agrave; hoạt động hết sức cần thiết để x&acirc;y dựng được bộ cơ sở dữ liệu về m&ocirc; h&igrave;nh mẫu l&agrave;m nền tảng x&acirc;y dựng hệ thống lưu trữ v&agrave; truy xuất nguồn gốc sản phẩm.</span></p>', 1, '2022-09-27 00:42:39', '2022-09-27 00:53:06', NULL),
(11, 228, 'Gạo Ngọc đỏ hương dứa', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost:8000/storage/photos/1/HinhBaiViet/anhgao.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Gạo Ngọc đỏ hương dứa được canh t&aacute;c theo quy tr&igrave;nh sản xuất l&uacute;a sạch tại th&agrave;nh phố Cần Thơ (quy tr&igrave;nh được ban h&agrave;nh k&egrave;m theo Quyết định số 246/QĐ-SNNPTNT ng&agrave;y 06 th&aacute;ng 12 năm 2017 của Sở N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n) với c&aacute;c nội dung cụ thể như sau:</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">(i) Thời vụ: gieo sạ theo lịch khuyến c&aacute;o của địa phương &ldquo;Gieo sạ tập trung, đồng loạt n&eacute; rầy&rdquo;. Khuyến c&aacute;o sản xuất 2 vụ/năm.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">(ii) Chuẩn bị đất: Vệ sinh đồng ruộng, trục trạc tạo mặt ruộng bằng phẳng, tu sửa bờ, bọng, đ&aacute;nh r&atilde;nh tho&aacute;t nước tốt gi&uacute;p l&uacute;a mọc đều, hạn chế cỏ dại v&agrave; quản l&yacute; nước được tốt hơn.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">(iii) Chuẩn bị giống:<br />\r\n- Phải sử dụng giống l&uacute;a x&aacute;c nhận, giống l&uacute;a đ&aacute;p ứng nhu cầu thị trường;<br />\r\n- Gieo sạ: Sạ h&agrave;ng, sạ lan, phun bằng m&aacute;y gieo sạ hoặc m&aacute;y cấy; lượng giống sạ 80-100kg/ha; cấy 40-60kg/ha.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">(iv) Ph&acirc;n b&oacute;n:<br />\r\n- Phương ph&aacute;p b&oacute;n: R&uacute;t nước khi b&oacute;n ph&acirc;n, n&ecirc;n giữ mực nước 1-3 cm<br />\r\n- B&oacute;n ph&acirc;n cho l&uacute;a theo C&ocirc;ng thức: 80-100N, 40-60P2O5; 30-50K2O; c&oacute; thể sử dụng ph&acirc;n đơn hay ph&acirc;n hỗn hợp nhưng phải đảm bảo c&acirc;n đối c&aacute;c dưỡng chất v&agrave; t&ugrave;y theo điều kiện sinh trưởng, m&ugrave;a vụ, thời gian sinh trưởng của giống l&uacute;a đang canh t&aacute;c m&agrave; gia giảm thời gian b&oacute;n v&agrave; số lượng ph&acirc;n b&oacute;n; tăng cường b&oacute;n ph&acirc;n hữu cơ nhằm n&acirc;ng cao chất lượng sản phẩm.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">(v) Chăm s&oacute;c:<br />\r\n- Tưới nước: Tưới nước tiết kiệm theo phương ph&aacute;p ngập kh&ocirc; xen kẽ, trước v&agrave; sau trổ 7 ng&agrave;y kh&ocirc;ng được để ruộng kh&ocirc; nước, th&aacute;o cạn nước ruộng ở thời điểm 10-15 ng&agrave;y trước thu hoạch để l&uacute;a chin đều v&agrave; dễ thu hoạch bằng m&aacute;y gặt đập li&ecirc;n hợp.<br />\r\n- Cấy dặm: L&uacute;a khoảng 12-18 ng&agrave;y, tiến h&agrave;nh cấy dặm những nơi bị chết; tỉa những noi mật độ qu&aacute; d&agrave;y.<br />\r\n- Khử lẫn: Thường xuy&ecirc;n khử lẫn những c&acirc;y kh&aacute;c dạng h&igrave;nh v&agrave; l&uacute;a cỏ, kh&acirc;u khử lẫn thực hiện dứt điểm 15 ng&agrave;y trước khi thu hoạch</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">(vi) Quản l&yacute; dịch hại: Thăm đồng thường xuy&ecirc;n, kh&ocirc;ng phun thuốc trừ s&acirc;u sớm trong giai đoạn từ 0 đến 40 ng&agrave;y sau sạ. Chỉ sử dụng thuốc BVTV khi thật cần thiết, ưu ti&ecirc;n sử dụng c&aacute;c loại thuốc c&oacute; độ độc thấp, thuốc c&oacute; nguồn gốc vi sinh v&agrave; phải tu&acirc;n thủ theo khuyến c&aacute;p của cơ quan bảo vệ thực vật địa phương v&agrave; theo nguy&ecirc;n tắc &ldquo;4 đ&uacute;ng&rdquo;. Kh&ocirc;ng sử dụng thuốc BVTV trong thời gian 2 tuần trước khi thu hoạch, kh&ocirc;ng lạm dụng thuốc k&iacute;ch th&iacute;ch sinh trưởng để tr&aacute;nh ảnh hưởng đến phẩm chất hạt gạo.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">(vii) Thu hoạch, bảo quản:<br />\r\n- Trước khi thu hoạch 10-15 ng&agrave;y tiến h&agrave;nh th&aacute;o kh&ocirc; nước ruộng chuẩn bị thu hoạch<br />\r\n- Thu hoạch đ&uacute;ng độ chin (85-90% hạt tr&ecirc;n b&ocirc;ng chuyển sang m&agrave;u v&agrave;ng rơm), n&ecirc;n sử dụng m&aacute;y gặt đập li&ecirc;n hợp.<br />\r\n- Bảo quản ở ẩm độ 14%.</span></span></p>', 1, '2022-09-27 00:55:42', '2022-09-27 00:55:44', NULL),
(12, 229, 'ALPHA GROUP (CÔNG TY ĐẦU TƯ CÔNG NGHỆ VÀ CHUYỂN ĐỔI SỐ ALPHAGROUP)', '<p><img alt=\"\" class=\"w-100\" src=\"http://localhost:8000/storage/photos/1/HinhBaiViet/banner.jpg\" /></p>', 1, '2022-09-27 00:57:45', '2022-09-27 00:59:47', NULL),
(13, 229, 'ALPHA GROUP (CÔNG TY ĐẦU TƯ CÔNG NGHỆ VÀ CHUYỂN ĐỔI SỐ ALPHAGROUP)', '<p><img alt=\"\" class=\"w-100\" src=\"http://localhost:8000/storage/photos/1/HinhBaiViet/1.jpg\" /></p>', 1, '2022-09-27 00:58:03', '2022-09-27 00:59:38', NULL),
(14, 229, 'ALPHA GROUP (CÔNG TY ĐẦU TƯ CÔNG NGHỆ VÀ CHUYỂN ĐỔI SỐ ALPHAGROUP)', '<p><img alt=\"\" class=\"w-100\" src=\"http://localhost:8000/storage/photos/1/HinhBaiViet/2.jpg\" /></p>', 1, '2022-09-27 00:58:17', '2022-09-27 00:59:28', NULL),
(15, 229, 'ALPHA GROUP (CÔNG TY ĐẦU TƯ CÔNG NGHỆ VÀ CHUYỂN ĐỔI SỐ ALPHAGROUP)', '<p><img alt=\"\" class=\"w-100\" src=\"http://localhost:8000/storage/photos/1/HinhBaiViet/3.jpg\" /></p>', 1, '2022-09-27 00:58:30', '2022-09-27 00:59:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submit_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `speakers`
--

INSERT INTO `speakers` (`id`, `submit_id`, `name`, `work_place`, `avatar`, `sex`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Casandra Hermiston', 'es_ES', 'https://via.placeholder.com/640x480.png/004411?text=ut', 0, '2022-09-16 00:06:13', '2022-09-16 00:06:13', NULL),
(2, 1, 'Mrs. Pauline Wintheiser', 'en_TT', 'https://via.placeholder.com/640x480.png/005533?text=consequuntur', 1, '2022-09-16 00:06:13', '2022-09-16 00:06:13', NULL),
(3, 1, 'Amparo Swaniawski', 'zh_SG', 'https://via.placeholder.com/640x480.png/002299?text=minima', 1, '2022-09-16 00:06:13', '2022-09-16 00:06:13', NULL),
(4, 1, 'Kale Kessler', 'so_ET', 'https://via.placeholder.com/640x480.png/00aaff?text=minus', 0, '2022-09-16 00:06:13', '2022-09-16 00:06:13', NULL),
(5, 1, 'Verna Bednar Sr.', 'wal_ET', 'https://via.placeholder.com/640x480.png/002299?text=aut', 0, '2022-09-16 00:06:13', '2022-09-16 00:06:13', NULL),
(6, 2, 'Jada Leffler', 'sa_IN', 'https://via.placeholder.com/640x480.png/0000ff?text=voluptatem', 1, '2022-09-16 00:06:36', '2022-09-16 00:06:36', NULL),
(7, 2, 'Michelle Runolfsson', 'ro_MD', 'https://via.placeholder.com/640x480.png/008855?text=est', 0, '2022-09-16 00:06:36', '2022-09-16 00:06:36', NULL),
(8, 2, 'Dr. Bruce Howe DDS', 'fr_MC', 'https://via.placeholder.com/640x480.png/0055aa?text=minima', 0, '2022-09-16 00:06:36', '2022-09-16 00:06:36', NULL),
(9, 2, 'Mr. Holden Predovic IV', 'tig_ER', 'https://via.placeholder.com/640x480.png/00ff44?text=placeat', 1, '2022-09-16 00:06:36', '2022-09-16 00:06:36', NULL),
(10, 2, 'Ms. Maye Strosin', 'uz_UZ', 'https://via.placeholder.com/640x480.png/00aaee?text=eos', 1, '2022-09-16 00:06:36', '2022-09-16 00:06:36', NULL),
(11, 3, 'Josiane Schiller', 'sa_IN', 'https://via.placeholder.com/640x480.png/001144?text=earum', 0, '2022-09-16 00:07:01', '2022-09-16 00:07:01', NULL),
(12, 3, 'Mason Ondricka', 'bo_CN', 'https://via.placeholder.com/640x480.png/006699?text=iste', 1, '2022-09-16 00:07:01', '2022-09-16 00:07:01', NULL),
(13, 3, 'Tomas Thompson', 'ar_JO', 'https://via.placeholder.com/640x480.png/00eeaa?text=quia', 1, '2022-09-16 00:07:01', '2022-09-16 00:07:01', NULL),
(14, 3, 'Dr. Jacinto Stanton I', 'pt_PT', 'https://via.placeholder.com/640x480.png/004466?text=nihil', 0, '2022-09-16 00:07:01', '2022-09-16 00:07:01', NULL),
(15, 3, 'Godfrey Rippin', 'fr_SN', 'https://via.placeholder.com/640x480.png/003355?text=quisquam', 1, '2022-09-16 00:07:01', '2022-09-16 00:07:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stalls`
--

CREATE TABLE `stalls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stall_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stalls`
--

INSERT INTO `stalls` (`id`, `name`, `video_path`, `stall_image_path`, `logo`, `standy`, `description`, `contact`, `position`, `created_at`, `updated_at`, `deleted_at`) VALUES
(228, 'HTX - Gạo sạch Thạnh Đạt', '/storage/stalls/228/VUhxPA6ools7zh36mua3.mp4', 'https://via.placeholder.com/720x540.png/00aaee?text=et', '/storage/stalls/228/NQPjlUgVvackfog3JUUL.jpg', '/storage/stalls/228/f8P11yyYaSThQFjLEfz9.png', 'Ab odit possimus eum rem repellat non quasi. Rerum ea ad quo asperiores. Quod perspiciatis ipsam hic. Vero blanditiis ut libero quia. Repudiandae officiis aperiam excepturi distinctio officiis laudantium quis. Ut quis ea reprehenderit quis quo. Doloremque ut occaecati aliquid excepturi est sint quia. Ducimus voluptate ea corrupti suscipit laboriosam et quos. In possimus eius doloremque. Magnam quaerat voluptatem at et similique autem nihil nisi. Eos eaque quasi voluptas maiores aspernatur.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-29 00:47:19', NULL),
(229, 'ALPHA Software', '/storage/stalls/229/yUAL8a3mWbrRQMALDHhz.mp4', 'https://via.placeholder.com/720x540.png/0066cc?text=id', '/storage/stalls/229/VwVWxx1NWEgRQyySMWFj.jpg', '/storage/stalls/229/mwVYAx7eWCn7IoJF1NXZ.png', 'Rerum dolorem assumenda provident rerum. Amet vel modi ut sapiente veritatis. Laborum hic officiis modi rerum. A ut eligendi nemo ex qui dolores. Libero quos ut eos quaerat accusantium temporibus expedita totam. Ea et voluptatem dicta sit vel minus fuga. Reprehenderit blanditiis necessitatibus corrupti ut. Voluptas similique quis repudiandae iste sed neque quis. Qui itaque quos distinctio. Alias cumque aut aut quaerat nam iste. Numquam architecto voluptatibus iste nihil optio.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-27 00:32:28', NULL),
(230, 'Misty Hessel', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/00dd99?text=quisquam', 'https://via.placeholder.com/500x500.png/008877?text=suscipit', 'https://via.placeholder.com/600x1342.png/00cc33?text=aliquam', 'Corporis distinctio fugiat dolor. Vel consectetur et sed ea et enim. Aspernatur ad minima laborum. Similique blanditiis ad incidunt reiciendis. Est sunt maiores rerum atque qui. Ut nostrum eum et placeat qui. Esse eum minus voluptatem ipsam veritatis accusamus et. Animi vel laboriosam perferendis facere sed. Porro odio doloremque dolor numquam et corrupti. Quae delectus aliquid quis quaerat at ut esse. Beatae officiis omnis aut velit culpa.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(231, 'Bertrand Olson', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/0000aa?text=doloremque', 'https://via.placeholder.com/500x500.png/00bb22?text=laborum', 'https://via.placeholder.com/600x1342.png/00dd55?text=ut', 'Sit in incidunt qui voluptas. Eveniet modi magni autem qui consequatur corporis dolore sint. Adipisci deleniti error quo rem. Suscipit omnis et quo ipsa consectetur minima. Tempora nemo enim praesentium et velit ut maiores. Minus et est perspiciatis. Amet delectus nihil totam quia dolorem. Voluptas maxime ut enim placeat eos cumque.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(232, 'Iliana Dach', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/0077cc?text=est', 'https://via.placeholder.com/500x500.png/00eebb?text=pariatur', 'https://via.placeholder.com/600x1342.png/0033cc?text=velit', 'Inventore quis incidunt amet nihil sint cumque. Beatae dignissimos ea tempora dolor. Exercitationem magnam sint voluptates voluptas eum eos laborum. Sint quia optio occaecati. Quia ab ipsam quam soluta eaque. Autem maiores itaque incidunt odit deleniti aut eum et. Sit corrupti velit ullam praesentium vel molestiae omnis.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(233, 'Dr. Clara Kutch', 'https://via.placeholder.com/720x540.png/00bb77?text=fugahttp://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/0066ee?text=consequuntur', 'https://via.placeholder.com/500x500.png/00aaff?text=doloremque', 'https://via.placeholder.com/600x1342.png/001111?text=et', 'Recusandae quae quis dolorem error. Ipsum numquam sint ea est. Qui ipsam non ut error inventore quaerat. Nisi porro adipisci quasi tempora sint. Eveniet ipsa eveniet in sit aspernatur. A eveniet cumque et repellat. Eum praesentium ad porro beatae dolor. Sunt quis odio laudantium eligendi omnis odit. Quod sunt explicabo facilis ut quaerat enim.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(234, 'Prof. Milo Hartmann DVM', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/008866?text=aperiam', 'https://via.placeholder.com/500x500.png/00aa88?text=ut', 'https://via.placeholder.com/600x1342.png/00ddaa?text=velit', 'Explicabo et dolores sed laudantium autem autem. Voluptatum ipsum vitae vel eum in fugit. Aut temporibus et quis vero mollitia beatae. Id et in quam id doloremque quisquam. Consequatur laborum nostrum placeat culpa. Dicta adipisci saepe consequatur deserunt dolor error. Porro repellendus ratione saepe ut aut. Omnis iste amet nihil sed. Occaecati quo recusandae libero aut quis eos tenetur. Autem voluptatem saepe sint. Ipsam rerum cupiditate dolor voluptas. Aut ullam error laboriosam ratione vel.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(235, 'Ayden Luettgen', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/000099?text=aut', 'https://via.placeholder.com/500x500.png/00dd99?text=sunt', 'https://via.placeholder.com/600x1342.png/0011ff?text=asperiores', 'Deserunt qui impedit voluptate mollitia laborum reiciendis. Nulla voluptates numquam perferendis suscipit ea et unde. Accusantium veritatis facilis architecto hic dolor et. Rem reiciendis ipsa sed rerum voluptatibus alias dolor. Voluptatum voluptatum cupiditate necessitatibus est accusamus similique delectus. Exercitationem odit sunt molestiae porro eligendi qui molestiae. Non hic beatae quis eum sed. Autem atque fugiat ea eveniet ullam.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(236, 'Jany Buckridge I', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/009900?text=expedita', 'https://via.placeholder.com/500x500.png/0000ee?text=harum', 'https://via.placeholder.com/600x1342.png/003355?text=ea', 'Corrupti rerum nisi quia ipsam odio rerum placeat. Rem cupiditate commodi aut quia. Sed in aut blanditiis quam magnam enim ducimus magnam. Distinctio fuga fugit ullam illo rerum sed mollitia. Deleniti enim aut molestiae animi fugit corrupti aspernatur. Vitae et nemo nostrum consequuntur vel. Suscipit ut sed ipsa voluptate eius iste.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(237, 'Nannie Ortiz', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/0099ee?text=voluptatum', 'https://via.placeholder.com/500x500.png/008855?text=cumque', 'https://via.placeholder.com/600x1342.png/0066bb?text=autem', 'Voluptate qui rem ut laboriosam nulla et. Architecto possimus eum consequatur. Est dignissimos voluptatem qui ullam ut inventore impedit. Neque nesciunt iure beatae aut enim expedita. Earum modi repellat alias architecto. Eligendi blanditiis consectetur asperiores sed totam vitae. Cum eligendi repellat laborum aut minima enim. Beatae illum maiores eius fugiat corrupti velit deleniti voluptatibus. Est tempora inventore dolor repudiandae itaque cum voluptatibus.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(238, 'Ms. Hellen Fadel', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/009977?text=deserunt', 'https://via.placeholder.com/500x500.png/001155?text=quod', 'https://via.placeholder.com/600x1342.png/00bbbb?text=sit', 'Corporis quibusdam neque sequi eaque quaerat voluptas est rem. Nemo quis officiis sit nostrum veritatis. Voluptas cupiditate nihil sunt voluptates ipsa iusto. Nulla ratione omnis nam ipsam. Vel odio labore itaque aliquam soluta sunt sed voluptate. Non voluptatem excepturi ut molestias quisquam. Nobis vero ad et. Eos esse eligendi dolores et quidem aut. Reprehenderit dolores occaecati architecto quam nihil dolores aut. Aut voluptas omnis facilis labore. Consequatur sint unde consectetur est.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL),
(239, 'Sage Barrows', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'https://via.placeholder.com/720x540.png/00eebb?text=voluptatem', 'https://via.placeholder.com/500x500.png/00ee66?text=voluptatum', 'https://via.placeholder.com/600x1342.png/00bb33?text=eligendi', 'Provident voluptatem cum doloribus commodi. Qui tempora voluptate fuga ab corporis et eos. Et praesentium minima repellendus aut saepe. Earum illum hic nemo aut voluptatem. Debitis deserunt molestiae tempora exercitationem aliquam. Ea placeat aperiam ratione odio harum facilis provident. Velit voluptate eligendi quae eveniet qui et quaerat. Aut quis eum nihil temporibus qui et.', 'http://localhost:8000', NULL, '2022-09-26 20:30:35', '2022-09-26 20:30:35', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `submits`
--

CREATE TABLE `submits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `submits`
--

INSERT INTO `submits` (`id`, `name`, `type`, `topic`, `location`, `time_start`, `schedule`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ứng dụng công nghệ phục vụ phát triển nông nghiệp đô thị theo hướng bền vững', 'Hội thảo', '<p>Thực trạng ph&aacute;t triển n&ocirc;ng nghiệp đ&ocirc; thị tại th&agrave;nh phố Cần Thơ v&agrave; v&ugrave;ng ĐBSCL; giải ph&aacute;p c&ocirc;ng nghệ thiết bị hỗ trợ ph&aacute;t triển n&ocirc;ng nghiệp đ&ocirc; thị theo hướng xanh v&agrave; b&ecirc;̀n vững; c&aacute;c m&ocirc; h&igrave;nh ph&aacute;t triển n&ocirc;ng nghiệp đ&ocirc; thị ứng dụng c&ocirc;ng ngh&ecirc;̣ cao ph&ugrave; hợp với điều kiện tại th&agrave;nh phố Cần Thơ v&agrave; v&ugrave;ng ĐBSCL; kinh nghi&ecirc;̣m và giải pháp x&acirc;y dựng, tri&ecirc;̉n khai m&ocirc; hình n&ocirc;ng nghi&ecirc;̣p c&ocirc;ng ngh&ecirc;̣ cao; Ứng dụng c&ocirc;ng nghệ 4.0 trong lĩnh vực n&ocirc;ng nghiệp.</p>', 'Khách sạn Đông Hà (Fortuneland Hotel Can Tho; Số 141 Trần Văn Khéo, phường Cái Khế, quận Ninh Kiều, thành phố Cần Thơ)', '2022-11-02 06:30:00', '/storage/submits/1/5BRvhKvP7s4FNPAcxbGg.pdf', 1, '2022-09-16 00:06:13', '2022-09-29 08:40:18', NULL),
(2, 'Thúc đẩy thương mại hóa kết quả nghiên cứu, các sản phẩm, công nghệ và thiết bị từ các viện, trường, doanh nghiệp, các tổ chức khoa học và công nghệ', 'Tọa đàm', '<p>Thực trạng thương mại h&oacute;a kết quả nghi&ecirc;n cứu, c&aacute;c sản phẩm c&ocirc;ng nghệ v&agrave; thiết bị tại v&ugrave;ng ĐBSCL; Đề xuất cơ chế ch&iacute;nh s&aacute;ch th&uacute;c đẩy thương mại h&oacute;a kết quả nghi&ecirc;n cứu; Giải ph&aacute;p th&uacute;c đẩy thương mại h&oacute;a kết quả nghi&ecirc;n cứu; Thực tiễn v&agrave; kinh nghiệm th&uacute;c đẩy thương mại h&oacute;a kết quả nghi&ecirc;n cứu, thực tế từ c&aacute;c Viện trường.</p>', 'Khách sạn Đông Hà (Fortuneland Hotel Can Tho; Số 141 Trần Văn Khéo, phường Cái Khế, quận Ninh Kiều, thành phố Cần Thơ)', '2022-11-03 06:30:00', '/storage/submits/2/jmxiPLURbGAhJDYtOmKZ.pdf', 1, '2022-09-16 00:06:13', '2022-09-29 08:40:52', NULL),
(3, 'Dataconnect Cần Thơ 2022 với chủ đề \"Phát triển nguồn tin khoa học, công nghệ và đổi mới sáng tạo\"', 'Hội thảo', '<p>Vai tr&ograve; của nguồn tin Khoa học, C&ocirc;ng nghệ v&agrave; Đổi mới s&aacute;ng tạo trong bối cảnh chuyển đổi số; Nhu cầu sử dụng nguồn tin Khoa học, C&ocirc;ng nghệ v&agrave; Đổi mới s&aacute;ng tạo trong lĩnh vực n&ocirc;ng nghiệp tại th&agrave;nh phố Cần Thơ; Nguồn tin Khoa học, C&ocirc;ng nghệ v&agrave; Đổi mới s&aacute;ng tạo phục vụ nghi&ecirc;n cứu, đ&agrave;o tạo trong lĩnh vực n&ocirc;ng nghiệp tại Trung t&acirc;m Học liệu - Trường Đại học Cần Thơ; Khai th&aacute;c nguồn tin Khoa học, C&ocirc;ng nghệ v&agrave; Đổi mới s&aacute;ng tạo trong lĩnh vực n&ocirc;ng nghiệp tại Thư viện TP. Cần Thơ; Giới thiệu c&aacute;c nguồn tin Khoa học, C&ocirc;ng nghệ v&agrave; Đổi mới s&aacute;ng tạo trong lĩnh vực n&ocirc;ng nghiệp trong bối cảnh cuộc CMCN lần thứ tư; C&aacute;c giải ph&aacute;p chuyển đổi số nguồn tin Khoa học, C&ocirc;ng nghệ v&agrave; Đổi mới s&aacute;ng tạo trong lĩnh vực n&ocirc;ng nghiệp.</p>', 'Khách sạn Đông Hà (Fortuneland Hotel Can Tho; Số 141 Trần Văn Khéo, phường Cái Khế, quận Ninh Kiều, thành phố Cần Thơ)', '2022-11-04 06:30:00', '/storage/submits/3/RsPB825DWptJGS1WGiKS.pdf', 1, '2022-09-16 00:06:13', '2022-09-29 08:41:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Huy', 'Nguyen', 'nqhuy', NULL, NULL, '$2y$10$Rcsgx//7GuuZzkWPNZXOVuxCBVYjXzO.q1mn.313s6dk8Twgx/p0e', NULL, 1, '2022-09-14 00:27:50', '2022-09-14 00:27:50', NULL),
(2, 'Trung', 'Lê', 'lttrung', NULL, NULL, '$2y$10$bL5/D45Coqg//TdoBDAGO.6S5DITT6NO9QxhSO/zH9FMPwlb5RHg.', NULL, 0, '2022-09-14 01:46:05', '2022-09-14 01:46:05', NULL),
(4, 'Tính', 'Trần', 'lttinh', NULL, NULL, '$2y$10$rjN.y7mJfxLtwR4AXuii3erjEOkgoNl/I3uP2otPboeTYRcSEKrJi', NULL, 0, '2022-09-15 06:05:15', '2022-09-15 06:05:15', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_submit_id_foreign` (`submit_id`),
  ADD KEY `discussions_speaker_id_foreign` (`speaker_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_history_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
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
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_stall_id_foreign` (`stall_id`);

--
-- Chỉ mục cho bảng `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speakers_submit_id_foreign` (`submit_id`);

--
-- Chỉ mục cho bảng `stalls`
--
ALTER TABLE `stalls`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `submits`
--
ALTER TABLE `submits`
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
-- AUTO_INCREMENT cho bảng `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `stalls`
--
ALTER TABLE `stalls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT cho bảng `submits`
--
ALTER TABLE `submits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`),
  ADD CONSTRAINT `discussions_submit_id_foreign` FOREIGN KEY (`submit_id`) REFERENCES `submits` (`id`);

--
-- Các ràng buộc cho bảng `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_stall_id_foreign` FOREIGN KEY (`stall_id`) REFERENCES `stalls` (`id`);

--
-- Các ràng buộc cho bảng `speakers`
--
ALTER TABLE `speakers`
  ADD CONSTRAINT `speakers_submit_id_foreign` FOREIGN KEY (`submit_id`) REFERENCES `submits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
