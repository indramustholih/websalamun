<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	private $tbl  	= 'gallery';
	private $id 	='id_gallery';
	var $column_order = array(null,'gambar','deskripsi','date_created');
	var $column_search = array('deskripsi','date_created');
	var $order = array('id_gallery' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function slider_limit()
	{
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('jenis_gambar','slider');
		$this->db->order_by($this->id,'DESC');
		$this->db->limit(8);
		$q = $this->db->get();
		return $q->result();
	}

// PAGINATION
	// menghitung total 
	function total_record() {
        $this->db->from($this->tbl);
        // $this->db->where(array('jenis_gambar'=>'gallery'));
        return $this->db->count_all_results();
    }

	//    tampilkan dengan limit
    function gallery_limit($limit, $start = 0) {
    	$this->db->select('*');
		$this->db->from($this->tbl);
        // $this->db->where(array('jenis_gambar'=>'gallery'));
		$this->db->order_by('date_created','DESC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
// END PAGINATION

	public function listing()
	{
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->order_by($this->id,'DESC');
		$q = $this->db->get();
		return $q->result();
	}

	public function tambah($data)
	{
		$this->db->insert($this->tbl,$data);
	}

	public function edit($data)
	{
		$this->db->where($this->id,$data['id_gallery']);
		$this->db->update($this->tbl,$data);

	}

	public function delete($data){
		$this->db->where($this->id,$data['id_gallery']);
		$this->db->delete($this->tbl,$data);
	}

	public function detail($id_gallery){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where($this->id,$id_gallery);
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