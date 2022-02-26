-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 04:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hv_audio_visual`
--
CREATE DATABASE IF NOT EXISTS `hv_audio_visual` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hv_audio_visual`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(15) NOT NULL,
  `employee_type` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_order`
--

CREATE TABLE `event_order` (
  `event_order` int(11) NOT NULL,
  `event_type` varchar(15) NOT NULL,
  `is_nonprofit` tinyint(1) NOT NULL,
  `order_date` date NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `invoice_date` int(11) NOT NULL,
  `total_due` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `balance_due` int(11) NOT NULL,
  `package_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_ID` int(11) NOT NULL,
  `invoice_date` int(11) NOT NULL,
  `total_due` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `balance_due` int(11) NOT NULL,
  `event_order_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `payment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `name_` varchar(25) NOT NULL,
  `description_` varchar(25) NOT NULL,
  `model_no` varchar(100) NOT NULL,
  `regular_price` decimal(10,0) NOT NULL,
  `quantity_in_stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`);

--
-- Indexes for table `event_order`
--
ALTER TABLE `event_order`
  ADD PRIMARY KEY (`event_order`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_order`
--
ALTER TABLE `event_order`
  MODIFY `event_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;