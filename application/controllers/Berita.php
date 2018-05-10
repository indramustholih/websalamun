<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('artikel_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		$config['use_page_numbers']  = TRUE;
		$config["uri_segment"] = 3;
		$config["full_tag_open"] = '<ul class="pagination pagination-lg">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "Pertama";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "Paling Akhir";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '<i class="fa fa-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['base_url'] = base_url().'berita';
        $config['total_rows'] = $this->artikel_model->total_record_berita();
        $config['per_page'] = 4;
        $config['uri_segment'] = 2;

        $this->pagination->initialize($config);

        // Script ini supaya records pada page selanjutnya tidak ada yang ganda tapi use_page_number harus TRUE
        if($this->uri->segment(2) > 0){
        $start = ($this->uri->segment(2) + 0)*$config['per_page'] - $config['per_page'];
    	}
   		 else{
        $start = $this->uri->segment(2);
    	}

    	$front  = $this->artikel_model->posting_limit_berita($config['per_page'],$start)->result();
    	$data 	= array
    			(
    				'isi' 			=> 'admin/artikel/front',
    				'title_atas'	=> 'Halaman Artikel',
    				'front'			=> $front,
    				'pagination'	=> $this->pagination->create_links(),
    			);
    	$this->load->view('layout/wrapper_berita',$data, FALSE);
	}

	// public function index()
	// {
	// 	redirect('home');
	// }

	public function read($slug_post){
		$post = $this->artikel_model->read($slug_post);
		if(! empty($post->slug_post)){
			$data = array(
				'title_atas'	=> 'Halaman asem',
				'post'			=> $post,
				'isi'			=> 'admin/artikel/read'
			);
			$this->load->view('layout/wrapper_berita',$data,FALSE);	
		}else{
			redirect('error');
		}
		
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */