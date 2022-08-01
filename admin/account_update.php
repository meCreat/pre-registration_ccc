<?php 
require 'dbcon.php';
include "../pre-reg/global_function.php";
session_start();



$res = $conn->query("SELECT password FROM admin WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'");
$row = $res->fetch_assoc(); 

if(isset($_POST['change'])){
$us = trim($_POST['username']);
$password = $row['password'];
// $salt = ""
// .$salt
$old_psw = sha1($_POST['old_psw']);
	if ($old_psw != $password){

	echo "<script>alert('Password is incorrect!');</script>";
	echo "<script>history.back();</script>";
	
	} else {
	$sql = "UPDATE admin SET name='".js_clean(mysqli_real_escape_string($conn,$_POST['fullname']))."', email=' ".js_clean(mysqli_real_escape_string($conn, $_POST['email']))."',username='$us' WHERE `id` =  '".js_clean(mysqli_real_escape_string($conn, $_POST['id']))."'";
	$conn->query($sql);

	// Log
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Account Updated','".$_SESSION['admin_id']."','$ip','$device','$md')");

	echo "<script>alert('Update Complete!');</script>";
	echo "<script>history.back()</script>";
	}
}


	?>