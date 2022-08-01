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
      <a href="./fpdf/courses_pdf.php" class="btn btn-danger" target="_blank"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
    </div>
    <div class="col-md-4">
      
    </div>   
  
</div>
</div>
<div class="container">
    <table class="table table-bordered table-hover" id="the_table">
      <?php

        $query = "SELECT `courses`.`id` AS `id` , `courses`.`course_abb` AS `abb` ,`program_dept`.`dept_code` AS `dept_code`, `courses`.`course_name` AS `name` FROM `courses` LEFT JOIN `program_dept` ON `courses`.`dept_id` = `program_dept`.`dept_id` ORDER BY `dept_code`";

        $result = $conn->query($query);
      
        ?>
      
          <thead class=" thead-dark">
                     <th style="display:none">id</th>
                     <th >Abbreviation</th>
                     <th>Course Name</th>
                     <th>Dept. Code</th>                    
                     
                  </thead>
                 
             <?php
              while( $row = $result->fetch_assoc()):?>
                  <tr>
                      <td style="display: none"><?php echo  $row['id']?></td>
                      <td><?php echo  $row['abb']?></td>
                      <td><?php echo  $row['name']?></td>
                      <td><?php echo  $row['dept_code']?></td>
                      
                      
                  </tr>
            <?php endwhile; ?>
    </table>

</div>


<?php
include 'footer.php';
 ?>