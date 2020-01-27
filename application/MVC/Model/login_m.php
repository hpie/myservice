<?php

class login_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }   

    public function login_select($username, $password) {
        $password = md5($password);        
        $q3 = " SELECT se.*,ser.role_code FROM service_employee se
                INNER JOIN service_employee_role ser
                ON ser.employee_id=se.employee_id
                WHERE se.employee_password='$password' AND (se.employee_email='$username' OR se.employee_mobile_number='$username') AND ser.role_code='ADMIN'";
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
    public function login_employee($username, $password) {
        $password = md5($password);        
        $q3 = "SELECT se.*,ser.role_code FROM service_employee se
                INNER JOIN service_employee_role ser
                ON ser.employee_id=se.employee_id
                WHERE se.employee_password='$password' AND (se.employee_email='$username' OR se.employee_mobile_number='$username') AND ser.role_code!='ADMIN'";
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