-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2020 at 09:54 AM
-- Server version: 5.7.26
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_reference_id` char(36) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_confirmed` bit(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cart_reference_id`, `product_id`, `quantity`, `amount`, `stamp`, `is_confirmed`) VALUES
(12, 'DF967516-A944-3594-29E8-8E4DDB7F6FC3', 53, 3, '82.38', '2020-02-26 12:48:14', b'1'),
(19, '5B2A46EA-83F1-950F-02F7-2F7BBED193D2', 62, 1, '24.95', '2020-02-26 18:04:40', b'0'),
(20, '5B2A46EA-83F1-950F-02F7-2F7BBED193D2', 63, 1, '7.95', '2020-02-26 18:18:39', b'0'),
(21, '0E14F5F3-9C1A-15C5-2219-C6D9CFA4FC8F', 53, 2, '49.43', '2020-02-27 06:58:56', b'0'),
(22, '0E14F5F3-9C1A-15C5-2219-C6D9CFA4FC8F', 63, 1, '7.95', '2020-02-27 06:53:19', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `code`, `rate`, `name`) VALUES
(3, 'USD', '0.12', 'US dolloar');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

DROP TABLE IF EXISTS `delivery_charges`;
CREATE TABLE IF NOT EXISTS `delivery_charges` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `charges` decimal(10,2) DEFAULT NULL,
  `min_amount` decimal(10,2) NOT NULL,
  `max_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`id`, `name`, `charges`, `min_amount`, `max_amount`) VALUES
(1, 'Under $50', '4.95', '0.00', '49.99'),
(2, 'Under $90', '2.95', '50.00', '89.99'),
(3, 'Above $90', '0.00', '90.00', '99999.99');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_code`, `price`) VALUES
(53, 'Red Widget', 'R01', '32.95'),
(62, 'Green Widget', 'G01', '24.95'),
(63, 'Blue Widget', 'B01', '7.95');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
