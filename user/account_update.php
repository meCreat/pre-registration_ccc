<?php 
require 'dbcon.php';
include '../pre-reg/global_function.php';
session_start();

$res = $conn->query("SELECT password FROM admin WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'");
$row = $res->fetch_assoc(); 

if(isset($_POST['change'])){
$us = trim($_POST['username']);
$password = $row['password'];

$old_psw = sha1($_POST['old_psw']);
	if ($old_psw != $password){

	echo "<script>alert('Password is incorrect!');</script>";
	echo "<script>history.back();</script>";
	
	} else
	$sql = "UPDATE admin SET name='".trim(js_clean(mysqli_real_escape_string($conn, $_POST['fullname'])))."', email=' ".trim(js_clean(mysqli_real_escape_string($conn, $_POST['email'])))."',username='$us' WHERE `id` =  '".mysqli_real_escape_string($conn, $_POST['id'])."'";
	$conn->query($sql);
	echo "<script>alert('Update Complete!');</script>";
	echo "<script>history.back()</script>";
	
	
}
	?>