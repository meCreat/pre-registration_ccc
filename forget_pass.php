<?php
session_start();
$msg = '';
include './admin/dbcon.php'; 
if (isset($_POST['send'])) {

	$sql = "SELECT * FROM admin WHERE username=? LIMIT 1";
	$stmt = $conn->prepare($sql); 
	$stmt->bind_param("s",$_POST['uname']);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$rand = rand(100000,999999);
	if($result->num_rows == 1){
	$sub = 'CCC User Account Recovery';
	$msg = '<p>'.$row['name'].'</p><br><p>We send your recovery OTP. Enter you username and use the OTP and make a new password.</p><br><p>Your OTP is '.$rand.'</p>';
 	$to = $row['email'];
	$headers = "MIME-Version: 1.0"."\r\n";
    $headers.= "Content-type:text/html;charset=UTF-8"."\r\n"; 
    $conn->query("UPDATE admin SET otp = '".$rand."' WHERE id = '".$row['id']."'"); 
		if(mail($to,$sub,$msg,$headers)){
		$_SESSION['usernameRecovery'] = $_POST['uname'];
		$_SESSION['email_account_user'] = $to;
		$_SESSION['email_promp'] = "Check your Email Account!";
		}
	}else{
	unset($_SESSION['email_promp']);
	$msg = 'No Account Registered!';
	}
}

if(isset($_SESSION['email_promp'])){
	$msg = $_SESSION['email_promp'];
}


if (isset($_POST['otp'])) {
	$sql = "SELECT * FROM admin WHERE email=? AND otp=? LIMIT 1";
	$stmt = $conn->prepare($sql); 
	$stmt->bind_param("ss",$_SESSION['email_account_user'], $_POST['verify']);
	$stmt->execute();
	$result = $stmt->get_result();
	$find = $result->fetch_assoc();

	$find = $conn->query("SELECT * FROM admin WHERE email = '".$_SESSION['email_account_user']."' AND otp = '".$_POST['verify']."' LIMIT 1");
	if($find->num_rows == 1){
		$_SESSION['otpRecovery'] = $_POST['verify'];
		header('location:user_passwordRecovery.php');
	}else{
		$_SESSION['email_promp'] = 'Wrong OTP';
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
<div class="sheet" style="background-color:   #007acc;"><!-- #0039e6 -->
<img src="./styles/index.png" class="center">

<center>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
		<legend style="font-size: 25px">CCC Pre-Register Account Login</legend>
		<?php if (isset($_SESSION['email_promp'])) { ?>
			<p style="font-size: 85%;">	Enter OTP located in your email account.</p><hr>
			<p>OTP: </p>

			<input type="text" name="verify" value="" placeholder="Enter OTP" required=""><br>
			<button  type="Submit" name="otp" style="margin-top: 10px; font-family: 'Poppins', sans-serif; font-size: 90%; padding: 8px">Submit</button>
			<br>
		<?php }else{ ?>
		<p style="font-size: 85%;">	Please enter Username to search for your account.</p><hr>
		<p>Username: </p>
		<input type="username" name="uname" value="" placeholder="Enter Username" required=""><br>
		<button  type="Submit" name="send" style="margin-top: 10px; font-family: 'Poppins', sans-serif; font-size: 90%; padding: 8px">Submit</button>
		<br>
		<?php } ?>
		<h4 style="color:#DC143C;"><strong><?= $msg; ?></strong></h4>
	</form>
	<a href="admin.php" class="btn btn-default">Login</a>
</center>
</div>
</div>


</body>
</html>