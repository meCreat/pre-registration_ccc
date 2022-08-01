<?php
session_start();
$reg = '';
if(isset($_POST['reg']) && $_POST['reg'] != '0'){
	$reg = '&reg='.$_POST['reg'];
}else{
	$reg = '';
}

header('location:table_yr.php?y_lvl='.$_POST['link'].$reg);
?>