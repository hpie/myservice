<?php
define('APPNAME', "My service");
define('ASSETS',BASE_URL.'assets/');
define('ASSETS_FRONT',BASE_URL.'assets/frontassets/');
define('LOGIN', BASE_URL ."login");
define('LOGOUT', BASE_URL ."logout");
define('LARGE_IMAGES',BASE_URL.'uploads/large/');
define('MEDIUM_IMAGES',BASE_URL.'uploads/medium/');
define('THUMB_IMAGES',BASE_URL.'uploads/thumb/');
define('ORIGINAL_IMAGES',BASE_URL.'uploads/original/');

//**************************Admin Title*********************//
define('TITLE_DASHBOARD', "DASHBOARD");
define('TITLE_COMPLAIN_LIST', "Complain List");
define('TITLE_COMPLAIN_READONLY_LIST', "Complain List Readonly");
define('TITLE_CLOSE_COMPLAIN_READONLY_LIST', "Close Complain List Readonly");
define('TITLE_ASSIGNED_COMPLAIN_LIST', "Assigned Complain List");
define('TITLE_EXECUTEIVE_ASSIGNED_COMPLAIN_LIST', "Assigned Executeive Complain List");
define('TITLE_REVISIT_COMPLAIN_LIST', "Revisit Complain List");
define('TITLE_RESOLVED_COMPLAIN_LIST', "Resolved Complain List");
define('TITLE_CANCLED_COMPLAIN_LIST', "Cancled Complain List");
define('TITLE_ACCEPT_COMPLAIN_LIST', "Accept Complain List");
define('TITLE_COMPLAIN_ASSIGN_FORM', "Assign complain");
define('TITLE_ADD_EMPLOYEE', "Add Employee");
define('TITLE_EMPLOYEE_LIST', "Employee List");
define('TITLE_EDIT_EMPLOYEE', "Edit Employee");

define('TITLE_CUSTOMER_LIST', "Customer List");

define('TITLE_ITEM_MAKE_LIST', "Item Make List");
define('TITLE_ADD_ITEM_MAKE', "Add Item Make");
define('TITLE_EDIT_ITEM_MAKE', "Edit Item Make");

define('TITLE_ITEM_LIST', "Item List");
define('TITLE_ADD_ITEM', "Add Item");
define('TITLE_EDIT_ITEM', "Edit Item");

define('TITLE_ADD_TICKET', "Add Ticket");
define('TITLE_EDIT_TICKET', "Edit Ticket");

define('TITLE_EXECUTIVE_CHANGE_STATUS_FORM', "Executive change complain status");
define('TITLE_MANAGER_CLOSE_TICKET_FORM', "Manager close ticket");

//**************************Admin Link********************//
define('ADMIN_DASHBOARD_LINK', BASE_URL."dashboard");

//**************************Admin Link*******************//
define('ADMIN_OPEN_COMPLAIN_LIST_LINK', BASE_URL."complain-list/OPEN");
define('ADMIN_ASSIGN_EXECUTIVE_FORM_LINK', BASE_URL."assign-executive-form/");
define('ADMIN_ASSIGN_EXECUTIVE_ADD_LINK', BASE_URL."assign-executive-add");


define('ADMIN_ADD_TICKET_FORM_LINK', BASE_URL."add-ticket-form");
define('ADMIN_ADD_TICKET_LINK', BASE_URL."add-ticket");
define('ADMIN_EDIT_TICKET_FORM_LINK', BASE_URL."edit-ticket-form/");
define('ADMIN_EDIT_TICKET_LINK', BASE_URL."edit-ticket/");

define('ADMIN_CUSTOMER_LIST_LINK', BASE_URL."customer-list");

define('ADMIN_ADD_EMPLOYEE_FORM_LINK', BASE_URL."add-employee-form");
define('ADMIN_EMPLOYEE_LIST_LINK', BASE_URL."employee-list");
define('ADMIN_ADD_EMPLOYEE_LINK', BASE_URL."add-employee");
define('ADMIN_EDIT_EMPLOYEE_FORM_LINK', BASE_URL."edit-employee-form/");
define('ADMIN_EDIT_EMPLOYEE_LINK', BASE_URL."edit-employee/");

