<?php
include('../controller/database.php');



if(isset($_POST['update-profile'])){
	
	$firstname       = $_POST['firstname'];
	$lastname        = $_POST['lastname'];
	$middlename      = $_POST['middlename'];
	$contactnumber   = $_POST['contactnumber'];
	$address         = $_POST['address'];
	$province        = $_POST['province'];
	$city            = $_POST['city'];
	$barangay        = $_POST['barangay'];
	$username        = $_POST['username'];
	$password        = $_POST['password'];
	$id              = $_POST['id'];
	
	
	$mysqli->query("UPDATE sw_customer SET 
		firstname ='$firstname',
		lastname ='$lastname',
		middlename ='$middlename',
		contactnumber ='$contactnumber',
		address ='$address',
		province ='$province',
		city ='$city',
		barangay ='$barangay'
		where u_id = '$id'
	");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Your Profile Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "profile.php";
							});
			</script>';
	
}
if(isset($_POST['update-docs'])){
	
	$id              = $_POST['id'];
	
	if( $_FILES["image1"]["name"] == ""){
					$location1 = $_POST['valid_id'];
			} else {
					$image = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
					$image_name = addslashes($_FILES['image1']['name']);
					$image_size = getimagesize($_FILES['image1']['tmp_name']);
					move_uploaded_file($_FILES["image1"]["tmp_name"], "../assets/validid/" . $_FILES["image1"]["name"]);
					$location1   =  $_FILES["image1"]["name"];
	}
	if( $_FILES["image2"]["name"] == ""){
					$location2 = $_POST['proof_billing'];
			} else {
					$image = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
					$image_name = addslashes($_FILES['image2']['name']);
					$image_size = getimagesize($_FILES['image2']['tmp_name']);
					move_uploaded_file($_FILES["image2"]["tmp_name"], "../assets/proffofbilling/" . $_FILES["image2"]["name"]);
					$location2   =  $_FILES["image2"]["name"];
	}
	
	$mysqli->query("UPDATE sw_customer SET 
		valid_id ='$location1',
		proof_billing ='$location2'
		where u_id = '$id'
	");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Your Document Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "profile.php";
							});
			</script>';
	
}
