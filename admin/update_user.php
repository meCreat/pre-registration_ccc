<?php 
require 'dbcon.php';
include '../pre-reg/global_function.php';
if (isset($_POST['update'])) {
session_start();
$query = "UPDATE admin SET user_type ='".mysqli_real_escape_string($conn, $_POST['user-type'])."' WHERE id='".mysqli_real_escape_string($conn, $_POST['id'])."'";
$conn->query($query);
$_SESSION['message'] = "Account id number ".$_POST['id']." has been updated";
$_SESSION['msg_type'] = "success";
header("location:user_control.php");
}
?>