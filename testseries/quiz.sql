-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 08:57 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(8) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Bank'),
(2, 'Madical'),
(3, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(8) NOT NULL,
  `category_id` int(8) NOT NULL,
  `quiz_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `duration` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `category_id`, `quiz_name`, `description`, `duration`) VALUES
(1, 1, 'SBI', 'ajsdfkljdasfkljafkajfkljasdklfjkajlkajsfjkljasdfl', 1),
(3, 2, 'NEET', 'asdfasdfa8sd7f86521v2a15f4a8ds4dva', 1),
(4, 3, 'JEE', 'asdfvjajkewlks jjdklfjasdkfjiejfi ', 1),
(10, 2, 'asdfasdfa', 'sdfasdfasdfasdf', 3),
(12, 1, 'sdfjhf', 'dkjhfkjahsfkj', 3),
(13, 2, 'asdfasdf', 'asdfasdfasdf', 3),
(14, 1, 'sadfasdf', 'asdfasdfasdf', 2),
(15, 1, 'asdfasdf', 'asdfasdfasdf', 2),
(16, 1, 'dsfasdf', 'asdfasdfas', 2),
(19, 1, 'PO', 'jhfakjshfkj', 2),
(20, 1, 'po', 'ashdfjkahs', 2),
(21, 1, 'ashfahsdfk', 'ajsdhfkjashdf', 2),
(22, 1, 'AHSJHDH', 'ashfjashfkj', 2),
(23, 1, 'ashfsdh', 'sjhdshf', 2),
(24, 1, 'jasf', 'jfasjf', 2),
(25, 1, 'asdfashfkj', 'sdjfkajsfkj', 2),
(26, 1, 'asfjasdhfj', 'hdkjshafkjashfk', 2),
(27, 1, 'asdfjasjdf', 'sdhfjkahsfkjas', 2),
(28, 1, 'afjasj', 'kkjdshfkjahsk', 2),
(29, 1, 'adsfaksjfk', 'jskafjkasjdfa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(8) NOT NULL,
  `quiz_id` int(8) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `questions` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `quiz_id`, `subject_name`, `questions`) VALUES
(2, 1, 'English', 5),
(4, 1, 'Computer', 5),
(7, 3, 'Maths', 5),
(8, 3, 'Physics', 5),
(9, 3, 'Chemistry', 5),
(16, 10, 'Aptitude', 50),
(17, 10, 'English', 50),
(49, 1, 'Aptitude', 6),
(50, 1, 'Reasoning', 6);

-- --------------------------------------------------------

--
-- Table structure for table `total_subjects`
--

CREATE TABLE `total_subjects` (
  `id` int(8) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `total_question` int(10) NOT NULL,
  `last_question` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_subjects`
--

INSERT INTO `total_subjects` (`id`, `subject_name`, `total_question`, `last_question`) VALUES
(1, 'Aptitude', 6, 6),
(2, 'English', 6, 6),
(3, 'Reasoning', 6, 6),
(4, 'Computer', 5, 5),
(5, 'Maths', 5, 5),
(6, 'Physics', 5, 5),
(7, 'Chemistry', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `refral_code` varchar(50) NOT NULL,
  `validity` date NOT NULL,
  `login` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `refral_code`, `validity`, `login`, `status`, `designation`) VALUES
(20, 'Chhekur', '820121223505e@gmail.com', '155ede4a4cf447bda40faf2925106714', '', '', '2018-04-07', '179c5ce47db02de728f8dcf1f556fd79', 'active', 'admin'),
(23, 'asfasdf', '820121223505e', 'c80746b29e82927d4a09e6f7f102a7e2', '', '', '2018-03-23', 'logout', 'active', 'user'),
(24, 'aadsfasf', 'asdfasdfasdf@asdf.com', 'a95c530a7af5f492a74499e70578d150', '', '', '2018-03-23', 'logout', 'active', 'user'),
(27, 'adsfasdf', 'asdfasdf@asdfasdf.com', '6a204bd89f3c8348afd5c77c717a097a', '', '', '2018-03-23', 'logout', 'suspend', 'user'),
(28, 'asdfasdf', 'asdfasdf@adsf.com', 'a95c530a7af5f492a74499e70578d150', '', '', '2018-03-23', 'logout', 'pending', 'user'),
(29, 'Harendra454564', 'fasdfasdf@asfkajsdf.com', '6b7c5f170d33784ac41b54eb5a428e31', '', '', '2018-03-23', 'logout', 'pending', 'user'),
(30, 'pankajdevesh', 'pankajdevesh3@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '', '2018-03-23', 'logout', 'active', 'admin'),
(31, 'ajsfkl', 'kdjfa@djfkla.com', 'f1adabdbf7db8145280e49e6f112f4fd', '', '', '2018-03-23', 'logout', 'pending', 'user'),
(32, 'ajhfjas', 'asdfhakjs@ajaflk.com', 'd4c59d5b88139995a1fa70a8171e7314', '1234567890', 'ajhfjas1234567890', '2018-03-23', 'logout', 'pending', 'user'),
(33, 'ajsfkasj', 'asdfjk@djasfklas.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567892', 'ajsfkasj1234567892', '2018-03-28', 'logout', 'pending', 'user'),
(35, 'asdfkljasldf', 'djasfkljasfka@sjdfklas.com', '5560ae6e295af6c69062a9a4cc9b3d67', '45456479871', 'asdfkljasldf45456479871', '0000-00-00', 'logout', 'pending', 'user'),
(36, 'asdfkjaskdfj', 'ksjdfkjalsk@kldsjkldga.com', 'c0989f48acfa3cfa3937f842b1b3588b', '1234567893', 'asdfkjaskdfj1234567893', '0000-00-00', 'logout', 'pending', 'user'),
(38, 'jasdfkaksdhfkj', 'jsdklfj@jfklasjdl.com', '4203cc2139fd3e393e05cb0f4f7cd113', '7896453126', 'jasdfkaksdhfkj7896453126', '0000-00-00', 'logout', 'pending', 'user'),
(40, 'ashdfkjhaskjdf', 'kdasfjljasdfkl@klsjfkladjskl.com', '51065210f587240749550af4e142a520', '6549871235', 'ashdfkjhaskjdf6549871235', '0000-00-00', 'logout', 'pending', 'user'),
(41, 'Harendra', 'harendra@chhekur.com', '25f9e794323b453885f5181f1b624d0b', '1234567890', 'Harendra1234567890', '2018-03-25', 'logout', 'active', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_subjects`
--
ALTER TABLE `total_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `total_subjects`
--
ALTER TABLE `total_subjects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
