<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/application-request.php');?>

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
                  <a href="application-request.php"><button class="nav-link active">REQUEST</button></a>
                </li>
                <li class="nav-item" role="">
                 <a href="application-approved.php"> <button class="nav-link">APPROVED</button></a>
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
                    <th class="text-start" scope="col">APPLY STATUS</th>
                    <th class="text-start" scope="col">STATUS</th>
                    <th class="text-start" scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$cnt = 1;
				while($val = $sw_applicatiosn->fetch_object()){ ?>
                  <tr>
                    <td class="text-end"><?php echo $cnt++;?></td>
                    <td class="text-start"><a href="customer-data.php?id=<?php echo $val->u_id;?>" target="_blank"> <i class="bi bi-check-square"></i> <?php echo $val->firstname .' '. $val->lastname;?></a></td>
                    <td class="text-start"><?php echo $val->service_name;?></td>
                    <td class="text-end"><?php $date=date_create($val->date_added); echo date_format($date,"Y/m/d"); ?></td>
                    <td class="text-end"><?php $date1=date_create($val->date_added); echo date_format($date1,"H:i A"); ?></td>
                    <td class="text-start"><?php if($val->is_upgrade == 0) { echo "Apply Plan";} else { echo "Upgrade Plan";} ?></td>
                    <td class="text-start"><?php if($val->status == 0) { echo "Pending";} else if($val->status==1){ echo "Approved";}else if($val->status==2){ echo "Reject";} ?></td>
                    <td class="text-start">
					<?php if($val->status == 0) {?>
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-category<?php echo $val->application_id;?>"> <i class="bi bi-pencil-square"></i> </button>
					<?php } ?>
					</td>
                  </tr>
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
							  <select class="form-control category-status" name="status" id=""  required>
								<option  value="">  </option>
								<option  value="0"> Pending </option>
								<option  value="1"> Approved </option>
								<option  value="2"> Reject </option>
							  </select>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->application_id;?>" required>
							  <input type="hidden" class="form-control" name="u_id" value="<?php echo $val->u_id;?>" required>
							  <input type="hidden" class="form-control" name="service_name" value="<?php echo $val->service_name;?>" required>
							  <input type="hidden" class="form-control" name="email" value="<?php echo $val->emailaddress;?>" required>
							  <input type="hidden" class="form-control" name="customer" value="<?php echo $val->firstname.' '.$val->lastname;?>" required>
							</div>
							<br>
							<div class="col-12 datesched" id="" style="display:none;">
							  <label for="inputNanme4" class="form-label">Schedule Date for Process: </label>
							  <input type="date" class="form-control" name="datesched" >
							</div>
							<div class="col-12 reasonreject" id="" style="display:none;">
							  <label for="inputNanme4" class="form-label">Reason: </label>
							  <textarea class="form-control" name="reason" ></textarea>
							</div>
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