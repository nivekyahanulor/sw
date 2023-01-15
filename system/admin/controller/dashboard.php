<?php
include('../controller/database.php');



$customers = $mysqli->query("SELECT count(*)customers from sw_customer");
while($valcustomers = $customers->fetch_object()){ 
		$totalcustomers =  $valcustomers->customers;
}

$services = $mysqli->query("SELECT count(*)sw_service from sw_service");
while($valservices = $services->fetch_object()){ 
		$totalvalservices =  $valservices->sw_service;
}

$napbox = $mysqli->query("SELECT count(*)napbox from sw_napbox");
while($valnapbox = $napbox->fetch_object()){ 
		$totalvalnapbox =  $valnapbox->napbox;
}

$systemuser = $mysqli->query("SELECT count(*)user from sw_admin");
while($valsystemuser = $systemuser->fetch_object()){ 
		$totalvalsystemuser =  $valsystemuser->user;
}

$systemuser = $mysqli->query("SELECT count(*)user from sw_admin");
while($valsystemuser = $systemuser->fetch_object()){ 
		$totalvalsystemuser =  $valsystemuser->user;
}

$sw_application = $mysqli->query("SELECT count(*)user from sw_application where status = 3");
while($valsw_application = $sw_application->fetch_object()){ 
		$totalvalsw_application =  $valsw_application->user;
}

$sw_applications = $mysqli->query("SELECT count(*)user from sw_application where status = 0");
while($valsw_applications = $sw_applications->fetch_object()){ 
		$totalvalsw_applications =  $valsw_applications->user;
}

