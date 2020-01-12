<?php

/* * ******************************************************************************************************* */
/* * *********************************************  REST  ************************************************** */
/* * ******************************************************************************************************* */

class REST extends MY_base {

    public $_allow = array();
    public $_content_type = "application/json";
    public $_request = array();
    public $_request_id = array();
    public $statusCodes = array();
    private $_method = "";
    private $_code = 200;

    public function __construct() {
        parent::__construct();
        $this->inputs();
        $this->getStatusCodes();
    }

    public function get_referer() {
        return $_SERVER['HTTP_REFERER'];
    }

    public function response($data, $status) {
        $this->_code = ($status) ? $status : 200;
        $this->set_headers();
        echo $this->json($data);
        exit;
    }

    private function safe_json_encode($value) {
        if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
            $encoded = json_encode($value, JSON_PRETTY_PRINT);
        } else {
            $encoded = json_encode($value);
        }
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return $encoded;
            case JSON_ERROR_DEPTH:
                return 'Maximum stack depth exceeded'; // or trigger_error() or throw new Exception()
            case JSON_ERROR_STATE_MISMATCH:
                return 'Underflow or the modes mismatch'; // or trigger_error() or throw new Exception()
            case JSON_ERROR_CTRL_CHAR:
                return 'Unexpected control character found';
            case JSON_ERROR_SYNTAX:
                return 'Syntax error, malformed JSON'; // or trigger_error() or throw new Exception()
            case JSON_ERROR_UTF8:
                $clean = $this->utf8ize($value);
                return $this->safe_json_encode($clean);
            default:
                return 'Unknown error'; // or trigger_error() or throw new Exception()
        }
    }

    private function utf8ize($mixed) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = $this->utf8ize($value);
            }
        } else if (is_string($mixed)) {
            return utf8_encode($mixed);
        }
        return $mixed;
    }

    public function get_request_method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    /*
     *  Encode array into JSON
     */

    private function json($data) {
        if (is_array($data)) {

            return $this->safe_json_encode($data);
            //return json_encode($data);
        }
    }

    private function getStatusCodes() {
        $this->statusCodes = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported');

        return $this->statusCodes;
    }

    private function get_status_message() {

        return ($this->statusCodes[$this->_code]) ? $this->statusCodes[$this->_code] : $this->statusCodes[500];
    }

    private function inputs() {
        switch ($this->get_request_method()) {
            case "POST":
                $this->_request = $this->cleanInputs($_POST);
                break;
            case "GET":
                $this->_request = $this->cleanInputs($_GET);
                break;
            case "DELETE":
                parse_str(file_get_contents("php://input"), $this->_request);
                $this->_request = $this->cleanInputs($this->_request);
                break;
            case "PUT":
                parse_str(file_get_contents("php://input"), $this->_request);
                $this->_request = $this->cleanInputs($this->_request);
                break;
            default:
                $this->response('', 406);
                break;
        }
    }

    private function cleanInputs($data) {
        $clean_input = array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->cleanInputs($v);
            }
        } else {
            if (get_magic_quotes_gpc()) {
                $data = trim(stripslashes($data));
            }
            $data = strip_tags($data);
            $clean_input = trim($data);
        }
        return $clean_input;
    }

    private function set_headers() {
        header("HTTP/1.1 " . $this->_code . " " . $this->get_status_message());
        header("Content-Type:" . $this->_content_type);
    }

}

/* * ******************************************************************************************************* */
/* * ***********************************  Authentication  ************************************************** */
/* * ******************************************************************************************************* */

class Authentication extends REST {

    public $Users_id = 0;
    public $lang = "";
    public $otherVars = array();

    public function __construct() {
        parent::__construct();
    }

    function auth_method($headers) {
        //var_dump($headers);
        // Verifying Authorization Header
        $xauth = 'X-Authorization';
        $xauth_lower = strtolower($xauth);
        //var_dump($headers);

        if (isset($headers[$xauth_lower])) {
            // echo 1;	 printLog($headers);
            //var_dump($headers);
            // get the api key
            $api_key = $headers[$xauth_lower];
            $con = new Controllers();
            $auth_id = $con->athentication($api_key);
            if ($auth_id) {
                return $auth_id;
            }
            else
                return "failed";
        }
        else if (isset($headers[$xauth])) {

            //var_dump($headers);
            // get the api key
            $api_key = $headers[$xauth];
            $con = new Controllers();
            $auth_id = $con->athentication($api_key);
            if ($auth_id) {
                return $auth_id;
            }
            else
                return "failed";
        }
        //echo 3;	 printLog($headers);
        return "missed";
    }

    function lang_method($headers) {

        $given_languages = unserialize(LANGUAGE);
        //var_dump($headers);
        // Verifying Authorization Header
        $lang = 'Accept-Language';
        $lang_lower = strtolower($lang);
        //var_dump($headers);

        if (isset($headers[$lang_lower])) {
            // echo 1;	 printLog($headers);
            //var_dump($headers);
            // get the api key
            $language = $headers[$lang_lower];

            if (!empty($language) && in_array($language, $given_languages)) {
                return $language;
            }
            else
                return "failed";
        }
        else if (isset($headers[$lang])) {

            //var_dump($headers);
            // get the api key
            $language = $headers[$lang];
            if (!empty($language) && in_array($language, $given_languages)) {
                return $language;
            }
            else
                return "failed";
        }
        //echo 3;	 printLog($headers);
        return "missed";
    }

