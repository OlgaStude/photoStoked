-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2023 г., 12:25
-- Версия сервера: 8.0.29
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photostoked`
--

-- --------------------------------------------------------

--
-- Структура таблицы `approved_ms`
--

CREATE TABLE `approved_ms` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimentions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `approved_ms`
--

INSERT INTO `approved_ms` (`id`, `users_id`, `path`, `original_path`, `type`, `dimentions`, `likes`, `created_at`, `updated_at`) VALUES
(1, 2, 'uimkbNi80kSogOVxVv690vDuQSy9Etjtjnin2qmR.png', 'I8jGHw3u80ewtMTX6QSA6v4M3AURJrQcZUee4wmE.jpg', 'photo', 'vertical', 1, '2023-05-30 09:02:50', '2023-06-12 11:48:57'),
(2, 3, 'V0I5gVLjq6R9ysAhfrauwheBGrRgEFHF1zKry52p.png', 'hpONeTDBing4cgvo8UyjLsp8PrwstHaXAhIejwNI.jpg', 'photo', 'vertical', 0, '2023-05-30 09:03:30', '2023-05-30 09:03:30'),
(3, 3, 'bTwvIPpvYgAB9It6z246lzHwN5nll7FuKlxa45OW.png', 'yg9wlUdqqH2bFUAaGeXl70NzObK0OrHHA4BFDpN5.jpg', 'photo', 'horisontal', 0, '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(4, 4, 'ooLfiHik4VqwnrWkPBuvYYc4x8gQu4cCqCThLZxU.png', 'OW46R6IfWMixSyrGAHwkExLQwqy01jWgHUoCn1Z3.jpg', 'photo', 'horisontal', 0, '2023-05-30 09:16:55', '2023-05-30 09:16:55'),
(5, 4, 'OeP2bRKhnL1OxVA4860tpsFTZzkpAzigGiDDAe1z.png', 'yHvZEWQ74JqxLaUrzaRiuB83rhPfS5iKKOkL0MDn.jpg', 'photo', 'horisontal', 0, '2023-05-30 09:17:23', '2023-05-30 09:17:23'),
(6, 4, 'JNwPntIRRNKPaObd0YFcfFX1oUazRekUN7u6jiuI.png', 'O9Kntxo284nKKUm2CNPCGBchYCVSN1XDp9mosLqy.jpg', 'photo', 'horisontal', 0, '2023-05-30 09:17:54', '2023-05-30 09:17:54'),
(7, 5, '0wWpejTs4wtId0Z2xPNd4pwRENn5vRdqmZ4NxMd9.png', '3wcjGnsSvubCVe4xh430Wtz8ITgB0NHGDblXoaK2.jpg', 'photo', 'horisontal', 0, '2023-05-30 09:18:40', '2023-05-30 09:18:40'),
(8, 5, 'SVGLzIafzwzkHQtazMGFmNc8Vqd1n7dwAFxyl8NN.png', 'zgH3A9AxzOjXwHOYkuCzOA4EwxWAiX4OKe6yY83C.jpg', 'photo', 'vertical', 0, '2023-05-30 09:19:24', '2023-05-30 09:19:24'),
(9, 5, 'G67C4S9YSTWDN1BnZhZ92HQv1B1pQUaiHL7QxQ5a.png', 'MBykis0ATwoorrmHBDeBrlPHqRx1MgImbOP4x85w.jpg', 'photo', 'vertical', 1, '2023-05-30 09:19:58', '2023-06-12 11:49:01'),
(10, 5, 'hUIZhzoOiiiB7B7C2HZPnmgeGxUJwKpTeJT3pMvd.png', 'XoVQlpDIqLJMFFGK8PdR8xGrXmSW4CFvj1olE5ce.jpg', 'photo', 'vertical', 0, '2023-05-30 09:20:28', '2023-05-30 09:20:28'),
(11, 6, 'RIkPgKdzQhtkuDKG2bgiJ2KqDqYEZ54oBZsVMLJC.png', 'REFniJoowh5dH8vqiBSS4fHzRAvbJETi643drCm6.jpg', 'photo', 'horisontal', 1, '2023-05-30 09:20:58', '2023-05-30 09:43:46'),
(12, 6, 'GuSEf2kJDxBAUFNk2ZpqYpHoSRMxpTCuO0bGxmbh.png', 'avxVploCFHVZYOTRLpIQPGsiMyF7KxQeYKYTzn30.jpg', 'photo', 'vertical', 0, '2023-05-30 09:21:19', '2023-06-12 11:48:42'),
(13, 6, 'VFrVNdkt07rCYiOzoQtBa5pRcTWf7pokWpWfCHpX.png', 'nI7vKhSHQtqLCz6Ywe1yKt3fbL8SlkGBXAjkRQNX.jpg', 'photo', 'horisontal', 1, '2023-05-30 09:22:02', '2023-06-13 03:33:34'),
(14, 6, 'hKq31twk87TuqEwkksJbBSsjPGexmoSvihhqWouv.png', 'ECs8deSUKu3VjgFIihArip8eHLY0wEQAG3bYUFyA.jpg', 'photo', 'horisontal', 1, '2023-05-30 09:22:55', '2023-06-12 11:53:00'),
(15, 6, 'FwPgEYMs0QOSnT4TTbH7kZaoKurazpxr9VpxS9mc.png', 'iYRjgoVuxOvnp7CArHejJ6e3PkaxUWQTz7C8FIp7.jpg', 'photo', 'horisontal', 1, '2023-05-30 09:23:25', '2023-05-30 09:43:49');

-- --------------------------------------------------------

--
-- Структура таблицы `bought_materials`
--

CREATE TABLE `bought_materials` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `approved_ms_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bought_materials`
--

INSERT INTO `bought_materials` (`id`, `users_id`, `approved_ms_id`, `created_at`, `updated_at`) VALUES
(1, 1, 14, '2023-06-04 06:36:16', '2023-06-04 06:36:16'),
(2, 7, 13, '2023-06-13 03:34:19', '2023-06-13 03:34:19'),
(3, 1, 9, '2023-06-19 08:07:29', '2023-06-19 08:07:29');

-- --------------------------------------------------------

--
-- Структура таблицы `collections`
--

CREATE TABLE `collections` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `collections`
--

INSERT INTO `collections` (`id`, `users_id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 7, 'колекция', 'VFrVNdkt07rCYiOzoQtBa5pRcTWf7pokWpWfCHpX.png', '2023-06-13 03:37:18', '2023-06-13 03:37:24'),
(2, 1, 'Первая коллекция', 'hKq31twk87TuqEwkksJbBSsjPGexmoSvihhqWouv.png', '2023-06-19 10:06:14', '2023-06-19 10:20:53');

