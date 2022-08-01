<?php 
session_start();
include 'dbcon.php';
include "../pre-reg/global_function.php";
date_default_timezone_set('Asia/Manila');
$archive = "student_data.archive = '0' ";
$graduating = '';
$excel = 'General Students Report ';
$excelArc = '';

if (isset($_GET['archive'])) {
	$archive = "student_data.archive = '1' ";
	$excelArc = 'Archive';
	// echo $archive;
}

$excel_ar_yr = '';
if(isset($_GET['excel_ar_yr'])){
	$excel_ar_yr = " AND student_data.archive_year ='".js_clean(mysqli_real_escape_string($conn, $_GET['excel_ar_yr']))."'";
	$excelArc.= js_clean(mysqli_real_escape_string($conn, $_GET['excel_ar_yr']));
}

if(isset($_GET['graduating']) && $_GET['graduating'] == '1'){
	$graduating = 'AND student_data.graduating = 1 AND student_data.year_lvl = 4';
	$excel = 'Graduating Students Report ';
}else if(isset($_GET['graduating']) && $_GET['graduating'] == '0'){
	$graduating = 'AND student_data.graduating = 0 AND student_data.year_lvl = 4';
	$excel = 'Removed from Graduating Students Report ';
}

$year_lvl = '';
if(isset($_GET['y_lvl'])){
	$year_lvl = 'AND student_data.year_lvl = '.js_clean(mysqli_real_escape_string($conn, $_GET['y_lvl'])).'';
	
	if ($_GET['y_lvl'] == '1') {
		$excel = 'Freshmen Students Report';
	}else if ($_GET['y_lvl'] == '2') {
		$excel = 'Sophomore Students Report';
	}else if ($_GET['y_lvl'] == '3') {
		$excel = 'Junior Students Report';
	}else if ($_GET['y_lvl'] == '4') {
		$excel = 'Seniors Students Report';
	}
		
}

$students_ids = '';
if(isset($_POST['print_excel'])){
	$a = $_POST['num'];
	for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['id'.$i])) {
			$id = js_clean(mysqli_real_escape_string($conn, $_POST['id'.$i]));
			
			if ($students_ids == '') {
                $students_ids = "AND `student_info`.`id_number` = '".$id."' ";
                
            }else{
                $students_ids .= "OR `student_info`.`id_number` = '".$id."' ";
                
            }
		}
	}

}

$dept = '';
if (isset($_GET['dept'])) {
	 $dept = 'AND program_dept.dept_id ='.js_clean(mysqli_real_escape_string($conn, $_GET['dept']));
	 $excel = $_GET['head']. ' Table';
}

$courses = '';
if (isset($_GET['course'])) {
	 $courses = 'AND courses.id ='.js_clean(mysqli_real_escape_string($conn, $_GET['course']));
	 $excel = $_GET['head']. ' Table';
}

$reg = '';
if (isset($_GET['reg'])) {
	$reg = "AND student_data.status ='".js_clean(mysqli_real_escape_string($conn, $_GET['reg']))."'";
}

$courseArchive = '';
if(isset($_SESSION['courseArchive']) && isset($_GET['archive'])){
	$courseArchive = js_clean(mysqli_real_escape_string($conn, $_SESSION['courseArchive']));
}


