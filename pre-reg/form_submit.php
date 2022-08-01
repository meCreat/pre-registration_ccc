<?php
session_start();
include 'dbcon.php';
include 'condition_function.php';
include 'global_function.php';
// $_SESSION['id_number'] = "123";
if(isset($_POST['reg'])){
	$id_number = js_clean(mysqli_real_escape_string($conn, $_SESSION['id_number']));
	// echo('!nice');
	include 'form1_submit.php';
	include 'form2_submit.php';
	include 'form3&4_submit.php';
	include 'form_finish.php';
	include 'form_submit_insert.php';
	
}else{
	echo 'nice';
	header('location:index.php');
	exit;
}
?> 