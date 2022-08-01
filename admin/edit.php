
<?php 
require 'dbcon.php';

if (isset($_GET['edit'])) {
  $name = "asdasd";
  $update_id = $_GET['edit'];
        $query = "SELECT `id`, `name` , `email`,`username`, `password`, `user_type`, `date_added` FROM `admin` WHERE `id` = '$update_id'";

        $result = $conn->query($query);
        while($row = $result->fetch_assoc()){
        $name = $row['name'];
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
      }
    }
              ?>

<!-- Modal Remove -->
  <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <h5>Name: <?php echo  $row['name']?></h5>
        <form id="edit_u<?php echo $row['id']; ?>" action="update_user" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        
        <div class="form-group">

           <label>User Type</label><br>
             <input type="radio" name="user-type" value="user">User</input>
             <input type="radio" name="user-type" value="admin">Admin</input>
        
        </div>
        <div class="form-group">
          
        </div>

      </form>
        </div>
              
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button form="edit_u<?php echo $row['id']; ?>" type="submit" class="btn btn-primary" name="update">Update</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
</div>




