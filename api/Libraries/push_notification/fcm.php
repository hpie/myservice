<?php
//require_once __DIR__ . '/config.php';
 $reg_id= 'coD45zCpKDI:APA91bEr_tCxkObr9QxVsMJT3ZRiqqHqKDSY04a0IE_ZlHmARKevbhssB4_zZEaZSlJArpDcGoF4SO3iISgbDrp1BWZFCNqhLnjmcKya0lJqCB0EL2lWPTLON7rjWPrwvzJypwoxxnhM';
 $data=array();
 $data['to'] = $reg_id;
 $data['priority'] = "high";
 $data['notification']["body"] = "This week's edition is now available.";
 $data['notification']["title"] = "NewsMagazine.com";
 $data['notification']["icon"] = "new";
 $data['data']["volume"] = array();
 
//echo '<pre>'; print_r($data);  print_r(json_encode($data)); die;
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
 
        $headers = array(
            'Authorization: key=AIzaSyAyz4YasoR0EijCBGKXHMgW3aTpdK0cuUA',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
 
        echo '<pre>'; print_r($result); die;