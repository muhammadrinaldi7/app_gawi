<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penugasan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_penugasan');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_penugasan']=$this->m_penugasan->get_all_penugasan();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/penugasan');
		$this->load->view('backend/footer');
	}


	public function lihat()
	{
		$x['data_penugasan']=$this->m_penugasan->get_all_penugasan();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_penugasan');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_penugasan'] = $this->db->query("SELECT * FROM penugasan,pegawai where penugasan.id_pegawai=pegawai.id_pegawai AND date(tanggal_penugasan) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('backend/cetak_penugasan',$data);
	}


	public function cetak()
	{
		$x['data_penugasan']=$this->m_penugasan->get_all_penugasan();
		$this->load->view('backend/cetak_penugasan',$x);
	}

	public function cetak2($id)
	{
		$x['data']=$this->db->query("SELECT * FROM pegawai,jabatan,penugasan where 
			
			pegawai.id_jabatan=jabatan.id_jabatan AND penugasan.id_pegawai=pegawai.id_pegawai AND id_penugasan='$id'")->row_array();
		$this->load->view('backend/cetak_perpenugasan',$x);
	}
	

	public function sppd($id)
	{
		$x['data']=$this->db->query("SELECT * FROM pegawai,,jabatan,penugasan where 
			
			pegawai.id_jabatan=jabatan.id_jabatan AND penugasan.id_pegawai=pegawai.id_pegawai AND id_penugasan='$id'")->row_array();
		$this->load->view('backend/cetak_sppd',$x);
	}
	

		public function simpan_penugasan()
	{
				$data = array(
								'tanggal_penugasan' => $this->input->post('tanggal_penugasan'),
								'id_pegawai' => $this->input->post('id_pegawai'),
								'id_pegawai2' => $this->input->post('id_pegawai2'),
								'maksud_perjalanan' => $this->input->post('maksud_perjalanan'),
								'alat_angkut' => $this->input->post('alat_angkut'),
								'tempat_berangkat' => $this->input->post('tempat_berangkat'),
								'tempat_tujuan' => $this->input->post('tempat_tujuan'),
								'tgl_berangkat' => $this->input->post('tgl_berangkat'),
								'tgl_harus_kembali' => $this->input->post('tgl_harus_kembali'),
								'keterangan' => $this->input->post('keterangan'),
							);
				
					$result = $this->m_penugasan->add_penugasan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('penugasan'));
					}
	}



		public function update_penugasan()
	{
		$id = $this->input->post('id_penugasan'); 
				$data = array(
								'tanggal_penugasan' => $this->input->post('tanggal_penugasan'),
								'id_pegawai' => $this->input->post('id_pegawai'),
								'id_pegawai2' => $this->input->post('id_pegawai2'),
								'maksud_perjalanan' => $this->input->post('maksud_perjalanan'),
								'alat_angkut' => $this->input->post('alat_angkut'),
								'tempat_berangkat' => $this->input->post('tempat_berangkat'),
								'tempat_tujuan' => $this->input->post('tempat_tujuan'),
								'tgl_berangkat' => $this->input->post('tgl_berangkat'),
								'tgl_harus_kembali' => $this->input->post('tgl_harus_kembali'),
								'keterangan' => $this->input->post('keterangan'),
							);
				
					$result = $this->m_penugasan->edit_penugasan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('penugasan'));
					}
	}

	function hapus_penugasan(){
		$kode=$this->input->post('kode');
		$this->m_penugasan->hapus_penugasan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('penugasan');
	}
}