-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2021 г., 21:40
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

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
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `products_id`, `clients_id`, `count`) VALUES
(1, 7, 1, 1),
(2, 8, 1, 2),
(4, 3, 2, 1),
(5, 1, 1, 2),
(6, 1, 2, 1),
(7, 12, 1, 4),
(8, 9, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Столовая мебель'),
(2, 'Корпусная мебель');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`) VALUES
(1, 'Иванов И.И.'),
(2, 'Петров П.П.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `date_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `image` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Стол', 5300, 'Новинка 2020', 'img.jpg'),
(2, 'Стул', 1800, 'Стул из качественного материала', 'img.jpg'),
(3, 'Шкаф-купе', 22400, 'Новинка 2021', 'img.jpg'),
(7, 'Кровать', 15100, 'Кровать 210х180х60', 'img.jpg'),
(8, 'Стол компьютерный', 12890, 'Угловой', 'img.jpg'),
(9, 'Стол', 8400, 'Трансформер', 'img.jpg'),
(10, 'Стул', 2300, 'Со спинкой', 'img.jpg'),
(11, 'Шкаф', 12100, 'Цвет: выбеленный дуб', 'img.jpg'),
(12, 'Стол', 5300, 'Прямоугольный', 'img.jpg'),
(13, 'Стул', 1300, 'Стильный стул', 'img.jpg'),
(14, 'Шкаф-купе', 54100, '3-х створчатый, с зеркалами', 'img.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id` (`clients_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`products_id`),
  ADD KEY `categories_id` (`categories_id`),
  ADD KEY `clients_id` (`clients_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
