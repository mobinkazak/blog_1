-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 09:16 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `reg_date_time`, `status`, `avatar`) VALUES
(1, 'admin1', 'admin1', 'admin1@admin.com', 'مبین', 'قزاق', '2021-10-25 07:10:41', 1, '8bdd4c0e7e5b68d5a6c802813507c894.jpg'),
(2, 'admin2', 'admin2', 'admin2@admin.com', 'admin2', 'admin2', '2021-10-26 11:56:33', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `sub_cat_id` int(10) UNSIGNED NOT NULL,
  `short_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `long_desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tiny_image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `seo_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `seo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `count_view` bigint(20) NOT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `cat_id`, `sub_cat_id`, `short_desc`, `long_desc`, `tiny_image`, `status`, `seo_keywords`, `seo_desc`, `count_view`, `created_date_time`) VALUES
(1, 'چرا php?', 1, 6, 'چرا php?', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!&lt;/p&gt;', '/monsef/ch07/media/image/2.png', 1, '', 'چرا php?', 0, '2021-11-01 17:50:05'),
(3, 'چرا laravel؟', 4, 8, 'چرا django?', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!&lt;/p&gt;', '/monsef/ch07/media/image/1.png', 1, '', 'چرا django?', 0, '2021-11-01 17:50:24'),
(4, 'چرا django?', 5, 7, 'چرا laravel?121312', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Error harum, quos necessitatibus quam ipsa quibusdam officia velit iste aliquam cumque hic modi cum delectus asperiores sint ex consequatur praesentium dolorum!&lt;/p&gt;', '/monsef/ch07/media/image/bf0fed27273312a33f190045ff666104.png', 1, '', 'چرا laravel?111111111', 0, '2021-11-01 17:49:44'),
(5, 'asdasdasdasd', 5, 7, 'asdas', '&lt;p&gt;asdasdasd&lt;/p&gt;', '/monsef/ch07/media/image/bf0fed27273312a33f190045ff666104.png', 1, 'asdasd', 'asdasd', 0, '2021-11-02 09:49:50'),
(6, 'asdasdasd', 1, 6, 'asdasdasd', '&lt;p&gt;asdasdasdasdasd&lt;/p&gt;', '/monsef/ch07/media/image/bf0fed27273312a33f190045ff666104.png', 1, 'asdasdas', 'asdasd', 0, '2021-11-05 11:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `delete_comment` tinyint(1) NOT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `name`, `email`, `delete_comment`, `created_date_time`) VALUES
(1, 'asdasdasdasdasdadasdadadasd', 6, 'mobin ghazzagh', 'mkhiphopy@gmail.com', 0, '2021-11-06 10:52:25'),
(2, 'asdasdasdasdasd', 4, 'asdasda', '', 0, '2021-11-06 08:26:36'),
(6, 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 6, 'asdasdasd', '', 0, '2021-11-07 15:43:21'),
(4, 'asdasdasdas', 4, 'asdasdasdas', 'asdasdasdas', 0, '2021-11-06 08:49:39'),
(5, 'asdasdasd', 6, 'asdasdasd', 'asdasdasdasd', 0, '2021-11-06 09:16:40'),
(7, 'asdasdasdasasd', 5, 'asdasdasdasd', '', 0, '2021-11-07 16:41:27'),
(8, 'asdasdad', 5, 'asdasdasdasd', '', 0, '2021-11-07 16:41:37'),
(9, 'asdasdasda', 6, 'asdasdasd', '', 0, '2021-11-07 16:44:08'),
(10, 'مبین قزاق', 4, 'مبین قزاق', '', 0, '2021-11-07 16:46:27'),
(11, 'مبین قزاق', 4, 'مبین قزاق', '', 0, '2021-11-07 16:50:19'),
(12, 'مبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-07 16:56:31'),
(13, 'مبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-07 16:58:15'),
(14, 'asdasda', 6, 'asdasda', '', 0, '2021-11-07 17:00:13'),
(15, 'asdasdasdasdas', 6, 'asdasdasdasd', '', 0, '2021-11-07 17:02:21'),
(16, 'mobin', 6, 'mobin', '', 0, '2021-11-07 17:06:02'),
(17, 'mobin2', 6, 'mobin2', '', 0, '2021-11-07 17:08:46'),
(18, 'mobin3', 6, 'mobin3', '', 0, '2021-11-07 17:09:32'),
(19, 'asdasdasdasd', 6, 'asdasdas', '', 0, '2021-11-07 17:30:07'),
(20, 'mobin4', 6, 'mobin4', '', 0, '2021-11-07 17:30:40'),
(21, 'mobin5', 6, 'mobin5', '', 0, '2021-11-07 17:32:11'),
(22, 'mobin6', 6, 'mobin6', '', 0, '2021-11-07 17:35:43'),
(23, 'mobin7', 6, 'mobin7', '', 0, '2021-11-07 17:36:27'),
(24, 'mobin8', 6, 'mobin8', '', 0, '2021-11-07 17:41:42'),
(25, 'mobin9', 6, 'mobin9', '', 0, '2021-11-07 17:42:46'),
(26, 'mobin10', 6, 'mobin10', '', 0, '2021-11-07 17:44:02'),
(27, 'mobin11', 6, 'mobin11', '', 0, '2021-11-07 17:47:50'),
(28, 'mobin12', 6, 'mobin12', '', 0, '2021-11-07 19:56:23'),
(29, 'mobin13', 6, 'mobin13', '', 0, '2021-11-07 19:58:13'),
(30, 'mobin14', 6, 'mobin14', '', 0, '2021-11-07 20:04:22'),
(31, 'mobin15', 6, 'mobin15', '', 0, '2021-11-07 20:05:22'),
(32, 'mobin16', 6, 'mobin16', '', 0, '2021-11-08 05:29:33'),
(33, 'mobin17', 6, 'mobin17', '', 0, '2021-11-08 05:30:30'),
(34, 'mobin18', 6, 'mobin18', '', 0, '2021-11-08 05:32:06'),
(35, 'mobin19', 6, 'mobin19', '', 0, '2021-11-08 05:55:30'),
(36, 'mobin20', 6, 'mobin20', '', 0, '2021-11-08 06:00:12'),
(37, 'mobin21', 6, 'mobin21', '', 0, '2021-11-08 06:01:31'),
(38, 'mobin22', 6, 'mobin22', '', 0, '2021-11-08 06:02:08'),
(39, 'مبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-08 06:11:51'),
(40, 'مبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-08 06:26:25'),
(41, 'مبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-08 06:28:39'),
(42, 'مبین قزاقمبین قزاقمبین قزاقمبین قزاقمبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-08 06:30:59'),
(43, 'cmnt', 6, 'cmnt', '', 0, '2021-11-08 06:32:05'),
(44, 'cmnt1', 6, 'cmnt1', '', 0, '2021-11-08 06:34:05'),
(45, 'cmnt2', 6, 'cmnt2', '', 0, '2021-11-08 06:34:31'),
(46, 'cmnt3', 6, 'cmnt3', '', 0, '2021-11-08 06:34:53'),
(47, 'مبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-08 06:35:44'),
(48, 'مبین قزاق', 6, 'مبین قزاق', '', 0, '2021-11-08 06:36:16'),
(49, 'asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas', 6, 'asdasdasdas', '', 0, '2021-11-08 06:36:44'),
(50, '1', 6, '1', '', 0, '2021-11-08 06:37:05'),
(51, 'asdasdasdas', 6, 'Kiera H Cooper', 'kihaniy674@epeva.com', 0, '2021-11-20 11:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `parent_id`) VALUES
(1, 'علمی', 0),
(2, 'فن آوری', 0),
(3, 'رسانه های اجتماعی', 0),
(4, 'مقالات جهانی', 0),
(5, 'برنامه نویسی', 0),
(6, 'A1', 1),
(7, 'E2', 5),
(8, 'D1', 4),
(9, 'F', 0),
(10, 'G', 0),
(25, 'E1', 5),
(26, 'اینترنت 5g', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`,`cat_id`,`sub_cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`,`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
