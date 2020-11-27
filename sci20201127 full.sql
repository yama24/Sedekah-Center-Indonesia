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

-- Membuang data untuk tabel sci.basis: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `basis` DISABLE KEYS */;
INSERT INTO `basis` (`basis_id`, `basis_nama`, `basis_ttl`, `basis_tempat_kerja`, `basis_gender`, `basis_pekerjaan`, `basis_provinsi`, `basis_kabupaten`, `basis_kecamatan`, `basis_desa`, `basis_phone`, `basis_email`, `basis_datainput`) VALUES
	(20, 'Abi Fakhri', '2020-11-11', 'iNTERNUSA', 'Pria', 'Ketua Yayasan', '11', '1101', '1101030', '1101030003', 85294030933, 'abifakhrinabhanrabbani@gmail.c', '2020-11-08 17:09:29'),
	(21, 'Yayan Maulana', '1995-07-24', 'Internusa', 'Pria', 'Pengusaha', '32', '3273', '3273110', '3273110003', 8986182128, 'maulana24@live.com', '2020-11-09 08:46:09'),
	(22, 'Teh Javana', '2020-11-09', 'asdasd', 'Pria', 'Pengusaha', '16', '1604', '1604011', '1604011006', 8986565665, 'uchuhanif25@gmail.com', '2020-11-09 08:48:55'),
	(23, 'Afni', '2020-11-17', 'fssds', 'Wanita', 'Ibu Rumah Tangga', '36', '3603', '3603011', '3603011002', 8170123437, '1a@gmail.com', '2020-11-12 14:03:32');
/*!40000 ALTER TABLE `basis` ENABLE KEYS */;

-- membuang struktur untuk table sci.links
CREATE TABLE IF NOT EXISTS `links` (
  `links_id` int(11) NOT NULL AUTO_INCREMENT,
  `links_tipe` text NOT NULL,
  `links_nama` text NOT NULL,
  `links` text NOT NULL,
  PRIMARY KEY (`links_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel sci.links: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` (`links_id`, `links_tipe`, `links_nama`, `links`) VALUES
	(5, 'Whatsapp', 'Vidpro 1', 'https://chat.whatsapp.com/IoVhIYYh6Sb0nbATG7LPKD'),
	(6, 'Whatsapp', 'GROUP HTM 2', 'https://chat.whatsapp.com/GCirMCqhC5sGqhkL3aeCLE');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

-- membuang struktur untuk table sci.linkstype
CREATE TABLE IF NOT EXISTS `linkstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sci.linkstype: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `linkstype` DISABLE KEYS */;
INSERT INTO `linkstype` (`id`, `tipe`) VALUES
	(1, 'Whatsapp'),
	(2, 'Telegram'),
	(3, 'Lainnya');
/*!40000 ALTER TABLE `linkstype` ENABLE KEYS */;

-- membuang struktur untuk table sci.metode_pembayaran
CREATE TABLE IF NOT EXISTS `metode_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sci.metode_pembayaran: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `metode_pembayaran` DISABLE KEYS */;
INSERT INTO `metode_pembayaran` (`id`, `group_id`, `code`, `name`) VALUES
	(1, 1, 'MYBVA', 'Maybank Virtual Account'),
	(2, 1, 'PERMATAVA', 'Permata Virtual Account'),
	(3, 1, 'BNIVA', 'BNI Virtual Account'),
	(4, 1, 'BRIVA', 'BRI Virtual Account'),
	(5, 1, 'MANDIRIVA', 'Mandiri Virtual Account'),
	(6, 4, 'ALFAMART', 'Alfamart'),
	(7, 4, 'ALFAMIDI', 'Alfamidi'),
	(8, 5, 'QRIS', 'QRIS');
/*!40000 ALTER TABLE `metode_pembayaran` ENABLE KEYS */;

-- membuang struktur untuk table sci.pekerjaan
CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `pekerjaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` text NOT NULL,
  PRIMARY KEY (`pekerjaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel sci.pekerjaan: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `pekerjaan` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `pekerjaan` ENABLE KEYS */;

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

-- Membuang data untuk tabel sci.pengguna: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_foto`, `pengguna_level`, `pengguna_status`) VALUES
	(1, 'System', 'maulana24@live.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yama.jpg', 'admin', 1),
	(2, 'User', 'email@email.com', 'email', 'email', 'user.png', 'penulis', 2);
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

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

-- Membuang data untuk tabel sci.transaksi: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id`, `inv`, `reference`, `nama`, `phone`, `email`, `jumlah`, `fee`, `diterima`, `bayar`, `paid_at`, `nama_metode`, `metode`, `pay_code`, `status`, `data_input`) VALUES
	(1, '4u6j60xfaxeu', '', 'Yayan Maulana', 81385410721, 'maulana24@live.com', 123345, 0, 0, 0, 0, '', 'ALFAMART', '', 'UNPAID', '2020-11-13 22:47:50'),
	(2, '2f3za6vfmnd0', '', 'Yayan Maulana', 81385410721, 'maulana24@live.com', 123345, 0, 0, 0, 0, '', 'ALFAMART', '', 'UNPAID', '2020-11-13 22:48:20'),
	(3, '121g3m32ql0f', '', 'Yayan Maulana', 81385410721, 'maulana24@live.com', 123345, 0, 0, 0, 0, '', 'ALFAMART', '', 'UNPAID', '2020-11-13 22:48:47'),
	(4, '2r7t7gcuu3ie', '', 'pasukan new normal', 898665545454, 'extratripoasis@gmail.com', 2000000000, 0, 0, 0, 0, '', 'MANDIRIVA', '', 'UNPAID', '2020-11-13 22:50:30'),
	(5, 'd4k3kkd8vu9', '', 'Yayan Maulana', 8986182128, 'maulana24@live.com', 300000, 0, 0, 0, 0, '', 'MANDIRIVA', '', 'UNPAID', '2020-11-14 18:32:01'),
	(6, '3x405dqn19ok', 'DEV-T119700000022233H3YK', 'Muhammad Alfaraz Ibn Yama', 8986182128, 'yama.alfaraz@gmail.com', 500000, 3750, 496250, 0, 0, 'Permata Virtual Account', 'PERMATAVA', '6650678060', 'UNPAID', '2020-11-14 18:57:56'),
	(7, 'drxysi4kgqg', 'DEV-T11970000002225X1T7R', 'Umar bin Khatab', 8986182128, 'maulana24@live.com', 20000, 3750, 16250, 0, 0, 'Permata Virtual Account', 'PERMATAVA', '8184386026', 'UNPAID', '2020-11-14 20:38:00'),
	(8, '21f00gljb3kz', 'DEV-T11970000002226QPL5L', 'yanto', 8986182128, 'maulana24@live.com', 12000, 834, 11166, 0, 0, 'QRIS', 'QRIS', '9100059087', 'UNPAID', '2020-11-14 20:38:43');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
