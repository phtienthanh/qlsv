-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 08:53 AM
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
(65, 'bao bong da', '<div class="boxDoi-c">		<div class="boxDoiItem-spec" id="spec_box_tin_tuc_trong_ngay_bong_da_the_thao_3">\r\n            <span class="news-title class_title_box_bd_tt" id="id_class_title_box_bd_tt_3">\r\n            <a href="/bong-da/nhan-dinh-bong-da-real-madrid-barcelona-cup-bac-xoa-diu-uat-han-ronaldo-c48a896372.html" title="Real Madrid – Barcelona: Cúp bạc xoa dịu uất hận Ronaldo" style="font-size: 14px;">\r\n                Real Madrid – Barcelona: Cúp bạc xoa dịu uất hận Ronaldo<span class="red-star"></span></a>\r\n            </span>\r\n            <span class="imgFloat imgNews-home"><span class="pic-icon"><img width="20" height="20" alt="" src="http://static.24h.com.vn/images/2014/videoicon.gif"></span>                <a href="/bong-da/nhan-dinh-bong-da-real-madrid-barcelona-cup-bac-xoa-diu-uat-han-ronaldo-c48a896372.html" title="Real Madrid – Barcelona: Cúp bạc xoa dịu uất hận Ronaldo">\r\n                    <img src="http://image.24h.com.vn/upload/3-2017/images/2017-08-16/120x90/1502850768-re---bar.jpg" alt="Real Madrid – Barcelona: Cúp bạc xoa dịu uất hận Ronaldo" width="120" height="90">\r\n                </a>\r\n            </span>\r\n            <span class="news-sapo-spec">(4h, 17/8) &nbsp;Real hướng đến lần đầu tiên nâng cao Siêu cúp Tây Ban Nha sau 5 năm.</span>				<div class="div_sub_news"><a title="Sự kiện: Barca - Real: Hận thù trăm năm" href="http://www.24h.com.vn/barca-real-han-thu-tram-nam-c48e1625.html">Barca - Real: Hận thù trăm năm</a></div>\r\n							<div class="clear"></div>\r\n		</div>\r\n		<div class="home-news-special-2">\r\n			<ul>					<li class="video_normal" style="padding-left: 16px;"><a title="U22 Việt Nam &quot;luyện công&quot; giữa trưa nắng, đấu “đàn em Ronaldo Campuchia”" href="/bong-da/dau-u22-campuchia-u22-viet-nam-luyen-cong-giua-trua-nang-c48a896433.html">U22 Việt Nam "luyện công" giữa trưa nắng, đấu “đàn em...</a></li>					<li class="video_normal" style="padding-left: 16px;"><a title="Cầu thủ hay nhất châu Âu: 2 siêu sao chờ &quot;làm nền&quot; cho Ronaldo" href="/bong-da/cau-thu-hay-nhat-chau-au-messi-buffon-cho-lam-nen-cho-ronaldo-c48a896326.html">Cầu thủ hay nhất châu Âu: 2 siêu sao chờ "làm nền" cho...</a></li>					<li class="video_normal" style="padding-left: 16px;"><a title="Barca mơ ngược dòng Real: Messi &quot;chửi thề&quot; xốc tinh thần cả đội" href="/bong-da/barca-mo-nguoc-dong-real-messi-chui-the-xoc-tinh-than-ca-doi-c48a896221.html">Barca mơ ngược dòng Real: Messi "chửi thề" xốc tinh...</a></li>							</ul>\r\n						</div>\r\n												<div class="home-news-special-1" style="padding-right: 3px;">\r\n													<ul>\r\n											<li class="lst-normal" style="padding-left: 16px;"><a title="Chuyển nhượng MU 16/8: Khóa sổ Perisic, mở cờ với SAO Monaco" href="/bong-da/chuyen-nhuong-mu-16-8-gay-soc-voi-arda-turan-c48a896324.html">Chuyển nhượng MU 16/8: Khóa sổ Perisic, mở cờ với...</a></li>					<li class="video_normal" style="padding-left: 16px;"><a title="Cờ vua số 1 hành tinh: Quang Liêm khiến vô địch thế giới, châu Âu &quot;tắt điện&quot;" href="/the-thao/co-vua-so-1-hanh-tinh-quang-liem-khien-vo-dich-the-gioi-chau-au-tat-dien-c101a896382.html">Cờ vua số 1 hành tinh: Quang Liêm khiến vô địch...</a></li>			</ul>\r\n		</div>  \r\n	</div>', '123123', '35', '29.jpg', 0, 'bao-bong-da.html'),
(64, '123', '    123123', '123123', '33', 'doanthi.jpg', 1, '123.html');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delete_is` int(11) NOT NULL,
  `role` varchar(155) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `delete_is`, `role`) VALUES
(35, 'doanthi', 0, '1'),
(1, 'Default ', 0, '0');

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
(247, 'daon1', 'thi2', '123123@gmail.com ', '123123123', 'doanthi', 'Admin\r\n', 0, 6571, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
