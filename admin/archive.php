<?php 
session_start();
include 'dbcon.php';
include 'header_archive.php';
include "../pre-reg/global_function.php";
// $table = $_GET['table'];
// $year = $_GET['year'];
if (isset($_GET['logout'])) {
  $conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Successful Logged out to Archive.','".$_SESSION['admin_id']."','$ip','$device','$md')");
  unset($_SESSION['archive']);
  echo '<script>window.close();</script>';
}

if (!isset($_SESSION['archive'])) {
  echo '<script>window.location.href = "../404.php"</script>';
}
require 'dbcon.php';
// unset($_SESSION['grad'],$_SESSION['ar_yr'] ,$_SESSION['y_lvl'] );
if (isset($_SESSION['message'])):   
?>

  <h5 class="text-success text-center">
    <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </h5>
<?php 
endif; 
$i = 0; 

$linkGet = '';
$graduating = '';
$ar_yr = '';


if(!isset($_GET['y_lvl'])){
  $y_lvl = "";
  $linkGet = 'archive=1';
  $head = 'Archive Students';
  unset($_SESSION['y_lvl']);
  $y = 'All Data';
  // echo '<script>alert(44)</script>';
}
if(isset($_SESSION['y_lvl']) || isset($_GET['y_lvl'])){
  // echo '<script>alert(4)</script>';
  $y = 'All Data';
  $_SESSION['y_lvl'] = $conn->real_escape_string(js_clean($_GET['y_lvl']));
  if($_SESSION['y_lvl'] == 1) {
    $head = 'Archive Freshmens';
    $grad = 'AND student_data.graduating = 0';
  }else if($_SESSION['y_lvl'] == 2){
    $head = 'Archive Sophomores';
    $grad = 'AND student_data.graduating = 0';
  }else if($_SESSION['y_lvl'] == 3){
    $head = 'Archive Juniors';
    $grad = 'AND student_data.graduating = 0';
  }else if($_SESSION['y_lvl'] == 4){
    $head = 'Archive Seniors';
  }

  $linkGet = 'y_lvl='.$_SESSION['y_lvl'].'&archive=1';
  $y_lvl = "student_data.year_lvl = '".$_SESSION['y_lvl']."' AND";
}
$getGrad = '';
if(isset($_GET['grad']) && $_SESSION['y_lvl'] == 4){
  $_SESSION['grad'] = $conn->real_escape_string(js_clean($_GET['grad']));
  if ($_SESSION['grad'] == 1) {
    $head = 'Seniors Graduates';
    $graduating = 'AND student_data.graduating = 1';
    $getGrad = '&graduating=1';
  }else if ($_SESSION['grad'] == 0) {
    $head = 'Seniors Non Graduates';
    $graduating = 'AND student_data.graduating = 0';
    $getGrad = '&graduating=0';
    // echo $_GET['grad'];
  }
}

// Session pass



$cname = '';
if (isset($_SESSION['ar_yr'])) {
  $ar_yr = " AND student_data.archive_year ='".$_SESSION['ar_yr']."'";
  $y = $_SESSION['ar_yr'];
  $cname .= "YEAR = ".$_SESSION['ar_yr']." ";
  // echo '<script>alert(3)</script>';
}

$link='';
if(isset($_GET['y_lvl'])){
  $link = '?y_lvl='.$conn->real_escape_string(js_clean($_GET['y_lvl']));
}

$course = '';
if(isset($_SESSION['courseArchive'])){
  $course = $_SESSION['courseArchive'];
  $cname .= $_SESSION['courseNameArchive'];
}
?>



<div class="container">
    <div class="col-md-12">
      <h2><?=$head?></h2>
    </div>   
</div>
<?php 
// echo "y_lvl " .$_SESSION['y_lvl']." Grad ". $_SESSION['grad']." Arch_yr ".$_SESSION['ar_yr'];
?>
<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="">
<form id="session" action="archive_arcYear" method="POST">

<div class="row">
    <div class="col-md-12">
    <label style="border: 1px solid black; margin-right: 5px; padding: 10px"> 
 
          
      <span>Select Year of Archive Record: </span>
         
        <select name="session" id="year_sel" class="btn btn-dark">
        <option selected disabled> Select Year</option>
        <option value="all"> All Data</option>
        <?php
        $years = $conn->query("SELECT DISTINCT archive_year FROM `student_data` WHERE NOT archive_year = ''");
        while($row = $years->fetch_assoc()){
        ?>
          <option value="<?=$row['archive_year']?>"> <?=$row['archive_year']?></option>

        <?php
          }
         ?>
         </select>
         <input type="hidden" name="link" value="<?=$link?>">
        <input type="submit" name="select_session" class="btn btn-primary" value="Select" disabled=''>  
          
    </label>  
    <script type="text/javascript">
    $(document).ready(function(){
      $('#year_sel').on('change',function(){
        $('[name=select_session]').removeAttr('disabled');

      }) 

    })  
    </script>


      <a id="excelBtn" href="excel_table_gen?<?=$linkGet?>&archiveExcel=1<?php if(isset($_SESSION['ar_yr'])){ echo '&excel_ar_yr='.$_SESSION["ar_yr"]; } echo $getGrad;?>" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</a>
      
      <?php if (isset($_SESSION['y_lvl'])): ?>


        
      <button style="float: right;" data-toggle="modal" type="button" data-target="#move_zip" class="btn btn-outline-danger btn-lg" ><i class="bi bi-file-earmark-zip-fill"></i> Clear Table</button>
      <?php endif; ?>
      <a  class="btn btn-primary" style="float: right ;margin-right: 20%"  data-toggle='modal' data-target='#courseModal'><i class="bi bi-list-nested"></i> Course</a>
    </div>
