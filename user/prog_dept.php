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
                    
                  </thead>
                 
             <?php 
             
              while( $row = $result->fetch_assoc()):
                ?>
                  <tr class="">
                      <td style="display: none"><?php echo  $row['dept_id']?></td>
                      <td><?php echo  $row['department_name']?></td>
                      <td><?php echo  $row['dept_code']?></td>
                      <td><?php echo  $row['dept_head']?></td>
                      
                     
                  </tr>
            <?php            
            endwhile; 
             ?>
    </table>

</div>

<!-- ############################################################################################################################################ -->


<!--  ############################################################################################################################ -->
<?php
include 'footer.php';
 ?>