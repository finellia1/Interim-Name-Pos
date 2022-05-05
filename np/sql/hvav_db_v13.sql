-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 05:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `authorize_credentials`
--

CREATE TABLE `authorize_credentials` (
  `authorize_credentials_ID` int(11) NOT NULL,
  `transaction_ID` varchar(50) NOT NULL,
  `transaction_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_ID` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `client_type` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_abbr` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `is_inactive` tinyint(1) NOT NULL,
  `client_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_ID`, `company`, `client_type`, `first_name`, `last_name`, `email`, `address_line1`, `address_line2`, `city`, `state_abbr`, `zip_code`, `phone`, `is_inactive`, `client_notes`) VALUES
(1, 'Jones Grill', 'corporate', 'Eloise', 'Parker', 'jonesgrill@email', '49 Baker St.', '', 'Modena', 'NY', '12515', '845-555-2000', 0, 'Add client notes here'),
(2, 'HV Desserts', 'corporate', 'Mary', 'Franklin', 'mfranklin@email', '68 Main St.', '', 'Kingston', 'NY', '12401', '845-555-2001', 0, 'Add client notes here'),
(3, 'Artists Haven', 'small business', 'Gerald', 'Davis', 'artistshaven@email', '127 Rte. 44', '', 'Poughkeepsie', 'NY', '12401', '845-555-2002', 0, 'Add client notes here'),
(4, 'Pro AV Warehouse', 'corporate', 'Becky', 'Williams', 'bwilliams@email', '14 Albany Ave.', '', 'Kingston', 'NY', '12401', '845-555-2003', 0, 'Client is also a vendor.'),
(5, 'none', 'family', 'Bill', 'Miller', 'bmiller@email', '5 Water St.', '', 'New Paltz', 'NY', '12561', '845-555-2004', 0, 'Client is also an employee.');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(15) NOT NULL,
  `security_type` enum('administrator','manager','staff','user') NOT NULL,
  `pwd` varchar(65) NOT NULL,
  `job_title` varchar(25) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hourly_salary` decimal(10,2) NOT NULL,
  `yearly_salary` decimal(10,2) NOT NULL,
  `is_inactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_ID`, `security_type`, `pwd`, `job_title`, `first_name`, `last_name`, `email`, `hourly_salary`, `yearly_salary`, `is_inactive`) VALUES
