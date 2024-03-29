-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 24 2023 г., 02:55
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
(3, 'American Airlines', 'Fort Worth, TX'),
(5, 'Аэрофлот', 'Москва');

-- --------------------------------------------------------

--
-- Структура таблицы `buyticket`
--

CREATE TABLE `buyticket` (
  `BuyTicketID` int(11) NOT NULL,
  `Pass_number` bigint(20) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `CashierID` int(11) NOT NULL,
  `TicketID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `buyticket`
--

INSERT INTO `buyticket` (`BuyTicketID`, `Pass_number`, `CompanyID`, `CashierID`, `TicketID`) VALUES
(1, 2147483647, 2, 1, 1),
(2, 2147483647, 1, 1, 1),
(3, 2147483647, 1, 1, 2),
(4, 2147483648, 3, 1, 1),
(5, 2147483648, 3, 1, 1);

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
(3, 'Test', 2);

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

--
-- Дамп данных таблицы `cashier`
--

INSERT INTO `cashier` (`CashierID`, `Surname`, `Name`, `Patronymic`, `CashID`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', 1),
(3, 'dfg', 'dfg', 'dfg', 2),
(4, 'sdf', 'sdf', 'sdf', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `passport_number` bigint(10) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`passport_number`, `last_name`, `first_name`, `patronymic`) VALUES
(2147483647, 'Johnson', 'David', 'Michael'),
(2147483648, 'Smith', 'Jane', 'Marie');

-- --------------------------------------------------------

--
-- Структура таблицы `coupon`
--

CREATE TABLE `coupon` (
  `CouponID` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Ticket_price` float NOT NULL,
  `direction` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `coupon`
--

INSERT INTO `coupon` (`CouponID`, `Type`, `Ticket_price`, `direction`) VALUES
(1, 'Student Discount', 10.5, 'moscow-paris'),
(2, 'Discount', 15, 'moscow-paris'),
(3, 'Regular', 20, 'moscow-paris'),
(4, 'Test', 3, 'moscow-paris');

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
-- Индексы таблицы `buyticket`
--
ALTER TABLE `buyticket`
  ADD PRIMARY KEY (`BuyTicketID`),
  ADD KEY `Pass_number` (`Pass_number`),
  ADD KEY `CompanyID` (`CompanyID`),
  ADD KEY `CashierID` (`CashierID`),
  ADD KEY `TicketID` (`TicketID`);

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
  ADD PRIMARY KEY (`passport_number`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `buyticket`
--
ALTER TABLE `buyticket`
  MODIFY `BuyTicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `cash`
--
ALTER TABLE `cash`
  MODIFY `CashID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `cashier`
--
ALTER TABLE `cashier`
  MODIFY `CashierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `coupon`
--
ALTER TABLE `coupon`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `logintable`
--
ALTER TABLE `logintable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `Ticket_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `buyticket`
--
ALTER TABLE `buyticket`
  ADD CONSTRAINT `buyticket_ibfk_1` FOREIGN KEY (`Pass_number`) REFERENCES `client` (`passport_number`),
  ADD CONSTRAINT `buyticket_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `airline` (`ID`),
  ADD CONSTRAINT `buyticket_ibfk_3` FOREIGN KEY (`CashierID`) REFERENCES `cashier` (`CashierID`),
  ADD CONSTRAINT `buyticket_ibfk_4` FOREIGN KEY (`TicketID`) REFERENCES `ticket` (`Ticket_code`);

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
