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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-item"> <i class="bi bi-plus-square"></i> Add Services Plan </button></h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-start">SERVICE NAME</th>
                    <th scope="col"  class="text-start">DESCRIPTION</th>
                    <th scope="col"  class="text-end">PRICE</th>
                    <th scope="col"  class="text-start">IMAGE</th>
                    <th scope="col"  class="text-end">DATE ADDED</th>
                    <th scope="col"  class="text-end">TIME ADDED</th>
                    <th scope="col"  class="text-start">ACTION</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sw_service->fetch_object()){ ?>
                  <tr>
                    <td class="text-start"><?php echo $val->service_name;?></td>
                    <td class="text-start"><?php echo $val->service_desc;?></td>
                    <td class="text-end">₱ <?php echo number_format($val->service_price,2);?></td>
                    <td class="text-start"><img src="../assets/img/<?php echo $val->service_pic;?>" width="200"></td>
					 <td class="text-end"><?php $date=date_create($val->service_upload_date); echo date_format($date,"Y/m/d"); ?></td>
                    <td class="text-end"><?php $date1=date_create($val->service_upload_date); echo date_format($date1,"H:i A"); ?></td>
					 <td class="text-start">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-service<?php echo $val->service_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-service<?php echo $val->service_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
					 <div class="modal fade" id="edit-service<?php echo $val->service_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Service Plan Details</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						    <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Name: </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->service_id;?>" required>
							  <input type="text" class="form-control" name="service_name" value="<?php echo $val->service_name;?>" required>
							</div>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Description: </label>
							  <textarea class="form-control" name="service_desc" required><?php echo $val->service_desc;?></textarea>
							</div><brservice_desc
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="service_price"  value="<?php echo $val->service_price;?>"required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Image: <a href="../assets/img/<?php echo $val->service_pic;?>" target="_blank">(View)</a></label>
							  <input type="file" class="form-control" name="image1" >
							  <input type="hidden" class="form-control" name="images"  value="<?php echo $val->service_pic;?>"required>
							</div>
						</div>
					
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary" name="edit-services">Save </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-service<?php echo $val->service_id;?>" tabindex="-1">
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
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->service_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-services">Delete </button>
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
                      <h5 class="modal-title">Service Plan Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" enctype="multipart/form-data">
						<div class="col-12">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Name: </label>
							  <input type="text" class="form-control" name="service_name" required>
							</div>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Description: </label>
							  <textarea class="form-control" name="service_desc" required></textarea>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Price: </label>
							  <input type="text" class="form-control" name="service_price" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Image: </label>
							  <input type="file" class="form-control" name="image1" required>
							</div>
						</div>
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-services">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>