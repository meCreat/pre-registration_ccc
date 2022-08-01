<?php
include 'dbcon.php';

$query = "SELECT * FROM courses WHERE dept_id = '".$_POST['ID']."'";
$result = mysqli_query($conn,$query);
while ($rows = mysqli_fetch_array($result)) {
	echo "<option value='".$rows['id']."'>".$rows['course_name']."</option>";
}

?>
