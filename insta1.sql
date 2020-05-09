-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 12:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta1`
--

-- --------------------------------------------------------

--
-- Table structure for table `allsub`
--

CREATE TABLE `allsub` (
  `user_id` int(11) NOT NULL,
  `subsription_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allsub`
--

INSERT INTO `allsub` (`user_id`, `subsription_id`) VALUES
(41, 3),
(41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_id` int(150) NOT NULL,
  `created` datetime NOT NULL,
  `comments` varchar(255) NOT NULL,
  `id` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_id`, `created`, `comments`, `id`) VALUES
(12, '2017-08-12 11:25:46', 'hello', 22),
(12, '2017-08-12 11:31:21', 'nice pic', 22),
(12, '2017-08-12 11:32:33', 'nice one', 31),
(46, '2020-03-18 23:44:17', 'Tanmay', 38),
(12, '2020-03-19 13:42:36', 'Tanmay', 22),
(12, '2020-03-19 13:43:54', 'Tanmay', 22),
(12, '2020-03-19 13:43:58', 'Tanmay', 22),
(12, '2020-03-19 13:46:12', 'Tanmay', 22),
(12, '2020-03-19 13:46:19', 'Tanmay', 22),
(12, '2020-03-19 13:48:31', 'Tanmay', 22),
(12, '2020-03-19 13:48:46', 'Tanmay', 22),
(12, '2020-03-19 13:53:40', 'Heyyy!!!!', 22),
(12, '2020-03-19 13:53:50', 'Heyyy!!!!', 22),
(12, '2020-03-19 14:21:45', 'tanmay', 22),
(12, '2020-03-19 14:21:53', 'tanmay', 22);

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `subscript_id` int(255) NOT NULL DEFAULT '1',
  `type` varchar(255) NOT NULL DEFAULT 'Entertainment',
  `banner` varchar(55555) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`subscript_id`, `type`, `banner`, `title`, `created`) VALUES
(1, 'Entertainment', 'joker.jpg', 'Joaquin phoenix wins best actor for joker at the Oscar\'s\r\n', '2020-03-20 23:56:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `user_id` int(11) DEFAULT NULL,
  `friend` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`user_id`, `friend`) VALUES
(12, 21);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(150) NOT NULL,
  `user_id` int(150) NOT NULL,
  `created` datetime NOT NULL,
  `post_id` int(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `created`, `post_id`) VALUES
(3, 12, '2017-08-12 11:45:12', 22),
(21, 39, '2017-11-04 19:07:17', 31);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `subscript_id` int(255) NOT NULL DEFAULT '3',
  `type` varchar(255) NOT NULL DEFAULT 'news',
  `banner` varchar(55555) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(150) NOT NULL,
  `user_id` int(15) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `user_id`, `banner`, `caption`, `created`) VALUES
(22, 12, 'Screenshot (1).png', '', '2017-08-11 23:37:47'),
(31, 39, 'Screenshot (1).png', 'hi', '2017-11-04 19:08:16'),
(32, 41, 'Screenshot (1).png', '', '2017-12-01 19:28:25'),
(34, 21, 'Screenshot (1).png', '', '2018-01-09 21:42:33'),
(35, 33, 'Screenshot (1).png', '', '2018-02-05 12:15:41'),
(38, 46, 'post/20191201_170646.jpg', 'Yooo!!!', '2020-03-17 00:00:00'),
(39, 46, 'post/20191201_170845.jpg', 'jfnvkjdfn', '2020-03-17 00:00:00'),
(40, 12, 'post/20191201_170717.jpg', 'jfnvkjdfn', '2020-03-19 00:00:00'),
(41, 41, 'post/IMG_9858.jpg', 'yass', '2020-03-20 14:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `phone` bigint(150) NOT NULL,
  `full_name` text NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'profile/profile.png',
  `email` varchar(200) NOT NULL,
  `gender` enum('Female','Male') NOT NULL DEFAULT 'Male',
  `admin` varchar(4) DEFAULT 'NO',
  `subscribe_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`phone`, `full_name`, `user_name`, `password`, `id`, `photo`, `email`, `gender`, `admin`, `subscribe_id`) VALUES
(9034622475, 'komal Hello', 'komal@', 'abc', 12, 'photo1502435534.JPG', 'kkkk@gmail.com', 'Female', 'YES', NULL),
(452, 'trox', 'trox', 'trox', 21, 'India-SeaWorld_&_912f21b4-f81f-4234-804a-b857a900afbf.jpg', '', 'Male', 'YES', NULL),
(444, 'km', 'km', 'k', 22, 'DSC03189.JPG', '', 'Female', 'YES', NULL),
(7206550475, 'Arjun ', 'arj._7', 'arjmittu', 33, 'DSC_0029_1.JPG', 'parthmittu@hotmail.com', 'Male', 'NO', NULL),
(9354442424, 'sajal chauhan', 'chauhansajal7@gmail.com', '9354442424', 39, 'photo1509802795.JPG', '', 'Female', 'NO', NULL),
(123456789, 'meera', 'meera', '123456', 40, '', '', 'Female', 'NO', NULL),
(9812152538, 'am', 'am', '123456789', 41, 'profile/IMG_9858.jpg', '', 'Female', 'NO', NULL),
(7988202484, 'naman jain', 'naman@764', 'naman764', 42, '', '', 'Male', 'NO', NULL),
(9034423055, 'navan', 'nav.1', 'navan12345', 43, '', '', 'Female', 'NO', NULL),
(9050561913, 'Rachit Ahuja', 'rachit123', 'rachit123', 45, 'India-SeaWorld_&_912f21b4-f81f-4234-804a-b857a900afbf.jpg', 'rachitahuja2011@gmail.com', 'Male', 'NO', NULL),
(1111111111, 'Tanmay', 'root', 'Tanmay', 46, 'profile/20191201_170646.jpg', 'agarwaltanmay3610@gmail.com', 'Male', 'NO', NULL),
(1111111111, 'Tanmay', 'root1', 'Tanmay', 50, 'profile/20191201_170646.jpg', 'agarwaltanmay3610@gmail.com', 'Male', 'NO', NULL),
(1111111111, 'Tanmay', 'root2', 'Tanmay', 51, 'profile/20191201_170717.jpg', 'savsf', 'Male', 'NO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `subscript_id` int(255) NOT NULL DEFAULT '2',
  `type` varchar(255) NOT NULL DEFAULT 'Sports',
  `banner` varchar(55555) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`subscript_id`, `type`, `banner`, `title`, `created`) VALUES
(2, 'Sports', 'agar.webp', 'Ashton Agar struggles to find the ball in empty stands at SCG.', '2020-03-13 13:23:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `channel_id` int(4) NOT NULL,
  `channel` varchar(50) NOT NULL,
  `doa` date DEFAULT NULL,
  `doe` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`channel_id`, `channel`, `doa`, `doe`) VALUES
(1, 'Tanmay', '2020-12-15', '2021-01-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend` (`friend`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `subscribe_id` (`subscribe_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`channel_id`),
  ADD UNIQUE KEY `channel` (`channel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `signup` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`id`) REFERENCES `post` (`p_id`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`id`),
  ADD CONSTRAINT `friend_ibfk_2` FOREIGN KEY (`friend`) REFERENCES `signup` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `signup` (`id`),
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`p_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `signup`
--
ALTER TABLE `signup`
  ADD CONSTRAINT `signup_ibfk_1` FOREIGN KEY (`subscribe_id`) REFERENCES `subscription` (`channel_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
