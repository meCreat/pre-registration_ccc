<?php
    session_start();
    include 'dbcon.php';
    $result = $conn->query("SELECT * FROM student_info WHERE id_number = '".$_SESSION['id_number']."'");
    $row = $result->fetch_array();

    if($result->num_rows == 1){
      include 'dbcon.php';
      
      $house_num = $row[7];
      $st_purok = $row[8];
      $brgy = $row[9];
      $city = $row[10];
    }else{
      $house_num = "";
      $st_purok = "";
      $brgy = "";
      $city = "";
    }
?>
    <hr>
    <div>
      <h3>Home Address</h3>
    </div>
  <div class="row">
    <div id="rd11" class="form-group col-lg-3 col-md-6">
      <label for="formGroupExampleInput">House Number:</label>
      <input id="house_num" type="text" class="form-control" name="house_num" placeholder="Enter House Number" required="" value="<?=$house_num?>" >
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorHouseNum">Invalid Input.</span>
    </div>

    <div id="rd12" class="form-group col-lg-4 col-md-6">
      <label for="formGroupExampleInput">Street Name/Purok:</label>
      <input id="street_purok" type="text" class="form-control" name="st_purok" placeholder="Enter Street Name/Purok" required="" value="<?=$st_purok?>" >
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorPurok">Invalid Input.</span>
    </div>

    <div id="rd13" class="form-group col-lg-3 col-md-6">
      <label for="formGroupExampleInput">Baranggay:</label>
      <input id="brgy" type="text" class="form-control" name="brgy" placeholder="Enter Barnggay" required="" value="<?=$brgy?>" >
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorBrgy">Invalid Input.</span>
    </div>

    <div id="rd14" class="form-group col-lg-2 col-md-6">
      <label for="formGroupExampleInput">City:</label>
      <input id="city" type="text" class="form-control" name="city" placeholder="Enter City" required="" value="<?=$city?>">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorCity">Invalid Input.</span>
    </div>
  </div>
    <hr>

