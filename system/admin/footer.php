
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SOUTH WOODS</span></strong>. All Rights Reserved 2022
    </div>
    <div class="credits">
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/js/moment.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/datatable/datatables.min.js"></script>
      <!-- Datatable Dependency start -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
var printContents = document.getElementById("example").innerHTML;
 var originalContents = document.body.innerHTML;

 document.body.innerHTML = printContents;

 window.print();

 document.body.innerHTML = originalContents;
</script>
  <script>
   var d = new Date();

  
  $('.category-status').on('change', function() {
	  // alert(this.value);
	  if( this.value == 0){
		  $(".datesched").hide();
		  $(".reasonreject").hide();
	  }else if( this.value == 1){
		  $(".datesched").show();
		  $(".reasonreject").hide();
	  }else if( this.value == 2){
		  $(".datesched").hide();
		  $(".reasonreject").show();
	  }
	});
	$('.paid-status').on('change', function() {
		// alert('test');
	  if( this.value == 'Paid'){
		  $(".paiddate").show();
	  }else if( this.value =='Not Paid'){
		  $(".paiddate").hide();
	  }
	});
   $('.check-status').on('change', function() {
	  if( this.value == '1'){
		  $(".boxnumber").show();
		  $(".reschedule").hide();
	  }else if( this.value =='2'){
		  $(".boxnumber").hide();
		  $(".reschedule").show();	
	  }
	});
  
  $(document).ready(function() {
            // $('#table1').DataTable({
                // dom: 'Bfrtip',
                // pageLength: 25,
				// title: 'SOUTHWOODS CABLE TELEVISION BROADBAND INC.',
                // buttons: [
                    // 'csv', 'excel', 'pdf', 'print'
                // ]

            // }); 
			
			$('#table1').DataTable({
			   pageLength: 25,
				dom: 'Bfrtilp',  
				buttons:[ 
				{
				extend:    'excelHtml5',
				text:      ' <i class="bi bi-file-excel"></i>',
				titleAttr: 'Export to Excel',
				title: '',
				className: 'btn btn-success',
						messageTop: 'SOUTHWOODS CABLE TELEVISION BROADBAND INC.',
						exportOptions: {
							columns: [0, 1, 2, 3,4]
						}
				},
				{
				extend:    'pdfHtml5',
				text:      '<i class="bi bi-file-earmark-pdf"></i> ',
				title: '',
				titleAttr: 'Export to PDF',
						className: 'btn btn-danger',
						messageTop: 'SOUTHWOODS CABLE TELEVISION BROADBAND INC.',
						exportOptions: {
							columns: [0, 1, 2, 3,4]
						}
				 },
				 {
				extend:    'print',
				text:      '<i class="bi bi-printer"></i>',
				titleAttr: 'Print',
				title: '',
				className: 'btn btn-info',
						messageTop: '<center> <img style="vertical-align: middle;" src = "../../assets/img/sw.png" width="60px" > <b> SOUTHWOODS CABLE TELEVISION BROADBAND INC.</b> <div style="height:2px;"></div> <small> 9085 San Pablo St. Brgy 1 Carmona Cavite</small> </center>',
						messageBottom: '<div align="right"> Date: ' + d.toLocaleString()  + ' <br> Prepared By:__________________ </div>',
						exportOptions: {
							columns: [0, 1, 2, 3,4]
						}
					},
				],
				"order": [[ 1, "asc" ]],
			});
			
        });
  </script>
  <?php
  include('../controller/database.php');
  $charts = $mysqli->query("SELECT * from sw_service");

  // while($valchart = $charts->fetch_object()){ 
		 // $serviceid = $valchart->service_id;
		 // $greport1 = $mysqli->query("SELECT  service_id, SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
											   // SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
											   // SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
											   // SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
											   // SUM(IF(month = 'May', total, 0)) AS 'May', 
											   // SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
											   // SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
											   // SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
											   // SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
											   // SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
											   // SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
											   // SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
											   // FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
											   // COUNT(*) as total ,
											   // service_id 
											   // FROM sw_application 
											   // WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month)
                                               // and service_id = '$serviceid'
											   // GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub");
				
				// $row11    = $greport1->fetch_assoc();
				// $value1 = array();
				// foreach($row11 as $val1 => $res1){
					
					// if($row11['service_id'] == $serviceid){
							// $value1[] =  (int)$res1;
					// }	
					// $month1[] =  $val1;
					

				// }
				
					
				// echo " data: ". json_encode(array_slice($value1,1)) ." ";
  // }
				

  ?>
  <?php
	
	if(isset($_POST['filter_chart'])){
			$yearchart = $_POST['year'];
	} else {
			$yearchart = date('Y');
	}
  
  ?>
  <script>
Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Services Plan Report ' + <?php echo $yearchart;?>
    },
    subtitle: {
        text: 'Source: southwoodscable.com'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        accessibility: {
            description: 'Months of the year'
        }
    },
    yAxis: {
        title: {
            text: 'Value'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [
			<?php
				while($valchart = $charts->fetch_object()){ 
				 $serviceid = $valchart->service_id;
			?>
			{
				name: '<?php echo $valchart->service_name;?>',
				<?php 
				 $greport11 = $mysqli->query("SELECT  service_id, SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
											   SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
											   SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
											   SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
											   SUM(IF(month = 'May', total, 0)) AS 'May', 
											   SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
											   SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
											   SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
											   SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
											   SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
											   SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
											   SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
											   FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
											   COUNT(*) as total ,
											   service_id 
											   FROM sw_application 
											   WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month)
                                               and service_id = '$serviceid' and DATE_FORMAT(date_added, '%Y') = '$yearchart' and status = 3
											   GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub");
				
				$row11    = $greport11->fetch_assoc();
				$value11 = array();
				foreach($row11 as $val11 => $res11){
					if($row11['service_id'] == $serviceid){
							$value11[] =  (int)$res11;
					}	
					$month11[] =  $val11;
				?>
				
				<?php 
				}
				?>
				data: <?php  echo json_encode(array_slice($value11,1));?>
				// data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
			},
			<?php } ?>
	]
});
  
  </script>
</body>

</html>