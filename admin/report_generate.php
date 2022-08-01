<?php 

$link = '';

// Personal Info
  if (isset($_POST['email'])) {
    $link .= 'email=0&';

  }
  if (isset($_POST['year_lvl'])) {
    $link .= 'year_lvl=0&';  }
  if (isset($_POST['course'])) {
    $link .= 'course=0&';
  }

  if (isset($_POST['dept'])) {
   $link .= 'dept=0&';
  }

  if (isset($_POST['add'])) {
    $link .= 'add=0&';
  }

  if (isset($_POST['bday'])) {
    $link .= 'bday=0&';
  }

  if (isset($_POST['bplace'])) {
    $link .= 'bplace=0&';
  }

  if (isset($_POST['contact'])) {
    $link .= 'contact=0&';
  }
  
  if (isset($_POST['gender'])) {
   $link .= 'gender=0&';
  }

  if (isset($_POST['working'])) {
    $link .= 'working=0&';
  }

  if (isset($_POST['Status'])) {
   $link .= 'Status=0&';
  }

// Fathers
  if (isset($_POST['f_name'])) {
    $link .= 'f_name=0&';
  }
  if (isset($_POST['f_occ'])) {
   $link .= 'f_occ=0&';
  }

  if (isset($_POST['f_bday'])) {
    $link .= 'f_bday=0&';
  }

  if (isset($_POST['f_con'])) {
   $link .= 'f_con=0&';
  }

// Mothers
  if (isset($_POST['m_name'])) {
    $link .= 'm_name=0&';
  }
  if (isset($_POST['m_occ'])) {
   $link .= 'm_occ=0&';
  }

  if (isset($_POST['m_bday'])) {
    $link .= 'm_bday=0&';
  }

  if (isset($_POST['m_con'])) {
   $link .= 'm_con=0&';
  }

// Guardian
  if (isset($_POST['g_name'])) {
    $link .= 'g_name=0&';
  }
  if (isset($_POST['g_occ'])) {
   $link .= 'g_occ=0&';
  }

  if (isset($_POST['g_bday'])) {
    $link .= 'g_bday=0&';
  }

  if (isset($_POST['g_con'])) {
   $link .= 'g_con=0&';
  }

  if (isset($_POST['g_rel'])) {
    $link .= 'g_rel=0&';
  }

  if (isset($_POST['g_add'])) {
   $link .= 'g_add=0&';
  }

  // Primary School
  if (isset($_POST['intermediary'])) {
    $link .= 'intermediary=0&';
  }

  if (isset($_POST['inter_year_grad'])) {
   $link .= 'inter_year_grad=0&';
  }

  if (isset($_POST['inter_school_add'])) {
    $link .= 'inter_school_add=0&';
  }

// Secondary
  if (isset($_POST['secondary'])) {
    $link .= 'secondary=0&';
  }
  if (isset($_POST['sec_school_add'])) {
   $link .= 'sec_school_add=0&';
  }

  if (isset($_POST['sec_section'])) {
    $link .= 'sec_section=0&';
  }

  if (isset($_POST['GWA'])) {
   $link .= 'GWA=0&';
  }

  if (isset($_POST['date_grad'])) {
    $link .= 'date_grad=0&';
  }

  // Transferee

  if (isset($_POST['last_school_att'])) {
    $link .= 'last_school_att=0&';
  }

  if (isset($_POST['course_taken'])) {
   $link .= 'course_taken=0&';
  }

  if (isset($_POST['school_add'])) {
    $link .= 'school_add=0&';
  }





  header('location:report_generator?'.$link);
?>