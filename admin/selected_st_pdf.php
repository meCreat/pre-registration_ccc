<?php
include 'dbcon.php';
require './fpdf/fpdf.php';


class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    // Framed title
    $this->Cell(70,10,$_POST['grad'],0,0,'C');
    // Line break
    $this->Ln(10);


    $this->SetFont('Arial','B',9);
    $this->Cell(1);
    $this->Cell(22,8,"ID number",1,0,'C'); 
    $this->Cell(70,8,"Name",1,0,'C');
    $this->Cell(10,8,"Year",1,0,'C');
    $this->Cell(15,8,"Course",1,0,'C');
    $this->Cell(15,8,"Dept.",1,0,'C');
    $this->Cell(15,8,"Gender",1,0,'C');
    $this->Cell(42,8,"Status",1,0,'C');
    // Line break
    $this->Ln(8);

}
}
$a = $_POST['num'];

$selected_id = '';
$n = 0;
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

	
session_start();
if($n == 0){
	$_SESSION['message'] = '<i class="bi bi-exclamation-diamond-fill"></i> Theres no selected students!';
	$_SESSION['msg_type'] = 'danger';
	if($link)
	header('location:table_graduating.php');
}
echo $selected_id;
$pdf = new PDF();



$pdf->AddPage();
$pdf->SetFont('Arial','',9);

if (isset($_GET['archive']) && $_GET['archive'] == '1') {
	$num = '1';
}else{
	$num = '0';
}
$query = "SELECT `student_info`.`id` AS id, `student_info`.`id_number` AS id_number, `student_info`.`surname` AS surname, `student_info` .`firstname` AS firstname,`student_info`.`midname` AS midname, `student_info`.`ext` AS ext, `student_data`.`year_lvl` AS year_lvl, `courses`.`course_abb` AS course_abb, `program_dept`.`dept_code` AS dept_code, `student_info`.`gender` AS gender, `student_data`.`status` AS status, `email_accounts`.`active` AS active FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON email_accounts.id_number = student_info.id_number WHERE  `student_data`.`archive` = $num  $selected_id ORDER BY `student_info`.`id` ASC";

$result = $conn->query($query);

while ($row = $result->fetch_array()) {
	$pdf->Cell(22,10,$row[1],0,0);
	$pdf->Cell(70,10,' '.$row[2].", ".$row[3]." ".$row[4]." ".$row[5],0,0);
	$pdf->Cell(10,10,'    '.$row[6],0,0);
	$pdf->Cell(15,10,'  '.$row[7],0,0);
	$pdf->Cell(15,10,'  '.$row[8],0,0);
	$pdf->Cell(15,10,'  '.$row[9],0,0);
	$pdf->Cell(22,10,'   '.$row[10],0,0);
	 if ($row[11] == 0) {
        $stat = 'Inactive';
    }else{
        $stat = 'Active';
    }
    $pdf->Cell(20,10,'   '.$stat,0,0);
	$pdf->Ln(6.5); 
}
ob_start();


$pdf->Output();
ob_end();
?>