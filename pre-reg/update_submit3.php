<?php 
session_start();
include 'dbcon.php';
include 'condition_function.php';
include 'global_function.php';

$id_number = mysqli_real_escape_string($conn, $_SESSION['id_number']);

if (isset($_POST['submit'])) {

//for graduated_from variables
$intermediary = ifNull(js_clean($_POST['intermediary']));
$inter_year_grad = ifNull(js_clean($_POST['inter_year_grad']));
$inter_school_add = ifNull(js_clean($_POST['inter_school_add']));
$secondary = ifNull(js_clean($_POST['secondary']));
$sec_school_add = ifNull(js_clean($_POST['sec_school_add']));
$sec_section = ifNull(js_clean($_POST['sec_section']));
$GWA = ifNull(js_clean($_POST['GWA']));
$date_grad = ifNull(js_clean($_POST['mon']))." ".ifNull(js_clean($_POST['year']));
$reg = "registered";

$query = $conn->query("SELECT * FROM `grad_from` WHERE `id_number` = '$id_number'");
$edu_info = $query->fetch_array();
$edu_infoValidate = array( $edu_info[3], $edu_info[4], $edu_info[5], $edu_info[6], $edu_info[7], $edu_info[8], $edu_info[9], $edu_info[10]);
$edu_infoName = array( 'Intermidiate School', 'Intermediate School Graduate Year', 'Intermediate School Address', 'Secondary School', 'Secondary School Address', 'Secondary School Section', 'GWA', 'Secondary School Graduate Year');	

if($intermediary != false && $inter_year_grad != false && $inter_school_add != false && $secondary != false && $sec_school_add != false && $sec_section != false && $GWA != false && $date_grad != false){

	$intermediary = mysqli_real_escape_string($conn, $intermediary);
	$inter_year_grad = mysqli_real_escape_string($conn, $inter_year_grad);
	$inter_school_add = mysqli_real_escape_string($conn, $inter_school_add);
	$secondary = mysqli_real_escape_string($conn, $secondary);
	$sec_school_add = mysqli_real_escape_string($conn, $sec_school_add);
	$sec_section = mysqli_real_escape_string($conn, $sec_section);
	$GWA = mysqli_real_escape_string($conn, $GWA);
	$date_grad = mysqli_real_escape_string($conn, $date_grad);
	$reg = mysqli_real_escape_string($conn, $reg);

	$edu_infoValues = array( $intermediary, $inter_year_grad, $inter_school_add, $secondary, $sec_school_add, $sec_section, $GWA, $date_grad);	
	for($i=0; $i<count($edu_infoValidate); $i++){
		if($edu_infoValidate[$i] != $edu_infoValues[$i]){
			$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Update ".$edu_infoName[$i]." = ".$edu_infoValues[$i]."','".$id_number."','$device','$md')");
		}
	}


	$conn->query("UPDATE `grad_from` SET `id_number` = '".$id_number."', `intermediary` = '".$intermediary."', `inter_year_grad` = '".$inter_year_grad."', `inter_school_add` = '".$inter_school_add."', `secondary` = '".$secondary."', `sec_school_add` = '".$sec_school_add."',`sec_section`  = '".$sec_section."', `GWA` = '".$GWA."', `date_grad` = '".$date_grad."'  WHERE `id_number` = '".$id_number."';");
	
	$conn->query("UPDATE `student_data` SET status = '$reg' WHERE `id_number` = '".$id_number."' ");
	}

	if(isset($_POST['trans']) == 2){

	$query = $conn->query("SELECT * FROM `grad_from` WHERE `id_number` = '$id_number'");
	$trans_info = $query->fetch_array();
	$trans_infoValidate = array($trans_info[5], $trans_info[3], $trans_info[4]);
	$trans_infoName = array( 'Last School Attended', 'Course Taken', 'Last School Attended Address');	

	//for transferee variables
	$last_school_att = ifNull(js_clean($_POST['last_school_att']));
	$course_taken = ifNull(js_clean($_POST['course_taken']));
	$school_add = ifNull(js_clean($_POST['school_add']));

		if($last_school_att != false && $course_taken != false && $school_add != false && $form1 != false && $form2 != false){

		$last_school_att = mysqli_real_escape_string($conn, $last_school_att);
		$course_taken = mysqli_real_escape_string($conn, $course_taken);
		$school_add	 = mysqli_real_escape_string($conn, $school_add);

		$trans_infoValues = array( $last_school_att, $course_taken, $school_add);

		for($i = 0; $i < count($edu_infoValidate); $i++){
		if($trans_infoValidate[$i] != $trans_infoValues[$i]){
			$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Update ".$trans_infoName[$i]." = ".$trans_infoValues[$i]."','".$id_number."','$device','$md')");
			}
		}
		$conn->query("UPDATE `transferee` SET `id_number` = '$id_number', `last_school_att` = '$last_school_att', `course_taken` = '$course_taken', `school_add` = '$school_add' WHERE id_number = '$id_number' ");
		}
	}

$_SESSION['message'] = "Update Success";
header ('location:form5.php');
}

if (isset($_POST['submitALS'])) {
	$query = $conn->query("SELECT * FROM `grad_from` WHERE `id_number` = '$id_number'");
	$als_info = $query->fetch_array();
	$als_infoValidate = array( $edu_info[3], $edu_info[4], $edu_info[5]);
	$als_infoName = array( 'Intermidiate School', 'Intermediate School Graduate Year', 'Intermediate School Address');	
	$id_number = $_SESSION['id_number'];
	$intermediary = ifNull(js_clean(mysqli_real_escape_string($conn, $_POST['intermediary'])));
	$inter_year_grad = ifNull(js_clean(mysqli_real_escape_string($conn, $_POST['inter_year_grad'])));
	$inter_school_add = ifNull(js_clean(mysqli_real_escape_string($conn, $_POST['inter_school_add'])));

	// echo $intermediary." ".$inter_year_grad." ".$inter_school_add." ".$id_number;
	if($intermediary != false && $inter_year_grad != false && $inter_school_add != false){

		$als_infoValues = array( $intermediary, $inter_year_grad, $inter_school_add);	
		for($i=0; $i<count($als_infoValidate); $i++){
			if($als_infoValidate[$i] != $als_infoValues[$i]){
				$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Update ".$als_infoName[$i]." = ".$als_infoValues[$i]."','".$id_number."','$device','$md')");
			}
		}
		
		$stmt = $conn->prepare("UPDATE `grad_from` SET `intermediary` = ?, `inter_year_grad` = ?, `inter_school_add` = ? WHERE `id_number` =  ?;");
		$stmt->bind_param('ssss', $intermediary, $inter_year_grad, $inter_school_add, $id_number );
		$stmt->execute();
		$_SESSION['message'] = "Update Success";
		header ('location:form5.php');
	}
}

?> 