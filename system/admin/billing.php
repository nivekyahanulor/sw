<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/billing.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer Billing  Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Customer Billing </li>
          <li class="breadcrumb-item active">Data</li>
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
                    <th class="text-start" scope="col">CUSTOMER NAME</th>
                    <th class="text-start" scope="col">SERVICES PLAN</th>
                    <th class="text-end" scope="col">AMOUNT</th>
                    <th class="text-start" scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sw_applicatiosn->fetch_object()){ ?>
                  <tr>
                    <td class="text-start"><a href="customer-data.php?id=<?php echo $val->u_id;?>" target="_blank">  <?php echo $val->firstname .' '. $val->lastname;?></a></td>
                    <td class="text-start"><?php echo $val->service_name;?></td>
                    <td class="text-end">₱ <?php echo number_format($val->service_price,2);?></td>
					 <td class="text-start">
						<a href="billing-record.php?id=<?php echo $val->u_id;?>&name=<?php echo $val->firstname .' '. $val->lastname;?>&plan=<?php echo $val->service_name;?>&amount=<?php echo $val->service_price;?>&email=<?php echo $val->emailaddress;?>"><button class="btn btn-primary"> <i class="bi bi-clipboard"></i> </button></a>
					</td>
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