<?php
include('../controller/database.php');


$sw_napbox = $mysqli->query("SELECT * from sw_settings");



if(isset($_POST['edit-content'])){
	
	$content      = $_POST['content'];
	$id           = $_POST['id'];
	
	
	$mysqli->query("UPDATE  sw_settings set content= '$content' where settings_id='$id'");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Content Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "settings.php";
							});
			</script>';
	
}