<?php
include 'dbcon.php';
include '../pre-reg/global_function.php';
if (isset($_POST['submit'])) {
	// code...
	$dept_name =js_clean( ucfirst($_POST['dept_name']));
	$dept_head =js_clean( ucwords($_POST['dept_head']));
	$dept_code =js_clean( strtoupper($_POST['dept_code']));

	$add = "INSERT INTO program_dept ( department_name, dept_head, dept_code )
					VALUES (?,?,?) ";
	$stmt = $conn->prepare($add); 
	$stmt->bind_param("sss",$dept_name, $dept_head, $dept_code);
	$stmt->execute();

	// echo "<script>alert('New Department is added!');</script>";
	header ('location:prog_dept.php');
	exit();
}

?> 