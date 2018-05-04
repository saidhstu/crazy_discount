<?php
 
 class View_electronic_products extends CI_Controller{




 		public function get_all_electronic_products(){
 			 $getproducts=$this->Product_public->get_all_Cell_phone();

			$this->load->view('public/cell_phone',['getproducts'=>$getproducts]);

 		}


 		 public function view_TV_samsung(){

	  	   $getproducts=$this->Product_public->view_Computer_samsung();

			$this->load->view('public/Desktop',['getproducts'=>$getproducts]);
			
		}

	   public function view_TV_Apple(){

			  $getproducts=$this->Product_public->view_Computer_Apple();

			$this->load->view('public/Desktop',['getproducts'=>$getproducts]);
			
		}
		 public function view_TV_Intel(){

	  	 $getproducts=$this->Product_public->view_Computer_Intel();

			$this->load->view('public/Desktop',['getproducts'=>$getproducts]);
			
		}

		 public function view_TV_Asus(){

	   		 $getproducts=$this->Product_public->view_Computer_Asus();

			$this->load->view('public/Desktop',['getproducts'=>$getproducts]);
		}
		 public function view_TV_HP(){

	  	   $getproducts=$this->Product_public->view_Computer_HP();

			$this->load->view('public/Desktop',['getproducts'=>$getproducts]);
		}
		 public function view_TV_Dell(){

	   		$getproducts=$this->Product_public->view_Computer_Dell();

			$this->load->view('public/Desktop',['getproducts'=>$getproducts]);
			
		}
		 public function view_TV_Acer(){

    		 $getproducts=$this->Product_public->view_Computer_Acer();

			$this->load->view('public/Desktop',['getproducts'=>$getproducts]);
		}


 		

 }