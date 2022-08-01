<?php
include 'header.php';
include 'nav.php';
?>
<?php 
require 'dbcon.php';
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

<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >

     <span class="p-2">Dashboard/ Settings/ Program Departments</span>  

  </div>
</div>

<div class="container">
    <div class="col-md-12">
      <h2>Program Department</h2>
    </div>   
</div>

<div class="container">
<div class="row">
    <div class="col-md-8">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="bi bi-file-plus-fill"></i> Add Department</button>
      <a href="./fpdf/dept_pdf.php" class="btn btn-danger" target="_blank"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
    </div>
    <div class="col-md-4">
      
    </div>   
  
</div>
</div>

<div class="container">
    
    <table class="table table-hover table-bordered" id="the_table">
      <?php


        $query = "SELECT * FROM `program_dept` ";

        $result = $conn->query($query);

        ?>
      
          <thead class=" thead-dark">
                     <th style="display:none">Id</th>
                     <th>Depeartment</th>
                     <th>Code</th>
                     <th>Dept. Head</th>                    
                     <th>Edit</th>
                     <th>Delete</th>
                  </thead>
                 
             <?php 
             
              while( $row = $result->fetch_assoc()):
                ?>
                  <tr class="">
                      <td style="display: none"><?php echo  $row['dept_id']?></td>
                      <td><?php echo  $row['department_name']?></td>
                      <td><?php echo  $row['dept_code']?></td>
                      <td><?php echo  $row['dept_head']?></td>
                      <td><button type="button" class="btn btn-info editbtn"  data-toggle="modal" ><i class="bi bi-pencil"></i> Edit</button>
                                 </td>
                      <td><button type="button" class="btn btn-danger deletebtn" data-toggle="modal" ><i class="bi bi-trash"></i> Delete</button></td>
                     
                  </tr>
            <?php            
            endwhile; 
             ?>
    </table>

</div>

<!-- ############################################################################################################################################ -->

  <!-- Modal Add -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="prog_add" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Department</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <div class="form-group">
                <label>Program Department:</label>
                <input type="text" class="form-control" placeholder="Enter Department Name" name="dept_name" required="">
              </div>
              <div class="form-group">
                <label>Department Code:</label>
                <input type="text" class="form-control" placeholder="Enter Department Code" name="dept_code" required="">
             </div>
             <div class="form-group">
                <label for="pwd">Department Head:</label>
                <input type="text" class="form-control" placeholder="Enter Department Head" name="dept_head" required="">
             </div>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
</div>

  <!-- Modal Edit -->
  <div class="modal fade" id="editmodal">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="prog_update" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Department</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <input type="hidden" name="dept_id" id="dept_id">
              <div class="form-group">
                <label>Program Department:</label>
                <input type="text" class="form-control" placeholder="Enter Department Name" name="dept_name" id="dept_name" required="">
              </div>
              <div class="form-group">
                <label>Department Code:</label>
                <input type="text" class="form-control" placeholder="Enter Department Code" name="dept_code" id="dept_code" required="">
             </div>
             <div class="form-group">
                <label for="pwd">Department Head:</label>
                <input type="text" class="form-control" placeholder="Enter Department Head" name="dept_head" id="dept_head" required="">
             </div>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="update" value="Update">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
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
            <h3>Do you want to delete?</h3>
             
          </div>
        </div>
        </center>
        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="prog_delete" method="POST">
              <input type="hidden" id="delete_id" name="dept_id">            
              <input type="submit" class="btn btn-danger" value="Yes" name="delete">
            </form>
             

            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>

<!--  ############################################################################################################################ -->

<script type="text/javascript">
  $(document).ready(function(){
    $('.editbtn').on('click', function(){
        
        $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#dept_id').val(data[0]);
            $('#dept_name').val(data[1]);
            $('#dept_code').val(data[2]);
            $('#dept_head').val(data[3]);
    });

     $('.deletebtn').on('click', function(){
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
    });
     $(document).ready(function(){
        $('#the_table').DataTable();
     })

  });

</script>
<?php
include 'footer.php';
 ?>