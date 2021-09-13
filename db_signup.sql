-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2021 at 05:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `signupUser`
--

CREATE TABLE `signupUser` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cyear` varchar(255) NOT NULL,
  `studentId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signupUser`
--

INSERT INTO `signupUser` (`id`, `name`, `cyear`, `studentId`) VALUES
(25, 'sdfsdf', 'sdfsdf', 'sdfdsfds');

-- --------------------------------------------------------

--
-- Table structure for table `verifiedUser`
--

CREATE TABLE `verifiedUser` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cyear` varchar(255) NOT NULL,
  `studentId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifiedUser`
--

INSERT INTO `verifiedUser` (`id`, `name`, `cyear`, `studentId`) VALUES
(26, 'paul', 'BSIS-4A', '2018-PC-100757'),
(27, 'sadad', 'sadasd', 'dasda'),
(28, 'fsdfs', 'dsfdsf', 'fsdfdsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signupUser`
--
ALTER TABLE `signupUser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifiedUser`
--
ALTER TABLE `verifiedUser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signupUser`
--
ALTER TABLE `signupUser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `verifiedUser`
--
ALTER TABLE `verifiedUser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