</form>
  
</div>
</div>
<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);">
  <div style="border-bottom: 1px solid; margin-bottom: 5px">

      <h6><i class="bi bi-list"></i> <?=$head?> Master List <?=$y ?></h6>
  </div>
  <br>
  <span class="border border-dark p-2">Showing: <?=$cname?></span> <br> <br>
  <div class="btn-group" id="btn-table">
    <button id="btn" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Select</button>    
    <button id="close" class="btn btn-outline-danger"><i class="bi bi-x"></i> Cancel</button>
    <button id="btn_all" class="btn btn-success"><i class="bi bi-check2"></i> Select All</button>
    <div class="btn-group">
    <button id="option" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       Options
    </button>
    <div  class="dropdown-menu">
     
      <button type="submit" name="print_pdf" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#selected_move_un"><i class="bi bi-folder2-open"></i> Unarchive</button>
      <button type="submit" name="print_pdf" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#delete_selected"><i class="bi bi-folder2-open"></i> Delete/Clear</button>
      <button form="select" type="submit" name="print_pdf" class="btn btn-primary dropdown-item"><i class="bi bi-file-pdf-fill"></i> Export to PDF</button> 
      <button form="select" type="submit" name="print_excel" class="btn btn-primary dropdown-item"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export to Excel</button> 
      
    </div>
  </div>

  </div>
 
  <div class='' style="margin-right: 20px; margin-left: 20px; padding-top: 20px;">
  
    <form id="select" action="selected_st?archive=1" method="POST" target="_blank">
      <input type="hidden" name="grad" value="Graduating Student's Masterlist">
      <table style="font-size: 15px;" class=" table table-hover table-bordered"  id="table">

        <?php
       

          $query = "SELECT `student_info`.`id` AS id, `student_info`.`id_number` AS id_number, `student_info`.`surname` AS surname, `student_info` .`firstname` AS firstname,`student_info`.`midname` AS midname, `student_info`.`ext` AS ext, `student_data`.`year_lvl` AS year_lvl, `courses`.`course_abb` AS course_abb, `program_dept`.dept_code AS dept_code, `student_info`.`gender` AS gender, `student_data`.`archive_year` AS status, `email_accounts`.`active` AS active , `student_data`.`reason` FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON email_accounts.id_number = student_info.id_number  WHERE ".$y_lvl." student_data.archive = '1' ".$graduating." ".$ar_yr. $course ;
         

          $result = $conn->query($query);
          
                ?>
         
            <thead class=" thead-dark">
                      <th style="display:none;">ID</th>
                       <th>ID number</th>
                       <th>Surname</th>
                       <th>Firstname</th> 
                       <th>Midname</th>
                       <th width="5%">Ext</th>
                       <th>Year</th> 
                       <th>Course</th>
                       <th>Department</th>
                       <th>Gender</th>
                       <th>Archive Year</th>                  
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
                        <td><?php echo  $row['year_lvl']?></td>
                        <td><?php echo  $row['course_abb']?></td>
                        <td><?php echo  $row['dept_code']?></td>
                        <td><?php echo  $row['gender']?></td>
                        <td><?php echo  $row['status']?></td>
                        <td><button style="border-radius: 25px" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#viewmodal<?php echo $row['id']; ?>"><i class="bi bi-view-list"></i> View</button><?php include "student_modalView.php"; ?>
                        
                        <button style="border-radius: 25px" type="button" class="btn btn-danger unarchivebtn" data-toggle="modal" ><i class="bi bi-file-earmark-zip-fill"></i> Unarchive</button></td>                      
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

