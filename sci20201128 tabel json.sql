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

-- membuang struktur untuk table sci.json
CREATE TABLE IF NOT EXISTS `json` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv` text NOT NULL,
  `json` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sci.json: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `json` DISABLE KEYS */;
INSERT INTO `json` (`id`, `inv`, `json`) VALUES
	(1, '469rd3chks85', '{"data": {"fee": 7750, "amount": 1000000, "qr_url": "https://payment.tripay.co.id/qr/T11980000203861DXQDU", "status": "UNPAID", "pay_url": null, "pay_code": null, "qr_string": "00020101021226760024ID.CO.SPEEDCASH.MERCHANT01189360081530000919840215ID10200394207540303UKE51440014ID.CO.QRIS.WWW0215ID10200398366110303UKE520454995303360540710000005802ID5925P-STORE.NET - SEDEKAH CEN6005NGAWI6105632636228010747078520506D738610703A016304A9F9", "reference": "T11980000203861DXQDU", "return_url": "http://sci.test/", "order_items": [{"sku": null, "name": "Donasi", "price": 1000000, "quantity": 1, "subtotal": 1000000}], "callback_url": "http://sci.test/callback/a", "checkout_url": "https://payment.tripay.co.id/checkout/T11980000203861DXQDU", "expired_time": 1606647397, "instructions": [{"steps": ["Masuk ke aplikasi dompet digital Anda yang telah mendukung QRIS", "Pindai/Scan QR Code yang tersedia", "Akan muncul detail transaksi. Pastikan data transaksi sudah sesuai", "Selesaikan proses pembayaran Anda", "Transaksi selesai. Simpan bukti pembayaran Anda"], "title": "Pembayaran via QRIS"}], "merchant_ref": "469rd3chks85", "payment_name": "QRIS", "customer_name": "Yayan Maulana", "customer_email": "blindonusantara@gmail.com", "customer_phone": "081395733034", "payment_method": "QRIS", "amount_received": 992250, "is_customer_fee": 0, "payment_selection_type": "static"}, "message": "Successfully generate transaction", "success": true}');
/*!40000 ALTER TABLE `json` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
