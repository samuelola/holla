<?php 
if(isset($_GET['id'])){
  
   $delete_user = $_GET['id'];

   $user = new User();

   $user->id = $delete_user;

   if($user->delete_user()){
     
     $user->set_message("User has been deleted!");

     header("location:index.php?view_users");
   }


   
}



 ?>