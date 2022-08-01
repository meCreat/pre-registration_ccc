<?php
include 'header.php';
include 'nav.php';
require 'dbcon.php'; 

if(isset($_POST['switch'])){
  $a = mysqli_real_escape_string($conn, $_POST['switch']);
  $conn->query("UPDATE `auth` SET `authorization`='$a' WHERE `id` = '1'");
  $retVal = ($a == 1) ? 'On' : 'Off' ;
  $conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Switch Device Control to $retVal','".$_SESSION['admin_id']."','$ip','$device','$md')");
}


if (isset($_SESSION['message'])): 
  
?>

  <h5 class="text-<?=$_SESSION['msg_type']?> text-center">
    <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </h5>
<?php endif ?>

<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >

     <span class="p-2">Dashboard/ Accounts/ Device Control</span>  

  </div>
</div>

<div class="container">
<div class="row">

    <div class="col-md-12">
      <h2>Device Control</h2>
    </div>   
  
</div>
</div>
<div style="border:1px solid; padding: 10px; margin-bottom: 10px;margin-top: 15px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="container">
      <button class="btn btn-primary" data-toggle="modal" data-target="#addDevice"><i class="bi bi-laptop"></i> Add Device</button>

      <form style="float: right;" action="" method="POST">
      <span style="font-size: 110%; font-weight: bold">Activate:</span>
      <?php 
      $onStat = $conn->query("SELECT * FROM `auth` WHERE `id` = 1 AND `authorization` = 1;");
      if($onStat->num_rows == 1){
        echo "<button type='submit' name='switch' value='0' class='btn btn-success'><i class='bi bi-toggle2-on'></i> ON</button>";
      }else{
        echo "<button type='submit' name='switch' value='1' class='btn btn-dark'><i class='bi bi-toggle2-off'></i> OFF</button>";
      }
      ?>
      </form>
    </div>


<div style="border: 1px solid; padding: 10px;" class="container">
    <table class="table table-striped table-bordered tablesort" id="the_table">
      <?php
        $query = "SELECT `allowed_mac_add`.`id`, `mac_add`, `added_date`, `added_by`,`admin`.`name` FROM `allowed_mac_add` LEFT JOIN `admin` ON `admin`.`id` = `allowed_mac_add`.`added_by` ORDER BY `id` ASC";
        $result = $conn->query($query);
        if($result->num_rows == 0){

        }
        ?>
      
          <thead>
                        
                    <th style="display:none">id</th>
                     <th >Mac Address</th>
                     <th>Date Added</th>
                     <th>Added By</th>
                     <th>Action</th>
                     
                  </thead>
                
             <?php
              while( $row = $result->fetch_assoc()):?>
                  <tr>
                    <td style="display:none"><?php echo  $row['id']?></td>
                      <td><?php echo  $row['mac_add']?></td>
                      <td><?php echo  date('M d Y',strtotime($row['added_date']))?></td>
                      <td><?php echo  $row['name']?></td>
                      
                   <td><button type="button" class="btn btn-danger deletebtn" data-toggle="modal" ><i class="bi bi-trash"></i> Delete</button></td>
                  </tr>

            <?php endwhile; ?>
    </table>

</div>

<!-- Modal Add -->
  <div class="modal fade" id="addDevice">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">

        <form action="device_controlAction" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="bi bi-calendar-plus-fill"></i> Add Device</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

              <div class="form-group">
                <label>Mac Address:</label>
                <input type="text" class="form-control" name="device_mac" required="" pattern="^([0-9A-F]{2}[-]){5}([0-9A-F]{2})$" title="Examle Input: 01-23-45-67-89-AB">
             </div>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

          <input type="submit" class="btn btn-primary" name="submit" value="Add">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
</div>

</div>

<!-- Modal delete -->
  <div class="modal fade" id="deletemodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Department</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <center>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <h3>Do you want to delete <br><span id="mac_add"></span>?</h3>
             
          </div>
        </div>
        </center>
        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="device_controlAction" method="POST">
              <input type="hidden" id="delete_id" name="id">            
              <input type="submit" class="btn btn-danger" value="Yes" name="delete">
            </form>
             

            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>
 


</body>
<script type="text/javascript">
  $(document).ready(function(){

        $('#the_table').DataTable();

    $('.deletebtn').on('click', function(){
        
      $('#deletemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function(){
        return $(this).text();
      }).get();

    

      $('#delete_id').val(data[0]);
      $('#mac_add').text(data[1]);
    });
  })
  
     
</script>

<?php
include 'footer.php';
 ?>
