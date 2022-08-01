
  $(document).ready(function(){
    
    $('.activebtn').on('click', function(){
        
        $('#active').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            // console.log(data);
            $('#id').val(data[1]);
            $('#id_number').html(data[1]);
            $('#sname').html(data[2]);
            $('#fname').html(data[3]);  

            var reason = $('#reasonDeactivate').val();
              console.log(reason);
            $('#deactivate').on('click',function(){
              id = $('#id').val();
              reason = $('#reasonDeactivate').val(); 
              console.log(reason);
              $.ajax({
                url:'activation_id',
                method:'POST',
                data:{id_number:id,Reason:reason,deactivate:'<span style="color:red; font-weight: strong">Reason of Deactivation: </span>'},
                success:function(data){

                  $('#'+id).html(data);
                  $('#active').modal('hide');
                }
              })
            })


            
    });

    $('.activebtn, .inactivebtn').on('click', function(){

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            $.ajax({
                url:'reasonVal',
                method:'POST',
                data:{id_number:data[1],ReasonVal:'yes'},
                success:function(data){
                  
                 $('#ReasonWhy, #ReasonWhy1').html(data);
                  console.log($('#ReasonWhy, #ReasonWhy1').text());
                }
              })
          
    });

    $('.inactivebtn').on('click', function(){
        
        $('#inactive').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            // console.log(data);

            $('#id1').val(data[1]);
            $('#id_number1').html(data[1]);
            $('#sname1').html(data[2]);
            $('#fname1').html(data[3]);

            

            $('#activate').on('click',function(){
              id = $('#id1').val();
              reason = $('#reasonActivate').val();
              console.log(reason);

              $.ajax({
                url:'activation_id',
                method:'POST',
                data:{id_number:id,activate:'<span style="color:green; font-weight: strong">Reason of Activation: </span>',Reason:reason},
                success:function(data){

                  $('#'+id).html(data);
                  $('#inactive').modal('hide');
                }
              })
            })
    });

    


     $('.deletebtn').on('click', function(){
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
    });

    
    $('.archivebtn').on('click', function(){
        
        $('#archivemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#id2').val(data[1]);
            $('#id_number2').html(data[1]);
            $('#sname2').html(data[2]);
            $('#fname2').html(data[3]);

            $.ajax({
                url:'archive_reason',
                method:'POST',
                data:{id_number:data[1],btn:'<span style="color:green; font-weight: strong">Unrchive Reason: </span>'},
                success:function(data){
                  
                 $('#archiveReasonWhy').html(data);
                  // console.log($('#archiveReasonWhy').text());
                }
              })
    });

    $('.unarchivebtn').on('click', function(){
        
        $('#unarchivemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#id2').val(data[1]);
            $('#id_number2').html(data[1]);
            $('#sname2').html(data[2]);
            $('#fname2').html(data[3]);

            $.ajax({
                url:'archive_reason',
                method:'POST',
                data:{id_number:data[1],btn:'<span style="color:red; font-weight: strong">Archive Reason: </span>'},
                success:function(data){
                  
                 $('#archiveReasonWhy').html(data);
                  // console.log($('#archiveReasonWhy').text());
                }
              })
    });

     $(document).ready(function() {
    $('#table').DataTable();
    });

  

});
  
