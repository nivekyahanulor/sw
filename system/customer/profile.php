<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/profile.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>My Information</h1>
     
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
			<?php
				$id = $_SESSION['id'];
				$customer = $mysqli->query("SELECT * from sw_customer where u_id='$id'");
				$row = $customer->fetch_assoc();
			?>
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/picture/<?php echo $row['picture'];?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $row['firstname'] . ' '. $row['lastname'];?></h2>
              <h2><?php echo $row['username'];?></h2>
              <h3>Plan Services : <?php if($row['plan']==""){ echo "None"; } else { echo $row['plan'];}?></h3>
           
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Personal Details</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Documents</button>
                </li>

            

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
				<br>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['firstname'] . ' '. $row['middlename']. '. '. $row['lastname'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['address'];?></div>
                  </div>
				  
				  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['emailaddress'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['contactnumber'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Province</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['province'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City / Municipality</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['city'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Barangay</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['barangay'];?></div>
                  </div>
				 <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#add-item"><i class="bi bi-pencil-square"></i> UPDATE </button>
                
		
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
					
				<div class="row">
						<div class="col-lg-3 col-md-4 label ">Valid ID</div>
						<div class="col-lg-9 col-md-8"><a href="../assets/validid/<?php echo $row['valid_id'];?>" target="_blank"><?php echo $row['valid_id'];?></a></div>
                </div>
				<div class="row">
						<div class="col-lg-3 col-md-4 label ">Proof Of Billing</div>
						<div class="col-lg-9 col-md-8"><a href="../assets/proffofbilling/<?php echo $row['proof_billing'];?>" target="_blank"><?php echo $row['proof_billing'];?></a></div>
                </div>
				<br>
				 <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#add-docs"><i class="bi bi-pencil-square"></i> UPDATE </button>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
		 <div class="modal fade" id="add-item" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">My Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">First Name: </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['id'];?>" required>
							  <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'];?>" required>
							</div>
							<br>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">Last Name: </label>
							  <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'];?>" required>
							</div>
							<br>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">Middle Name: </label>
							  <input type="text" class="form-control" name="middlename" value="<?php echo $row['middlename'];?>" required>
							</div>
							<br>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">Contact Number: </label>
							  <input type="text" class="form-control" name="contactnumber" value="<?php echo $row['contactnumber'];?>" required>
						</div>
							<br>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">Address: </label>
							  <textarea type="text" class="form-control" name="address" required><?php echo $row['address'];?></textarea>
						</div>
							<br>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">Province: </label>
							  <input type="text" class="form-control" name="province" value="Cavite" required>
						</div>	<br>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">City / Municipality: </label>
							  <input type="text" class="form-control" name="city" value="Carmona" required>
						</div>	<br>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">Barangay: </label>
							 <select class="form-control" name="barangay" required>
										<option value=""> - Select Barangay - </option>
										<?php 
											$sw_barangay = $mysqli->query("SELECT * from sw_barangay");
											while($val1 = $sw_barangay->fetch_object()){ 
											if($val1->barangay == $row['barangay']){
										?>
										<option value="<?php echo $val1->barangay;?>" selected> <?php echo $val1->barangay;?> </option>
										<?php } else { ?>
										<option value="<?php echo $val1->barangay;?>" > <?php echo $val1->barangay;?> </option>
										<?php }} ?>
									  </select>
						</div>	<br>
						</div>
						<hr>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">User Name: </label>
							  <input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>" required>
						</div>	<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Password: </label>
							  <input type="password" class="form-control" name="password" value="<?php echo $row['password'];?>" required>
						</div>	<br>
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="update-profile">Update </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		 <div class="modal fade" id="add-docs" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">My Documents</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Valid ID: (<a href="../assets/validid/<?php echo $row['valid_id'];?>" target="_blank">View</a>) </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['id'];?>" required>
							  <input type="file" class="form-control" name="image1" >
							  <input type="hidden" class="form-control" name="valid_id" value="<?php echo $row['valid_id'];?>" required>
							</div>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Valid ID: (<a href="../assets/proffofbilling/<?php echo $row['proof_billing'];?>" target="_blank">View</a>) </label>
							  <input type="file" class="form-control" name="image2" >
							  <input type="hidden" class="form-control" name="proof_billing" value="<?php echo $row['proof_billing'];?>" required>
							</div>
							<br>
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="update-docs">Update </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
  </main><!-- End #main -->

<?php include('footer.php');?>