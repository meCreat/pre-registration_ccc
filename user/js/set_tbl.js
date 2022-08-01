$(document).ready(function(){
	var all_perInfo = $('[name=email],[name=year_lvl],[name=course],[name=dept],[name=add],[name=bday],[name=bplace],[name=contact],[name=gender],[name=working],[name=Status]');
	Father = $('[name=f_name],[name=f_occ],[name=f_bday],[name=f_con]');
	Mother = $('[name=m_name],[name=m_occ],[name=m_bday],[name=m_con]');
	Guar = $('[name=g_name],[name=g_occ],[name=g_bday],[name=g_con],[name=g_rel],[name=g_add]');

	primary_sc = $('[name=intermediary],[name=inter_year_grad],[name=inter_school_add]');
	sec_sc = $('[name=secondary],[name=sec_school_add],[name=sec_section],[name=GWA],[name=date_grad]');
	tras = $('[name=last_school_att],[name=course_taken],[name=school_add]');

	$('#all_perInfo').on('click',function(){
		
	if (all_perInfo.is('input:checked')) {
		all_perInfo.prop('checked', false);
		
	}else{
		all_perInfo.prop('checked', true);
		
	}
	})


	$('#FathersInfo').on('click',function(){
		
	if (Father.is('input:checked')) {
		Father.prop('checked', false);
		
	}else{
		Father.prop('checked', true);
		
	}
	})

	$('#MothersInfo').on('click',function(){
		
	if (Mother.is('input:checked')) {
		Mother.prop('checked', false);
		
	}else{
		Mother.prop('checked', true);
		
	}
	})

	$('#GInfo').on('click',function(){
		
	if (Guar.is('input:checked')) {
		Guar.prop('checked', false);
		
	}else{
		Guar.prop('checked', true);
		
	}
	})

	$('#primary_sc').on('click',function(){
		
	if (primary_sc.is('input:checked')) {
		primary_sc.prop('checked', false);
		
	}else{
		primary_sc.prop('checked', true);
		
	}
	})

	$('#sec_sc').on('click',function(){
	if (sec_sc.is('input:checked')) {
		sec_sc.prop('checked', false);
		
	}else{
		sec_sc.prop('checked', true);
		
	}
	})

	$('#tras').on('click',function(){
		
	if (tras.is('input:checked')) {
		tras.prop('checked', false);
		
	}else{
		tras.prop('checked', true);
		
	}
	})


	c = $('[name=n]').val();
	nc = $('[name=na]').val();
	for (i=0; i<c ; i++){
		if (i == 0) {
			inc = '[name=c_area'+i+']';
		}else
			inc += ', [name=c_area'+i+']';
	}

	for (i=0; i<nc ; i++){
		if (i == 0) {
			innc = '[name=nc_area'+i+']';
		}else
			innc += ', [name=nc_area'+i+']';
	}


	$('#c_area').on('click',function(){
		if($(inc).is('input:checked')){
			$(inc).prop('checked',false);
		}else{
			$(inc).prop('checked',true);
		}
	})

	$('#nc_area').on('click',function(){
		if($(innc).is('input:checked')){
			$(innc).prop('checked',false);
		}else{
			$(innc).prop('checked',true);
		}
	})
	
})