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
if(isset($_SESSION['deptGG']) || isset($_SESSION['courseGG'])){
  unset($_SESSION['deptGG']);
  unset($_SESSION['courseGG']);
}

$reg = '';
$regLink = '';
if (isset($_GET['reg'])) {
  $reg = "AND student_data.status = '".mysqli_real_escape_string($conn ,$_GET['reg'])."'";
  $regLink .= '&reg='.$_GET['reg'];
}

$dept = '';
if (isset($_SESSION['deptNG'])) {
   $dept = ' AND program_dept ='.mysqli_real_escape_string($conn ,$_SESSION['deptNG']);
   $regLink .= '&dept='.$_SESSION['deptNG'];

}

$course = '';
if (isset($_SESSION['courseNG'])) {
   $course = ' AND course='.mysqli_real_escape_string($conn ,$_SESSION['courseNG']);
   $regLink .= '&course='.$_SESSION['courseNG'];
}
?>


<div class="container" >
  <div style="border-bottom: 1px solid grey;margin-bottom: 5px;" >
    <span class="p-2">Dashboard/ Tables/ 4th years/ Remove List</span>  
  </div>
</div>

<div class="container">
    <div class="col-md-12">
      <h2>Removed from Graduating Students<a href="table_graduating.php" class="btn btn-light" style="float: right;">Graduating List&nbsp;&nbsp; <i class="bi bi-arrow-left-square"></i></a></h2>
    </div>   
</div>

<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="">


<div class="row">
    <div class="col-md-2">
      
      
      <a id='pdfBtn' class="btn btn-danger"  data-toggle='modal' data-target='#pdfmodal'><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
      <a id="excelBtn" href="excel_table_gen.php?graduating=0&head=Non-Graduating<?=$regLink?>" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</a>

    </div>
    <div class="col-md-10">
    <div class="float-right">
      <button id="ArcBtnRemoved" style="float: right;" class="btn btn-outline-danger btn-lg" data-toggle="modal" data-target="#archive_all"><i class="bi bi-file-earmark-zip-fill"></i> Archive All</button>
      <div class="float-right mr-4">
        <span>Status: </span>
      <form id="submit_reg" action="table_GnonG<?php if(isset($_GET['reg'])){echo '?reg='.$_GET['reg'];}?>" method='POST'>
          <select id="reg" name="nograd">
            <option selected='' disabled='' value='<?=$_GET['reg']?>'><?php if(isset($_GET['reg'])){ echo $_GET['reg']; }else echo 'Select Status';?></option>
            <option value="0">All</option>
            <option value="registered">Registered</option>
            <option value="unregistered">Unregistered</option>
          </select>
      </form>
      </div>

      <div class="float-right mr-4" style="border: 1px solid black; padding: 5px">
        <span>Department: </span><br>
        <form action="table_GnonG<?php if(isset($_GET['reg'])){echo '?reg='.$_GET['reg'];}?>" method="POST">
        <select id="dept" class="dept" name='program_dept'>
          <option value="" selected disabled="">Select Dept.</option>
          <option value="All">All Dept.</option>
        <?php 
      include 'dbcon.php';
      $sql = $conn->query("SELECT * FROM program_dept");
      while($rows = $sql->fetch_assoc()){

        echo "<option value='".$rows['dept_id']."'>".$rows['dept_code']."</option>";
      }

      ?></select>  
    
       <span>Course: </span>
        <select name="course" id="course">
          <option value="" selected="" disabled="">Select Department First</option>

      </select>
    

          <input type="submit" name="select_dept&course1" value="Select" style="padding-right: 3px; padding-left: 3px;">
        </form>
        
      </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#reg').on('change',function(){

            $('#submit_reg').submit();
          })

        var qwe = $('#dept').val();
        if(qwe){
          $.ajax({
            url:"ajax_dept.php",
            method:"POST",
            data:{ID:qwe},
            success:function(data){
              $("#course").html(data);

            }
          });
        }

        var qwe = $('#dept').val();
        $('#dept').on("change",function(){
            var deptId = $(this).val();

            if(deptId){
            $.ajax({
              url:"ajax_dept.php",
              method:"POST",
              data:{ID:deptId},
              success:function(data){
                $("#course").html(data);
                
              }
            });
        }else{

          $("#course").html('<option>Select Department</option>');
        }
          });
        })

      </script>
    </div>   
  
