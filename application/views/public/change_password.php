<html>
<head>
		<style>		
	#sidebar-left{	float:left;width:25%;}
	#main{float:left;width:50%;}
	#sidebar-right{float:left;width:10%;}
	#footer{clear:both;height: 50px;width: 100%;text-align: center;}
	#sidebar-left, #main, #sidebar-right{min-height: 300px}
  input, select {
    width: 100%;
    padding: 10px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    height: 35px;
  
}
.alert-danger{padding:5px}
.input_error{margin-left:10px; color:red; font-size: 15px;}

		</style>
	
	</head>
	
	
	<body>
		
<div id="header">
  <?php include('public_dashboard_header.php');?>
</div>


	
		<div id="main" >





<div class="grid_10">
    <div class="box round first grid" style="margin-left:200px">
      
     
        <h2 style="margin-bottom:40px; margin-top:100px;color:Green">Change Password</h2>
         
                    <div class="err_msg" style="color:red; margin-left:100px; margin-bottom:30px;">
                      <?php
                          echo "<div class='error_msg'>";
                          if (isset($error_message)) {
                          echo $error_message;
                          }
                       
                          echo "</div>";
                          ?>

                        </div>
                        
        <div class="block">               
         <div class="success" style="color:green; margin-left:100px; margin-bottom:30px;">
                          <?php
                          if (isset($feedback)) {
                          echo "<div class='message'>";
                          echo $feedback;
                          echo "</div>";
                          }
                          ?>
                        </div>
           <?php echo form_open('User_profile/change_password'); ?>
            <table class="form">          
                <tr>
                    <td>
                        
                        <label>Old Password</label>
                    </td>
                    <td>
           <?php echo form_input(array('type'=>'password', 'name' => 'password','placeholder' => 'Enter Your Old Password...')); ?><br />
            
                    </td>
                      
                    <td> 
                      <div class="input_error">
                      <?php echo form_error('password'); ?>
                        
                    </div>
                  </td>
                </tr>
         <tr>
             
            <td>
                <label>New Password</label>
            </td>
            <td>
           <?php echo form_input(array('id' => 'new_password','type'=>'password', 'name' => 'new_password','placeholder' => 'Enter New Password...')); ?><br />
         
          </td>
           <td> 
                      <div class="input_error" style="background:none; border:none;margin-left:10px;">
                      <?php echo form_error('new_password'); ?>
                    </div>
                  </td>
        </tr>
         
           <tr>
             
            <td>
                <label>Re Password</label>
            </td>
            <td>
           <?php echo form_input(array('id' => 're_password','type'=>'password', 'name' => 're_password','placeholder' => 'Enter Password Again...')); ?><br />
         
          </td>
           <td> 
                      <div class="input_error" style="background:none; border:none;margin-left:10px;">
                      <?php echo form_error('re_password'); ?>
                    </div>
                  </td>
        </tr>
    
       
         <tr>
              <td></td>

              <td >
                   <?php echo form_submit(array('id' => 'submit','class'=>'btn btn-success','type' => 'submit','name'=>'submit', 'value' => 'Update')); ?>
              </td>
        </tr>
            
          <?php  echo form_close(); ?>
          <tr></tr>
         

          </table>
        </div>
    </div>
</div>


</div>


	
		<div id="footer"><?php include('public_footer.php');?></div>
	</body>
</html> 

