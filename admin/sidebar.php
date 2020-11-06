<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><i class="fa fa-university"></i> <span> Dashboard</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="images/user.png" alt="." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,
          <?php 
//          echo $user->get_name(-1);
          ?>
          </span>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-home" aria-hidden="true"></i> Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="product-all.php">All Products</a></li>
              <li><a href="product-add.php">Add Product</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-image" aria-hidden="true"></i> Slider Images <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="slider-all.php">All Slider Images</a></li>
              <li><a href="slider-add.php">Add Slider Image</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-users" aria-hidden="true"></i> Customers <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="customers-all.php">All Customers</a></li>
<!--              <li><a href="product-add.php">Add Product</a></li>-->
            </ul>
          </li>

          <li><a><i class="fa fa-star-o" aria-hidden="true"></i> Stock <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="stock.php">Stock</a></li>

            </ul>
          </li>

          <li><a><i class="fa fa-user" aria-hidden="true"></i> Admin <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="admin_password.php">Admin Password | Product Name</a></li>

            </ul>
          </li>

        </ul>
      
        
      </div>


    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>