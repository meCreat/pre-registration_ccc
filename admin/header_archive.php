<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon"  href="../styles/icon.png">
  

<!--  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https:///maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Admin</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!--   -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!--------------------------------->
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/letter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Data Tables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

</head>

<body style="background-color: #c2c2a3;">
<span id='top'></span>

 <header class="bg-dark">
      <a href="#" class="logo">CCC-IMS</a>
      <div class="navigation">
        <ul class="menu">
          <div class="close-btn"></div>
          <li class="menu-item"><a href="archive_dashboard.php"><i class="bi bi-house-fill"></i> Dashboard</a></li>
          
          <!-- Date base info -->
          <li class="menu-item">
            <a class="sub-btn" href="#"><i class="bi bi-archive-fill"></i> Tables <i class="fas fa-angle-down"></i></a>
            <ul class="sub-menu">
              <li class="sub-item"><a href="archive.php">General Table</a></li>
              <li class="sub-item"><a href="archive.php?y_lvl=1">1st Year Table</a></li>
              <li class="sub-item"><a href="archive.php?y_lvl=2">2st Year Table</a></li>
              <li class="sub-item"><a href="archive.php?y_lvl=3">3st Year Table</a></li>
              <li class="sub-item more"><a href="archive.php?y_lvl=4">4th Year Table</a></li>
              <li class="sub-item"><a href="archive.php?y_lvl=4&grad=1">Graduates</a></li>
              <li class="sub-item"><a href="archive.php?y_lvl=4&grad=0">Non Graduates</a></li>

            </ul>
          </li>

          <!-- Setting -->
        <li class="menu-item"><a data-toggle='modal' href='#security'><i class="bi bi-lock-fill" ></i> Security</a></li>
        <li class="menu-item"><a href="archive.php?logout=1"><i class="bi bi-box-arrow-right"></i> Log-out</a></li>
      </ul>
      </div>
      <div class="menu-btn"></div>
    </header>

    
<br>
<br>
<br>
<br><br><br>

<!-- Modal Password Archive -->
  <div class="modal fade" id="security" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title"><i class="bi bi-lock-fill" ></i> Security</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
              
        <div class="modal-body">
        <form id="passpass" action="archive_passChange" method="POST"> 
        <p>If you want to change the Archive Password, proceed with the following.</p>
        <center style="margin-top: 5px;"><h6>Enter Password</h6>
        <label>
          <input style="text-align: center" type="password" name="pass">
        </label>
        <h6>Enter New-Password</h6>
        <label>
          <input style="text-align: center" type="password" name="new-pass"><br>
          <span id="pass" class="text-danger text-center" style="display: none;">Must be 8 Characters Long! </span>
        </label>
        <h6>Confirm New-Password</h6>
        <label>
          <input style="text-align: center" type="password" name="new-passConfirm"><br>
          <span id="passConfirm" class="text-danger text-center" style="display: none;">Password does not match! </span>
        </label>
        </center>
        </form>             
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

            <button form="passpass" type="submit" name="change" class="btn btn-primary">Change</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
  
</div>


<script type="text/javascript">
  $(document).ready(function(){
    pass = false;
    passCon = false;

    $('[name=new-pass]').keyup(function(){
      if($('[name=new-pass]').val().length <= 7){
        $('#pass').show();
      }else{
        $('#pass').hide();
        pass = true;
      }
    })

    $('[name=new-passConfirm]').keyup(function(){
      if($('[name=new-pass]').val() != $('[name=new-passConfirm]').val()){
        $('#passConfirm').show();
      }else{
        $('#passConfirm').hide();
        passCon = true;
      }
    })


    $('#passpass').submit(function(){
      if (passCon == true && pass == true) {
        return true;
      }else{
        alert("Can't change the password.")
        return false;
      }
    })
  })
</script>

