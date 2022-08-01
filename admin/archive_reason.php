<?php 

include 'dbcon.php';
include "../pre-reg/global_function.php";
$id_number = js_clean(mysqli_real_escape_string($conn, $_POST['id_number']));
if (isset($_POST['btn'])) {
  $res = $conn->query("SELECT reason FROM student_data WHERE id_number ='$id_number'");
  $row = $res->fetch_array();
  if($row[0] != ''){
    echo "<p style='border: 1px solid black; padding: 5px'>".$_POST['btn']." ".$row[0]."</p>";
  }

}

?>