<?php
include 'dbcon.php';
include 'header.php';
include 'nav.php';
session_start();
$trans = 0; 
$id_number = $_SESSION['id_number'];
if (isset($_POST['submit'])) {
  $query = "SELECT * FROM `grad_from` WHERE `id_number` = '$id_number'";
	$view = $conn->query($query);
  
      if ($view->num_rows == 0) {
      	$msg = "None";
      	$msg_style = "style='color: white ; text-align: center; background-color: #ff0000; padding: 8px;'";
      }else{
  			  while($rows = $view->fetch_assoc()){
          $als = $rows['ALS'];
  			 	$intermediary = $rows['intermediary'];
  			 	$inter_year_grad = $rows['inter_year_grad'];
  			 	$inter_school_add = $rows['inter_school_add'];
          
    			 	$secondary = $rows['secondary'];		 	 
    			 	$sec_school_add = $rows['sec_school_add'];
    			 	$sec_section = $rows['sec_section'];
    			 	$GWA = $rows['GWA'];
    			 	$date_grad = $rows['date_grad'];

            $date_grad=explode(" ", $date_grad);
            $string_1 = $date_grad[0];
            $string_2 = $date_grad[1];
         
  			 }
  		}

  			 $view4 = $conn->query("SELECT * FROM `transferee` WHERE `id_number` = '".$id_number."'");
  			 if ($view4->num_rows == 1) {
  			 	while($rows = $view4->fetch_assoc()){
  			 	$last_school_att = $rows['last_school_att'];
  			 	$course_taken = $rows['course_taken'];
  			 	$school_add = $rows['school_add'];
  			 }
  			 }else{
  			 	$trans = 1;
  			 }
}else if(isset($_POST['change_als'])) {
  $query = "SELECT * FROM `grad_from` WHERE `id_number` = '$id_number'";
  $view = $conn->query($query);

  while($rows = $view->fetch_assoc()){
  $als = $rows['ALS'];
  $intermediary = $rows['intermediary'];
  $inter_year_grad = $rows['inter_year_grad'];
  $inter_school_add = $rows['inter_school_add'];
  }
}

?>

<div class="container">
  <h2>CCC Registration form</h2>
  <p>Complete the form to be officially registered.</p>
</div>

<div style="" class="container">


