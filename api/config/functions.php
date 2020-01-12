<?php

function token($email) {
    return sha1(mt_rand(10000, 99999) . time() . $email);
}
function subId() {
    return mt_rand(10000, 99999);
}
function dateFormatterMysql($old_date) {    
    $date =date_create($old_date);
    $new_date = date_format($date, "Y-m-d");
    return $new_date;
}
function dateFormatterDMY($old_date) {   
//    echo $old_date;die;
    $date = date_create($old_date.' 00:00:00');
    $new_date = date_format($date, 'd-m-Y');
    return $new_date;
}
function stringToDatetime($old_date) {
    $date = DateTime::createFromFormat('dmYHis',$old_date);                      
    $payment_date = $date->format('d-m-Y h:i:s');     
    $date1 = strtotime($payment_date);
    return date('Y-m-d h:i:s', $date1);
}
?>