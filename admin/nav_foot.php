            <footer  class="footer text-center">
                All Rights Reserved by CCEMPC 2022.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <!-- Modals Section -->
    <!-- Button to Open the Modal -->



<style type="text/css">
    label{
        font-size: 20px;
        font-weight: bold;
    }

</style>

<!-- ########################################### LOGOUT Modal ######################################################### -->
<div class="modal fade" id="logout-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Are you sure you want to logout?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST" action="logout">
        <button type="submit"  class="btn btn-primary" name="logout">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ##################################################### ADD NEW MEMBER Modal ##################################################### -->
<?php include "new_member_form.php"; ?>


  <!-- ##################################################### TASK Modal #####################################################-->

  <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Assign task</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="addtask_action" method="POST">
        <div class="modal-body">

          <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="admin_id">

          <div class="mb-3 row g-3 align-items-center">
            <div class="col-auto">
              <label >To:</label>
            </div>
            <div class="col-9">
              <select name="user_id" class="form-select" required>
                <?php
                   $sql2 = mysqli_query($conn,"SELECT * FROM admin where id != '".$_SESSION['user_id']."'");
                              while($rows = mysqli_fetch_assoc($sql2)) { 
                               ?>
                <option value="" selected disabled>Choose here..</option>
                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['fullname']; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>  
            
          <div class="mb-3">
            <textarea name="task" required style="height: 150px;" placeholder="Assign task.." class="form-control"></textarea>
          </div>

          <div class="mb-3 row g-3 align-items-center">
            <div class="col-auto">
              <label >Due:</label>
            </div>
            <div class="col-9">
              <input type="date" class="form-control" name="">
            </div>
          </div>  


                  <div class="form-check form-check-inline">
                    <input name="due" required class="bg-danger form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="urgent">
                    <label class="form-check-label" for="inlineRadio1">Urgent</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="due" class="bg-warning form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="today">
                    <label class="form-check-label" for="inlineRadio2">Just today</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="due" class="bg-success form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="tomorrow" >
                    <label class="form-check-label" for="inlineRadio3">Until tomorrow</label>
                  </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add_task" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      </form>
    </div>
  </div>


<!-- ############################################### PRINT MODAL ###################################################-->
<div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-weight: bold;" class="modal-title" id="exampleModalLabel">Sorting</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="print_action" method="POST">

        <select name="sex" class="mb-3 form-select">
          <option disabled selected>Sex</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="All">All</option>
        </select>


        <select class="mb-3 form-select" name="dept" >
            <option disabled selected value="">Department</option>
              <?php  
                include 'dbcon.php';
                $query = mysqli_query($conn,"SELECT * FROM department ORDER BY dept_code ASC");
                while($row = mysqli_fetch_assoc($query)){
                  echo "<option value='".$row['id']."'>".$row['dept_code']." (".$row['dept_name'].")"."</option>";
                 } ?>
        </select>

        <select name="status" class="mb-3 form-select">
          <option disabled selected>Status</option>
          <option value="ACTIVE">ACTIVE</option>
          <option value="INACTIVE">INACTIVE</option>
          <option value="DELINQUENT">DELINQUENT</option>
          <option value="All">All</option>
        </select>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
    </form>
  </div>
</div>


<!-- ##################################################### LOGIN ARCHIVE Modal ######################################################## -->
<div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h3 class="modal-title text-white" id="exampleModalLabel"><i class="bi bi-archive"></i> Archived Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
       <input type="password" name="password" required class="form-control mt-4 mb-4" placeholder="Enter password..">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="login_archive" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </form>
  </div>
</div>


<?php 

  if(isset($_POST['login_archive'])){
  
    $password = $_POST['password'];
    $sql = "SELECT * FROM archive WHERE password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
      
    if($result->num_rows == 1){
        $_SESSION['auth2'] = "active";       
        $myIp = getHostByName(getHostName());
         $sql21 = "INSERT INTO `logs`(`action`,`user`,`ip_add`) VALUES ('Successfully Logged into archive page','".$_SESSION['user_id']."','$myIp')";
        $conn->query($sql21);
        echo "<script>alert('Welcome!');</script>";
        echo "<script>window.location = 'trash.php';</script>";
    }else{
       echo "<script>alert('Access Denied!');</script>";
    }
}

?>

