$(document).ready(function() {
  $('#table').DataTable();

  $('[name=submit_remove], [name=submit_add], [name=Unarchive_Selected]').on('click',function(){
    $('#select').removeAttr('target');
  })

  $('[name=print_excel], [name=archive_selected_st], [name=delete_selected]').on('click',function(){
    $('#select').removeAttr('target');
  })

  $('[name=archive_all_graduating], [name=archive_all_nonGraduating]').on('click',function(){
    $('#select').removeAttr('target');
  })

});