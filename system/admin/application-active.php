<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/application-active.php');?>

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
                 <a href="application-approved.php"> <button class="nav-link ">APPROVED</button></a>
                </li>
                <li class="nav-item" role="">
                 <a href="application-reject.php"> <button class="nav-link ">REJECT</button></a>
                </li>
				<li class="nav-item" role="">
                 <a href="application-active.php"> <button class="nav-link active">ACTIVE</button></a>
                </li>
              </ul>
          <div class="card">
		  
            <div class="card-body">
			  <br>
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th class="text-start" scope="col">CUSTOMER NAME</th>
                    <th class="text-sstart" scope="col">SERVICES PLAN</th>
                    <th class="text-end" scope="col">DATE OF APPLICATION</th>
                    <th class="text-end" scope="col">TIME OF APPLICATION</th>
                    <th class="text-start" scope="col">STATUS</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sw_applicatiosn->fetch_object()){ ?>
                  <tr>
                    <td class="text-start"><a href="customer-data.php?id=<?php echo $val->u_id;?>" target="_blank"> <i class="bi bi-check-square"></i> <?php echo $val->firstname .' '. $val->lastname;?></a></td>
                    <td class="text-start"><?php echo $val->service_name;?></td>
                    <td class="text-end"><?php $date=date_create($val->date_added); echo date_format($date,"Y/m/d"); ?></td>
                    <td class="text-end"><?php $date1=date_create($val->date_added); echo date_format($date1,"H:i A"); ?></td>
					<td class="text-start">Active</td>
                  </tr>
					
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