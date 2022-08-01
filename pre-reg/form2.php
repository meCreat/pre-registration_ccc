<div style="display: ;" id="form2" class="container" >

    <legend class="" style="font-size: 25px">Guardian/Parent Information</legend>
    
    <h3>Fathers Information</h3> 

    <div class="row">
     <div id="gd1" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">SurName:</label>
      <input id="f_sname" type="text" class="form-control" name="f_sname" placeholder="Surname" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only">
     <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFsname">Invalid Input.</span>
    </div>


     <div id="gd2" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First Name:</label>
      <input id="f_fname" type="text" class="form-control" name="f_fname" placeholder="First Name" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFfname">Invalid Input.</span>
    </div>


     <div id="gd3" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle Name:</label>
      <input id="f_mname" type="text" class="form-control" name="f_mname" placeholder="Middle Name" pattern="[A-Za-z\W+]{1,}" title="Characters only">
     <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFmname">Invalid Input.</span>
    </div>
    </div>

    <div class="row">
    <div id="gd4" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Occupation</label>

      <select id="f_occ" class="form-control" name="father_occupation"  required="">
      <option value="" selected="" disabled=""><--Select Occupation--></option>
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
      <input id="f_bday" type="date" name="father_birthday" required="" class="form-control">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFbday">Invalid Input.</span>
    </div>
    
      <div id="gd6" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="f_con" type="text" class="form-control" name="father_contact" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorFcon">Invalid Input.</span>
    </div>
    </div>
    <hr style="padding-bottom: 2%;">

    <h3>Mothers Information</h3>
    
    <div class="row">
    <div id="gd7" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Surname:</label>
      <input id="m_sname" type="text" class="form-control" name="m_sname" placeholder="Surname" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMsname">Invalid Input.</span>
    </div>

     <div id="gd8" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First Name:</label>
      <input id="m_fname" type="text" class="form-control" name="m_fname" placeholder="First Name" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only">
       <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMfname">Invalid Input.</span>
    </div>

     <div id="gd9" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle Name:</label>
      <input id="m_mname" type="text" class="form-control" name="m_mname" placeholder="Middle Name" pattern="[A-Za-z\W+]{1,}" title="Characters only">
       <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMmname">Invalid Input.</span>
    </div>
    </div>

    <div class="row">
    <div id="gd10" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Occupation</label>
      <select id="m_occ" class="form-control" name="mother_occupation"  required="">
      <option value="" selected="" disabled=""><--Select Occupation--></option>
      <option value="Government employee(permanent)">Government employee(permanent)</option>
      <option value="Government employee(contratual)">Government employee(contratual)</option>
      <option value="Private Company employee (permanent)">Private Company employee (permanent)</option>
      <option value="Private Company employee (contractual)">Private Company employee (contractual)</option>
      <option value="Self employed">Self employed</option>
      <option value="Unemployed">Unemployed</option>
      <option value="Deceased">Deceased</option>
    </select>
     <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMocc">Select Mother Occupation.</span>
    </div>

    <div id="gd11" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Birthday:</label>
      <input id="m_bday" type="date" name="mother_birthday" required="" class="form-control">
       <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMbday">Invalid Input.</span>
    </div>

     <div id="gd12" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="m_con" type="text" class="form-control" name="mother_contact" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41">
       <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorMcon">Invalid Input.</span>    
     </div>
    </div>
    <hr style="padding-bottom: 2%;">

    
    <h3>Guardians Information</h3>
    <p style="border: 1px dotted black; padding: 5px; width: 25%; border-radius: 10px;"><i class="bi bi-exclamation-diamond"></i> Must be same the address as students.</p>
    <div id="gd13" class="form-group">
    <span style="padding: 5px; border-radius: 5px;" id="g_btn">  
      <input id="g_father" type="radio" name="g" value="1" required="">Father
      <input id="g_mother" type="radio" name="g" value="2">Mother
      <input id="g_other" type="radio" name="g" value="3">Other
    </span>     
    <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGchoose">Select Guardian.</span>    
    </div>
    
    <div id="guardian_info">
    

    <div class="row">
     <div id="gd14" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">SurName:</label>
      <input id="g_sname" type="text" class="form-control" name="g_sname" placeholder="Surname" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGsname">Invalid Input.</span>  
    </div>

     <div id="gd15" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">First Name:</label>
      <input id="g_fname" type="text" class="form-control" name="g_fname" placeholder="First Name" required="" pattern="[A-Za-z\W+]{1,}" title="Characters only">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGfname">Invalid Input.</span>  
    </div>

    
     <div id="gd16" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Middle Name:</label>
      <input id="g_mname" type="text" class="form-control" name="g_mname" placeholder="Middle Name" pattern="[A-Za-z\W+]{1,}" title="Characters only">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGmname">Invalid Input.</span> 
    </div>
    </div>

    <div class="row">
    <div class="form-group col-lg-4 col-md-4" id="rel gd17">
      <label for="formGroupExampleInput">Relationship with the Student:</label>
      <select id="g_rel" name="g_rel" class="form-control">
        <option value="s_rel" selected='selected' disabled='disabled'><--Select Relationship--></option>
        <option value="Father">Father</option>   
        <option value="Mother">Mother</option>
        <option value="Spouse">Spouse</option>
        <option value="Siblings">Siblings</option>
        <option value="2nd Degree Relative">2nd Degree Relative</option>
        <option id="rel_orher">Other</option>
      </select>
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGrel">Select Relationship.</span> 

    </div>
    <input type="text" id="g_rel_hidden" name="g_rel" style="display: none; ">


    <div id="gd18" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Occupation</label>
      <select id="g_occ" class="form-control" name="guardian_occupation"  required="">
      <option value="" selected="" disabled=""><--Select Occupation--></option>
      <option value="Government employee(permanent)">Government employee(permanent)</option>
      <option value="Government employee(contratual)">Government employee(contratual)</option>
      <option value="Private Company employee (permanent)">Private Company employee (permanent)</option>
      <option value="Private Company employee (contractual)">Private Company employee (contractual)</option>
      <option value="Self employed">Self employed</option>
      <option value="Unemployed">Unemployed</option>

    </select>
    <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGocc">Invalid Input.</span> 
    </div>

    <div id="gd19" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Birthday:</label>
      <input id="g_bday" type="date" name="guardian_birthday" required="" class="form-control">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGbday">Invalid Input.</span> 
    </div>
    </div>

    <div class="row">
     <div id="gd20" class="form-group col-lg-4 col-md-4">
      <label for="formGroupExampleInput">Contact Number:</label>
      <input id="g_con" type="text" class="form-control" name="guardian_contact" placeholder="Enter Contact Number" required="" pattern="[0-9]{11,}" title="Eleven Digit Number, Example: 099******41">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGcon">Invalid Input.</span> 
    </div>

    <div id="gd21" class="form-group col-lg-8 col-md-8">
      <label for="formGroupExampleInput">Address:</label>
      <input id="g_add" type="text" class="form-control" name="guardian_add" placeholder="Enter Address" required="" pattern="[A-Za-z0-9\W+]{9,}" title="Home Address">
      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorGadd">Invalid Input.</span> 
    </div>
    </div>
    </div>

    <hr style="padding-bottom: 2%;">
  <a class="btn btn-danger"  type="button" id="back1" href="#top">Back</a>
  <input class="btn btn-primary" type="button" id="next2" href="#top" value="Next">
  


</div>


