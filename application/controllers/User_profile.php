<?php
 
 class User_profile extends CI_Controller{


 	 public function __construct() {
            parent::__construct();
            $this->load->model('Admin_dashboard_model');
            $this->load->model('Public_product_add_model');
             if(! $this->session->userdata('logged_in')){
        	return redirect('admin');
       }
                }


 		public function user_list(){
					

	   $this->load->library('pagination');

					        $config=[
					            'base_url'          => base_url('User_profile/user_list'),
					            'per_page'          => 6,
					            'total_rows'        => $this->Admin_dashboard_model->num_rows(),
					            'full_tag_open'     =>"<ul class='pagination'><li class='page-item disabled'>",
					            'full_tag_close'    =>'</li></ul>',
					            'first_link_open'    =>"<a class='page-link disabled'>",
					            'last_link_close'    =>'</li>',
					            'next_tag_open'     =>"<li class='page-item'><a class='page-link'",
					            'next_tag_close'    =>'</a></li>',
					            'prev_tag_open'     =>"<li class='page-item'><a class='page-link'",
					            'prev_tag_close'    =>'</a></li>',
					            'num_tag_open'      =>"<li class='page-item'><a class='page-link'",
					            'num_tag_close'     =>'</a></li>',
					            'cur_tag_open'      =>"<li class='page-item active'><a class='page-link'>",
					            'cur_tag_close'     =>'</a></li>',

					        ];


					        $this->pagination->initialize($config);

					        $users=$this->Admin_dashboard_model->user_profile($config['per_page'],$this->uri->segment(3));



					        $this->load->view('admin/user_list', ['users'=>$users]);


			}



    public function delete_user(){
      $user_id=($this->input->post('user_id'));
      if($this->Admin_dashboard_model->delete_user( $user_id)){
        $this->session->set_flashdata('feedback', "User Deleted successfully.");
      }
      else{
        $this->session->set_flashdata('feedback', "User Deleted Failed.");
      }

      return redirect('User_profile/user_list');
    }

   public function user_profile_details(){

           $this->load->model('Public_product_add_model');
           $users=$this->Public_product_add_model->user_profile_details();

	       $this->load->view('public/user_profile', ['users'=>$users]);

					    	
   }

 public function pass_change(){
 	   $this->load->view('public/change_password');

 }

        

 public function change_password(){



                     $a= $this->session->userdata('logged_in');
                        $user_id=($a['user_id']);

                      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');

			 	     $this->form_validation->set_rules('new_password', 'Password', 'trim|required|min_length[6]|max_length[15]');
                  	 $this->form_validation->set_rules('re_password', 'Again Password', 'trim|required|min_length[6]|max_length[15]|matches[new_password]');
                         
                          if ($this->form_validation->run() ==false)
						        {
						           
						             $data = array(
                								'error_message' => 'password Updated Failed'
             

              						);
						             $this->load->view('public/change_password',$data);

						        }


						        else {
						            $this->load->model('Public_product_add_model');
						            

						             $a= $this->session->userdata('logged_in');
                                     $user_id=($a['user_id']);

                                     $pass=$this->Public_product_add_model->getPassword();
                                   

                                        $password=$this->input->post('password');
							            $npass=$this->input->post('new_password');
							            $rpass=$this->input->post('re_password');

                                           
									             	  

									             if($pass->password!=$password){


									                return false;
									            }

							            else{


							            	
							            	 $data= array( 'password' => $npass

							            	 	); 

                                        
							            	
                                      unset( $data['submit']);

							            	 $this->Public_product_add_model->update_brand( $user_id,$data);

							            	 $this->session->set_flashdata('feedback', "Password updated successfully");
							            	   $this->session->set_flashdata('feedback', "Brand updated successfully");

							            	      $datac = array(
                								'feedback' => 'password Updated Successfully'
             

              						);
							            	 $this->load->view('public/change_password',$datac);


							            }

 

						        }
               



               }

	






	}