<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <?php 
  	include('system/controller/database.php');
  ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SOUTH WOODS CABLES</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/gallery/logo.png" height="45" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#about">About Us</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#services">Our Services</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#findUs">Contact Us</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="register.php">Register</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
           
          </div>
        </div>
      </nav>
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/sample.jpg" alt="hero-header" /></div>
            <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-8">
              <h1 class="fw-bolder fs-6 fs-xxl-7 mb-2">Southwoods Cable</h1>
              <p class="fs-1 mb-5">Southwoods Cable is a company operating in Cavite. It was first established with the aim of delivering superior Internet services and cable TV to residents.</p>
            </div>
          </div>
        </div>
      </section>
	 <section class="py-xxl-10 pb-0" id="about">
        <!--/.bg-holder-->

        <div class="container">
		 <?php
			$sw_settings1 = $mysqli->query("SELECT * from sw_settings where location = 'About'");
			while($val1 = $sw_settings1->fetch_object()){ 
		 ?>
          <div class="row align-items-center">
            <div class="col-md-75 col-xl-12 col-xxl-5 text-md-start text-center py-8">
              <h1 class="fw-bolder fs-6 fs-xxl-7 mb-2">Southwoods Cable</h1>
              <p class="fs-1 mb-5"><?php echo $val1->content;?></p>
            </div>
          </div>
			<?php } ?>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-7" id="services" container-xl="container-xl">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5 text-center mb-3">
              <h5 class="text-danger">SERVICES PLAN</h5>
              <h2>Our services for you</h2>
            </div>
          </div>
          <div class="row h-100 justify-content-center">
		  <?php
			$sw_service = $mysqli->query("SELECT * from sw_service");
			while($val = $sw_service->fetch_object()){ 
		  ?>
            <div class="col-md-4 pt-4 px-md-2 px-lg-3">
              <div class="card h-100 px-lg-5 card-span">
                <div class="card-body d-flex flex-column justify-content-around">
                  <div class="text-center pt-5"><img src="system/assets/img/<?php echo $val->service_pic;?>" width="200">
                    <h5 class="my-4"><?php echo $val->service_name;?></h5>
                    <h5 class="my-4">₱ <?php echo number_format($val->service_price,2);?></h5>
                  </div>
                  <p><?php echo $val->service_desc;?></p>
                 
                </div>
              </div>
            </div>
           
			<?php } ?>
          
          </div>
        </div>
        <!-- end of .container-->

      </section>
    
      <section>

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4"><img src="assets/img/illustrations/callback.png" alt="..." />
              <h5 class="text-danger">REQUEST A CALLBACK</h5>
              <h2>We will contact in the shortest time.</h2>
              <p class="text-muted">Monday to Friday, 9am-5pm.</p>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4">
              <form class="row">
                <div class="mb-3">
                  <label class="form-label visually-hidden" for="inputName">Name</label>
                  <input class="form-control form-quriar-control" id="inputName" type="text" placeholder="Name" />
                </div>
                <div class="mb-3">
                  <label class="form-label visually-hidden" for="inputEmail">Another label</label>
                  <input class="form-control form-quriar-control" id="inputEmail" type="email" placeholder="Email" />
                </div>
                <div class="mb-5">
                  <label class="form-label visually-hidden" for="validationTextarea">Message</label>
                  <textarea class="form-control form-quriar-control is-invalid border-400" id="validationTextarea" placeholder="Message" style="height: 150px" required="required"></textarea>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary" type="submit">Send Message<i class="fas fa-paper-plane ms-2"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
    
      <section id="findUs">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5 mb-6 text-center">
              <h5 class="text-danger">FIND US</h5>
              <h2>Access us easily</h2>
            </div>
            <div class="col-12">
              <div class="card card-span rounded-2 mb-3">
                <div class="row">
				  <?php
					$sw_settings = $mysqli->query("SELECT * from sw_settings where location = 'Map'");
					$val1 = $sw_settings->fetch_assoc();
					
					$sw_settings2 = $mysqli->query("SELECT * from sw_settings where location = 'Address'");
					$val2 = $sw_settings2->fetch_assoc();
					
					$sw_settings3 = $mysqli->query("SELECT * from sw_settings where location = 'Contacts'");
					$val3 = $sw_settings3->fetch_assoc();
					
					$sw_settings4 = $mysqli->query("SELECT * from sw_settings where location = 'Email'");
					$val4 = $sw_settings4->fetch_assoc();
				  ?>
                  <div class="col-md-6 col-lg-7 d-flex"><?php echo $val1['content'];?></div>
                  <div class="col-md-6 col-lg-5 d-flex flex-center">
                    <div class="card-body">
                      <h5>Contact with us</h5>
                      <p class="text-700 my-4"> <i class="fas fa-map-marker-alt text-warning me-3"></i><span><?php echo $val2['content'];?></span></p>
                      <p><i class="fas fa-phone-alt text-warning me-3"></i><span class="text-700"><?php echo $val3['content'];?></span></span></p>
                      <p><i class="fas fa-envelope text-warning me-3"> </i><a class="text-700" href="mailto: <?php echo $val4['content'];?>"><?php echo $val4['content'];?></a></p>
                    
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
     
      <section class="py-0 bg-1000">

        <div class="container">
          <div class="row justify-content-md-between justify-content-evenly py-4">
            <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
              <p class="fs--1 my-2 fw-bold text-200">All rights Reserved &copy; 2022</p>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="fs--1 my-2 text-center text-md-end text-200">
               <a class="fw-bold text-primary" href="https://themewagon.com/" target="_blank">SOUTHWOODS CABLES AND INTERNET </a>
              </p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  </body>

</html>