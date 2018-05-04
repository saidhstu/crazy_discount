<?php

 class View_electronic_model extends CI_Model{


 	public function get_all_electronic_product(){


 		$query=$this->db->select('*')
 						->from('tbl_product')
 						->where('cat_id', '24')
 						->get();

 			return $query->result();

 	
 	}


  public function view_Computer_Apple(){

	  	$query=$this->db->select('*')
	 						->from('tbl_product')
	 						->where('brand_id', '3')
	 						->where('cat_id', '24')
	 						->get();

	 					return $query->result();
			
		}

		 public function view_Computer_Asus(){

	  	$query=$this->db->select('*')
	 						->from('tbl_product')
	 						->where('brand_id', '16')
	 						->where('cat_id', '24')
	 						->get();

	 					return $query->result();
			
		}
		 public function view_Computer_HP(){

	  	$query=$this->db->select('*')
	 						->from('tbl_product')
	 						->where('brand_id', '13')
	 						->where('cat_id', '24')
	 						->get();

	 					return $query->result();
			
		}
		 public function view_Computer_Dell(){

	  	$query=$this->db->select('*')
	 						->from('tbl_product')
	 						->where('brand_id', '2')
	 						->where('cat_id', '24')
	 						->get();

	 					return $query->result();
			
		}
		 public function view_Computer_Acer(){

	  	$query=$this->db->select('*')
	 						->from('tbl_product')
	 						->where('brand_id', '14')
	 						->where('cat_id', '24')
	 						->get();

	 					return $query->result();
			
		}
		 public function view_Computer_Intel(){

	  	$query=$this->db->select('*')
	 						->from('tbl_product')
	 						->where('brand_id', '15')
	 						->where('cat_id', '24')
	 						->get();

	 					return $query->result();
			
		}


 }