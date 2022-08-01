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
<?php 
endif; 
$i = 0; 

if($_GET['y_lvl'] == 1){
  $head = 'Freshmens';
  $history = '1st Year';
}else if($_GET['y_lvl'] == 2){
  $head = 'Sophomores';
  $history = '2nd Year';
}else if($_GET['y_lvl'] == 3){
  $head = 'Juniors';
  $history = '3rd Year';
}else if($_GET['y_lvl'] == 4){
  $head = 'Seniors';
  $history = '4th Year';
}

$reg = '';
$reglink = '';
if (isset($_GET['reg'])) {
  $reg = "AND student_data.status = '". mysqli_real_escape_string($conn, $_GET['reg'])."'";
  $reglink = '&reg='. mysqli_real_escape_string($conn, $_GET['reg']);
}
?>


<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >
    <?php if($_GET['y_lvl'] != 4){ ?>
    <span class="p-2">Dashboard/ Tables/ Non 4th year Table/ <?=$history?> Table</span>  
  <?php }else{ ?>
     <span class="p-2">Dashboard/ Tables/ <?=$history?> Table</span>  
  <?php } ?>
  </div>
</div>

<div class="container">
    <div  class="col-md-12">
      <h2><?=$head?> Table</h2>

    </div>   
</div>

<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="">


<div class="row">
    <div class="col-md-10">
      
      <a id='pdfBtn'  class="btn btn-danger"  data-toggle='modal' data-target='#pdfmodal'><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
      <a id='excelBtn' href="excel_table_gen.php?y_lvl=<?=$_GET['y_lvl']?><?=$reglink?>" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</a>

    </div>
    <div class="col-md-2">
      <span>Status: </span>
    <form id="submit_reg" action="table_yrRegistered.php" method='POST'>
      <select id="reg" name="reg">
        <option selected='' disabled=''><?php if(isset($_GET['reg'])){ echo ucfirst($_GET['reg']); }else echo 'Select Status';?></option>
        <option value="0">All</option>
        <option value="registered">Registered</option>
        <option value="unregistered">Unregistered</option>
      </select>
        <input type="hidden" name="head" value="<?=$head?>">
        <input type="hidden" name="link" value="<?= mysqli_real_escape_string($conn, $_GET['y_lvl'])?>">

    </form>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#reg').on('change',function(){
          console.log('ss');
          $('#submit_reg').submit();
        })
      })

    </script>
  
</div>
</div>
<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);">
  <div style="border-bottom: 1px solid; margin-bottom: 5px">

      <h6><i class="bi bi-list"></i> <?=$head?> Master List</h6>
  </div>
  <div class="btn-group" id="btn-table">
    <button id="btn" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Select</button>    
    <button id="close" class="btn btn-outline-danger"><i class="bi bi-x"></i> Cancel</button>
    <button id="btn_all" class="btn btn-success"><i class="bi bi-check2"></i> Select All</button>
    <div class="btn-group">
    <button id="option" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       Options
    </button>
    <div  class="dropdown-menu">
      <button form="select" type="submit" name="print_pdf" class="btn btn-primary dropdown-item"><i class="bi bi-file-pdf-fill"></i> Export to PDF</button> 
      <button form="select" type="submit" name="print_excel" class="btn btn-primary dropdown-item"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export to Excel</button> 
        
    </div>
  </div>
  </div>

  <div class='' style="margin-right: 20px; margin-left: 20px; padding-top: 20px;">
    <form id="select" action="selected_st.php?y_lvl=<?=$_GET['y_lvl']?>" method="POST" target="_blank">
      <input type="hidden" name="grad" value="Graduating Student's Masterlist">
      <table style="font-size: 15px;" class=" table table-hover table-bordered horizontal-scrollable"  id="table">

        <?php
       

          $query = "SELECT `student_info`.`id` AS id, `student_info`.`id_number` AS id_number, `student_info`.`surname` AS surname, `student_info` .`firstname` AS firstname,`student_info`.`midname` AS midname, `student_info`.`ext` AS ext, `student_data`.`year_lvl` AS year_lvl, `courses`.`course_abb` AS course_abb, `program_dept`.dept_code AS dept_code, `student_info`.`gender` AS gender, `student_data`.`status` AS status, `email_accounts`.`active` AS active  FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON email_accounts.id_number = student_info.id_number  WHERE student_data.year_lvl = '".$_GET['y_lvl']."' AND student_data.archive = '0' AND student_data.graduating = '0' $reg";

          $result = $conn->query($query);
          
                ?>
         
            <thead class="thead-dark">
        
                      <th style="display:none;" >ID</th>
                       <th>ID number</th>
                       <th>Surname</th>
                       <th>Firstname</th> 
                       <th>Midname</th>
                       <th width="5%">Ext</th> 
                       <th>Course</th>
                       <th>Department</th>
                       <th>Gender</th>
                       <th>Status</th>                  
                       <th>Action</th>                       
                    </thead>
            
               <?php 
              
                while( $row = $result->fetch_assoc()):
                  ?>
                    <tr class="">
                        
                        <td style="display: none"><?php echo $row['id']?></td>
                        <td><input style="margin-right: 3px" id="checkbox<?=$i ?>" type="checkbox" name="id<?php echo $i; ?>" value="<?php echo  $row['id_number']?>"><?php echo $row['id_number']?></td>
                        <td><?php echo  $row['surname']?></td>
                        <td><?php echo  $row['firstname']?></td>
                        <td><?php echo  $row['midname']?></td>
                        <td><?php 
                        if($row['ext']==''){
                          $ext = 'none';
                         }else{
                          $ext = $row['ext'];
                         }
                           echo  $ext;
                        ?></td>
                        <td><?php echo  $row['course_abb']?></td>
                        <td><?php echo  $row['dept_code']?></td>
                        <td><?php echo  $row['gender']?></td>
                        <td><?php echo  $row['status']?></td>
                        <td>
                        <button style="border-radius: 25px" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#viewmodal<?php echo $row['id']; ?>"><i class="bi bi-view-list"></i> View</button><?php include "student_modalView.php"; ?>
                        <span id="<?=$row['id_number']?>">
                        <?php if($row['active'] == 1){
                        ?>
                        <span style="border-radius: 25px" class="btn btn-success" ><i class="bi bi-toggle-off"></i><span style="margin-left: 8px; margin-right: 9px"> Active</span></span>
                        <?php }else{ ?>
                        <span style="border-radius: 25px" class="btn btn-dark" ><i class="bi bi-toggle-on"></i> &nbsp;Inactive</span>
                      <?php } ?>
                        </span>
                        
                        </td>    
                        </td>
                       
                    </tr>
              <?php 
              $i++;           
              endwhile; 

               ?>
               
               
      </table>
      <input id="n" type="hidden" name="num" value="<?=$i?>">
      </form>
  </div>
