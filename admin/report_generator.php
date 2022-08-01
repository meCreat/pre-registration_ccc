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

$col = '';
$th = '';
$td = '';

$loc = '';

unset($_SESSION['active']);
if (isset($_SESSION['loc'])) {
  $loc = $_SESSION['loc'];
}

$yr = '';
if(isset($_SESSION['yr'])){
  $yr = $_SESSION['yr'];
}

$course = '';
if(isset($_SESSION['course'])){
  $course = $_SESSION['course'];
}

$gender = '';
if(isset($_SESSION['gender'])){
  $gender = $_SESSION['gender'];
}

$status = '';
if(isset($_SESSION['status'])){
  $status = $_SESSION['status'];
}

$active = '';
if(isset($_SESSION['active_status'])){
  $active = $_SESSION['active_status'];
}

$classification = '';
if(isset($_SESSION['classification'])){
  $classification = $_SESSION['classification'];

}
 include 'report_genGETval.php';


// echo $loc.$yr;
?>

<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >

     <span class="p-2">Dashboard/ Tables/ Report Generator</span>  

  </div>
</div>

<div class="container">
    <div  class="col-md-12">
      <h2>Report Generator</h2>

    </div>   
</div>

<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="">


<div class="row">
    <div class="col-md-4">
      <a id="excelBtn" href="report_genEXCEL.php?<?=$link?>" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</a>

    </div>

    <div class="col-md-8">
      <span>Set Report: </span>
      <a  class="btn btn-info"  data-toggle='modal' data-target='#table_set'><i class="bi bi-filter-circle-fill"></i> Table Head</a>
      <span>Sort By: </span>
      <a  class="btn btn-danger"  data-toggle='modal' data-target='#location'><i class="bi bi-geo-alt-fill"></i> Location</a>
      <a  class="btn btn-warning"  data-toggle='modal' data-target='#y_lvlModal'><i class="bi bi-filter-right"></i> Year Level</a>
      <a  class="btn btn-primary"  data-toggle='modal' data-target='#courseModal'><i class="bi bi-list-nested"></i> Course</a>
      <a  class="btn btn-info"  data-toggle='modal' data-target='#other'><i class="bi bi-list-nested"></i> Other</a>
    </div>
 
  
</div>
<div class="border border-dark m-2 p-2">
  <?php
  $consoleYr = '';
  $consoleLoc = '';
  $consoleCourse = '';

  $consoleLoc = str_replace('AND', 'BRGY = ', $loc);
  $consoleLoc = str_replace('brgy =','', $consoleLoc);
  $consoleLoc = str_replace('OR',', ', $consoleLoc);

  $consoleYr = str_replace('AND', 'YEAR LEVEL = ', $yr);
  $consoleYr = str_replace('year_lvl =', '', $consoleYr);
  $consoleYr = str_replace('OR', ', ', $consoleYr);
  $consoleYr = str_replace('YEAR LEVEL =  archive = 0', '', $consoleYr);

  $consoleGender = str_replace('AND', 'SEX = ', $gender);
  $consoleGender = str_replace('gender =','', $consoleGender);

  $consoleStatus = str_replace('AND', 'STATUS = ', $status);
  $consoleStatus = str_replace('`student_data`.`status` =','', $consoleStatus);

  $consoleActive = '';
  if (isset($_SESSION['active_status'])){
    $activeqwe =  str_replace(' AND `email_accounts`.`active` = ', '', $_SESSION['active_status']);
    if ($activeqwe == 1) {
      $consoleActive = ' EMAIL.STATUS = Active ';
    }else{
      $consoleActive = ' EMAIL.STATUS = Inactive ';
    }
  }

  if(isset($_SESSION['courseName'])){
    $consoleCourse = $_SESSION['courseName'];
  }


   ?>
  <span>Console: <?=$consoleLoc?>&nbsp;<?=$consoleYr?>&nbsp;<?=$consoleCourse?>&nbsp;<?=$consoleGender?>&nbsp;<?=$consoleStatus?>&nbsp;<?=$consoleActive?>&nbsp;<?php if(isset($_SESSION['consoleClassification'])){ echo $_SESSION['consoleClassification'];}?></span>
