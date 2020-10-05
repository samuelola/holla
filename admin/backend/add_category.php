<?php 

$message = "";

if(isset($_POST['add_category'])){

   $category = new Category();

   $name = trim($_POST['category_name']);

   $errors = [];

   

   if(empty($name)){

     $errors['category_name'] = "category name field cannot be empty!";
     
   }


  
   if(empty($errors)){

       $category->category_name =$name;
      

      if($category->add_category()){

         $category->set_message("Category has been created!");

         // header("Location:index.php?add_category");
      } 

      else{

          $category->set_message("Category has not been created!");
      }
      
   }



}


 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
   <?php

      $category_msg = new Category();

      $category_msg->display_message();

    ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
    <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addUserModal"></i>Add User</a> -->
  </div>

  <!-- Content Row -->
 

  <!-- Content Row -->

  <div class="row">
    
    <div class="col-md-6">
        <form action="" method="post">
           
          <div class="col-md-8">
            <div class="form-group">
               <label for="category_name">Category name:</label>
               <input type="text" class="form-control" name="category_name" value="<?php echo isset($category_name) ? $category_name : '' ?>">
               <p class="text-danger"><?php echo  isset($errors['category_name']) ? $errors['category_name'] : '' ?></p>
            </div>

             

             <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" name="add_category" value="Add Category">
            </div>
             
            

            
          </div>

        </form>


    </div>
    
    <div class="col-md-6">
      <div class="table-responsive-sm">
       <table class="table table-striped table-condensed table-bordered">
          
            <thead>
               <tr>
                
                 <th>Category Name</th>
                 <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                 
                 $page = !empty($_GET['page_cat']) ? (int)$_GET['page_cat'] : 1;
                 $items_per_page = 2;
                 $item_total_count = Category::count_all();

                 $paginate = new Paginate($page,$items_per_page,$item_total_count);

                 $sql = "SELECT * FROM categories ";
                 $sql .= "LIMIT {$items_per_page} ";
                 $sql .= "OFFSET {$paginate->offset()} ";

                 $categories = Category::find_by_query($sql);
                 $sn =0;
                 foreach( $categories as  $category){
                    $sn +=1;
                   ?>
                     
                     <tr>
                       
                         <td><?php echo  $category->category_name ?></td>
                        
                       
                          <td>
                            <a href="index.php?edit_category&edit_id=<?php echo $category->id ?>"><i class="text-success fa fa-edit"></i></a> &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp;
                            <a onclick="javascript: return confirm('Do you want to delete?')" href="index.php?delete_category&id=<?php echo $category->id ?>"><i class=" text-danger fa fa-trash"></i></a>
                          </td>

                       </tr>

                   <?php
                 }

                ?> 


            </tbody>
         
       </table>
    </div>
       <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
         <ul class="pagination">
        

           <?php
             
               if($paginate->page_total() > 1){
                   
                   if($paginate->has_previous()){

                      echo  "<li class='paginate_button page-item previous' id='dataTable_previous'><a aria-controls='dataTable' data-dt-idx='0' href='index.php?page_cat={$paginate->previous()}' tabindex='0' class='page-link'>Previous</a></li>";
                   }

                   
                     for ($i=1; $i <= $paginate->page_total(); $i++) { 
                       
                        if($i == $paginate->current_page){

                         echo "<li class='paginate_button page-item active' ><a aria-controls='dataTable' data-dt-idx='{$i}' tabindex='0' class='page-link' href='index.php?page_cat={$i}'>{$i}</a></li>";

                        }
                        else{

                           echo "<li  class='paginate_button page-item' ><a aria-controls='dataTable' data-dt-idx='{$i}' tabindex='0' class='page-link' href='index.php?page_cat={$i}'>{$i}</a></li>";
                        }
                     }
                    

                   

                    if($paginate->has_next()){

                       echo  "<li class='paginate_button page-item next' id='dataTable_next'><a aria-controls='dataTable' data-dt-idx='{$i}' href='index.php?page_cat={$paginate->next()}' tabindex='0' class='page-link'>Next</a></li>";
                   }
               }
           ?>
           

         </ul>

       </div>
    </div>
    
    
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->


   
  </div>

</div>
<!-- /.container-fluid -->