<?php 
include 'dbcon.php';
include "../pre-reg/global_function.php";
$res = $conn->query("SELECT * FROM archive_pass LIMIT 1");
$pass = $res->fetch_assoc();
$password = $pass['password'];
if(isset($_POST['change'])){
	$p = sha1($_POST['pass']);
	if($p == $password){
		
		if($_POST['new-pass'] == $_POST['new-passConfirm']){
			$conn->query("UPDATE archive_pass SET password ='".js_clean( sha1(mysqli_real_escape_string($conn,$_POST['new-pass'])))."' WHERE id=1");
			$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Archive Tables password has been changed','".$_SESSION['admin_id']."','$ip','$device','$md')");
			echo "<script>alert('Password Changed!');</script>";
			echo "<script>history.back()</script>";
		}else{
			echo "<script>alert('Something went wrong!');</script>";
			echo "<script>history.back()</script>";
		}	
	}else{
		echo "<script>alert('Wrong Password!');</script>";
		echo "<script>history.back()</script>";
	}
}

?>