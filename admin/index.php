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


        <?php 

             if($_SERVER['REQUEST_URI'] == '/inventorysystem/admin/index.php' || $_SERVER['REQUEST_URI'] == '/inventorysystem/admin/') {

                include "backend/admin_content.php";

             }

             if(isset($_GET['add_user'])){
                
                include "backend/add_user.php";
             }

             if(isset($_GET['view_users'])){
                
                include "backend/view_users.php";
             }

             if(isset($_GET['id'])){
               
                 include "backend/delete_user.php";
             }
             
             if(isset($_GET['edit_user'])){
               
                 include "backend/edit_user.php";
             }

             if(isset($_GET['id'])){
               
                 include "backend/delete_category.php";
             }
             
             if(isset($_GET['edit_category'])){
               
                 include "backend/edit_category.php";
             }

             if(isset($_GET['add_category'])){
               
                 include "backend/add_category.php";
             }

             if(isset($_GET['profile'])){
               
                 include "backend/profile.php";
             }

             if(isset($_GET['add_product'])){
               
                 include "backend/add_product.php";
             }

             if(isset($_GET['view_products'])){
               
                 include "backend/view_products.php";
             }

            if(isset($_GET['edit_product'])){
               
                 include "backend/edit_product.php";
             }

             if(isset($_GET['id'])){
               
                 include "backend/delete_product.php";
             }
             
             if(isset($_GET['page'])){
               
                 include "backend/view_products.php";
             }

             if(isset($_GET['page_cat'])){
               
                 include "backend/add_category.php";
             }

             // if(isset($_GET['search'])){
               
             //     include "backend/search.php";
             // }

             

         ?>

        

      </div>
      <!-- End of Main Content -->

<?php include "frontend/footer.php" ?>

