<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model','artikel');
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
		$artikel 	= $this->artikel->listing();
		$data = array
		(
			'title_atas'	=> 'Halaman Posting',
			'title_panel'	=> 'Artikel',
			'artikel'		=> $artikel,
			'isi'			=> 'admin/artikel/list',
		);	
		$this->load->view('admin/layout/wrapper',$data,FALSE);
	}

	public function ajax_list()
	{
		$list = $this->artikel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datas) {
			$no++;
			$row = array();
			$row[] = $no;
			if($datas->gambar == ''){
				$row[] = "<span class='badge bg-warning'>Gambar Belum Ada</span>";
			}else{
				$row[] = "<img src='".base_url('assets/image/post/thumbs/'.$datas->gambar)."' class='img img-responsive img-thumbnail'/>";
			}
			$row[] = $datas->judul_post;
			$row[] = $datas->tags;
			$row[] = $datas->jenis_post;
			$row[] = $datas->date_created;
			$row[] = $datas->status_post;
			 $row[] = anchor('artikel/read/'.$datas->slug_post, '<i class="fa fa-eye"></i> Baca',array('class' => 'btn btn-primary btn-sm','target'=>'_blank'))."&nbsp". 
			 		anchor('administrator/artikel/edit/'.$datas->id_post, '<i class="fa fa-pencil"></i> edit', 			array('class' => 'btn btn-warning btn-sm'))."&nbsp".
		  			 anchor('administrator/artikel/delete/'.$datas->id_post, '<i class="fa fa-trash"></i> Hapus', array('class' => 'btn btn-danger btn-sm','onclick'=>"return confirmDialog();"));

			

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->artikel->count_all(),
						"recordsFiltered" => $this->artikel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function tambah()
	{
		$valid  = $this->form_validation;

		$valid->set_rules('judul_post','Judul Artikel','required', array(
			'required'		=> '%s Harus Diisi',
		));

		$valid->set_rules('isi','Isi Artikel','required', array(
			'required'		=> '%s Harus Diisi',
		));

		$valid->set_rules('isi','Isi Artikel','min_length[200]', array(
			'min_length'		=> '%s Minimal 200 karakter',
		));

		if($valid->run())
		{
			if(!empty($_FILES['gambar']['name'])){
				$config	['upload_path']			= './assets/image/post';
				$config	['allowed_types']		= 'jpeg|jpg|png|gif';
				$config	['max_size']			= '12000'; //KB
				$this->upload->initialize($config);

				if(! $this->upload->do_upload('gambar'))
				{
					$data = array(
						'title_atas'	=> 'Tambah Artikel',
						'title_panel'	=> 'Tambah Artikel',
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/artikel/tambah'
					);
					$this->load->view('admin/layout/wrapper',$data,FALSE);
				}else{
					$upload_data				= array('uploads'	=> $this->upload->data());
						//Image Editor

					$config['image_library']	= 'gd2';
					$config['source_image']		= './assets/image/post/'.$upload_data['uploads']['file_name'];
					$config['new_image']		= './assets/image/post/thumbs/';
					$config['create_thumb']		= TRUE;
					$config['quality']			= "100%";
					$config['maintain_ratio']	= TRUE;
					$config['width']			= 360 ; //PIXEL
					$config['height']			= 360 ;//PIXEL
					$config['x_axis']			= '0';
					$config['y_axis']			= '0';
					$config['thumb_marker']		= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();	

					$i 		= $this->input;
					$slug_post  = url_title($this->input->post('judul_post'), 'dash', TRUE);
					$data  = array(
						'slug_post'		=> $slug_post,
						'judul_post'	=> $i->post('judul_post'),
						'isi'			=> $i->post('isi'),
						'gambar'		=> $upload_data['uploads']['file_name'],
						'status_post'	=> $i->post('status_post'),
						'jenis_post'	=> $i->post('jenis_post'),
						'tags'			=> $i->post('tags'),
					);

					$this->artikel->tambah($data);
					$this->session->set_flashdata('sukses','Artikel Telah Di Tambah');
					redirect(base_url('administrator/artikel'),'refresh');
				}
			}else{
					$i 		= $this->input;
					$slug_post  = url_title($this->input->post('judul_post'), 'dash', TRUE);
					$data  = array(
						'slug_post'		=> $slug_post,
						'judul_post'	=> $i->post('judul_post'),
						'isi'			=> $i->post('isi'),
						'status_post'	=> $i->post('status_post'),
						'jenis_post'	=> $i->post('jenis_post'),
						'tags'			=> $i->post('tags'),
					);

					$this->artikel->tambah($data);
					$this->session->set_flashdata('sukses','Artikel Telah Di Tambah');
					redirect(base_url('administrator/artikel'),'refresh');
			}
		}

		$data = array(
			'title_atas'	=> 'Halaman Tambah Posting',
			'title_panel'	=> 'Tambah Posting',
			'error'			=> $this->upload->display_errors(),
			'isi'			=> 'admin/artikel/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit($id_post)
	{
		$posting = $this->artikel->detail($id_post);

		// Validasi
		$valid = $this->form_validation; // bawaan framework

		$valid->set_rules('judul_post','Judul Artikel','required',
			array('required'	=> '%s Harus Diisi'));

		$valid->set_rules('isi','Isi Artikel','required',
			array('required'	=> '%s Harus Diisi'));

		$valid->set_rules('isi','Isi Artikel','min_length[200]', array(
			'min_length'		=> '%s Minimal 200 karakter',
		));

		if($valid->run()) 
		{	
				// Upload lagi data pdf
			if(!empty($_FILES['gambar']['name']))
			{	
				$config	['upload_path']			= './assets/image/post';
				$config	['allowed_types']		= 'jpeg|jpg|gif|png';
				$config	['max_size']			= '12000'; //KB
				$this->upload->initialize($config);
				

				if(! $this->upload->do_upload('gambar'))
				{

					$data = array(
						'title_atas'		=> 'Edit Posting',
						'title_panel' 		=> 'Edit Posting : '.$posting->judul_post,
						'posting'	=> $posting,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/artikel/edit'
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				// Gada error
				}else{
					// Upload
					$upload_data				= array('uploads'	=> $this->upload->data());
								//Image Editor

					$config['image_library']	= 'gd2';
					$config['source_image']		= './assets/image/post/'.$upload_data['uploads']['file_name'];
					$config['new_image']		= './assets/image/post/thumbs/';
					$config['create_thumb']		= TRUE;
					$config['quality']			= "100%";
					$config['maintain_ratio']	= TRUE;
					$config['width']			= 360 ; //PIXEL
					$config['height']			= 360 ;//PIXEL
					$config['x_axis']			= '0';
					$config['y_axis']			= '0';
					$config['thumb_marker']		= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();				


					// Jika gambar di upload lagi maka harus dihapus
					if($posting->gambar != " " ){
						unlink('./assets/image/post/'.$posting->gambar);
						unlink('./assets/image/post/thumbs/'.$posting->gambar);
					}
					// END hapus gambar
					
					// Jika benar maka akan masuk database
					// Script masukan data harus ada upload cover

					$i 		= $this->input;
					$slug_posting = url_title($this->input->post('judul_post'), 'dash', TRUE);
					// $kategori=implode(',',$this->input->post('tags'));
					$data 	= array(
						'id_post'			=> $id_post,
						// 'id_user'				=> $this->session->userdata('id_user'),
						'slug_post'			=> $slug_posting,
						'judul_post'			=> $i->post('judul_post'),
						'isi'					=> $i->post('isi'),
						'gambar'				=> $upload_data['uploads']['file_name'],
						'status_post'			=> $i->post('status_post'),
						'jenis_post'			=> $i->post('jenis_post'),
						'tags'					=> $i->post('tags'),
						
						
					);

					$this->artikel->edit($data);
					$this->session->set_flashdata('sukses', 'Data Telah Di Ubah');
					redirect(base_url('administrator/artikel'),'refresh');
				} // END Upload data
			}else{ //Simpan data tanpa Upload
				$i 		= $this->input;
				$slug_posting = url_title($this->input->post('judul_post'), 'dash', TRUE);
				// $kategori=implode(',',$this->input->post('tags'));
				$data 	= array(
					'id_post'				=>$id_post,
					// 'id_user'				=> $this->session->userdata('id_user'),
					'slug_post'				=> $slug_posting,
					'judul_post'			=> $i->post('judul_post'),
					'isi'					=> $i->post('isi'),
					'status_post'			=> $i->post('status_post'),
					'jenis_post'			=> $i->post('jenis_post'),
					'tags'					=> $i->post('tags'),
					
					
				);

				$this->artikel->edit($data);
				$this->session->set_flashdata('sukses', 'Data Telah Di Ubah');
				redirect(base_url('administrator/artikel'),'refresh');
			}
		}
		
		//End masuk database
		$data = array(
			'title_atas'		=> 'Edit Posting',
			'title_panel' 		=> 'Edit Posting : '.$posting->judul_post,
			'posting'	=> $posting,
			// 'tags'		=> $tags,
			'error'		=> $this->upload->display_errors(),
			'isi'		=> 'admin/artikel/edit'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// public function edit($id_post)
	// {
	// 	$artikel   = $this->artikel->detail($id_post);
	// 	$valid  = $this->form_validation;
	// 	$valid->set_rules('judul_post','Judul Artikel','required',array(
	// 		'required'  => '%s Harus Diisi'
	// 	));
	// 	$valid->set_rules('isi','Isi Artikel','required',array(
	// 		'required'  => '%s Harus Diisi'
	// 	));

	// 	if($valid->run())
	// 	{
	// 		if(!empty($_FILES['gambar']['name']))
	// 		{
	// 			$config	['upload_path']			= './assets/image/post';
	// 			$config	['allowed_types']		= 'jpeg|jpg|gif|png';
	// 			$config	['max_size']			= '12000'; //KB
	// 			$this->upload->initialize($config);

	// 			if(! $this->upload->do_upload('gambar'))
	// 			{
	// 				$data = array(
	// 					'title_atas'  => 'Halaman Edit Artikel',
	// 					'title_panel' => 'Edit Posting '.$post->judul_post,
	// 					'artikel'	  => $artikel,
	// 					'error'		  => $this->upload->display_errors(),
	// 					'isi'		  => 'admin/artikel/edit' 
	// 				);
	// 				$this->load->view('admin/layout/wrapper',$data, FALSE);
	// 			}else{
	// 				$upload_data				= array('uploads'	=> $this->upload->data());
	// 								//Image Editor

	// 				$config['image_library']	= 'gd2';
	// 				$config['source_image']		= './assets/image/post/'.$upload_data['uploads']['file_name'];
	// 				$config['new_image']		= './assets/image/post/thumbs/';
	// 				$config['create_thumb']		= TRUE;
	// 				$config['quality']			= "100%";
	// 				$config['maintain_ratio']	= TRUE;
	// 				$config['width']			= 360 ; //PIXEL
	// 				$config['height']			= 360 ;//PIXEL
	// 				$config['x_axis']			= '0';
	// 				$config['y_axis']			= '0';
	// 				$config['thumb_marker']		= '';
	// 				$this->load->library('image_lib', $config);
	// 				$this->image_lib->resize();

	// 				if($post->gambar != ""){
	// 					unlink('./assets/image/post/'.$post->gambar);
	// 					unlink('./assets/image/post/thumbs/'.$post->gambar);
	// 				}

	// 				$i 		= $this->input;
	// 				$slug_post  = url_title($this->input->post('judul_post'), 'dash', TRUE);
	// 				$data  = array(
	// 					'id_post'		=> $id_post,
	// 					'slug_post'		=> $slug_post,
	// 					'judul_post'	=> $i->post('judul_post'),
	// 					'isi'			=> $i->post('isi'),
	// 					'gambar'		=> $upload_data['uploads']['file_name'],
	// 					'status_post'	=> $i->post('status_post'),
	// 					'tags'			=> $i->post('tags'),
	// 				);
	// 				$this->artikel->edit($data);
	// 				$this->session->set_flashdata('sukses','Artikel Telah Di ubah');
	// 				redirect(base_url('administrator/artikel'),'refresh');
	// 			}
	// 		}else{
	// 			$i 		= $this->input;
	// 			$slug_post  = url_title($this->input->post('judul_post'), 'dash', TRUE);
	// 			$data  = array(
	// 				'id_post'		=> $id_post,
	// 				'slug_post'		=> $slug_post,
	// 				'judul_post'	=> $i->post('judul_post'),
	// 				'isi'			=> $i->post('isi'),
	// 				'status_post'	=> $i->post('status_post'),
	// 				'tags'			=> $i->post('tags'),
	// 			);
	// 			$this->artikel->edit($data);
	// 			$this->session->set_flashdata('sukses', 'Artikel Telah Di Ubah');
	// 			redirect(base_url('administrator/artikel'),'refresh');
	// 		}
	// 	}

	// 	$data = array(
	// 		'title_atas'		=> 'Halaman Edit Artikel',
	// 		'title_panel'		=> 'Edit Artikel '. $artikel->judul_post,
	// 		'artikel'			=> $artikel,
	// 		'error'				=> $this->upload->display_errors(),
	// 		'isi'				=> 'admin/artikel/edit'
	// 	);
	// 	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// }

	public function delete($id_post)
	{
		$artikel = $this->artikel->detail($id_post);

		if($artikel->gambar != " ")
		{
			unlink('./assets/image/post/'.$artikel->gambar);
			unlink('./assets/image/post/thumbs/'.$artikel->gambar);
		}

		$data = array('id_post' => $id_post);
		$this->artikel->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Dihapus');
		redirect(base_url('administrator/artikel'));
	}

}

/* End of file Artikel.php */
/* Location: ./application/controllers/administrator/Artikel.php */