    function otherVars_method($headers, $tag) {
        //var_dump($headers);
        // Verifying Authorization Header
        //$xauth = 'X-Authorization';
        
        $given_vars = unserialize(OTHER_HEADER_VARS);
        
        $x_other = $tag;
        $x_other_lower = strtolower($x_other);
        //print_r($headers);die;

        if (!empty($x_other)) {

            //var_dump($headers);
            
            if (isset($headers[$x_other_lower])) {
                // echo 1;	 printLog($headers);
                //var_dump($headers);
                // get the api key
                $otherval = $headers[$x_other_lower];
             
                if (!empty($otherval)) {
                    return $otherval;
                }
                else
                    return "failed";
            }
            else if (isset($headers[$x_other])) {

                //var_dump($headers);
                // get the api key
                $otherval = $headers[$x_other];
                if (!empty($otherval)) {
                    return $otherval;
                }
                else
                    return "failed";
            }
        }
        //echo 3;	 printLog($headers);
        return "missed";
    }

    //Authentication Process
    function checkAuthentication() {

        if ($this->Users_id == "failed") {
            // Athentication API is invalid
            $response["error"] = true;
            $response["success"] = false;
            $response["message"] = "Authentication API is invalid!";
            // echoing JSON response
            $this->response($response, 401);
        } else if ($this->Users_id == "missed") {
            // Athentication API is missing
            $response["error"] = true;
            $response["success"] = false;
            $response["message"] = "Authentication API is missing!";
            // echoing JSON response
            $this->response($response, 401);
        }
    }

    //Authentication Process
    function isAuthorized() {
        //echo "<pre>";print_r($this->Users_id);die;
        if ($this->Users_id == "failed") {
            return false;
        } else if ($this->Users_id == "missed") {
            return false;
        }
        return true;
    }

    //Authentication Process
    function checkLanguage() {

        if (LANGUAGE) {
            if ($this->lang == "failed") {
                // Athentication API is invalid
                $response["error"] = true;
                $response["success"] = false;
                $response["message"] = "Input Language is invalid, Check again!";
                // echoing JSON response
                $this->response($response, 417);
            } else if ($this->lang == "missed") {
                // Athentication API is missing
                $response["error"] = true;
                $response["success"] = false;
                $response["message"] = "Language is missing, Please input your language!";
                // echoing JSON response
                $this->response($response, 417);
            }
        } else {
            if ($this->lang == "failed") {
                $this->lang = 'english';
            } else if ($this->lang == "missed") {
                $this->lang = 'english';
            }
        }
    }

    //Authentication Process
    function checkOtherVars() {

        
        if (count(OTHER_HEADER_VARS) && count($this->otherVars) > 0) {
            foreach ($this->otherVars as $var_value) {
               
                if ($var_value == "failed") {
                    // Athentication API is invalid
                    $response["error"] = true;
                    $response["success"] = false;
                    $response["message"] = "Input header variables  value is invalid, Check again!";
                    // echoing JSON response
                    $this->response($response, 417);
                    break;
                } else if ($var_value == "missed") {
                    // Athentication API is missing
                    $response["error"] = true;
                    $response["success"] = false;
                    $response["message"] = "header is missing, Please input your header variables!";
                    // echoing JSON response
                    $this->response($response, 417);
                    break;
                }
            }
        } else {
            if ($this->otherVars == "failed") {
                $this->otherVars = array();
            } else if ($this->otherVars == "missed") {
                $this->otherVars = array();
            }
        }
    }

    // URL submission methods
    function checkMethod($method) {
        $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

        //var_dump($request);

        switch ($method) {
            case 'PUT':
                return "PUT";
                break;
            case 'POST':
                return "POST";
                break;
            case 'GET':
                return "GET";
                break;
            case 'HEAD':
                return "HEAD";
                break;
            case 'DELETE':
                return "DELETE";
                break;
            case 'OPTIONS':
                return "OPTIONS";
                break;
            default:
                return "";
                break;
        }
    }

}

/* * ******************************************************************************************************* */
/* * **********************************************  APP  ************************************************** */
/* * ******************************************************************************************************* */

class APP extends Authentication {

    private $Headers = NULL;
    private $isAuth = false;
    private $isLang = IS_LANGUAGE;
    private $isOtherHeaderVars = IS_OTHER_HEADER_VARS;
    private $func;

    public function __construct($headers) {
        parent::__construct();
        $this->Headers = $headers;

        $this->init();
    }

    public function __call($method, $args) {
        if (property_exists($this, $method)) {
            if (is_callable($this->$method)) {
                return call_user_func_array($this->$method, $args);
            }
        }
    }

