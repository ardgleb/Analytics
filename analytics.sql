-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 24 2024 г., 08:41
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `analytics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `company` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`login`, `password`, `company`, `name`, `email`) VALUES
('Roza', 'Roza123', 'ООО Ромашка', 'ООО Роза', 'roza123@example.com'),
('Tulpan', 'Tulpan123', 'ООО Ромашка', 'ООО Тюльпан', 'tulpan123@example.com'),
('Eda', 'Eda123', 'ООО Бургер', 'ООО Еда', 'eda123@example.com'),
('Napitki', 'napitki123', 'ООО Бургер', 'ООО Напитки', 'napitki123@example.com');

-- --------------------------------------------------------

--
-- Структура таблицы `acc_admin`
--

CREATE TABLE `acc_admin` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `acc_admin`
--

INSERT INTO `acc_admin` (`login`, `password`, `name`) VALUES
('Romashka', 'Romashka123', 'ООО Ромашка'),
('Burger', 'Burger123', 'ООО Бургер');

-- --------------------------------------------------------

--
-- Структура таблицы `forms`
--

CREATE TABLE `forms` (
  `name` text NOT NULL,
  `number` int(11) NOT NULL,
  `company` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
