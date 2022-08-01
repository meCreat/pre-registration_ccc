<?php 
require 'dbcon.php';
include "../pre-reg/global_function.php";
if (isset($_POST['delete'])) {
	$id = js_clean(mysqli_real_escape_string($conn, $_POST['id']));
	session_start();
	
		$query = "DELETE FROM courses WHERE id = '$id'";
		$course = $conn->query("SELECT course_abb FROM courses WHERE id = '$id'");
		$course = $course->fetch_assoc();

		$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Delete ".$course['course_abb']." Course.','".$_SESSION['admin_id']."','$ip','$device','$md')");
			
		$conn->query($query);
		$_SESSION['message'] = "Course is deleted successfully!";
		$_SESSION['msg_type'] = "danger";
		header ("location:courses.php");
							
}
?>