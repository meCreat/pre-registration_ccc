




<!-- Modal Remove -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title">Add User Account</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
        <form id="add_u" action="add_user-add" method="POST">
          <div class="form-group">
            <label for="formGroupExampleInput">Last Name</label>
            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">First Name</label>
            <input type="text" class="form-control"  name="fname" placeholder="Enter First Name" required="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Username</label>
            <input type="text" class="form-control"  name="username" placeholder="Enter Username" required="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input type="password" class="form-control"  name="psw" placeholder="Enter Password" required="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Re-type Password</label>
            <input type="password" class="form-control"  name="psw2" placeholder="Re-type Password" required="">
          </div>

          <div class="form-group">
             <label>User Type</label><br>
               <input type="radio" name="user-type" value="user" required="">User</input>
               <input type="radio" name="user-type" value="admin">Admin</input>
             </select>
          </div>

          <div class="form-group">
            
          </div>

        </form>
        </div>
              
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button form="add_u" type="submit" class="btn btn-primary" name="submit">Submit</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
</div>
  

