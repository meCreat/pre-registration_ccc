<?php 
session_start();
include 'dbcon.php';
include '../pre-reg/global_function.php';
$id = js_clean(mysqli_real_escape_string($conn, $_POST['id']));

if (isset($_POST['submitIntro'])) { 
	$submit = "`intro`='".js_clean(mysqli_real_escape_string($conn, $_POST['intro']))."'";
}else if(isset($_POST['submitP1'])) {
	$submit = "`p_1`='".js_clean(mysqli_real_escape_string($conn, $_POST['p_1']))."'";
}else if(isset($_POST['submitP2'])) {
	$submit = "`p_2`='".js_clean(mysqli_real_escape_string($conn, $_POST['p_2']))."'";
}else if(isset($_POST['submitP3'])) {
	$submit = "`p_3`='".js_clean(mysqli_real_escape_string($conn, $_POST['p_3']))."'";
}else if(isset($_POST['submitP4'])) {
	$submit = "`p_4`='".js_clean(mysqli_real_escape_string($conn, $_POST['p_4']))."'";
}else if(isset($_POST['submitP5'])) {
	$submit = "`p_5`='".js_clean(mysqli_real_escape_string($conn, $_POST['p_5']))."'";
}else if(isset($_POST['submitP6'])) {
	$submit = "`p_6`='".js_clean(mysqli_real_escape_string($conn, $_POST['p_6']))."'";
}else if(isset($_POST['submitEnd'])) {
	$submit = "`end`='".js_clean(mysqli_real_escape_string($conn, $_POST['end']))."'";
}

// echo $id ." ". $submit;


// Backing Link
if ( $id == '1') {
  $loc = 'old_e';
}else if ( $id == '3'){
  $loc = 'new_e';
}else if ( $id == '4'){
  $loc = '4th';
}else if ( $id == '2'){
  $loc = 'late_e';
}else if ( $id == '5'){
  $loc = '1st_time_reg';
}else if ( $id == '6'){
  $loc = 'reg_success';
}else if ( $id == '7'){
  $loc = 'code_reset';
}

$row = $conn->query("SELECT `title` FROM `email_message` WHERE `id` = '$id'");
$row = $row->fetch_assoc();

$conn->query("UPDATE `email_message` SET $submit WHERE `id`='$id' ");
$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('".$row['title']."Set Email Message.','".$_SESSION['admin_id']."','$ip','$device','$md')");
	// $add = "UPDATE `email_message` SET ? WHERE `id`= ? ";
	// $stmt = $conn->prepare($add); 
	// $stmt->bind_param("ss",$submit, $id);
	// $stmt->execute();
header('location:email_set?mail='.$loc);
exit();

?>