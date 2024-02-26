<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pegawai');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$x['sidebar']="pegawai";
		$this->load->view('backend/header',$x);
		$this->load->view('backend/pegawai');
		$this->load->view('backend/footer');
	}


	public function lihat()
	{
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/lihat_pegawai');
		$this->load->view('backend/footer');
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_pegawai'] = $this->db->query("SELECT * FROM pegawai,jabatan where pegawai.id_jabatan=jabatan.id_jabatan  AND date(tgl_bergabung) BETWEEN '$tgl1' AND '$tgl2' ");
		
		$this->load->view('backend/cetak_pegawai',$data);
	}


	public function cetak()
	{
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$this->load->view('backend/cetak_pegawai',$x);
	}

	public function cetak2($id)
	{
		$x['edit_pegawai']=$this->db->query("SELECT * FROM pegawai,jabatan where 
			pegawai.id_jabatan=jabatan.id_jabatan AND id_pegawai='$id'")->row_array();
		$this->load->view('backend/cetak_perpegawai',$x);
	}
	

		public function simpan_pegawai()
	{

			$tanggal2 = new DateTime($this->input->post('tgl_lahir'));
			$today = new DateTime('today');
			$y = $today->diff($tanggal2)->y;
			
			if ($y<18) {
					$this->session->set_flashdata('ggl', 'Record is Added Successfully!');
					redirect(base_url('pegawai'));
			}


				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_pegawai']['name']))
				{
				if($this->upload->do_upload('foto_pegawai'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'kode_pegawai' => $this->input->post('kode_pegawai'),
								'nama_pegawai' => $this->input->post('nama_pegawai'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'alamat' => $this->input->post('alamat'),
								'no_telp' => $this->input->post('no_telp'),
								'tgl_bergabung' => $this->input->post('tgl_bergabung'),
								'email' => $this->input->post('email'),
								'id_jabatan' => $this->input->post('id_jabatan'),
								'password' => md5($this->input->post('password')),
								'foto_pegawai' => $dok
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pegawai');
					}
				}
				else{

					$data = array(
								'kode_pegawai' => $this->input->post('kode_pegawai'),
								'nama_pegawai' => $this->input->post('nama_pegawai'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'alamat' => $this->input->post('alamat'),
								'no_telp' => $this->input->post('no_telp'),
								'tgl_bergabung' => $this->input->post('tgl_bergabung'),
								'email' => $this->input->post('email'),
								'password' => md5($this->input->post('password')),
								'id_jabatan' => $this->input->post('id_jabatan'),
							);
					
				}
				
					$result = $this->m_pegawai->add_pegawai($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}



		public function update_pegawai()
	{
		$id = $this->input->post('id_pegawai'); 
		$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_pegawai']['name']))
				{
				if($this->upload->do_upload('foto_pegawai'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							
							if (empty($this->input->post('password'))) {
								$data = array(
								'kode_pegawai' => $this->input->post('kode_pegawai'),
								'nama_pegawai' => $this->input->post('nama_pegawai'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'alamat' => $this->input->post('alamat'),
								'no_telp' => $this->input->post('no_telp'),
								'tgl_bergabung' => $this->input->post('tgl_bergabung'),
								'email' => $this->input->post('email'),
								'id_jabatan' => $this->input->post('id_jabatan'),
								'foto_pegawai' => $dok
								);
							}else{
								$data = array(
								'kode_pegawai' => $this->input->post('kode_pegawai'),
								'nama_pegawai' => $this->input->post('nama_pegawai'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'alamat' => $this->input->post('alamat'),
								'no_telp' => $this->input->post('no_telp'),
								'tgl_bergabung' => $this->input->post('tgl_bergabung'),
								'email' => $this->input->post('email'),
								'password' => md5($this->input->post('password')),
								'id_jabatan' => $this->input->post('id_jabatan'),
								'foto_pegawai' => $dok
								);
							}
								
							
							

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pegawai');
					}
				}
				else{

				
						if (empty($this->input->post('password'))) {
								$data = array(
								'kode_pegawai' => $this->input->post('kode_pegawai'),
								'nama_pegawai' => $this->input->post('nama_pegawai'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'alamat' => $this->input->post('alamat'),
								'no_telp' => $this->input->post('no_telp'),
								'tgl_bergabung' => $this->input->post('tgl_bergabung'),
								'email' => $this->input->post('email'),
								'id_jabatan' => $this->input->post('id_jabatan'),
								);
							}else{
								$data = array(
								'kode_pegawai' => $this->input->post('kode_pegawai'),
								'nama_pegawai' => $this->input->post('nama_pegawai'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'alamat' => $this->input->post('alamat'),
								'no_telp' => $this->input->post('no_telp'),
								'tgl_bergabung' => $this->input->post('tgl_bergabung'),
								'email' => $this->input->post('email'),
								'id_jabatan' => $this->input->post('id_jabatan'),
								'password' => md5($this->input->post('password')),
								);
							}
							
					
				}
				
					$result = $this->m_pegawai->edit_pegawai($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}

	function hapus_pegawai(){
		$kode=$this->input->post('kode');
		$this->m_pegawai->hapus_pegawai($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pegawai');
	}
}