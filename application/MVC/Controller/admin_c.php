<?php

//tax_master, tax_type, tax_commodity
class admin_c extends Controllers {

    public $admin_m;

    public function __construct() {
        parent::__construct();
        sessionCheck();
        $this->admin_m = $this->loadModel('admin_m');
    }

    public function invoke() {
        $this->data['TITLE'] = TITLE_DASHBOARD;
        loadview('dashboard/', 'dashboard.php', $this->data);
    }

    public function complainList() {
        $this->data['TITLE'] = TITLE_COMPLAIN_LIST;
        loadview('complain/', 'list.php', $this->data);
    }

    public function assignExecutiveForm($tickiteId) {
        $result = $this->admin_m->getExecutive();
        $resultTicket = $this->admin_m->getSingleTicket($tickiteId);
        $this->data['ticketId'] = $tickiteId;
        $this->data['executiveRes'] = $result;
        $this->data['resultTicket'] = $resultTicket;
        $this->data['fromtotime'] = explode('-', $resultTicket['appointment_time_range']);
        $this->data['TITLE'] = TITLE_COMPLAIN_ASSIGN_FORM;
        loadview('complain/', 'assignForm.php', $this->data);
    }

    public function assignExecutiveAdd() {
        $params = array();
        $params['ticket_id'] = $_POST['ticket_id'];
        $params['appointment_date'] = $_POST['appointment_date'];
        $params['appointment_time_range'] = $_POST['appointment_time_range1'] . ' - ' . $_POST['appointment_time_range2'];
        $params['employee_id'] = $_POST['employee_id'];
        $params['appointment_notes'] = $_POST['appointment_notes'];
        $res = $this->admin_m->assignExecutiveAdd($params);
//        print_r($res);die;
        if ($res) {
            $_SESSION['assignComplain'] = 1;
            redirect(ADMIN_OPEN_COMPLAIN_LIST_LINK);
        }
        redirect(ADMIN_ASSIGN_EXECUTIVE_FORM_LINK . $_POST['ticket_id']);
    }

    public function customerList() {
        $this->data['TITLE'] = TITLE_EMPLOYEE_LIST;
        loadview('customer/', 'list.php', $this->data);
    }

    public function addEmployeeForm() {
        $result = $this->admin_m->getEmployeeRole();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_ADD_EMPLOYEE;
        loadview('employee/', 'addEmployee.php', $this->data);
    }

    public function addEmployee() {
        if (!isset($_POST['role_code'])) {
            $_POST['role_code'] = array('READONLY');
        }
        $existRecord = $this->admin_m->getExistUser($_POST['employee_mobile_number'], 'employee_mobile_number');
        $existRecord1 = $this->admin_m->getExistUser($_POST['employee_email'], 'employee_email');
        if ($existRecord && $existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecordMobile'] = 1;
            $_SESSION['existrecordEmail'] = 1;
            redirect(ADMIN_ADD_EMPLOYEE_FORM_LINK);
        }
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecordMobile'] = 1;
            redirect(ADMIN_ADD_EMPLOYEE_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecordEmail'] = 1;
            redirect(ADMIN_ADD_EMPLOYEE_FORM_LINK);
        }
        $_POST['employee_password'] = md5($_POST['employee_password']);
        $res = $this->admin_m->addEmployee($_POST);
        if (!empty($res)) {
            $_SESSION['addEmployee'] = 1;
            redirect(ADMIN_EMPLOYEE_LIST_LINK);
        }
        redirect(ADMIN_ADD_EMPLOYEE_FORM_LINK);
    }

    public function employeeList() {
        $this->data['TITLE'] = TITLE_EMPLOYEE_LIST;
        loadview('employee/', 'list.php', $this->data);
    }

    public function editEmployeeForm($empId) {
        $result = $this->admin_m->getEmployeeRole();
        $resultEmp = $this->admin_m->getSingleEmployee($empId);
        $result_role = $this->admin_m->getEmployeeRoleByEmp($empId);

//        prePRINT($result_role);die;

        $res = array();
        foreach ($result as $row) {
            foreach ($result_role as $row1) {
                if ($row['role_code'] == $row1['role_code']) {
                    $row['checked'] = "checked";
                }
            }
            array_push($res, $row);
        }
//        prePRINT($res);die;

        $this->data['result'] = $res;
        $this->data['result_role'] = $result_role;
        $this->data['resultEmp'] = $resultEmp;
        $this->data['empId'] = $empId;
        $this->data['TITLE'] = TITLE_EDIT_EMPLOYEE;
        loadview('employee/', 'editEmployee.php', $this->data);
    }

