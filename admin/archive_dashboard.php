<?php 
session_start();
include 'header_archive.php';
include 'dbcon.php';

if (!isset($_SESSION['archive'])) {
  echo '<script>alert(error 404)</script>';

  // header('location:../index.php');
 
}

if (isset($_GET['logout'])) {
  unset($_SESSION['archive']);
}

$arch = " `archive` = 1";
?>

<div class="container">

<div class="container row" style="border: 1px solid ;border-radius: 20px; padding: 20px 5px 5px 5px; margin-bottom: 20px;">
                
                <div class="col-md-8" >
                        <div><h5>Hi <?php echo $_SESSION['un'] ; ?>, Welcome back!</h5></div>       
                </div>
                <div class="col-md-4">
                        <span style="float: right;"><?php date_default_timezone_set("Asia/Manila"); echo "Today is&nbsp;" . date("l") . "&nbsp;" . date("Y-m-d h:i:sa"); ?></span>
                </div>
 
</div>  

        <h2 class="mb-4">Dashboard</h2>
        <div class="mb-4 row">
                <?php 
                $query1 = $conn->query('SELECT * FROM student_info INNER JOIN student_data ON student_info.id_number = student_data.id_number WHERE `archive` = 1');
                $population =  $query1->num_rows;
                ?>
                <div class="col-md-4">
                        <div class="card border bg-primary text-white">
                          <div class="card-body">
                            <h4 class="card-title"><i class="bi bi-people-fill"></i> Total Archives</h4>
                            <p class="card-text"><span class="text text-white" style="font-weight:bolder; font-size: 180%;"><?=$population?></span> Total Students.</p>
                            
                            <a href="archive.php" class="card-link btn btn-warning btn-sm">View</a>
                          </div>
                        </div>
                </div>
                
                <div class="col-md-4">
                        <?php 
                        $query2 = $conn->query('SELECT * FROM student_data WHERE graduating = 1 AND `archive` = 1');
                        $registered =  $query2->num_rows;
                        ?>
                        <div class="card border bg-secondary text-white">
                          <div class="card-body">
                            <h4 class="card-title"><i class="bi bi-person-check-fill"></i> Graduates</h4>
                            <p class="card-text"><span class="text text-white" style="font-weight:bolder; font-size: 180%"><?=$registered?></span> Total Students.</p>
                            
                            <a href="archive.php?y_lvl=4&grad=1" class="card-link btn btn-warning btn-sm">View</a>
                          </div>
                        </div>
                </div>
                
                <div class="col-md-4">
                        <?php 
                        $query3 = $conn->query('SELECT * FROM student_data WHERE graduating = 0 AND `archive` = 1');
                        $unregistered =  $query3->num_rows;
                        ?>
                        <div class="card border bg-dark text-white">
                          <div class="card-body">
                            <h4 class="card-title"><i class="bi bi-person-x-fill"></i> Non Graduate</h4>
                            <p class="card-text"><span class="text text-white" style="font-weight:bolder; font-size: 180%"><?=$unregistered?></span> Total Students.</p>
                
                            <a href="archive.php?y_lvl=4&grad=0" class="card-link btn btn-warning btn-sm">View</a>
                          </div>
                        </div>
                </div>
                
        </div>


        <div class="mb-4 row">

                <div class="col-md-6" id="piechart"></div>

                <div class="col-md-6">
                <div class="mb-4 row">

                        <div class="col-6">
                                <?php 
                                $query3 = $conn->query('SELECT * FROM student_data WHERE year_lvl = "1" AND `archive` = "1"');
                                $unregistered =  $query3->num_rows;
                                ?>
                                <div class="bg-primary card">
                                  <div class="card-body">
                                    <h5 class="card-title text-white"><i class="bi bi-person-lines-fill"></i> 1st Year</h5>
                                    <p class="text text-white"><span id="1st" style="font-weight:bolder; font-size: 180%"><?=$unregistered?></span> Total Students.</p>
                                    <a href="archive.php?y_lvl=1" class="btn btn-warning btn-sm">View</a>
                                  </div>
                                </div>
                        </div>
                        <div class="col-6">
                                <?php 
                                $query3 = $conn->query('SELECT * FROM student_data WHERE year_lvl = "2" AND `archive` = 1');
                                $unregistered =  $query3->num_rows;
                                ?>
                                <div class="bg-danger card">
                                  <div class="card-body">
                                    <h5 class="card-title text-white"><i class="bi bi-person-lines-fill"></i> 2nd Year</h5>
                                    <p class="text text-white"><span id="2nd" style="font-weight:bolder; font-size: 180%"><?=$unregistered?></span> Total Students.</p>
                                    <a href="archive.php?y_lvl=2" class="btn btn-warning btn-sm">View</a>
                                  </div>
                                </div>
                        </div>

                </div>
                <div class="mb-4 row">

                        <div class="col-6">
                                <?php 
                                $query3 = $conn->query('SELECT * FROM student_data WHERE year_lvl = "3" AND `archive` = 1');
                                $unregistered =  $query3->num_rows;
                                ?>
                                <div style="background-color:#cccc00" class=" card">
                                  <div class="card-body">
                                    <h5 class="card-title text-white"><i class="bi bi-person-lines-fill"></i> 3rd Year</h5>
                                    <p class="text text-white"><span id="3rd" style="font-weight:bolder; font-size: 180%"><?=$unregistered?></span> Total Students.</p>
                                    <a href="archive.php?y_lvl=3" class="btn btn-warning btn-sm">View</a>
                                  </div>
                                </div>
                        </div>
                        <div class="col-6">
                                <?php 
                                $query3 = $conn->query('SELECT * FROM student_data WHERE year_lvl = "4" AND `archive` = 1');
                                $unregistered =  $query3->num_rows;
                                ?>
                                <div class="bg-success card">
                                  <div class="card-body">
                                    <h5 class="card-title text-white"><i class="bi bi-person-lines-fill"></i> 4th Year</h5>
                                    <p class="text text-white"><span id="4th" style="font-weight:bolder; font-size: 180%"><?=$unregistered?></span> Total Students.</p>
                                    <a href="archive.php?y_lvl=4" class="btn btn-warning btn-sm">View</a>
                                  </div>
                                </div>
                        </div>
                
                </div>
        </div>
        
     <p id="t"></p>   
</div>

<?php
include 'footer.php';
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
$(document).ready(function(){
        
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1st Year', parseInt($('#1st').text())],
          ['2nd Year', parseInt($('#2nd').text())],
          ['3rd Year', parseInt($('#3rd').text())],
          ['4th Year', parseInt($('#4th').text())]
        ]);

          // Optional; add a title and set the width and height of the chart
          var options = {'title':'Students Year Level', 'width':500, 'height':350};

          // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }

        console.log();
})

</script>