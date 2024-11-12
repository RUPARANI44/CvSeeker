-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 09:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobseeker`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `edid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `exam_name` varchar(30) NOT NULL,
  `exam_sequence` varchar(30) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `gpa_class` float NOT NULL,
  `institute` varchar(50) NOT NULL,
  `board` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`edid`, `pid`, `exam_name`, `exam_sequence`, `subject`, `year`, `gpa_class`, `institute`, `board`) VALUES
(1, 1, 'ssc', '1', 'science', 2018, 4.86, 'Syad Hatim Ali High School', 'sylhet'),
(2, 1, 'hsc', '2', 'science', 2021, 4.7, 'Sylhet Govt.  College', 'sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `exid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `jobtitle` varchar(30) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `start_date` int(30) NOT NULL,
  `end_date` int(30) NOT NULL,
  `responsibility` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `pid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `religion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`pid`, `name`, `father`, `mother`, `date_of_birth`, `address`, `blood_group`, `religion`) VALUES
(1, 'Rupa', 'Krishno Guptho', 'Shikha Rani Paul', '2000-10-01', 'sylhet', 'A+ve', 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `skills_title` varchar(30) NOT NULL,
  `skills_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skid`, `pid`, `skills_title`, `skills_description`) VALUES
(1, 1, 'PHP', 'Learning from Bcc Sylhet'),
(2, 1, 'Laravel', '');

-- --------------------------------------------------------

--
-- Table structure for table `training_info`
--

CREATE TABLE `training_info` (
  `trid` int(11) NOT NULL,
  `pid` int(10) NOT NULL,
  `title` varchar(80) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `duration` int(10) NOT NULL,
  `hour_day` int(20) NOT NULL,
  `starting_day` int(30) NOT NULL,
  `ending_day` int(50) NOT NULL,
  `training_detalis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_info`
--

INSERT INTO `training_info` (`trid`, `pid`, `title`, `institution`, `duration`, `hour_day`, `starting_day`, `ending_day`, `training_detalis`) VALUES
(1, 1, 'Web Developer', 'abc', 6, 15, 12, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `creation_date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pid`, `email`, `password`, `creation_date`, `status`) VALUES
(1, 1, 'rupa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-10-14', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`edid`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skid`);

--
-- Indexes for table `training_info`
--
ALTER TABLE `training_info`
  ADD PRIMARY KEY (`trid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `edid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `exid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training_info`
--
ALTER TABLE `training_info`
  MODIFY `trid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
