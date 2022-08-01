<?php
include 'dbcon.php';

//4th Year Section
if(isset($_POST['add'])){
	session_start();
	$id = mysqli_real_escape_string($conn, $_POST['id_number']);
	$conn->query("UPDATE student_data SET graduating = '1' WHERE id_number = '$id'");
	$_SESSION['message'] = 'Updating to Graduates Complete';
	$_SESSION['msg_type'] = 'success';
	header('location:table_remove_list.php');
}

if(isset($_POST['remove'])){
	session_start();
	$id = mysqli_real_escape_string($conn, $_POST['id_number']);
	$conn->query("UPDATE student_data SET graduating = '0' WHERE id_number = '$id'");
	$_SESSION['message'] = 'Moving to Non Graduating Complete';
	$_SESSION['msg_type'] = 'danger';
	header('location:table_graduating.php');
	
}

if (isset($_POST['submit_remove'])) {
	session_start();
	$a = $_POST['num'];
	echo $a;
	for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['id'.$i])) {
			
			$id = mysqli_real_escape_string($conn, $_POST['id'.$i]);
			echo $id;
			$conn->query("UPDATE student_data SET graduating = '0' WHERE id_number = '$id'");	
		}
	}	
	
	$_SESSION['message'] = 'Moving to Non Graduating Complete';
	$_SESSION['msg_type'] = 'danger';
	header('location:table_graduating.php');
}

if (isset($_POST['submit_add'])) {
	session_start();
	$a = $_POST['num'];
	
	for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['id'.$i])) {
			
			$id = mysqli_real_escape_string($conn, $_POST['id'.$i]);
			echo $id;
			$conn->query("UPDATE student_data SET graduating = '1' WHERE id_number = '$id'");			
		}
	}
	
	$_SESSION['message'] = 'Updating to Graduates Complete';
	$_SESSION['msg_type'] = 'success';
	header('location:table_remove_list.php');	
}

//Reports Section
if(isset($_POST['print_pdf'])){
	include('selected_st_pdf.php');
}

if(isset($_POST['print_excel'])){
	include('excel_table_gen.php');
}


//Archive Section
if (isset($_POST['archive_all_graduating'])) {
	session_start();
	$conn->query("UPDATE student_data SET archive = '1' WHERE archive = '0' AND graduating = '1' AND year_lvl = '4'");
	$_SESSION['message'] = 'Moving to Archive Success';
	$_SESSION['msg_type'] = 'danger';
	header('location:table_graduating.php');
}

if (isset($_POST['archive_all_nonGraduating'])) {
	session_start();
	$conn->query("UPDATE student_data SET archive = '1' WHERE archive = '0' AND graduating = '0' AND year_lvl = '4'");
	$_SESSION['message'] = 'Moving to Archive Success';
	$_SESSION['msg_type'] = 'danger';
	header('location:table_graduating.php');
}


if (isset($_POST['archive_selected_st'])) {
	session_start();
	
	$a = $_POST['num'];
	echo $a;
	$y=time();
	$y = (date("Y",$y));
	for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['id'.$i])) {
			
			$id = mysqli_real_escape_string($conn, $_POST['id'.$i]);
			
			$conn->query("UPDATE student_data SET archive = '1', archive_year = '$y' WHERE id_number = '$id'");
			$_SESSION['message'] = 'Moving to Archive Success';
			$_SESSION['msg_type'] = 'danger';
			echo "<script>history.back()</script>";
		}
	}	
}

if (isset($_POST['Unarchive_Selected'])) {
	session_start();
	
	$a = $_POST['num'];
	echo $a;
	for ($i=0; $i < $a; $i++) { 
		if (isset($_POST['id'.$i])) {
			
			$id = mysqli_real_escape_string($conn, $_POST['id'.$i]);
			
			$conn->query("UPDATE student_data SET archive = '0', archive_year = '' WHERE id_number = '$id'");
			$_SESSION['message'] = 'Moving out to Unarchive Success';
			$_SESSION['msg_type'] = 'danger';
			echo "<script>history.back()</script>";
		}
	}	
}

if(isset($_POST['print_excel_reportGen'])){
	
	include 'report_genEXCEL.php';
	
}

if(isset($_POST['delete_selected'])){
	
	include 'archive_movetoZip.php';
	
}
?> 