-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2022 at 01:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aemail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@appointment.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appoid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL,
  PRIMARY KEY (`appoid`),
  KEY `pid` (`pid`),
  KEY `scheduleid` (`scheduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(1, 1, 1, 1, '2022-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecid` int(11) NOT NULL AUTO_INCREMENT,
  `lecemail` varchar(255) DEFAULT NULL,
  `lecname` varchar(255) DEFAULT NULL,
  `lecpassword` varchar(255) DEFAULT NULL,
  `lecnic` varchar(15) DEFAULT NULL,
  `lectel` varchar(15) DEFAULT NULL,
  `specialties` int(2) DEFAULT NULL,
  PRIMARY KEY (`lecid`),
  KEY `specialties` (`specialties`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecid`, `lecemail`, `lecname`, `lecpassword`, `lecnic`, `lectel`, `specialties`) VALUES
(1, 'lecturer@appointment.com', 'Test lecturer', '123', '000000000', '0110000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(1, 'client@appointment.com', 'Test client', '123', 'Sri Lanka', '0000000000', '2000-01-01', '0120000000'),
(2, 'emhashenudara@gmail.com', 'Hashen Udara', '123', 'Sri Lanka', '0110000000', '2022-06-03', '0700000000');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `scheduleid` int(11) NOT NULL AUTO_INCREMENT,
  `lecid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL,
  PRIMARY KEY (`scheduleid`),
  KEY `lecid` (`lecid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `lecid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(1, '1', 'Test Session', '2050-01-01', '18:00:00', 50),
(2, '1', '1', '2022-06-10', '20:36:00', 1),
(3, '1', '12', '2022-06-10', '20:33:00', 1),
(4, '1', '1', '2022-06-10', '12:32:00', 1),
(5, '1', '1', '2022-06-10', '20:35:00', 1),
(6, '1', '12', '2022-06-10', '20:35:00', 1),
(7, '1', '1', '2022-06-24', '20:36:00', 1),
(8, '1', '12', '2022-06-10', '13:33:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES

(1, 'Professor of Mathematics'),
(2, 'Professor of Computer Science'),
(3, 'Professor of Literature'),
(4, 'Professor of History'),
(5, 'Professor of Economics'),
(6, 'Professor of Psychology'),
(7, 'Professor of Sociology'),
(8, 'Professor of Physics'),
(9, 'Professor of Chemistry'),
(10, 'Professor of Biology'),
(11, 'Professor of Philosophy'),
(12, 'Professor of Linguistics'),
(13, 'Professor of Political Science'),
(14, 'Professor of Anthropology'),
(15, 'Professor of Environmental Science'),
(16, 'Professor of Business Administration'),
(17, 'Professor of Fine Arts'),
(18, 'Professor of Music'),
(19, 'Professor of Education'),
(20, 'Professor of Law'),
(21, 'Professor of Communication Studies'),
(22, 'Professor of Architecture'),
(23, 'Professor of Engineering'),
(24, 'Professor of Geography'),
(25, 'Professor of Sociology'),
(26, 'Professor of Media Studies'),
(27, 'Professor of Philosophy'),
(28, 'Professor of Literature'),
(29, 'Professor of Psychology'),
(30, 'Professor of Anthropology'),
(31, 'Professor of Economics'),
(32, 'Professor of Political Science'),
(33, 'Professor of History'),
(34, 'Professor of Linguistics'),
(35, 'Professor of Environmental Science'),
(36, 'Professor of Business Administration'),
(37, 'Professor of Fine Arts'),
(38, 'Professor of Music'),
(39, 'Professor of Education'),
(40, 'Professor of Law'),
(41, 'Professor of Communication Studies'),
(42, 'Professor of Architecture'),
(43, 'Professor of Engineering'),
(44, 'Professor of Geography'),
(45, 'Professor of Sociology'),
(46, 'Professor of Media Studies'),
(47, 'Professor of Philosophy'),
(48, 'Professor of Literature'),
(49, 'Professor of Psychology'),
(50, 'Professor of Anthropology'),
(51, 'Professor of Economics'),
(52, 'Professor of Political Science'),
(53, 'Professor of History'),
(54, 'Professor of Linguistics'),
(55, 'Professor of Environmental Science'),
(56, 'Professor of Business Administration');
-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

DROP TABLE IF EXISTS `webuser`;
CREATE TABLE IF NOT EXISTS `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@appointment.com', 'a'),
('lecturer@appointment.com', 'd'),
('client@appointment.com', 'p'),
('emhashenudara@gmail.com', 'p');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
