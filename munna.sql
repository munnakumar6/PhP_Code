-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2022 at 03:46 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `munna`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `classid` int(11) NOT NULL AUTO_INCREMENT,
  `class` int(11) NOT NULL,
  PRIMARY KEY (`classid`),
  UNIQUE KEY `class` (`class`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `class`) VALUES
(1, 10),
(2, 11),
(3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `Districtid` int(11) NOT NULL AUTO_INCREMENT,
  `Districtname` varchar(20) NOT NULL,
  PRIMARY KEY (`Districtid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`Districtid`, `Districtname`) VALUES
(1, 'siwan'),
(2, 'patna'),
(3, 'saran'),
(4, ''),
(5, 'Raxul'),
(6, 'Motihari'),
(7, 'Dhanbad'),
(8, 'Danapur');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `divisionid` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(20) NOT NULL,
  PRIMARY KEY (`divisionid`),
  UNIQUE KEY `division` (`division`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`divisionid`, `division`) VALUES
(1, 'first division'),
(2, 'second division'),
(3, 'Third division');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `username`, `password`) VALUES
(1, 'Amar', 'amar@gmail.com', '123456'),
(2, 'munna', 'munna@gmail.com', '123456'),
(3, 'Anjali', 'anjali@gmail.com', '123456'),
(4, 'chandan', 'chandan@gmail.com', '123456'),
(5, 'chinmay', 'chinmay@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studentid` int(11) NOT NULL AUTO_INCREMENT,
  `studentname` varchar(20) NOT NULL,
  `classid` int(11) NOT NULL,
  `districtid` int(11) NOT NULL,
  `divisionid` int(11) NOT NULL,
  PRIMARY KEY (`studentid`),
  KEY `student_class` (`classid`),
  KEY `stud_dist` (`districtid`),
  KEY `stud_div` (`divisionid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `classid`, `districtid`, `divisionid`) VALUES
(11, 'Abhay Kumar', 2, 3, 2),
(12, 'Ajit Kumar', 1, 2, 3),
(13, 'Aditya kumar', 2, 3, 1),
(14, 'Aryan kumar', 3, 1, 1),
(15, 'Aadarsh kumar', 1, 3, 2),
(16, 'Ashok kumar', 2, 1, 1),
(18, 'Abhinav kumar', 1, 2, 3),
(19, 'Amit kumar', 3, 3, 2),
(21, 'Anand', 2, 3, 3),
(22, 'Anjali', 3, 5, 2),
(23, 'Gautam', 3, 2, 3),
(24, 'Nishchay', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

DROP TABLE IF EXISTS `studentdetails`;
CREATE TABLE IF NOT EXISTS `studentdetails` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `mobno` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`Id`, `firstname`, `lastname`, `city`, `mobno`) VALUES
(1, 'amar', 'anand', 'patna', '9874563210'),
(2, 'munna', 'kumar', 'patna', '1236547895'),
(3, 'anjali', 'kumari', 'raxul', '999999999'),
(4, 'chandan', 'kumar', 'patna', '123456987'),
(5, 'chinmay', 'biswal', 'patna', '9852302764'),
(6, 'ramesh', 'mahesh', 'raxul', '1236547896');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `stud_class` FOREIGN KEY (`classid`) REFERENCES `class` (`classid`),
  ADD CONSTRAINT `stud_dist` FOREIGN KEY (`districtid`) REFERENCES `district` (`Districtid`),
  ADD CONSTRAINT `stud_div` FOREIGN KEY (`divisionid`) REFERENCES `division` (`divisionid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
