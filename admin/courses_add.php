<?php
include 'dbcon.php';
include "../pre-reg/global_function.php";
if (isset($_POST['submit'])) {
	// code...
	$course_name = js_clean(ucfirst($_POST['course_name']));
	$dept_id =js_clean( $_POST['dept_id']);
	$course_abb = js_clean(strtoupper($_POST['course_abb']));


	if ($dept_id == 0) {	
		echo "<script>alert('Select Department to complete')</script>";	
		echo "<script>window.location.href='courses.php';</script>";
	}else{

	$add = "INSERT INTO courses ( course_name, dept_id, course_abb )
					VALUES (?,?,?) ";
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('$course_abb new course has been added.','".$_SESSION['admin_id']."','$ip','$device','$md')");
	$stmt = $conn->prepare($add); 
	$stmt->bind_param("sss",$course_name, $dept_id, $course_abb);
	$stmt->execute();

	$_SESSION['message'] = "Course ".$course_name." has been Added ";
		$_SESSION['msg_type'] = "success";
		header ("location:courses.php");
	}
}

?>
