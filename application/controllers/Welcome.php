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
		if ($this->session->userdata('status') != "telah_login_email") {
			redirect(base_url() . '?alert=belum_isi');
		}
		$this->load->view('frontend/v_link', $data);
	}
	public function form_submit()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('phone', 'Nomor Handphone', 'required|is_unique[basis.basis_phone]');
		$this->form_validation->set_rules('jumlah', 'Jumlah Donasi', 'required');
		//PHONE BELUM DI STANDARISASI
		if ($this->form_validation->run() != false) {
			$nama = $this->input->post('nama');
			$phone = $this->input->post('phone');
			$jumlah = $this->input->post('jumlah');
			$datainput = date('Y-m-d H:i:s');

			$data = array(
				'basis_nama' => $nama,
				'basis_phone' => $phone,
				'basis_jumlah' => $jumlah,
				'basis_datainput' => $datainput,
			);
			$this->m_data->insert_data($data, 'basis');
			// $where = array(
			// 	'pengguna_username' => $email,
			// 	// 'pengguna_password' => "email",
			// 	// 'pengguna_status' => 2
			// );
			$this->load->model('m_data');
			// $data = $this->m_data->cek_login('pengguna', $where)->row();

			$data_session = array(
				// 'id' => $data->pengguna_id,
				// 'username' => $data->pengguna_username,
				'name' => $nama,
				'email' => $email,
				'phone' => $email,
				// 'photo' => $data->pengguna_foto,
				// 'level' => $data->pengguna_level,
				'status' =>
				'telah_login_email'
			);
			$this->session->set_userdata($data_session);
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
			redirect(base_url() . 'welcome/terimakasih');
		} else {
			// Ini tak terpakai
			redirect(base_url() . '?alert=isiulang');
		}
	}
}
