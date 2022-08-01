<!-- Modal Delete -->
  <div class="modal fade" id="deletemodal<?=$row['id']?>">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <form action="pre-reg_dateSubmit" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="bi bi-trash"></i> Delete Registration Dates</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <p>Are you sure you want to delete the setted date id:<?=$row['id']?>.</p> 
         <input type="hidden" name="id" value="<?=$row['id']?>">     
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

          <input type="submit" class="btn btn-primary" name="delete" value="Delete">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
