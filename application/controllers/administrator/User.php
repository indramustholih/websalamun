<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','users');
	}

	public function autentikasi()
	{
		if($this->session->userdata('akses_level') == "")
		{
			$this->session->set_flashdata('gagal','<i class="fa fa-times"></i> Anda Harus Login Dahulu !!');
			redirect(base_url('administrator/login'),'refresh');
		}
	}

	public function index()
	{
		$this->autentikasi();
		$user  	= $this->users->listing();
		$data = array(
			'title_atas'	=> 'Halaman Pengguna',
			'title_panel'	=> 'Pengguna ',
			'user'			=> $user,
			'isi'			=> 'admin/user/list_serverside'
		);
		$this->load->view('admin/layout/wrapper',$data, FALSE);
			
		
	}

	public function ajax_list()
	{
		$list = $this->users->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datas) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datas->username;
			$row[] = $datas->akses_level;
			$row[] = anchor('administrator/user/edit/'.$datas->id_user, '<i class="fa fa-pencil"></i> edit', 			array('class' => 'btn btn-warning btn-sm'))."&nbsp".
		 			 anchor('administrator/user/delete/'.$datas->id_user, '<i class="fa fa-trash"></i> Hapus', array('class' => 'btn btn-danger btn-sm','onclick'=>"return confirmDialog();"));

			

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users->count_all(),
						"recordsFiltered" => $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function tambah()
	{
		$valid 		= $this->form_validation;

		$valid->set_rules('username','Username','required|is_unique[user.username]',array(
			'required'			=> '%s Harus Disi',
			'is_unique'			=> '%s Sudah ada silahkan mengganti dengan username baru'
		));

		$valid->set_rules('password','Password','required|min_length[6]',array(
			'required'			=> '%s Harus diisi',
			'min_length'		=> '%s Minimal 6 karakter'
		));

		if($valid->run() == FALSE){
			$data = array
			(
				'title_atas'	=> 'Halaman Tambah User',
				'title_panel'	=> 'Tambah Pengguna',
				'isi'			=> 'admin/user/tambah'
			);
			$this->load->view('admin/layout/wrapper',$data, FALSE);
		}else
		{
			$i  = $this->input;
			$data = array
			(
				'username'		=> $i->post('username'),
				'password'		=> password_hash($i->post('password'),PASSWORD_BCRYPT),
				'akses_level'	=> $i->post('akses_level'),
			);

			$this->users->tambah($data);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambah');
			redirect(base_url('administrator/user'),'refresh');
		}
	}

	public function edit($id_user)
	{
		$valid 	= $this->form_validation;

		$valid->set_rules('password','Password','min_length[6]',array(
			'min_length'	=> '%s Minimal 6 karakter',
		));

		$user  = $this->users->detail($id_user);

		if($valid->run() == FALSE)
		{
			$data = array(
				'title_atas'   	=> 'Halaman Ubah Data Pengguna',
				'user'		 	=> $user,
				'title_panel'	=> 'Edit Pengguna ',
				'isi'			=> 'admin/user/edit'
			);
			$this->load->view('admin/layout/wrapper',$data, FALSE);
		}else
		{
			$i 		= $this->input;
			$pass 	= $i->post('password');
			if($pass == "")
			{
				$data  = array(
					'id_user'		=> $id_user,
					'username'		=> $i->post('username'),
					'akses_level'	=> $i->post('akses_level')
				);
				$this->users->edit($data);
				$this->session->set_flashdata('sukses','Data Berhasil Di ubah');
				redirect(base_url('administrator/user'),'refresh');
			}else
			{
				$data  = array(
					'id_user'	 => $id_user,
					'username'	 => $i->post('username'),
					'password'	 => password_hash($i->post('password'),PASSWORD_BCRYPT),
					'akses_level'=> $i->post('akses_level'),
				);
				$this->users->edit($data);
				$this->session->set_flashdata('sukses','Data Berhasil Di ubah');
				redirect(base_url('administrator/user'),'refresh');
			}
		}
	}

	public function delete($id_user){
		$data = array('id_user' => $id_user);
		$this->users->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Dihapus');
		redirect(base_url('administrator/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/administrator/User.php */