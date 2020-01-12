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
    return true;
}

function sessionDestroy() {
    session_destroy();
}
function sessionAdmin($row) {
    $_SESSION['adminDetails']=$row;
}
function get_AdminName($name) {
    if (isset($_SESSION['adminDetails'][$name])) {
        $name = $_SESSION['adminDetails'][$name];
        return $name;
    }
    return FALSE;
}
?>