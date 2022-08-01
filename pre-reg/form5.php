<?php 
include 'security.php';
include 'header.php';
include 'nav.php';

?>


<!-- Form5 is for updating your data after inputing a data -->
<div style="" class="container">
	<div style="border: 1px solid; border-radius: 20px; padding: 10px;">
		<center>
		<h4>Pre-Registration for 2nd Semester, F.Y. 2020-2021</h4>
		</center>
		<hr style="color: black;">
			<div style="margin: 10px;">
			<p style="text-indent: 10px; "> <?=$part['pre_reg']?></p>
			</div>
		
	</div>

<center>
	<div class="container">
		<div class="btn-button">
		<button type="button" class="btn btn-info btn-button" id="info1">Personal info</button>
		<button type="button" class="btn btn-primary btn-button" id="info2">Parent/Guardian info</button>
		<button type="button" class="btn btn-danger btn-button" id="info3">Educational attainment</button>
		</div>
		<div>
		<center><p style="color:green"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); }else{ echo "";}?></p></center>
		<div>
		<?php
			// code...
			include "ver_perinfo.php";
			include "ver_g&p.php";
			include "ver_eduatt.php";
		 ?>
		</div>
		 </div>
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
		
	    <form action="form_finish" method="POST">
	    <div style="border: 1px dashed black; padding:3px">
	    <input type="checkbox" name="data-privacy" required=""><span style="margin-left: 10px; : center;">I read and understood the Data Privacy Statement stated above.</span></div>	<br>
	    <div style="border: 1px dashed black; padding:3px">
	    <input type="checkbox" name="register" required=""><span style="margin-left: 10px;">I will enroll for 2nd Semester, F.Y. 2020-2021.</span></div>
	    <br>
	    
	    <div id="gradcan" style="border: 1px dashed black; padding:3px; display: none;">
	    <input type="checkbox" name="gradcan"><span style="margin-left: 10px;">I will apply as Candidate for Graduation.</span></div>
	
		<br>
	    <br>
	    <input style="float:right; margin-right: 10px;" class="btn btn-success" type="submit" name="reg" value="Register">
	    
	    </form>

	</div>

</div>

</body>

<script type="text/javascript" src="./js/form_update.js"></script>