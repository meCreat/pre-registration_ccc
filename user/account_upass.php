<?php 
require 'dbcon.php';
$res = $conn->query("SELECT * FROM admin WHERE id='".mysqli_real_escape_string($conn, trim($_POST['id']))."'");
$row = $res->fetch_assoc();

if(isset($_POST['change_pass'])){
session_start();
$id = $row['id'];
$password = $row['password'];
$old_psw = sha1($_POST['old_psw']);
	if ($old_psw != $password){
		echo "<script>alert('Old password is incorrect!');</script>";
		echo "<script>history.back();</script>";
	} else
		$pass = sha1($_POST['new_psw']);
		$sql = "UPDATE admin SET password='$pass' WHERE `id` =  '$id'";
		$conn->query($sql);
		echo "<script>alert('Password Changed!');</script>";
		echo "<script>history.back();</script>";
}
	?>