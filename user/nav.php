<?php
session_start();
if(!isset($_SESSION['username']) ||  $_SESSION['role'] != "admin" && $_SESSION['role'] != "user"){

  header("location:../index.php");
   
}else
  $_SESSION['un'] = $_SESSION['username'];
  $_SESSION['ro'] = $_SESSION['role'];


?>
<?php if ($_SESSION['role'] == "user"){?>
<body>

<span id='top'></span>
<!-- Loading div for opacity -->

 <header style="background-color:  #0039e6;">
      <a href="#" class="logo">CCC-IMS</a>
      <div class="navigation">
        <ul class="menu">
          <div class="close-btn"></div>
          <li class="menu-item"><a href="dashboard.php"><i class="bi bi-house-fill"></i> Dashboard</a></li>
          
          <!-- Date base info -->
          <li class="menu-item">
            <a class="sub-btn" href="#"><i class="bi bi-archive-fill"></i> Tables <i class="fas fa-angle-down"></i></a>
            <ul class="sub-menu">
              <li class="sub-item"><a href="table_general.php">General Table</a></li>
              <li class="sub-item more">
                <a class="more-btn" href="#">Non 4th year Table <i class="fas fa-angle-right"></i></a>
                <ul class="more-menu">
                  <li class="more-item"><a href="table_yr.php?y_lvl=1">1st Year Table</a></li>
                  <li class="more-item"><a href="table_yr.php?y_lvl=2">2st Year Table</a></li>
                  <li class="more-item"><a href="table_yr.php?y_lvl=3">3st Year Table</a></li>
                </ul>
              </li>
              <li class="sub-item more">
                <a class="more-btn" href="#">4th Years <i class="fas fa-angle-right"></i></a>
                <ul class="more-menu">
                  <li class="more-item"><a href="table_yr.php?y_lvl=4">4th Year Table</a></li>
                  <li class="more-item"><a href="table_graduating.php">Graduating Students</a></li>
                  <li class="more-item"><a href="table_remove_list.php">Remove list</a></li>
                </ul></li>

              <?php 
              function loopPro($dept){
              include 'dbcon.php';
              $courses =  $conn->query("SELECT  * FROM courses INNER JOIN program_dept ON courses.dept_id = program_dept.dept_id  WHERE courses.dept_id = '$dept'");
              
              while($coursesRows = $courses->fetch_assoc()){
                   echo '<li class="more-item"><a href="table_dept&course.php?course='.$coursesRows['id'].'&head='.$coursesRows['course_name'].'&abbC='.$coursesRows['course_abb'].'&abbD='.$coursesRows['dept_code'].'">'.$coursesRows['course_abb'].'</a></li>';
              }  
              echo '</ul>';
              }

              $dept = $conn->query("SELECT  * FROM program_dept ORDER BY dept_id");
             
              while ($deptRows = $dept->fetch_assoc()){
              echo '<li class="sub-item more">
                <a class="more-btn" href="#">'.$deptRows['dept_code'].' Table <i class="fas fa-angle-right"></i></a><ul class="more-menu">';
              echo '<li class="more-item"><a href="table_dept&course.php?dept='.$deptRows['dept_id'].'&head='.$deptRows['department_name'].'&abbD='.$deptRows['dept_code'].'">All '.$deptRows['dept_code'].' Courses</a></li>';
                loopPro($deptRows['dept_id']);


                echo '</li>';
               
              } 
    
              
              ?>
              

              <li class="sub-item"><a href="report_generator.php">Report Generator</a></li>

            </ul>
          </li>

          <!-- Setting -->
          <li class="menu-item">
            <a class="sub-btn" href="#"><i class="bi bi-gear-fill"></i> Other <i class="fas fa-angle-down"></i></a>
            <ul class="sub-menu">
              <li class="sub-item"><a href="prog_dept.php">Program Departments</a></li>
              <li class="sub-item"><a href="courses.php">Courses</a></li>
              <li class="sub-item"><a href="pre-reg_date.php">Pre-Reg Date</a></li>
              
              
              <!-- <li class="sub-item"><a href="import_files.php">Se</a></li> -->
            </ul>
          </li>
          
        
          <?php
          $res =  $conn->query("SELECT email FROM admin WHERE id = '".$_SESSION['admin_id']."'");
          $row = $res->fetch_assoc();
         
          ?>

         <li class="menu-item"><a class="<?php if($row['email'] == ''){ echo "text-danger"; } ?>" href="#account" data-toggle="modal"><i class="bi bi-person-circle"></i> Profile <?php if($row['email'] == ''){ echo " *"; } ?></a></li>
        <li class="menu-item"><a href="log-out.php"><i class="bi bi-box-arrow-right"></i> Log-out</a></li>
      </ul>
      </div>
      <div class="menu-btn"></div>
    </header>

    
<br>
<br>
<br>
<br><br>
<!------------------------------------------------------------------->
    
<?php 
}
include 'account.php';
?>


  
