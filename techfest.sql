-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 01, 2022 lúc 07:46 PM
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
-- Cơ sở dữ liệu: `techfest`
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
(1, '/storage/stalls/1/zpZH4fDiEDKO1y2a5Mgt.jpg', NULL, 1, 1, 'App\\Models\\Stall', '2022-10-01 17:05:15', '2022-10-01 17:05:15'),
(2, '/storage/stalls/1/fEH4GhR85zg29llCuKuS.jpg', NULL, 2, 1, 'App\\Models\\Stall', '2022-10-01 17:05:26', '2022-10-01 17:05:26');

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
(1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', '2022-10-01 17:04:20', '2022-10-01 17:04:20');

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
(5, '2022_09_14_065946_add_more_fields_to_users_table', 1),
(6, '2022_09_14_070208_create_login_history_table', 1),
(7, '2022_09_14_071443_create_stalls_table', 1),
(8, '2022_09_15_131105_create_images_table', 1),
(9, '2022_09_15_160936_create_posts_table', 1),
(10, '2022_09_16_063938_create_submits_table', 1),
(11, '2022_09_16_064548_create_speakers_table', 1),
(12, '2022_09_16_065224_create_discussions_table', 1);

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submit_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Rebecca Yost', '/storage/stalls/1/XDhIwqbcYRNvxQAoklEy.mp4', NULL, '/storage/stalls/1/BN0cN7RBEt0rCkUnBtOd.jpg', '/storage/stalls/1/mxdhsAtZfBZuVSnti5ZG.png', 'Excepturi provident vitae in praesentium omnis ipsum et. Ut provident pariatur occaecati rerum voluptatem ut. Numquam recusandae praesentium omnis voluptas quidem.', NULL, NULL, '2022-09-30 15:31:17', '2022-10-01 17:15:55', NULL),
(2, 'Prof. Kyleigh Ledner', 'https://via.placeholder.com/720x540.png/00aa22?text=laboriosam', NULL, 'https://via.placeholder.com/500x500.png/005577?text=aut', 'https://via.placeholder.com/600x1342.png/001166?text=expedita', 'Aut sed omnis qui. Sint suscipit rerum reprehenderit sequi magni sit aut. Culpa atque saepe aliquid voluptatem. Quia ut officia alias ab eveniet deleniti. Ut et et praesentium fugiat qui explicabo ut.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(3, 'Josie Von', 'https://via.placeholder.com/720x540.png/000022?text=culpa', NULL, 'https://via.placeholder.com/500x500.png/006600?text=et', 'https://via.placeholder.com/600x1342.png/007733?text=eos', 'Est laborum perferendis est rerum doloremque. Illo unde facilis est sed ab nobis. Quas dolor sunt voluptatem quia.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(4, 'Malinda Lakin DDS', 'https://via.placeholder.com/720x540.png/0088cc?text=consectetur', NULL, 'https://via.placeholder.com/500x500.png/008888?text=sint', 'https://via.placeholder.com/600x1342.png/006688?text=vel', 'Tempore iste est qui qui et. Quia alias voluptates necessitatibus. Quo molestiae fugiat qui impedit delectus omnis eum. Enim libero fugit illo velit sequi aut consectetur magni. Amet unde dicta doloribus nostrum rerum perspiciatis.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(5, 'Dolores Heaney DDS', 'https://via.placeholder.com/720x540.png/00ddee?text=ipsum', NULL, 'https://via.placeholder.com/500x500.png/00ee33?text=dolorum', 'https://via.placeholder.com/600x1342.png/00ee22?text=et', 'Corrupti ex consequatur officia quis. Voluptatem est velit harum veritatis non corporis. Dolore voluptate impedit impedit ullam. Quis quia dolorem qui sint corrupti et. Nihil omnis rerum possimus quia.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(6, 'Alice Nolan', 'https://via.placeholder.com/720x540.png/00bbaa?text=et', NULL, 'https://via.placeholder.com/500x500.png/00eeaa?text=unde', 'https://via.placeholder.com/600x1342.png/00dd77?text=ut', 'Nihil dolores necessitatibus placeat fugiat mollitia ducimus itaque. Incidunt culpa reiciendis provident velit voluptate. Voluptas est consequatur velit autem optio quae.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(7, 'Carlie Keebler', 'https://via.placeholder.com/720x540.png/0000bb?text=iste', NULL, 'https://via.placeholder.com/500x500.png/0077cc?text=nobis', 'https://via.placeholder.com/600x1342.png/001177?text=magnam', 'Beatae qui dolorem est delectus nihil. Aut tenetur ipsam magni soluta aut et reprehenderit. Possimus rem iure iste sint recusandae ipsa vel.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(8, 'Guillermo Zieme Sr.', 'https://via.placeholder.com/720x540.png/00aa22?text=aliquam', NULL, 'https://via.placeholder.com/500x500.png/000000?text=et', 'https://via.placeholder.com/600x1342.png/007744?text=dolores', 'In veniam exercitationem quo in ut blanditiis voluptatem. Laudantium quae fuga dolores est consectetur. Aliquam voluptas qui ut blanditiis voluptatem est. Iure doloribus commodi possimus.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(9, 'Francesco Lesch', 'https://via.placeholder.com/720x540.png/002277?text=perspiciatis', NULL, 'https://via.placeholder.com/500x500.png/00aa99?text=in', 'https://via.placeholder.com/600x1342.png/0077aa?text=ullam', 'Laudantium adipisci ducimus dolores ea commodi odit ullam ipsum. Enim ut quo soluta nostrum et neque. Qui aliquid accusamus id aliquam.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(10, 'Mrs. Avis Marks', 'https://via.placeholder.com/720x540.png/00ff88?text=soluta', NULL, 'https://via.placeholder.com/500x500.png/0099cc?text=repellat', 'https://via.placeholder.com/600x1342.png/004455?text=nemo', 'Porro rerum repellendus sed culpa sed nisi et dolor. Et earum et aspernatur. Accusamus ex adipisci qui accusantium. Enim est dolores et aut ut quo.', NULL, NULL, '2022-09-30 15:31:17', '2022-09-30 15:31:17', NULL),
(11, 'Loy Herzog', 'https://via.placeholder.com/720x540.png/007722?text=ut', NULL, 'https://via.placeholder.com/500x500.png/0033ff?text=sit', 'https://via.placeholder.com/600x1342.png/00cc33?text=consequatur', 'At cum nam voluptatem ut nihil incidunt. Rem repellat sed aut earum dolore non. Omnis rerum cupiditate fugit sunt qui ad eveniet. Unde sed et et quis. Fuga quidem nihil sunt at sed nostrum.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(12, 'Prof. Loren Fritsch', 'https://via.placeholder.com/720x540.png/00ffdd?text=facere', NULL, 'https://via.placeholder.com/500x500.png/00eeff?text=sunt', 'https://via.placeholder.com/600x1342.png/00bbaa?text=a', 'Porro soluta vero consequatur sed ut qui iure. Sint et ut totam laborum consequuntur libero qui. Vel quasi recusandae tempora iste iste earum.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(13, 'Mrs. Berenice Stehr II', 'https://via.placeholder.com/720x540.png/00ee77?text=non', NULL, 'https://via.placeholder.com/500x500.png/003388?text=et', 'https://via.placeholder.com/600x1342.png/00ee11?text=necessitatibus', 'Necessitatibus laboriosam officiis a et. Id est suscipit velit voluptates ducimus quia commodi aliquid. Corrupti dolores consequatur laudantium. Sit dolorem a at.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(14, 'Jerald Ullrich', 'https://via.placeholder.com/720x540.png/00ff00?text=dolor', NULL, 'https://via.placeholder.com/500x500.png/00ffaa?text=aut', 'https://via.placeholder.com/600x1342.png/0022cc?text=eum', 'Architecto quasi quia occaecati quia et accusantium laudantium. Asperiores nobis doloremque facere sit. Deserunt ad tempore dolores necessitatibus ratione quibusdam officia. Qui quia quam voluptas quia at distinctio.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(15, 'Giovanni Quitzon', 'https://via.placeholder.com/720x540.png/000088?text=in', NULL, 'https://via.placeholder.com/500x500.png/000077?text=labore', 'https://via.placeholder.com/600x1342.png/00ffdd?text=enim', 'Et sit consequatur magnam. Quae et similique dignissimos sunt vel sit. Aut perferendis officia architecto ducimus nesciunt. Vel voluptate enim aut fugiat nobis eveniet.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(16, 'Dr. Allie Gottlieb I', 'https://via.placeholder.com/720x540.png/0022dd?text=voluptatum', NULL, 'https://via.placeholder.com/500x500.png/00ee66?text=vel', 'https://via.placeholder.com/600x1342.png/009988?text=perferendis', 'Dolor aut ad impedit. Nihil enim voluptas unde eum. Corrupti sint ipsam nostrum sequi voluptas atque. Cumque id molestias enim eaque.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(17, 'Beatrice Gulgowski', 'https://via.placeholder.com/720x540.png/00dd77?text=minima', NULL, 'https://via.placeholder.com/500x500.png/00ff88?text=aliquam', 'https://via.placeholder.com/600x1342.png/00ff11?text=ratione', 'Ut repudiandae dolorem consequuntur inventore unde aut ratione. Occaecati nostrum aut voluptas. Aut aut consequuntur molestiae rem cupiditate alias laboriosam. Minus sunt magnam et ut vel natus.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(18, 'Janae Fahey', 'https://via.placeholder.com/720x540.png/00ffee?text=fugiat', NULL, 'https://via.placeholder.com/500x500.png/0033ee?text=sint', 'https://via.placeholder.com/600x1342.png/00ff00?text=quia', 'Voluptate earum ratione sunt et dolore quae est. Consequatur rerum voluptatem iusto aperiam corrupti. Et voluptatem id et ab aut. Libero aut facilis temporibus.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(19, 'Albina Beier Jr.', 'https://via.placeholder.com/720x540.png/009955?text=non', NULL, 'https://via.placeholder.com/500x500.png/00ccbb?text=iusto', 'https://via.placeholder.com/600x1342.png/0099bb?text=ipsum', 'Qui consequatur sapiente aut id. Et molestiae dolores consequuntur non ipsa sed facilis. At aperiam adipisci aspernatur libero laborum alias et dignissimos. Excepturi ea ut adipisci. Quaerat odit sit aperiam nulla veritatis.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL),
(20, 'Shaun Willms', 'https://via.placeholder.com/720x540.png/0000ee?text=deserunt', NULL, 'https://via.placeholder.com/500x500.png/00aaaa?text=animi', 'https://via.placeholder.com/600x1342.png/005599?text=ratione', 'Eos nihil numquam natus distinctio similique nobis consectetur. Quo quia facilis aut ducimus. Labore dolore omnis aperiam hic harum incidunt.', NULL, NULL, '2022-09-30 16:47:35', '2022-09-30 16:47:35', NULL);

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
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Huy', 'Nguyễn', 'nqhuy', '', NULL, '$2y$10$x2OI6krm9dGVNaD5wg58buOKf620ISwETS3NgUJdFymqxHlLpuxMG', NULL, 1, '2022-10-01 17:04:11', '2022-10-01 17:04:11', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `stalls`
--
ALTER TABLE `stalls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `submits`
--
ALTER TABLE `submits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
