<?php
include 'dbcon.php';
include 'header.php';
include 'nav.php';
session_start();

if (isset($_POST['submit'])) {
	$res = $conn->query("SELECT `student_info`.`id`, `student_info`.`id_number`, `student_info`.`surname`, `student_info`.`firstname`, `student_data`.`year_lvl`, `courses`.`course_name`, `program_dept`.`department_name` , `student_data`.`status` ,`student_info`.`midname`, `student_info`.`ext`, `student_info`.`contact_number`, `student_info`.`st_purok`,`student_info`.`house_num`, `student_info`.`brgy`, `student_info`.`city`, `student_info`.`birthday`, `student_info`.`place_of_birth`, `student_info`.`gender`, `student_info`.`working` FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id WHERE `student_info`.`id_number` = '".$_POST['id_number']."'; ");

		$rows=$res->fetch_assoc();
			       $id_number = $rows['id_number'];
             $surname = $rows['surname']; 
             $firstname = $rows['firstname'];
             $midname = $rows['midname'];
             $ext = $rows['ext'];
             $year_lvl = $rows['year_lvl'];
             $course = $rows['course_name'];
             $dept = $rows['department_name'];
             $contact = $rows['contact_number'];
             $house_num = $rows['house_num'];
             $st_purok = $rows['st_purok'];
             $brgy = $rows['brgy'];
             $city = $rows['city'];

             $bday = strtotime($rows['birthday']);
             $birthplace = $rows['place_of_birth'];
             $gender = $rows['gender'];	
             $working = $rows['working'];

    $sql = $conn->query("SELECT * FROM student_data WHERE id_number = '$id_number'");
    $val = $sql->fetch_assoc();
    $course_val = $val['course'];
    $dept_val = $val['program_dept'];

}else{
	header("location:index.php");
}
// echo $city;
$c1 = "";
$c2 = "";
if($city == "Calamba"){
  $c1 = "checked='checked'";
  // echo 123;
}
if($city != "Calamba"){
  $c2 = "checked='checked'";
  // echo 321;
}
// echo $course;
if(isset($_POST['submit'])){
// echo $_POST['id_number'];
}
?>


    <script type="text/javascript">
      var add = '';
      $(document).ready(function(){
       var add =  $('.add:checked').val();
        var id = $('#id_number').val();
        // console.log(id);
        // console.log(add);
        var qwe = $('#dept').val();
        if(qwe){
          $.ajax({
            url:"action",
            method:"POST",
            data:{ID:qwe},
            success:function(data){
              $("#course").append(data);

            }
          });
        }


        $('#dept').on("change",function(){
          var deptId = $(this).val();
          if(deptId){
          $.ajax({
            url:"action",
            method:"POST",
            data:{ID:deptId},
            success:function(data){
              $("#course").html(data);

            }
          });
      }else{
        $("#course").html('<option>Select Department</option>');
      }
        });

      $('#c').on("click",function(){
         $("#C").load("form1_1");
      
       });
      $('#nc').on("click",function(){          
         $("#C").load("form1_2");
      
      });


      if($('#c').is("input:checked")){
         $.ajax({
            url:"form1_1",
            method:"POST",
            data:{ID:id,add:add},
            success:function(data){
              $("#C").html(data);

            }
          });
      
       };
      if($('#nc').is("input:checked")){
         $.ajax({
            url:"form1_2",
            method:"POST",
            data:{ID:id,add:add},            
            success:function(data){
              $("#C").html(data);

            }
          });
      };
      
        });

    
      
    </script>


<div class="container">
  <h2>CCC Registration form</h2>
  <p>Complete the form to be officially registered.</p>
</div>

<div style="" class="container">


