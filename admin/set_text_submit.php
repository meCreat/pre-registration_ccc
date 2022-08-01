<?php 
include 'dbcon.php';
include '../pre-reg/global_function.php';
session_start();
if (isset($_POST['Update1']) ) {
  $pre_reg = js_clean(mysqli_real_escape_string($conn, $_POST['pre_reg']);
  $conn->query("UPDATE `text_part` SET `pre_reg`='".$pre_reg."' WHERE 1");
  $_SESSION['message'] = 'Welcome Part has been updated!';
  $_SESSION['msg_type'] = 'success';
  header('location:set_text.php');
}

if (isset($_POST['Update2']) ) {
  $data_privacy = js_clean(mysqli_real_escape_string($conn, $_POST['data_privacy']);
  $conn->query("UPDATE `text_part` SET `data_privacy`='".$data_privacy."' WHERE 1");
  $_SESSION['message'] = 'Data Privacy has been updated!';
  $_SESSION['msg_type'] = 'success';
  header('location:set_text.php');
}

if (isset($_POST['Update3']) ) {
  $ty = js_clean(mysqli_real_escape_string($conn, $_POST['ty']);
  $conn->query("UPDATE `text_part` SET `ty`='".$ty."' WHERE 1");
  $_SESSION['message'] = 'Thank You part has been updated!';
  $_SESSION['msg_type'] = 'success';
  header('location:set_text.php');
}

$query = $conn->query("SELECT * FROM `text_part` ");
$part = $query->fetch_assoc();
?>
