<?php 
include 'header.php';
include 'nav.php';
include 'dbcon.php';
require_once './Classes/PHPExcel.php';

$path
?>
<div class="container">

<div class="container row" style="border: 1px solid ;border-radius: 20px; padding: 20px 5px 5px 5px; margin-bottom: 20px;">
                
                <div class="col-md-8" >
                        <div><h5>Hi <?php echo $_SESSION['un'] ; ?>, Welcome back!</h5></div>       
                </div>
                <div class="col-md-4">
                        <span style="float: right;"><?php date_default_timezone_set("Asia/Manila"); echo "Today is&nbsp;" . date("l") . "&nbsp;" . date("Y-m-d h:i:sa"); ?></span>
                </div>
 
</div>  

<form action="">
        
</form>
</div>

<?php
include 'footer.php';
?>
