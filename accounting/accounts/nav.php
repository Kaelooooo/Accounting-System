
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center"  style="background-color:#379683;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
	  <img src="../assets/img/blue 2.png" width="220px" alt="">
		<center>
        <span class="d-none d-lg-block" style="color:#fff;"></span>
			</center>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color:#fff;"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto" style="color:#fff;">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

   
        <li class="nav-item dropdown pe-3" style="color:#fff;">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" style="color:#fff;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="color:#fff;">
        
            <li>
              <hr class="dropdown-divider">

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
	<?php if($_SESSION['role'] ==1) {?>
      <li class="nav-item">
        <a class="nav-link <?php echo $a;?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span> DASHBOARD </span>
        </a>
      </li>
	
	   <li class="nav-item">
        <a class="nav-link  <?php echo $b;?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>INVENTORY</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content " data-bs-parent="#sidebar-nav">
          <li>
            <a href="inventory.php">
              <i class="bi bi-circle"></i><span>ITEMS </span>
            </a>
          </li>
		    <li>
            <a href="item-category.php">
              <i class="bi bi-circle"></i><span>CATEGORY </span>
            </a>
          </li>
		  <li>
            <a href="items-critical.php">
              <i class="bi bi-circle"></i><span>CRITICAL ITEMS</span>
            </a>
          </li>
          <li>
        </ul>
        </li><!-- End Forms Nav -->
	  </li>
	
	  <li class="nav-item">
        <a class="nav-link <?php echo $d;?>" href="history.php">
          <i class="bi bi-layout-text-sidebar"></i>
          <span> ORDER TRANSACTION </span>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link <?php echo $g;?>" href="supplier.php">
          <i class="bi bi-person-lines-fill"></i>
          <span> SUPPLIER </span>
        </a>
      </li>
	
	
        </li><!-- End Forms Nav -->
	  </li>
	  <li class="nav-item">
        <a class="nav-link <?php echo $f;?>" href="customer.php">
          <i class="bi bi-people"></i>
          <span> CUSTOMER </span>
        </a>
      </li>
	
	
	<li class="nav-item">
        <a class="nav-link <?php echo $i;?>" href="system-users.php">
          <i class="bi bi-person-circle"></i>
          <span> SYSTEM USER </span>
        </a>
      </li>
	  
    <li class="nav-item">
        <a class="nav-link <?php echo $l;?>" href="system-settings.php">
          <i class="bi bi-gear"></i>
          <span>SETTINGS </span>
        </a>
      </li>
    
	<li class="nav-item">
        <a class="nav-link  <?php echo $j;?>" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-graph-up"></i>
          <span> REPORTS </span>
        </a>
		  <ul id="forms-nav1" class="nav-content " data-bs-parent="#sidebar-nav">
          <li>
            <a href="inventory-reports.php">
              <i class="bi bi-circle"></i><span>INVENTORY REPORTS </span>
            </a>
          </li>
		    <li>
            <a href="sales-report.php">
              <i class="bi bi-circle"></i><span>SALES REPORTS </span>
            </a>
          </li>
		   <li>
            <a href="dr-reports.php">
              <i class="bi bi-circle"></i><span>DR / INVOICE</span>
            </a>
          </li> 
          <li>
        </ul>
      </li>
	<?php } else { ?>
	 <li class="nav-item">
        <a class="nav-link <?php echo $c;?>" href="orders.php">
          <i class="bi bi-cart-plus"></i>
          <span> POINT OF SALE </span>
        </a>
      </li>
	<li class="nav-item">
        <a class="nav-link <?php echo $f;?>" href="customer.php">
          <i class="bi bi-people"></i>
          <span> CUSTOMER </span>
        </a>
      </li>
	
	<?php } ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span> SIGN OUT </span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
