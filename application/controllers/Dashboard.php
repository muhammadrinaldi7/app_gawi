<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_data');
	}

	public function index()
	{
		$x['sidebar']="dashboard";
		$this->load->view('backend/header',$x);
		$this->load->view('backend/dashboard');
		$this->load->view('backend/footer');
	}

	
}
