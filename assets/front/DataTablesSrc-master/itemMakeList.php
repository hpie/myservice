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

// DB table to use
$table = 'service_item_make';

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
$primaryKey = 'item_make_code';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'item_make_code', 'dt' =>'item_make_code'),     
    array('db' => 'item_make_description', 'dt' => 'item_make_description'),
    array('db' => 'item_make_mobile', 'dt' =>'item_make_mobile'),
    array('db' => 'item_make_phone', 'dt' =>'item_make_phone'),
    array('db' => 'item_make_email', 'dt' =>'item_make_email'),
    array('db' => 'item_make_address', 'dt' =>'item_make_address'),
    array('db' => 'item_make_city', 'dt' =>'item_make_city'), 
    array('db' => 'item_make_state', 'dt' =>'item_make_state'), 
    array('db' => 'item_make_country', 'dt' =>'item_make_country'), 
    array('db' => 'item_status', 'dt' =>'item_status')
);
include 'conn.php';
$where ="";
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::itemMakeList($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);


