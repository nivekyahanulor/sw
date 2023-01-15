<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('../controller/database.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer Information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Customer</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
			<?php
				$id = $_GET['id'];
				$customer = $mysqli->query("SELECT * from sw_customer where u_id='$id'");
				$row = $customer->fetch_assoc();
			?>
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/picture/<?php echo $row['picture'];?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $row['firstname'] . ' '. $row['lastname'];?></h2>
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

             <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-plan">All Plans</button>
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

                

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
					
				<div class="row">
						<div class="col-lg-3 col-md-4 label ">Valid ID</div>
						<div class="col-lg-9 col-md-8"><a href="../assets/validid/<?php echo $row['valid_id'];?>" target="_blank">Preview</a></div>
                </div>
				<div class="row">
						<div class="col-lg-3 col-md-4 label ">Proof Of Billing</div>
						<div class="col-lg-9 col-md-8"><a href="../assets/proffofbilling/<?php echo $row['proof_billing'];?>" target="_blank">Preview</a></div>
                </div>
				
				
                </div>
				<div class="tab-pane fade profile-plan pt-3" id="profile-plan">
					
					<table class="table datatable" id="">
					<thead>
					  <tr>
						<th class="text-start" scope="col">Services Plan</th>
						<th class="text-end" scope="col">Date Applied</th>
					  </tr>
					</thead>
					<tbody>
					<?php 
					$charts = $mysqli->query("SELECT a.* , b.* from sw_application a left join sw_service b on b.service_id = a.service_id where a.customer_id='$id'");
					while($valchart = $charts->fetch_object()){  ?>
					  <tr>
						<td class="text-start"><?php echo $valchart->service_name;?></td>
						<td class="text-end"><?php echo $valchart->date_added;?></td>
					  </tr>
						
					<?php } ?>
					</tbody>
                   </table>
				
				
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
		
  </main><!-- End #main -->

<?php include('footer.php');?>