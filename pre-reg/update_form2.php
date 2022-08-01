<?php
include 'dbcon.php';
include 'header.php';
include 'nav.php';
session_start();

if ($_POST['edit2']) {
  $id_number = $_POST['id_number'];
	$res = $conn->query("SELECT * FROM `g/p_info` WHERE id_number = '".$id_number."'");

		$rows=$res->fetch_assoc();

			      $f_sname =  $rows['f_sname'];
            $f_fname =  $rows['f_fname'];
            $f_mname =  $rows['f_mname'];
            $father_occupation = $rows['father_occupation'];
            $father_birthday = strtotime($rows['father_birthday']);
            $father_contact = $rows['father_contact'];
            $m_sname =  $rows['m_sname'];
            $m_fname =  $rows['m_fname'];
            $m_mname =  $rows['m_mname'];
            $mother_occupation = $rows['mother_occupation'];
            $mother_birthday = strtotime($rows['mother_birthday']);
            $mother_contact = $rows['mother_contact'];
            $g_sname =  $rows['g_sname'];
            $g_fname =  $rows['g_fname'];
            $g_mname =  $rows['g_mname'];           
            $guardian_occupation = $rows['guardian_occupation'];
            $guardian_birthday = strtotime($rows['guardian_birthday']);
            $guardian_contact = $rows['guardian_contact'];
            $guardian_add = $rows['guardian_add'];
            $g_rel = $rows['g_relationship'];

}else{
	header("location:index.php");
}
?>

<div class="container">
  <h2>CCC Registration form</h2>
  <p>Complete the form to be officially registered.</p>
</div>

<div style="" class="container">


