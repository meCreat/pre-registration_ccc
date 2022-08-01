<?php
include 'header.php';
include 'nav.php';
?>
<?php 
require 'dbcon.php';
?>
<?php
if (isset($_SESSION['message'])): 
  
?>

  <h5 class="text-<?=$_SESSION['msg_type']?> text-center">
    <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </h5>
<?php 
endif; 
$i = 0; 


$query = $conn->query("SELECT * FROM `text_part` ");
$part = $query->fetch_assoc();
?> 

<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >

     <span class="p-2">Dashboard/ Settings/ Set Texts</span>  

  </div>
</div>

<div class="container">
    <div  class="col-md-12">
      <h2>Setting Pre-Reg Text</h2>

    </div>   

<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);">
  <div>
  <p><a class="text-danger" data-toggle="modal" data-target="#modal1"><i class="bi bi-question-circle-fill"></i></a> Welcome Part:</p>
  
  <form action="set_text_submit" method="POST">
    <center>
    <textarea name="pre_reg" rows="5" cols="70" class="form-control"><?=$part['pre_reg']?></textarea><br>
    <input class="btn btn-info" type="submit" name="Update1" value="Update">
    </center>
  </form>
  </div>
</div>
 
 <div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);">
  <div>
  <p><a class="text-danger" data-toggle="modal" data-target="#modal2"><i class="bi bi-question-circle-fill"></i></a> Data Privacy Part:</p>
  
  <form action="set_text_submit" method="POST">
    <center>
    <textarea name="data_privacy" rows="5" cols="70" class="form-control"><?=$part['data_privacy']?></textarea><br>
    <input class="btn btn-info" type="submit" name="Update2" value="Update">
    </center>
  </form>
  </div>
</div>

<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);">
  <div>
  <p><a class="text-danger" data-toggle="modal" data-target="#modal3"><i class="bi bi-question-circle-fill"></i></a> Thank You Part:</p>
  
  <form action="set_text_submit" method="POST">
    <center>
    <textarea name="ty" rows="5" cols="70" class="form-control"><?=$part['ty']?></textarea><br>
    <input class="btn btn-info" type="submit" name="Update3" value="Update">
    </center>
  </form>
  </div>
</div>

</div>

<!-- ########################################################################################################################################################################### -->
 <!-- Modal Welcome Part -->
  <div class="modal fade " id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">

        

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Instruction to Welcome Part</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <p>Clicking Update Button will Update this Part in the Pre-Registratiion System</p>
              <center>
                <img src="../img/1a.PNG">
                <img src="../img/1b.PNG">
              </center>
              
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
            
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>

        
      </div>
    </div>
  </div> 

  <!-- Modal Welcome Part -->
  <div class="modal fade " id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">

        

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Instruction to Data Privacy Part</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <p>Clicking Update Button will Update this Part in the Pre-Registratiion System</p>
              <center>
                <img src="../img/1d.PNG">
              </center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
            
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>

        
      </div>
    </div>
  </div>  

  <!-- Modal Welcome Part -->
  <div class="modal fade " id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">

        

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Instruction to Thank You Part</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <p>Clicking Update Button will Update this Part in the Pre-Registratiion System</p>
              <center>
                <img src="../img/1c.PNG">
              </center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
            
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>

        
      </div>
    </div>
  </div>   
<?php

include 'footer.php';
 ?>


