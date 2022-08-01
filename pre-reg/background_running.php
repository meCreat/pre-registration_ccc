<?php
include 'dbcon.php';
date_default_timezone_set('Asia/Manila');


if(isset($_SESSION['id_number'])){
$id = $_SESSION['id_number'];
$id = $conn->query("SELECT * FROM email_accounts WHERE id_number = '$id'");
	if ($id->num_rows == 0) {
		session_destroy();
		echo "<script>alert('Invalid Id Number')</script>";
	}

}

$query = $conn->query("SELECT * FROM `reg_dates` WHERE 1 ORDER BY `id` DESC LIMIT 1");
while($date = $query->fetch_assoc()){

	$dateStart = strtotime($date['date_start']);
	$dateEnd = strtotime($date['date_end']);
  
}


if ($dateStart <= time() && $dateEnd >= time()) {
	$_SESSION['switch'] = 'on';
}else{
	$_SESSION['switch'] = 'off'; // off
}

?>