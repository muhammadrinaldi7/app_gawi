<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_profil');
		$this->load->model('m_login');
		$this->load->library('upload');
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['data_profil']=$this->m_profil->get_all_profil();
		$this->load->view('backend/header',$x);
		$this->load->view('backend/profil');
		$this->load->view('backend/footer');
	}


		public function update_profil()
	{
		$id = $this->input->post('id_profil'); 
		$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'pdf|docx|doc|jpg|png|jpeg';
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
								'no_hp' => $this->input->post('no_hp'),
								'email' => $this->input->post('email'),
								'gambar' => $dok
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('profil');
					}
				}
				else{

					$data = array(
								'username' => $this->input->post('username'),
								'no_hp' => $this->input->post('no_hp'),
								'email' => $this->input->post('email')
							);
					
				}
				
					$result = $this->m_profil->edit_profil($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('profil'));
					}
	}

	public function update_pass()
	{
		$id = $this->input->post('id_profil'); 

		$pwlama = $this->input->post('pwlama');
		$pwbaru = $this->input->post('pwbaru');
		$pwbaru2 = $this->input->post('pwbaru2');
		$where = array(
			'id_pengguna' => $id,
			'password' => md5($pwlama)
			);
		$result = $this->m_login->cek_login("pengguna",$where)->row_array();
		if($result == TRUE){

			if($pwbaru <> $pwbaru2) {
							$this->session->set_flashdata('pwsalah', 'Record is Added Successfully!');
								redirect(base_url('profil'));
							}else{
							$data = array(
								'password' => md5($pwbaru)
							);
				
					$result = $this->m_profil->edit_profil($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit_pass', 'Record is Added Successfully!');
						redirect(base_url('profil'));
					}
							
							}


							
		}else{
			$this->session->set_flashdata('passalah', ' ');
			redirect("profil");
		}

					
	}

	function hapus_profil(){
		$kode=$this->input->post('kode');
		$this->m_profil->hapus_profil($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('profil');
	}



	public function update_profil2()
	{
		$id = $this->input->post('id_profil'); 
		$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'pdf|docx|doc|jpg|png|jpeg';
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
								'nama_lengkap' => $this->input->post('nama_lengkap'),
								'alamat_c' => $this->input->post('alamat_c'),
								'email_c' => $this->input->post('email_c'),
								'no_hp' => $this->input->post('no_hp'),
								'foto_c' => $dok
							);

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('profil');
					}
				}
				else{

					$data = array(
								'nama_lengkap' => $this->input->post('nama_lengkap'),
								'alamat_c' => $this->input->post('alamat_c'),
								'email_c' => $this->input->post('email_c'),
								'no_hp' => $this->input->post('no_hp')
							);
					
				}
				
					$result = $this->m_profil->edit_profil2($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('profil'));
					}
	}

	public function update_pass2()
	{
		$id = $this->input->post('id_profil'); 

		$pwlama = $this->input->post('pwlama');
		$pwbaru = $this->input->post('pwbaru');
		$pwbaru2 = $this->input->post('pwbaru2');
		$where = array(
			'id_customer' => $id,
			'password_c' => md5($pwlama)
			);
		$result = $this->m_login->cek_login("customer",$where)->row_array();
		if($result == TRUE){

			if($pwbaru <> $pwbaru2) {
							$this->session->set_flashdata('pwsalah', 'Record is Added Successfully!');
								redirect(base_url('profil'));
							}else{
							$data = array(
								'password_c' => md5($pwbaru)
							);
				
					$result = $this->m_profil->edit_profil2($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit_pass', 'Record is Added Successfully!');
						redirect(base_url('profil'));
					}
							
							}


							
		}else{
			$this->session->set_flashdata('passalah', ' ');
			redirect("profil");
		}

					
	}
}