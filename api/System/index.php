<?php

/*
* *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
* SOCIAL REST API version 4.4 by Darshit - 18-04-2017 
* 
* 
* 
* -3.0 Add language feature.
* -3.1 change get/post/update/delete auth up-down.
* -3.2 change authentication for no data array 3 parameter(line 470).
* -4.0 change putmethod and deletemethod.
* -4.1 language option issue solved.
* -4.2 default language setting added. (OFF : IS_LANGUAGE) and (SET DEFAULT_LANGUAGE) init.php file changed. //define('DEFAULT_LANGUAGE', "italian");//"english".
* -4.3 issetID() method created for validate ID params.
* -4.4 Changes in MY_base remove trim() function in jsonDecode function. && add Other Headers parsing system (using Other Vars).
*
* *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
* By default development will show errors but testing and live will hide them.
*/



/* ################################# DO NOT CODE HERE ############################ */

/*
 * ---------------------------------------------------------------
 * ERROR REPORTING
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (ENVIRONMENT) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(-1);
            ini_set('display_errors', 1);
            break;

        case 'testing':
        case 'production':
            ini_set('display_errors', 0);
            if (version_compare(PHP_VERSION, '5.3', '>=')) {
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
            } else {
                error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
            }
            break;

        default:
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'The application environment is not set correctly.';
            exit(1); // EXIT_ERROR
    }
}


/*
 * ---------------------------------------------------------------
 * System Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Config
include_once("../config/config.php");

//Database
include_once("../System/sys_db/classes.php");

//Headers
include_once("../System/sys_php/auth.php");



//Models
include_once("../System/sys_model/models.php");


//Controllers
include_once("../System/sys_controller/controller_main.php");
include_once("../System/sys_controller/controllers.php");



//Authentication and REST data handler
include_once("../System/sys_app/MY_base.php");
include_once("../System/sys_app/authentication.php");







/*
 * ---------------------------------------------------------------
 * APP Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Initialization with Authentication
$APP = new APP($headers);


$USERID = $APP->Users_id;
$VARS = $APP->_request;
$ID = $APP->_request_id;
$LANGUAGE = $APP->lang;
$OTHER_HEADER_VARS = $APP->otherVars;


/*
 * ---------------------------------------------------------------
 * Language Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

include_once("../Libraries/Traductor-language/Traductor.php");

$LANG = new Traductor();
//print_r($LANGUAGE);die;
if (IS_LANGUAGE && $LANGUAGE != 'missed' && $LANGUAGE != 'failed')
    $LANG->setLanguage($LANGUAGE);
else
{
    $LANGUAGE = DEFAULT_LANGUAGE;
    $LANG->setLanguage(DEFAULT_LANGUAGE);
}


/*
 * ---------------------------------------------------------------
 * Functions Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */



//Functions
include_once("../config/functions.php");



/*
 * ---------------------------------------------------------------
 * Validation Methods
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//$values = [NULL, FALSE, '', 0, 1];
function myArrayFilter($var) {
    return ($var !== NULL && $var !== FALSE && $var !== '');
}

//Check ID exist in URL; USE:  issetID();
function issetID() {
    global $APP;
    global $ID;
    if (!isset($ID) || empty($ID)) {
        $message = "Required ID (params) not exist in URL";
        $APP->stop(array(false, $message, NULL));
    }
}


//$res = array_filter($values, 'myFilter');
//print_r($res);

/**
 * Verifying required params posted or not
 */
function verifyRequiredParams($required_fields=false) {
    $error = false;
    if ($required_fields && !empty($required_fields) && count($required_fields)) {
        if (count($required_fields) > 0) {
            global $APP;
            global $VARS;
                  
            $error_fields = "";
            $request_params = array();
            $request_params = $VARS;   
            
            //echo "<pre>";print_r($required_fields); die;
            // Handling PUT request params

            foreach ($required_fields as $field) {
                if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
                    $error = true;
                    $error_fields .= $field . ', ';
                }
            }
            if ($error) {
                // Required field(s) are missing or empty
                // echo error json and stop the app

                $message = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
                $APP->stop(array(false, $message, NULL));
            }
        }
    }
}

/**
 * Validating email address
 */
function validateEmail($email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        global $APP;
        $message = 'Email address is not valid';
        $APP->stop(array(false, $message, $data));
    }
}

/**
 * Print Logs
 */
function printLog($obj, $isDie=true) {
    echo "<pre>";
    print_r($obj);
    if ($isDie) {
        die;
    }
}

/* * **************************
 * *** POST - File upload
 * * */



$APP->post('upload', false, function() use($APP) {
            $data = array();
            global $USERID;
            //global $controller;
            global $VARS;

            //If directory doesnot exists create it.
            $output_dir = IMAGE_UPLOAD;
            $output_subdir = $output_dir . "original/";
            $output_subdir1 = $output_dir . "large/";
            $output_subdir2 = $output_dir . "medium/";
            $output_subdir3 = $output_dir . "thumb/";


            if (isset($_FILES['upload'])) {

                $errors = array();
                $file_name = $_FILES['upload']['name'];
                $file_size = $_FILES['upload']['size'];
                $file_tmp = $_FILES['upload']['tmp_name'];
                $file_type = $_FILES['upload']['type'];
                $file_epld = explode('.', $_FILES['upload']['name']);
                $file_ext_temp = end($file_epld);
                $file_ext = strtolower($file_ext_temp);
                $filename = '';

                $expensions = array(
                    "jpeg",
                    "jpg",
                    "png",
                    "gif"
                );
                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }
                if ($file_size > 10485760) {
                    $errors[] = 'File size must be less than 10 MB';
                }
                if (empty($errors) == true) {


                    $RandomNum = time() . date("-Ymd-hisa");
                    $ImageName = str_replace(' ', '-', strtolower($file_name));
                    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                    $ImageExt = str_replace('.', '', $ImageExt);
                    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                    $NewImageName = 'uploads-' . rand(111, 999) . rand(11, 99) . '-' . $RandomNum . '.' . $ImageExt;
                    $filepath_original = $output_subdir . $NewImageName;


                    $path_size = array(
                        array('path' => $output_subdir1 . $NewImageName, 'size' => 500),
                        array('path' => $output_subdir2 . $NewImageName, 'size' => 300),
                        array('path' => $output_subdir3 . $NewImageName, 'size' => 100)
                    );



                    if ($APP->imageResizeLib($file_tmp, $filepath_original, $path_size)) {
                        $data["image_name"] = $NewImageName;
                        $message = 'File uploaded successfully';
                        return array(true, $message, $data);
                        die;
                    } else {
                        $message = "Invalid, File not correct";
                        return array(false, $message, $data);
                    }
                } else {
                    $message = implode(" , ", $errors);
                    return array(false, $message, $data);
                }
            } else {
                $message = "Required resource is invalid";
                return array(false, $message, $data);
            }

            return array(false, "System error", $data);
        });

