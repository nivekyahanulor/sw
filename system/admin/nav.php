
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
	  <img src="../assets/img/logo.png" width="50px" alt="">
		<center>
        <span class="d-none d-lg-block">SOUTHWOODS</span>
			</center>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

 

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

   
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
         
         
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
		 
      <li class="nav-item">
        <a class="nav-link <?php echo $a;?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span> DASHBOARD </span>
        </a>
      </li>
	
	   <li class="nav-item">
        <a class="nav-link  <?php echo $b;?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>CUSTOMER</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content " data-bs-parent="#sidebar-nav">
          <li>
            <a href="customer.php">
              <i class="bi bi-circle"></i><span> CUSTOMER LIST </span>
            </a>
          </li>
		    <li>
            <a href="application-request.php">
              <i class="bi bi-circle"></i><span> APPLICATION REQUEST </span>
            </a>
          </li>
		 
          <li>
        </ul>
        </li><!-- End Forms Nav -->
	  </li>
	  <li class="nav-item">
        <a class="nav-link <?php echo $c;?>" href="services.php">
          <i class="bi bi-wifi"></i>
          <span> SERVICES </span>
        </a>
      </li>
	
	  <li class="nav-item">
        <a class="nav-link <?php echo $d;?>" href="billing.php">
          <i class="bi bi-journal-bookmark"></i>
          <span> BILLING </span>
        </a>
      </li>
	
	
        </li><!-- End Forms Nav -->
	  </li>
	  <li class="nav-item">
        <a class="nav-link <?php echo $e;?>" href="napbox.php">
          <i class="bi bi-bounding-box"></i>
          <span> NAP BOX </span>
        </a>
      </li>
	  
	
	<li class="nav-item">
        <a class="nav-link <?php echo $i;?>" href="system-users.php">
          <i class="bi bi-person-circle"></i>
          <span> SYSTEM USER </span>
        </a>
      </li>
   <li class="nav-item">
        <a class="nav-link <?php echo $h;?>" href="settings.php">
          <i class="bi bi-gear-fill"></i>
          <span> SETTINGS </span>
        </a>
      </li>
   
    <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span> SIGN OUT </span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