<form id="form_s" action="update_submit2" method="POST" class="form-group">
    <legend class="" style="font-size: 25px">Guardian/Parent Information</legend>

    <h3>Fathers Information</h3>

     <div class="row">
     <div id="gd1" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">SurName:</label>
      <input id="f_sname" type="text" class="form-control" name="f_sname" placeholder="Surname" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$f_sname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFsname">Invalid Input.</span>
    </div>

    
     <div id="gd2" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First Name:</label>
      <input id="f_fname" type="text" class="form-control" name="f_fname" placeholder="First Name" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$f_fname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFfname">Invalid Input.</span>
    </div>

    
     <div id="gd3" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle Name:</label>
      <input id="f_mname" type="text" class="form-control" name="f_mname" placeholder="Middle Name" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$f_mname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFmname">Invalid Input.</span>
    </div>
    </div>

    <div class="row">
    <div id="gd4" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Occupation</label>
      <select id="f_occ" class="form-control" name="father_occupation"  required="">
      <option selected="" value="<?=$father_occupation?>"><?=$father_occupation?></option>
      <option value="Government employee(permanent)">Government employee(permanent)</option>
      <option value="Government employee(contratual)">Government employee(contratual)</option>
      <option value="Private Company employee (permanent)">Private Company employee (permanent)</option>
      <option value="Private Company employee (contractual)">Private Company employee (contractual)</option>
      <option value="Self employed">Self employed</option>
      <option value="Unemployed">Unemployed</option>
      <option value="Deceased">Deceased</option>
    </select>
    <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFocc">Select Fathers Occupation.</span>
    </div>

    <div id="gd5" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Birthday:</label>
      <input id="f_bday" type="date" name="father_birthday" required="" value="<?php echo strftime('%Y-%m-%d',$father_birthday);?>" class='form-control'>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFbday">Invalid Input.</span>
    </div>

     <div id="gd6" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="f_con" type="text" class="form-control" name="father_contact" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41" value="<?=$father_contact?>">
      <span id="error_con" class="error"></span><p></p>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFcon">Invalid Input.</span>
    </div>
    </div>

    <hr style="padding-bottom: 2%;">
    <h3>Mothers Information</h3>
    <div class="row">
    <div id="gd7" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Surname:</label>
      <input id="m_sname" type="text" class="form-control" name="m_sname" placeholder="Surname" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$m_sname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMsname">Invalid Input.</span>
    </div>

     <div id="gd8" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First Name:</label>
      <input id="m_fname" type="text" class="form-control" name="m_fname" placeholder="First Name" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$m_fname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMfname">Invalid Input.</span>
    </div>

     <div id="gd9" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle Name:</label>
      <input id="m_mname" type="text" class="form-control" name="m_mname" placeholder="Middle Name" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$m_mname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMmname">Invalid Input.</span>
    </div>
    </div>

    <div class="row">
    <div id="gd10" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Occupation</label>
      <select id="m_occ" class="form-control" name="mother_occupation"  required="">
      <option selected="" value="<?=$mother_occupation?>"><?=$mother_occupation?></option>
      <option value="Government employee(permanent)">Government employee(permanent)</option>
      <option value="Government employee(contratual)">Government employee(contratual)</option>
      <option value="Private Company employee (permanent)">Private Company employee (permanent)</option>
      <option value="Private Company employee (contractual)">Private Company employee (contractual)</option>
      <option value="Self employed">Self employed</option>
      <option value="Unemployed">Unemployed</option>
      <option value="Deceased">Deceased</option>
    </select><span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMocc">Select Mother Occupation.</span>
    </div>

    <div id="gd11" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Birthday:</label>
      <input id="m_bday" type="date" name="mother_birthday" required="" value="<?php echo strftime('%Y-%m-%d',$mother_birthday);?>"><span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMbday">Invalid Input.</span>
    </div>

     <div id="gd12" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="m_con" type="text" class="form-control" name="mother_contact" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41" value="<?=$father_contact?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMcon">Invalid Input.</span> 
    </div>
  </div>

    <hr style="padding-bottom: 2%;">
    <h3>Guardians Information</h3>
    <div class="row">
    <div id="gd13" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">SurName:</label>
      <input id="g_sname" type="text" class="form-control" name="g_sname" placeholder="Surname" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$g_sname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGsname">Invalid Input.</span>  
    </div>

     <div id="gd14" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First Name:</label>
      <input id="g_fname" type="text" class="form-control" name="g_fname" placeholder="First Name" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$g_fname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGfname">Invalid Input.</span> 
    </div>

     <div id="gd15" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle Name:</label>
      <input id="g_mname" type="text" class="form-control" name="g_mname" placeholder="First Name" pattern="[A-Za-z\W+]{1,}" title="Characters only" value="<?=$g_fname?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGmname">Invalid Input.</span>   
    </div>
    </div>

    <div class="row">
    <div id="gd16 rel" class="form-group">
      <label for="formGroupExampleInput">Relationship with the Student:</label>
      <select id="g_rel" name="g_rel" required>
        <option value="<?=$g_rel?>" selected='selected' readonly='readonly'><?=$g_rel?></option>
        <option value="Father">Father</option>   
        <option value="Mother">Mother</option>
        <option value="Spouse">Spouse</option>
        <option value="Siblings">Siblings</option>
        <option value="2nd Degree Relative">2nd Degree Relative</option>
        <option id="rel_orher">Other</option>
      </select><span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGrel">Select Relationship.</span> 

    </div>

    <div id="gd17" class="form-group">
      <label for="formGroupExampleInput">Occupation</label>
      <select id="g_occ" class="form-control" name="guardian_occupation"  required="">
      <option selected="" value="<?=$guardian_occupation?>"><?=$guardian_occupation?></option>
      <option value="Government employee(permanent)">Government employee(permanent)</option>
      <option value="Government employee(contratual)">Government employee(contratual)</option>
      <option value="Private Company employee (permanent)">Private Company employee (permanent)</option>
      <option value="Private Company employee (contractual)">Private Company employee (contractual)</option>
      <option value="Self employed">Self employed</option>
      <option value="Unemployed">Unemployed</option>
      <option value="Deceased">Deceased</option>
    </select><span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGocc">Invalid Input.</span> 
    </div>

    <div id="gd18" class="form-group">
      <label for="formGroupExampleInput">Birthday:</label>
      <input id="g_bday" type="date" name="guardian_birthday" required="" value="<?php echo strftime('%Y-%m-%d',$guardian_birthday);?>"><span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGbday">Invalid Input.</span>
    </div>

     <div id="gd19" class="form-group">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="g_con" type="text" class="form-control" name="guardian_contact" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41" value="<?=$guardian_contact?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGcon">Invalid Input.</span> 
    </div>

    <div id="gd20" class="form-group">
      <label for="formGroupExampleInput">Address:</label>
      <input id="g_add" type="text" class="form-control" name="guardian_add" placeholder="Enter Home Address" required="" pattern="[A-Za-z0-9\W+]{9,}" title="Home Address" value="<?=$guardian_add?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGadd">Invalid Input.</span> 
    </div>

    <hr style="padding-bottom: 2%;">
  <button type="button" class="btn btn-danger" onclick="history.back();">Back</button>
  <input class="btn btn-primary" type="submit" value="Update" name="submit">
  
</div>
</form>
</body>
</html>

<script type="text/javascript" src="./js/validateOnUpdate2.js"></script>
