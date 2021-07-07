-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 03:22 AM
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
(472, '00000000000', '2021-06-28 10:01:15.654596', ' ', 0, 0, 0, 0);

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
(267, '2021-07-03 11:17:28.900868', '', '', 30, 10, 5, 0);

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
(22871, '2021-06-28 10:01:18.491445', '00000000000', ' ', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id` int(100) NOT NULL,
  `rfid_uid` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  `jenis_kelamin_dokter` varchar(100) NOT NULL,
  `alamat_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil2_dokter`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil2_dokter` (
`rfid_uid` varchar(30)
,`nama_dokter` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil2_karyawannonmedis`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil2_karyawannonmedis` (
`rfid_uid` varchar(30)
,`nama_karyawan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil2_medicalequipment`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil2_medicalequipment` (
`rfid_uid` varchar(30)
,`nama_alat` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil2_pasienbayi`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil2_pasienbayi` (
`rfid_uid` varchar(30)
,`nama_anak` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil2_pasiendewasa`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil2_pasiendewasa` (
`rfid_uid` varchar(30)
,`nama_pasien` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil2_perawat`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil2_perawat` (
`rfid_uid` varchar(30)
,`nama_perawat` varchar(100)
);

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
-- Stand-in structure for view `tb_hasil_dokter`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil_dokter` (
`rfid_uid` varchar(100)
,`nama_dokter` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil_karyawannonmedis`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil_karyawannonmedis` (
`rfid_uid` varchar(100)
,`nama_karyawan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil_medicalequipment`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil_medicalequipment` (
`rfid_uid` varchar(100)
,`nama_alat` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil_pasienbayi`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil_pasienbayi` (
`rfid_uid` varchar(100)
,`nama_anak` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil_pasiendewasa`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil_pasiendewasa` (
`rfid_uid` varchar(100)
,`nama_pasien` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_pemeriksaan`
--

CREATE TABLE `tb_hasil_pemeriksaan` (
  `rfid_uid` varchar(100) NOT NULL,
  `tipe_penyakit` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `rekomendasi_obat` varchar(100) NOT NULL,
  `tindakan` int(11) NOT NULL,
  `tingkat_keparahan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_hasil_perawat`
-- (See below for the actual view)
--
CREATE TABLE `tb_hasil_perawat` (
`rfid_uid` varchar(100)
,`nama_perawat` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `nama` int(11) NOT NULL,
  `jenis_ruangan` int(11) NOT NULL,
  `kelas_ruangan` int(11) NOT NULL,
  `kategori_pasien` int(11) NOT NULL,
  `kapasitas_ruangan` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_non_medis`
--

CREATE TABLE `tb_non_medis` (
  `id` int(100) NOT NULL,
  `rfid_uid` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `id_pengenal` varchar(100) NOT NULL,
  `usia` int(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien_dewasa`
--

CREATE TABLE `tb_pasien_dewasa` (
  `id` int(50) NOT NULL,
  `rfid_uid` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `id_pengenal` varchar(50) NOT NULL,
  `usia` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tinggi_badan` int(100) NOT NULL,
  `berat_badan` int(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien_rawat_inap`
--

CREATE TABLE `tb_pasien_rawat_inap` (
  `nama` varchar(100) NOT NULL,
  `id_kasur` varchar(100) NOT NULL,
  `nama_ruangan_perawatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_perawat`
--

CREATE TABLE `tb_perawat` (
  `id` int(100) NOT NULL,
  `rfid_uid` varchar(100) NOT NULL,
  `nama_perawat` varchar(100) NOT NULL,
  `id_perawat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nama` varchar(100) NOT NULL,
  `reader_id` varchar(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reader_scan`
--

INSERT INTO `tb_reader_scan` (`id`, `rfid_uid`, `nama`, `reader_id`, `timestamp`) VALUES
(1, 'E20000202016019804409101', 'putri', '7/', '0000-00-00 00:00:00'),
(2, 'E20000202016019804409102', 'putra', '7/', '0000-00-00 00:00:00'),
(3, 'E20000202016019804409103', 'gina', '7/', '0000-00-00 00:00:00'),
(4, 'E20000202016019804409104', 'devi', '7/', '0000-00-00 00:00:00'),
(5, 'E20000202016019804409105', 'sani', '7/', '0000-00-00 00:00:00'),
(6, 'E20000202016019804409106', 'ahmad', '7/', '0000-00-00 00:00:00'),
(7, 'E20000202016019804409107', 'adi', '7/', '0000-00-00 00:00:00'),
(8, 'E20000202016019804409108', 'budi', '7/', '0000-00-00 00:00:00'),
(9, 'E20000202016019804409109', 'ari', '7/', '0000-00-00 00:00:00'),
(10, 'E20000202016019804409110', 'aji', '7/', '0000-00-00 00:00:00'),
(11, 'E20000202016019804409111', 'tino', '7/', '0000-00-00 00:00:00'),
(12, 'E20000202016019804409112', 'toni ', '7/', '0000-00-00 00:00:00'),
(13, 'E20000202016019804409113', 'fika', '7/', '0000-00-00 00:00:00'),
(14, 'E20000202016019804409114', 'cassandra', '7/', '0000-00-00 00:00:00'),
(15, 'E20000202016019804409115', 'jihyo', '7/', '0000-00-00 00:00:00'),
(16, 'E20000202016019804409116', 'jeongyeon', '7/', '0000-00-00 00:00:00'),
(17, 'E20000202016019804409117', 'tzuyu', '7/', '0000-00-00 00:00:00'),
(18, 'E20000202016019804409118', 'nayeon', '7/', '0000-00-00 00:00:00'),
(19, 'E20000202016019804409119', 'mina', '7/', '0000-00-00 00:00:00'),
(20, 'E20000202016019804409120', 'dahyun', '7/', '0000-00-00 00:00:00'),
(18020, 'rfid_uid', 'nama_anak', 'ti', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reader_scan2`
--

CREATE TABLE `tb_reader_scan2` (
  `id` int(255) NOT NULL,
  `rfid_uid` varchar(30) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `reader_id` varchar(30) DEFAULT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reader_scan2`
--

INSERT INTO `tb_reader_scan2` (`id`, `rfid_uid`, `nama`, `reader_id`, `timestamp`) VALUES
(1, 'E20000202016019804409101', 'putri', '2', '0000-00-00 00:00:00.000000'),
(2, 'E20000202016019804409102', 'putra', '2', '0000-00-00 00:00:00.000000'),
(3, 'E20000202016019804409103', 'gina', '2', '0000-00-00 00:00:00.000000'),
(4, 'E20000202016019804409104', 'devi', '2', '0000-00-00 00:00:00.000000'),
(5, 'E20000202016019804409105', 'sani', '2', '0000-00-00 00:00:00.000000'),
(6, 'E20000202016019804409106', 'ahmad', '2', '0000-00-00 00:00:00.000000'),
(7, 'E20000202016019804409107', 'adi', '2', '0000-00-00 00:00:00.000000'),
(8, 'E20000202016019804409108', 'budi', '2', '0000-00-00 00:00:00.000000'),
(9, 'E20000202016019804409109', 'ari', '2', '0000-00-00 00:00:00.000000'),
(10, 'E20000202016019804409110', 'aji', '2', '0000-00-00 00:00:00.000000'),
(11, 'E20000202016019804409111', 'tino', '2', '0000-00-00 00:00:00.000000'),
(12, 'E20000202016019804409112', 'toni ', '2', '0000-00-00 00:00:00.000000'),
(13, 'E20000202016019804409113', 'fika', '2', '0000-00-00 00:00:00.000000'),
(14, 'E20000202016019804409114', 'cassandra', '2', '0000-00-00 00:00:00.000000'),
(15, 'E20000202016019804409115', 'jihyo', '2', '0000-00-00 00:00:00.000000'),
(16, 'E20000202016019804409116', 'jeongyeon', '2', '0000-00-00 00:00:00.000000'),
(17, 'E20000202016019804409117', 'tzuyu', '2', '0000-00-00 00:00:00.000000'),
(18, 'E20000202016019804409118', 'nayeon', '2', '0000-00-00 00:00:00.000000'),
(19, 'E20000202016019804409119', 'mina', '2', '0000-00-00 00:00:00.000000'),
(20, 'E20000202016019804409120', 'dahyun', '2', '0000-00-00 00:00:00.000000'),
(19517, 'rfid_uid', 'nama_anak', 'reader_id', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id` int(100) NOT NULL,
  `rfid_uid` varchar(100) NOT NULL,
  `time_stamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id`, `rfid_uid`, `time_stamp`, `status`) VALUES
(1, 'E20000202016019804409101', '0000-00-00 00:00:00.000000', '1'),
(2, 'E20000202016019804409102', '0000-00-00 00:00:00.000000', '1'),
(3, 'E20000202016019804409103', '0000-00-00 00:00:00.000000', '1'),
(4, 'E20000202016019804409104', '0000-00-00 00:00:00.000000', '1'),
(5, 'E20000202016019804409105', '0000-00-00 00:00:00.000000', '1'),
(6, 'E20000202016019804409106', '0000-00-00 00:00:00.000000', '1'),
(7, 'E20000202016019804409107', '0000-00-00 00:00:00.000000', '1'),
(8, 'E20000202016019804409108', '0000-00-00 00:00:00.000000', '1'),
(9, 'E20000202016019804409109', '0000-00-00 00:00:00.000000', '1'),
(10, 'E20000202016019804409110', '0000-00-00 00:00:00.000000', '1'),
(11, 'E20000202016019804409111', '0000-00-00 00:00:00.000000', '1'),
(12, 'E20000202016019804409112', '0000-00-00 00:00:00.000000', '1'),
(13, 'E20000202016019804409113', '0000-00-00 00:00:00.000000', '1'),
(14, 'E20000202016019804409114', '0000-00-00 00:00:00.000000', '1'),
(15, 'E20000202016019804409115', '0000-00-00 00:00:00.000000', '1'),
(16, 'E20000202016019804409116', '0000-00-00 00:00:00.000000', '1'),
(17, 'E20000202016019804409117', '0000-00-00 00:00:00.000000', '1'),
(18, 'E20000202016019804409118', '0000-00-00 00:00:00.000000', '1'),
(19, 'E20000202016019804409119', '0000-00-00 00:00:00.000000', '1'),
(20, 'E20000202016019804409120', '0000-00-00 00:00:00.000000', '1');

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
(67, 'E20000202716016304408D11', 'kursi roda', 'tempat duduk', '2021-07-03 09:22:28.179721', 'hariyanto', 'tersedia', '', ''),
(68, 'E20000202716015704408452', 'stetoskop', 'alat bantu pemeriksaan', '2021-07-03 09:25:41.244374', 'Dr. Cindy Puri Herdiana', 'tersedia', '', ''),
(71, 'E2000020271601980440AEAF', 'otoskop', 'alat pemeriksa telinga', '2021-07-03 09:34:54.353988', 'Indira Rahardjo', 'tersedia', '', ''),
(72, 'E2000020271601880440A63A', 'Alat EKG', 'Alat pemeriksa Jantung', '2021-07-03 09:55:40.123897', 'Dr. hambali', 'tersedia', '', '');

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
-- Table structure for table `tb_status_kamar`
--

CREATE TABLE `tb_status_kamar` (
  `id_kamar` int(100) NOT NULL,
  `jumlah_pasien` int(100) NOT NULL,
  `kapasitas` int(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'E20000202016019804409101', '111', 'putri', 'fina', 'sri', '0000-00-00 00:00:00.000000', 'jl merak', 'perawatan', ''),
(2, 'E20000202016019804409102', '112', 'putra', 'marfuah', 'rina', '0000-00-00 00:00:00.000000', 'jl puri', 'perawatan', ''),
(3, 'E20000202016019804409103', '113', 'gina', 'sri', 'rani', '0000-00-00 00:00:00.000000', 'jl delima', 'perawatan', ''),
(4, 'E20000202016019804409104', '114', 'devi', 'heni', 'ferry', '0000-00-00 00:00:00.000000', 'jl jambu', 'perawatan', ''),
(5, 'E20000202016019804409105', '115', 'sani', 'hany', 'puji', '0000-00-00 00:00:00.000000', 'jl nanas', 'perawatan', ''),
(6, 'E20000202016019804409106', '116', 'ahmad', 'fitri', 'ana', '0000-00-00 00:00:00.000000', 'jl juwet', 'perawatan', ''),
(7, 'E20000202016019804409107', '117', 'adi', 'fira', 'cinta', '0000-00-00 00:00:00.000000', 'jl rambutan', 'perawatan', ''),
(8, 'E20000202016019804409108', '118', 'budi', 'zubaidah', 'chandra', '0000-00-00 00:00:00.000000', 'jl jawa', 'perawatan', ''),
(9, 'E20000202016019804409109', '119', 'ari', 'siti', 'felly', '0000-00-00 00:00:00.000000', 'jl kalimanta', 'perawatan', ''),
(10, 'E20000202016019804409110', '120', 'aji', 'wati', 'agustin', '0000-00-00 00:00:00.000000', 'jl duku', 'perawatan', ''),
(11, 'E20000202016019804409111', '121', 'tino', 'rosmala', 'dila', '0000-00-00 00:00:00.000000', 'jl kedondong', 'perawatan', ''),
(12, 'E20000202016019804409112', '122', 'toni ', 'anira', 'dini', '0000-00-00 00:00:00.000000', 'jl sulawesi', 'perawatan', ''),
(13, 'E20000202016019804409113', '123', 'fika', 'ani', 'rumi', '0000-00-00 00:00:00.000000', 'jl cempedak', 'perawatan', ''),
(14, 'E20000202016019804409114', '124', 'cassandra', 'nita', 'andin', '0000-00-00 00:00:00.000000', 'jl kelapa', 'perawatan', ''),
(15, 'E20000202016019804409115', '125', 'jihyo', 'mili', 'elsa', '0000-00-00 00:00:00.000000', 'jl srikaya', 'perawatan', ''),
(16, 'E20000202016019804409116', '126', 'jeongyeon', 'dita', 'fifin', '0000-00-00 00:00:00.000000', 'jl langsep', 'perawatan', ''),
(17, 'E20000202016019804409117', '127', 'tzuyu', 'dira', 'sumi', '0000-00-00 00:00:00.000000', 'jl sumatra', 'perawatan', ''),
(18, 'E20000202016019804409118', '128', 'nayeon', 'cindy', 'sinta', '0000-00-00 00:00:00.000000', 'jl kenari', 'perawatan', ''),
(19, 'E20000202016019804409119', '129', 'mina', 'rista', 'anti', '0000-00-00 00:00:00.000000', 'jl kupang', 'perawatan', ''),
(20, 'E20000202016019804409120', '130', 'dahyun', 'tari', 'ina', '0000-00-00 00:00:00.000000', 'jl kupang indah', 'perawatan', ''),
(44, 'E200002027160173044095DE', '123456', 'aji', 'sia', 'sui', '2021-07-04 08:30:28.904604', 'Jl Jambu no 57 RT 007 RW 002 Tambaksari', 'perawatan', ''),
(45, 'rfid_id', 'id_pengenal', 'nama_anak', 'nama_ibu', 'penanggung_jawab_bayi', '0000-00-00 00:00:00.000000', 'alamat', 'status ', 'keterangan');

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil2_dokter`
--
DROP TABLE IF EXISTS `tb_hasil2_dokter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil2_dokter`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_dokter`.`nama_dokter` AS `nama_dokter` FROM (`tb_reader_scan2` left join `tb_dokter` on(`tb_reader_scan2`.`rfid_uid` = `tb_dokter`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil2_karyawannonmedis`
--
DROP TABLE IF EXISTS `tb_hasil2_karyawannonmedis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil2_karyawannonmedis`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_non_medis`.`nama_karyawan` AS `nama_karyawan` FROM (`tb_reader_scan2` join `tb_non_medis` on(`tb_reader_scan2`.`rfid_uid` = `tb_non_medis`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil2_medicalequipment`
--
DROP TABLE IF EXISTS `tb_hasil2_medicalequipment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil2_medicalequipment`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_rfid`.`nama_alat` AS `nama_alat` FROM (`tb_reader_scan2` join `tb_rfid` on(`tb_reader_scan2`.`rfid_uid` = `tb_rfid`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil2_pasienbayi`
--
DROP TABLE IF EXISTS `tb_hasil2_pasienbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil2_pasienbayi`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_stat_anak`.`nama_anak` AS `nama_anak` FROM (`tb_reader_scan2` left join `tb_stat_anak` on(`tb_reader_scan2`.`rfid_uid` = `tb_stat_anak`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil2_pasiendewasa`
--
DROP TABLE IF EXISTS `tb_hasil2_pasiendewasa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil2_pasiendewasa`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_pasien_dewasa`.`nama_pasien` AS `nama_pasien` FROM (`tb_reader_scan2` join `tb_pasien_dewasa` on(`tb_reader_scan2`.`rfid_uid` = `tb_pasien_dewasa`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil2_perawat`
--
DROP TABLE IF EXISTS `tb_hasil2_perawat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil2_perawat`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_perawat`.`nama_perawat` AS `nama_perawat` FROM (`tb_reader_scan2` join `tb_perawat` on(`tb_reader_scan2`.`rfid_uid` = `tb_perawat`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan1_asetbarang`
--
DROP TABLE IF EXISTS `tb_hasilscan1_asetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan1_asetbarang`  AS SELECT `tb_scanner1_assetbarang`.`nama_alat` AS `nama_alat`, max(`tb_scanner1_assetbarang`.`timestamp`) AS `timestamp`, `tb_scanner1_assetbarang`.`rfid_uid` AS `rfid_uid`, `tb_scanner1_assetbarang`.`deskripsi` AS `deskripsi`, `tb_scanner1_assetbarang`.`penanggung_jawab` AS `penanggung_jawab`, `tb_scanner1_assetbarang`.`status_asset` AS `status_asset`, `tb_scanner1_assetbarang`.`peminjam` AS `peminjam`, count(0) AS `jumlah` FROM `tb_scanner1_assetbarang` GROUP BY `tb_scanner1_assetbarang`.`nama_alat` ORDER BY max(`tb_scanner1_assetbarang`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan1_asetbayi`
--
DROP TABLE IF EXISTS `tb_hasilscan1_asetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan1_asetbayi`  AS SELECT `tb_scanner1_assetbayi`.`nama_anak` AS `nama_anak`, `tb_scanner1_assetbayi`.`rfid_uid` AS `rfid_uid`, `tb_scanner1_assetbayi`.`id_pengenal` AS `id_pengenal`, `tb_scanner1_assetbayi`.`nama_ibu` AS `nama_ibu`, `tb_scanner1_assetbayi`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_scanner1_assetbayi`.`alamat` AS `alamat`, `tb_scanner1_assetbayi`.`status` AS `status`, max(`tb_scanner1_assetbayi`.`timestamp`) AS `timestamp`, count(0) AS `jumlah` FROM `tb_scanner1_assetbayi` GROUP BY `tb_scanner1_assetbayi`.`nama_anak` ORDER BY max(`tb_scanner1_assetbayi`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan2_asetbarang`
--
DROP TABLE IF EXISTS `tb_hasilscan2_asetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan2_asetbarang`  AS SELECT `tb_scanner2_assetbarang`.`nama_alat` AS `nama_alat`, max(`tb_scanner2_assetbarang`.`timestamp`) AS `timestamp`, `tb_scanner2_assetbarang`.`rfid_uid` AS `rfid_uid`, `tb_scanner2_assetbarang`.`deskripsi` AS `deskripsi`, `tb_scanner2_assetbarang`.`penanggung_jawab` AS `penanggung_jawab`, `tb_scanner2_assetbarang`.`status_asset` AS `status_asset`, `tb_scanner2_assetbarang`.`peminjam` AS `peminjam`, count(0) AS `jumlah` FROM `tb_scanner2_assetbarang` GROUP BY `tb_scanner2_assetbarang`.`nama_alat` ORDER BY max(`tb_scanner2_assetbarang`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasilscan2_asetbayi`
--
DROP TABLE IF EXISTS `tb_hasilscan2_asetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasilscan2_asetbayi`  AS SELECT `tb_scanner2_assetbayi`.`nama_anak` AS `nama_anak`, `tb_scanner2_assetbayi`.`rfid_uid` AS `rfid_uid`, `tb_scanner2_assetbayi`.`id_pengenal` AS `id_pengenal`, `tb_scanner2_assetbayi`.`nama_ibu` AS `nama_ibu`, `tb_scanner2_assetbayi`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_scanner2_assetbayi`.`alamat` AS `alamat`, `tb_scanner2_assetbayi`.`status` AS `status`, max(`tb_scanner2_assetbayi`.`timestamp`) AS `timestamp`, count(0) AS `jumlah` FROM `tb_scanner2_assetbayi` GROUP BY `tb_scanner2_assetbayi`.`nama_anak` ORDER BY max(`tb_scanner2_assetbayi`.`timestamp`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil_dokter`
--
DROP TABLE IF EXISTS `tb_hasil_dokter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil_dokter`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_dokter`.`nama_dokter` AS `nama_dokter` FROM (`tb_reader_scan` join `tb_dokter` on(`tb_reader_scan`.`rfid_uid` = `tb_dokter`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil_karyawannonmedis`
--
DROP TABLE IF EXISTS `tb_hasil_karyawannonmedis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil_karyawannonmedis`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_non_medis`.`nama_karyawan` AS `nama_karyawan` FROM (`tb_reader_scan` join `tb_non_medis` on(`tb_reader_scan`.`rfid_uid` = `tb_non_medis`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil_medicalequipment`
--
DROP TABLE IF EXISTS `tb_hasil_medicalequipment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil_medicalequipment`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_rfid`.`nama_alat` AS `nama_alat` FROM (`tb_reader_scan` join `tb_rfid` on(`tb_reader_scan`.`rfid_uid` = `tb_rfid`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil_pasienbayi`
--
DROP TABLE IF EXISTS `tb_hasil_pasienbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil_pasienbayi`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_stat_anak`.`nama_anak` AS `nama_anak` FROM (`tb_reader_scan` join `tb_stat_anak` on(`tb_reader_scan`.`rfid_uid` = `tb_stat_anak`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil_pasiendewasa`
--
DROP TABLE IF EXISTS `tb_hasil_pasiendewasa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil_pasiendewasa`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_pasien_dewasa`.`nama_pasien` AS `nama_pasien` FROM (`tb_reader_scan` join `tb_pasien_dewasa` on(`tb_reader_scan`.`rfid_uid` = `tb_pasien_dewasa`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_hasil_perawat`
--
DROP TABLE IF EXISTS `tb_hasil_perawat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_hasil_perawat`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_perawat`.`nama_perawat` AS `nama_perawat` FROM (`tb_reader_scan` join `tb_perawat` on(`tb_reader_scan`.`rfid_uid` = `tb_perawat`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner1_assetbarang`
--
DROP TABLE IF EXISTS `tb_scanner1_assetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner1_assetbarang`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_rfid`.`nama_alat` AS `nama_alat`, `tb_rfid`.`deskripsi` AS `deskripsi`, `tb_rfid`.`penanggung_jawab` AS `penanggung_jawab`, `tb_rfid`.`status_asset` AS `status_asset`, `tb_rfid`.`peminjam` AS `peminjam`, `tb_reader_scan`.`timestamp` AS `timestamp` FROM (`tb_reader_scan` join `tb_rfid` on(`tb_reader_scan`.`rfid_uid` = `tb_rfid`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner1_assetbayi`
--
DROP TABLE IF EXISTS `tb_scanner1_assetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner1_assetbayi`  AS SELECT `tb_reader_scan`.`rfid_uid` AS `rfid_uid`, `tb_stat_anak`.`id_pengenal` AS `id_pengenal`, `tb_stat_anak`.`nama_anak` AS `nama_anak`, `tb_stat_anak`.`nama_ibu` AS `nama_ibu`, `tb_stat_anak`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_stat_anak`.`alamat` AS `alamat`, `tb_stat_anak`.`status` AS `status`, `tb_reader_scan`.`timestamp` AS `timestamp` FROM (`tb_reader_scan` join `tb_stat_anak` on(`tb_reader_scan`.`rfid_uid` = `tb_stat_anak`.`rfid_uid`)) ORDER BY `tb_reader_scan`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner2_assetbarang`
--
DROP TABLE IF EXISTS `tb_scanner2_assetbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner2_assetbarang`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_rfid`.`nama_alat` AS `nama_alat`, `tb_rfid`.`deskripsi` AS `deskripsi`, `tb_rfid`.`penanggung_jawab` AS `penanggung_jawab`, `tb_rfid`.`status_asset` AS `status_asset`, `tb_rfid`.`peminjam` AS `peminjam`, `tb_reader_scan2`.`timestamp` AS `timestamp` FROM (`tb_reader_scan2` join `tb_rfid` on(`tb_reader_scan2`.`rfid_uid` = `tb_rfid`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `tb_scanner2_assetbayi`
--
DROP TABLE IF EXISTS `tb_scanner2_assetbayi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_scanner2_assetbayi`  AS SELECT `tb_reader_scan2`.`rfid_uid` AS `rfid_uid`, `tb_stat_anak`.`id_pengenal` AS `id_pengenal`, `tb_stat_anak`.`nama_anak` AS `nama_anak`, `tb_stat_anak`.`nama_ibu` AS `nama_ibu`, `tb_stat_anak`.`penanggung_jawab_bayi` AS `penanggung_jawab_bayi`, `tb_stat_anak`.`alamat` AS `alamat`, `tb_stat_anak`.`status` AS `status`, `tb_reader_scan2`.`timestamp` AS `timestamp` FROM (`tb_reader_scan2` join `tb_stat_anak` on(`tb_reader_scan2`.`rfid_uid` = `tb_stat_anak`.`rfid_uid`)) ORDER BY `tb_reader_scan2`.`rfid_uid` ASC ;

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
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_non_medis`
--
ALTER TABLE `tb_non_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pasien_dewasa`
--
ALTER TABLE `tb_pasien_dewasa`
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
-- Indexes for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT for table `tb_area_2`
--
ALTER TABLE `tb_area_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `tb_area_3`
--
ALTER TABLE `tb_area_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22872;

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_non_medis`
--
ALTER TABLE `tb_non_medis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_peta`
--
ALTER TABLE `tb_peta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_reader_scan`
--
ALTER TABLE `tb_reader_scan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18021;

--
-- AUTO_INCREMENT for table `tb_reader_scan2`
--
ALTER TABLE `tb_reader_scan2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19518;

--
-- AUTO_INCREMENT for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT for table `tb_rfid`
--
ALTER TABLE `tb_rfid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_stat_anak`
--
ALTER TABLE `tb_stat_anak`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
