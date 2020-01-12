<?php

class admin_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }
    public function getExecutive() {
        $q = "  SELECT * FROM service_employee se
                LEFT JOIN service_employee_role ser
                ON se.employee_id=ser.employee_id
                WHERE ser.role_code='EXECUTEIVE'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function getSingleTicket($ticketId) {
        $q = "  SELECT * FROM service_ticket WHERE ticket_id='$ticketId'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function assignExecutiveAdd($params) {
        $ticketId=$params['ticket_id'];
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO service_appointment ($columns) values($values)";
            $id = $this->query->insert($q); 
            if($id){
                $q4 = "UPDATE service_ticket SET ticket_status='ASSIGNED' WHERE ticket_id='$ticketId'";
                $this->query->update($q4);
            }
            return $id;
        }
        return FALSE;
    }
}

?>