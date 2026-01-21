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
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `Shop_ID` int(30) NOT NULL,
  `Shop_Name` varchar(255) NOT NULL,
  `Shop_Address` varchar(255) NOT NULL,
  `Shop_Postcode` int(11) NOT NULL,
  `Shop_Phone` varchar(20) NOT NULL,
  `Shop_RegisNo` varchar(20) NOT NULL,
  `Employer_Name` varchar(255) NOT NULL,
  `Shop_UserName` varchar(20) NOT NULL,
  `Shop_Password` varchar(20) NOT NULL,
  `Admin_ID` int(30) NOT NULL,
  `Location_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`Shop_ID`, `Shop_Name`, `Shop_Address`, `Shop_Postcode`, `Shop_Phone`, `Shop_RegisNo`, `Employer_Name`, `Shop_UserName`, `Shop_Password`, `Admin_ID`, `Location_ID`) VALUES
(1, 'An Viet Food Market', 'Lot A4, Alor Backspace No.15A(R-1, 18, Jln Tong Shin', 50200, '0170081734', '4235325-M', 'Wendy', 'anviet', 'anviet', 1, 3),
(2, 'Mr Ng Kedai Runcit', 'Jalan Panchang Bedena, Taman Suria', 45300, '01248674932', '134668742-Q', 'Mr Ng Teck Chi', 'ng134', 'ng134', 2, 8),
(4, 'Ali Baba Nyonya kitchen', '19, Jalan Menteri, Sungai Besar', 45400, '012343564', '1261301-P', 'Tan Ming Quan', 'alibaba123', 'alibaba123', 1, 8),
(33, 'The Chicken Rice Setia City Mall', 'Lot LG-03, Lower Ground Floor Setia City Mall', 40170, '0358862732', '2685634-S', 'Adeline Low Hui Min', 'chickenRice', 'chickenRice', 2, 11),
(34, 'The Chicken Rice Shop IOI Mall Puchong', 'Lot G18B1, Ground Floor Batu, 9, Jalan Puchong, Bandar Puchong Jaya', 47170, '0358798609', '37984523-I', 'Samantha Tham Jing Wen', 'chickenIOI', 'chickenIOI', 1, 12),
(35, 'Burger shop', 'Taman Kem', 42000, '0179483349', '234756-M', 'Ting Joe Yee', 'burger', 'burger', 1, 13),
(36, 'The Food Bank', 'The Strand, 37, Jalan PJU 5/20a, Kota Damansara', 47180, '0113758493', '6574839-T', 'Kenny', 'thefoodbank', 'thefoodbank', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`Shop_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Location_ID` (`Location_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `Shop_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_ibfk_2` FOREIGN KEY (`Location_ID`) REFERENCES `distribution_location` (`Location_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
