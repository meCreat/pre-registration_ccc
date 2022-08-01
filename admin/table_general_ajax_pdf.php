<?php
include 'dbcon.php';
$i = 0;
$o = 0;

if ($_POST['cat'] == 'courses') {

$course = $conn->query("SELECT `course_abb` FROM `courses` ORDER BY `dept_id` ASC ");

  while($c = $course->fetch_assoc()){
    if ($i == 5) {
      echo "<br>";
      $i = 0;
    }
    echo "<span style='margin-right: 20px;'><input  type='checkbox' name='course".$o."' value='".mysqli_real_escape_string($conn, $c['course_abb'])."'>&nbsp;". mysqli_real_escape_string($conn,$c['course_abb'])."</span>";
        
    $o++; 
    $i++; 
  }

}

if ($_POST['cat'] == 'program_dept') {

$dept = $conn->query("SELECT `dept_code` FROM `program_dept`");
$i = 0;
  while($d = $dept->fetch_assoc()){
    if ($i == 5) {
      echo "<br>";
      $i = 0;
    }
    echo "<span style='margin-right: 20px;'><input  type='checkbox' name='dept".$o."' value='".mysqli_real_escape_string($conn, $d['dept_code'])."'>&nbsp;". mysqli_real_escape_string($conn,$d['dept_code'])."</span>";
    $o++;  
    $i++; 
  }

}
 ?>