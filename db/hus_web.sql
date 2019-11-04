-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2019 at 03:58 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hus_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `ability_dictionary`
--

DROP TABLE IF EXISTS `ability_dictionary`;
CREATE TABLE IF NOT EXISTS `ability_dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ability_type`
--

DROP TABLE IF EXISTS `ability_type`;
CREATE TABLE IF NOT EXISTS `ability_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_ability`
--

DROP TABLE IF EXISTS `intern_ability`;
CREATE TABLE IF NOT EXISTS `intern_ability` (
  `intern_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `rate` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  KEY `intern_id` (`intern_id`),
  KEY `ability_id` (`ability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_profile`
--

DROP TABLE IF EXISTS `intern_profile`;
CREATE TABLE IF NOT EXISTS `intern_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(150) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `intern_id` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `join_date` date NOT NULL,
  `class_name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `intern_profile`
--

INSERT INTO `intern_profile` (`id`, `password`, `intern_id`, `first_name`, `last_name`, `phone`, `email`, `date_of_birth`, `join_date`, `class_name`) VALUES
(1, '2cf24dba5fb0a30e26e83b2ac5b9e29e1b161e5c1fa7425e73043362938b9824', '123456', 'Tran', 'Nga', 1222222, 'phong672006@gmail.com', '2019-11-12', '2019-11-21', 'K61A3'),
(3, '111111', '111111', 'Tran', 'Nga', 44444, 'tt@gmail.com', '2019-11-12', '2019-11-21', 'K61A3'),
(4, '$2y$10$qVqn6bxU7uD/VRsZ5lKyueFv73WUBShpDEKmu4Lr1h7mAl4Avgp5a', 'ngatt', 'Tráº§n', 'Phong', 1234444, 'phong672006@gmail.com', '2019-11-05', '2019-11-12', 'K61A3');

-- --------------------------------------------------------

--
-- Table structure for table `organization_profile`
--

DROP TABLE IF EXISTS `organization_profile`;
CREATE TABLE IF NOT EXISTS `organization_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name_organization` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `employee_count` int(11) NOT NULL,
  `gross_revenue` int(11) NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `contact` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tax_number` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intern_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `intern_id` (`intern_id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `position` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_ability`
--

DROP TABLE IF EXISTS `request_ability`;
CREATE TABLE IF NOT EXISTS `request_ability` (
  `request_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `ability_required` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  KEY `request_id` (`request_id`),
  KEY `ability_id` (`ability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_profile`
--

DROP TABLE IF EXISTS `teacher_profile`;
CREATE TABLE IF NOT EXISTS `teacher_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
