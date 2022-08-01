<?php 
include 'dbcon.php';
session_start();

if (isset($_GET['vkey'])){
	$vkey = $_GET['vkey']; 
	// echo  $_GET['email'].$_GET['id_number'];

	$result1 = $conn->query("SELECT * FROM email_accounts WHERE vkey = '$vkey' AND id_number = '".$_GET['id_number']."' LIMIT 1");
	$result2 = $conn->query("SELECT email_accounts.id_number AS id_number, email_accounts.vkey, email_accounts.verified, student_data.status FROM student_data RIGHT JOIN email_accounts ON email_accounts.id_number = student_data.id_number WHERE vkey = '$vkey' AND verified = 1 LIMIT 1 ");
		
		$rows1 = $result1->fetch_assoc();
		$rows2 = $result2->fetch_assoc();

	if ($result1->num_rows == 0) {
			$_SESSION['id_number'] = $_GET['id_number'];
			$_SESSION['key'] = $_GET['vkey'];
        	$_SESSION['email'] = $_GET['email'];
			echo "<script>alert('Fill the Forms Properly.');</script>";
			echo "<script>window.location.href='form.php';</script>";
		
	}elseif($result2->num_rows == 1){
		if ($rows2['status'] == "registered") {
			echo "<script>alert('Your id_number is registered');</script>";
			echo "<script>window.location.href='index.php';</script>";
		}
		
	}else{
		echo "<script>alert('Link Expired');</script>";
		echo "<script>window.location.href='index.php';</script>";
	}

}else{
	die("Something went wrong");
}

?>