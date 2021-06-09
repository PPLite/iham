-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 05:52 AM
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
-- Table structure for table `dd_vals`
--

CREATE TABLE `dd_vals` (
  `index` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `dd_val` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dd_vals`
--

INSERT INTO `dd_vals` (`index`, `category`, `dd_val`) VALUES
(1, 'snacks', 'Chips'),
(2, 'snacks', 'Cookies'),
(3, 'beverages', 'Coffee'),
(4, 'beverages', 'Coke');

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
(26, 'admin', 'admin@gg.com', 'admin', 'admin'),
(28, 'admin2', 'admin@gg.wp', 'admin', 'engginer'),
(29, 'PPlite', 'mj@gg.com', 'admin', 'admin'),
(31, 'Miku', 'Mikudayo@gmail.com', 'admin', 'operator'),
(32, 'Hatsune Miku', 'mj@mj.com', '12345678', 'manajer-aset'),
(34, 'mojo3', 'mojo22@gg.com', '123', 'manajer-aset'),
(36, 'rachma', 'ajisolicha@gmail.com', 'RASBTS', 'engginer'),
(37, 'luka', 'admin@toko-murah.com', '123', 'manajer-aset'),
(38, '123123123123', '123123@gmail.com', '123', 'admin'),
(39, 'admin123', '1231232@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_area_1`
--

CREATE TABLE `tb_area_1` (
  `id` int(11) NOT NULL,
  `rfid_uid` varchar(30) NOT NULL,
  `timestamp` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `nama_anak` varchar(30) NOT NULL,
  `posX` float NOT NULL,
  `posY` float NOT NULL,
  `total` float NOT NULL,
  `tot_all` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_area_1`
--

INSERT INTO `tb_area_1` (`id`, `rfid_uid`, `timestamp`, `nama_anak`, `posX`, `posY`, `total`, `tot_all`) VALUES
(2, '', '2021-06-08 09:42:24.904211', '', 100, 10, 1915, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_area_2`
--

CREATE TABLE `tb_area_2` (
  `id` int(11) NOT NULL,
  `timestamp` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `rfid_uid` varchar(30) NOT NULL,
  `nama_anak` varchar(30) NOT NULL,
  `posX` float NOT NULL,
  `posY` float NOT NULL,
  `total` float NOT NULL,
  `tot_all` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_area_2`
--

INSERT INTO `tb_area_2` (`id`, `timestamp`, `rfid_uid`, `nama_anak`, `posX`, `posY`, `total`, `tot_all`) VALUES
(1, '2021-06-06 23:25:10.412916', '00000000000', 'none', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_area_3`
--

CREATE TABLE `tb_area_3` (
  `id` int(11) NOT NULL,
  `timestamp` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `rfid_uid` varchar(30) NOT NULL,
  `nama_anak` varchar(30) NOT NULL,
  `posX` float NOT NULL,
  `posY` float NOT NULL,
  `total` float NOT NULL,
  `tot_all` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_area_3`
--

INSERT INTO `tb_area_3` (`id`, `timestamp`, `rfid_uid`, `nama_anak`, `posX`, `posY`, `total`, `tot_all`) VALUES
(1383, '2021-06-09 00:02:54.657186', 'e200002027160173044095de', 'rahma', 100, 10, 1021, 0),
(1384, '2021-06-09 00:03:00.656376', 'e2000020271601980440aeaf', 'Solipah Bin Sukijah', 100, 20, 231, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasilscan1_asetbarang`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasilscan1_asetbarang` (
`nama_alat` varchar(50)
,`timestamp` timestamp
,`rfid_uid` varchar(100)
,`deskripsi` varchar(50)
,`penanggung_jawab` varchar(50)
,`status_asset` varchar(30)
,`peminjam` varchar(50)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasilscan1_asetbayi`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasilscan1_asetbayi` (
`nama_anak` varchar(50)
,`rfid_uid` varchar(100)
,`id_pengenal` varchar(50)
,`nama_ibu` varchar(50)
,`penanggung_jawab_bayi` varchar(50)
,`alamat` varchar(50)
,`status` varchar(50)
,`timestamp` timestamp
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasilscan2_asetbarang`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasilscan2_asetbarang` (
`nama_alat` varchar(50)
,`timestamp` timestamp(6)
,`rfid_uid` varchar(30)
,`deskripsi` varchar(50)
,`penanggung_jawab` varchar(50)
,`status_asset` varchar(30)
,`peminjam` varchar(50)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasilscan2_asetbayi`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasilscan2_asetbayi` (
`nama_anak` varchar(50)
,`rfid_uid` varchar(30)
,`id_pengenal` varchar(50)
,`nama_ibu` varchar(50)
,`penanggung_jawab_bayi` varchar(50)
,`alamat` varchar(50)
,`status` varchar(50)
,`timestamp` timestamp(6)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peta`
--

CREATE TABLE `tb_peta` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `width` float NOT NULL,
  `length` float NOT NULL,
  `posX` float NOT NULL,
  `posY` float NOT NULL,
  `numerotation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peta`
--

INSERT INTO `tb_peta` (`id`, `nom`, `width`, `length`, `posX`, `posY`, `numerotation`) VALUES
(1, 'e2000020271601980440aeaf', 10, 10, 10, 10, 'Solipah Bin Sukijah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reader_scan`
--

CREATE TABLE `tb_reader_scan` (
  `id` int(100) NOT NULL,
  `rfid_uid` varchar(100) NOT NULL,
  `reader_id` varchar(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reader_scan`
--

INSERT INTO `tb_reader_scan` (`id`, `rfid_uid`, `reader_id`, `timestamp`) VALUES
(1, 'e200002027160173044095de', '1', '2021-06-08 03:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reader_scan2`
--

CREATE TABLE `tb_reader_scan2` (
  `id` int(255) NOT NULL,
  `rfid_uid` varchar(30) DEFAULT NULL,
  `reader_id` varchar(30) DEFAULT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reader_scan2`
--

INSERT INTO `tb_reader_scan2` (`id`, `rfid_uid`, `reader_id`, `timestamp`) VALUES
(1, 'e200002027160173044095fg', '2', '2021-06-08 03:49:15.000000'),
(16673, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:00.478405'),
(16674, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:01.101229'),
(16675, 'e200002027160173044095de', '2', '2021-06-08 17:02:01.421203'),
(16676, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:01.580014'),
(16677, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:02.133349'),
(16678, 'e200002027160173044095de', '2', '2021-06-08 17:02:02.138019'),
(16679, 'e200002027160173044095de', '2', '2021-06-08 17:02:02.781031'),
(16680, 'e200002027160173044095de', '2', '2021-06-08 17:02:03.132106'),
(16681, 'e200002027160173044095de', '2', '2021-06-08 17:02:03.469324'),
(16682, 'e200002027160173044095de', '2', '2021-06-08 17:02:03.618608'),
(16683, 'e200002027160173044095de', '2', '2021-06-08 17:02:04.059418'),
(16684, 'e200002027160173044095de', '2', '2021-06-08 17:02:04.229704'),
(16685, 'e200002027160173044095de', '2', '2021-06-08 17:02:05.107839'),
(16686, 'e200002027160173044095de', '2', '2021-06-08 17:02:05.263062'),
(16687, 'e200002027160173044095de', '2', '2021-06-08 17:02:05.723120'),
(16688, 'e200002027160173044095de', '2', '2021-06-08 17:02:06.034059'),
(16689, 'e200002027160173044095de', '2', '2021-06-08 17:02:06.269593'),
(16690, 'e200002027160173044095de', '2', '2021-06-08 17:02:06.541538'),
(16691, 'e200002027160173044095de', '2', '2021-06-08 17:02:07.026780'),
(16692, 'e200002027160173044095de', '2', '2021-06-08 17:02:07.360614'),
(16693, 'e200002027160173044095de', '2', '2021-06-08 17:02:07.542482'),
(16694, 'e200002027160173044095de', '2', '2021-06-08 17:02:07.752013'),
(16695, 'e200002027160173044095de', '2', '2021-06-08 17:02:08.179681'),
(16696, 'e200002027160173044095de', '2', '2021-06-08 17:02:08.788176'),
(16697, 'e200002027160173044095de', '2', '2021-06-08 17:02:08.958278'),
(16698, 'e200002027160173044095de', '2', '2021-06-08 17:02:09.187381'),
(16699, 'e200002027160173044095de', '2', '2021-06-08 17:02:09.483222'),
(16700, 'e200002027160173044095de', '2', '2021-06-08 17:02:17.958455'),
(16701, 'e200002027160173044095de', '2', '2021-06-08 17:02:19.443609'),
(16702, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:22.417602'),
(16703, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:22.635696'),
(16704, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:24.130313'),
(16705, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:24.539789'),
(16706, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:24.874707'),
(16707, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:25.006419'),
(16708, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:25.134545'),
(16709, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:25.484675'),
(16710, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:25.623632'),
(16711, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:25.974050'),
(16712, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:26.304956'),
(16713, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:26.439533'),
(16714, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:26.567483'),
(16715, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:26.920224'),
(16716, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:27.724010'),
(16717, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:28.316356'),
(16718, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:28.482316'),
(16719, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:28.837730'),
(16720, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:29.172558'),
(16721, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:29.307425'),
(16722, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:29.656414'),
(16723, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:29.990916'),
(16724, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:30.152515'),
(16725, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:30.301898'),
(16726, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:30.690440'),
(16727, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:30.868464'),
(16728, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:31.425377'),
(16729, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:32.431673'),
(16730, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:34.980444'),
(16731, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:43.161593'),
(16732, 'e200002027160173044095de', '2', '2021-06-08 17:02:43.716589'),
(16733, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:43.724651'),
(16734, 'e200002027160173044095de', '2', '2021-06-08 17:02:43.881602'),
(16735, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:43.886711'),
(16736, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:44.204413'),
(16737, 'e200002027160173044095de', '2', '2021-06-08 17:02:44.208614'),
(16738, 'e200002027160173044095de', '2', '2021-06-08 17:02:44.390788'),
(16739, 'e2000020271601980440aeaf', '2', '2021-06-08 17:02:44.395541'),
(16740, 'e200002027160173044095de', '2', '2021-06-08 17:02:44.671578'),
(16741, 'e200002027160173044095de', '2', '2021-06-08 17:02:45.138051'),
(16742, 'e200002027160173044095de', '2', '2021-06-08 17:02:45.556171'),
(16743, 'e200002027160173044095de', '2', '2021-06-08 17:02:45.965735'),
(16744, 'e200002027160173044095de', '2', '2021-06-08 17:02:46.137567'),
(16745, 'e200002027160173044095de', '2', '2021-06-08 17:02:46.928002'),
(16746, 'e200002027160173044095de', '2', '2021-06-08 17:02:48.288199'),
(16747, 'e200002027160173044095de', '2', '2021-06-08 17:02:50.675814'),
(16748, 'e200002027160173044095de', '2', '2021-06-08 17:02:52.251275'),
(16749, 'e200002027160173044095de', '2', '2021-06-08 17:02:53.542489'),
(16750, 'e200002027160173044095de', '2', '2021-06-08 17:02:54.539655'),
(16751, 'e200002027160173044095de', '2', '2021-06-08 17:02:54.873176'),
(16752, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:00.592823'),
(16753, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:00.743565'),
(16754, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:00.859873'),
(16755, 'e200002027160173044095de', '2', '2021-06-08 17:03:00.868632'),
(16756, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:01.023724'),
(16757, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:02.843142'),
(16758, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:03.006050'),
(16759, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:03.146272'),
(16760, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:03.478047'),
(16761, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:04.552702'),
(16762, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:04.666286'),
(16763, 'e200002027160173044095de', '2', '2021-06-08 17:03:05.319093'),
(16764, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:05.325541'),
(16765, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:06.467917'),
(16766, 'e200002027160173044095de', '2', '2021-06-08 17:03:06.474649'),
(16767, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:06.599111'),
(16768, 'e200002027160173044095de', '2', '2021-06-08 17:03:06.603451'),
(16769, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:06.895793'),
(16770, 'e200002027160173044095de', '2', '2021-06-08 17:03:06.900650'),
(16771, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:07.047093'),
(16772, 'e200002027160173044095de', '2', '2021-06-08 17:03:07.050238'),
(16773, 'e200002027160173044095de', '2', '2021-06-08 17:03:07.209143'),
(16774, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:07.212534'),
(16775, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:07.551681'),
(16776, 'e200002027160173044095de', '2', '2021-06-08 17:03:07.556102'),
(16777, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:07.877831'),
(16778, 'e200002027160173044095de', '2', '2021-06-08 17:03:07.888477'),
(16779, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:09.895360'),
(16780, 'e200002027160173044095de', '2', '2021-06-08 17:03:10.209403'),
(16781, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:10.212253'),
(16782, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:10.419063'),
(16783, 'e200002027160173044095de', '2', '2021-06-08 17:03:10.422427'),
(16784, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:11.156563'),
(16785, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:11.296510'),
(16786, 'e200002027160173044095de', '2', '2021-06-08 17:03:11.300761'),
(16787, 'e2000020271601980440aeaf', '2', '2021-06-08 17:03:11.648377'),
(16788, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:39.697583'),
(16789, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:40.028709'),
(16790, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:40.443719'),
(16791, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:40.770301'),
(16792, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:40.907403'),
(16793, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:41.183838'),
(16794, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:41.293227'),
(16795, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:41.588677'),
(16796, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:41.743408'),
(16797, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:42.178647'),
(16798, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:42.343502'),
(16799, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:42.674535'),
(16800, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:42.776816'),
(16801, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:43.087002'),
(16802, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:43.433406'),
(16803, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:43.569080'),
(16804, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:43.909002'),
(16805, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:44.251280'),
(16806, 'e200002027160173044095de', '2', '2021-06-08 17:06:44.255638'),
(16807, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:44.666249'),
(16808, 'e200002027160173044095de', '2', '2021-06-08 17:06:44.670275'),
(16809, 'e200002027160173044095de', '2', '2021-06-08 17:06:44.828119'),
(16810, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:44.833143'),
(16811, 'e200002027160173044095de', '2', '2021-06-08 17:06:45.150166'),
(16812, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:45.274773'),
(16813, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:45.430100'),
(16814, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:45.751454'),
(16815, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:45.874358'),
(16816, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:46.034053'),
(16817, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:46.301276'),
(16818, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:46.420828'),
(16819, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:47.414598'),
(16820, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:47.741887'),
(16821, 'e2000020271601980440aeaf', '2', '2021-06-08 17:06:47.914446'),
(16822, 'e200002027160173044095de', '2', '2021-06-08 17:06:58.047273'),
(16823, 'e200002027160173044095de', '2', '2021-06-08 17:06:58.383823'),
(16824, 'e200002027160173044095de', '2', '2021-06-08 17:06:58.792648'),
(16825, 'e200002027160173044095de', '2', '2021-06-08 17:06:59.334146'),
(16826, 'e200002027160173044095de', '2', '2021-06-08 17:06:59.672390'),
(16827, 'e200002027160173044095de', '2', '2021-06-08 17:06:59.780304'),
(16828, 'e200002027160173044095de', '2', '2021-06-08 17:07:00.082450'),
(16829, 'e200002027160173044095de', '2', '2021-06-08 17:07:00.431457'),
(16830, 'e200002027160173044095de', '2', '2021-06-08 17:07:00.610458'),
(16831, 'e200002027160173044095de', '2', '2021-06-08 17:07:01.043997'),
(16832, 'e200002027160173044095de', '2', '2021-06-08 17:07:01.226280'),
(16833, 'e200002027160173044095de', '2', '2021-06-08 17:07:59.082530'),
(16834, 'e200002027160173044095de', '2', '2021-06-08 17:07:59.413239'),
(16835, 'e200002027160173044095de', '2', '2021-06-08 17:07:59.541809'),
(16836, 'e200002027160173044095de', '2', '2021-06-08 17:07:59.823275'),
(16837, 'e200002027160173044095de', '2', '2021-06-08 17:07:59.983860'),
(16838, 'e200002027160173044095de', '2', '2021-06-08 17:08:00.296880'),
(16839, 'e200002027160173044095de', '2', '2021-06-08 17:08:00.425121'),
(16840, 'e200002027160173044095de', '2', '2021-06-08 17:08:00.845715'),
(16841, 'e200002027160173044095de', '2', '2021-06-08 17:08:00.982087'),
(16842, 'e200002027160173044095de', '2', '2021-06-08 17:08:01.328707'),
(16843, 'e200002027160173044095de', '2', '2021-06-08 17:08:02.019990'),
(16844, 'e200002027160173044095de', '2', '2021-06-08 17:08:02.148092'),
(16845, 'e200002027160173044095de', '2', '2021-06-08 17:08:02.690328'),
(16846, 'e200002027160173044095de', '2', '2021-06-08 17:08:03.099046'),
(16847, 'e200002027160173044095de', '2', '2021-06-08 17:08:03.237578');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rfid`
--

CREATE TABLE `tb_rfid` (
  `id` int(5) NOT NULL,
  `rfid_uid` varchar(50) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `tanggal` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `penanggung_jawab` varchar(50) NOT NULL,
  `status_asset` varchar(30) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rfid`
--

INSERT INTO `tb_rfid` (`id`, `rfid_uid`, `nama_alat`, `deskripsi`, `tanggal`, `penanggung_jawab`, `status_asset`, `peminjam`, `keterangan`) VALUES
(46, 'aaaaaaaaaa', 'Blood Checker', 'Panasonic', '2021-06-04 19:25:24.211327', 'Subandiyo', 'konfirmasi_pindah', 'Sulekah', 'tes'),
(47, 'bbbbbbbbbbbbbb', 'Tensimeter', 'One Med', '2021-06-08 11:25:33.998857', 'Rachma', 'konfirmasi_pinjam', ' Mojo', ' Dibawa Ke Kantin'),
(48, 'ccccccccccccccccc', 'Blood Checker', 'Diabetasol', '2021-06-04 15:06:05.073154', 'Guruh', 'dipinjam', 'Sulekah', 'Diambil'),
(49, 'ddddddddddddddd', 'Tensimeter', 'One Med', '2021-06-04 15:03:50.106168', 'Mojo', 'dipinjam', '123123', 'Diambil'),
(51, 'eeeeeeeeeeeeeeeeee', 'Tensimeter', 'One Med', '2021-06-04 15:07:40.207689', 'Subandiyo', 'dipinjam', 'Sulis', 'Mau Dipindah ke ruang AA'),
(52, 'ffffffffffffffff', 'Tensimeter2', 'sssss', '2021-06-07 10:38:14.979265', 'Subandiyo', 'konfirmasi_pindah', ' Mojo', ' Dibawa Ke Kantin'),
(61, 'e200002027160173044095de', '12341234', '12341234', '2021-06-08 14:29:32.845707', 'Mojo', 'tersedia', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_scanner1_assetbarang`
-- (See below for the actual view)
--
CREATE TABLE `tb_scanner1_assetbarang` (
`rfid_uid` varchar(100)
,`nama_alat` varchar(50)
,`deskripsi` varchar(50)
,`penanggung_jawab` varchar(50)
,`status_asset` varchar(30)
,`peminjam` varchar(50)
,`timestamp` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_scanner1_assetbayi`
-- (See below for the actual view)
--
CREATE TABLE `tb_scanner1_assetbayi` (
`rfid_uid` varchar(100)
,`id_pengenal` varchar(50)
,`nama_anak` varchar(50)
,`nama_ibu` varchar(50)
,`penanggung_jawab_bayi` varchar(50)
,`alamat` varchar(50)
,`status` varchar(50)
,`timestamp` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_scanner2_assetbarang`
-- (See below for the actual view)
--
CREATE TABLE `tb_scanner2_assetbarang` (
`rfid_uid` varchar(30)
,`nama_alat` varchar(50)
,`deskripsi` varchar(50)
,`penanggung_jawab` varchar(50)
,`status_asset` varchar(30)
,`peminjam` varchar(50)
,`timestamp` timestamp(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_scanner2_assetbayi`
-- (See below for the actual view)
--
CREATE TABLE `tb_scanner2_assetbayi` (
`rfid_uid` varchar(30)
,`id_pengenal` varchar(50)
,`nama_anak` varchar(50)
,`nama_ibu` varchar(50)
,`penanggung_jawab_bayi` varchar(50)
,`alamat` varchar(50)
,`status` varchar(50)
,`timestamp` timestamp(6)
);

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
  `penanggung_jawab_bayi` varchar(50) NOT NULL,
  `waktu_masuk` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `alamat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stat_anak`
--

INSERT INTO `tb_stat_anak` (`id`, `rfid_uid`, `id_pengenal`, `nama_anak`, `nama_ibu`, `penanggung_jawab_bayi`, `waktu_masuk`, `alamat`, `status`, `keterangan`) VALUES
(18, 'e2000020271601980440aeaf', '172893982173312', 'Solipah Bin Sukijah', 'Sulijah', 'Rahma', '2021-06-03 14:12:39.485522', 'Sukolilo', 'masuk', 'aduh ucul bocahe'),
(23, 'e20000202716018204409d9f', '217938321978', 'suyatno', 'mariyam', 'jennifer', '2021-06-03 14:14:01.356102', 'bantul, jogjakarta', 'perawatan', 'mbuh nang ndi bocah iki'),
(24, 'e20000202716016304408d11', 'aaaaaaaaaaaaa', 'Pablo Rodiguez Saloso Santoso', 'Suminten', 'Mojo', '2021-05-25 08:21:40.098921', 'Bratang', 'masuk', '0'),
(25, 'e200002027160174044094e3', 'bbbbbbbbbbbbbbbbb', 'Muhammad Al Roberto ', 'Mukiyem', 'Mojo', '2021-05-25 08:22:40.564314', 'Sukolilo', 'masuk', '0'),
(26, 'e20000202716016404408c22', '2178391213', 'Shouko Katsuragi', 'Sayaka Katsuragi', 'Mojo', '2021-05-25 08:27:28.258653', 'Tambaksari', 'masuk', '0'),
(27, 'e20000202716015704408452', '2178391213', 'Kana Ichinose', 'Hisako', 'Mojo', '2021-05-25 14:58:04.155400', 'Ngagel', 'perawatan', '0'),
(29, 'e2000020271601880440a63a', '437298392874', 'Shinobu Chiyoko', 'Emi Saori', 'Mojo', '2021-06-03 13:59:32.718988', 'Buduran', 'peringatan', 'kritis'),
(30, 'e20000202716015804408363', '123123213234234', 'Miku Sayuri', 'Tomoko Yuki', 'Mojo', '2021-05-25 15:04:59.909910', 'Rungkut Industri', 'masuk', '0'),
(33, 'e20000202716018204409d9f', '2178391213', 'Maria', 'Suminten', 'Mojo', '2021-06-03 06:32:57.592592', 'Sukolilo', 'perawatan', '0'),
(34, 'e200002027160182044095de', '11111', 'Aini', 'Rachma', 'Mojo', '2021-06-03 06:45:01.254703', 'Medaeng', 'perawatan', '0'),
(35, 'e20000202716013204406922', '111111', 'Rachma', 'aini', 'Guruh', '2021-06-03 06:47:30.926765', 'Medaeng', 'perawatan', '0'),
(36, 'e200002027160173044095dexxxxxxxxx', '217938321978', 'Subagiyah', 'Sujono', 'Mojo', '2021-06-04 13:03:01.643963', 'Sleman', 'perawatan', ''),
(37, 'e200002027160173044095dexxxxxxxxx', '217938321978', 'Subagiyah', 'Sujono', 'Mojo', '2021-06-04 13:03:01.690069', 'Sleman', 'perawatan', ''),
(38, 'e200002027ssssssssssssssssssssssss', '1111111111111', 'Solipah Rudlov Marklovic', 'Suminten', 'jennifer', '2021-06-04 13:06:44.183176', 'bantul, jogjakarta', 'perawatan', ''),
(39, 'xxxxxxxxxxxxxxxxxx', '111111111111111111', 'Solipah Rodlov Marklovic', 'Marpuah', 'gruh soekarno', '2021-06-04 13:08:36.397251', '123123', 'perawatan', ''),
(40, 'e200002027160173044095de', '123123', 'rahma', 'Maryam', 'kali', '2021-06-07 16:26:18.258495', 'Keputih', 'perawatan', '');

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan1_asetbarang`
--
DROP TABLE IF EXISTS `tb_hasilscan1_asetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan1_asetbarang`  AS SELECT `tb_scanner1_assetbarang`.`nama_alat` AS `nama_alat`, max(`tb_scanner1_assetbarang`.`timestamp`) AS `timestamp`, `tb_scanner1_assetbarang`.`rfid_uid` AS `rfid_uid`, `tb_scanner1_assetbarang`.`deskripsi` AS `deskripsi`, `tb_scanner1_assetbarang`.`penanggung_jawab` AS `penanggung_jawab`, `tb_scanner1_assetbarang`.`status_asset` AS `status_asset`, `tb_scanner1_assetbarang`.`peminjam` AS `peminjam`, count(0) AS `jumlah` FROM `tb_scanner1_assetbarang` GROUP BY `tb_scanner1_assetbarang`.`nama_alat` ORDER BY max(`tb_scanner1_assetbarang`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan1_asetbayi`
--
DROP TABLE IF EXISTS `tb_hasilscan1_asetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan1_asetbayi`  AS SELECT `tb_scanner1_assetbayi`.`nama_anak` AS `nama_anak`, `tb_scanner1_assetbayi`.`rfid_uid` AS `rfid_uid`, `tb_scanner1_assetbayi`.`id_pengenal` AS `id_pengenal`, `tb_scanner1_assetbayi`.`nama_ibu` AS `nama_ibu`, `tb_scanner1_assetbayi`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_scanner1_assetbayi`.`alamat` AS `alamat`, `tb_scanner1_assetbayi`.`status` AS `status`, max(`tb_scanner1_assetbayi`.`timestamp`) AS `timestamp`, count(0) AS `jumlah` FROM `tb_scanner1_assetbayi` GROUP BY `tb_scanner1_assetbayi`.`nama_anak` ORDER BY max(`tb_scanner1_assetbayi`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan2_asetbarang`
--
DROP TABLE IF EXISTS `tb_hasilscan2_asetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan2_asetbarang`  AS SELECT `tb_scanner2_assetbarang`.`nama_alat` AS `nama_alat`, max(`tb_scanner2_assetbarang`.`timestamp`) AS `timestamp`, `tb_scanner2_assetbarang`.`rfid_uid` AS `rfid_uid`, `tb_scanner2_assetbarang`.`deskripsi` AS `deskripsi`, `tb_scanner2_assetbarang`.`penanggung_jawab` AS `penanggung_jawab`, `tb_scanner2_assetbarang`.`status_asset` AS `status_asset`, `tb_scanner2_assetbarang`.`peminjam` AS `peminjam`, count(0) AS `jumlah` FROM `tb_scanner2_assetbarang` GROUP BY `tb_scanner2_assetbarang`.`nama_alat` ORDER BY max(`tb_scanner2_assetbarang`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan2_asetbayi`
--
DROP TABLE IF EXISTS `tb_hasilscan2_asetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan2_asetbayi`  AS SELECT `tb_scanner2_assetbayi`.`nama_anak` AS `nama_anak`, `tb_scanner2_assetbayi`.`rfid_uid` AS `rfid_uid`, `tb_scanner2_assetbayi`.`id_pengenal` AS `id_pengenal`, `tb_scanner2_assetbayi`.`nama_ibu` AS `nama_ibu`, `tb_scanner2_assetbayi`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_scanner2_assetbayi`.`alamat` AS `alamat`, `tb_scanner2_assetbayi`.`status` AS `status`, max(`tb_scanner2_assetbayi`.`timestamp`) AS `timestamp`, count(0) AS `jumlah` FROM `tb_scanner2_assetbayi` GROUP BY `tb_scanner2_assetbayi`.`nama_anak` ORDER BY max(`tb_scanner2_assetbayi`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner1_assetbarang`
--
DROP TABLE IF EXISTS `tb_scanner1_assetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner1_assetbarang`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_rfid`.`nama_alat` AS `nama_alat`, `tb_rfid`.`deskripsi` AS `deskripsi`, `tb_rfid`.`penanggung_jawab` AS `penanggung_jawab`, `tb_rfid`.`status_asset` AS `status_asset`, `tb_rfid`.`peminjam` AS `peminjam`, `tb_reader_scan`.`timestamp` AS `timestamp` FROM (`tb_reader_scan` join `tb_rfid` on(`tb_reader_scan`.`rfid_uid` = `tb_rfid`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner1_assetbayi`
--
DROP TABLE IF EXISTS `tb_scanner1_assetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner1_assetbayi`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_stat_anak`.`id_pengenal` AS `id_pengenal`, `tb_stat_anak`.`nama_anak` AS `nama_anak`, `tb_stat_anak`.`nama_ibu` AS `nama_ibu`, `tb_stat_anak`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_stat_anak`.`alamat` AS `alamat`, `tb_stat_anak`.`status` AS `status`, `tb_reader_scan`.`timestamp` AS `timestamp` FROM (`tb_reader_scan` join `tb_stat_anak` on(`tb_reader_scan`.`rfid_uid` = `tb_stat_anak`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner2_assetbarang`
--
DROP TABLE IF EXISTS `tb_scanner2_assetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner2_assetbarang`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_rfid`.`nama_alat` AS `nama_alat`, `tb_rfid`.`deskripsi` AS `deskripsi`, `tb_rfid`.`penanggung_jawab` AS `penanggung_jawab`, `tb_rfid`.`status_asset` AS `status_asset`, `tb_rfid`.`peminjam` AS `peminjam`, `tb_reader_scan2`.`timestamp` AS `timestamp` FROM (`tb_reader_scan2` join `tb_rfid` on(`tb_reader_scan2`.`rfid_uid` = `tb_rfid`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner2_assetbayi`
--
DROP TABLE IF EXISTS `tb_scanner2_assetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mjdr3247_admin`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner2_assetbayi`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_stat_anak`.`id_pengenal` AS `id_pengenal`, `tb_stat_anak`.`nama_anak` AS `nama_anak`, `tb_stat_anak`.`nama_ibu` AS `nama_ibu`, `tb_stat_anak`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_stat_anak`.`alamat` AS `alamat`, `tb_stat_anak`.`status` AS `status`, `tb_reader_scan2`.`timestamp` AS `timestamp` FROM (`tb_reader_scan2` join `tb_stat_anak` on(`tb_reader_scan2`.`rfid_uid` = `tb_stat_anak`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dd_vals`
--
ALTER TABLE `dd_vals`
  ADD UNIQUE KEY `index` (`index`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_area_1`
--
ALTER TABLE `tb_area_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_area_2`
--
ALTER TABLE `tb_area_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_area_3`
--
ALTER TABLE `tb_area_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peta`
--
ALTER TABLE `tb_peta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reader_scan`
--
ALTER TABLE `tb_reader_scan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`rfid_uid`);

--
-- Indexes for table `tb_reader_scan2`
--
ALTER TABLE `tb_reader_scan2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`rfid_uid`);

--
-- Indexes for table `tb_rfid`
--
ALTER TABLE `tb_rfid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`rfid_uid`),
  ADD KEY `nama_alat` (`nama_alat`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_area_1`
--
ALTER TABLE `tb_area_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_area_2`
--
ALTER TABLE `tb_area_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_area_3`
--
ALTER TABLE `tb_area_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1385;

--
-- AUTO_INCREMENT for table `tb_peta`
--
ALTER TABLE `tb_peta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_reader_scan`
--
ALTER TABLE `tb_reader_scan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15032;

--
-- AUTO_INCREMENT for table `tb_reader_scan2`
--
ALTER TABLE `tb_reader_scan2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16848;

--
-- AUTO_INCREMENT for table `tb_rfid`
--
ALTER TABLE `tb_rfid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_stat_anak`
--
ALTER TABLE `tb_stat_anak`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
