-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 12:53 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testseries`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(8) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `validity` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `price`, `validity`, `description`) VALUES
(10, 'FREE', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(100) NOT NULL,
  `payment_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(8) NOT NULL,
  `category_id` int(8) NOT NULL,
  `quiz_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `duration` int(8) NOT NULL,
  `negative_marking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `category_id`, `quiz_name`, `description`, `duration`, `negative_marking`) VALUES
(71, 10, 'RRB GROUP D', '', 90, 0),
(72, 10, 'RRB ALP 2018', '', 60, 0),
(76, 10, 'RPF Constable CBT Available from July 1', '', 90, 0),
(77, 10, 'RPF SI CBT Available from 7 July 2018', '', 90, 0),
(78, 10, 'asfasdf', '', 100, 3);

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
(101, 71, 'Gen Science', 25),
(102, 71, 'Gen Knowledge and General Awareness', 25),
(103, 71, 'Mathematics ', 25),
(105, 72, 'Gen Science', 20),
(106, 72, 'Gen Knowledge and General Awareness', 20),
(109, 71, 'General Intelligence and Reasoning ', 25),
(110, 72, 'General Intelligence and Reasoning ', 15),
(290, 72, 'Mathematics ', 20),
(300, 78, 'Maths', 5);

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
(1, 'Hindi', 17, 17),
(2, 'English', 201, 201),
(3, 'Maths', 352, 352),
(4, 'General Intelligence and Reasoning ', 602, 602),
(5, 'General Knowledge and General Awareness', 782, 782),
(7, 'General Science', 556, 556),
(8, 'Computer', 43, 43),
(9, 'Gen Science', 53, 53),
(11, 'Gen Knowledge and General Awareness', 53, 53),
(12, 'Mathematics ', 50, 50),
(14, 'MP', 24, 24),
(15, 'Railway Special', 9, 9),
(18, 'Boat', 1, 1),
(19, 'Current Affairs', 9, 9),
(20, 'try', 2, 2),
(21, 'General Knowledge  and Awareness ', 0, 0),
(22, 'ALL', 0, 0);

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
  `referred_by` varchar(200) NOT NULL,
  `validity` date NOT NULL,
  `login` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `quiz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `refral_code`, `referred_by`, `validity`, `login`, `status`, `designation`, `quiz`) VALUES
(763, 'admin', 'admin@testseries.com', '21232f297a57a5a743894a0e4a801fc3', '1234567899', 'admin1234567899', '', '0000-00-00', '3396c35fec06579e037e845641153497', 'active', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT for table `total_subjects`
--
ALTER TABLE `total_subjects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=764;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
