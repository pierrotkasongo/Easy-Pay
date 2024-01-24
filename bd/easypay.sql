-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2021 at 05:48 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easypay`
--

-- --------------------------------------------------------

--
-- Table structure for table `presence`
--

CREATE TABLE `presence` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `REGDATE` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `MONTH` varchar(255) DEFAULT NULL,
  `YEAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presence`
--

INSERT INTO `presence` (`ID`, `ID_USER`, `REGDATE`, `STATUS`, `MONTH`, `YEAR`) VALUES
(1, 2, 'dsfdsc', 1, '10', '21'),
(2, 2, '21/10/14', 1, '10', '21'),
(3, 2, '21/10/14', 1, '10', '21'),
(4, 2, '21/10/14', 1, '10', '21'),
(5, 2, '21/10/14', 1, '10', '21'),
(6, 2, '21/10/14', 1, '10', '21'),
(7, 2, '21/10/14', 1, '10', '21'),
(8, 2, '21/10/14', 1, '10', '21'),
(9, 2, '21/10/14', 1, '10', '21'),
(10, 2, '21/10/14', 1, '10', '21'),
(11, 2, '21/10/14', 1, '10', '21'),
(12, 2, '21/10/14', 1, '10', '21'),
(13, 2, '21/10/14', 1, '10', '21'),
(14, 2, '21/10/14', 1, '10', '21'),
(15, 2, '21/10/14', 1, '10', '21'),
(16, 2, '21/10/14', 1, '10', '21'),
(17, 2, '21/10/14', 1, '10', '21'),
(18, 3, '21/10/14', 1, '10', '21'),
(19, 4, '21/10/14', 1, '10', '21');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `REGDATE` varchar(255) DEFAULT NULL,
  `AMOUNT` double DEFAULT NULL,
  `MONTH` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `YEAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `ID_USER`, `REGDATE`, `AMOUNT`, `MONTH`, `STATUS`, `YEAR`) VALUES
(1, 2, '21/10/14', 267.32, '10', 1, '21'),
(2, 3, '21/10/14', 66.83, '10', 1, '21'),
(3, 4, '21/10/14', 66.83, '10', 1, '21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `FIRSTNAME` varchar(255) DEFAULT NULL,
  `LASTNAME` varchar(255) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `REGDATE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `EMAIL`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `ROLE`, `REGDATE`) VALUES
(1, 'jonathan@exalt.cd', '123456789', 'jonathan', 'konde', 1, NULL),
(2, 'patricia@exalt.cd', '123456789', 'patricia', 'konde', 2, NULL),
(3, 'kagame@exalt.cd', '123456789', 'paul', 'kagame', 2, NULL),
(4, 'chris@exalt.cd', '123456789', 'chris', 'konde', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_AVOIR` (`ID_USER`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_POSSEDER` (`ID_USER`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `FK_AVOIR` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `FK_POSSEDER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
