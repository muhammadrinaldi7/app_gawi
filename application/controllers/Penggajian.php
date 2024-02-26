<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penggajian extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_penggajian');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_penggajian']=$this->m_penggajian->get_all_penggajian();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/penggajian');
		$this->load->view('backend/footer');
	}

	public function lihat()
	{
		$x['data_penggajian']=$this->m_penggajian->get_all_penggajian();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_penggajian');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_penggajian'] = $this->db->query("SELECT * FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai AND date(tgl_gaji) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('backend/cetak_penggajian',$data);
	}

		public function lokasi($id)
	{
		$x['data']=$this->db->query("SELECT * FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai AND id_penggajian='$id'")->row_array();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lokasi_absen');
		$this->load->view('backend/footer');
	}


	public function cetak()
	{
		$x['data_penggajian']=$this->m_penggajian->get_all_penggajian();
		$this->load->view('backend/cetak_penggajian',$x);
	}

	public function cetak2($id)
	{
		$x['data']=$this->db->query("select * from penggajian,pegawai,jabatan where pegawai.id_pegawai=penggajian.id_pegawai
		AND jabatan.id_jabatan=pegawai.id_jabatan AND id_penggajian='$id'")->row_array();
		$this->load->view('backend/cetak_perpenggajian',$x);
	}
	

		public function simpan_penggajian()
	{
		$tunjangan=str_replace(".", "", $this->input->post('tunjangan'));
		$gaji_pokok=str_replace(".", "", $this->input->post('gaji_pokok'));
		$bpjs=str_replace(".", "", $this->input->post('bpjs'));
		$hutang=str_replace(".", "", $this->input->post('hutang'));

		$penghasilan=$gaji_pokok+$tunjangan;	
			$potongan=$bpjs+$hutang;	
			$gaji_bersih=$penghasilan-$potongan;

					$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'tgl_gaji' => $this->input->post('tgl_gaji'),
								'gaji_pokok' => $gaji_pokok,
								'tunjangan' => $tunjangan,
								'bpjs' => $bpjs,
								'hutang' => $hutang,
								'gaji_bersih' => $gaji_bersih,
							);
				
					$result = $this->m_penggajian->add_penggajian($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('penggajian'));
					}
	}



		public function update_penggajian()
	{
		$id = $this->input->post('id_penggajian'); 
		
		$tunjangan=str_replace(".", "", $this->input->post('tunjangan'));
		$gaji_pokok=str_replace(".", "", $this->input->post('gaji_pokok'));
		$bpjs=str_replace(".", "", $this->input->post('bpjs'));
		$hutang=str_replace(".", "", $this->input->post('hutang'));
		
		$penghasilan=$gaji_pokok+$tunjangan;	
			$potongan=$bpjs+$hutang;	
			$gaji_bersih=$penghasilan-$potongan;

					$data = array(
								'id_pegawai' => $this->input->post('id_pegawai'),
								'tgl_gaji' => $this->input->post('tgl_gaji'),
								'gaji_pokok' => $gaji_pokok,
								'tunjangan' => $tunjangan,
								'bpjs' => $bpjs,
								'hutang' => $hutang,
								'gaji_bersih' => $gaji_bersih,
							);
				
					$result = $this->m_penggajian->edit_penggajian($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('penggajian'));
					}
	}

	function hapus_penggajian(){
		$kode=$this->input->post('kode');
		$this->m_penggajian->hapus_penggajian($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('penggajian');
	}
}