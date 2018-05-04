<?php 

class User extends CI_Controller{


								public function index(){
									
									//$this->load->view('public/index');


							            $this->load->model('Product_public');

										$getproducts=$this->Product_public->maximum_percentage();
										$last_dates=$this->Product_public->Offer_end_products();
										$socials=$this->Product_public->Offer_end_products();



										$this->load->view('public/index',['getproducts'=>$getproducts,'last_dates'=>$last_dates]);
									


							}



					public function ajaxsearch()
					    {
					    	$this->load->model('Product_public'); 

					    	$last_dates=$this->Product_public->Offer_end_products();
					      
					       if(is_null($this->input->get('id')))
					        {
					        			$getproducts=$this->Product_public->maximum_percentage();
										

					         $this->load->view('public/output',['getproducts'=>$getproducts,'last_dates'=>$last_dates]); 
							
					        
					        }
					        else
					        {
					      
					
							$getproducts=$this->Product_public->booktable($this->input->get('id'));

					        
					        $this->load->view('public/output',['getproducts'=>$getproducts,'last_dates'=>$last_dates]);
					        
					        }
					        
					       
					    }


					   



    
	





				
			

}