</div>
</div>
<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);">
  <div style="border-bottom: 1px solid;">

      <h6><i class="bi bi-list"></i> Non-Graduating Master List</h6>
    <div class="btn-group" id="btn-table">
    <button id="btn" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Select</button>
    <button id="close" class="btn btn-outline-danger"><i class="bi bi-x"></i> Cancel</button>
    <button id="btn_all" class="btn btn-success"><i class="bi bi-check2"></i> Select All</button>
    <div class="btn-group">
    <button id="option" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       Options
    </button>
    <div class="dropdown-menu">
      <button id="btn_ra" class="dropdown-item" data-toggle="modal" data-target="#select_add"><i class="bi bi-file-earmark-plus"></i> Add</button>
      <button form="select" type="submit" name="print_pdf" class="btn btn-primary dropdown-item"><i class="bi bi-file-pdf-fill"></i> Export to PDF</button> 
      <button form="select" type="submit" name="print_excel" class="btn btn-primary dropdown-item"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export to Excel</button>
       <button id="btn_ra" class="btn btn-primary dropdown-item"  data-toggle="modal" data-target="#archive_selected_st"><i class="bi bi-file-earmark-zip-fill"></i> Move to Archive</button>    
     
    </div>
  </div>
  </div>
  <div class='' style="margin-right: 20px; margin-left: 20px; padding-top: 20px;">
      <form id="select" action="selected_st" method="POST" target="_blank">
      <input type="hidden" name="grad" value="Removed from Graduating Student's Masterlist">
      <table style="font-size: 15px;" class=" table table-hover table-bordered"  id="table">
        <?php
       

          $query = "SELECT `student_info`.`id` AS id, `student_info`.`id_number` AS id_number, `student_info`.`surname` AS surname, `student_info` .`firstname` AS firstname,`student_info`.`midname` AS midname, `student_info`.`ext` AS ext, `student_data`.`year_lvl` AS year_lvl, `courses`.`course_abb` AS course_abb, `program_dept`.dept_code AS dept_code, `student_info`.`gender` AS gender, `student_data`.`status` AS status, `email_accounts`.`active` AS active , `student_data`.`gradReason`  FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON email_accounts.id_number = student_info.id_number  WHERE student_data.year_lvl = '4' AND student_data.archive = '0' AND student_data.graduating = '0'  $dept $course $reg";


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
                        
                        <td style="display: none"><?php echo  $row['id']?></td>
                        <td><input style="margin-right: 3px" id="checkbox<?=$i ?>" type="checkbox" name="id<?php echo $i; ?>" value="<?php echo  $row['id_number']?>"><?php echo  $row['id_number']?></td>
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
                        <button style="border-radius: 25px" type="button" class="btn btn-success activebtn"  data-toggle="modal" ><i class="bi bi-toggle-off"></i><span style="margin-left: 8px; margin-right: 9px"> Active</span></button>
                        <?php }else{ ?>
                        <button style="border-radius: 25px" type="button" class="btn btn-dark inactivebtn"  data-toggle="modal" ><i class="bi bi-toggle-on"></i> &nbsp;Inactive</button>
                      <?php } ?>
                        </span>
                        <button style="border-radius: 25px" type="button" class="btn btn-info deletebtn" data-toggle="modal" data-target="#add<?php echo  $row['id']?>"><i class="bi bi-person-plus-fill"></i> Add</button>
                        <?php include 'remove&add_btn.php'; ?>
                        <button style="border-radius: 25px" type="button" class="btn btn-danger archivebtn" data-toggle="modal" ><i class="bi bi-file-earmark-zip-fill"></i> Archive</button></td>    
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
<?php include 'active_deactive.php'; ?>

<!-- Modal remove -->
  <div class="modal fade" id="select_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title">Add Selected Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <p style="text-align: center; font-size: 120%">Are you sure you want to add the selected student?  </p>
        <center>      
          <p style="text-align: center;">Reason: </p>
          <textarea form="select" name="addReason" style="text-align: center" id="addReasonsSel"  rows="5" cols="50"></textarea>
        </center>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button form="select" type="submit" name="submit_add" class="btn btn-primary" disabled="">Yes</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
  
</div> 

<script type="text/javascript">
  $(document).ready(function(){
    $('#addReasonsSel').keyup(function(){
      if( $('#addReasonsSel').val() != ''){
        $('[name=submit_add]').removeAttr('disabled');
      }else{
        $('[name=submit_add]').attr('disabled','');
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
            <form id="submit" action="./fpdf/print_pdfGraduating&Non" method="POST" target='_blank'>
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

<!-- Modal Archive Selected -->
  <div class="modal fade" id="archive_selected_st" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title"><i style="color: red;" class="bi bi-file-earmark-zip-fill"></i> Move to Archive</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <p style="text-align: center; font-size: 120%">Are you sure you want to Archive Selected Students</p>
        
        
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

            <button form="select" type="submit" name="archive_selected_st" class="btn btn-primary">Yes</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
  
</div>


 <!-- Modal Archive All -->
  <div class="modal fade" id="archive_all" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title"><i style="color: red;" class="bi bi-file-earmark-zip-fill"></i> Move to Archive</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <p style="text-align: center; font-size: 120%">Are you sure you want to Archive Graduating Students</p>
        <center>
          <p style="text-align: center;">Reason: </p>
          <textarea form="select" name="reasonArchiveAllNonGrad" style="text-align: center" rows="5" cols="50"></textarea>
        </center>
        
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

            <button form="select" type="submit" name="archive_all_nonGraduating" class="btn btn-primary" disabled="">Yes</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
  
<script type="text/javascript">
$(document).ready(function(){
    $('[name=reasonArchiveAllNonGrad]').keyup(function(){
      if( $('[name=reasonArchiveAllNonGrad]').val() != ''){
        $('[name=archive_all_nonGraduating]').removeAttr('disabled');
      }else{
        $('[name=archive_all_nonGraduating]').attr('disabled','');
      }
    })
  })  
</script>
<?php include 'table_modal_printReports.php'; ?>
<!--  ############################################################################################################################ -->


 
<?php
include 'footer.php';
 ?>
<script src="./js/table_buttons.js" type="text/javascript"></script>

<script src="./js/table_gen_controller.js" type="text/javascript"></script>
<script src="./js/select_btn.js" type="text/javascript"></script>
<script src="./js/modal_pdfFormatsCat.js" type="text/javascript"></script>