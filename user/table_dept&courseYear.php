<?php 
$abbD = '';
if(isset($_GET['abbD'])){
  $abbD = '&abbD='.$_GET['abbD'];
}

$reg = '';
if(isset($_POST['reg']) && $_POST['reg'] != '0'){
  $reg = "&reg=".$_POST['reg'];
  
}

if(isset($_POST['year'])) {
  $year = '';
  if ($_POST['year'] != '0') {
    $year = '&year='.$_POST['year'];
  }
  
}

header('location:table_dept&course.php?'.$_POST['link'].$year.'&head='.$_POST['head'].$abbD.$reg);
?>