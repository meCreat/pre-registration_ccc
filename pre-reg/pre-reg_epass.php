<?php 
include 'header.php';
include 'nav.php';
require 'dbcon.php';
session_start();

if(isset($_POST['submit']) || isset($_SESSION['id_number'])){
  $_SESSION['id_number'] = mysqli_real_escape_string($conn, trim($_POST['id_number']));
}else{
   header("location:index.php");
}
$active = $conn->query("SELECT * FROM email_accounts WHERE id_number = '".$_SESSION['id_number']."' AND active = '0'");
$sql = $conn->query("SELECT * FROM email_accounts WHERE id_number = '".$_SESSION['id_number']."' AND verified = '1'");
$registered = $conn->query("SELECT * FROM student_data WHERE id_number = '".$_SESSION['id_number']."' AND status= 'registered'");
$n1 = $registered->num_rows + $sql->num_rows;


if($active->num_rows == 1){
  echo "<script>alert('Your Id number has been disabled by the College Registrar. Please contact the Collge Registrar if you have some conserns')</script>";
  $conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Access Failed because of Inactive status.','".$_SESSION['id_number']."','$device','$md')");
  echo "<script>window.location.href='index.php';</script>";
}elseif($n1 == 2){
   $_SESSION['msg1'] = "You are already registered.";
   $conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Access Failed because already Registered.','".$_SESSION['id_number']."','$device','$md')");
   header ("location:index.php");
}elseif ($sql->num_rows != 1) {  
   $_SESSION['msg1'] = "Id number is not registered.";
   header ("location:index.php");
}else{
  $conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Successful ID verification. Next step to Verification.','".$_SESSION['id_number']."','$device','$md')");
}


$msg = "";
$style = "none";
if(isset( $_SESSION['msg'])){
$msg = $_SESSION['msg'];
$style = $_SESSION['color'];
 unset($_SESSION['msg']);
 
}

?>


<center>
  <div class="container">
  <h3>Welcome to CCC Pre-Registration <br> 2nd Semester, F.Y. 2020-2021</h3>
  <p>
    Students are required to fill out this form to be included in the Second Semester FY 2020-2021. Only Students Officially Enrolled this 1st Semester, F.Y. 2020-2021 can Register. If you are not enrolled this 1st Semester, F.Y. 2020-2021, please contact the  Office of the College Registrar. Follow the Instructions carefully, failure to to do so will invalidate your pre-registration.
  </p>

  <p>Complete the steps to enroll in Semester</p><br>
  <label  style="border: 2px solid green; padding: 30px;"><p>Enter Verification code:</p>
  <form class="form-group" action="pre-reg_passval" method="POST">
    
    <input style="text-align: center; margin-bottom: 10px; " type="text" name="pass" placeholder="Verification Code" pattern="[0-9]{6}" title="Enter Six digit format" required=""><br>    
    <input class="btn btn-sm btn-info" type="submit" name="submit" value="Confirm">
  </form>
<a href="pre-reg_repass.php" class="btn btn-default">Resend verification code</a>
<p style="position: absolute;color: red"><?=$msg ?></p>
  </label>
</div>
</center>


</body>
</html>