$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('$excelArc $excel Table Export to Excel file','".$_SESSION['admin_id']."','$ip','$device','$md')");

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=".$excelArc." ".$excel." ".date('m-d-y h:ia').".xls");
header('Pragma: no-cache');
header('Expires: 0');




             $msg = "";
             $msg_style = "";
             $msg1 = "";
             $msg_style1 = "";
             $trans = 0;
             $view1 =$conn->query("SELECT `student_info`.`id` AS id, `student_info`.`id_number` AS id_number, `student_info`.`surname` AS surname, `student_info` .`firstname` AS firstname,`student_info`.`midname` AS midname, `student_info`.`ext` AS ext, `student_data`.`year_lvl` AS year_lvl, `courses`.`course_abb` AS course_abb, `program_dept`.dept_code AS dept_code, `student_info`.`gender` AS gender,contact_number, house_num, st_purok, brgy,city,birthday, place_of_birth,working, `student_data`.`status` AS status, `email_accounts`.`active` AS active, `email_accounts`.`email` AS email, `g/p_info`.`f_sname`,`f_fname`,`f_mname`,father_occupation, father_contact, father_birthday, m_sname, m_fname, m_mname, mother_occupation, mother_birthday, mother_contact, g_sname, g_fname, g_mname, g_relationship, guardian_occupation, guardian_birthday, guardian_contact, guardian_add, ALS, intermediary, inter_year_grad,inter_school_add, secondary, sec_school_add, sec_section, GWA, date_grad, last_school_att, course_taken, school_add FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON email_accounts.id_number = student_info.id_number INNER JOIN `g/p_info` ON `student_info`.`id_number` = `g/p_info`.`id_number` INNER JOIN `grad_from` ON `student_info`.`id_number` = `grad_from`.`id_number` LEFT JOIN transferee ON `student_info`.`id_number` = `transferee`.`id_number` WHERE $archive $graduating $year_lvl $students_ids $excel_ar_yr $dept $courses $reg $courseArchive ");

             
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
<table>
		<thead>
		<th style="margin-right: 10px">ID number</th>
	    <th>Surname</th>
	    <th>Firstname</th> 
	    <th>Midname</th>
	    <th>Ext</th>
	    <th>Email</th>
	    <th>Year</th> 
	    <th>Course</th>
	    <th>Department</th>
	    <th>House number</th>
	    <th>Street/Purok</th> 
	    <th>Brgy</th>
	    <th>City</th>
	    <th>Birthday</th>
	    <th>Birthplace</th>
	    <th>Contact #</th>
	    <th>Gender</th>
	    <th>Working</th>
	    <th colspan="2">Status</th>

	    <th>Fathers Name</th>
	    <th>Fathers Occupation</th>
	    <th>Fathers Birthday</th>
	    <th>Fathers Contact #</th>
	   	<th>Mothers Name</th>
	    <th>Mothers Occupation</th>
	    <th>Mothers Birthday</th>
	    <th>Mothers Contact #</th>
	    <th>Guardian Name</th>
	    <th>Relationship</th>
	    <th>Guardian Occupation</th>
	    <th>Guardian Birthday</th>
	    <th>Guardian Contact #</th>
	    <th>Guardian Address</th>

	    <th>Intermediate School</th>
	    <th>Year Graduated</th>
	    <th>Address</th>
	    <th>Secondary School</th>
	    <th>Address</th>
	    <th>Section</th>
	    <th>Year Graduated</th>
	    <th>GWA</th>
	    
	    <th>Last School Attended</th>
	    <th>Course Taken</th>
	    <th>School Address</th>
		</thead>
		<?php	
		 while($rows = $view1->fetch_assoc()):
             	$id_number = $rows['id_number'];
             	$surname = $rows['surname']; 
             	$firstname = $rows['firstname'];
             	$midname = $rows['midname'];
             	$ext = $rows['ext'];
             	$year_lvl = $rows['year_lvl'];
             	$course = $rows['course_abb'];
             	$dept = $rows['dept_code'];
             	$email = $rows['email'];
             	$contact_number = $rows['contact_number'];
             	$house_num = $rows['house_num'];
              	$st_purok = $rows['st_purok'];
             	$brgy = $rows['brgy'];
             	$city = $rows['city'];
             	$bday = strtotime($rows['birthday']);
             	$birthplace = $rows['place_of_birth'];
             	$gender = $rows['gender'];
             	$working = $rows['working'];
             	$contact_number = $rows['contact_number'];
             	$status = $rows['status'];
             	
             	$active = $rows['active'];
             	if ($active = '1') {
             		$active = 'Active';
             	}else{
             		$active = 'Inactive';
             	}
             	$father_name = $rows['f_sname'].", ".$rows['f_fname']. " ".$rows['f_mname'];
             	$father_occupation = $rows['father_occupation'];
             	$father_birthday = strtotime($rows['father_birthday']);
             	$father_contact = $rows['father_contact'];
             	$mother_name = $rows['m_sname'].", ". $rows['m_fname']." ". $rows['m_mname'];
             	$mother_occupation = $rows['mother_occupation'];
             	$mother_birthday = strtotime($rows['mother_birthday']);
             	$mother_contact = $rows['mother_contact'];
             	$guardian_name =  $rows['g_sname']. ", " .$rows['g_fname']. " " .$rows['g_mname']; 
             	$guardian_occupation = $rows['guardian_occupation'];
             	$guardian_birthday = strtotime($rows['guardian_birthday']);
             	$guardian_contact = $rows['guardian_contact'];
             	$guardian_add = $rows['guardian_add'];
              	$g_relationship = $rows['g_relationship'];
                $ALS = $rows['ALS'];
  			 	$intermediary = $rows['intermediary'];
  			 	$inter_year_grad = $rows['inter_year_grad'];
  			 	$inter_school_add = $rows['inter_school_add'];
  			 	if ($ALS == 0 ) {
	  			 	$secondary = $rows['secondary'];  			 	
	  			 	$sec_school_add = $rows['sec_school_add'];
	  			 	$sec_section = $rows['sec_section'];
	  			 	$GWA = $rows['GWA'];
	  			 	$date_grad = $rows['date_grad'];

	  			 	if (isset($last_school_att)) {
	  			 		$last_school_att = $rows['last_school_att'];
	  			 		$course_taken = $rows['course_taken'];
	  			 		$school_add = $rows['school_add'];
	  			 	}
  			 	}

  			 ?>
  			 <tr>
  			 	<td><?=$id_number?></td>
  			 	<td><?=$surname?></td>
  			 	<td><?=$firstname?></td>
  			 	<td><?=$midname?></td>
  			 	<td><?=$ext?></td>
  			 	<td><?=$email?></td>
  			 	<td><?=$year_lvl?></td>
  			 	<td><?=$course?></td>
  			 	<td><?=$dept?></td> 			 	
  			 	<td><?=$house_num?></td>
  			 	<td><?=$st_purok?></td>
  			 	<td><?=$brgy?></td>
  			 	<td><?=$city?></td>
  			 	<td><?=date("M-d-Y",$bday)?></td>
  			 	<td><?=$birthplace?></td>
  			 	<td><?=$contact_number?></td>
  			 	<td><?=$gender?></td>
  			 	<td><?=$working?></td>
  			 	<td><?=$status?></td>
  			 	<td><?=$active?></td>
  			 	<td><?=$father_name?></td>
  			 	<td><?=$father_occupation?></td>
  			 	<td><?=date("M-d-Y",$father_birthday)?></td>
  			 	<td><?=$father_contact?></td>
  			 	<td><?=$mother_name?></td>
  			 	<td><?=$mother_occupation?></td>
  			 	<td><?=date("M-d-Y",$mother_birthday)?></td>
  			 	<td><?=$mother_contact?></td>
  			 	<td><?=$guardian_name?></td>
  			 	<td><?=$g_relationship?></td>
  			 	<td><?=$guardian_occupation?></td>
  			 	<td><?=date("M-d-Y",$guardian_birthday)?></td>
  			 	<td><?=$guardian_contact?></td>
  			 	<td><?=$guardian_add?></td>

  			 	<?php if($ALS == '1'){ ?>
  			 		<td><?=$intermediary."(ALS)";?></td>
	  			 	<td><?=$inter_year_grad?></td>
	  			 	<td><?=$inter_school_add?></td>
  			 	<?php 
  			 	}else{
  			 	?>
  			 	<td><?=$intermediary?></td>
  			 	<td><?=$inter_year_grad?></td>
  			 	<td><?=$inter_school_add?></td>
  			 	<td><?=$secondary?></td>
  			 	<td><?=$sec_school_add?></td>
  			 	<td><?=$sec_section?></td>
  			 	<td><?=$date_grad?></td>
  			 	<td><?=$GWA?></td>
  			 	
  			 	<?php if(isset($last_school_att)): ?>	
  			 		<td><?=$last_school_att?></td>
  			 		<td><?=$course_taken?></td>
  			 		<td><?=$school_add?></td>
  			 	<?php 
  			 		endif;
  			 		} ?>
  			 </tr>


  			 <?php
             endwhile;
             ?>
</table>

<?php
exit();
?>
