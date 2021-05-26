-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exposants`
--

-- --------------------------------------------------------

--
-- Table structure for table `exposants`
--

CREATE TABLE `exposants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `width` float NOT NULL,
  `length` float NOT NULL,
  `posX` float NOT NULL,
  `posY` float NOT NULL,
  `numerotation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exposants`
--

INSERT INTO `exposants` (`id`, `nom`, `width`, `length`, `posX`, `posY`, `numerotation`) VALUES
(1, 'e2000020271601980440aeaf', 10, 10, 100, 10, 'Solipah Bin Sukijah'),
(3, 'e2000020271601880440a63a', 10, 10, 30, 10, 'Shinobu Chiyoko'),
(4, 'e20000202716016304408d11', 10, 10, -20, 10, 'Pablo Rodiguez Saloso Santoso');

-- --------------------------------------------------------

--
-- Table structure for table `reader1`
--

CREATE TABLE `reader1` (
  `no` int(6) NOT NULL,
  `uid_rfid` varchar(255) NOT NULL,
  `scanner` float NOT NULL,
  `waktu` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reader1`
--

INSERT INTO `reader1` (`no`, `uid_rfid`, `scanner`, `waktu`) VALUES
(1, 'e2000020271601980440aeaf', 2, '2021-05-12 20:08:57.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exposants`
--
ALTER TABLE `exposants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`);

--
-- Indexes for table `reader1`
--
ALTER TABLE `reader1`
  ADD PRIMARY KEY (`no`),
  ADD KEY `uid_rfid` (`uid_rfid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exposants`
--
ALTER TABLE `exposants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reader1`
--
ALTER TABLE `reader1`
  MODIFY `no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
