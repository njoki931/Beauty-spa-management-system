-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 02:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` bigint(11) DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Services`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(2, '985645887', 'Sulaita Vernela', 'vernela@gmail.com', 4654654654, '7/29/2021', '4:30pm', 'Deluxe Pedicure', '2021-07-26 05:04:38', 'Rejected', '2', '2021-07-26 06:47:04'),
(3, '965887988', 'Jain Gloria', 'gloria@gmail.com', 5646464646, '6/20/2021', '2:30pm', 'Loreal Hair Color(Full)', '2021-06-19 12:35:30', 'we will wait', '1', '2021-06-19 13:37:39'),
(6, '621107928', 'Tracy Peace', 'peace@gmail.com', 1234567890, '6/27/2021', '1:30am', 'Rebonding', '2021-06-21 16:22:25', 'Testing', '2', '2021-06-21 16:24:10'),
(7, '252539813', 'Don Williams', 'williams@gmail.com', 770546590, '06/18/2021', '3:00pm', 'Layer Haircut', '2021-06-12 10:25:50', 'well accepted', '1', '2021-07-24 12:18:39'),
(8, '402172811', 'Tracy Peace', 'peace@gmail.com', 770546590, '11/06/2021', '12:30am', 'U-Shape Hair Cut', '2021-06-18 07:18:00', '', '', '2021-07-09 15:56:26'),
(10, '747579846', 'Don Williams', 'williams@gmail.com', 770546590, '7/5/2021', '12:30am', 'Deluxe Menicure', '2021-07-02 22:16:42', '', '', '2021-07-09 15:52:55'),
(11, '924501752', 'Sulaita Vernela', 'vernela@gmail.com', 770546590, '7/7/2021', '12:30am', 'U-Shape Hair Cut', '2021-07-02 22:45:27', '', '', '2021-07-09 15:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Gender` enum('Female','Male','Transgender') DEFAULT NULL,
  `Details` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `Email`, `MobileNumber`, `Gender`, `Details`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Sulaita Vernela', 'vernela@gmail.com', 5546464646, 'Male', 'From California', '2019-07-26 11:09:10', '2021-07-09 15:10:37'),
(2, 'Don Williams', 'williams@gmail.com', 5565565656, 'Male', 'from Canada', '2019-07-26 11:10:02', '2021-07-09 15:11:10'),
(3, 'Tracy Peace', 'peace@gmail.com', 789465990, 'Female', 'Taking massage', '2019-07-26 11:10:28', '2021-07-09 15:35:28'),
(4, ' Jain Gloria', 'gloria@gmail.com', 5646464646, 'Female', 'from California', '2019-08-19 13:38:58', '2021-07-09 15:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(26, 3, 2, 379605551, '2021-07-09 15:32:37'),
(27, 3, 4, 379605551, '2021-07-09 15:32:37'),
(28, 3, 9, 379605551, '2021-07-09 15:32:37'),
(33, 2, 8, 107583558, '2021-07-09 15:42:57'),
(34, 2, 12, 107583558, '2021-07-09 15:42:57'),
(35, 1, 1, 372872256, '2021-07-09 15:43:52'),
(36, 1, 2, 372872256, '2021-07-09 15:43:52'),
(37, 1, 4, 372872256, '2021-07-09 15:43:52'),
(38, 2, 1, 361165436, '2021-07-24 11:52:27'),
(39, 2, 2, 361165436, '2021-07-24 11:52:27'),
(40, 2, 3, 361165436, '2021-07-24 11:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `Cost`, `CreationDate`) VALUES
(1, 'O3 Facial', 1200, '2019-07-25 11:22:38'),
(2, 'Fruit Facial', 500, '2019-07-25 11:22:53'),
(3, 'Charcol Facial', 1000, '2019-07-25 11:23:10'),
(4, 'Deluxe Menicure', 500, '2019-07-25 11:23:34'),
(5, 'Deluxe Pedicure', 600, '2019-07-25 11:23:47'),
(6, 'Normal Menicure', 300, '2019-07-25 11:24:01'),
(7, 'Normal Pedicure', 400, '2019-07-25 11:24:19'),
(8, 'U-Shape Hair Cut', 250, '2019-07-25 11:24:38'),
(9, 'Layer Haircut', 550, '2019-07-25 11:24:53'),
(10, 'Rebonding', 300, '2019-07-25 11:25:08'),
(11, 'Loreal Hair Color(Full)', 1200, '2019-07-25 11:25:35'),
(12, 'Body Spa', 1500, '2019-08-19 13:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `userimage` varchar(255) NOT NULL DEFAULT 'but.jpg',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `name`, `lastname`, `username`, `email`, `sex`, `permission`, `password`, `mobile`, `userimage`, `status`) VALUES
(15, 'John', 'Simith ', 'admin', 'john@gmail.com', 'Male', 'Super User', '81dc9bdb52d04dc20036dbd8313ed055', 770546590, 'face19.jpg', 1),
(21, 'Arinaitwe', 'Gerald', 'gerald', 'gerald@gmail.com', 'Male', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 770546590, 'but.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