</div>
</div>
<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);">
  <div style="border-bottom: 1px solid; margin-bottom: 5px">

      <h6><i class="bi bi-list"></i> Generated Table</h6>
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
     <!--  <button form="select" type="submit" name="print_pdf" class="btn btn-primary dropdown-item"><i class="bi bi-file-pdf-fill"></i> Export to PDF</button>  -->
      <button form="select" type="submit" name="print_excel_reportGen" class="btn btn-primary dropdown-item"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export to Excel</button> 
      <button id="btn_ra" class="btn btn-primary dropdown-item"  data-toggle="modal" data-target="#archive_selected_st"><i class="bi bi-file-earmark-zip-fill"></i> Move to Archive</button>    
    </div>
  </div>
  </div>

  <div style="margin-right: 20px; margin-left: 20px; padding-top: 20px; overflow-x: auto;">

    <form id="select" action="report_genEXCEL?<?=$link?>" method="POST">
      

      <table style="font-size: 15px;" class=" table table-hover table-bordered"  id="table">

        <?php
      

          $query = "SELECT `student_info`.`id`,`student_info`.`id_number`, `student_info`.`surname`, `student_info`.`firstname`,`student_info`.`midname`, `student_info`.`ext`, `email_accounts`.`active` AS active $col  FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON student_info.id_number = email_accounts.id_number INNER JOIN `g/p_info` ON `g/p_info`.`id_number` = `student_info`.`id_number` INNER JOIN `grad_from` ON `grad_from`.`id_number` = `student_info`.`id_number` LEFT JOIN `transferee` ON `transferee`.`id_number` = `student_info`.`id_number` WHERE archive = 0 $loc $yr $course $gender $status $active $classification";

          // echo $query;
        
          /*$query = "SELECT `student_info`.`id_number`, `student_info`.`surname`, `student_info`.`firstname`, `student_data`.`year_lvl`, `courses`.`course_abb`, `program_dept`.dept_code, `student_data`.`status` ,`email_accounts`.`active` AS active,`student_info`.`midname`, `student_info`.`ext`, `student_info`.`contact_number`,`email_accounts`.`email`, `student_info`.`house_num`,`student_info`.`st_purok`, `student_info`.`brgy`, `student_info`.`city`, `student_info`.`birthday`, `student_info`.`place_of_birth`, `student_info`.`gender`,`working`,f_sname, f_fname, f_mname, father_occupation, father_birthday, father_contact, m_sname, m_fname, m_mname, mother_occupation, mother_birthday, mother_contact ,  g_sname, g_fname, g_mname, g_relationship, guardian_occupation, guardian_birthday, guardian_contact, guardian_add, ALS , intermediary , inter_year_grad , inter_school_add , secondary , sec_school_add ,sec_section , GWA , date_grad, last_school_att, course_taken, school_add FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON student_info.id_number = email_accounts.id_number INNER JOIN `g/p_info` ON `g/p_info`.`id_number` = `student_info`.`id_number` INNER JOIN `grad_from` ON `grad_from`.`id_number` = `student_info`.`id_number` LEFT JOIN `transferee` ON `transferee`.`id_number` = `student_info`.`id_number`";*/

          $result = $conn->query($query);
          // echo $query ;
                ?>
         
            <thead class="thead-dark">
        
                      <th style="display:none;" >ID</th>
                       <th>ID number</th>
                       <th>Surname</th>
                       <th>Firstname</th> 
                       <th>Midname</th>
                       <th width="5%">Ext</th>      
                       <?=$th; ?>               
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
                        <!-- Personal Info -->
                        <?php if (isset($_GET['email'])){ echo "<td>".$row['email']."</td>"; }?>
                        <?php if (isset($_GET['year_lvl'])){ echo "<td>".$row['year_lvl']."</td>"; }?>
                        <?php if (isset($_GET['course'])){ echo "<td>".$row['course_abb']."</td>"; }?>
                        <?php if (isset($_GET['dept'])){ echo "<td>".$row['dept_code']."</td>"; }?>
                        <?php if (isset($_GET['add'])){ echo "<td>".$row['house_num'].", ".$row['st_purok'].", ".$row['brgy'].", ".$row['city']."</td>"; }?>
                        <?php if (isset($_GET['bday'])){ echo "<td>".$row['birthday']."</td>"; }?>
                        <?php if (isset($_GET['bplace'])){ echo "<td>".$row['place_of_birth']."</td>"; }?>
                        <?php if (isset($_GET['contact'])){ echo "<td>".$row['contact_number']."</td>"; }?>
                        <?php if (isset($_GET['gender'])){ echo "<td>".$row['gender']."</td>"; }?>
                        <?php if (isset($_GET['working'])){ echo "<td>".$row['working']."</td>"; }?>
                        <?php if (isset($_GET['Status'])){ echo "<td>".$row['status']."</td>"; }?>

                        
                        <?php if (isset($_GET['f_name'])){ echo "<td>".$row['f_sname'].", ". $row['f_fname']." ".$row['f_mname']."</td>"; }?>
                        <?php if (isset($_GET['f_occ'])){ echo "<td>".$row['father_occupation']."</td>"; }?>
                        <?php if (isset($_GET['f_bday'])){ echo "<td>".$row['father_birthday']."</td>"; }?>
                        <?php if (isset($_GET['f_con'])){ echo "<td>".$row['father_contact']."</td>"; }?>
                        <?php if (isset($_GET['m_name'])){ echo "<td>".$row['m_sname'].", ". $row['m_fname']." ".$row['m_mname']."</td>"; }?>
                        <?php if (isset($_GET['m_occ'])){ echo "<td>".$row['mother_occupation']."</td>"; }?>
                        <?php if (isset($_GET['m_bday'])){ echo "<td>".$row['mother_birthday']."</td>"; }?>
                        <?php if (isset($_GET['m_con'])){ echo "<td>".$row['mother_contact']."</td>"; }?>
                        <?php if (isset($_GET['g_name'])){ echo "<td>".$row['g_sname'].", ".$row['g_fname']." ".$row['g_mname']."</td>"; }?>
                        <?php if (isset($_GET['g_rel'])){ echo "<td>".$row['g_relationship']."</td>"; }?>
                        <?php if (isset($_GET['g_occ'])){ echo "<td>".$row['guardian_occupation']."</td>"; }?>
                        <?php if (isset($_GET['g_bday'])){ echo "<td>".$row['guardian_birthday']."</td>"; }?>
                        <?php if (isset($_GET['g_con'])){ echo "<td>".$row['guardian_contact']."</td>"; }?>
                        <?php if (isset($_GET['g_add'])){ echo "<td>".$row['guardian_add']."</td>"; }?>

                        <?php if (isset($_GET['intermediary'])){ echo "<td>".$row['intermediary']."</td>"; }?>
                        <?php if (isset($_GET['inter_year_grad'])){ echo "<td>".$row['inter_year_grad']."</td>"; }?>
                        <?php if (isset($_GET['inter_school_add'])){ echo "<td>".$row['inter_school_add']."</td>"; }?>
                        <?php if (isset($_GET['secondary'])){ echo "<td>".$row['secondary']."</td>"; }?>
                        <?php if (isset($_GET['sec_school_add'])){ echo "<td>".$row['sec_school_add']."</td>"; }?>
                        <?php if (isset($_GET['sec_section'])){ echo "<td>".$row['sec_section']."</td>"; }?>
                        <?php if (isset($_GET['GWA'])){ echo "<td>".$row['GWA']."</td>"; }?>
                        <?php if (isset($_GET['date_grad'])){ echo "<td>".$row['date_grad']."</td>"; }?>
                        <?php if (isset($_GET['last_school_att'])){ echo "<td>".$row['last_school_att']."</td>"; }?>
                        <?php if (isset($_GET['course_taken'])){ echo "<td>".$row['course_taken']."</td>"; }?>
                        <?php if (isset($_GET['school_add'])){ echo "<td>".$row['school_add']."</td>"; }?>


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
        
        
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

            <button form="select" type="submit" name="archive_all" class="btn btn-primary">Yes</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- Modal Report Generate Tbl -->
  <div class="modal fade" id="table_set">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Set Tables</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <form id="tbl" action="report_generate" method="POST">
              <div class="border border-dark p-2">

              <div class="row">
              <div class="col-md-12 position-centered"><button type="button" class="btn btn-secondary" id="all_perInfo"> Personal Info</button></div>  
              <div class="col-md-4"><input type="checkbox" name="email"> Email</div>
              <div class="col-md-4"><input type="checkbox" name="year_lvl"> Year level</div>
              <div class="col-md-4"><input type="checkbox" name="course"> Course</div>
              </div>
              
              <div class="row">
              <div class="col-md-4"><input type="checkbox" name="dept"> Department</div>
              <div class="col-md-4"><input type="checkbox" name="add"> Address</div>
              <div class="col-md-4"><input type="checkbox" name="bday"> Birthday</div>
              </div>

              <div class="row">
              <div class="col-md-4"><input type="checkbox" name="bplace"> Birthplace</div>
              <div class="col-md-4"><input type="checkbox" name="contact"> Contact</div>
              <div class="col-md-4"><input type="checkbox" name="gender"> Gender</div>
              </div>

              <div class="row mb-3">
              <div class="col-md-4"><input type="checkbox" name="working"> Working</div>
              <div class="col-md-4"><input type="checkbox" name="Status"> Status</div>
              </div>
            </div>

              

            <div class="border border-dark p-2">
              <div class="row">
              
              <div class="col-md-12"><button id="FathersInfo" type="button" class="btn btn-secondary">Fathers Info</button></div>
              <div class="col-md-3"><input type="checkbox" name="f_name"> Name</div>
              <div class="col-md-3"><input type="checkbox" name="f_occ"> Occupation</div>
              <div class="col-md-3"><input type="checkbox" name="f_bday"> Birthday</div>
              <div class="col-md-3"><input type="checkbox" name="f_con"> Contact</div>
              </div>
            </div>
            
            <div class="border border-dark p-2">  
              <div class="row"> 
              <div class="col-md-12"><button id="MothersInfo" type="button" class="btn btn-secondary">Mothers Info</button> </div>
              <div class="col-md-3"><input type="checkbox" name="m_name"> Name</div>
              <div class="col-md-3"><input type="checkbox" name="m_occ"> Occupation</div>
              <div class="col-md-3"><input type="checkbox" name="m_bday"> Birthday</div>
              <div class="col-md-3"><input type="checkbox" name="m_con"> Contact</div>
              </div>
            </div>

            <div class="border border-dark p-2">
              <div class="row"> 
              <div class="col-md-12"><button id="GInfo" type="button" class="btn btn-secondary">Guardian Info</button> </div>
              <div class="col-md-3"><input type="checkbox" name="g_name"> Name</div>
              <div class="col-md-3"><input type="checkbox" name="g_occ"> Occupation</div>
              <div class="col-md-3"><input type="checkbox" name="g_bday"> Birthday</div>
              <div class="col-md-3"><input type="checkbox" name="g_con"> Contact</div>
              <div class="col-md-3"><input type="checkbox" name="g_rel"> Relationship</div>
              <div class="col-md-3"><input type="checkbox" name="g_add"> Address</div>
              </div>
            </div>
              
            <div class="border border-dark p-2">
              <div class="row"> 
              <div class="col-md-12"><button id="primary_sc" type="button" class="btn btn-secondary">Primary School</button> </div>
              <div class="col-md-4"><input type="checkbox" name="intermediary"> School Name</div>
              <div class="col-md-4"><input type="checkbox" name="inter_year_grad"> Year Graduated</div>
              <div class="col-md-4"><input type="checkbox" name="inter_school_add"> Address</div>
              </div>
            </div>

            <div class="border border-dark p-2">
              <div class="row"> 
              <div class="col-md-12"><button id="sec_sc" type="button" class="btn btn-secondary">Secondary School</button> </div>
              <div class="col-md-4"><input type="checkbox" name="secondary"> School Name</div>
              <div class="col-md-4"><input type="checkbox" name="sec_school_add"> Address</div>
              <div class="col-md-4"><input type="checkbox" name="sec_section"> Section</div>
              <div class="col-md-4"><input type="checkbox" name="GWA"> GWA</div>
              <div class="col-md-4"><input type="checkbox" name="date_grad"> Date Graduated</div>
              
              </div>
            </div>

            <div class="border border-dark p-2">
              <div class="row"> 
              <div class="col-md-12"><button id="tras" type="button" class="btn btn-secondary">Last School Attended (Transferee)</button> </div>
              <div class="col-md-4"><input type="checkbox" name="last_school_att"> School Name</div>
              <div class="col-md-4"><input type="checkbox" name="course_taken"> Course Taken</div>
              <div class="col-md-4"><input type="checkbox" name="school_add"> Address</div>
              
              </div>
            </div>
             

             </form>
          </div>
        </div>
        <script type="text/javascript" src="./js/set_tbl.js"></script>
        <!-- Modal footer -->
        <div class="modal-footer">
              
                         
              <button type="submit" form="tbl" class="btn btn-success" name="submit"><i class="bi bi-nut-fill"></i> SET</button>
            
             

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>



