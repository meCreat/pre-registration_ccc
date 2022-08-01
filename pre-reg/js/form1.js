$(document).ready(function(){

  var qwe = $('#dept').val();
  if(qwe){
    $.ajax({
      url:"action",
      method:"POST",
      data:{ID:qwe},
      success:function(data){
        $("#course").html(data);

      }
    });
  }


        $('#dept').on("change",function(){
    var deptId = $(this).val();
    if(deptId){
    $.ajax({
      url:"action",
      method:"POST",
      data:{ID:deptId},
      success:function(data){
        $("#course").html(data);

      }
    });
}else{
  $("#course").html('<option>Select Department</option>');
}
  });

$('#c').on("click",function(){
   $("#C").load("form1_1");
      
 });
$('#nc').on("click",function(){               
   $("#C").load("form1_2");
      
});

if($('#c').is("input:checked")){    
   $("#C").load("form1_1");
      
 };
if($('#nc').is("input:checked")){        
   $("#C").load("form1_2");
      
};


      
});

    