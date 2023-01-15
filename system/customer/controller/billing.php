<?php
include('../controller/database.php');


$id              = $_SESSION['id'];
$sw_applicatiosn = $mysqli->query("select * from sw_billing where billing_name = '$id'");
$total_balance   = $mysqli->query("select * from sw_billing where billing_name = '$id' and (billing_status='Not Paid' or billing_status='')");

