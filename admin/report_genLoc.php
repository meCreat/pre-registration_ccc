<?php 
session_start();
include 'dbcon.php';
if(isset($_POST['submit1'])){
$a = $_POST['n'];
$b = $_POST['na'];
$n = 0;

for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['c_area'.$i])) {
			$n++;
			$id = mysqli_real_escape_string($conn, $_POST['c_area'.$i]);
			if ($loc == '') {
				$loc = " brgy = '".$id."' ";	
			}else{
				$loc .= " OR brgy = '".$id."' ";
			}	
			
		}
	}


for ($o=0; $o <= $b; $o++) { 
		if (isset($_POST['nc_area'.$o])) {
			$id1 = mysqli_real_escape_string($conn, $_POST['nc_area'.$o]);
			if ($loc == '') {
				$loc = " brgy = '".$id1."' ";	
			}else{
				$loc .= " OR brgy = ` = '".$id1."' ";
			}	
			$n++;
		}
	}

if($n != 0){
	$_SESSION['loc'] = 'AND ('.$loc.')';
}else{
	unset($_SESSION['loc']);
}
}



header('location:report_generator?'.$_POST['link']);
?>