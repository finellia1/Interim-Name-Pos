-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 05:12 PM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_ID` int(11) NOT NULL,
  `client_type` varchar(25) NOT NULL,
  `company` varchar(50) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `client_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_ID` int(11) NOT NULL,
  `venue_type` varchar(25) NOT NULL,
  `venue_name` varchar(50) NOT NULL,
  `contact_first_name` varchar(25) NOT NULL,
  `contact_last_name` varchar(25) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `venue_phone` varchar(15) NOT NULL,
  `venue_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(15) NOT NULL,
  `security_ID_fk` int(11) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `event_order`
--

CREATE TABLE `event_order` (
  `event_order_ID` int(11) NOT NULL,
  `venue_ID_fk` int(11) NOT NULL,
  `product_ID_fk` int(11) NOT NULL,
  `client_ID_fk` int(11) NOT NULL,
  `event_type` varchar(25) NOT NULL,
  `is_nonprofit` tinyint(1) NOT NULL,
  `order_date` date NOT NULL,
  `event_date_start` date NOT NULL,
  `event_date_end` date NOT NULL,
  `event_time_start` time NOT NULL,
  `event_time_end` time NOT NULL,
  `num_trucks_needed` int(2) NOT NULL,
  `num_techs_needed` int(2) NOT NULL,
  `setup_date` date NOT NULL,
  `load_in_time` time NOT NULL,
  `on_site_time` time NOT NULL,
  `breakdown_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `event_notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_ID` int(11) NOT NULL,
  `client_ID_fk` int(11) NOT NULL,
  `event_order_ID_fk` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_tax_exempt` tinyint(4) NOT NULL,
  `payment_terms` text NOT NULL,
  `date_due` date NOT NULL,
  `payment_type` varchar(15) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `sales_tax` decimal(10,2) NOT NULL,
  `total_due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `invoice_ID_fk` int(11) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `balance_due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `make` varchar(25) NOT NULL,
  `model` varchar(100) NOT NULL,
  `qty_unit` varchar(12) NOT NULL,
  `qty_in_stock` int(3) NOT NULL,
  `is_promotional` tinyint(1) NOT NULL,
  `reg_price` decimal(10,2) NOT NULL,
  `discounted_price` decimal(10,2) NOT NULL,
  `num_rented` int(3) NOT NULL,
  `num_broken` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `security_level`
--

CREATE TABLE `security` (
  `security_ID` int(11) NOT NULL,
  `security_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_level`
--

INSERT INTO `security` (`security_ID`, `security_type`) VALUES
(1, 'administrator'),
(2, 'manager'),
(3, 'staff'),
(4, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_ID` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `salesrep` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `vendor_notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_ID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`);

--
-- Indexes for table `event_order`
--
ALTER TABLE `event_order`
  ADD PRIMARY KEY (`event_order_ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `security_level`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`security_ID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_order`
--
ALTER TABLE `event_order`
  MODIFY `event_order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `security_level`
--
ALTER TABLE `security`
  MODIFY `security_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `vendor`
  MODIFY `vendor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
