<?php

//tax_master, tax_type, tax_commodity
class manager_c extends Controllers {
    public $admin_m;
    public function __construct() {
        parent::__construct();           
        $this->admin_m = $this->loadModel('admin_m');
    }
    public function invoke() { 
        sessionCheckEmployee(array('MANAGER','EXECUTEIVE'));
        $this->data['TITLE'] = TITLE_DASHBOARD;
        loadviewFront('front/', 'dashboard.php', $this->data);
    }
    public function complainListEmployee() {  
        sessionCheckEmployee(array('MANAGER','EXECUTEIVE'));
        $this->data['TITLE'] = TITLE_COMPLAIN_LIST;
        loadviewFront('front/', 'complainlist.php', $this->data);
    }
    
//     public function complainListReadonly() {  
////        sessionCheckEmployee(array('MANAGER','EXECUTEIVE'));
//        $this->data['TITLE'] = TITLE_COMPLAIN_READONLY_LIST;
//        loadviewFront('front/', 'complainlist_1.php', $this->data);
//    }
//    public function closeComplainListReadonly() {  
////        sessionCheckEmployee(array('MANAGER','EXECUTEIVE'));
//        $this->data['TITLE'] = TITLE_CLOSE_COMPLAIN_READONLY_LIST;
//        loadviewFront('front/', 'complainlist_close.php', $this->data);
//    }
    
    public function complainAssignedListEmployee() {        
        sessionCheckEmployee(array('MANAGER'));
        $this->data['TITLE'] = TITLE_ASSIGNED_COMPLAIN_LIST;
        loadviewFront('front/', 'assignedComplainlist.php', $this->data);
    }  
    public function complainAssignedListExecuteiveEmployee() {        
        sessionCheckEmployee(array('EXECUTEIVE'));
        $this->data['TITLE'] = TITLE_EXECUTEIVE_ASSIGNED_COMPLAIN_LIST;
        loadviewFront('front/', 'assignedComplainlistExecuteive.php', $this->data);
    }  
    public function complainRevisitListEmployee() { 
        sessionCheckEmployee(array('MANAGER'));
        $this->data['TITLE'] = TITLE_REVISIT_COMPLAIN_LIST;
        loadviewFront('front/', 'revisitComplainlist.php', $this->data);
    }
    public function complainResolvedListEmployee() { 
        sessionCheckEmployee(array('MANAGER'));
        $this->data['TITLE'] = TITLE_RESOLVED_COMPLAIN_LIST;
        loadviewFront('front/', 'resolvedComplainlist.php', $this->data);
    }
    public function complainCancledListEmployee() { 
        sessionCheckEmployee(array('MANAGER'));
        $this->data['TITLE'] = TITLE_CANCLED_COMPLAIN_LIST;
        loadviewFront('front/', 'cancledComplainlist.php', $this->data);
    }
    public function complainAcceptedListExecuteiveEmployee() {
        sessionCheckEmployee(array('EXECUTEIVE'));
        $this->data['TITLE'] = TITLE_ACCEPT_COMPLAIN_LIST;
        loadviewFront('front/', 'acceptedComplainlistExecuteive.php', $this->data);
    }        

    public function changeStatusTicket(){
        if(isset($_REQUEST['ticket_id'])){            
            $res = $this->admin_m->changeSingleStatus('service_ticket',$_REQUEST['ticket_status'],'ticket_id',$_REQUEST['ticket_id']);
            if($res){
                $_SESSION['changeStatus']=1;
                $data = array(                   
                    'suceess' => true
                );
            }            
            echo json_encode($data);
        }
    }
    public function changeStatusAppointment(){        
        if(isset($_REQUEST['ticket_id'])){            
            $res = $this->admin_m->changeSingleStatusAppointment('service_appointment',$_REQUEST['appointment_status'],'ticket_id',$_REQUEST['ticket_id']);
            if($res){
                $_SESSION['changeStatus']=1;
                $data = array(                   
                    'suceess' => true
                );
            }            
            echo json_encode($data);
        }
    }
    
    public function assignExecutiveForm($tickiteId) {  
        $result = $this->admin_m->getExecutive(); 
        $resultTicket = $this->admin_m->getSingleTicket($tickiteId); 
        $this->data['ticketId'] = $tickiteId;
        $this->data['executiveRes'] = $result;
        $this->data['resultTicket'] = $resultTicket;
        $this->data['fromtotime']=explode('-', $resultTicket['appointment_time_range']);
        $this->data['TITLE'] = TITLE_COMPLAIN_ASSIGN_FORM;
        loadviewFront('front/', 'assignForm.php', $this->data);
    }    
    public function assignExecutiveAdd() {     
            $params=array();
            $params['ticket_id']=$_POST['ticket_id'];
            $params['appointment_date']=$_POST['appointment_date'];
            $params['appointment_time_range']=$_POST['appointment_time_range1'].' - '.$_POST['appointment_time_range2'];
            $params['employee_id']=$_POST['employee_id'];
            $params['appointment_notes']=$_POST['appointment_notes']; 
            $res = $this->admin_m->assignExecutiveAdd($params);
            if($res){
                $_SESSION['assignComplain']=1;
                redirect(FRONT_EMPLOYEE_OPEN_COMPLAIN_LIST_LINK);
            }
            redirect(FRONT_EMPLOYEE_ASSIGN_EXECUTIVE_FORM_LINK.$_POST['ticket_id']);
    }    
    public function addTicketForm() {         
        $serviceItem = $this->admin_m->getServiceItem(); 
        $serviceItemMake = $this->admin_m->getServiceItemMake(); 
        $serviceType = $this->admin_m->getServiceType(); 
        $this->data['serviceItem'] = $serviceItem;
        $this->data['serviceItemMake'] = $serviceItemMake;
        $this->data['serviceType'] = $serviceType;        
        $this->data['TITLE'] = TITLE_ADD_TICKET;
        loadviewFront('front/', 'addTicket.php', $this->data);
    }
    public function addTicket() {                        
        $_POST['appointment_time_range']=$_POST['appointment_time_range1'].'-'.$_POST['appointment_time_range2'];
        unset($_POST['appointment_time_range1']);
        unset($_POST['appointment_time_range2']);        
        if($this->admin_m->getExist('service_customer','customer_mobile_number',$_POST['customer_mobile_number'])){            
        }else{
            $params1=array();
            $params1['customer_mobile_number']=$_POST['customer_mobile_number'];
            $this->admin_m->addCustomer($params1,'service_customer');                           
        }        
        $res = $this->admin_m->addTicket($_POST);
        if (!empty($res)) {
            $_SESSION['addData'] = 1;
            if($_SESSION['adminDetails']['role_code_check']=="READONLY"){
                    redirect(FRONT_READONLY_COMPLAIN_LIST_LINK);
            }
            redirect(FRONT_EMPLOYEE_OPEN_COMPLAIN_LIST_LINK);
        }
        redirect(EMPLOYEE_ADD_TICKET_FORM_LINK);
    } 
    public function editTicketForm($Id) {       
        $singleItem = $this->admin_m->getSingleTicket($Id);                           
        $this->data['itemId'] = $Id;
        $this->data['TITLE'] = TITLE_EDIT_TICKET;
        loadview('complain/', 'editTicket.php', $this->data);
    }
    public function editTicket($ticketId) {
        $result = $this->admin_m->editTicket($_POST,$ticketId);
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