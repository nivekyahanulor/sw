<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/application-approved.php');?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Application Request Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Application Request </li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
		 <ul class="nav nav-tabs">
                <li class="nav-item" role="">
                  <a href="application-request.php"><button class="nav-link ">REQUEST</button></a>
                </li>
                <li class="nav-item" role="">
                 <a href="application-approved.php"> <button class="nav-link active">APPROVED</button></a>
                </li>
                <li class="nav-item" role="">
                 <a href="application-reject.php"> <button class="nav-link">REJECT</button></a>
                </li>
				<li class="nav-item" role="">
                 <a href="application-active.php"> <button class="nav-link">ACTIVE</button></a>
                </li>
              </ul>
          <div class="card">
		  
            <div class="card-body">
              <!-- Table with stripped rows -->
			  <br>
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th class="text-end" scope="col">NO.</th>
                    <th class="text-start" scope="col">CUSTOMER NAME</th>
                    <th class="text-start" scope="col">SERVICES PLAN</th>
                    <th class="text-end" scope="col">DATE OF APPLICATION</th>
                    <th class="text-end" scope="col">TIME OF APPLICATION</th>
                    <th class="text-end" scope="col">DATE OF PROCESS</th>
                    <th class="text-start" scope="col">APPLY STATUS</th>
                    <th class="text-start" scope="col">STATUS</th>
                    <th class="text-start" scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
				<?php $cnt = 1;
					while($val = $sw_applicatiosn->fetch_object()){ ?>
                  <tr>
                    <td class="text-end"><?php echo $cnt++;?></td>
                    <td class="text-start"><a href="customer-data.php?id=<?php echo $val->u_id;?>" target="_blank"> <i class="bi bi-check-square"></i> <?php echo $val->firstname .' '. $val->lastname;?></a></td>
                    <td class="text-start"><?php echo $val->service_name;?></td>
                    <td class="text-end"><?php $date=date_create($val->date_added); echo date_format($date,"Y/m/d"); ?></td>
                    <td class="text-end"><?php $date1=date_create($val->date_added); echo date_format($date1,"H:i A"); ?></td>
					<td class="text-end"><?php echo $val->schedule_date;?></td>
                    <td class="text-start"><?php if($val->is_upgrade == 0) { echo "Apply Plan";} else { echo "Upgrade Plan";} ?></td>
                    <td class="text-start">Approved <?php if($val->resched==1){echo "(Re-Schedule)";}?></td>
                    <td class="text-start">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-category<?php echo $val->application_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-application<?php echo $val->application_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				   <div class="modal fade" id="delete-application<?php echo $val->application_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Application</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Application Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->application_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-application">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>	
					 <div class="modal fade" id="edit-category<?php echo $val->application_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
						 <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Status: </label>
							  <select class="form-control check-status" name="status" id="" required>
								<option  value="">  </option>
								<option  value="1"> Active </option>
								<option  value="2"> Re-Schedule </option>
							  </select>
							  <br>
							  <?php if($val->is_upgrade ==0){?>
								  <div class="boxnumber" style="display:none;">
								  <label for="inputNanme4" class="form-label">Select Nap Box: </label>
									<select class="form-control" name="boxnumber" >
											<option value=""> - Select Nap Box - </option>
											<?php 
												$sw_napbox = $mysqli->query("SELECT * from sw_napbox");
												while($val1 = $sw_napbox->fetch_object()){ 
											?>
											<option value="<?php echo $val1->boxnumber;?>"> <?php echo $val1->boxnumber;?> </option>
											<?php } ?>
									 </select>
								 </div>
							  <?php } ?>
							  <div class="reschedule" style="display:none;">
							  <label for="inputNanme4" class="form-label">Re-Schedule Date: </label>
							  <input type="date" class="form-control" name="reschedule" >
							 </div>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->application_id;?>" required>
							  <input type="hidden" class="form-control" name="u_id" value="<?php echo $val->u_id;?>" required>
							  <input type="hidden" class="form-control" name="service_name" value="<?php echo $val->service_name;?>" required>
							  <input type="hidden" class="form-control" name="service_id" value="<?php echo $val->service_id;?>" required>
							  <input type="hidden" class="form-control" name="is_upgrade" value="<?php echo $val->is_upgrade;?>" required>
							  <input type="hidden" class="form-control" name="email" value="<?php echo $val->emailaddress;?>" required>
							  <input type="hidden" class="form-control" name="customer" value="<?php echo $val->firstname.' '.$val->lastname;?>" required>
							</div>
							<br>
							
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary" name="update-application">Update </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
					
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
		
  </main><!-- End #main -->

<?php include('footer.php');?>