<?php

	ob_start();
	session_start();
	include('database.php');

	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);

	$sql      = "SELECT * FROM sw_admin WHERE username='$username' AND BINARY password='$password'";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);
	$rows	  = mysqli_num_rows($result);
	
	if($rows==1){
		$_SESSION['name']  = $row['firstname'].' '. $row['lastname'];
		$_SESSION['id']    = $row['admin_id'];
		header("location:../admin/index.php");
	} else { 
		$sql      = "SELECT * FROM sw_customer WHERE username='$username' AND BINARY password='$password'";
		$result   = mysqli_query($mysqli, $sql);

		$row      = mysqli_fetch_assoc($result);
		$rows	  = mysqli_num_rows($result);
		if($rows==1){
			$_SESSION['name']  = $row['firstname'].' '. $row['lastname'];
			$_SESSION['id']    = $row['u_id'];
			$_SESSION['plan']  = $row['plan'];
			header("location:../customer/index.php"); 
		} else {
			header("location:../../login.php?error"); 

		}
	}
