-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2021 at 01:12 PM
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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo_title` varchar(255) NOT NULL,
  `photo_description` text NOT NULL,
  `photo_filename` varchar(255) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `photo_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_title`, `photo_description`, `photo_filename`, `photo_type`, `photo_size`) VALUES
(4, 'Silver car', '', 'images-8.jpg', 'image/jpeg', 20810),
(5, 'Red car', '', 'images-6.jpg', 'image/jpeg', 21886),
(6, 'Blue car', '', 'images-9.jpg', 'image/jpeg', 21108);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_password`, `user_first_name`, `user_last_name`) VALUES
(1, 'lily', '123', 'Lily', 'Boz'),
(2, 'Maya-2', '123', 'Maya', 'Lanz'),
(5, 'Maya-3', '', '', ''),
(7, 'SamJ', '123', 'Updated first name', 'Updated last name-2'),
(8, 'SamJ', '123', 'Sam', 'Johnes'),
(9, 'SamJ23', '123', 'Sam', 'Johnes'),
(10, 'SamJ23', '123', 'Sam', 'Johnes'),
(11, 'SamJ', '123', 'Sam', 'Johnes'),
(12, 'SamJ', '123', 'Sam', 'Johnes');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
