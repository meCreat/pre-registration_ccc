<?php
include 'dbcon.php';
session_start();
$rand = rand(100000,999999);
$mail = $conn->query('SELECT * FROM `email_message` WHERE `id` = "7"');
$mail = $mail->fetch_assoc();

$check = $conn->query("SELECT * FROM `email_accounts` INNER JOIN `student_info` ON `email_accounts`.`id_number` = `student_info`.`id_number` WHERE  email_accounts.id_number = '".$_SESSION['id_number']."' LIMIT 1");
    while ($rows = $check->fetch_array()) {


        $resultVer = $rows['verified'];
        $Email = $rows['email'];
        $resultIdnum = $rows['id_number'];
        $sub = $mail['title'];
        $msg = '<p>'.$rows['surname'].','.$rows['firstname'].' '.$rows['midname'].'<br>'.$rows['id_number'].'<br><br>'. $mail['intro'].'<br><br>'.$mail['p_1']."<br><a href='localhost/Capstone/pre-reg/index.php?id_num=".$rows['id_number']."'>CCC Pre-Registration</a>" .'<br><br>'.$mail['p_2'] .' '.$rand.'<br><br>'.$mail['p_3'] .'<br><br>'.$mail['p_4'].'<br><br>'.$mail['p_5'].'<br><br>'. $mail['p_6'].'<br><br>'. $mail['end'].'</p>';
        $to = $Email;
        $headers = "MIME-Version: 1.0"."\r\n";
        $headers.= "Content-type:text/html;charset=UTF-8"."\r\n"; 

        
        if(mail($to,$sub,$msg,$headers)){
            echo "<br>Email message Sent";
            $pass = "UPDATE email_accounts SET pass = '".$rand."' WHERE id_number = '".$_SESSION['id_number']."'";
            
            $insert = $conn->query($pass);
            $conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('New Verification Code has been send through Email.','".$_SESSION['id_number']."','$device','$md')");
            $_SESSION['message'] = "Check your Email for Verification Number";
            $_SESSION['color'] = "green";
            header("location:pre-reg_epass.php");

        }else{
            $conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('New Verification Code sending Email Failed.','".$_SESSION['id_number']."','$device','$md')");
            $_SESSION['message']="Failed to Send the Email";
            $_SESSION['color']="red";
            header("location:pre-reg_epass.php");
        }
    }

?>