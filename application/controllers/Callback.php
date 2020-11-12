<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callback extends CI_Controller
{
	public function index()
	{

		// include file koneksi database
		require('database.php');

		// ambil data JSON
		$json = file_get_contents("php://input");

		// ambil callback signature
		$callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';

		// generate signature untuk dicocokkan dengan X-Callback-Signature
		$signature = hash_hmac('sha256', $json, 'kJaqf-bQV3Z-G6ssJ-O23dh-KD9QB');

		// validasi signature
		if ($callbackSignature !== $signature) {
			exit("Invalid Signature"); // signature tidak valid, hentikan proses
		}

		$data = json_decode($json);
		$event = $_SERVER['HTTP_X_CALLBACK_EVENT'];

		if ($event == 'payment_status') {
			if ($data->status == 'PAID') {
				$merchantRef = $db->real_escape_string($data->merchant_ref);

				// pembayaran sukses, lanjutkan proses sesuai sistem Anda, contoh:
				$sql = "SELECT * FROM transaksi WHERE inv = '" . $merchantRef . "' AND status = 'UNPAID' LIMIT 1";
				if (($getInvoice = $db->query($sql))) {
					while ($invoice = $getInvoice->fetch_object()) {
						$update = "UPDATE transaksi SET status = 'PAID' WHERE id = {$invoice->id}";
						$db->query($update) or die($db->error);
					}
				}
			}
		}

		echo json_encode(['success' => true]); // berikan respon yang sesuai

	}
}
