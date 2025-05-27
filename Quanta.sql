-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 12 2025 г., 06:05
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
-- База данных: `Quanta`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Friends`
--

CREATE TABLE `Friends` (
  `Friend_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `User_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Friend_requests`
--

CREATE TABLE `Friend_requests` (
  `Request_id` int(11) NOT NULL,
  `Friend_id` int(11) NOT NULL,
  `user_inviter` int(11) NOT NULL,
  `user_invited` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `Massage_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `User_id2` int(11) NOT NULL,
  `Message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date of birth` date NOT NULL,
  `Hometown` varchar(50) NOT NULL,
  `Languages` varchar(50) NOT NULL,
  `Educational institution` varchar(50) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Lastname` varchar(25) NOT NULL,
  `status_online` int(1) NOT NULL,
  `User_status` varchar(100) NOT NULL,
  `Avatar_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`UserID`, `Login`, `Password`, `Email`, `Date of birth`, `Hometown`, `Languages`, `Educational institution`, `Username`, `Lastname`, `status_online`, `User_status`, `Avatar_photo`) VALUES
(1, 'qqq', '222', 'masanaguy@gmail.com', '2015-05-13', 'kemerovo', 'Russian', 'SPT', 'Maks', 'Ignatiev', 0, 'qwqwqwqwqqwqqwq', '');

-- --------------------------------------------------------

--
-- Структура таблицы `User_Photos`
--

CREATE TABLE `User_Photos` (
  `Photo_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Friends`
--
ALTER TABLE `Friends`
  ADD PRIMARY KEY (`Friend_id`),
  ADD KEY `User_id` (`User_id`,`User_id2`),
  ADD KEY `User_id2` (`User_id2`);

--
-- Индексы таблицы `Friend_requests`
--
ALTER TABLE `Friend_requests`
  ADD PRIMARY KEY (`Request_id`),
  ADD KEY `Friend_id` (`Friend_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Massage_id`),
  ADD KEY `User_id` (`User_id`,`User_id2`),
  ADD KEY `User_id2` (`User_id2`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- Индексы таблицы `User_Photos`
--
ALTER TABLE `User_Photos`
  ADD PRIMARY KEY (`Photo_id`),
  ADD KEY `User_id` (`User_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Friends`
--
ALTER TABLE `Friends`
  MODIFY `Friend_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Friend_requests`
--
ALTER TABLE `Friend_requests`
  MODIFY `Request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `Massage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `User_Photos`
--
ALTER TABLE `User_Photos`
  MODIFY `Photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Friends`
--
ALTER TABLE `Friends`
  ADD CONSTRAINT `Friends_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `Friends_ibfk_2` FOREIGN KEY (`User_id2`) REFERENCES `Users` (`UserID`);

--
-- Ограничения внешнего ключа таблицы `Friend_requests`
--
ALTER TABLE `Friend_requests`
  ADD CONSTRAINT `Friend_requests_ibfk_1` FOREIGN KEY (`Friend_id`) REFERENCES `Friends` (`Friend_id`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`User_id2`) REFERENCES `Users` (`UserID`);

--
-- Ограничения внешнего ключа таблицы `User_Photos`
--
ALTER TABLE `User_Photos`
  ADD CONSTRAINT `User_Photos_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
