<?php
include "dbcon.php";
echo $_POST['id_number'];
$check = $conn->query("SELECT * FROM email_accounts WHERE email = '".$_POST['email']."' OR id_number = '".$_POST['id_number']."'");
    while ($row = $check->fetch_array()) {
        

$resultVer = $row['verified'];
        $resultEmail = $row['email'];
        $resultIdnum = $row['id_number'];

        
        if(mail($to,$sub,$msg,$headers)){
            echo "<br>Email message Sent";
            $sql = "INSERT INTO email_accounts (vkey,email,id_number) VALUES ('$vkey','".$_POST['email']."','".$_POST['id_number']."')";
            
            $insert = $conn->query($sql);
            session_start();
            $_SESSION['message']="Check you Email for Verification";
            $_SESSION['color']="green";


        }else{
            echo "<br>Email message Failed";
        }
    }
?>