
<!--**********************************
    Sidebar start
***********************************-->

<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <?php if($_SESSION['adminDetails']['role_code'] == 'MANAGER'){ ?>
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
                    <li><a href="<?php echo FRONT_EMPLOYEE_OPEN_COMPLAIN_LIST_LINK; ?>">Pending Complain</a></li>                  
                </ul>
            </li>
            <?php } ?>    
            <?php if($_SESSION['adminDetails']['role_code'] == 'MANAGER'){ ?>
            <?php } ?>
            <?php if($_SESSION['adminDetails']['role_code'] == 'MANAGER'){ ?>
            <?php } ?>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->