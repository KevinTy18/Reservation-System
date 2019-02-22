-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 12:29 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbfosystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingcalendar`
--

CREATE TABLE `bookingcalendar` (
  `id` int(11) UNSIGNED NOT NULL,
  `eventname` varchar(50) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `reservee_name` varchar(100) NOT NULL,
  `reservee_type` varchar(100) NOT NULL,
  `designation_id` varchar(100) NOT NULL,
  `School_Level_or_Course` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `Room_Department` varchar(100) NOT NULL,
  `room` varchar(20) NOT NULL,
  `Materials` varchar(200) NOT NULL,
  `date_reserved` varchar(100) NOT NULL,
  `start_day` int(11) DEFAULT NULL,
  `end_day` int(11) DEFAULT NULL,
  `TimeBeginDenum` varchar(10) NOT NULL,
  `TimeEndDenum` varchar(10) NOT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `canceled` int(1) DEFAULT NULL,
  `Capacity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_duration`
--

CREATE TABLE `department_duration` (
  `Id` int(11) NOT NULL,
  `Duration_Description` varchar(100) NOT NULL,
  `Duration_Value` int(100) NOT NULL,
  `Department_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_duration`
--

INSERT INTO `department_duration` (`Id`, `Duration_Description`, `Duration_Value`, `Department_Id`) VALUES
(1, '30 mins', 1800, 1),
(2, '1 Hour', 3600, 1),
(3, '1 hour and 30 minutes', 5400, 1),
(4, '2 Hours', 7200, 1),
(5, '2 hours and 30 minutes', 9000, 1),
(6, '3 hours', 10800, 1),
(7, '3 hours and 30 minutes', 12600, 1),
(8, '4 hours', 14400, 1),
(9, '30 mins', 1800, 2),
(10, '1 Hour', 3600, 2),
(11, '1 hour and 30 minutes', 5400, 2),
(12, '2 Hours', 7200, 2),
(13, '2 hours and 30 minutes', 9000, 2),
(14, '3 hours', 10800, 2),
(15, '3 hours and 30 minutes', 12600, 2),
(16, '4 hours', 14400, 2),
(17, '30 mins', 1800, 3),
(18, '1 Hour', 3600, 3),
(19, '1 hour and 30 minutes', 5400, 3),
(20, '2 Hours', 7200, 3),
(21, '30 mins', 1800, 4),
(22, '1 Hour', 3600, 4),
(23, '1 hour and 30 minutes', 5400, 4),
(24, '2 Hours', 7200, 4),
(25, '30 mins', 1800, 5),
(26, '1 Hour', 3600, 5),
(27, '1 hour and 30 minutes', 5400, 5),
(28, '2 Hours', 7200, 5),
(29, '2 hours and 30 minutes', 9000, 5),
(30, '3 hours', 10800, 5),
(31, '3 hours and 30 minutes', 12600, 5),
(32, '4 hours', 14400, 5),
(33, '30 mins', 1800, 6),
(34, '1 Hour', 3600, 6),
(35, '1 hour and 30 minutes', 5400, 6),
(36, '2 Hours', 7200, 6),
(37, '2 hours and 30 minutes', 9000, 6),
(38, '3 hours', 10800, 6),
(39, '3 hours and 30 minutes', 12600, 6),
(40, '4 hours', 14400, 6);

-- --------------------------------------------------------

--
-- Table structure for table `department_schedule`
--

CREATE TABLE `department_schedule` (
  `Id` int(11) NOT NULL,
  `Schedule_Description` varchar(100) NOT NULL,
  `Schedule_Value` int(100) NOT NULL,
  `Department_Id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_schedule`
--

INSERT INTO `department_schedule` (`Id`, `Schedule_Description`, `Schedule_Value`, `Department_Id`) VALUES
(1, '07 am', 7, 1),
(2, '08 am', 8, 1),
(5, '09 am', 9, 1),
(6, '10 am', 10, 1),
(7, '11 am', 1, 1),
(8, '12 pm', 12, 1),
(9, '1 pm', 1, 1),
(10, '2 pm', 2, 1),
(11, '3 pm', 3, 1),
(12, '07 am', 7, 2),
(13, '08 am', 8, 2),
(14, '09 am', 9, 2),
(15, '10 am', 10, 2),
(16, '11 am', 11, 2),
(17, '12 pm', 12, 2),
(18, '1 pm', 1, 2),
(19, '2 pm', 2, 2),
(20, '3 pm', 3, 2),
(21, '4 pm', 4, 2),
(22, '5 pm', 5, 2),
(23, '07 am', 7, 3),
(24, '08 am', 8, 3),
(25, '09 am', 9, 3),
(26, '10 am', 10, 3),
(27, '11 am', 11, 3),
(28, '12 pm', 12, 3),
(29, '1 pm', 1, 3),
(30, '2 pm', 2, 3),
(31, '3 pm', 3, 3),
(32, '4 pm', 4, 3),
(33, '5 pm', 5, 3),
(34, '6 pm', 6, 3),
(35, '07 am', 7, 4),
(36, '08 am', 8, 4),
(37, '09 am', 9, 4),
(38, '10 am', 10, 4),
(39, '11 am', 11, 4),
(40, '12 pm', 12, 4),
(41, '1 pm', 1, 4),
(42, '2 pm', 2, 4),
(43, '3 pm', 3, 4),
(44, '4 pm', 4, 4),
(45, '5 pm', 5, 4),
(46, '6 pm', 6, 4),
(47, '12 pm', 12, 5),
(48, '1 pm', 1, 5),
(49, '2 pm', 2, 5),
(50, '3 pm', 3, 5),
(51, '4 pm', 4, 5),
(52, '5 pm', 5, 5),
(53, '6 pm', 6, 5),
(54, '7 pm', 7, 5),
(55, '12 pm', 12, 6),
(56, '1 pm', 1, 6),
(57, '2 pm', 2, 6),
(58, '3 pm', 3, 6),
(59, '4 pm', 4, 6),
(60, '5 pm', 5, 6),
(61, '6 pm', 6, 6),
(62, '7 pm', 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `room_department`
--

CREATE TABLE `room_department` (
  `Id` int(100) NOT NULL,
  `Department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_department`
--

INSERT INTO `room_department` (`Id`, `Department`) VALUES
(1, 'IBED-GS'),
(2, 'IBED-JHS'),
(3, 'SHS'),
(4, 'CAS'),
(5, 'GSL'),
(6, 'SOL');

-- --------------------------------------------------------

--
-- Table structure for table `school_level`
--

CREATE TABLE `school_level` (
  `Id` int(11) NOT NULL,
  `Name_or_Course` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_level`
