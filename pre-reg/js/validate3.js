$(document).ready(function(){	
	form1 = $('#form1');
	form2 = $('#form2');
	form3 = $('#form3');
 	
	$('[name=edit1]').on('click',function(){
		uncheck();
		$('.head').show();
		$('#form_validate').hide(100);
		form1.show(100);
		window.location.href = '#top';	
		$('#next1').attr('value','Ed1').text('Edit');

	})

	$('[name=edit2]').on('click',function(){ 
		uncheck();
		$('.head').show();
		$('#form_validate').hide(100);
		form2.show(100);
		$('#back1').remove();
		$('#next2').attr('value','Edit').text('Edit');
		window.location.href = '#top';	

		
	})

	$('[name=edit3]').on('click',function(){
		uncheck();
		$('#back3').remove();
		if($('#class2').is('input:checked')){
			$('.head').show();
			$('#form_validate').hide(100);
			$('#formALS').show(100);
			$('#next1').attr('value','editAls').text('Edit');
			window.location.href = '#top';
		}else{
			$('.head').show();
			$('#form_validate').hide(100);
			form3.show(100);
			$('#submit_btn').text('Edit');
			window.location.href = '#top';	

		}
		
	})

	// Classification Change Edit Btn


	function uncheck(){ 
		$('#checkbox1, #checkbox2').prop('checked', false);
	}
})
