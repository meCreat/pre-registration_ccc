<?php 
session_start();
if (isset($_POST['select_session']) && $_POST['session'] != 'all' ) {   
    $_SESSION['ar_yr'] = $_POST['session'];
    
}else if (isset($_POST['select_session']) && $_POST['session'] == 'all'){  
  unset($_SESSION['ar_yr']);
}


header('location:archive'.$_POST['link']);

?>