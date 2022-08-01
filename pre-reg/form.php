
<?php 
// include 'security.php';
include 'background_running.php';
include '../admin/running.php';
include 'header.php';
include 'nav.php';

?> 
<div class="container head">
  <h2>CCC Registration form</h2>
  <p>Complete the form to be officially registered.</p>
</div>
<form id="submit" action="form_submit" method="POST" class="form-group submit">

<?php 
include 'form1.php';
include 'form2.php'; 
include 'form3.php';
include 'formALS.php';
include 'form_validate.php';
?>

</form>


<script src="./js/validate1.js" type="text/javascript"></script>
<script src="./js/validate2.js" type="text/javascript"></script>
<script src="./js/validate3.js" type="text/javascript"></script>
<script src="./js/guardian_btn.js" type="text/javascript"></script>
<?php include 'footer.php'; ?>

