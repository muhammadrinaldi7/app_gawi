<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pensiun extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pensiun');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_pensiun']=$this->m_pensiun->get_all_pensiun();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/pensiun');
		$this->load->view('backend/footer');
	}


	public function lihat()
	{
		$x['data_pensiun']=$this->m_pensiun->get_all_pensiun();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_pensiun');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_pensiun'] = $this->db->query("SELECT * FROM pensiun,pegawai where pensiun.id_pegawai=pegawai.id_pegawai  AND date(mulai_pensiun) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('backend/cetak_pensiun',$data);
	}


	public function cetak()
	{
		$x['data_pensiun']=$this->m_pensiun->get_all_pensiun();
		$this->load->view('backend/cetak_pensiun',$x);
	}

	public function cetak2($id)
	{
		$x['data']=$this->db->query("SELECT * FROM pensiun,pegawai where pensiun.id_pegawai=pegawai.id_pegawai AND  pensiun.id_pensiun='$id'")->row_array();
		$this->load->view('backend/cetak_perpensiun',$x);
	}
	

		public function simpan_pensiun()
	{
				$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'masa_kerja' => $this->input->post('masa_kerja'),
								'mulai_pensiun' => $this->input->post('mulai_pensiun'),
								'jenis_pensiun' => $this->input->post('jenis_pensiun'),
							);
				
					$result = $this->m_pensiun->add_pensiun($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pensiun'));
					}
	}



		public function update_pensiun()
	{
		$id = $this->input->post('id_pensiun'); 

						$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'masa_kerja' => $this->input->post('masa_kerja'),
								'mulai_pensiun' => $this->input->post('mulai_pensiun'),
								'jenis_pensiun' => $this->input->post('jenis_pensiun'),
							);
				
					$result = $this->m_pensiun->edit_pensiun($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pensiun'));
					}
	}

	function hapus_pensiun(){
		$kode=$this->input->post('kode');
		$this->m_pensiun->hapus_pensiun($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pensiun');
	}
}