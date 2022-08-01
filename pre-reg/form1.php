<?php 

$house_num = "";
$st_purok = "";
$brgy = "";
$city = "";

$name1 = '';
$name2 = '';
$name3 = '';
if (isset($_SESSION['name1']) && $_SESSION['name2']) {
  $name1 = $_SESSION['name1'];
  $name2 = $_SESSION['name2'];
  if (isset($_SESSION['name3'])) {
    $name3 = $_SESSION['name3'];
  }
  
}
?>


<div id="form1" class="container" >



    <legend class="" style="font-size: 25px">Personal Information</legend>

    <div class="row">
    <div id="rd1" class="form-group col-lg-9 col-md-9">
      <label for="formGroupExampleInput" >Classification:</label>
      <span style="padding: 5px; border-radius: 5px;" id="class_error">
        <input  id="class" type="radio" name="class" value="1" required="">Freshmen
        <input id="class1" type="radio" name="class" value="2">Transferee
        <input id="class2" type="radio" name="class" value="3">ALS
       
      </span>     
      <span style="color: red; font-weight: bold; margin-left: 10px" id="errorClass"></span>
    </div>
    <div class="form-group col-lg-3 col-md-3">
    <label>ID Number: </label>
    <input type="text" name="id_number" value="<?php echo $_SESSION['id_number']; ?>" disabled>
    </div>
    </div>
    <div class="row">
     <div id="rd2" class="form-group col-lg-4 col-md-4">
      <label  for="formGroupExampleInput">Surname:</label>
      <input id="sname" type="text" class="form-control" name="surname" placeholder="Enter Surname" required="" pattern="[A-Za-z\W+]{2,}" title="Characters only" value="<?=$name1?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorSname">Invalid Input.</span>
    </div>

    <div id="rd3" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First name:</label>
      <input id="fname" type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required="" pattern="[A-Za-z\W+]{2,}" title="Characters only" value="<?=$name2?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFname">Invalid Input.</span>
    </div>

    <div id="id4" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle name:</label>
      <input id="mname" type="text" class="form-control" name="midname" placeholder="Enter Midname" pattern="[A-Za-z\W+]{2,}" title="Characters only" value="<?=$name3?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errormname">Invalid Input.</span>
    </div>
  </div>
    <div class="form-group">
      <label for="formGroupExampleInput" >Name Extention:</label>
        <select name="ext" id="">
          <option value="" selected="">None</option>
          <option value="Sr">Sr. (Senior)</option>
          <option value="Jr">Jr. (Junior)</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
          <option value="IV">V</option>
          <option value="IV">VI</option>
          <option value="IV">VII</option>
          <option value="IV">VIII</option>
          <option value="IV">IX</option>
          <option value="IV">X</option>
         

        </select>       
    </div>
    <div class="row">
    
      <div id="rd6" class="col-lg-5 col-md-5">
      <label for="formGroupExampleInput">Program Department:</label>
        <select id="dept" class="form-control dept" required="" name='program_dept'>
          <option value="" selected disabled="">Select Department</option>
        <?php 
      include 'dbcon.php';
      $sql = $conn->query("SELECT * FROM program_dept");
      while($rows = $sql->fetch_assoc()){

        echo "<option value='".$rows['dept_id']."'>".$rows['department_name']."</option>";
      }
      ?>
        </select>  
        <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorDept">Select Department.</span>
      </div>

    <div id="rd7"  class="form-group col-lg-5 col-md-5">
       <label for="formGroupExampleInput" >Course: </label>
        <select  class="form-control" name="course" required="" id="course">
          <option value="" selected="" disabled="">Select Department First</option>

      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorCourse">Select Course.</span>
    </div>
  

      <div id="rd8"  class="form-group col-lg-2 col-md-2">
       <label for="formGroupExampleInput" >Year: </label>
        <select id="year_lvl" class="form-control" name="year_lvl" required="">
        <option value="" selected="" disabled="">Select Year Level</option>
        <option value="1">1st year</option>
        <option value="2">2nd year</option>
        <option value="3">3rd year</option>
        <option value="4">4th year</option>
        
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorY_lvl">Select Year Level.</span>
    </div>
    </div>

    <div class="row">
    <div id="rd9" class="form-group col-lg-5 col-md-5">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="con" type="text" class="form-control" name="contact_number" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorContact">Invalid Input (Must be 11 Digits number).</span>
    </div>


    </div>
    <hr>
    <div id="rd10" class="form-group">
      <label for="formGroupExampleInput">Do you live in Calamba?</label>
      <span style="padding: 5px; border-radius: 5px;" id="add_error">

        <input type="radio" required="" name="add" id="c" >Yes
        <input type="radio" value="0" name="add" id="nc" >No
      </span> 
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorLoc">Select Location.</span>
    </div>

 
   <div id="C"></div>

  
    <div class="row">
    <div id="rd15" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Birthday:</label>
      <input id="bday" type="date" name="birthday" required="" class="form-control">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorBday">Invalid Input.</span>
    </div>
    
    <div id="rd16" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Place of Birth:</label>
      <input id="place_birth" type="text" class="form-control" name="place_of_birth" placeholder="Enter Place of Birth" required="">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorBplace">Invalid Input.</span>

    </div>
    </div>

    <div class="row">
     <div id="rd17" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Gender:</label>
      <span style="padding: 5px; border-radius: 5px;" id="gender_error">
        <input id="g1" type="radio" name="gender" value="Male" required="">Male
        <input id="g2" type="radio" name="gender" value="Female">Female
       
      </span> 
       <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGender">Select Gender.</span>
    </div>

    <div id="rd18" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Are you a working student?</label>
      <span style="padding: 5px; border-radius: 5px;" id="ws_error">
        <input id="yes" type="radio" name="working" value="yes" required="">Yes
        <input id="no" type="radio" name="working" value="no">No
        
      </span> 
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorWorking">Select One Choice</span>

    </div>
    </div>

    <hr style="padding-bottom: 2%;">
    <button class="btn btn-primary" type="button" href="#top" id="next1" >Next</button>
 
</div>
<script src="./js/form1.js" type="text/javascript"></script>

