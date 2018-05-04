<?php include('admin_header.php');?>
<?php include('admin_sidebar.php');?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/layout.css');?>">  
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Users List</h2>
                <div class="block"> 
<style>
.table-ccc{background:#593196;color: #fff}
</style>
 <table class="table table-hover">
  <thead>
 <?php if($feedback =$this->session->flashdata('feedback')): ?>

                              <div class="alert alert-dismissible alert-success">
                                 <?= $feedback; ?>
                               </div>
                              <?php endif; ?>
    <tr class="table-ccc">
      <th scope="col">Serial No</th>
      <th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <style>
  input[type=submit] {
width:40%;
background-color:red;
color:#fff;
margin-top: 0px !important;
border:0px solid #FFCB00;
padding:5px;
font-size:16px;
cursor:pointer;
border-radius:5px;
}
#danger{width: 70px;}
.btn-danger{width: 70px;}


  </style>
  <tbody>
  	<?php if(count($users)):
    $count=$this->uri->segment(3, 0);
  	 foreach ($users as $users): ?>
  		
  	
    <tr class="table-default">
      <td><?= ++$count;?></th>
      <td ><?php echo $users->username;?></th>
      <td> <?php echo $users->firstName;?></td>
      <td> <?php echo $users->lastName;?></td>
      <td> <?php echo $users->email;?></td>
       
        <td>
        <?=
            form_open('User_profile/delete_user'),
            form_hidden('user_id', $users->user_id),
            form_submit(array('name' => 'submit','id'=>'danger','class'=>'btn btn-danger','value' =>'Delete','onclick'=>'confirmation()')),
            form_close();
        ?>
      </td>
       
   
  
   <?php 
   endforeach;
endif;
?>
  </tbody>
</table> 
<style>

.page-link {
  position: relative;
  display: block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #593196;
  background-color: #fff;
  border: 1px solid #EDEDED;
}
</style>
<?= $this->pagination->create_links(); ?>
     
               </div>
            </div>
        </div>

        <script>
function confirmation()
{
   var r=confirm("are you sure to delete?")
   if (r==true)
  {
    alert("pressed OK!")
    // call the controller
  }
  else
  {
   alert("pressed Cancel!");
   return false;
  }
}
</script>





<?php include('admin_footer.php');?>

