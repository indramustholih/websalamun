<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model','gallery');
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
		$config['base_url'] = base_url().'gallery';
        $config['total_rows'] = $this->gallery->total_record();
        $config['per_page'] = 12;
        $config['uri_segment'] = 2;

        $this->pagination->initialize($config);

        // Script ini supaya records pada page selanjutnya tidak ada yang ganda tapi use_page_number harus TRUE
        if($this->uri->segment(2) > 0){
        $start = ($this->uri->segment(2) + 0)*$config['per_page'] - $config['per_page'];
    	}
   		 else{
        $start = $this->uri->segment(2);
    	}

    	$front  = $this->gallery->gallery_limit($config['per_page'],$start)->result();
    	$data 	= array
    			(
    				'isi' 			=> 'admin/gallery/front_list',
    				'title_atas'	=> 'Halaman Artikel',
    				'front'			=> $front,
    				'pagination'	=> $this->pagination->create_links(),
    			);
    	$this->load->view('layout/wrapper_berita',$data, FALSE);
	}

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */