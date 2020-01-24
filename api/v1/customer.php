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
/* * ************************************************ add customer ****************************** */
/* * ***************************************************************************************** */
$APP->get('add-customer', false, function() use($APP) {   
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
          //  $VARS=json_decode(file_get_contents("php://input"),true);              
          //  print_r($VARS);die;
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('customer_mobile_number','customer_password', 'customer_fname','customer_mname','customer_lname','customer_email','customer_address','customer_city','customer_state','customer_country','device'));
            if (!in_array($VARS['device'], array('iphone', 'android','web'))) {
                return array(false, "device name is invalid", $data);
            }
            
            $res = $controller->getExist('service_customer','customer_mobile_number',$VARS['customer_mobile_number']);              
            if($res){                
                return array(false, "Mobile number allready exist", $data);
            }  
            else{
                $params = array();           
                $params['customer_mobile_number'] = $VARS['customer_mobile_number'];
                $params['customer_password']=md5($VARS['customer_password']);
                $params['customer_fname'] = $VARS['customer_fname'];
                $params['customer_mname'] = $VARS['customer_mname'];
                $params['customer_lname'] = $VARS['customer_lname'];
                $params['customer_email'] = $VARS['customer_email']; 
                $params['customer_address'] = $VARS['customer_address'];
                $params['customer_city'] = $VARS['customer_city'];
                $params['customer_state'] =$VARS['customer_state'];                 
                $params['customer_country'] =$VARS['customer_country'];           
                $res = $controller->addData($params,'service_customer');              
                if($res==0 || !empty($res)){                
                    return array(true, "Registration successfully",$data);
                }                    
                return array(false, "Registration failed", $data);
            }
        }); 
/* * ****************************************************************************************** */
/* * ************************************Update customer************************************ */
/* * ****************************************************************************************** */
$APP->put('update-customer', false, function(){
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
          //  $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID();             
               verifyRequiredParams(array('customer_password', 'customer_fname','customer_mname','customer_lname','customer_email','customer_address','customer_city','customer_state','customer_country','device'));
            if (!in_array($VARS['device'], array('iphone', 'android','web'))) {
                return array(false, "device name is invalid", $data);
            }
                $params = array();                           
                $params['customer_password']=md5($VARS['customer_password']);
                $params['customer_fname'] = $VARS['customer_fname'];
                $params['customer_mname'] = $VARS['customer_mname'];
                $params['customer_lname'] = $VARS['customer_lname'];
                $params['customer_email'] = $VARS['customer_email']; 
                $params['customer_address'] = $VARS['customer_address'];
                $params['customer_city'] = $VARS['customer_city'];
                $params['customer_state'] =$VARS['customer_state'];                 
                $params['customer_country'] =$VARS['customer_country'];           
            return DEFAULT_PUT_METHOD('service_customer',$params,$ID,false,"customer_mobile_number");
        });                 
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>