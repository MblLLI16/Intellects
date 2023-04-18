-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 18 2023 г., 03:22
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ticketsalesdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `airline`
--

CREATE TABLE `airline` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `airline`
--

INSERT INTO `airline` (`ID`, `Name`, `Address`) VALUES
(1, 'Delta Airlines', 'Atlanta, GA'),
(2, 'United Airlines', 'Chicago, IL'),
(3, 'American Airlines', 'Fort Worth, TX');

-- --------------------------------------------------------

--
-- Структура таблицы `cash`
--

CREATE TABLE `cash` (
  `CashID` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Cash_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cash`
--

INSERT INTO `cash` (`CashID`, `Address`, `Cash_number`) VALUES
(1, '123 Main St.', 100),
(2, '456 Broad St.', 200),
(3, '789 Park Ave.', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `cashier`
--

CREATE TABLE `cashier` (
  `CashierID` int(11) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Patronymic` varchar(50) DEFAULT NULL,
  `CashID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `passport_number` int(10) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`ClientID`, `passport_number`, `last_name`, `first_name`, `patronymic`) VALUES
(2, 2147483647, 'Smith', 'Jane', 'Marie'),
(3, 2147483647, 'Johnson', 'David', 'Michael'),
(5, 0, 'Doe', 'Smith', 'Michael'),
(13, 22, 's', 's', 's'),
(16, 3453, 'вапвап', 'вапв', 'вап');

-- --------------------------------------------------------

--
-- Структура таблицы `coupon`
--

CREATE TABLE `coupon` (
  `CouponID` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Ticket_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `coupon`
--

INSERT INTO `coupon` (`CouponID`, `Type`, `Ticket_price`) VALUES
(1, 'Student Discount', 10.5),
(2, 'Discount', 15),
(3, 'Regular', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `logintable`
--

CREATE TABLE `logintable` (
  `ID` int(11) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `logintable`
--

INSERT INTO `logintable` (`ID`, `Login`, `Password`) VALUES
(1, 'user1', 'password1'),
(2, 'user2', 'password2'),
(3, 'user3', 'password3');

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `Ticket_code` int(11) NOT NULL,
  `CouponID` int(11) DEFAULT NULL,
  `Date_of_sale` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`Ticket_code`, `CouponID`, `Date_of_sale`) VALUES
(1, 1, '2023-04-10'),
(2, 2, '2023-04-09'),
(3, 3, '2023-04-08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`CashID`);

--
-- Индексы таблицы `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`CashierID`),
  ADD KEY `CashID` (`CashID`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Индексы таблицы `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`CouponID`);

--
-- Индексы таблицы `logintable`
--
ALTER TABLE `logintable`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`Ticket_code`),
  ADD KEY `CouponID` (`CouponID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `airline`
--
ALTER TABLE `airline`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `cash`
--
ALTER TABLE `cash`
  MODIFY `CashID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `cashier`
--
ALTER TABLE `cashier`
  MODIFY `CashierID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `coupon`
--
ALTER TABLE `coupon`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `logintable`
--
ALTER TABLE `logintable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `Ticket_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cashier`
--
ALTER TABLE `cashier`
  ADD CONSTRAINT `cashier_ibfk_1` FOREIGN KEY (`CashID`) REFERENCES `cash` (`CashID`);

--
-- Ограничения внешнего ключа таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`CouponID`) REFERENCES `coupon` (`CouponID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
