-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2019 at 06:23 AM
-- Server version: 10.3.17-MariaDB-1:10.3.17+maria~bionic
-- PHP Version: 7.3.8-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TutorialNow`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `bookmark_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`bookmark_id`, `user_id`, `video_id`) VALUES
(1, 7, 1),
(2, 4, 6),
(3, 8, 11),
(4, 8, 12),
(5, 8, 21),
(6, 11, 11),
(12, 13, 11);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `video_id`, `comment`) VALUES
(2, 10, 16, 'good'),
(3, 9, 11, 'good\r\n'),
(5, 4, 12, 'test comment 1'),
(9, 4, 12, 'test comment 1');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userinfo_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL DEFAULT 1 COMMENT '0 = Admin; 1 = User;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userinfo_id`, `fullname`, `username`, `email`, `password`, `user_type`) VALUES
(4, 'admin', 'admin', 'myvideo@gmail.com', '123456', 0),
(13, 'Sajjd Mahmud Khan', 'sajjad', 'sajjad@northsouth.edu', 'Sajjad12345', 1),
(14, 'test user 1', 'testuser1', 'testuser1@northsouth.edu', 'User-123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `video_ext` varchar(255) NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_path`, `video_ext`, `thumbnail_path`, `category_id`, `caption`, `description`, `duration`) VALUES
(6, 'JavaScript Tutorial for Beginners - 01 - Introduction.mp4', 'mp4', 'js1.JPG', '5', 'Javascript Introduction', 'JavaScript Tutorial for Beginners - 01 - Introduction', 3),
(7, 'JavaScript Tutorial for Beginners - 02 - Statements.mp4', 'mp4', 'js2.JPG', '5', 'Javascript Statements', 'JavaScript Tutorial for Beginners - 02 - Statements', 4),
(8, 'JavaScript Tutorial for Beginners - 03 - Variables.mp4', 'mp4', 'js 3.JPG', '5', 'Javascript variables', 'JavaScript Tutorial for Beginners - 03 - Variables', 6),
(9, 'JavaScript Tutorial for Beginners - 04 - Variables Part 2.mp4', 'mp4', 'js4.JPG', '5', 'Javascript Variable 2 ', 'JavaScript Tutorial for Beginners - 04 - Variables Part 2', 3),
(10, 'JavaScript Tutorial for Beginners - 05 - Using an external file.mp4', 'mp4', 'js5.JPG', '5', 'Javascript using an external file', 'JavaScript Tutorial for Beginners - 05 - Using an external file', 4),
(11, 'videoplayback.mp4', 'mp4', '1.PNG', '1', 'PHP Introduction', 'PHP Introduction', 6),
(12, 'videoplayback (1).mp4', 'mp4', '2.PNG', '1', 'Install local php server', 'Xampp', 9),
(13, 'videoplayback (2).mp4', 'mp4', '3.PNG', '1', 'Print Php', 'Echo and Print using php', 7),
(14, 'videoplayback (3).mp4', 'mp4', '4.PNG', '1', 'Php variables', 'What are php variables', 5),
(15, 'videoplayback (4).mp4', 'mp4', '5.PNG', '1', 'Php comments', 'What are php comments', 3),
(16, 'html audio.mp4', 'mp4', 'html audio.JPG', '3', 'Html audio', 'Html audio', 3),
(17, 'html checkbox.mp4', 'mp4', 'html checkbox.JPG', '3', 'Html checkbox', 'Html Checkbox', 2),
(18, 'html intro.mp4', 'mp4', 'html intro.JPG', '3', 'Html Introduction', 'Html Introduction', 4),
(19, 'html nested elements.mp4', 'mp4', 'html nested.JPG', '3', 'html nested elements', 'html nested elements', 2),
(20, 'html subsup.mp4', 'mp4', 'html subsup.JPG', '3', 'html subsup', 'html subsup', 2),
(21, 'videoplayback (5).mp4', 'mp4', 'j1.PNG', '7', 'Java tutorial 1', 'Java tutorial ', 14),
(22, 'videoplayback (6).mp4', 'mp4', 'j2.PNG', '7', 'Java tutorial 2', 'Java tutorial ', 16),
(23, 'videoplayback (7).mp4', 'mp4', 'j3.PNG', '7', 'Java tutorial 3', 'Java tutorial ', 20),
(24, 'videoplayback (8).mp4', 'mp4', 'j4.PNG', '7', 'Java tutorial 4', 'Java tutorial ', 10),
(25, 'videoplayback (9).mp4', 'mp4', 'j5.PNG', '7', 'Java tutorial 5', 'Java tutorial ', 13);

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

CREATE TABLE `video_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_category`
--

INSERT INTO `video_category` (`category_id`, `category_name`) VALUES
(1, 'PHP'),
(3, 'HTML'),
(5, 'JAVASCRIPT'),
(7, 'Java');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userinfo_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `video_category`
--
ALTER TABLE `video_category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `video_category`
--
ALTER TABLE `video_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
