<?php
include('../controller/database.php');


$sw_applicatiosn = $mysqli->query("SELECT a.* , b.* , c.* from sw_application a  
									left join sw_service b on a.service_id = b.service_id  
									left join  sw_customer c on c.u_id = a.customer_id where a.status = 0");


if(isset($_POST['update-application'])){
	
	$id       = $_POST['id'];
	$status   = $_POST['status'];
	
	if($status  == 1){
		$date         = $_POST['datesched'];
		$service_name = $_POST['service_name'];
		$u_id         = $_POST['u_id'];
		$email        = $_POST['email'];
		$customer     = $_POST['customer'];
		
		$mysqli->query("UPDATE sw_application set   status='$status' , schedule_date ='$date' where application_id ='$id' ");
		$mysqli->query("UPDATE sw_customer set   plan='$service_name'  where u_id ='$u_id' ");
		
		$to = $email;
		$subject = "South Woods Cable Application Status";

		$message = "
			<html>
			<head>
			<title>South Woods Application Status</title>
			</head>
			<body>
			<p>Dear , ".$customer."</p>
			<p>Your Application Status is approved and scheduled to Process on  " .$date."</p>
			<p>Thank You!</p>
			
			</html>
		";

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

		mail($to,$subject,$message,$headers);
		
	}else if($status  == 2){
		
		$reason     = $_POST['reason'];
		$email      = $_POST['email'];
		$customer   = $_POST['customer'];
		
		$to = $email;
		$subject = "South Woods Cable Application Status";

		$message = "
			<html>
			<head>
			<title>South Woods Application Status</title>
			</head>
			<body>
			<p>Dear , ".$customer."</p>
			<p>Your Application Status is Rejected, due to reason of :  " .$reason."</p>
			<p>Thank You!</p>
			
			</html>
		";

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

		mail($to,$subject,$message,$headers);
		
		$mysqli->query("UPDATE sw_application set   status='$status' , reason='$reason' where application_id ='$id' ");
	}
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Application Request Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "application-request.php";
							});
			</script>';
	
}
