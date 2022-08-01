<?php
include "dbcon.php";
$id = $_SESSION['id_number'];


$sql = $conn->query("SELECT * FROM `grad_from` WHERE `id_number` = '$id' LIMIT 1; "); 
$trans = $conn->query("SELECT * FROM `transferee` WHERE `id_number` = '$id' LIMIT 1; ");
while($rows = $sql->fetch_assoc()){
		$id_number = $rows['id_number'];
		$ALS = $rows['ALS'];
		$intermediary = $rows['intermediary'];
		$inter_year_grad = $rows['inter_year_grad'];
		$inter_school_add = $rows['inter_school_add'];
		$secondary = $rows['secondary'];
		$sec_school_add = $rows['sec_school_add'];
		$sec = $rows['sec_section'];
		$GWA = $rows['GWA'];
		$date_grad = $rows['date_grad'];
}	
if ($trans->num_rows == 1) {
	while($rows = $trans ->fetch_assoc()){
		$last_school_att = $rows["last_school_att"];
		$course_taken = $rows['course_taken'];
		$school_add = $rows['school_add'];
	}
}

if($ALS != 1):
?>
<div id="eduAttInfo" style="display: none;">

	<div>
		<div>
			<h3>School Graduated Information</h3>
		</div>
		<div>
		<?php 
		if ($ALS == '1') {
		?>
		<div id="ALS_grad" style="border: 1px solid;  padding: 10px; max-width: 400px; max-height: 200px; margin: auto; margin-bottom: 10px;">
					<h3 style="font-weight: bold; ">ALS Graduate</h3>
					<p style="font-weight: italic; padding-buttom: 10px; color: red;"><i class="bi bi-sticky"></i> If you want to edit your Educational attainment, change your classification.</p>
				</div>
		<?php
		}else{
		?>
		<table class="the_table">		
		<tr>
			<td><p>Intermediate: </p></td>
			<td><p><?=$intermediary ?></p></td>
		</tr>
		<tr>
			<td><p>Year Graduated: </p></td>
			<td><p><?=$inter_year_grad ?></p></td>
		</tr>
		<tr>
			<td><p>School Address: </p></td>
			<td><p><?=$inter_school_add ?></p></td>
		</tr>
		<tr>
			<td><p>Secondary: </p></td>
			<td><p><?=$secondary ?></p></td>
		</tr>
		<tr>
			<td><p>School Address: </p></td>
			<td><p><?=$sec_school_add ?></p></td>
		</tr>
		<tr>
			<td><p>Section: </p></td>
			<td><p><?=$sec ?></p></td>
		</tr>
		<tr>
			<td><p>GWA: </p></td>
			<td><p><?=$GWA ?></p></td>
		</tr>
		<tr>
			<td><p>Date Graduated: </p></td>
			<td><p><?=$date_grad ?></p></td>
		</tr>
		
		<?php
		if ($trans->num_rows == 1) :
		?>

		<tr>
			<td><p>Last School Attended: </p></td>
			<td><p><?=$last_school_att ?></p></td>
		</tr>
		<tr>
			<td><p>Course Taken: </p></td>
			<td><p><?=$course_taken ?></p></td>
		</tr>
		<tr>
			<td><p>Address: </p></td>
			<td><p><?=$school_add ?></p></td>
		</tr>
		
		<?php endif;
		}
		?>
		</table>
		</div>
	</div>
	<form action="update_form3" method="POST">
	<input type="hidden" name="id_number" value="<?=$_SESSION['id_number']?>">
	<input class="btn btn-primary" type="submit" name="submit" value="Change Response">
	</form>

<?php endif;
if($ALS == 1):
 ?>
 <div id="eduAttInfo" style="display: none;">
	 <div>
		<h3>School Graduated Information (ALS)</h3>
	</div>
 	<table class="the_table">		
		<tr>
			<td><p>Intermediate: </p></td>
			<td><p><?=$intermediary ?></p></td>
		</tr>
		<tr>
			<td><p>Year Graduated: </p></td>
			<td><p><?=$inter_year_grad ?></p></td>
		</tr>
		<tr>
			<td><p>School Address: </p></td>
			<td><p><?=$inter_school_add ?></p></td>
		</tr>
	</table>
 	<form action="update_form3" method="POST">
	<input type="hidden" name="id_number" value="<?=$_SESSION['id_number']?>">
	<input class="btn btn-primary" type="submit" name="change_als" value="Edit">
	</form>

<?php endif; ?>
	
</div>


