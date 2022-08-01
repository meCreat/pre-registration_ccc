

<div style="display: none;" id="form3" class="container">

    <legend class="" style="font-size: 25px">School Graduated from:</legend>

    <h4>Intermediate School</h4>

    <div class="row">
     <div id="sg1" class="form-group col-lg-9">
      <label for="formGroupExampleInput">School Name:</label>
      <input id="1st" type="text" class="form-control" name="intermediary_1" placeholder="Enter Intermediary School">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error1st">Invalid Input.</span>
    </div>

    <div id="sg2" class="form-group col-lg-3">
      <label for="formGroupExampleInput">Year Graduated: </label>   
        <select id="1st_ygrad" name="inter_year_grad" class="form-control">

        <?php
        $now = date('Y');
        $past = 1900;

        echo "<option selected='' disabled='' value='".$now."'>Select Year</option>";
        for($year=$now; $year>= $past; $year--){
        echo '<option value="'.$year.'">'.$year.'</option>';
        }
        ?>
         
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error1st_ygrad">Invalid Input.</span>
    </div>
    </div>

    <div class="row">
    <div id="sg3" class="form-group col-lg-9 col-md-9">
      <label for="formGroupExampleInput"> School Address:</label>
      <input id="1st_add" type="text" class="form-control" name="inter_school_add_1" placeholder="Enter School Address">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error1st_add">Invalid Input.</span>
    </div>
    <hr style="padding-bottom: 2%;">
    </div>


    <h4>Secondary School</h4>

    <div class="row">
     <div id="sg4" class="form-group col-lg-9 col-md-9">
      <label for="formGroupExampleInput">School Name:</label>
      <input id="2nd" type="text" class="form-control" name="secondary" placeholder="Enter Secondary School">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd">Invalid Input.</span>
    </div>
    </div>

    <div class="row">
    <div id="sg5" class="form-group col-lg-9">
      <label for="formGroupExampleInput"> School Address:</label>
      <input id="2nd_add" type="text" class="form-control" name="sec_school_add" placeholder="Enter School Address">
     <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_school_add">Invalid Input.</span>
    </div>

   
    <div id="sg6" class="form-group col-lg-3">
      <label for="formGroupExampleInput">Section:</label>
      <input id="2nd_section" type="text" class="form-control" name="sec_section" placeholder="Enter School Section">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_sec">Invalid Input.</span>
    </div>
  </div>

  <div class="row">
    <div id="sg7" class="form-group col-lg-3">
      <label for="formGroupExampleInput">GWA:</label>
      <input id="2nd_gwa" type="text" class="form-control" name="GWA" placeholder="Enter GWA">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="error2nd_gwa">Invalid Input.</span>
    </div>
    </div>

    <div id="sg" class="form-group">
      <label for="formGroupExampleInput">Date of Graduation :</label>
  
      <select id="2nd_mon" class="" name="mon" class="form-control">
        <option value="" disabled="" selected="">Select Month</option>
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
      <select id="2nd_year" class="" name="year" class="form-control">
        <option value="" selected="" disabled="">Select Year</option>
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
      
    <div id="add_form"></div>

  
    <hr style="padding-bottom: 2%;">

  <a class="btn btn-danger" type="button" id="back2" href="#top">Back</a>
  <input id="submit_btn" type="button" class="btn btn-primary" value="Submit">

</div>

