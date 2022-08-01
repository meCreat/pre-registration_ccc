<?php 

include 'dbcon.php';
$id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
if (isset($_POST['ReasonVal'])) {
  $res = $conn->query("SELECT reason FROM email_accounts WHERE id_number ='$id_number'");
  $row = $res->fetch_array();
  if($row[0] != ''){
    echo "<p style='border: 1px solid black; padding: 5px'>".$row[0]."</p>";
  }

}

?>