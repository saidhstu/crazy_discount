

<div class="sidebar-left"> .

  </div>

  <div id="mains">

       <div class="row">
      
                   
                   <style> 
                      h2{margin-left:30px}
                      ul li {list-style: none !important; padding: 15px}
                      ul li a{text-decoration: none; }
                          .btn-primary {
                            color: #fff;
                            background-color: #593196;
                            border-color: #593196;}
  
                          
                          a:hover {
                                text-decoration: none;
                            }
                        
                        #mains{
                            float:left;
                            width:80%;
                            
                        }
                           
                          img{margin-top: 5px}



                  </style>
                        
                     
              
                                    
                          
                          <strong style="text-right:center;"> Your Search Result</strong> 
                                        
                           
                            </div>
                       
                                  

                         <div class="productblock" style="margin:20px;width:100% !important">
                          <style> .productblock{width:100% !important}</style>

                


                            <?php foreach ($getproducts as $getproduct): ?>

                        
                        
                                  <div class="grid_1_of_4 images_1_of_4"style="border: 2px solid #ddd !important;
                                  width: 23% !important; text-align:center; displa:block; float:left;margin:8px;height:350px">
                                     <a href="<?= base_url('View_product/View_index_details/'.$getproduct->id)?>">
                                      <img src="<?php echo base_url('uploads/').$getproduct->images;?>"height="140px" width="width:100%"/></a>
                                      
                                    
                                     <h4><?php echo word_limiter($getproduct->productName,3);?> </h4>
                                    <p><span class="price">Main price: ৳<?php echo $getproduct->main_price;?></span></p>
                                    <p><span class="price">Percentage: <?php echo $getproduct->percentage;?>%</span></p>
                                     <p><span class="price">Offer price: ৳<?php echo $getproduct->offer_price;?></span></p>
                                     <p><span class="price">Offer End: <?php echo $getproduct->end_date;?></span></p>
                                       <div class="btn btn-primary"><span><a href="<?= base_url('View_product/View_index_details/'.$getproduct->id)?>" 
                                        class="details">Details</a></span></div>
                                    </div>
                                     



                    <?php  endforeach;  ?>
                   
                    </div>
                 
       

    </div>

    
</div>




