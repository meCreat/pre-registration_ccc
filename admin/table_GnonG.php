<?php
include 'dbcon.php'; 
session_start(); 
if (isset($_POST['grad'])) {
	if($_POST['grad'] != '0'){
		header('location:table_graduating.php?reg='.mysqli_real_escape_string($conn, $_POST['grad']));
	}else{
		header('location:table_graduating.php');
	}
}

if(isset($_POST['nograd'])){
	if ( $_POST['nograd'] != '0') {
		header('location:table_remove_list?reg='.mysqli_real_escape_string($conn, $_POST['nograd']));
	}else{
		header('location:table_remove_list');
	}
}
if(isset($_POST['genTable']) ){
	if ($_POST['genTable'] != '0') {
		echo $_POST['genTable'];
		header('location:table_general?reg='. $_POST['genTable']);
	}else{
		header('location:table_general');
	}
}


if (isset($_POST['select_dept&course'])) {
	if(isset($_POST['program_dept']) && $_POST['program_dept'] != 'All'){
		$_SESSION['deptGG'] = mysqli_real_escape_string($conn, $_POST['program_dept']);
	}else{
		unset($_SESSION['deptGG']);
	}

	if(isset($_POST['course']) && $_POST['course'] != 'All'){
		$_SESSION['courseGG'] = mysqli_real_escape_string($conn, $_POST['course']);
	}else{
		unset($_SESSION['courseGG']);
	}

	if(isset($_GET["reg"])){
		header('location:table_graduating?reg='. mysqli_real_escape_string($conn, $_GET['reg']));
	}else{
		header('location:table_graduating');
	}
}

if (isset($_POST['select_dept&course1'])) {
	if(isset($_POST['program_dept']) && $_POST['program_dept'] != 'All'){
		$_SESSION['deptNG'] = mysqli_real_escape_string($conn, $_POST['program_dept']);
	}else{
		unset($_SESSION['deptNG']);
	}

	if(isset($_POST['course']) && $_POST['course'] != 'All'){
		$_SESSION['courseNG'] = mysqli_real_escape_string($conn, $_POST['course']);
	}else{
		unset($_SESSION['courseNG']);
	}

	if(isset($_GET["reg"])){
		header('location:table_remove_list?reg='. mysqli_real_escape_string($conn, $_GET['reg']));
	}else{
		header('location:table_remove_list');
	}
}
?>