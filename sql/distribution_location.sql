-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 01:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribution_location`
--

CREATE TABLE `distribution_location` (
  `Location_ID` int(30) NOT NULL,
  `Location_City` varchar(30) NOT NULL,
  `Location_State` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribution_location`
--

INSERT INTO `distribution_location` (`Location_ID`, `Location_City`, `Location_State`) VALUES
(1, 'Klang', 'Selangor'),
(2, 'Batu Pahat', 'Johor'),
(3, 'Bukit Bintang', 'Kuala Lumpur'),
(8, 'Sungai Besar', 'Selangor'),
(10, 'Petaling Jaya', 'Selangor'),
(11, 'Shah Alam', 'Selangor'),
(12, 'Puchong', 'Selangor'),
(13, 'Port Klang', 'Selangor'),
(14, 'Seri Kembangan', 'Selangor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribution_location`
--
ALTER TABLE `distribution_location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribution_location`
--
ALTER TABLE `distribution_location`
  MODIFY `Location_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