function DEFAULT_DOWNLOAD_IMAGE_FROM_URL($url) {
    global $APP;



    //If directory doesnot exists create it.
    $output_dir = IMAGE_UPLOAD;
    $output_subdir = $output_dir . "original/";
    $output_subdir1 = $output_dir . "large/";
    $output_subdir2 = $output_dir . "medium/";
    $output_subdir3 = $output_dir . "thumb/";


    $RandomNum = time() . date("-Ymd-hisa");
    $NewImageName = 'uploads-' . rand(111, 999) . rand(11, 99) . '-' . $RandomNum . '.png';
    $filepath_original = $output_subdir . $NewImageName;

    $ch = curl_init($url);
    $fp = fopen($filepath_original, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    $path_size = array(
        array('path' => $output_subdir1 . $NewImageName, 'size' => 500),
        array('path' => $output_subdir2 . $NewImageName, 'size' => 300),
        array('path' => $output_subdir3 . $NewImageName, 'size' => 100)
    );


    //$contents = file_get_contents($url);
    if ($APP->imageResizeLib($filepath_original, $filepath_original, $path_size)) {
        //unlink($filepath_original);


        $data["image_name"] = $NewImageName;
        $message = 'File uploaded successfully';
        return array(true, $message, $NewImageName);
        die;
    } else {
        $message = "Invalid, File not correct";
        return array(false, $message, "");
    }

    $message = "Invalid, image URL";
    return array(false, $message, "");
}

/*
 * PUT METHOD
 * 
 * :$TABLE_NAME -[String] enter table name that you want to update
 * :$TABLE_VARS - [Array] enter your custom parameters
 * :$TABLE_ID   - [String] enter Where varible value
 * :$SELF       - [BOOL] if its true then Where variable value is users USER ID
 * :$DIFF_TABLEID_NAME - [String] if where varible is different then set your key
 * :$PERMITION - [Array] column names that don't allow to update by User
 * :$PREFIX - [BOOL] if its true then add table name as prefix for every parameters 
 * 
 */

function DEFAULT_PUT_METHOD($TABLE_NAME, $TABLE_VARS=false, $TABLE_ID=false, $SELF=false, $DIFF_TABLEID_NAME=false, $PERMITION=false, $PREFIX=false) {

//    printLog($TABLE_NAME, FALSE);
//    printLog($TABLE_VARS, FALSE);
//    printLog($TABLE_ID, FALSE);
//    printLog($SELF, FALSE);
//    printLog($DIFF_TABLEID_NAME, FALSE);
//    printLog($PERMITION, FALSE);
//    printLog($PREFIX);
    
    $data = array();
    global $USERID;
    global $VARS;
    global $ID;
    global $APP;
    global $LANG;
    $controller = new Controllers();
    //echo 1;die;

    if (!isset($LANG) || empty($LANG)) {
        return array(false, "language not working", $data);
    }

    if ((!isset($ID) || empty($ID)) && (!isset($TABLE_ID) || empty($TABLE_ID))) {
        if (!$SELF)
            return array(false, $LANG->display("putmethod_1"), $data);
    }

    if ($SELF && (!isset($ID) || empty($ID))) {
        return array(false, $LANG->display("putmethodSelf_1"), $data);
    }

    if (empty($VARS) && empty($TABLE_VARS)) {
        return array(false, $LANG->display("putmethod_2"), $data);
    }



    $table_name;
    $post_vars;
    $table_id;
    $table_id_name;

    if (!empty($TABLE_NAME)) {
        $table_name = $TABLE_NAME;
    } else {
        return array(false, 'No Table name specify', $data);
    }

    if ($TABLE_VARS && !empty($TABLE_VARS)) {
        $post_vars = $TABLE_VARS;
    } else {
        $post_vars = $VARS;
    }

    if ($TABLE_ID && !empty($TABLE_ID)) {
        $table_id = $TABLE_ID;
    } else if ($SELF && !empty($SELF)) {
        $table_id = $USERID;
    } else {
        $table_id = $ID;
    }

    if ($DIFF_TABLEID_NAME && !empty($DIFF_TABLEID_NAME)) {
        $table_id_name = $DIFF_TABLEID_NAME;
    } else {
        $table_id_name = $TABLE_NAME . "_id";
    }

    if ($PREFIX && !empty($PREFIX)) {
        $f_post_vars = array();
        foreach ($post_vars as $key => $value) {
            $f_key = $table_name . "_" . $key;
            $f_post_vars[$f_key] = $value;
        }
        $post_vars = $f_post_vars;
    }

    if ($PERMITION && !empty($permissions)) {
        $keys = array_keys($post_vars);
        if (count(array_intersect($keys, $permissions)) != count($keys)) {
            return array(false, $LANG->display("putmethod_3"), $data);
        }
    }






    //Check Id Exist
    $result = $controller->checkRecord($table_name, $table_id_name, $table_id);
    if ($result) {

        //echo "<pre>";print_r($post_vars);die;
        $blank_params = array();
        foreach ($post_vars as $key => $value) {
            //printLog($value,false);
            if ($APP->validateData($value)) {
                
            } else {
                array_push($blank_params, $key);
            }
        }

        if (count($blank_params) > 0) {
            $str = implode(",", $blank_params);
            return array(false, $LANG->display("putmethod_4") . "$str" . $LANG->display("putmethod_5"), $data);
        }

        //Get All Columns and Verify with DB
        $check_update_params = $controller->getColumns($table_id_name, $post_vars, $table_name);
        if ($check_update_params) {

            //Updates data
            $result = $controller->updateRecords($table_name, $table_id_name, $table_id, $check_update_params);

            if ($result) {
                $data['Result'] = $result;
                return array(true, $LANG->display("putmethod_6"), $data);
                die;
            } else {
                return array(false, $LANG->display("putmethod_7"), $data);
            }
        } else {
            $check_wrong_params = $controller->getWrongColumns($table_id_name, $post_vars, $table_name);
            return array(false, $LANG->display("putmethod_8") . $check_wrong_params, $data);
        }
    } else {
        return array(false, $LANG->display("putmethod_9"), $data);
    }

    return array(true, $LANG->display("putmethod_10"), $data);
    //return array($success,$message,$data);
}

/*
 * DELETE METHOD
 * 
 * :$TABLE_NAME -[String] enter table name that you want to update
 * :$TABLE_ID   - [String] enter Where varible value
 * :$DIFF_TABLEID_NAME - [String] if where varible is different then set your key 
 * 
 */

function DEFAULT_DELETE_METHOD($TABLE_NAME, $TABLE_ID=false, $DIFF_TABLEID_NAME=false) {
    $data = array();
    global $USERID;
    global $VARS;
    global $ID;
    global $LANG;
    $controller = new Controllers();

    if (!isset($LANG) || empty($LANG)) {
        return array(false, "language not working", $data);
    }

    if ((!isset($ID) || empty($ID)) && (!isset($TABLE_ID) || empty($TABLE_ID))) {
        return array(false, $LANG->display("deletemethod_1"), $data);
    }


    $table_name;
    $table_id;
    $table_id_name;

    if (!empty($TABLE_NAME)) {
        $table_name = $TABLE_NAME;
    } else {
        return array(false, 'No Table name specify', $data);
    }



    if ($TABLE_ID && !empty($TABLE_ID)) {
        $table_id = $TABLE_ID;
    } else {
        $table_id = $ID;
    }

    if ($DIFF_TABLEID_NAME && !empty($DIFF_TABLEID_NAME)) {
        $table_id_name = $DIFF_TABLEID_NAME;
    } else {
        $table_id_name = $TABLE_NAME . "_id";
    }

    $exist = $controller->checkRecord($table_name, $table_id_name, $table_id);

    if ($exist == false) {
        return array(false, $LANG->display("delmethod_2"), $data);
        exit;
    } else {
        $data = $controller->getRecord($table_name, $table_id_name, $table_id);
        $res = $controller->deleteRecords($table_name, $table_id_name, $table_id);
        if ($res) {
            //$data['Result'] = $res;
            return array(true, $LANG->display("delmethod_3"), $data);
            exit;
        } else {
            return array(false, $LANG->display("delmethod_4"), $data);
            exit;
        }
    }

    return array(false, $LANG->display("delmethod_5"), $data);
    //return array($success,$message,$data);
}

/*
 * *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
 * SOCIAL REST API version 3.1 by Darshit
 * *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
 * By default development will show errors but testing and live will hide them.
 */
?>