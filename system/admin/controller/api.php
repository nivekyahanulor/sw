<?php
include('../../controller/database.php');
error_reporting(0);


if(isset($_POST['validateuser'])){
	$username = $_POST['username'];
	$users = $mysqli->query("SELECT * from sw_admin WHERE username = '$username'");
	echo json_encode($users->num_rows);
}

if(isset($_POST['adduser'])){
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];

	$result = $mysqli->query("INSERT INTO sw_admin (firstname , lastname , username, password ) VALUES ('$fname','$lname','$username','$password')");
	echo json_encode($result);
}

if(isset($_POST['getCustomerByID'])){
	$id          = $_POST['id'];
	$result = $mysqli->query("SELECT * from pos_customer WHERE customer_id = '$id'");
	echo json_encode($result-> fetch_array(MYSQLI_ASSOC));
}

if(isset($_POST['getOrderByID'])){
	$id          = $_POST['id'];
	$result = $mysqli->query("SELECT po.trans_code as transcode,pc.customer_id,CONCAT(pc.firstname,' ',pc.lastname) as cname,pc.address,pi.item_code,pi.item_name,po.qty,pi.item_unit,pi.item_price, (po.qty*pi.item_price) as amount from pos_order AS po 
							LEFT JOIN pos_customer as pc on pc.customer_id  = po.customer_id
							LEFT JOIN pos_items as pi on pi.item_code  = po.item_code
							
							WHERE po.trans_code = '$id'
							ORDER BY po.order_id DESC");
	echo json_encode($result-> fetch_all(MYSQLI_ASSOC));
}

if(isset($_POST['submitPayment'])){
	$transcode          = $_POST['transcode'];
	$orders          	= $_POST['orders'];
	$customer          	= $_POST['customer'];
	$total_amount      	= $_POST['total_amount'];
	$cash          		= $_POST['cash'];
	$customer_id		= $customer['customer_id'];
	foreach ($orders as $key => $value) {
		
		// echo json_encode($value['item_code']);
		$item_code = $value['item_code'];
		$item_qty = $value['item_qty'];
		$result = $mysqli->query("UPDATE  pos_order 
			SET status = 1
			WHERE trans_code ='$transcode'
		");

		$mysqli->query("UPDATE  pos_items 
			SET item_qty = item_qty - '$item_qty'
			WHERE item_code ='$item_code'
		");


	}

	$result = $mysqli->query("INSERT INTO pos_payment (trans_code , total_amount ,cash) VALUES ('$transcode','$total_amount','$cash')");
}

if(isset($_POST['submitOrder'])){
	$transcode          = $_POST['transcode'];
	$orders          	= $_POST['orders'];
	$customer          	= $_POST['customer'];
	// $total_amount      	= $_POST['total_amount'];
	// $cash          		= $_POST['cash'];
	$customer_id		= $customer['customer_id'];
	foreach ($orders as $key => $value) {
		
		// echo json_encode($value['item_code']);
		$item_code = $value['item_code'];
		$item_qty = $value['item_qty'];
		$result = $mysqli->query("INSERT INTO pos_order (customer_id , trans_code ,item_code, qty, status ) VALUES ('$customer_id','$transcode','$item_code','$item_qty','0')");

		// $mysqli->query("UPDATE  pos_items 
		// 	SET item_qty = item_qty - '$item_qty'
		// 	WHERE item_code ='$item_code'
		// ");


	}

	
}

if(isset($_POST['deleteOrder'])){
	$transcode          = $_POST['transcode'];
	$itemcode          	= $_POST['itemcode'];

		$result = $mysqli->query("DELETE FROM pos_order WHERE trans_code = '$transcode' AND item_code = '$itemcode' AND status = 0");

		// $mysqli->query("UPDATE  pos_items 
		// 	SET item_qty = item_qty - '$item_qty'
		// 	WHERE item_code ='$item_code'
		// ");


		if($result){
			echo json_decode($result->affected_rows);
		}else{
			echo json_decode($result->affected_rows);
		}

	
}