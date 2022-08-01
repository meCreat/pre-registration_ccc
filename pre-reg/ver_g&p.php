<?php
include "dbcon.php";
$id = $_SESSION['id_number'];
// $id = "2015-00663";

$sql = $conn->query("SELECT * FROM `g/p_info` WHERE `id_number` = '$id' LIMIT 1; ");
while($rows = $sql->fetch_assoc()){

		$id_number = $rows['id_number'];	
		$father_name  = $rows['f_sname'].", ".$rows['f_fname']." ".$rows['f_mname'];
		$father_occupation = $rows['father_occupation'];
		$father_birthday = strtotime($rows['father_birthday']);
		$father_contact = $rows['father_contact'];
		$mother_name =  $rows['m_sname'].", ".$rows['m_fname']." ".$rows['m_mname'];
		$mother_occupation = $rows['mother_occupation'];
		$mother_birthday = strtotime($rows['mother_birthday']);
		$mother_contact = $rows['mother_contact'];
		$guardian_name = $rows['g_sname'].", ".$rows['g_fname']." ".$rows['g_mname'];
		$guardian_occupation = $rows['guardian_occupation'];
		$guardian_birthday = strtotime($rows['guardian_birthday']);
		$guardian_contact = $rows['guardian_contact'];
		$guardian_add = $rows['guardian_add'];
		$g_relationship = $rows['g_relationship'];
		
}	

?>
<div id="gpInfo" style="display: none">
	<div>
		<div>
			<h3>Parent and Guardian Information</h3>
		</div>
		<div>
		<table class="the_table">
			
		<tr>
			<td><p>Fathers Name: </p></td>
			<td><p><?php echo $father_name; ?></p></td>
		</tr>
		<tr>
			<td><p>Occupation: </p></td>
			<td><p><?=$father_occupation ?></p></td>
		</tr>
		<tr>
			<td><p>Birthday: </p></td>
			<td><p><?php echo date("M-d-Y",$father_birthday); ?></p></td>
		</tr>
		<tr>
			<td><p>Contact number: </p></td>
			<td><p><?=$father_contact ?></p></td>
		</tr>
		<tr>
			<td><p>Mothers Name: </p></td>
			<td><p><?=$mother_name ?></p></td>
		</tr>
		<tr>
			<td><p>Occupation: </p></td>
			<td><p><?=$mother_occupation ?></p></td>
		</tr>
		<tr>
			<td><p>Birthday: </p></td>
			<td><p><?php echo date("M-d-Y",$mother_birthday); ?></p></td>
		</tr>
		<tr>
			<td><p>Contact number: </p></td>
			<td><p><?=$mother_contact ?></p></td>
		</tr>
		<tr>
			<td><p>Guardians Name: </p></td>
			<td><p><?=$guardian_name ?></p></td>
		</tr>	
		<tr>
			<td><p>Relationship: </p></td>
			<td><p><?=$g_relationship ?></p></td>
		</tr>

		<tr>
			<td><p>Occupation: </p></td>
			<td><p><?=$guardian_occupation ?></p></td>
		</tr>	
		<tr>
			<td><p>Birthday: </p></td>
			<td><p><?php echo date("M-d-Y",$guardian_birthday);?></p></td>
		</tr>	
		<tr>
			<td><p>Guardian Contact: </p></td>
			<td><p><?=$guardian_contact ?></p></td>
		</tr>		
		<tr>
			<td><p>Address: </p></td>
			<td><p><?=$guardian_add; ?></p></td>
		</tr>
		
		
		</table>
		</div>
	</div>
	<form action="update_form2" method="POST">
	<input type="hidden" name="id_number" value="<?=$_SESSION['id_number']?>">
	<input class="btn btn-primary" type="submit" name="edit2" value="Edit Response">
	</form>
</div>