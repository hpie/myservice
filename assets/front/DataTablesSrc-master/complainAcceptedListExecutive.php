<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
//echo 'hi';die;
// DB table to use
$table = 'service_ticket st';

//$table = <<<EOT
// (
//    SELECT 
//      ttq.*,
//      tc.tax_challan_id AS tcChallan_id,
//      tc.tax_type_id  
//    FROM tax_transaction_queue ttq
//    INNER JOIN tax_challan tc ON ttq.tax_challan_id = tc.tax_challan_id
// ) temp
//EOT;

// Table's primary key
$primaryKey = 'st.ticket_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'st.ticket_id', 'dt' =>'ticket_id'), 
    array('db' => 'st.customer_mobile_number', 'dt' => 'customer_mobile_number'),
    array('db' => 'st.address', 'dt' =>'address'),
    array('db' => 'st.appointment_date', 'dt' =>'appointment_date'),
    array('db' => 'st.appointment_time_range', 'dt' =>'appointment_time_range'),        
    array('db' => 'st.service_item_id', 'dt' =>'service_item_id'),
    array('db' => 'st.service_type_id', 'dt' =>'service_type_id'),
    array('db' => 'st.service_desc', 'dt' =>'service_desc'),
    array('db' => 'st.ticket_status', 'dt' =>'ticket_status'),
    array('db' => 'st.clouser_notes', 'dt' =>'clouser_notes') ,
    array('db' => 'st.invoice_amount', 'dt' =>'invoice_amount'),    
    array('db' => 'sa.appointment_time_range as sa_appointment_time_range', 'dt' =>'sa_appointment_time_range'),        
    array('db' => 'sa.appointment_date as sa_appointment_date', 'dt' =>'sa_appointment_date'),
    array('db' => 'sa.appointment_status', 'dt' =>'appointment_status'),
    array('db' => 'sa.appointment_id', 'dt' =>'appointment_id')
);
include 'conn.php';



$statusArray=array('ASSIGNED');
$status = join("','",$statusArray); 

$where =" st.ticket_status IN('$status') AND sa.appointment_status='ACCEPTED' ";
$year=$_REQUEST['year'];
$month=$_REQUEST['month'];
$taxtype=$_REQUEST['taxtype'];
$searchFromToDate=$_REQUEST['searchFromToDate'];
//$uploaded_file_tag=$_REQUEST['uploaded_file_tag'];
//
//
if(!empty($year)){
    $year2=$year+1;
    $where.=" AND ttq.tax_transaction_dt BETWEEN '$year-04-01' AND '$year2-03-31' ";    
}
if(!empty($month)){
    $monthrArray=explode('-', $month);  
    $month=$monthrArray[0];
    $year=$monthrArray[1];
    $where.=" AND month(ttq.tax_transaction_dt) = '$month' AND year(ttq.tax_transaction_dt) = '$year' ";    
}
if(!empty($taxtype)){    
    $where.=" AND tc.tax_type_id = '$taxtype'";    
}
if(!empty($searchFromToDate)){ 
    $searchFromToDate=explode('To', $searchFromToDate);
    $from=$searchFromToDate[0];
    $to=$searchFromToDate[1];
    $where.=" AND ttq.tax_transaction_dt BETWEEN '$from' AND '$to' ";     
}
//else{
//    $where =" uploaded_file_status='ACTIVE' AND uploaded_file_category = '$uploaded_file_category' AND uploaded_file_tag LIKE '%$uploaded_file_tag%' ";
//}




//if(!empty($_REQUEST['search']['value'])){
//    $value=$_REQUEST['search']['value'];
//    $where.=" tax_transaction_dept LIKE '%$value%' OR tax_AppRefNo LIKE '%$value%' OR tax_payment_dt LIKE '%$value%' OR tax_payment_bank LIKE '%$value%' ";
//}



//echo $where;die;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::complainAcceptedListEcecutive($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);


