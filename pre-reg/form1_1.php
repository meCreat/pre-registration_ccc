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
     
    }else{
      $house_num = "";
      $st_purok = "";
      $brgy = "";
      $city = "Calamba";
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
      <label for="formGroupExampleInput">Barangay:</label>
      <select id="brgy" type="text" class="form-control" name="brgy" required="" >
          <option value="<?=$brgy?>" selected="" <?php if($brgy == ""){echo "disabled='disabled'";}?>><?php if($brgy == ""){ echo "Select Barangay"; }else { echo $brgy; }?></option>
          <option value="Bagong Kalsada">Bagong Kalsada</option>
          <option value="Banadero">Banadero</option>
          <option value="Banlic">Banlic</option>
          <option value="Barandal">Barandal</option>
          <option value="Barangay 1(Poblacion 1)">Barangay 1(Poblacion 1)</option>
          <option value="Barangay 2(Poblacion 2)">Barangay 2(Poblacion 2)</option>
          <option value="Barangay 3(Poblacion 3)">Barangay 3(Poblacion 3)</option>
          <option value="Barangay 4(Poblacion 4)">Barangay 4(Poblacion 4)</option>
          <option value="Barangay 5(Poblacion 5)">Barangay 5(Poblacion 5)</option>
          <option value="Barangay 6(Poblacion 6)">Barangay 6(Poblacion 6)</option>
          <option value="Barangay 7(Poblacion 7)">Barangay 7(Poblacion 7)</option>
          <option value="Batino">Batino</option>
          <option value="Bubuyan">Bubuyan</option>
          <option value="Bucal">Bucal</option>
          <option value="Bunggo">Bunggo</option>
          <option value="Burol">Burol</option>
          <option value="Camaligan">Camaligan</option>
          <option value="Canlubang">Canlubang</option>
          <option value="Halang">Halang</option>
          <option value="Hornalan">Hornalan</option>
          <option value="Kay-Anlog">Kay-Anlog</option>
          <option value="Laguerta">Laguerta</option>
          <option value="La mesa">La mesa</option>
          <option value="Lawa">Lawa</option>
          <option value="Lecheria">Lecheria</option>
          <option value="Lingga">Lingga</option>
          <option value="Looc">Looc</option>
          <option value="Mabato">Mabato</option>
          <option value="Majada Labas">Majada Labas</option>
          <option value="Makiling">Makiling</option>
          <option value="Mapagong">Mapagong</option>
          <option value="Masili">Masili</option>
          <option value="Maunong">Maunong</option>
          <option value="Mayapa">Mayapa</option>
          <option value="Milagrosa(Tulo)">Milagrosa(Tulo)</option>
          <option value="Paciano Rizal">Paciano Rizal</option>
          <option value="Palingon">Palingon</option>
          <option value="Palo-Alto">Palo-Alto</option>
          <option value="Pansol">Pansol</option>
          <option value="Parian">Parian</option>
          <option value="Prinza">Prinza</option>
          <option value="Punta">Punta</option>
          <option value="Puting Lupa">Puting Lupa</option>
          <option value="Real">Real</option>
          <option value="Saimsim">Saimsim</option>
          <option value="Sampiruhan">Sampiruhan</option>
          <option value="San Cristobal">San Cristobal</option>
          <option value="San Jose">San Jose</option>
          <option value="San Juan">San Juan</option>
          <option value="Sirang Lupa">Sirang Lupa</option>
          <option value="Sucol">Sucol</option>
          <option value="Turbina">Turbina</option>
          <option value="Ulango">Ulango</option>
          <option value="Uwisan">Uwisan</option>
         
      </select> 

      <span style="color: red; font-weight: bold; margin-left: 10px; display: none;" id="errorBrgy">Invalid Input.</span>
    </div>

    <div id="rd14" class="form-group col-lg-2 col-md-6">
      <label for="formGroupExampleInput">City:</label>
      <input type="text" class="form-control"  value="Calamba" disabled="" >
      <input id="city" type="hidden" class="form-control" name="city" value="Calamba">
      
    </div>
  </div>
    <hr>
