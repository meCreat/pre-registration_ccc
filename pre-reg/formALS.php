

<div style="display: none;" id="formALS" class="container">

    <legend class="" style="font-size: 25px">School Graduated from:</legend>

    <h4>ALS School</h4>


     <div id="sg1" class="form-group">
      <label for="formGroupExampleInput">School Name:</label>
      <input id="als" type="text" class="form-control" name="intermediary" placeholder="Enter Intermediary School">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorals">Invalid Input.</span>
    </div>

    <div id="sg2" class="form-group">
      <label for="formGroupExampleInput">Year Graduated: </label>   
        <select id="als_ygrad" name="inter_year_grad" >

        <?php
        $now = date('Y');
        $past = 1900;

        echo "<option selected='' disabled='' value='".$now."'>Select Year</option>";
        for($year=$now; $year>= $past; $year--){
        echo '<option value="'.$year.'">'.$year.'</option>';
        }
        ?>
         
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorals_ygrad">Invalid Input.</span>
    </div> 

    <div id="sg3" class="form-group">
      <label for="formGroupExampleInput"> School Address:</label>
      <input id="als_add" type="text" class="form-control" name="inter_school_add" placeholder="Enter School Address">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorals_add">Invalid Input.</span>
    </div>
   
  
    <hr style="padding-bottom: 2%;">

  <a class="btn btn-danger" type="button" id="back3" href="#top">Back</a>
  <input id="submit_ALS" type="button" class="btn btn-primary" value="Submit">

</div>

