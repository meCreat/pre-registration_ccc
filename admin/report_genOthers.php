<?php 
session_start();
include 'dbcon.php';
if(isset($_POST['gender']) && $_POST['gender'] != '-'){
	$_SESSION['gender'] = " AND gender ='".mysqli_real_escape_string($conn, $_POST['gender'])."'";
}else{
	unset($_SESSION['gender']);
}

if(isset($_POST['active']) && $_POST['active'] != '-'){
	$_SESSION['active_status'] = " AND `email_accounts`.`active` = ".mysqli_real_escape_string($conn, $_POST['active']);
}else{
	unset($_SESSION['active_status']);
}

if(isset($_POST['status']) && $_POST['status'] != '-'){
	$_SESSION['status'] = " AND `student_data`.`status` ='".mysqli_real_escape_string($conn, $_POST['status'])."'";
}else{
	unset($_SESSION['status']);
}

if(isset($_POST['classification']) && $_POST['classification'] != '-'){
	if($_POST['classification'] == 1){
		$classification = ' AND ALS = 1';
		$_SESSION['consoleClassification'] = 'CLASS. = ALS';
	}else if($_POST['classification'] == 2){
		$classification = " AND transferee.last_school_att is not null";
		$_SESSION['consoleClassification'] = 'CLASS. = Not Transferee';
	}else if($_POST['classification'] == 3){
		$classification = " AND transferee.last_school_att is null";
		$_SESSION['consoleClassification'] = 'CLASS. = Transferee';
	}
	$_SESSION['classification'] = $classification;
}else{
	unset($_SESSION['consoleClassification']);
	unset($_SESSION['classification']);
}




echo $_SESSION['active'] ;
header('location:report_generator?'.$_POST['link']);
?>