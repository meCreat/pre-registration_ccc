<?php

if($form1 == true && $form2 == true){
	$sql = "INSERT INTO `student_info` (id_number, surname, firstname, midname, ext, contact_number, house_num, st_purok , brgy, city, birthday, place_of_birth, gender,  working) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql); 
	$stmt->bind_param("ssssssssssssss",$id_number, $surname, $firstname, $midname, $ext, $contact_number, $house_num, $st_purok, $brgy, $city, $birthday, $place_of_birth, $gender, $working);
	$stmt->execute();
	$stmt->close();
	  
 
	// Insert for student_data
	$sql = "INSERT INTO student_data (id_number, course, program_dept, year_lvl) VALUES ( ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql); 
	$stmt->bind_param("ssss",$id_number, $course, $program_dept, $year_lvl);
	$stmt->execute();
	$stmt->close();

	// Insert Email
	$sql = "INSERT INTO email_accounts (vkey,email,id_number) VALUES (?,?,?)";
	$stmt = $conn->prepare($sql); 
	$stmt->bind_param("sss",$_SESSION['key'], $_SESSION['email'], $_SESSION['id_number'] );
	$stmt->execute();
	$stmt->close();
	
	// Insert for Parent and Guardian information
	$sql_guardian = "INSERT INTO `g/p_info`(`id_number`, `f_sname`,`f_fname`,`f_mname`, `father_occupation`, `father_birthday`, `father_contact`, `m_sname`, `m_fname`,`m_mname`,`mother_occupation`, `mother_birthday`, `mother_contact`, `g_sname`,`g_fname`,`g_mname`,`g_relationship` ,`guardian_occupation`, `guardian_birthday`, `guardian_contact`, `guardian_add`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql_guardian); 
	
	$stmt->bind_param("sssssssssssssssssssss",$id_number,$f_sname,$f_fname,$f_mname,$father_occupation,$father_birthday,$father_contact,$m_sname,$m_fname,$m_mname,$mother_occupation,$mother_birthday,$mother_contact,$g_sname,$g_fname,$g_mname,$g_relationship,$guardian_occupation,$guardian_birthday,$guardian_contact,$guardian_add );
	$stmt->execute();
	$stmt->close();

	$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('This Student has been added as Enrollee.','".$id_number."','$device','$md')");

}	

?>