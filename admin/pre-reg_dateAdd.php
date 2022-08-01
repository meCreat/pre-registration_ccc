<?php
session_start();
include "dbcon.php"; 
include '../pre-reg/global_function.php';
include '../pre-reg/condition_function.php';
if (isset($_POST['submit'])) {
	$semester = js_clean($_POST['semester']);
	$sy = $_POST['year1']. "-" . $_POST['year2'];
	$sy = js_clean($sy);
	$date_start = validateDate(js_clean($_POST['date_start']));
	$date_end = validateDate(js_clean($_POST['date_end']));
	$set_by = js_clean($_POST['set_by']);


	if($date_start != false && $date_end != false){
	$add = "INSERT INTO `reg_dates` (semester, sy, date_start, date_end, set_by) VALUES (?,?,?,?,?) ";
	$stmt = $conn->prepare($add); 
	$stmt->bind_param("sssss",$semester, $sy, $date_start, $date_end, $set_by);
	$stmt->execute();
	header('location:pre-reg_date');
	}
	
}



?>