<?php

include 'dbcon.php'; 
require './fpdf/fpdf.php';
$id_number = mysqli_real_escape_string($conn, $_GET['id']);
class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    // Framed title
    $this->Cell(70,10,"Student Information",0,0,'C');
    // Line break
    $this->Ln(15);

}

}



             $id = $id_number;
             $msg = "";
             $msg_style = "";
             $msg1 = "";
             $msg_style1 = "";
             $trans = 0;
             $view1 = $conn->query("SELECT  `student_info`.`id_number`, `student_info`.`surname`, `student_info`.`firstname`, `student_data`.`year_lvl`, `courses`.`course_name`, `program_dept`.department_name, `student_data`.`status` ,`student_info`.`midname`, `student_info`.`ext`, `student_info`.`contact_number`,email_accounts.email, `student_info`.`house_num`,`student_info`.`st_purok`, `student_info`.`brgy`, `student_info`.`city`, `student_info`.`birthday`, `student_info`.`place_of_birth`, `student_info`.`gender`,`working` FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON student_info.id_number = email_accounts.id_number WHERE `student_info`.`id_number` = '$id'; ");
             while($rows = $view1->fetch_assoc()){
             	$id_number = $rows['id_number'];
             	$surname = $rows['surname']; 
             	$firstname = $rows['firstname'];
             	$midname = $rows['midname'];
             	$ext = $rows['ext'];
             	$year_lvl = $rows['year_lvl'];
             	$course = $rows['course_name'];
             	$dept = $rows['department_name'];
             	$email = $rows['email'];
             	$contact = $rows['contact_number'];
             	$house_num = $rows['house_num'];
              	$st_purok = $rows['st_purok'];
             	$brgy = $rows['brgy'];
             	$city = $rows['city'];
             	$bday = strtotime($rows['birthday']);
             	$birthplace = $rows['place_of_birth'];
             	$gender = $rows['gender'];
                $working = $rows['working'];

             }


             $view2 = $conn->query("SELECT * FROM `g/p_info` WHERE id_number = '".$id_number."'");
             if ($view2->num_rows == 0) {
             	$msg1 = "None";
             	$msg_style1 = "style='color: white ; text-align: center; background-color: #ff0000; padding: 8px;'";
             }else{
             while($rows = $view2->fetch_assoc()){
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
             }
         	 }

             $view3 = $conn->query("SELECT * FROM `grad_from` WHERE `id_number` = '".$id_number."'");
             if ($view3->num_rows == 0) {
             	$msg = "None";
             	$msg_style = "style='color: white ; text-align: center; background-color: #ff0000; padding: 8px;'";
             }else{
  			 while($rows = $view3->fetch_assoc()){
          $ALS = $rows['ALS'];
  			 	$intermediary = $rows['intermediary'];
  			 	$inter_year_grad = $rows['inter_year_grad'];
  			 	$inter_school_add = $rows['inter_school_add'];
  			 	$secondary = $rows['secondary'];
  			 	
  			 	$sec_school_add = $rows['sec_school_add'];
  			 	$sec_section = $rows['sec_section'];
  			 	$GWA = $rows['GWA'];
  			 	$date_grad = $rows['date_grad'];
  			 }
  			 }

  			 $view4 = $conn->query("SELECT * FROM `transferee` WHERE `id_number` = '".$id_number."'");
  			 if ($view4->num_rows == 1) {
  			 	while($rows = $view4->fetch_assoc()){
  			 	$last_school_att = $rows['last_school_att'];
  			 	$course_taken = $rows['course_taken'];
  			 	$school_add = $rows['school_add'];
  			 }
  			 }else{
  			 	$trans = 1;
  			 }


$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 10, 'Personal Information',1, 1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(70, 8, ' ID number: '.$id_number,0, 1);
$pdf->Cell(120, 8, ' Name: '.$surname.', '.$firstname.' '.$midname.' '.$ext,0, 0);
$pdf->Cell(70, 8, ' Email: '.$email,0, 1);
$pdf->Cell(190,8,' Address: '.$house_num.', '.', '.$st_purok.', '.$brgy.', '.$city,0,1);
$pdf->Cell(40,8,' Contact: '.$contact,0,0);
$pdf->Cell(30,8,' Gender: '.$gender,0,0);
$bday = date($bday);
$pdf->Cell(50,8,' Birthday: '.date("M-d-Y", $bday),0,0);
$pdf->Cell(40,8,' Birthplace: '.$birthplace,0,1);
$pdf->Cell(40,8,' Year level: '.$year_lvl,0,0);
$pdf->Cell(40,8,' Course: '.$course,0,1);
$pdf->Cell(120,8,' Department: '.$dept,0,0);  
$pdf->Cell(70,8,' Working: '.$working,0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 10, 'Parents Information',1, 1,'C');
$pdf->Cell(190, 10, 'Father',0, 1,);
$pdf->SetFont('Arial','',10);
$pdf->Cell(120, 5,' Name: '.$father_name,0,0);
$pdf->Cell(70,5,' Contact: '.$father_contact,0,1);
$pdf->Cell(120,10,' Occupation: '.$father_occupation,0,0);
$pdf->Cell(70,10,' Birthday: '.date("M-d-Y",$father_birthday),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 10, 'Mother',0, 1,);
$pdf->SetFont('Arial','',10);
$pdf->Cell(120, 5,' Name: '.$mother_name,0,0);
$pdf->Cell(70,5,' Contact: '.$mother_contact,0,1);
$pdf->Cell(120,10,' Occupation: '.$mother_birthday,0,0);
$pdf->Cell(70,10,' Birthday: '.date("M-d-Y",$mother_birthday),0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 10, 'Guardians Information',1, 1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(120, 8,' Name: '.$guardian_name,0,0);
$pdf->Cell(70,8,' Contact: '.$guardian_contact,0,1);
$pdf->Cell(120,8,' Occupation: '.$guardian_occupation,0,0);
$pdf->Cell(70,8,' Birthday: '.date("M-d-Y",$guardian_birthday),0,1);
$pdf->Cell(190,8,' Adress: '.$guardian_add,0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 10, 'Educational Attainment',1, 1,'C');
$pdf->SetFont('Arial','',10);
if($ALS == 1){
	$pdf->Cell(190,10,'ALS Graduate',0,0,'C');
}else{
	$pdf->Cell(120,8,' Intermediary: '.$intermediary,0,0);
	$pdf->Cell(70,8,' Year Graduated: '.$inter_year_grad,0,1);
	$pdf->Cell(190,8,' School Address: '.$inter_school_add,0,1);
	$pdf->Cell(190,1,'','T',1,1);
	$pdf->Cell(120,8,' Secondary: '.$secondary,0,0);
	$pdf->Cell(70,8,' Date Graduated: '.$date_grad,0,1);
	$pdf->Cell(190,8,' School Address: '.$sec_school_add,0,1);
	$pdf->Cell(120,8,' GWA: '.$GWA,0,0);
	$pdf->Cell(70,8,' Section: '.$sec_section,0,1);
	if($trans != 1){
		$pdf->Cell(190,1,'','T',1,1);
		$pdf->Cell(120,8,' Last School Attended: '.$last_school_att,0,1);
		$pdf->Cell(70,8,' Course Taken: '.$course_taken,0,1);
		$pdf->Cell(190,8,' School Address: '.$school_add,0,1);
	}



}


$pdf->Output();


 ?>