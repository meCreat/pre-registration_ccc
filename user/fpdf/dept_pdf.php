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
    $this->Cell(70,10,"Department Masterlist",0,0,'C');
    // Line break
    $this->Ln(15);


    $this->SetFont('Arial','B',9);
    $this->Cell(1);
    $this->Cell(30,8,"Dept. Code",1,0,'C');
    $this->Cell(110,8,"Department Name",1,0,'C');
    $this->Cell(45,8,"Dept. Head",1,0,'C');

    // Line break
    $this->Ln(8);

}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$query = "SELECT * FROM `program_dept` ";
$result = $conn->query($query);
$i = 0;
while ($row = $result->fetch_array()) {
    $pdf->Cell(30,12,'    '.$row[2],0,0);
	$pdf->Cell(110,12,'    '.$row[1],0,0);
	$pdf->Cell(40,12,'    '.$row[3],0,0);
	

	// Line break
	$pdf->Ln(6.5); 
    $i++;
}

$pdf->Output();



?>