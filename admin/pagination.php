<?php 
include "dbcon.php";
date_default_timezone_set('asia/manila');

$sql = $conn->query("SELECT * FROM reg_dates WHERE id = 19");
while($rows=$sql->fetch_assoc()){
    $date_now = time();
    $date_start = date_parse($rows['date_start']);  
    // print_r($date_start);
    $y = $date_start['year'];
    $m = $date_start['month'];
    $d = $date_start['day'];

    echo $y."-".$m."-".$d." Date Start<br>";
    $date_start = mktime(0,0,0,$m,$d,$y);
    
    // echo date("Y-m-d g:i:sa",$date_start);

    $date_end = date_parse($rows['date_end']);
    $y = $date_end['year'];
    $m = $date_end['month'];
    $d = $date_end['day'];
    echo date("Y-m-d ",$date_now)."Date now<br>";
    echo $y."-".$m."-".$d." Date end<br>";
    $date_end = mktime(0,0,0,$m,$d,$y);
    
    
    echo "<br>";

    if ($date_start < $date_now && $date_end > $date_now) {
        echo "yes";
    }else{
        echo "no";
    }
    echo "<br><br>";

}
// $dt = date_parse($rows['date/time']);
// print_r($dt);

$sql1 = $conn->query("SELECT * FROM email_accounts WHERE 1");
while($rows=$sql1->fetch_assoc()){
    $date = strtotime($rows['date/time']);
    echo $rows['id']."----".$rows['email']."----".$rows['verified']."----".date("M-d-Y H:i:s",$date)."-----";

    $datetime = date_parse($rows['date/time']);
    $y = $datetime['year'];
    $m = $datetime['month'];
    $d = $datetime['day'];
    $hour = $datetime['hour'] + 1;
    $min = $datetime['minute'];
    $sec = $datetime['second'];
    $datetime = mktime($hour,$min,$sec,$m,$d,$y);
    echo date("M-d-Y H:i:s",$datetime);
    
    if ($datetime <= $date_now && $rows['verified'] == 0) {
        $conn->query("DELETE FROM `email_accounts` WHERE id = '".$rows['id']."'");

    }elseif($datetime <= $date_now && $rows['verified'] == 1){
         echo "Remain";
    }else{
       echo "unverified";
    }
     echo "<br><br>";
    


}



$t = time();
echo "<br>".$t."<br>";
$y = date("Y",$t);
$y = $y + 1;
$m = date("m",$t);
$m = $m + 1 ;
$d = date("d",$t);
$d = $d + 1;
echo $m." ".$y. "<br>";

$datemk = mktime(0,0,0,$m ,$d, $y);
echo $datemk. "<br>";
$date = strtotime($t);
$date = date("m-d-Y",$datemk);
echo "<p>Date ".$date."</p>";

// for ($i=0; $i < 100; $i++) { 
//     // code...
//     $rand = rand(1000000,9999999);
// echo $rand . "<br>";
// }

?> 

<?php
if(isset($_POST['submit'])){
$name = $_POST['name'];
echo $name;
// $conn->query("INSERT INTO `test`( `name`) VALUES ('$name')");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https:///maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
     
        <input type="text" name="name" value="canlubang" required="">
 

    <input type="submit" name="submit">
    </form>
  
</body>
</html>


