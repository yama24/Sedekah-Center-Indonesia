-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2021 at 04:49 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.9

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
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `nama`) VALUES
(1, '1.png'),
(2, '2.png'),
(3, '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `json`
--

CREATE TABLE `json` (
  `id` int(11) NOT NULL,
  `inv` text NOT NULL,
  `json` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `json`
--

INSERT INTO `json` (`id`, `inv`, `json`) VALUES
(1, '469rd3chks85', '{\"data\": {\"fee\": 7750, \"amount\": 1000000, \"qr_url\": \"https://payment.tripay.co.id/qr/T11980000203861DXQDU\", \"status\": \"UNPAID\", \"pay_url\": null, \"pay_code\": null, \"qr_string\": \"00020101021226760024ID.CO.SPEEDCASH.MERCHANT01189360081530000919840215ID10200394207540303UKE51440014ID.CO.QRIS.WWW0215ID10200398366110303UKE520454995303360540710000005802ID5925P-STORE.NET - SEDEKAH CEN6005NGAWI6105632636228010747078520506D738610703A016304A9F9\", \"reference\": \"T11980000203861DXQDU\", \"return_url\": \"http://sci.test/\", \"order_items\": [{\"sku\": null, \"name\": \"Donasi\", \"price\": 1000000, \"quantity\": 1, \"subtotal\": 1000000}], \"callback_url\": \"http://sci.test/callback/a\", \"checkout_url\": \"https://payment.tripay.co.id/checkout/T11980000203861DXQDU\", \"expired_time\": 1606647397, \"instructions\": [{\"steps\": [\"Masuk ke aplikasi dompet digital Anda yang telah mendukung QRIS\", \"Pindai/Scan QR Code yang tersedia\", \"Akan muncul detail transaksi. Pastikan data transaksi sudah sesuai\", \"Selesaikan proses pembayaran Anda\", \"Transaksi selesai. Simpan bukti pembayaran Anda\"], \"title\": \"Pembayaran via QRIS\"}], \"merchant_ref\": \"469rd3chks85\", \"payment_name\": \"QRIS\", \"customer_name\": \"Yayan Maulana\", \"customer_email\": \"blindonusantara@gmail.com\", \"customer_phone\": \"081395733034\", \"payment_method\": \"QRIS\", \"amount_received\": 992250, \"is_customer_fee\": 0, \"payment_selection_type\": \"static\"}, \"message\": \"Successfully generate transaction\", \"success\": true}'),
(2, '43231mnhz7r6', '{\"data\": {\"fee\": 1750, \"amount\": 150000, \"status\": \"UNPAID\", \"pay_url\": null, \"pay_code\": \"578893000149452\", \"reference\": \"T11980000204417PR7GR\", \"return_url\": \"http://sci.test/\", \"order_items\": [{\"sku\": null, \"name\": \"Donasi\", \"price\": 150000, \"quantity\": 1, \"subtotal\": 150000}], \"callback_url\": \"http://sci.test/callback/a\", \"checkout_url\": \"https://payment.tripay.co.id/checkout/T11980000204417PR7GR\", \"expired_time\": 1606697090, \"instructions\": [{\"steps\": [\"Login ke internet banking Bank BRI Anda\", \"Pilih menu <b>Pembayaran</b> lalu klik menu <b>BRIVA</b>\", \"Pilih rekening sumber dan masukkan Kode Bayar (<b>578893000149452</b>) lalu klik <b>Kirim</b>\", \"Detail transaksi akan ditampilkan, pastikan data sudah sesuai\", \"Masukkan kata sandi ibanking lalu klik <b>Request</b> untuk mengirim m-PIN ke nomor HP Anda\", \"Periksa HP Anda dan masukkan m-PIN yang diterima lalu klik <b>Kirim</b>\", \"Transaksi sukses, simpan bukti transaksi Anda\"], \"title\": \"Internet Banking\"}, {\"steps\": [\"Login ke aplikasi BRImo Anda\", \"Pilih menu <b>BRIVA</b>\", \"Pilih sumber dana dan masukkan Nomor Pembayaran (<b>578893000149452</b>) lalu klik <b>Lanjut</b>\", \"Klik <b>Lanjut</b>\", \"Detail transaksi akan ditampilkan, pastikan data sudah sesuai\", \"Klik <b>Konfirmasi</b>\", \"Klik <b>Lanjut</b>\", \"Masukkan kata sandi ibanking Anda\", \"Klik <b>Lanjut</b>\", \"Transaksi sukses, simpan bukti transaksi Anda\"], \"title\": \"Aplikasi BRImo\"}], \"merchant_ref\": \"43231mnhz7r6\", \"payment_name\": \"BRI Virtual Account\", \"customer_name\": \"Yayan Maulana\", \"customer_email\": \"maulana24@live.com\", \"customer_phone\": \"08986182128\", \"payment_method\": \"BRIVA\", \"amount_received\": 148250, \"is_customer_fee\": 0, \"payment_selection_type\": \"static\"}, \"message\": \"Successfully generate transaction\", \"success\": true}'),
(3, '28wleuydeh5j', '{\"data\": {\"fee\": 1100, \"amount\": 50000, \"qr_url\": \"https://payment.tripay.co.id/qr/T11980000204436A14AG\", \"status\": \"UNPAID\", \"pay_url\": null, \"pay_code\": null, \"qr_string\": \"00020101021226760024ID.CO.SPEEDCASH.MERCHANT01189360081530000919840215ID10200394207540303UKE51440014ID.CO.QRIS.WWW0215ID10200398366110303UKE5204549953033605405500005802ID5925P-STORE.NET - SEDEKAH CEN6005NGAWI6105632636228010747117660506D741980703A016304D587\", \"reference\": \"T11980000204436A14AG\", \"return_url\": \"http://sci.test/\", \"order_items\": [{\"sku\": null, \"name\": \"Donasi\", \"price\": 50000, \"quantity\": 1, \"subtotal\": 50000}], \"callback_url\": \"http://sci.test/callback/a\", \"checkout_url\": \"https://payment.tripay.co.id/checkout/T11980000204436A14AG\", \"expired_time\": 1606698199, \"instructions\": [{\"steps\": [\"Masuk ke aplikasi dompet digital Anda yang telah mendukung QRIS\", \"Pindai/Scan QR Code yang tersedia\", \"Akan muncul detail transaksi. Pastikan data transaksi sudah sesuai\", \"Selesaikan proses pembayaran Anda\", \"Transaksi selesai. Simpan bukti pembayaran Anda\"], \"title\": \"Pembayaran via QRIS\"}], \"merchant_ref\": \"28wleuydeh5j\", \"payment_name\": \"QRIS\", \"customer_name\": \"Yayan Maulana\", \"customer_email\": \"maulana24@live.com\", \"customer_phone\": \"08986182128\", \"payment_method\": \"QRIS\", \"amount_received\": 48900, \"is_customer_fee\": 0, \"payment_selection_type\": \"static\"}, \"message\": \"Successfully generate transaction\", \"success\": true}'),
(4, '22qr6zu8rwk2', '{\"data\": {\"fee\": 3750, \"amount\": 20000, \"status\": \"UNPAID\", \"pay_url\": null, \"pay_code\": \"8461031213002543\", \"reference\": \"T119800002048575QHAD\", \"return_url\": \"http://sci.test/\", \"order_items\": [{\"sku\": null, \"name\": \"Donasi\", \"price\": 20000, \"quantity\": 1, \"subtotal\": 20000}], \"callback_url\": \"http://sci.test/callback/a\", \"checkout_url\": \"https://payment.tripay.co.id/checkout/T119800002048575QHAD\", \"expired_time\": 1606717202, \"instructions\": [{\"steps\": [\"Login ke internet banking Bank Permata Anda\", \"Pilih menu <b>Pembayaran</b> lalu klik menu <b>Pembayaran Tagihan</b>\", \"Pilih menu <b>Virtual Account</b>\", \"Pilih <b>Rekening Asal</b> lalu centang <b>Masukkan Daftar Tagihan Baru</b>\", \"Masukkan Nomor VA (<b>8461031213002543</b>) lalu klik <b>Lanjutkan</b>\", \"Detail transaksi akan ditampilkan, pastikan data sudah sesuai lalu klik <b>Lanjutkan</b>\", \"Masukkan <b>SMS Token</b> Permata, lalu klik <b>Lanjutkan</b>\", \"Transaksi sukses, simpan bukti transaksi Anda\"], \"title\": \"Internet Banking\"}], \"merchant_ref\": \"22qr6zu8rwk2\", \"payment_name\": \"Permata Virtual Account\", \"customer_name\": \"Yayan Maulana\", \"customer_email\": \"maulana24@live.com\", \"customer_phone\": \"08986182128\", \"payment_method\": \"PERMATAVA\", \"amount_received\": 16250, \"is_customer_fee\": 0, \"payment_selection_type\": \"static\"}, \"message\": \"Successfully generate transaction\", \"success\": true}'),
(5, '2gl6hit38ykw', '{\"data\": {\"fee\": 2750, \"amount\": 100000, \"status\": \"UNPAID\", \"pay_url\": null, \"pay_code\": 9515652782, \"reference\": \"DEV-T11970000002424DRHS6\", \"return_url\": \"https://sci.test/\", \"order_items\": [{\"sku\": null, \"name\": \"Donasi\", \"price\": 100000, \"quantity\": 1, \"subtotal\": 100000}], \"callback_url\": \"https://sci.test/callback/a\", \"checkout_url\": \"https://payment.tripay.co.id/checkout/DEV-T11970000002424DRHS6\", \"expired_time\": 1606957456, \"instructions\": [{\"steps\": [\"Login ke internet banking Anda\", \"Pilih menu <b>Pembayaran</b> lalu klik menu <b>Multipayment</b>\", \"Pilih <b>Penyedia Jasa</b>: <b>WinPay</b>\", \"Masukkan Nomor VA (<b>9515652782</b>)\", \"Masukkan Nominal (<b>100000</b>)\", \"Detail transaksi akan ditampilkan, pastikan data sudah sesuai\", \"Klik tombol </b>Konfirmasi</b>\", \"Periksa aplikasi Mandiri Online di ponsel Anda untuk menyelesaikan persetujuan transaksi\", \"Transaksi sukses, simpan bukti transaksi Anda\"], \"title\": \"Internet Banking\"}, {\"steps\": [\"Masukkan kartu ATM & isi PIN ATM Anda\", \"Pilih menu <b>Bayar/Beli</b> lalu pilih menu <b>Lainnya</b>\", \"Pilih lagi menu <b>Lainnya</b>\", \"Pilih menu <b>Multi Payment</b>\", \"Masukkan kode <b>88898</b> lalu tekan <b>Benar</b>\", \"Masukkan Nomor VA (<b>9515652782</b>)\", \"Detail transaksi akan ditampilkan, pastikan data sudah sesuai\", \"Tekan <b>1</b> lalu tekan <b>YA</b>\", \"Transaksi sukses, simpan bukti transaksi Anda\"], \"title\": \"ATM Mandiri\"}], \"merchant_ref\": \"2gl6hit38ykw\", \"payment_name\": \"Mandiri Virtual Account\", \"customer_name\": \"Muhammad Alfaraz Ibn Yama\", \"customer_email\": \"yama.alfaraz@gmail.com\", \"customer_phone\": \"08986182128\", \"payment_method\": \"MANDIRIVA\", \"amount_received\": 97250, \"is_customer_fee\": 0, \"payment_selection_type\": \"static\"}, \"message\": \"\", \"success\": true}');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id`, `group_id`, `code`, `name`) VALUES
(1, 1, 'MYBVA', 'Maybank Virtual Account'),
(2, 1, 'PERMATAVA', 'Permata Virtual Account'),
(3, 1, 'BNIVA', 'BNI Virtual Account'),
(4, 1, 'BRIVA', 'BRI Virtual Account'),
(5, 1, 'MANDIRIVA', 'Mandiri Virtual Account'),
(6, 1, 'BCAVA', 'BCA Virtual Account'),
(7, 1, 'SMSVA', 'Sinarmas Virtual Account'),
(8, 4, 'ALFAMART', 'Alfamart'),
(9, 4, 'ALFAMIDI', 'Alfamidi'),
(10, 5, 'QRIS', 'QRIS');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_foto`, `pengguna_level`, `pengguna_status`) VALUES
(1, 'System', 'maulana24@live.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yama.jpg', 'admin', 1),
(2, 'User', 'email@email.com', 'email', 'email', 'user.png', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `banner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `banner`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(250) NOT NULL,
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
  `checkout_url` text NOT NULL,
  `status` text NOT NULL,
  `data_input` datetime NOT NULL,
  `input_year` int(11) NOT NULL,
  `input_month` int(11) NOT NULL,
  `input_date` int(11) NOT NULL,
  `input_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `inv`, `reference`, `nama`, `phone`, `email`, `jumlah`, `fee`, `diterima`, `bayar`, `paid_at`, `nama_metode`, `metode`, `checkout_url`, `status`, `data_input`, `input_year`, `input_month`, `input_date`, `input_time`) VALUES
(1, '4u6j60xfaxeu', '', 'Yayan Maulana', 81385410721, 'maulana24@live.com', 123345, 0, 0, 0, 0, '', 'ALFAMART', '', 'UNPAID', '2020-11-13 22:47:50', 2020, 11, 13, '00:00:00'),
(2, '2f3za6vfmnd0', '', 'Yayan Maulana', 81385410721, 'maulana24@live.com', 123345, 0, 0, 0, 0, '', 'ALFAMART', '', 'UNPAID', '2020-11-13 22:48:20', 2020, 11, 13, '00:00:00'),
(3, '121g3m32ql0f', '', 'Yayan Maulana', 81385410721, 'maulana24@live.com', 123345, 0, 0, 0, 0, '', 'ALFAMART', '', 'UNPAID', '2020-11-13 22:48:47', 2020, 11, 13, '00:00:00'),
(4, '2r7t7gcuu3ie', '', 'pasukan new normal', 898665545454, 'extratripoasis@gmail.com', 2000000000, 0, 0, 0, 0, '', 'MANDIRIVA', '', 'UNPAID', '2020-11-13 22:50:30', 2020, 11, 13, '00:00:00'),
(5, 'd4k3kkd8vu9', '', 'Yayan Maulana', 8986182128, 'maulana24@live.com', 300000, 0, 0, 0, 0, '', 'MANDIRIVA', '', 'UNPAID', '2020-11-14 18:32:01', 2020, 11, 14, '00:00:00'),
(6, '3x405dqn19ok', 'DEV-T119700000022233H3YK', 'Muhammad Alfaraz Ibn Yama', 8986182128, 'yama.alfaraz@gmail.com', 500000, 3750, 496250, 0, 0, 'Permata Virtual Account', 'PERMATAVA', '6650678060', 'UNPAID', '2020-11-14 18:57:56', 2020, 11, 14, '00:00:00'),
(7, 'drxysi4kgqg', 'DEV-T11970000002225X1T7R', 'Umar bin Khatab', 8986182128, 'maulana24@live.com', 20000, 3750, 16250, 0, 0, 'Permata Virtual Account', 'PERMATAVA', '8184386026', 'UNPAID', '2020-11-14 20:38:00', 2020, 11, 14, '00:00:00'),
(8, '21f00gljb3kz', 'DEV-T11970000002226QPL5L', 'yanto', 8986182128, 'maulana24@live.com', 12000, 834, 11166, 0, 0, 'QRIS', 'QRIS', '9100059087', 'UNPAID', '2020-11-14 20:38:43', 2020, 11, 14, '00:00:00'),
(9, '53h79fyy1rym', 'DEV-T11970000002338L9TMR', 'Yayan Maulana', 8986182128, 'maulana24@live.com', 123122, 1612, 121510, 0, 0, 'QRIS', 'QRIS', '2549878376', 'UNPAID', '2020-11-27 22:39:58', 2020, 11, 27, '00:00:00'),
(10, '43231mnhz7r6', 'T11980000204417PR7GR', 'Yayan Maulana', 8986182128, 'maulana24@live.com', 150000, 1750, 148250, 0, 0, 'BRI Virtual Account', 'BRIVA', 'https://payment.tripay.co.id/checkout/T11980000204417PR7GR', 'PAID', '2020-11-29 07:44:50', 2020, 11, 29, '00:00:00'),
(11, '28wleuydeh5j', 'T11980000204436A14AG', 'Yayan Maulana', 8986182128, 'maulana24@live.com', 50000, 1100, 48900, 0, 0, 'QRIS', 'QRIS', 'https://payment.tripay.co.id/checkout/T11980000204436A14AG', 'PAID', '2020-11-29 08:03:19', 2020, 11, 29, '00:00:00'),
(12, '22qr6zu8rwk2', 'T119800002048575QHAD', 'Yayan Maulana', 8986182128, 'maulana24@live.com', 20000, 3750, 16250, 0, 0, 'Permata Virtual Account', 'PERMATAVA', 'https://payment.tripay.co.id/checkout/T119800002048575QHAD', 'PAID', '0000-00-00 00:00:00', 2020, 11, 29, '13:20:02'),
(13, '2gl6hit38ykw', 'DEV-T11970000002424DRHS6', 'Muhammad Alfaraz Ibn Yama', 8986182128, 'yama.alfaraz@gmail.com', 100000, 2750, 97250, 0, 0, 'Mandiri Virtual Account', 'MANDIRIVA', 'https://payment.tripay.co.id/checkout/DEV-T11970000002424DRHS6', 'UNPAID', '0000-00-00 00:00:00', 2020, 12, 2, '08:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `json`
--
ALTER TABLE `json`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD UNIQUE KEY `pengguna_username` (`pengguna_username`),
  ADD UNIQUE KEY `pengguna_email` (`pengguna_email`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `json`
--
ALTER TABLE `json`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
