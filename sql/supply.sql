-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 01:09 PM
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
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `Food_ID` int(30) NOT NULL,
  `Shop_ID` int(30) NOT NULL,
  `Food_Quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`Food_ID`, `Shop_ID`, `Food_Quantity`) VALUES
(1, 2, 30),
(2, 1, 30),
(10, 2, 20),
(11, 1, 20),
(11, 4, 30),
(11, 35, 20),
(12, 4, 40),
(12, 33, 50),
(12, 34, 100),
(16, 33, 50),
(16, 34, 100),
(17, 2, 40),
(18, 35, 20),
(19, 35, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`Food_ID`,`Shop_ID`),
  ADD KEY `Shop_ID` (`Shop_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `Food_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `supply`
--
ALTER TABLE `supply`
  ADD CONSTRAINT `supply_ibfk_1` FOREIGN KEY (`Food_ID`) REFERENCES `food` (`Food_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supply_ibfk_2` FOREIGN KEY (`Shop_ID`) REFERENCES `shop` (`Shop_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
