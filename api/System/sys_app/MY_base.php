<?php

class MY_base {

    public function __construct() {
        //parent::__construct();
    }

    public function print_logs($subject, $response) {
        //var_dump($response);die;
        $results = print_r($response, true);
        //Write action to txt log
        $log = "User: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F j, Y, g:i a") . PHP_EOL .
                "Subject: " . print_r($subject, true) . PHP_EOL .
                "Response: " . $results . PHP_EOL .
                "----------------------------------------------------------------------------------------------------" . PHP_EOL;
        //-
        file_put_contents('../Logs/log_' . date("j.n.Y") . '.txt', $log, FILE_APPEND);
    }

    //File Uploading Functions....
    public function imageResize($DOCS_SIZE, $size) {
        //array of width(0) height(1)
        $array_size = array();

        $width = $DOCS_SIZE[0];
        $height = $DOCS_SIZE[1];

        //image width > height
        if ($width > $height) {
            //image width > size set by user(parameter)
            if ($width > $size) {
                $new_width = $size;
                $new_height = $size * $height / $width;
                array_push($array_size, $new_width, $new_height);
            } else {
                $new_width = $size;
                $new_height = $size;
                array_push($array_size, $new_width, $new_height);
            }
        } else { //image height > width
            //image height > size set by user(parameter)
            if ($height > $size) {
                $new_height = $size;
                $new_width = $size * $width / $height;
                array_push($array_size, $new_width, $new_height);
            } else {
                $new_width = $size;
                $new_height = $size;
                array_push($array_size, $new_width, $new_height);
            }
        }

        return $array_size;
    }

    public function saveImages($input_file, $output_file, $sizeW, $sizeH) {
        //$filesezee = $filename."**".$imageArray[0]."**".$imageArray[1];
        $magicianObj = new imageLib($input_file);
        // will create a 100 X 100 image, check documentation for more parameters
        $magicianObj->resizeImage($sizeW, $sizeH);
        // saving file to thumb directory
        $magicianObj->saveImage($output_file, 100);
    }

    function imageResizeLib($file, $filepath_original, $path_size) {
        if ($file) {
            $image = new \Eventviva\ImageResize($file);
            $image->save($filepath_original);
            if ($path_size && !empty($path_size)) {
                foreach ($path_size as $ps) {
                    if (isset($ps['size']) && isset($ps['path'])) {
                        $image->resizeToBestFit($ps['size'], $ps['size']);
                        $image->save($ps['path']);
                    }
                }
                return true;
            }
        }
        return false;
    }

    //End File uploading...
    //remove Special characters
    public function clearData($value) {
        //$data = mysql_real_escape_string($data);
        //$search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
        //$replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
        //$inp = str_replace($search, $replace, $value);
        $inp = $value;
        if (is_array($inp))
            return array_map(__METHOD__, $inp);

        if (!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }

    //remove Special characters
    public function checkData($key) {
        if (isset($_REQUEST[$key]) && trim($_REQUEST[$key]) != '')
            return $_REQUEST[$key];
        return false;
    }

    // check length of string
    public function checkLength($data) {
        $len = 0;
        $len = strlen($data);
        if ($len > 0) {
            return $data;
        } else {
            return NULL;
        }
    }

    // check length of string
    public function validateData($data) {


        if ((isset($data) && !empty($data)) || $data == 0 || $data == '0') {
            //echo "<pre>1";print_r($data);
            return true;
        }
        //echo "<pre>2";print_r($data);
        return FALSE;
    }

    // Generate API key
    public function generateApiKey() {
        return md5(uniqid(rand(), true));
    }
    
    

    public function decodeJson_array($arr, $decode_tag=false) {
        if (!empty($arr) && $decode_tag) {
            foreach ($arr as $key => $val) {
                if (!isset($val[$decode_tag])) {
                    break;
                    return false;
                }
                if (empty($val[$decode_tag])) {
                    $arr[$key][$decode_tag] = array();
                } else {
                    $str = str_replace(',', '","', $val[$decode_tag]);
                    $str = str_replace('[', '["', $str);
                    $str = str_replace(']', '"]', $str);
                    $str = str_replace(' ', '', $str);
                    $arr[$key][$decode_tag] = json_decode($str);
                }
            }
            return $arr;
        }
        return false;
    }

    public function decodeJson($arr, $decode_tag=false) {
        if (!empty($arr) && $decode_tag) {
            if (!isset($arr[$decode_tag])) {

                return false;
            }

            if (empty($arr[$decode_tag])) {
                $arr[$decode_tag] = array();
            } else {
                $str = str_replace(',', '","', $arr[$decode_tag]);
                $str = str_replace('[', '["', $str);
                $str = str_replace(']', '"]', $str);
                $str = str_replace(' ', '', $str);
                $arr[$decode_tag] = json_decode($str);
            }



            return $arr;
        }
        return false;
    }

    public function Decript($data, $password="SocialMensa2016infotecH") {
      
        $result = '';
        //$data = base64_decode($data);
        for ($i = 0; $i < strlen($data); $i++) {
            $char = substr($data, $i, 1);
            $keychar = substr($password, ($i % strlen($password)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }

        $result = substr($result, 10);
        $result = substr($result, 0, -10);

        return $result;
    }

}

?>