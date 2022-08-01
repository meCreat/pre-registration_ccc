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
<div style="border:1px solid; padding: 10px; margin-bottom: 10px;margin-top: 15px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="container">
      <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal"><i class="bi bi-calendar3"></i> Set Registration</button>
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
                     <th >Action</th>
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
                      <td>
                  <button data-toggle="modal" data-target="#deletemodal<?php echo  $row['id']; ?>" class="btn btn-danger" ><i class="bi bi-trash"></i> Delete</button></td>
                  <?php include 'pre-reg_dateModal.php'; ?>
                  </tr>

            <?php endwhile; ?>
    </table>

</div>

<!-- Modal Add -->
  <div class="modal fade" id="addmodal">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <form action="pre-reg_dateAdd" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="bi bi-calendar-plus-fill"></i> Set Registration Date</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <div class="form-group">
                <label>Semester:</label><br>
                <input type="radio" name="semester" value="1st" required=""><span style="padding-right: 5px;">1st Sem</span>
                <input type="radio" name="semester" value="2nd"><span style="padding-right: 5px;">2nd Sem</span>
              </div>

              <div class="form-group">
                <label>School Year:</label><br>
                <select class="" name="year1" >
                  <option value="" disabled='' selected='' required="">Select Year</option>
                  <?php
                  $now = date('Y');
                  $past = 1900;
                  for($year=$now; $year>= $past; $year--){
                  echo '<option value="'.$year.'">'.$year.'</option>';
                  }
                  ?>
                
                </select>
                <span> - </span>
                <select class="" name="year2" required="">
                  <option value="" disabled='' selected='' required="">Select Year</option>
                  <?php
                  $now = date('Y') +1;
                  $past = 1900;
                  for($year=$now; $year>= $past; $year--){
                  echo '<option value="'.$year.'">'.$year.'</option>';
                  }
                  ?>
                
                </select>
    
              </div>

              <div class="form-group">
                <label>Start Date:</label>
                <input type="date" name="date_start" required="">
             </div>
             <div class="form-group">
                <label for="pwd">End Date:</label>
                <input type="date" name="date_end" required="">
             </div>
             <div class="form-group">
                <label>Set by:</label>
                <span style="margin-left: 8px; border: 1px solid; padding: 5px;"><?php 
                          $res = $conn->query("SELECT * FROM admin WHERE id = '".$_SESSION['admin_id']."'");
                          $row = $res->fetch_assoc();
                          echo $row['name'];
                ?></span>
                <input type="hidden" name="set_by" value="<?php echo $_SESSION['admin_id'];?>">
             </div>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

          <input type="submit" class="btn btn-primary" name="submit" value="&#10004 Set">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
</div>



  
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
