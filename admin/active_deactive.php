 <!-- Modal Deactivate -->
  <div class="modal fade" id="active" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">

        

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><span style="font-weight: bold; text-transform: uppercase;" id="fname"></span> <span style="font-weight: bold;" id="sname"></span> is <span style="color: green">Active</span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
              <p style="text-align: center;">Do you want to <span style="font-weight: bold; text-transform: uppercase; color: red;">Deactivate</span> this Account ID number <span style="font-weight: bold; text-transform: uppercase;" id="id_number"></span>?</p>

              
              <center>
              <div id="ReasonWhy"></div>
              <p style="text-align: center;">Reason of Deactivation: </p>
              <textarea name="Reason" style="text-align: center" id="reasonDeactivate"  rows="5" cols="50" required=""></textarea>
              </center>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="id_number" id="id">
          <input type="submit" class="btn btn-primary" name="deactivate" value="Yes" id="deactivate" disabled="disabled">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

        
      </div>
    </div>
  </div>
  
</div>

  <!-- Modal Activate -->
  <div style="" class="modal fade " id="inactive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div  class="modal-dialog">
      <div class="modal-content">

      

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><span style="font-weight: bold; text-transform: uppercase;" id="fname1"></span> <span style="font-weight: bold;" id="sname1"></span> is <span style="color: red">Inactive</span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <p style="text-align: center;">Do you want to <span style="font-weight: bold; text-transform: uppercase; color: green;">Activate</span> this Account ID number <span style="font-weight: bold; text-transform: uppercase;" id="id_number1"></span>?</p>
            <center>
              
              <div id="ReasonWhy1"></div>
              <p style="text-align: center;">Reason of Activation:</p>
              <textarea  name="Reason" style="text-align: center;" id="reasonActivate" rows="5" cols="50" required=""></textarea>
              </center>
              
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="id_number" id="id1">
          <input type="submit" class="btn btn-primary" name="activate" value="Yes" id="activate" disabled="disabled">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      
      </div>
    </div>
  </div>

 <!-- Modal Archive -->
  <div class="modal fade" id="archivemodal">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="archive_singleSt" method="POST">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Archive <span style="font-weight: bold; text-transform: uppercase;" id="fname2"></span> <span style="font-weight: bold;" id="sname2"></span></h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <center>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <br><h5>ID number: <span id="id_number2" style="color: red"></span></h5>
            <h3>Do you want to Archive this Student?</h3>

            <center>
            <div id="archiveReasonWhy"></div>
            <p style="text-align: center;" >Reason of Archiving:</p>
            <textarea id="Reason2" name="ReasonArchive" style="text-align: center;" rows="5" cols="50" required=""></textarea>
            </center>
             
          </div>
        </div>
        </center>
        <!-- Modal footer -->
        <div class="modal-footer">
            
              <input type="hidden" id="id2" name="id">            
              <input type="submit" class="btn btn-danger" value="Yes" name="archive" disabled="disabled">
            
             

            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Archive Selected -->
  <div class="modal fade" id="archive_selected_st" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="width: 5080px;" class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        
         <div class="modal-header">
          <h4 class="modal-title"><i style="color: red;" class="bi bi-file-earmark-zip-fill"></i> Move to Archive</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <p style="text-align: center; font-size: 120%">Are you sure you want to Archive Selected Students</p>
        <center>
            <div id="archiveReasonWhy"></div>
            <p style="text-align: center;" >Reason :</p>
            <textarea form="select" name="selectedReasonArchive" style="text-align: center;" rows="5" cols="50" ></textarea>
        </center>
        
              
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

            <button form="select" type="submit" name="archive_selected_st" class="btn btn-primary" disabled="">Yes</button>
        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          
        </div>
      </div>
    </div>
  </div>
  
</div>



  <script type="text/javascript">
  $(document).ready(function(){
    $('#reasonDeactivate').keyup(function(){
      if($('#reasonDeactivate').val() != ''){
        $('[name=activate],[name=deactivate]').removeAttr('disabled');
      }else{
        $('[name=deactivate]').attr('disabled','disabled');
      }
    })

    $('#reasonActivate').keyup(function(){
      if($('#reasonActivate').val() != ''){
        $('[name=activate]').removeAttr('disabled');
      }else{
        $('[name=activate]').attr('disabled','disabled');
      }
    })

    $('[name=ReasonArchive]').keyup(function(){
      if($('[name=ReasonArchive]').val() != 0){
        $('[name=archive]').removeAttr('disabled');
      }else{
        $('[name=archive]').attr('disabled','');
      }
    })

    $('[name=selectedReasonArchive]').keyup(function(){
      if($('[name=selectedReasonArchive]').val() != ''){
        $('[name=archive_selected_st]').removeAttr('disabled');
      }else{
        $('[name=archive_selected_st]').attr('disabled','');
      }
    })

  })
  </script>