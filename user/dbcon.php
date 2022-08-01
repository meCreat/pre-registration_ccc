<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "ccc_pre-reg";

// $url = "http://localhost/PaymentSystem/";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
   $conn_status = "Connection failed: " . $conn->connect_error;
}
else{
	$conn_status = "Connected!";
}


?>