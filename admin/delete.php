<?php 
session_start();
require 'dbcon.php';
include "../pre-reg/global_function.php";
$delete_id = js_clean(mysqli_real_escape_string($conn, $_POST['id']));

if (isset($_POST['delete'])) {
	$admin = $conn->query("SELECT `username` FROM `admin` WHERE id = '$delete_id'");
	$admin = $admin->fetch_assoc();

	$query = "DELETE FROM admin WHERE id = $delete_id";
	$conn->query($query);
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('".$admin['username']." has been Deleted from User Accounts.','".$_SESSION['admin_id']."','$ip','$device','$md')");
	
	$_SESSION['message'] = $admin['username']." Account has been deleted successfully!";
	$_SESSION['msg_type'] = "danger";
	header("location:user_control.php");

}
?>
