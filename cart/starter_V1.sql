-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 01:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter`
--
CREATE DATABASE IF NOT EXISTS `starter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `starter`;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--
-- Creation: Feb 23, 2022 at 12:01 AM
--

CREATE TABLE `inventory_item` (
  `IVID` int(11) NOT NULL,
  `VID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `s_num` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `cost` double NOT NULL,
  `rental_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--
-- Creation: Feb 22, 2022 at 11:55 PM
--

CREATE TABLE `invoice` (
  `IID` int(11) NOT NULL,
  `CLID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `total_cost_pre_tax` double NOT NULL,
  `discount` double NOT NULL,
  `tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `due_back_date` varchar(50) NOT NULL,
  `deposit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_list`
--
-- Creation: Feb 22, 2022 at 11:57 PM
--

CREATE TABLE `shopping_cart_list` (
  `SCLID` int(11) NOT NULL,
  `IID` int(11) NOT NULL,
  `IVID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rental_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`IVID`),
  ADD KEY `VID` (`VID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`IID`),
  ADD KEY `CLID` (`CLID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `shopping_cart_list`
--
ALTER TABLE `shopping_cart_list`
  ADD PRIMARY KEY (`SCLID`),
  ADD KEY `IID` (`IID`),
  ADD KEY `IVID` (`IVID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_item`
--
ALTER TABLE `inventory_item`
  MODIFY `IVID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `IID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart_list`
--
ALTER TABLE `shopping_cart_list`
  MODIFY `SCLID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shopping_cart_list`
--
ALTER TABLE `shopping_cart_list`
  ADD CONSTRAINT `shopping_cart_list_ibfk_1` FOREIGN KEY (`IID`) REFERENCES `invoice` (`IID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_list_ibfk_2` FOREIGN KEY (`IVID`) REFERENCES `inventory_item` (`IVID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