-- --------------------------------------------------------

--
-- Структура таблицы `collection_items`
--

CREATE TABLE `collection_items` (
  `id` bigint UNSIGNED NOT NULL,
  `collections_id` bigint UNSIGNED NOT NULL,
  `approved_ms_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `collection_items`
--

INSERT INTO `collection_items` (`id`, `collections_id`, `approved_ms_id`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '2023-06-13 03:37:24', '2023-06-13 03:37:24'),
(2, 2, 14, '2023-06-19 10:20:53', '2023-06-19 10:20:53');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `approved_ms_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `users_id`, `approved_ms_id`, `created_at`, `updated_at`) VALUES
(3, 1, 11, '2023-05-30 09:43:46', '2023-05-30 09:43:46'),
(4, 1, 15, '2023-05-30 09:43:49', '2023-05-30 09:43:49'),
(5, 1, 1, '2023-06-12 11:48:57', '2023-06-12 11:48:57'),
(6, 1, 9, '2023-06-12 11:49:01', '2023-06-12 11:49:01'),
(7, 1, 14, '2023-06-12 11:53:00', '2023-06-12 11:53:00'),
(8, 7, 13, '2023-06-13 03:33:34', '2023-06-13 03:33:34');

-- --------------------------------------------------------

--
-- Структура таблицы `material_tags`
--

CREATE TABLE `material_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `approved_ms_id` bigint UNSIGNED NOT NULL,
  `tags_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `material_tags`
--

