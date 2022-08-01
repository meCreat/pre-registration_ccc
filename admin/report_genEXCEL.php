<?php 
include 'dbcon.php';
date_default_timezone_set('Asia/Manila');
session_start();
$link = '';
$col = '';
$th = '';
// Personal Info

if (isset($_POST['archive_selected_st'])) {
  
  $a = $_POST['num'];
  echo $a;
  $y=time();
  $y = (date("Y",$y));
  for ($i=0; $i < $a; $i++) { 
    if (isset($_POST['id'.$i])) {
      
      $id = mysqli_real_escape_string($conn, $_POST['id'.$i]);
      echo $id;
      $conn->query("UPDATE student_data SET archive = '1', archive_year = '$y' WHERE id_number = '$id'");
      $_SESSION['message'] = 'Moving to Archive Success';
      $_SESSION['msg_type'] = 'danger';
      echo "<script>history.back()</script>";
    }
  } 
}

 if (isset($_GET['email'])) {
 	$col .= (',`email_accounts`.`email`');
    $th .= '<th>Email</th>';
    $link .= 'email=0&';
    
  }

  if (isset($_GET['year_lvl'])) {
    $col .= (',`student_data`.`year_lvl`');
    $th .= '<th>Year level</th>';
    $link .= 'year_lvl=0&';

  }

  if (isset($_GET['course'])) {
    $col .= (',`courses`.`course_abb`');
    $th .= '<th>Course</th>';
    $link .= 'course=0&';
  }

  if (isset($_GET['dept'])) {
    $col .= (',`program_dept`.dept_code');
    $th .= '<th>Department</th>';
    $link .= 'dept=0&';
  }

  if (isset($_GET['add'])) {
    $col .= (',`student_info`.`house_num`,`student_info`.`st_purok`, `student_info`.`brgy`, `student_info`.`city`');
    $th .= '<th>Address</th>';
    $link .= 'add=0&';
  }

  if (isset($_GET['bday'])) {
    $col .= (',`student_info`.`birthday`');
    $th .= '<th>Birthday</th>';
    $link .= 'bday=0&';
  }

  if (isset($_GET['bplace'])) {
    $col .= (',`student_info`.`place_of_birth`');
    $th .= '<th>Birthplace</th>';
    $link .= 'bplace=0&';
  }

  if (isset($_GET['contact'])) {
    $col .= (',`student_info`.`contact_number`');
    $th .= '<th>Contact</th>';
    $link .= 'contact=0&';
  }
  if (isset($_GET['gender'])) {
    $col .= (',`student_info`.`gender`');
    $th .= '<th>Gender</th>';
    $link .= 'gender=0&';
  }

  if (isset($_GET['working'])) {
    $col .= (',`working`');
    $th .= '<th>Working</th>';
    $link .= 'working=0&';
  }

  if (isset($_GET['Status'])) {
    $col .= (',`student_data`.`status`');
    $th .= '<th>Sattus</th>';
    $link .= 'Status=0&';
  }

// Fathers
  if (isset($_GET['f_name'])) {
    $col .= (',f_sname, f_fname, f_mname');
    $th .= '<th>F.Name</th>';
    $link .= 'f_name=0&';
  }
  if (isset($_GET['f_occ'])) {
   $col .= (',father_occupation');
   $th .= '<th>F.Occupation</th>';
   $link .= 'f_occ=0&';
  }

  if (isset($_GET['f_bday'])) {
    $col .= (',father_birthday');
    $th .= '<th>F.Birthday</th>';
    $link .= 'f_bday=0&';
  }

  if (isset($_GET['f_con'])) {
   $col .= (',father_contact');
   $th .= '<th>F.Contact</th>';
   $link .= 'f_con=0&';
  }

// Mothers
  if (isset($_GET['m_name'])) {
    $col .= (',m_sname, m_fname, m_mname');
    $th .= '<th>M.Name</th>';
    $link .= 'm_name=0&';
  }
  if (isset($_GET['m_occ'])) {
   $col .= (',mother_occupation');
   $th .= '<th>M.Occupation</th>';
   $link .= 'm_occ=0&';
  }

  if (isset($_GET['m_bday'])) {
   $col .= (',mother_birthday');
   $th .= '<th>M.Birthday</th>';
   $link .= 'm_bday=0&';
  }

  if (isset($_GET['m_con'])) {
   $col .= (',mother_contact');
   $th .= '<th>M.Contact</th>';
   $link .= 'm_con=0&';
  }

