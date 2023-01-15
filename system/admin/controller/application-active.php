<?php
include('../controller/database.php');


$sw_applicatiosn = $mysqli->query("SELECT a.* , b.* , c.* from sw_application a  
									left join sw_service b on a.service_id = b.service_id  
									left join  sw_customer c on c.u_id = a.customer_id where a.status = 3 and a.is_active=0");

