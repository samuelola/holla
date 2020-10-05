<?php 
if(isset($_GET['id'])){
  
   $delete_product = $_GET['id'];

   $product = new Product();

   $product->id = $delete_product;

 
   if($product->delete_product()){
      
      $product->set_message("Product has been deleted!");

      header("location:index.php?view_products");

   }

  
}



 ?>