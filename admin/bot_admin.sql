-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2022 г., 09:51
-- Версия сервера: 5.7.26
-- Версия PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bot_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bots`
--

DROP TABLE IF EXISTS `bots`;
CREATE TABLE IF NOT EXISTS `bots` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `greeting` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bots`
--

INSERT INTO `bots` (`id`, `name`, `token`, `image`, `greeting`, `created_at`, `updated_at`, `deleted_at`, `active`) VALUES
(59, 'avrwaimvxp', 'rg3xJ6PfBENeIku7PSEg', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 1),
(60, 'fwqtygefio', 'iXE6nkeuP1OjwEfEH1BF', NULL, 'eerrrtttrrr', '2022-05-06 08:00:13', '2022-05-10 04:19:46', NULL, 1),
(58, 'binpuvfozp', 'C67LHiS5OGUgcYPLdY49', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(57, 'qetaahsghv', '2wrMaFvc5SQyHS9k32xC', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(55, 'arbdidxhxq', 'pwBk9TeaAdonoruHwvrt', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(56, 'ucdnuqkzia', 'jI4Tdm2IsGGvuzgG5hYc', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(53, 'eznkzyvpgn', 'iblneDsWwdwAGSqD9ZNZ', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(54, 'stgyqgabby', 'TgMBNhB2ZCYRxjGOE37F', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(52, 'igwnrksdcx', 'vjOuFcKdiX0kIWremsET', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(51, 'ueztrrbxtj', 'JXYZlBxFTsjcdoSrdbzp', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(49, 'bejulyirsf', 'gEMgavxNUv7SrkOYtF9X', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(50, 'telcnxfkuk', '8ewI7tDYeAE5Awdc3Uok', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(48, 'rfmegxmzpb', 'KByub8pMxJ4GtcpIgI5Y', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(47, 'nqdiithqth', 'xtwir4Vyqmz2quSLxEc6', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(46, 'sakuspbanw', 'TgaQQcV4lRSUFExPO0XA', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(45, 'mabjvtfsrd', 'UUsjB8XH9pZfH93Vg30y', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(42, 'shhvtdynow', 'whweof75JHidFaFfqECC', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(41, 'spjocorimp', 'JiWpIiqrhVU2LZnIV6ze', NULL, NULL, '2022-05-06 08:00:13', '2022-05-06 08:00:13', NULL, 0),
(61, 'ee', 'errr', 'C:\\wamp64\\tmp\\phpF380.tmp', 'rrr', '2022-05-10 05:36:07', '2022-05-10 05:36:07', NULL, 1),
(62, 'ee', 'rr', 'C:\\wamp64\\tmp\\php6377.tmp', 'tt', '2022-05-10 05:49:42', '2022-05-10 05:49:42', NULL, 0),
(63, '33', '44', 'C:\\wamp64\\tmp\\phpC76D.tmp', '55', '2022-05-10 05:51:13', '2022-05-10 05:51:13', NULL, 0),
(64, 'ee', 'rr', 'C:\\wamp64\\tmp\\phpD1F8.tmp', 'tt', '2022-05-10 05:52:21', '2022-05-10 06:45:52', '2022-05-10 06:45:52', 0),
(65, '33', '44', 'google.png', '55', '2022-05-10 06:00:48', '2022-05-10 06:45:49', '2022-05-10 06:45:49', 0),
(66, '3333', '444', '1652174599.login_bg.jpg', '444', '2022-05-10 06:23:19', '2022-05-10 06:45:46', '2022-05-10 06:45:46', 0),
(67, '333', '33', '1652175487.login_bg.jpg', '444', '2022-05-10 06:38:07', '2022-05-10 06:45:42', '2022-05-10 06:45:42', 0),
(68, '1111', '111', '1652176116.user_ava.png', '111', '2022-05-10 06:46:04', '2022-05-10 08:53:03', '2022-05-10 08:53:03', 1),
(69, 'test', 'eeweweqwe', NULL, 'referferf', '2022-05-10 09:25:14', '2022-05-10 09:25:44', '2022-05-10 09:25:44', 1),
(70, 'testst', 'eee', NULL, 'rfreferferf', '2022-05-10 09:26:57', '2022-05-10 09:26:57', NULL, 1),
(71, '2222222222', '3333333333333', '1652288983.load_ava.png', 'ee', '2022-05-11 14:09:44', '2022-05-11 14:27:38', NULL, 0),
(72, '55555555', '5555', '1652291171.google.png', '555', '2022-05-11 14:46:11', '2022-05-11 14:46:11', NULL, 1),
(73, '66666666', '6666', '1652291361.app.png', '6666', '2022-05-11 14:49:07', '2022-05-11 14:49:21', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'У меня проблема', '2022-05-06 19:06:37', '2022-05-06 19:06:37'),
(2, 'Предложить улучшение2', '2022-05-06 19:06:37', '2022-05-09 13:58:50'),
(3, 'Научите меня пользоватьсяee', '2022-05-06 19:06:37', '2022-05-11 14:27:49');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `telegram_account` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bot_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `telegram_account_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `telegram_account`, `bot_id`, `created_at`, `updated_at`, `deleted_at`, `telegram_account_id`, `lang`) VALUES
(164, '1dmk_zz_9p', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'm9dio1d05a', 'ru'),
(163, 'jd8qrpl0oo', '71', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'i279r92ik0', 'en'),
(162, 'gm2nw4h8jl', '42', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'rtr6hf7d55', 'ru'),
(161, 'cq7gg_kh4n', '63', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'nsu313exku', 'en'),
(160, 'fk9diqdl90', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '6v4c93gnvd', 'ru'),
(159, 'h6obj28_x0', '45', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'ybcd_0fsi7', 'ru'),
(158, 'pjzrrsi9rd', '59', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '6ogef3j13w', 'en'),
(157, 's9xn1uju76', '51', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '9a641924a3', 'en'),
(156, 'qwy5djsnri', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '0djvjfdifs', 'en'),
(155, 'b7lcfruk0q', '42', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'cg80syaa5m', 'ru'),
(154, '6g5fmlxvrm', '47', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '18eny6n6n6', 'ru'),
(153, '6klioxegav', '53', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'r0pfg3ea5i', 'ru'),
(152, 'yp2hxja09j', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '3lf2ww99v1', 'en'),
(151, '86i12jzyd2', '41', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '7o7fnvymfz', 'ru'),
(150, 'm6_owvkjsb', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'crna20nvt2', 'ru'),
(149, '97uwvc0wvd', '54', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'z7c4d1lb4m', 'ru'),
(148, '1l3ysk_vx0', '48', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'k40z3c3ebs', 'en'),
(147, 'cfur9gx7lh', '72', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'twnyicmev0', 'ru'),
(146, 'qtnk6o0y1q', '60', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '9_wl0oshfv', 'ru'),
(145, 'k1cjvarox9', '59', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'xloh07o3uh', 'ru'),
(144, '0h9b6ajlfz', '62', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '29wiu5hcri', 'en'),
(143, 'mmqpym23cj', '57', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '4l9lirl3_a', 'en'),
(142, 'df7bxw6d6a', '54', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '_24n8vsthk', 'ru'),
(141, 'avfkfy4u4u', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'ppjpr443x8', 'en'),
(140, 'zq3vhk0csy', '49', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '8_pmn_9u3q', 'en'),
(139, '1g71utpg1z', '71', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'p4f2n0b5pr', 'en'),
(138, 'c4ts4f34g0', '52', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'nn9yee91f3', 'en'),
(137, 'jwk7ur5tww', '51', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '7pclm35mnt', 'ru'),
(136, 'igpwt4xh8t', '47', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'egpvfi01z2', 'ru'),
(135, 'oxatbfzdhd', '51', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'we8k_u181s', 'en'),
(134, 'j6wo1bz_4q', '45', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'jxi8zq2s7o', 'en'),
(133, 'gtmp_yh28u', '48', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'gdg_bkrzyf', 'en'),
(132, 'iktmjxxa20', '53', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '6t9c204xke', 'ru'),
(131, 'q_4h5w3r2b', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'bdelv62ljk', 'en'),
(130, '8w1x02k831', '61', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'a3bheoawx5', 'ru'),
(129, 'nhcyxpwumg', '70', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'p1z3j4gl15', 'ru'),
(128, '_otq3eupys', '72', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 't7mel2amdr', 'en'),
(127, 'fl5qhdbu1f', '71', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'ihapge0m4u', 'ru'),
(126, '4ntzi2z83t', '56', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'r95bznv7ck', 'ru'),
(125, 'mwzxq9dqam', '48', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'be129ndoei', 'en'),
(124, 'w_6lz11ymk', '73', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'tajgqazh51', 'ru'),
(123, '4rll5i_oze', '51', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, '3wkiae8m9p', 'ru'),
(122, 'x1yo0h_ziw', '57', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'fkbkdnlnsc', 'en'),
(121, 'eugssxemc3', '51', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'tj5ca8jlux', 'ru'),
(120, '3i7fn_yf7n', '63', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, '4jxk33i8qe', 'en'),
(119, '13i2xvs7ye', '63', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'x7iajz7ps5', 'en'),
(118, '2i326ct7sr', '55', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'qn0ricq6k2', 'en'),
(117, '8c7foi7wng', '58', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, '950tcl84oo', 'en'),
(116, 'owu1ntcks1', '63', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'u17s7jfrg7', 'ru'),
(115, '69iz214d5l', '52', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'x8g5re067k', 'ru'),
(114, 'cikwqd3b6f', '52', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, '3jfcqo_glz', 'ru'),
(113, 'uwq8spsy45', '53', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 't_5qoz1llu', 'ru'),
(112, '6fz4rhrbh3', '51', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'ep2ymswf52', 'en'),
(111, 'ql5r4u1g7q', '49', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 't98plb3c8j', 'ru'),
(110, 'nzudcuclgh', '73', '2022-06-02 05:19:34', '2022-06-02 05:19:34', NULL, 'o9vy5at201', 'en'),
(165, '6ufwpedld_', '62', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'kchtxiou0j', 'en'),
(166, 'pdtv8i2cdx', '59', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '2sq_7c9j8p', 'ru'),
(167, '9v0vvj9x_1', '59', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'rz_sudhvk5', 'en'),
(168, '4o0xgkqqbv', '45', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'qwmaq7v4c4', 'ru'),
(169, 'kmzm6331g8', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'jfqj55ffgc', 'en'),
(170, '6v_1vb_za4', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'o_vf6uz6n6', 'en'),
(171, 'svhqo_x9z1', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'yvomqcbzs_', 'en'),
(172, 'mjxj15fqau', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'zb7unhfu5d', 'ru'),
(173, 'jiavy6euqc', '59', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '2c80x3j7wm', 'en'),
(174, 'gd96andnlh', '59', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '2blysf8mwh', 'en'),
(175, 'sthvzz1wnv', '57', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '8ofoi51guo', 'ru'),
(176, 'tvmaxd2_3h', '51', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'rwo8vfrx6n', 'en'),
(177, '2kz3rsd4pl', '49', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '498sxe93dj', 'en'),
(178, 'grux18tz08', '73', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'jss215ugfr', 'en'),
(179, 'w6gp356up3', '63', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '9m0xyw94y9', 'ru'),
(180, 'b9_wk_pz3o', '63', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '4_om4v_pkg', 'ru'),
(181, 'agwtpvu68e', '61', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '56n_aa_rza', 'en'),
(182, 'lprkl1t6os', '63', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'mgdbu2_x24', 'en'),
(183, '00svkm574n', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'rxgnkecw5o', 'ru'),
(184, '4kz1kmurug', '49', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'gel42yh52i', 'en'),
(185, 'h4jvrst6sr', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'r22up4bfs0', 'ru'),
(186, '6hxvi_p5nl', '51', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'wbtl0p1vh8', 'ru'),
(187, 'k7bpvtq6ot', '47', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'ztoq9wf34e', 'ru'),
(188, 'o34vmwgeiz', '52', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'jmfjt_lxaf', 'en'),
(189, 'a2qbu3bnvv', '62', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '5pez506dwc', 'en'),
(190, 'saftve4h43', '48', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'k3itr8fgwd', 'ru'),
(191, '3qudmkuqb1', '60', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'pqzi61dndj', 'en'),
(192, 'pxi2kpy5gp', '60', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'nsmrhpsimt', 'en'),
(193, 's51cht165v', '52', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'yzhpzozfl6', 'en'),
(194, 'n_q5auhzov', '41', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'dnuxzlyrba', 'en'),
(195, '88r0k59oul', '49', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'g2a4kp31mv', 'ru'),
(196, 'nhrg3rr0q9', '54', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'urftwvw57e', 'ru'),
(197, 'j9bx90szwb', '50', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'ffgfya6fpr', 'en'),
(198, 'xbbxlgnr0d', '71', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'dqhducr1yw', 'en'),
(199, '1b0b7cfx4z', '61', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '_rxdvyvwnm', 'ru'),
(200, 'lioaswco1a', '73', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'wyfyneb32o', 'ru'),
(201, '15p4oagr4q', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'azrs3twrih', 'ru'),
(202, 'qgxfdqp_g2', '55', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'nr5q7mkyi7', 'ru'),
(203, 'xkpja8yooo', '42', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'mrnyuydi4z', 'en'),
(204, 'r_8axw73zl', '49', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'hqw3nf24ai', 'ru'),
(205, '49yg8tv41s', '46', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'm82s25g6by', 'ru'),
(206, '4qc730stnn', '48', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'e5hc36cw09', 'en'),
(207, '6m3fbx71te', '63', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'bzrba8dqe5', 'en'),
(208, 'zm8cab7iw2', '42', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, '_e4hrcb58u', 'en'),
(209, 'wrrfwnxfhp', '56', '2022-06-02 05:19:35', '2022-06-02 05:19:35', NULL, 'agzz2_fbex', 'ru');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`id`, `bot_id`, `client_id`, `text`, `note`, `log_type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 60, 16, 'Ducimus consequatur sunt cupiditate et omnis. Minus aut dolores minus voluptatem mollitia omnis. Quos vero omnis aut qui.', 'Voluptas repudiandae maxime est autem. Aut in aut fugit at. Ipsam sed tenetur et dolor ratione.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(2, 58, 13, 'Animi cupiditate rerum eius id hic sint. Ipsum ad laboriosam quia nostrum et fugiat quas. Dolores porro saepe voluptatem error numquam.', 'Amet porro et sapiente sed quo laborum. Autem odio in voluptatum quae nobis.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(3, 54, 78, 'Et atque neque inventore consequatur veniam. Et est laboriosam rerum qui et maiores voluptatibus. Sunt consequatur illo quo voluptas vel id.', 'Natus maxime rerum adipisci. Neque vero suscipit similique. Quo nihil dolorem in beatae ad.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(4, 60, 68, 'Velit et nulla deserunt nesciunt. Qui voluptatem odio quia dicta ab illum. Consequatur fugit necessitatibus magnam et.', 'Distinctio quis similique sit et. Quod et officiis non ipsa. Dolorem quidem qui similique.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(5, 57, 43, 'Doloribus nisi asperiores sequi inventore laudantium. Fuga numquam possimus sed omnis. Exercitationem hic illo eos facilis sit.', 'Ipsum neque enim odit unde. Iure illo aut asperiores. Laborum atque voluptatem ullam et in.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(6, 41, 64, 'Deserunt qui in dolores est. Consectetur vero quaerat aut iusto ut. Id praesentium nam id necessitatibus aspernatur.', 'Et rem aperiam rerum quas. Rerum odit dolores fugiat harum similique.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(7, 57, 90, 'Illum reprehenderit eligendi quo. Sit ducimus quia quae. Dolorem quis iure eum.', 'Nihil error aut omnis odit non et. A eligendi ut excepturi rerum atque expedita enim recusandae.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(8, 44, 30, 'Impedit praesentium et saepe ut. Deserunt aliquam vel expedita quam. Laudantium minima iste delectus nobis dolor.', 'Dolor sit voluptatem quas commodi. Magni voluptas at dolorem.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(9, 53, 17, 'Laboriosam porro tempore eaque odit veniam molestias ut tempore. Aliquid et ut sed quos aperiam. Ex et ex velit vel praesentium velit quae.', 'Doloremque eos quod et illo fuga. Consequatur et aliquam ut nemo voluptatem soluta.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(10, 55, 6, 'Deserunt vel voluptate ad qui. Rerum vel fuga ad inventore. Sequi totam ut et.', 'Occaecati minima excepturi error error enim ut magni quasi. Ipsum dolorum iusto qui.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(11, 41, 35, 'Iure omnis doloremque quo similique vel autem. Amet ut optio voluptatem. Mollitia voluptatem alias possimus quia veniam qui totam.', 'Odio quas rerum itaque accusantium atque. Blanditiis velit nihil id modi vero.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(12, 55, 37, 'Quam fuga quisquam magnam ratione. Explicabo fuga esse quod qui. Optio et est impedit atque eveniet est nostrum.', 'Qui eum similique qui recusandae. Quibusdam quia dolorem assumenda deserunt qui ab ad est.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(13, 54, 24, 'Voluptatem voluptate non est reiciendis adipisci ut saepe reprehenderit. Provident perferendis aut provident est illo occaecati.', 'Illo commodi ut recusandae nihil. Aut pariatur eaque quae est ipsum dolorem provident.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(14, 45, 61, 'Doloribus aut cumque modi eveniet molestiae hic quas. Porro dignissimos iusto quo cum. Vel minus sunt aut. Sint odio optio unde praesentium et sit.', 'Ipsum a perspiciatis consequatur esse inventore. Repudiandae et quasi nemo qui.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(15, 52, 57, 'Et illo at aliquam quod rerum dolores. Aut voluptate a excepturi in. Est molestiae omnis deleniti.', 'Odio hic quas omnis et vitae temporibus. Culpa doloribus autem rerum hic.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(16, 53, 87, 'Est aut nihil consequatur placeat est impedit. Sequi cum illo facilis ipsa et.', 'Ullam voluptate a optio et. Omnis est consequatur facilis error earum est qui velit.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(17, 46, 99, 'Laborum eum incidunt vel quia ducimus consequatur. Possimus quaerat voluptatibus dolore molestias qui.', 'In beatae non non labore doloribus qui. Beatae enim placeat dolore.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(18, 57, 87, 'In nihil doloremque deserunt consequuntur similique. Soluta consequatur repudiandae voluptatem porro hic facere.', 'Qui et est quia distinctio maxime porro. Sunt eveniet quia placeat vitae sequi.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(19, 51, 10, 'At hic provident sequi. Rerum aut explicabo tenetur qui et omnis perferendis quis.', 'Et dolorum ipsam eligendi molestiae. Libero quod voluptatibus suscipit voluptas dolorem.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(20, 47, 97, 'Similique nisi a saepe magni dicta. Nihil hic quia possimus minima. Quaerat vel ex quaerat doloribus iure ex mollitia.', 'Ipsam ad doloribus aut reiciendis dolores. Cupiditate qui id numquam quos.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(21, 53, 36, 'Sint vero dignissimos unde exercitationem numquam est. In laudantium aut sunt atque quis.', 'Minima atque saepe fugiat facere. Nobis debitis eum libero inventore quia sapiente in laboriosam.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(22, 56, 98, 'Aut optio a sequi rerum facere a eius. Explicabo quibusdam quis hic accusamus. Maiores veniam cum aut occaecati.', 'Quia laborum quod nam qui eum. Nostrum fuga et dolorum optio ullam. Doloribus non culpa et.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(23, 47, 43, 'Qui ex impedit quis saepe. Et soluta quae architecto. Et laborum ad quis non dignissimos nihil.', 'Beatae qui odio natus quia. Expedita occaecati voluptas cumque quia dolor et.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(24, 49, 38, 'Quam similique quis eveniet ipsum vel commodi et. Adipisci neque aliquam unde magni cumque labore unde. Quo ipsam placeat enim tempora fugiat sint.', 'Repellat qui autem molestiae atque et. Laboriosam incidunt iure eveniet qui cum vitae.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(25, 49, 84, 'Qui reiciendis sunt quis ut. Nobis animi enim quia quia. Voluptates ut et esse ea assumenda sit. Sint veniam suscipit maxime tempore.', 'Assumenda numquam temporibus sint tempore. Dolor voluptate aperiam magni. Qui earum non sed dolor.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(26, 60, 23, 'Sed sed libero voluptatem omnis. Fuga at non vero omnis reiciendis ipsam. Vel temporibus est eligendi ut aut vero rerum.', 'Delectus voluptatibus dignissimos ex hic est quas. Iure delectus eos consequuntur quia.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(27, 44, 65, 'Sed minima sunt voluptas quo. Non reprehenderit quas quis. Tenetur quis sunt omnis quod atque dolorem.', 'Natus nemo provident quas. Est ut odit in excepturi sit quis. Iure quisquam et rerum illo sint.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(28, 58, 33, 'Non nemo illo consequatur tempore eveniet doloremque. Harum voluptatem doloremque esse qui quibusdam inventore aut. Sit odio nulla eum est.', 'Suscipit necessitatibus dolorem voluptas minus. Quibusdam fugit at et odit pariatur hic libero.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(29, 49, 53, 'Quo atque eaque accusantium accusamus rerum facilis. Facere placeat ducimus libero ipsum recusandae. Est laudantium quia placeat nobis fugiat.', 'Sunt corrupti reiciendis saepe qui dolore est. Quia sed hic nobis voluptatem ad.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(30, 53, 12, 'Qui repellendus repellendus voluptatem laudantium. Et quidem nulla sed modi. Voluptatem aut nobis quis et.', 'At rerum deleniti qui ea nihil veniam tempora. Dignissimos sunt fugiat qui.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(31, 45, 73, 'Dolorem autem animi impedit debitis et excepturi. Molestiae et ut ab repellat sunt blanditiis. Quas occaecati voluptas asperiores et.', 'A facilis repellat ipsam dolore. Ut quia itaque praesentium sunt aspernatur eos quibusdam expedita.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(32, 53, 83, 'Commodi nobis et quia sequi pariatur enim. Alias repellat autem cumque distinctio quia. Tempora id molestiae cumque ullam occaecati.', 'Ad tempora est iure. Ratione alias voluptatem labore enim et libero.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(33, 58, 44, 'Nam dolorum illo expedita. Magnam accusantium est vel consequuntur. Nam maiores ut omnis itaque.', 'Provident quisquam et nam nisi. Ut rem aliquam incidunt doloribus sit. Ut sit quaerat quia ut.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(34, 50, 28, 'Iure ut qui eius. Exercitationem esse saepe dolorem excepturi laboriosam. Dolorem laborum ratione ut accusantium adipisci minima qui.', 'Vitae enim incidunt eos nam. Similique et sed velit temporibus.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(35, 55, 87, 'Corporis quo veritatis voluptates. Quia sed esse esse et molestiae illo non. Asperiores veniam id quidem rerum.', 'Saepe laudantium velit corporis eum. Dolor illum esse optio nesciunt.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(36, 48, 38, 'Et voluptas incidunt sed tempora recusandae. Vel et mollitia nobis et amet exercitationem.', 'Et alias omnis laborum earum et omnis. In ea ipsa ab occaecati.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(37, 41, 64, 'Odio iure praesentium ea rem totam. Ex voluptate fugiat corrupti quo.', 'Repudiandae quibusdam ut inventore nemo qui quae quasi. Et impedit sapiente eius voluptate animi.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(38, 56, 18, 'Excepturi et laboriosam deleniti praesentium. Voluptates modi fugiat qui vel. Voluptatibus laudantium facilis deleniti deserunt sapiente cum.', 'Dolor dignissimos et quasi eum alias facere. Laudantium culpa quas ullam cupiditate itaque veniam.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(39, 59, 14, 'Assumenda excepturi accusantium odio dolorum rem eum odit culpa. Quo earum sit quis atque sed. Fugit vitae nobis veniam placeat quia.', 'Excepturi unde sit esse magni reiciendis aperiam earum. Accusamus omnis vitae earum.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(40, 46, 56, 'At quas odio voluptas ducimus. Fuga ut earum sint earum ipsum debitis eveniet. Rerum aut odio saepe architecto sit corrupti.', 'Perspiciatis dolore porro cum aliquam. Minus possimus quia aut et. Aut rerum velit quia.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(41, 41, 52, 'Nobis labore minima quasi dolores. Unde aperiam laudantium quae necessitatibus laboriosam iusto dolorum ab. Eos aspernatur incidunt sunt sunt omnis.', 'Dignissimos quis qui id. Accusamus placeat nobis id autem ullam veniam.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(42, 60, 100, 'Nihil fugiat voluptatum dolorem sed voluptates. Ipsum aperiam quidem similique cupiditate sed. Est quasi corporis distinctio.', 'Id earum illo iste ad laborum illo. Est autem velit laudantium aut quasi ut.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(43, 53, 23, 'Ut velit voluptas sint dolor. Quidem nam iste temporibus impedit eos. Sed incidunt tenetur velit.', 'Voluptatem eos natus doloribus. Qui aut recusandae ipsa ipsa. Non veritatis animi eius.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(44, 47, 70, 'Quos rerum ducimus adipisci amet tenetur placeat. Eum veritatis ea et est et aperiam quasi. Doloribus ex in aspernatur commodi nihil.', 'Voluptas sunt sed et quos quo. Molestiae eum odio in.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(45, 60, 68, 'Eaque rerum est eius autem numquam voluptates dolorem commodi. Aperiam odio placeat repellat modi. Ut odit sunt cumque omnis ea recusandae.', 'Autem id quam molestiae ut esse sit. Odio fugiat alias et dolorem.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(46, 43, 79, 'Dolore libero maxime distinctio rerum et rerum. Aut autem voluptatibus eum ut in id. Exercitationem libero nesciunt rem quibusdam.', 'Harum aut tempore ex. Aut earum esse recusandae corporis magnam doloremque.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(47, 53, 25, 'Cum nam occaecati voluptatem cum debitis. Nemo provident velit nobis quia voluptate ut incidunt atque. Eos officiis quos distinctio sequi.', 'Laudantium enim ex accusantium. Aut sint fugiat eligendi ullam a.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(48, 43, 55, 'Eius omnis et dignissimos ut non vel. Aperiam aut commodi fugit voluptas eos. Quia magni ducimus est quia voluptas architecto architecto qui.', 'Veritatis a veritatis quia aut fugit. Voluptate distinctio dolorum mollitia iste dolorem.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(49, 52, 7, 'Veniam cum ut quasi at. In doloremque pariatur commodi est porro exercitationem aut dolor. Et beatae velit velit ea omnis optio recusandae.', 'Sit esse aut deserunt deserunt omnis rem qui. Minus iste facilis eaque. Ipsam omnis est saepe.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(50, 42, 39, 'Quae nulla rerum perspiciatis aut perspiciatis excepturi. Magnam aspernatur velit optio. Magni eum reprehenderit non voluptatem nobis voluptatum.', 'Qui eum corrupti minus ullam. Laudantium a debitis voluptatem et cupiditate.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(51, 49, 82, 'Illum eum sapiente perspiciatis ut reiciendis voluptatibus. Eum natus dolorem earum consequatur sapiente. Eos sit vitae quia dolor.', 'Consequatur sunt autem maiores debitis. Assumenda sit qui aut sapiente quibusdam dignissimos in.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(52, 55, 50, 'Consequatur sunt eaque quam est deleniti. Aut nam qui mollitia ducimus inventore non. Et hic est sequi doloremque ut quasi cumque. Enim et sed et.', 'Fugiat rerum et ipsum voluptatum. In natus nesciunt soluta.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(53, 60, 62, 'Tempora est non laudantium eius quidem tempore. Ipsa sunt quibusdam eum repellat sit sit eaque. Sint id eos aut et ab vitae rerum commodi.', 'Fugiat vero neque ratione cum id inventore omnis itaque. Rem sunt beatae maiores in nostrum.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(54, 57, 22, 'Eius est dolorem temporibus consequatur beatae dolore. Tempora occaecati alias cupiditate deleniti atque ut ut.', 'Eum beatae id nulla impedit quia quaerat. In sapiente velit aliquam quo quia et.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(55, 54, 79, 'Optio sit doloremque ut animi. Dicta et sed alias enim cumque libero deserunt. Vel ipsa nostrum sint id voluptas. Harum facere a ut neque sed.', 'Incidunt ipsam repudiandae illo quidem. Voluptatem omnis ut qui enim pariatur.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(56, 58, 74, 'Vel voluptatum vel qui nihil quis. Voluptates sequi voluptatem vel cum neque quae. Commodi ut voluptatem assumenda sapiente.', 'Quia aut quo sunt odio. Esse qui nostrum et eaque. Quas est aut alias id.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(57, 48, 60, 'Distinctio excepturi non quia sapiente enim. Aperiam et beatae est aut molestias saepe in. Voluptas sed natus accusantium voluptatibus eligendi.', 'Aliquid ad ut iste quod optio voluptatem voluptas. Enim fuga aliquid deleniti libero ut odio.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(58, 42, 15, 'Velit nisi et voluptatum. Sunt voluptate quod commodi itaque eveniet placeat. Et hic ipsam quis velit. Consequatur culpa et voluptatem atque.', 'Aut repellat recusandae consectetur in rem animi recusandae. Facere dolorem harum a culpa.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(59, 49, 5, 'Possimus quo occaecati aperiam ipsam. Molestiae neque eius aut impedit. Quia cupiditate dolorem impedit praesentium ut.', 'Nihil facere saepe deleniti. Et itaque sint beatae ut ex maiores.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(60, 48, 28, 'Minus sunt laboriosam repellendus. Tempora facilis in ex. Doloribus nostrum recusandae totam.', 'Ut et quis voluptatem temporibus. Accusamus facere tenetur ut sint nam.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(61, 57, 83, 'Illum velit vel blanditiis reprehenderit illum eligendi quis. Non culpa sint illo eius. Eum molestias sed aut nihil dolorem voluptatem dolores.', 'Nesciunt quia esse fugit. Provident aut quia et libero optio.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(62, 44, 90, 'A eos molestias optio. Rerum atque vero sed esse nisi.', 'Et vel animi alias sunt et et ut. Est voluptatem ut beatae sint. Quia id incidunt animi eos.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(63, 59, 64, 'Voluptate dolorum qui praesentium fugiat ea eveniet. Fuga quo voluptatem inventore laboriosam illum. Doloremque nobis dolores cum est architecto eum.', 'Tempora hic dolorum eaque autem ea tenetur tempore. Nulla occaecati ducimus laudantium.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(64, 48, 88, 'Aspernatur sint ullam a sequi consequuntur iure. Qui dolores necessitatibus autem incidunt non enim.', 'Dolor omnis possimus sit. Et sunt accusantium est sed odio.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(65, 55, 55, 'Aliquid eum id ullam aliquid. Natus saepe voluptatem accusantium officia nisi et. Iste iure dignissimos est.', 'Id ea deleniti dolores et vitae. Voluptatem beatae natus facilis ad laboriosam.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(66, 53, 68, 'Cupiditate iusto sit corrupti dolor. Ut molestiae porro deserunt velit voluptatem dolore.', 'Et exercitationem quod eos neque ut aperiam. Dolorem qui ea explicabo nemo tempore beatae.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(67, 45, 88, 'Ipsam eius enim saepe omnis. Soluta consequatur earum qui non. Dolorem sit voluptatem nostrum quibusdam qui.', 'Omnis et laudantium distinctio est et. Tempore sit cupiditate eos nisi.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(68, 57, 38, 'Vitae ut ipsa explicabo excepturi. Itaque veritatis fugit a soluta. Animi nihil molestiae sit sit quos perferendis quidem.', 'Illo delectus ut fugiat quasi. Et sed ratione id nisi molestiae quisquam sapiente dolorem.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(69, 55, 58, 'Iusto sint ut et dolore. Ipsum laudantium et id aut quaerat rerum.', 'Ad quos sunt velit. Eius voluptatum saepe a voluptas. Molestiae ut quibusdam magnam est.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(70, 45, 60, 'Sed sed et delectus qui. Delectus quos ad ut culpa voluptate et corporis. Distinctio dolorem quod magnam magni atque qui.', 'Quae fugiat et quos eos culpa. Et eum aut reiciendis quasi possimus illo aut.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(71, 52, 33, 'Necessitatibus consequatur deleniti eveniet quidem ipsum non. Ipsum dolores veritatis at. Quo laborum fuga eos nulla.', 'Consequatur et vel eveniet id aliquid unde. Eius aliquam omnis et aut et qui fugit.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(72, 54, 42, 'Accusamus consequatur ut delectus in asperiores voluptates ullam. Asperiores doloribus rem fugiat cum tempora hic. Eaque rerum natus est.', 'Qui aut rerum quasi ipsam. Doloremque voluptatibus commodi illo et. Culpa quos in voluptatum.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(73, 59, 49, 'Ex et facilis qui unde. Ipsa quasi vitae ullam quo dolores saepe id.', 'Sint non aut et quas ab aut facere eos. Est enim quasi ut qui ut doloribus.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(74, 60, 94, 'Fugiat dignissimos nisi omnis repudiandae. Atque sint expedita voluptatem repellat qui est. Culpa vel in placeat laudantium eum.', 'Aut ex aperiam distinctio. Autem iusto ducimus non aliquam ut.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(75, 49, 86, 'Libero aut animi minus vel. Minus nisi laboriosam nostrum quasi molestiae est doloribus. Culpa aut corrupti dolorem aut optio nam est sed.', 'Est officiis natus vel dolores. Doloribus nostrum pariatur voluptates eos incidunt.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(76, 53, 41, 'Voluptatem necessitatibus natus deserunt perspiciatis quas voluptatem libero. Consequuntur fuga dolore et.', 'Vel rerum repudiandae ratione porro. Vel voluptatem rerum cum fuga harum non quibusdam.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(77, 53, 28, 'Dolores ut amet inventore dicta. Eaque labore architecto consequuntur ipsam vero. Quidem atque tenetur quia deserunt ducimus.', 'Fugit facilis deleniti cumque. Omnis nisi sit sunt et velit aut.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(78, 55, 94, 'Explicabo omnis sit cumque distinctio reprehenderit. Omnis minima et omnis fugiat illo mollitia officiis. Et distinctio et atque.', 'Ad veniam in explicabo. Quod aperiam saepe rerum sint eos. Maxime voluptatem officia aut soluta.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(79, 42, 82, 'Consequatur error eos tempora qui eveniet. Autem ratione omnis illum optio mollitia omnis blanditiis.', 'Et velit id impedit repellat. Ab et tempore et et quidem velit dolores voluptate.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(80, 53, 37, 'Voluptas velit velit nulla tempore labore odio. Blanditiis inventore quisquam quisquam similique. Praesentium vel rerum atque sint.', 'Officia nihil qui doloribus tempore commodi est. A veniam asperiores molestias.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(81, 57, 27, 'Ad voluptas aliquam aut ex. Voluptatem est praesentium rerum minima id eius quod. Rem aliquid nisi doloremque voluptatum maiores nihil corrupti.', 'Omnis autem voluptas animi iusto ipsa sequi dolor. Delectus autem est et et necessitatibus.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(82, 41, 98, 'Porro voluptatem quos delectus aut provident. Ratione quae cum non labore. Praesentium temporibus enim quisquam eos laborum velit.', 'Ipsum vel in et animi. Molestias qui at soluta sapiente excepturi ut. Error qui quia labore.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(83, 42, 64, 'Nobis iste dolorem non voluptates aut porro. In et aut similique. Et ex et cumque sed nostrum.', 'Est quas vitae minus illum quae aut. Possimus aut numquam atque ut quo earum non.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(84, 51, 74, 'Labore sit cumque et. Quas est asperiores deserunt numquam et ex et. Animi voluptatem rerum officiis quidem unde.', 'Eligendi nemo aut quas et. Sit est id rerum odio quo nesciunt cumque. Aperiam beatae delectus quos.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(85, 47, 18, 'Est molestias dolorem aliquid necessitatibus incidunt. Officiis minima vero sit dolores sint odit. Sunt et incidunt ut eligendi incidunt.', 'Consectetur eligendi perspiciatis itaque consequatur. Iste odio blanditiis odio modi et sit dicta.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(86, 46, 78, 'Maxime ut minima necessitatibus perferendis. Omnis nam magnam repellendus aut quis quo.', 'Sit officia quo exercitationem fugiat. Consequatur id praesentium debitis autem aliquam quibusdam.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(87, 52, 83, 'Est dolor occaecati et nisi. Exercitationem molestiae vero impedit ducimus deserunt. Facilis et cum recusandae unde soluta.', 'Commodi optio in amet officiis. Occaecati et omnis ipsam. Hic laborum laudantium saepe ut sed.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(88, 41, 14, 'Deleniti aliquam voluptatibus quis nobis neque. Omnis dolor omnis consequatur maxime. Sit optio similique qui quo ipsa dignissimos.', 'Hic sed debitis sed et dicta minus sequi. Eum officia odit ex voluptas. Harum ad sit ut nulla.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(89, 55, 75, 'Sunt necessitatibus ea nihil dolor dolorum voluptatum. Magni et est unde. Ut dolor quae rem.', 'Et neque aliquid ratione at. In numquam voluptas quo aliquid.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(90, 51, 87, 'Qui neque sint et a officiis magnam eum. Possimus cupiditate eum atque provident. Aliquid aut cumque sunt sed soluta quia molestias.', 'Magnam laboriosam fugiat enim ut dicta. Eum molestiae fugit vitae exercitationem.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(91, 43, 42, 'Minus facere autem impedit omnis sint quasi asperiores itaque. Commodi rerum consequatur illo ea neque. Non ratione est consectetur.', 'Hic qui laudantium amet animi amet minus totam. Expedita ab ut itaque labore quos.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(92, 56, 12, 'Facilis eum aut velit. Necessitatibus aliquam doloribus blanditiis in impedit. Illum esse sapiente nihil et voluptatem itaque.', 'Aut aspernatur vero porro ut doloremque facere atque. Ipsum magni magni odio.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(93, 54, 79, 'Totam nam et magni maxime. Rerum adipisci sequi assumenda tempore officiis molestias. Nemo quas corrupti voluptates reprehenderit explicabo.', 'Rerum velit blanditiis veniam et et. Et provident aspernatur et cum vero et consequatur.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(94, 55, 64, 'Eligendi labore sit totam. Eum ut similique quia sunt libero minima quasi.', 'A et molestiae quae qui. Qui ut inventore possimus quasi.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(95, 52, 11, 'Qui adipisci id laboriosam sit. Tempora magnam omnis quia ducimus sit. Atque quis ea voluptatibus molestias.', 'Reiciendis autem tempore mollitia occaecati a fuga aut quis. Rem et quas perspiciatis voluptatem.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(96, 58, 1, 'Est tenetur et eum doloribus magnam blanditiis. Numquam nam eum fugit et vero. Deleniti optio vero et.', 'Aliquid et aliquam quo sapiente. Aliquam placeat incidunt laboriosam dolore.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(97, 56, 67, 'A molestias explicabo autem perspiciatis aspernatur omnis voluptatum. Quia porro eum voluptatum blanditiis. Autem nisi est fugiat sed aut.', 'Laborum id qui odio quis. Aut enim natus eum cumque ut cum. Ad sunt et culpa.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(98, 59, 27, 'Tempora esse voluptas et aliquid similique aut minus earum. Voluptate cupiditate dignissimos harum voluptas eius ex. Vitae est unde eos quo.', 'Distinctio dicta sequi sed dolores quia. Quae accusamus ut quia eos eos voluptatum.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(99, 58, 53, 'Dicta rem natus laborum aut laudantium quo. Voluptatem culpa temporibus autem quas ea. Et repellat voluptates et pariatur.', 'Sed deserunt ad dolor explicabo possimus. Et beatae ipsam autem aperiam nam.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(100, 51, 31, 'Aut nulla sed asperiores autem soluta et. Sit et corrupti rem molestias et molestias molestiae qui. Voluptatem nam et debitis quibusdam sed non.', 'Quia quis vero laboriosam commodi. Quibusdam et magnam ipsam sit.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(101, 45, 89, 'Sed nihil et repellat ea architecto quod. Vel exercitationem et a est et. Quis blanditiis amet reprehenderit et. Itaque id porro molestiae est eum.', 'Inventore quia sapiente consequatur. Fuga amet dolore consequatur molestiae ipsa voluptas.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(102, 50, 19, 'Ut provident corporis eum eligendi. Vitae debitis dolorum consequuntur nihil voluptatem. Dolor accusamus optio deleniti vitae molestias inventore.', 'Dolores sed ut accusantium placeat eaque ut. Qui ipsa magnam quam possimus.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(103, 54, 98, 'Odit illum nostrum et pariatur excepturi vero dolorum. Nobis et nihil ad eos aut. Iusto architecto ut laboriosam aut.', 'Aperiam molestiae rerum rerum alias aperiam tenetur qui laborum. Sit est quia fugiat cumque et.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(104, 47, 17, 'Hic accusamus eum deserunt est nesciunt nihil dolorum. Officiis doloremque animi maiores assumenda beatae nobis.', 'Et repellendus iusto maxime atque cum id eveniet. Tempora animi commodi accusantium commodi.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(105, 58, 43, 'Nihil libero natus dignissimos. Necessitatibus repellendus cupiditate qui. Hic quis deleniti unde in.', 'Quam molestiae et laboriosam molestiae perspiciatis aut et. Rerum quasi soluta aut omnis et magni.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(106, 47, 60, 'Qui non totam totam temporibus. Officia in architecto voluptatum beatae saepe ullam. Et nisi ea voluptatem maiores similique dolorem eum.', 'Adipisci voluptas dolorum ea iusto inventore autem quasi. Aut et eveniet unde rerum.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(107, 60, 38, 'Dolorum iure qui autem sed. Nihil voluptates sit sed adipisci deserunt consectetur quia. Porro sed suscipit illum nam omnis aut molestiae.', 'Culpa beatae dolor quis. Et quo est eligendi cupiditate. Sint qui maiores accusantium veniam atque.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(108, 49, 55, 'Quia aut aliquam illum. Aut sit consequatur vitae quisquam neque qui. Et temporibus ex quidem est a.', 'Inventore dolores dicta voluptates explicabo aut quod. Natus ad eaque soluta placeat.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(109, 41, 91, 'Ea deleniti enim officia dicta. Praesentium eaque perferendis nihil id. Rerum dolores dolores dolorum amet aut qui dolorum.', 'Aut veritatis architecto sed velit voluptas qui eius omnis. Culpa illo blanditiis eveniet.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(110, 44, 94, 'Repudiandae molestiae sint qui voluptatum minus possimus. Repellat ipsa architecto quo in eos. Est corporis ullam fugit inventore quidem magnam.', 'Et deserunt saepe et. Aspernatur qui quam qui qui. Voluptas enim nam explicabo hic.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(111, 58, 1, 'Porro veritatis quisquam necessitatibus. Quo id praesentium quisquam et. Ipsum aliquid at id. Beatae illum enim ea possimus consequatur distinctio.', 'Magnam illo omnis voluptatem voluptatem. Nisi reprehenderit consequatur quisquam commodi id id.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(112, 42, 73, 'Sed voluptatum est asperiores sed. In libero accusantium delectus minus suscipit nulla.', 'Explicabo molestias dolor quidem recusandae. Minima harum porro molestiae recusandae est quis ut.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(113, 49, 99, 'Deleniti eveniet qui non aperiam culpa aut. Quae quod rerum saepe velit delectus provident qui. Officia in quasi corrupti est.', 'Cumque a quibusdam iste est. Nobis mollitia ducimus consequuntur modi.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(114, 59, 70, 'Iusto minus doloremque nemo porro. Sed sit voluptatem consequatur qui. Et quod tempora sit amet et. Omnis rem cum architecto architecto.', 'Aut et repellat consequatur velit laudantium maiores. Ullam fugiat nobis ipsa illum ut error.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(115, 54, 77, 'Excepturi voluptatem consequatur ea ullam quia. Molestiae vitae aut omnis quos. Quasi accusamus non sed dolore reprehenderit est.', 'Ipsam quis nulla optio accusamus et. Sed velit et rem. Omnis placeat voluptas ipsa nemo eos in.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(116, 57, 91, 'Doloribus qui quasi omnis voluptate atque. Ut minima facilis est qui. Temporibus et aut autem aut voluptas aut quae tenetur.', 'Eum magni est iusto molestias. Eius at ut quo aperiam beatae. Velit omnis provident maxime laborum.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(117, 50, 42, 'Labore et voluptatem qui doloribus. Modi autem similique qui ipsum dolor molestiae. Excepturi eos corrupti aliquam sed. Vel aperiam vitae et sit.', 'Libero esse est in. Ut consectetur explicabo hic et porro ratione ratione sint.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(118, 50, 30, 'Pariatur cumque eos quia omnis. Vero est quisquam nisi rerum. Architecto commodi illum molestiae a ducimus ab perferendis.', 'Est sint odio saepe. Amet eum fuga et impedit sit vero distinctio eum. Similique at dolores sit.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(119, 59, 8, 'Aut iure aut vel modi est asperiores quo. Aperiam rem eos illum voluptatem nemo rerum. Ut vitae rerum vel corrupti repudiandae incidunt odit.', 'Dolor id modi ad. Perferendis iusto ut laborum est natus.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(120, 57, 90, 'Ad saepe nostrum assumenda ad asperiores. Eveniet adipisci veritatis sit animi. Et est repudiandae libero ut eaque aspernatur.', 'Et ut autem sequi qui. Qui nihil unde recusandae laborum ut temporibus dicta dolore.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(121, 45, 73, 'Eveniet ut a rerum cupiditate in dolores. Dolor ex dicta voluptatem est perferendis ut et. Rerum facilis facilis fuga non.', 'Porro nisi omnis temporibus est dignissimos omnis et. Quo fuga maxime dignissimos officia.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(122, 49, 24, 'Fugit quia perferendis labore et. Quo commodi porro tempora. Non deserunt quod qui occaecati consequatur.', 'Maiores quia et rerum nulla aut. Quasi quisquam voluptas est sed a quasi.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(123, 46, 24, 'Facilis rerum consequatur quisquam harum et. Dolorum earum in aut architecto magni et non maxime. Laudantium nisi eius blanditiis ad aut.', 'Id velit et porro omnis. Repellat adipisci laborum aut sapiente illum at. Animi saepe adipisci ut.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(124, 41, 95, 'Voluptatibus unde praesentium ad quisquam molestiae et ad tempore. Officia officia et in harum dicta eos quia. Aliquid distinctio harum eum sequi.', 'Est ducimus ab aut. Consectetur ipsa autem magnam sunt at. Veritatis aliquid repellat quasi sint.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(125, 55, 48, 'Odio dolorem autem nobis. Qui itaque consequatur qui dolorum. Nihil laborum quidem ipsa facilis.', 'Qui nihil voluptas eaque dolorem temporibus occaecati voluptatem. Unde recusandae ut sit eius qui.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(126, 60, 68, 'Minima est deserunt inventore explicabo non qui. Et facere nobis omnis provident et aut similique ad. Aut eum quis quae ut impedit eaque.', 'Nisi sed aut et id voluptatem eum sed. Temporibus dolore non molestiae.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(127, 55, 2, 'Nihil veritatis laborum quidem rem eius et. Accusamus possimus qui debitis ab a illum.', 'Ex qui sunt eaque eveniet aut recusandae. Id iusto molestiae dolores voluptatibus esse nisi.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(128, 52, 82, 'Maxime illo asperiores amet corporis repellat sapiente. Voluptatem odio itaque rerum consequuntur culpa dicta. At est ex numquam ducimus et.', 'Vel ut eum laborum similique. Omnis eius alias eos officiis.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(129, 50, 82, 'Necessitatibus debitis commodi atque labore placeat eos blanditiis doloribus. Nam fugiat ut totam voluptas. Accusamus voluptatem cumque consectetur.', 'Voluptatem libero id itaque explicabo. Cumque quia vel optio et est qui.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(130, 56, 98, 'Et cum quaerat sed repudiandae repellendus quidem. Occaecati fugiat sed et commodi.', 'Eaque voluptatem et laboriosam et a quis. Rerum facilis rerum est quam voluptatem explicabo a.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(131, 44, 29, 'Ut quos reprehenderit atque. Et sit sapiente iusto voluptatibus dolorum dolores. Aut aliquid eos eum et eos veniam. Alias rem in numquam voluptatem.', 'Qui a beatae fugit. Impedit quam eveniet similique omnis. Et illum quos adipisci est.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(132, 53, 30, 'Consequatur sed adipisci voluptas enim. Et reiciendis consequatur ratione at. Quia quos ut aliquid doloremque.', 'Molestias earum est eos sapiente ab placeat. Temporibus modi qui atque illum veniam et.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(133, 48, 94, 'Eum quod sed tenetur rem. Dolore sequi dicta in numquam distinctio. Sequi maxime suscipit omnis sunt nihil exercitationem.', 'Maxime aut nemo corporis omnis atque quisquam quibusdam. Voluptates sed dolorem non eum.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(134, 46, 49, 'Quae quis at cumque sequi iste. Adipisci error libero velit necessitatibus praesentium incidunt. Illum corrupti beatae odio.', 'Culpa ipsa ullam excepturi eos provident. Corrupti autem consequatur ea aliquam at est.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(135, 41, 58, 'Quos magni ut ab animi non. Repudiandae doloremque voluptas illo. Fuga accusamus aut et. Id modi laudantium nemo.', 'Placeat ea sed eos. Ipsum labore in voluptas quia ut.', 4, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(136, 56, 68, 'Quia quia qui et dicta consequatur molestiae. Et corporis ut ducimus ut. Quibusdam adipisci omnis dolor.', 'Vel nihil voluptas molestiae sapiente mollitia dolorum. Iusto eius at quia cum.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(137, 57, 95, 'Beatae quas repellat ut impedit consectetur eaque sit. Accusantium sunt reprehenderit consequatur doloremque.', 'Minima nulla praesentium iste. Dolore sapiente maiores quibusdam.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(138, 44, 11, 'Quo sint vel reprehenderit natus repellat voluptas. Sapiente autem vero voluptas. Quia veniam voluptatum voluptas.', 'Quia distinctio reiciendis est aspernatur ducimus. Ut rerum necessitatibus qui et.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(139, 52, 24, 'Sapiente quasi ipsam optio tempora. Quidem cum recusandae totam reprehenderit. Praesentium laudantium maiores quia optio sint voluptatem.', 'Facere numquam quidem esse. Officia earum eos aspernatur necessitatibus similique ea.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(140, 59, 64, 'Accusantium quis et recusandae quo eos commodi. Corporis iste repellendus vel accusamus. Rerum aperiam maiores nihil pariatur est.', 'Esse et omnis est ipsum est. Aut veritatis perspiciatis aut magni voluptatem quod voluptates.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(141, 48, 39, 'Labore facere impedit ipsam fugiat. Sint est ex minus id hic molestiae. Fuga id sequi qui est. Eos mollitia voluptas ea necessitatibus error.', 'Voluptates soluta aut fugit voluptas. Magni ea in neque possimus. Et iusto ea a qui distinctio.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(142, 58, 47, 'At culpa autem doloribus. At rem itaque sed odio magni. Exercitationem dolor et et.', 'Minus laboriosam aut qui. Recusandae aut et ut doloremque ut.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(143, 43, 52, 'Enim voluptatem repudiandae ut est eum quidem fugiat. Provident error reiciendis rerum officia.', 'Hic et reiciendis aut eos et. Libero vitae et a aut nam doloribus porro blanditiis.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(144, 59, 60, 'Officiis expedita minima voluptatem est officia laudantium. Ducimus nesciunt cumque voluptatem earum voluptatem vel. Maiores labore omnis quos est.', 'Ratione eum voluptas cupiditate deleniti dolorem distinctio. Qui ducimus architecto saepe rerum.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(145, 46, 10, 'Accusantium repellendus voluptatibus hic voluptatem voluptatem ea. Iure incidunt nesciunt id et.', 'Explicabo expedita vel nobis qui qui. Aut rerum suscipit quod optio quia maxime.', 3, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(146, 47, 46, 'In ut nobis laborum consequuntur assumenda qui provident est. Qui similique iure vero rerum maxime ducimus. Qui sit maiores dolorem optio dolores.', 'Recusandae dicta possimus iure similique nam. Ullam non distinctio et recusandae est iure.', 2, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(147, 48, 83, 'Veniam unde consequatur excepturi et. Dolorem cumque dolore aliquam rerum soluta excepturi.', 'Corporis est vel facilis architecto qui ea et. Quas corrupti aut cum assumenda et.', 1, '2022-05-07 15:33:57', '2022-05-07 15:33:57', NULL),
(148, 55, 41, 'Est et voluptatem et rem ut iure. Voluptatem et reprehenderit itaque similique quis voluptas odio. Sit sit a cumque quia aut numquam.', 'Natus enim dolor aut voluptatibus consequatur. Ut adipisci qui eius eos.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(149, 54, 8, 'Molestiae et saepe ullam ut fuga fugiat. Vero sit illo aut culpa a asperiores. Dolores numquam ad quaerat placeat.', 'Labore fuga at et. Et nam vel ratione ut accusamus recusandae.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(150, 60, 54, 'Nisi labore eveniet modi et ipsa. Incidunt pariatur dolores esse qui eaque aut. Autem soluta atque saepe minus qui et quae.', 'Beatae reiciendis sapiente laudantium. Corporis cupiditate libero error ut minima.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(151, 45, 40, 'Officia tenetur earum perferendis deserunt ut iure. Ut temporibus est ducimus nesciunt. Sed sit expedita id corporis. Voluptate qui sint id debitis.', 'Et et repudiandae esse officiis praesentium. Ut enim et beatae voluptatem in delectus quia esse.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(152, 52, 42, 'Assumenda sit ex quasi ut corrupti. Culpa accusamus magni et. Quam quisquam qui nemo sed. Quaerat ea ex rerum sit.', 'Qui rerum at velit sunt quas. Officiis laboriosam inventore sit et atque aspernatur.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(153, 50, 22, 'Nihil nemo illum tenetur dolorem reiciendis. Veritatis deserunt excepturi occaecati dolorum omnis pariatur. Odit hic voluptatibus enim praesentium.', 'Sed ut vitae harum odio quaerat. Fugit aut sunt fuga est et sint. Qui dolorem iste est ut.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(154, 44, 42, 'Sit est facilis voluptates iusto. Accusantium molestiae eos tenetur non quaerat sint a officia. Enim omnis debitis sed necessitatibus tempore quia.', 'Veniam et modi dolores tempora et totam. Minus et deserunt ut dolore quisquam quae.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(155, 49, 2, 'Blanditiis officiis consequatur aperiam eligendi sit consequuntur odio. Voluptas sed itaque blanditiis culpa sit. Officia vero a odit.', 'Nihil facere expedita et. Aut ut aut ab quae.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(156, 43, 47, 'Quis non reiciendis quis consectetur. Est amet qui voluptas ab autem expedita quos. Sit porro quo dicta dolor.', 'Quia repellat nemo ipsa ipsam. Quod incidunt sed aut aut facere aut ratione.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(157, 59, 94, 'Nemo dolorum possimus repudiandae eius. Id neque illum fugit dolorum error minus quae. Quo dolores veniam necessitatibus ut dolores tempore.', 'Esse exercitationem qui cumque architecto recusandae labore iste. Culpa est sit ratione doloribus.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(158, 58, 12, 'Ipsam quo deleniti quaerat qui. Quaerat quia et soluta officia eveniet id. Sunt tenetur molestiae aut eaque velit veniam at.', 'Et nesciunt nulla quidem. Voluptas non asperiores temporibus. Totam maxime et ut ullam ab.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(159, 42, 15, 'Sed hic omnis illum qui nobis. Harum rem nihil non vel sunt nihil quos. Iste quaerat itaque necessitatibus.', 'Dignissimos aliquam vitae enim maiores est voluptatem. Quaerat officia ipsam est id.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(160, 41, 24, 'Optio ratione magni occaecati perspiciatis quae. Eligendi eligendi modi voluptas omnis quo et.', 'Atque repellat totam et. Quaerat velit vitae qui repellendus numquam. Qui dolor eaque ad omnis aut.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(161, 57, 63, 'Porro et dolores ipsam est nemo. Et ut consequatur maxime hic aspernatur. Aliquid soluta aut aut quia esse. Est porro qui quis qui.', 'In sed vero aspernatur ut qui. Et ut modi nam suscipit consequatur. Sit ex error consequatur.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(162, 50, 36, 'Quidem dolore nihil in. Minima et quibusdam velit cupiditate placeat unde ut. Possimus provident modi sed inventore.', 'Quae est et expedita consequuntur aut et. Voluptas omnis ut voluptatem veritatis.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(163, 47, 26, 'Iure vel labore aliquam quis explicabo dolorem. Magni consequatur maiores voluptatem rerum. Aut impedit sit aut quia quia.', 'Deserunt doloremque iste quisquam aut numquam. Mollitia id accusantium doloribus.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(164, 54, 100, 'Velit ea iusto soluta sit sit. Ut magnam saepe excepturi iusto molestiae maxime. Non illum amet pariatur perferendis molestiae illum.', 'Et qui quia quidem ullam distinctio dolore eum. Cupiditate ea molestiae aut.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(165, 52, 28, 'Non aliquam eum voluptatem occaecati aut. Doloremque voluptatibus ad beatae iste accusamus ut.', 'Quia quod voluptatum consectetur. Voluptatem fugiat tempore repudiandae dolor quod et et.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(166, 50, 96, 'Dicta adipisci dolor expedita cum nisi. Ex fuga rerum quae reiciendis veniam consequatur qui consequatur. Quidem deleniti quo ea laboriosam ratione.', 'In et tempora nulla iste aut. Odio sint ipsa quis temporibus eius qui.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(167, 53, 57, 'Cupiditate rerum odio est deserunt. Alias ipsam ea repellat dolorem. Asperiores ex voluptatibus blanditiis similique in.', 'Laborum deserunt recusandae dicta exercitationem a qui. Aliquid ut quae magnam sit similique.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(168, 58, 10, 'Distinctio voluptas eligendi ut ab. Odit rerum quis reiciendis molestias quo nostrum aut.', 'Consequatur odio autem vitae dolorum accusamus quaerat. Fugiat rem velit est culpa accusantium aut.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(169, 41, 6, 'Sint tempora sed sunt autem aut maxime. Ut odio enim est quidem laborum.', 'Culpa voluptatum quia quisquam natus sint. Voluptate quae pariatur rerum est vel aut.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(170, 48, 80, 'Ea libero ea eveniet. Reiciendis praesentium aut neque placeat nisi iure. Quasi cupiditate cupiditate et delectus nesciunt.', 'Rem vel laborum necessitatibus sequi. Sit aut quam dolore iste recusandae dolorem et.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(171, 55, 29, 'Aut ipsum magni possimus qui nobis et cupiditate. Eveniet quia cupiditate facere aut. Laboriosam nam autem tempora quo.', 'Corrupti amet culpa magni minima sed omnis praesentium. Ipsa eligendi fugit sit in at quas et.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(172, 54, 22, 'Dolor ratione tempora quas officiis tenetur possimus sit. Officiis asperiores rem ut.', 'Voluptas aut et est sed neque nisi aut. Modi eos vel maiores aliquam saepe ab.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(173, 44, 58, 'Cumque ut et eius vel. Sunt et dolorem laudantium. Qui autem quia similique necessitatibus. Amet recusandae voluptatem qui.', 'Nobis tempore enim rerum. Sed porro quos dolores dolorem.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(174, 49, 78, 'Voluptatum quibusdam repellat totam. Quia sed deleniti et aut. Fugit voluptatibus fuga sit velit.', 'Autem aut qui repellendus excepturi soluta. Nostrum laborum eligendi ex.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(175, 57, 28, 'Ullam dolor possimus est odit vel eius unde. Ut minima ut voluptas et quia eaque. Ut quisquam dolores possimus. Aliquid rerum ducimus qui non.', 'Quas saepe inventore et cum totam. Sint commodi fuga velit minus.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(176, 55, 35, 'Vel et ratione cum expedita a placeat molestiae. Quo porro doloribus fugit veritatis quidem. Quia id labore quia.', 'Cumque earum at consequuntur consectetur. Error sit sed repudiandae qui aut dolores quia eaque.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(177, 41, 62, 'Consequatur sunt excepturi eligendi eius. Est vel quas eaque debitis aut sequi. Quis fugit nemo aut ut et fuga fuga.', 'Dolores voluptas id in laudantium dolorem. Sed ullam impedit laudantium.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(178, 55, 35, 'Quia tenetur et et eaque molestias dolor et. Animi quo ducimus asperiores ipsam velit modi. Non doloribus totam quibusdam magni aut.', 'Adipisci sit voluptatem ratione. Voluptatem quis nulla facilis nihil enim.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(179, 49, 30, 'Labore soluta est eos vel. Et molestias itaque et consequuntur asperiores enim. Laudantium voluptatem consequatur non. Aliquam aut et aperiam.', 'Et mollitia qui culpa laboriosam ut. Quo ipsam voluptas natus dolore asperiores quo vel ut.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL);
INSERT INTO `logs` (`id`, `bot_id`, `client_id`, `text`, `note`, `log_type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(180, 48, 41, 'Maiores cum et quis voluptates et. Eum similique optio architecto sint atque quasi.', 'Et cum officiis culpa amet esse. Occaecati eligendi quos voluptas.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(181, 46, 42, 'Ut eos deserunt perferendis laborum maxime quas. Odit veniam nesciunt alias voluptas error. Soluta sequi optio consectetur ut omnis consequatur.', 'Velit voluptatum omnis nihil sed. Quisquam sit sed et deserunt eum voluptatibus.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(182, 53, 48, 'Reprehenderit et ut commodi adipisci quo. Voluptas veritatis dolore aspernatur at aut. Nisi earum ea voluptas maiores est enim neque.', 'Corporis quisquam nam ut accusamus veritatis. Est fuga suscipit rerum ut molestias velit.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(183, 43, 71, 'Illo sapiente temporibus ut at perferendis. Expedita ut itaque quo minima. Voluptates non architecto voluptatum est pariatur laborum saepe.', 'Qui eos aliquid quasi rerum veritatis. Corporis velit officia architecto.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(184, 57, 27, 'Nisi facilis non ut et. Inventore qui aut qui atque et tenetur. Eveniet placeat cum aut repudiandae unde.', 'Animi vel vel accusamus. Et et omnis repudiandae sunt dolore.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(185, 42, 61, 'Qui mollitia incidunt est qui quo id. Dolores ea saepe eveniet aut.', 'Ut sed qui in sint. Qui animi reprehenderit est soluta nihil.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(186, 59, 19, 'Hic corporis tempora qui quia omnis. A ut ut omnis distinctio sint ut. Ut dolorem quaerat quod sapiente quia veniam.', 'Est sunt reprehenderit aut. Eum pariatur dolore voluptate.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(187, 48, 74, 'Nisi nisi libero sed doloribus. Sequi nam fugit voluptatem quo qui qui nemo.', 'Dolor cupiditate sit cum corrupti. Occaecati et vitae labore eos saepe.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(188, 60, 66, 'A explicabo est illo quaerat. Ut et deserunt consectetur perferendis magni voluptatem.', 'Sit ut veniam rerum. Eveniet est aut recusandae soluta. Qui doloremque et autem vitae officiis.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(189, 44, 79, 'Odit ratione voluptatem nemo aut repellat dolor eligendi. Sit in sapiente sit quod rerum. Et eos quia amet aliquid quia vitae.', 'Qui aut delectus sit. Enim qui sed ducimus consequatur quia enim et.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(190, 41, 23, 'Accusantium iure voluptatum quam cum at perferendis enim. Vero dolor aut voluptatem a.', 'Voluptatem vel ut sit voluptatem. Ad enim natus omnis veniam quasi distinctio dolorem neque.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(191, 50, 22, 'Modi minima quidem expedita quisquam aut. Et officia nemo fuga ex ipsa. Facilis est sint accusantium totam. Velit quia deserunt cumque.', 'Enim omnis itaque provident ullam. Qui rerum nobis delectus fugit.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(192, 42, 72, 'Commodi et quis ut odio et libero sint. Corporis autem ad quo et perferendis reiciendis expedita. Sequi aut iusto doloremque et quis at.', 'Atque possimus iusto laboriosam illum ut. Aperiam vitae magni accusamus et enim nobis.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(193, 56, 63, 'Sed tempore ea voluptatem sed ducimus repellat. Quos at omnis ab libero doloribus. Quam est qui rerum soluta.', 'Aut esse ut fugiat minus ut rerum eum. Eum quaerat nihil provident et.', 3, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(194, 53, 82, 'Repellat vel laborum non et possimus eaque. Et ut qui voluptatem modi. Doloremque illum doloribus aperiam nihil. Unde maxime dolor quia at.', 'Qui quis excepturi magni ut. Ut dolores et dolor earum sed est eum.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(195, 58, 27, 'Velit sint esse quasi id nisi corporis quos. Voluptas rem qui at ut autem delectus.', 'Excepturi et expedita quaerat deleniti. Corporis et neque ea.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(196, 49, 51, 'Provident quis et enim temporibus sint aut molestiae. Corrupti non sapiente enim aut quia dolorum. Tenetur ducimus non numquam.', 'Qui voluptate deserunt nostrum officiis quibusdam nisi illum. Et saepe sit eaque ipsam est aliquam.', 1, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(197, 49, 40, 'Aspernatur quod beatae eligendi reiciendis voluptatem consequatur. Voluptatem sunt sint consequatur et. Consequuntur aperiam velit debitis neque.', 'Consequuntur libero sed tempore quaerat. Deleniti eveniet accusantium beatae aut fuga rerum.', 2, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(198, 49, 67, 'Odit reiciendis repudiandae nihil ea quis. Officia qui sunt non. Eum qui blanditiis corporis ipsam eum ea. Sed modi dignissimos iste ea.', 'Velit voluptatibus non porro sit eum nisi atque eos. Ut ut ea ut.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(199, 60, 46, 'Qui reiciendis est id aut porro eum. Optio qui molestiae sunt repellendus. Illo quo incidunt iste ut.', 'Veritatis non est itaque alias. Quasi commodi porro est magni doloribus deserunt.', 4, '2022-05-07 15:33:58', '2022-05-07 15:33:58', NULL),
(200, 56, 2, 'Non et aliquid iure expedita id rem et. Similique in cum perspiciatis libero beatae. Facilis at corrupti et atque voluptatem placeat ullam.', 'Pariatur neque quam est dicta excepturi. Enim eius ipsam minus officiis.', 8, '2022-05-08 15:33:58', '2022-05-07 15:33:58', NULL),
(201, 60, 46, '111111111111111111 1111111111111111111111', '2222222222222 222222222222222222222', 2, '2022-05-11 08:26:25', '2022-05-11 08:26:25', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `log_types`
--

DROP TABLE IF EXISTS `log_types`;
CREATE TABLE IF NOT EXISTS `log_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `color` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `log_types`
--

INSERT INTO `log_types` (`id`, `name`, `number`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Действие', 0, 'success', '2022-05-07 14:54:21', '2022-05-07 14:54:21', NULL),
(2, 'Ошибка', 1, 'danger', '2022-05-07 14:54:21', '2022-05-07 14:54:21', NULL),
(3, 'Предупреждение', 2, 'warning', '2022-05-07 14:54:21', '2022-05-07 14:54:21', NULL),
(4, 'Сообщение', 3, 'info', '2022-05-07 14:54:21', '2022-05-07 14:54:21', NULL),
(8, '1111', 2, 'info', '2022-05-09 16:02:21', '2022-05-09 16:02:24', '2022-05-09 16:02:24'),
(9, '1111', 4, 'info', '2022-05-09 16:06:28', '2022-05-09 16:06:28', NULL),
(10, '1111', 3, 'info', '2022-05-10 04:57:44', '2022-05-10 04:57:49', '2022-05-10 04:57:49'),
(11, '444', 4, 'info', '2022-05-10 14:40:13', '2022-05-10 14:40:17', '2022-05-10 14:40:17');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_06_083831_create_bots_table', 1),
(6, '2022_05_06_213608_create_clients_table', 2),
(7, '2022_05_06_215816_create_categories_table', 3),
(8, '2022_05_07_170449_create_logs_table', 4),
(9, '2022_05_07_170534_create_log_types_table', 4),
(10, '2022_05_09_185810_add_soft_delete_column_to_logs_table', 5),
(11, '2022_05_09_185826_add_soft_delete_column_to_log_types_table', 5),
(12, '2022_05_09_194806_add_soft_delete_column_to_clients_table', 6),
(13, '2022_05_09_220418_add_soft_delete_and_active_column_to_bots_table', 7),
(14, '2022_06_01_153156_add_telegram_account_id_column_to_clients_table', 8),
(15, '2022_06_02_081035_add_lang_to_clients_table', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anton', 'antonwo7@gmail.com', NULL, '$2y$10$O/ePVpOAV0E0MqLfK3vCWuLavzlT8IMT/H.lpVGtp.eDE6Euytr2q', NULL, '2022-05-10 13:23:21', '2022-05-10 13:23:21'),
(2, 'admin', 'antonwo700@gmail.com', '2022-06-02 09:41:15', '$2y$10$rzR4nC0Jqs4m3uJWWniLqOWtdJoeEW1zNdZurfXCvk6hyybrf0WZ6', NULL, '2022-06-02 09:41:15', '2022-06-02 09:41:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
