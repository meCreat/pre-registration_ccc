	<?php 
	include 'global_function.php';
	$array1 = array('ID number: ', 'Surname: ','First name: ','Middle name: ','Extention: ','Prog Department: ','Course: ','Year level: ','Contact Number: ','House Number: ','Street / Purok: ','Barangay: ','City: ','Birthday: ','Birth Place: ','Gender: ','Working Student: ');
	$array2 = array('Fathers Name: ','Occupation: ','Birthday: ','Contact number: ','Mothers Name: ','Occupation: ','Birthday: ','Contact number: ','Guardians Name: ','Relationship: ','Occupation: ','Birthday: ','Guardian Contact: ','Address: ');
	$array3 = array('Intermediate: ','Year Graduated: ','School Address: ','Secondary: ','School Address: ','Section: ','GWA: ','Date Graduated: ');
	$array4 = array('Last School Attended: ','Course Taken: ','Address: ');
	$array5 = array('Last School Attended (ALS): ','Course Taken: ','Address: ');
	$ar1 = count($array1);
	$ar2 = count($array2);
	$ar3 = count($array3);
	$ar4 = count($array4);
	$ar5 = count($array5);

	function loopArray($a,$b,$c){ 
		for ($i=0; $i < $b; $i++) { 

			echo "<tr class='tr".$c.$i."'>
				<td><p>".$a[$i]."</p></td>
				<td><p style='text-transform:capitalize' class='".$c.$i."'></p></td>
				</tr>";
		}
	}
	?>
<div class="container" id="form_validate" style="display: ;">
	<div style="border: 1px solid; border-radius: 20px; padding: 10px;">
		<center>
		<h4>Pre-Registration for 2nd Semester, F.Y. 2020-2021</h4>
		</center>
		<hr style="color: black;">
			<div style="margin: 10px;">
			<p style="text-indent: 10px; ">	<?=$part['pre_reg']?></p>
			</div>
	</div>	
<center> 
	<div class="container btn-button">
		<button id="b1" type="button" class="btn btn-info">Personal info</button>
		<button id="b2" type="button" class="btn btn-primary">Parent/Guardian info</button>
		<button id="b3" type="button" class="btn btn-danger">Educational attainment</button>
	</div>
	<div id="personal_info">
		<div>
			<h3>Personal Information</h3>
		</div>
		<div>
		<table class="the_table">		
		<?php 
		
		loopArray($array1,$ar1,"p");
		?>
		</table>
		</div>
		<input class="btn btn-primary" type="button" name="edit1" value="Edit">
	</div>


	<div id="pg_info">
		<div>
			<h3>Parent and Guardian Information</h3>
		</div>
		<div>
		<table class="the_table">		
		<?php 
		loopArray($array2,$ar2,"g");
		?>
		</table>
		</div>
		<input class="btn btn-primary" type="button" name="edit2" value="Edit">
	</div>

	<div id="grad_info">

		<div>
			<div>
				<h3>School Graduated from Information</h3>
			</div>
			<div>
				<div id="ALS_grad">
				<table  class="the_table">	
					<?php 
					loopArray($array5,$ar5,"a");					
					
					?>			
				</table>
				</div>
				<div id="ALS_change">
				<table  class="the_table">	
					<?php 
					loopArray($array3,$ar3,"s");					
					
					?>			
				</table>
				<table  class="the_table table_trans">	
					<?php 
					
					loopArray($array4,$ar4,"t"); 					
					?>			
				</table>
				</div>
			</div>

		</div>
	<input class="btn btn-primary" type="button" name="edit3" value="Edit">
	</div>
</center>
<div >
		<div style="margin-top:20px; padding: 3px;">
		<center><span style="font-weight: bold; font-size:110%">Data Privacy</span></center>
		</div>
		  <div style="border: 1px solid;  padding: 10px; max-width: 800px; max-height: 200px; margin: auto; overflow: scroll; overflow-x: hidden; ">

	      <p style="text-indent: 3%;"><?=$part['data_privacy']?></p>
	    </div>
	    
	</div>
	<br>

	<div style="margin:auto; max-width: 450px;">
		
	    
	    <div style="border: 1px dashed black; padding:3px">
	    <input id="checkbox1" type="checkbox" name="data-privacy" required=""><span style="margin-left: 10px; : center;">I read and understood the Data Privacy Statement stated above.</span></div>	<br>
	    <div style="border: 1px dashed black; padding:3px">
	    <input id="checkbox2" type="checkbox" name="register" required=""><span style="margin-left: 10px;">I will enroll for 2nd Semester, F.Y. 2020-2021.</span></div>
	    <br>
	 
	    <div id="gradcan" style="border: 1px dashed black; padding:3px">
	    	<input type="checkbox" name="gradcan"><span style="margin-left: 10px;">I will apply as Candidate for Graduation.</span>
		</div>

		<br>
	    <br>
	    <input id="register" style="float:right; margin-right: 10px;" class="btn btn-success" type="submit" name="reg" value="Register">
	    

	</div>

</div>
	
</div>