--

INSERT INTO `school_level` (`Id`, `Name_or_Course`) VALUES
(1, 'Grade 4'),
(2, 'Grade 5'),
(3, 'Grade 6'),
(4, 'Grade 7'),
(5, 'Grade 8'),
(6, 'Grade 9'),
(7, 'Grade 10'),
(8, 'Grade 11 - STEM'),
(9, 'Grade 12 - STEM'),
(10, 'Bachelor of Arts in International Studies'),
(11, 'Bachelor of Arts in Psychology'),
(12, 'Bachelor of Arts in Communication and Media Studies'),
(13, 'Bachelor of Science in Psychology'),
(14, 'Bachelor of Science in Accountancy'),
(15, 'Bachelor of Science in Accounting Technology'),
(16, 'Bachelor of Science in Legal Management'),
(17, 'Bachelor of Science in Business Administration'),
(18, 'Bachelor of Science in Information Technology'),
(19, 'Bachelor of Science in Entrepreneurship'),
(20, 'Bachelor in Elementary Education'),
(21, 'Bachelor in Secondary Education'),
(22, 'School of Law'),
(23, 'MAP'),
(24, 'MBA'),
(25, 'MAED'),
(26, 'Grade 11 - GAS'),
(27, 'Grade 12 - GAS'),
(28, 'Grade 11 - HUMMS'),
(29, 'Grade 12 - HUMMS'),
(30, 'Grade 11 - ABM'),
(31, 'Grade 12 - ABM'),
(32, 'MIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(100) NOT NULL,
  `School_Id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `Department_Id` int(10) NOT NULL,
  `School_Level_Id` int(10) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `School_Id`, `firstname`, `middlename`, `lastname`, `Department_Id`, `School_Level_Id`, `gender`, `username`, `email`, `password`, `user_type`, `deleted_at`) VALUES
(1, 2015300450, 'Michael', 'Berania', 'Baldevia', 0, 0, 'Male', 'Admin', 'baldeviamichael1@gmail.com', '123', 'admin', NULL),
(2, 2015300444, 'Kevin', 'Gonzalessss', 'Ty', 4, 8, 'Male', 'User', 'kevingty@gmail.com', '123', 'student', NULL),
(3, 2015333111, 'Leo Francis', 'Acuesta', 'Dayao', 2, 0, 'Male', 'Employee', 'Employee@gmail.com', '123', 'employee', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unavailable_dates`
--

CREATE TABLE `unavailable_dates` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `RoomID` int(100) NOT NULL,
  `RoomName` varchar(100) NOT NULL,
  `Department_Id` int(11) NOT NULL,
  `RoomCapacity` int(100) NOT NULL,
  `RoomMinimumCapacity` int(100) NOT NULL,
  `Faculty_Booking_Only` int(10) NOT NULL DEFAULT '0',
  `VenueImage` varchar(500) NOT NULL,
  `Availability` varchar(100) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`RoomID`, `RoomName`, `Department_Id`, `RoomCapacity`, `RoomMinimumCapacity`, `Faculty_Booking_Only`, `VenueImage`, `Availability`) VALUES
