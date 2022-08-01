<?php

include "dbcon.php";
// $_SESSION['id_number'] = '2012-20200';
$id = $_SESSION['id_number'];
// $id = "2015-00663";

$sql = $conn->query("SELECT `student_info`.`id`, `student_info`.`id_number`, `student_info`.`surname`, `student_info`.`firstname`, `student_data`.`year_lvl`, `courses`.`course_name` AS course, `program_dept`.department_name AS program_dept, `student_data`.`status` ,`student_info`.`midname`, `student_info`.`ext`, `student_info`.`contact_number`, `student_info`.`house_num`, `student_info`.`st_purok`, `student_info`.`brgy`, `student_info`.`city`, `student_info`.`birthday`, `student_info`.`place_of_birth`, `student_info`.`gender`,`student_info`.working FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id WHERE `student_info`.`id_number` = '$id'; ");
while($rows = $sql->fetch_assoc()){
		$id_number = $rows['id_number'];
		$surname = $rows['surname'];
		$firstname = $rows['firstname'];
		$midname = $rows['midname'];
		$ext = $rows['ext'];
		$contact_number = $rows['contact_number'];
		$house_num = $rows['house_num'];
		$st_purok = $rows['st_purok'];
		$brgy = $rows['brgy'];
		$city = $rows['city'];
		$birthday = strtotime($rows['birthday']);
		$place_of_birth = $rows['place_of_birth'];
		$gender = $rows['gender'];
		$course = $rows['course'];
		$program_dept = $rows['program_dept'];
		$year_lvl = $rows['year_lvl'];
		$working = $rows['working'];
}	

?>
<div id="perInfo">

	<div>
		<div>
			<h3>Personal Information</h3>
		</div>
		<div>
		<table class="the_table">		
		<tr>
			<td><p>ID number: </p></td>
			<td><p id="id_number"><?=$id_number ?></p></td>
		</tr>
		<tr>
			<td><p>Surname: </p></td>
			<td><p><?=$surname ?></p></td>
		</tr>
		<tr>
			<td><p>First name: </p></td>
			<td><p><?=$firstname ?></p></td>
		</tr>
		<tr>
			<td><p>Middle name: </p></td>
			<td><p><?=$midname ?></p></td>
		</tr>
		<tr>
			<td><p>Extention: </p></td>
			<td><p><?php if($ext == ""){ echo"none"; }else{ echo $ext; } ?></p></td>
		</tr>
		<tr>
			<td><p>Prog Department: </p></td>
			<td><p><?=$program_dept ?></p></td>
		</tr>
		<tr>
			<td><p>Course: </p></td>
			<td><p><?=$course ?></p></td>
		</tr>
		<tr>
			<td><p>Year level: </p></td>
			<td>
		        <select id="update_yr" class="form-control" name="year_lvl" required="">
		        <option id='change_yr' value="<?=$year_lvl?>" selected=""><?=$year_lvl?></option>
		        <option value="1">1st year</option>
		        <option value="2">2nd year</option>
		        <option value="3">3rd year</option>
		        <option value="4">4th year</option>
		   		</select>
    		</td>
		</tr>

		<script type="text/javascript">
		$(document).ready(function(){
			$('#update_yr').on('change',function(){
				val = $('#update_yr').val();
				id = $('#id_number').text();
				console.log(val)
				$.ajax({
				url:"update_yr",
			    method:"POST",
			    data:{yr:val,id:id},
			    success:function(data){
			    	$("#change_yr").html(data);
	      		}
	      		})		

	      		
			})

			
		})
		</script>


		<tr>
			<td><p>Contact Number: </p></td>
			<td><p><?=$contact_number ?></p></td>
		</tr>	
		<tr>
			<td><p>House Number: </p></td>
			<td><p><?=$house_num ?></p></td>
		</tr>	
		<tr>
			<td><p>Street / Purok: </p></td>
			<td><p><?=$st_purok ?></p></td>
		</tr>	
		<tr>
			<td><p>Barangay: </p></td>
			<td><p><?=$brgy ?></p></td>
		</tr>	
		<tr>
			<td><p>City: </p></td>
			<td><p><?=$city ?></p></td>
		</tr>		
		<tr>
			<td><p>Birthday: </p></td>
			<td><p><?php echo date("M-d-Y",$birthday); ?></p></td>
		</tr>
		<tr>
			<td><p>Birth Place: </p></td>
			<td><p><?=$place_of_birth ?></p></td>
		</tr>
		<tr>
			<td><p>Gender: </p></td>
			<td><p><?=$gender ?></p></td>
		</tr>
		<tr>
			<td><p>Working Student: </p></td>
			<td><span><?=$working ?></span></td>
		</tr>
		</table>
		</div>
	</div>
	<form action="update_form1" method="POST">
	<input type="hidden" name="id_number" value="<?=$_SESSION['id_number']?>">
	<input class="btn btn-primary" type="submit" name="submit" value="Edit Response">
	</form>
</div>