<?php

 class Admin_dashboard_model extends CI_Model{


 	public function user_profile($limit, $offset){

                $query= $this->db
                				 ->select('*')
                				 ->from('tbl_user')          				 
                				 ->limit($limit, $offset)
                				 ->get();
                     return $query->result();


 	}
   
   

    public function find_user($user_id){

		    	$query=$this->db->select(['id','brandName'])
		    			 ->where('id', $user_id)
		    			 ->get('tbl_user');

		    	return $query->row();

    }

    public function num_rows(){

    	 		$query= $this->db
                				 ->select('*')
                				 ->from('tbl_user')
                				 ->get();
                     return $query->num_rows();
    }

     public function delete_user($user_id){

    			return $this->db->delete('tbl_user',['user_id'=>$user_id]);

    }


     public function find_social(){

                $query=$this->db->select('*')
                         ->get('social_media');
                         

                return $query->row();

    }

       public function update_social($social_id, $data){

                return $this->db
                        ->select('*')
                        ->where('social_id',$social_id)
                        ->update('social_media',$data);

    }



 }