(1, 'Read', 1, 15, 6, 0, 'IBED-GS_Read.jpg', 'Available'),
(2, 'Learn', 1, 20, 6, 0, 'IBED-GS_Learn.jpg', 'Available'),
(3, 'Master', 2, 7, 4, 0, 'Sample3.png', 'Available'),
(4, 'Innovate', 2, 7, 4, 0, 'Sample4.png', 'Available'),
(5, 'Inspire', 3, 6, 4, 0, 'SHS_Inspire.jpg', 'Available'),
(6, 'Create', 3, 10, 6, 0, 'SHS_Create.jpg', 'Available'),
(7, 'Cooperate', 3, 10, 6, 0, 'SHS_Cooperate_1.jpg', 'Available'),
(8, 'SHS-Conference', 3, 10, 6, 1, 'SHS_Conference.jpg', 'Available'),
(9, 'Makerspace', 3, 10, 6, 0, 'SHS_Makerspace.jpg', 'Available'),
(10, 'Achieve', 4, 10, 6, 0, 'CAS_Achieve.jpg', 'Available'),
(11, 'Lead', 4, 10, 6, 0, 'CAS_Lead.jpg', 'Available'),
(12, 'CAS-Conference', 4, 10, 6, 1, 'CAS_Conference.jpg', 'Available'),
(13, 'Collaborate', 5, 5, 2, 0, 'GSL_Collaborate.jpg', 'Available'),
(14, 'Connect', 5, 4, 2, 0, 'GSL_Connect.jpg', 'Available'),
(15, 'Communicate', 5, 5, 2, 0, 'GSL_Communicate.jpg', 'Available'),
(16, 'Excellence', 6, 10, 6, 0, 'SOL_Excellence.jpg', 'Available'),
(17, 'Virtue', 6, 10, 6, 0, 'SOL_Virtue.jpg', 'Available'),
(18, 'Dream', 3, 6, 4, 0, 'SHS_Dream.jpg', 'Available'),
(19, 'asdada', 2, 10, 5, 0, 'Sample19.png', 'Available'),
(20, 'MGS', 1, 100, 20, 1, 'IBED-GS_MGS.jpg', 'Available'),
(21, 'PGS', 1, 80, 20, 1, 'IBED-GS_PGS.jpg', 'Available'),
(22, 'Michael Baldevia Hall', 1, 20, 10, 0, '51727835_1968997576531300_8797854744778375168_n.jpg', 'Unavailable'),
(23, 'Michael Baldevia', 1, 20, 6, 0, '31635.jpg', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingcalendar`
--
ALTER TABLE `bookingcalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_duration`
--
ALTER TABLE `department_duration`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `department_schedule`
--
ALTER TABLE `department_schedule`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `room_department`
--
ALTER TABLE `room_department`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `school_level`
--
ALTER TABLE `school_level`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unavailable_dates`
--
ALTER TABLE `unavailable_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`RoomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingcalendar`
--
ALTER TABLE `bookingcalendar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `department_duration`
--
ALTER TABLE `department_duration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `department_schedule`
--
ALTER TABLE `department_schedule`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `room_department`
--
ALTER TABLE `room_department`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_level`
--
ALTER TABLE `school_level`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `unavailable_dates`
--
ALTER TABLE `unavailable_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `RoomID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
