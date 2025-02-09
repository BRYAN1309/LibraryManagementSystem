-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 03:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bookImage` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `number_of_page` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `name`, `bookImage`, `author`, `publisher`, `number_of_page`, `users_id`) VALUES
(12, 'Harry Potter and the Philosopher\'s Stone', 'books_image/cd22daec3a23a598728f07c31b4d47a5download.jpeg', 'J. K. Rowling', 'Gramedia', 309, 5),
(13, 'Harry Potter and the Chamber of Secrets', 'books_image/254c70d2f991accf06537faef3ff64bddownload (1).jpeg', 'J. K. Rowling', 'Gramedia', 341, 5),
(14, 'Harry Potter and the Prisoner of Azkaban', 'books_image/00a5be678283959e0a3d3823cfeed0badownload (2).jpeg', 'J. K. Rowling', 'Bloomsbury Publishing', 317, 5),
(15, 'Harry Potter and the Goblet of Fire', 'books_image/6f5f7fa3ddb4cf45e5bab657c52c420fdownload (3).jpeg', 'J. K. Rowling', 'Bloomsbury Publishing', 636, 5),
(16, 'Harry Potter and the Order of the Phoenix', 'books_image/8139da375203a6599035322e373a410adownload (4).jpeg', 'J. K. Rowling', 'Gramedia Pustaka Utama ', 870, 7),
(17, 'Harry Potter and the Half-Blood Prince', 'books_image/eb1cfc2e8e6fa204577d2a91de47a4b2download (5).jpeg', 'Joanne Kathleen Rowling', 'Gramedia Pustaka Utama ', 672, 7),
(18, 'Harry Potter and the Deathly Hallows: Part 1 (Harry Potter and the Deathly Hallows - Bagian 1)', 'books_image/a390e94046118d054ca1433fbef5bb07download (6).jpeg', 'Joanne Kathleen Rowling', 'Gramedia Pustaka Utama ', 607, 7),
(19, 'Harry Potter and the Deathly Hallows: Part 2', 'books_image/ba74dc72717bc472676d449cfed761b5download (7).jpeg', 'Joanne Kathleen Rowling', 'Bloomsbury Publishing', 640, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(5, 'Bt', '123'),
(6, 'SHIBA', '1309'),
(7, 'Betabi1', '1309');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
