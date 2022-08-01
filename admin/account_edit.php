<?php include 'header.php'; ?>

<?php
require 'dbcon.php';
$uname = $_SESSION['un'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$old = $_SESSION['old_pass'];
if (!isset($_POST['update'])) {
    header("location:../index.php");
	}

?>

<?php 
require_once 'account_update.php';
?>
<?php
if (isset($_SESSION['message'])): 
  
  ?>
  <h5 class="text-<?=$_SESSION['msg_type']?> text-center">
    <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </h5>
<?php endif ?>


  

<div class="row">
  <div class="container">
    <div class="col-md-12">
      <h2 class="mb-4">Edit Your Account</h2>
    </div>
  </div>
</div>
<div class="container">
<form action="account_update" method="POST">
	<input type="hidden" name="id" value="<?php echo $update_id;?>">
  <div class="form-group">
    <label for="formGroupExampleInput">Full Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="fullname" placeholder="Surname, Firstname, Midname" value="<?php echo $name;?>" required="">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">E-mail</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="<?php echo  trim($email);?>" placeholder="Enter E-mail" required="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Username</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="username" placeholder="Enter Username" value="<?php echo trim($uname);?>" required="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Enter Password to confirm</label><br>
    <input type="password" class="form-control" id="formGroupExampleInput2" name="old_psw" placeholder="Enter confirm Password" required="">
  </div>
    <div class="form-group">
    <button type="submit" class="btn btn-info" name="change">Change</button>
  </div>


</form>
<br>
<label for="formGroupExampleInput2">Do you want to change password?</label><br>
<a href="account_cpass.php" name="update" class="btn btn-danger">Change Password</a>
</div>

</body>

