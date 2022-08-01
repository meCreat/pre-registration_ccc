<?php
$form2 = false;
//for guardian and parent variables	
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

// echo $f_sname. $m_sname.$guardian_occupation. $g_relationship;

if ($f_sname != false && $f_fname != false && $father_occupation != false && $father_birthday != false && $father_contact != false && $m_sname != false && $m_fname != false && $mother_occupation != false && $mother_birthday != false && $mother_contact != false && $g_sname != false && $g_fname != false && $g_relationship != false && $guardian_occupation != false && $guardian_birthday != false && $guardian_contact != false && $guardian_add != false ) {
 	 	$form2 = 'true';
 	 	
 	 } 	 

 ?>