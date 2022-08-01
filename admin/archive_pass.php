<?php 
include "dbcon.php";
include "../pre-reg/global_function.php";
session_start();
$pass = sha1($_POST['pass']);
	$sql = "SELECT * FROM archive_pass WHERE password=? LIMIT 1";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$pass);
	$stmt->execute();
	$result = $stmt->get_result();


if (isset($_POST['pass'])) {
	if ($result->num_rows == 1) {
		$_SESSION['archive'] = 1;
		$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Successful Logged in to Archive Tables','".$_SESSION['admin_id']."','$ip','$device','$md')");
		header('location:archive_dashboard');

	}else{
	echo "<script>alert('Wrong Password');</script>";
	
	}	
}


?>