-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 19 2021 г., 17:58
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(35) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cookie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `cookie`) VALUES
(6, 'admin', '$2y$10$3dRqW1koGxQbzzVZRXwDeeOCEuZz48twVhJUbqNGs5yLnlzOcmrL6', 'asdfghj'),
(7, 'manager', '$2y$10$jV1UxaIMfho5pWnFHarFbunaRFS9ujPC7AaOUK6nQEInTVnvEU4wy', NULL),
(8, 'ivan', '$2y$10$WRwZ6Hr/Tc6o.hxqVpFv7OnIndlyb7S2mfGpjnMM8BtFDKUfr/wdS', NULL),
(9, 'alex', '$2y$10$KZG3c2Rn3.QCLXL2dwvKX.pcAsgo9oWWpOzQm4Mz2K8DV1AxdPSK6', NULL),
(10, 'elena', '$2y$10$FmVRf.92pFfPWcNH0IHOLOvU0Jx0flpXT7yD7zzS7BfMEsDwPGbyy', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
