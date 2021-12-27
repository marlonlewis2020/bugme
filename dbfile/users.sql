-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 09:17 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_joined` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `date_joined`) VALUES
(1, 'Admin', 'Project 2', '$2y$10$CD6CU7pIwosQ65DzHp/EL.BDOabl/s1XaVJqSPn.3tQPslyGnrwri', 'admin@project2.com', '2021-11-14 00:00:00'),
(17, 'marlon', 'lewis', '$2y$10$/G9wN9RZoLhrYF02zOlPFuVR2FmoUrECtAPD2okIAbANyfbORdMQC', 'marlonlewis483@gmail.com', '2021-12-04 07:30:03'),
(4, 'info2180', 'web development', '$2y$10$v2pEgEw./SNyPNAdKp33n.VRioHiRewHTHcZNPpwAtrNslrwCO.oO', 'info2180@gmail.com', '2021-11-19 09:12:12'),
(5, 'test2', 'user2', '$2y$10$KKqSM40u4AvQ97lNl50zr.qFh472KCU4zJmJwDRuYsbg2LzQu52Fu', 'test2@gmail.com', '2021-11-19 09:14:09'),
(6, 'test3', 'user3', '$2y$10$Jhu4NtUlqp7GOg6SlsyQquVGFz0ZkM4UWYGZttEAJAK1eT9QZIfeW', 'test3@gmail.com', '2021-11-19 09:16:30'),
(7, 'test4', 'user4', '$2y$10$2OrNaGGPAgGUEDzSM05DUuLiIjBXg7Uy96X6DldUuXz/EpnlKNluS', 'test4@gmail.com', '2021-11-19 09:17:43'),
(8, 'john', 'jacobs', '$2y$10$pegu/pBjeZK.V3K/PWM8gOqXtktLGktIYJBPeNkZZFbPQUK6EYV3i', 'john@gmail.com', '2021-11-19 09:20:30'),
(9, 'mary', 'seacole', '$2y$10$TEQbKlVKEHkLKbuRC.KdFeWHf1mU2GJJi8nEKRWVGmMlgFOYFMoOK', 'mary@gmail.co', '2021-11-19 09:22:28'),
(10, 'alex', 'paul', '$2y$10$muQ.N1Y2qMYSd5qngBMKZOOyWIHJSXOzD5AvLfcuXg0Bw.j1.vV0S', 'paul@gmail.com', '2021-11-19 09:24:20'),
(11, 'how', 'old', '$2y$10$OH7vayvrDYmL8FVE8E6Jbuy7CzJ7aHTKkSLWkU.NGnr8Q9LCy6xpm', 'how@mail.com', '2021-11-19 09:26:21'),
(12, 'pop', 'popp', '$2y$10$JWCjzek9flNf7rfhTiB.LuHkVTuw6uECeMa84R4DqkN8a//8BllsS', 'pop@mail.com', '2021-11-19 09:30:18'),
(13, 'him', 'her', '$2y$10$k7CKXYXIR6Tsq/T5RWO1f.Uodj9XcSIPQoyYaaMgmaXEJYsDNIHQu', 'him@her.com', '2021-11-19 09:38:39'),
(14, 'me', 'you', '$2y$10$WZGqMTWYqoaFrnnCszMl.ul25S4rdYI2B.g/k0xA9TApsR9fZSIcy', 'me@you.com', '2021-11-19 09:42:52'),
(15, 'pan', 'pot', '$2y$10$lyhMTH6iA9UmWaGPNI0vr.wf6r6hZ7bsC3m6IQo5Qh/sQ2TDGL9Me', 'pan@pot.com', '2021-11-19 09:45:19'),
(16, 'maroon', 'five', '$2y$10$BY6hakhj3PrMQpM58soAd.SF5Bfzc.BsaYSicBeFRDm9WInx.82A.', 'maroon5@gmail.com', '2021-12-04 06:52:41'),
(18, 'john', 'door', '$2y$10$.Q/Yyp6Yya.SbToHer8/R.bpVSMyo.iLYHCFCLX0.Jhe.Ggxkh4iS', 'robinhood@gmail.com', '2021-12-04 11:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
