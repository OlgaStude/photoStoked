-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 13 2023 г., 16:20
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `interpals_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `lang_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `created_at`, `updated_at`) VALUES
(1, 'азербайджанский', NULL, NULL),
(2, 'аймара', NULL, NULL),
(3, 'албанский', NULL, NULL),
(4, 'амхарский', NULL, NULL),
(5, 'английский', NULL, NULL),
(6, 'арабский', NULL, NULL),
(7, 'армянский', NULL, NULL),
(8, 'ассамский', NULL, NULL),
(9, 'африкаанс', NULL, NULL),
(10, 'бамбара', NULL, NULL),
(11, 'баскский', NULL, NULL),
(12, 'белорусский', NULL, NULL),
(13, 'бенгальский', NULL, NULL),
(14, 'бирманский', NULL, NULL),
(15, 'болгарский', NULL, NULL),
(16, 'боснийский', NULL, NULL),
(17, 'бходжпури', NULL, NULL),
(18, 'валлийский', NULL, NULL),
(19, 'венгерский', NULL, NULL),
(20, 'вьетнамский', NULL, NULL),
(21, 'гавайский', NULL, NULL),
(22, 'галисийский', NULL, NULL),
(23, 'греческий', NULL, NULL),
(24, 'грузинский', NULL, NULL),
(25, 'гуарани', NULL, NULL),
(26, 'гуджарати', NULL, NULL),
(27, 'датский', NULL, NULL),
(28, 'догри', NULL, NULL),
(29, 'зулу', NULL, NULL),
(30, 'иврит', NULL, NULL),
(31, 'игбо', NULL, NULL),
(32, 'идиш', NULL, NULL),
(33, 'илоканский', NULL, NULL),
(34, 'индонезийский', NULL, NULL),
(35, 'ирландский', NULL, NULL),
(36, 'исландский', NULL, NULL),
(37, 'испанский', NULL, NULL),
(38, 'итальянский', NULL, NULL),
(39, 'йоруба', NULL, NULL),
(40, 'казахский', NULL, NULL),
(41, 'каннада', NULL, NULL),
(42, 'каталанский', NULL, NULL),
(43, 'кечуа', NULL, NULL),
(44, 'киргизский', NULL, NULL),
(45, 'китайский (мандарин)', NULL, NULL),
(46, 'китайский (кантониз)', NULL, NULL),
(47, 'конкани', NULL, NULL),
(48, 'корейский', NULL, NULL),
(49, 'корсиканский', NULL, NULL),
(50, 'коса', NULL, NULL),
(51, 'креольский (гаити)', NULL, NULL),
(52, 'крио', NULL, NULL),
(53, 'курдский (курманджи)', NULL, NULL),
(54, 'курдский (сорани)', NULL, NULL),
(55, 'кхмерский', NULL, NULL),
(56, 'лаосский', NULL, NULL),
(57, 'латышский', NULL, NULL),
(58, 'лингала', NULL, NULL),
(59, 'литовский', NULL, NULL),
(60, 'луганда', NULL, NULL),
(61, 'люксембургский', NULL, NULL),
(62, 'майтхили', NULL, NULL),
(63, 'македонский', NULL, NULL),
(64, 'малагасийский', NULL, NULL),
(65, 'малайский', NULL, NULL),
(66, 'малаялам', NULL, NULL),
(67, 'мальдивский', NULL, NULL),
(68, 'мальтийский', NULL, NULL),
(69, 'маори', NULL, NULL),
(70, 'маратхи', NULL, NULL),
(71, 'мейтейлон (манипури)', NULL, NULL),
(72, 'мизо', NULL, NULL),
(73, 'монгольский', NULL, NULL),
(74, 'немецкий', NULL, NULL),
(75, 'непальский', NULL, NULL),
(76, 'нидерландский', NULL, NULL),
(77, 'норвежский', NULL, NULL),
(78, 'ория', NULL, NULL),
(79, 'оромо', NULL, NULL),
(80, 'панджаби', NULL, NULL),
(81, 'персидский', NULL, NULL),
(82, 'польский', NULL, NULL),
(83, 'португальский', NULL, NULL),
(84, 'пушту', NULL, NULL),
(85, 'руанда', NULL, NULL),
(86, 'румынский', NULL, NULL),
(87, 'русский', NULL, NULL),
(88, 'самоанский', NULL, NULL),
(89, 'санскрит', NULL, NULL),
(90, 'себуанский', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
