-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: נובמבר 25, 2021 בזמן 08:56 PM
-- גרסת שרת: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `customer_list_tbl`
--

DROP TABLE IF EXISTS `customer_list_tbl`;
CREATE TABLE IF NOT EXISTS `customer_list_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` int(11) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- הוצאת מידע עבור טבלה `customer_list_tbl`
--

INSERT INTO `customer_list_tbl` (`id`, `id_number`, `first_name`, `last_name`, `dob`, `gender_id`, `phone`) VALUES
(1, 123456789, 'Gal', 'Levi', '2010-10-10', 1, '511222333'),
(2, 987654321, 'Yael', 'Choen', '2016-06-06', 2, '47851114'),
(3, 652148745, 'Tal', 'Gefen', '2003-10-03', 2, '23366554');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `gender_tbl`
--

DROP TABLE IF EXISTS `gender_tbl`;
CREATE TABLE IF NOT EXISTS `gender_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- הוצאת מידע עבור טבלה `gender_tbl`
--

INSERT INTO `gender_tbl` (`id`, `type_name`) VALUES
(1, 'male'),
(2, 'female');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
