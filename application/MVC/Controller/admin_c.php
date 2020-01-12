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
        $this->data['ticketId'] = $tickiteId;
        $this->data['executiveRes'] = $result;
        $this->data['TITLE'] = TITLE_COMPLAIN_LIST;
        loadview('complain/', 'assignForm.php', $this->data);
    }    
    public function assignExecutiveAdd() {
        $result = $this->admin_m->getSingleTicket($_POST['ticket_id']);
        if($result){
            $params=array();
            $params['ticket_id']=$result['ticket_id'];
            $params['appointment_date']=$result['appointment_date'];
            $params['appointment_time_range']=$result['appointment_time_range'];
            $params['employee_id']=$_POST['employee_id'];
            $params['appointment_notes']=$_POST['appointment_notes']; 
            $res = $this->admin_m->assignExecutiveAdd($params);
            if($res){
                $_SESSION['assignComplain']=1;
                redirect(ADMIN_OPEN_COMPLAIN_LIST_LINK);
            }
            redirect(ADMIN_ASSIGN_EXECUTIVE_FORM_LINK.$_POST['ticket_id']);
        }
    }
}
?>