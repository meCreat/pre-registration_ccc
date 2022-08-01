<?php 
require 'dbcon.php';
if (isset($_POST['delete'])) {
	$delete_id = mysqli_real_escape_string($conn, $_POST['dept_id']);
	session_start();
	
		$query = "DELETE FROM program_dept WHERE dept_id = '$delete_id'";
		$conn->query($query);
		$_SESSION['message'] = "Department is deleted successfully!";
		$_SESSION['msg_type'] = "danger";
		header ("location:prog_dept");
							
}
?>

 