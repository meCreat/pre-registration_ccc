<?php
session_start();
include 'dbcon.php';
include 'condition_function.php';
include 'global_function.php';

if (isset($_POST["submit"])) {
//for guardian and parent variables
$id_number = mysqli_real_escape_string($conn, $_SESSION['id_number']);	
$f_sname = ifNull(strtoupper(js_clean($_POST['f_sname'])));
$f_fname = strtolower(js_clean($_POST['f_fname']));
$f_fname = ifNull(inputLetters(ucwords($f_fname)));
$f_mname = strtolower(js_clean($_POST['f_mname']));
$f_mname = inputLetters(ucwords($f_mname));

$father_occupation = ifNull(js_clean($_POST['father_occupation']));
$father_birthday = ifNull(validateDate($_POST['father_birthday']));
if($father_occupation != 'Deceased'){
	$father_contact = inputNumbers(js_clean($_POST['father_contact']));
}else{
	$father_contact = 'N/A';
}
$m_sname = strtoupper(js_clean($_POST['m_sname']));
$m_fname = strtolower(js_clean($_POST['m_fname']));
$m_fname = ifNull(inputLetters(ucwords($m_fname)));
$m_mname = strtolower(js_clean($_POST['m_mname']));
$m_mname = inputLetters(ucwords($m_mname));

$mother_occupation = ifNull(js_clean($_POST['mother_occupation']));
$mother_birthday = ifNull(validateDate($_POST['mother_birthday']));
if($mother_occupation != 'Deceased'){
	$mother_contact =js_clean(inputNumbers($_POST['mother_contact']));
}else{
	$mother_contact = 'N/A';
}
$g_sname = ifNull(strtoupper(js_clean($_POST['g_sname'])));
$g_fname = strtolower(js_clean($_POST['g_fname']));
$g_fname = ifNull(inputLetters(ucwords($g_fname)));
$g_mname = strtolower(js_clean($_POST['g_mname']));
$g_mname = inputLetters(ucwords($g_mname));

$g_relationship = ifNull(js_clean($_POST['g_rel']));
$guardian_occupation = ifNull(js_clean($_POST['guardian_occupation']));
$guardian_birthday = ifNull(validateDate($_POST['guardian_birthday']));
$guardian_contact = ifNull(inputNumbers(js_clean($_POST['guardian_contact'])));
$guardian_add = ifNull(js_clean($_POST['guardian_add']));

$query = $conn->query("SELECT * FROM `g/p_info` WHERE `id_number` = '$id_number'");
$g_info = $query->fetch_array();


$g_infoValidate = array($g_info[2], $g_info[3], $g_info[4], $g_info[5], $g_info[6], $g_info[7], $g_info[8], $g_info[9], $g_info[10], $g_info[11], $g_info[12],$g_info[13], $g_info[14], $g_info[15], $g_info[16], $g_info[17], $g_info[18], $g_info[19], $g_info[20], $g_info[21]);
print_r($g_infoValidate);
$g_infoName = array('Father`s Surname', 'Father`s First Name', 'Father`s Middle Name', 'Father`s Occupation', 'Father`s Birthday', 'Father`s Contact', 'Mother`s Surname', 'Mother`s First Name', 'Mother`s Middle Name', 'Mother`s Cccupation', 'Mother`s Birthday', 'Mother`s Contact', 'Gurdian`s Surname', 'Gurdian`s First Name', 'Gurdian`s Middle Name', 'Gurdian`s Occupation', 'Gurdian`s Birthday', 'Gurdian`s Contact', 'Gurdian`s Address', 'Gurdian`s Relationship');

if ($f_sname != false && $f_fname != false && $father_occupation != false && $father_birthday != false && $father_contact != false && $m_sname != false && $m_fname != false && $mother_occupation != false && $mother_birthday != false && $mother_contact != false && $g_sname != false && $g_fname != false && $g_relationship != false && $guardian_occupation != false && $guardian_birthday != false && $guardian_contact != false && $guardian_add != false ) {

	$f_sname = mysqli_real_escape_string($conn, $f_sname);
	$f_fname = mysqli_real_escape_string($conn, $f_fname);
	$f_mname = mysqli_real_escape_string($conn, $f_mname);
	$father_occupation = mysqli_real_escape_string($conn, $father_occupation);
	$father_birthday = mysqli_real_escape_string($conn, $father_birthday);
	$father_contact = mysqli_real_escape_string($conn, $father_contact);
	$m_sname = mysqli_real_escape_string($conn, $m_sname);
	$m_fname = mysqli_real_escape_string($conn, $m_fname);
	$m_mname = mysqli_real_escape_string($conn, $m_mname);
	$mother_occupation = mysqli_real_escape_string($conn, $mother_occupation);
	$mother_birthday = mysqli_real_escape_string($conn, $mother_birthday);
	$mother_contact = mysqli_real_escape_string($conn, $mother_contact);
	$g_sname = mysqli_real_escape_string($conn, $g_sname);
	$g_fname = mysqli_real_escape_string($conn, $g_fname);
	$g_mname = mysqli_real_escape_string($conn, $g_mname);
	$g_relationship = mysqli_real_escape_string($conn, $g_relationship);
	$guardian_occupation = mysqli_real_escape_string($conn, $guardian_occupation);
	$guardian_birthday = mysqli_real_escape_string($conn, $guardian_birthday);
	$guardian_contact = mysqli_real_escape_string($conn, $guardian_contact);
	$guardian_add = mysqli_real_escape_string($conn, $guardian_add);

	$g_infoValues = array($f_sname ,$f_fname ,$f_mname ,$father_occupation ,$father_birthday ,$father_contact ,$m_sname ,$m_fname ,$m_mname ,$mother_occupation ,$mother_birthday ,$mother_contact ,$g_sname ,$g_fname ,$g_mname ,$g_relationship ,$guardian_occupation ,$guardian_birthday ,$guardian_contact ,$guardian_add);

	for($i = 0; $i < count($g_infoValidate); $i++){
		if($g_infoValidate[$i] != $g_infoValues[$i]){
			$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Update ".$g_infoName[$i]." = ".$g_infoValues[$i]."','".$id_number."','$device','$md')");
		}
	}

	$conn->query("UPDATE `g/p_info` SET `f_sname`='$f_sname',`f_fname`='$f_fname',`f_mname`='$f_mname',`father_occupation`='$father_occupation',`father_birthday`='$father_birthday',`father_contact`='$father_contact',`m_sname`='$m_sname',`m_fname`='$m_fname',`m_mname`='$m_mname',`mother_occupation`='$mother_occupation',`mother_birthday`='$mother_birthday',`mother_contact`='$mother_contact',`g_sname`='$g_sname',`g_fname`='$g_fname',`g_mname`='$g_mname',`guardian_occupation`='$guardian_occupation',`guardian_birthday`='$guardian_birthday',`guardian_contact`='$guardian_contact',`guardian_add`='$guardian_add',`g_relationship`='$g_relationship' WHERE `id_number`='$id_number'");

	    $_SESSION['message'] = "Update Success";
	    header("location:form5.php");

	}


}

 ?>
