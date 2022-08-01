 $(document).ready(function(){
    var n = $('input#n').val();
    console.log(n);
    $('#close').hide();
    $('#option').hide();
    $('#btn_all').hide();

    for (var i = 0; i < n; i++) {
      var id = "checkbox"+i;
      console.log(id)
      $('#'+id).hide();
      
    }
  

    $('#btn').on('click',function(){
      for (var i = 0; i < n; i++) {
      var id = "checkbox"+i;
      
      $('#'+id).show();
      $('#close').show();
      $('#btn').hide();
      $('#option').show();
      $('#btn_all').show();
      
    }
    })

    $('#close').on('click',function(){
      for (var i = 0; i < n; i++) {
      var id = "checkbox"+i;

      $('#'+id).hide();
      $('#btn').show(); 

      $('#close').hide();
      $('#option').hide();
      $('#btn_all').hide();
      $('#'+id).prop('checked', false);
    }
    })

    if(n == 0){
    $('#btn-table').hide();
    
    }  

  $('#btn_all').on('click',function(){
      for (var i = 0; i < n; i++) {
      var id = "checkbox"+i;
      console.log(id)
      $('#'+id).prop('checked', true);
    }
  })
  
  $('#option').on('click',function(){
    count = 0;
    console.log(count)
      for (var i = 0; i < n; i++) {
      var id = "#checkbox"+i;
      if($(id).is(':checked')){
        count++;
      }
    }
    if(count == 0){
      $('#selectStUnarchive, [name=print_pdf], [name=print_excel], #btn_ra, [name=print_excel_reportGen] ').attr('disabled','disabled');
    }else{
      $('#selectStUnarchive, [name=print_pdf], [name=print_excel], #btn_ra, [name=print_excel_reportGen] ').removeAttr('disabled');
    }
  })

  if($('#n').val() == 0){
    $('#excelBtn').attr({'href':'#'}).removeAttr('data-target').on('click',function(){
      alert('No Data!');
    });

    $('#pdfBtn').removeAttr('data-target').on('click',function(){
      alert('No Data!');
    });

    $('#ArcBtn, #ArcBtnRemoved').removeAttr('data-target').on('click',function(){
      alert('No Data!');
    });

  }
  
  })