<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/settings.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Location</th>
                    <th scope="col"  class="text-center">Content</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sw_napbox->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->location;?></td>
                    <td class="text-center"><?php echo $val->content;?></td>
					 <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-napbox<?php echo $val->settings_id;?>"> <i class="bi bi-pencil-square"></i> </button>
					</td>
                  </tr>
				  
					 <div class="modal fade" id="edit-napbox<?php echo $val->settings_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Content</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<form class="row g-3" method="post" enctype="multipart/form-data">
						<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Content: </label>
							  <textarea type="text" class="form-control" style="height:300px" name="content" required><?php echo $val->content;?></textarea>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->settings_id;?>" readonly required>
							</div>
							<br>
							
					
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="edit-content">Update </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
						</div>
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