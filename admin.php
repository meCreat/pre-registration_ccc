<?php
session_start();
// $conn = new mysqli("localhost","root","","ccc_pre-reg");
include "admin/dbcon.php";
$msg ="";
unset($_SESSION['email_promp']);
if(isset($_POST['log-in'])){
	$username = $_POST['uname'];
	$password1 = $_POST['psw'];
	$password = sha1($password1);

	$sql = "SELECT * FROM admin WHERE username=? AND password=?";
	$stmt = $conn->prepare($sql); 
	$stmt->bind_param("ss",$username, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	if ($result->num_rows==1 && $row['user_type']=="admin") {
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['user_type'];
		$_SESSION['admin_id'] = $row['id'];
		header("location:admin/dashboard.php");
		exit(); 
	}elseif ($result->num_rows==1 && $row['user_type']=="user") {
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['user_type'];
		$_SESSION['admin_id'] = $row['id'];
		header("location:user/dashboard.php"); 
		exit(); 
	}else{
		$msg = "Username or Password is incorrect. ";
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
<div class="sheet" style="background-color: #007acc;"><!-- #1a53ff -->
<img src="./styles/index.png" class="center">

<center>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
		<legend style="font-size: 25px">CCC Pre-Register System Login</legend>
		<p>Username: </p>
		<input type="username" name="uname" value="" placeholder="Enter Username" required=""><br>
		<p>Password: </p>
		<input  type="password" name="psw" value="" placeholder="Enter Password" required=""><br>
		
		<button  type="Submit" name="log-in" style="margin-top: 10px; font-family: 'Poppins', sans-serif; font-size: 90%; padding: 8px">Log-in</button>
		<br>
		<h5 class="text-danger text-center"><?= $msg; ?></h5>
	</form>
	<a href="forget_pass.php" class="btn btn-default">Forget Password?</a>
</center>
</div>
</div>


</body>
</html>