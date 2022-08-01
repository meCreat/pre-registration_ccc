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

  <p class="text-<?=$_SESSION['msg_type']?> text-center">
    <?php    
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </p>
<?php endif ?>
<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >

     <span class="p-2">Dashboard/ Settings/ Courses</span>  

  </div>
</div>

<div class="container">

    <div class="col-md-8">
      <h2>Course</h2>
    </div>   

</div>

<div class="container">
<div class="row">
    <div class="col-md-8">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="bi bi-file-plus-fill"></i> Add Course</button>
      <a href="./fpdf/courses_pdf.php" class="btn btn-danger" target="_blank"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
    </div>
    <div class="col-md-4">
      
    </div>   
  
</div>
</div>
<div class="container">
    <table class="table table-bordered table-hover" id="the_table">
      <?php

        $query = "SELECT `courses`.`id` AS `id` , `courses`.`course_abb` AS `abb` ,`program_dept`.`dept_code` AS `dept_code`, `courses`.`course_name` AS `name` FROM `courses` LEFT JOIN `program_dept` ON `courses`.`dept_id` = `program_dept`.`dept_id`";

        $result = $conn->query($query);
      
        ?>
      
          <thead class=" thead-dark">
                     <th style="display:none">id</th>
                     <th >Abbreviation</th>
                     <th>Course Name</th>
                     <th>Dept. Code</th>                    
                     <th>Edit</th>
                     <th>Delete</th>
                  </thead>
                 
             <?php
              while( $row = $result->fetch_assoc()):?>
                  <tr>
                      <td style="display: none"><?php echo  $row['id']?></td>
                      <td><?php echo  $row['abb']?></td>
                      <td><?php echo  $row['name']?></td>
                      <td><?php echo  $row['dept_code']?></td>
                      <td><button type="button" class="btn btn-info editbtn"  data-toggle="modal" ><i class="bi bi-pencil"></i> Edit</button></td>
                      <td><button type="button" class="btn btn-danger deletebtn" data-toggle="modal" ><i class="bi bi-trash"></i> Delete</button></td>
                  </tr>
            <?php endwhile; ?>
    </table>

</div>

<!-- #############################################!!!!!! MODALS!!!!!! ####################################################################### -->

  <!--!!!! Modal Add !!!!-->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="courses_add" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <div class="form-group">
                <label>Course:</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course_name" required="">
              </div>

              <div class="form-group">
                <label>Course Abbreviation:</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course_abb" required="">
              </div>

              <div class="form-group">
                <label>Under the Department of:</label>
                <select class="form-control" placeholder="Enter Department Code" name="dept_id">
                <option selected="" value="0"><-- select department --></option>
                <?php 
                $db = "SELECT * FROM program_dept";
                $result = $conn -> query($db);
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['dept_id']."'>".$row['department_name']." ( ".$row['dept_code']." )"."</option>";
                }
                ?>               
                </select>

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

  <!--!!!! Modal Edit !!!!-->
  <div class="modal fade" id="editmodal">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="courses_update" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label>Course:</label>
                <input type="text" class="form-control" placeholder="Enter Department Name" name="course_name" id="course_name">
              </div>
              
              <div class="form-group">
                <label>Course Abbreviation:</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course_abb" id="course_abb">
              </div>

              <div class="form-group">
                 <label>Under the Department of:</label>
                <select class="form-control" placeholder="Enter Department Code" name="dept_id" required="">
                <option selected-disabled="" value="0" id="dept_id"></option>
                <?php 
                $db = "SELECT * FROM program_dept";
                $result = $conn -> query($db);
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['dept_id']."'>".$row['department_name']." ( ".$row['dept_code']." )"."</option>";
                }
                ?>
                </select>
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

 <!--!!!! Modal delete !!!!-->
  <div class="modal fade" id="deletemodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Course</h4>
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
            <form action="courses_delete" method="POST">
              <input type="hidden" id="delete_id" name="id">            
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

            $('#id').val(data[0]);
            $('#course_abb').val(data[1]);
            $('#course_name').val(data[2]);
            $('#dept_id').html(data[3]);            
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