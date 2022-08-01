<?php
session_start();
require 'dbcon.php';
include "../pre-reg/global_function.php";


if (isset($_POST['submit'])) {
	$res = $conn->query("SELECT * FROM admin WHERE username = '".mysqli_real_escape_string($conn,$_POST['username'])."'");

	if ($res->num_rows != 0) {
		$_SESSION['message'] = "Username has been taken!";
		$_SESSION['msg_type'] = "danger";
		header('location:user_control.php');
	}else{
		if ($_POST['psw'] != $_POST['psw2']) {
			$_SESSION['message'] = "Password didn't match!";
			$_SESSION['msg_type'] = "danger";
			header('location:add_user.php');
		}else{
			$username = js_clean(mysqli_real_escape_string($conn, $_POST['username']));
			$password1 =  js_clean(mysqli_real_escape_string($conn, $_POST["psw"]));
			$password = sha1($password1);

			$name =  js_clean(mysqli_real_escape_string($conn, $_POST['lname']));
			$name .=" ". js_clean(mysqli_real_escape_string($conn,$_POST['fname']));
			$date = js_clean(mysqli_real_escape_string(date("m-d-Y \n h:i a")));
			$user_type = $_POST['user-type'];

			$query = "INSERT INTO admin ( name, username,  password,user_type, date_added )
						VALUES ('".ucwords($name)."','$username', '$password','$user_type','$date')";
			if($conn->query($query)){
				$_SESSION['message'] = $_POST['fname']." ".$_POST['lname']." account has been added!";
				$_SESSION['msg_type'] = "success";
				$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('".$name." has been added to users','".$_SESSION['admin_id']."','$ip','$device','$md')");
				header('location:user_control.php');
			}
		}
	}
}
//echo  $query;

?>