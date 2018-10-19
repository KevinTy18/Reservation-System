-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 06:27 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
  `phone` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
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

--
-- Dumping data for table `bookingcalendar`
--

INSERT INTO `bookingcalendar` (`id`, `eventname`, `organization`, `reservee_name`, `reservee_type`, `designation_id`, `phone`, `item`, `date_reserved`, `start_day`, `end_day`, `TimeBeginDenum`, `TimeEndDenum`, `start_time`, `end_time`, `canceled`, `Capacity`) VALUES
(1, 'ASde', 'IT', 'Michael Baldevia', 'Employee', '', '01255151', 'St Maur', '0', 1529445600, 1529877600, 'am', 'pm', 0, 84600, 1, 0),
(7, 'ASde', 'IT', 'Kevin Ty', 'Employee', '', '01255151', 'ST.Maur', '0', 1533074400, 1533074400, 'pm', 'pm', 68400, 84600, 0, 600),
(8, 'ASde', 'IT', 'Jonas Pascual', 'Employee', '', '01255151', 'ST.Maur', '0', 1530396000, 1530396000, 'am', 'pm', 0, 84600, 0, 6000),
(9, 'ASde', 'IT', 'Michael Baldevia', 'Employee', '', '01255151', 'AVR', '0', 1530396000, 1530396000, 'am', 'pm', 0, 84600, 0, 50),
(10, 'ASde', 'IT', 'Kevin Ty', 'Employee', '', '01255151', 'Balcruz', '0', 1530396000, 1530741600, 'am', 'pm', 0, 84600, 0, 70),
(11, 'ASde', 'IT', 'Jonas Pascual', 'Employee', '', '01255151', 'Rosendo', '0', 1527804000, 1527804000, 'am', 'pm', 0, 84600, 1, 200),
(12, 'ASde', 'IT', 'Michael Baldevia', 'Employee', '', '01255151', 'Rosendo', '0', 1527890400, 1527890400, 'am', 'pm', 0, 84600, 0, 900),
(13, 'I.T Fest', 'IT', 'Kevin Ty', 'Employee', '', '0915842123', 'ST.Maur', '0', 1527890400, 1527890400, 'am', 'pm', 66600, 73800, 1, 500),
(14, 'qwe', 'qwe', 'Jonas Pascual', 'Employee', '', '12321', 'MPH', '0', 1527804000, 1527804000, 'am', 'pm', 0, 84600, 1, 100),
(15, 'wqe', 'qwe', 'Michael Baldevia', 'Employee', '', 'qwe', 'ST.Maur', '0', 1527804000, 1527890400, 'am', 'pm', 0, 23400, 0, 100),
(16, 'qwe', 'qwe', 'Kevin Ty', 'Employee', '', '1231', 'Balcruz', '0', 1527804000, 1527804000, 'am', 'pm', 0, 84600, 0, 5),
(17, 'qwe', 'qe', 'Jonas Pascual', 'Student', '', 'qwe', 'Rosendo', '0', 1529013600, 1529013600, 'am', 'pm', 0, 84600, 1, 10),
(18, 'dasdsa', 'dasda', 'Michael Baldevia', 'Student', '', '1231', 'AVR', '0', 1530223200, 1530223200, 'am', 'pm', 0, 84600, 0, 0),
(19, 'IT cheverness', 'BSIT', 'Kevin Ty', 'Student', '', '0915029520', 'ST.Maur', '0', 1528322400, 1528322400, 'am', 'pm', 32400, 23400, 0, 150),
(20, 'asd', 'asd', 'Jonas Pascual', 'Student', '', '132312', 'MPH', '0', 1528495200, 1528495200, 'am', 'pm', 21600, 23400, 0, 160),
(21, 'cxzcxz', 'xzczcz', 'Michael Baldevia', 'Student', '', '1231241', 'Balcruz', '0', 1528495200, 1528495200, 'am', 'pm', 36000, 23400, 0, 45),
(22, 'qwer', 'qwer', 'Jonas Pascual', 'Student', '', '356', 'Rosendo', '0', 1528408800, 1528408800, 'am', 'am', 21600, 23400, 0, 85),
(23, 'BITS aniv 2018', 'BITS', 'Michael Baldevia', 'Student', '', '09159270176', 'ST.Maur', '0', 1530309600, 1530309600, 'am', 'am', 21600, 23400, 0, 400),
(24, 'asdads', 'sdad', 'Kevin Ty', 'Student', '', '312', 'Balcruz', '0', 1528063200, 1528063200, 'am', 'am', 21600, 41400, 0, 50),
(25, 'BITS', 'BITS', 'Jonas Pascual', 'Student', '', '1234561', 'AVR', '0', 1529532000, 1529532000, 'am', 'am', 21600, 23400, 0, 6),
(26, 'Event', 'Event', 'Michael Baldevia', 'Student', '', '213', 'Balcruz', '0', 1528408800, 1528408800, 'am', 'am', 21600, 23400, 0, 50),
(27, 'asdasada', '2131321', 'Kevin Ty', 'Student', '', 'sda', 'Balcruz', '0', 1528840800, 1528840800, 'am', 'am', 21600, 23400, 0, 40),
(28, 'BITS', 'BITS', 'Jonas Pascual', 'Student', '', '12313231', 'Balcruz', '0', 1528322400, 1528322400, 'am', 'pm', 28800, 45000, 0, 50),
(29, 'CAS Student Assembly', 'Deans Office', 'Michael Baldevia', 'Student', '', '09209003098', 'MPH', '0', 1532901600, 1532901600, 'am', 'pm', 32400, 45000, 1, 300),
(30, 'BITS', 'BITS', 'Kevin Ty', 'Student', '', '09123442323', 'MPH', '0', 1530396000, 1530396000, 'am', 'am', 21600, 23400, 0, 300),
(31, 'BITS', 'BITS', 'Jonas Pascual', 'Student', '2015300450', '09567293939', 'AVR', '0', 1530482400, 1530482400, 'am', 'am', 21600, 23400, 0, 20),
(32, 'BITS', 'BITS', 'Michael Baldevia', 'Student', '2015300450', '0915976201', 'Bellarmine Hall', '0', 1530655200, 1530655200, 'am', 'am', 21600, 23400, 0, 61),
(33, 'BITS', 'BITS', 'Michael Baldevia', 'Employee', '2015300450', '0152323232', 'MPH', '0', 1530828000, 1530828000, 'am', 'am', 21600, 23400, 0, 300),
(34, 'BITS', 'BITS', 'Michael Baldevia', 'Employee', '2015300450', '2213123131', 'ST.Maur', '0', 1530828000, 1530828000, 'am', 'am', 21600, 23400, 0, 500),
(35, 'BITS', 'BITS', 'Michael Baldevia', 'Employee', '2015300450', '2131231231', 'ST.Maur', '29', 1530223200, 1530223200, 'am', 'am', 21600, 23400, 0, 500),
(39, 'BIIITS', 'BIIITS', 'Michael Baldevia', 'Employee', 'EMP-2015300450', '2312313123', 'Balcruz', '1530235617', 1530223200, 1530223200, 'am', 'am', 21600, 23400, 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'Michael', 'Berania', 'Baldevia', 'Male', 'Admin', 'baldeviamichael1@gmail.com', '123', 'admin'),
(2, 'Kevin', 'Gonzales', 'Ty', 'Male', 'User', 'kevingty@gmail.com', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `RoomID` int(100) NOT NULL,
  `RoomName` varchar(100) NOT NULL,
  `RoomCapacity` int(100) NOT NULL,
  `RoomMinimumCapacity` int(100) NOT NULL,
  `VenueImage` varchar(500) NOT NULL,
  `Availability` varchar(100) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`RoomID`, `RoomName`, `RoomCapacity`, `RoomMinimumCapacity`, `VenueImage`, `Availability`) VALUES
(1, 'AVR', 40, 1, 'AVR.jpg', 'Available'),
(2, 'Balcruz', 60, 40, 'balcruz.jpg', 'Available'),
(3, 'Bellarmine Hall', 80, 60, 'bellarmine.jpg', 'Available'),
(4, 'MPH', 350, 150, 'MPH.jpg', 'Available'),
(5, 'Rosendo', 150, 80, 'site-image.jpg', 'Unavailable'),
(6, 'ST.Maur', 500, 350, 'stmaur.jpg', 'Available'),
(7, 'asd', 1, 1, 'MPH.jpg', 'Unavailable'),
(8, 'Room 2', 200, 120, 'stmaur.jpg', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingcalendar`
--
ALTER TABLE `bookingcalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `RoomID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
