<?php
include('../controller/database.php');


$sw_applicatiosn = $mysqli->query("SELECT a.* , b.* , c.* from sw_application a  
									left join sw_service b on a.service_id = b.service_id  
									left join  sw_customer c on c.u_id = a.customer_id where a.status = 1");


if(isset($_POST['update-application'])){
	
	$id          = $_POST['id'];
	$status      = $_POST['status'];
	$email       = $_POST['email'];
	$customer    = $_POST['customer'];
	$service_id  = $_POST['service_id'];
	$upgrade     = $_POST['is_upgrade'];
	$u_id        = $_POST['u_id'];
	
	if($status == 1){
	$boxnumber   = $_POST['boxnumber'];
	
		if($upgrade == 1){
			$mysqli->query("UPDATE sw_application set   is_active='1' where customer_id ='$u_id' ");
			$mysqli->query("UPDATE sw_application set   status='3' , is_active = '0' where application_id ='$id' ");
		} else {
			$mysqli->query("UPDATE sw_application set   status='3' where application_id ='$id' ");
			$mysqli->query("UPDATE sw_napbox set   slot=slot-1  where boxnumber ='$boxnumber' ");	
		}
		
	// $mysqli->query("UPDATE sw_service set total=total+1  where service_id  ='$service_id ' ");
	
	$to = $email;
	$subject = "South Woods Cable Application Active";

	$message = "
			<html>
			<head>
			<title>South Woods Application Active</title>
			</head>
			<body>
			<p>Dear , ".$customer."</p>
			<p>Your Application Status is now Active! Enjoy using our Plan and Services!</p>
			<p>Thank You!</p>
			
			</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

	mail($to,$subject,$message,$headers);
	
	} else {
	$reschedule      = $_POST['reschedule'];
	
	
	$to = $email;
	$subject = "South Woods Cable Application Active";

	$message = "
			<html>
			<head>
			<title>South Woods Application Active</title>
			</head>
			<body>
			<p>Dear , ".$customer."</p>
			<p>Your Application Status is now for Re-Schedule on : " . $reschedule . "</p>
			<p>Thank You!</p>
			
			</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

	mail($to,$subject,$message,$headers);
	
	$mysqli->query("UPDATE sw_application set   schedule_date='$reschedule',resched=1 where application_id ='$id' ");
	}

	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Application Status Is now Active",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "application-approved.php";
							});
			</script>';
	
}



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
								window.location = "application-approved.php";
							});
			</script>';
	
}
