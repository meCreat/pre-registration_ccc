<?php 
session_start();
date_default_timezone_set("Asia/Manila");
include 'dbcon.php';

$id_number = $_SESSION['id_number'];

$headers = "MIME-Version: 1.0"."\r\n";
$headers.= "Content-type:text/html;charset=UTF-8"."\r\n";

$mail = $conn->query('SELECT * FROM `email_message` WHERE `id` = "6"');
$mail1 = $conn->query('SELECT * FROM `email_message` WHERE `id` = "4"');
$mail = $mail->fetch_assoc();
$mail1 = $mail1->fetch_assoc();
$query1 = $conn->query('SELECT * FROM `reg_dates` ORDER BY `id` DESC LIMIT 1 ');
$result = $query1->fetch_assoc();

if (isset($_POST['reg']) && isset($_POST['data-privacy']) && isset($_POST['register']) && !isset($_POST['gradcan'])) {
	
	//Register only
	$conn->query("UPDATE email_accounts SET verified = '1' WHERE id_number = '$id_number'");
	$res = $conn->query("SELECT `email_accounts`.`id`, `email_accounts`.`id_number`, `email_accounts`.`email`, `student_info`.`surname`, `student_info`.`firstname`,`student_info`.`midname` FROM `email_accounts` LEFT JOIN student_info ON `email_accounts`.`id_number`=`student_info`.`id_number` WHERE email_accounts.id_number = '$id_number'");
	$rows = $res->fetch_assoc();
	$email = $rows['email'];
	$title = $mail['title'] ." - ". $result['semester']. " Semester " .$result['sy'];
	$date = date("Y-m-d D h:i:sa");
	$msg = '<p>'.$rows['surname'].','.$rows['firstname'].' '.$rows['midname'].'<br>'.$id_number.'<br><br>'. $mail['intro'].'<br><br>'.$mail['p_1']." ".$date."<br>" .'<br><br>'.$mail['p_2'] .'<br><br>'.$mail['p_3'].'<br><br>'.$mail['p_4'].'<br><br>'.$mail['p_5'].'<br><br>'. $mail['p_6'].'<br><br>'. $mail['end'].'</p>';

	if(mail($email, $title, $msg,$headers)){
	// register student
	$conn->query("UPDATE `student_data` SET status = 'registered' WHERE `id_number` = '".$id_number."' ");
	$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Student has been Registered.','".$_SESSION['id_number']."','$device','$md')");
	session_destroy();
	header('location:end');
	exit();

	}
}elseif(isset($_POST['reg']) && isset($_POST['data-privacy']) && isset($_POST['register']) && isset($_POST['gradcan'])){
	// Register and Graduating Candidate
	$conn->query("UPDATE `email_accounts` SET `verified` = '1' WHERE id_number = '$id_number'");
	$res = $conn->query("SELECT `email_accounts`.`id`, `email_accounts`.`id_number`, `email_accounts`.`email`, `student_info`.`surname`, `student_info`.`firstname`,`student_info`.`midname`, `student_data`.`graduating`  FROM `email_accounts` LEFT JOIN student_info ON `email_accounts`.`id_number`=`student_info`.`id_number` INNER JOIN student_data ON email_accounts.id_number = student_data.id_number WHERE email_accounts.id_number = '$id_number'");
	$rows = $res->fetch_assoc();

	$title = $mail['title'] ." - ". $result['semester']. " Semester " .$result['sy'];
	$email = $rows['email'];
	$msg = '<p>'.$rows['surname'].','.$rows['firstname'].' '.$rows['midname'].'<br>'.$id_number.'<br><br>'. $mail1['intro'].'<br><br>'.$mail1['p_1']." ".$date."<br>" .'<br><br>'.$mail1['p_2'] .'<br><br>'.$mail1['p_3'].'<br><br>'.$mail1['p_4'].'<br><br>'.$mail1['p_5'].'<br><br>'. $mail1['p_6'].'<br><br>'. $mail1['end'].'</p>';
	$name =$rows['surname'].", " .$rows['firstname']." ".$rows['midname'];
	$date = date("Y-m-d D h:i:sa");
	echo $name." ".$date;
	if(mail($email,$title, $msg ,$headers)){
	// register student
	$conn->query("UPDATE `student_data` SET status = 'registered', graduating = '1'  WHERE `id_number` = '".$id_number."' ");
	$conn->query("INSERT INTO `student_logs` (`action`, `id_number`,`device`,`mac_add`) VALUES ('Student has been Registered as Graduating.','".$_SESSION['id_number']."','$device','$md')");
	session_destroy();
	header('location:end');
	exit();

	}
}else{
	$_SESSION['message'] = "Sign all forms.";
 	header('location:form5');
 	exit();
}

?>