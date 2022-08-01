


<div id="Loading" class="container-fluid" style="
  position: absolute;
  top: 25%;
  width: 100%;
  text-align: center;
  font-size: 18px;
  color: white;
  display: none;">
  <div class="bg-primary" style=" border: 3px solid black; border-radius: 10px; box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 30%; margin: auto; padding: 10px;">
	<div class="spinner-border " style="border: 3px solid black; border-radius: 10px; box-shadow: 10ox 10px 10px black;  margin-bottom: 10px; margin-top: 10px;"><i class="bi bi-envelope-fill"></i></div><p> Loading...</p>
  <p>Please be patient.</p>
  <?php if ($_GET['mail'] == 'old_e'){ ?>
    <p>Sending Emails to Old Enrollee Students.</p>
  <?php }else if($_GET['mail'] == 'new_e'){ ?>
    <p>Sending Emails to New Enrollee Students.</p>
  <?php }else if($_GET['mail'] == 'new_e'){ ?>
    <p>Sending Emails to Late Enrollee Students.</p>
  <?php } ?>

  
  <p><span><i class="bi bi-exclamation-diamond-fill text-danger"></i> </span> Don't Close the Tab, it will interupt the Process.</p>
  </div>
</div>