<form name="ff" id="haf" action="update_submit3" method="POST" class="form-group">
    <legend class="" style="font-size: 25px">School Graduated Information<?php if($als == 1){ echo '(ALS)'; } ?>:</legend>

    <?php if ($als == 1) {?>
    <div id="sg1" class="form-group">
      <label for="formGroupExampleInput">School Name:</label>
      <input id="als" type="text" class="form-control" name="intermediary" placeholder="Enter Intermediary School" required="" value="<?=$intermediary?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorals">Invalid Input.</span>
    </div>

    <div id="sg2" class="form-group">
      <label for="formGroupExampleInput">Year Graduated: </label>   
        <select id="als_ygrad" name="inter_year_grad" >
        <option selected="" value="<?=$inter_year_grad?>"><?=$inter_year_grad?></option>
        <?php
        $now = date('Y');
        $past = 1900;
        for($year=$now; $year>= $past; $year--){
        echo '<option value="'.$year.'">'.$year.'</option>';
        }
        ?>
        
      </select><span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorals_ygrad">Invalid Input.</span>
    </div>

    <div id="sg3" class="form-group">
      <label for="formGroupExampleInput"> School Address:</label>
      <input id="als_add" type="text" class="form-control" name="inter_school_add" placeholder="Enter School Address" required="" value="<?=$inter_school_add ?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorals_add">Invalid Input.</span>
    </div>
    <hr style="padding-bottom: 2%;">
    <button class="btn btn-danger" type="button" onclick="history.back();">Back</button>
    <input id="submit_ALS" class="btn btn-primary" type="submit" value="Update" name="submitALS" >
    <?php }else{ ?>
    <h4>Intermediate School</h4>


     <div id="sg1" class="form-group">
      <label for="formGroupExampleInput">School Name:</label>
      <input id="1st" type="text" class="form-control" name="intermediary" placeholder="Enter Intermediary School" required="" value="<?=$intermediary?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error1st">Invalid Input.</span>
    </div>

    <div id="sg2" class="form-group">
      <label for="formGroupExampleInput">Year Graduated: </label>   
        <select id="1st_ygrad" name="inter_year_grad" >
        <option selected="" value="<?=$inter_year_grad?>"><?=$inter_year_grad?></option>
        <?php
        $now = date('Y');
        $past = 1900;
        for($year=$now; $year>= $past; $year--){
        echo '<option value="'.$year.'">'.$year.'</option>';
        }
        ?>
        
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error1st_ygrad">Invalid Input.</span>
    </div>

    <div id="sg3" class="form-group">
      <label for="formGroupExampleInput"> School Address:</label>
      <input id="1st_add" type="text" class="form-control" name="inter_school_add" placeholder="Enter School Address" required="" value="<?=$inter_school_add ?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error1st_add">Invalid Input.</span>
    </div>
    <hr style="padding-bottom: 2%;">


    <h4>Secondary School</h4>
     <div id="sg4" class="form-group">
      <label for="formGroupExampleInput">School Name:</label>
      <input id="2nd" type="text" class="form-control" name="secondary" placeholder="Enter Secondary School" required="" value="<?=$secondary?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd">Invalid Input.</span>
    </div>


    <div id="sg5" class="form-group">
      <label for="formGroupExampleInput"> School Address:</label>
      <input id="2nd_add" type="text" class="form-control" name="sec_school_add" placeholder="Enter School Address" required="" value="<?=$sec_school_add?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_school_add">Invalid Input.</span>
    </div>

   
    <div id="sg6" class="form-group">
      <label for="formGroupExampleInput">Section:</label>
      <input id="2nd_section" type="text" class="form-control" name="sec_section" placeholder="Enter School Section" required="" value="<?=$sec_section?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_sec">Invalid Input.</span>
    </div>
 

    <div id="sg7" class="form-group">
      <label for="formGroupExampleInput">GWA:</label>
      <input id="2nd_gwa" type="text" class="form-control" name="GWA" placeholder="Enter GWA" required="" value="<?=$GWA?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_gwa">Invalid Input.</span>
    </div>

    <div id="sg"  class="form-group">
      <label for="formGroupExampleInput">Date of Graduation :</label>
  
      <select id="2nd_mon" name="mon" required="" >
        <option selected="" value="<?=$string_1?>" ><?=$string_1 ?></option>
        <option value="January">January</option>
        <option value="Febuary">Febuary</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>            
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_mon">Select Month.</span>
      <select id="2nd_year" class="" name="year" required="">
        <option selected=""  value="<?=$string_2?>"><?=$string_2?></option>
        <?php
        $now = date('Y');
        $past = 1900;
        for($year=$now; $year>= $past; $year--){
        echo '<option value="'.$year.'">'.$year.'</option>';
        }
        ?>
        
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_yr">Select Year.</span>
    </div>
      
    <input type="hidden" name="appear" value="<?php if($trans == 0){ echo "1"; }?>">
    <?php 
    if ($trans == 0) {
      echo "<input type='hidden' name='trans' value='".$id_number."'>";
      ?>

      <hr style="padding-bottom: 2%;">

    <div id="forTrans">
    <h4>For Transferee</h4>
    <div class="form-group">
      <label for="formGroupExampleInput">Last School Attended:</label>
      <input id="last_att" type="text" class="form-control" name="last_school_att" placeholder="School Name" required="" value="<?=$last_school_att?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorLastschool">Invalid Input.</span>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput">Course Taken (DO NOT ABBREVIATE):</label>
      <input id="last_course" type="text" name="course_taken" class="form-control" placeholder="Course Taken" required="" value="<?=$course_taken?>">
    <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorLastcourse">Invalid Input.</span>
    </div>
    
    <div class="form-group">
      <label for="formGroupExampleInput">School Address:</label>
      <input id="last_add" type="text" name="school_add" class="form-control" placeholder="School Address" required="" value="<?=$school_add?>">
     <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorLastadd">Invalid Input.</span>
   </div>
    </div>
    
    <?php } ?>
    <button class="btn btn-danger" type="button" onclick="history.back();">Back</button>
    <input class="btn btn-primary" type="submit" value="Update" name="submit" >
    <?php
     }
    ?>

    
    
</div>

  

</form>
</div>
</body>
</html>

<script type="text/javascript" src="./js/validateOnUpdate3.js"></script>