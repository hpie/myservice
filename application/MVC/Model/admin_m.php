<?php

class admin_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }

    public function getExist($table, $column, $id) {
        $res = $this->checkRecord("$table", "$column", "$id");
        if ($res)
            return true;
        return false;
    }

    public function addCustomer($params, $table) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO $table($columns) VALUES($values)";
            $id = $this->query->insert($q);
            if ($id) {
                return $id;
            }
        }
        return false;
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

    public function getEmployeeRoleByEmp($id) {
        $q = "SELECT * FROM service_employee_role WHERE employee_id='$id'";
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
        $q = "  SELECT * FROM service_employee WHERE employee_id=$empId";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function getExistRecordByColumnUk1($uid, $id, $column, $table) {
        $id_field = 'employee_id';
        $q = "SELECT * FROM $table WHERE $column='$id' AND $id_field!='$uid'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function changeSingleStatusAppointment($table, $status, $idColumn, $id) {        
        $q = "UPDATE $table SET appointment_status='$status' WHERE $idColumn='$id'";
//        echo $q;die;
        $res = $this->query->update($q);
        if ($res) {
            return true;
        }
        return FALSE;
    }
    
    public function changeSingleStatus($table, $status, $idColumn, $id) {
        $q = "UPDATE $table SET ticket_status='$status' WHERE $idColumn='$id'";
        $res = $this->query->update($q);
        if ($res) {
            return true;
        }
        return FALSE;
    }
    public function getSingleAppointment($apointment_Id) {
        $q = "  SELECT * FROM service_appointment WHERE appointment_id='$apointment_Id'";
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

     public function getServiceItemMake() {
        $q = "  SELECT * FROM service_item_make";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function getServiceItem() {
        $q = "  SELECT * FROM service_item";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function getServiceType() {
        $q = "  SELECT * FROM service_type";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }

    public function assignExecutiveAdd($params) {
        $ticketId = $params['ticket_id'];
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO service_appointment ($columns) values($values)";
            $id = $this->query->insert($q);
            if ($id) {
                $q4 = "UPDATE service_ticket SET ticket_status='ASSIGNED' WHERE ticket_id='$ticketId'";
                $this->query->update($q4);
            }
            return $id;
        }
        return FALSE;
    }

    public function getExistUser($value, $column) {
        $q = "SELECT * FROM service_employee WHERE $column='$value'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function addEmployee($params) {        
        $empCode = $params['role_code'];
        unset($params['role_code']);
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO service_employee ($columns) values($values)";
            $id = $this->query->insert($q);
            if (!empty($id)) {
                foreach ($empCode as $row) {
                    $params = array();
                    $params['role_code'] = $row;
                    $params['employee_id'] = $id['id'];
                    $columns = $this->insertMaker($params, $values);
                    $q = "INSERT INTO service_employee_role ($columns) values($values)";
                    $res = $this->query->insert($q);
                }
                return $id;
            }
        }
        return FALSE;
    }

    public function updateAppointment($params, $appointment_id) {        
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE service_appointment SET $columnsdesc WHERE appointment_id='$appointment_id'";
            $res1 = $this->query->update($q);
            if($res1)
                return TRUE;
        }
        return FALSE;
    }
    public function updateTicket($params, $ticket_id) {        
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE service_ticket SET $columnsdesc WHERE ticket_id='$ticket_id'";
            $res1 = $this->query->update($q);
            if($res1)
                return TRUE;
        }
        return FALSE;
    }
    
    public function editemployee($params, $id) {
        $empCode = $params['role_code'];
        unset($params['role_code']);
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE service_employee SET $columnsdesc WHERE employee_id='$id'";
            $res1 = $this->query->update($q);
            $q = "DELETE FROM service_employee_role WHERE employee_id='$id'";
            $this->query->delete($q);

//            echo 'hi';die;

            foreach ($empCode as $row) {
                $params = array();
                $params['role_code'] = $row;
                $params['employee_id'] = $id;
                $columns = $this->insertMaker($params, $values);
                $q = "INSERT INTO service_employee_role ($columns) values($values)";
                $res = $this->query->insert($q);
            }
            if ($res1 || $res) {
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
            if (!empty($id)) {
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
            if (!empty($id)) {
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
            if (!empty($id)) {
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