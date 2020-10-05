<?php 

if(isset($_GET['edit_id'])){
   
   $edit_product = $_GET['edit_id'];

   $product = Product::find_by_id($edit_product);

   if(isset($_POST['update_product'])){
      
      $product_update = new Product();
      
      $product_update->id = $edit_product;
      $product_update->product_name = $_POST['product_name'];
      $product_update->cat_id = $_POST['product_category'];
      $product_update->product_price = $_POST['product_price'];
      $product_update->product_qty = $_POST['product_qty'];

      if($product_update->update_product()){

         $product_update->set_message("Product has been updated!");

         header("Location:index.php?view_products");
      }

   }

   
  

}


 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
   
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
    <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
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
               <label for="Product_name">Product name:</label>
               <input type="text" class="form-control" name="product_name" value="<?php echo $product->product_name ?>">
             
            </div>

              <div class="form-group">
                 <label for="Product_category">Product category:</label>
                 <select class="form-control" name="product_category">
                    
                   <?php 

                       $categories = Category::find_all();

                       foreach ($categories as $category) {

                          if($category->id == $product->cat_id){
                            
                            ?><option selected="" value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option><?php
                          }
                          else{
                              
                              ?><option value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option><?php

                          }
                         
                           
                       }
                    ?>
                    
                    
                 </select>
                 
                
             </div>

             <div class="form-group">
               
               <label for="Product_price">Product price:</label>
               <input type="text" class="form-control" name="product_price" value="<?php echo $product->product_price ?>">
               
            </div>

            <div class="form-group">
               
               <label for="Product_qty">Product quantity:</label>
               <input type="text" class="form-control" name="product_qty" value="<?php echo $product->product_qty ?>">
              
            </div>

             <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" name="update_product" value="Update Product">
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