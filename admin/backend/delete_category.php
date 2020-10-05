<?php 
if(isset($_GET['id'])){
  
   $delete_category = $_GET['id'];

   $category = new Category();

   $category->id = $delete_category;

   if($category->delete_category()){
     
     $category->set_message("Category has been deleted!");

     header("location:index.php?add_category");
   }


}



 ?>