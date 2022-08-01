$(document).ready(function(){
	var pattern1 = /^[a-z A-Z]*$/;
	var pattern2 = /^[0-9]*$/;
	var pattern3 = /^[A-Za-z0-9\W+]*$/;

	var valid = false;

	$('[name=submit]').on('click',function(){
	

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
					c_fcon = true;
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
					mcon.css("border","1px solid #34F458");
					$('#errorMcon').hide();
					c_mcon = true;

				}else
					$('#errorMcon').show();
					$('#m_con').css("border","1px solid #F90A0A");				
			});
		}
		// Mother Info End


		// Guardian Info
		// Surname
	
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
		//Guardian Info End


		console.log(c_fsname,c_ffname ,c_fmname ,c_focc ,c_fbday ,c_fcon ,c_msname ,c_mfname ,c_mmname ,c_mocc,c_mbday,c_mcon,c_grel,c_gsname,c_gfname 
		,c_gmname ,c_gocc ,c_gbday ,c_gcon, c_gadd); 
		
		if(c_fsname != false && c_ffname != false && c_fmname != false && c_focc != false && c_fbday != false && c_fcon != false &&
			c_msname != false && c_mfname != false && c_mmname != false && c_mocc != false && c_mbday != false && c_mcon != false && c_grel != false &&
			c_gsname != false && c_gfname != false && c_gmname != false && c_gocc != false && c_gbday != false && c_gcon != false && c_gadd != false ){
			valid = true;
		}else{
			alert('Complete the Form');
			var valid = false;
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
		console.log(valid);
		$('form #form_s').submit(function(){
			if(valid == true){
				return true;
			}
		})		
	
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
})