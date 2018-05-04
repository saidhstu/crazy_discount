<?php

	class Product extends CI_Controller{

			public function __construct() {
		            parent::__construct();
                   $this->load->model('Public_product_add_model');
		            $this->load->model('Product_model');
		             if(! $this->session->userdata('logged_in')){
		        	return redirect('admin');
		        }

			}

         public function add(){

            $id= $this->input->post('id');
            $brand_id= $this->input->post('brand_id');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('productName', 'Product Name', 'trim|required');
            $this->form_validation->set_rules('id', 'Category', 'required|callback_select_validate');
            $this->form_validation->set_rules('brand_id', 'Brand', 'required|callback_select_validate1');
            $this->form_validation->set_rules('textarea', 'Description', 'trim|required');
            $this->form_validation->set_rules('price', 'Main Price', 'trim|required');
            $this->form_validation->set_rules('percentage', 'Percentage', 'required');
            $this->form_validation->set_rules('offer', 'Percentage', 'required');
            $this->form_validation->set_rules('source', 'Product source', 'trim|required');
            $this->form_validation->set_rules('start_date', 'Start Data', 'trim|required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required');
          

            if (empty($_FILES['picture']['name']))
            {
              $this->form_validation->set_rules('picture', 'Image', 'required');
           }

          
   

        /*if($this->input->post('submit'))*/

        if ($this->form_validation->run() == true){


            
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){

                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $_FILES['picture']['name'];
                        
                        //Load upload library and initialize configuration
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                
                                    if($this->upload->do_upload('picture')){
                                        $uploadData = $this->upload->data();
                                        $picture = $uploadData['file_name'];
                                    }

                          else{
                              $picture = '';
                          }


                      }



            else{
                $picture = '';
            }
            

            // $start_date = $this->input->post('start_date');

            // $start_date = date("Y-m-d hh:mm:ss", strtotime($start_date));
             //$end_date   = $this->input->post('end_date');
            // $end_date   = date("Y-m-d hh:mm:ss", strtotime($end_date));
            //Prepare array of user data
            $data = array(

                  'productName'     => $this->input->post('productName'),
                  'cat_id'          => $id,
                  'brand_id'        => $brand_id,
                  'description'     => $this->input->post('textarea',false),
                  'main_price'      => $this->input->post('price'),
                  'percentage'      => $this->input->post('percentage'),
                  'offer_price'     => $this->input->post('offer'),
                  'source'          => $this->input->post('source',false),
                  'start_date'      => $this->input->post('start_date'),
                  'end_date'        => $this->input->post('end_date'),
                  'images'          => $picture
                  
            );
          


            //Pass user data to model
            $data = $this->Public_product_add_model->addproduct($data);
           
            //Storing insertion status message.
            if($data){
                $this->session->set_flashdata('success_msg', 'Your Product have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }

             $brands=$this->Product_model->brandlist();
             $categories=$this->Product_model->categorylist();
      
        $this->load->view('admin/product_add',['brands'=>$brands,'categories'=>$categories]);
    }



   public function select_validate($id)
                    {
                      
                        if($id=="none"){
                        
                          $this->form_validation->set_message('select_validate', "please Select Category Name");
                          return false;
                        
                        } else{
                           
                        return true;
                      }
                         }
            

         public function select_validate1($barnd_id){
              if($barnd_id=="nothing")
              {
                  $this->form_validation->set_message('select_validate1', "please Select Brand Name");
              return false;
                 
              }
              else{
               return true;
                 
              }
          }




   public function productlist(){
      $this->load->library('pagination');

        $config=[
            'base_url'          => base_url('Product/productlist'),
            'per_page'          => 7,
            'total_rows'        => $this->Product_model->num_rows(),
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

        $products=$this->Product_model->productlist($config['per_page'],$this->uri->segment(3));

        $this->load->view('admin/product_list', ['products'=>$products]);
    }


    public function product_edit($product_id){

             $brands=$this->Product_model->brandlist();
             $categories=$this->Product_model->categorylist();
           
           $products=$this->Product_model->find_product($product_id);
         
           $this->load->view('admin/product_edit',['products'=>$products,'brands'=>$brands,'categories'=>$categories]);
          
        }
 







    public function delete_brand(){
      $brand_id=($this->input->post('brand_id'));
      if($this->Brand_model->delete_brand( $brand_id)){
        $this->session->set_flashdata('feedback', "Brand Deleted successfully.");
      }
      else{
        $this->session->set_flashdata('feedback', "Brand Deleted Failed.");
      }

      return redirect('Brand/brandlist');
    }

     public function delete_product(){
          $product_id=($this->input->post('product_id'));
          if($this->Public_product_add_model->delete_product( $product_id)){
            $this->session->set_flashdata('feedback', "Product Deleted successfully.");
          }
          else{
            $this->session->set_flashdata('feedbac', "Product Deleted Failed.");
          }

          return redirect('Product/productlist');
        }

}