<?php 	
//for graduated_from variables
$intermediary =  ifNull(js_clean($_POST['intermediary_1']));
$inter_year_grad =  ifNull(js_clean($_POST['inter_year_grad']));
$inter_school_add =  ifNull(js_clean($_POST['inter_school_add_1']));

if($_POST['class'] == 3){

	// echo $_POST['intermediary'].$_POST['inter_year_grad'].$inter_school_add ;

	// echo $intermediary_1.$inter_year_grad_1.$inter_school_add_1;
	
	if($intermediary != false && $inter_year_grad != false && $inter_school_add != false && $form1 != false && $form2 != false){
		$stmt = $conn->prepare("INSERT INTO `grad_from` (`id_number` , `ALS`,`intermediary`, `inter_year_grad`, `inter_school_add`) VALUES ( ? , '1', ? , ? , ? )");
		$stmt->bind_param('ssss', $id_number, $intermediary_1, $inter_year_grad_1, $inter_school_add_1 );
		$stmt->execute();
	}
}else {

$secondary = ifNull(js_clean($_POST['secondary']));

$sec_school_add = ifNull(js_clean($_POST['sec_school_add']));
$sec_section = ifNull(js_clean($_POST['sec_section']));
$GWA = ifNull(inputNumbers(js_clean($_POST['GWA'])));
$date_grad = ifNull(js_clean($_POST['mon']))." ".ifNull(js_clean($_POST['year']));

echo "<br>".$intermediary."<br>".$inter_year_grad."<br>".$inter_school_add."<br>".$secondary."<br>".$sec_school_add."<br>".$sec_section."<br>".$GWA."<br>".$date_grad;

if($intermediary != false && $inter_year_grad != false && $inter_school_add != false && $secondary != false && $sec_school_add != false && $sec_section != false && $GWA != false && $date_grad != false &&  $form1 != false && $form2 != false) {
		echo "Hmmmm";

		$secondary = mysqli_real_escape_string($conn, $secondary);
		$sec_school_add = mysqli_real_escape_string($conn, $sec_school_add);
		$sec_section = mysqli_real_escape_string($conn, $sec_section);
		$GWA = mysqli_real_escape_string($conn, $GWA);
		$date_grad = mysqli_real_escape_string($conn, $date_grad);

		$conn->query("INSERT INTO `grad_from` (`id_number`,`ALS`, `intermediary`, `inter_year_grad`, `inter_school_add`, `secondary`, `sec_school_add`,`sec_section` , `GWA`, `date_grad`) VALUES ('".$id_number."','0','".$intermediary."','".$inter_year_grad."','".$inter_school_add."','".$secondary."','".$sec_school_add."','".$sec_section."','".$GWA."','".$date_grad."')");
	}
	if($_POST['class'] == 2){
	//for transferee variables

	$last_school_att = ifNull(js_clean($_POST['last_school_att']));
	$course_taken = ifNull(js_clean($_POST['course_taken']));
	$school_add = ifNull(js_clean($_POST['school_add']));


		echo $last_school_att.$course_taken.$school_add;
		if($last_school_att != false && $course_taken != false && $school_add != false && $form1 != false && $form2 != false){
			$last_school_att = mysqli_real_escape_string($conn, $last_school_att);
			$course_taken = mysqli_real_escape_string($conn, $course_taken);
			$school_add = mysqli_real_escape_string($conn, $school_add);

			$conn->query("INSERT INTO `transferee`(`id_number`, `last_school_att`, `course_taken`, `school_add`) VALUES ('$id_number','$last_school_att','$course_taken','$school_add')");
		}
	}

}



?> 