(1, 'administrator', '$2y$10$2IfGbTVosN5xK8r5/0yhn.3sj648MIJgPhOQQKPpksaKFSkwt8W4q', 'Systems Adminis', 'Sarah', 'Jones', 'sjones@email.com', '42.50', '85000.00', 0),
(2, 'manager', '$2y$10$sgYc.n9IgmpVIKKtKYASM.tiKa6Ehr5ZSlM1xh56HgP/nh9zfGxyy', 'Manager', 'John', 'Smith', 'jsmith@email.com', '42.50', '85000.00', 0),
(3, 'staff', '$2y$10$CDODHHzktmRGRk29yKO.nObqLap8PmVw/opRfPhWO9TRHjj/wgi9y', 'Technician', 'Amy', 'Baker', 'abaker@email.com', '32.50', '65000.00', 0),
(4, 'staff', '$2y$10$jmIuzk7/er7F4mZ4R9qnDu.Jtb6hMAp63FMGITTavlDn08InqLQMS', 'Warehouse Manager', 'Dan', 'Arnold', 'darnold@email.com', '28.00', '56000.00', 0),
(5, 'user', '$2y$10$c6mVgSoDXDwH38Y1emUue.DkWxFrtFAdgxuS0jgGOloEqRfaeTwzu', 'Warehouse Trainee', 'Bill', 'Miller', 'bmiller@email.com', '22.50', '45000.00', 0),
(6, 'user', '$2y$10$JXsAUsfTKCNwRkwxCsTPcOWEsgmFySehPXFw8LNOJ3cCK8Ny/f/Ky', 'Warehouse Trainee', 'Kim', 'Driver', 'kdriver@email.com', '22.50', '45000.00', 0),
(7, 'user', '$2y$10$/GBAUlYY.86FG5T2O3nakuhHwgYLgHmDonwHRtjBeRwTdb5N4hPGW', 'Warehouse Trainee', 'Sandy', 'Olsen', 'solsen@email.com', '22.50', '45000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_order`
--

CREATE TABLE `event_order` (
  `event_order_ID` int(11) NOT NULL,
  `event_type` varchar(25) NOT NULL,
  `is_nonprofit` tinyint(1) NOT NULL,
  `order_date` date NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `num_trucks_needed` int(2) NOT NULL,
  `num_techs_needed` int(2) NOT NULL,
  `setup_start` datetime NOT NULL,
  `load_truck_start` datetime NOT NULL,
  `breakdown_start` datetime NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `is_staffed` tinyint(1) NOT NULL,
  `is_complete` tinyint(1) NOT NULL,
  `is_cancelled` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `expected_num_people` varchar(5) NOT NULL,
  `contact_option` varchar(100) NOT NULL,
  `event_notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_order`
--

INSERT INTO `event_order` (`event_order_ID`, `event_type`, `is_nonprofit`, `order_date`, `event_start`, `event_end`, `num_trucks_needed`, `num_techs_needed`, `setup_start`, `load_truck_start`, `breakdown_start`, `is_confirmed`, `is_staffed`, `is_complete`, `is_cancelled`, `created_by`, `event_name`, `expected_num_people`, `contact_option`, `event_notes`) VALUES
(8, 'wedding', 0, '2022-01-03', '2022-05-22 14:00:00', '2022-05-22 17:00:00', 2, 2, '2022-05-22 11:00:00', '2022-05-22 10:00:00', '2022-05-23 09:00:00', 0, 0, 0, 0, 'S. Jones', '', '0', '', 'Add event notes here.'),
(9, 'Conference', 0, '2022-02-05', '2022-06-07 09:00:00', '2022-06-11 17:00:00', 2, 1, '2022-06-06 11:00:00', '2022-06-06 09:00:00', '2022-06-12 13:00:00', 0, 0, 0, 0, 'S. Jones', '', '0', '', ''),
(10, 'Party', 0, '2022-03-07', '2022-05-28 13:00:00', '2022-05-28 16:00:00', 1, 1, '2022-05-28 11:00:00', '2022-05-28 09:00:00', '2022-05-28 17:00:00', 0, 0, 0, 0, 'J. Smith', '', '0', '', ''),
(11, 'Corporate Training', 1, '2022-04-01', '2022-07-16 10:00:00', '2022-07-22 16:00:00', 2, 1, '2022-07-15 11:00:00', '2022-07-15 09:00:00', '2022-07-23 09:00:00', 0, 0, 0, 0, 'S. Jones', '', '0', '', ''),
(12, 'Party', 0, '2022-05-04', '2022-06-11 12:00:00', '2022-06-11 19:00:00', 1, 2, '2022-06-11 11:00:00', '2022-06-11 09:00:00', '2022-06-12 10:00:00', 0, 0, 0, 0, 'J. Smith', '', '75', '', ''),
(16, 'Conference', 0, '2022-05-04', '2022-06-01 09:00:00', '2022-08-31 17:00:00', 2, 1, '2022-05-25 09:00:00', '2022-05-24 13:00:00', '2022-09-01 09:00:00', 0, 0, 0, 0, 'J. Smith', 'Quarterly conference', '200', '', ''),
(17, 'wedding', 0, '2022-05-05', '2022-09-30 13:00:00', '2022-09-30 18:00:00', 2, 1, '2022-09-29 09:00:00', '2022-09-28 07:00:00', '2022-10-01 15:48:52', 0, 0, 0, 0, 'J. Smith', 'Wedding', '100', '', ''),
(18, 'wedding', 0, '2022-05-06', '2022-08-27 14:00:00', '2022-08-27 22:00:00', 2, 1, '2022-08-26 09:00:00', '2022-08-25 07:00:00', '2022-08-28 09:00:00', 0, 0, 0, 0, 'J. Smith', 'Wedding', '100', '', ''),
(19, 'Conference', 0, '2022-05-07', '2022-09-05 09:00:00', '2022-12-05 17:00:00', 2, 1, '2022-09-04 09:00:00', '2022-09-03 13:00:00', '2022-12-06 09:00:00', 0, 0, 0, 0, 'J. Smith', 'Conference', '150', '', ''),
(20, 'Corporate Training', 0, '2022-05-08', '2022-10-18 09:00:00', '2022-10-25 16:00:00', 2, 1, '2022-10-17 11:00:00', '2022-10-17 09:00:00', '2022-10-26 09:00:00', 0, 0, 0, 0, 'S. Jones', '', '0', '', ''),
(21, 'wedding', 0, '2022-05-09', '2022-08-20 00:33:27', '2022-08-20 00:33:27', 2, 1, '2022-08-19 10:30:00', '2022-08-19 09:00:00', '2022-08-21 10:00:00', 0, 0, 0, 0, 'S.Jones', 'wedding', '200', '', ''),
(22, 'wedding', 0, '2022-05-10', '2022-05-22 14:00:00', '2022-05-22 17:00:00', 2, 2, '2022-05-22 11:00:00', '2022-05-22 10:00:00', '2022-05-23 09:00:00', 0, 0, 0, 0, 'J. Smith', '', '250', '', 'Add event notes here.'),
(23, 'Conference', 0, '2022-05-11', '2022-10-03 14:00:00', '2022-10-08 17:00:00', 1, 1, '2022-10-02 11:00:00', '2022-10-02 09:00:00', '2022-10-09 09:00:00', 0, 0, 0, 0, 'J. Smith', '', '125', '', 'Add event notes here.'),
(24, 'Party', 0, '2022-05-12', '2022-11-19 13:00:00', '2022-11-19 18:00:00', 2, 1, '2022-11-19 10:00:00', '2022-11-19 08:00:00', '2022-11-19 18:30:00', 0, 0, 0, 0, 'J. Smith', '', '200', '', ''),
(25, 'Party', 0, '2022-05-13', '2022-11-13 13:00:00', '2022-11-13 18:00:00', 2, 1, '2022-11-13 10:00:00', '2022-11-13 08:00:00', '2022-11-13 18:30:00', 0, 0, 0, 0, 'S. Jones', '', '150', '', ''),
(26, 'Party', 0, '2022-05-14', '2022-08-13 14:00:00', '2022-08-13 19:00:00', 2, 1, '2022-08-13 10:00:00', '2022-08-13 08:00:00', '2022-08-13 19:30:00', 0, 0, 0, 0, 'S. Jones', '', '250', '', ''),
(27, 'Conference', 0, '2022-05-15', '2022-08-22 09:00:00', '2022-08-26 17:00:00', 2, 1, '2022-08-21 13:00:00', '2022-08-09 08:00:00', '2022-08-27 09:30:00', 0, 0, 0, 0, 'J. Smith', '', '300', '', ''),
(28, 'Wedding', 0, '2022-05-16', '2022-09-22 09:00:00', '2022-09-22 22:00:00', 1, 1, '2022-09-21 13:00:00', '2022-09-21 08:00:00', '2022-09-23 09:30:00', 0, 0, 0, 0, 'J. Smith', '', '250', '', ''),
(29, 'Party', 0, '2022-05-17', '2022-11-13 14:00:00', '2022-11-13 20:00:00', 1, 1, '2022-11-13 10:00:00', '2022-11-13 08:00:00', '2022-11-14 09:30:00', 0, 0, 0, 0, 'J. Smith', '', '200', '', ''),
(30, 'Conference', 0, '2022-05-18', '2022-09-02 09:00:00', '2022-09-12 17:00:00', 1, 1, '2022-09-01 11:00:00', '2022-09-01 09:00:00', '2022-09-13 09:00:00', 0, 0, 0, 0, 'S. Jones', '', '200', '', ''),
(31, 'Party', 0, '2022-05-19', '2022-12-08 11:00:00', '2022-12-08 17:00:00', 1, 1, '2022-12-08 09:30:00', '2022-12-08 08:00:00', '2022-12-08 18:00:00', 0, 0, 0, 0, 'S. Jones', '', '100', '', ''),
(32, 'Party', 0, '2022-05-20', '2022-10-28 13:00:00', '2022-10-28 16:00:00', 1, 1, '2022-10-28 11:00:00', '2022-10-28 09:00:00', '2022-10-28 17:00:00', 0, 0, 0, 0, 'J. Smith', '', '150', '', ''),
(33, 'Wedding', 0, '2022-05-21', '2022-09-21 13:00:00', '2022-09-21 18:00:00', 2, 1, '2022-09-20 11:00:00', '2022-09-20 08:00:00', '2022-09-22 10:00:00', 0, 0, 0, 0, 'S. Jones', 'Wedding', '300', '', ''),
(34, 'wedding', 0, '2022-05-22', '2022-07-22 14:00:00', '2022-07-22 17:00:00', 2, 2, '2022-07-22 11:00:00', '2022-07-22 10:00:00', '2022-07-23 09:00:00', 0, 0, 0, 0, 'J. Smith', '', '100', '', 'Add event notes here.'),
(35, 'Party', 0, '2022-05-23', '2022-11-17 13:00:00', '2022-11-17 18:00:00', 1, 1, '2022-11-17 10:00:00', '2022-11-17 08:00:00', '2022-11-17 18:30:00', 0, 0, 0, 0, 'S. Jones', '', '125', '', ''),
(36, 'Conference', 0, '2022-05-24', '2022-08-21 09:00:00', '2022-08-29 17:00:00', 1, 1, '2022-08-20 13:00:00', '2022-08-20 08:00:00', '2022-08-30 09:30:00', 0, 0, 0, 0, 'S. Jones', '', '150', '', ''),
(37, 'Party', 0, '2022-05-25', '2022-12-09 11:00:00', '2022-12-09 17:00:00', 1, 1, '2022-12-09 09:30:00', '2022-12-09 08:00:00', '2022-12-09 18:00:00', 0, 0, 0, 0, 'J. Smith', '', '125', '', ''),
(38, 'Party', 0, '2022-05-26', '2022-10-18 14:00:00', '2022-10-18 19:00:00', 1, 1, '2022-10-18 11:00:00', '2022-10-18 09:00:00', '2022-10-19 10:00:00', 0, 0, 0, 0, 'J. Smith', '', '100', '', ''),
(39, 'Party', 0, '2022-05-30', '2022-12-02 11:00:00', '2022-12-02 17:00:00', 1, 1, '2022-12-02 09:30:00', '2022-12-02 08:00:00', '2022-12-02 18:00:00', 0, 0, 0, 0, 'J. Smith', '', '225', '', ''),
(40, 'Wedding', 0, '2022-06-03', '2022-09-23 09:00:00', '2022-09-23 22:00:00', 1, 1, '2022-09-22 13:00:00', '2022-09-22 08:00:00', '2022-09-22 09:30:00', 0, 0, 0, 0, 'S. Jones', '', '325', '', ''),
(41, 'Party', 0, '2022-07-05', '2022-07-19 13:00:00', '2022-07-19 18:00:00', 1, 1, '2022-07-19 10:00:00', '2022-07-19 08:00:00', '2022-07-19 18:30:00', 0, 0, 0, 0, 'J. Smith', '', '100', '', ''),
(42, 'Party', 0, '2022-08-06', '2022-11-16 13:00:00', '2022-11-16 18:00:00', 1, 1, '2022-11-16 10:00:00', '2022-11-16 08:00:00', '2022-11-16 18:30:00', 0, 0, 0, 0, 'J. Smith', '', '225', '', ''),
(43, 'Wedding', 0, '2022-09-07', '2022-09-24 13:00:00', '2022-09-24 18:00:00', 2, 1, '2022-09-23 11:00:00', '2022-09-23 08:00:00', '2022-09-25 10:00:00', 0, 0, 0, 0, 'J. Smith', 'Wedding', '175', '', ''),
(44, 'Party', 0, '2022-10-09', '2022-12-19 11:00:00', '2022-12-19 17:00:00', 1, 1, '2022-12-19 09:30:00', '2022-12-19 08:00:00', '2022-12-19 18:00:00', 0, 0, 0, 0, 'S. Jones', '', '200', '', ''),
(45, 'Party', 0, '2022-11-12', '2022-12-04 11:00:00', '2022-12-04 17:00:00', 1, 1, '2022-12-04 09:30:00', '2022-12-04 08:00:00', '2022-12-04 18:00:00', 0, 0, 0, 0, 'S. Jones', '', '175', '', ''),
(46, 'Conference', 0, '2022-12-14', '2022-12-21 09:00:00', '2022-12-23 17:00:00', 1, 1, '2022-12-20 13:00:00', '2022-12-20 08:00:00', '2022-12-23 18:00:00', 0, 0, 0, 0, 'J. Smith', '', '225', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_product_list`
--

CREATE TABLE `event_product_list` (
  `event_product_list_ID` int(11) NOT NULL,
  `product_ID_fk` int(11) NOT NULL,
  `event_order_ID_fk` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `discount_given` tinyint(1) NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_product_list`
--

INSERT INTO `event_product_list` (`event_product_list_ID`, `product_ID_fk`, `event_order_ID_fk`, `quantity`, `discount_given`, `discount_percent`) VALUES
(3, 40, 8, 1, 0, '0.00'),
(4, 39, 8, 1, 0, '0.00'),
(5, 25, 9, 1, 0, '0.00'),
(6, 39, 10, 1, 0, '0.00'),
(7, 14, 11, 1, 0, '0.00'),
(8, 6, 11, 1, 0, '0.00'),
(9, 34, 12, 1, 0, '0.00'),
(10, 10, 12, 2, 0, '0.00'),
(11, 3, 16, 3, 0, '0.00'),
(12, 8, 16, 9, 0, '0.00'),
(13, 33, 16, 6, 0, '0.00'),
(14, 16, 16, 9, 0, '0.00'),
(15, 1, 17, 2, 0, '0.00'),
(16, 3, 17, 3, 0, '0.00'),
(17, 5, 17, 1, 0, '0.00'),
(18, 6, 17, 2, 0, '0.00'),
(19, 8, 17, 9, 0, '0.00'),
(20, 9, 17, 1, 0, '0.00'),
(21, 15, 17, 6, 0, '0.00'),
(22, 17, 17, 1, 0, '0.00'),
(23, 23, 17, 2, 0, '0.00'),
(24, 2, 17, 2, 0, '0.00'),
(25, 15, 18, 6, 0, '0.00'),
(26, 8, 18, 9, 0, '0.00'),
(27, 3, 19, 3, 0, '0.00'),
(28, 8, 19, 9, 0, '0.00'),
(29, 33, 19, 6, 0, '0.00'),
(30, 16, 19, 9, 0, '0.00'),
(32, 43, 19, 1, 0, '0.00'),
(33, 14, 20, 1, 0, '0.00'),
(34, 15, 20, 6, 0, '0.00'),
(35, 29, 21, 4, 0, '0.00'),
(36, 33, 22, 6, 0, '0.00'),
(37, 33, 23, 6, 0, '0.00'),
(38, 29, 24, 4, 0, '0.00'),
(39, 33, 24, 6, 0, '0.00'),
(40, 16, 25, 9, 0, '0.00'),
(41, 33, 25, 6, 0, '0.00'),
(42, 16, 26, 9, 0, '0.00'),
(43, 29, 27, 4, 0, '0.00'),
(44, 33, 28, 6, 0, '0.00'),
(45, 16, 28, 9, 0, '0.00'),
(46, 29, 29, 4, 0, '0.00'),
(47, 33, 29, 6, 0, '0.00'),
(48, 16, 30, 9, 0, '0.00'),
(49, 33, 30, 6, 0, '0.00'),
(50, 33, 31, 6, 0, '0.00'),
(51, 29, 32, 4, 0, '0.00'),
(52, 33, 33, 6, 0, '0.00'),
(53, 16, 34, 9, 0, '0.00'),
(54, 29, 35, 4, 0, '0.00'),
(55, 33, 36, 6, 0, '0.00'),
(56, 29, 37, 4, 0, '0.00'),
(57, 16, 38, 9, 0, '0.00'),
(58, 33, 39, 6, 0, '0.00'),
(59, 29, 40, 4, 0, '0.00'),
(60, 16, 41, 9, 0, '0.00'),
(61, 33, 42, 6, 0, '0.00'),
(62, 33, 43, 6, 0, '0.00'),
(63, 16, 43, 9, 0, '0.00'),
(64, 29, 44, 4, 0, '0.00'),
(65, 33, 44, 6, 0, '0.00'),
(66, 33, 45, 6, 0, '0.00'),
(67, 16, 45, 9, 0, '0.00'),
(68, 16, 46, 9, 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_ID` int(11) NOT NULL,
  `venue_ID_fk` int(11) NOT NULL,
  `client_ID_fk` int(11) NOT NULL,
  `event_order_ID_fk` int(11) NOT NULL,
  `refund_ID_fk` int(11) NOT NULL,
  `time_of_sale` datetime NOT NULL,
  `is_tax_exempt` tinyint(1) NOT NULL,
  `payment_terms` text NOT NULL,
  `date_due` date NOT NULL,
  `payment_type` varchar(15) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `sales_tax` decimal(10,2) NOT NULL,
  `total_due` decimal(10,2) NOT NULL,
  `is_deposit_forfeited` tinyint(1) NOT NULL,
  `is_deposit_refunded` tinyint(1) NOT NULL,
  `event_product_list_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_ID`, `venue_ID_fk`, `client_ID_fk`, `event_order_ID_fk`, `refund_ID_fk`, `time_of_sale`, `is_tax_exempt`, `payment_terms`, `date_due`, `payment_type`, `subtotal`, `sales_tax`, `total_due`, `is_deposit_forfeited`, `is_deposit_refunded`, `event_product_list_ID_fk`) VALUES
(1, 1, 1, 8, 0, '2022-01-03 10:27:00', 0, '', '2022-01-03', 'check', '42000.00', '3360.00', '45360.00', 0, 0, 3),
(2, 2, 2, 9, 0, '2022-02-05 13:15:00', 0, '', '2022-02-05', 'check', '38500.00', '3080.00', '41580.00', 0, 0, 4),
(3, 3, 3, 10, 0, '2022-03-07 15:47:00', 0, '', '2022-03-07', 'credit card', '18125.00', '1450.00', '19575.00', 0, 0, 5),
(4, 4, 4, 11, 0, '2022-04-01 09:14:00', 0, '', '2022-04-01', 'credit card', '26750.00', '2140.00', '28890.00', 0, 0, 6),
(5, 5, 5, 12, 0, '2022-05-04 15:17:00', 1, '', '2022-05-04', 'check', '525.00', '0.00', '525.00', 0, 0, 7),
(10, 2, 1, 16, 2, '2022-05-04 19:19:10', 0, '', '2022-05-04', 'credit card', '7095.00', '567.60', '7662.60', 0, 0, 11),
(11, 2, 2, 17, 0, '2022-05-05 10:19:10', 0, '', '2022-05-05', 'credit card', '8965.00', '717.20', '9682.20', 0, 0, 15),
(16, 1, 1, 18, 0, '2022-05-06 09:46:00', 0, '', '2022-05-06', 'credit card', '5295.00', '423.60', '5718.60', 0, 0, 25),
(17, 3, 3, 19, 0, '2022-05-07 11:18:00', 0, '', '2022-05-07', 'credit card', '6090.00', '487.20', '6577.20', 0, 0, 27),
(18, 2, 2, 20, 0, '2022-05-08 13:39:14', 0, '', '2022-05-08', 'credit card', '4865.00', '389.20', '5254.20', 0, 0, 33),
(19, 4, 5, 21, 0, '2022-05-09 11:48:09', 0, '', '2022-05-09', 'credit card', '3700.00', '296.00', '3996.00', 0, 0, 35),
(20, 1, 5, 22, 0, '2022-05-10 07:00:55', 0, '', '2022-05-10', 'cash', '4170.00', '333.60', '4503.60', 0, 0, 36),
(21, 4, 5, 23, 0, '2022-05-11 08:10:01', 0, '', '2022-05-11', 'check', '4170.00', '333.60', '4503.60', 0, 0, 37),
(22, 3, 5, 24, 0, '2022-05-12 09:43:58', 0, '', '2022-05-12', 'check', '7870.00', '629.60', '8499.60', 0, 0, 39),
(23, 1, 5, 25, 0, '2022-05-13 15:52:37', 0, '', '2022-05-13', 'credit card', '5295.00', '423.60', '5718.60', 0, 0, 41),
(24, 4, 5, 26, 0, '2022-05-14 16:09:56', 0, '', '2022-05-14', 'cash', '1125.00', '90.00', '1215.00', 0, 0, 42),
(25, 2, 1, 27, 0, '2022-05-15 16:17:18', 0, '', '2022-05-15', 'credit card', '3700.00', '296.00', '3966.00', 0, 0, 43),
(26, 4, 5, 28, 0, '2022-05-16 16:22:09', 0, '', '2022-05-16', 'credit card', '5295.00', '423.60', '5718.60', 0, 0, 45),
(27, 3, 2, 29, 0, '2022-05-17 16:32:16', 0, '', '2022-05-17', 'credit card', '7870.00', '629.60', '8499.60', 0, 0, 47),
(28, 1, 3, 30, 0, '2022-05-18 16:40:05', 0, '', '2022-05-18', 'credit card', '5295.00', '423.60', '5718.60', 0, 0, 49),
(29, 4, 2, 31, 0, '2022-05-19 16:45:57', 0, '', '2022-05-19', 'check', '4170.00', '333.60', '4503.60', 0, 0, 50),
(30, 3, 1, 32, 0, '2022-05-20 16:50:38', 0, '', '2022-05-20', 'credit card', '3700.00', '296.00', '3996.00', 0, 0, 51),
(31, 4, 5, 33, 0, '2022-05-21 12:55:37', 0, '', '2022-05-21', 'credit card', '4170.00', '333.60', '4503.60', 0, 0, 52),
(32, 1, 5, 34, 0, '2022-05-22 12:59:58', 0, '', '2022-05-22', 'check', '1125.00', '90.00', '1215.00', 0, 0, 53),
(33, 3, 5, 35, 0, '2022-05-23 17:04:27', 0, '', '2022-05-23', 'credit card', '3700.00', '296.00', '3996.00', 0, 0, 54),
(34, 1, 3, 36, 0, '2022-05-24 17:08:23', 0, '', '2022-05-24', 'credit card', '4170.00', '333.60', '4503.60', 0, 0, 55),
(35, 3, 5, 37, 0, '2022-05-25 11:12:59', 0, '', '2022-05-25', 'check', '3700.00', '296.00', '3996.00', 0, 0, 56),
(36, 2, 5, 38, 0, '2022-05-26 16:15:53', 0, '', '2022-05-26', 'credit card', '1125.00', '90.00', '1215.00', 0, 0, 57),
(37, 3, 2, 39, 0, '2022-05-30 17:19:06', 0, '', '2022-05-30', 'credit card', '4170.00', '333.60', '4503.60', 0, 0, 58),
(38, 4, 5, 40, 0, '2022-06-03 17:21:50', 0, '', '2022-06-03', 'check', '3700.00', '296.00', '3996.00', 0, 0, 59),
(39, 1, 5, 41, 0, '2022-07-05 17:25:49', 0, '', '2022-05-05', 'credit card', '1125.00', '90.00', '1215.00', 0, 0, 60),
(40, 1, 3, 42, 0, '2022-08-06 17:30:18', 0, '', '2022-08-06', 'check', '4170.00', '333.60', '4503.60', 0, 0, 61),
(41, 4, 5, 43, 0, '2022-09-07 17:34:08', 0, '', '2022-09-07', 'credit card', '5295.00', '423.60', '5718.60', 0, 0, 63),
(42, 4, 4, 44, 0, '2022-10-09 11:38:40', 0, '', '2022-10-09', 'credit card', '7870.00', '629.60', '8499.60', 0, 0, 65),
(43, 2, 2, 45, 0, '2022-11-12 10:44:11', 0, '', '2022-11-12', 'credit card', '5295.00', '423.60', '5718.60', 0, 0, 67),
(44, 1, 2, 46, 0, '2022-12-14 11:21:05', 0, '', '2022-12-14', 'credit card', '1125.00', '90.00', '1215.00', 0, 0, 68);

-- --------------------------------------------------------

--
-- Table structure for table `packing_list`
--

CREATE TABLE `packing_list` (
  `packing_list_ID` int(11) NOT NULL,
  `employee_ID_fk` int(11) NOT NULL,
  `event_product_list_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packing_list`
--

INSERT INTO `packing_list` (`packing_list_ID`, `employee_ID_fk`, `event_product_list_ID_fk`) VALUES
(1, 3, 3),
(2, 3, 4),
(3, 4, 5),
(4, 4, 6),
(5, 3, 7),
(6, 3, 5),
(7, 4, 8),
(8, 3, 11),
(9, 3, 12),
(10, 3, 13),
(11, 3, 14),
(12, 4, 15),
(13, 4, 15),
(14, 4, 17),
(15, 4, 18),
(16, 4, 19),
(17, 4, 20),
(18, 4, 21),
(19, 4, 22),
(20, 4, 23),
(21, 4, 24);

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
  `is_refunded` tinyint(1) NOT NULL,
  `balance_due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `invoice_ID_fk`, `amount_paid`, `payment_date`, `payment_time`, `is_refunded`, `balance_due`) VALUES
(1, 1, '45360.00', '2022-01-03', '2022-01-03 20:37:29', 0, '0.00'),
(2, 2, '41580.00', '2022-02-05', '2022-02-05 20:38:05', 0, '0.00'),
(3, 3, '19575.00', '2022-03-07', '2022-03-07 20:38:23', 0, '0.00'),
(4, 4, '28890.00', '2022-04-01', '2022-04-01 19:38:41', 0, '0.00'),
(5, 5, '525.00', '2022-05-04', '2022-05-05 00:47:01', 0, '0.00'),
(6, 10, '7662.60', '2022-05-04', '2022-05-04 17:25:59', 0, '0.00'),
(7, 11, '9682.20', '2022-05-05', '2022-05-05 17:55:45', 0, '0.00'),
(8, 16, '5718.60', '2022-05-06', '2022-05-06 18:48:19', 0, '0.00'),
(9, 17, '5718.60', '2022-05-07', '2022-05-07 19:06:15', 0, '0.00'),
(10, 18, '5254.20', '2022-05-08', '2022-05-08 15:28:19', 0, '0.00'),
(11, 19, '3996.00', '2022-05-09', '2022-05-09 04:51:36', 0, '0.00'),
(12, 20, '4503.60', '2022-05-10', '2022-05-10 05:02:54', 0, '0.00'),
(13, 20, '4503.60', '2022-05-11', '2022-05-11 16:02:54', 0, '0.00'),
(14, 22, '8499.60', '2022-05-12', '2022-05-12 13:45:44', 0, '0.00'),
(15, 23, '5718.60', '2022-05-13', '2022-05-13 14:07:59', 0, '0.00'),
(16, 24, '1215.00', '2022-05-14', '2022-05-14 14:11:40', 0, '0.00'),
(17, 25, '3996.00', '2022-05-15', '2022-05-15 14:18:50', 0, '0.00'),
(18, 26, '5718.60', '2022-05-16', '2022-05-16 14:23:30', 0, '0.00'),
(19, 27, '8499.60', '2022-05-17', '2022-05-17 14:34:19', 0, '0.00'),
(20, 28, '5718.60', '2022-05-18', '2022-05-18 14:41:05', 0, '0.00'),
(21, 29, '4503.60', '2022-05-19', '2022-05-19 14:47:08', 0, '0.00'),
(22, 30, '3996.00', '2022-05-20', '2022-05-20 15:21:03', 0, '0.00'),
(23, 31, '4503.60', '2022-05-21', '2022-05-21 17:43:43', 0, '0.00'),
(24, 32, '1215.00', '2022-05-22', '2022-05-22 15:01:01', 0, '0.00'),
(25, 33, '3996.00', '2022-05-23', '2022-05-23 17:05:38', 0, '0.00'),
(26, 34, '4503.60', '2022-05-24', '2022-05-24 15:09:26', 0, '0.00'),
(27, 35, '3996.00', '2022-05-25', '2022-05-25 15:13:16', 0, '0.00'),
(28, 36, '1215.00', '2022-05-26', '2022-05-26 15:17:11', 0, '0.00'),
(29, 37, '4503.60', '2022-05-30', '2022-05-30 17:19:59', 0, '0.00'),
(30, 38, '3996.00', '2022-06-03', '2022-06-03 18:22:47', 0, '0.00'),
(31, 39, '1215.00', '2022-07-05', '2022-07-05 19:27:37', 0, '0.00'),
(32, 40, '4503.60', '2022-08-06', '2022-08-06 15:31:44', 0, '0.00'),
(33, 41, '5718.60', '2022-09-07', '2022-09-07 18:35:11', 0, '0.00'),
(34, 42, '8499.60', '2022-10-09', '2022-10-09 20:39:51', 0, '0.00'),
(35, 43, '5718.60', '2022-11-12', '2022-11-12 16:45:24', 0, '0.00'),
(36, 44, '1215.00', '2022-12-14', '2022-12-14 16:49:15', 0, '0.00');

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
  `num_broken` int(3) NOT NULL,
  `is_discontinued` tinyint(1) NOT NULL,
  `vendor_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_type`, `product_name`, `product_description`, `make`, `model`, `qty_unit`, `qty_in_stock`, `is_promotional`, `reg_price`, `discounted_price`, `num_rented`, `num_broken`, `is_discontinued`, `vendor_ID_fk`) VALUES
(1, 'Audio', 'Speaker', 'AN130 Speaker', 'Anchor', 'AN130', 'each', 2, 0, '75.00', '75.00', 0, 0, 0, 1),
(2, 'Audio', 'Speaker', 'JBL EON 610 Speaker', 'JBL', 'EON 610', 'pair', 1, 0, '175.00', '150.00', 0, 0, 0, 2),
(3, 'Audio', 'Speaker', 'JBL EON 615 Speaker', 'JBL', 'EON 615', 'pair', 3, 0, '225.00', '200.00', 0, 0, 0, 2),
(4, 'Audio', 'Subwoofer Speaker', 'JBL EON 518 Powered Subwo', 'JBL', 'EON 518', 'each', 3, 0, '100.00', '100.00', 0, 0, 0, 3),
(5, 'Audio', 'Loudspeaker', 'Carvin Column Array Loudspeaker', 'Carvin', '', 'pair', 1, 0, '395.00', '300.00', 0, 0, 0, 4),
(6, 'Audio Set', 'Speaker with Microphone', 'Pair of Anchor Liberty Speakers with Wireless Handheld Microphone', 'Anchor', 'Liberty', 'pair', 2, 0, '275.00', '200.00', 0, 0, 0, 5),
(7, 'Audio Set', 'Speaker with Microphone', 'Pair of Anchor Bigfoot Speakers with Wireless Handheld Microphone', 'Anchor', 'Bigfoot', 'pair', 1, 0, '375.00', '300.00', 0, 0, 0, 5),
(8, 'Audio', 'Microphone', 'Shure Wireless Microphone HH or Lavalier Single Pack', 'Shure', '', 'each', 9, 0, '125.00', '75.00', 0, 0, 0, 4),
(9, 'Audio ', 'Microphone', '4 Pack of Shure Wireless Microphone HH or Lavalier', 'Shure', '', 'each', 1, 0, '450.00', '450.00', 0, 0, 0, 3),
(10, 'Audio', 'Microphone', 'Shure SM58', 'Shure', 'SM58', 'each', 16, 0, '50.00', '50.00', 0, 0, 0, 2),
(11, 'Audio', 'Mixer', 'Behringer Xenyx 4 Channel Mixer', 'Behringer', 'Xenyx 4', 'each', 2, 0, '45.00', '45.00', 0, 0, 0, 1),
(12, 'Audio', 'Mixer', 'Mackie 8 Channel Mixer', 'Mackie', '', 'each', 3, 0, '95.00', '95.00', 0, 0, 0, 5),
(13, 'Audio', 'Mixer', 'Behringer X32 Mixing Console ', 'Behringer', 'X32', 'each', 1, 0, '345.00', '345.00', 0, 0, 0, 5),
(14, 'Audio Set', 'Mixing Console with 4 Mic', 'Behringer X32 Mixing Console with 4 Wireless Shure Microphones', 'Behringer, Shure', '', 'kit', 1, 0, '495.00', '400.00', 0, 0, 0, 1),
(15, 'Audio Set', 'Mixing Console with Microphones', 'Midas M32R Mixing Console with 8 Wireless Shure Microphones', 'Midas, Shure', '', 'set', 6, 0, '695.00', '545.00', 0, 0, 0, 3),
(16, 'Audio', 'Microphone', 'Shure Wireless Microphone HH or Lavalier Single Pack', 'Shure', '', 'each', 9, 0, '125.00', '75.00', 0, 0, 0, 4),
(17, 'Audio', 'Microphone', '4 Pack of Shure Wireless Microphone HH or Lavalier', 'Shure', '', 'each', 1, 0, '450.00', '450.00', 0, 0, 0, 2),
(18, 'Audio', 'Microphone', 'Shure SM58', 'Shure', 'SM58', 'each', 16, 0, '50.00', '50.00', 0, 0, 0, 4),
(19, 'Video', 'Tripod Screen', 'Tripod Screen (5\')', '', '', 'each', 1, 0, '50.00', '50.00', 0, 0, 0, 1),
(20, 'Video', 'Tripod Screen', 'Tripod Screen (6\')', '', '', 'each', 1, 0, '50.00', '50.00', 0, 0, 0, 5),
(21, 'Video', 'Tripod Screen', 'Tripod Screen (8\')', '', '', 'each', 1, 0, '50.00', '50.00', 0, 0, 0, 4),
(22, 'Video', 'Cradle Screen', 'Cradle Screen (10\')', '', '', 'each', 1, 0, '110.00', '110.00', 0, 0, 0, 4),
(23, 'Video', 'Fast Fold Screen', 'Fast Fold Screen (7.5 x 10\'). Requires 2 Techs for setup.', '', '', 'each', 2, 0, '225.00', '225.00', 0, 0, 0, 2),
(24, 'Video', 'Fast Fold Screen', 'Fast Fold Screen (9 x 12\'). Requires 2 Techs for setup.', '', '', 'each', 2, 0, '275.00', '275.00', 0, 0, 0, 2),
(25, 'Video', 'Inflatable Screen', '16 x 9\' inflatable screen.', '', '', 'each', 0, 0, '495.00', '495.00', 0, 0, 0, 1),
(26, 'Video', 'Fast Fold Screen', '16 x 9\' Fast Fold Screen (SUBRENTAL). Requires 2 Techs for setup.', '', '', 'each', 0, 0, '495.00', '495.00', 0, 0, 0, 2),
(27, 'Projector', 'Projector', '3K Lumen Projector', 'Eiki', 'LC-WB200', 'each', 4, 0, '225.00', '225.00', 0, 0, 0, 4),
(28, 'Projector', 'Projector', '6K Lumen Projector', 'NEC', 'PA622U', 'each', 2, 0, '495.00', '395.00', 0, 0, 0, 3),
(29, 'Projector', 'Projector', '12K Lumen Projector', 'Eiki, NEC', 'EK-800U, PX1004UL', 'each', 4, 0, '925.00', '795.00', 0, 0, 0, 4),
(30, 'Monitor', 'Monitor with Skirting', 'Confidence Monitor w/Skirting ', '', '', 'each', 3, 0, '95.00', '95.00', 0, 0, 0, 4),
(31, 'Monitor with Stand', 'Flat Panel Monitor on Rolling Stand ', '55\" Flat Panel Monitor on Rolling Stand', '', '', 'each', 2, 0, '295.00', '295.00', 0, 0, 0, 1),
(32, 'Monitor with Stand', 'Flat Panel Monitor on Rolling Stand ', '70\" Flat Panel Monitor on Rolling Stand. (REQUIRES 2 TECHS for setup).', '', '', 'each', 3, 0, '495.00', '395.00', 0, 0, 0, 2),
(33, 'Monitor', 'Flat Panel Monitor on Rolling Stand ', '86\" Flat Panel Monitor on Rolling Stand. (REQUIRES 2 TECHS for setup). ', '', '', 'each', 6, 0, '695.00', '545.00', 0, 0, 0, 2),
(34, 'Projector Set', 'Projector with Screen', 'Tripod Screen with 3K Lumen Projector ', '', '', 'each', 0, 0, '275.00', '275.00', 0, 0, 0, 1),
(35, 'Projector Set', 'Projector with Screen', '7.5\' x 10\' Fast Fold Screen with 6K Lumen Projector.  (REQUIRES 2 TECHS for setup).', '', '', 'each', 0, 0, '720.00', '720.00', 0, 0, 0, 5),
(36, 'Projector Set', 'Projector with Screen', '9\' x 12\' Fast Fold Screen with 12K Lumen Projector.  (REQUIRES 2 TECHS for setup)..', '', '', 'each', 0, 0, '1200.00', '1200.00', 0, 0, 0, 4),
(37, 'Switcher', 'Roland Video Switcher', 'Roland Video Switcher', 'Roland', '', 'each', 1, 0, '225.00', '175.00', 0, 0, 0, 3),
(38, 'Switcher', 'Single Scaled Video Switcher', 'Single Scaled Video Switcher', 'Roland', '', 'each', 2, 0, '150.00', '150.00', 0, 0, 0, 1),
(39, 'Audio', 'Amplifier', 'HDMI Distribution Amplifier (1->4 or 1->8) ', '', '', 'each', 4, 0, '50.00', '50.00', 0, 0, 0, 3),
(40, 'Camera', 'Camera on Tripod Stand', 'Canon XA35 (or XA20) Camera on Tripod Stand', 'Canon', 'XA35 or XA20', 'each', 2, 0, '225.00', '225.00', 0, 0, 0, 5),
(41, 'Switcher', 'Streaming Switcher', 'ATEM mini 4 channel Streaming Switcher', 'ATEM', '', 'each', 1, 0, '200.00', '200.00', 0, 0, 0, 3),
(42, 'Camera', 'Streaming Set', 'Streaming Rig (Streaming laptop, ATEM streaming switcher and capture card) ', 'ATEM', '', 'each', 1, 0, '400.00', '350.00', 0, 0, 0, 3),
(43, 'Camera', 'Camera System', 'Vaddio PTZ Camera System with 3 Joystick controlled PTZ cameras', 'Vaddio', '', 'each', 1, 0, '795.00', '695.00', 0, 0, 0, 2),
(44, 'Lighting', 'Lighting Trees with Dimmer Pack and Lighting Board', 'Pair of Lighting Trees w/ 2 “Leko Source 4” Ellipsoid Lights w/ Dimmer Pack & DMX lighting board', '', '', 'pair', 1, 0, '700.00', '700.00', 0, 0, 0, 2),
(45, 'Lighting', 'Spots on Tripod Stands with Lighting Board', 'Pair of Chauvet Follow spots on tripod stands w/ DMX Lighting board', '', '', 'pair', 1, 0, '500.00', '500.00', 0, 0, 0, 5),
(46, 'Lighting', 'Battery Powered Uplights', 'Chauvet Battery Powered Uplights', 'Chauvet', '', 'each', 20, 0, '20.00', '20.00', 0, 0, 0, 4),
(47, 'Laptop Accessory', 'Laptop Slide Advancer', 'Laptop Slide Advancer', '', '', 'each', 6, 0, '25.00', '25.00', 0, 0, 0, 1),
(48, 'Laptop', 'Laptop for Powerpoint or Video Playback ', 'Laptop for Powerpoint or Video Playback ', '', '', 'each', 6, 0, '125.00', '125.00', 0, 0, 0, 2),
(49, 'Drape Panel', 'Pipe and Drape Panel', '15\' Panel of Pipe and Drape (price per panel)', '', '', 'each', 0, 0, '75.00', '75.00', 0, 0, 0, 1),
(50, 'Podium', 'Plastic Podium', 'Plastic Podium', '', '', 'each', 1, 0, '95.00', '95.00', 0, 0, 0, 3),
(51, 'Podium', 'Lucite Podium', 'Lucite Podium', '', '', 'each', 1, 0, '195.00', '195.00', 0, 0, 0, 5),
(52, 'Cable', 'Aux Cable', 'Aux Connection Cable. Promotional product. Add to packages at no charge.', '', '', 'each', 5, 1, '0.00', '0.00', 0, 0, 0, 3),
(53, 'Bluetooth Connection', 'Bluetooth Connection', 'Bluetooth Connection. Promotional product. Add to packages at no charge.', '', '', 'each', 5, 1, '0.00', '0.00', 0, 0, 0, 3),
(54, 'Speaker Cable', 'Speaker Cable', 'Speaker Cable. Promotional product. Add to packages at no charge.', '', '', 'each', 5, 1, '0.00', '0.00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profit_loss`
--

CREATE TABLE `profit_loss` (
  `profit_loss_ID` int(11) NOT NULL,
  `report_num` int(11) NOT NULL,
  `device_name` int(11) NOT NULL,
  `todays_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_sales_check` decimal(10,2) NOT NULL,
  `total_sales_card` decimal(10,2) NOT NULL,
  `total_sales_cash` decimal(10,2) NOT NULL,
  `total_refunds_check` decimal(10,2) NOT NULL,
  `total_refunds_card` decimal(10,2) NOT NULL,
  `total_refunds_cash` decimal(10,2) NOT NULL,
  `refunds_total` decimal(10,2) NOT NULL,
  `salaries_total` decimal(10,2) NOT NULL,
  `profit_loss` decimal(10,2) NOT NULL,
  `tax_collected_jan` decimal(10,2) NOT NULL,
  `tax_collected_feb` decimal(10,2) NOT NULL,
  `tax_collected_mar` decimal(10,2) NOT NULL,
  `tax_collected_apr` decimal(10,2) NOT NULL,
  `tax_collected_may` decimal(10,2) NOT NULL,
  `tax_collected_jun` decimal(10,2) NOT NULL,
  `tax_collected_jul` decimal(10,2) NOT NULL,
  `tax_collected_aug` decimal(10,2) NOT NULL,
  `tax_collected_sep` decimal(10,2) NOT NULL,
  `tax_collected_oct` decimal(10,2) NOT NULL,
  `tax_collected_nov` decimal(10,2) NOT NULL,
  `tax_collected_dec` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund` int(11) NOT NULL,
  `amt_refunded_cash` decimal(10,2) NOT NULL,
  `amt_refunded_check` decimal(10,2) NOT NULL,
  `amt_refunded_credit` decimal(10,2) NOT NULL,
  `date_refunded` date NOT NULL,
  `refund_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund`, `amt_refunded_cash`, `amt_refunded_check`, `amt_refunded_credit`, `date_refunded`, `refund_reason`) VALUES
(2, '0.00', '75.00', '0.00', '2022-05-04', 'Product added to cart by mistake.');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_ID` int(11) NOT NULL,
  `packing_list__ID_fk` int(11) NOT NULL,
  `is_pickup` tinyint(1) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `travel_time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `is_inactive` tinyint(1) NOT NULL,
  `vendor_notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_ID`, `company_name`, `website`, `salesrep`, `email`, `phone`, `is_inactive`, `vendor_notes`) VALUES
(1, 'Amazon', 'amazon.com', 'Margaret Stevens', 'mstevens@email.com', '845-555-3009', 0, 'online vendor'),
(2, 'B&H Video', 'bandh.com', 'David Harris', 'dharris@email.com', '845-555-3012', 0, ''),
(3, 'Pro AV Warehouse', 'proavwarehouse.com', 'Becky Williams', 'bwilliams@email.com', '845-555-3017', 0, 'Vendor is also a client.'),
(4, 'Grainger', 'grainger.com', 'Betty Davis', 'bdavis@email.com', '845-555-3014', 0, ''),
(5, 'Canon', 'canon.com', 'Bill Perkins', 'bperkins.com', '845-555-3016', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_ID` int(11) NOT NULL,
  `venue_name` varchar(50) NOT NULL,
  `venue_type` varchar(25) NOT NULL,
  `contact_first_name` varchar(25) NOT NULL,
  `contact_last_name` varchar(25) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_abbr` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `venue_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_ID`, `venue_name`, `venue_type`, `contact_first_name`, `contact_last_name`, `contact_email`, `address_line1`, `address_line2`, `city`, `state_abbr`, `zip_code`, `phone`, `venue_notes`) VALUES
(1, 'New Haven Inn', 'Business', 'Liam', 'Jones', 'nhaveninn@email', '217 Park Lane', '', 'New Haven', 'NY', '12345', '845-555-3004', 'Add venue notes here'),
(2, 'Marriott Conference Center', 'Business', 'Olivia', 'Moore', 'marriott@email', '2641 South Rd.', '', 'Poughkeepsie', 'NY', '12601', '845-555-3005', 'Add venue notes here'),
(3, 'Greenkill Retreat Center', 'Business', 'Lily', 'Jackson', 'greenkill@email', '300 Pond Rd.', '', 'Huguenot', 'NY', '', '845-555-3006', 'Add venue notes here'),
(4, 'The Chateau', 'Business', 'George', 'Wright', 'chateau@email', '260 E. Blvd', '', 'Kingston', 'NY', '12401', '845-555-3007', 'Add venue notes here'),
(5, 'Wilson Residence', 'Private Residence', 'Derrick', 'Wilson', 'dwilson@email', '139 Smith St.', '', 'Poughkeepsie', 'NY', '12601', '845-555-2004', 'Add venue notes here');

-- --------------------------------------------------------

--
-- Table structure for table `z_report`
--

CREATE TABLE `z_report` (
  `z_report_ID` int(11) NOT NULL,
  `report_num` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `todays_date` date NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `beginning_invoice` int(11) NOT NULL,
  `ending_invoice` int(11) NOT NULL,
  `total_checks` decimal(10,2) NOT NULL,
  `total_card` decimal(10,2) NOT NULL,
  `total_cash` decimal(10,2) NOT NULL,
  `total_tendered` decimal(10,2) NOT NULL,
  `refunds_check` decimal(10,2) NOT NULL,
  `refunds_card` decimal(10,2) NOT NULL,
  `refunds_cash` decimal(10,2) NOT NULL,
  `refunds_total` decimal(10,2) NOT NULL,
  `total_tax_collected` decimal(10,2) NOT NULL,
  `refund_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorize_credentials`
--
ALTER TABLE `authorize_credentials`
  ADD PRIMARY KEY (`authorize_credentials_ID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_ID`);

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
-- Indexes for table `event_product_list`
--
ALTER TABLE `event_product_list`
  ADD PRIMARY KEY (`event_product_list_ID`) USING BTREE,
  ADD KEY `event_order_ID_fk` (`event_order_ID_fk`),
  ADD KEY `product_ID_fk` (`product_ID_fk`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_ID`),
  ADD KEY `client_ID_fk` (`client_ID_fk`),
  ADD KEY `event_order_ID_fk` (`event_order_ID_fk`),
  ADD KEY `venue_ID_fk` (`venue_ID_fk`),
  ADD KEY `refund_ID_fk` (`refund_ID_fk`),
  ADD KEY `event_product_list_ID_fk` (`event_product_list_ID_fk`);

--
-- Indexes for table `packing_list`
--
ALTER TABLE `packing_list`
  ADD PRIMARY KEY (`packing_list_ID`),
  ADD KEY `employee_ID_fk` (`employee_ID_fk`),
  ADD KEY `event_product_list_ID_fk` (`event_product_list_ID_fk`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`),
  ADD KEY `invoice_ID_fk` (`invoice_ID_fk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `vendor_ID_fk` (`vendor_ID_fk`);

--
-- Indexes for table `profit_loss`
--
ALTER TABLE `profit_loss`
  ADD PRIMARY KEY (`profit_loss_ID`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_ID`),
  ADD KEY `packing_list_ID_fk` (`packing_list__ID_fk`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_ID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_ID`);

--
-- Indexes for table `z_report`
--
ALTER TABLE `z_report`
  ADD PRIMARY KEY (`z_report_ID`),
  ADD KEY `refund_ID_fk` (`refund_ID_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorize_credentials`
--
ALTER TABLE `authorize_credentials`
  MODIFY `authorize_credentials_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_order`
--
ALTER TABLE `event_order`
  MODIFY `event_order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `event_product_list`
--
ALTER TABLE `event_product_list`
  MODIFY `event_product_list_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `packing_list_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `profit_loss`
--
ALTER TABLE `profit_loss`
  MODIFY `profit_loss_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `z_report`
--
ALTER TABLE `z_report`
  MODIFY `z_report_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_product_list`
--
ALTER TABLE `event_product_list`
  ADD CONSTRAINT `event_product_list_ibfk_1` FOREIGN KEY (`product_ID_fk`) REFERENCES `product` (`product_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `event_product_list_ibfk_2` FOREIGN KEY (`event_order_ID_fk`) REFERENCES `event_order` (`event_order_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`client_ID_fk`) REFERENCES `client` (`client_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`event_order_ID_fk`) REFERENCES `event_order` (`event_order_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`venue_ID_fk`) REFERENCES `venue` (`venue_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_4` FOREIGN KEY (`event_product_list_ID_fk`) REFERENCES `event_product_list` (`event_product_list_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `packing_list`
--
ALTER TABLE `packing_list`
  ADD CONSTRAINT `packing_list_ibfk_2` FOREIGN KEY (`employee_ID_fk`) REFERENCES `employee` (`employee_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `packing_list_ibfk_3` FOREIGN KEY (`event_product_list_ID_fk`) REFERENCES `event_product_list` (`event_product_list_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`invoice_ID_fk`) REFERENCES `invoice` (`invoice_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`vendor_ID_fk`) REFERENCES `vendor` (`vendor_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`packing_list__ID_fk`) REFERENCES `packing_list` (`packing_list_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `z_report`
--
ALTER TABLE `z_report`
  ADD CONSTRAINT `z_report_ibfk_1` FOREIGN KEY (`refund_ID_fk`) REFERENCES `refund` (`refund`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;