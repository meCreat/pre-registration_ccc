<!-- Modal Archive -->
<?php
include 'dbcon.php';
$res = $conn->query("SELECT * FROM admin WHERE id='".$_SESSION['admin_id']."'");
while($rows = $res->fetch_assoc()){
    $name = $rows['name'];
    $email = $rows['email'];
    $uname = $rows['username'];
}

?>
  <div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title"><i class="bi bi-person-circle"></i> Account</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
              
        <div class="modal-body">
        <form id="edit_profile" action="account_update.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $_SESSION['admin_id'];?>">
          <div class="form-group">
            <label for="formGroupExampleInput">Full Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="fullname" placeholder="Surname, Firstname, Midname" value="<?php echo $name;?>" required="">
          </div>
           <div class="form-group">
            <label for="formGroupExampleInput2">E-mail</label>&nbsp; <span class="text-danger"><?php if ($email == null) { echo "*"; } ?></span>
            <input type="text" class="form-control <?php if ($email == null) { echo "border border-danger"; } ?>" id="formGroupExampleInput2" name="email" value="<?php echo  trim($email);?>" placeholder="Enter E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email address only" required="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Username</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="username" placeholder="Enter Username" value="<?php echo trim($uname);?>" required="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Enter Password to confirm</label><br>
            <input type="password" class="form-control" id="formGroupExampleInput2" name="old_psw" placeholder="Enter confirm Password" required="">
          </div>

        </form>     


        <form style="display: none;" id="change_password" action="account_upass.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_SESSION['admin_id'];?>">
          
          <div class="form-group">
            <label for="formGroupExampleInput2">Old Password</label><br>
            <input type="password" class="form-control" id="formGroupExampleInput2" name="old_psw" placeholder="Enter Old Password" required="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">New Password</label><br>
            <input type="password" class="form-control" id="pass1" name="new_psw" placeholder="Enter New Password" required="">
            <p id="long_error" class="text-danger" style="display: none;">Password must be 8 characters long!</p>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Retype New Password</label><br>
            <input type="password" class="form-control" id="pass2" name="new_psw2" placeholder="Retype New Password" required="">
            <p id="pass_error" class="text-danger" style="display: none;">Password does not match!</p>
          </div>
            


        </form>
        <button style="display: none;" type="button" id="edit_prof" class="btn btn-warning border border-dark" >Edit Profile.</button>  
        <button type="button" id="change_pass" class="btn btn-warning border border-dark" >Click to Change Password.</button>    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            
            <button id="edit_p" form="edit_profile" type="submit" name="change" class="btn btn-primary">Update</button>
            <button style="display:none" id="change_p" form="change_password" type="submit" name="change_pass" class="btn btn-primary">Update</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          
        </div>
      </div>
    </div>
  </div>
  
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#change_pass').on('click',function(){
            $('#edit_profile, #edit_p, #change_pass').hide();
            $('#change_password, #change_p, #edit_prof').show();
        })

        $('#edit_prof').on('click',function(){
            $('#edit_profile, #edit_p, #change_pass').show();
            $('#change_password, #change_p, #edit_prof').hide();
        })

        var pass = false;
        var long = false;
        $('#pass1').keyup(function(){
          if($('#pass1').val().length <= 7 ){
            long = false;
            $('#long_error').show();
          }else{
            long = true;
            $('#long_error').hide();
          }
        })

        $('#pass2').keyup(function(){
          if($('#pass1').val() != $('#pass2').val() ){
            pass = false;
            $('#pass_error').show();
          }else{
            pass = true;
            $('#pass_error').hide();
          }
        })

        $('#change_password').submit(function(){
          console.log('change_password')
          if(pass == true && long == true){
            
            return true;
          }else
       
            return false;
        })
    })
</script>