<?php

class login_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }   

    public function login_select($username, $password) {
        $password = md5($password);        
        $q3 = "SELECT * FROM service_employee WHERE (employee_email='$username' || employee_mobile_number='$username') and employee_password='$password'";
        $result = $this->query->select($q3);
        if ($row = $this->query->fetch($result)) {
            if (($username == $row['employee_email'] || $username == $row['employee_mobile_number']) && $password == $row['employee_password']) {
                $admin_id = $row['employee_id'];
                $q4 = "UPDATE service_employee SET employee_last_login_dt=now() WHERE employee_id='$admin_id'";
                $this->query->update($q4);
                sessionAdmin($row);
                return true;
            }
        }
        return false;
    }
}
?>