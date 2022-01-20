-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2022 г., 11:31
-- Версия сервера: 5.5.62
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `article` text COLLATE utf8mb4_unicode_ci,
  `brand` text COLLATE utf8mb4_unicode_ci,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime NOT NULL,
  `size` float DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `accessories`
--

INSERT INTO `accessories` (`id`, `title`, `short_text`, `price`, `article`, `brand`, `datetime`, `datetime_lastedit`, `size`, `photo`, `user_id`) VALUES
(1, 'ШКАРПЕТКИ NIKE U NK EVERYDAY LTWT CREW 3PR 901', '<p>Найкращі шкарпетки.</p>', 340, '<p><strong>SX7676-901</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 06:05:34', '2022-01-20 06:05:34', 4, '1_61e8d17e3954b', 9),
(2, 'ВОРОТАРСЬКІ РУКАВИЦІ NIKE GK VAPOR GRIP 3', '<p>One of the best thing.</p>', 2190, '<p><strong>GS0352-702</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 06:07:48', '2022-01-20 06:07:50', 5, '2_61e8d20556482', 9),
(3, 'ФУТБОЛЬНИЙ М`ЯЧ PUMA LALIGA 1 ACCELERATE', '<p>Один з найкращих брендів та футбольних м\'ячівю</p>', 2590, '<p><strong>083523-01</strong></p>', '<p><strong>Puma</strong></p>', '2022-01-20 06:11:18', '2022-01-20 06:11:18', 5, '3_61e8d2d672a9a', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tovar_id` int(11) DEFAULT NULL,
  `tovar_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tovar_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tovar_price` float DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `tovar_size` float DEFAULT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tovar_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `clothing`
--

CREATE TABLE `clothing` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `article` text COLLATE utf8mb4_unicode_ci,
  `brand` text COLLATE utf8mb4_unicode_ci,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime NOT NULL,
  `size` float DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clothing`
--

INSERT INTO `clothing` (`id`, `title`, `short_text`, `price`, `article`, `brand`, `datetime`, `datetime_lastedit`, `size`, `photo`, `user_id`) VALUES
(1, 'ТЕРМОБІЛИЗНА NIKE DRY PARK FIRST', '<p>Термобілизна Nike. Вважається одна з найкращих термобілизн.</p>', 650, '<p><strong>AV2609-616</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:56:22', '2022-01-20 05:56:22', 55, '1_61e8cf5670936', 9),
(2, 'КУРТКА NIKE M NK DRY ACDMY18 SDF JKT 010', '<p>Куртка Nike Super. Крута річ, особливо взимку.</p>', 2990, '<p><strong>893798-010</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:58:36', '2022-01-20 05:58:36', 70, '2_61e8cfdc43229', 9),
(3, 'ШТАНИ NIKE NSW TECH FLEECE 010', '<p>Спортивні штани Nike Professional, крута річ до речі.</p>', 2250, '<p><strong>CU4501-010</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 06:01:06', '2022-01-20 06:01:06', 45, '3_61e8d07272f3d', 9),
(4, 'ТЕРМОБІЛИЗНА NIKE PRO TOP LS 480', '<p>Термобілизна Nike Proffessional. Спортивна білизна для залу та будь-яких тренувань.&nbsp;</p>', 850, '<p><strong>838079-480</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 06:03:31', '2022-01-20 06:03:31', 70, '4_61e8d103671a8', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `footballshoes`
--

CREATE TABLE `footballshoes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `article` text COLLATE utf8mb4_unicode_ci,
  `brand` text COLLATE utf8mb4_unicode_ci,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime NOT NULL,
  `size` float DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `footballshoes`
--

INSERT INTO `footballshoes` (`id`, `title`, `short_text`, `price`, `article`, `brand`, `datetime`, `datetime_lastedit`, `size`, `photo`, `user_id`) VALUES
(1, 'ФУТБОЛЬНІ БУТСИ NIKE MERCURIAL SUPERFLY 6 ELITE ', '<p>Футбольні бутси Nike Mercurial Superfly для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 4990, '<p><strong>AH7365-070</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:08:45', '2022-01-20 05:33:46', 42, '1_61e8c42d90444', 9),
(2, 'ФУТБОЛЬНІ БУТСИ NIKE MERCURIAL SUPERFLY 8 ELITE ', '<p>Футбольні бутси Nike Mercurial Superfly для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 5990, '<p><strong>CV0958-574</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:15:27', '2022-01-20 05:31:52', 45, '2_61e8c5bf62275', 9),
(3, 'ФУТБОЛЬНІ БУТСИ NIKE SUPERFLY 8 ELITE FG 760', '<p>Футбольні бутси Nike Mercurial Superfly для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 4890, '<p><strong>CV0958-760</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:30:32', '2022-01-20 05:30:33', 40, '3_61e8c9486c5c5', 9),
(4, 'ФУТБОЛЬНІ БУТСИ ADIDAS COPA 20.1 SG 891', '<p>Adidas Copa 3.0 для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 3890, '<p><strong>EH0891</strong></p>', '<p><strong>Adidas</strong></p>', '2022-01-20 05:36:18', '2022-01-20 05:36:19', 40, '4_61e8caa2e7fed', 9),
(5, 'ФУТБОЛЬНІ БУТСИ ADIDAS COPA 20.1 FG 885', '<p>Футбольні бутси Adidas Copa 3.0 для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 3200, '<p><strong>EH0885</strong></p>', '<p><strong>Adidas</strong></p>', '2022-01-20 05:38:17', '2022-01-20 05:38:17', 41, '5_61e8cb194f679', 9),
(6, 'ФУТБОЛЬНІ БУТСИ ADIDAS COPA SENSE.1 FG 498', '<p>Футбольні бутси Adidas Copa 3.0 для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 4390, '<p><strong>FW6498</strong></p>', '<p><strong>Adidas</strong></p>', '2022-01-20 05:39:58', '2022-01-20 05:39:59', 44, '6_61e8cb7eebe75', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `kidsfootballshoes`
--

CREATE TABLE `kidsfootballshoes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `article` text COLLATE utf8mb4_unicode_ci,
  `brand` text COLLATE utf8mb4_unicode_ci,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime NOT NULL,
  `size` float DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kidsfootballshoes`
--

INSERT INTO `kidsfootballshoes` (`id`, `title`, `short_text`, `price`, `article`, `brand`, `datetime`, `datetime_lastedit`, `size`, `photo`, `user_id`) VALUES
(1, 'ДИТЯЧІ БУТСИ NIKE TIEMPO LEGEND VII ACC FG 002', '<p>Футбольні бутси Adidas Copa 3.0 для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 2890, '<p><strong>897804-002</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:45:11', '2022-01-20 05:45:11', 37, '1_61e8ccb741c80', 9),
(2, 'ДИТЯЧІ БУТСИ NIKE DREAM SPEED MERCURIAL SUPERFLY', '<p>Футбольні бутси Nike Copa 3.0 для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 1890, '<p><strong>BQ5482-703</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:47:31', '2022-01-20 05:48:28', 38, '2_61e8cd441985f', 9),
(3, 'ДИТЯЧІ ФУТЗАЛКИ NIKE JR PHANTOM', '<p>Футбольні бутси Nike Copa 3.0 для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 2100, '<p><strong>AO0372-717</strong></p>', '<p><strong>Nike</strong></p>', '2022-01-20 05:50:41', '2022-01-20 05:50:41', 36, '3_61e8ce0133554', 9),
(4, 'ДИТЯЧІ БУТСИ ADIDAS PREDATOR FREAK.3 ', '<p>Футбольні бутси Adidas Copa 3.0 для полів з натуральним та синтетичним газоном представлені в кольорах нової колекції KM.</p><p>Бутси мають цілісну конструкцію верху, де матеріалом є легкий та м\'який синтетичний матеріал з рельєфною мікротекстурою, що забезпечує гнучке прилягання верху до ноги, комфортну посадку та відмінне почуття м\'яча.</p>', 2250, '<p><strong>FY6282</strong></p>', '<p><strong>Adidas</strong></p>', '2022-01-20 05:53:22', '2022-01-20 05:53:23', 38, '4_61e8cea314632', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Новини';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `short_text`, `text`, `datetime`, `datetime_lastedit`, `photo`, `user_id`) VALUES
(1, 'Розпродаж до  70%', '<p><strong>Тільки у інтернет-магазині FootballFan.Shop.</strong></p>', '<h3>Знижки на всі товари саме сьогодні.</h3><h3>Не зволікай, та бери також участь у конкурсі&nbsp;</h3><h3>для того щоб виграти будь-який товар інтернет-магазину <i><strong>FootballFan.Shop</strong></i></h3><p>&nbsp;</p><h4>Особливості товару:</h4><h4>М\'якість та тепло.</h4><h4><br>Легкий тканий матеріал із синтетичним наповнювачем забезпечує тепло.</h4><h4><br>Регульована посадка.</h4><h4><br>Блискавка на всю довжину і каптур захищають від холоду.</h4><h4><br>Стандартний крій для зручної вільної посадки.</h4><h4><br>Передні кишені.</h4><h4><br>Пришита іменна етикетка всередині.</h4><h4><br>Машинне прання.</h4><p>&nbsp;</p><p>&nbsp;</p><h2><strong>Поспішай !!! Акція трива до 20.01.22</strong></h2>', '2022-01-20 06:20:56', '2022-01-20 06:20:57', '1_61e8d5191c3de', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tovar_id` int(11) DEFAULT NULL,
  `tovar_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tovar_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tovar_price` float DEFAULT NULL,
  `tovar_size` float DEFAULT NULL,
  `tovar_count` int(11) DEFAULT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_lastname`, `user_firstname`, `tovar_id`, `tovar_title`, `tovar_photo`, `tovar_price`, `tovar_size`, `tovar_count`, `name_category`, `datetime`) VALUES
(1, 10, 'Грушевицький', 'Сергій', 2, 'ФУТБОЛЬНІ БУТСИ NIKE MERCURIAL SUPERFLY 8 ELITE ', '2_61e8c5bf62275', 5990, 45, 1, 'footballshoes', '2022-01-20 10:44:11');

-- --------------------------------------------------------

--
-- Структура таблицы `response_for_accessories`
--

CREATE TABLE `response_for_accessories` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `tovar_id` int(11) DEFAULT NULL,
  `tovar_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `response_for_clothing`
--

CREATE TABLE `response_for_clothing` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `tovar_id` int(11) DEFAULT NULL,
  `tovar_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `response_for_football_shoes`
--

CREATE TABLE `response_for_football_shoes` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `tovar_id` int(11) NOT NULL,
  `tovar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `response_for_football_shoes`
--

INSERT INTO `response_for_football_shoes` (`id`, `text`, `user_id`, `user_lastname`, `user_firstname`, `datetime_lastedit`, `datetime`, `tovar_id`, `tovar_title`) VALUES
(1, '<h4>Якість топ !!!</h4>', 9, 'Груницький', 'Дмитро', NULL, '2022-01-20 05:13:10', 1, 'ФУТБОЛЬНІ БУТСИ NIKE MERCURIALSUPERFLY 6 ELITE FG 070');

-- --------------------------------------------------------

--
-- Структура таблицы `response_for_kids_football_shoes`
--

CREATE TABLE `response_for_kids_football_shoes` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `tovar_id` int(11) DEFAULT NULL,
  `tovar_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Логін',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пароль',
  `access` int(11) NOT NULL DEFAULT '0',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Прізвище',
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ім''я'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `access`, `lastname`, `firstname`) VALUES
(9, 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', 0, 'Груницький', 'Дмитро'),
(10, 'dima.grunitsky@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Грушевицький', 'Сергій'),
(11, 'dariaishchuk@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 'Іщук', 'Дарія'),
(12, 'melon22888@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 'Павлушин', 'Павло');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clothing`
--
ALTER TABLE `clothing`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `footballshoes`
--
ALTER TABLE `footballshoes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kidsfootballshoes`
--
ALTER TABLE `kidsfootballshoes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `response_for_accessories`
--
ALTER TABLE `response_for_accessories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `response_for_clothing`
--
ALTER TABLE `response_for_clothing`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `response_for_football_shoes`
--
ALTER TABLE `response_for_football_shoes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `response_for_kids_football_shoes`
--
ALTER TABLE `response_for_kids_football_shoes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `clothing`
--
ALTER TABLE `clothing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `footballshoes`
--
ALTER TABLE `footballshoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `kidsfootballshoes`
--
ALTER TABLE `kidsfootballshoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `response_for_accessories`
--
ALTER TABLE `response_for_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `response_for_clothing`
--
ALTER TABLE `response_for_clothing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `response_for_football_shoes`
--
ALTER TABLE `response_for_football_shoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `response_for_kids_football_shoes`
--
ALTER TABLE `response_for_kids_football_shoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
