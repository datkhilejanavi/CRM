-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 07:18 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuscomplaint`
--

CREATE TABLE IF NOT EXISTS `cuscomplaint` (
  `complaintid` int(10) NOT NULL AUTO_INCREMENT,
  `complaintdate` datetime NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `complaintsub` varchar(100) NOT NULL,
  `complaint` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `fnamew` varchar(100) CHARACTER SET utf8 NOT NULL,
  `workerdis` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `compstatus` int(11) NOT NULL,
  `coppriority` int(11) NOT NULL,
  PRIMARY KEY (`complaintid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cuscomplaint`
--

INSERT INTO `cuscomplaint` (`complaintid`, `complaintdate`, `fname`, `complaintsub`, `complaint`, `fnamew`, `workerdis`, `compstatus`, `coppriority`) VALUES
(1, '0000-00-00 00:00:00', '', '', '', '', '', 0, 0),
(2, '0000-00-00 00:00:00', '1', '', 'speed plan not working.', '', '', 0, 0),
(3, '0000-00-00 00:00:00', '2', '', 'speed plan not working.', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `newconnection`
--

CREATE TABLE IF NOT EXISTS `newconnection` (
  `bill` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `transactiontype` varchar(10) NOT NULL,
  `plan` varchar(50) CHARACTER SET utf8 NOT NULL,
  `planstartdate` date NOT NULL,
  `planenddate` date NOT NULL,
  `fnameworker` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`bill`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newconnection`
--

INSERT INTO `newconnection` (`bill`, `fname`, `transactiontype`, `plan`, `planstartdate`, `planenddate`, `fnameworker`) VALUES
(1, '1', '', '2', '2022-03-07', '2022-03-27', '2'),
(2, '', '', '2', '2022-03-03', '2022-03-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE IF NOT EXISTS `personalinfo` (
  `perid` int(10) NOT NULL AUTO_INCREMENT,
  `actype` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mb` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 NOT NULL,
  `altmb` int(15) NOT NULL,
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (`perid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`perid`, `actype`, `fname`, `mb`, `email`, `address`, `altmb`, `datetime`) VALUES
(1, 'Employee', 'Janavi', '9087654321', 'jd@gmail.com', 'junnar', 410502, '2022-03-18 16:03:17'),
(2, 'Customer', 'apeksha', '9087654321', 'appu@yahoo.com', 'Pune', 1234567890, '2022-03-18 16:35:35'),
(3, 'Worker', 'anisha', '1234567890', 'anisha@gmail.com', 'mumbai', 2147483647, '2022-03-19 06:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `idregister` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mb` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cpsw` varchar(50) CHARACTER SET utf8 NOT NULL,
  `otp` varchar(10) CHARACTER SET utf8 NOT NULL,
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (`idregister`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`idregister`, `fname`, `mb`, `email`, `password`, `cpsw`, `otp`, `datetime`) VALUES
(1, 'janavi', '1234567890', 'jd@gmail.com', 'Janavi', 'mnbvc', '', '2022-03-14 07:45:18'),
(2, 'janavi1', '9012345678', 'janavi@gmail.com', 'Janavi@123', 'Janavi@123', '5592', '2022-03-14 08:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblplantype`
--

CREATE TABLE IF NOT EXISTS `tblplantype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `splimit` varchar(20) NOT NULL,
  `planprice` int(10) NOT NULL,
  `duration` varchar(20) CHARACTER SET utf8 NOT NULL,
  `photo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblplantype`
--

INSERT INTO `tblplantype` (`id`, `pname`, `splimit`, `planprice`, `duration`, `photo`) VALUES
(1, '50mp', '20mb', 2500, '56', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
