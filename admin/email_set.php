<?php
include 'header.php';
include 'nav.php';
require 'dbcon.php';
if (isset($_SESSION['message'])): 
?>
<div class="container">
  <h5 class="text-<?=$_SESSION['msg_type']?> text-center">
    <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </h5>
</div>
<?php 
endif; 
$i = 0; 


if (!isset($_GET['mail']) || $_GET['mail'] == 'old_e') {
  $title = ' Old Enrolee Email Composition.';
  $id = '1';
}else if ($_GET['mail'] == 'new_e'){
  $title = ' New Enrolee Email Composition.';
  $id = '3';
}else if ($_GET['mail'] == '4th'){
  $title = ' For 4th Year Students.';
  $id = '4';
}else if ($_GET['mail'] == 'late_e'){
  $title = ' Late Enrolees Email Composition.';
  $id = '2';
}else if ($_GET['mail'] == '1st_time_reg'){
  $title = ' First Time Pre Registration.';
  $id = '5';
}else if ($_GET['mail'] == 'reg_success'){
  $title = ' Registration Success.';
  $id = '6';
}else if ($_GET['mail'] == 'code_reset'){
  $title = ' Code Reset.';
  $id = '7';
}

$query = $conn->query("SELECT * FROM `email_message` WHERE `id` = '$id'");
$message = $query->fetch_assoc();

$query1 = $conn->query('SELECT * FROM `reg_dates` ORDER BY `id` DESC LIMIT 1 ');
$result = $query1->fetch_assoc();
?> 

<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >

     <span class="p-2">Dashboard/ Settings/ Emails</span>  

  </div>
</div>

<div class="container">
    <div  class="col-md-12">
      <h2>Set Email Messages</h2>

    </div>   

<div style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:    hsl(180, 100%, 99%);" class="">
  <p>Email for Students:</p>

<div class="row">

    <div class="col-md-12">
      <a class="btn btn-link border border-default" href="email_set.php?mail=old_e">Old Enrolees</a>
      <a class="btn btn-link border border-default" href="email_set.php?mail=new_e">New Enrolees</a>      
      <a class="btn btn-link border border-default" href="email_set.php?mail=late_e">Late Enrolees</a>
      <a class="btn btn-link border border-default" href="email_set.php?mail=4th">4th Year</a>
      <a class="btn btn-link border border-default" href="email_set.php?mail=1st_time_reg">Notif on Registration</a>
      <a class="btn btn-link border border-default" href="email_set.php?mail=reg_success">Registration Success</a>
      <a class="btn btn-link border border-default" href="email_set.php?mail=code_reset">Code Reset</a>
    </div>   
</div>
</div>

 <!-- Pre-Registration  -->
<div id="New_Enrolees" style="border:1px solid; margin:20px; padding:10px; border-radius:10px; background-color:  hsl(180, 100%, 99%);">
  <div>
  <?php if ($id == 1 || $id ==2 || $id ==3) {
   ?>
  <p><i class="bi bi-card-text"></i><?=$title?><button type="button" class="float-right btn btn-primary btn-xl" data-toggle='modal' data-target='#send'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z"/>
</svg> Send Email</button>

  </p>
<?php }else{ ?>
  <p><i class="bi bi-card-text"></i><?=$title?>
  </p>
<?php } ?>


 
    <div style="border-bottom: 1px solid black; padding:10px">
      <button class="btn btn-primary btn-sm"  data-toggle='modal' data-target='#Intro'>Intro</button>
      <button class="btn btn-danger btn-sm"  data-toggle='modal' data-target='#P1'>P1</button>
      <button class="btn btn-info btn-sm"  data-toggle='modal' data-target='#P2'>P2</button>
      <button class="btn btn-primary btn-sm"  data-toggle='modal' data-target='#P3'>P3</button>
      <button class="btn btn-success btn-sm"  data-toggle='modal' data-target='#P4'>P4</button>
      <button class="btn btn-warning btn-sm"  data-toggle='modal' data-target='#P5'>P5</button>
      <button class="btn btn-dark  btn-sm"  data-toggle='modal' data-target='#P6'>P6</button>
      <button class="btn btn-secondary btn-sm"  data-toggle='modal' data-target='#End'>End</button>
    </div>

    <br>

    <div style="border: 1px solid black; padding: 10px; background-color: #ffff99; ">
    <?php include 'email_setMessage.php';?>
    </div>
    

  </div>
</div>
 

</div>

<!-- ########################################################################################################################################################################### -->



<!-- Modal Send -->
  <div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">

        <form id="send" action="email_setSend" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?=$id?>">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?=$title?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
              <?php if($id == '3'):?> 
          <div class="border border-default p-3 mb-5">
          <p class="text-danger">Select Excel File Path.</p>
         <input id="excel" class="form-group"  type="file" name="excel" required="">
         </div>
          <?php endif; ?>

          <?php if($id == '1'):?> 
          <div class="border border-default p-3 mb-5">
          <p class="text-danger">Sending Old Enrolee Email will automatically make all Students Unregistered and will randomly generate a code for Registering.</p>
         </div>
          <?php endif; ?>
              <p style="text-align: center;">Do you want to send this Email to Students?</p>
              <input type="hidden" name="id" value="<?=$id?>">

              <input type="hidden" name="intro" value="<?=$message['intro']?>">
              <input type="hidden" name="p_1" value="<?=$message['p_1']?>">
              <input type="hidden" name="p_2" value="<?=$message['p_2']?>">
              <input type="hidden" name="p_3" value="<?=$message['p_3']?>">
              <input type="hidden" name="p_4" value="<?=$message['p_4']?>">
              <input type="hidden" name="p_5" value="<?=$message['p_5']?>">
              <input type="hidden" name="p_6" value="<?=$message['p_6']?>">
              <input type="hidden" name="end" value="<?=$message['end']?>">

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="id_number" id="id"> 
          
          <input type="submit" class="btn btn-primary" name="send" value="Yes">
            
          <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>


<form action="email_setSubmit" method="POST">
<input type="hidden" name="id" value="<?=$id?>">

<?php include 'email_setModal.php'; ?>
</form>



<?php
include 'footer.php';
include 'loading_screen.php';
 ?>

 <script type="text/javascript">
$(document).ready(function(){
  $('selector').click(function(){return false;});
  $('#send').submit(function(){

    $('.container, header' ).hide();
    $('.modal').modal('hide');
    $('#Loading').show();
    return true
  })

 

})
 
</script>

