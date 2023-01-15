-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 05:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sw`
--

-- --------------------------------------------------------

--
-- Table structure for table `sw_admin`
--

CREATE TABLE `sw_admin` (
  `admin_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_admin`
--

INSERT INTO `sw_admin` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `date_added`) VALUES
(1, 'admin', 'admin', 'SW1', 'Admin1', '2022-04-18 15:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `sw_application`
--

CREATE TABLE `sw_application` (
  `application_id` int(20) NOT NULL,
  `service_id` int(12) NOT NULL,
  `customer_id` int(12) NOT NULL,
  `status` int(1) NOT NULL,
  `schedule_date` varchar(50) NOT NULL,
  `resched` int(1) NOT NULL,
  `reason` text NOT NULL,
  `upstatus` varchar(12) NOT NULL,
  `is_upgrade` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_application`
--

INSERT INTO `sw_application` (`application_id`, `service_id`, `customer_id`, `status`, `schedule_date`, `resched`, `reason`, `upstatus`, `is_upgrade`, `is_active`, `date_added`) VALUES
(5, 5, 1, 0, '2022-10-20', 0, '', '', 1, 0, '2022-10-19 08:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `sw_barangay`
--

CREATE TABLE `sw_barangay` (
  `barangay_id` int(12) NOT NULL,
  `barangay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sw_barangay`
--

INSERT INTO `sw_barangay` (`barangay_id`, `barangay`) VALUES
(1, 'Bancal'),
(2, 'Cabilang Baybay'),
(3, 'Lantic'),
(4, 'Mabuhay'),
(5, 'Maduya'),
(6, 'Milagrosa'),
(7, 'Poblacion 1'),
(8, 'Poblacion 2'),
(9, 'Poblacion 3'),
(10, 'Poblacion 4'),
(11, 'Poblacion 5'),
(12, 'Poblacion 6'),
(13, 'Poblacion 7'),
(14, 'Rosario');

-- --------------------------------------------------------

--
-- Table structure for table `sw_billing`
--

CREATE TABLE `sw_billing` (
  `billing_id` int(20) NOT NULL,
  `billing_name` varchar(200) NOT NULL,
  `billing_ref` varchar(200) NOT NULL,
  `billing_date_from` varchar(200) NOT NULL,
  `billing_date_end` varchar(50) NOT NULL,
  `billing_status` varchar(200) NOT NULL,
  `billing_paid_date` varchar(50) NOT NULL,
  `billing_package` varchar(200) NOT NULL,
  `billing_cost` varchar(200) NOT NULL,
  `billing_duedate` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_billing`
--

INSERT INTO `sw_billing` (`billing_id`, `billing_name`, `billing_ref`, `billing_date_from`, `billing_date_end`, `billing_status`, `billing_paid_date`, `billing_package`, `billing_cost`, `billing_duedate`, `date_added`) VALUES
(1, '1', '12356', '2022-05-07', '2022-05-21', 'Not Paid', '', '', '1200', '2022-05-14', '2022-05-07 03:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `sw_customer`
--

CREATE TABLE `sw_customer` (
  `u_id` int(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `valid_id` text NOT NULL,
  `proof_billing` text NOT NULL,
  `picture` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `plan` varchar(36) NOT NULL,
  `billing_start` varchar(50) NOT NULL,
  `billing_end` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_customer`
--

INSERT INTO `sw_customer` (`u_id`, `firstname`, `lastname`, `middlename`, `contactnumber`, `emailaddress`, `address`, `province`, `city`, `barangay`, `valid_id`, `proof_billing`, `picture`, `username`, `password`, `plan`, `billing_start`, `billing_end`, `date_added`) VALUES
(1, 'Jeffry', 'Bordeos', 'A', '9357396286', 'kevinjayroluna@gmail.com', 'Blk 20 Lot 23 Phase 4 PBK Brgy Pasong Kawayan II\r\nddd', '4113', 'General Trias', 'Lantic', 'Capture1.PNG', '1d96852cd57a128e.jpg', '1d96852cd57a128e.jpg', 'test123', 'test123', 'Sample Plan 3', '', '', '2022-04-18 07:13:17'),
(2, 'Kevin Jay Napoles', 'Roluna', 'A', '+931235555', 'jeffrybordeos@gmail.com', 'Blk 20 Lot 23 Phase 4 Pamayanang Maliksi, Brgy Pasong Kawayan II, General Trias Cavite , Philippines', 'Cavite', 'Carmona', 'Mabuhay', '1d96852cd57a128e.jpg', '1d96852cd57a128e.jpg', '255474481_216277773917756_3850928003658432633_n.png', 'test1234', 'test1234', '', '', '', '2022-04-19 06:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `sw_napbox`
--

CREATE TABLE `sw_napbox` (
  `napbox_id` int(20) NOT NULL,
  `city` varchar(200) NOT NULL,
  `barangay` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `boxnumber` varchar(200) NOT NULL,
  `postnumber` varchar(200) NOT NULL,
  `slot` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_napbox`
--

INSERT INTO `sw_napbox` (`napbox_id`, `city`, `barangay`, `area`, `boxnumber`, `postnumber`, `slot`, `date_added`) VALUES
(2, 'Carmona', 'Cabilang Baybay', 'Sample', '123', '1234', 7, '2022-04-18 15:48:27'),
(3, 'Carmona', 'Mabuhay', 'Sample', '124555', '12341', 11, '2022-04-18 17:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `sw_service`
--

CREATE TABLE `sw_service` (
  `service_id` int(20) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_price` varchar(50) NOT NULL,
  `service_desc` longtext NOT NULL,
  `service_pic` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `service_upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_service`
--

INSERT INTO `sw_service` (`service_id`, `service_name`, `service_price`, `service_desc`, `service_pic`, `total`, `service_upload_date`) VALUES
(2, 'Sample Plan', '1200', 'Offering home delivery around the city, where your products will be at your doorstep within 48-72 hours.', '1d96852cd57a128e.jpg', 2, '2022-04-18 14:46:26'),
(3, 'Sample Plan 1', '1300', 'Offering home delivery around the city, where your products will be at your doorstep within 48-72 hours.', '1d96852cd57a128e.jpg', 0, '2022-04-18 16:32:02'),
(4, 'Sample Plan 2', '1300', 'Offering home delivery around the city, where your products will be at your doorstep within 48-72 hours.\r\n\r\n', '275273880_482917373384577_266772488419586002_n.jpg', 0, '2022-04-19 05:37:34'),
(5, 'Sample Plan 3', '2000', 'Offering home delivery around the city, where your products will be at your doorstep within 48-72 hours.	', '255474481_216277773917756_3850928003658432633_n.png', 0, '2022-04-19 06:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `sw_settings`
--

CREATE TABLE `sw_settings` (
  `settings_id` int(12) NOT NULL,
  `location` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sw_settings`
--

INSERT INTO `sw_settings` (`settings_id`, `location`, `content`) VALUES
(1, 'Address', 'Sweden St, General Mariano Alvarez, 4117 Cavite1'),
(2, 'Contacts', '6977420 / 0922-818-97891'),
(3, 'Map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30927.3538272763!2d121.01947607250904!3d14.31612430897454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d7d20cc2726f%3A0x84a209555d28bee1!2sSouthwoods%20Cable%20TV%20-%20Carmona!5e0!3m2!1sen!2sph!4v1651893741150!5m2!1sen!2sph\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(4, 'About', 'Southwoods Cable is a company operating in Cavite. It was first established with the aim of delivering superior Internet services and cable TV to residents.  Get FAST Internet bundled with local and international Cable TV Channels. Quality entertainment with our premium cable TV service featuring a variety of channels so you can watch the most recent episodes of your favorite shows  Monthly Updating TV Channel Up to 6 MBPS Guaranteed No Data Caps'),
(5, 'Email', 'southwoods2011@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sw_admin`
--
ALTER TABLE `sw_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `sw_application`
--
ALTER TABLE `sw_application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `sw_barangay`
--
ALTER TABLE `sw_barangay`
  ADD PRIMARY KEY (`barangay_id`);

--
-- Indexes for table `sw_billing`
--
ALTER TABLE `sw_billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `sw_customer`
--
ALTER TABLE `sw_customer`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `sw_napbox`
--
ALTER TABLE `sw_napbox`
  ADD PRIMARY KEY (`napbox_id`);

--
-- Indexes for table `sw_service`
--
ALTER TABLE `sw_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `sw_settings`
--
ALTER TABLE `sw_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sw_admin`
--
ALTER TABLE `sw_admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sw_application`
--
ALTER TABLE `sw_application`
  MODIFY `application_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sw_barangay`
--
ALTER TABLE `sw_barangay`
  MODIFY `barangay_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sw_billing`
--
ALTER TABLE `sw_billing`
  MODIFY `billing_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sw_customer`
--
ALTER TABLE `sw_customer`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sw_napbox`
--
ALTER TABLE `sw_napbox`
  MODIFY `napbox_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sw_service`
--
ALTER TABLE `sw_service`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sw_settings`
--
ALTER TABLE `sw_settings`
  MODIFY `settings_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
