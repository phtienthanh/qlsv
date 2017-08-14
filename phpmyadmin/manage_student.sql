-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 09:22 AM
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
  `delete_is` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `categories`, `image`, `delete_is`, `slug`) VALUES
(43, 'bao bong da13', '                                                                                                                                                                                                                                                                                                123123                                                                                                                                                                                                                                                                                    ', '123223', '123123123123', '18051863_1845066435743499_851238315_n.jpg', 1, '123123'),
(49, 'League of Legends', '                                                                                                                                                                                                                                                123a123123123                                                                                                                                                                                                                            ', 'sport', 'bai bao', '01001101101101101_jpg.jpg', 0, '123123121.html'),
(57, 'League of Legends1', '                                                            12123                                            ', '123123', 'bai bao', '29.jpg', 0, 'league-of-legends1123.html'),
(58, '123123', '            123123', '123123', '123123123123', 'doanthi.jpg', 1, '123123.html'),
(59, '123123123', '            123123', '123123', '123123123123', '18051863_1845066435743499_851238315_n.jpg', 0, '123123123.html'),
(60, 'bao bong da  real', 'ealasdjaklsdqweyyutqwe', 'author1123', 'bai bao', 'doanthi.jpg', 1, 'bao-bong-da-real.html');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(29, '123123123123'),
(32, 'bai bao');

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
  `delete_is` tinyint(1) NOT NULL,
  `token` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `first_login` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`, `role`, `delete_is`, `token`, `active`, `first_login`) VALUES
(250, 'thi', '123123', 'doanthi2241@gmail.com', '123123', '29.jpg', 'User', 0, 7803, 1, 1),
(247, 'daonthi', 'thi', '123123@gmail.com ', '12341234', 'doanthi', 'Admin', 0, 6571, 1, 1),
(276, '123123', '123123', '123122323@gmail.com', '123123', 'doanthi', 'User', 0, NULL, 0, NULL),
(263, '123', '123', '1231232323@gmail.com', '123123', 'doanthi', 'Admin', 0, NULL, 0, NULL),
(262, '123123', '123123', '1231223322@gmail.com', '123123', 'doanthi', 'User', 0, NULL, 0, NULL),
(286, 'doan', 'thi', 'anhthu.dautay196@gmail.com', '12345', '18051863_1845066435743499_851238315_n.jpg', 'User', 0, 5378, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
