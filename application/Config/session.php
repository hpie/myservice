<?php

/*
 * ---------------------------------------------------------------
 * Functions Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

function getLanguage() {
    if (!isset($_SESSION['SYSTEM_LANGUAGE'])) {
        $_SESSION['SYSTEM_LANGUAGE'] = DEFAULT_LANG;
    }
    return $_SESSION['SYSTEM_LANGUAGE'];
}

function setLanguage($lang) {
    $_SESSION['SYSTEM_LANGUAGE'] = $lang;
}

function sessionCheck() {
    if (!isset($_SESSION['adminDetails']['employee_id'])) {
        redirect(LOGIN);
        return false;
    }
    if (($_SESSION['adminDetails']['role_code']) != 'ADMIN') {
        redirect(LOGIN);
        return false;
    }
    return true;
}

function sessionCheckEmployee($array) {
    if (!isset($_SESSION['adminDetails']['employee_id'])) {
        redirect(FRONT_EMPLOYEE_LOGIN_LINK);
        return false;
    }
    $array = $array;
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
//    echo count($array);
//    print_r($array);
//    print_r($_SESSION['role_code']);die;
    
    if (count($array) == 3) {
        if (isset ($_SESSION['role_code'][0]) && isset ($_SESSION['role_code'][1]) && isset ($_SESSION['role_code'][2])) {
            return true;
        }else if(isset ($_SESSION['role_code'][0]) && !isset ($_SESSION['role_code'][1]) && !isset ($_SESSION['role_code'][2])){ 
            return true;           
        }
        else if(isset ($_SESSION['role_code'][0]) && isset ($_SESSION['role_code'][1]) && !isset ($_SESSION['role_code'][2])){ 
            return true;           
        }
        else{
            redirect(FRONT_EMPLOYEE_LOGIN_LINK);
            return false;
        }
    }
    if (count($array) == 2) {        
        if(isset($_SESSION['role_code'][0]) && isset($_SESSION['role_code'][1])) {
            return true;   
        }else if(isset($_SESSION['role_code'][0]) && !isset($_SESSION['role_code'][1])){ 
            return true;           
        }else{
            redirect(FRONT_EMPLOYEE_LOGIN_LINK);
            return false;
        }
    }
    if (count($array) == 1) {
//        echo $_SESSION['role_code'][0];die;
        if($_SESSION['role_code'][0]==$array[0]) {
             return true;   
        }else{
            redirect(FRONT_EMPLOYEE_LOGIN_LINK);
            return false;
        }
    }
    return true;
}

function sessionDestroy() {
    session_destroy();
}
function sessionEmployee($row, $data) {
    $_SESSION['adminDetails'] = $row;
    $_SESSION['adminDetails']['role_code_check']=$row['role_code'];
    $roleCode = array();
    foreach ($data as $row) {
        array_push($roleCode, $row['role_code']);
    }
    $array = $roleCode;
    $count = count($roleCode);
//    echo $count;die;
    for ($i = 0; $i < $count; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    $_SESSION['role_code'] = $array;
}

function sessionAdmin($row) {
    $_SESSION['adminDetails'] = $row;
}

function get_AdminName($name) {
    if (isset($_SESSION['adminDetails'][$name])) {
        $name = $_SESSION['adminDetails'][$name];
        return $name;
    }
    return FALSE;
}

?>