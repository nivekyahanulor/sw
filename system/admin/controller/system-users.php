<?php
include('../controller/database.php');


$users = $mysqli->query("SELECT * from sw_admin");


if(isset($_POST['delete-user'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  sw_admin where admin_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " User is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	
}

if(isset($_POST['update-user'])){
	
	$id             = $_POST['id'];
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];


	$result = $mysqli->query("UPDATE sw_admin set firstname  ='$fname' ,
										 lastname  ='$lname' ,
										 username  ='$username',
										 password  ='$password'
										 WHERE admin_id  = '$id' 
					");

	if($result){
		echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "User Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	}else{
		echo '  <script>
					Swal.fire({
							title: "Error! ",
							text: "Something Wrong!",
							icon: "error",
							type: "error"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	}
		
	
}
	




