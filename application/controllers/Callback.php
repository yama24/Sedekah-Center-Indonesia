<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callback extends CI_Controller
{
	public function a()
	{


		// include file koneksi database
		$db = $this->load->database();

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
				// pembayaran sukses, lanjutkan proses sesuai sistem Anda, contoh:
				$array = array(
					'status' => $data->status,
					'paid_at' => $data->paid_at
				);
				$this->db->set($array);
				$this->db->where('inv', $data->merchant_ref);
				$sql = $this->db->where('status', "UNPAID");
				$this->db->update('transaksi');
			}
		}

		echo json_encode(['success' => true]); // berikan respon yang sesuai

	}
}