<!-- Modal Deactivate -->
  <div class="modal fade" id="active" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">

        

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><span style="font-weight: bold; text-transform: uppercase;" id="fname"></span> <span style="font-weight: bold;" id="sname"></span> is <span style="color: green">Active</span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <p style="text-align: center;">Do you want to <span style="font-weight: bold; text-transform: uppercase; color: red;">Deactivate</span> this Account ID number <span style="font-weight: bold; text-transform: uppercase;" id="id_number"></span>?</p>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="id_number" id="id">
          <input type="submit" class="btn btn-primary" name="deactivate" value="Yes" id="deactivate">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

        
      </div>
    </div>
  </div>
  
</div>


<!-- Modal PDF -->
  <div class="modal fade" id="location">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Choose Location</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <form id="submit1" action="report_genLoc" method="POST">
             <div class="border mb-2 p-2 border-dark c_area">
              <h6 id="c_area" class="mb-2 btn btn-primary">Calamba Area :</h6><br>
              <?php
              $c_area =$conn->query("SELECT DISTINCT brgy FROM student_info INNER JOIN student_data ON student_info.id_number = student_data.id_number WHERE archive = 0 AND city='calamba'");
              $i = 0;
              while($rows=$c_area->fetch_array()):
              
              ?>
              
              <span class="border p-1"><input type="checkbox" name="c_area<?=$i?>" value="<?=$rows[0];?>">&nbsp;<?php echo ucwords($rows[0]);?>&nbsp;&nbsp;</span>

            <?php
            $i++;
            endwhile;?>
            <br>
            <input type="hidden" name="n" value="<?=$i?>">
             </div>

             <div class="border p-2 border-dark">
              <h6 id="nc_area" class="mb-2 btn btn-dark">Out of Calamba Area :</h6><button></button><br>
              <?php
              $c_area =$conn->query("SELECT DISTINCT brgy FROM student_info  INNER JOIN student_data ON student_info.id_number = student_data.id_number WHERE archive = 0 AND NOT city = 'calamba'");
              $in = 0;
              while($rows=$c_area->fetch_array()):
              
              ?>
              
              <span class="border p-1"><input type="checkbox" name="nc_area<?=$in?>" value="<?=$rows[0];?>">&nbsp;<?php echo ucwords($rows[0]); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>

              <?php
              $in++;
              endwhile;?>

             </div> 
            <input type="hidden" name="na" value="<?=$in?>">
            <input type="hidden" name="link" value="<?=$link?>">
            </form>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
              
                         
              <button form="submit1" type="submit" class="btn btn-primary" name="submit1" ><i class="bi bi-file-earmark-pdf-fill"></i> Select</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>


