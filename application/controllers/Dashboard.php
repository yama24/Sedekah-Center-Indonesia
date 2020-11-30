<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_data');
		// cek session yang login,
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "telah_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}
	public function index()
	{
		$data['transaksi'] = $this->m_data->get_data('transaksi')->result();
		$data['uang'] = $this->m_data->getTotal()->row_array();
		$data['fee'] = $this->m_data->getFee()->row_array();
		$data['avg'] = $this->m_data->getAvg()->row_array();
		$data['berhasil'] = $this->db->get_where('transaksi', ['status' =>"PAID"])->result();
		$tgl['jan1'] = $this->m_data->jan1()->result();
		$tgl['feb1'] = $this->m_data->feb1()->result();
		$tgl['mar1'] = $this->m_data->mar1()->result();
		$tgl['apr1'] = $this->m_data->apr1()->result();
		$tgl['mei1'] = $this->m_data->mei1()->result();
		$tgl['jun1'] = $this->m_data->jun1()->result();
		$tgl['jul1'] = $this->m_data->jul1()->result();
		$tgl['agu1'] = $this->m_data->agu1()->result();
		$tgl['sep1'] = $this->m_data->sep1()->result();
		$tgl['okt1'] = $this->m_data->okt1()->result();
		$tgl['nov1'] = $this->m_data->nov1()->result();
		$tgl['des1'] = $this->m_data->des1()->result();
		$tgl['jan2'] = $this->m_data->jan2()->result();
		$tgl['feb2'] = $this->m_data->feb2()->result();
		$tgl['mar2'] = $this->m_data->mar2()->result();
		$tgl['apr2'] = $this->m_data->apr2()->result();
		$tgl['mei2'] = $this->m_data->mei2()->result();
		$tgl['jun2'] = $this->m_data->jun2()->result();
		$tgl['jul2'] = $this->m_data->jul2()->result();
		$tgl['agu2'] = $this->m_data->agu2()->result();
		$tgl['sep2'] = $this->m_data->sep2()->result();
		$tgl['okt2'] = $this->m_data->okt2()->result();
		$tgl['nov2'] = $this->m_data->nov2()->result();
		$tgl['des2'] = $this->m_data->des2()->result();
		// $data['get_basis'] = $this->m_data->getBasis()->result();
		// $data['pekerjaan'] = $this->m_data->get_data('pekerjaan')->result();
		// $data['provinces'] = $this->m_data->get_data('provinces')->result();
		// $data['get_provinces'] = $this->m_data->get_provinsi();
		// $data['regencies'] = $this->m_data->get_data('regencies')->result();
		// $data['districts'] = $this->m_data->get_data('districts')->result();
		// $data['villages'] = $this->m_data->get_data('villages')->result();
		$data['page'] = "Dashboard";
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_dashboard', $data);
			$this->load->view('dashboard/v_footerv2', $tgl);
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function transaksi()
	{
		$data['transaksi'] = $this->m_data->get_data('transaksi')->result();
		$data['page'] = "Transaksi";
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_transaksi', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function setting()
	{
		$data['transaksi'] = $this->m_data->get_data('transaksi')->result();
		$data['page'] = "Setting";
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_setting', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}
	public function ganti_password()
	{
		$this->load->view('dashboard/v_ganti_password');
	}
	public function ganti_password_aksi()
	{
		// form validasi
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');
		// cek validasi
		if ($this->form_validation->run() != false) {
			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');
			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();
			// cek kesesuaikan password lama
			if ($cek > 0) {
				// update data password pengguna
				$w = array(
					'pengguna_id' => $this->session->userdata('id')
				);
				$data = array(
					'pengguna_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			} else {
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}
		} else {
			$this->load->view('dashboard/v_ganti_password');
		}
	}
	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');
		$where = array(
			'pengguna_id' => $id_pengguna
		);
		$data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil', $data);
		$this->load->view('dashboard/v_footer');
	}
	public function profil_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->session->userdata('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$where = array(
				'pengguna_id' => $id
			);
			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email
			);
			$this->m_data->update_data($where, $data, 'pengguna');
			redirect(base_url() . 'dashboard/profil/?alert=sukses');
		} else {
			// id pengguna yang sedang login
			$id_pengguna = $this->session->userdata('id');
			$where = array(
				'pengguna_id' => $id_pengguna
			);
			$data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_profil', $data);
			$this->load->view('dashboard/v_footer');
		}
	}
}
