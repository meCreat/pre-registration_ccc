<?php 

require 'dbcon.php';

date_default_timezone_set('asia/manila');
$date_now = time();
$sql1 = $conn->query("SELECT email_accounts.id_number AS id,email_accounts.datetime,email_accounts.vkey, email_accounts.verified, student_data.status FROM student_data RIGHT JOIN email_accounts ON email_accounts.id_number = student_data.id_number WHERE 1 ");
while($rows=$sql1->fetch_assoc()){
    $date = strtotime($rows['datetime']);
    $datetime = date_parse($rows['datetime']);
    $y = $datetime['year'];
    $m = $datetime['month'];
    $d = $datetime['day'];
    $hour = $datetime['hour'] + 1;
    $min = $datetime['minute'];
    $sec = $datetime['second'];
    $datetime = mktime($hour,$min,$sec,$m,$d,$y);
    $datetime1 = mktime($hour + 1,$min,$sec,$m,$d,$y);
    // echo date("M-d-Y H:i:s",$datetime);

    // if ($datetime <= $date_now && $rows['verified'] == 0) {
    //     $conn->query("DELETE FROM `email_accounts` WHERE id_number = '".$rows['id']."'");
    //     session_destroy();

    // }
    // elseif($datetime1 <= $date_now && $rows['verified'] == 1) {
    //     $conn->query("DELETE student_data.* , email_accounts.*, student_info.*, `g/p_info`.*, `grad_from`.*, `transferee`.*  FROM email_accounts LEFT JOIN student_data ON student_data.id_number = email_accounts.id_number LEFT JOIN student_info ON student_info.id_number = email_accounts.id_number LEFT JOIN `g/p_info` ON `g/p_info`.id_number = email_accounts.id_number LEFT JOIN `grad_from` ON `grad_from`.id_number = email_accounts.id_number LEFT JOIN `transferee` ON `transferee`.id_number = email_accounts.id_number WHERE email_accounts.id_number  = '".$rows['id']."'");

    //     session_destroy();
    // }

        // echo date("M-d-Y H:i:s",$datetime);
}

?>

