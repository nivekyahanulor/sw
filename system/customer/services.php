<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/services.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Services Plan Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Services Plan</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a href="services.php" class="nav-link active">My Plan</a>
				</li>
				<li class="nav-item">
					<a href="services-plan.php" class="nav-link">Service Plan</a>
				</li>
			</ul>   
          <div class="card">
            <div class="card-body">
			<?php 
				$customer_id =  $_SESSION['id'];
				$sw_application = $mysqli->query("SELECT * from sw_application where customer_id ='$customer_id'");
				$rows	  = mysqli_num_rows($sw_application);
				if($rows == 0){
			?>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Service Name</th>
                    <th scope="col"  class="text-center">Description</th>
                    <th scope="col"  class="text-center">Price</th>
                    <th scope="col"  class="text-center">Image</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sw_service->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->service_name;?></td>
                    <td class="text-center"><?php echo $val->service_desc;?></td>
                    <td class="text-center">₱ <?php echo number_format($val->service_price,2);?></td>
                    <td class="text-center"><a href="../assets/img/<?php echo $val->service_pic;?>" target="_blank"><img src="../assets/img/<?php echo $val->service_pic;?>" width="200"></a></td>
					 <td class="text-center">
						<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-service<?php echo $val->service_id;?>"> APPLY </button>
					</td>
                  </tr>
				  
					 <div class="modal fade" id="edit-service<?php echo $val->service_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Apply On Service Plan ?</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						    <form class="row g-3" method="post" enctype="multipart/form-data">
							<br>
							<div class="col-12">
							<h5><b><?php echo $val->service_name;?></b></h5>
							<p> <?php echo $val->service_desc;?></p>
							<p><?php echo number_format($val->service_price,2);?></p>
							<br>
							 <b> ARE YOU SURE TO APPLY ON THIS SERVICE PLAN ? </b>
							 <input type="hidden" name="serviceid" class="form-control text-center"  value="<?php echo $val->service_id;?>" readonly required>
							 <input type="hidden" name="customerid" class="form-control text-center"  value="<?php echo $_SESSION['id'];?>" readonly required>
							</div>
						</div>
					
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary" name="process-services">Process </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
						</div>
						</div>
						</div>
				<?php } ?>
				</tbody>
               </table>
			   
                <?php } else { ?>
				<br>
					<?php
					$sw_applicatiosn = $mysqli->query("SELECT a.* , b.* from sw_application a  left join sw_service b on a.service_id = b.service_id where a.customer_id ='$customer_id' order by application_id desc");
					 while($val3 = $sw_applicatiosn->fetch_object()){
					?>
				    <div class="col-xxl-12 col-md-12">
					  <div class="card info-card sales-card">

						<div class="card-body">
						  <h5 class="card-title">MY SERVICE PLAN</h5>
							<img src="../assets/img/<?php echo $val3->service_pic;?>" width="200"><hr>
							<h5><b><?php echo $val3->service_name;?> <?php if($val3->is_upgrade==1){ echo "(Upgrade Plan)";}?></b></h5>
							<p> <?php echo $val3->service_desc;?></p>
							<p><h4><?php echo number_format($val3->service_price,2);?></h4></p>
							<?php if($val3->status ==0){?>
							<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cancel-plan<?php echo $val3->application_id;?>"> <i class="bi  bi-x-square"></i> Cancel Plan </button>
							
							 <div class="modal fade" id="cancel-plan<?php echo $val3->application_id;?>" tabindex="-1">
								 <div class="modal-dialog modal-dialog-centered">
								  <div class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title">Cancel Service Plan ?</h5>
									  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form class="row g-3" method="post" enctype="multipart/form-data">
										<br>
										<div class="col-12">
										 <b> ARE YOU SURE TO CANCEL ON THIS SERVICE PLAN ? </b>
										 <input type="hidden" name="id" class="form-control text-center"  value="<?php echo $val3->application_id;?>" readonly required>
										</div>
									</div>
								
									<div class="modal-footer">
									  <button type="submit" class="btn btn-warning" name="cancel-services">Cancel </button>
									  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									</div>
									</form>
									</div>
									</div>
								</div>
							<?php } ?>
						</div>

					  </div>
					</div>
				
				<?php } } ?>
               
              <!-- End Table with stripped rows -->

           
		</div>
	
        </div>
      </div>
    </section>
	
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>