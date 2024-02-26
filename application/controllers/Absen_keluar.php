<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_keluar extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_absen_keluar');
		$this->load->model('m_absen_masuk');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_absen_keluar']=$this->m_absen_keluar->get_all_absen_keluar();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/absen_keluar');
		$this->load->view('backend/footer');
	}

		public function lokasi($id)
	{
		$x['data']=$this->db->query("SELECT * FROM absen_masuk,pegawai,absen_keluar where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_keluar.id_absen_masuk=absen_masuk.id_absen_masuk AND absen_keluar.id_absen_keluar='$id'")->row_array();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lokasi_absen2');
		$this->load->view('backend/footer');
	}

	public function lihat()
	{
		$x['data_absen_keluar']=$this->m_absen_keluar->get_all_absen_keluar();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_absen_keluar');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_absen_keluar'] = $this->db->query("SELECT * FROM absen_masuk,pegawai,absen_keluar where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_keluar.id_absen_masuk=absen_masuk.id_absen_masuk  AND date(tgl_waktu_keluar) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('backend/cetak_absen_keluar',$data);
	}


	public function cetak()
	{
		$x['data_absen_keluar']=$this->m_absen_keluar->get_all_absen_keluar();
		$this->load->view('backend/cetak_absen_keluar',$x);
	}

	public function cetak2($id)
	{
		$x['data']=$this->db->query("select * from absen_keluar,pegawai,jabatan where pegawai.id_pegawai=absen_keluar.id_pegawai
		AND jabatan.id_jabatan=pegawai.id_jabatan AND id_absen_keluar='$id'")->row_array();
		$this->load->view('backend/cetak_perabsen_keluar',$x);
	}
	

		public function simpan_absen_keluar()
	{
			$data2 = array(
								'stat' => 1,
							);
				$this->m_absen_masuk->edit_absen_masuk($data2,$this->input->post('id_absen_masuk'));
				
				$data = array(
								'id_absen_masuk' => $this->input->post('id_absen_masuk'),
								'status_keluar' => $this->input->post('status_keluar'),
								'lat_keluar' => $this->input->post('lat_keluar'),
								'long_keluar' => $this->input->post('long_keluar'),
								'ket_keluar' => $this->input->post('ket_keluar'),
							);
				
					$result = $this->m_absen_keluar->add_absen_keluar($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('absen_keluar'));
					}
	}



		public function update_absen_keluar()
	{
		$id = $this->input->post('id_absen_keluar'); 
		
					$data = array(
								'id_absen_masuk' => $this->input->post('id_absen_masuk'),
								'status_keluar' => $this->input->post('status_keluar'),
								'lat_keluar' => $this->input->post('lat_keluar'),
								'long_keluar' => $this->input->post('long_keluar'),
								'ket_keluar' => $this->input->post('ket_keluar'),
							);
				
					$result = $this->m_absen_keluar->edit_absen_keluar($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('absen_keluar'));
					}
	}

	function hapus_absen_keluar(){
		$kode=$this->input->post('kode');
		$this->m_absen_keluar->hapus_absen_keluar($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('absen_keluar');
	}
}