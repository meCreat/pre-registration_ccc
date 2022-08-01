<?php 
include 'header.php';
include 'nav.php';
session_start();
session_destroy();
$msg = ""; 
$msg_color = ""; 
if (isset($_SESSION['message'])) {
  $msg = $_SESSION['message'];
  $msg_color = $_SESSION['color']; 
  unset($_SESSION['message']);
  unset($_SESSION['color']);
}

$id_num = '';
$email = '';
if(isset($_GET['id_number']) && isset($_GET['email']) && isset($_GET['sname']) && isset($_GET['fname'])){
$_SESSION['key'] = 'bypass';
$id_num = $_GET['id_number'];
$email = $_GET['email'];
$_SESSION['name1'] = $_GET['sname']; 
$_SESSION['name2'] = $_GET['fname'];
$_SESSION['name3'] = $_GET['mname'];
}
?>

<div class="container">
  <h2>CCC Registration form</h2>

  
  <p>Please enter dedicated ID number indicated in your ID and your Email. Wait for Email confirmation link to ensure that your Email is working properly.</p>
</div>

<div class="container sheet">
<form name="ff" id="haf" action="reg_email.php" method="POST" class="form-group">


      <div class="form-group">

      <label for="formGroupExampleInput">ID number:</label>
      <input id="con" type="text" class="form-control" name="id_number" placeholder="EXAMPLE: 2006-12345" required="" pattern="([0-9]{4})+-+([0-9]{5})" title="Use this format: 2006-12345" value="<?=$id_num?>">
      <span class="error" id="error_con"></span><p></p>
  

      <label for="formGroupExampleInput">Email:</label>
      <input id="email" type="text" class="form-control" name="email" placeholder="Enter Email" required="" pattern="[a-z0-9._%+-]+@ccc.edu.ph" title="Email address only" value="<?=$email?>">
      <span class="error" id="error_email"></span><p></p>
      <div style="float: right; margin-top: 10px;">
      <button class="btn btn-danger" type="button" onclick="history.back();">Back</button>
      <input class="btn btn-primary" type="submit" name="submit" value="Confirm">
      </div>
      <br>
      <h4><span style="color: <?=$msg_color?>;"><?= $msg?></span></h4>
    </div>


</form>
</div>
</body>

  
 
