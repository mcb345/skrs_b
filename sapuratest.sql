-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 05:08 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapuratest`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_master`
--

CREATE TABLE `inventory_master` (
  `id` int(5) NOT NULL,
  `inv_name` varchar(30) NOT NULL,
  `serial_no` varchar(20) NOT NULL,
  `faulty` varchar(1) NOT NULL,
  `loc_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_master`
--

CREATE TABLE `location_master` (
  `id` int(10) NOT NULL,
  `loc_code` varchar(10) NOT NULL,
  `loc_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_master`
--

INSERT INTO `location_master` (`id`, `loc_code`, `loc_name`) VALUES
(2, 'TP123', 'VISTA'),
(3, 'TP234', 'ENDAH');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_request_detail`
--

CREATE TABLE `transfer_request_detail` (
  `id` int(10) NOT NULL,
  `req_code` int(10) NOT NULL,
  `req_by` varchar(20) NOT NULL,
  `inv_name` varchar(30) NOT NULL,
  `from_loc` varchar(10) NOT NULL,
  `to_loc` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `approved_by` varchar(20) NOT NULL,
  `req_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_request_detail`
--

INSERT INTO `transfer_request_detail` (`id`, `req_code`, `req_by`, `inv_name`, `from_loc`, `to_loc`, `status`, `approved_by`, `req_date`) VALUES
(30, 0, '', 'printerlaserjet', 'TP123', '', '', '', '0000-00-00'),
(31, 0, '', 'printerlaserjet', 'TP123', '', '', '', '0000-00-00'),
(32, 0, '', 'bigmonitor', 'TP123', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `position` varchar(15) NOT NULL,
  `loc_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `username`, `password`, `position`, `loc_code`) VALUES
(2, 'fairuz', '1234', 'admin', 'TP234'),
(3, 'lazada', '456', 'manager', 'TP234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_master`
--
ALTER TABLE `inventory_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_no` (`serial_no`),
  ADD KEY `loc_code` (`loc_code`);

--
-- Indexes for table `location_master`
--
ALTER TABLE `location_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loc_code` (`loc_code`);

--
-- Indexes for table `transfer_request_detail`
--
ALTER TABLE `transfer_request_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_by` (`req_by`),
  ADD KEY `inv_name` (`inv_name`),
  ADD KEY `from_loc` (`from_loc`),
  ADD KEY `to_loc` (`to_loc`),
  ADD KEY `approved_by` (`approved_by`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `loc_code` (`loc_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_master`
--
ALTER TABLE `inventory_master`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location_master`
--
ALTER TABLE `location_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transfer_request_detail`
--
ALTER TABLE `transfer_request_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_master`
--
ALTER TABLE `inventory_master`
  ADD CONSTRAINT `inv_loc` FOREIGN KEY (`loc_code`) REFERENCES `location_master` (`loc_code`) ON DELETE CASCADE;

--
-- Constraints for table `transfer_request_detail`
--
ALTER TABLE `transfer_request_detail`
  ADD CONSTRAINT `req_from_loc` FOREIGN KEY (`from_loc`) REFERENCES `location_master` (`loc_code`) ON DELETE CASCADE;

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_loc` FOREIGN KEY (`loc_code`) REFERENCES `location_master` (`loc_code`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
