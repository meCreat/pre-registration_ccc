<?php

$link = '';
// Personal Info
 if (isset($_GET['email'])) {
 	$col .= (',`email_accounts`.`email`');
    $th .= '<th>Email</th>';
    $link .= 'email=0&';
    
  }

  if (isset($_GET['year_lvl'])) {
    $col .= (',`student_data`.`year_lvl`');
    $th .= '<th>Year level</th>';
    $link .= 'year_lvl=0&';

  }

  if (isset($_GET['course'])) {
    $col .= (',`courses`.`course_abb`');
    $th .= '<th>Course</th>';
    $link .= 'course=0&';
  }

  if (isset($_GET['dept'])) {
    $col .= (',`program_dept`.dept_code');
    $th .= '<th>Year_lvl</th>';
    $link .= 'dept=0&';
  }

  if (isset($_GET['add'])) {
    $col .= (',`student_info`.`house_num`,`student_info`.`st_purok`, `student_info`.`brgy`, `student_info`.`city`');
    $th .= '<th>Address</th>';
    $link .= 'add=0&';
  }

  if (isset($_GET['bday'])) {
    $col .= (',`student_info`.`birthday`');
    $th .= '<th>Birthday</th>';
    $link .= 'bday=0&';
  }

  if (isset($_GET['bplace'])) {
    $col .= (',`student_info`.`place_of_birth`');
    $th .= '<th>Birthplace</th>';
    $link .= 'bplace=0&';
  }

  if (isset($_GET['contact'])) {
    $col .= (',`student_info`.`contact_number`');
    $th .= '<th>Contact</th>';
    $link .= 'contact=0&';
  }
  if (isset($_GET['gender'])) {
    $col .= (',`student_info`.`gender`');
    $th .= '<th>Gender</th>';
    $link .= 'gender=0&';
  }

  if (isset($_GET['working'])) {
    $col .= (',`working`');
    $th .= '<th>Working</th>';
    $link .= 'working=0&';
  }

  if (isset($_GET['Status'])) {
    $col .= (',`student_data`.`status`');
    $th .= '<th>Sattus</th>';
    $link .= 'Status=0&';
  }

// Fathers
  if (isset($_GET['f_name'])) {
    $col .= (',f_sname, f_fname, f_mname');
    $th .= '<th>F.Name</th>';
    $link .= 'f_name=0&';
  }
  if (isset($_GET['f_occ'])) {
   $col .= (',father_occupation');
   $th .= '<th>F.Occupation</th>';
   $link .= 'f_occ=0&';
  }

  if (isset($_GET['f_bday'])) {
    $col .= (',father_birthday');
    $th .= '<th>F.Birthday</th>';
    $link .= 'f_bday=0&';
  }

  if (isset($_GET['f_con'])) {
   $col .= (',father_contact');
   $th .= '<th>F.Contact</th>';
   $link .= 'f_con=0&';
  }

// Mothers
  if (isset($_GET['m_name'])) {
    $col .= (',m_sname, m_fname, m_mname');
    $th .= '<th>M.Name</th>';
    $link .= 'm_name=0&';
  }
  if (isset($_GET['m_occ'])) {
   $col .= (',mother_occupation');
   $th .= '<th>M.Occupation</th>';
   $link .= 'm_occ=0&';
  }

  if (isset($_GET['m_bday'])) {
   $col .= (',mother_birthday');
   $th .= '<th>M.Birthday</th>';
   $link .= 'm_bday=0&';
  }

  if (isset($_GET['m_con'])) {
   $col .= (',mother_contact');
   $th .= '<th>M.Contact</th>';
   $link .= 'm_con=0&';
  }

// Guardian
  if (isset($_GET['g_name'])) {
    $col .= (',g_sname, g_fname, g_mname');
    $th .= '<th>G.Name</th>';
    $link .= 'g_name=0&';
  }
  if (isset($_GET['g_rel'])) {
   $col .= (',g_relationship');
   $th .= '<th>G.Relationship</th>';
   $link .= 'g_rel=0&';
  }

  if (isset($_GET['g_occ'])) {
    $col .= (',guardian_occupation');
    $th .= '<th>G.Occupation</th>';
    $link .= 'g_occ=0&';
  }

  if (isset($_GET['g_bday'])) {
  $col .= (',guardian_birthday');
  $th .= '<th>G.Birthday</th>';
  $link .= 'g_bday=0&';
  }

  if (isset($_GET['g_con'])) {
    $col .= (',guardian_contact');
    $th .= '<th>G.Contact</th>';
    $link .= 'g_con=0&';
  }

  if (isset($_GET['g_add'])) {
  $col .= (',guardian_add');
  $th .= '<th>G.Address</th>';
  $link .= 'g_add=0&';
  }

  // Primary School
  if (isset($_GET['intermediary'])) {
    $col .= (',intermediary');
    $th .= '<th>Primary School Name</th>';
    $link .= 'intermediary=0&';
  }

  if (isset($_GET['inter_year_grad'])) {
   $col .= (',inter_year_grad');
   $th .= '<th>Primary Year Graduated</th>';
   $link .= 'inter_year_grad=0&';
  }

  if (isset($_GET['inter_school_add'])) {
    $col .= (',inter_school_add');
    $th .= '<th>Primary Address</th>';
    $link .= 'inter_school_add=0&';
  }

// Secondary
  if (isset($_GET['secondary'])) {
    $col .= (',secondary');
    $th .= '<th>Secondary School Name</th>';
    $link .= 'secondary=0&';
  }
  if (isset($_GET['sec_school_add'])) {
   $col .= (',sec_school_add');
   $th .= '<th>Secondary Address</th>';
   $link .= 'sec_school_add=0&';
  }

  if (isset($_GET['sec_section'])) {
   $col .= (',sec_section');
   $th .= '<th>Secondary Section</th>';
   $link .= 'sec_section=0&';
  }

  if (isset($_GET['GWA'])) {
  $col .= (',GWA');
  $th .= '<th>GWA</th>';
  $link .= 'GWA=0&';
  }

  if (isset($_GET['date_grad'])) {
   $col .= (',date_grad');
   $th .= '<th>Sec. Date Graduated</th>';
   $link .= 'date_grad=0&';
  }

  // Transferee

  if (isset($_GET['last_school_att'])) {
   $col .= (',last_school_att');
   $th .= '<th>Last School Attended</th>';
   $link .= 'last_school_att=0&';
  }

  if (isset($_GET['course_taken'])) {
  $col .= (',course_taken');
  $th .= '<th>Course Taken</th>';
  $link .= 'course_taken=0&';
  }

  if (isset($_GET['school_add'])) {
   $col .= (',school_add');
   $th .= '<th>School Address</th>';
   $link .= 'school_add=0&';
  }





?>


