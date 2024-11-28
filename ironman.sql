-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2024 at 01:53 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iron-man`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(30) NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'admin@gmail.com', 'password', '2024-11-18 06:07:25', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

DROP TABLE IF EXISTS `clothes`;
CREATE TABLE IF NOT EXISTS `clothes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `cloth_count` int NOT NULL,
  `cost_per_cloth` decimal(10,2) NOT NULL,
  `total_income` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `payment` decimal(10,0) NOT NULL,
  `cloths_done` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `date`, `customer_name`, `cloth_count`, `cost_per_cloth`, `total_income`, `status`, `payment`, `cloths_done`) VALUES
(1, '2024-11-22', 'Ramesh Kale', 20, 10.00, 200.00, 'Pending', 0, 0),
(2, '2024-11-26', 'Kajal Pandey', 15, 10.00, 150.00, 'Pending', 0, 0),
(3, '2024-11-26', 'Raju Sheth', 10, 10.00, 100.00, 'Pending', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
