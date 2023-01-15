<?php

	ob_start();
	session_start();
	include('database.php');

	$firstname        = mysqli_real_escape_string($mysqli,$_POST['firstname']);
	$lastname         = mysqli_real_escape_string($mysqli,$_POST['lastname']);
	$middlename       = mysqli_real_escape_string($mysqli,$_POST['middlename']);
	$contactnumber    = mysqli_real_escape_string($mysqli,$_POST['contactnumber']);
	$emailaddress     = mysqli_real_escape_string($mysqli,$_POST['emailaddress']);
	$address          = mysqli_real_escape_string($mysqli,$_POST['address']);
	$province         = mysqli_real_escape_string($mysqli,$_POST['province']);
	$city             = mysqli_real_escape_string($mysqli,$_POST['city']);
	$barangay         = mysqli_real_escape_string($mysqli,$_POST['barangay']);
	$username         = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password         = mysqli_real_escape_string($mysqli,$_POST['password']);
	
	$image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
	$image_name = addslashes($_FILES['image1']['name']);
	$image_size = getimagesize($_FILES['image1']['tmp_name']);
	move_uploaded_file($_FILES["image1"]["tmp_name"], "../assets/validid/" . $_FILES["image1"]["name"]);
	$location1   =  $_FILES["image1"]["name"];
	
	$image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
	$image_name = addslashes($_FILES['image2']['name']);
	$image_size = getimagesize($_FILES['image2']['tmp_name']);
	move_uploaded_file($_FILES["image2"]["tmp_name"], "../assets/proffofbilling/" . $_FILES["image2"]["name"]);
	$location2   =  $_FILES["image2"]["name"];
	
	$image3 = addslashes(file_get_contents($_FILES['image3']['tmp_name']));
	$image_name = addslashes($_FILES['image3']['name']);
	$image_size = getimagesize($_FILES['image3']['tmp_name']);
	move_uploaded_file($_FILES["image3"]["tmp_name"], "../assets/picture/" . $_FILES["image3"]["name"]);
	$location3   =  $_FILES["image3"]["name"];
	
	$check = $mysqli->query("select * from sw_customer where emailaddress = '$emailaddress'");
	echo $count = $check->num_rows;
	
	if($count != 0){
		header("location:../../register.php?duplicateemail");
	} else {

	$mysqli->query("INSERT INTO sw_customer (firstname , lastname ,middlename,emailaddress,contactnumber,address,province,city,barangay,username,password,valid_id,proof_billing,picture) 
											VALUES ('$firstname','$lastname','$middlename','$emailaddress','$contactnumber','$address','$province','$city','$barangay','$username','$password','$location1','$location2','$location3')");
	
	
	// SEND EMAIL //
	$to = $emailaddress;
	$subject = "South Woods Cable Account";

	$message = "
	<html>
	<head>
	<title>South Woods Account</title>
	</head>
	<body>
	<p>Thank You for Choosing and Registering in South Woods Cable</p>
	<p>Register using your registered account!</p>
	<p>Thank You!</p>
	
	</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <southwoodscable@gmail.com>' . "\r\n";

	mail($to,$subject,$message,$headers);
	
	header("location:../../register.php?registered");
	
	}