<!-- Modal PDF -->
  <div class="modal fade" id="other">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Others</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <form id="others" action="report_genOthers" method="POST">
              

              <label><span style="font-weight: bold;">Sex&nbsp; : &nbsp;</span></label>
              <select name="gender" style="margin-right: 20px;">
                <option value="-">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>

              <div id="check-cat" style="border: 1px solid black; border-radius: 10px; padding: 5px; margin-top: 10px; display:none"></div>

              <div style="margin-top: 13px;">
                <label style="font-weight: bold;">Registration Status&nbsp; : &nbsp;</label>
                <select name="status">
                  <option value="-">All</option>
                  <option value="registered">Registered</option>
                  <option value="unregistered">Unregistered</option>
                </select>

                <label style="font-weight: bold;">Active Status&nbsp; : &nbsp;</label>
                <select name="active">
                  <option value="-">All</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select><br>

                <label style="font-weight: bold;">Classification &nbsp; : &nbsp;</label>
                <select name="classification">
                  <option value="-">All</option>
                  <option value="1">ALS</option>
                  <option value="2">Not Transferee</option>
                  <option value="3">Transferee</option>
                </select>
              </div>
              <input type="hidden" name="link" value="<?=$link?>">
              
             </form>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
              
                         
              <button id="pdf" form="others" type="submit" class="btn btn-success" name="submit" ><i class="bi bi-file-earmark-pdf-fill"></i> Set</button>
            
             

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>


