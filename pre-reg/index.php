<?php 
session_start();
include 'header.php';
include 'nav.php';
include 'dbcon.php';
$msg = "";
$msg_style = "";



if (isset($_SESSION['msg1'])) {
  $msg = $_SESSION['msg1'];
  $msg_style = "color: red ;" ;
  unset($_SESSION['msg1']);
}

$idFill = '';
if (isset($_GET['id_num'])) {
  $idFill = $_GET['id_num'];
  $conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Access ID number through Email.','".$_GET['id_num']."','$device','$md')");
}

if($_SESSION['switch'] == 'off'){
    include 'reg_notAvailable.php';
}else{
?>


<center>
  <div class="container">
  <h3>Welcome to CCC Pre-Registration <br> 2nd Semester, F.Y. 2020-2021</h3>
  <p> 
    <?=$part['pre_reg']?>
  </p>

  <p>Complete the steps to enroll in Semester</p><br>
  <label style="border: 2px solid #007acc; padding: 30px;">
    <p>Student ID number:</p>
  <form class="form-group" action="pre-reg_epass" method="POST">
    <input style="text-align: center; margin-bottom: 10px; " type="text" name="id_number" placeholder="Ex: 2018-12345" pattern="([0-9]{4})+-+([0-9]{5})" title="format 2018-12345" value="<?=$idFill?>"required=""><br>
    
    <input class="btn btn-primary" type="submit" name="submit" value="Confirm"><br>
 
  </form>
  <a class="btn btn-default" href="reg.php">First time registration click here!</a>
  <p style="margin-left: 20px;position: absolute;<?=$msg_style?>"><?=$msg?></p>
  </label>

</div>
</center>

<?php } ?>
</body>
</html>
