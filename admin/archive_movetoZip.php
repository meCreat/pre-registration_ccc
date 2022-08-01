<?php 
include 'dbcon.php';
include "../pre-reg/global_function.php";
date_default_timezone_set('Asia/Manila');
session_start();
$link = '';
$grad = '';
$excel = '';
$year_lvl = '';

if(isset($_POST['y_lvl'])){
	$year_lvl = 'AND student_data.year_lvl = '.$_POST['y_lvl'].'';
	if ($_POST['y_lvl'] == '1') {
		$excel = 'Frashmen Students Report';
	}else if ($_POST['y_lvl'] == '2') {
		$excel = 'Sophomore Students Report';
	}else if ($_POST['y_lvl'] == '3') {
		$excel = 'Junior Students Report';
	}else if ($_POST['y_lvl'] == '4') {
		$excel = 'Seniors Students Report';
	}
	$link .= '?y_lvl='.$_POST['y_lvl'];
}

if(isset($_POST['grad']) && $_POST['grad'] == '1'){
	$graduating = 'AND student_data.graduating = 1 AND student_data.year_lvl = 4';
	$excel = 'Graduating Students Report ';
	$link .= '&grad=1';
}else if(isset($_POST['grad']) && $_POST['grad'] == '0'){
	$graduating = 'AND student_data.graduating = 0 AND student_data.year_lvl = 4';
	$excel = 'Removed from Graduating Students Report ';
	$link .= '&grad=0';
}

$students_ids = '';
if(isset($_POST['delete_selected'])){
	$a = $_POST['num'];
	for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['id'.$i])) {
			$id = js_clean(mysqli_real_escape_string($conn,$_POST['id'.$i]));
			
			if ($students_ids == '') { 
                $students_ids = "AND `student_info`.`id_number` = '".$id."' ";
                
            }else{
                $students_ids .= "OR `student_info`.`id_number` = '".$id."' ";
                
            }
		}
	}

}

$excel_ar_yr = '';
$y = '';
if (isset($_SESSION['ar_yr'])) {
	$y = "Year=".$_SESSION['ar_yr'];
	$excel_ar_yr = " AND student_data.archive_year ='".$_SESSION["ar_yr"]."'";
}

$courseArchive = '';
if(isset($_SESSION['courseArchive']) && isset($_GET['archive'])){
	$courseArchive = $_SESSION['courseArchive'];
}






             $msg = "";
             $msg_style = "";
             $msg1 = "";
             $msg_style1 = "";
             $trans = 0;
            

             $query = "SELECT `student_info`.`id` AS id, `student_info`.`id_number` AS id_number, `student_info`.`surname` AS surname, `student_info` .`firstname` AS firstname,`student_info`.`midname` AS midname, `student_info`.`ext` AS ext, `student_data`.`year_lvl` AS year_lvl, `courses`.`course_abb` AS course_abb, `program_dept`.dept_code AS dept_code, `student_info`.`gender` AS gender,contact_number, house_num, st_purok, brgy,city,birthday, place_of_birth,working, `student_data`.`status` AS status, `email_accounts`.`active` AS active, `email_accounts`.`email` AS email, `g/p_info`.`f_sname`,`f_fname`,`f_mname`,father_occupation, father_contact, father_birthday, m_sname, m_fname, m_mname, mother_occupation, mother_birthday, mother_contact, g_sname, g_fname, g_mname, g_relationship, guardian_occupation, guardian_birthday, guardian_contact, guardian_add, ALS, intermediary, inter_year_grad,inter_school_add, secondary, sec_school_add, sec_section, GWA, date_grad, last_school_att, course_taken, school_add FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON email_accounts.id_number = student_info.id_number INNER JOIN `g/p_info` ON `student_info`.`id_number` = `g/p_info`.`id_number` INNER JOIN `grad_from` ON `student_info`.`id_number` = `grad_from`.`id_number` LEFT JOIN transferee ON `student_info`.`id_number` = `transferee`.`id_number` WHERE  archive='1' $year_lvl $grad $students_ids $courseArchive $excel_ar_yr "; 
             // echo $query;
             

$delete = $conn->query($query);
while($row = $delete -> fetch_assoc()){
	$id_number = $row['id_number'];
	$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Delete ".$_SESSION['courseArchive']." students from year ".$_SESSION["ar_yr"]."','".$row['id']."','$ip','$device','$md')");

	$conn->query("DELETE FROM `student_info` WHERE `id_number` = '".$id_number."';");
	$conn->query("DELETE FROM `student_data` WHERE `id_number` = '".$id_number."';"); 
	$conn->query("DELETE FROM `grad_from` WHERE `id_number` = '".$id_number."';");
	$conn->query("DELETE FROM `g/p_info` WHERE `id_number` = '".$id_number."';");
	$conn->query("DELETE FROM `email_accounts` WHERE `id_number` = '".$id_number."';");
	$conn->query("DELETE FROM `transferee` WHERE `id_number` = '".$id_number."';");
	$conn->query("DELETE FROM `student_logs` WHERE `id_number` = '".$id_number."';");

}
$_SESSION['message'] = "Clearing Success!";
header('location:archive'.$link);
?>