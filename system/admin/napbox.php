<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/napbox.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Nap Box Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Nap Box</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-item"> <i class="bi bi-plus-square"></i> Add Nap Box </button></h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-end">Box Number</th>
                    <th scope="col"  class="text-start">City / Municipality</th>
                    <th scope="col"  class="text-start">Barangay</th>
                    <th scope="col"  class="text-start">Area /  Subdivision</th>
                    <th scope="col"  class="text-start">Post Number</th>
                    <th scope="col"  class="text-end">Slot Count</th>
                    <th scope="col"  class="text-end">Date Added</th>
                    <th scope="col"  class="text-start">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sw_napbox->fetch_object()){ ?>
                  <tr>
                    <td class="text-end"><?php echo $val->boxnumber;?></td>
                    <td class="text-start"><?php echo $val->city;?></td>
                    <td class="text-start"><?php echo $val->barangay;?></td>
                    <td class="text-start"><?php echo $val->area;?></td>
                    <td class="text-start"><?php echo $val->postnumber;?></td>
                    <td class="text-end"><?php echo $val->slot;?></td>
                    <td class="text-end"><?php echo $val->date_added;?></td>
					 <td class="text-start">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-napbox<?php echo $val->napbox_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-napbox<?php echo $val->napbox_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
					 <div class="modal fade" id="edit-napbox<?php echo $val->napbox_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Nap Box Details</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">City /  Municipality: </label>
							  <input type="text" class="form-control" name="city" value="Carmona" readonly required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->napbox_id;?>" readonly required>
							</div>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Barangay: </label>
							 	<select class="form-control" name="barangay" required>
										<option value=""> - Select Barangay - </option>
										<?php 
											$sw_barangay = $mysqli->query("SELECT * from sw_barangay");
											while($val1 = $sw_barangay->fetch_object()){ 
											if($val->barangay == $val1->barangay){
										?>
										<option value="<?php echo $val1->barangay;?>" selected> <?php echo $val1->barangay;?> </option>
										<?php } else { ?>
										<option value="<?php echo $val1->barangay;?>" > <?php echo $val1->barangay;?> </option>
										<?php } } ?>
									  </select>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Area /  Subdivision: </label>
							  <input type="text" class="form-control" name="area" value="<?php echo $val->area;?>" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Box Number: </label>
							  <input type="text" class="form-control" name="boxnumber" value="<?php echo $val->boxnumber;?>" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Slot Count: </label>
							  <input type="text" class="form-control" name="slot" value="<?php echo $val->slot;?>" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Post Number: </label>
							  <input type="text" class="form-control" name="postnumber" value="<?php echo $val->postnumber;?>" required>
							</div><br>
						</div>
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="edit-napbox">Update </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-napbox<?php echo $val->napbox_id;?>" tabindex="-1">
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
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->napbox_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-napbox">Delete </button>
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
                      <h5 class="modal-title">Nap Box Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">City /  Municipality: </label>
							  <input type="text" class="form-control" name="city" value="Carmona" readonly required>
							</div>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Barangay: </label>
							 	<select class="form-control" name="barangay" required>
										<option value=""> - Select Barangay - </option>
										<?php 
											$sw_barangay = $mysqli->query("SELECT * from sw_barangay");
											while($val1 = $sw_barangay->fetch_object()){ 
										?>
										<option value="<?php echo $val1->barangay;?>"> <?php echo $val1->barangay;?> </option>
										<?php } ?>
									  </select>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Area /  Subdivision: </label>
							  <input type="text" class="form-control" name="area" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Box Number: </label>
							  <input type="text" class="form-control" name="boxnumber" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Slot Count: </label>
							  <input type="text" class="form-control" name="slot" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Post Number: </label>
							  <input type="text" class="form-control" name="postnumber" required>
							</div><br>
						</div>
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-napbox">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>