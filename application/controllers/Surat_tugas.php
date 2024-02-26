<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_tugas extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_surat_tugas');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_surat_tugas']=$this->m_surat_tugas->get_all_surat_tugas();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/surat_tugas');
		$this->load->view('backend/footer');
	}


	public function lihat()
	{
		$x['data_surat_tugas']=$this->m_surat_tugas->get_all_surat_tugas();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_surat_tugas');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_surat_tugas'] = $this->db->query("SELECT * FROM surat_tugas,pegawai,jabatan where surat_tugas.id_pegawai=pegawai.id_pegawai AND pegawai.id_jabatan=jabatan.id_jabatan AND date(tanggal_mulai) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('backend/cetak_surat_tugas',$data);
	}


	public function cetak()
	{
		$x['data_surat_tugas']=$this->m_surat_tugas->get_all_surat_tugas();
		$this->load->view('backend/cetak_surat_tugas',$x);
	}

	public function cetak2($id)
	{
		$x['data']=$this->db->query("SELECT * FROM surat_tugas,pegawai,jabatan where surat_tugas.id_pegawai=pegawai.id_pegawai AND pegawai.id_jabatan=jabatan.id_jabatan AND  surat_tugas.id_surat_tugas='$id'")->row_array();
		$this->load->view('backend/cetak_persurat_tugas',$x);
	}
	

		public function simpan_surat_tugas()
	{
				$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'latar_belakang_penugasan' => $this->input->post('latar_belakang_penugasan'),
								'tujuan_penugasan' => $this->input->post('tujuan_penugasan'),
								'tanggal_mulai' => $this->input->post('tanggal_mulai'),
								'tanggal_selesai' => $this->input->post('tanggal_selesai'),
							);
				
					$result = $this->m_surat_tugas->add_surat_tugas($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('surat_tugas'));
					}
	}



		public function update_surat_tugas()
	{
		$id = $this->input->post('id_surat_tugas'); 

						$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'latar_belakang_penugasan' => $this->input->post('latar_belakang_penugasan'),
								'tujuan_penugasan' => $this->input->post('tujuan_penugasan'),
								'tanggal_mulai' => $this->input->post('tanggal_mulai'),
								'tanggal_selesai' => $this->input->post('tanggal_selesai'),
							);
				
					$result = $this->m_surat_tugas->edit_surat_tugas($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('surat_tugas'));
					}
	}

	function hapus_surat_tugas(){
		$kode=$this->input->post('kode');
		$this->m_surat_tugas->hapus_surat_tugas($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('surat_tugas');
	}
}