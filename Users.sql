-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mySQL-8.0
-- Время создания: Май 25 2025 г., 03:42
-- Версия сервера: 8.0.35
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Chats`
--

CREATE TABLE `Chats` (
  `ChatID` int NOT NULL,
  `UserID` int NOT NULL,
  `UserID2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Chats`
--

INSERT INTO `Chats` (`ChatID`, `UserID`, `UserID2`) VALUES
(1, 1, 24);

-- --------------------------------------------------------

--
-- Структура таблицы `Friends`
--

CREATE TABLE `Friends` (
  `Friend_id` int NOT NULL,
  `User_id` int NOT NULL,
  `User_id2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Friends`
--

INSERT INTO `Friends` (`Friend_id`, `User_id`, `User_id2`) VALUES
(11, 1, 34),
(10, 26, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Friend_requests`
--

CREATE TABLE `Friend_requests` (
  `Request_id` int NOT NULL,
  `user_inviter` int NOT NULL,
  `user_invited` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Friend_requests`
--

INSERT INTO `Friend_requests` (`Request_id`, `user_inviter`, `user_invited`) VALUES
(10, 1, 24);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `Massage_id` int NOT NULL,
  `ChatID` int NOT NULL,
  `Sender` int NOT NULL,
  `Recipient` int NOT NULL,
  `Message` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_message` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `UserID` int NOT NULL,
  `Login` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_of_birth` date DEFAULT NULL,
  `Hometown` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Languages` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Educational_institution` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Lastname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_online` int DEFAULT NULL,
  `User_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Avatar_photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`UserID`, `Login`, `Password`, `Email`, `Date_of_birth`, `Hometown`, `Languages`, `Educational_institution`, `Username`, `Lastname`, `status_online`, `User_status`, `Avatar_photo`) VALUES
(1, 'qqq', '$2y$10$0mLVVfnLdMVywwn1.ghTx.GkP0CvpyqVVASVqwjaiE2wF/PmYwHsG', 'masanaguy@gmail.com', '2007-03-28', 'kemerovo', 'Russian', 'SPT', 'Maks', 'Ignatiev', 0, 'ebanyi rot', 'photo.jpg'),
(24, 'klim', '$2y$10$yCS/rNNHXDVqH.BUq5ZpQObcsalokf8e92IJhyDBFXVZZgDIpuYIS', 'klim@gmail.com', '2007-02-05', NULL, NULL, NULL, 'Klim', 'kiltau', NULL, NULL, NULL),
(25, 'gleb', '$2y$10$mIzGSW0dcF3nuQKaLHd51eQEWhRN2EkLE8KPUz0bPfyfkJ6PYQbsC', 'gleb@gmail.com', '2007-09-13', NULL, NULL, NULL, 'Gleb', 'Vershinin', NULL, NULL, NULL),
(26, 'kirill', '$2y$10$Olakpgd1lgaNcwmaRJdth.dYS8HUkdpRkycxMi3ZsM3BTDFjcUKXe', 'kirill@gmail.com', '2007-12-26', NULL, NULL, NULL, 'Kirill', 'Tarasenko', NULL, NULL, NULL),
(27, 'semen', '$2y$10$4/0baZl17ktK1Jk9Mv9QoO43SoelqbuhhmHKG5hL4IP86Q1j6JX8a', 'semen@gmail.com', '2007-12-01', NULL, NULL, NULL, 'Semen', 'Kyrchenko', NULL, NULL, NULL),
(34, 'denis', '$2y$10$QkcKeCVjx6ZX8qYYOE1Ny.qLaCTZMLLzksNgZjpnUePdfCCFyH6c6', 'denis@gmail.com', '2007-02-28', NULL, NULL, NULL, 'Denis', 'Bytnikov', NULL, NULL, NULL),
(35, 'slava', '$2y$10$7oAe.4DpIiaS9HrfP7xVpuuIwlBvx6yzPmnD5UHbX0Qk./1vUp9G2', 'slava@gmail.com', '2007-04-21', NULL, NULL, NULL, 'Slava', 'Baykalov', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `User_Photos`
--

CREATE TABLE `User_Photos` (
  `Photo_id` int NOT NULL,
  `User_id` int NOT NULL,
  `Photo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Chats`
--
ALTER TABLE `Chats`
  ADD PRIMARY KEY (`ChatID`),
  ADD KEY `UserID` (`UserID`,`UserID2`),
  ADD KEY `UserID2` (`UserID2`);

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
  ADD KEY `user_inviter` (`user_inviter`,`user_invited`),
  ADD KEY `user_invited` (`user_invited`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Massage_id`),
  ADD KEY `User_id` (`Sender`,`Recipient`),
  ADD KEY `User_id2` (`Recipient`),
  ADD KEY `ChatID` (`ChatID`);

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
-- AUTO_INCREMENT для таблицы `Chats`
--
ALTER TABLE `Chats`
  MODIFY `ChatID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Friends`
--
ALTER TABLE `Friends`
  MODIFY `Friend_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Friend_requests`
--
ALTER TABLE `Friend_requests`
  MODIFY `Request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `Massage_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `User_Photos`
--
ALTER TABLE `User_Photos`
  MODIFY `Photo_id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Chats`
--
ALTER TABLE `Chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`UserID2`) REFERENCES `Users` (`UserID`);

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
  ADD CONSTRAINT `friend_requests_ibfk_1` FOREIGN KEY (`user_inviter`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `friend_requests_ibfk_2` FOREIGN KEY (`user_invited`) REFERENCES `Users` (`UserID`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`Sender`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`Recipient`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`ChatID`) REFERENCES `Chats` (`ChatID`);

--
-- Ограничения внешнего ключа таблицы `User_Photos`
--
ALTER TABLE `User_Photos`
  ADD CONSTRAINT `User_Photos_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
