<?php
  ob_start(); 
  session_start();
  include"includes/database.php";
  include"includes/db_object.php";
  include"includes/users.php";
 ?>

 <?php 

 if(isset($_POST['login_user'])){
    
   $email = $_POST['email'];
   $password = $_POST['password'];

   $errors = [];

   if(empty($email)){
      
      $errors['email'] = "<p class='text-danger'>Email field is required!</p>";
   }

    if(empty($password)){
      
      $errors['password'] = "<p class='text-danger'>Password field is required!</p>";
   }

   if(empty($errors)){
     
     $found_user = User::verify_user($email,$password);

      if($found_user){

         $_SESSION['user_id'] = $found_user->id;

         header("Location:admin/index.php");
      }


   }

 }


  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inventory System - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
  <link href="./admin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9" style="margin-top: 50px;">
         <p style="color:#000;font-weight:400; font-size: 25px;text-align: center; margin-bottom:-20px; "><i>Toymak Kitchen Utensils Inventory Portal<i></p>
        <div class="card o-hidden border-0 shadow-lg my-5">

          <div class="card-body p-0" >
            <!-- Nested Row within Card Body -->
        

            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"><img src="images/tok.png" alt=""></div>
              <!-- <div class="col-lg-6"></div> -->
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Here !</h1>
                  </div>
                  <form method="post" action="">
                  
                    <div class="form-group">
                      <input  type="email" name="email" value="<?php echo isset ($email) ? $email : '' ?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      <p><?php echo isset($errors['email']) ? $errors['email'] : '' ?></p>
                    </div>
                    <div class="form-group">
                      <input type="password" value="<?php echo isset ($password) ? $password : '' ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Enter Password ..." name="password">
                      <p><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                 <!--    <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="login_user">Login</button>
                    <!-- <hr> -->
                   <!--  <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                 <!--  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div> -->
                 <!--  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="./admin/vendor/jquery/jquery.min.js"></script>
  <script src="./admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  
 
  <script src="./admin/js/sb-admin-2.js"></script>

</body>

</html>
