-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2020 at 06:22 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sci`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis`
--

CREATE TABLE `basis` (
  `basis_id` int(250) NOT NULL,
  `basis_nama` text NOT NULL,
  `basis_ttl` date NOT NULL,
  `basis_tempat_kerja` text NOT NULL,
  `basis_gender` text NOT NULL,
  `basis_pekerjaan` text NOT NULL,
  `basis_provinsi` text NOT NULL,
  `basis_kabupaten` text NOT NULL,
  `basis_kecamatan` text NOT NULL,
  `basis_desa` text NOT NULL,
  `basis_phone` double NOT NULL,
  `basis_email` text NOT NULL,
  `basis_datainput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `basis`
--

INSERT INTO `basis` (`basis_id`, `basis_nama`, `basis_ttl`, `basis_tempat_kerja`, `basis_gender`, `basis_pekerjaan`, `basis_provinsi`, `basis_kabupaten`, `basis_kecamatan`, `basis_desa`, `basis_phone`, `basis_email`, `basis_datainput`) VALUES
(20, 'Abi Fakhri', '2020-11-11', 'iNTERNUSA', 'Pria', 'Ketua Yayasan', '11', '1101', '1101030', '1101030003', 85294030933, 'abifakhrinabhanrabbani@gmail.c', '2020-11-08 17:09:29'),
(21, 'Yayan Maulana', '1995-07-24', 'Internusa', 'Pria', 'Pengusaha', '32', '3273', '3273110', '3273110003', 8986182128, 'maulana24@live.com', '2020-11-09 08:46:09'),
(22, 'Teh Javana', '2020-11-09', 'asdasd', 'Pria', 'Pengusaha', '16', '1604', '1604011', '1604011006', 8986565665, 'uchuhanif25@gmail.com', '2020-11-09 08:48:55'),
(23, 'Afni', '2020-11-17', 'fssds', 'Wanita', 'Ibu Rumah Tangga', '36', '3603', '3603011', '3603011002', 8170123437, '1a@gmail.com', '2020-11-12 14:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `links_id` int(11) NOT NULL,
  `links_tipe` text NOT NULL,
  `links_nama` text NOT NULL,
  `links` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`links_id`, `links_tipe`, `links_nama`, `links`) VALUES
(5, 'Whatsapp', 'Vidpro 1', 'https://chat.whatsapp.com/IoVhIYYh6Sb0nbATG7LPKD'),
(6, 'Whatsapp', 'GROUP HTM 2', 'https://chat.whatsapp.com/GCirMCqhC5sGqhkL3aeCLE');

-- --------------------------------------------------------

--
-- Table structure for table `linkstype`
--

CREATE TABLE `linkstype` (
  `id` int(11) NOT NULL,
  `tipe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linkstype`
--

INSERT INTO `linkstype` (`id`, `tipe`) VALUES
(1, 'Whatsapp'),
(2, 'Telegram'),
(3, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `pekerjaan_id` int(11) NOT NULL,
  `pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`pekerjaan_id`, `pekerjaan`) VALUES
(4, 'Pelajar'),
(5, 'Mahasiswa'),
(6, 'Ibu Rumah Tangga'),
(7, 'PNS'),
(8, 'Guru'),
(9, 'Pengusaha'),
(10, 'Kepala Sekolah'),
(11, 'Karyawan'),
(12, 'Ketua Yayasan');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_foto` varchar(50) NOT NULL DEFAULT 'user.png',
  `pengguna_level` enum('admin','penulis') NOT NULL,
  `pengguna_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_foto`, `pengguna_level`, `pengguna_status`) VALUES
(1, 'System', 'maulana24@live.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yama.jpg', 'admin', 1),
(2, 'User', 'email@email.com', 'email', 'email', 'user.png', 'penulis', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `inv` text NOT NULL,
  `nama` text NOT NULL,
  `phone` double NOT NULL,
  `email` text NOT NULL,
  `jumlah` double NOT NULL,
  `metode` text NOT NULL,
  `status` text NOT NULL,
  `data_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis`
--
ALTER TABLE `basis`
  ADD PRIMARY KEY (`basis_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`links_id`);

--
-- Indexes for table `linkstype`
--
ALTER TABLE `linkstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD UNIQUE KEY `pengguna_username` (`pengguna_username`),
  ADD UNIQUE KEY `pengguna_email` (`pengguna_email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis`
--
ALTER TABLE `basis`
  MODIFY `basis_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `links_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `linkstype`
--
ALTER TABLE `linkstype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pekerjaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
