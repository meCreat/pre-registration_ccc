$(document).ready(function() {
  $('#table').DataTable();

  $('[name=submit_remove], [name=submit_add], [name=Unarchive_Selected]').on('click',function(){
    $('#select').removeAttr('target');
  })

  $('[name=print_excel], [name=archive_selected_st]').on('click',function(){
    $('#select').removeAttr('target');
  })

  

});