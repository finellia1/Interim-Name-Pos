-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 12:22 AM
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
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `sum_table_1`
--

CREATE TABLE `sum_table_1` (
  `ST1ID` int(11) NOT NULL,
  `sumT2` text NOT NULL,
  `SumT3` varchar(55) NOT NULL,
  `SumT4` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sum_table_2`
--

CREATE TABLE `sum_table_2` (
  `ST2ID` int(11) NOT NULL,
  `ST1ID` int(11) NOT NULL,
  `suminelse1` varchar(25) NOT NULL,
  `suminelse2` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sum_table_1`
--
ALTER TABLE `sum_table_1`
  ADD PRIMARY KEY (`ST1ID`);

--
-- Indexes for table `sum_table_2`
--
ALTER TABLE `sum_table_2`
  ADD PRIMARY KEY (`ST2ID`),
  ADD KEY `ST1ID` (`ST1ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sum_table_1`
--
ALTER TABLE `sum_table_1`
  MODIFY `ST1ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sum_table_2`
--
ALTER TABLE `sum_table_2`
  MODIFY `ST2ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sum_table_2`
--
ALTER TABLE `sum_table_2`
  ADD CONSTRAINT `sum_table_2_ibfk_1` FOREIGN KEY (`ST1ID`) REFERENCES `sum_table_1` (`ST1ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
