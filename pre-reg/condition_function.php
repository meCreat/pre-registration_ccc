<?php 
// if theres something
// session_start(); 
function inputLetters($c){
	$pattern2 = "/[0-9]+/";
	
	return preg_replace($pattern2, "", $c);
}


function inputNumbers($n){
	$pattern2 = "/[a-zA-Z\s!?#@$^&*(){}]+/";
	trim($n);
	return preg_replace($pattern2, "", $n);
	
}


function inputEmail($email){
	$pattern3 = "/^[a-zA-Z0-9_%+-]+@ccc.edu.ph/";
	trim($email);
	if(preg_match($pattern3, $email)){
		return $email;
	}else{

		return false;
		
	}
}


function ifNull($var){
	if(empty($var)){
		return false;
	}else{
		return $var;
	}
}

///////////////////////////////////////////////////////////////////////////////

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    if($d && $d->format($format) == $date){
    	return $date;
    }else{
    	return false;
    }
}


?>