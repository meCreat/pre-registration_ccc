$(document).ready(function(){
	
	var pattern1 = /^[a-z A-Z]*$/;
	var pattern2 = /^[0-9]*$/;
	var pattern3 = /^[A-Za-z0-9\W+]*$/;

	valid2 = false;
	valid1 = true;

	$('[name=submit]').on('click',function(){
	valid2 = false;
	valid1 = true;

	var c_f = false;
	var c_fygrad = false;
	var c_fadd = false;
	var c_s = false;
	var c_sadd = false;
	var c_ssection = false;
	var c_sgwa = false;
	var c_smon = false;
	var c_syear = false;

		// Intermediate
		// School name
		f = $('#1st');
		if(pattern1.test(f.val()) && f.val().length >= 4){
			f.css("border","1px solid #34F458");
			c_f = true;
		}else{
			$('#error1st').show();
			f.css("border","1px solid #F90A0A");
			f.keyup(function(){
				if(pattern1.test(f.val()) && f.val().length >= 4){
					f.css("border","1px solid #34F458");
					$('#error1st').hide();
				}else{
					$('#error1st').show();
					f.css("border","1px solid #F90A0A");
				}
			});
		}

		// Year Grad
		f_ygrad = $('#1st_ygrad');
		var date = new Date();
		y = date.getFullYear();
		
		if (f_ygrad.val() < y) {
			f_ygrad.css("border","1px solid #34F458");
			c_fygrad = true;
		}else{
			$('#error1st_ygrad').show();
			f_ygrad.css("border","1px solid #F90A0A");
			f_ygrad.on('change',function(){
			if (f_ygrad.val() < y) {
				$('#error1st_ygrad').hide();
				f_ygrad.css("border","1px solid #34F458");
				c_fygrad = true;
		}else{
			f_ygrad.css("border","1px solid #F90A0A");
			$('#error1st_ygrad').show();
			}
			});
		}

		// Address
		f_add = $("#1st_add");
		if(pattern3.test(f_add.val()) && f_add.val().length >= 4){
			f_add.css("border","1px solid #34F458");
			c_fadd = true;
		}else{
			$('#error1st_add').show();
			f_add.css("border","1px solid #F90A0A");
			f_add.keyup(function(){
				if(pattern3.test(f_add.val()) && f_add.val().length >= 4){
					f_add.css("border","1px solid #34F458");
					$('#error1st_add').hide();
				}else{
					$('#error1st_add').show();
					f_add.css("border","1px solid #F90A0A");
				}
			});
		}
		//Intermid End

		// Secondary
		// School name
		s = $('#2nd');
		if(pattern1.test(s.val()) && s.val().length >= 4){
			s.css("border","1px solid #34F458");
			c_s = true;
		}else{
			$('#error2nd').show();
			s.css("border","1px solid #F90A0A");
			s.keyup(function(){
				if(pattern1.test(s.val()) && s.val().length >= 4){
					s.css("border","1px solid #34F458");
					$('#error2nd').hide();			
				}else{
					$('#error2nd').show();
					s.css("border","1px solid #F90A0A");
				}
			});
		}

		// Address
		s_add = $("#2nd_add");
		if(pattern3.test(s_add.val()) && s_add.val().length >= 4){
			s_add.css("border","1px solid #34F458");
			c_sadd = true;
		}else{
			$('#error2nd_shool_add').show();
			s_add.css("border","1px solid #F90A0A");
			s_add.keyup(function(){
				if(pattern3.test(s_add.val()) && s_add.val().length >= 4){
					s_add.css("border","1px solid #34F458");
					$('#error2nd_shool_add').hide();					
				}else{
					$('#error2nd_shool_add').show();
					s_add.css("border","1px solid #F90A0A");
				}
			});
		}

		// Section
		s_section = $('#2nd_section');

		if(s_section.val() != 0){
			s_section.css("border","1px solid #34F458");
			c_ssection = true;
		}else{
			$('#error2nd_sec').show();
			s_section.css("border","1px solid #F90A0A");
			s_section.keyup(function(){
				if(s_section.val() != 0){
					$('#error2nd_sec').hide();
					s_section.css("border","1px solid #34F458");
					
				}else{
					$('#error2nd_sec').show();
					s_section.css("border","1px solid #F90A0A");
				}
			});
		}

		// GWA
		s_gwa = $('#2nd_gwa');

		if(pattern2.test(s_gwa.val()) && s_gwa.val().length != 0){

			s_gwa.css("border","1px solid #34F458");
			c_sgwa = true;
		}else{
			$('#error2nd_gwa').show();
			s_gwa.css("border","1px solid #F90A0A");
			s_gwa.keyup(function(){
				if(pattern2.test(s_gwa.val()) && s_gwa.val().length != 0){
					$('#error2nd_gwa').hide();
					s_gwa.css("border","1px solid #34F458");				
				}else{
					$('#error2nd_gwa').show();
					s_gwa.css("border","1px solid #F90A0A");
				}
			});
		}

		// Month Grad
		s_mon = $('#2nd_mon option:selected');

		if(s_mon.val() == ''){
			$('#2nd_mon').css("border","1px solid #F90A0A");
			$('#error2nd_mon').show();
			$('#2nd_mon').on("change",function(){							
				$('#2nd_mon').css("border","1px solid #34F458");
				$('#error2nd_mon').hide();
				});							
		}else{
			$('#2nd_mon').css("border","1px solid #34F458");
			c_smon = true;
		}


		// Year Grad
		s_year = $('#2nd_year option:selected');
		var date = new Date();
		y = date.getFullYear();
		
		if (s_year.val() <= y && s_year.val() != '') {
			$('#2nd_year').css("border","1px solid #34F458");
			c_syear = true;
		}else{
			$('#error2nd_yr').show();
			$('#2nd_year').css("border","1px solid #F90A0A");
			$('#2nd_year').on('change',function(){
			if ($('#2nd_year').val() <= y && $('#2nd_year').val() != '') {
				$('#2nd_year').css("border","1px solid #34F458");
				$('#error2nd_yr').hide();
				c_syear = true;
			}else{
				$('#error2nd_yr').show();
				$('#2nd_year').css("border","1px solid #F90A0A");
				}
			});
		}
		// Secondary End

		if(	c_f != false && c_fygrad != false && c_fadd != false && 
			c_s != false && c_sadd != false && c_ssection != false && c_sgwa != false && c_smon != false && c_syear != false){

			valid2 = true;
		}

		// Error Show linking
		if(c_f == false){
			goToLinkED(1);	
		}else if(c_fygrad == false){
			goToLinkED(2);
		}else if(c_fadd == false){
			goToLinkED(3);
		}else if(c_s == false){
			goToLinkED(4);
		}else if(c_sadd == false){
			goToLinkED(5);
		}else if(c_sgwa == false){
			goToLinkED(6);
		}else if(c_smon == false){
			goToLinkED(7);
		}else if(c_syear == false){
			goToLinkED(8);
		}

// Add Form 4
		if($('[name=appear]').val() == 1 ){
			valid1 = false;
			c_last_att = false;
			c_last_course = false;
			c_last_add = false;

			// Last Shool attended
			last_att = $('#last_att');
			if(pattern1.test(last_att.val()) && last_att.val().length >= 4){
				last_att.css("border","1px solid #34F458");
				c_last_att = true;
			}else{
				$('#errorLastschool').show();
				last_att.css("border","1px solid #F90A0A");
				last_att.keyup(function(){
					if(pattern1.test(last_att.val()) && last_att.val().length >= 4){
						last_att.css("border","1px solid #34F458");
						$('#errorLastschool').hide();
						
					}else{
						$('#errorLastschool').show();
						last_att.css("border","1px solid #F90A0A");
					}
				});
			}
			// Last Course
			last_course = $('#last_course');
			if(pattern1.test(last_course.val()) && last_course.val().length >= 14){
				last_course.css("border","1px solid #34F458");
				c_last_course = true;
			}else{
				last_course.css("border","1px solid #F90A0A");
				$('#errorLastcourse').show();
				last_course.keyup(function(){
					if(pattern1.test(last_course.val()) && last_course.val().length >= 14){
						last_course.css("border","1px solid #34F458");
						$('#errorLastcourse').hide();
					}else{
						$('#errorLastcourse').show();
						last_course.css("border","1px solid #F90A0A");
					}
				});
		
			}

			// Last Course
			last_add = $('#last_add');
			if(pattern3.test(last_add.val()) && last_add.val().length >= 4){
				last_add.css("border","1px solid #34F458");
				c_last_add = true;
			}else{
				$('#errorLastadd').show();
				last_add.css("border","1px solid #F90A0A");
				last_add.keyup(function(){
					if(pattern3.test(last_add.val()) && last_add.val().length >= 4){
						last_add.css("border","1px solid #34F458");
						$('#errorLastadd').hide();
					}else{
						$('#errorLastadd').show();
						last_add.css("border","1px solid #F90A0A");
					}
				});
		
			}	
		if(c_last_att != false && c_last_course != false && c_last_add != false){
			valid1 = true;

		}
		console.log('other', valid2, valid1);
		}// End Form 4
		
		if (valid1 != true && valid2 != true) {
			alert('Comlete the Form!');
			}
		


		// Showing the Validation Section
		$('#haf').submit(function(){
		if (valid1 == true && valid2 == true) {
			return true;
			}
		})


	});

	// ALS validation
	$('#submit_ALS').on('click',function(){
	valid_Als = false;
	var c_f = false;
	var c_fygrad = false;
	var c_fadd = false;
	f = $('#als');
		if(pattern1.test(f.val()) && f.val().length >= 4){
			f.css("border","1px solid #34F458");
			c_f = true;
		}else{
			$('#errorals').show();
			f.css("border","1px solid #F90A0A");
			f.keyup(function(){
				if(pattern1.test(f.val()) && f.val().length >= 4){
					f.css("border","1px solid #34F458");
					$('#errorals').hide();
				}else{
					$('#errorals').show();
					f.css("border","1px solid #F90A0A");
				}
			});
		}

		// Year Grad
		f_ygrad = $('#als_ygrad');
		var date = new Date();
		y = date.getFullYear();
		
		if (f_ygrad.val() <= y) {
			f_ygrad.css("border","1px solid #34F458");
			c_fygrad = true;
		}else{
			$('#errorals_ygrad').show();
			f_ygrad.css("border","1px solid #F90A0A");
			f_ygrad.on('change',function(){
			if (f_ygrad.val() <= y) {
				$('#errorals_ygrad').hide();
				f_ygrad.css("border","1px solid #34F458");
				c_fygrad = true;
			}else{
			f_ygrad.css("border","1px solid #F90A0A");
			$('#errorals_ygrad').show();
			}
			});
		}

		// Address
		f_add = $("#als_add");
		if(pattern3.test(f_add.val()) && f_add.val().length >= 4){
			f_add.css("border","1px solid #34F458");
			c_fadd = true;
		}else{
			$('#errorals_add').show();
			f_add.css("border","1px solid #F90A0A");
			f_add.keyup(function(){
				if(pattern3.test(f_add.val()) && f_add.val().length >= 4){
					f_add.css("border","1px solid #34F458");
					$('#errorals_add').hide();
				}else{
					$('#errorals_add').show();
					f_add.css("border","1px solid #F90A0A");
				}
			});
		}

		if(	c_f != false && c_fygrad != false && c_fadd != false){
			valid_Als = true;
		}else{
			valid_Als = false;
			alert('Complete the Form!');
		}

		if(c_f == false){
			goToLinkED(1);	
		}else if(c_fygrad == false){
			goToLinkED(2);
		}else if(c_fadd == false){
			goToLinkED(3);
		}

		 
		$('#haf').submit(function(){
			if (valid_Als == true) {
			return true;

			}
		})
		
	});

	function goToLinkED(num){
		window.location.href = '#sg'+num;
	} 

})