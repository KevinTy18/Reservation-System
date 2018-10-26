-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 10:47 AM
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

INSERT INTO `bookingcalendar` (`id`, `eventname`, `organization`, `reservee_name`, `reservee_type`, `designation_id`, `phone`, `Room_Department`, `room`, `Materials`, `date_reserved`, `start_day`, `end_day`, `TimeBeginDenum`, `TimeEndDenum`, `start_time`, `end_time`, `canceled`, `Capacity`) VALUES
(1, 'ASde', 'IT', '', 'Employee', '', '01255151', '', 'St Maur', '', '0', 1529445600, 1529877600, 'am', 'pm', 0, 84600, 0, 0),
(7, 'ASde', 'IT', '', 'Employee', '', '01255151', '', 'ST.Maur', '', '0', 1533074400, 1533074400, 'pm', 'pm', 68400, 84600, 0, 600),
(8, 'ASde', 'IT', '', 'Employee', '', '01255151', '', 'ST.Maur', '', '0', 1530396000, 1530396000, 'am', 'pm', 0, 84600, 0, 6000),
(9, 'ASde', 'IT', '', 'Employee', '', '01255151', '', 'AVR', '', '0', 1530396000, 1530396000, 'am', 'pm', 0, 84600, 0, 50),
(10, 'ASde', 'IT', '', 'Employee', '', '01255151', '', 'Balcruz', '', '0', 1530396000, 1530741600, 'am', 'pm', 0, 84600, 0, 70),
(11, 'ASde', 'IT', '', 'Employee', '', '01255151', '', 'Rosendo', '', '0', 1527804000, 1527804000, 'am', 'pm', 0, 84600, 1, 200),
(12, 'ASde', 'IT', '', 'Employee', '', '01255151', '', 'Rosendo', '', '0', 1527890400, 1527890400, 'am', 'pm', 0, 84600, 0, 900),
(13, 'I.T Fest', 'IT', '', 'Employee', '', '0915842123', '', 'ST.Maur', '', '0', 1527890400, 1527890400, 'am', 'pm', 66600, 73800, 1, 500),
(14, 'qwe', 'qwe', '', 'Employee', '', '12321', '', 'MPH', '', '0', 1527804000, 1527804000, 'am', 'pm', 0, 84600, 1, 100),
(15, 'wqe', 'qwe', '', 'Employee', '', 'qwe', '', 'ST.Maur', '', '0', 1527804000, 1527890400, 'am', 'pm', 0, 23400, 0, 100),
(16, 'qwe', 'qwe', '', 'Employee', '', '1231', '', 'Balcruz', '', '0', 1527804000, 1527804000, 'am', 'pm', 0, 84600, 0, 5),
(17, 'qwe', 'qe', '', 'Student', '', 'qwe', '', 'Rosendo', '', '0', 1529013600, 1529013600, 'am', 'pm', 0, 84600, 1, 10),
(18, 'dasdsa', 'dasda', '', 'Student', '', '1231', '', 'AVR', '', '0', 1530223200, 1530223200, 'am', 'pm', 0, 84600, 0, 0),
(19, 'IT cheverness', 'BSIT', '', 'Student', '', '0915029520', '', 'ST.Maur', '', '0', 1528322400, 1528322400, 'am', 'pm', 32400, 23400, 0, 150),
(20, 'asd', 'asd', '', 'Student', '', '132312', '', 'MPH', '', '0', 1528495200, 1528495200, 'am', 'pm', 21600, 23400, 0, 160),
(21, 'cxzcxz', 'xzczcz', '', 'Student', '', '1231241', '', 'Balcruz', '', '0', 1528495200, 1528495200, 'am', 'pm', 36000, 23400, 0, 45),
(22, 'qwer', 'qwer', '', 'Student', '', '356', '', 'Rosendo', '', '0', 1528408800, 1528408800, 'am', 'am', 21600, 23400, 0, 85),
(23, 'BITS aniv 2018', 'BITS', '', 'Student', '', '09159270176', '', 'ST.Maur', '', '0', 1530309600, 1530309600, 'am', 'am', 21600, 23400, 0, 400),
(24, 'asdads', 'sdad', '', 'Student', '', '312', '', 'Balcruz', '', '0', 1528063200, 1528063200, 'am', 'am', 21600, 41400, 0, 50),
(25, 'BITS', 'BITS', '', 'Student', '', '1234561', '', 'AVR', '', '0', 1529532000, 1529532000, 'am', 'am', 21600, 23400, 0, 6),
(26, 'Event', 'Event', '', 'Student', '', '213', '', 'Balcruz', '', '0', 1528408800, 1528408800, 'am', 'am', 21600, 23400, 0, 50),
(27, 'asdasada', '2131321', '', 'Student', '', 'sda', '', 'Balcruz', '', '0', 1528840800, 1528840800, 'am', 'am', 21600, 23400, 0, 40),
(28, 'BITS', 'BITS', '', 'Student', '', '12313231', '', 'Balcruz', '', '0', 1528322400, 1528322400, 'am', 'pm', 28800, 45000, 0, 50),
(29, 'CAS Student Assembly', 'Deans Office', '', 'Student', '', '09209003098', '', 'MPH', '', '0', 1532901600, 1532901600, 'am', 'pm', 32400, 45000, 1, 300),
(30, 'BITS', 'BITS', '', 'Student', '', '09123442323', '', 'MPH', '', '0', 1530396000, 1530396000, 'am', 'am', 21600, 23400, 0, 300),
(31, 'BITS', 'BITS', '', 'Student', '2015300450', '09567293939', '', 'AVR', '', '0', 1530482400, 1530482400, 'am', 'am', 21600, 23400, 0, 20),
(32, 'BITS', 'BITS', 'Michael Baldevia', 'Student', '2015300450', '0915976201', '', 'Bellarmine Hall', '', '0', 1530655200, 1530655200, 'am', 'am', 21600, 23400, 0, 61),
(33, 'BITS', 'BITS', 'Michael Baldevia', 'Employee', '2015300450', '0152323232', '', 'MPH', '', '0', 1530828000, 1530828000, 'am', 'am', 21600, 23400, 0, 300),
(34, 'BITS', 'BITS', 'Michael Baldevia', 'Employee', '2015300450', '2213123131', '', 'ST.Maur', '', '0', 1530828000, 1530828000, 'am', 'am', 21600, 23400, 0, 500),
(35, 'BITS', 'BITS', 'Michael Baldevia', 'Employee', '2015300450', '2131231231', '', 'ST.Maur', '', '29', 1530223200, 1530223200, 'am', 'am', 21600, 23400, 0, 500),
(39, 'BIIITS', 'BIIITS', 'Michael Baldevia', 'Employee', 'EMP-2015300450', '2312313123', '', 'Balcruz', '', '1530235617', 1530223200, 1530223200, 'am', 'am', 21600, 23400, 0, 50),
(40, 'BITS', 'BITS', 'Michael Baldevia', 'Student', '2015300450', '0956821386', '', 'AVR', '', '0', 1539900000, 1539900000, 'am', 'am', 21600, 23400, 1, 30),
(41, 'System Presentation', 'BSIT', 'Michael Baldevia', 'Student', '2015300450', '0956821386', '', 'AVR', '', '0', 1539813600, 1539813600, 'am', 'am', 25200, 32400, 0, 30),
(42, 'Gamax', 'Bits', 'asd', 'Student', '2015300450', '09158201386', '1', 'Learn', 'Whiteboard Marker, Eraser, Other', '0', 1540072800, 1540072800, 'am', '', 21600, 129600, 0, 7),
(43, 'Gamax', 'Bits', 'asde', 'Student', '2015300450', '09158201386', '1', 'AVR', 'Whiteboard Marker, Eraser, Other', '0', 1540072800, 1540072800, 'am', '', 21600, 23400, 0, 7),
(44, 'sadada', 'zxczczcz', 'zxczxasdsa', 'Student', '2015300450', '22222222222', '5', 'Connect', 'Remote Control-Smart TV, Whiteboard Marker, Eraser, zzzz', '0', 1540072800, 1540072800, 'am', '', 21600, 23400, 0, 3),
(45, 'Gamax', 'asde', 'asde', 'Student', '2015300450', '2132131311', '1', '1', 'Whiteboard Marker, Eraser, asde', '0', 1540159200, 1540159200, 'am', '', 21600, 23400, 0, 7),
(46, 'asdadad', 'adadada', 'dadada', 'Student', '2015300450', '0915939393', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540245600, 1540245600, 'am', '', 21600, 23400, 0, 7),
(47, 'asdadad', 'adadada', 'dadada', 'Student', '2015300450', '0915939393', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540245600, 1540245600, 'am', '', 21600, 23400, 0, 7),
(48, 'asdadad', 'adadada', 'dadada', 'Student', '2015300450', '0915939393', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540245600, 1540245600, 'am', '', 21600, 23400, 0, 7),
(49, 'asdadad', 'adadada', 'dadada', 'Student', '2015300450', '0915939393', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540245600, 1540245600, 'am', '', 21600, 23400, 0, 7),
(50, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(51, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(52, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(53, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(54, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(55, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(56, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', '', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(57, 'sadads', 'xzczcz', 'asdadsa', 'Student', '22222222', '3232321132', '1', 'Learn', 'Whiteboard Marker, Eraser, asde', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(58, 'asdeasda', 'dadaasdada', 'asdad', 'Student', '20202020020', '2313213131', '1', 'AVR', 'Whiteboard Marker, Eraser, aaaazzz', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(59, 'Gamax', 'BITS', 'Michael Baldevia', 'Student', '2015300450', '2131321313', '6', 'Virtue', 'Whiteboard Marker, Eraser, ', '0', 1540332000, 1540332000, 'am', '', 32400, 32460, 0, 7),
(60, 'asdeasda', 'dadaasdada', 'asdad', 'Student', '20202020020', '2313213131', '1', 'AVR', 'Whiteboard Marker, Eraser, aaaazzz', '0', 1540332000, 1540332000, 'am', '', 21600, 21630, 0, 7),
(61, 'BITS', 'GAMAX', 'Michael Baldevia', 'Student', '2015300450', '1231213131', '6', 'Virtue', 'Whiteboard Marker, Eraser, asd', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(62, 'ASDE', 'ASDE', 'ASDE', 'Student', '2015300450', '2231313131', '3', 'Makerspace', 'Whiteboard Marker, Eraser, zxc', '0', 1540159200, 1540159200, 'am', '', 21600, 25200, 0, 8),
(63, 'asda', 'dada', 'sadadsa', 'Student', '2010404040', '2131313131', '4', 'Conference ', 'Whiteboard Marker, Eraser, ZXz', '0', 1540332000, 1540332000, 'am', '', 21600, 23400, 0, 7),
(64, 'zzzzz', 'zzz', 'zzzz', 'Student', '2131131', '2131313131', '5', 'Collaborate', 'Whiteboard Marker, Eraser, zzz', '0', 1540159200, 1540159200, 'am', '', 21600, 27000, 0, 3),
(65, 'qqq', 'qqq', 'qqq', 'Student', '2131313131', '1231313131', '5', 'Communicate', 'Whiteboard Marker, Eraser, qqqq', '0', 1540159200, 1540159200, 'am', '', 21600, 28800, 0, 3),
(66, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(67, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(68, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(69, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(70, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(71, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(72, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(73, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(74, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(75, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(76, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(77, 'asde', 'asde', 'asde', 'Student', '123131231', '1231313131', '5', 'Connect', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 3),
(78, 'zxcz', 'zxcz', 'zxczxcz', 'Student', '111111111111111', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(79, 'asda', 'asda', 'asda', 'Student', '111111111111111', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(80, 'sadad', 'asdada', 'asdsad', 'Student', '11111111111', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(81, 'sade', 'asde', 'asde', 'Student', '111111111111111', '1111111111', '4', 'Achieve', '', '0', 1540504800, 1540504800, 'am', '', 21600, 21630, 0, 7),
(82, 'asde', 'asde', 'asde', 'Student', '111111111111111', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(83, 'adsadas', 'sadadadas', 'asdada', 'Student', '111111', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(84, 'asd', 'easda', 'asdad', 'Student', '212313131', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(85, 'asd', 'easda', 'asdad', 'Student', '212313131', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(86, 'asd', 'easda', 'asdad', 'Student', '212313131', '1111111111', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(87, 'asde', 'asde', 'asde', 'Student', '1111111111', '1231213132', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(88, 'asde', 'asde', 'asde', 'Student', '123131313131', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(89, 'asde', 'asde', 'asde', 'Student', '123131313131', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(90, 'asde', 'asde', 'asde', 'Student', '123131313131', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(91, 'asde', 'asde', 'asde', 'Student', '123131313131', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(92, 'asde', 'asde', 'asde', 'Student', '123131313131', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(93, 'asde', 'asde', 'asde', 'Student', '123131313131', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(94, 'asde', 'asde', 'asde', 'Student', '123131313131', '3213131312', '4', 'Conference ', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(95, 'asde', 'asde', 'asde', 'Student', '123132131231313', '1231313131', '4', 'Conference', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(96, 'asdadads', 'asdadas', 'asda', 'Student', '12313131', '3123131313', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(97, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(98, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(99, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(100, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(101, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(102, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(103, 'saadada', 'dadada', 'dadadada', 'Student', '213131323', '213131231', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 21630, 0, 7),
(104, 'sade', 'asde', 'asde', 'Student', '123131313131313', '1313131313', '4', 'Achieve', '', '0', 1540677600, 1540677600, 'am', '', 21600, 23400, 0, 7),
(105, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '2313131313', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(106, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '2131313131', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(107, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '2131313131', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(108, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '1231313131', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(109, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '1231313131', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(110, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '1231313131', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(111, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '1313131313', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(112, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '1313131313', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(113, 'asde', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '1313131313', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 25230, 0, 7),
(114, 'asdadsadadada', 'SHS', 'Kevin Gonzalessss Ty', 'Student', '2015300444', '2313131313', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 25200, 27000, 0, 7),
(115, 'dada', 'dadaa', 'dadada', 'Student', '313321313123132', '3213132132', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 21600, 23400, 0, 7),
(116, 'asdadadasd', 'adasdasdas', 'dadada', 'Student', '321313131', '3212131313', '3', 'Create', '', '0', 1540677600, 1540677600, 'am', '', 28800, 30600, 0, 7);

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
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(100) NOT NULL,
  `School_Id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `Department_Id` int(10) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `School_Id`, `firstname`, `middlename`, `lastname`, `Department_Id`, `gender`, `username`, `email`, `password`, `user_type`) VALUES
(1, 2015300450, 'Michael', 'Berania', 'Baldevia', 0, 'Male', 'Admin', 'baldeviamichael1@gmail.com', '123', 'admin'),
(2, 2015300444, 'Kevin', 'Gonzalessss', 'Ty', 3, 'Male', 'User', 'kevingty@gmail.com', '123', 'student'),
(3, 2015333111, 'Leo Francis', 'Acuesta', 'Dayao', 2, 'Male', 'Employee', 'Employee@gmail.com', '123', 'employee');

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
(14, '1540591200', 'asde');

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
(1, 'Read', 1, 15, 6, 'AVR.jpg', 'Available'),
(2, 'Learn', 1, 20, 6, 'balcruz.jpg', 'Available'),
(3, 'Master', 2, 7, 4, 'bellarmine.jpg', 'Available'),
(4, 'Innovate', 2, 7, 4, 'MPH.jpg', 'Available'),
(5, 'Inspire', 3, 6, 4, 'site-image.jpg', 'Unavailable'),
(6, 'Create', 3, 10, 6, 'stmaur.jpg', 'Available'),
(7, 'Cooperate', 3, 10, 6, 'MPH.jpg', 'Unavailable'),
(8, 'Conference', 3, 10, 6, '', 'Available'),
(9, 'Makerspace', 3, 10, 6, '', 'Available'),
(10, 'Achieve', 4, 10, 6, '', 'Available'),
(11, 'Lead', 4, 10, 6, '', 'Available'),
(12, 'Conference', 4, 10, 6, '', 'Available'),
(13, 'Collaborate', 5, 5, 2, '', 'Available'),
(14, 'Connect', 5, 4, 2, '', 'Available'),
(15, 'Communicate', 5, 5, 2, '', 'Available'),
(16, 'Excellence', 6, 10, 6, '', 'Available'),
(17, 'Virtue', 6, 10, 6, '', 'Available'),
(18, 'Dream', 3, 6, 4, '', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingcalendar`
--
ALTER TABLE `bookingcalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_department`
--
ALTER TABLE `room_department`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `room_department`
--
ALTER TABLE `room_department`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unavailable_dates`
--
ALTER TABLE `unavailable_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `RoomID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
