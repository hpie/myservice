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
    <link href="<?php echo BASE_URL; ?>assets/adminassets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo BASE_URL; ?>assets/adminassets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
     <link href="<?php echo BASE_URL; ?>assets/adminassets/datepicker1/css/datepicker.css" rel="stylesheet"> 
    <!-- NProgress -->
    <link href="<?php echo BASE_URL; ?>assets/adminassets/nprogress/nprogress.css" rel="stylesheet">        
    <link href="<?php echo BASE_URL; ?>assets/adminassets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">    
    <link href="<?php echo BASE_URL; ?>assets/adminassets/icheck/green.css" rel="stylesheet">
    
    <link href="<?php echo BASE_URL; ?>assets/adminassets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">   
    <link href="<?php echo BASE_URL; ?>assets/adminassets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    
    <link href="<?php echo BASE_URL; ?>assets/adminassets/datepicker/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo BASE_URL; ?>assets/adminassets/datepicker/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css"/>          
       <!-- PNotify -->             
    <link href="<?php echo BASE_URL; ?>assets/pnotify/dist/pnotifiadmin.css" rel="stylesheet">         
    <link href="<?php echo BASE_URL; ?>assets/adminassets/build/css/custom.min.css" rel="stylesheet">      
    <style>
 #map {
   width: 100%;
   height: 300px;
   background-color: grey;
 }
</style>

    
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