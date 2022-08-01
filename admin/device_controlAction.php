<?php 
include 'dbcon.php';
session_start();
if ($_POST['submit']) {
  $mac = mysqli_real_escape_string($conn, $_POST['device_mac']);
  $conn->query("INSERT INTO `allowed_mac_add`(`mac_add`,`added_by`) VALUES('".$mac."','".$_SESSION['admin_id']."')");
    header("location:device_control");
    $conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Add New Davice MAC ADD = ".$mac."','".$_SESSION['admin_id']."','$ip','$device','$md')");
}

if (isset($_POST['delete'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $conn->query("DELETE FROM `allowed_mac_add` WHERE `id` = $id");
   $conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Delete MAC ADD in Device Control.','".$_SESSION['admin_id']."','$ip','$device','$md')");
  $_SESSION['message'] = "Mac Address is deleted successfully!";
    $_SESSION['msg_type'] = "danger";
  header("location:device_control");
}

?>