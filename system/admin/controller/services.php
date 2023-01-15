<?php
include('../controller/database.php');


$sw_service = $mysqli->query("SELECT * from sw_service");

if(isset($_POST['add-services'])){
	
	$service_name       = $_POST['service_name'];
	$service_desc       = $_POST['service_desc'];
	$service_price      = $_POST['service_price'];
	
	$image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
	$image_name = addslashes($_FILES['image1']['name']);
	$image_size = getimagesize($_FILES['image1']['tmp_name']);
	move_uploaded_file($_FILES["image1"]["tmp_name"], "../assets/img/" . $_FILES["image1"]["name"]);
	$location1   =  $_FILES["image1"]["name"];
	
	$mysqli->query("INSERT INTO sw_service (service_name , service_price,service_desc,service_pic ) VALUES ('$service_name','$service_price','$service_desc','$location1')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Service Plan Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "services.php";
							});
			</script>';
	
}

if(isset($_POST['delete-services'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  sw_service where service_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Service Plan is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "services.php";
							});
			</script>';
	
}

if(isset($_POST['edit-services'])){
	
	$service_name       = $_POST['service_name'];
	$service_desc       = $_POST['service_desc'];
	$service_price      = $_POST['service_price'];
	$id                 = $_POST['id'];
	

	if( $_FILES["image1"]["name"] == ""){
			$location = $_POST['images'];
		} else {
			$image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
			$image_name = addslashes($_FILES['image1']['name']);
			$image_size = getimagesize($_FILES['image1']['tmp_name']);
			move_uploaded_file($_FILES["image1"]["tmp_name"], "../assets/img/" . $_FILES["image1"]["name"]);
			$location   =  $_FILES["image1"]["name"];
	}

	$mysqli->query("UPDATE  sw_service SET service_name = '$service_name' , service_price = '$service_price', service_desc = '$service_desc',service_pic='$location'
					WHERE service_id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "services.php";
							});
			</script>';
	
}