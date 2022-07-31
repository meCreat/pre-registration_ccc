<?php
session_start();
$msg = '';
include './admin/dbcon.php';

if(!isset($_SESSION['otpRecovery'])){
	echo '<script>alert("Error!!! Something is wrong");</script>';
	echo '<script>window.location.href="index.php";</script>';
}

$confirm = $conn->query("SELECT * FROM admin WHERE username = '".$_SESSION['usernameRecovery']."' AND email = '".$_SESSION['email_account_user']."' AND otp = '".$_SESSION['otpRecovery']."'");
if($confirm->num_rows != 1){
	echo '<script>alert("Error!!! Something is wrong");</script>';
	echo '<script>window.location.href="index.php";</script>';
}

if(isset($_POST['change']) && $_POST['new_password1'] == $_POST['new_password2']){
	$row = $confirm->fetch_assoc();
	$pass = sha1($_POST['new_password2']);
	$query = "UPDATE `admin` SET `password` = '".$pass."' WHERE id = '".$row['id']."'";
	$conn->query($query);
	
	if($confirm->num_rows == 1 && $row['user_type']=="admin"){
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['user_type'];
		$_SESSION['admin_id'] = $row['id'];
		echo '<script>alert("New Password is Set");</script>';
		echo '<script>window.location.href="admin/dashboard.php";</script>';

	}else if($confirm->num_rows == 1 && $row['user_type']=="user"){
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['user_type'];
		$_SESSION['admin_id'] = $row['id'];
		echo '<script>alert("New Password is Set");</script>';
		echo '<script>window.location.href="admin/dashboard.php";</script>';
	}
}
 
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https:///maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>CCC Pre-Register Account Login</title>
	<link rel="stylesheet" type="text/css" href="./styles/for-index.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>


</head>
<body>

<div  class="container">
<div class="sheet" style="background-color: #007acc;">
<img src="./styles/index.png" class="center" >

<center>
<form id="form_submit" action="<?= $_SERVER['PHP_SELF']?>" method="POST">
		<legend style="font-size: 25px">CCC Pre-Register Account Login</legend>	
		<p style="font-size: 85%;">	Please enter Username to search for your account.</p><hr>
		<p>New Password: </p>
		<input id="new_password1" type="password" name="new_password1" value="" placeholder="Enter New Password" required="">
		<p id="error1" style="font-size:80%; color: black; display: none">Must be 8 characters long.</p>

		<p>Re-type Password</p>
		<input type="password" name="new_password2" value="" placeholder="Re-type Password" required="">
		<p id="error2" style="font-size:80%; color: black; display: none">Password does not match.</p><br>
		<button  type="Submit" name="change" style="margin-top: 10px; font-family: 'Poppins', sans-serif; font-size: 90%; padding: 8px">Change Password</button>
		
		<h4 style="color:#DC143C;"><strong><?= $msg; ?></strong></h4>
	</form>
	<a href="admin.php" class="btn btn-default">Login</a>
</center>
</div>
</div>


</body>
</html>

<script src="p_val.js" type="text/javascript"></script>