    public function editEmployee($empId) {
        $existRecord = $this->admin_m->getExistRecordByColumnUk1($empId, $_POST['employee_mobile_number'], 'employee_mobile_number', 'service_employee');
        $existRecord1 = $this->admin_m->getExistRecordByColumnUk1($empId, $_POST['employee_email'], 'employee_email', 'service_employee');
        if ($existRecord && $existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecordMobile'] = 1;
            $_SESSION['existrecordEmail'] = 1;
            redirect(ADMIN_EDIT_EMPLOYEE_FORM_LINK . $empId);
        }
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecordMobile'] = 1;
            redirect(ADMIN_EDIT_EMPLOYEE_FORM_LINK . $empId);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecordEmail'] = 1;
            redirect(ADMIN_EDIT_EMPLOYEE_FORM_LINK . $empId);
        }
        $result = $this->admin_m->editemployee($_POST, $empId);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_EMPLOYEE_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_EDIT_EMPLOYEE_FORM_LINK . $empId);
        }
    }

    public function addItemMakeForm() {
        $this->data['TITLE'] = TITLE_ADD_ITEM_MAKE;
        loadview('service/', 'addItemMake.php', $this->data);
    }

    public function addItemMake() {
        $res = $this->admin_m->addItemMake($_POST);
        if (!empty($res)) {
            $_SESSION['addData'] = 1;
            redirect(ADMIN_ITEM_MAKE_LIST_LINK);
        }
        redirect(ADMIN_ADD_ITEM_MAKE_FORM_LINK);
    }

    public function itemMakeList() {
        $this->data['TITLE'] = TITLE_ITEM_MAKE_LIST;
        loadview('service/', 'makeItemList.php', $this->data);
    }

    public function editItemMakeForm($itemId) {
        $result = $this->admin_m->getSingleItemMake($itemId);
        $this->data['result'] = $result;
        $this->data['itemId'] = $itemId;
        $this->data['TITLE'] = TITLE_EDIT_ITEM_MAKE;
        loadview('service/', 'editItemMake.php', $this->data);
    }

    public function editItemMake($code) {
        $result = $this->admin_m->editItemMake($_POST, $code);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_ITEM_MAKE_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_EDIT_ITEM_MAKE_FORM_LINK . $code);
        }
    }

    public function addItemForm() {
        $result = $this->admin_m->getItemMake();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_ADD_ITEM_MAKE;
        loadview('service/', 'addItem.php', $this->data);
    }

    public function addItem() {
        $res = $this->admin_m->addItem($_POST);
        if (!empty($res)) {
            $_SESSION['addData'] = 1;
            redirect(ADMIN_ITEM_LIST_LINK);
        }
        redirect(ADMIN_ADD_ITEM_FORM_LINK);
    }

    public function itemList() {
        $this->data['TITLE'] = TITLE_ITEM_LIST;
        loadview('service/', 'itemList.php', $this->data);
    }

    public function editItemForm($itemId) {
        $singleItem = $this->admin_m->getSingleItem($itemId);
        $result = $this->admin_m->getItemMake();
        $this->data['singleItem'] = $singleItem;
        $this->data['result'] = $result;
        $this->data['itemId'] = $itemId;
        $this->data['TITLE'] = TITLE_EDIT_ITEM;
        loadview('service/', 'editItem.php', $this->data);
    }

    public function editItem($code) {
        $result = $this->admin_m->editItem($_POST, $code);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_ITEM_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_EDIT_ITEM_FORM_LINK . $code);
        }
    }

    public function addTicketForm() {
        $serviceItem = $this->admin_m->getServiceItem();
        $serviceItemMake = $this->admin_m->getServiceItemMake();
        $serviceType = $this->admin_m->getServiceType();
        $this->data['serviceItem'] = $serviceItem;
        $this->data['serviceItemMake'] = $serviceItemMake;
        $this->data['serviceType'] = $serviceType;
        $this->data['TITLE'] = TITLE_ADD_TICKET;
        loadview('complain/', 'addTicket.php', $this->data);
    }

    public function addTicket() {
        $_POST['appointment_time_range'] = $_POST['appointment_time_range1'] . '-' . $_POST['appointment_time_range2'];
        unset($_POST['appointment_time_range1']);
        unset($_POST['appointment_time_range2']);
        if ($this->admin_m->getExist('service_customer', 'customer_mobile_number', $_POST['customer_mobile_number'])) {            
        } else {
            $params1 = array();
            $params1['customer_mobile_number'] = $_POST['customer_mobile_number'];
            $this->admin_m->addCustomer($params1, 'service_customer');            
        }
        $res = $this->admin_m->addTicket($_POST);
        if (!empty($res)) {
            $_SESSION['addData'] = 1;            
            redirect(ADMIN_OPEN_COMPLAIN_LIST_LINK);
        }
        redirect(ADMIN_ADD_TICKET_FORM_LINK);
    }

    public function editTicketForm($Id) {
        $singleItem = $this->admin_m->getSingleTicket($Id);
        $this->data['itemId'] = $Id;
        $this->data['TITLE'] = TITLE_EDIT_TICKET;
        loadview('complain/', 'editTicket.php', $this->data);
    }
    public function editTicket($ticketId) {
        $result = $this->admin_m->editTicket($_POST, $ticketId);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_OPEN_COMPLAIN_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_EDIT_TICKET_FORM_LINK . $ticketId);
        }
    }

}

?>