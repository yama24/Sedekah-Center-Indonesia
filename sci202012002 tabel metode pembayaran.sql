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

-- membuang struktur untuk table sci.metode_pembayaran
CREATE TABLE IF NOT EXISTS `metode_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sci.metode_pembayaran: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `metode_pembayaran` DISABLE KEYS */;
INSERT INTO `metode_pembayaran` (`id`, `group_id`, `code`, `name`) VALUES
	(1, 1, 'MYBVA', 'Maybank Virtual Account'),
	(2, 1, 'PERMATAVA', 'Permata Virtual Account'),
	(3, 1, 'BNIVA', 'BNI Virtual Account'),
	(4, 1, 'BRIVA', 'BRI Virtual Account'),
	(5, 1, 'MANDIRIVA', 'Mandiri Virtual Account'),
	(6, 1, 'BCAVA', 'BCA Virtual Account'),
	(7, 4, 'ALFAMART', 'Alfamart'),
	(8, 4, 'ALFAMIDI', 'Alfamidi'),
	(9, 5, 'QRIS', 'QRIS');
/*!40000 ALTER TABLE `metode_pembayaran` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
