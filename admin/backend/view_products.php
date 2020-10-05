<div class="container-fluid">
         <?php

            $product_msg = new Product();

            $product_msg->display_message();

          ?>
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
            
         
          
         <div class="table-responsive-sm">
          <table class="table table-condensed table-bordered">
             
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
                    
                    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
                    $items_per_page = 5;
                    $item_total_count = Product::count_all();

                    $paginate = new Paginate($page,$items_per_page,$item_total_count);

                    $sql = "SELECT * FROM products ";
                    $sql .= "LIMIT {$items_per_page} ";
                    $sql .= "OFFSET {$paginate->offset()} ";

                    $products = Product::find_by_query($sql);

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
                               echo isset($category->category_name) ? $category->category_name : 'No Category';
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

                   ?> 
                   <td colspan="4">Total Value of Stock</td>
                   <td>
                     
                      #<?php echo Product::grand_total() ?>.00

                   </td>
                   <!-- <td>tytty</td>
                   <td>ddggd</td> -->
                   
               </tbody>
            
          </table>
        </div>
          <!-- DataTales Example -->

          <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
            <ul class="pagination">
             <!--  <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
              </li>

              <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>

              <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>

              <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li> -->

              <?php
                
                  if($paginate->page_total() > 1){
                      
                      if($paginate->has_previous()){

                         echo  "<li class='paginate_button page-item previous' id='dataTable_previous'><a aria-controls='dataTable' data-dt-idx='0' href='index.php?page={$paginate->previous()}' tabindex='0' class='page-link'>Previous</a></li>";
                      }

                      
                        for ($i=1; $i <= $paginate->page_total(); $i++) { 
                          
                           if($i == $paginate->current_page){

                            echo "<li class='paginate_button page-item active' ><a aria-controls='dataTable' data-dt-idx='{$i}' tabindex='0' class='page-link' href='index.php?page={$i}'>{$i}</a></li>";

                           }
                           else{

                              echo "<li  class='paginate_button page-item' ><a aria-controls='dataTable' data-dt-idx='{$i}' tabindex='0' class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                           }
                        }
                       

                      

                       if($paginate->has_next()){

                          echo  "<li class='paginate_button page-item next' id='dataTable_next'><a aria-controls='dataTable' data-dt-idx='{$i}' href='index.php?page={$paginate->next()}' tabindex='0' class='page-link'>Next</a></li>";
                      }
                  }
              ?>
              

            </ul>

          </div>
           
          

        </div>