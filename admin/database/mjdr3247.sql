-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 07:27 AM
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
-- Database: `mjdr3247_adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(24, 'mojo223', 'mojo2@gmail.com', 'admin', 'pengguna'),
(25, 'ajinomolto2', 'mj@gg.com', 'admin', 'pengguna'),
(26, 'admin', 'admin@gg.com', 'admin', 'admin'),
(28, 'admin2', 'admin@gg.wp', 'admin', 'admin'),
(29, 'PPlite', 'mj@gg.com', 'admin', 'admin'),
(31, 'Miku', 'Mikudayo@gmail.com', 'admin', 'pengguna'),
(32, 'Hatsune Miku', 'mj@mj.com', '12345678', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset_peringatan`
--

CREATE TABLE `tb_aset_peringatan` (
  `id` int(3) NOT NULL,
  `uid_rfid` varchar(50) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rfid`
--

CREATE TABLE `tb_rfid` (
  `id` int(5) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `tanggal` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `penanggung_jawab` varchar(50) NOT NULL,
  `status_asset` varchar(10) NOT NULL,
  `peminjam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rfid`
--

INSERT INTO `tb_rfid` (`id`, `uid`, `nama_alat`, `deskripsi`, `tanggal`, `penanggung_jawab`, `status_asset`, `peminjam`) VALUES
(22, '55555555555', 'Light Stick', 'Light Stick warna Tosca', '2021-05-15 22:30:46.363699', 'Mojo', 'tersedia', 'Sulis'),
(25, '234879978324', 'Bantal', 'Dakimura karakter Zero Two', '2021-05-15 22:30:55.367621', 'Mojo', 'peringatan', 'Sulis'),
(26, '79128391', 'Figurin PVC', 'Karakter Kafuu Chino', '2021-05-15 22:30:59.578477', 'Mojo', 'peringatan', 'Sulis'),
(27, '79248329', 'Figurin PVC', 'Miku Racing Edition', '2021-05-15 22:31:03.889130', 'Sulis', 'peringatan', 'Mojo'),
(28, '37294889', 'Figurin PVC', 'Snow Miku 2020', '2021-05-15 22:31:11.422713', 'Suherman', 'dipinjam', 'Mojo'),
(30, '79824312', 'Figurin PVC', 'Luka Formal Work', '2021-05-15 22:31:16.321357', 'Subandiyo', 'validasi', 'Sulekah'),
(31, '79824312', 'Figurin PVC', 'Luka Formal Work', '2021-05-15 22:31:20.675028', 'Subandiyo', 'validasi', 'Sulekah'),
(32, '123123', '123123', '123123', '2021-05-15 22:31:25.606765', '123123', 'habis', '123123'),
(33, '12314234', '234234234', '1231342', '2021-05-15 22:31:29.401331', '123123', 'habis', '124234234'),
(34, '79824312', 'Figurin PVC', 'Panasonic', '2021-05-15 22:31:33.467041', 'Subandiyo', 'tersedia', 'Sulekah'),
(36, '55555555555', 'Kunci', 'Ruang Baca', '2021-05-15 22:31:47.149956', 'Subandiyo', 'peringatan', 'Suherman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `dipinjam_oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stat_anak`
--

CREATE TABLE `tb_stat_anak` (
  `id` int(4) NOT NULL,
  `rfid_uid` varchar(50) NOT NULL,
  `id_pengenal` varchar(50) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `waktu_masuk` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `alamat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stat_anak`
--

INSERT INTO `tb_stat_anak` (`id`, `rfid_uid`, `id_pengenal`, `nama_anak`, `nama_ibu`, `penanggung_jawab`, `waktu_masuk`, `alamat`, `status`) VALUES
(1, '123123', '2178391213', 'Pablo Rodiguez Saloso Santoso', 'Suminten', 'Mojo', '2021-05-15 17:29:23.009226', 'Sukolilo', 'checkin'),
(2, '729183798123', '217938321978', 'Raul Lemos', 'Suminten', 'Mojo', '2021-05-15 22:22:32.093949', 'Sukolilo', 'validasi'),
(3, '729183798123', '217938321978', 'Michael Subagio ', 'Sujinah', 'Mojo', '2021-05-15 22:22:36.247277', 'Sukolilo', 'validasi'),
(5, '34789234987', '92387493284', 'Mitsumoto Kayano', 'Sugihara Kayano', 'Mojo', '2021-05-15 22:22:40.302914', 'Sleman', 'validasi'),
(6, '792843983274', '437298392874', 'Sandoze Murkvenlinov', 'Acrvic Konvanov', 'Mojo', '2021-05-15 16:25:32.944651', 'Berlin', 'masuk'),
(7, '729183798125', '92387493284', 'Takahiro Nobutoshi', 'Honoka Yumi', 'Subandiyo', '2021-05-15 22:27:13.008663', 'Keputih', 'peringatan'),
(8, '792843983274', '123123', 'Kyoko Ayumu', 'Yuuko Aoi', 'Mojo', '2021-05-15 22:27:47.460563', 'Keputih', 'peringatan'),
(9, 'yyyyyyyy', 'yyyyyyyyyy', 'yyyyyyy', 'xxxxxxxxxxxx', 'xxxxxxxxxx', '2021-05-15 22:28:26.166170', 'xxxxxxxxx', 'masuk'),
(10, 'zzzzzzzz', 'zzzzzzzzz', 'zzzzzzzzz', 'zzzzzzzzz', 'zzzzzzzzz', '2021-05-15 22:28:37.190444', 'zzzzzzzzzzzz', 'peringatan'),
(11, 'ccccccccc', 'ccccccccccc', 'ccccccccccc', 'cccccccccc', 'ccccccccccc', '2021-05-15 22:28:53.573237', 'ccccccccccc', 'peringatan'),
(12, 'wwwwwwww', 'eeeeeeeeeeee', 'wwwwwwwww', 'wwwwwwww', 'wwwwwwwwww', '2021-05-15 22:29:20.858668', 'wwwwwwwwww', 'peringatan'),
(13, 'rrrrrrrrrrrrr', 'rrrrrrrrr', 'rrrrrrrrrrr', 'rrrrrrrrrrrr', 'rrrrrrrrrrr', '2021-05-15 22:29:35.934553', 'rrrrrrrrrrrrrrr', 'peringatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_aset_peringatan`
--
ALTER TABLE `tb_aset_peringatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rfid`
--
ALTER TABLE `tb_rfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stat_anak`
--
ALTER TABLE `tb_stat_anak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_rfid`
--
ALTER TABLE `tb_rfid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stat_anak`
--
ALTER TABLE `tb_stat_anak`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
