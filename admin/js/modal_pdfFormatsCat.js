$(document).ready(function(){
    $('#category').on('change',function(){
cat = $(this).val();
      console.log(cat)
      if (cat == 'All') {
        $("#check-cat").hide(300);
        $("#unselectall").hide(300);
        $("#selectall").hide(300);
        $('input:checkbox').prop('checked',false)
      }else{
        $.ajax({
          url:"table_general_ajax_pdf.php",
          method:"POST",
          data:{cat:cat},
          success:function(data){
            $("#unselectall").hide();
            $("#check-cat").hide();
            $("#check-cat").html(data);
            $("#check-cat").show(500);
            $("#selectall").fadeIn(500);

            $('#selectall').on('click',function(){ 
              $("#selectall").hide();
              $("#unselectall").fadeIn(200);
              $('input:checkbox').prop('checked',true)
            })

            $('#unselectall').on('click',function(){ 
              $("#unselectall").hide();
              $("#selectall").fadeIn(200);
              $('input:checkbox').prop('checked',false)
            })
        }      
        })

    }
    })


  })
