<?php 
$abbD = '';
include 'dbcon.php';
if(isset($_GET['abbD'])){
  $abbD = '&abbD='.mysqli_real_escape_string($conn, $_GET['abbD']);
}

$reg = '';
if(isset($_POST['reg']) && $_POST['reg'] != '0'){
  $reg = "&reg=".mysqli_real_escape_string($conn, $_POST['reg']);
  
}

if(isset($_POST['year'])) {
  $year = '';
  if ($_POST['year'] != '0') {
    $year = '&year='.mysqli_real_escape_string($conn, $_POST['year']);
  }
  
}

header('location:table_dept&course?'.$_POST['link'].$year.'&head='.$_POST['head'].$abbD.$reg);
?>