<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/dashboard.php');?>
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
        <div class="col-lg-7">

              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">CHART REPORT</h5>
				  <form class="row" method="post" >
					<div class="col-6" >
						<label for="inputNanme4" class="form-label">Filter by Year: </label>
							<select name="year" class="form-control">
							<?php

							for($year=2021; $year<=date('Y'); $year++){
								if($_POST['year'] == $year){
									echo '<option value="'.$year.'" selected>'.$year.'</option>';
								} else {
									echo '<option value="'.$year.'">'.$year.'</option>';
								}
							}
							?>
							</select>
					</div>
					<div class="col-6" >
						  <div style="height:30px;"></div>
						  <button type="submit" class="btn btn-primary" name="filter_chart"> Filter </button>
					</div>
				  </form>
				 <br>
                 <figure class="highcharts-figure">
					<div id="container"></div>
				</figure>


                </div>
              </div>

        </div>
		
		<div class="col-lg-5">

              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TABLE REPORT (ACTIVE PLAN)</h5>
					<?php
						if(isset($_POST['filter_chart'])){
								$yearchart = $_POST['year'];
						} else {
								$yearchart = date('Y');
						}
  
						$charts = $mysqli->query("SELECT a.* , b.* from sw_application a left join sw_service b on b.service_id = a.service_id where a.status = 3 and DATE_FORMAT(date_added, '%Y') = '$yearchart'");
					?>
					<table class="table datatable" id="">
					<thead>
					  <tr>
						<th class="text-start" scope="col">SERVICES PLAN</th>
						<th class="text-end" scope="col">DATE APPLIED</th>
					  </tr>
					</thead>
					<tbody>
					<?php while($valchart = $charts->fetch_object()){  ?>
					  <tr>
						<td class="text-start"><?php echo $valchart->service_name;?></td>
						<td class="text-end"><?php echo $valchart->date_added;?></td>
					  </tr>
						
					<?php } ?>
					</tbody>
              </table>

                </div>
              </div>

        </div>
	  
	  </div>
      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL SERVICES</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wifi"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo number_format($totalvalservices,2);?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL NAPBOX</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bounding-box"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalvalnapbox;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>
			
		

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL CUSTOMERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalcustomers;?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div>
			
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL SYSTEM USERS</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalvalsystemuser;?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div>
			
			<div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL ACTIVE PLAN</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-server"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalvalsw_application;?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>
			
			<div class="col-xxl-4 col-xl-12">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">TOTAL APPLICATION REQUEST</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-badge"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalvalsw_applications;?></h6>

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