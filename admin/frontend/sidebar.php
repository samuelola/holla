<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-store"></i>
        </div> -->
      <!--   <div class="sidebar-brand-text mx-3">Toymak Kitchen Utensils</div> -->
         <div class="sidebar-brand-text mx-3"><img class="sammy" src="../images/tok.png" alt=""></div>
            <!-- <div class="sidebar-brand-text mx-3">Toymak Kitchen Utensils</div> -->
            <div>Toymak Kitchen Utensils</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Administrator</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Profile</h6> -->
            <a class="collapse-item" href="index.php?profile">Profile</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
     
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUtilities">
           <i class="fas fa-fw fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
           <span>Users</span>
         </a>
         <div id="collapseUser" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <!-- <h6 class="collapse-header">Users</h6> -->
             <a class="collapse-item" href="index.php?add_user">Add User</a>
             <a class="collapse-item" href="index.php?view_users">View Users</a>
             
           </div>
         </div>
       </li>
    
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-store fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Product</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Users</h6> -->
            <a class="collapse-item" href="index.php?add_product">Add Product</a>
            <a class="collapse-item" href="index.php?view_products">View Product</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Category</span>
        </a>
        <div id="collapseCat" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Users</h6> -->
            <a class="collapse-item" href="index.php?add_category">Add Category</a>
            <a class="collapse-item" href="index.php?add_category">View Categories</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>