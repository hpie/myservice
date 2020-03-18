<?php

 function getaddress($lat,$lng)
  {
     $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }

function accountnumber($userid) {
    $length = strlen($userid);
    $str = '';
    for ($i = $length; $i < 10; $i++) {
        $str = $str . '0';
    }
    $str = $str . $userid;
    return $str;
}

function uniqueMd5() {
    return md5(time() . uniqid(rand() . mt_rand(1, 10000000), true));
}

function addYearInDate($date, $year) {
    $date = date('Y-m-d', strtotime($date . '+' . $year . ' years'));
    return $date;
}

function dbDatetime($prefix) {
    $_POST[$prefix . '_datetime'] = date('Y-m-d H:i:s');
    $_POST[$prefix . '_date'] = date('Y-m-d');
    return $_POST;
}

function dbImage($Image) {
    $image = singleImageUpload($Image);
    if (($_FILES[$Image]['name']) != '') {
        $str = $image[2]['image_name'];
        $_POST[$Image] = $str;
    }
    return $_POST;
}

function dateFormatter($old_date) {
    $date = date_create($old_date);
    $old_date = new DateTime("$date");
    $new_date = date_format($old_date, 'd-m-Y');
    // echo $new_date;die;
    return $new_date;
}

function returnMonth($old_date) {
    $date = date_create($old_date);
    $old_date = new DateTime("$date");
    $new_date = date_format($old_date, 'm');
    // echo $new_date;die;
    return $new_date;
}

function returnYear($old_date) {
    $date = date_create($old_date);
    $old_date = new DateTime("$date");
    $new_date = date_format($old_date, 'Y');
    // echo $new_date;die;
    return $new_date;
}

function dateFormatterComma($old_date) {
    $date = date_create($old_date);
    $old_date = new DateTime("$date");
    $new_date = date_format($old_date, 'm,d,Y');
    // echo $new_date;die;
    return $new_date;
}

function dateFormatterMysql($old_date) {
    $old_date = str_replace('/', '-', $old_date);
//    echo date('Y-m-d', strtotime($date));    
    $old_date = date_create($old_date . ' 00:00:00');
    $new_date = date_format($old_date, 'Y-m-d');
    return $new_date;
}


function datetimeFormatter($old_date) {
    $date = date_create($old_date);
    $old_date = new DateTime("$date");
    $new_date = date_format($old_date, 'd/m/Y H:i');
    // echo $new_date;die;
    return $new_date;
}

function unixTimestampToDT($timestamp) {
    $timestamp = $timestamp * 0.001;
    $new_date = date('d/m/Y H:i', $timestamp);
    return $new_date;
}

function unixTimestampToD($timestamp) {
    $timestamp = $timestamp * 0.001;
    $new_date = date('d/m/Y', $timestamp);
    return $new_date;
}

function datetimeFormatterC($old_date) {
    $date = date_create($old_date);
    $old_date = new DateTime("$date");
    $new_date = date_format($old_date, 'j M, H:i A');
    // echo $new_date;die;
    return $new_date;
}

function set_selected($desired_value, $new_value) {
    if ($desired_value == $new_value) {
        echo ' selected="selected"';
    }
}
function set_cheked($desired_value, $new_value) {
    if ($desired_value == $new_value) {
        echo ' checked';
    }
}

function returnSingleImage($imgArray, $field) {
    $arr = array();
    $img_field = $field . '_image';
    if (!empty($imgArray)) {
        foreach ($imgArray as $row) {
            $image = explode(',', $row[$img_field]);
            $row['product_image'] = $image[0];
            array_push($arr, $row);
        }
    }
    return $arr;
}

function promocode() {
    $characters = 'ACEFHJKMNPRTUVWXY4937';
    $string = '';
    for ($i = 0; $i < 6; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
}   


function gen_uuid() {

//      return hexdec(uniqid (rand ()));  
//      return base_convert(md5(hexdec(uniqid (rand ()))), 8, 10);
    return base_convert(hexdec(md5(sprintf('%04x%04x%04x%04x%04x%04x%04x%04x',
                                    // 32 bits for "time_low"
                                    mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                                    // 16 bits for "time_mid"
                                    mt_rand(0, 0xffff),
                                    // 16 bits for "time_hi_and_version",
                                    // four most significant bits holds version number 4
                                    mt_rand(0, 0x0fff) | 0x4000,
                                    // 16 bits, 8 bits for "clk_seq_hi_res",
                                    // 8 bits for "clk_seq_low",
                                    // two most significant bits holds zero and one for variant DCE1.1
                                    mt_rand(0, 0x3fff) | 0x8000,
                                    // 48 bits for "node"
                                    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
                            ) . time() . uniqid(rand() . mt_rand(1, 10000000), true))), 16, 10);
//    
//    return sprintf('%04x%04x%04x%04x%04x%04x%04x%04x',
//            // 32 bits for "time_low"
//            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
//            // 16 bits for "time_mid"
//            mt_rand(0, 0xffff),
//            // 16 bits for "time_hi_and_version",
//            // four most significant bits holds version number 4
//            mt_rand(0, 0x0fff) | 0x4000,
//            // 16 bits, 8 bits for "clk_seq_hi_res",
//            // 8 bits for "clk_seq_low",
//            // two most significant bits holds zero and one for variant DCE1.1
//            mt_rand(0, 0x3fff) | 0x8000,
//            // 48 bits for "node"
//            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
//    );
}

?>