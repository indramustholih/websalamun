<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrators extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$data = array(
			'isi'=>'beranda/index'
		);

		$this->load->view('layout/admin/wrapper',$data,FALSE);
	}

}
