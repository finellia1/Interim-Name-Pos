-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 04:26 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_ID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_ID`, `email`, `first_name`, `last_name`, `company`, `address_line1`, `address_line2`, `city`, `state`, `zip_code`, `phone`) VALUES
(1, 'sjones@email.com', 'Sarah', 'Jones','Jones Grill', '49 Baker St.', '', 'Modena', 'NY', '12515', '845-555-2000'),
(2, 'jsmith@email.com', 'John', 'Smith', 'HV Desserts', '68 Main St.', '', 'Kingston', 'NY', '12401', '845-555-2001'),
(3, 'abaker@email.com', 'Amy', 'Baker', 'Artists Haven', '127 Rte. 44', '', 'Poughkeepsie', 'NY', '12401', '845-555-2002'),
(4, 'darnald@email.com', 'Dan', 'Arnold', 'Ulster County Realtors', '14 Albany Ave.', '', 'Kingston', 'NY', '12401', '845-555-2003'),
(5, 'bmiller@email.com', 'Bill', 'Miller',  '', '5 Water St.', '', 'New Paltz', 'NY', '12561', '845-555-2004');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(15) NOT NULL,
  `employee_type` varchar(50) NOT NULL
  'password' varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birth_date` date,
  `availability` varchar(100) NOT NULL,
  'status' varchar(15) NOT NULL,
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_ID`, 'employee_type', 'password', `email`, `first_name`, `last_name`, `address_line1`, `address_line2`, `city`, `state`, `zip_code`, `phone`, 'birth_date', 'availability', 'status') VALUES
(1, 1, 0, 'sys_password1', 'mgr@hvav', 'Sarah', 'Jones', '121 Main St', 'Apt 3B', 'Modena', 'NY', '12515', '845-555-1000', '2-15-78', 'M-F, 9-7pm', 'inactive'),
(2, 2, 0, 'sys_password2', 'staff1@hvav', 'John', 'Smith', '121 Main St', 'Apt 3B', 'Modena', 'NY', '12515', '845-555-1000', '2-15-78', 'M-F, 9-7pm', 'inactive'),),
(3, 2, 0, 'sys_password3', 'staff2@hvav', 'Sarah', 'Jones', '121 Main St', 'Apt 3B', 'Modena', 'NY', '12515', '845-555-1000', '2-15-78', 'M-F, 9-7pm', 'inactive'),),
(4, 2, 0, 'sys_password4', 'staff3@hvav', 'Sarah', 'Jones', '121 Main St', 'Apt 3B', 'Modena', 'NY', '12515', '845-555-1000', '2-15-78', 'M-F, 9-7pm', 'inactive'),),
(5, 2, 0, 'sys_password5', 'staff4@hvav', 'Sarah', 'Jones', '121 Main St', 'Apt 3B', 'Modena', 'NY', '12515', '845-555-1000', '2-15-78', 'M-F, 9-7pm', 'inactive'),);

-- --------------------------------------------------------

--
-- Table structure for table `event_order`
--

CREATE TABLE `event_order` (
  `event_order_ID` int(11) NOT NULL,
  `venue_ID_fk` int(11) NOT NULL,
  `product_ID_fk` int(11) NOT NULL,
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

--
-- Dumping data for table `event_order`
--

INSERT INTO `event_order` (`event_order_ID`, `venue_ID_fk`, `product_ID_fk`, `event_type`, `is_nonprofit`, `order_date`, `event_date_start`, `event_date_end`, `event_time_start`, `event_time_end`, `num_trucks_needed`, `num_techs_needed`, `setup_date`, `load_in_time`, `on_site_time`, `breakdown_date`, `created_by`, `event_notes`) VALUES
(1, 3, 40, 'Wedding', 0, '2001-01-07', '2005-05-03', '2005-05-03', '14:00:00', '17:00:00', 2, 2, '2005-05-02', '10:00:00', '12:00:00', '2005-05-04', 'S. Jones', 'Add event notes here.'),
(2, 2, 4, 'Conference', 0, '2022-03-11', '2022-03-07', '2022-03-11', '09:00:00', '17:00:00', 2, 1, '2022-03-06', '06:00:00', '07:00:00', '2022-03-12', 'S.Jones', ''),
(3, 4, 29, 'Party', 0, '2022-02-01', '2022-03-17', '2022-03-17', '13:00:00', '16:00:00', 1, 1, '2022-03-16', '09:00:00', '11:00:00', '2022-03-18', 'J. Smith', ''),
(4, 1, 14, 'Corporate Training', 0, '2022-02-02', '2022-04-04', '2022-04-04', '10:00:00', '16:00:00', 2, 1, '2022-04-03', '10:00:00', '11:00:00', '2022-04-05', 'S. Jones', ''),
(5, 4, 38, 'Party', 1, '2022-02-05', '2022-04-24', '2022-04-24', '12:00:00', '19:00:00', 1, 2, '2022-04-23', '09:00:00', '10:00:00', '2022-04-25', 'J. Smith', '');

-- --------------------------------------------------------

--
-- Table structure for table `foreign_key_table`
--

CREATE TABLE `foreign_key_table` (
  `foreign_key_table_ID` int(11) NOT NULL,
  `invoice_ID_fk` int(11) NOT NULL,
  `client_ID_fk` int(11) NOT NULL,
  `product_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_ID` int(11) NOT NULL,
  `invoice_list_ID_fk` int(11) NOT NULL,
  `event_order_ID_fk` int(11) NOT NULL,
  `client_ID_fk` int(11) NOT NULL,
  `product_ID_fk` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `total_due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_ID`, `invoice_list_ID_fk`, `event_order_ID_fk`, `client_ID_fk`, `product_ID_fk`, `invoice_date`, `total_due`) VALUES
(1, 1, 1, 1, 1, '2022-01-07', '1015.00'),
(2, 0, 2, 2, 0, '2022-01-28', '765.00'),
(3, 0, 3, 3, 0, '2022-02-01', '1375.00'),
(4, 0, 4, 1, 0, '2022-02-02', '1285.00'),
(5, 0, 5, 2, 0, '2022-02-02', '525.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_list`
--

