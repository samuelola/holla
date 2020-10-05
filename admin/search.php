<?php include "frontend/header.php" ?>

<?php 

if(isset($_SESSION['user_id'])){
  

}
else{

  header("Location:../index.php");
}

 ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "frontend/sidebar.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include "frontend/navbar.php" ?>
        <!-- End of Topbar -->


<div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-12 col-md-6"><h1 class="h3 mb-2 text-gray-800">All Products</h1></div>
              <!-- <div class="col-sm-12 col-md-6"> 
                <form action="search.php" method="post">
                    <p><input style="margin-left:200px; " type="text" name="search_me"  required="" class="form-controll form-control-sm">
                    <input style="margin-top: -60px;margin-left:476px; " type="submit" class="btn btn-sm btn-success" name="search" value="Search"></p>
                </form>
              </div> -->
          </div>
            
         
          
         
          <table class="table table-striped table-condensed table-bordered">
             
               <thead>
                  <tr>
                    
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <th>Total</th>
                    <th>Added Product Time</th>
                   
                    <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php

                    if(isset($_POST['search_me'])){

                        $search_me = $_POST['search_me'];

                        $search = new Product();

                        $search->the_search = $search_me;

                        if($search->search_products_count() == 0){
                           
                           echo "<h2 class='text-danger text-center'>This Product is not available!</h2>";
                        }
                        else{
                         
                         $products = $search->search_products();

                         $sn =0;
                         foreach($products as $product){
                            $sn +=1;
                           ?>
                             
                             <tr>
                                 
                                 <td><?php echo $product->product_name ?></td>
                                 <td>
                                   <?php
                                    $id = $product->cat_id;
                                    $category = Category::find_by_id($id);
                                    echo $category->category_name;
                                    ?> 
                                   </td>
                                 <td><?php echo $product->product_qty ?></td>
                                 <td>#<?php echo $product->product_price ?>.00</td>
                                  <td>#<?php echo $product->product_qty * $product->product_price ?>.00</td>
                                 
                                 <td>

                                  <?php  
                                     $the_date = Product::modified_date($product->product_date);
                                    ?>
                                    
                                  </td>


                                 
                                  <td>
                                    <a href="index.php?edit_product&edit_id=<?php echo $product->id ?>"><i class="text-success fa fa-edit"></i></a> &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp;
                                    <a onclick="javascript: return confirm('Do you want to delete?')" href="index.php?delete_product&id=<?php echo $product->id ?>"><i class="text-danger fa fa-trash"></i></a>
                                  </td>

                               </tr>

                           <?php
                         }


                        }

                       
                    }
                    
                   
                   

                   ?> 

               </tbody>
            
          </table>

          <!-- DataTales Example -->
 

        </div>

        
              </div>
              <!-- End of Main Content -->

        <?php include "frontend/footer.php" ?>