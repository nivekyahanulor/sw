<?php
include('../controller/database.php');


$sw_napbox = $mysqli->query("SELECT * from sw_napbox");

if(isset($_POST['add-napbox'])){
	
	$city         = $_POST['city'];
	$barangay     = $_POST['barangay'];
	$area         = $_POST['area'];
	$boxnumber    = $_POST['boxnumber'];
	$postnumber   = $_POST['postnumber'];
	$slot         = $_POST['slot'];
	
	
	$mysqli->query("INSERT INTO sw_napbox (city , barangay,area,boxnumber,postnumber,slot ) VALUES ('$city','$barangay','$area','$boxnumber','$postnumber','$slot')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Nap Box Details Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "napbox.php";
							});
			</script>';
	
}

if(isset($_POST['delete-napbox'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  sw_napbox where napbox_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Service Plan is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "napbox.php";
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