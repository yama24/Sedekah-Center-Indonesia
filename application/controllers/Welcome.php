<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('url', 'html'));
		$this->load->model('m_data');
		$this->load->database();
	}
	public function index()
	{
		// $apiKey = $this->config->item('api_key');;

		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// 	CURLOPT_FRESH_CONNECT     => true,
		// 	CURLOPT_URL               => $this->config->item('url_tripay') . "payment/channel",
		// 	CURLOPT_RETURNTRANSFER    => true,
		// 	CURLOPT_HEADER            => false,
		// 	CURLOPT_HTTPHEADER        => array(
		// 		"Authorization: Bearer " . $apiKey
		// 	),
		// 	CURLOPT_FAILONERROR       => false
		// ));

		// $response = curl_exec($curl);
		// $err = curl_error($curl);

		// curl_close($curl);
		// $data['tripay'] = json_decode($response);
		$data['tripay'] = $this->m_data->get_data('metode_pembayaran')->result();


		$this->load->view('frontend/v_homepage', $data);
	}

	public function terimakasih($slug)
	{
		$data['json'] = $this->db->get_where('json', ['inv' => $slug])->row_array();
		if ($this->session->userdata('inv') != $slug) {
			redirect(base_url() . '?alert=belum_isi');
		}
		$this->load->view('frontend/v_link', $data);
	}
	public function form_submit()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('phone', 'Nomor Handphone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Donasi', 'required');
		$this->form_validation->set_rules('metode', 'Metode Pembayaran', 'required');
		//PHONE BELUM DI STANDARISASI
		if ($this->form_validation->run() != false) {
			$nama = $this->input->post('nama');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$jumlah = $this->input->post('jumlah');
			$metode = $this->input->post('metode');
			// $datainput = date('Y-m-d H:i:s');
			$input_year = date('Y');
			$input_month = date('m');
			$input_date = date('d');
			$input_time = date('H:i:s');
			$inv = base_convert(microtime(false), 10, 36);

			$apiKey = $this->config->item('api_key');
			$privateKey = $this->config->item('private_key');
			$merchantCode = $this->config->item('kode_merchant');
			$merchantRef = $inv;
			$amount = $jumlah;

			$data = [
				'method'            => $metode,
				'merchant_ref'      => $merchantRef,
				'amount'            => $amount,
				'customer_name'     => $nama,
				'customer_email'    => $email,
				'customer_phone'    => $phone,
				'order_items'       => [
					[
						// 'sku'       => 'PRODUK1',
						'name'      => 'Donasi',
						'price'     => $amount,
						'quantity'  => 1
					]
				],
				'callback_url'      => base_url('callback/a'),
				'return_url'        => base_url(),
				'expired_time'      => (time() + (24 * 60 * 60)), // 24 jam
				'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_FRESH_CONNECT     => true,
				CURLOPT_URL               => $this->config->item('url_tripay') . "transaction/create",
				CURLOPT_RETURNTRANSFER    => true,
				CURLOPT_HEADER            => false,
				CURLOPT_HTTPHEADER        => array(
					"Authorization: Bearer " . $apiKey
				),
				CURLOPT_FAILONERROR       => false,
				CURLOPT_POST              => true,
				CURLOPT_POSTFIELDS        => http_build_query($data)
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			$cekout = json_decode($response);
			$data = array(
				'inv' => $cekout->data->merchant_ref,
				'reference' => $cekout->data->reference,
				'nama' => $cekout->data->customer_name,
				'phone' => $cekout->data->customer_phone,
				'email' => $cekout->data->customer_email,
				'jumlah' => $cekout->data->amount,
				'fee' => $cekout->data->fee,
				'diterima' => $cekout->data->amount_received,
				'bayar' => $cekout->data->is_customer_fee,
				'nama_metode' => $cekout->data->payment_name,
				'metode' => $cekout->data->payment_method,
				'checkout_url' => $cekout->data->checkout_url,
				'status' => $cekout->data->status,
				'input_year' => $input_year,
				'input_month' => $input_month,
				'input_date' => $input_date,
				'input_time' => $input_time,
			);
			$json = array(
				'inv' => $cekout->data->merchant_ref,
				'json' => $response,
			);
			$this->m_data->insert_data($data, 'transaksi');
			$this->m_data->insert_data($json, 'json');

			$data_session = array(
				'inv' => $cekout->data->merchant_ref,
				'reference' => $cekout->data->reference,
				'nama' => $cekout->data->customer_name,
				'phone' => $cekout->data->customer_phone,
				'email' => $cekout->data->customer_email,
				'jumlah' => $cekout->data->amount,
				'fee' => $cekout->data->fee,
				'diterima' => $cekout->data->amount_received,
				'bayar' => $cekout->data->is_customer_fee,
				'nama_metode' => $cekout->data->payment_name,
				'metode' => $cekout->data->payment_method,
				'checkout_url' => $cekout->data->checkout_url,
				'pay_code' => $cekout->data->pay_code,
				'qr_url' => $cekout->data->qr_url,
				'expired_time' => $cekout->data->expired_time,
				'status' => $cekout->data->status,
				'input_year' => $input_year,
				'input_month' => $input_month,
				'input_date' => $input_date,
				'input_time' => $input_time,
			);
			$this->session->set_userdata($data_session);
			$slug = $cekout->data->merchant_ref;

			// echo !empty($err) ? $err : $response;

			// $config['charset'] = 'utf-8';
			// $config['smtp_crypto'] = $this->config->item('smtp_crypto');
			// $config['protocol'] = 'smtp';
			// $config['mailtype'] = 'html';
			// $config['smtp_host'] = $this->config->item('host_mail');
			// $config['smtp_port'] = $this->config->item('port_mail');
			// $config['smtp_timeout'] = '5';
			// $config['smtp_user'] = $this->config->item('mail_account');
			// $config['smtp_pass'] = $this->config->item('pass_mail');
			// $config['crlf'] = "\r\n";
			// $config['newline'] = "\r\n";
			// $config['wordwrap'] = TRUE;

			// $mesg = $this->load->view('email/notif.php', $data, TRUE);
			// $this->load->library('email', $config);

			// $this->email->from($this->config->item('mail_account'), $this->config->item('app_name'));
			// $this->email->to($email, $this->config->item('mail_account'));
			// $this->email->subject('Notifikasi Input Data');
			// $this->email->message($mesg);
			// $this->email->send();

			redirect(base_url('terimakasih/') . $slug);
		} else {
			// Ini tak terpakai
			redirect(base_url() . '?alert=isiulang');
		}
	}
	public function notfound()
	{
		$this->load->view('404');
	}
}
