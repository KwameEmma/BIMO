-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 09:01 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `installation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `aid` int NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `job` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`aid`, `fullname`, `email`, `password`, `image`, `job`) VALUES
(1, 'Ezra Boateng', 'ezraamani1234@gmail.com', '1234', 'amani.jpg', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `courses_tbl`
--

CREATE TABLE `courses_tbl` (
  `cid` int NOT NULL,
  `courses_name` varchar(50) NOT NULL,
  `courses_duration` varchar(50) NOT NULL,
  `courses_price` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_tbl`
--

INSERT INTO `courses_tbl` (`cid`, `courses_name`, `courses_duration`, `courses_price`, `student_id`, `image`) VALUES
(1, 'Satellite Installation', ' 3 Months', 'GH&cent;1,500', 'SI00001', 'course-1.jpg'),
(2, 'Graphic Design', ' 3 Months', 'GH&cent;1,500', 'GD0005', 'course-1.jpg'),
(3, 'Fashion Design', ' 3 Months', 'GH&cent;1,500', 'FD0003', 'amani.jpg'),
(4, 'Flat Screen Installation', ' 1 Months', 'GH&cent;500', 'FI0001', 'install2.jpeg'),
(5, 'Satellite Installation', ' 3 Months', 'GH&cent;1,500', 'SI00004', 'install3.jpeg'),
(7, 'Flatscreen Installation', ' 6 Months', 'GH&cent;1,500.00', 'FSI00005', 'course-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `eid` int NOT NULL,
  `event_name` int NOT NULL,
  `event_date` int NOT NULL,
  `event_location` int NOT NULL,
  `image` int NOT NULL,
  `description` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `installers_tbl`
--

CREATE TABLE `installers_tbl` (
  `iid` int NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `installers_tbl`
--

INSERT INTO `installers_tbl` (`iid`, `fullname`, `email`, `password`, `address`, `contact`, `image`) VALUES
(1, 'Zazzey Boateng', 'Zazzeyb@gmail.com', '1234', 'SNNIT Estate, Koforidua', '0505487963', 'amani.jpg'),
(2, 'Boss Chick', 'Bosschick@gmail.com', '1234', 'Adjie-Kwadjo, Accra', '0546987541', 'amani.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message_tbl`
--

CREATE TABLE `message_tbl` (
  `mid` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message_tbl`
--

INSERT INTO `message_tbl` (`mid`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Zazzey Boateng', 'ezraamani1234@gmail.com', 'Message', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam perspiciatis quaerat dignissimos libero autem suscipit, rem nesciunt quidem culpa! Nobis consequatur sed eum molestias natus architecto error nam a dolores.');

-- --------------------------------------------------------

--
-- Table structure for table `price_tbl`
--

CREATE TABLE `price_tbl` (
  `pid` int NOT NULL,
  `courses_name` varchar(50) NOT NULL,
  `courses_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

CREATE TABLE `services_tbl` (
  `sid` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`sid`, `name`, `description`, `image`) VALUES
(1, 'Star Times TV', '', '4.JPG'),
(2, 'DSTV Installation', '', '1.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `sid` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`sid`, `fullname`, `contact`, `gender`, `course`, `location`, `image`) VALUES
(1, 'Ezra Boateng', '0549107879', 'Male', 'Air Condition Installation', 'Adweso ', 'amani.jpg'),
(2, 'Augustina Buer', '0261319047', 'Female', 'Fashion Design', 'Accra', 'art1.jpeg'),
(3, 'Boateng Ernest', '0549107879', 'Male', 'Graphic Design', 'Accra', 'course-1.jpg'),
(4, 'Kwame Manuel', '0549107879', 'Male', 'Satellite Installation', 'Osabene Junction 1', 'install4.jpeg'),
(5, 'Ama Kessewaa', '0261319047', 'Female', 'Flat Screen Installation', 'Atekyem', 'carp4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trainner_tbl`
--

CREATE TABLE `trainner_tbl` (
  `t_id` int NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_contact` varchar(50) NOT NULL,
  `t_email` varchar(50) NOT NULL,
  `t_address` varchar(50) NOT NULL,
  `t_course` varchar(50) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainner_tbl`
--

INSERT INTO `trainner_tbl` (`t_id`, `t_name`, `t_contact`, `t_email`, `t_address`, `t_course`, `image`) VALUES
(1, 'Augustina', '0204541547', 'Augustina@gmail.com', 'Tema', '', 'Capture.png'),
(2, 'Joyceline', '0204541547', 'Joyceline@gmail.com', 'Begoro', '', 'download.jpg'),
(3, 'Ezra', '0204541547', 'Augustina@gmail.com', 'Begoro', '', 'download.jpg'),
(4, 'Manuel', '0204541547', 'Manuel@gmail.com', 'Koforidua', 'Programming', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `video_tbl`
--

CREATE TABLE `video_tbl` (
  `vid` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video_tbl`
--

INSERT INTO `video_tbl` (`vid`, `name`, `video`) VALUES
(1, 'Satellite Installation', 'install.mp4'),
(2, 'Satellite Installation', 'install2.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `installers_tbl`
--
ALTER TABLE `installers_tbl`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `message_tbl`
--
ALTER TABLE `message_tbl`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `price_tbl`
--
ALTER TABLE `price_tbl`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `services_tbl`
--
ALTER TABLE `services_tbl`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `trainner_tbl`
--
ALTER TABLE `trainner_tbl`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `eid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installers_tbl`
--
ALTER TABLE `installers_tbl`
  MODIFY `iid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_tbl`
--
ALTER TABLE `message_tbl`
  MODIFY `mid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price_tbl`
--
ALTER TABLE `price_tbl`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_tbl`
--
ALTER TABLE `services_tbl`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainner_tbl`
--
ALTER TABLE `trainner_tbl`
  MODIFY `t_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video_tbl`
--
ALTER TABLE `video_tbl`
  MODIFY `vid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
