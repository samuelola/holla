<?php 

if(isset($_GET['edit_id'])){
   
   $edit_user = $_GET['edit_id'];

   $user = User::find_by_id($edit_user);

   if(isset($_POST['update_user'])){
      
      $user_update = new User();
      
      $user_update->id = $edit_user;
      $user_update->name = $_POST['name'];
      $user_update->email = $_POST['email'];
      $password = $_POST['password'];
      $the_pass = password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
      $user_update->password = $the_pass;


      if($user_update->update_user()){

         $user_update->set_message("User has been updated!");

         header("Location:index.php?view_users");
      }

   }

   
  

}


 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
   <p> <?php echo  isset($message) ? $message : '' ?> </p>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
    <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addUserModal"></i>Add User</a> -->
  </div>

  <!-- Content Row -->
 

  <!-- Content Row -->

  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-8">
        <form action="" method="post">
           
          <div class="col-md-8">
            <div class="form-group">
               <label for="Name">Name:</label>
               <input type="text" class="form-control" name="name" value="<?php echo $user->name ?>">
               
            </div>

             <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user->email ?>">
                
            </div>

             <div class="form-group">
               
               <label for="Password">Password:</label>
               <input type="password" class="form-control" name="password" value="<?php echo $user->password ?>">
               
            </div>

             <div class="form-group">
                <input type="submit" class="btn btn-success btn-sm" name="update_user" value="Update_user">
            </div>
             
            

            
          </div>

        </form>
    </div>
   
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->


   
  </div>

</div>
<!-- /.container-fluid -->