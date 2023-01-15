<?php
include('../controller/database.php');

$id              = $_GET['id'];
$sw_applicatiosn = $mysqli->query("select * from sw_billing where billing_name = '$id'");



if(isset($_POST['add-billing'])){
	
	$ref_number   = $_POST['ref_number'];
	$u_id         = $_POST['u_id'];
	$name         = $_POST['name'];
	$plan         = $_POST['plan'];
	$amount       = $_POST['amount'];
	$bdf          = $_POST['bdf'];
	$bde          = $_POST['bde'];
	$amount1      = $_POST['amount1'];
	$duedate      = $_POST['duedate'];
	$email        = $_POST['email'];
	
	
	
	$to = $email;
	$subject = "South Woods Cable Billing Status";

	$message = "
			<html>
			<head>
			<title>South Woods  Billing Status</title>
			</head>
			<body>
			<p>Dear , ".$name."</p>
			<p>Reference Number : ".$ref_number."</p>
			<p>Your Billing as of ".$bdf." to ".$bde." Amounted of : Php " . $amount . "</p>
			<p>Due Date as of ".$duedate."</p>
			<p>Thank You!</p>
			
			</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

	mail($to,$subject,$message,$headers);
	
	$mysqli->query("INSERT INTO sw_billing (billing_name , billing_ref,billing_date_from,billing_date_end,billing_cost,billing_duedate ) 
					VALUES ('$u_id','$ref_number','$bdf','$bde','$amount1','$duedate')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Billing Data Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "billing-record.php?id=' . $u_id .'&name='. $name .'&plan='.$plan.'&amount='.$amount.' &email='.$email.' ";								;
							});
			</script>';
	
}


if(isset($_POST['add-disconnection'])){
	
	$ref_number   = $_POST['ref_number'];
	$u_id         = $_POST['u_id'];
	$name         = $_POST['name'];
	$plan         = $_POST['plan'];
	$amount       = $_POST['amount'];
	$bdf          = $_POST['bdf'];
	$bde          = $_POST['bde'];
	$amount1      = $_POST['amount1'];
	$duedate      = $_POST['duedate'];
	$email        = $_POST['email'];
	
	
	
	$to = $email;
	$subject = "South Woods Cable Disconnection Notice";

	$message = "
			<html>
			<head>
			<title>South Woods  Disconnection Notice</title>
			</head>
			<body>
			<p>Dear , ".$name."</p>
			<p>Reference Number : ".$ref_number."</p>
			<p>Your Disconnection Notice as of ".$bdf." to ".$bde." Amounted of : Php " . $amount . "</p>
			<p>Disconnection Date : ".$duedate."</p>
			<p>Thank You!</p>
			
			</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

	mail($to,$subject,$message,$headers);
	
	// $mysqli->query("INSERT INTO sw_billing (billing_name , billing_ref,billing_date_from,billing_date_end,billing_cost,billing_duedate ) 
					// VALUES ('$u_id','$ref_number','$bdf','$bde','$amount1','$duedate')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Disconnection Details Successfully Sent",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "billing-record.php?id=' . $u_id .'&name='. $name .'&plan='.$plan.'&amount='.$amount.' &email='.$email.' ";								;
							});
			</script>';
	
}

if(isset($_POST['update-application'])){
	
	$status       = $_POST['status'];
	$datepay      = $_POST['datepay'];
	$u_id         = $_POST['u_id'];
	$name         = $_POST['name'];
	$plan         = $_POST['plan'];
	$amount       = $_POST['amount'];
	$billing_id   = $_POST['billing_id'];
	$email        = $_POST['email'];
	
	if($status == 'Paid'){
	$mysqli->query("UPDATE sw_billing set billing_status = '$status' , billing_paid_date = '$datepay' where billing_id ='$billing_id' ");
	
	$to = $email;
	$subject = "South Woods Cable Billing Status";

	$message = "
			<html>
			<head>
			<title>South Woods  Billing Status</title>
			</head>
			<body>
			<p>Dear , ".$name."</p>
			<p>Thank you for paying your Bill ! </p>
			
			</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

	mail($to,$subject,$message,$headers);
	} else {
	$mysqli->query("UPDATE sw_billing set billing_status = '$status' where billing_id ='$billing_id' ");
	}
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Billing  Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "billing-record.php?id=' . $u_id .'&name='. $name .'&plan='.$plan.'&amount='.$amount.' &email='.$email.' ";								;
							});
			</script>';
	
}

if(isset($_POST['edit-napbox'])){
	
	$city         = $_POST['city'];
	$barangay     = $_POST['barangay'];
	$area         = $_POST['area'];
	$boxnumber    = $_POST['boxnumber'];
	$postnumber   = $_POST['postnumber'];
	$slot         = $_POST['slot'];
	$id           = $_POST['id'];
	
	
	$mysqli->query("UPDATE  sw_napbox set city= '$city' , barangay = '$barangay',area= '$area',boxnumber='$boxnumber',postnumber='$postnumber',slot='$slot' where napbox_id='$id'");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Nap Box Details Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "napbox.php";
							});
			</script>';
	
}


if(isset($_POST['delete-billing'])){
	
	$id       = $_POST['id'];
	$u_id         = $_POST['u_id'];
	$name         = $_POST['name'];
	$plan         = $_POST['plan'];
	$amount       = $_POST['amount'];
	$email        = $_POST['email'];
	$mysqli->query("DELETE FROM  sw_billing where billing_id  ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Billing Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "billing-record.php?id=' . $u_id .'&name='. $name .'&plan='.$plan.'&amount='.$amount.' &email='.$email.' ";								;
							});
			</script>';
	
}
