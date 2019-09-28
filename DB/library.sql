-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2019 at 08:38 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_deatils`
--

DROP TABLE IF EXISTS `admin_deatils`;
CREATE TABLE IF NOT EXISTS `admin_deatils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_deatils`
--

INSERT INTO `admin_deatils` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

DROP TABLE IF EXISTS `book_details`;
CREATE TABLE IF NOT EXISTS `book_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'available',
  `book_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_no` (`book_no`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`id`, `type`, `author`, `status`, `book_no`, `name`) VALUES
(23, 'poem', 'author 1', 'available', '8', 'book 8'),
(22, 'shortstory', 'author 7', 'available', '7', 'book 7'),
(17, 'novel', 'author 2', 'available', '2', 'book 2'),
(16, 'novel', 'author 1', 'available', '1', 'book 1');

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

DROP TABLE IF EXISTS `book_request`;
CREATE TABLE IF NOT EXISTS `book_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'librarian need to approve',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`id`, `book_id`, `book_name`, `student_id`, `student_name`, `status`) VALUES
(19, 22, 'book 7', 6, 'jishnu', 'REJECT'),
(20, 23, 'book 8', 6, 'jishnu', 'Approved'),
(21, 20, 'book 5', 6, 'jishnu', 'Approved'),
(22, 17, 'book 2', 6, 'jishnu', 'REJECT'),
(23, 22, 'book 7', 6, 'jishnu', 'REJECT');

-- --------------------------------------------------------

--
-- Table structure for table `librarian_details`
--

DROP TABLE IF EXISTS `librarian_details`;
CREATE TABLE IF NOT EXISTS `librarian_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian_details`
--

INSERT INTO `librarian_details` (`id`, `name`, `email`, `gender`, `address`, `password`, `telephone`, `dob`, `status`) VALUES
(5, 'fadhil', 'fadhil@gmail.com', 'male', 'Koyilandi', '1', 8086619393, '2019-11-11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Rejected',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `name`, `email`, `gender`, `address`, `password`, `telephone`, `dob`, `status`) VALUES
(6, 'jishnu', 'jishnu@gmail.com', 'male', 'kozhikode', '1', 9876543210, '2019-09-12', 'Rejected');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
