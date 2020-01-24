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
    
    
    public function getEmployeeRole() {
        $q = "SELECT * FROM service_role";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    
    
    
    public function getSingleEmployee($empId) {
        $q = "  SELECT se.*,ser.role_code FROM service_employee se
                INNER JOIN service_employee_role ser
                ON se.employee_id=ser.employee_id
                WHERE se.employee_id=$empId";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getExistRecordByColumnUk1($uid,$id,$column,$table) { 
        $id_field='employee_id';
        $q = "SELECT * FROM $table WHERE $column='$id' AND $id_field!='$uid'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
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
    
    public function getExistUser($value,$column) {       
        $q = "SELECT * FROM service_employee WHERE $column='$value'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
     public function addEmployee($params) {
        $empCode=$params['role_code'];
        unset($params['role_code']);
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO service_employee ($columns) values($values)";
            $id = $this->query->insert($q);             
            if(!empty($id)){
                $params=array();
                $params['role_code']=$empCode;
                $params['employee_id']=$id['id'];
                $columns = $this->insertMaker($params, $values);
                $q = "INSERT INTO service_employee_role ($columns) values($values)";
                $res = $this->query->insert($q);               
                return $id;
            }            
        }
        return FALSE;
    }
    public function editemployee($params, $id) {
        $empCode=$params['role_code'];
        unset($params['role_code']);
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE service_employee SET $columnsdesc WHERE employee_id='$id'";                       
            $res1=$this->query->update($q);
            $q1 = "UPDATE service_employee_role SET role_code='$empCode' WHERE employee_id='$id'";
            $res2=$this->query->update($q1); 
            
            if($res1 || $res2){
                return true;
            }
        }
        return FALSE;
    }  
    
    
    public function addItemMake($params) {        
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO service_item_make ($columns) values($values)";
            $id = $this->query->insert($q);             
            if(!empty($id)){          
                return $id;
            }            
        }
        return FALSE;
    }
    public function getSingleItemMake($code) {
        $q = "  SELECT * FROM service_item_make WHERE item_make_code='$code'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function editItemMake($params, $id) {        
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE service_item_make SET $columnsdesc WHERE item_make_code='$id'";                       
            return $this->query->update($q);                     
        }
        return FALSE;
    } 
    
    
    public function getItemMake() {
        $q = "SELECT * FROM service_item_make WHERE item_status='ACTIVE'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
      public function addItem($params) {        
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO service_item ($columns) values($values)";
            $id = $this->query->insert($q);             
            if(!empty($id)){          
                return $id;
            }            
        }
        return FALSE;
    }
    public function getSingleItem($code) {
        $q = "  SELECT * FROM service_item WHERE item_code='$code'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function editItem($params, $id) {        
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE service_item SET $columnsdesc WHERE item_code='$id'";                       
            return $this->query->update($q);                     
        }
        return FALSE;
    } 
  
    
    public function addTicket($params) {        
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO service_ticket ($columns) values($values)";
            $id = $this->query->insert($q);             
            if(!empty($id)){          
                return $id;
            }            
        }
        return FALSE;
    }
    public function editTicket($params, $id) {        
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE service_ticket SET $columnsdesc WHERE ticket_id='$id'";                       
            return $this->query->update($q);                     
        }
        return FALSE;
    } 
    
}

?>