<!-- Modal view -->
  <div class="modal fade" id="viewmodal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog modal-xl">
      <div class="modal-content">
        <!-- Modal Header -->
        
         
        
        <!-- Modal body -->
        <div class="modal-body container">
        <div id="infoView<?=$row['id']?>">
        	 <button style="float:right;" type="button" class="close" data-dismiss="modal">&times;</button>

             <?php

             include 'dbcon.php'; 
             $id = $row['id'];
             $msg = "";
             $msg_style = "";
             $msg1 = "";
             $msg_style1 = "";
             $trans = 0;
             $view1 = $conn->query("SELECT  `student_info`.`id_number`, `student_info`.`surname`, `student_info`.`firstname`, `student_data`.`year_lvl`, `courses`.`course_name`, `program_dept`.department_name, `student_data`.`status` ,`student_info`.`midname`, `student_info`.`ext`, `student_info`.`contact_number`,email_accounts.email, `student_info`.`house_num`,`student_info`.`st_purok`, `student_info`.`brgy`, `student_info`.`city`, `student_info`.`birthday`, `student_info`.`place_of_birth`, `student_info`.`gender`,`working` FROM `student_info` LEFT JOIN student_data ON `student_info`.`id_number` = `student_data`.`id_number` INNER JOIN courses ON student_data.course = courses.id INNER JOIN program_dept ON student_data.program_dept = program_dept.dept_id INNER JOIN email_accounts ON student_info.id_number = email_accounts.id_number WHERE `student_info`.`id` = '$id'; ");
             while($rows = $view1->fetch_assoc()){
             	$id_number = $rows['id_number'];
             	$surname = $rows['surname']; 
             	$firstname = $rows['firstname'];
             	$midname = $rows['midname'];
             	$ext = $rows['ext'];
             	$year_lvl = $rows['year_lvl'];
             	$course = $rows['course_name'];
             	$dept = $rows['department_name'];
             	$email = $rows['email'];
             	$contact = $rows['contact_number'];
             	$house_num = $rows['house_num'];
              $st_purok = $rows['st_purok'];
             	$brgy = $rows['brgy'];
             	$city = $rows['city'];
             	$bday = strtotime($rows['birthday']);
             	$birthplace = $rows['place_of_birth'];
             	$gender = $rows['gender'];
              $working = $rows['working'];

             }


             $view2 = $conn->query("SELECT * FROM `g/p_info` WHERE id_number = '".$id_number."'");
             if ($view2->num_rows == 0) {
             	$msg1 = "None";
             	$msg_style1 = "style='color: white ; text-align: center; background-color: #ff0000; padding: 8px;'";
             }else{
             while($rows = $view2->fetch_assoc()){
             	$father_name = $rows['f_sname'].", ".$rows['f_fname']. " ".$rows['f_mname'];
             	$father_occupation = $rows['father_occupation'];
             	$father_birthday = strtotime($rows['father_birthday']);
             	$father_contact = $rows['father_contact'];
             	$mother_name = $rows['m_sname'].", ". $rows['m_fname']." ". $rows['m_mname'];
             	$mother_occupation = $rows['mother_occupation'];
             	$mother_birthday = strtotime($rows['mother_birthday']);
             	$mother_contact = $rows['mother_contact'];
             	$guardian_name =  $rows['g_sname']. ", " .$rows['g_fname']. " " .$rows['g_mname']; 
             	$guardian_occupation = $rows['guardian_occupation'];
             	$guardian_birthday = strtotime($rows['guardian_birthday']);
             	$guardian_contact = $rows['guardian_contact'];
             	$guardian_add = $rows['guardian_add'];
              $g_relationship = $rows['g_relationship'];
             }
         	 }

             $view3 = $conn->query("SELECT * FROM `grad_from` WHERE `id_number` = '".$id_number."'");
             if ($view3->num_rows == 0) {
             	$msg = "None";
             	$msg_style = "style='color: white ; text-align: center; background-color: #ff0000; padding: 8px;'";
             }else{
  			 while($rows = $view3->fetch_assoc()){
          $ALS = $rows['ALS'];
  			 	$intermediary = $rows['intermediary'];
  			 	$inter_year_grad = $rows['inter_year_grad'];
  			 	$inter_school_add = $rows['inter_school_add'];
          if ($ALS == 0) {
            $secondary = $rows['secondary'];     
            $sec_school_add = $rows['sec_school_add'];
            $sec_section = $rows['sec_section'];
            $GWA = $rows['GWA'];
            $date_grad = $rows['date_grad'];
          }
  			 }
  			 }

  			 $view4 = $conn->query("SELECT * FROM `transferee` WHERE `id_number` = '".$id_number."'");
  			 if ($view4->num_rows == 1) {
  			 	while($rows = $view4->fetch_assoc()){
  			 	$last_school_att = $rows['last_school_att'];
  			 	$course_taken = $rows['course_taken'];
  			 	$school_add = $rows['school_add'];
  			 }
  			 }else{
  			 	$trans = 1;
  			 }

             ?>
             <div class="row">
             	<div class="col-md-4">
             		
             		<p style="font-size: 20px; text-align: center;">Personal Info</p>
             	
             		<table style="border:1px grey solid">
                  <tr>
                    <td>Id Number: </td>
                    <td> <span class="data1"><strong><?=$id_number?></strong></span></td>
                  </tr>

             			<tr>
             				<td>Name: </td>
             				<td> <span class="data1"><strong><?=$surname?>, <?=$firstname?> <?=$midname?> <?=$ext?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Year level:</td>
             				<td><span class="data1"><strong><?=$year_lvl?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Course: </td>
             				<td><span class="data1"><strong><?=$course?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Department: </td>
             				<td><span class="data1"><strong><?=$dept?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Email: </td>
             				<td><span class="data1"><strong><?=$email?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Contact #: </td>
             				<td><span class="data1"><strong><?=$contact?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Address: </td>
             				<td><span class="data1"><strong><?=$house_num?>,<?=$st_purok?>, <?=$brgy?>, <?=$city?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Birthday: </td>
             				<td><span class="data1"><strong><?=date("M-d-Y",$bday)?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Birthplace: </td>
             				<td><span class="data1"><strong><?=$birthplace?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Contact #: </td>
             				<td><span class="data1"><strong><?=$contact?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Gender: </td>
             				<td><span class="data1"><strong><?=$gender?></strong></span><br></td>
             			</tr>
                  <tr>
                    <td>Working: </td>
                    <td><span class="data1"><strong><?=$working?></strong></span><br></td>
                  </tr>
             		</table>
             	</div>

             	<div class="col-md-4">
             		<p style="font-size: 20px; text-align: center;">Parent & Guardian Info</p>
             		<p <?=$msg_style1?>><?=$msg1?></p>
             		<?php 
             		if($msg1 == ''):
             		?>
             		<table style="border:1px grey solid">
             			
             			<tr>
             				<td style="color: white ; text-align: center; background-color: #007bff;" colspan="2">Fathers Info</td>
             			</tr>
             			<tr>
             				<td>Name: </td>
             				<td> <span class="data1"><strong><?=$father_name?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Occupation:</td>
             				<td><span class="data1"><strong><?=$father_occupation?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Birthday: </td>
             				<td><span class="data1"><strong><?=date("M-d-Y",$father_birthday)?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Contact #: </td>
             				<td><span class="data1"><strong><?=$father_contact?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td style="color: white ; text-align: center; background-color: #007bff;" colspan="2">Mothers Info</td>
             			</tr>
             			<tr>
             				<td>Name: </td>
             				<td><span class="data1"><strong><?=$mother_name?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Occupation: </td>
             				<td><span class="data1"><strong><?=$mother_occupation?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Birthday: </td>
             				<td><span class="data1"><strong><?=date("M-d-Y",$mother_birthday)?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Contact #: </td>
             				<td><span class="data1"><strong><?=$mother_contact?></strong></span><br></td>
             			</tr>
             			
             			<tr>
             				<td style="color: white ; text-align: center; background-color: #007bff;" colspan="2">Guardian Info</td>
             			</tr>
             			<tr>
             				<td>Name: </td>
             				<td><span class="data1"><strong><?=$guardian_name?></strong></span><br></td>
             			</tr>
                  <tr>
                    <td>Relationship: </td>
                    <td><span class="data1"><strong><?=$g_relationship?></strong></span><br></td>
                  </tr>
             			<tr>
             				<td>Occupation: </td>
             				<td><span class="data1"><strong><?=$guardian_occupation?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Birthday: </td>
             				<td><span class="data1"><strong><?=date("M-d-Y",$guardian_birthday)?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Contact #: </td>
             				<td><span class="data1"><strong><?=$guardian_contact?></strong></span><br></td>
             			</tr>
             			<tr>
             				<td>Address: </td>
             				<td><span class="data1"><strong><?=$guardian_add?></strong></span><br></td>
             			</tr>



             		</table>
             		<?php endif ?>
             	</div>
             
             	

             	<div class="col-md-4">
             		<p style="font-size: 20px; text-align: center;">Educational Bachground</p>
             		<p <?=$msg_style?>><?=$msg?></p>
             		<?php 
             		if($msg == ''):
             		?>
             		<table style="border:1px grey solid">
                  <?php 
                  if($ALS == 1):
                  ?>
                  <tr><td style="color: white ; text-align: center; background-color: #007bff;" colspan="2">ALS School</td></tr>
                  <tr>
                    <td>School Name: </td>
                    <td> <span class="data1"><strong><?=$intermediary?></strong></span></td>
                  </tr>
                  <tr>
                    <td>Year Grad:</td>
                    <td><span class="data1"><strong><?=$inter_year_grad?></strong></span></td>
                  </tr>
                  <tr>
                    <td>Address: </td>
                    <td><span class="data1"><strong><?=$inter_school_add?></strong></span></td>
                  </tr>
                <?php endif;
                if($ALS == 0){
                ?>

             			<tr><td style="color: white ; text-align: center; background-color: #007bff;" colspan="2">Primary School</td></tr>
             			<tr>
             				<td>School Name: </td>
             				<td> <span class="data1"><strong><?=$intermediary?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Year Grad:</td>
             				<td><span class="data1"><strong><?=$inter_year_grad?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Address: </td>
             				<td><span class="data1"><strong><?=$inter_school_add?></strong></span></td>
             			</tr>
             			<tr><td style="color: white ; text-align: center; background-color: #007bff;" colspan="2">Secondary School</td></tr>
             			
             			<tr>
             				<td>School Name: </td>
             				<td><span class="data1"><strong><?=$secondary?></strong></span></td>
             			</tr>
             			
             			<tr>
             				<td>Address: </td>
             				<td><span class="data1"><strong><?=$sec_school_add?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Section: </td>
             				<td><span class="data1"><strong><?=$sec_section?></strong></span></td>
             			</tr>
             			<tr>
             				<td>GWA: </td>
             				<td><span class="data1"><strong><?=$GWA?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Date Grad: </td>
             				<td><span class="data1"><strong><?=$date_grad?></strong></span></td>
             			</tr>
             			<?php
             			if ($view4->num_rows == 1): ?>
             			<tr><td style="color: white ; text-align: center; background-color: #007bff;" colspan="2">Last School Attended</td></tr>
             			<tr>
             				<td>School Name: </td>
             				<td><span class="data1"><strong><?=$last_school_att?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Course Taken: </td>
             				<td><span class="data1"><strong><?=$course_taken?></strong></span></td>
             			</tr>
             			<tr>
             				<td>Address: </td>
             				<td><span class="data1"><strong><?=$school_add?></strong></span></td>
             			</tr>	
             			
             			<?php endif;
                  }
                  ?>
             			
             		</table>
             	<?php endif ?>
             	</div>
             </div>
        </div>  

        <div id="logView<?=$row['id']?>" style="display: none; margin: 1%;">
          <h1>Student Logs</h1>
          <p>Name:  <b><?=$surname?>,  <?=$midname?> <?=$ext?> </b><span style="margin-left: 20%;">Id Number: <b><?=$id_number?></b></span></p>

          
          <table class=" table table-hover table-bordered" style="overflow: auto; max-height: 500px; display: block;">
            <thead class="thead-dark">
           
              <th width="40%">Action</th>
              <th width="16%">Date/Time</th>
              <th width="19%">Device</th>
              <th  width="15%">Mac Address</th>

            </thead>

            <tbody>
            <?php 
            $logs = $conn->query("SELECT * FROM `student_logs` WHERE `id_number` = '".$id_number."' ORDER BY `date` DESC");
            if($logs->num_rows == 0){ echo '<tr><td colspan="5" style="text-align:center">No record found.</td><tr>'; }
            while($l = $logs->fetch_assoc()){
            ?>  
              <tr>
                <td><?=$l['action']?></td>
                <td><?=date('M d Y h:ia',strtotime($l['date']))?></td> 
                <td><?=$l['device']?></td> 
                <td><?=$l['mac_add']?></td> 
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
    

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <form action="">  
          <button type="button" class="btn btn-primary" id="log<?=$row['id']?>"><i class="bi bi-journal"></i> View Logs</button>
        	<a href='student_infoPDF.php?id=<?=$id_number?>' type="button" class="btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
        	<a href="student_infoWORD.php?id=<?=$id_number?>" type="button" class="btn btn-primary"><i class="bi bi-file-earmark-word-fill"></i> Word</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
</div>

<script type="text/javascript">
$('#log<?=$row['id']?>').on('click',function(){
  $('#logView<?=$row['id']?>').slideToggle();
  $('#infoView<?=$row['id']?>').slideToggle();
})
</script>

