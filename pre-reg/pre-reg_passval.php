<?php
session_start();
include 'dbcon.php';

if(isset($_POST['submit'])){
	echo $_SESSION['id_number'];	
	$id_number = $_SESSION['id_number'];
	$pass = trim($_POST['pass']);

	$sql = "SELECT * FROM email_accounts WHERE id_number=? AND pass=? AND verified = '1'";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss",$id_number, $pass);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	// echo $result->num_rows;
	if ($result->num_rows==1) {
		$_SESSION['email'] = $row['email'];
		$_SESSION['id_number'] = $row['id_number'];
		$_SESSION['key'] = $row['vkey'];
		// echo $_SESSION['vkey']; 
		$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Verification Success. Students data has been accessed.','".$_SESSION['id_number']."','$device','$md')");
		header("location:form5.php"); 
		exit;
	}else{
		$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Incorrect Verification.','".$_SESSION['id_number']."','$device','$md')");
		$_SESSION['msg'] = "Verification Code is incorrect. ";
		$_SESSION['color'] = "red";
		// echo $_SESSION['id_number'];
		echo '<script type="text/javascript">history.back()</script>';
		
	}
}


?>
