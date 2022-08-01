$(document).ready(function(){
	$('#guardian_info').hide();
	$('#rel').hide();
	open = $('#guardian_info');

	if($('#g_father').is("input:checked")){    
   		open.show();    
	};

	if($('#g_mother').is("input:checked")){        
	   open.show();
	};

	if($('#g_other').is("input:checked")){        
	   open.show();      
	};


	$('#g_father').on('click',function(){
		$('[value=Father]').show().prop('selected',true);
		$('#g_rel').attr('disabled','disabled');
		$('#g_rel_hidden').removeAttr('disabled','disabled').attr('value','Father').hide();

		$('#g_sname').val($('#f_sname').val());
		$('#g_fname').val($('#f_fname').val());
		$('#g_mname').val($('#f_mname').val());
		$('#g_occ').val($('#f_occ').val());
		$('#g_bday').val($('#f_bday').val());
		$('#g_con').val($('#f_con').val());
		fun();
		open.show();
	})

	$('#g_mother').on('click',function(){
		$('[value=Mother]').show().prop('selected',true);
		$('#g_rel').attr('disabled','disabled');
		$('#g_rel_hidden').removeAttr('disabled','disabled').attr('value','Mother').hide();
		$('#g_sname').val($('#m_sname').val());
		$('#g_fname').val($('#m_fname').val());
		$('#g_mname').val($('#m_mname').val());
		$('#g_occ').val($('#m_occ').val());
		$('#g_bday').val($('#m_bday').val());
		$('#g_con').val($('#m_con').val());
		fun();
		open.show();
		
	})

	$('#g_other').on('click',function(){
		$('[value=Father], [value=Mother]').hide().prop('selected',false);
		$('[value=s_rel]').prop('selected',true);
		$('#g_rel').removeAttr('disabled','disabled');
		$('#g_rel_hidden').attr('disabled','disabled').attr('value','');
		$('#g_sname').val('');
		$('#g_fname').val('');
		$('#g_mname').val('');
		$('#g_occ').val('');
		$('#g_bday').val('');
		$('#g_con').val('');
		$('#g_add').val('');
		$('#g_add').val($('#house_num').val()+", "+$('#street_purok').val()+", "+$('#brgy').val()+", "+$('#city').val());

		open.show();
	})

function fun(){
	$('#g_add').val($('#house_num').val()+", "+$('#street_purok').val()+", "+$('#brgy').val()+", "+$('#city').val());

}

$('#f_sname, #f_fname, #f_mname,  #f_bday, #f_con, #m_sname, #m_fname, #m_mname, #m_bday, #m_con, #house_num, #street_purok, #brgy ,#city').keyup(function(){

		console.log('change')
		$('[name=g]').prop('checked', false);
		$('#guardian_info').hide();

})

$('#f_occ').on('change',function(){
	$('#guardian_info').hide();
	$('[name=g]').prop('checked', false);
})

$('#m_occ').on('change',function(){
	$('#guardian_info').hide();
	$('[name=g]').prop('checked', false);
})


})