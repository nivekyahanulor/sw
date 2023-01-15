<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/customer.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Customer</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			 
			 <br>
              <!-- Table with stripped rows -->
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th scope="col"  class="text-end">NO.</th>
                    <th scope="col"  class="text-start">NAME</th>
                    <th scope="col"  class="text-start">ADDRESS</th>
                    <th scope="col"  class="text-end">CONTACT</th>
                    <th scope="col"  class="text-start">DATE ADDED</th>
                    <th scope="col"  class="text-start">ACTION</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
				$cnt = 1;
				while($val = $customer->fetch_object()){ ?>
                  <tr>
                    <td class="text-end"><?php echo $cnt++;?></td>
                    <td class="text-start"><?php echo $val->firstname . ' '. $val->lastname;?></td>
                    <td class="text-start"><?php echo $val->address;?></td>
                    <td class="text-end"><?php echo $val->contactnumber;?></td>
                    <td class="text-start"><?php echo $val->date_added;?></td>
                    <td class="text-start">
						<a href="customer-data.php?id=<?php echo $val->u_id;?>"><button class="btn btn-info" > <i class="bi bi-person-square"></i> </button></a>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-user<?php echo $val->u_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  <div class="modal fade" id="delete-user<?php echo $val->u_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Customer</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Customer Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->u_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-customer">Delete </button>
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
	
	    <div class="modal fade" id="add-customer" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Customer Registration</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
					
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">First Name: </label>
						  <input type="text" class="form-control" name="fname" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Last Name: </label>
						  <input type="text" class="form-control" name="lname" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Address: </label>
						  <input type="text" class="form-control" name="address" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Contact Number: </label>
						  <input type="text" class="form-control" name="contactnumber" required>
						</div>
					 <!---
					 <div class="col-6">
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Shipper: </label>
						  <input type="text" class="form-control" name="salesman" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Area: </label>
						  <input type="text" class="form-control" name="salesman" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Salesman: </label>
						  <select  class="form-control" name="salesman" required>
							<option> - Select Salesman -</option>
						  </select>
						</div>
					 </div>
					--->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-customer">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>