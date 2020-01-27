<?php

//tax_master, tax_type, tax_commodity
class front_c extends Controllers {

    public $admin_m;
    public function __construct() {
        parent::__construct();
        sessionCheckEmployee();
        $this->admin_m = $this->loadModel('admin_m');
    }
    public function invoke() {               
        $this->data['TITLE'] = TITLE_DASHBOARD;
        loadviewFront('front/', 'dashboard.php', $this->data);
    }
     public function complainListEmployee() {                
        $this->data['TITLE'] = TITLE_COMPLAIN_LIST;
        loadviewFront('front/', 'complainlist.php', $this->data);
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
//        $result = $this->admin_m->getSingleTicket($_POST['ticket_id']);
//        if($result){       
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
//        }
    }
}
?>