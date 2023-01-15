<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/billing.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">MY SERVICE PLAN</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bookmark-star-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $_SESSION['plan'];?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

       
			<div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">AMOUNT DUE</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-info-circle"></i>
                    </div>
                    <div class="ps-3">
					<?php while($val = $total_balance->fetch_object()){ 
						$balance += $val->billing_cost;
					}
					?>
                      <h6><?php echo number_format($balance,2);?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

       
    
          </div>
        </div>
      </div>
    </section>

  </main>
<?php include('footer.php');?>