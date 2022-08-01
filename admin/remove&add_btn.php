
<!-- Modal add -->
  <div class="modal fade" id="add<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <form action="selected_st" method="POST"> 
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title">Add to Graduating</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
  			<p style="text-align: center; font-size: 120%">Are you sure you want to add <strong><?php echo strtoupper($row['firstname'])." ".$row['surname']; ?> </strong> to Graduating Students? </p>
        <center>
              <div><?php if($row['gradReason'] != ''){ ?><span style="color: red">Reason of Removing: </span><?php echo $row['gradReason']; } ?></div>
              <p style="text-align: center;">Reason of Adding to Graduating:  </p>
              <textarea name="removeReason" style="text-align: center" id="removeReasons"  rows="5" cols="50" required=""></textarea>
              </center>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	
        	<input type="hidden" name="id_number" value="<?php echo $row['id_number']; ?>">
        	<input type="submit" class="btn btn-primary" name="add" value="Yes" disabled="disabled">
          	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         	
        </div>

        </form> 
      </div>
    </div>
  </div>
  
</div>

<!-- Modal add -->
  <div class="modal fade" id="remove<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <form action="selected_st" method="POST"> 
         <div class="modal-header">
          <h4 class="modal-title">Remove to Graduating</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
  
        	<p style="text-align: center; font-size: 120%">Are you sure you want to remove <strong><?php echo strtoupper($row['firstname'])." ".$row['surname']; ?> </strong> to Graduating Students? </p>
          <div id="removeReasonWhy"></div>
            <center>
              <div><?php if($row['gradReason'] != ''){ ?><span style="color: green">Reason of Adding: </span><?php echo $row['gradReason']; } ?></div>
              <p style="text-align: center;">Reason of Removing: </p>
              <textarea name="addReason" style="text-align: center" id="addReasons"  rows="5" cols="50" required=""></textarea>
              </center>
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	
        	<input type="hidden" name="id_number" value="<?php echo $row['id_number']; ?>">
        	<input type="submit" class="btn btn-primary" name="remove" value="Yes" disabled="disabled">
          	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         	
        </div>
        </form> 
      </div>
    </div>
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#removeReasons, #addReasons').keyup(function(){
      if($(this).val()!= ''){
        $('[name=remove],[name=add]').removeAttr('disabled');
      }else{
        $('[name=remove],[name=add]').attr('disabled','');
      }
    })
  })

</script>