<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callback extends CI_Controller
{
	public function a()
	{
		$privateKey = $this->config->item('private_key');
		// include file koneksi database
		$db = $this->load->database();

		// ambil data JSON
		$json = file_get_contents("php://input");

		// ambil callback signature
		$callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';

		// generate signature untuk dicocokkan dengan X-Callback-Signature
		$signature = hash_hmac('sha256', $json, $privateKey);

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
				$this->db->where('status', "UNPAID");
				$this->db->update('transaksi');

				$apiKey = $this->config->item('api_key');

				$curl = curl_init();

				curl_setopt_array($curl, array(
					CURLOPT_FRESH_CONNECT     => true,
					CURLOPT_URL               => $this->config->item('url_tripay') . "transaction/detail?reference=" . $data->reference,
					CURLOPT_RETURNTRANSFER    => true,
					CURLOPT_HEADER            => false,
					CURLOPT_HTTPHEADER        => array(
						"Authorization: Bearer " . $apiKey
					),
					CURLOPT_FAILONERROR       => false,
					CURLOPT_POST              => false,
				));
	
				$response = curl_exec($curl);
				$err = curl_error($curl);
	
				curl_close($curl);
				$detail = json_decode($response);
	
				$eml['json'] = $json;

				$config['charset'] = 'utf-8';
				$config['smtp_crypto'] = $this->config->item('smtp_crypto');
				$config['protocol'] = 'smtp';
				$config['mailtype'] = 'html';
				$config['smtp_host'] = $this->config->item('host_mail');
				$config['smtp_port'] = $this->config->item('port_mail');
				$config['smtp_timeout'] = '5';
				$config['smtp_user'] = $this->config->item('mail_account');
				$config['smtp_pass'] = $this->config->item('pass_mail');
				$config['crlf'] = "\r\n";
				$config['newline'] = "\r\n";
				$config['wordwrap'] = TRUE;

				$mesg = $this->load->view('email/pembayaran_berhasil.php', $eml, TRUE);
				$this->load->library('email', $config);

				$this->email->from($this->config->item('mail_account'), $this->config->item('app_name'));
				$this->email->to($detail->data->customer_email, $this->config->item('mail_account'));
				$this->email->subject('Terima Kasih Kami Ucapkan');
				$this->email->message($mesg);
				$this->email->send();
			}
			if ($data->status == 'REFUND') {
				// pembayaran sukses, lanjutkan proses sesuai sistem Anda, contoh:
				$array = array(
					'status' => $data->status,
					'paid_at' => $data->paid_at
				);
				$this->db->set($array);
				$this->db->where('inv', $data->merchant_ref);
				// $this->db->where('status', "UNPAID");
				$this->db->update('transaksi');
			}
			if ($data->status == 'EXPIRED') {
				// pembayaran sukses, lanjutkan proses sesuai sistem Anda, contoh:
				$array = array(
					'status' => $data->status,
					'paid_at' => $data->paid_at
				);
				$this->db->set($array);
				$this->db->where('inv', $data->merchant_ref);
				$this->db->where('status', "UNPAID");
				$this->db->update('transaksi');
			}
			if ($data->status == 'FAILED') {
				// pembayaran sukses, lanjutkan proses sesuai sistem Anda, contoh:
				$array = array(
					'status' => $data->status,
					'paid_at' => $data->paid_at
				);
				$this->db->set($array);
				$this->db->where('inv', $data->merchant_ref);
				// $this->db->where('status', "UNPAID");
				$this->db->update('transaksi');
			}
		}

		echo json_encode(['success' => true]); // berikan respon yang sesuai

	}
}
