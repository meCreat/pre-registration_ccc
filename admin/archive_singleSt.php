<?php 
session_start();
include 'dbcon.php';
date_default_timezone_set('asia/manila');
include "../pre-reg/global_function.php";

if (isset($_POST['archive'])) {
	$y=time();
	$y = (date("Y",$y));
	$y = js_clean(mysqli_real_escape_string($conn, $y));
	$id = js_clean(mysqli_real_escape_string($conn, $_POST['id']));

	$conn->query("UPDATE student_data SET archive = '1', status = 'unregistered', archive_year = '$y', reason = '".$_POST['ReasonArchive']."' WHERE id_number = '$id '");
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Student ID: ".$id." has been moved to Archive.','".$_SESSION['admin_id']."','$ip','$device','$md')");
	$_SESSION['msg_type'] = 'danger';
	$_SESSION['message'] = 'Student ' .$id.' is moved to Archive Table.';
	if (isset($_POST['year_lvl'])) {
		header('location:table_yr?y_lvl='.$_POST['year_lvl']);
	}else
	echo('<script>history.back()</script>');
}

if (isset($_POST['unarchive'])) {
	$id = $_POST['id'];

	$conn->query("UPDATE student_data SET archive = '0', reason = '".js_clean(mysqli_real_escape_string($conn,$_POST['ReasonUnarchive']))."' WHERE id_number = '$id '");
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Student ID: ".$id." has been moved out to Archive Table.','".$_SESSION['admin_id']."','$ip','$device','$md')");
	$_SESSION['msg_type'] = 'danger';
	$_SESSION['message'] = 'Student ' .$id.' is moved out to Archive.';
	echo('<script>history.back()</script>');
}

?>