<form id="update_submit1" action="update_submit1" method="POST" class="form-group">
    <legend class="" style="font-size: 25px">Personal Information</legend>
    <div class="form-group">

    <div class="row">
     <div id="rd1" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Surname:</label>
      <input id="sname" type="text" class="form-control" name="surname" placeholder="Enter Surname" required="" title="Characters only" value="<?=$surname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorSname">Invalid Input.</span>
    </div>

    <div id="rd2" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First name:</label>
      <input id="fname" type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required="" title="Characters only" value="<?=$firstname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFname">Invalid Input.</span>
    </div>

    <div id="rd3" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle name:</label>
      <input id="mname" type="text" class="form-control" name="midname" placeholder="Enter Midname" pattern="[A-Za-z]{2,}" value="<?=$midname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errormname">Invalid Input.</span>
    </div>
    </div>

    <div id="rd4" class="form-group">
      <label for="formGroupExampleInput" >Extention:</label>
        <select name="ext" id="select" >
          <option value="<?=$ext?>" selected=""><?php if($ext == ""){ echo "none"; }?></option>
          <option value="">none</option>
          <option value="Sr">Sr. (Senior)</option>
          <option value="Jr">Jr. (Junior)</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
          <option value="V">V</option>
          <option value="VI">VI</option>
          <option value="VII">VII</option>
          <option value="VIII">VIII</option>
          <option value="IX">IX</option>
          <option value="X">X</option>
         

        </select>       
    </div>
    
    <div class="row">
    
      <div id="rd5" class="col-lg-5 col-md-5">
        <label for="formGroupExampleInput">Program Department:</label>
        <select class="form-control" required="" name='program_dept' id="dept">
          <option value="<?=$dept_val?>" selected=""><?=$dept?></option>
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

    <div id="rd6" class="form-group col-lg-5 col-md-5">
       <label for="formGroupExampleInput" >Course: </label>
        <select  class="form-control" name="course" required="" id="course" >
          <option value="<?=$course_val?>" selected=""><?=$course?></option>
          <!-- <option disabled=""><---Select Department if you want to change Course.---></option> -->
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorCourse">Select Course.</span>
    </div>


      <div id="rd7" class="form-group col-lg-2 col-md-2 ">
       <label for="formGroupExampleInput" >Year: </label>
        <select id="year_lvl" class="form-control" name="year_lvl" required="">
        <option value="<?=$year_lvl?>" selected=""><?=$year_lvl?></option>
        <option value="1">1st year</option>
        <option value="2">2nd year</option>
        <option value="3">3rd year</option>
        <option value="4">4th year</option>
        
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorY_lvl">Select Year Level.</span>
    </div>
    </div>

    <div class="row">
    <div id="rd8" class="form-group col-lg-5 col-md-5">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="con" type="text" class="form-control" name="contact_number" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41" value="<?=$contact?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorContact">Invalid Input (Must be 11 Digits number).</span>
    </div>
    </div>

    <hr>
    <div id="rd9" class="form-group">
      <label for="formGroupExampleInput">Do you live in Calamba?</label>
      <span style="padding: 5px; border-radius: 5px;" id="add_error">
        <input class="add" type="radio" name="add" value="1" required="" id="c" <?=$c1 ?>>Yes</input>
        <input class="add" type="radio" name="add" value="0" id="nc" <?=$c2 ?>>No</input></span> 
       <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorLoc">Select Location.</span>
    </div>


   <div id="C">
   </div>

   <div class="row">
    <div id="rd14" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Birthday:</label>
      <input id="bday" type="date" name="birthday" required="" value="<?php echo strftime('%Y-%m-%d',$bday);?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorBday">Invalid Input.</span>
    </div>
    
    <div id="rd15" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Place of Birth:</label>
      <input id="place_birth" type="text" class="" name="place_of_birth" placeholder="Enter Place of Birth" required="" value="<?=$birthplace?>"><span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorBplace">Invalid Input.</span>
    </div>
    </div>

    <div class="row">
    <div id="rd16" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Gender:</label>
        <span style="padding: 5px; border-radius: 5px;" id="gender_error">
        <input id="g1" type="radio" name="gender" value="Male" required="" <?php if($gender == "Male"){echo "checked='checked'";}?>>Male</input>
        <input id="g2" type="radio" name="gender" value="Female" <?php if($gender == "Female"){echo "checked='checked'";}?>>Female</input>
        </span>
        <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGender">Select Gender.</span>
    </div>

    <div id="rd17" class="form-group col-lg-6 col-md-6">
      <label for="formGroupExampleInput">Are you a working student?</label>
      <span style="padding: 5px; border-radius: 5px;" id="ws_error">
        <input id="yes" type="radio" name="working" value="yes" required="" <?php if($working == "yes"){echo "checked='checked'";}?>>Yes</input>
        <input id="no" type="radio" name="working" value="no" <?php if($working == "no"){echo "checked='checked'";}?>>No</input> 
        </span>      
        <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorWorking">Select One Choice</span>
    </div>
    </div>
    <hr style="padding-bottom: 2%;">
    <button class="btn btn-danger" type="button" onclick="history.back();">Back</button>
    <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Update">

</form>

 
</div>
</body>
</html>

<script type="text/javascript" src="./js/validateOnUpdate1.js"></script>
