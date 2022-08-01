<?php 
session_start();
include 'dbcon.php';
$ip = gethostbyname(gethostname());
$device = gethostbyaddr($ip);

$d = explode('Physical Address. . . . . . . . .',shell_exec ("ipconfig/all"));  
$d1 = explode(':',$d[1]);  
$d2 = explode(' ',$d1[1]);  
$md = $d2[1];
$id = $_SESSION['admin_id'];

if (session_destroy()) {
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Successfully Logout','$id','$ip','$device','$md')");
	header("location:../admin_login.php");
}
?>