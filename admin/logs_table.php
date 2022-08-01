<?php
include 'header.php';
include 'nav.php';
require 'dbcon.php';
if (isset($_SESSION['message'])):  
?>

  <h5 class="text-<?php echo $_SESSION['msg_type']?> text-center">
    <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </h5>
<?php 
endif;

$reg = '';
$regLink = '';
if (isset($_GET['reg']) && ($_GET['reg'] == "registered" || $_GET['reg'] == "unregistered")) {
  $reg = "AND student_data.status = '".mysqli_real_escape_string($conn, $_GET['reg'])."'";
  $regLink = '?reg='.mysqli_real_escape_string($conn, $_GET['reg']);
}

?>

<div class="container">
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >
    <span class="p-2">Dashboard/ Accounts/ User Logs Table</span>  
  </div>
</div>

<div class="container">
    <div class="col-md-12">
      <h2>User Logs Table</h2>
    </div>   
</div>

<div style="border:1px solid; margin-bottom:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="container">
  <span>Date Preview: <input type="date" name="date_start"> to <input type="date" name="date_end"> <button class="btn btn-primary btn-sm" id="set_date">Set</button></span>
</div>

<div id="table_load">
<div class="container-fluid">
<div style="border: 1px solid; padding: 10px;" class="">
    <table class=" table table-hover table-bordered"  id="table">
      <?php
        $query = "SELECT `name`,`action`,`date`,`admin`.`id` FROM `logs_tbl` LEFT JOIN `admin` ON `admin`.`id` = `logs_tbl`.`user_id` ORDER BY `logs_tbl`.`id` DESC";

        $result = $conn->query($query);
        ?>
      
          <thead class=" thead-dark">
                    <th style="display: none;">ID</th>                     
                     <th width="15%">User</th>
                     <th>Action</th>
                     <th width="12%">Date/Time</th>

                  
                  </thead>
                
             <?php
              while( $row = $result->fetch_assoc()):?>
                  <tr>
                      <td style="display: none;"><?php echo  $row['id']?></td>
                      <td><?php echo  $row['name']?></td>
                      <td><?php echo  $row['action']?></td>
                      <td><?php $date = strtotime($row['date']); echo date("M d Y / H:ia",$date);?></td>
                    
                  </tr>

            <?php endwhile; ?>
    </table>

</div>
</div>
<!-- ############################################################################################################################################ -->



<!--  ############################################################################################################################ -->

<script src="./js/table_gen_controller.js" type="text/javascript"></script>
<script src="./js/logs_script.js" type="text/javascript"></script>
</div>
<?php
include 'footer.php';
?>