<!-- Modal Unarchive -->
  <div class="modal fade" id="unarchivemodal">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="archive_singleSt" method="POST">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Unrchive <span style="font-weight: bold; text-transform: uppercase;" id="fname2"></span> <span style="font-weight: bold;" id="sname2"></span></h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <center>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <br><h5>ID number: <span id="id_number2" style="color: red"></span></h5>
            <h3>Do you want to Unarchive this Student?</h3>
            <center>
            <div id="archiveReasonWhy"></div>
            <p style="text-align: center;">Reason:</p>
            <textarea name="ReasonUnarchive" style="text-align: center;"  rows="5" cols="50"></textarea>
            </center> 
          </div>
        </div>
        </center>
        <!-- Modal footer -->
        <div class="modal-footer">
            
              <input type="hidden" id="id2" name="id">            
              <input type="submit" class="btn btn-danger" value="Yes" name="unarchive">
            
            

            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal Delete Selected ST -->
  <div class="modal fade" id="delete_selected" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title"><i style="color: red;" class="bi bi-file-earmark-zip-fill"></i>Delete/Clear Students</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <p style="text-align: center; font-size: 120%" class="text-danger">Export to Excel file first. </p>
          <center>
          <button form="select" type="submit" name="print_excel" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export to Excel</button> <br><br>
          </center>
        <p style="text-align: center; font-size: 120%">Are you sure you want to Delete Selected Students?</p>
        
        <input type="checkbox" name="" required="" id="check_export"><span>&nbsp;&nbsp;I Export the data to Excel File.</span>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

            <button form="select" type="submit" name="delete_selected" class="btn btn-primary" disabled="">Yes</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
  
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#check_export').on('click',function(){
    if($('#check_export').is('input:checked')){
      $('[name=delete_selected]').removeAttr('disabled','disabled');
    }else{
      $('[name=delete_selected]').attr('disabled','disabled');
    }
  })
  
})
</script>

<!-- Modal Unanrchive Selected Student -->
  <div class="modal fade" id="selected_move_un" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title"><i style="color: red;" class="bi bi-file-earmark-zip-fill"></i>Unarchive</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <p style="text-align: center; font-size: 120%">Are you sure you want to Unarchive Selected Students</p>
        <center>            
          <p style="text-align: center;">Reason:</p>
          <textarea form="select" name="ReasonUnarchiveSel" style="text-align: center;"  rows="5" cols="50"></textarea>
        </center> 
        
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

            <button form="select" type="submit" name="Unarchive_Selected" class="btn btn-primary" disabled="">Yes</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
  
<script type="text/javascript">
$(document).ready(function(){
  $('[name=ReasonUnarchiveSel]').keyup('click',function(){
    if($('[name=ReasonUnarchiveSel]').val() != ''){
      $('[name=Unarchive_Selected]').removeAttr('disabled','disabled');
    }else{
      $('[name=Unarchive_Selected]').attr('disabled','disabled');
    }
  })
  
})  
</script>

<!-- Modal PDF -->
  <div class="modal fade" id="pdfmodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Set PDF formats</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <form id="submit" action="./fpdf/table_general_pdf" method="POST" target='_blank'>
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
              <input type="hidden" name="year_lvl" value="<?php if(isset($_SESSION['y_lvl'])){ echo $_SESSION['y_lvl']; }?>">
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

<!-- Modal Move To Zip -->
  <div class="modal fade" id="move_zip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <form action="archive_movetoZip?archive=1" method="POST">
        

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Clear Table</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <p style="text-align: center; font-size: 120%" class="text-danger">Export to Excel file first. </p>
          <center>
           <a id="excelBtn" href="excel_table_gen?<?=$linkGet?>&archiveExcel=1<?php if(isset($_SESSION['ar_yr'])){ echo '&excel_ar_yr='.$_SESSION["ar_yr"]; } echo $getGrad;?>" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</a> <br><br>
          </center>
              <h5 style="text-align: center;">Are you sure you want to proceed? </h5>
          <input type="checkbox" name="" required=""><span>&nbsp;&nbsp;I Export the data to Excel File.</span>    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
          <input type="hidden" name="y_lvl" value="<?=$_GET['y_lvl']?>">
          <input type="hidden" name="grad" value="<?php if(isset($_GET['grad'])){ echo $_GET['grad']; }?>">
          <input type="submit" class="btn btn-primary" name="movetoZip" value="Yes">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        </form>

        
      </div>
    </div>
  </div>
  
</div>

<!-- Modal Course -->
  <div class="modal fade" id="courseModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
          <form id="genCourse" action="archive_genCourses" method="POST">
          <?php 
          
           function loop($dept){
              include 'dbcon.php';
              
              $courses =  $conn->query("SELECT  * FROM courses WHERE dept_id = '$dept'");
              while($coursesRows = $courses->fetch_assoc()){
                   echo '<input name="dc[]" type="checkbox" value="'.$coursesRows['id'].'"> '.str_replace('Bachelor of Science in','BS',$coursesRows['course_name']).'<br>';
                   
              }  
              }

              $dept = $conn->query("SELECT  * FROM program_dept ORDER BY dept_id");
              $i = 0;
              while ($deptRows = $dept->fetch_assoc()){
              echo '<div class="border border-dark p-2">';
              echo '<h5>'.$deptRows['department_name'].': </h5>';
              
              
              loop($deptRows['dept_id']); 

              echo '</div><br>';            
              }         
          ?>
           
          <input type="hidden" name="courseAll" value="<?=$i?>">
          <input type="hidden" name="link" value="<?=$link?>">
          </form>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
              
                         
              <button  form="genCourse" type="submit" class="btn btn-danger" name="submit" ><i class="bi bi-file-earmark-pdf-fill"></i> Set</button>
            
             

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

<script src="./js/table_gen_controller.js" type="text/javascript"></script>
<script src="./js/select_btn.js" type="text/javascript"></script>
<script src="./js/modal_pdfFormatsCat.js" type="text/javascript"></script>
