-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 08:55 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `categories`, `image`, `is_delete`, `slug`, `date`) VALUES
(1, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(3, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(5, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(6, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(8, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(10, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(11, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(13, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(15, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(16, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(18, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(20, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(21, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(23, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(25, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(26, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(28, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(30, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(31, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(33, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(35, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(36, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(37, '123123123133', '1231231231231231', '123123', '1', '1503548819.jpg', 1, '12312312313.html', NULL),
(38, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 0, '123123123.html', NULL),
(39, '123123123133', '1231231231231231', '123123', '1', '1503548819.jpg', 1, '12312312313.html', NULL),
(40, '1231231232222', '123123123', '123123', '1', '1503648578.jpg', 1, '123123123.html', NULL),
(41, '1234', '3123123123123', '123123', '6', '1504169579.jpg', 0, '3123123123122222.html', 'Mon, 28 Aug 17 10:04:15 +0000');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_delete`) VALUES
(1, 'All', 0),
(3, '123', 1),
(4, '123123', 1),
(5, '123123', 1),
(6, '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `token` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`, `role`, `is_delete`, `token`, `active`) VALUES
(4, '123123', '123123', '12312323@gmail.com', '123123', '1503649571.jpg', 'User', 1, NULL, 1),
(3, 'doan', 'thi', 'doanthi1117@gmail.com', '12341234', '1503649000.jpg', 'Admin', 0, NULL, 1),
(5, '1231231', '123123', '1232123@gmail.com', '123123', '1504169591.jpg', 'Admin', 0, NULL, 1),
(6, '123123', '123123', '12312312@gmail.com', '123123', '1504167403.jpg', 'User', 0, NULL, 1),
(7, '123123', '123123', 'anhthu.dautay196@gmail.com', '123123', 'doanthi.jpg', 'User', 1, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
