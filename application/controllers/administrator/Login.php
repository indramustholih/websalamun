<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model','users');
	}

	public function index()
	{
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required',array(
			'required'		=> '%s Harus Diisi'
		));

		$valid->set_rules('username','Username','required',array(
			'required'		=> '%s Harus Diisi'
		));

		if($valid->run() == FALSE)
		{
			if($this->session->userdata('username') != "")
			{
				redirect(base_url(),"refresh");
			}
			else
			{
				$data = array(
					'title_atas'	=> 'Halaman Login'
				);
				$this->load->view('admin/layout/login_layout', $data, FALSE);
			}
		}
		else
		{
			$i 			= $this->input;
			$username 	= $i->post('username');
			$password   = $i->post('password');

			$check		= $this->users->check_login($username);

			if(count($check) > 0)
			{
				$hash 	= $check['password'];

				if(password_verify($password,$hash))
				{
					$userdata  = array
					(
						'username' 		=> $username,
						'akses_level'	=> $check['akses_level'],
					);
					$this->session->set_userdata($userdata);
					$this->session->set_flashdata('sukses','<i class="fa fa-check"></i> Selamat Datang !! Anda Berhasil login'. $username);
					redirect(base_url('administrator/dashboard'),'refresh');
				}
				else
				{
					$this->session->set_flashdata('gagal','<i class="fa fa-warning"></i> Username Atau Password Tidak Cocok');
					redirect(base_url('administrator/login'),'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('gagal',"<i class='fa fa-warning'></i> Username Atau Password Tidak Cocok");
				redirect(base_url('administrator/login'),'refresh');
			}
		}
	}

	public function logout()
	{
		$userdata = ['username','akses_level'];
		$this->session->unset_userdata($userdata);
		$this->session->set_flashdata('sukses','<i class="fa fa-check"></i> Anda Berhasil Logout');
		redirect(base_url('administrator/login'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/administrator/Login.php */