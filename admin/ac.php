<?php 
include "dbcon.php";

if(isset($_POST['id1'])){
$id = $_POST['id1'];
echo $id; 
}

if(isset($_POST['id2'])){
$id = $_POST['id2'];

echo $id;
}


?>