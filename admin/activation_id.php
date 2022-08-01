<?php 
include 'dbcon.php';
include "../pre-reg/global_function.php";
session_start();
$id_number = js_clean(mysqli_real_escape_string($conn,$_POST['id_number']));


if(isset($_POST['Reason'])){
  $reason = js_clean(mysqli_real_escape_string($conn,$_POST['Reason']));
}
if(isset($_POST['activate'])){
  //add condition validate 
$conn->query("UPDATE email_accounts SET active = '1', `reason` = '".js_clean(mysqli_real_escape_string($conn,$_POST['activate'])).$reason."' WHERE id_number ='$id_number'");

$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Student ID: ".$id_number." status changed to Active','".$_SESSION['admin_id']."','$ip','$device','$md')");

echo '<button style="border-radius: 25px" type="button" class="btn btn-success activebtn"  data-toggle="modal" ><i class="bi bi-toggle-off"></i><span style="margin-left: 8px; margin-right: 9px"> Active</span></button>';


}
if (isset($_POST['deactivate'])) {
  //add condition validate 
$conn->query("UPDATE email_accounts SET active = '0', `reason` = '".js_clean(mysqli_real_escape_string($conn,$_POST['deactivate'])).$reason."'  WHERE id_number ='$id_number'");
$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Student ID: ".$id_number." status changed to Inactive','".$_SESSION['admin_id']."','$ip','$device','$md')");
echo '<button style="border-radius: 25px" type="button" class="btn btn-dark inactivebtn"  data-toggle="modal" ><i class="bi bi-toggle-on"></i> &nbsp;Inactive</button>';
}

?> 
<script type="text/javascript">
	$(document).ready(function(){

    $('.activebtn').on('click', function(){
        
        $('#active').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            // console.log(data);
            $('#id').val(data[1]); 
            $('#id').val(data[1]);
            $('#id_number').html(data[1]);
            $('#sname').html(data[2]);
            $('#fname').html(data[3]);

             
            reason = $('#reasonDeactivate').val();
            
            $('#deactivate').on('click',function(){
              id = $('#id').val();
              reason = $('#reasonDeactivate').val();
              console.log(reason);
              $.ajax({
                url:'activation_id.php',
                method:'POST',
                data:{id_number:id,deactivate:'<span style="color:red; font-weight: strong">Reason of Deactivation: </span>',Reason:reason},
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
                url:'activation_id.php',
                method:'POST',
                data:{id_number:id,activate:'<span style="color:green; font-weight: strong">Reason of Activation: </span>',Reason:reason},
                success:function(data){

                  $('#'+id).html(data);
                  $('#inactive').modal('hide');
                }
              })
            })
    });
});

$('.activebtn, .inactivebtn').on('click', function(){
            
            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            $.ajax({
                url:'reasonVal.php',
                method:'POST',
                data:{id_number:data[1],ReasonVal:'yes'},
                success:function(data){
                  
                 $('#ReasonWhy, #ReasonWhy1').html(data);
                  console.log($('#ReasonWhy, #ReasonWhy1').text());
                }
              })
          
    });
</script>