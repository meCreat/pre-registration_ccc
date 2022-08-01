<?php 
session_start();
include 'dbcon.php';
$n = 0;
if(isset($_POST['submitYr'])){

for ($i=0; $i <4; $i++) { 
		if (isset($_POST['year_lvl'.$i+1])) {
			$n++;
			$id = mysqli_real_escape_string($conn, $_POST['year_lvl'.$i+1]);
			if ($yr == '') {
				$yr = "year_lvl = '".$id."' ";	
			}else{
				$yr .= " OR year_lvl = '".$id."' ";
			}	
			
		}
	}

if($n != 0){
	$_SESSION['yr'] = 'AND ('.$yr.'AND archive = 0)';
}else{
	unset($_SESSION['yr']);
}


header('location:report_generator?'.$_POST['link']);
}
?>