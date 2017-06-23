-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2015 at 07:47 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE IF NOT EXISTS `edit` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `roll_no` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `hobby` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `edit`
--

INSERT INTO `edit` (`id`, `roll_no`, `name`, `father_name`, `hobby`) VALUES
(1, 12331112, 'sudhanshu123', 'kamlesh sharma', 'playing chess'),
(2, 2343242, 'mohan gupta', 'sohan lal', 'listening music'),
(3, 234432, 'geeta singh', 'Ram kumar', 'dancing'),
(4, 34543, 'Sumit kumar', 'Salman khan', 'music'),
(5, 2342, 'krish', 'neeraj rao', 'study'),
(6, 3453453, 'diksha', 'harinder oberoi', 'reading'),
(7, 234234, 'krish', 'neeraj rao', 'study'),
(8, 3453453, 'diksha', 'harinder oberoi', 'reading');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
