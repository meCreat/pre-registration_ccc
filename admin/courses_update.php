<?php 
require 'dbcon.php';
include "../pre-reg/global_function.php";
if (isset($_POST['update'])) {
session_start();
$id = $_POST['id'];
$c_name = js_clean( mysqli_real_escape_string( $conn, ucfirst($_POST['course_name'])));
$c_abb =  js_clean( mysqli_real_escape_string( $conn, strtoupper($_POST['course_abb'])));
$c_id =  js_clean( mysqli_real_escape_string( $conn, $_POST['dept_id']));

if ($c_id == 0) {
	$query = "UPDATE courses SET course_name='$c_name' , course_abb='$c_abb' WHERE id='$id'";
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('$c_abb Course has been updated.','".$_SESSION['admin_id']."','$ip','$device','$md')");
	$conn->query($query);
		$_SESSION['message'] = "Course has been Updated ";
		$_SESSION['msg_type'] = "success";
		header ("location:courses.php");
}else{

$conn->query("UPDATE courses SET course_name='".$conn->real_escape_string($c_name)."', dept_id='$c_id' , course_abb='$c_abb' WHERE id='$id'");

		$_SESSION['message'] = "Course has been Updated ";
		$_SESSION['msg_type'] = "success";
		header ("location:courses.php");
}
}
?>