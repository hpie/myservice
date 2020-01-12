<?php
$route = array();
//**************************ADMIN ROUTE*******************//
$route['login'] = 'login_c';
$route['logout'] = 'login_c/logout';
$route['dashboard'] = 'admin_c';

$route['complain-list/OPEN'] = 'admin_c/complainList';
$route['assign-executive-form/(:any)'] = 'admin_c/assignExecutiveForm';
$route['assign-executive-add'] = 'admin_c/assignExecutiveAdd';
//**************************************************************************************//