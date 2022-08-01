$(document).ready(function(){
	
	form1 = $('#form1');
	form2 = $('#form2');
	form3 = $('#form3');

	var valid = false;

	// Form1
	$('#next1').on('click',function(){
		var pattern1 = /^[a-z A-Z]*$/;
		var pattern2 = /^[0-9 11,]*$/;
		var pattern3 = /^[A-Za-z0-9\W+]*$/;

		var c_class = false;		
		var c_sname = true;		
		var c_fname = false;		
		var c_mname = false;		
		var c_dept = false;		
		var c_course = false;		
		var c_year_lvl = false;		
		var c_con = false;
		var c_add = false;
		var c_house = false;
		var c_st = false;
		var c_brgy = false;
		var c_city = false;
		var c_bday = false;
		var c_bplace = false;
		var c_gender = false;
		var c_ws = false;


		if ($('#g_father').is('input:checked')) {
			$('[value=Father]').show().prop('selected',true);
			$('#g_rel').attr('disabled','disabled');
			$('#g_rel_hidden').removeAttr('disabled','disabled').attr('value','Father').hide();
		}else if($('#g_mother').is('input:checked')){
			$('[value=Mother]').show().prop('selected',true);
			$('#g_rel').attr('disabled','disabled');
			$('#g_rel_hidden').removeAttr('disabled','disabled').attr('value','Mother').hide();
		}else if($('#g_other').is('input:checked')){
			$('[value=Father], [value=Mother]').hide().prop('selected',false);
			$('#g_rel').removeAttr('disabled','disabled');
			$('#g_rel_hidden').attr('disabled','disabled').attr('value','');
		}

		// Classification
		if($('#class , #class1 , #class2').is("input:checked")){
			$('#class_error').css("border","1px solid #34F458");		
			c_class = true;
		}else{
			
			$('#class_error').css("border","1px solid #F90A0A");
			$('#errorClass').text('Choose Classification.');

			$('#class , #class1, #class2').on('click',function(){
				$('#class_error').css("border","1px solid #34F458");
				$('#errorClass').text('');
			})
		}

		if($('#class1').is('input:checked')){
				if($('#next1').val() != 'Ed1'){
					$('#add_form').load('form4.php');
				}
			}else{
				$('#transferee').remove();
			}

		
		// Surname
		var sname = $('#sname');
		if(pattern1.test(sname.val()) && sname.val().length >= 1){
			sname.css("border","1px solid #34F458");
			c_sname = true;
		}else{
			sname.css("border","1px solid #F90A0A");
			$('#errorSname').show();
			sname.keyup(function(){
				if(pattern1.test(sname.val()) && sname.val().length >= 1){
					sname.css("border","1px solid #34F458");
					$('#errorSname').hide()
				}else{
					sname.css("border","1px solid #F90A0A");
					$('#errorSname').show();
				}
			});
		}


		//Firstname
		var fname = $('#fname');
		if(pattern1.test(fname.val()) && fname.val().length >= 1){
			fname.css("border","1px solid #34F458");
			c_fname = true;
		}else{
			fname.css("border","1px solid #F90A0A");
			$('#errorFname').show();
			fname.keyup(function(){
				if(pattern1.test(fname.val()) && fname.val().length >= 1){
					fname.css("border","1px solid #34F458");
					$('#errorFname').hide();
				}else{
					fname.css("border","1px solid #F90A0A");
					$('#errorFname').show();
				}
			});
		}

		//Midname
		var mname = $('#mname');
		if(pattern1.test(mname.val()) && mname.val() != ''){
			mname.css("border","1px solid #34F458");
			c_mname = true;
		}else if(mname.val() == ''){
			mname.css("border","1px solid #ffbf80");
			c_mname = true;
		}else{
			$('#errormname').show();
			mname.css("border","1px solid #F90A0A");
			mname.keyup(function(){
				if(pattern1.test(mname.val()) && mname.val() != ''){
					mname.css("border","1px solid #34F458");
					$('#errormname').hide();
				}else if(mname.val() == ''){
					mname.css("border","1px solid #ffbf80");
					$('#errormname').hide();
				}else{
					$('#errormname').show();
					mname.css("border","1px solid #F90A0A");
				}
			});
		}

		// Department
		var dept = $('#dept option:selected');
			if(dept.val() == ''){
				$('#dept').css("border","1px solid #F90A0A");
				$('#errorDept').show();
				$('#dept').on("change",function(){							
					$('#dept').css("border","1px solid #34F458");
						$('#errorDept').hide();
					});							
			}else{
				$('#dept').css("border","1px solid #34F458");
				c_dept = true;

			}

		// Course
		var course = $('#course option:selected');
			if(course.val() == ''){
				$('#course').css("border","1px solid #F90A0A");
				$('#errorCourse').show();
				$('#course').on("change",function(){							
					$('#course').css("border","1px solid #34F458");
					$('#errorCourse').hide();
					});							
			}else{
				$('#course').css("border","1px solid #34F458");
				c_course = true;
			}

		// Year Level
		var year_lvl = $('#year_lvl option:selected');
			if(year_lvl.val() == ''){
				$('#year_lvl').css("border","1px solid #F90A0A");
				$('#errorY_lvl').show();
				$('#year_lvl').on("change",function(){							
					$('#year_lvl').css("border","1px solid #34F458");
					$('#errorY_lvl').hide();
					
					});							
			}else{
				$('#year_lvl').css("border","1px solid #34F458");
				c_year_lvl = true;
			}

			if(year_lvl.val() == '4'){
				$('#gradcan').show();
			}else{
				$('#gradcan').hide();
			}
		// Contact Number
		con = $('#con');
		if(con.val().length >= 11 && pattern2.test(con.val())){
			$('#con').css("border","1px solid #34F458");
			c_con = true;
		}else{
			$('#con').css("border","1px solid #F90A0A");
			$('#errorContact').show();
			con.keyup(function(){
				if(con.val().length == 11 && pattern2.test(con.val())){
					$('#con').css("border","1px solid #34F458");
					$('#errorContact').hide();
				}else{
					$('#errorContact').show();
					$('#con').css("border","1px solid #F90A0A");	
				}			
			});
		}

		// Address????
		if($('#nc , #c').is("input:checked")){
			$('#add_error').css("border","1px solid #34F458");
			c_add = true;
		}else{
			$('#add_error').css("border","1px solid #F90A0A");
			$('#errorLoc').show();
			$('#nc , #c').on('click',function(){
				$('#add_error').css("border","1px solid #34F458");
				$('#errorLoc').hide();
				$('#error').hide();
			})
		}

		// House Number
		if($('#nc , #c').is("input:checked")){
		house = $('#house_num');
		if(house.val().length >= 2 && pattern3.test(house.val())){
			$('#house_num').css("border","1px solid #34F458");
			c_house = true;
		}else{
			$('#errorHouseNum').show();
			$('#house_num').css("border","1px solid #F90A0A");
			house.keyup(function(){
				if(house.val().length >= 2 && pattern3.test(house.val())){
					$('#house_num').css("border","1px solid #34F458");	
					$('#errorHouseNum').hide();				
				}else{
					$('#house_num').css("border","1px solid #F90A0A");
					$('#errorHouseNum').show();
					}				
			});
		}
		
		// Street Purok		
		st = $('#street_purok');
		if(st.val().length >= 2 && pattern3.test(st.val())){
			$('#street_purok').css("border","1px solid #34F458");
			c_st = true;
		}else{
			$('#errorPurok').show();
			$('#street_purok').css("border","1px solid #F90A0A");
			st.keyup(function(){
				if(st.val().length >= 2 && pattern3.test(st.val())){
					$('#errorPurok').hide();
					$('#street_purok').css("border","1px solid #34F458");					
				}else{
				$('#errorPurok').show();
					$('#street_purok').css("border","1px solid #F90A0A");	
					}			
			});
		}
		}

		// Calamba area		
		if ($('#c').is('input:checked')) {
			c_city = true;
			// Barangay Dropdown
			
			brgy = $('#brgy option:selected');
			if(brgy.val() == ''){
					$('#brgy').css("border","1px solid #F90A0A");
					$('#errorBrgy').show();
					$('#brgy').on("change",function(){							
						$('#brgy').css("border","1px solid #34F458");
						$('#errorBrgy').hide();
						});		

				}else{
					
					$('#brgy').css("border","1px solid #34F458");
					c_brgy = true;
				}
		}


		// Not Calamba area
		if($('#nc').is('input:checked')){
			// Barangay
			brgy = $('#brgy');
			if(brgy.val().length >= 2 && pattern3.test(brgy.val())){
				$('#brgy').css("border","1px solid #34F458");
				c_brgy = true;
			}else{
				$('#brgy').css("border","1px solid #F90A0A");

				$('#errorBrgy').show();
				brgy.keyup(function(){
					if(brgy.val().length >= 2 && pattern3.test(brgy.val())){
						$('#brgy').css("border","1px solid #34F458");
						$('#errorBrgy').hide();					
					}else{
						$('#brgy').css("border","1px solid #F90A0A");
						$('#errorBrgy').show();				
					}
				});
			}

			// City			
			city = $('#city');
			if(city.val().length >= 2 && pattern3.test(city.val())){
				$('#city').css("border","1px solid #34F458");
				c_city = true;
			}else{
				$('#city').css("border","1px solid #F90A0A");
				$('#errorCity').show();	
				city.keyup(function(){
					if(city.val().length >= 2 && pattern3.test(city.val())){
						$('#city').css("border","1px solid #34F458");
						$('#errorCity').hide();						
					}else{
						$('#city').css("border","1px solid #F90A0A");
						$('#errorCity').show();		
						}			
				});
			}
		}


		// Birthday
		var date = new Date();
		y = date.getFullYear();
		m = date.getMonth();
		d = date.getDate();
		date.setFullYear(y-6,m,d);
		bd = $('#bday').val();
		bd = new Date(bd);
		bd.getFullYear();

		
		var bday = $('#bday');
		if (bday.val().length != 0 && bd < date) {
			$('#bday').css("border","1px solid #34F458");
			c_bday = true;
		}else{
			$('#errorBday').show();
			$('#bday').css("border","1px solid #F90A0A");
			bday.blur(function(){
			bd = $('#bday').val();
			bd = new Date(bd);
			bd.getFullYear();
			c_bday = false;
			if (bday.val().length != 0 && bd < date) {
				$('#errorBday').hide();
				$('#bday').css("border","1px solid #34F458");
				c_bday = true;
			}else{
				c_bday = false;
				$('#errorBday').show();	
				$('#bday').css("border","1px solid #F90A0A");
			}
			});
		}
		console.log(c_bday)

		//Place of Birth
		
		var bplace = $('#place_birth');
		if(pattern3.test(bplace.val()) && bplace.val().length >= 1){
			bplace.css("border","1px solid #34F458");
			c_bplace = true;
		}else{
			$('#errorBplace').show();
			bplace.css("border","1px solid #F90A0A");
			bplace.keyup(function(){
				if(pattern3.test(bplace.val()) && bplace.val().length >= 1){
					bplace.css("border","1px solid #34F458");
					$('#errorBplace').hide();
		
				}else{
					$('#errorBplace').show();
					bplace.css("border","1px solid #F90A0A");
				}
			});
		}

		// Gender
		
		if($('#g1 , #g2').is("input:checked")){
			$('#gender_error').css("border","1px solid #34F458");
			c_gender = true;
		}else{
			$('#errorGender').show();
			$('#gender_error').css("border","1px solid #F90A0A");
			$('#g1 , #g2').on('click',function(){
				$('#errorGender').hide();
				$('#gender_error').css("border","1px solid #34F458");
			})
		}

		// Working Student
		
		if($('#yes , #no').is("input:checked")){
			$('#ws_error').css("border","1px solid #34F458");
			c_ws = true;
		}else{
			$('#errorWorking').show();
			$('#ws_error').css("border","1px solid #F90A0A");
			$('#yes , #no').on('click',function(){
				$('#errorWorking').hide();
				$('#ws_error').css("border","1px solid #34F458");
			})
		}

		cl = $('[name="class"]:checked').val();
		if (cl == 3) {
			$('#next2').attr({'value':'Next'});
		}else{
			$('#next2').attr({'value':'Next'});
		}

		// Linking to wrong input
		var arrayError = ["#rd1","#rd2","#rd3","#rd4","#rd6","#rd7","#rd8",
		"#rd9",'#rd10',"#rd11","#rd12","#rd13","#rd14","#rd15","#rd16","#rd17","#rd18"];

			if(c_class == false){
				putWarningTag(arrayError, 0);
			}else if(c_sname == false){
				putWarningTag(arrayError , 1);
			}else if(c_fname == false){
				putWarningTag(arrayError , 2);
			}else if(c_mname == false){
				putWarningTag(arrayError , 3);
			}else if(c_dept == false){
				putWarningTag(arrayError , 4);
			}else if(c_course == false){
				putWarningTag(arrayError , 5);
			}else if(c_year_lvl == false){
				putWarningTag(arrayError , 6);
			}else if(c_con == false){
				putWarningTag(arrayError , 7);
			}else if(c_add == false){
				putWarningTag(arrayError , 8);
			}else if(c_house == false){
				putWarningTag(arrayError , 9);
			}else if(c_st == false){
				putWarningTag(arrayError , 10);
			}else if(c_brgy == false){
				putWarningTag(arrayError , 11);
			}else if(c_bday == false){
				putWarningTag(arrayError , 12);
			}else if(c_bplace == false){
				putWarningTag(arrayError , 13);
			}else if(c_gender == false){
				putWarningTag(arrayError , 14);
			}else if(c_ws == false){
				putWarningTag(arrayError , 15);
			}

		function putWarningTag(array , num){
			console.log(array[num], 'asd');
				window.location.href = array[num];
		} 

		// Validation of Boolean Variables to proceed next step
		console.log(c_add ,c_house, c_st, c_brgy, c_city);
		var valid = false;
		if(c_sname != false && c_class != false && c_fname != false && c_mname != false && c_dept != false &&
			c_course != false && c_year_lvl != false && c_con != false && c_add != false && c_house != false &&
			c_st != false && c_brgy != false && c_city != false && c_bplace != false && c_gender != false && c_ws != false && c_bday != false){
			valid = true
		}
		console.log($('#next1').val())

		var Ed1 = $('#next1').val();
		var c = $('[name="class"]').val();
		if(valid == true && Ed1 == 'Ed1'){
			// To Validation Area
			window.location.href = '#top';
			form1.hide(100);
			$('.head').hide();
			$('#form_validate').show(100);
			inputValidate1(arrayPersonalInfo,'p');

		}else if($('#next1').val() == 'editFmen' && valid == true){
			// To Form 3
			window.location.href = '#top';
			form1.hide();
			form2.hide();
			form3.show();
			$('#formALS').hide();
			$('#back2').remove();
			inputValidate1(arrayPersonalInfo,'p');
			$('#ALS_grad').hide();
			$('#ALS_change').show();

		}else if($('#next1').val() == 'editTrans' && valid == true){
			window.location.href = '#top';
			form1.hide();
			form2.hide();
			form3.show();
			$('#formALS').hide();
			$('#ALS_grad').hide();
			$('#ALS_change').show();
			inputValidate1(arrayPersonalInfo,'p');

		}else if($('#next1').val() == 'editAls' && valid == true){
			window.location.href = '#top';
			form1.hide();
			form2.hide();
			form3.hide();
			$('#formALS').show();
			inputValidate1(arrayPersonalInfo,'p');
			$('#ALS_grad').show();
			$('#ALS_change').hide();

		}else if(valid == true){
			window.location.href = '#top';
			form1.hide(100);
			form2.show(100);
		}

		
		
	})

	
	var arrayPersonalInfo = ["[name='id_number']","#sname","#fname","#mname","[name='ext']","#dept","#course","#year_lvl",
	"#con","#house_num","#street_purok","#brgy","#city","#bday","#place_birth","[name='gender']","[name='working']"];

	function inputValidate1(value,id) {
		count = value.length;
	
		for (var i = 0; i < count; i++) {
			if($(value[i]).val() == ''){
				$('.'+id+i).text('---');				
			}else if(value[i] == '#dept'){
				$('.'+id+i).text($('#dept [value="'+$(value[i]).val()+'"]').text());
			}else if(value[i] == '#course'){
				$('.'+id+i).text($('#course [value="'+$(value[i]).val()+'"]').text());
			}else{
				$('.'+id+i).text($(value[i]).val());
			}			
		}		
	}


	function g_relations(){
	
	}
})
