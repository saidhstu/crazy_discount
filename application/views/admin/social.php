<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('admin_header.php');?>
<?php include('admin_sidebar.php');?>
        <style>
            table{}
            table tr{}
            table tr td{}
          

        </style>
<div class="grid_10">
    <div class="box round first grid">
        <h2   >Update Social Media</h2>
        <div class="block">               
          <?php echo form_open("Admin_dashboard/update_social/{$socials->social_id}"); ?>
            <table class="form">
            <?php if($feedback =$this->session->flashdata('feedback')): ?>

                              <div class="alert alert-dismissible alert-success">
                                 <?= $feedback; ?>
                               </div>
                               <?php endif; ?>
					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>

                              <?php echo form_input(array('id' => 'facebook','type'=>'url', 'name' => 'facebook','value'=>set_value('facebook',$socials->facebook))); ?><br />

                               <?php echo form_error('facebook'); ?>
                       
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>

                              <?php echo form_input(array('id' => 'twitter','type'=>'url', 'name' => 'twitter','value'=>set_value('twitter',$socials->twitter))); ?><br />

                               <?php echo form_error('twitter'); ?>
                      
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>

                              <?php echo form_input(array('id' => 'linkedin','type'=>'url', 'name' => 'linkedin','value'=>set_value('linkedin',$socials->linkedin))); ?><br />

                               <?php echo form_error('linkedin'); ?>
                      
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>

                              <?php echo form_input(array('id' => 'googleplus','type'=>'url', 'name' => 'googleplus','value'=>set_value('googleplus',$socials->google_plus))); ?><br />

                               <?php echo form_error('googleplus'); ?>
                      
                    </td>
                </tr>
				
				 <tr>
                    <td></td>

                    <td >
                        <?php echo form_submit(array('id' => 'submit','type' => 'submit','name'=>'submit', 'value' => 'Update')); ?>
                       
                </tr>
            </table>
              <?php echo form_close(); ?>
        </div>
    </div>
</div>


<?php include('admin_footer.php');?>