<!-- Modal PDF -->
  <div class="modal fade" id="y_lvlModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Year Level</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <form id="submitYr" action="report_genYr" method="POST">
            <input type="checkbox" name="year_lvl1" value="1">&nbsp; 1st Year<br>
            <input type="checkbox" name="year_lvl2" value="2">&nbsp; 2nd Year<br>
            <input type="checkbox" name="year_lvl3" value="3">&nbsp; 3rd Year<br>
            <input type="checkbox" name="year_lvl4" value="4">&nbsp; 4th Year &nbsp;&nbsp;&nbsp;
            <select style="display: none;" name="grad">
              <option value="-">All</option>
              <option value="1">Graduating</option>
              <option value="0">Non-Graduating</option>
            </select>
            <input type="hidden" name="link" value="<?=$link?>">
             </form>
          </div>
        </div>
        <script type="text/javascript">
          $(document).ready(function(){
          $('[name=year_lvl4]').on('click',function(){
            $('[name=grad]').show();
            
          });  
            
          })
        </script>
        <!-- Modal footer -->
        <div class="modal-footer">
              
                         
              <button form="submitYr" type="submit" class="btn btn-success" name="submitYr" ><i class="bi bi-file-earmark-pdf-fill"></i> Select</button>
            
             

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
          <form id="genCourse" action="report_genCourses" method="POST">
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