// Guardian
  if (isset($_GET['g_name'])) {
    $col .= (',g_sname, g_fname, g_mname');
    $th .= '<th>G.Name</th>';
    $link .= 'g_name=0&';
  }
  if (isset($_GET['g_rel'])) {
   $col .= (',g_relationship');
   $th .= '<th>G.Relationship</th>';
   $link .= 'g_rel=0&';
  }

  if (isset($_GET['g_occ'])) {
    $col .= (',guardian_occupation');
    $th .= '<th>G.Occupation</th>';
    $link .= 'g_occ=0&';
  }

  if (isset($_GET['g_bday'])) {
  $col .= (',guardian_birthday');
  $th .= '<th>G.Birthday</th>';
  $link .= 'g_bday=0&';
  }

  if (isset($_GET['g_con'])) {
    $col .= (',guardian_contact');
    $th .= '<th>G.Contact</th>';
    $link .= 'g_con=0&';
  }

  if (isset($_GET['g_add'])) {
  $col .= (',guardian_add');
  $th .= '<th>G.Address</th>';
  $link .= 'g_add=0&';
  }

  // Primary School
  if (isset($_GET['intermediary'])) {
    $col .= (',intermediary');
    $th .= '<th>Primary School Name</th>';
    $link .= 'intermediary=0&';
  }

  if (isset($_GET['inter_year_grad'])) {
   $col .= (',inter_year_grad');
   $th .= '<th>Primary Year Graduated</th>';
   $link .= 'inter_year_grad=0&';
  }

  if (isset($_GET['inter_school_add'])) {
    $col .= (',inter_school_add');
    $th .= '<th>Primary Address</th>';
    $link .= 'inter_school_add=0&';
  }

// Secondary
  if (isset($_GET['secondary'])) {
    $col .= (',secondary');
    $th .= '<th>Secondary School Name</th>';
    $link .= 'secondary=0&';
  }
  if (isset($_GET['sec_school_add'])) {
   $col .= (',sec_school_add');
   $th .= '<th>Secondary Address</th>';
   $link .= 'sec_school_add=0&';
  }

  if (isset($_GET['sec_section'])) {
   $col .= (',sec_section');
   $th .= '<th>Secondary Section</th>';
   $link .= 'sec_section=0&';
  }

  if (isset($_GET['GWA'])) {
  $col .= (',GWA');
  $th .= '<th>GWA</th>';
  $link .= 'GWA=0&';
  }

  if (isset($_GET['date_grad'])) {
   $col .= (',date_grad');
   $th .= '<th>Sec. Date Graduated</th>';
   $link .= 'date_grad=0&';
  }

  // Transferee

  if (isset($_GET['last_school_att'])) {
   $col .= (',last_school_att');
   $th .= '<th>Last School Attended</th>';
   $link .= 'last_school_att=0&';
  }

  if (isset($_GET['course_taken'])) {
  $col .= (',course_taken');
  $th .= '<th>Course Taken</th>';
  $link .= 'course_taken=0&';
  }

  if (isset($_GET['school_add'])) {
   $col .= (',school_add');
   $th .= '<th>School Address</th>';
   $link .= 'school_add=0&';
  }


$selected_id = '';
$n=0;
if (isset($_POST['print_excel_reportGen'])) {
	$a = $_POST['num'];
	for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['id'.$i])) {
			$id = mysqli_real_escape_string($conn, $_POST['id'.$i]);
			if ($selected_id == '') {
				$selected_id = " AND `student_info`.`id_number` = '".$id."' ";	
			}else{
				$selected_id .= "OR `student_info`.`id_number` = '".$id."' ";
			}	
			$n++;
		}
	}
}

$loc = '';
if(isset($_SESSION['loc'])){
  $loc = $_SESSION['loc'];
}

$yr = '';
// unset($_SESSION['loc']);
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

$active_status = '';
if(isset($_SESSION['active_status'])){

  $active_status = $_SESSION['active_status'];
}

$classification = '';
if(isset($_SESSION['classification'])){
  $classification = $_SESSION['classification'];

}

if(!isset($_POST['archive_selected_st'])){
  // header("Content-type: application/vnd.ms-excel");
  // header("Content-Disposition: attachment; filename="."STUDENT REPORT ".date('m-d-y h:ia').".xls");
  // header('Pragma: no-cache');
  // header('Expires: 0');
}


             $msg = "";
             $msg_style = "";
             $msg1 = "";
             $msg_style1 = "";
             

             $query = "SELECT `student_info`.`id_number`, `student_info`.`surname`, `student_info`.`firstname`,`student_info`.`midname`, `student_info`.`ext`, `email_accounts`.`active` AS active $col  FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON student_info.id_number = email_accounts.id_number INNER JOIN `g/p_info` ON `g/p_info`.`id_number` = `student_info`.`id_number` INNER JOIN `grad_from` ON `grad_from`.`id_number` = `student_info`.`id_number` LEFT JOIN `transferee` ON `transferee`.`id_number` = `student_info`.`id_number` WHERE `archive` = '0' $selected_id  $loc $yr $course $gender $status $active_status $classification";


             $view1 =$conn->query($query);

             
?>

<style>
table, td, th {
  border: 1px solid;
}
th{
  padding:  5px;  
}
table {
  width: 100%;
  border-collapse: collapse;
}
</style>

<table style="">
		<thead>
		<th style="margin-right: 10px">ID number</th>
	    <th>Surname</th>
	    <th>Firstname</th> 
	    <th>Midname</th>
	    <th>Ext</th>
	    <?=$th; ?>   
		</thead>
		<?php	
		

  			 	while( $row = $view1->fetch_assoc()):
  			 ?>

  			 <tr>
  			 	<td><?=$row['id_number']?></td>
  			 	<td><?=$row['surname']?></td>
  			 	<td><?=$row['firstname']?></td>
  			 	<td><?=$row['midname']?></td>
  			 	<td><?=$row['ext']?></td>
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
  			 </tr>


  			 <?php
             endwhile;
             ?>
</table>
