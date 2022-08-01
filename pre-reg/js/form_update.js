$(document).ready(function(){
	val = $('#update_yr').val();
		
		if (val != '4') {
		 $('#gradcan').hide().prop('checked',false);
		
		}else{
		 $('#gradcan').show().prop('checked',false);
		}
	$('#update_yr').on('change',function(){
		val = $('#update_yr').val();
		
		if (val != '4') {
		 $('#gradcan').hide().prop('checked',false);
		
		}else{
		 $('#gradcan').show().prop('checked',false);
		}

	})

	$('#info1').on('click',function(){
		$('#perInfo').show();
		$('#gpInfo').hide();
		$('#eduAttInfo').hide();
	})

	$('#info2').on('click',function(){
		$('#perInfo').hide();
		$('#gpInfo').show();
		$('#eduAttInfo').hide();
	})

	$('#info3').on('click',function(){
		$('#perInfo').hide();
		$('#gpInfo').hide();
		$('#eduAttInfo').show();
	})
})