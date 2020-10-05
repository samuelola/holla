<?php 

if(isset($_GET['edit_id'])){
   
   $edit_cat = $_GET['edit_id'];

   $cat = Category::find_by_id($edit_cat);

   if(isset($_POST['update_category'])){
      
      $category_update = new Category();
      
      $category_update->id = $edit_cat;
      $category_update->category_name = $_POST['category_name'];
      


      if( $category_update->update_category()){

         $category_update->set_message("Category has been Updated!");

         header("Location:index.php?add_category");
      }

   }

   
  

}


 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
   <p> <?php echo  isset($message) ? $message : '' ?> </p>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
    <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
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
               <label for="Name">Category Name:</label>
               <input type="text" class="form-control" name="category_name" value="<?php echo $cat->category_name ?>">
               
            </div>

            

             <div class="form-group">
                <input type="submit" class="btn btn-success btn-sm" name="update_category" value="Update_category">
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