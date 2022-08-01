<?php 
session_start();
include 'dbcon.php';
if(!isset($_POST['dc'])){
	unset($_SESSION['courseArchive']);
	unset($_SESSION['courseNameArchive']);
	header('location:archive.php'.$_POST['link']);
}
$dc = $_POST['dc'];
$count = count($dc);
$course = '';

for($i=0; $i < $count; $i++){
	if (isset($dc[$i])) {
		if ($course == '') {
			$course = " course = '".$dc[$i]."' ";	
		}else{
			$course .= " OR course = '".$dc[$i]."' ";
		}
	}
}

$query = $conn->query("SELECT * FROM courses");

$courseName = '';
while($row = $query->fetch_assoc()){
	// echo $row['id']. '='.$dc[$n]."<br";
	for ($i=0; $i < $count; $i++) { 
		if($row['id'] == $dc[$i]){
			if ($courseName == '') {
				$courseName = "COURSE = (".$row['course_abb'];	
			}else{
				$courseName .= ", '".$row['course_abb']."' ";
			}	
		}
	}
}

if($course == ''){
	unset($_SESSION['courseArchive']);
	unset($_SESSION['courseNameArchive']);
}else{
	$_SESSION['courseArchive'] = ' AND ('.$course.')' ;
	$_SESSION['courseNameArchive'] = $courseName.") ";
}

// echo $_SESSION['courseName'];
// echo $_SESSION['course'] ;
header('location:archive.php'.$_POST['link']);
?>