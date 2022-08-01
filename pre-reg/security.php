<?php 
session_start();

if (!isset($_SESSION['key'])) {
    header('location:index.php');
}

if($_SESSION['switch'] == 'off'){
	header('location:reg_notAvailable.php');
}

// To generate ID number
// echo $_SESSION['key'];
// echo $_SESSION['id_number'];

?>