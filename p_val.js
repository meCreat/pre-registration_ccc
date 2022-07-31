
$(document).ready(function(){
	p1 = false;
	p2 = false;
	$('[name=new_password1]').keyup(function(){
	if($('[name=new_password1]').val().length < 7){
		p1 = false;
		$('#error1').show();
		$('[name=new_password1]').css({'border':'3px solid red'});
	}else{
		p1 = true;
		$('#error1').hide();
		$('[name=new_password1]').css({'border':'3px solid green'});
	}
	});

	$('[name=new_password2]').keyup(function(){
	if($('[name=new_password1]').val() != $('[name=new_password2]').val()){
		p2 = false;
		$('#error2').show();
		$('[name=new_password2]').css({'border':'3px solid red'});
	}else{
		p2 = true;
		$('#error2').hide();
		$('[name=new_password2]').css({'border':'3px solid green'});
	}
	});

	$('[name=change]').on('click',function(){
		$('#form_submit').submit(function(){
		if (p1 == true && p2 == true) {
			console.log('asd')
			return true;

		}else{
			return false;
		}
		})
	})
})