INSERT INTO `material_tags` (`id`, `approved_ms_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-30 09:02:50', '2023-05-30 09:02:50'),
(2, 1, 2, '2023-05-30 09:02:50', '2023-05-30 09:02:50'),
(3, 2, 3, '2023-05-30 09:03:30', '2023-05-30 09:03:30'),
(4, 2, 4, '2023-05-30 09:03:30', '2023-05-30 09:03:30'),
(5, 2, 5, '2023-05-30 09:03:30', '2023-05-30 09:03:30'),
(6, 3, 6, '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(7, 3, 7, '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(8, 3, 8, '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(9, 3, 9, '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(10, 4, 10, '2023-05-30 09:16:55', '2023-05-30 09:16:55'),
(11, 4, 11, '2023-05-30 09:16:55', '2023-05-30 09:16:55'),
(12, 4, 12, '2023-05-30 09:16:55', '2023-05-30 09:16:55'),
(13, 5, 13, '2023-05-30 09:17:23', '2023-05-30 09:17:23'),
(14, 5, 14, '2023-05-30 09:17:23', '2023-05-30 09:17:23'),
(15, 5, 15, '2023-05-30 09:17:23', '2023-05-30 09:17:23'),
(16, 6, 16, '2023-05-30 09:17:54', '2023-05-30 09:17:54'),
(17, 6, 2, '2023-05-30 09:17:54', '2023-05-30 09:17:54'),
(18, 7, 17, '2023-05-30 09:18:40', '2023-05-30 09:18:40'),
(19, 7, 18, '2023-05-30 09:18:40', '2023-05-30 09:18:40'),
(20, 7, 19, '2023-05-30 09:18:40', '2023-05-30 09:18:40'),
(21, 8, 20, '2023-05-30 09:19:24', '2023-05-30 09:19:24'),
(22, 8, 21, '2023-05-30 09:19:24', '2023-05-30 09:19:24'),
(23, 8, 13, '2023-05-30 09:19:24', '2023-05-30 09:19:24'),
(24, 8, 14, '2023-05-30 09:19:24', '2023-05-30 09:19:24'),
(25, 9, 22, '2023-05-30 09:19:58', '2023-05-30 09:19:58'),
(26, 9, 21, '2023-05-30 09:19:58', '2023-05-30 09:19:58'),
(27, 9, 23, '2023-05-30 09:19:58', '2023-05-30 09:19:58'),
(28, 10, 24, '2023-05-30 09:20:28', '2023-05-30 09:20:28'),
(29, 10, 15, '2023-05-30 09:20:28', '2023-05-30 09:20:28'),
(30, 10, 19, '2023-05-30 09:20:28', '2023-05-30 09:20:28'),
(31, 11, 25, '2023-05-30 09:20:58', '2023-05-30 09:20:58'),
(32, 11, 26, '2023-05-30 09:20:58', '2023-05-30 09:20:58'),
(33, 11, 7, '2023-05-30 09:20:58', '2023-05-30 09:20:58'),
(34, 12, 27, '2023-05-30 09:21:19', '2023-05-30 09:21:19'),
(35, 12, 28, '2023-05-30 09:21:19', '2023-05-30 09:21:19'),
(36, 12, 29, '2023-05-30 09:21:19', '2023-05-30 09:21:19'),
(37, 13, 30, '2023-05-30 09:22:02', '2023-05-30 09:22:02'),
(38, 13, 29, '2023-05-30 09:22:02', '2023-05-30 09:22:02'),
(39, 13, 31, '2023-05-30 09:22:02', '2023-05-30 09:22:02'),
(40, 14, 32, '2023-05-30 09:22:55', '2023-05-30 09:22:55'),
(41, 14, 33, '2023-05-30 09:22:55', '2023-05-30 09:22:55'),
(42, 14, 34, '2023-05-30 09:22:55', '2023-05-30 09:22:55'),
(43, 15, 24, '2023-05-30 09:23:25', '2023-05-30 09:23:25'),
(44, 15, 35, '2023-05-30 09:23:25', '2023-05-30 09:23:25');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `approved_ms_id` int DEFAULT NULL,
  `user_send_id` int NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `users_id`, `approved_ms_id`, `user_send_id`, `text`, `created_at`, `updated_at`) VALUES
(3, 1, 11, 6, 'понравилась ваша работа', '2023-05-30 09:43:46', '2023-05-30 09:43:46'),
(4, 1, 15, 6, 'понравилась ваша работа', '2023-05-30 09:43:49', '2023-05-30 09:43:49'),
(5, 1, 0, 6, 'скачал вашу работу', '2023-06-04 06:36:16', '2023-06-04 06:36:16'),
(6, 1, 1, 2, 'понравилась ваша работа', '2023-06-12 11:48:57', '2023-06-12 11:48:57'),
(7, 1, 9, 5, 'понравилась ваша работа', '2023-06-12 11:49:01', '2023-06-12 11:49:01'),
(9, 1, 14, 6, 'понравилась ваша работа', '2023-06-12 11:53:00', '2023-06-12 11:53:00'),
(10, 7, 0, 6, 'скачал вашу работу', '2023-06-13 03:34:19', '2023-06-13 03:34:19'),
(11, 7, 0, 6, 'добавил вас в избранное', '2023-06-13 03:36:44', '2023-06-13 03:36:44'),
(14, 1, 0, 5, 'скачал вашу работу', '2023-06-19 08:07:29', '2023-06-19 08:07:29');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_20_063622_create_approved_ms_table', 1),
(6, '2023_02_20_063701_create_tags_table', 1),
(7, '2023_02_20_063731_create_sent_materials_table', 1),
(8, '2023_02_20_063759_create_messages_table', 1),
(9, '2023_02_20_063835_create_collections_table', 1),
(10, '2023_02_20_063852_create_collection_items_table', 1),
(11, '2023_02_20_063918_create_pakeges_table', 1),
(12, '2023_02_20_063954_create_subscriptions_table', 1),
(13, '2023_02_20_070828_likes', 1),
(14, '2023_02_20_070918_material_tags', 1),
(15, '2023_04_18_060347_create_bought_materials_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pakeges`
--

CREATE TABLE `pakeges` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `purchases_left` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pakeges`
--

INSERT INTO `pakeges` (`id`, `users_id`, `purchases_left`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2023-06-04 06:31:04', '2023-06-19 08:07:29'),
(2, 7, 9, '2023-06-13 03:34:01', '2023-06-13 03:34:19');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sent_materials`
--

CREATE TABLE `sent_materials` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sent_materials`
--

INSERT INTO `sent_materials` (`id`, `users_id`, `path`, `tags`, `created_at`, `updated_at`) VALUES
(16, 7, 'YzyyrKFnkN0qt9QaWYlwGubGkrdNpP0REoTLBRBD.jpg', 'апельсин', '2023-06-13 03:34:47', '2023-06-13 03:34:47');

-- --------------------------------------------------------

--
-- Структура таблицы `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `followed_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `users_id`, `followed_id`, `created_at`, `updated_at`) VALUES
(2, 7, 6, '2023-06-13 03:36:44', '2023-06-13 03:36:44');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 'земля', '2023-05-30 09:02:50', '2023-05-30 09:02:50'),
(2, 'текстура', '2023-05-30 09:02:50', '2023-05-30 09:02:50'),
(3, 'груша', '2023-05-30 09:03:30', '2023-05-30 09:03:30'),
(4, 'фрукты', '2023-05-30 09:03:30', '2023-05-30 09:03:30'),
(5, 'жёлтый', '2023-05-30 09:03:30', '2023-05-30 09:03:30'),
(6, 'красное', '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(7, 'синие', '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(8, 'диван', '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(9, 'мебель', '2023-05-30 09:16:22', '2023-05-30 09:16:22'),
(10, 'Хавортия', '2023-05-30 09:16:55', '2023-05-30 09:16:55'),
(11, 'растение', '2023-05-30 09:16:55', '2023-05-30 09:16:55'),
(12, 'солнце', '2023-05-30 09:16:55', '2023-05-30 09:16:55'),
(13, 'стол', '2023-05-30 09:17:23', '2023-05-30 09:17:23'),
(14, 'натюрморт', '2023-05-30 09:17:23', '2023-05-30 09:17:23'),
(15, 'пицца', '2023-05-30 09:17:23', '2023-05-30 09:17:23'),
(16, 'дерево', '2023-05-30 09:17:54', '2023-05-30 09:17:54'),
(17, 'обувь', '2023-05-30 09:18:40', '2023-05-30 09:18:40'),
(18, 'кроссовки', '2023-05-30 09:18:40', '2023-05-30 09:18:40'),
(19, 'вид_сверху', '2023-05-30 09:18:40', '2023-05-30 09:18:40'),
(20, 'нитки', '2023-05-30 09:19:24', '2023-05-30 09:19:24'),
(21, 'разноцветное', '2023-05-30 09:19:24', '2023-05-30 09:19:24'),
(22, 'скрепки', '2023-05-30 09:19:58', '2023-05-30 09:19:58'),
(23, 'на_бумаге', '2023-05-30 09:19:58', '2023-05-30 09:19:58'),
(24, 'еда', '2023-05-30 09:20:28', '2023-05-30 09:20:28'),
(25, 'папки', '2023-05-30 09:20:58', '2023-05-30 09:20:58'),
(26, 'жёлтое', '2023-05-30 09:20:58', '2023-05-30 09:20:58'),
(27, 'серый', '2023-05-30 09:21:19', '2023-05-30 09:21:19'),
(28, 'коричневый', '2023-05-30 09:21:19', '2023-05-30 09:21:19'),
(29, 'старое', '2023-05-30 09:21:19', '2023-05-30 09:21:19'),
(30, 'пианино', '2023-05-30 09:22:02', '2023-05-30 09:22:02'),
(31, 'заброшенное', '2023-05-30 09:22:02', '2023-05-30 09:22:02'),
(32, 'цветы', '2023-05-30 09:22:55', '2023-05-30 09:22:55'),
(33, 'белый', '2023-05-30 09:22:55', '2023-05-30 09:22:55'),
(34, 'растения', '2023-05-30 09:22:55', '2023-05-30 09:22:55'),
(35, 'бутерброд', '2023-05-30 09:23:25', '2023-05-30 09:23:25');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nikname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `followers` int NOT NULL,
  `money` int NOT NULL,
  `add_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_package` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `nikname`, `birthdate`, `password`, `path`, `followers`, `money`, `add_info`, `has_package`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@mail.com', 'Админ', '2002-01-18', '$2y$10$ibaXU74pBl/YuExEmCecH.FmpJnDsR/Jby2XyEbTBhzIlwd4X0jC.', 'VAJWGugpx5w1t1BteA9hsLC4TS42p14w31yYKiAI.jpg', 0, 0, 'Страница администрации', NULL, 1, NULL, NULL, '2023-05-30 08:36:46', '2023-06-04 06:43:30'),
(2, 'Maria@mail.com', 'Марина', '1999-09-09', '$2y$10$qj9k.2DhjnT9J4nZ9A.dOukEfJxL2s63sgm34TjJk6uqZzq2t49Ru', 'sV7FhsGko804BmPVym75nF8ksuRj8w3PIXZbIXJj.jpg', 0, 0, NULL, NULL, NULL, NULL, NULL, '2023-05-30 08:38:25', '2023-05-30 08:38:25'),
(3, 'pjto@mail.com', 'ФотоГраф', '2001-02-02', '$2y$10$ODUCnugMrBQKirZh/rC1JOwE4EKAnjnq0fg9HIqgOzwHkbjIOpmqe', 'pGFjBLB4YHcTCKzPyZ8wEBO2mW0zKxA90cEln7HS.jpg', 0, 0, NULL, NULL, NULL, NULL, NULL, '2023-05-30 08:40:36', '2023-05-30 08:40:36'),
(4, 'Lion@mail.com', 'лев', '2003-03-02', '$2y$10$ipcTdAXrAGWeVU63nIHgSu0uDza801Z9IBCmr.RoibYMmeOazuvKK', 'YA3gdIdhtMzGI841Vjt6DMy4sb1GgKFYFAN6A2MD.jpg', 0, 0, NULL, NULL, NULL, NULL, NULL, '2023-05-30 08:49:05', '2023-05-30 08:49:05'),
(5, 'Rose@mail.com', 'Цветок Роза', '2000-07-07', '$2y$10$dEycMK8CjYbm8B6CIMWVIOD1VEndd1htgUO7IyPEy5R88nNSWbISu', 'XrEOv0QMOvihM1Ny9bYdHQ9GY02wnjbjSwSvPKMb.jpg', 0, 100, NULL, NULL, NULL, NULL, NULL, '2023-05-30 08:51:28', '2023-06-19 08:07:29'),
(6, 'Karin@mail.com', 'Карина Арманова', '1995-05-06', '$2y$10$LI2TdAPED/zB7/L.KeLB/eawH52TPmruCzFUxSIlK6VNFmYEUplae', 'opyUk8gFOfGWLpb4c8H0rGTbv3fO3uZi1YuiCuEx.jpg', 1, 200, NULL, NULL, NULL, NULL, NULL, '2023-05-30 08:58:14', '2023-06-13 03:36:44'),
(7, 'ad@mail.com', 'новое имя', '2002-04-12', '$2y$10$32WQBfJER4b/TPItN98FtOD/hPvGepe26urrS16Cwjv/m9JYAtDBq', '0DTjzuWASuUnbtJfSf3M0M03PHj7V4cFjpvv30wP.jpg', 0, 0, NULL, NULL, NULL, NULL, NULL, '2023-06-13 03:32:54', '2023-06-13 03:32:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `approved_ms`
--
ALTER TABLE `approved_ms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approved_ms_users_id_foreign` (`users_id`);

--
-- Индексы таблицы `bought_materials`
--
ALTER TABLE `bought_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bought_materials_users_id_foreign` (`users_id`),
  ADD KEY `bought_materials_approved_ms_id_foreign` (`approved_ms_id`);

--
-- Индексы таблицы `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_users_id_foreign` (`users_id`);

--
-- Индексы таблицы `collection_items`
--
ALTER TABLE `collection_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_items_collections_id_foreign` (`collections_id`),
  ADD KEY `collection_items_approved_ms_id_foreign` (`approved_ms_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_users_id_foreign` (`users_id`),
  ADD KEY `likes_approved_ms_id_foreign` (`approved_ms_id`);

--
-- Индексы таблицы `material_tags`
--
ALTER TABLE `material_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_tags_approved_ms_id_foreign` (`approved_ms_id`),
  ADD KEY `material_tags_tags_id_foreign` (`tags_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_users_id_foreign` (`users_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pakeges`
--
ALTER TABLE `pakeges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pakeges_users_id_foreign` (`users_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `sent_materials`
--
ALTER TABLE `sent_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sent_materials_users_id_foreign` (`users_id`);

--
-- Индексы таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_users_id_foreign` (`users_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nikname_unique` (`nikname`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `approved_ms`
--
ALTER TABLE `approved_ms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `bought_materials`
--
ALTER TABLE `bought_materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `collection_items`
--
ALTER TABLE `collection_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `material_tags`
--
ALTER TABLE `material_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `pakeges`
--
ALTER TABLE `pakeges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `sent_materials`
--
ALTER TABLE `sent_materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `approved_ms`
--
ALTER TABLE `approved_ms`
  ADD CONSTRAINT `approved_ms_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `bought_materials`
--
ALTER TABLE `bought_materials`
  ADD CONSTRAINT `bought_materials_approved_ms_id_foreign` FOREIGN KEY (`approved_ms_id`) REFERENCES `approved_ms` (`id`),
  ADD CONSTRAINT `bought_materials_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `collection_items`
--
ALTER TABLE `collection_items`
  ADD CONSTRAINT `collection_items_approved_ms_id_foreign` FOREIGN KEY (`approved_ms_id`) REFERENCES `approved_ms` (`id`),
  ADD CONSTRAINT `collection_items_collections_id_foreign` FOREIGN KEY (`collections_id`) REFERENCES `collections` (`id`);

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_approved_ms_id_foreign` FOREIGN KEY (`approved_ms_id`) REFERENCES `approved_ms` (`id`),
  ADD CONSTRAINT `likes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `material_tags`
--
ALTER TABLE `material_tags`
  ADD CONSTRAINT `material_tags_approved_ms_id_foreign` FOREIGN KEY (`approved_ms_id`) REFERENCES `approved_ms` (`id`),
  ADD CONSTRAINT `material_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `pakeges`
--
ALTER TABLE `pakeges`
  ADD CONSTRAINT `pakeges_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `sent_materials`
--
ALTER TABLE `sent_materials`
  ADD CONSTRAINT `sent_materials_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
