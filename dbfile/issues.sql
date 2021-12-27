-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 09:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugme`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(10) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(40) NOT NULL,
  `priority` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `assigned_to` int(5) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `type`, `priority`, `status`, `assigned_to`, `created_by`, `created`, `updated`) VALUES
(2, 'new isue', 'new issue test', 'bug', 'minor', 'Closed', 1, 17, '2021-12-04 05:03:12', '2021-12-04 14:02:50'),
(3, 'New Issue Test', 'New Issue test', 'bug', 'minor', 'In Progress', 1, 17, '2021-12-04 05:26:33', '2021-12-04 14:14:40'),
(11, 'Another issue', 'Another issue description', 'bug', 'minor', 'Closed', 1, 1, '2021-12-04 16:32:59', '2021-12-04 16:39:21'),
(12, 'hg g ygiuhn', ' tgo78 hoim', 'bug', 'minor', 'open', 17, 1, '2021-12-04 16:39:45', '2021-12-04 16:39:45'),
(13, 'Hello', 'Found a bug. Fix it', 'bug', 'minor', 'open', 1, 1, '2021-12-04 16:44:30', '2021-12-04 16:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
