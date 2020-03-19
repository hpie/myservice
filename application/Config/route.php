<?php
$route = array();
//**************************ADMIN ROUTE*******************//
$route['login'] = 'login_c';
$route['logout'] = 'login_c/logout';
$route['dashboard'] = 'admin_c';

$route['complain-list/OPEN'] = 'admin_c/complainList';
$route['assign-executive-form/(:any)'] = 'admin_c/assignExecutiveForm';
$route['assign-executive-add'] = 'admin_c/assignExecutiveAdd';

$route['add-employee-form'] = 'admin_c/addEmployeeForm';
$route['add-employee'] = 'admin_c/addEmployee';
$route['employee-list'] = 'admin_c/employeeList';
$route['edit-employee-form/(:any)'] = 'admin_c/editEmployeeForm';
$route['edit-employee/(:any)'] = 'admin_c/editEmployee';


$route['customer-list'] = 'admin_c/customerList';

$route['add-item-make-form'] = 'admin_c/addItemMakeForm';
$route['add-item-make'] = 'admin_c/addItemMake';
$route['item-make-list'] = 'admin_c/itemMakeList';
$route['edit-item-make-form/(:any)'] = 'admin_c/editItemMakeForm';
$route['edit-item-make/(:any)'] = 'admin_c/editItemMake';


$route['ajax-item-list'] = 'login_c/ajaxItemList';
$route['add-item-form'] = 'admin_c/addItemForm';
$route['add-item'] = 'admin_c/addItem';
$route['item-list'] = 'admin_c/itemList';
$route['edit-item-form/(:any)'] = 'admin_c/editItemForm';
$route['edit-item/(:any)'] = 'admin_c/editItem';

$route['add-ticket-form'] = 'admin_c/addTicketForm';
$route['add-ticket'] = 'admin_c/addTicket';
$route['edit-ticket-form/(:any)'] = 'admin_c/editTicketForm';
$route['edit-ticket/(:any)'] = 'admin_c/editTicket';
//***************************************Manager add ticket*****************************//
$route['employee-add-ticket-form'] = 'manager_c/addTicketForm';
$route['employee-add-ticket'] = 'manager_c/addTicket';
$route['employee-edit-ticket-form/(:any)'] = 'manager_c/editTicketForm';
$route['employee-edit-ticket/(:any)'] = 'manager_c/editTicket';


//**************************************************************************************//

//*************************************************************************************//
//******************************front side root***************************************//
//***********************************************************************************//
$route['employee-complain-list'] = 'manager_c/complainListEmployee';
//$route['readonly-complain-list'] = 'manager_c/complainListReadonly';
//$route['readonly-close-complain-list'] = 'manager_c/closeComplainListReadonly';
$route['employee-dashboard'] = 'manager_c';
$route['employee-login'] = 'login_c/loginEmployee';
$route['employee-logout'] = 'login_c/logoutEmployee';
$route['assign-executive-form-manager/(:any)'] = 'manager_c/assignExecutiveForm';
$route['assign-executive-add-employee'] = 'manager_c/assignExecutiveAdd';

$route['employee-assigned-complain-list'] = 'manager_c/complainAssignedListEmployee';
$route['employee-assigned-complain-list-executeive'] = 'manager_c/complainAssignedListExecuteiveEmployee';
$route['employee-accepted-complain-list-executeive'] = 'manager_c/complainAcceptedListExecuteiveEmployee';
$route['employee-revisit-complain-list'] = 'manager_c/complainRevisitListEmployee';
$route['employee-resolved-complain-list'] = 'manager_c/complainResolvedListEmployee';
$route['employee-cancled-complain-list'] = 'manager_c/complainCancledListEmployee';
$route['emplyee-change-status-ticket'] = 'manager_c/changeStatusTicket';
$route['emplyee-change-status-appointment'] = 'manager_c/changeStatusAppointment';

$route['executive-change-status-appointment/(:any)/(:any)/(:any)/(:any)'] = 'manager_c/executiveChangeStatusAppointment';
$route['manager-close-ticket/(:any)'] = 'manager_c/closeTicket';
/*
 * url/ticket_id/ticket_status/appointment_id/appointment_status
 * 
 */


$route['account'] = 'loginclient_c/login';
$route['register'] = 'loginclient_c/register';
$route['logout-client'] = 'loginclient_c/logoutClient';
$route[''] = 'home_c/home';
$route['home'] = 'home_c/home';
$route['post-complain'] = 'home_c/postComplian';

