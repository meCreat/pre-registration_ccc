<?php 
include 'dbcon.php';
echo $_POST['id'];
$id = mysqli_real_escape_string($conn, $_POST['id']);

if (isset($_POST['delete'])) {
	$conn->query('DELETE FROM `reg_dates` WHERE `id` = '.$id);
	header('location:pre-reg_date.php');
	exit();
}
?>