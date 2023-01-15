<?php
include('../controller/database.php');


$sw_applicatiosn = $mysqli->query("SELECT a.* , b.* , c.* from sw_application a  
									left join sw_service b on a.service_id = b.service_id  
									left join  sw_customer c on c.u_id = a.customer_id where a.status = 2");


if(isset($_POST['delete-application'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  sw_application where application_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Application is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "application-reject.php";
							});
			</script>';
	
}
