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
		$data['pekerjaan'] = $this->m_data->get_data('pekerjaan')->result();
		$data['provinces'] = $this->m_data->get_provinsi();

		$apiKey = 'DEV-jdGWqcEiFi3U7YYdSgANI7d1yubL1cgYMPh0zapZ';

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_FRESH_CONNECT     => true,
			CURLOPT_URL               => "https://payment.tripay.co.id/api-sandbox/payment/channel",
			CURLOPT_RETURNTRANSFER    => true,
			CURLOPT_HEADER            => false,
			CURLOPT_HTTPHEADER        => array(
				"Authorization: Bearer " . $apiKey
			),
			CURLOPT_FAILONERROR       => false
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		$data['tripay'] = json_decode($response, true);


		$this->load->view('frontend/v_homepage', $data);
	}
	function add_ajax_kab($id_prov)
	{
		$query = $this->db->get_where('regencies', array('province_id' => $id_prov));
		$data = "<option value=''>- Select Kabupaten -</option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
		}
		echo $data;
	}

	function add_ajax_kec($id_kab)
	{
		$query = $this->db->get_where('districts', array('regency_id' => $id_kab));
		$data = "<option value=''> - Pilih Kecamatan - </option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
		}
		echo $data;
	}

	function add_ajax_des($id_kec)
	{
		$query = $this->db->get_where('villages', array('district_id' => $id_kec));
		$data = "<option value=''> - Pilih Desa - </option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
		}
		echo $data;
	}

	public function terimakasih()
	{
		$data['links'] = $this->m_data->get_data('links')->result();
		// if ($this->session->userdata('status') != "telah_login_email") {
		// 	redirect(base_url() . '?alert=belum_isi');
		// }
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
			$datainput = date('Y-m-d H:i:s');
			$inv = base_convert(microtime(false), 10, 36);
			$status = "UNPAID";

			$data = array(
				'inv' => $inv,
				'nama' => $nama,
				'phone' => $phone,
				'email' => $email,
				'jumlah' => $jumlah,
				'metode' => $metode,
				'status' => $status,
				'data_input' => $datainput,
			);
			$this->m_data->insert_data($data, 'transaksi');

			$apiKey = 'DEV-jdGWqcEiFi3U7YYdSgANI7d1yubL1cgYMPh0zapZ';
			$privateKey = 'kJaqf-bQV3Z-G6ssJ-O23dh-KD9QB';
			$merchantCode = 'T1197';
			$merchantRef = $inv;
			$amount = 1000000;

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
				'callback_url'      => 'https://sci.test/callback',
				'return_url'        => 'https://sci.test/',
				'expired_time'      => (time() + (24 * 60 * 60)), // 24 jam
				'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
			];

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_FRESH_CONNECT     => true,
				CURLOPT_URL               => "https://payment.tripay.co.id/api-sandbox/transaction/create",
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

			redirect($cekout->data->checkout_url);
			

			// echo !empty($err) ? $err : $response;


			// $where = array(
			// 	'pengguna_username' => $email,
			// 	// 'pengguna_password' => "email",
			// 	// 'pengguna_status' => 2
			// );
			// $this->load->model('m_data');
			// $data = $this->m_data->cek_login('pengguna', $where)->row();

			// $data_session = array(
			// 'id' => $data->pengguna_id,
			// 'username' => $data->pengguna_username,
			// 'name' => $nama,
			// 'email' => $email,
			// 'phone' => $email,
			// 'photo' => $data->pengguna_foto,
			// 'level' => $data->pengguna_level,
			// 	'status' =>
			// 	'telah_login_email'
			// );
			// $this->session->set_userdata($data_session);
			// $data['user'] = $nama;
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
			// redirect(base_url() . 'welcome/terimakasih');
		} else {
			// Ini tak terpakai
			redirect(base_url() . '?alert=isiulang');
		}
	}
}
