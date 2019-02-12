-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 07:34 AM
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

--
-- Dumping data for table `bookingcalendar`
--

INSERT INTO `bookingcalendar` (`id`, `eventname`, `organization`, `reservee_name`, `reservee_type`, `designation_id`, `School_Level_or_Course`, `phone`, `Room_Department`, `room`, `Materials`, `date_reserved`, `start_day`, `end_day`, `TimeBeginDenum`, `TimeEndDenum`, `start_time`, `end_time`, `canceled`, `Capacity`) VALUES
(59, 'Gamax', 'BITS', 'Michael Baldevia', 'Student', '2015300450', 'Grade 4', '2131321313', '1', 'Virtue', 'Whiteboard Marker, Eraser, ', '0', 1540332000, 1540332000, 'am', '', 32400, 32460, 0, 7),
(60, 'asdeasda', 'dadaasdada', 'asdad', 'Employee', '20202020020', 'Grade 4', '2313213131', '1', 'AVR', 'Whiteboard Marker, Eraser, aaaazzz', '0', 1540332000, 1540332000, 'am', '', 21600, 21630, 0, 7),
(61, 'BITS', 'GAMAX', 'Michael Baldevia', 'Employee', '2015300450', 'Grade 5', '1231213131', '1', 'Virtue', 'Whiteboard Marker, Eraser, asd', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(62, 'ASDE', 'ASDE', 'ASDE', 'Student', '2015300450', 'Grade 6', '2231313131', '1', 'Makerspace', 'Whiteboard Marker, Eraser, zxc', '0', 1540159200, 1540159200, 'am', '', 21600, 25200, 0, 8),
(63, 'asda', 'dada', 'sadadsa', 'Student', '2010404040', 'Grade 7', '2131313131', '2', 'Conference ', 'Whiteboard Marker, Eraser, ZXz', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(64, 'zzzzz', 'zzz', 'zzzz', 'Student', '2131131', 'Grade 8', '2131313131', '2', 'Collaborate', 'Whiteboard Marker, Eraser, zzz', '0', 1540159200, 1540159200, 'am', '', 21600, 27000, 0, 3),
(65, 'qqq', 'qqq', 'qqq', 'Student', '2131313131', 'Grade 9', '1231313131', '2', 'Communicate', 'Whiteboard Marker, Eraser, qqqq', '0', 1540159200, 1540159200, 'am', '', 21600, 28800, 0, 3),
(66, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 9', '1231313131', '2', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(67, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 10', '1231313131', '2', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(68, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 11 - STEM', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(69, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 12 - STEM', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(70, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 11 - GAS', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(71, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 12 - GAS', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(72, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 11 - HUMMS', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(73, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 12 - HUMMS', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(74, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 11 - ABM', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(75, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 12 - ABM', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(76, 'asde', 'asde', 'asde', 'Student', '123131231', 'Grade 12 - ABM', '1231313131', '3', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(77, 'asde', 'asde', 'asde', 'Student', '123131231', 'MAP', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(78, 'zxcz', 'zxcz', 'zxczxcz', 'Student', '111111111111111', 'MAP', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(79, 'asda', 'asda', 'asda', 'Student', '111111111111111', 'MLB', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(80, 'sadad', 'asdada', 'asdsad', 'Student', '11111111111', 'MLB', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(81, 'sade', 'asde', 'asde', 'Student', '111111111111111', 'MAED', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(82, 'asde', 'asde', 'asde', 'Student', '111111111111111', 'Bachelor of Arts in International Studies', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(83, 'adsadas', 'sadadadas', 'asdada', 'Student', '111111', 'Bachelor of Arts in Psychology', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(84, 'asd', 'easda', 'asdad', 'Student', '212313131', 'Bachelor of Arts in Communication and Media Studies', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(85, 'asd', 'easda', 'asdad', 'Student', '212313131', 'Bachelor of Science in Psychology', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(86, 'asd', 'easda', 'asdad', 'Student', '212313131', 'Bachelor of Science in Accountancy', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(87, 'asde', 'asde', 'asde', 'Student', '1111111111', 'Bachelor of Science in Accounting Technology', '1231213132', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(88, 'asde', 'asde', 'asde', 'Student', '123131313131', 'Bachelor of Science in Legal Management', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(89, 'asde', 'asde', 'asde', 'Student', '123131313131', 'Bachelor of Science in Business Administration', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(90, 'asde', 'asde', 'asde', 'Student', '123131313131', 'Bachelor of Science in Information Technology', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(91, 'asde', 'asde', 'asde', 'Student', '123131313131', 'Bachelor of Science in Information Technology', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(92, 'asde', 'asde', 'asde', 'Student', '123131313131', 'Bachelor of Science in Information Technology', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(93, 'asde', 'asde', 'asde', 'Student', '123131313131', 'Bachelor of Science in Entrepreneurship', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(94, 'asde', 'asde', 'asde', 'Student', '123131313131', 'Bachelor in Elementary Education', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(95, 'asde', 'asde', 'asde', 'Student', '123132131231313', 'Bachelor in Secondary Education', '1231313131', '4', 'Conference', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(96, 'asdadads', 'asdadas', 'asda', 'Student', '12313131', 'School of Law', '3123131313', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(97, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', 'School of Law', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(98, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', 'School of Law', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(99, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', 'School of Law', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(100, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', 'School of Law', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(101, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', 'School of Law', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(105, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '2313131313', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(106, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '2131313131', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(107, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '2131313131', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(108, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '1231313131', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(109, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '1231313131', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(110, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '1231313131', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(111, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '1313131313', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(112, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '1313131313', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(113, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '1313131313', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(114, 'asdadsadadada', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '', '2313131313', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 27000, 0, 7),
(115, 'dada', 'dadaa', 'dadada', 'Student', '313321313123132', '', '3213132132', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 21600, 23400, 0, 7),
(116, 'asdadadasd', 'adasdasdas', 'dadada', 'Student', '321313131', '', '3212131313', '0', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 28800, 30600, 0, 7),
(117, 'MEeting', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11', '1231313131', '0', 'Read', 'Remote Control-Smart TV, Whiteboard Marker, ', '0', 1540767600, 1540767600, 'am', '', 41400, 46800, 0, 14),
(118, 'Meet', 'BITS', 'Michael Baldevia', 'Employee', '2015300450', 'Bachelor', '1232313131', '0', 'Learn', 'Whiteboard Marker, Eraser, ', '0', 1540767600, 1540767600, 'am', '', 30600, 34200, 0, 11),
(119, 'Sample', 'Sample', 'Michael Baldevia', 'Student', '2015300450', 'Grade', '1231313131', '0', 'Master', '', '1541458800', 1541113200, 1541113200, '', '', 27000, 28800, 0, 5),
(120, 'nov5Sample', 'ITRDC', 'Michael Baldevia', 'Student', '2015300450', 'Grade', '1231313131', '2', 'Master', '', '1541458800', 1541372400, 1541372400, '', '', 34200, 37800, 0, 7),
(121, 'nov5Sample', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '2311313131', '1', 'Read', '', '1541458800', 1541372400, 1541372400, 'am', '', 34200, 37800, 0, 7),
(122, 'nov5Sample', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '2311313131', '1', 'Learn', '', '1541458800', 1541372400, 1541372400, 'am', '', 30600, 32400, 0, 7),
(123, 'nov5Sample', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '2131313131', '1', 'Learn', '', '1541458800', 1541372400, 1541372400, 'am', '', 27000, 30600, 0, 7),
(124, 'nov5Sample', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '3113131313', '1', 'Learn', '', '1541458800', 1541372400, 1541372400, 'am', '', 32400, 34200, 0, 7),
(125, 'nov5Sample', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '2131313131', '1', 'Learn', '', '1541458800', 1541372400, 1541372400, 'am', '', 36000, 37800, 0, 7),
(126, 'Nov5Sample', 'IBED-JHS', 'Leo Francis Acuesta Dayao', 'Student', '2015333111', 'Grade', '1111111111', '1', 'PGS', '', '1541458800', 1541372400, 1541372400, '', '', 30600, 32400, 0, 30),
(127, 'Nov5Sample', 'IBED-JHS', 'Leo Francis Acuesta Dayao', 'employee', '2015333111', 'Grade', '1313131313', '1', 'MGS', '', '1541458800', 1541372400, 1541372400, '', '', 45000, 50400, 0, 50),
(128, 'Nov5Sample', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '2313131313', '1', 'Read', 'Whiteboard Marker, Eraser, qqqq', '1541458800', 1541458800, 1541458800, 'am', '', 25200, 27000, 0, 7),
(129, 'Meeting', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '2131313131', '1', 'Learn', 'Whiteboard Marker, Eraser, qqqq', '1525989600', 1541545200, 1541545200, 'pm', '', 7200, 9000, 0, 7),
(130, 'Meeting', 'IBED-GS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', 'Grade 11 - STEM', '2131313131', '1', 'Read', 'Remote Control-Smart TV, Whiteboard Marker, Eraser, Table', '1525989600', 1541631600, 1541631600, 'am', '', 30600, 32400, 0, 7);

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
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `School_Id`, `firstname`, `middlename`, `lastname`, `Department_Id`, `School_Level_Id`, `gender`, `username`, `email`, `password`, `user_type`) VALUES
(1, 2015300450, 'Michael', 'Berania', 'Baldevia', 0, 0, 'Male', 'Admin', 'baldeviamichael1@gmail.com', '123', 'admin'),
(2, 2015300444, 'Kevin', 'Gonzalessss', 'Ty', 1, 8, 'Male', 'User', 'kevingty@gmail.com', '123', 'student'),
(3, 2015333111, 'Leo Francis', 'Acuesta', 'Dayao', 2, 0, 'Male', 'Employee', 'Employee@gmail.com', '123', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `unavailable_dates`
--

CREATE TABLE `unavailable_dates` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unavailable_dates`
--

INSERT INTO `unavailable_dates` (`id`, `date`, `reason`) VALUES
(1, '0000-00-00', 'asde'),
(2, '0000-00-00', 'asde'),
(3, '0000-00-00', 'asde'),
(4, '0000-00-00', 'asde'),
(5, '1540504800', 'asde'),
(6, '1540504800', 'asde'),
(7, '1540504800', 'asde'),
(8, '1540504800', 'asde'),
(9, '1540504800', 'asde'),
(10, '1540504800', 'asde'),
(11, '1540504800', 'asde'),
(12, '1540504800', 'asde'),
(13, '1540504800', 'asde'),
(14, '1540591200', 'asde'),
(15, '1540940400', 'No Classes'),
(16, '1541372400', 'No classes');

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
  `VenueImage` varchar(500) NOT NULL,
  `Availability` varchar(100) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`RoomID`, `RoomName`, `Department_Id`, `RoomCapacity`, `RoomMinimumCapacity`, `VenueImage`, `Availability`) VALUES
(1, 'Read', 1, 15, 6, 'Sample1.png', 'Available'),
(2, 'Learn', 1, 20, 6, 'Sample2.png', 'Available'),
(3, 'Master', 2, 7, 4, 'Sample3.png', 'Available'),
(4, 'Innovate', 2, 7, 4, 'Sample4.png', 'Available'),
(5, 'Inspire', 3, 6, 4, 'Inspire.jpg', 'Available'),
(6, 'Create', 3, 10, 6, 'Sample6.png', 'Available'),
(7, 'Cooperate', 3, 10, 6, 'Sample7.png', 'Available'),
(8, 'Conference', 3, 10, 6, 'conference.jpg', 'Available'),
(9, 'Makerspace', 3, 10, 6, 'Makerspace.jpg', 'Available'),
(10, 'Achieve', 4, 10, 6, 'Sample10.png', 'Available'),
(11, 'Lead', 4, 10, 6, 'Sample11.png', 'Available'),
(12, 'Conference', 4, 10, 6, 'Sample12.png', 'Available'),
(13, 'Collaborate', 5, 5, 2, 'Collaborate.jpg', 'Available'),
(14, 'Connect', 5, 4, 2, 'Connect.jpg', 'Available'),
(15, 'Communicate', 5, 5, 2, 'Communicate.jpg', 'Available'),
(16, 'Excellence', 6, 10, 6, 'Excellence.jpg', 'Available'),
(17, 'Virtue', 6, 10, 6, 'Virtue.jpg', 'Available'),
(18, 'Dream', 3, 6, 4, 'Dream.jpg', 'Available'),
(19, 'asdada', 2, 10, 5, 'Sample19.png', 'Available'),
(20, 'MGS', 1, 100, 20, 'MGS.jpg', 'Available'),
(21, 'PGS', 1, 80, 20, 'PGS.jpg', 'Available');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unavailable_dates`
--
ALTER TABLE `unavailable_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `RoomID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
