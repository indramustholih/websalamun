<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('bedmanagement_model','bed');
	}
	public function index(){
		redirect('home');
	}
	public function sejarah(){
		$data = array(
			'isi'=>'profil/sejarah'
		);

		$this->load->view('layout/wrapper',$data,FALSE);
	}

}