    private function init() {
        $this->Users_id = $this->auth_method($this->Headers);
        $this->lang = $this->lang_method($this->Headers);


        if (IS_OTHER_HEADER_VARS && count(OTHER_HEADER_VARS) > 0) {
            $array = unserialize(OTHER_HEADER_VARS);
            foreach ($array as $value) {
                $this->otherVars[] = $this->otherVars_method($this->Headers, $value);
            }
        }

        if (isset($_REQUEST['rquest']))
            $this->func = strtolower(trim(str_replace("/", "", $_REQUEST['rquest'])));

        if (isset($_REQUEST['id']))
            $this->_request_id = strtolower(trim(str_replace("/", "", $_REQUEST['id'])));
    }

    /*
     * Private method for access api.
     * This method dynmically call the method based on the query string
     *
     */

    private function processApi($func_name, $func_details, $errorCode=false) {
        //echo "<pre>";print_r(get_class_methods($this));die;
        //echo "<pre>";print_r($func_name);
        if (strtoupper($func_name) == strtoupper($this->func)) {
            $data = $func_details();
            if (!empty($data)) {
                //echo "<pre>";print_r($data);die;
                $this->success($data);
                return true;
            } else {

                $this->response($func_details(), 204);

                return false;
            }
        }
        else
            return false;
        //$this->response('Error code 404, Page not found',404);// If the method not exist with in this class, response would be "Page not found".
    }

    private function functionCheck($func_name) {
        //echo "<pre>";print_r(get_class_methods($this));die;
        //echo "<pre>";print_r($func_name);
        if (strtoupper($func_name) == strtoupper($this->func)) {
            return true;
        }
        else
            return false;
        //$this->response('Error code 404, Page not found',404);// If the method not exist with in this class, response would be "Page not found".
    }

    private function auth() {
        // Cross validation if the request method is GET else it will return "Not Acceptable" status

        if ($this->isLang)
            $this->checkLanguage();


        if ($this->isAuth)
            $this->checkAuthentication();
       
        if ($this->isOtherHeaderVars)
            $this->checkOtherVars();




        return true;
    }

    private function methodCheck($method) {
        // Cross validation if the request method is GET else it will return "Not Acceptable" status

        if ($this->get_request_method() != $method) {
            //$this->response('',406);
            return false;
        }

        return true;
    }

    private function success($data=false) {
        //print_r(1);die;
        if ($data) {
            $response = array();


            if (isset($data[2]) && !empty($data[2]))
                $response = $data[2];


            $response["error"] = !($data[0]);
            $response["success"] = $data[0];
            $response["message"] = $data[1];


            //echo "<pre>";print_r($this->statusCodes);die;
            if (isset($data[3]) && $data[3] != false) {
                $errorCode = $data[3];
                if (array_key_exists($errorCode, $this->statusCodes))
                    $this->response($response, $errorCode);
                else
                    $this->response($response, 406);
            }
            else
                $this->response($response, 200);

            die;
        }
        $this->response('Error code 404, Page not found', 404);
        die;
    }

    public function get($func_name, $auth=false, $func_details) {
        //echo"<pre>";print_r($func_name);die;
        $this->isAuth = $auth;
        //return false;

        if (!$this->methodCheck("GET")) {
            return false;
        }

        //echo "<pre>";print_r($func_name);die;
        if (!$this->functionCheck($func_name)) {
            return false;
        }

        if (!$this->auth()) {
            return false;
        }

        //echo "<pre>";print_r($func_name);die;
        if (!$this->processApi($func_name, $func_details)) {
            return false;
        }
    }

    public function post($func_name, $auth=false, $func_details) {

        $this->isAuth = $auth;
        //return false;

        if (!$this->methodCheck("POST")) {
            return false;
        }

        //echo "<pre>";print_r($func_name);die;
        if (!$this->functionCheck($func_name)) {
            return false;
        }

        if (!$this->auth()) {
            return false;
        }

        //echo "<pre>";print_r($func_name);die;
        if (!$this->processApi($func_name, $func_details)) {
            return false;
        }
    }

    public function put($func_name, $auth=false, $func_details) {
        $this->isAuth = $auth;

        if (!$this->methodCheck("PUT")) {
            return false;
        }


        //echo "<pre>";print_r($func_name);die;
        if (!$this->functionCheck($func_name)) {
            return false;
        }

        if (!$this->auth()) {
            return false;
        }

        //echo "<pre>";print_r($func_name);die;
        if (!$this->processApi($func_name, $func_details)) {
            return false;
        }
    }

    public function delete($func_name, $auth=false, $func_details) {
        $this->isAuth = $auth;


        if (!$this->methodCheck("DELETE")) {
            return false;
        }

        //echo "<pre>";print_r($func_name);die;
        if (!$this->functionCheck($func_name)) {
            return false;
        }

        if (!$this->auth()) {
            return false;
        }

        //echo "<pre>";print_r($func_name);die;
        if (!$this->processApi($func_name, $func_details)) {
            return false;
        }
    }

    public function stop($data=false) {
        if ($data) {
            $this->success($data);
        }

        $this->response('Error code 404, Page not found', 404);
    }

    public function test() {
        return "TEST";
    }

}

?>