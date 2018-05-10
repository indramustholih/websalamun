<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_model','gallery');
	}

	public function index()
	{
		$data = array(
			'title_atas' 	=> 'Halaman Backend Gallery',
			'title_panel'	=> 'Gallery',
			'isi'			=> 'admin/gallery/list'	
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function ajax_list()
	{
		$list = $this->gallery->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datas) {
			$no++;
			$row 	= array();
			$row[]	= $no;
			$row[] 	= "<img src='".base_url('assets/image/gallery/thumbs/'.$datas->gambar)."' class='img img-responsive img-thumbnail'/>";
			$row[]	= $datas->jenis_gambar;
			$row[]	= $datas->deskripsi;
			$row[]	= $datas->date_created;
			$row[] 	= anchor('administrator/gallery/edit/'.$datas->id_gallery, '<i class="fa fa-pencil"></i> edit', 					array('class' => 'btn btn-warning btn-sm'))."&nbsp".
		  			  anchor('administrator/gallery/delete/'.$datas->id_gallery, '<i class="fa fa-trash"></i> Hapus', array('class' => 'btn btn-danger btn-sm','onclick'=>"return confirmDialog();"));

			

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->gallery->count_all(),
						"recordsFiltered" => $this->gallery->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('jenis_gambar','Jenis Gambar','required');

		if($valid->run())
		{
			$config	['upload_path']			= './assets/image/gallery';
			$config	['allowed_types']		= 'jpeg|jpg|png|gif';
			$config	['max_size']			= '12000'; //KB
			$this->upload->initialize($config);

			if(! $this->upload->do_upload('gambar'))
			{
				$data = array
						(
							'title_atas'	=> 'Halaman Tambah Gallery',
							'title_panel'	=> 'Tambah Gallery',
							'error'			=> $this->upload->display_errors(),
							'isi'			=> 'admin/gallery/tambah'
						);
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			}else
			{
				$upload_data				= array('uploads'	=> $this->upload->data());
						//Image Editor

				$config['image_library']	= 'gd2';
				$config['source_image']		= './assets/image/gallery/'.$upload_data['uploads']['file_name'];
				$config['new_image']		= './assets/image/gallery/thumbs/';
				$config['create_thumb']		= TRUE;
				$config['quality']			= "100%";
				$config['maintain_ratio']	= TRUE;
				$config['width']			= 1366 ; //PIXEL
				$config['height']			= 661 ;//PIXEL
				$config['x_axis']			= '0';
				$config['y_axis']			= '0';
				$config['thumb_marker']		= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i 		= $this->input;
				$data 	= array(
					'gambar'		=> $upload_data['uploads']['file_name'],
					'jenis_gambar'	=> $i->post('jenis_gambar'),
					'deskripsi'		=> $i->post('deskripsi'),
				);
				$this->gallery->tambah($data);
				$this->session->set_flashdata('sukses','Gambar Telah Ditambah');
				redirect(base_url('administrator/gallery'),'refresh');
			}
		}

		$data = array(
			'title_atas' 		=> 'Halaman Tambah Gallery',
			'title_panel'		=> 'Tambah Gallery',
			'isi'				=> 'admin/gallery/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit($id_gallery)
	{
		$gallery 	= $this->gallery->detail($id_gallery);
		$valid 		= $this->form_validation;
		$valid->set_rules('jenis_gambar','Jenis Gambar','required');

		if($valid->run())
		{
			if(! empty($_FILES['gambar']['name']))
			{
				$config	['upload_path']			= './assets/image/gallery';
				$config	['allowed_types']		= 'jpeg|jpg|png|gif';
				$config	['max_size']			= '12000'; //KB
				$this->upload->initialize($config);

				if(! $this->upload->do_upload('gambar'))
				{
					$data = array(
						'title_atas'	=> 'Halaman Edit Gambar',
						'title_panel'	=> 'Edit Gambar',
						'gallery'		=> $gallery,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/gallery/edit'	
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data				= array('uploads'	=> $this->upload->data());
						//Image Editor

					$config['image_library']	= 'gd2';
					$config['source_image']		= './assets/image/gallery/'.$upload_data['uploads']['file_name'];
					$config['new_image']		= './assets/image/gallery/thumbs/';
					$config['create_thumb']		= TRUE;
					$config['quality']			= "100%";
					$config['maintain_ratio']	= TRUE;
					$config['width']			= 1366 ; //PIXEL
					$config['height']			= 661 ;//PIXEL
					$config['x_axis']			= '0';
					$config['y_axis']			= '0';
					$config['thumb_marker']		= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if($gallery->gambar != "")
					{
						unlink('./assets/image/gallery/'.$gallery->gambar);
						unlink('./assets/image/gallery/thumbs/'.$gallery->gambar);
					}

					$i 	= $this->input;
					$data 	= array(
					'id_gallery'	=> $id_gallery,
					'gambar'		=> $upload_data['uploads']['file_name'],
					'jenis_gambar'	=> $i->post('jenis_gambar'),
					'deskripsi'		=> $i->post('deskripsi'),
					);
					$this->gallery->edit($data);
					$this->session->set_flashdata('sukses','Gambar Telah Diupdate');
					redirect(base_url('administrator/gallery'),'refresh');
				}
			}else
			{
				$i 	= $this->input;
				$data 	= array(
				'id_gallery'	=> $id_gallery,
				'jenis_gambar'	=> $i->post('jenis_gambar'),
				'deskripsi'		=> $i->post('deskripsi'),
				);
				$this->gallery->edit($data);
				$this->session->set_flashdata('sukses','Gambar Telah Diupdate');
				redirect(base_url('administrator/gallery'),'refresh');
			}	
		}
		$data = array(
			'title_atas'	=> 'Halaman Edit Gambar',
			'title_panel'	=> 'Edit Gambar',
			'gallery'		=> $gallery,
			// 'error'			=> $this->upload->display_errors(),
			'isi'			=> 'admin/gallery/edit'	
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete($id_gallery)
	{
		$gallery = $this->gallery->detail($id_gallery);

		if($gallery->gambar != " ")
		{
			unlink('./assets/image/gallery/'.$gallery->gambar);
			unlink('./assets/image/gallery/thumbs/'.$gallery->gambar);
		}

		$data = array('id_gallery' => $id_gallery);
		$this->gallery->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Dihapus');
		redirect(base_url('administrator/gallery'));
	}

}

/* End of file Gallery.php */
/* Location: ./application/controllers/administrator/Gallery.php */