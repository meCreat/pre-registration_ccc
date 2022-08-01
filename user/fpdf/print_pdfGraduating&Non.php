<?php
require('fpdf.php');
require('../dbcon.php');

class PDF extends FPDF
{
function Header()
{
    $name_format = '';
    if($_POST['grad'] == '1'){
        $name_format = 'Graduating ';
    }else if($_POST['grad'] == '0'){
        $name_format = 'Removed from Graduating ';
    }
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    // Framed title
    $this->Cell(70,10,$name_format." Student's Masterlist",0,0,'C');
    // Line break
    $this->Ln(10);


    $this->SetFont('Arial','B',9);
    $this->Cell(1);
    $this->Cell(22,8,"ID number",1,0,'C'); 
    $this->Cell(80,8,"Name",1,0,'C');
    $this->Cell(15,8,"Course",1,0,'C');
    $this->Cell(15,8,"Dept.",1,0,'C');
    $this->Cell(15,8,"Gender",1,0,'C');
    $this->Cell(42,8,"Status",1,0,'C');
    // Line break
    $this->Ln(8);

}
}
//Data Values for PDF
$attr = $_POST['attribute'];
$sort = $_POST['sort'];

$gender = '';
if($_POST['gender'] == 'Male'){
    $gender = "AND `gender` = 'male'";
}else if($_POST['gender'] == 'Female'){
    $gender = "AND `gender` = 'female'";
}


// Category
$cat = '';

$i = $_POST['category'];
if ($i == 'program_dept') {
    $res = $conn->query("SELECT `dept_code` FROM `program_dept`");
    $i = 0;    
    while($dept = $res->fetch_array()){
        if(isset($_POST['dept'.$i])){
            if ($cat == '') {
                $cat = "AND `dept_code` = '".$dept[0]."' ";
            }else{
                $cat .= "OR `dept_code` = '".$dept[0]."' ";
            }
         }
        $i++;    
    }
}else if($i == 'courses'){ 
$res = $conn->query("SELECT * FROM `program_dept`");  
    for ($i=0; $i <= $res->num_rows; $i++) {
        if(isset($_POST['course'.$i])){
            if ($cat == '') {
                $cat = "AND `course_abb` = '".$_POST['course'.$i]."' ";
            }else{
                $cat .= "OR `course_abb` = '".$_POST['course'.$i]."' ";
            }
         }
    }  
}

$status = '';
if(isset($_POST['status'])){
    $s = $_POST['status'];
    if($s == 'registered'){
        $status = "AND status = 'registered' ";
    }else if($s == 'unregistered'){
        $status = "AND status = 'unregistered' ";
    }
}

$active = '';
if(isset($_POST['active'])){
    $s = $_POST['active'];
    if($s == '1'){
        $active = "AND active = '1' ";
    }else if($s == '0'){
        $active = "AND active = '0' ";
    }
}
$g = '';

if($_POST['grad'] == '1'){
    $g = "AND graduating = '1' ";
    $name_format = 'Graduating ';
}else if($_POST['grad'] == '0'){
    $g = "AND graduating = '0' "; 
    $name_format = 'Removed from Graduating ';
}


//End of Data Values
$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$query = "SELECT `student_info`.`id` AS id, `student_info`.`id_number` AS id_number, `student_info`.`surname` AS surname, `student_info` .`firstname` AS firstname,`student_info`.`midname` AS midname, `student_info`.`ext` AS ext, `courses`.`course_abb` AS course_abb, `program_dept`.`dept_code` AS dept_code, `student_info`.`gender` AS gender, `student_data`.`status` AS status, `email_accounts`.`active` AS active FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON email_accounts.id_number = student_info.id_number WHERE  `student_data`.`archive` = '0' $gender $cat $status $active $g AND `year_lvl` = '4' ORDER BY `student_info`.`".$attr."` $sort ";
$result = $conn->query($query);

while ($row = $result->fetch_array()) {
	$pdf->Cell(22,10,$row[1],0,0);
	$pdf->Cell(80,10,' '.$row[2].", ".$row[3]." ".$row[4]." ".$row[5],0,0);
	$pdf->Cell(15,10,'  '.$row[6],0,0);
	$pdf->Cell(15,10,'  '.$row[7],0,0);
	$pdf->Cell(15,10,'  '.$row[8],0,0);
	$pdf->Cell(22,10,'   '.$row[9],0,0);
    if ($row[10] == 0) {
        $stat = 'Inactive';
    }else{
        $stat = 'Active';
    }
    $pdf->Cell(20,10,'   '.$stat,0,0);
	// Line break
	$pdf->Ln(6.5); 
}
date_default_timezone_set('Asia/Manila');
$pdf->Output('',$name_format.'Students list.pdf '.date('m-d-y h:ia'));



?>