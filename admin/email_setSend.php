

<?php
session_start();
date_default_timezone_set('Asia/Manila');

include 'dbcon.php';
include '../pre-reg/global_function.php';
include 'xlxs.php';
$query1 = $conn->query('SELECT * FROM `reg_dates` ORDER BY `id` DESC LIMIT 1 ');
$date = $query1->fetch_assoc();


if (isset($_POST['send'])) {
        
 	if ($_POST['id'] == '1') {
         	$conn->query('UPDATE `student_data` SET `status`="unregistered" WHERE 1');
            $result = $conn->query('SELECT `student_data`.`id_number`,email_accounts.email, student_data.status , `student_info`.`surname`, `student_info`.`firstname`, `student_info`.`midname`  FROM `email_accounts` INNER JOIN `student_data` ON `email_accounts`.`id_number` = `student_data`.`id_number` INNER JOIN `student_info` ON `student_data`.`id_number` = `student_info`.`id_number` WHERE `student_data`.`status`="Unregistered" AND `student_data`.`archive` = "0" AND `email_accounts`.`active` = "0";');

            while($rows = $result->fetch_assoc()){
                $rand = rand(100000,999999);

                $conn->query("UPDATE email_accounts SET pass = '".$rand."' WHERE id_number = '".$rows['id_number']."'");

                $sub = "Pre-Registration - ".$date['semester']. " Semester, SY: ".$date['sy'];
                $msg = '<p>'.$rows['surname'].','.$rows['firstname'].' '.$rows['midname'].'<br>'.$rows['id_number'].'<br><br>'. js_clean(mysqli_real_escape_string($conn, $_POST['intro'])).'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_1']))."<br><a href='localhost/Capstone/pre-reg/index?id_num=".$rows['id_number']."'>CCC Pre-Registration</a>" .'<br><br>'.js_clean(mysqli_real_escape_string($_POST['p_2'])).'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_3'])) .' '.$rand.'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_4'])).'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_5'])).'<br><br>'. js_clean(mysqli_real_escape_string($conn, $_POST['p_6'])).'<br><br>'. js_clean(mysqli_real_escape_string($conn, $_POST['end'])).'</p>';
                $to = $rows['email'];
                $headers = "MIME-Version: 1.0"."\r\n";
                $headers.= "Content-type:text/html;charset=UTF-8"."\r\n";

                mail($to,$sub,$msg,$headers);
 		    }
            
            $conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('','".$_SESSION['admin_id']."','$ip','$device','$md')");

            $_SESSION['message'] = "Sending Message to Enrolee Students Finished!";
            $_SESSION['msg_type'] = 'success';
            header('location:email_set?mail=old_e');
    }else if ($_POST['id'] == '3') {

    // Freshmen New enrollee
    
                if (isset($_FILES['excel']['tmp_name'])) {
                    $conn->query("DELETE FROM `import_studenttable` WHERE 1 ");
                    $excel= SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                    echo "<pre>";
                    $i = 0;
                    $query = $conn->query("SELECT * FROM `email_message` WHERE `id` = '3'");
                    $message = $query->fetch_assoc();

                    foreach($excel->rows() as $key=>$row){
                        
                        if ($i != 0) {
                        echo $row[0]. " ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]."<br>";
                        $conn->query("INSERT INTO `import_studenttable`( `id_number`, `email`, `sname`, `fname`, `mname`) VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]')");
                        $sub = "Pre-Registration - ".$date['semester']. " Semester, SY: ".$date['sy'];
                        $msg = '<p>'.$row[2].','.$row[3].' '.$row[4].'<br>'.$row[0].'<br><br>'. $message['intro'].'<br><br>'.$message['p_1']."<br><a href='localhost/Capstone/pre-reg/reg?id_number=".$row[0]."&email=".$row[1]."&sname=".$row[2]."&fname=".$row[3]."&mname=".$row[4]."'>CCC Pre-Registration</a>" .'<br><br>'.$message['p_2'] .'<br><br>'.$message['p_3'] .'<br><br>'.$message['p_4'].'<br><br>'.$message['p_5'].'<br><br>'. $message['p_6'].'<br><br>'. $message['end'].'</p>';
                        $to = $row[1];
                        $headers = "MIME-Version: 1.0"."\r\n";
                        $headers.= "Content-type:text/html;charset=UTF-8"."\r\n";

                        echo $msg;
                        if(mail(js_clean($to) ,js_clean($sub) ,js_clean($msg) ,$headers)){
                            $_SESSION['message'] = "Sending Message to Freshmen Students Finished!";
                            $_SESSION['msg_type'] = 'success';
                            header('location:email_set?mail=new_e');
                        }else{
                            $_SESSION['message'] = "Sending Email is not Finished";
                            $_SESSION['msg_type'] = 'danger';
                            header('location:email_set?mail=new_e');
                        }

                        }
                        
                        $i++;
                    }
                }  else{
                    echo 'error!';
                }    
    }else if ($_POST['id'] == '2' && strtotime($date['date_end']) <= time()) {
            $result = $conn->query('SELECT `student_data`.`id_number`,email_accounts.email, student_data.status , `student_info`.`surname`, `student_info`.`firstname`, `student_info`.`midname`  FROM `email_accounts` INNER JOIN `student_data` ON `email_accounts`.`id_number` = `student_data`.`id_number` INNER JOIN `student_info` ON `student_data`.`id_number` = `student_info`.`id_number` WHERE `student_data`.`status`="unregistered" AND `student_data`.`archive` = "0";');

            while($rows = $result->fetch_assoc()){
                
                $sub = "Pre-Registration - ".$date['semester']. " Semester, SY: ".$date['sy']." is now finished";
                $msg = '<p>'.$rows['surname'].','.$rows['firstname'].' '.$rows['midname'].'<br>'.$rows['id_number'].'<br><br>'. js_clean(mysqli_real_escape_string($conn, $_POST['intro'])).'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_1'])).'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_2'])) .'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_3'])) .'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_4'])).'<br><br>'.js_clean(mysqli_real_escape_string($conn, $_POST['p_5'])).'<br><br>'. js_clean(mysqli_real_escape_string($conn, $_POST['p_6'])).'<br><br>'. js_clean(mysqli_real_escape_string($conn, $_POST['end'])).'</p>';
                $to = $rows['email'];
                $headers = "MIME-Version: 1.0"."\r\n";
                $headers.= "Content-type:text/html;charset=UTF-8"."\r\n";

                mail($to,$sub,$msg,$headers);
            }
       
            $_SESSION['message'] = "Sending Message to Late Enrolee Students Finished!";
            $_SESSION['msg_type'] = 'success';
            header('location:email_set?mail=late_e');
        }else{
            $date = strtotime($date['date_end']);
            $_SESSION['message'] = "Pre-Registration is not finished!";
            header('location:email_set?mail=late_e');

        }

 } 



?>


