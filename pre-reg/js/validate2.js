$(document).ready(function(){
	
	var pattern1 = /^[a-z A-Z]*$/;
	var pattern2 = /^[0-9]*$/;
	var pattern3 = /^[A-Za-z0-9\W+]*$/;
	form1 = $('#form1');
	form2 = $('#form2');
	form3 = $('#form3');

	
	var valid = false;
	var sub = false;

	$('#next2').on('click',function(){
	var valid = false;
	var sub = false;

	var c_fsname = false; 
	var c_ffname = false;
	var c_fmname = false;
	var c_focc = false;
	var c_fbday = false;
	var c_fcon = false;
	var c_msname = false;
	var c_mfname = false;
	var c_mmname = false;
	var c_mocc = false;
	var c_mbday = false;
	var c_mcon = false; 
	var guardian_select = false;
	var c_gsname = false;
	var c_gfname = false;
	var c_gmname = false;
	var c_grel = false;
	var c_gocc = false;
	var c_gbday = false;
	var c_gcon = false;
	var c_gadd = false;

		// Fathers Info
		// Surname
		fsname = $('#f_sname');
		if(pattern1.test(fsname.val()) && fsname.val().length >= 1){
			fsname.css("border","1px solid #34F458");
			c_fsname = true;
		}else{
			fsname.css("border","1px solid #F90A0A");
			$('#errorFsname').show();
			fsname.keyup(function(){
				if(pattern1.test(fsname.val()) && fsname.val().length >= 1){
					fsname.css("border","1px solid #34F458");
					$('#errorFsname').hide();
				}else{
					fsname.css("border","1px solid #F90A0A");
					$('#errorFsname').show();
				}
			});
		}
		// First name 
		ffname = $('#f_fname');
		if(pattern1.test(ffname.val()) && ffname.val().length >= 1){
			ffname.css("border","1px solid #34F458");
			c_ffname = true;
		}else{
			$('#errorFfname').show();
			ffname.css("border","1px solid #F90A0A");
			ffname.keyup(function(){
				if(pattern1.test(ffname.val()) && ffname.val().length >= 1){
					ffname.css("border","1px solid #34F458");
					$('#errorFfname').hide();
					
				}else{
					ffname.css("border","1px solid #F90A0A");
					$('#errorFfname').show();
				}
			});
		}

		//Midname
		var fmname = $('#f_mname');
		if(pattern1.test(fmname.val()) && fmname.val() != ''){
			fmname.css("border","1px solid #34F458");
			c_fmname = true;
		}else if(fmname.val() == ''){
			fmname.css("border","1px solid #ffbf80");
			c_fmname = true;
		}else{
			$('#errorFmname').show();
			fmname.css("border","1px solid #F90A0A");
			fmname.keyup(function(){
				if(pattern1.test(fmname.val()) && fmname.val() != ''){
					fmname.css("border","1px solid #34F458");
					$('#errorFmname').hide();
				}else if(fmname.val() == ''){
					fmname.css("border","1px solid #ffbf80");
					$('#errorFmname').hide();
				}else{
					$('#errorFmname').show();
					fmname.css("border","1px solid #F90A0A");
				}
			});
		}

		// Occupation
		var f_occ = $('#f_occ option:selected');
			if(f_occ.val() == ''){
				$('#f_occ').css("border","1px solid #F90A0A");
				$('#errorFocc').show();
				$('#f_occ').on("change",function(){							
					$('#f_occ').css("border","1px solid #34F458");		
					$('#errorFocc').hide();
					$('#errorFcon').hide();	
					$('#f_con').css("border","1px solid");		
					});							
			}else{
				$('#f_occ').css("border","1px solid #34F458");
				c_focc = true;
			}

		//Birthday
		var date = new Date();
		y = date.getFullYear();
		m = date.getMonth();
		d = date.getDate();
		date.setFullYear(y-6,m,d);
		fbd = $('#f_bday').val();
		fbd = new Date(fbd);
		fbd.getFullYear();

		
		var fbday = $('#f_bday');
		if (fbday.val().length != 0 && fbd < date) {
			$('#f_bday').css("border","1px solid #34F458");
			c_fbday = true;
		}else{
			$('#errorFbday').show();	
			$('#f_bday').css("border","1px solid #F90A0A");
			fbday.blur(function(){
			fbd = $('#f_bday').val();
			fbd = new Date(fbd);
			fbd.getFullYear();
			if (fbday.val().length != 0 && fbd < date) {
				$('#errorFbday').hide();
				$('#f_bday').css("border","1px solid #34F458");
				c_fbday = true;
		}else{
			$('#f_bday').css("border","1px solid #F90A0A");
			}
			});
		}

		// Contact Number
		fcon = $('#f_con');
		if(fcon.val().length == 11 && pattern2.test(fcon.val())){
			$('#f_con').css("border","1px solid #34F458");
			c_fcon = true;
		}else if($('#f_occ option:selected').val() == 'Deceased'){
			$('#f_con').css("border","1px solid #34F458");
			console.log("Deceased");
			c_fcon = true;

		}else{
			$('#errorFcon').show();
			$('#f_con').css("border","1px solid #F90A0A");
			fcon.keyup(function(){
				if(fcon.val().length == 11 && pattern2.test(fcon.val())){
					$('#errorFcon').hide();
					$('#f_con').css("border","1px solid #34F458");
				}else{
					$('#errorFcon').show();
					$('#f_con').css("border","1px solid #F90A0A");				
				}
			});
		}
		//Father Info End

		//Mother Info
		// Surname
		msname = $('#m_sname');
		if(pattern1.test(msname.val()) && msname.val().length >= 1){
			msname.css("border","1px solid #34F458");
			c_msname = true;
		}else{
			msname.css("border","1px solid #F90A0A");
			$('#errorMsname').show();
			msname.keyup(function(){
				if(pattern1.test(msname.val()) && msname.val().length >= 1){
					msname.css("border","1px solid #34F458");
					$('#errorMsname').hide();
				}else{
					msname.css("border","1px solid #F90A0A");
					$('#errorMsname').show();
				}
			});
		}

		// First name
		mfname = $('#m_fname');
		if(pattern1.test(mfname.val()) && mfname.val().length >= 1){
			mfname.css("border","1px solid #34F458");
			c_mfname = true;
		}else{
			$('#errorMfname').show();
			mfname.css("border","1px solid #F90A0A");
			mfname.keyup(function(){
				if(pattern1.test(mfname.val()) && mfname.val().length >= 1){
					mfname.css("border","1px solid #34F458");
					$('#errorMfname').hide();
					
				}else{
					$('#errorMfname').show();
					mfname.css("border","1px solid #F90A0A");
				}
			});
		}

		//Midname
		var mmname = $('#m_mname');
		if(pattern1.test(mmname.val()) && mmname.val() != ''){
			mmname.css("border","1px solid #34F458");
			c_mmname = true;
		}else if(mmname.val() == ''){
			mmname.css("border","1px solid #ffbf80");
			c_mmname = true;
		}else{
			$('#errorMmname').show();
			mmname.css("border","1px solid #F90A0A");
			mmname.keyup(function(){
				if(pattern1.test(mmname.val()) && mmname.val() != ''){
					mmname.css("border","1px solid #34F458");
					$('#errorMmname').hide();
				}else if(mmname.val() == ''){
					mmname.css("border","1px solid #ffbf80");
					$('#errorMmname').hide();
				}else{
					mmname.css("border","1px solid #F90A0A");
					$('#errorMmname').show();
				}
			});
		}

		// Occupation
		var m_occ = $('#m_occ option:selected');
			if(m_occ.val() == ''){
				$('#errorMocc').show();
				$('#m_occ').css("border","1px solid #F90A0A");
				$('#m_occ').on("change",function(){		
					$('#errorMocc').hide();
					$('#m_occ').css("border","1px solid #34F458");					
					});							
			}else{

				$('#m_occ').css("border","1px solid #34F458");
				c_mocc = true;
			}

		//Birthday
		var date1 = new Date();
		y1 = date1.getFullYear();
		m1 = date1.getMonth();
		d1 = date1.getDate();
		date1.setFullYear(y1-6,m1,d1);
		mbd = $('#m_bday').val();
		mbd = new Date(mbd);
		mbd.getFullYear();

		
		var mbday = $('#m_bday');
		if (mbday.val().length != 0 && mbd < date1) {
			$('#m_bday').css("border","1px solid #34F458");
			c_mbday = true;
		}else{
			$('#errorMbday').show();
			$('#m_bday').css("border","1px solid #F90A0A");
			mbday.blur(function(){
			mbd = $('#m_bday').val();
			mbd = new Date(mbd);
			mbd.getFullYear();
			if (mbday.val().length != 0 && mbd < date1) {
				$('#errorMbday').hide();
				$('#m_bday').css("border","1px solid #34F458");
				c_mbday = true;
		}else{
			$('#errorMbday').show();
			$('#m_bday').css("border","1px solid #F90A0A");
			}
			});
		}

		// Contact Number
		mcon = $('#m_con');
		if(mcon.val().length == 11 && pattern2.test(mcon.val())){
			$('#m_con').css("border","1px solid #34F458");
			c_mcon = true;
		}else if($('#m_occ option:selected').val() == 'Deceased'){
			$('#m_con').css("border","1px solid #34F458");
			console.log("Deceased");
			$('#errorMcon').hide();
			c_mcon = true;
		}else{
			$('#errorMcon').show();
			$('#m_con').css("border","1px solid #F90A0A");
			mcon.keyup(function(){
				if(mcon.val().length == 11 && pattern2.test(mcon.val())){
					$('#errorMcon').hide();
					$('#m_con').css("border","1px solid #34F458");
				}else{
					$('#errorMcon').show();
					$('#m_con').css("border","1px solid #F90A0A");	
				}			
			});
		}
		// Mother Info End

		// Select a Guardian
		selected_g = $('[name="g"]').val();
		if(selected_g != 3){
			if($('#f_occ').val() == 'Deceased'){
				guardian_select = false;
				$('#errorFcon').hide();
			}else if($('#m_occ').val() == 'Deceased'){
				guardian_select = false;
				$('#errorMcon').hide();
			}
		}

		// Guardian Info
		// Surname
	if($('#g_father , #g_mother , #g_other').is("input:checked")){
		gsname = $('#g_sname');
		if(pattern1.test(gsname.val()) && gsname.val().length >= 1){
			gsname.css("border","1px solid #34F458");3
			$('#errorGsname').hide();
			c_gsname = true;
		}else{
			$('#errorGsname').show();
			gsname.css("border","1px solid #F90A0A");
			gsname.keyup(function(){
				if(pattern1.test(gsname.val()) && gsname.val().length >= 1){
					gsname.css("border","1px solid #34F458");
					$('#errorGsname').hide();
				}else{
					gsname.css("border","1px solid #F90A0A");
					$('#errorGsname').show();
				}
			});
		}

		// First name
		gfname = $('#g_fname');
		if(pattern1.test(gfname.val()) && gfname.val().length >= 1){
			gfname.css("border","1px solid #34F458");
			$('#errorGfname').hide();
			c_gfname = true;
		}else{
			$('#errorGfname').show();
			gfname.css("border","1px solid #F90A0A");
			gfname.keyup(function(){
				if(pattern1.test(gfname.val()) && gfname.val().length >= 1){
					gfname.css("border","1px solid #34F458");
					$('#errorGfname').hide();
					
				}else{
					gfname.css("border","1px solid #F90A0A");
					$('#errorGfname').show();
				}
			});
		}

		//Midname
		var gmname = $('#g_mname');
		if(pattern1.test(gmname.val()) && gmname.val() != ''){
			gmname.css("border","1px solid #34F458");
			c_gmname = true;
		}else if(gmname.val() == ''){
			gmname.css("border","1px solid #ffbf80");
			c_gmname = true;
		}else{
			$('#errorGmname').show();
			gmname.css("border","1px solid #F90A0A");
			gmname.keyup(function(){
				if(pattern1.test(gmname.val()) && gmname.val() != ''){
					gmname.css("border","1px solid #34F458");
					$('#errorGmname').hide();
				}else if(gmname.val() == ''){
					gmname.css("border","1px solid #ffbf80");
					$('#errorGmname').hide();
				}else{
					gmname.css("border","1px solid #F90A0A");
					$('#errorGmname').show();
				}
			});
		}
		// RElationship
		var g_rel = $('#g_rel option:selected');
		if (g_rel.val() == 's_rel') {
			$('#errorGrel').hide();	
			$('#g_rel').css("border","1px solid #F90A0A");
			$('#errorGrel').show();
				$('#g_rel').on("change",function(){							
					$('#g_rel').css("border","1px solid #34F458");	
					$('#errorGrel').hide();				
					});							
			}else{
				$('#g_rel').css("border","1px solid #34F458");
				c_grel = true;
			}

		

		// Occupation
		var g_occ = $('#g_occ option:selected');
			if(g_occ.val() == ''){
				$('#g_occ').css("border","1px solid #F90A0A");
				$('#errorGocc').show();
				$('#g_occ').on("change",function(){							
					$('#g_occ').css("border","1px solid #34F458");	
					$('#errorGocc').hide();		
					$('#errorGcon').hide();		
					});							
			}else{
				$('#errorGocc').hide();	
				$('#g_occ').css("border","1px solid #34F458");
				c_gocc = true;
			}

		//Birthday
		var date2 = new Date();
		y2 = date2.getFullYear();
		m2 = date2.getMonth();
		d2 = date2.getDate();
		date2.setFullYear(y2-6,m2,d2);
		gbd = $('#g_bday').val();
		gbd = new Date(gbd);
		gbd.getFullYear();

		
		var gbday = $('#g_bday');
		if (gbday.val().length != 0 && gbd < date2) {
			$('#g_bday').css("border","1px solid #34F458");
			c_gbday = true;
			$('#errorGbday').hide();
		}else{
			$('#errorGbday').show();
			$('#g_bday').css("border","1px solid #F90A0A");
			gbday.blur(function(){
			gbd = $('#g_bday').val();
			gbd = new Date(gbd);
			gbd.getFullYear();
			if (gbday.val().length != 0 && gbd < date2) {
				$('#errorGbday').hide();
				$('#g_bday').css("border","1px solid #34F458");
				c_gbday = true;
		}else{
			$('#g_bday').css("border","1px solid #F90A0A");
			}
			});
		}

		// Contact Number
		gcon = $('#g_con');
		if(gcon.val().length == 11 && pattern2.test(gcon.val())){
			$('#g_con').css("border","1px solid #34F458");
			$('#errorGcon').hide();
			c_gcon = true;
		}else if($('#g_occ option:selected').val() == 'Deceased'){
			$('#g_con').css("border","1px solid #34F458");
			console.log("Deceased");
			c_gcon = true;
		}else{
			$('#errorGcon').show();
			$('#g_con').css("border","1px solid #F90A0A");
			gcon.keyup(function(){
				if(gcon.val().length == 11 && pattern2.test(gcon.val())){
					$('#g_con').css("border","1px solid #34F458");
					$('#errorGcon').hide();
				}else{
					$('#errorGcon').show();
					$('#g_con').css("border","1px solid #F90A0A");				
				}
			});
		}

		//Guardian Add
		
		gadd = $('#g_add');
		if(pattern3.test(gadd.val()) && gadd.val().length >= 9){
			gadd.css("border","1px solid #34F458");
			c_gadd = true;
			$('#errorGadd').hide();
		}else{
			$('#errorGadd').show();
			gadd.css("border","1px solid #F90A0A");
			gadd.keyup(function(){ 
				if(pattern3.test(gadd.val()) && gadd.val().length >= 9){
					$('#errorGadd').hide();
					gadd.css("border","1px solid #34F458");
				}else{
					$('#errorGadd').show();
					gadd.css("border","1px solid #F90A0A");
				}
			});
		}
	
		}
		
		var c_g = false;
		// Guardian Button
		if($('#g_father , #g_mother , #g_other').is("input:checked")){
			$('#g_btn').css("border","1px solid #34F458");	
			$('#errorGchoose').hide();
			c_g = true;	
		}else{
			$('#errorGchoose').show();
			$('#g_btn').css("border","1px solid #F90A0A");
			 c_g = false
			$('#g_father , #g_mother , #g_other').on('click',function(){
				$('#errorGchoose').hide();
				$('#g_btn').css("border","1px solid #34F458");
			})
		}
		//Guardian Info End
	
		//ALS Graduate
		if($('#class2').is('input:checked')){		
			sub = true;
		}else{			
			sub = false;
		}

		console.log(c_fsname,c_ffname ,c_fmname ,c_focc ,c_fbday ,c_fcon ,c_msname ,c_mfname ,c_mmname ,c_mocc,c_mbday,c_mcon,c_gsname,c_gfname 
		,c_gmname ,c_gocc ,c_gbday ,c_gcon, c_gadd); 
		
		if(c_fsname != false && c_ffname != false && c_fmname != false && c_focc != false && c_fbday != false && c_fcon != false &&
			c_msname != false && c_mfname != false && c_mmname != false && c_mocc != false && c_mbday != false && c_mcon != false && c_grel != false &&
			c_gsname != false && c_gfname != false && c_gmname != false && c_gocc != false && c_gbday != false && c_gcon != false && c_gadd != false && c_g != false){
			valid = true;
		}
		// Error Show linking

		if(c_fsname == false){
			goToLinkGP(1)
		}else if(c_ffname == false){
			goToLinkGP(2)
		}else if(c_fmname == false){
			goToLinkGP(3)
		}else if(c_focc == false){
			goToLinkGP(4)
		}else if(c_fbday == false){
			goToLinkGP(5)
		}else if(c_fcon == false){
			goToLinkGP(6)
		}else if(c_msname == false){
			goToLinkGP(7)
		}else if(c_mfname == false){
			goToLinkGP(8)
		}else if(c_mmname == false){
			goToLinkGP(9)
		}else if(c_mocc == false){
			goToLinkGP(10)
		}else if(c_mbday == false){
			goToLinkGP(11)
		}else if(c_mcon == false){
			goToLinkGP(12)
		}else if(c_gsname == false){
			goToLinkGP(13)
		}else if(c_gfname == false){
			goToLinkGP(14)
		}else if(c_gmname == false){
			goToLinkGP(15)
		}else if(c_gocc == false){
			goToLinkGP(16)
		}else if(c_gocc == false){
			goToLinkGP(17)
		}else if(c_gbday == false){
			goToLinkGP(18)
		}else if(c_gcon == false){
			goToLinkGP(19)
		}else if(c_gadd == false){
			goToLinkGP(20)
		}else if(c_gadd == false){
			goToLinkGP(21)
		}
		
		function goToLinkGP(num){
				window.location.href = '#gd'+num;
		}  

		// Submit Btn
		console.log(valid, sub);
		n2 = $("#next2").val();
		if((sub == true || sub == false ) && valid == true && n2 == 'Edit'){
			form2.hide(100);
			$('#form_validate').show(100);
			window.location.href = '#top';
		}else if(sub == true && valid == true){
			form2.hide(100);
			$('#formALS').show(100);
			window.location.href = '#top';

		}else if(sub == false && valid == true){
			console.log("v2");
			form2.hide(100);
			form3.show(100);
			window.location.href = '#top';
		}
	
	})

		
	
	// Deceased disabled contact number
	$('#f_occ').on('change',function(){
		if($('#f_occ option:selected').val() ==  'Deceased'){
			$('#f_con').attr({'disabled':'','placeholder':'N/A'}).val('');
			$('#g_father').attr('disabled','');
		}else{
			$('#f_con').removeAttr('disabled').attr('placeholder','Enter Contact Number').val('');
			$('#g_father').removeAttr('disabled');
			c_fcon = false;
		}
	})
		
	$('#m_occ').on('change',function(){
		if($('#m_occ option:selected').val() ==  'Deceased'){
			$('#m_con').attr({'disabled':'','placeholder':'N/A'}).val('');
			$('#g_mother').attr('disabled','');
		}else{
			$('#m_con').removeAttr('disabled').attr('placeholder','Enter Contact Number').val('');
			$('#g_mother').removeAttr('disabled');
			c_mcon = false;
		}
	})
	
	// Back Button
	$('#back1').on('click',function(){
		form1.show(100);
		form2.hide(100);
	})


	//Validate Part 3
	valid2 = false;
	valid1 = true;

	$('#submit_btn').on('click',function(){
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
		
		if (f_ygrad.val() <= y) {
			f_ygrad.css("border","1px solid #34F458");
			c_fygrad = true;
		}else{
			$('#error1st_ygrad').show();
			f_ygrad.css("border","1px solid #F90A0A");
			f_ygrad.on('change',function(){
			if (f_ygrad.val() <= y) {
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

		function goToLinkED(num){
			window.location.href = '#sg'+num;
		}  


		// Add Form 4
		if($('#class1').is('input:checked')){
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
		console.log('other', valid, sub, valid2, valid1);
		}// End Form 4
		



		// Showing the Validation Section
		if (valid1 == true && valid2 == true) {
			form3.hide(100);
			$('.head').hide();
			$('#form_validate').show(100);
			window.location.href = '#top';

		}



	});

	// ALS validation
	$('#submit_ALS').on('click',function(){
	valid2 = false;
	valid1 = true;
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
			alert('error');
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
			valid2 = true;
		}

		if(c_f == false){
			goToLinkED(1);	
		}else if(c_fygrad == false){
			goToLinkED(2);
		}else if(c_fadd == false){
			goToLinkED(3);
		}

		function goToLinkED(num){
			window.location.href = '#sg'+num;
		}  

		if (valid1 == true && valid2 == true) {
			$('#formALS').hide(100);
			$('.head').hide();
			$('#form_validate').show(100);
			window.location.href = '#top';

		}
	});



	v1 = $('#personal_info');
	v2 = $('#pg_info');
	v3 = $('#grad_info');

	

	v2.hide();
	v3.hide();
	$('#form_validate').hide();



	var arrayPersonalInfo = ["[name='id_number']","#sname","#fname","#mname","[name='ext']","#dept","#course","#year_lvl",
	"#con","#house_num","#street_purok","#brgy","#city","#bday","#place_birth","[name='gender']input:checked","[name='working']input:checked"];
	var arrayPGinfo = ["#f_sname","#f_fname","#f_mname","#f_occ","#f_bday","#f_con","#m_sname","#m_fname","#m_mname",
	"#m_occ","#m_bday","#m_con","#g_sname","#g_fname","#g_mname","#g_rel","#g_occ","#g_bday","#g_con",'#g_add'];
	var arrayGraduate1 = ["#1st","#1st_ygrad","#1st_add","#2nd","#2nd_add","#2nd_section","#2nd_gwa","#2nd_mon","#2nd_year"];
	var arrayGraduate2 = ["#last_att","#last_course","#last_add"];
	var arrayGraduate3 = ["#als","#als_ygrad","#als_add"];


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

	function inputValidate2(value,id) {
		count = (value.length);
	
		for (var i = 0; i < count; i++) {
			if($(value[i]).val() == ''){
				$('.'+id+i).text('---');				
			}else if(i == 0){
				$('.'+id+i).text($(value[0]).val() + ", " + $(value[1]).val() + " " + $(value[2]).val());
			}else if(i < 3 || (i > 6 && i < 9) || (i > 12 && i < 15)){
				continue;
			}else if(i == 6){
				$('.'+id+(i - 2)).text($(value[6]).val() + ", " + $(value[7]).val() + " " + $(value[8]).val());
			}else if(i >= 9 && i <= 11){
				$('.'+id+(i - 4)).text($(value[i]).val());
			}else if(i == 12){
				$('.'+id+(i - 4)).text($(value[12]).val() + ", " + $(value[13]).val() + " " + $(value[14]).val());
			}else if(i >= 15 ){
				$('.'+id+(i - 6)).text($(value[i]).val());
			}else{
				$('.'+id+(i - 2)).text($(value[i]).val());
			}			
		}		
	}

	
	function inputValidate3(value,id){

		count = (value.length);	
		for (var i = 0; i < count; i++) {
				if(i == 7){
					$('.'+id+i).text($(value[i]).val()+" "+$(value[i+1]).val());
				}else
				$('.'+id+i).text($(value[i]).val());
			
		}
	}

	
	$('#ALS_grad').hide();
	$('.table_trans').hide();

	// Als or Not ALS - This section is putting a variable in validation form
	$('#submit_ALS').on('click',function(){
		if($('#class2').is('input:checked')){
			inputValidate1(arrayPersonalInfo,'p');
			inputValidate2(arrayPGinfo,'g');
			inputValidate3(arrayGraduate3,'a');
			$('#ALS_grad').show();
			$('#ALS_change').hide();
		}
	})

	$('#submit_btn').on('click',function(){		
		inputValidate1(arrayPersonalInfo,'p');
		inputValidate2(arrayPGinfo,'g');
		inputValidate3(arrayGraduate1,'s');
		if($('#class1').is('input:checked')){
			$('.table_trans').show();
			inputValidate3(arrayGraduate2,'t');
		}else{
			$('.table_trans').hide();
		}

	})



	// Button control toggle
	$('#b1').on('click',function(){
		v1.show();
		v2.hide();
		v3.hide();
	})

	$('#b2').on('click',function(){
		v1.hide();
		v2.show();
		v3.hide();
	})

	$('#b3').on('click',function(){
		v1.hide();
		v2.hide();
		v3.show();
	})


	// Submit button

	checkbox = false;


	$('#back2').on('click',function(){
		form2.show(100);
		form3.hide(100);
	})

	$('#back3').on('click',function(){
		form2.show(100);
		$('#formALS').hide(100);
	})
	// Edit Section of a Button

	
	$('#next2').on('click',function(){
		if($('#next2').val() == 'Edit'){
			inputValidate2(arrayPGinfo,'g');
		}
	})

	$('[name=class]').on('click',function(){
		if(($('#next1').val() == 'Ed1' || $('#next1').val() == 'editFmen' || $('#next1').val() == 'editTrans' || $('#next1').val() == 'editAls') && $('#class').is('input:checked')){
			console.log('fmen');
			$('#next1').attr('value','editFmen').text('Edit');
		}else if(($('#next1').val() == 'Ed1' || $('#next1').val() == 'editFmen' || $('#next1').val() == 'editTrans' || $('#next1').val() == 'editAls') && $('#class1').is('input:checked')){
			console.log('trans');
			$('#next1').attr('value','editTrans').text('Edit');
		}else if(($('#next1').val() == 'Ed1' || $('#next1').val() == 'editFmen' || $('#next1').val() == 'editTrans' || $('#next1').val() == 'editAls') && $('#class2').is('input:checked')){
			console.log('als');
			$('#next1').attr('value','editAls').text('Edit');
		}
	})


	$('#register').on('click',function(){	
		console.log('valid = ', valid, 'sub = ', sub,'valid2 = ', valid2,'valid1 = ', valid1   )
		$('#submit').submit(function(){	
			if ($('#checkbox1, #checkbox2').prop('checked')) {
				console.log('true')
				return true;
			}else{
				console.log('!true')
				return false;
			}	
		})
	})
	
	
})