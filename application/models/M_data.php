<?php

class M_data extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	// fungsi untuk mengambil data dari database
	function get_data($table)
	{
		return $this->db->get($table);
	}
	// fungsi untuk menginput data ke database
	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	// fungsi untuk mengedit data
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	// fungsi untuk menghapus data dari database
	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	function get_provinsi()
	{
		$this->db->select('*');
		$this->db->from('provinces');
		$query = $this->db->get();

		return $query->result();
	}

	public function getBasis()
	{
		$this->db->select("basis.basis_id AS basisId, basis.basis_nama AS basisNama, basis.basis_ttl AS basisTtl, basis.basis_tempat_kerja AS basisTempatkerja, basis.basis_gender AS basisGender, basis.basis_pekerjaan AS basisPekerjaan, provinces.name AS provincesName, regencies.name AS regenciesName, districts.name AS districtsName, villages.name AS villagesName, provinces.id AS provincesId, regencies.id AS regenciesId, districts.id AS districtsId, villages.id AS villagesId, basis.basis_phone AS basisPhone, basis.basis_email AS basisEmail, basis.basis_datainput AS basisDatainput");
		$this->db->join("provinces", "basis.basis_provinsi=provinces.id");
		$this->db->join("regencies", "basis.basis_kabupaten=regencies.id");
		$this->db->join("districts", "basis.basis_kecamatan=districts.id");
		$this->db->join("villages", "basis.basis_desa=villages.id");
		$this->db->order_by("basis.basis_id", "desc");
		return $this->db->get("basis");
	}
	public function getTotal()
	{
		$this->db->select_sum('diterima');
		$this->db->where('status', "PAID");
		return $this->db->get('transaksi');
	}
	public function getFee()
	{
		$this->db->select_sum('fee');
		$this->db->where('status', "PAID");
		return $this->db->get('transaksi');
	}
	public function getAvg()
	{
		$this->db->select_avg('jumlah');
		$this->db->where('status', "PAID");
		return $this->db->get('transaksi');
	}
	public function jan1()
	{
		$month = 1;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function feb1()
	{
		$month = 2;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mar1()
	{
		$month = 3;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function apr1()
	{
		$month = 4;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mei1()
	{
		$month = 5;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jun1()
	{
		$month = 6;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jul1()
	{
		$month = 7;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function agu1()
	{
		$month = 8;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function sep1()
	{
		$month = 9;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function okt1()
	{
		$month = 10;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function nov1()
	{
		$month = 11;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function des1()
	{
		$month = 12;
		$year = date('Y');
		$status = "UNPAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jan2()
	{
		$month = 1;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function feb2()
	{
		$month = 2;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mar2()
	{
		$month = 3;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function apr2()
	{
		$month = 4;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mei2()
	{
		$month = 5;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jun2()
	{
		$month = 6;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jul2()
	{
		$month = 7;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function agu2()
	{
		$month = 8;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function sep2()
	{
		$month = 9;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function okt2()
	{
		$month = 10;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function nov2()
	{
		$month = 11;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function des2()
	{
		$month = 12;
		$year = date('Y');
		$status = "PAID";
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	// public function getJsonBySlug($slug)
	// {
	// 	$this->db->select('json.json AS json');
	// 	$this->db->from("json");
	// 	$this->db->where('json.inv', $slug);
	// 	return $this->db->get()->row_array();
	// }
	public function jan11()
	{
		$month = 1;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function feb11()
	{
		$month = 2;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mar11()
	{
		$month = 3;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function apr11()
	{
		$month = 4;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mei11()
	{
		$month = 5;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jun11()
	{
		$month = 6;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jul11()
	{
		$month = 7;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function agu11()
	{
		$month = 8;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function sep11()
	{
		$month = 9;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function okt11()
	{
		$month = 10;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function nov11()
	{
		$month = 11;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function des11()
	{
		$month = 12;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('jumlah');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jan22()
	{
		$month = 1;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function feb22()
	{
		$month = 2;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mar22()
	{
		$month = 3;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function apr22()
	{
		$month = 4;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function mei22()
	{
		$month = 5;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jun22()
	{
		$month = 6;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function jul22()
	{
		$month = 7;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function agu22()
	{
		$month = 8;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function sep22()
	{
		$month = 9;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function okt22()
	{
		$month = 10;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function nov22()
	{
		$month = 11;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}
	public function des22()
	{
		$month = 12;
		$year = date('Y');
		$status = "PAID";
		$this->db->select_sum('diterima');
		$this->db->where('status', $status);
		$this->db->where('input_month', $month);
		$this->db->where('input_year', $year);
		$this->db->from('transaksi');
		return $this->db->get();
	}

	public function uploadbanner()
	{
		$config['upload_path'] = './assets/dist/img/banner/';
		$config['allowed_types'] = 'jpg|png|jpeg|image/png|image/jpg|image/jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = round(microtime(true) * 1000);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('img')) {
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function insertbanner($upload)
	{
		$img = $upload['file']['file_name'];
		// $url = $this->input->post('url', true);
		// $info = getimagesize(base_url() . 'assets/dist/img/banner/' . $img);
		// if($info[0] != 1770 || $info[1] != 702){
		//   unlink("./assets/images/banner/$img");
		//   return false;
		// }else{
		// if ($url == "") {
		// 	$FixUrl = "#";
		// } else {
		// 	$FixUrl = $url;
		// }
		$data = [
			'nama' => $img,
			// 'url' => $FixUrl
		];
		$this->db->insert('banner', $data);
		return true;
		// }
	}


	// AKHIR FUNGSI CRUD
}
