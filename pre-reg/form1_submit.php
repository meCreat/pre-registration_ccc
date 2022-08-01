<?php 
// code...
// for student_info variables
$form1 = false;
// echo inputLetters(js_clean('qwe'));
// echo $_POST['surname'];
$surname = ifNull(js_clean(inputLetters($_POST['surname'])));

$firstname = strtolower(js_clean($_POST['firstname']));
$firstname = ifNull(inputLetters($firstname));
$midname = inputLetters(js_clean($_POST['midname']));
if(!empty($_POST['midname'])){
	$midname = ucwords(strtolower($_POST['midname']));
}else{
	$midname = '';
}
$ext = js_clean($_POST['ext']);
$contact_number = ifNull(inputNumbers(js_clean($_POST['contact_number'])));

$house_num =ifNull(ucwords(js_clean($_POST['house_num'])));
$st_purok = ifNull(ucwords(js_clean($_POST['st_purok'])));
$brgy = ifNull(ucwords(js_clean($_POST['brgy'])));
$city = ifNull(ucwords(js_clean($_POST['city'])));


// echo $_POST['birthday'];
$birthday = ifNull(validateDate($_POST['birthday']));
$place_of_birth = ifNull(ucwords(js_clean($_POST['place_of_birth'])));
$gender = ifNull(inputLetters(js_clean($_POST['gender'])));
$working = ifNull(inputLetters(js_clean($_POST['working'])));


// for student_data variables
$course = ifNull(inputNumbers(js_clean($_POST['course'])));
$program_dept = ifNull(inputNumbers(js_clean($_POST['program_dept'])));
$year_lvl = ifNull(inputNumbers(js_clean($_POST['year_lvl'])));
$_SESSION['class'] = ifNull($_POST['class']);

// echo $id_number . $surname;

// echo $house_num. $st_purok. $brgy. $city;

if ($surname != false && $firstname != false && $contact_number != false && $house_num != false && $st_purok != false && $brgy != false && $city != false && $birthday != false && $place_of_birth != false && $gender != false && $working != false && $course != false && $program_dept != false && $year_lvl != false && $_SESSION['class'] != false ) {
	$form1 = true;
	
}


// echo $surname."<br>".$firstname."<br>".$midname."<br>".$ext."<br>".$contact_number."<br>".$house_num."<br>".$st_purok."<br>".$brgy."<br>".$city."<br>".$birthday."<br>".$place_of_birth."<br>".$gender."<br>".$working."<br>".$course."<br>".$program_dept."<br>".$year_lvl."<br>".$_SESSION['class'];

?>