<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $TITLE ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo BASE_URL; ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo BASE_URL; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    

     <!--<link href="<?php echo BASE_URL; ?>assets/datepicker1/css/datepicker.css" rel="stylesheet">--> 
    <!-- NProgress -->
    <link href="<?php echo BASE_URL; ?>assets/nprogress/nprogress.css" rel="stylesheet">        
    <link href="<?php echo BASE_URL; ?>assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">    
    <link href="<?php echo BASE_URL; ?>assets/icheck/green.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/editor/prettify.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">  
    
    <!--<link href="<?php echo BASE_URL; ?>/assets/front/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>-->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/front/css/dataTables.responsive.css">        
       <!-- PNotify -->             
    <link href="<?php echo BASE_URL; ?>assets/pnotify/dist/pnotifiadmin.css" rel="stylesheet">     
    <!-- Custom Theme Style -->
    <link href="<?php echo BASE_URL; ?>assets/build/css/custom.min.css" rel="stylesheet">              
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span><?php echo APPNAME ?></span></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  <a href="javascript::void(0)"> <img src="<?php echo IMG_URL ?>original/default.png" height="60px" alt="..." class="img-circle profile_img"></a>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <a href="javascript::void(0)"> <h2><?php echo get_AdminName('first_name') .' '. get_AdminName('last_name'); ?></h2></a>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />