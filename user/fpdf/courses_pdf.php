<?php
require('fpdf.php');
require('../dbcon.php');
class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    // Framed title
    $this->Cell(70,10,"Course Masterlist",0,0,'C');
    // Line break
    $this->Ln(15);


    $this->SetFont('Arial','B',9);
    $this->Cell(1);
    $this->Cell(30,8,"Abbreviation",1,0,'C');
    $this->Cell(120,8,"Course",1,0,'C');
    $this->Cell(30,8,"Department Code",1,0,'C');

    // Line break
    $this->Ln(8);

}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$query = "SELECT `courses`.`id` AS `id` , `courses`.`course_abb` AS `abb` ,`program_dept`.`dept_code` AS `dept_code`, `courses`.`course_name` AS `name` FROM `courses` LEFT JOIN `program_dept` ON `courses`.`dept_id` = `program_dept`.`dept_id` ORDER BY `dept_code`";
$result = $conn->query($query);
$i = 0;
while ($row = $result->fetch_array()) {
    $pdf->Cell(30,12,'    '.$row[1],0,0);
	$pdf->Cell(120,12,'    '.$row[3],0,0);
	$pdf->Cell(30,12,'    '.$row[2],0,0);
	

	// Line break
	$pdf->Ln(6.5); 
    $i++;
}

$pdf->Output();



?>