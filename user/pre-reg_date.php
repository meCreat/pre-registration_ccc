<?php
include 'header.php';
include 'nav.php';

require 'dbcon.php'; 

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

     <span class="p-2">Dashboard/ Settings/ Registration Dates</span>  

  </div>
</div>

<div class="container">
<div class="row">

    <div class="col-md-12">
      <h2>Registration Dates</h2>
    </div>   
  
</div>
</div>



<div style="border: 1px solid; padding: 10px;" class="container">
    <table class="table table-striped table-bordered tablesort" id="the_table">
      <?php
        $query = 'SELECT `reg_dates`.`id`, `semester`, `sy`,`reg_dates`.`date_start`, `reg_dates`.`date_end`, `reg_dates`.`status`, `admin`.`name`, `reg_dates`.`date_added` FROM `reg_dates` INNER JOIN `admin` ON admin.id = reg_dates.set_by; ';

        $result = $conn->query($query);
        ?>
      
          <thead>
                    <th >ID</th>                     
                     <th >Semester</th>
                     <th>School Year</th>
                     <th >Start Date</th>
                     <th >End Date</th>
                     <th>Set by</th>                    
                     <th>Date / Time added</th>
                     
                  </thead>
                
             <?php
              while( $row = $result->fetch_assoc()):?>
                  <tr>
                      <td><?php echo  $row['id']?></td>
                      <td><?php echo  $row['semester']?></td>
                      <td><?php echo  $row['sy']?></td>
                      <td><?php $date = strtotime($row['date_start']); echo date("M-d-Y",$date);?></td>
                      <td><?php $date1 = strtotime($row['date_end']); echo date("M-d-Y",$date1)?></td>
                      <td><?php echo  $row['name']?></td>
                      <td><?php $dateadd = strtotime($row['date_added']); echo date("M-d-Y  h:i:s A",$dateadd)?></td>
                      
                  </tr>

            <?php endwhile; ?>
    </table>

</div>

</body>
<script type="text/javascript">
  $(document).ready(function(){
        $('#the_table').DataTable();
     })
</script>

<?php
include 'footer.php';
 ?>
