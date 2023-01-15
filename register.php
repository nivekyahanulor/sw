<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register : Account </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php 
  	include('system/controller/database.php');
  ?>
  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="system/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="system/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="system/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="system/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="system/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="system/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="system/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="system/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                </a>
              </div><!-- End Logo -->
				<?php if(isset($_GET['registered'])){?>
					<div class="alert alert-primary alert-dismissible fade show" role="alert">
						Congratulations ! You are now registered!
						Login using your account <a href="login.php"> Login Now </a>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					 </div>
				<?php } else if(isset($_GET['duplicateemail'])){?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						Error! Email Address Already Registered!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					 </div>
				<?php } ?>
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Register  Your Account</h5>
                  </div>
					
                  <form class="row g-3 needs-validation"  method="post" novalidate  action="system/controller/register.php" enctype="multipart/form-data">
				  <h4> Personal Details </h4>
				  <hr>
                    <div class="row mb-3"> 
						<div class="col-4">
						  <label for="yourUsername" class="form-label">First Name</label>
						  <div class="input-group has-validation">
							<input type="text" name="firstname" class="form-control text-center"  required>
						  </div>
						</div> 
						<div class="col-4">
						  <label for="yourUsername" class="form-label">Last Name</label>
						  <div class="input-group has-validation">
							<input type="text" name="lastname" class="form-control text-center"  required>
						  </div>
						</div> 
						<div class="col-4">
						  <label for="yourUsername" class="form-label">Middle Name</label>
						  <div class="input-group has-validation">
							<input type="text" name="middlename" class="form-control text-center"  required>
						  </div>
						</div>
                    </div>
                    <div class="row mb-3"> 
					<div class="col-6">
                      <label for="yourUsername" class="form-label">Contact Number</label>
                      <div class="input-group has-validation">
                        <input type="text" name="contactnumber" class="form-control text-center"  required>
                      </div>
                    </div>
					<div class="col-6">
                      <label for="yourUsername" class="form-label">Email Address</label>
                      <div class="input-group has-validation">
                        <input type="text" name="emailaddress" class="form-control text-center"  required>
                      </div>
                    </div>
                    </div>
                    <div class="row mb-3"> 
					 
						<div class="col-12">
						  <label for="yourUsername" class="form-label">Address</label>
						  <div class="input-group has-validation">
							<input type="text" name="address" class="form-control text-center"  required>
						  </div>
						</div>
                  
                    </div>
					  <div class="row mb-3"> 
						<div class="col-4">
						  <label for="yourUsername" class="form-label">Province</label>
						  <div class="input-group has-validation">
							<input type="text" name="province" class="form-control text-center"  value="Cavite" readonly required>
						  </div>
						</div> 
						<div class="col-4">
						  <label for="yourUsername" class="form-label">City / Municipality</label>
						  <div class="input-group has-validation">
							<input type="text" name="city" class="form-control text-center"  value="Carmona" readonly  required>
						  </div>
						</div> 
						<div class="col-4">
						  <label for="yourUsername" class="form-label">Barangay</label>
						  <div class="input-group has-validation">
							<select class="form-control" name="barangay" required>
										<option value=""> - Select Barangay - </option>
										<?php 
											$sw_barangay = $mysqli->query("SELECT * from sw_barangay");
											while($val1 = $sw_barangay->fetch_object()){ 
										?>
										<option value="<?php echo $val1->barangay;?>"> <?php echo $val1->barangay;?> </option>
										<?php } ?>
									  </select>
						  </div>
						</div>
                    </div>
					<h4> Document Details </h4>
					<hr>
					<div class="row mb-3"> 
						<div class="col-6">
						  <label for="yourUsername" class="form-label">Valid ID</label>
						  <div class="input-group has-validation">
							<input type="file" name="image1" class="form-control text-center"  required>
						  </div>
						</div>
						
						<div class="col-6">
						  <label for="yourUsername" class="form-label">Proof Of Billing</label>
						  <div class="input-group has-validation">
							<input type="file" name="image2" class="form-control text-center"  required>
						  </div>
						</div>
						
						<div class="col-6">
						  <label for="yourUsername" class="form-label">Picture</label>
						  <div class="input-group has-validation">
							<input type="file" name="image3" class="form-control text-center"  required>
						  </div>
						</div>
                  
                    </div>
					<h4> Account Details </h4>
					<hr>
					<div class="row mb-3"> 
						<div class="col-6">
						  <label for="yourUsername" class="form-label">User Name</label>
						  <div class="input-group has-validation">
							<input type="text" name="username" class="form-control text-center"  required>
						  </div>
						</div>
						
						<div class="col-6">
						  <label for="yourUsername" class="form-label">Password</label>
						  <div class="input-group has-validation">
							<input type="password" name="password" class="form-control text-center"  required>
						  </div>
						</div>
                  
                  
                    </div>

                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                    <div class="col-12">
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
              
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="system/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="system/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="system/assets/vendor/chart.js/chart.min.js"></script>
  <script src="system/assets/vendor/echarts/echarts.min.js"></script>
  <script src="system/assets/vendor/quill/quill.min.js"></script>
  <script src="system/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="system/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="system/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="system/assets/js/main.js"></script>

</body>

</html>