$(document).ready(function(){

	$('#set_date').on('click',function(){
		ds = $('[name=date_start]').val();
		de = $('[name=date_end]').val();
		if(ds != '' && de != '' && ds < de){
			$.ajax({
				url: 'logs_ajax_action.php',
				method: 'POST',
				data: {logs: true, date_start: ds, date_end: de},
				success:function(data){
					$('#table_load').html(data);
				}
			})
		}else if(ds == '' || de == ''){
			$('[name=date_start], [name=date_end]').css("border","1px solid #F90A0A");
			alert("Set Start and End Date to complete action.");
			$('[name=date_start], [name=date_end]').on('click',function(){
				$(this).css("border","1px solid black");
				$('#errorClass').text('');
			})
		}else{
			$('[name=date_start], [name=date_end]').css("border","1px solid #F90A0A");
			alert("Start Date must be less that End Date.");
			$('[name=date_start]').on('click',function(){
				$(this).css("border","1px solid black");
				$('#errorClass').text('');
			})
		}
		
	})

})