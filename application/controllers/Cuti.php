<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_cuti');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_cuti']=$this->m_cuti->get_all_cuti();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/cuti');
		$this->load->view('backend/footer');
	}

	public function lihat()
	{
		$x['data_cuti']=$this->m_cuti->get_all_cuti();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_cuti');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_cuti'] = $this->db->query("SELECT * FROM cuti,pegawai where cuti.id_pegawai=pegawai.id_pegawai AND date(tanggal_mulai) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('backend/cetak_cuti',$data);
	}


	public function cetak()
	{
		$x['data_cuti']=$this->m_cuti->get_all_cuti();
		$this->load->view('backend/cetak_cuti',$x);
	}

	public function cetak2($id)
	{
		$x['data']=$this->db->query("SELECT * FROM cuti,pegawai,jabatan where cuti.id_pegawai=pegawai.id_pegawai
		AND jabatan.id_jabatan=pegawai.id_jabatan AND id_cuti='$id'")->row_array();
		$this->load->view('backend/cetak_percuti',$x);
	}
	

		public function simpan_cuti()
	{
		$id = $this->input->post('id_pegawai');
		$tglmulai = strtotime($this->input->post('tanggal_mulai'));
		$tglsls = strtotime($this->input->post('tanggal_selesai'));
		$jarak = $tglsls - $tglmulai;
		$hitung = $jarak/60/60/24;
		$sisa = $this->db->query("SELECT 12-SUM(datediff(cuti.tanggal_selesai,cuti.tanggal_mulai)) sisac
		FROM cuti LEFT JOIN pegawai ON pegawai.id_pegawai = cuti.id_pegawai WHERE cuti.status_cuti = 'DISETUJUI' AND pegawai.id_pegawai = '$id' GROUP BY pegawai.id_pegawai
		")->result()->sisac;
		$data = array(
						'id_pegawai' => $id,
						'tanggal_mulai' => $this->input->post('tanggal_mulai'),
						'tanggal_selesai' => $this->input->post('tanggal_selesai'),
						'jenis_cuti' => $this->input->post('jenis_cuti'),
						'keterangan' => $this->input->post('keterangan'),
					);
			if ($hitung > $sisa) {
				$this->session->set_flashdata('tertolak', 'Record is Added Successfully!');
				redirect(base_url('cuti'));
			}else{
				$result = $this->m_cuti->add_cuti($data);
				if($result){
					$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
					redirect(base_url('cuti'));
				}
			}
	}



		public function update_cuti()
	{
		$id = $this->input->post('id_cuti'); 
					$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'tanggal_mulai' => $this->input->post('tanggal_mulai'),
								'tanggal_selesai' => $this->input->post('tanggal_selesai'),
								'jenis_cuti' => $this->input->post('jenis_cuti'),
								'keterangan' => $this->input->post('keterangan'),
							);
				
					$result = $this->m_cuti->edit_cuti($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('cuti'));
					}
	}

		public function setuju($id)
	{
					$data = array(
								'status_cuti' => "DISETUJUI"
							);
				
					$result = $this->m_cuti->edit_cuti($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_setuju', 'Record is Added Successfully!');
						redirect(base_url('cuti'));
					}
	}

		public function tolak($id)
	{
					$data = array(
								'status_cuti' => "DITOLAK"
							);
				
					$result = $this->m_cuti->edit_cuti($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_tolak', 'Record is Added Successfully!');
						redirect(base_url('cuti'));
					}
	}

	function hapus_cuti(){
		$kode=$this->input->post('kode');
		$this->m_cuti->hapus_cuti($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('cuti');
	}
}