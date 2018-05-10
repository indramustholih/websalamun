<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		$data['title'] = 'RS-SALAMUN | Halaman Tidak Ditemukan';
		$this->load->view('admin/error/404',$data, FALSE);		
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */