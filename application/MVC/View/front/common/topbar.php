
<!--**********************************
    Sidebar start
***********************************-->

<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">

            <?php
            if (count($_SESSION['role_code']) == 3) {
                if ($_SESSION['role_code'][0] == 'EXECUTEIVE' && $_SESSION['role_code'][1] == 'MANAGER' && $_SESSION['role_code'][2] == 'READONLY') {
                    ?>
                    <?php
                }
            }
            if (count($_SESSION['role_code']) == 2) {
                if ($_SESSION['role_code'][0] == 'EXECUTEIVE' && $_SESSION['role_code'][1] == 'MANAGER') {
                    ?>
                    <?php
                }if ($_SESSION['role_code'][0] == 'EXECUTEIVE' && $_SESSION['role_code'][1] == 'READONLY') {
                    ?>
                    <?php
                }if ($_SESSION['role_code'][0] == 'MANAGER' && $_SESSION['role_code'][1] == 'READONLY') {
                    ?>

                    <?php
                }
            }
            if (count($_SESSION['role_code']) == 1) {
                if ($_SESSION['role_code'][0] == 'EXECUTEIVE') {
                    ?>            
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_HOME_LINK; ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>                               
                    </li>                      
                    <li class="nav-label">Pending</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_OPEN_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Pending</span>
                        </a>                               
                    </li>
                    <li class="nav-label">Assigned</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_EXECUTEIVE_ASSIGNED_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Assigned</span>
                        </a>                               
                    </li>
                    <li class="nav-label">Accepted</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_EXECUTEIVE_ACCEPTED_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Accepted</span>
                        </a>                               
                    </li>
                    <?php
                }if ($_SESSION['role_code'][0] == 'MANAGER') {
                    ?>
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_HOME_LINK; ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>                               
                    </li>                    
                    <li class="nav-label">Complain</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Complain</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo EMPLOYEE_ADD_TICKET_FORM_LINK; ?>">Add Complain</a></li>                              
                        </ul>
                    </li>
                    <li class="nav-label">Pending</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_OPEN_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-arrow-down-circle menu-icon"></i><span class="nav-text">Pending</span>
                        </a>                               
                    </li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_ASSIGNED_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-check menu-icon"></i><span class="nav-text">Assigned</span>
                        </a>                               
                    </li>
                    <li class="nav-label">Revisit</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_REVISIT_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-refresh menu-icon"></i><span class="nav-text">Revisit</span>
                        </a>                               
                    </li>                    
                    <li class="nav-label">Resolved</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_RESOLVED_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-action-redo menu-icon"></i><span class="nav-text">Resolved</span>
                        </a>                               
                    </li>                    
                    <li class="nav-label">Cancled</li>
                    <li>
                        <a class="has-arrow" href="<?php echo FRONT_EMPLOYEE_CANCLED_COMPLAIN_LIST_LINK; ?>" aria-expanded="false">
                            <i class="icon-close menu-icon"></i><span class="nav-text">Cancled</span>
                        </a>                               
                    </li>                    
                    <?php
                }if ($_SESSION['role_code'][0] == 'READONLY') {
                    ?>

                    <?php
                } else {
                    
                }
            }
            ?>                                                              
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->