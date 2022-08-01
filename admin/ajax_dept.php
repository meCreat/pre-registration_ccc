<?php
include 'dbcon.php';

$query = "SELECT * FROM courses WHERE dept_id = '".$conn->real_escape_string($_POST['ID'])."'";
$result = mysqli_query($conn,$query);
echo "<option value='All'>All Course</option>";
while ($rows = mysqli_fetch_array($result)) {
	echo "<option value='".$rows['id']."'>".$rows['course_abb']."</option>";
}

?>