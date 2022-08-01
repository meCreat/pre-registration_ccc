<?php 
session_start();
include 'dbcon.php';
include 'condition_function.php';
include 'global_function.php';

if (isset($_POST["submit"])) {
	// code...
// for student_info variables

$id_number = js_clean(mysqli_real_escape_string($conn,$_SESSION['id_number']));
$surname = ifNull(inputLetters(js_clean($_POST['surname'])));

$firstname = ifNull(inputLetters(js_clean(strtolower($_POST['firstname']))));
if(!empty($_POST['midname'])){
	$midname = inputLetters(js_clean(strtolower($_POST['midname'])));
}else{
	$midname = '';
}

$ext = js_clean($_POST['ext']);
$contact_number = ifNull(inputNumbers(js_clean($_POST['contact_number'])));

$house_num = ifNull(ucwords(js_clean($_POST['house_num'])));
$st_purok = ifNull(ucwords(js_clean($_POST['st_purok'])));
$brgy = ifNull(ucwords(js_clean($_POST['brgy'])));
$city = ifNull(ucwords(js_clean($_POST['city'])));

$birthday = ifNull(validateDate($_POST['birthday']));
$place_of_birth = ifNull(ucwords(js_clean($_POST['place_of_birth'])));
$gender =  ifNull(inputLetters(js_clean($_POST['gender'])));
$working = ifNull(inputLetters(js_clean($_POST['working'])));


// for student_data variables
$course = ifNull(inputNumbers(js_clean($_POST['course'])));
$program_dept = ifNull(inputNumbers(js_clean($_POST['program_dept'])));
$year_lvl = ifNull(inputNumbers(js_clean($_POST['year_lvl'])));


// Query Data
$query = $conn->query("SELECT * FROM student_info WHERE id_number = '$id_number'");
$query1 = $conn->query("SELECT * FROM student_data WHERE id_number = '$id_number'");

$s_info = $query->fetch_array();
$s_data = $query1->fetch_array();

// Info Validate Values
$s_infoValidate = array($s_info[2], $s_info[3], $s_info[4], $s_info[5], $s_info[6], $s_info[7], $s_info[8], $s_info[9], $s_info[10], $s_info[11], $s_info[12],$s_info[13], $s_info[14]);
$s_dataValidate = array($s_data[2], $s_data[3], $s_data[4]);

// Name for Data base
$s_infoName = array('Surname', 'Firstname', 'Midname', 'Name Extention', 'Contact Number', 'House Number', 'Street/Purok', 'Brgy', 'City', 'Birthday', 'Place of Birth', 'Gender', 'Working Student');
$s_dataName = array('course', 'program_dept', 'year_lvl');

echo $surname ." ".$firstname ." ".$contact_number ." ".$house_num." ".$st_purok ." ext:".$brgy ." ".$city." ".$birthday ." ".$place_of_birth ." ".$gender ." ".$working ."  C=".$course ." Dept=".$program_dept ." ".$year_lvl ." ".$id_number ."<br>" ;



if ($surname != false && $firstname != false && $contact_number != false && $house_num != false && $st_purok != false && $brgy != false && $city != false && $birthday != false && $place_of_birth != false && $gender != false && $working != false && $course != false && $program_dept != false && $year_lvl != false && $id_number != false ) {

	$surname = mysqli_real_escape_string($conn, strtoupper($surname) );
	$firstname = mysqli_real_escape_string($conn, ucwords(strtolower($firstname)) );
	$midname = mysqli_real_escape_string($conn, ucwords(strtolower($midname)) );
	$ext = mysqli_real_escape_string($conn, $ext );
	$contact_number = mysqli_real_escape_string($conn, $contact_number );
	$house_num = mysqli_real_escape_string($conn, $house_num );
	$st_purok = mysqli_real_escape_string($conn, $st_purok );
	$brgy = mysqli_real_escape_string($conn, $brgy );
	$city = mysqli_real_escape_string($conn, $city );
	$birthday = mysqli_real_escape_string($conn, $birthday );
	$place_of_birth = mysqli_real_escape_string($conn, $place_of_birth );
	$gender = mysqli_real_escape_string($conn, $gender );
	$working = mysqli_real_escape_string($conn, $working );
	$course = mysqli_real_escape_string($conn, $course );
	$program_dept = mysqli_real_escape_string($conn, $program_dept );
	$year_lvl = mysqli_real_escape_string($conn, $year_lvl);

	// Values inputted by Student
	$s_infoValues = array( $surname, $firstname, $midname, $ext, $contact_number, $house_num, $st_purok, $brgy, $city, $birthday, $place_of_birth, $gender, $working );
	$s_dataValues = array($course, $program_dept, $year_lvl);

	for($i = 0; $i < count($s_infoValidate); $i++){
		if($s_infoValidate[$i] != $s_infoValues[$i]){
			$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Update ".$s_infoName[$i]." = ".$s_infoValues[$i]."','".$id_number."','$device','$md')");
		}
	}

	$conn->query("UPDATE student_info SET surname = '$surname', firstname = '$firstname', midname = '$midname', ext = '$ext', contact_number = '$contact_number', house_num = '$house_num', st_purok = '$st_purok', brgy = '$brgy', city = '$city', birthday = '$birthday', place_of_birth = '$place_of_birth', gender = '$gender', working = '$working' WHERE id_number = '$id_number'");

		
	$conn->query("UPDATE student_data SET course = '$course', program_dept = '$program_dept', year_lvl = '$year_lvl' WHERE id_number = '$id_number'");
		
	$_SESSION['message'] = "Update Success";
	header("location:form5.php");
}else{ 

}
		

}