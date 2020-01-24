<?php
/*
 * ---------------------------------------------------------------
 * System initialization
 * ---------------------------------------------------------------
 */

include_once("../config/init.php");

/* * *******
 * * Configure to use all the function from system 
 * * (1) REQUESTED action method name
 * * (2) Function name
 * * (3) use($APP) you can use to access data from my_base
 * * global $USERID;
 * * global $controller;
 * * global $VARS;
 * * global $ID;
 * * X-Authorization
 * ******* */

/* ################################# START REST API FROM HERE ############################ */



/* * ***************************************************************************************** */
/* * ************************************************add complain ****************************** */
/* * ***************************************************************************************** */
//$APP->get('get-tax-type', false, function() use($APP) {
//            $data = array();
//            global $USERID;
//            global $controller;
//            global $VARS;
//            global $ID;
//            
//            $VARS=json_decode(file_get_contents("php://input"),true);            
//            issetID();            
//            verifyRequiredParams(array('token', 'device'));
//            if (!in_array($VARS['device'], array('iphone', 'android'))) {
//                return array(false, "device name is invalid", $data);
//            }                                  
//            $result=$controller->getSingleRecordById('tax_type',$ID);
//            if ($result) {
//                $data['Result']=$result;
//                return array(true, "Data Loaded successfully", $data);
//            }
//            return array(false, "No Record found", $data);
//        });  

$APP->get('add-complain', false, function() use($APP) {   
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;   
           // print_r($VARS);die;
//            $VARS=json_decode(file_get_contents("php://input"),true);            
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('customer_mobile_number','appointment_date', 'appointment_time_range', 'location_longitude', 'location_latitude','service_item_id','service_type_id','device'));
            if (!in_array($VARS['device'], array('iphone', 'android','web'))) {
                return array(false, "device name is invalid", $data);
            }
            
            $res = $controller->getExist('service_customer','customer_mobile_number',$VARS['customer_mobile_number']);              
            if(!$res){    
                $params1=array();
                $params1['customer_mobile_number']=$VARS['customer_mobile_number'];
                $controller->addData($params1,'service_customer');              
            }            
            $params = array();           
            $params['customer_mobile_number'] = $VARS['customer_mobile_number'];
            $params['appointment_date']=$VARS['appointment_date'];
            $params['appointment_time_range'] = $VARS['appointment_time_range'];
            $params['location_longitude'] = $VARS['location_longitude'];
            $params['location_latitude'] = $VARS['location_latitude'];
            $params['service_item_id'] = $VARS['service_item_id']; 
            $params['service_type_id'] = $VARS['service_type_id'];                        
            $res = $controller->addData($params,'service_ticket');              
            if($res==0 || !empty($res)){                
                return array(true, "Complain register successfully", $data);
            }                    
            return array(false, "Complain registration process failed", $data);
        });             
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>