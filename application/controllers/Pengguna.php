<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_pengguna']=$this->m_pengguna->get_all_pengguna();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/pengguna');
		$this->load->view('backend/footer');
	}


public function cetak()
	{
		$x['data_pengguna']=$this->m_pengguna->get_all_pengguna();
		$this->load->view('backend/cetak_pengguna',$x);
	}
	

		public function simpan_pengguna()
	{
				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['dokumen']['name']))
				{
				if($this->upload->do_upload('dokumen'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data = array(
								'username' => $this->input->post('username'),
								'password' => md5($this->input->post('password')),
								'no_hp' => $this->input->post('no_hp'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('level'),
								'gambar' => $dok
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengguna');
					}
				}
				else{

					$data = array(
								'username' => $this->input->post('username'),
								'password' => md5($this->input->post('password')),
								'no_hp' => $this->input->post('no_hp'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('level'),
								'gambar' => ""
							);
					
				}
				
					$result = $this->m_pengguna->add_pengguna($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}



		public function update_pengguna()
	{
		$id = $this->input->post('id_pengguna'); 
		$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['dokumen']['name']))
				{
				if($this->upload->do_upload('dokumen'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							if (empty($this->input->post('password'))) {
								$data = array(
								'username' => $this->input->post('username'),
								'no_hp' => $this->input->post('no_hp'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('level'),
								'gambar' => $dok
								);
							}else{
								$data = array(
								'username' => $this->input->post('username'),
								'password' => md5($this->input->post('password')),
								'no_hp' => $this->input->post('no_hp'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('level'),
								'gambar' => $dok
								);
							}
							

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengguna');
					}
				}
				else{

					if (empty($this->input->post('password'))) {
								$data = array(
								'username' => $this->input->post('username'),
								'no_hp' => $this->input->post('no_hp'),
								'level' => $this->input->post('level'),
								'email' => $this->input->post('email')
								);
							}else{
								$data = array(
								'username' => $this->input->post('username'),
								'password' => md5($this->input->post('password')),
								'no_hp' => $this->input->post('no_hp'),
								'level' => $this->input->post('level'),
								'email' => $this->input->post('email')
								);
							}
					
				}
				
					$result = $this->m_pengguna->edit_pengguna($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}

	function hapus_pengguna(){
		$kode=$this->input->post('kode');
		$this->m_pengguna->hapus_pengguna($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pengguna');
	}
}