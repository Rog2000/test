-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 18 2020 г., 12:53
-- Версия сервера: 5.6.50-cll-lve
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rog20921_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(2) NOT NULL,
  `contact_id` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `contact` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `contact_id`, `name`, `contact`) VALUES
(1, 'skype', 'skype', 'pirozhenko_i'),
(2, 'life', 'моб оператор Life', '+380631317848'),
(3, 'kiev', 'мобильный оператор kyivstar', '+380985439998'),
(4, 'mail', 'почта', 'pirozhenkoivan2000@gmail.com'),
(5, 'instagram', 'instagram', 'instagram_чтототам'),
(6, 'facebook', 'facebook', 'https://www.facebook.com/pirozhenko.i'),
(7, 'fire', 'при пожаре', '101'),
(8, 'aviation', 'авиация', '044-351-55-66'),
(9, 'pistols', 'склад тяжелых пистолетов', '+380663211321'),
(10, 'boat', 'база торпедных катеров', '+380504142218'),
(11, 'laundry', 'прачечная', '0567924290'),
(12, 'culture', 'управление культуры', '0532561630');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
