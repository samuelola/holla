<?php 

$message = "";

if(isset($_POST['add_product'])){


   $product_name = trim($_POST['product_name']);

   $product_category = trim($_POST['product_category']);


   $product_price = trim($_POST['product_price']);


   $product_qty = trim($_POST['product_qty']);

  
   $errors = [];

   if(empty($product_name)){

     $errors['product_name'] = "product name field cannot be empty!";

   }

   if(empty($product_category)){

     $errors['product_category'] = "product category field cannot be empty!";
     
   }


   if(empty($product_price)){

     $errors['product_price'] = "product price cannot be empty!";
     
   }


   if(empty($product_qty)){

     $errors['product_qty'] = "product qty field cannot be empty!";
     
   }

   if(empty($errors)){

     $product = new Product();
      
      $product->product_name = $product_name;

      $product->product_category = $product_category;


      $product->product_price = $product_price;


      $product->product_qty = $product_qty;

      if($product->add_product()){

         $product->set_message("product has been created!");

         header("Location:index.php?view_products");
      } 

      else{

          $product->set_message("product has not been created!");

      }
      
   }



}


 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
   <p> <?php echo  isset($message) ? $message : '' ?> </p>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
    <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
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
               <input type="text" class="form-control" name="product_name" value="<?php echo isset($product_name) ? $product_name : '' ?>">
               <p class="text-danger"><?php echo  isset($errors['product_name']) ? $errors['product_name'] : '' ?></p>
            </div>

             <div class="form-group">
                <label for="Product_category">Product category:</label>
                <select class="form-control" name="product_category">
                   <option value="">--Select Categories--</option>
                  <?php 

                      $categories = Category::find_all();

                      foreach ($categories as $category) {
                        
                          ?><option value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option><?php
                      }
                   ?>
                   
                   
                </select>
                
                <p class="text-danger"><?php echo  isset($errors['product_category']) ? $errors['product_category'] : '' ?></p>
            </div>

             <div class="form-group">
               
               <label for="Product_price">Product price:</label>
               <input type="text" class="form-control" name="product_price" value="<?php echo isset($product_price) ? $product_price : '' ?>">
               <p class="text-danger"><?php echo  isset($errors['product_price']) ? $errors['product_price'] : '' ?></p>
            </div>

            <div class="form-group">
               
               <label for="Product_qty">Product quantity:</label>
               <input type="text" class="form-control" name="product_qty" value="<?php echo isset($product_qty) ? $product_qty : '' ?>">
               <p class="text-danger"><?php echo  isset($errors['product_qty']) ? $errors['product_qty'] : '' ?></p>
            </div>

             <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" name="add_product" value="Add Product">
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