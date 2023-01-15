<?php
include('../controller/database.php');


$customer = $mysqli->query("SELECT * from sw_customer");


if(isset($_POST['delete-customer'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  sw_customer where u_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Customer is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "customer.php";
							});
			</script>';
	
}
