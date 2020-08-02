-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 06:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
(20, 'commerce'),
(21, 'management');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `ielts_score` decimal(10,0) DEFAULT NULL,
  `gpa_score` decimal(10,0) DEFAULT NULL,
  `genre` int(10) DEFAULT NULL,
  `total_percentage` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(10) NOT NULL,
  `organization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization`) VALUES
(1, 'organization1'),
(3, 'organization2');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `ielts_score` varchar(100) NOT NULL,
  `gpa_score` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `IELTS` blob NOT NULL,
  `GPA` blob NOT NULL,
  `organization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `user_id`, `department`, `ielts_score`, `gpa_score`, `genre`, `IELTS`, `GPA`, `organization`) VALUES
(24, 37, 'science', '6', '3.2', '2', 0x696d616765322e6a7067, 0x666f6f7462616c6c2e6a7067, '0'),
(27, 43, 'commerce', '6', '3', '1', 0x696d6167652e6a7067, 0x696d616765332e6a7067, '0'),
(28, 44, 'commerce', '7.5', '3.4', '1', 0x696d616765322e6a7067, 0x696d6167652e6a7067, '0'),
(38, 42, 'management', '3.5', '233', '2', 0x64656c6574652e706870, 0x61646461646d696e322e706870, '0'),
(39, 42, 'commerce', '3.5', '3.2', '3', 0x6164646465706172746d656e742e706870, 0x64656c6574655f6465706172746d656e742e706870, 'organization1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `organization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `department`, `email`, `user_type`, `password`, `organization`) VALUES
(1, 'admin', '', 'pritambdrkarki.pk@gmail.com', 'admin', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(36, 'stydent1', '', 'student1@gmail.com', 'user', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(37, 'student2', '', 'student2@gmail.com', 'user', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(38, 'department1', 'science', 'department1@gmail.com', 'departmentadmin', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(39, 'department2', 'management', 'department2@gmail.com', 'departmentadmin', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(40, 'department3', 'commerce', 'department3@gmail.com', 'departmentadmin', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(41, 'student3', '', 'student3@gmail.com', 'user', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(42, 'student4', '', 'student4@gmail.com', 'user', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(43, 'student5', '', 'student5@gmail.com', 'user', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(44, 'student6', '', 'student6@gmail.com', 'user', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(46, 'student7', '', 'student7@gmail.com', 'mainadmin', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', ''),
(47, 'adminpritam', '', 'pritambdrkarki.pk@gmail.com', 'admin', 'd57587b0f5bbb0c3fe9d8cb16e97b0fe', 'organization1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
