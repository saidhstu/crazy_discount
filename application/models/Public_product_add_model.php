<?php 

	class Public_product_add_model extends CI_Model{

           public function __construct() {
                parent::__construct();
            
                 if(! $this->session->userdata('logged_in')){
              return redirect('Public_login');
            }

      }

 public function user_profile_details(){

       $a= $this->session->userdata('logged_in');
                        $user_id=($a['user_id']);
                       

                $query= $this->db
                                 ->select('*')
                                 ->from('tbl_user')                          
                                 ->where('user_id', $user_id)
                                 ->get();
                           return $query->row();


    }


    public function getPassword(){


       $a= $this->session->userdata('logged_in');
                        $user_id=($a['user_id']);
                       

                $query= $this->db
                                 ->select('*')
                                 ->from('tbl_user')                          
                                 ->where('user_id', $user_id)
                                 ->get();
                           return $query->row();


    }

       public function update_brand($user_id, $data){

          return $this->db
              ->select('*')
              ->where('user_id',$user_id)
              ->update('tbl_user',$data);

    }

    public function updatePass($npass){
        $a= $this->session->userdata('logged_in');
                        $user_id=($a['user_id']);
     $data=array(
        'password'=>$new_password
        );
      return $this->db->where('user_id',$user_id)
                      ->update('tbl_user',$data);


    }

    public function changePassword()
        {
           $a= $this->session->userdata('logged_in');
           $user_id=($a['user_id']);
            $pass=$this->input->post('password');
            $npass=$this->input->post('new_password');
            $rpass=$this->input->post('re_password');
            if($npass!=$rpass){
                return "false";
            }else{
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_id', $user_id);
                $this->db->where('password',md5($pass));
                $query = $this->db->get();
                if($query->num_rows()==1){
                    $data = array(
                                   'password' => md5($npass)
                                );
                    
                    $this->db->update('tbl_user', $data); 
                    return "true";
                }else{
                    return "false";
                }
            }
        }

	 public function addproduct($data){
                /*echo "<pre>";
                 print_r($data);die;*/
 
           if(!array_key_exists("created",$data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists("modified",$data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            $insert = $this->db->insert('tbl_product', $data);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
     }




     public function productlist($limit, $offset){

                        $a= $this->session->userdata('logged_in');
                        $user_id=($a['user_id']);
                       

                        $query=$this->db->select('tbl_product.id,tbl_product.productName, tbl_category.catName, tbl_brand.brandName, main_price,offer_price,images,percentage')
                              ->from('tbl_product')
                              
                              ->join('tbl_category','tbl_category.id = tbl_product.cat_id','left')
                              ->join('tbl_brand','tbl_brand.id=tbl_product.brand_id','left')
                              ->where('user_id', $user_id)
                              ->limit($limit, $offset)
                              ->get();
                               return $query->result();


                              
                              
               /*  $this->db->limit($limit, $offset);

                $sql = " SELECT tbl_product.id,tbl_product.productName,tbl_category.catName,tbl_brand.brandName,main_price,offer_price,images
                         FROM tbl_product LEFT JOIN tbl_category ON tbl_category.id = tbl_product.cat_id 
                         LEFT JOIN tbl_brand ON tbl_brand.id=tbl_product.brand_id ";
                                              
                    $row = $this->db->query($sql);
                    return $row->result();*/



                   

               
             }

              public function update_product($product_id, $data){
                // echo $product_id;
               // echo "<pre>";
                // print_r($data);die;

                            $this->db
                                    ->select('*')
                                    ->where('id',$product_id)
                                    ->update('tbl_product',$data);

                }


              public function delete_product($product_id){

          return $this->db->delete('tbl_product',['id'=>$product_id]);

    }


               public function find_product($product_id){

                        $a= $this->session->userdata('logged_in');
                       $user_id=($a['user_id']);
                $query=$this->db->select('*')
                         ->from('tbl_product')
                         ->where('user_id', $user_id)
                         ->where('id', $product_id)
                         ->get();

                return $query->row();

    }



}
