<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

	private $tbl  	= 'post';
	private $id 	='id_post';
	var $column_order = array(null,'judul_post','isi','status_post','date_created');
	var $column_search = array('judul_post','isi','date_created','jenis_post');
	var $order = array('id_post' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

// PAGINATION
	// menghitung total 
	function total_record_kesehatan() {
        $this->db->from($this->tbl);
        $this->db->where(array('status_post'=>'publish','jenis_post'=>'kesehatan'));
        return $this->db->count_all_results();
    }

	//    tampilkan dengan limit
    function posting_limit_kesehatan($limit, $start = 0) {
    	$this->db->select('*');
		$this->db->from('post');
        $this->db->where(array('status_post'=>'publish','jenis_post'=>'kesehatan'));
		$this->db->order_by('date_created','DESC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    // menghitung total 
	function total_record_berita() {
        $this->db->from($this->tbl);
        $this->db->where(array('status_post'=>'publish','jenis_post'=>'berita'));
        return $this->db->count_all_results();
    }

	//    tampilkan dengan limit
    function posting_limit_berita($limit, $start = 0) {
    	$this->db->select('*');
		$this->db->from('post');
        $this->db->where(array('status_post'=>'publish','jenis_post'=>'berita'));
		$this->db->order_by('date_created','DESC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
// END PAGINATION

	public function read($slug_post){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('slug_post',$slug_post);
		// $this->db->order_by('id_post','ASC');
		// $this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->order_by($this->id,'DESC');
		$q = $this->db->get();
		return $q->result();
	}

	public function listing_limit()
	{
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->order_by('date_created','DESC');
		$this->db->limit(4);
		$q = $this->db->get();
		return $q->result();
	}

	public function tambah($data)
	{
		$this->db->insert($this->tbl,$data);
	}

	public function edit($data)
	{
		$this->db->where($this->id,$data['id_post']);
		$this->db->update($this->tbl,$data);

	}

	public function delete($data){
		$this->db->where($this->id,$data['id_post']);
		$this->db->delete($this->tbl,$data);
	}

	public function detail($id_post){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where($this->id,$id_post);
		$this->db->order_by($this->id,'DESC');
		$query  = $this->db->get();
		return $query->row();
	}

	// datatable serverside
	private function _get_datatables_query()
	{
		
		$this->db->from($this->tbl);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->tbl);
		return $this->db->count_all_results();
	}
	

}

/* End of file Artikel_model.php */
/* Location: ./application/models/Artikel_model.php */