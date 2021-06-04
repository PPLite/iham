-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 02:49 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
 
--
-- Database: `ukm`
--
 
-- --------------------------------------------------------
 
--
-- Table structure for table `user`
--
 
CREATE TABLE `user` (
 `idUser` int(11) NOT NULL,
 `namaUser` varchar(150) NOT NULL,
 `telpUser` varchar(13) NOT NULL,
 `alamatUser` text NOT NULL,
 `username` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 `foto` varchar(250) NOT NULL,
 `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Dumping data for table `user`
--
 
INSERT INTO `user` (`idUser`, `namaUser`, `telpUser`, `alamatUser`, `username`, `password`, `foto`, `level`) VALUES
(2, 'Ibu Cynthia Dayan', '-', '-', 'dayan', 'dayan', 'Islamic_Wallpaper_Mosque_004-1440x900.jpg', 2),
(4, 'Administrator', '081959109190', 'Jl.Subrantas no.13', 'admin', 'admin', '264428cee54fa195f80aecd98a18a903.jpg', 1),
(8, 'Ibu Mega', '-', '-', 'mega', 'mega', 'Islamic_Wallpaper_Quran_004-1600x1050.jpg', 2),
(9, 'Dina Oktavia S', '-', '-', 'dina', 'dina', 'Islamic_Wallpaper_Mosque_001-1366x768.jpg', 2);
 
--
-- Indexes for dumped tables
--
 
--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`idUser`);
 
--
-- AUTO_INCREMENT for dumped tables
--
 
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
 MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;