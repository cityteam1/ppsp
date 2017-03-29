-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: danny-ppsp.cz50ssaj4gve.ap-southeast-1.rds.amazonaws.com
-- Generation Time: Mar 27, 2017 at 02:39 AM
-- Server version: 5.6.27-log
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `actitive`
--

CREATE TABLE `actitive` (
  `ACT_ID` int(11) NOT NULL,
  `CATE_CD` varchar(2) NOT NULL,
  `ACT_DATE` date NOT NULL,
  `START_TIME` time NOT NULL,
  `END_TIME` time NOT NULL,
  `LOCATION` varchar(255) NOT NULL,
  `NO_PPL` decimal(3,0) NOT NULL,
  `MAX_NO_PPL` decimal(3,0) NOT NULL,
  `INFO` varchar(255) NOT NULL,
  `CREATE_USR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actitive`
--

INSERT INTO `actitive` (`ACT_ID`, `CATE_CD`, `ACT_DATE`, `START_TIME`, `END_TIME`, `LOCATION`, `NO_PPL`, `MAX_NO_PPL`, `INFO`, `CREATE_USR_ID`) VALUES
(1, 'FB', '2017-03-02', '05:00:00', '10:00:00', 'North Point', '3', '30', 'Let\'s Play Football', 2),
(2, 'BK', '2017-03-14', '06:24:20', '11:00:00', 'Chai Wan', '20', '20', 'Let\'s Play Basketball', 3),
(4, 'FB', '2017-03-17', '05:43:00', '06:43:00', 'Kowloon Bay', '1', '30', 'Let\'s Play Football', 5),
(8, 'BK', '2017-03-25', '01:02:00', '02:02:00', 'Kowloon Tong', '2', '22', 'Demo', 7),
(10, 'BK', '2017-03-24', '01:01:00', '02:02:00', '204', '1', '204', 'It accept GIRLS only', 1),
(11, 'CL', '2017-03-14', '03:45:00', '03:24:00', 'Hong kong ', '2', '5', 'aaaaa', 4),
(12, 'BK', '2017-03-24', '01:01:00', '01:01:00', 'test', '1', '20', 'test', 1),
(13, 'RB', '2017-05-20', '11:00:00', '12:00:00', 'Tai Po', '2', '30', 'Let\'s Play Rugby!!', 1),
(14, 'TN', '2018-01-01', '17:00:00', '18:00:00', 'Tai Po', '1', '4', 'Contact: Mr Chan 28876028', 1),
(15, 'TN', '2017-03-15', '03:35:00', '05:32:00', 'tai koo', '2', '4', 'Hello', 8),
(16, 'GF', '2017-03-23', '12:00:00', '13:00:00', 'Hong Kong', '1', '2', 'demo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lkp_category`
--

CREATE TABLE `lkp_category` (
  `CATE_CD` varchar(2) NOT NULL,
  `CATE_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_category`
--

INSERT INTO `lkp_category` (`CATE_CD`, `CATE_NAME`) VALUES
('BK', 'Basketball'),
('FB', 'Football'),
('TN', 'Tennis'),
('GF', 'Golf'),
('CY', 'Cycling'),
('CL', 'Climbing'),
('RB', 'Rugby');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(1, 'Admin', 'Admin@admin.com', '$2y$10$7mORbhli9MUXdpQRNMhnMu6LSnzAyEVDfv0QSvbduDBhYIqrJPnk2', 'default.jpg', '2017-03-13 09:49:43', NULL, 1, 0, 0),
(4, 'peter', 'peter@user.com', '$2y$10$O9eT5psliqBFBGZc3dT96e2umf0tw6qUcWVrh/DIO0IzxzUXF6ubS', 'default.jpg', '2017-03-24 05:38:08', NULL, 0, 0, 0),
(6, 'User1', 'User1@User1.com', '$2y$10$ovoHOOiqsS7xs76f6JGEBO5v5j6aD1tsIm8h/DWI0uT1vmCGeKduu', 'default.jpg', '2017-03-24 18:03:18', NULL, 0, 0, 0),
(7, 'kchau', 'kctest@test.com', '$2y$10$JonizR55/N6OAPQEqI7rweNqEGubE619tSqghb2JgDXYTSztuwPZ6', 'default.jpg', '2017-03-24 19:55:45', NULL, 1, 0, 0),
(8, 'Mary', 'Mary@user.com', '$2y$10$YYJ.Z5RFVhDEF3xW61Kf6un5.ChbvdFCvN59SQQvhi2rdLce0TKrC', 'default.jpg', '2017-03-24 21:03:03', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `USER_EVENT`
--

CREATE TABLE `USER_EVENT` (
  `USER_ID` int(8) NOT NULL,
  `EVENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER_EVENT`
--

INSERT INTO `USER_EVENT` (`USER_ID`, `EVENT_ID`) VALUES
(4, 7),
(8, 7),
(8, 6),
(8, 5),
(7, 8),
(7, 8),
(7, 9),
(1, 3),
(2, 3),
(1, 9),
(1, 10),
(4, 11),
(4, 11),
(1, 12),
(4, 1),
(1, 8),
(1, 13),
(1, 14),
(8, 15),
(4, 15),
(4, 16),
(4, 13),
(4, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actitive`
--
ALTER TABLE `actitive`
  ADD PRIMARY KEY (`ACT_ID`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actitive`
--
ALTER TABLE `actitive`
  MODIFY `ACT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
