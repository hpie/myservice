<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?php echo $TITLE; ?></title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ASSETS_FRONT; ?>images/favicon.png">
        <!-- Pignose Calender -->                           
        <link href="<?php echo BASE_URL; ?>assets/adminassets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">               
        <link href="<?php echo ASSETS_FRONT; ?>plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
         <!--Chartist--> 
        <link rel="stylesheet" href="<?php echo ASSETS_FRONT; ?>plugins/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="<?php echo ASSETS_FRONT; ?>plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
        
    <?php if ($TITLE === TITLE_COMPLAIN_ASSIGN_FORM || $TITLE === TITLE_ADD_TICKET) { ?>
    <!-- Custom Stylesheet -->
    <link href="<?php echo ASSETS_FRONT; ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">    
    <!-- Date picker plugins css -->
    <link href="<?php echo ASSETS_FRONT; ?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="<?php echo ASSETS_FRONT; ?>plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo ASSETS_FRONT; ?>plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">    
    
    <?php } ?>
    <?php if ($TITLE===TITLE_CLOSE_COMPLAIN_READONLY_LIST || $TITLE===TITLE_COMPLAIN_READONLY_LIST || $TITLE === TITLE_CANCLED_COMPLAIN_LIST || $TITLE === TITLE_RESOLVED_COMPLAIN_LIST || $TITLE === TITLE_COMPLAIN_LIST || $TITLE===TITLE_ASSIGNED_COMPLAIN_LIST || $TITLE === TITLE_REVISIT_COMPLAIN_LIST || $TITLE === TITLE_EXECUTEIVE_ASSIGNED_COMPLAIN_LIST || $TITLE === TITLE_ACCEPT_COMPLAIN_LIST) { ?>        
    <link href="<?php echo BASE_URL; ?>assets/adminassets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/adminassets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">  
    <link href="<?php echo ASSETS_FRONT; ?>plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">    
    <?php } ?>
    <link href="<?php echo ASSETS_FRONT; ?>plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link href="<?php echo ASSETS_FRONT; ?>css/style.css" rel="stylesheet">
     <style>
 #map {
   width: 100%;
   height: 300px;
   background-color: grey;
 }
</style>
    </head>
    <body>
        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->


        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <div class="brand-logo">
                    <a href="index.html">
                        <b class="logo-abbr"><img src="<?php echo ASSETS_FRONT; ?>images/logo.png" alt=""> </b>
                        <span class="logo-compact"><img src="<?php echo ASSETS_FRONT; ?>images/logo-compact.png" alt=""></span>
                        <span class="brand-title">
                            <img src="<?php echo ASSETS_FRONT; ?>images/logo-text.png" alt="">
                        </span>
                    </a>
                </div>
            </div>
            <!--**********************************
                Nav header end
            ***********************************-->

            <!--**********************************
                Header start
            ***********************************-->
            <div class="header">    
                <div class="header-content clearfix">

                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="clearfix">
                            <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="mdi mdi-email-outline"></i>
                                    <span class="badge badge-pill gradient-1">3</span>
                                </a>
                                <div class="drop-down animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-heading d-flex justify-content-between">
                                        <span class="">3 New Messages</span>  
                                        <a href="javascript:void()" class="d-inline-block">
                                            <span class="badge badge-pill gradient-1">3</span>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="<?php echo ASSETS_FRONT; ?>images/avatar/1.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Saiful Islam</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="<?php echo ASSETS_FRONT; ?>images/avatar/2.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Adam Smith</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Can you do me a favour?</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="<?php echo ASSETS_FRONT; ?>images/avatar/3.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Barak Obama</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="<?php echo ASSETS_FRONT; ?>images/avatar/4.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Hilari Clinton</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Hello</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </li>
                            <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="badge badge-pill gradient-2">3</span>
                                </a>
                                <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                    <div class="dropdown-content-heading d-flex justify-content-between">
                                        <span class="">2 New Notifications</span>  
                                        <a href="javascript:void()" class="d-inline-block">
                                            <span class="badge badge-pill gradient-2">5</span>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Events near you</h6>
                                                        <span class="notification-text">Within next 5 days</span> 
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Event Started</h6>
                                                        <span class="notification-text">One hour ago</span> 
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Event Ended Successfully</h6>
                                                        <span class="notification-text">One hour ago</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Events to Join</h6>
                                                        <span class="notification-text">After two days</span> 
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </li>
                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                    <span class="activity active"></span>
                                    <img src="<?php echo ASSETS_FRONT; ?>images/user/1.png" height="40" width="40" alt="">
                                </div>
                                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                                </a>
                                            </li>
                                            <hr class="my-2">
                                            <li><a href="<?php echo FRONT_EMPLOYEE_LOGOUT_LINK; ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->