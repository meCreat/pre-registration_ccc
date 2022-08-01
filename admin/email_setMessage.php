
<?php if ( !isset($_GET['mail']) || $_GET['mail'] == 'old_e'){ ?>
    <p>Title: <?=$message['title']?> - <?=$result['semester']?> Semester <?=$result['sy']?></p>
  
    <p><i>Full name and Id_number of the Student.</i><span class="text-primary"><br><br><?php echo $message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><i> The Link.</i><br><br><span class='text-info'>".$message['p_2'] ."</span><br><br><span class='text-primary'>".$message['p_3'] ."<i> 6 Digits Number</i></span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']  ?></span></p>
    
<?php }else if ($_GET['mail'] == 'new_e'){ ?>

    <p>Title: <?=$message['title']?> - <?=$result['semester']?> Semester <?=$result['sy']?></p>
  
    <p><i>Full name and Id_number of the Student.</i><span class="text-primary"><br><br><?php echo $message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><i> The Link.</i><br><br><span class='text-info'>".$message['p_2'] ."</span><br><br><span class='text-primary'>".$message['p_3'] ."</span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']  ?></span></p>

<?php }else if ($_GET['mail'] == 'late_e'){ ?>

    <p>Title: <?=$message['title']?> - <?=$result['semester']?> Semester <?=$result['sy']?></p>
  
    <p><i>Full name and Id_number of the Student.</i><span class="text-primary"><br><br><?php echo $message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><br><span class='text-info'>".$message['p_2'] ."</span><br><br><span class='text-primary'>".$message['p_3'] ."</span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']  ?></span></p>

<?php }else if ($_GET['mail'] == '4th'){ ?>

    <p>Title: <?=$message['title']?> - <?=$result['semester']?> Semester <?=$result['sy']?></p>
  
    <p><i>Full name and Id_number of the Sudent.</i><span class="text-primary"><br><br><?php echo $message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><i> Time and Date.</i><br><br><span class='text-info'>".$message['p_2'] ."</span><br><br><span class='text-primary'>".$message['p_3'] ."</span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']  ?></span></p>

<?php }else if ($_GET['mail'] == '1st_time_reg'){ ?>

    <p>Title: <?=$message['title']?> - <?=$result['semester']?> Semester <?=$result['sy']?></p>
  
    <p><i>Full name and Id_number of the Student.</i><span class="text-primary"><br><br><?php echo $message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><i> The Link.</i><br><br><span class='text-info'>".$message['p_2'] ."</span><br><br><span class='text-primary'>".$message['p_3'] ."</span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']  ?></span></p>

<?php }else if ($_GET['mail'] == 'reg_success'){ ?>

    <p>Title: <?=$message['title']?> - <?=$result['semester']?> Semester <?=$result['sy']?></p>
  
    <p><i>Full name and Id_number of the Student.</i><span class="text-primary"><br><br><?php echo $message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><i> Time and Date.</i><br><br><span class='text-info'>".$message['p_2'] ."</span><br><br><span class='text-primary'>".$message['p_3'] ."</span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']  ?></span></p>

<?php }else if ($_GET['mail'] == 'code_reset'){ ?>
    <p>Title: <?=$message['title']?> - <?=$result['semester']?> Semester <?=$result['sy']?></p>
  
    <p><i>Full name and Id_number of the Student.</i><span class="text-primary"><br><br><?php echo $message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><i> The Link.</i><br><br><span class='text-info'>".$message['p_2'] ."</span><i> New 6 Digits Number<br><br><span class='text-primary'>".$message['p_3'] ."</span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']  ?></span></p>

<?php } ?>


