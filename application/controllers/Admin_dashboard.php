<?php

	class Admin_dashboard extends CI_Controller{


			public function __construct() {
		            parent::__construct();
		            
		             if(! $this->session->userdata('logged_in')){
		        	return redirect('admin');
		        }

			}




		


				public function dashboard(){

				 		
				        $this->load->view('admin/dashboard');

					}


	 public function find_social(){

 
               $this->load->model('Admin_dashboard_model');

                $socials=$this->Admin_dashboard_model->find_social();
                
                $this->load->view('admin/social',['socials'=>$socials]);

          }



		public function update_social($social_id){


           $this->form_validation->set_rules('facebook', 'facebook Name', 'trim|required');
           $this->form_validation->set_rules('twitter', 'twitter Name', 'trim|required');
           $this->form_validation->set_rules('linkedin', 'linkedin Name', 'trim|required');
           $this->form_validation->set_rules('googleplus', 'googleplus Name', 'trim|required');


              if ($this->form_validation->run() == FALSE) {

              return redirect('Admin_dashboard/update_social');

              }
              else{
                $data= array( 
                	'facebook' => $this->input->post('facebook'),
                	'twitter' => $this->input->post('twitter'),
                	'linkedin' => $this->input->post('linkedin'),
                	'google_plus' => $this->input->post('googleplus')

                	); 
              
                unset( $data['submit']);
                $this->load->model('Admin_dashboard_model');

            	$this->Admin_dashboard_model->update_social($social_id,$data);


                $this->session->set_flashdata('feedback', "Social Media updated successfully");
                 $data['message'] = 'Data Updated seccessfully';
           
               return redirect('Admin_dashboard/find_social');

              

             }




				    }

				  public function title(){

				      $this->load->view('admin/title');
				    }
				         
				   public function about_us(){

				   $this->load->view('admin/about_us');
				 }



       public function contact_us(){

             $this->load->view('admin/contact_us');
          }

		

	}