-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 03 2017 г., 16:07
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `qatest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE `ads` (
  `id` int(16) NOT NULL,
  `user_id` int(64) NOT NULL,
  `region` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `mileage` decimal(10,2) NOT NULL,
  `masters` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `region`, `city`, `brand`, `model`, `amount`, `mileage`, `masters`, `price`, `created_at`) VALUES
(31, 1, 'Запорожская', 'Запорожье', 'BMW', 'X6', '3.80', '12000.00', 1, 42000, '2017-04-02 06:55:24'),
(32, 1, 'Одесская', 'Одесса', 'Audi', 'A8', '3.20', '5000.00', 1, 32000, '2017-04-02 06:56:54'),
(33, 1, 'Киевская', 'Чернигов', 'Audi', 'Q7', '4.20', '23000.00', 2, 46000, '2017-04-02 06:58:12'),
(34, 2, 'Харьковская', 'Харьков', 'Mercedes Bens', 'AMG', '3.80', '1200.00', 1, 68000, '2017-04-02 09:58:31'),
(40, 2, 'Львовская', 'Львов', 'Hummer', 'H2', '3.70', '1000.00', 2, 28000, '2017-04-02 10:13:58'),
(46, 2, 'Запорожская', 'Запорожье', 'ВАЗ', '2101', '1.00', '980000.00', 3, 5200, '2017-04-03 06:04:49'),
(47, 3, 'Николаевская', 'Николаев', 'Wolksvagen', 'Golf', '2.00', '10000.00', 2, 10000, '2017-04-03 06:10:59'),
(48, 3, 'Киевская', 'Киев', 'Wolksvagen', 'Passat CC', '2.20', '12000.00', 1, 16500, '2017-04-03 06:12:45'),
(49, 3, 'Запорожская', 'Запорожье', 'Kia', 'Ceed', '1.80', '35000.00', 1, 13000, '2017-04-03 06:14:43');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `path` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `ads_id`, `path`) VALUES
(14, 31, 'img/avto/p1751117-1421158833.jpeg'),
(15, 32, 'img/avto/16-audi-a8-843-photo-668196-s-original.jpg'),
(16, 33, 'img/avto/p1751842-1430376648.jpeg'),
(17, 34, 'img/avto/weistec-amg-gts-01.jpg'),
(23, 40, 'img/avto/hummer-h2-06.jpg'),
(34, 46, 'img/avto/161720-43220444-src-u9faef.jpg'),
(35, 47, 'img/avto/volkswagen-golf-03.jpg'),
(36, 48, 'img/avto/vwps133.jpg'),
(37, 49, 'img/avto/jd_pe_5dr_exm1_every_detail_perfected_1920x1080.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'mail@gmail.com', '$2y$10$eJhDdCFcvJ/IbnHkfoFzG.NnkWutOvAy51Gw3f.EfvtvznltkmO06', '2017-04-03 13:06:52'),
(2, 'mail@bigmir.net', '$2y$10$aTj4lx0XzE/czbbN7ZIRhO7Zsl3OVsFKkt5Zkgv0NnxBKe5D9SJi2', '2017-04-03 13:06:59'),
(3, 'mail@mail.ru', '$2y$10$0173ZYD8y.Dzn6El.OUFruPIGTOfpTNfND2jM9a/jmapHelHYaC26', '2017-04-03 06:08:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
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
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
