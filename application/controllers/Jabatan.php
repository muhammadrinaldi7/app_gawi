<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_jabatan');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_jabatan']=$this->m_jabatan->get_all_jabatan();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/jabatan');
		$this->load->view('backend/footer');
	}


	public function cetak()
	{
		$x['data_jabatan']=$this->m_jabatan->get_all_jabatan();
		$this->load->view('backend/cetak_jabatan',$x);
	}

	public function cetak2($id)
	{
		$x['edit_jabatan']=$this->db->query("select * from jabatan where id_jabatan='$id'")->row_array();
		$this->load->view('backend/cetak_perjabatan',$x);
	}
	

		public function simpan_jabatan()
	{
				$data = array(
								
								'nama_jabatan' => $this->input->post('nama_jabatan'),
							);
				
					$result = $this->m_jabatan->add_jabatan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('jabatan'));
					}
	}



		public function update_jabatan()
	{
		$id = $this->input->post('id_jabatan'); 
					$data = array(
								
								'nama_jabatan' => $this->input->post('nama_jabatan'),
							);
				
					$result = $this->m_jabatan->edit_jabatan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('jabatan'));
					}
	}

	function hapus_jabatan(){
		$kode=$this->input->post('kode');
		$this->m_jabatan->hapus_jabatan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('jabatan');
	}
}