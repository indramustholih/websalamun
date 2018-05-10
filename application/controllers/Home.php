<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model','gallery');
	}
	public function index(){
		$slider = $this->gallery->slider_limit();
		$data = array(
			'isi'		=>'home/index',
			'slider'	=> $slider,
		);

		$this->load->view('layout/wrapper',$data,FALSE);
	}

}
