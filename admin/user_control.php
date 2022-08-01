<?php
include 'header.php';
include 'nav.php';
?>



<?php
require 'dbcon.php'; ?>


<!-- User control for accounts -->

<?php
if (isset($_SESSION['message'])): 
  
?>

  <h5 class="text-<?=$_SESSION['msg_type']?> text-center">
    <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
  </h5>
<?php endif ?>

<div class="container" >
  <div style="border-bottom: 1px solid grey; margin-bottom: 5px;" >

     <span class="p-2">Dashboard/ Accounts/ Users</span>  

  </div>
</div>

<div class="container">
<div class="row">

    <div class="col-md-8">
      <h2>User Accounts</h2>
    </div>   
  <div class="col-md-4">
      <button class="btn btn-primary" data-toggle='modal' data-target='#add'><i class="bi bi-person-plus"></i> Add User</button>
    </div>
</div>
</div>


<div style="border: 1px solid; padding: 10px;" class="container">
    <table class="table table-striped table-bordered tablesort" id="the_table">
      <?php
        $query = 'SELECT * FROM `admin`';

        $result = $conn->query($query);
        ?>
      
          <thead>
                     <th width="5%">ID</th>
                     <th>Name</th>
                     <th width="20%">Username</th>
                     <th width="25%">E-mail</th>
                     <th width="5%">User Type</th>                    
                     <th width="10%">Date / Time added</th>
                     <th width="15%">Action</th>
                  </thead>
                 
             <?php
              while( $row = $result->fetch_assoc()):?>
                  <tr>
                      <td><?php echo  $row['id']?></td>
                      <td><?php echo  $row['name']?></td>
                      <td><?php echo  $row['username']?></td>
                      <td><?php echo  $row['email']?></td>
                      <td><?php echo  $row['user_type']?></td>
                      <td><?php echo  $row['date_added']?></td>

                      <td><button data-toggle='modal' data-target="#edit<?php echo $row['id']; ?>" class="btn btn-info"><i class="bi bi-trash"></i> Edit</button>
                  <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" ><i class="bi bi-trash"></i> Delete</button></td>
                  </tr>
                  <?php include 'edit.php'; ?>
            <?php endwhile; ?>
    </table>

</div>


</body>

 <!--!!!! Modal delete !!!!-->
  <div class="modal fade" id="deletemodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <center>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <h3>Do you want to delete?</h3>
             
          </div>
        </div>
        </center>
        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="delete" method="POST">
              <input type="hidden" id="delete_id" name="id">            
              <input type="submit" class="btn btn-danger" value="Yes" name="delete">
            </form>
             

            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>
<?php include 'add_user.php'; ?>
<!--  ############################################################################################################################ -->


<script type="text/javascript">
  $(document).ready(function(){
   

     $('.deletebtn').on('click', function(){
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
    });

     $(document).ready(function(){
        $('#the_table').DataTable();
     })
  });

</script>

<?php
include 'footer.php';
 ?>
