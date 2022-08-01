<?php
include 'dbcon.php';
date_default_timezone_set('Asia/Manila');
session_start();
if (isset($_POST['submit'])) {
$date = date("h:i:sa Y/m/d");
$vkey = sha1($date);
$resultVer = "";
$resultEmail = "";
$resultIdnum = "";
$query = $conn->query("SELECT * FROM `email_message` WHERE `id` = '5'");
$message = $query->fetch_assoc();



    $check = $conn->query("SELECT * FROM email_accounts WHERE email = '".$_POST['email']."' OR id_number = '".$_POST['id_number']."'");
    while ($row = $check->fetch_array()) {
        $resultVer = $row['verified'];
        $resultEmail = $row['email'];
        $resultIdnum = $row['id_number'];
    }

    $check_for_importData = $conn->query("SELECT * FROM `import_studenttable` WHERE email = '".$_POST['email']."' OR id_number = '".$_POST['id_number']."'");
    echo $check->num_rows."  ". $check_for_importData->num_rows;

    if ($check->num_rows == 0 && isset($_SESSION['key']) && $check_for_importData->num_rows == 1) {
        $sql = "INSERT INTO email_accounts (vkey,email,id_number) VALUES ('$vkey','".$_POST['email']."','".$_POST['id_number']."')";    
        $insert = $conn->query($sql);
        $_SESSION['key'] = $vkey;
        $_SESSION['id_number'] = $_POST['id_number'];
        $_SESSION['email'] = $_POST['email'];
        echo $_SESSION['id_number']." ".$_SESSION['key'];
        header("location:form.php");
    }elseif ($check->num_rows == 0  && $check_for_importData->num_rows == 1) {
    // Manual Registration
       
        $sub = "Title:".$message['title']." ".$result['semester']." Semester  ".$result['sy'];

        $msg = "<p><i>".$_POST['id_number']."</i><span class='text-primary'><br><br>".$message['intro']."</span><br><br><span class='text-danger'>".$message['p_1'] ."</span><br><i> <a href='http://localhost/Capstone/pre-reg/verify.php?vkey=$vkey&email=".$_POST['email']."&id_number=".$_POST['id_number']."'>Register Account</a></i><br><br><span class='text-info'>".$message['p_2'] ."</span><br><br><span class='text-primary'>".$message['p_3'] ."</span><br><br><span class='text-success'>".$message['p_4'] ."</span><br><br><span class='text-warning'>".$message['p_5']."</span><br><br><span class='text-dark'>". $message['p_6']."</span><br><br><span class='text-secondary'>". $message['end']."</span></p>";;

        $to = $_POST['email'];
        $headers = "MIME-Version: 1.0"."\r\n";
        $headers.= "Content-type:text/html;charset=UTF-8"."\r\n";

        if(mail($to,$sub,$msg,$headers)){
            
            
            $_SESSION['message']="Check you Email for Registration link";
            $_SESSION['color']="green";
            header("location:reg.php");
            echo "1";
        }else{
            echo "<br>Email message Failed";
        }

      
    }else{
            $_SESSION['message']="Id number or Email has been taken!";
            $_SESSION['color']="red";
            echo 2;
            header("location:reg.php");
    }

}else{
  echo "error";
}


?>