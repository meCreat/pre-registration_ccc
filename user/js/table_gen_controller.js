
  $(document).ready(function(){

    $('.activebtn').on('click', function(){
        
        $('#active').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);
            $('#id').val(data[1]);
            $('#id_number').html(data[1]);
            $('#sname').html(data[2]);
            $('#fname').html(data[3]);

            $('#deactivate').on('click',function(){
              id = $('#id').val();
              console.log(id);
              $.ajax({
                url:'activation_id.php',
                method:'POST',
                data:{id_number:id,deactivate:'yes'},
                success:function(data){

                  $('#'+id).html(data);
                  $('#active').modal('hide');
                }
              })
            })
            
    });

    

    $('.inactivebtn').on('click', function(){
        
        $('#inactive').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#id1').val(data[1]);
            $('#id_number1').html(data[1]);
            $('#sname1').html(data[2]);
            $('#fname1').html(data[3]);

            $('#activate').on('click',function(){
              id = $('#id1').val();
              console.log(id);
              $.ajax({
                url:'activation_id.php',
                method:'POST',
                data:{id_number:id,activate:'Yes'},
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

            $('#activate').on('click',function(){
              id = $('#id1').val();
              console.log(id);
              $.ajax({
                url:'activation_id.php',
                method:'POST',
                data:{id_number:id,activate:'Yes'},
                success:function(data){

                  $('#'+id).html(data);
                  $('#inactive').modal('hide');
                }
              })
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

            $('#activate').on('click',function(){
              id = $('#id1').val();
              console.log(id);
              $.ajax({
                url:'activation_id.php',
                method:'POST',
                data:{id_number:id,activate:'Yes'},
                success:function(data){

                  $('#'+id).html(data);
                  $('#inactive').modal('hide');
                }
              })
            })
    });

     $(document).ready(function() {
    $('#table').DataTable();
    });


     
});
  
