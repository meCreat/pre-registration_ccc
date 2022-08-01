<?php
include 'dbcon.php';
$yr = $_POST['yr'];
$id_number = $_POST['id'];
if ($yr != '4') {
  $conn->query("UPDATE `student_data` SET year_lvl = '$yr', graduating = '0' WHERE `id_number` = '".$id_number."' ");
}else{
  $conn->query("UPDATE `student_data` SET year_lvl = '$yr' WHERE `id_number` = '".$id_number."' ");
}

// echo $query;
$e = $conn->query("SELECT `year_lvl` FROM `student_data` WHERE `id_number`='$id_number'");
$pri= $e->fetch_assoc();
echo $pri['year_lvl'];

?>