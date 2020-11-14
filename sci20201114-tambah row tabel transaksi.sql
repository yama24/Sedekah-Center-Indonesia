-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 5.7.24 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table sci.basis
CREATE TABLE IF NOT EXISTS `basis` (
  `basis_id` int(250) NOT NULL AUTO_INCREMENT,
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
  `basis_datainput` datetime NOT NULL,
  PRIMARY KEY (`basis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table sci.links
CREATE TABLE IF NOT EXISTS `links` (
  `links_id` int(11) NOT NULL AUTO_INCREMENT,
  `links_tipe` text NOT NULL,
  `links_nama` text NOT NULL,
  `links` text NOT NULL,
  PRIMARY KEY (`links_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table sci.linkstype
CREATE TABLE IF NOT EXISTS `linkstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table sci.pekerjaan
CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `pekerjaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` text NOT NULL,
  PRIMARY KEY (`pekerjaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table sci.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `pengguna_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_foto` varchar(50) NOT NULL DEFAULT 'user.png',
  `pengguna_level` enum('admin','penulis') NOT NULL,
  `pengguna_status` int(11) NOT NULL,
  PRIMARY KEY (`pengguna_id`),
  UNIQUE KEY `pengguna_username` (`pengguna_username`),
  UNIQUE KEY `pengguna_email` (`pengguna_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table sci.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `inv` text NOT NULL,
  `reference` text NOT NULL,
  `nama` text NOT NULL,
  `phone` double NOT NULL,
  `email` text NOT NULL,
  `jumlah` double NOT NULL,
  `fee` double NOT NULL,
  `diterima` double NOT NULL,
  `bayar` double NOT NULL,
  `paid_at` int(50) NOT NULL,
  `nama_metode` text NOT NULL,
  `metode` text NOT NULL,
  `pay_code` text NOT NULL,
  `status` text NOT NULL,
  `data_input` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
