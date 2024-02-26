<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_mutasi');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_mutasi']=$this->m_mutasi->get_all_mutasi();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/mutasi');
		$this->load->view('backend/footer');
	}

	public function lihat()
	{
		$x['data_mutasi']=$this->m_mutasi->get_all_mutasi();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_mutasi');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_mutasi'] = $this->db->query("SELECT * FROM mutasi,pegawai where mutasi.id_pegawai=pegawai.id_pegawai AND date(tanggal_efektif) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('backend/cetak_mutasi',$data);
	}


	public function cetak()
	{
		$x['data_mutasi']=$this->m_mutasi->get_all_mutasi();
		$this->load->view('backend/cetak_mutasi',$x);
	}

	public function cetak2($id)
	{
		$x['data']=$this->db->query("select * from mutasi,pegawai,jabatan where pegawai.id_pegawai=mutasi.id_pegawai
		AND jabatan.id_jabatan=pegawai.id_jabatan AND id_mutasi='$id'")->row_array();
		$this->load->view('backend/cetak_permutasi',$x);
	}
	

		public function simpan_mutasi()
	{
				$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'jabatan_saat_mutasi' => $this->input->post('jabatan_saat_mutasi'),
								'tanggal_efektif' => $this->input->post('tanggal_efektif'),
								'tujuan' => $this->input->post('tujuan'),
								
							);
				
					$result = $this->m_mutasi->add_mutasi($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('mutasi'));
					}
	}



		public function update_mutasi()
	{
		$id = $this->input->post('id_mutasi'); 
		
					$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'jabatan_saat_mutasi' => $this->input->post('jabatan_saat_mutasi'),
								'tanggal_efektif' => $this->input->post('tanggal_efektif'),
								'tujuan' => $this->input->post('tujuan'),
								
							);
				
					$result = $this->m_mutasi->edit_mutasi($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('mutasi'));
					}
	}

	function hapus_mutasi(){
		$kode=$this->input->post('kode');
		$this->m_mutasi->hapus_mutasi($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('mutasi');
	}
}