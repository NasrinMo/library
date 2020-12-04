-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 06:48 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` text,
  `lang` varchar(2) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imageUrl` varchar(255) DEFAULT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `writer`, `type`, `description`, `lang`, `update_at`, `create_at`, `imageUrl`, `year`) VALUES
(1, 'Miserable1', 'Victor Hugo', 'novel', 'it\'s all about Miserable         ', 'en', '2020-09-20 17:56:43', '2020-08-11 22:11:20', NULL, 1900),
(2, 'Me before You', 'Samuel Bakt', 'novel', 'it is romantic novel     ', 'en', '2020-09-17 19:07:59', '2020-08-13 19:21:56', NULL, 2001),
(3, 'English wife1', 'Miss jonthon', 'novel', 'nice book  ', NULL, '2020-09-17 19:36:26', '2020-08-25 20:22:12', NULL, 3000),
(4, 'success ', 'nasrin mohamadi', 'historic', 'ededewdewdew', NULL, '2020-09-17 19:10:37', '2020-09-02 20:22:41', NULL, 2015),
(13, 'sql mic', 'bahram afshari', 'sience', 'sss ', NULL, '2020-09-17 19:10:43', '2020-09-14 20:37:54', NULL, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `books_translators`
--

CREATE TABLE `books_translators` (
  `id_book` int(6) NOT NULL,
  `id_translator` int(6) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_translators`
--

INSERT INTO `books_translators` (`id_book`, `id_translator`, `update_at`, `create_at`) VALUES
(1, 19, '2020-09-20 18:23:50', '2020-09-20 18:23:50'),
(1, 47, '2020-09-20 17:56:43', '2020-09-20 17:56:43'),
(3, 20, '2020-09-17 19:36:26', '2020-09-17 19:36:26'),
(4, 31, '2020-09-02 21:21:36', '2020-09-02 21:21:36'),
(4, 47, '2020-09-14 16:06:17', '2020-09-14 16:06:17'),
(4, 80, '2020-09-14 20:49:28', '2020-09-14 20:49:28'),
(13, 47, '2020-09-14 20:38:21', '2020-09-14 20:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `translators`
--

CREATE TABLE `translators` (
  `id` int(6) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `description` text,
  `lang` varchar(2) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `translators`
--

INSERT INTO `translators` (`id`, `firstName`, `lastName`, `description`, `lang`, `update_at`, `create_at`) VALUES
(19, 'pooyaa', 'farhadi', 'it is about pouya farhadi                    ', NULL, '2020-09-20 18:23:50', '2020-08-18 22:05:42'),
(20, 'zabih', 'mansoriuuuuu', 'zabihhhh                      ', NULL, '2020-08-26 23:33:32', '2020-08-19 19:54:22'),
(31, 'Hasti', 'Mahdavi', 'she is so young ', NULL, '2020-09-02 21:21:36', '2020-08-27 20:03:51'),
(47, 'Ramin', 'Jormozeh', 'sdasdasd', NULL, '2020-09-02 20:02:42', '2020-09-02 20:02:42'),
(53, 'Raminds', 'ds', 'ss', NULL, '2020-09-02 20:28:20', '2020-09-02 20:28:20'),
(80, 'babak', 'sahraee', 'sahaaaa', NULL, '2020-09-14 20:49:28', '2020-09-14 20:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` varchar(20) DEFAULT 'user',
  `imageUrl` varchar(255) NOT NULL,
  `tokenPassword` varchar(32) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tokenAccess` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `type`, `imageUrl`, `tokenPassword`, `update_at`, `create_at`, `tokenAccess`) VALUES
(8, 'raminn', 'jormoce', 'ramin.jorboze@gmail.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'user', '', '', '2020-09-20 18:54:58', '2020-09-03 21:14:01', NULL),
(9, 'nasrin', 'mohamadi', 'nsn.mohamadi@gmail.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'user', '', '', '2020-09-20 17:44:37', '2020-09-03 21:14:19', NULL),
(21, 'admin', 'a', 'admin@yahoo.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'admin', '', '', '2020-09-20 17:44:45', '2020-09-09 21:40:35', NULL),
(22, 'superAdmin', 's', 'dd@yahoo.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'superAdmin', '', '', '2020-09-20 19:01:44', '2020-09-09 21:40:55', NULL),
(25, 'shahla', 'afkari', 'shahla@yahoo.com', 'R@min123', 'admin', '', '', '2020-09-16 19:49:29', '2020-09-16 19:49:29', NULL),
(26, 'hamid', 'azizi', 'hamid@yahoo.com', 'R@min123', 'user', '', '', '2020-09-16 20:41:09', '2020-09-16 20:08:30', NULL),
(27, 'samira', 'fana', 'fana@yahoo.com', 'R@min123', 'user', '', '', '2020-09-16 20:27:10', '2020-09-16 20:24:43', NULL),
(28, 'sajede', 'mahla', 'mahla@yahoo.com', 'R@min123', 'user', '', '', '2020-09-16 20:36:55', '2020-09-16 20:27:27', NULL),
(39, 'ali', 'sahraee', 'sahra@yahoo.com', 'R@min123', 'user', '', '', '2020-09-17 17:28:05', '2020-09-17 17:27:14', NULL),
(47, 'baran', 'abdi', 'abdi@yahoo.com', '6eb014f1e4cff7642a68a7faa3d4e44f', 'user', '', '', '2020-09-17 20:43:44', '2020-09-17 20:43:44', NULL),
(48, 'bahram', 'radan', 'radan@yahoo.com', '6eb014f1e4cff7642a68a7faa3d4e44f', 'user', '', '', '2020-09-17 20:52:58', '2020-09-17 20:46:22', NULL),
(49, 'sadra', 'payami', 'payami@yahoo.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'user', '', '', '2020-09-20 17:45:01', '2020-09-17 20:53:25', NULL),
(50, 'behnoosh', 'nazi', 'nazi@yahoo.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'user', '', '', '2020-09-20 17:51:41', '2020-09-20 17:50:05', NULL),
(51, 'soha', 'kbari', 'soha@gmil.com', '315b308f5bd4004eb262535102e9c82b', 'user', '', '', '2020-09-20 17:52:50', '2020-09-20 17:52:15', NULL),
(52, 'esm', 'famil', 'email@yahoo.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'user', '', '', '2020-09-20 18:56:08', '2020-09-20 18:56:08', NULL),
(53, 'dsdsfd', 'dsfdsfsdf', 'qreyhane1910@gmail.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'user', '', '', '2020-09-20 18:59:43', '2020-09-20 18:57:44', NULL),
(54, 'nasrin', 'mohamadi', 'reyhane1910@gmail.com', '35c33e40ec9d5bc62cd96688cdc16fbb', 'user', '', '', '2020-11-01 01:11:28', '2020-11-01 01:11:19', 'dde8bae1a35559634b779a8116024b72');

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `id` int(6) NOT NULL,
  `id_book` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `comment` text,
  `lang` varchar(2) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_books`
--

INSERT INTO `users_books` (`id`, `id_book`, `id_user`, `comment`, `lang`, `update_at`, `create_at`) VALUES
(37, 4, 8, 'that is wonderful ', NULL, '2020-09-15 19:57:14', '2020-09-15 19:57:14'),
(38, 4, 9, 'i love it', NULL, '2020-09-15 19:58:05', '2020-09-15 19:58:05'),
(39, 1, 9, 'i finished finally it is fantastic', NULL, '2020-09-15 19:59:17', '2020-09-15 19:59:17'),
(40, 2, 26, 'i gift it always ', NULL, '2020-09-16 20:09:22', '2020-09-16 20:09:22'),
(41, 4, 27, 'i want to buy it', NULL, '2020-09-16 20:27:05', '2020-09-16 20:27:05'),
(42, 2, 28, 'my favorite book', NULL, '2020-09-16 20:36:20', '2020-09-16 20:36:20'),
(44, 1, 39, 'so fantastic', NULL, '2020-09-17 17:28:00', '2020-09-17 17:28:00'),
(45, 2, 51, 'fantastic', NULL, '2020-09-20 17:52:45', '2020-09-20 17:52:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_translators`
--
ALTER TABLE `books_translators`
  ADD PRIMARY KEY (`id_book`,`id_translator`),
  ADD KEY `id_translator` (`id_translator`);

--
-- Indexes for table `translators`
--
ALTER TABLE `translators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD PRIMARY KEY (`id`,`id_book`,`id_user`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `translators`
--
ALTER TABLE `translators`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users_books`
--
ALTER TABLE `users_books`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_translators`
--
ALTER TABLE `books_translators`
  ADD CONSTRAINT `books_translators_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `books_translators_ibfk_2` FOREIGN KEY (`id_translator`) REFERENCES `translators` (`id`);

--
-- Constraints for table `users_books`
--
ALTER TABLE `users_books`
  ADD CONSTRAINT `users_books_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `users_books_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
