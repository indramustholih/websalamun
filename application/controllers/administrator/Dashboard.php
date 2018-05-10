<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('bedmanagement_model','bed');
	}

	public function autentikasi()
	{
		if($this->session->userdata('akses_level') == "")
		{
			$this->session->set_flashdata('gagal','<i class="fa fa-times"></i> Anda Harus Login Dahulu !!');
			redirect(base_url('administrator/login'),'refresh');
		}
	}
	public function index(){
		$this->autentikasi();
		$data = array
		(	
			"title_atas" 	=> "Halaman Dashboard",
			"title_panel"	=> "Dashboard",
			'isi'			=> "admin/dashboard/index"
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}
