-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 07:52 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `empId` int(11) NOT NULL,
  `empName` varchar(255) NOT NULL,
  `empEmail` varchar(255) NOT NULL,
  `empPswd` varchar(255) NOT NULL,
  `empDob` date NOT NULL,
  `empGender` int(11) NOT NULL DEFAULT '1',
  `empImgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`empId`, `empName`, `empEmail`, `empPswd`, `empDob`, `empGender`, `empImgPath`) VALUES
(1, 'Gokul', 'gokul.ra92@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-10-16', 1, 'https://apaengineering.com/wp-content/uploads/2018/06/k-vaidyanathan-uai-258x289.jpg'),
(2, 'Naga', 'gokulkiot@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-10-16', 1, 'https://apaengineering.com/wp-content/uploads/2018/06/k-vaidyanathan-uai-258x289.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
