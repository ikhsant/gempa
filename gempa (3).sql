-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 02:01 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gempa`
--

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE `asuransi` (
  `id_asuransi` int(11) NOT NULL,
  `gempa` varchar(255) NOT NULL,
  `jenis_asuransi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asuransi`
--

INSERT INTO `asuransi` (`id_asuransi`, `gempa`, `jenis_asuransi`, `jumlah`) VALUES
(5, '14', '1', 350),
(6, '14', '2', 500),
(7, '14', '3', 450);

-- --------------------------------------------------------

--
-- Table structure for table `gempa`
--

CREATE TABLE `gempa` (
  `id_gempa` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `lintang` varchar(255) NOT NULL,
  `bujur` varchar(255) NOT NULL,
  `magnitudo` varchar(255) NOT NULL,
  `kedalaman` varchar(255) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gempa`
--

INSERT INTO `gempa` (`id_gempa`, `waktu`, `lintang`, `bujur`, `magnitudo`, `kedalaman`, `wilayah`, `keterangan`) VALUES
(3, '2018-09-17 17:30:00', '-1.43', '120.21', '5.1', '10 Km', '36 km Tenggara SIGI-SULTENG', ''),
(4, '2018-09-14 14:40:00', '-1.85', '120.57', '5.1', '102 Km', '54 km BaratDaya POSO-SULTENG', ''),
(5, '2018-09-09 09:32:00', '-1.49', '120.04', '5.4', '10 Km', '21 km Tenggara SIGI-SULTENG', ''),
(6, '2018-09-04 04:24:00', '-1.52', '120.16', '5.5', '10 Km', '34 km Tenggara SIGI-SULTENG', ''),
(7, '2018-09-21 21:26:00', '0.03', '119.54', '5.4', '10 Km', '60 km BaratLaut DONGGALA-SULTENG', ''),
(8, '2018-09-20 20:35:00', '0.15', '119.62', '5.8', '10 Km', '68 km BaratLaut DONGGALA-SULTENG', ''),
(9, '2018-09-19 19:27:00', '-0.49', '120.28', '5', '10 Km', '50 km Tenggara DONGGALA-SULTENG', ''),
(10, '2018-09-18 18:06:00', '-1.56', '119.95', '5.4', '10 Km', '18 km Tenggara SIGI-SULTENG', ''),
(11, '2018-09-17 17:50:00', '-0.76', '120.04', '5.9', '10 Km', '23 km TimurLaut PALU-SULTENG', ''),
(12, '2018-09-17 17:47:00', '-0.46', '119.91', '5', '10 Km', '9 km Tenggara DONGGALA-SULTENG', ''),
(13, '2018-09-17 17:39:00', '-0.54', '119.86', '5.5', '11 Km', '13 km Tenggara DONGGALA-SULTENG', ''),
(14, '2018-09-17 17:02:00', '-0.2', '119.89', '7.4', '11 Km', '25 km TimurLaut DONGGALA-SULTENG', 'Tsunami'),
(15, '2018-09-17 17:25:00', '-0.93', '119.99', '5.9', '10 Km', '12 km Tenggara PALU-SULTENG', 'Tsunami'),
(16, '2018-09-17 17:14:00', '0.09', '119.94', '6.1', '10 Km', '58 km TimurLaut DONGGALA-SULTENG', 'Tsunami'),
(17, '2018-09-17 17:02:00', '-0.18', '119.85', '7.7', '10 Km', '27 km TimurLaut DONGGALA-SULTENG', 'Tsunami'),
(18, '2018-09-15 15:25:00', '-0.35', '119.91', '5.3', '10 Km', '11 km TimurLaut DONGGALA-SULTENG', ''),
(19, '2018-09-14 14:28:00', '-0.34', '119.87', '5', '10 Km', '10 km TimurLaut DONGGALA-SULTENG', ''),
(20, '2018-09-14 14:00:00', '-0.35', '119.82', '5.9', '10 Km', '8 km BaratLaut DONGGALA-SULTENG', ''),
(21, '2018-09-12 12:29:00', '-7.01', '131.33', '5.5', '106 Km', '63 km BaratLaut MALUKUTENGGARABRT', ''),
(22, '2018-09-00 00:51:00', '4.59', '97.85', '5.3', '10 Km', '17 km BaratLaut KOTA-LANGSA-ACEH', ''),
(23, '2018-09-16 16:27:00', '-0.91', '133.01', '5.4', '20 Km', '69 km Tenggara TAMBRAUW-PAPUABRT', ''),
(24, '2018-09-01 01:29:00', '-5.41', '142.25', '5', '88 Km', '215 km Tenggara PEG-BINTANG-PAPUA', ''),
(25, '2018-09-10 10:09:00', '0.51', '126.3', '5', '10 Km', '123 km BaratDaya TERNATE-MALUT', ''),
(26, '2018-09-02 02:16:00', '-6.82', '130.64', '5', '84 Km', '112 km BaratLaut MALUKUTENGGARABRT', ''),
(27, '2018-09-16 16:58:00', '-4.36', '138.67', '5', '198 Km', '42 km BaratDaya JAYAWIJAYA-PAPUA', ''),
(28, '2018-09-06 06:20:00', '-0.83', '119.83', '5.1', '10 Km', '9 km BaratLaut PALU-SULTENG', ''),
(29, '2018-09-09 09:36:00', '4.32', '127.64', '5', '126 Km', '107 km TimurLaut KEP-TALAUD-SULUT', ''),
(30, '2018-09-13 13:54:00', '-4.91', '102.93', '5.1', '10 Km', '57 km BaratDaya KAUR-BENGKULU', ''),
(31, '2018-09-22 22:50:00', '-2.52', '139.05', '5.9', '112 Km', '17 km BaratDaya SARMI-PAPUA', ''),
(32, '2018-09-14 14:51:00', '6.88', '94.28', '5.5', '126 Km', '161 km BaratLaut KOTA-SABANG-ACEH', ''),
(33, '2018-09-14 14:27:00', '-5.43', '102.22', '5.5', '44 Km', '152 km BaratDaya BENGKULUSELATAN', ''),
(34, '2018-09-03 03:22:00', '-8.41', '116.52', '5.3', '10 Km', '12 km BaratLaut LOMBOKTIMUR-NTB', ''),
(35, '2018-09-10 10:50:00', '-8.18', '116.6', '5', '11 Km', '37 km TimurLaut LOMBOKTIMUR-NTB', ''),
(36, '2018-09-03 03:18:00', '2.38', '96.06', '5.1', '27 Km', '29 km Tenggara KAB-SIMEULUE-ACEH', ''),
(37, '2018-09-03 03:44:00', '2.57', '125.06', '5.9', '189 Km', '46 km BaratLaut SIAUTAGULANDANGBIARO-SULUT', ''),
(38, '2018-09-00 00:14:00', '-8.21', '116.67', '5', '10 Km', '35 km TimurLaut LOMBOKTIMUR-NTB', ''),
(39, '2018-09-13 13:43:00', '-8.28', '116.97', '5.1', '10 Km', '15 km BaratLaut P.SARINGI-NTB', ''),
(40, '2018-09-07 07:13:00', '0.71', '96.78', '5.3', '14 Km', '84 km BaratDaya NIASBARAT-SUMUT', ''),
(41, '2018-09-11 11:11:00', '-5.61', '131.05', '5.5', '138 Km', '186 km BaratLaut MALUKUTENGGARA', ''),
(42, '2018-09-07 07:15:00', '-8.05', '116.4', '5.3', '14 Km', '38 km TimurLaut LOMBOKUTARA-NTB', ''),
(43, '2018-08-09 09:37:00', '-8.37', '116.06', '5.1', '10 Km', '23 km BaratLaut MATARAM-NTB', ''),
(44, '2018-08-11 11:51:00', '-7.74', '118.76', '5', '10 Km', '80 km TimurLaut BIMA-NTB', ''),
(45, '2018-08-01 01:36:00', '-8.97', '110.23', '5.8', '10 Km', '112 km BaratDaya GUNUNGKIDUL-DIY', ''),
(46, '2018-08-18 18:55:00', '-10.94', '124.16', '5.1', '10 Km', '104 km Tenggara KUPANG-NTT', ''),
(47, '2018-08-14 14:13:00', '-10.99', '124.09', '5.8', '10 Km', '105 km Tenggara KUPANG-NTT', ''),
(48, '2018-08-14 14:08:00', '-10.96', '124.16', '6.2', '10 Km', '106 km Tenggara KUPANG-NTT', ''),
(49, '2018-08-21 21:33:00', '-2.91', '136.92', '5.3', '74 Km', '28 km Tenggara WAROPEN-PAPUA', ''),
(50, '2018-08-10 10:53:00', '-7.59', '117.3', '5.1', '10 Km', '118 km BaratLaut SUMBAWA-NTB', ''),
(51, '2018-08-01 01:33:00', '-8.47', '116.93', '5.6', '10 Km', '41 km TimurLaut LOMBOKTIMUR-NTB', ''),
(52, '2018-08-10 10:44:00', '-6.51', '103.44', '5.5', '10 Km', '156 km BaratDaya PESISIRBARAT-LAMPUNG', ''),
(53, '2018-08-05 05:48:00', '-9.48', '114.75', '5.1', '68 Km', '103 km BaratDaya DENPASAR-BALI', ''),
(54, '2018-08-21 21:50:00', '-8.15', '116.82', '5.1', '10 Km', '49 km TimurLaut LOMBOKTIMUR-NTB', ''),
(55, '2018-08-08 08:09:00', '-8.44', '116.94', '5.1', '10 Km', '42 km TimurLaut LOMBOKTIMUR-NTB', ''),
(56, '2018-08-17 17:51:00', '0.98', '97.35', '5.1', '17 Km', '14 km BaratDaya NIASBARAT-SUMUT', ''),
(57, '2018-08-17 17:31:00', '-8.22', '116.49', '5', '10 Km', '29 km TimurLaut LOMBOKUTARA-NTB', ''),
(58, '2018-08-08 08:30:00', '-8.27', '116.73', '5.2', '10 Km', '32 km TimurLaut LOMBOKTIMUR-NTB', ''),
(59, '2018-08-04 04:50:00', '-8.6', '116.38', '5.2', '10 Km', '15 km TimurLaut LOMBOKTENGAH-NTB', ''),
(60, '2018-08-04 04:21:00', '-8.34', '116.93', '5', '10 Km', '45 km TimurLaut LOMBOKTIMUR-NTB', ''),
(61, '2018-08-01 01:23:00', '-8.34', '116.9', '5.2', '10 Km', '42 km TimurLaut LOMBOKTIMUR-NTB', ''),
(62, '2018-08-23 23:37:00', '-8.25', '116.84', '5.5', '10 Km', '42 km TimurLaut LOMBOKTIMUR-NTB', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_asuransi`
--

CREATE TABLE `jenis_asuransi` (
  `id_jenis_asuransi` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_asuransi`
--

INSERT INTO `jenis_asuransi` (`id_jenis_asuransi`, `nama_jenis`, `biaya`, `keterangan`) VALUES
(1, 'Meninggal Dunia', 50000000, 'Meniggal Dunia'),
(2, 'Luka Ringan', 30000000, 'Luka Ringan'),
(3, 'Rumah Hancur', 1000000, 'Rumah Hancur');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_website`, `logo`, `alamat`, `deskripsi`, `theme`) VALUES
(0, 'Sistem Informasi Gempa', 'globe.png', 'Jl Raya Ciboalang No 21', 'skripsi @2018', 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `akses_level` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama_user`, `jenis_kelamin`, `telp`, `email`, `username`, `password`, `foto`, `akses_level`, `alamat`) VALUES
(1, '123456', 'Ikhsan Thohir', 'L', '085217965569', 'ikhsan@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'bek3zb8yb3ksk48.png', 'admin', ''),
(4, '112233', 'Yusep Endang', 'L', '0812354654', 'yusep@gmial.com', 'petugas1', '2158ff877fab5522711af28b273283033302c577', '8a8xpvd50qgwgo0.png', 'petugas', 'Cibolang No.21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`id_asuransi`);

--
-- Indexes for table `gempa`
--
ALTER TABLE `gempa`
  ADD PRIMARY KEY (`id_gempa`);

--
-- Indexes for table `jenis_asuransi`
--
ALTER TABLE `jenis_asuransi`
  ADD PRIMARY KEY (`id_jenis_asuransi`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `id_asuransi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gempa`
--
ALTER TABLE `gempa`
  MODIFY `id_gempa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `jenis_asuransi`
--
ALTER TABLE `jenis_asuransi`
  MODIFY `id_jenis_asuransi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
