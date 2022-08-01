<?php 
require 'dbcon.php';

if (isset($_POST['update'])) {
session_start();
$dept_id = js_clean( mysqli_real_escape_string($conn, $_POST['dept_id']));
$dept_name = ucfirst(js_clean( mysqli_real_escape_string($conn, $_POST['dept_name'])));
$dept_code = strtoupper(js_clean( mysqli_real_escape_string($conn, $_POST['dept_code'])));
$dept_head = ucwords(js_clean( mysqli_real_escape_string($conn, $_POST['dept_head'])));


$query = "UPDATE program_dept SET department_name='$dept_name', dept_code='$dept_code', dept_head='$dept_head' WHERE dept_id='$dept_id '";
$conn->query($query);

		$_SESSION['message'] = "Department has been Updated ";
		$_SESSION['msg_type'] = "success";
		header ("location:prog_dept.php");

}
?>