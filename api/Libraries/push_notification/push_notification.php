<?php

/*
 * ---------------------------------------------------------------
 * NOTIFICATION
 * ---------------------------------------------------------------
 *
 * Android push notification
 * change KEY 
 */

//Renthouse
//define('SenderID', "38655277623");
class PUSH {

    //Setup
    private $to;    //For Single User
    private $registration_ids;   //For Multi User
    private $title; //Set Heading
    private $body; //Set message
    private $data; // send content of Array
    //Already configure
    private $sound; // default
    private $icon; // default
    private $priority; // default

    function __construct() {
        $this->priority = "high";
        $this->icon = "default";
        $this->sound = "default";
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setAsSingle($token) {
        $this->to = $token;
    }

    public function setAsMultiple($tokens) {
        $this->registration_ids = $tokens;
    }

    public function getPush() {

        $fields = array();

        if (isset($this->to) && !empty($this->to)) {
            $fields['to'] = $this->to;
        } else if (isset($this->registration_ids) && !empty($this->registration_ids)) {
            $fields['registration_ids'] = $this->registration_ids;
        } else {
            return false;
        }



        $fields['priority'] = $this->priority;

        $fields['notification']["title"] = $this->title;
        $fields['notification']["body"] = $this->body;
        
        $fields['notification']["sound"] = $this->sound;
        $fields['notification']["icon"] = $this->icon;
		if(empty($this->data) || count($this->data) <=0 || !isset($this->data))
		{
			$this->data = array('None'=>'There is no data available');
		}
		
        $fields['data'] = $this->data;


        return $fields;
    }

}

class PUSH_NOTIFY {

    //put your code here
    // constructor
    function __construct() {
        
    }

    /**
     * Sending Push Notification
     */
    public function send_notification($push) {
//echo"<pre>";print_r($push);die;
        // include config
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';


        //echo "Google==";
        //var_dump($push);

        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
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
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($push));

        // Execute post
      // echo"<pre>";print_r($ch);die;
        $result = curl_exec($ch);
         //echo"<pre>";print_r($result);die;
        if ($result === FALSE) {
            return 'Curl failed: ' . curl_error($ch);
        }

        // Close connection
        curl_close($ch);
		//echo "<pre>";print_r($result);die;
        return $result;
    }

}

?>
<?PHP

/*
  $push = new PUSH();
  $push->setTitle("");
  $push->setBody("");
  //$push->setAsSingle("");
  //$push->setAsMultiple(array(""));
  $push->setData(array(""));


  $push_notify = new PUSH_NOTIFY();
  $push_notify->send_notification($push->getPush());
 */
?>