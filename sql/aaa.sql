-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 04:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`, `date_created`) VALUES
(1, 'Stephen', 'a@a.com', '123456', 1, '2021-09-09 21:14:56'),
(2, 'popodu stephen', 's@s.com', '123456', 3, '2021-09-13 09:59:32'),
(3, 'Peter Samuel Oche', 'p@p.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '2021-11-20 20:57:16'),
(4, 'Bola Shade', 'b@b.com', '123456', 3, '2022-08-14 19:44:29'),
(5, 'Davi Petty', 'd@d.com', '123456', 3, '2022-08-15 13:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `session_log`
--

CREATE TABLE `session_log` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `message` varchar(200) NOT NULL,
  `system_name` varchar(200) NOT NULL,
  `system_ip` varchar(30) NOT NULL,
  `system_server` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_log`
--

INSERT INTO `session_log` (`id`, `user_id`, `message`, `system_name`, `system_ip`, `system_server`, `date_created`) VALUES
(2, 5, 'Just Viewed all users', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:34:08'),
(3, 5, 'Just Accessed Profile', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:34:57'),
(12, 5, 'Just Updated Profile Password', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:41:51'),
(16, 5, 'Just Updated Profile Password', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:44:53'),
(17, 5, 'Just Accessed Profile', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:44:53'),
(18, 5, 'Just Accessed Dashboard', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:45:27'),
(19, 5, 'Just Accessed Dashboard', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:45:44'),
(20, 5, 'Just Viewed all users', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:45:47'),
(21, 5, 'Just Logged out', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 13:46:08'),
(22, 0, 'Just logged in', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:20:39'),
(23, 5, 'Just Accessed Dashboard', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:20:39'),
(24, 5, 'Just Accessed Profile', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:20:41'),
(25, 5, 'Just Updated Profile Password', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:20:47'),
(26, 5, 'Just Accessed Profile', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:20:47'),
(27, 5, 'Just Accessed Dashboard', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:20:49'),
(28, 5, 'Just Logged out', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:09'),
(29, 0, 'Just logged in', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:18'),
(30, 4, 'Just Accessed Dashboard', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:18'),
(31, 4, 'Just Accessed Dashboard', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:20'),
(32, 4, 'Just Viewed all users', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:24'),
(33, 4, 'Just Accessed Profile', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:30'),
(34, 4, 'Just Accessed Dashboard', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:32'),
(35, 4, 'Just Logged out', 'CODE-PREACHER', '::1', 'localhost', '2022-08-15 14:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `phone`, `address`, `date_created`) VALUES
(1, 'popodu stephen', 's@s.com', '123456', 'MALE', '08136473738', 'London', '2021-09-13 08:59:31'),
(2, 'Peter Samuel Oche', 'p@p.com', 'e10adc3949ba59abbe56e057f20f883e', 'MALE', '08136473738', '61 boniface street', '2021-11-20 19:57:16'),
(4, 'Bola Shade', 'b@b.com', '123456', 'MALE', '08136473738', '61 boniface street', '2022-08-14 18:44:29'),
(5, 'Davi Petty', 'd@d.com', '123456', 'MALE', '08162023360', 'Texas,London', '2022-08-15 14:20:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_log`
--
ALTER TABLE `session_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session_log`
--
ALTER TABLE `session_log`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
