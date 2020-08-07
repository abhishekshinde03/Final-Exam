-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 10:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developers_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg_detail`
--

CREATE TABLE `reg_detail` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `current_city` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `Photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_detail`
--

INSERT INTO `reg_detail` (`user_id`, `firstname`, `lastname`, `email`, `password`, `current_city`, `skills`, `Photo`) VALUES
(18, 'abhi', 'shinde', 'abhi@gmail.com', '202cb962ac59075b964b07152d234b70', 'vadodara', 'food', 'football.jpg'),
(19, 'Sanjay', 'Shastri', 'sanjay@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dhudhama', 'Hockey', 'football2.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg_detail`
--
ALTER TABLE `reg_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg_detail`
--
ALTER TABLE `reg_detail`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
