<?php 

$message = "";

if(isset($_POST['create_user'])){

   $user = new User();

   $name = trim($_POST['name']);

   $email = trim($_POST['email']);

   $password = trim($_POST['password']);

   $the_hashed_password = password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
  
   $errors = [];

   if(empty($name)){

     $errors['name'] = "Name field cannot be empty!";

   }

   if(empty($email)){

     $errors['email'] = "Email field cannot be empty!";
     
   }


   if(empty($password)){

     $errors['password'] = "password field cannot be empty!";
     
   }

   if(empty($errors)){

       $user->name = $name;
       $user->email = $email;
       $user->password = $the_hashed_password;

      if($user->add_user()){

        $user->set_message("User has been created!");

         header("Location:index.php?view_users");
      } 

      else{

           $user->set_message("User has not been created!");
      }
      
   }



}


 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
   <p> <?php echo  isset($message) ? $message : '' ?> </p>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
    <h1 class="h3 mb-0 text-gray-800">Add User</h1>
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
               <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : '' ?>">
               <p class="text-danger"><?php echo  isset($errors['name']) ? $errors['name'] : '' ?></p>
            </div>

             <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email : '' ?>">
                <p class="text-danger"><?php echo  isset($errors['email']) ? $errors['email'] : '' ?></p>
            </div>

             <div class="form-group">
               
               <label for="Password">Password:</label>
               <input type="password" class="form-control" name="password" value="<?php echo isset($password) ? $password : '' ?>">
               <p class="text-danger"><?php echo  isset($errors['password']) ? $errors['password'] : '' ?></p>
            </div>

             <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" name="create_user" value="Create User">
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