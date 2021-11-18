-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2021 at 10:32 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo_title` varchar(255) NOT NULL,
  `photo_caption` varchar(255) NOT NULL,
  `photo_description` text NOT NULL,
  `photo_filename` varchar(255) NOT NULL,
  `photo_alternate_text` varchar(255) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `photo_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_title`, `photo_caption`, `photo_description`, `photo_filename`, `photo_alternate_text`, `photo_type`, `photo_size`) VALUES
(4, 'Silver car', '', '', 'images-8.jpg', '', 'image/jpeg', 20810),
(9, 'Red car', '', '', 'images-6.jpg', '', 'image/jpeg', 21886),
(10, 'New Blue car', 'New Some caption here', 'New Blue car description', 'images-9.jpg', 'New blue car', 'image/jpeg', 21108),
(11, 'Orange car', '', '', 'images-10.jpg', '', 'image/jpeg', 20401);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_photo`, `user_password`, `user_first_name`, `user_last_name`) VALUES
(1, 'lily', 'images-8.jpg', '123', 'Lily', 'Boz'),
(2, 'Maya-2', '0', '123', 'Maya', 'Lanz'),
(5, 'Maya-3', '0', '', '', ''),
(7, 'SamJ', '0', '123', 'Updated first name', 'Updated last name-2'),
(8, 'SamJ', '0', '123', 'Sam', 'Johnes'),
(9, 'SamJ23', '0', '123', 'Sam', 'Johnes'),
(10, 'SamJ23', 'images-8.jpg', '123', 'Sam', 'Johnes'),
(19, 'Add user test', 'images-7 copy.jpg', '123', 'Add user test first name UPDATED', 'Add user test last name UPDATED'),
(20, 'dani', 'images-6.jpg', '123', 'dani', 'dani'),
(22, 'dani4', 'images-8.jpg', '123', 'dani4', 'dani4'),
(23, 'dani66', 'images-10.jpg', '123', 'dani6', 'dani6'),
(28, 'eeeee', 'images-6.jpg', '123', 'boz', 'boz'),
(29, 'boz', 'images-3.jpg', '123', 'boz', 'boz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX` (`photo_id`) USING BTREE;

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
