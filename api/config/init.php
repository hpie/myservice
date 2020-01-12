<?php
//error_reporting(E_ALL);
//date_default_timezone_set('Asia/Kolkata');
/*register_shutdown_function('errorHandler');

function errorHandler() { 
    $error = error_get_last();
    $type = $error['type'];
    $message = $erro['message'];
    if ($type = 64 && !empty($message)) {
        echo "
            <strong>
              <font color=\"red\">
              Fatal error captured:
              </font>
            </strong>
        ";
        echo "<pre>";
        print_r($error);
        echo "</pre>";
    }
}*/

/*
 *---------------------------------------------------------------
 * Timezone
 *---------------------------------------------------------------
 * 
 */

//date_default_timezone_set("asia/kolkata");
date_default_timezone_set('UTC');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING ENVIRONMENT :development :testing :production
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
 
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
define('LANGUAGE', serialize (array('english','italian')));
define('IS_LANGUAGE', FALSE);

define('OTHER_HEADER_VARS', serialize (array('Auth-Key')));
define('IS_OTHER_HEADER_VARS', false);
define('DEFAULT_LANGUAGE', "english");//"english"

$r = $_SERVER['SCRIPT_NAME'];
$subdomain = explode('/', $r);
array_pop($subdomain);
define('BASE_URL_API', 'http://'.$_SERVER['HTTP_HOST'].  implode('/', $subdomain).'/');   
define('BASE_URL', 'https://'.$_SERVER['HTTP_HOST'].'/');   

//API current version
define('REST_VERSION', 'v1/');

//Image Upload Directory
define('IMAGE_UPLOAD', '../../uploads/');


//Authentication Query from database
define('AUTH_QUERY', "SELECT user_id FROM user WHERE user_api=");


/************** iPhone Push Notification **********/


define('PASSPHRASE', "welcome");
//define('CKFILEPATH_DEV', "../Libraries/iphone_push/ckdev.pem");
//define('CKFILEPATH_DIST', "../Libraries/iphone_push/ckdist.pem");
//define('CKFILEPATH_DIST', "../Libraries/push_notification/ckdist.pem");
define('CKPORT', "2195");
define('CKURLPATH_DEV', "ssl://gateway.sandbox.push.apple.com:".CKPORT);
define('CKURLPATH_DIST', "ssl://gateway.push.apple.com:".CKPORT);

/************** Android Push Notification **********/
define('GOOGLE_API_KEY', "AIzaSyAyz4YasoR0EijCBGKXHMgW3aTpdK0cuUA");
//define('GOOGLE_API_KEY', "AIzaSyAOyDorWWCMkhPoO2p9kXRr_WJ8CT-jK2Y");


/*
 *---------------------------------------------------------------
 * Library Intialization
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
 
 

//Library for image resizing
//require_once('../Libraries/php-image-magician/php_image_magician.php');
require_once('../Libraries/image-resize/ImageResize.php');
//Library for email sending
include_once('../Libraries/smtp_mail/smtp_send.php');

include_once('../Libraries/epayment/TreasuryPayment.php');

//Class for PushNotification
//include_once("../Libraries/android_push/android_notification.php");
//include_once("../Libraries/iphone_push/iphone_notification.php");
//include_once("../Libraries/push_notification/push_notification.php");
//include_once("../Libraries/push_notification/fcm.php");




/*
 *---------------------------------------------------------------
 * System Intialization
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//System
include_once("../System/index.php");






/*
 *---------------------------------------------------------------
 * Models Intialization
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
 
 

//Models
include_once("../model/model.php");






/*
 *---------------------------------------------------------------
 * Controller Intialization
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
 


//Controllers
include_once("../controller/controller.php");

//Controller initializing
$controller = new Controller();
?>