define('ADMIN_ADD_ITEM_MAKE_FORM_LINK', BASE_URL."add-item-make-form");
define('ADMIN_ADD_ITEM_MAKE_LINK', BASE_URL."add-item-make");
define('ADMIN_ITEM_MAKE_LIST_LINK', BASE_URL."item-make-list");
define('ADMIN_EDIT_ITEM_MAKE_FORM_LINK', BASE_URL."edit-item-make-form/");
define('ADMIN_EDIT_ITEM_MAKE_LINK', BASE_URL."edit-item-make/");

define('ADMIN_ADD_ITEM_FORM_LINK', BASE_URL."add-item-form");
define('ADMIN_ADD_ITEM_LINK', BASE_URL."add-item");
define('ADMIN_ITEM_LIST_LINK', BASE_URL."item-list");
define('ADMIN_EDIT_ITEM_FORM_LINK', BASE_URL."edit-item-form/");
define('ADMIN_EDIT_ITEM_LINK', BASE_URL."edit-item/");
//define('ADMIN_TAX_MASTER_ADD_FORM_LINK', BASE_URL."tax-master-add-form");
//define('ADMIN_TAX_MASTER_INSERT_LINK', BASE_URL."tax-master-insert");
//define('ADMIN_TAX_MASTER_EDIT_FORM_LINK', BASE_URL."tax-master-edit-form/");
//define('ADMIN_TAX_MASTER_EDIT_LINK', BASE_URL."tax-master-edit/");

//**************************UserPanel Link*******************//
define('FRONT_EMPLOYEE_HOME_LINK', BASE_URL ."employee-complain-list");
define('FRONT_EMPLOYEE_LOGIN_LINK', BASE_URL ."employee-login");
define('FRONT_EMPLOYEE_LOGOUT_LINK', BASE_URL ."employee-logout");
define('FRONT_EMPLOYEE_OPEN_COMPLAIN_LIST_LINK', BASE_URL."employee-complain-list");
define('FRONT_READONLY_COMPLAIN_LIST_LINK', BASE_URL."readonly-complain-list");
define('FRONT_READONLY_CLOSE_COMPLAIN_LIST_LINK', BASE_URL."readonly-close-complain-list");
define('FRONT_EMPLOYEE_REVISIT_COMPLAIN_LIST_LINK', BASE_URL."employee-revisit-complain-list");
define('FRONT_EMPLOYEE_RESOLVED_COMPLAIN_LIST_LINK', BASE_URL."employee-resolved-complain-list");
define('FRONT_EMPLOYEE_CANCLED_COMPLAIN_LIST_LINK', BASE_URL."employee-cancled-complain-list");
define('FRONT_EMPLOYEE_ASSIGNED_COMPLAIN_LIST_LINK', BASE_URL."employee-assigned-complain-list");
define('FRONT_EMPLOYEE_EXECUTEIVE_ASSIGNED_COMPLAIN_LIST_LINK', BASE_URL."employee-assigned-complain-list-executeive");
define('FRONT_EMPLOYEE_EXECUTEIVE_ACCEPTED_COMPLAIN_LIST_LINK', BASE_URL."employee-accepted-complain-list-executeive");
define('FRONT_EMPLOYEE_ASSIGN_EXECUTIVE_FORM_LINK', BASE_URL."assign-executive-form-employee/");
define('FRONT_EMPLOYEE_ASSIGN_EXECUTIVE_ADD_LINK', BASE_URL."assign-executive-add-employee");

define('FRONT_EMPLOYEE_ACCEPT_COMPLAIN_LIST_LINK', BASE_URL."employee-accept-complain-list");


define('EMPLOYEE_ADD_TICKET_FORM_LINK', BASE_URL."employee-add-ticket-form");
define('EMPLOYEE_ADD_TICKET_LINK', BASE_URL."employee-add-ticket");
define('EMPLOYEE_EDIT_TICKET_FORM_LINK', BASE_URL."employee-edit-ticket-form/");
define('EMPLOYEE_EDIT_TICKET_LINK', BASE_URL."employee-edit-ticket/");

define('EMPLOYEE_CHANGE_STATUS_TICKET_LINK', BASE_URL."emplyee-change-status-ticket");
define('EMPLOYEE_CHANGE_STATUS_APPOINTMENT_LINK', BASE_URL."emplyee-change-status-appointment");
define('EXECUTIVE_CHANGE_STATUS_APPOINTMENT_LINK', BASE_URL."executive-change-status-appointment/");
define('MANAGER_CLOSE_TICKET_LINK', BASE_URL."manager-close-ticket/");
?>