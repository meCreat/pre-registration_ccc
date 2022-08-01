<?php 
include 'dbcon.php';
include '../pre-reg/global_function.php';
include '../pre-reg/condition_function.php';
if(isset($_POST['logs'])){
	$ds = mysqli_real_escape_string($conn, $_POST['date_start']);
	
	$de = strtotime(mysqli_real_escape_string($conn, $_POST['date_end']));
	$de = date('Y-m-d', $de);
	$de = $de." 23:59:59";
	
	?>

<div class="container-fluid">
<div style="border: 1px solid; padding: 10px;" class="">
<table class=" table table-hover table-bordered"  id="table">

	<?php
  if(validateDate($ds) == false || validateDate($de) == false){
    echo '<script>alert("Error.")</script>';
    exit();
  }
    $query = "SELECT `name`,`action`,`date`,`ip_address`,`device`,`mac_add` FROM `logs_tbl` LEFT JOIN `admin` ON `admin`.`id` = `logs_tbl`.`user_id` WHERE `date` BETWEEN '$ds' AND '$de' ORDER BY `logs_tbl`.`id` DESC";

    $result = $conn->query($query);
      	?>
      
          <thead class=" thead-dark" >
                    <th style="display: none;">ID</th>                     
                     <th width="20%">User</th>
                     <th>Action</th>
                     <th width="15%">Date</th>
                     <th width="10%">IP_Address</th>
                     <th width="15%">Device</th>
                     <th  width="15%">Mac Address</th>
                  
                  </thead>
                
             <?php
              while( $row = $result->fetch_assoc()):?>
                  <tr>
                      <td style="display: none;"><?php echo  $row['id']?></td>
                      <td><?php echo  $row['name']?></td>
                      <td><?php echo  $row['action']?></td>
                      <td><?php $date = strtotime($row['date']); echo date("M-d-Y H:i:s",$date);?></td>
                      <td><?php echo  $row['ip_address']?></td>
                      <td><?php echo  $row['device']?></td>
                      <td><?php echo  $row['mac_add']?></td>
                  </tr>

        <?php endwhile; 
}
        ?>

         </table>

</div>
</div>

<script src="./js/table_gen_controller.js" type="text/javascript"></script>
<script src="./js/logs_script.js" type="text/javascript"></script>