</div>

<!-- ############################################################################################################################################ -->

<!-- Modal PDF -->
  <div class="modal fade" id="pdfmodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="bi bi-file-pdf-fill"></i> Set PDF formats</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <form id="submit" action="./fpdf/table_general_pdf.php" method="POST" target='_blank'>
              <p>
              <select name="attribute">
                <option value="id_number">ID number</option>
                <option value="surname">Name</option>
              </select>
              <span style="font-weight:bolder;">&nbsp; : &nbsp;</span>
              <select name="sort">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
              </select>
              </p>

              <label><span style="font-weight: bold;">Sex&nbsp; : &nbsp;</span></label>
              <select name="gender" style="margin-right: 20px;">
                <option>All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>

              
               <br>
              <label><span style="font-weight: bold;">Category&nbsp; : &nbsp;</span></label>
              <select id="category" name="category" required="">
                <option selected="">All</option>
                <option value="program_dept">Department</option>
                <option value="courses">Course</option>
              </select>


              <a id="selectall" class="btn btn-secondary btn-sm" style="display:none; margin-right: 20%; float: right;">Select-All</a>
              <a id="unselectall" class="btn btn-danger btn-sm" style="display:none; margin-right: 20%; float: right;">Unselect</a>

              <div id="check-cat" style="border: 1px solid black; border-radius: 10px; padding: 5px; margin-top: 10px; display:none"></div>

              
              <div style="margin-top: 13px;">
                <label style="font-weight: bold;">Status&nbsp; : &nbsp;</label>
                <select name="status">
                  <option value="">All</option>
                  <option value="registered">Registered</option>
                  <option value="unregistered">Unregistered</option>
                </select>

                <select name="active">
                  <option value="">All</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <input type="hidden" name="year_lvl" value="<?=$_GET['y_lvl']?>">
              <input type="hidden" name="grad" value="0">
             </form>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
              
                         
              <button id="pdf" form="submit" type="submit" class="btn btn-danger" name="submit" ><i class="bi bi-file-earmark-pdf-fill"></i> Export</button>
            
             

            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>

<?php include 'table_modal_printReports.php'; ?>
<!--  ############################################################################################################################ -->


 
<?php
include 'footer.php';
 ?>
<script src="./js/table_buttons.js" type="text/javascript"></script>

<script src="./js/select_btn.js" type="text/javascript"></script>
<script src="./js/modal_pdfFormatsCat.js" type="text/javascript"></script>