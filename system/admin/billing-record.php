<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/billing-record.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Billing Records : <?php echo $_GET['name'];?></h1>
      <h4>Service Plan : <?php echo $_GET['plan'] . ' :  ' . number_format($_GET['amount'],2);?></h4>
     
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
			  <button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-item"> <i class="bi bi-plus-square"></i> Add Billing Record </button>
			  <button class="btn btn-warning btn-md" data-bs-toggle="modal" data-bs-target="#add-item-1"> <i class="bi bi-exclamation-circle"></i> Email Disconnection Notice </button>
			  </h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                   <tr>
                    <th class="text-center" scope="col">Referrence Number</th>
                    <th class="text-center" scope="col">Billing Date</th>
                    <th class="text-center" scope="col">Amount</th>
                    <th class="text-center" scope="col">Due Date</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Date of Payment</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sw_applicatiosn->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->billing_ref;?></td>
                    <td class="text-center"><?php echo $val->billing_date_from . ' '.$val->billing_date_end;?></td>
                    <td class="text-center">₱ <?php echo number_format($val->billing_cost,2);?></td>
                    <td class="text-center"><?php echo $val->billing_duedate;?></td>
                    <td class="text-center"><?php echo $val->billing_status;?></td>
                    <td class="text-center"><?php echo $val->billing_paid_date;?></td>
					<td class="text-center">
						<?php if($val->billing_status=='Not Paid' || $val->billing_status==''){?>
						<button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#edit-status<?php echo $val->billing_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<?php } ?>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-user<?php echo $val->billing_id;?>"> <i class="bi bi-trash"></i> </button>

					</td>
                  </tr>
				  	<div class="modal fade" id="delete-user<?php echo $val->billing_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Data</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Data?
							  <input type="text" class="form-control" name="id" value="<?php echo $val->billing_id;?>" required>
							  <input type="text" class="form-control" name="u_id" value="<?php echo $_GET['id'];?>" required>
							  <input type="text" class="form-control" name="name" value="<?php echo $_GET['name'];?>" required>
							  <input type="text" class="form-control" name="plan" value="<?php echo $_GET['plan'];?>" required>
							  <input type="text" class="form-control" name="amount" value="<?php echo $_GET['amount'];?>" required>
							  <input type="text" class="form-control" name="email" value="<?php echo $_GET['email'];?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-billing">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>	
				   <div class="modal fade" id="edit-status<?php echo $val->billing_id;?>" tabindex="-1">
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
							  <select class="form-control paid-status" name="status" id="" required>
								<option  value="">  </option>
								<option  value="Paid"> Paid </option>
								<option  value="Not Paid"> Not Paid </option>
							  </select>
							  <input type="hidden" class="form-control" name="u_id" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="name" value="<?php echo $_GET['name'];?>" required>
							  <input type="hidden" class="form-control" name="plan" value="<?php echo $_GET['plan'];?>" required>
							  <input type="hidden" class="form-control" name="amount" value="<?php echo $_GET['amount'];?>" required>
							  <input type="hidden" class="form-control" name="billing_id" value="<?php echo $val->billing_id;?>" required>
							  <input type="hidden" class="form-control" name="email" value="<?php echo $_GET['email'];?>" required>
							</div>
							<br>
							<div class="col-12 paiddate" style="display:none;">
							  <label for="inputNanme4" class="form-label">Date Of Payment: </label>
							  <input type="date" class="form-control" name="datepay" >
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
	
	  
	    <div class="modal fade" id="add-item" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Billing Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Referrence Number: </label>
							  <input type="text" class="form-control" name="ref_number" required>
							  <input type="hidden" class="form-control" name="u_id" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="name" value="<?php echo $_GET['name'];?>" required>
							  <input type="hidden" class="form-control" name="plan" value="<?php echo $_GET['plan'];?>" required>
							  <input type="hidden" class="form-control" name="amount" value="<?php echo $_GET['amount'];?>" required>
							  <input type="hidden" class="form-control" name="email" value="<?php echo $_GET['email'];?>" required>
							</div>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Billing Date From: </label>
							  <input type="date" class="form-control" name="bdf" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Billing Date End: </label>
							  <input type="date" class="form-control" name="bde" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Amount: </label>
							  <input type="text" class="form-control" name="amount1" value="<?php echo $_GET['amount'];?>"  required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Due Date: </label>
							  <input type="date" class="form-control" name="duedate" required>
							</div><br>
							
						</div>
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-billing">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>	   

		<div class="modal fade" id="add-item-1" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Disconnection Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Referrence Number: </label>
							  <input type="text" class="form-control" name="ref_number" required>
							  <input type="hidden" class="form-control" name="u_id" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="name" value="<?php echo $_GET['name'];?>" required>
							  <input type="hidden" class="form-control" name="plan" value="<?php echo $_GET['plan'];?>" required>
							  <input type="hidden" class="form-control" name="email" value="<?php echo $_GET['email'];?>" required>
							</div>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Billing Date From: </label>
							  <input type="date" class="form-control" name="bdf" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Billing Date End: </label>
							  <input type="date" class="form-control" name="bde" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Amount to Pay: </label>
							  <input type="text" class="form-control" name="amount" value="<?php echo $_GET['amount'];?>"  required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Disconnection Date: </label>
							  <input type="date" class="form-control" name="duedate" required>
							</div><br>
							
						</div>
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-disconnection">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>