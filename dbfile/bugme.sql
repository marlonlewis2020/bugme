-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 10:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: "bugme"
--

-- --------------------------------------------------------

--
-- Table structure for table "issues"
--

CREATE TABLE `issues` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `title` varchar(45) NOT NULL,
 `description` text NOT NULL,
 `type` varchar(40) NOT NULL,
 `priority` varchar(30) NOT NULL,
 `status` varchar(30) NOT NULL,
 `assigned_to` int(5) NOT NULL,
 `created_by` int(5) NOT NULL,
 `created` datetime NOT NULL,
 `updated` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table "issues"
--

INSERT INTO "issues" ("id", "title", "description", "type", "priority", "status", "assigned_to", "created_by", "created", "updated") VALUES
(1, 'test', 'test description', 'type1', 'high', 'pending', 1, 1, '2021-11-15 16:31:32', '2021-11-15 16:31:32');

-- --------------------------------------------------------

--
-- Table structure for table "users"
--

CREATE TABLE `users` (
 `id` int(5) NOT NULL AUTO_INCREMENT,
 `firstname` varchar(25) NOT NULL,
 `lastname` varchar(25) NOT NULL,
 `password` varchar(256) NOT NULL,
 `email` varchar(50) NOT NULL,
 `date_joined` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table "users"
--

INSERT INTO "users" ("id", "firstname", "lastname", "password", "email", "date_joined") VALUES
(1, 'Admin', 'Project 2', '$2y$10$CD6CU7pIwosQ65DzHp/EL.BDOabl/s1XaVJqSPn.3tQPslyGnrwri', 'admin@project2.com', '2021-11-14 00:00:00');


--
-- Metadata
--
USE phpmyadmin;

--
-- Metadata for table issues
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table users
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for database bugme
--
-- Error reading data for table phpmyadmin.pma__bookmark: #1100 - Table 'pma__bookmark' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__relation: #1100 - Table 'pma__relation' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__savedsearches: #1100 - Table 'pma__savedsearches' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__central_columns: #1100 - Table 'pma__central_columns' was not locked with LOCK TABLES
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