CREATE TABLE `invoice_list` (
  `invoice_list_ID` int(11) NOT NULL,
  `invoice_ID_fk` int(11) NOT NULL,
  `product_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_list`
--

INSERT INTO `invoice_list` (`invoice_list_ID`, `invoice_ID_fk`, `product_ID_fk`) VALUES
(1, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `packing_list`
--

CREATE TABLE `packing_list` (
  `packing_list_ID` int(11) NOT NULL,
  `venue_ID_fk` int(11) NOT NULL,
  `product_ID_fk` int(11) NOT NULL,
  `employee_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packing_list`
--

INSERT INTO `packing_list` (`packing_list_ID`, `venue_ID_fk`, `product_ID_fk`, `employee_ID_fk`) VALUES
(1, 3, 40, 3),
(2, 2, 4, 3),
(3, 4, 29, 4),
(4, 1, 14, 4),
(5, 4, 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `invoice_ID_fk` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `is_preauth` tinyint(1) NOT NULL,
  `balance_due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `invoice_ID_fk`, `payment_date`, `payment_method`, `amount_paid`, `is_preauth`, `balance_due`) VALUES
(1, 1, '2022-01-07', 'Credit Card', '1015.00', 1, '0.00'),
(2, 2, '2022-01-28', 'Credit Card', '785.00', 0, '0.00'),
(3, 3, '2022-02-01', 'Credit Card', '1375.00', 1, '0.00'),
(4, 4, '2022-02-02', 'Credit Card', '1285.00', 1, '0.00'),
(5, 5, '2022-02-05', 'Check', '525.00', 0, '0.00');

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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_type`, `product_name`, `product_description`, `make`, `model`, `qty_unit`, `qty_in_stock`, `is_promotional`, `reg_price`, `discounted_price`, `num_rented`, `num_broken`) VALUES
(1, 'Audio', 'Speaker', 'AN130 Speaker', 'Anchor', 'AN130', 'each', 2, 0, '75.00', '75.00', 0, 0),
(2, 'Audio', 'Speaker', 'JBL EON 610 Speaker', 'JBL', 'EON 610', 'pair', 1, 0, '175.00', '150.00', 0, 0),
(3, 'Audio', 'Speaker', 'JBL EON 615 Speaker', 'JBL', 'EON 615', 'pair', 3, 0, '225.00', '200.00', 0, 0),
(4, 'Audio', 'Subwoofer Speaker', 'JBL EON 518 Powered Subwo', 'JBL', 'EON 518', 'each', 3, 0, '100.00', '100.00', 0, 0),
(5, 'Audio', 'Loudspeaker', 'Carvin Column Array Loudspeaker', 'Carvin', '', 'pair', 1, 0, '395.00', '300.00', 0, 0),
(6, 'Audio Set', 'Speaker with Microphone', 'Pair of Anchor Liberty Speakers with Wireless Handheld Microphone', 'Anchor', 'Liberty', 'pair', 2, 0, '275.00', '200.00', 0, 0),
(7, 'Audio Set', 'Speaker with Microphone', 'Pair of Anchor Bigfoot Speakers with Wireless Handheld Microphone', 'Anchor', 'Bigfoot', 'pair', 1, 0, '375.00', '300.00', 0, 0),
(8, 'Audio', 'Microphone', 'Shure Wireless Microphone HH or Lavalier Single Pack', 'Shure', '', 'each', 9, 0, '125.00', '75.00', 0, 0),
(9, 'Audio ', 'Microphone', '4 Pack of Shure Wireless Microphone HH or Lavalier', 'Shure', '', 'each', 1, 0, '450.00', '450.00', 0, 0),
(10, 'Audio', 'Microphone', 'Shure SM58', 'Shure', 'SM58', 'each', 16, 0, '50.00', '50.00', 0, 0),
(11, 'Audio', 'Mixer', 'Behringer Xenyx 4 Channel Mixer', 'Behringer', 'Xenyx 4', 'each', 2, 0, '45.00', '45.00', 0, 0),
(12, 'Audio', 'Mixer', 'Mackie 8 Channel Mixer', 'Mackie', '', 'each', 3, 0, '95.00', '95.00', 0, 0),
(13, 'Audio', 'Mixer', 'Behringer X32 Mixing Console ', 'Behringer', 'X32', 'each', 1, 0, '345.00', '345.00', 0, 0),
(14, 'Audio Set', 'Mixing Console with 4 Mic', 'Behringer X32 Mixing Console with 4 Wireless Shure Microphones', 'Behringer, Shure', '', 'kit', 1, 0, '495.00', '400.00', 0, 0),
(15, 'Audio Set', 'Mixing Console with Microphones', 'Midas M32R Mixing Console with 8 Wireless Shure Microphones', 'Midas, Shure', '', 'set', 1, 0, '695.00', '545.00', 0, 0),
(16, 'Audio', 'Microphone', 'Shure Wireless Microphone HH or Lavalier Single Pack', 'Shure', '', 'each', 9, 0, '125.00', '75.00', 0, 0),
(17, 'Audio', 'Microphone', '4 Pack of Shure Wireless Microphone HH or Lavalier', 'Shure', '', 'each', 1, 0, '450.00', '450.00', 0, 0),
(18, 'Audio', 'Microphone', 'Shure SM58', 'Shure', 'SM58', 'each', 16, 0, '50.00', '50.00', 0, 0),
(19, 'Video', 'Tripod Screen', 'Tripod Screen (5\')', '', '', 'each', 1, 0, '50.00', '50.00', 0, 0),
(20, 'Video', 'Tripod Screen', 'Tripod Screen (6\')', '', '', 'each', 1, 0, '50.00', '50.00', 0, 0),
(21, 'Video', 'Tripod Screen', 'Tripod Screen (8\')', '', '', 'each', 1, 0, '50.00', '50.00', 0, 0),
(22, 'Video', 'Cradle Screen', 'Cradle Screen (10\')', '', '', 'each', 1, 0, '110.00', '110.00', 0, 0),
(23, 'Video', 'Fast Fold Screen', 'Fast Fold Screen (7.5 x 10\'). Requires 2 Techs for setup.', '', '', 'each', 2, 0, '225.00', '225.00', 0, 0),
(24, 'Video', 'Fast Fold Screen', 'Fast Fold Screen (9 x 12\'). Requires 2 Techs for setup.', '', '', 'each', 2, 0, '275.00', '275.00', 0, 0),
(25, 'Video', 'Inflatable Screen', '16 x 9\' inflatable screen.', '', '', 'each', 0, 0, '495.00', '495.00', 0, 0),
(26, 'Video', 'Fast Fold Screen', '16 x 9\' Fast Fold Screen (SUBRENTAL). Requires 2 Techs for setup.', '', '', 'each', 0, 0, '495.00', '495.00', 0, 0),
(27, 'Projector', 'Projector', '3K Lumen Projector', 'Eiki', 'LC-WB200', 'each', 4, 0, '225.00', '225.00', 0, 0),
(28, 'Projector', 'Projector', '6K Lumen Projector', 'NEC', 'PA622U', 'each', 2, 0, '495.00', '395.00', 0, 0),
(29, 'Projector', 'Projector', '12K Lumen Projector', 'Eiki, NEC', 'EK-800U, PX1004UL', 'each', 4, 0, '925.00', '795.00', 0, 0),
(30, 'Monitor', 'Monitor with Skirting', 'Confidence Monitor w/Skirting ', '', '', 'each', 3, 0, '95.00', '95.00', 0, 0),
(31, 'Monitor with Stand', 'Flat Panel Monitor on Rolling Stand ', '55\" Flat Panel Monitor on Rolling Stand', '', '', 'each', 2, 0, '295.00', '295.00', 0, 0),
(32, 'Monitor with Stand', 'Flat Panel Monitor on Rolling Stand ', '70\" Flat Panel Monitor on Rolling Stand. (REQUIRES 2 TECHS for setup).', '', '', 'each', 3, 0, '495.00', '395.00', 0, 0),
(33, 'Monitor', 'Flat Panel Monitor on Rolling Stand ', '86\" Flat Panel Monitor on Rolling Stand. (REQUIRES 2 TECHS for setup). ', '', '', 'each', 6, 0, '695.00', '545.00', 0, 0),
(34, 'Projector Set', 'Projector with Screen', 'Tripod Screen with 3K Lumen Projector ', '', '', 'each', 0, 0, '275.00', '275.00', 0, 0),
(35, 'Projector Set', 'Projector with Screen', '7.5\' x 10\' Fast Fold Screen with 6K Lumen Projector.  (REQUIRES 2 TECHS for setup).', '', '', 'each', 0, 0, '720.00', '720.00', 0, 0),
(36, 'Projector Set', 'Projector with Screen', '9\' x 12\' Fast Fold Screen with 12K Lumen Projector.  (REQUIRES 2 TECHS for setup)..', '', '', 'each', 0, 0, '1200.00', '1200.00', 0, 0),
(37, 'Switcher', 'Roland Video Switcher', 'Roland Video Switcher', 'Roland', '', 'each', 1, 0, '225.00', '175.00', 0, 0),
(38, 'Switcher', 'Single Scaled Video Switcher', 'Single Scaled Video Switcher', 'Roland', '', 'each', 2, 0, '150.00', '150.00', 0, 0),
(39, 'Audio', 'Amplifier', 'HDMI Distribution Amplifier (1->4 or 1->8) ', '', '', 'each', 4, 0, '50.00', '50.00', 0, 0),
(40, 'Camera', 'Camera on Tripod Stand', 'Canon XA35 (or XA20) Camera on Tripod Stand', 'Canon', 'XA35 or XA20', 'each', 2, 0, '225.00', '225.00', 0, 0),
(41, 'Switcher', 'Streaming Switcher', 'ATEM mini 4 channel Streaming Switcher', 'ATEM', '', 'each', 1, 0, '200.00', '200.00', 0, 0),
(42, 'Camera', 'Streaming Set', 'Streaming Rig (Streaming laptop, ATEM streaming switcher and capture card) ', 'ATEM', '', 'each', 1, 0, '400.00', '350.00', 0, 0),
(43, 'Camera', 'Camera System', 'Vaddio PTZ Camera System with 3 Joystick controlled PTZ cameras', 'Vaddio', '', 'each', 1, 0, '795.00', '695.00', 0, 0),
(44, 'Lighting', 'Lighting Trees with Dimmer Pack and Lighting Board', 'Pair of Lighting Trees w/ 2 “Leko Source 4” Ellipsoid Lights w/ Dimmer Pack & DMX lighting board', '', '', 'pair', 1, 0, '700.00', '700.00', 0, 0),
(45, 'Lighting', 'Spots on Tripod Stands with Lighting Board', 'Pair of Chauvet Follow spots on tripod stands w/ DMX Lighting board', '', '', 'pair', 1, 0, '500.00', '500.00', 0, 0),
(46, 'Lighting', 'Battery Powered Uplights', 'Chauvet Battery Powered Uplights', 'Chauvet', '', 'each', 20, 0, '20.00', '20.00', 0, 0),
(47, 'Laptop Accessory', 'Laptop Slide Advancer', 'Laptop Slide Advancer', '', '', 'each', 6, 0, '25.00', '25.00', 0, 0),
(48, 'Laptop', 'Laptop for Powerpoint or Video Playback ', 'Laptop for Powerpoint or Video Playback ', '', '', 'each', 6, 0, '125.00', '125.00', 0, 0),
(49, 'Drape Panel', 'Pipe and Drape Panel', '15\' Panel of Pipe and Drape (price per panel)', '', '', 'each', 0, 0, '75.00', '75.00', 0, 0),
(50, 'Podium', 'Plastic Podium', 'Plastic Podium', '', '', 'each', 1, 0, '95.00', '95.00', 0, 0),
(51, 'Podium', 'Lucite Podium', 'Lucite Podium', '', '', 'each', 1, 0, '195.00', '195.00', 0, 0),
(52, 'Cable', 'Aux Cable', 'Aux Connection Cable. Promotional product. Add to packages at no charge.', '', '', 'each', 5, 1, '0.00', '0.00', 0, 0),
(53, 'Bluetooth Connection', 'Bluetooth Connection', 'Bluetooth Connection. Promotional product. Add to packages at no charge.', '', '', 'each', 5, 1, '0.00', '0.00', 0, 0),
(54, 'Speaker Cable', 'Speaker Cable', 'Speaker Cable. Promotional product. Add to packages at no charge.', '', '', 'each', 5, 1, '0.00', '0.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `security_level`
--

CREATE TABLE `security_level` (
  `security_level_ID` int(11) NOT NULL,
  `security_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_level`
--

INSERT INTO `security_level` (`security_level_ID`, `security_type`) VALUES
(1, 'administrator'),
(2, 'manager'),
(3, 'staff'),
(4, 'user');

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
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `venue_phone` varchar(15) NOT NULL,
  `venue_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_ID`, `venue_type`, `venue_name`, `contact_first_name`, `contact_last_name`, `contact_email`, `address_line1`, `address_line2`, `city`, `state`, `zip_code`, `venue_phone`, `venue_notes`) VALUES
(1, 'Business', 'New Haven Inn', 'Liam', 'Jones', 'nhaveninn@email', '217 Park Lane', '', 'New Haven', 'NY', '12345', '845-555-3004', 'Add venue notes here'),
(2, 'Business', 'Marriott Conference Center', 'Olivia', 'Moore', 'marriott@email', '2641 South Rd.', '', 'Poughkeepsie', 'NY', '12601', '845-555-3005', 'Add venue notes here'),
(3, 'Business', 'Greenkill Retreat Center', 'Lily', 'Jackson', 'greenkill@email', '300 Pond Rd.', '', 'Huguenot', 'NY', '', '845-555-3006', 'Add venue notes here'),
(4, 'Business', 'The Chateau', 'George', 'Wright', 'chateau@email', '260 E. Blvd', '', 'Kingston', 'NY', '12401', '845-555-3007', 'Add venue notes here'),
(5, 'Private Residence', 'Wilson Residence', 'Derrick', 'Wilson', 'dwilson@email', '139 Smith St.', '', 'Poughkeepsie', 'NY', '12601', '845-555-2004', 'Add venue notes here');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`),
  ADD KEY `security_level_ID_fk` (`security_level_ID_fk`),
  ADD KEY `client_ID_fk` (`client_ID_fk`);

--
-- Indexes for table `event_order`
--
ALTER TABLE `event_order`
  ADD PRIMARY KEY (`event_order_ID`),
  ADD KEY `venue_ID_fk` (`venue_ID_fk`),
  ADD KEY `product_ID_fk` (`product_ID_fk`);

--
-- Indexes for table `foreign_key_table`
--
ALTER TABLE `foreign_key_table`
  ADD PRIMARY KEY (`foreign_key_table_ID`),
  ADD KEY `invoice_fk` (`invoice_ID_fk`),
  ADD KEY `client_ID_fk` (`client_ID_fk`),
  ADD KEY `product_ID_fk` (`product_ID_fk`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_ID`),
  ADD KEY `event_order_ID_fk` (`event_order_ID_fk`),
  ADD KEY `client_ID_fk` (`client_ID_fk`),
  ADD KEY `product_ID_fk` (`product_ID_fk`),
  ADD KEY `invoice_list_ID_fk` (`invoice_list_ID_fk`);

--
-- Indexes for table `invoice_list`
--
ALTER TABLE `invoice_list`
  ADD PRIMARY KEY (`invoice_list_ID`),
  ADD KEY `invoice_ID_fk` (`invoice_ID_fk`),
  ADD KEY `product_ID_fk` (`product_ID_fk`);

--
-- Indexes for table `packing_list`
--
ALTER TABLE `packing_list`
  ADD PRIMARY KEY (`packing_list_ID`),
  ADD KEY `venue_ID_fk` (`venue_ID_fk`),
  ADD KEY `product_ID_fk` (`product_ID_fk`),
  ADD KEY `employee_ID_fk` (`employee_ID_fk`);

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
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `security_level`
--
ALTER TABLE `security_level`
  ADD PRIMARY KEY (`security_level_ID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `foreign_key_table`
--
ALTER TABLE `foreign_key_table`
  MODIFY `foreign_key_table_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_list`
--
ALTER TABLE `invoice_list`
  MODIFY `invoice_list_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `packing_list_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
ALTER TABLE `security_level`
  MODIFY `security_level_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`security_level_ID_fk`) REFERENCES `security_level` (`security_level_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `event_order`
--
ALTER TABLE `event_order`
  ADD CONSTRAINT `event_order_ibfk_2` FOREIGN KEY (`venue_ID_fk`) REFERENCES `venue` (`venue_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `event_order_ibfk_4` FOREIGN KEY (`product_ID_fk`) REFERENCES `product` (`product_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `foreign_key_table`
--
ALTER TABLE `foreign_key_table`
  ADD CONSTRAINT `foreign_key_table_ibfk_1` FOREIGN KEY (`invoice_ID_fk`) REFERENCES `invoice` (`invoice_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_table_ibfk_2` FOREIGN KEY (`client_ID_fk`) REFERENCES `client` (`client_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_table_ibfk_3` FOREIGN KEY (`product_ID_fk`) REFERENCES `product` (`product_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`event_order_ID_fk`) REFERENCES `event_order` (`event_order_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`client_ID_fk`) REFERENCES `client` (`client_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `invoice_list`
--
ALTER TABLE `invoice_list`
  ADD CONSTRAINT `invoice_list_ibfk_1` FOREIGN KEY (`invoice_ID_fk`) REFERENCES `invoice` (`invoice_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_list_ibfk_2` FOREIGN KEY (`product_ID_fk`) REFERENCES `product` (`product_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`invoice_ID_fk`) REFERENCES `invoice` (`invoice_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
