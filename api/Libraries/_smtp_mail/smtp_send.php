<?php

/**
 * This example shows making an SMTP connection with authentication.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../Libraries/smtp_mail/PHPMailerAutoload.php';

class SMTP_mail {
    public $mail;
    public $sender_email;
    public $username;
    public $password;
    public $host;
    public $port;
    public $subject;
    public $app_name;
    public $link;
    public $sender_name;
    public $product_name;

    public function __construct() {//Create a new PHPMailer instance
        $this->mail = new PHPMailer;
      
         //OutGoing Server
        $this->host = "md-in-58.webhostbox.net";
        $this->port = 465;
        //$this->host = "mail.hypertechonline.com";
        $this->sender_email = "social_mailer@socialinfotech.com";
        $this->username = "social_mailer@socialinfotech.com";
        $this->password = "social_mailer";
        $this->app_name = "Task Away";
        $this->subject = "Reset Password : " . $this->app_name . " Application";
        
        
        $this->link = "http://web.socialinfotech.com/taskaway/forgot/index.php?datas=";
        $this->sender_name = "Social Infotech";
        $this->product_name = $this->app_name;
    }

    function Encrypt($data, $password="SocialMensa2016infotecH") {
        //echo $data;echo "<br>";
        
        $data = ((int)$data * 215 * 2016) + 39;
        
        $result = md5($data);
        
        //echo $result;die;
        //return encrypt_random($result, $password);
        return $result;
    }

    //Authentication
    public function send_email_resetpassword($email, $id, $name) {
        
        //echo 1;die;
        //$key_val = $this->Encrypt($id);
        //$notification = $message['notification'];
        //$notification = str_replace("___", "<br/> ", $notification);
        //Tell PHPMailer to use SMTP
        $this->mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $this->mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $this->mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $this->mail->Host = $this->host;
        //Set the SMTP port number - likely to be 25, 465 or 587
        //$this->mail->Port = 25;
        $this->mail->Port = $this->port;
        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = true;
        //Username to use for SMTP authentication
        $this->mail->Username = $this->username;
        //Password to use for SMTP authentication
        $this->mail->Password = $this->password;
        //Set who the message is to be sent from
        $this->mail->setFrom($this->sender_email, $this->sender_name);
        //Set an alternative reply-to address
        $this->mail->addReplyTo($this->sender_email, $this->sender_name);
        //Set who the message is to be sent to
        $this->mail->addAddress($email, $name);
        //Set the subject line
        $this->mail->Subject = $this->subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $explode = explode("@", $email);
        $email_name = $explode[0];
        //$contents = file_get_contents('verify_email.html');
        //$contents = file_get_contents('../smtp_mail/verify_email11.html');
        $html = file_get_contents('../Libraries/smtp_mail/resetpassword.html');
        //echo $html;die;
//                            $product_name = 'Find A home ';
//                            $name='Jatin';
//                            $sendername='Social Infotech';
//                            $url='http://google.com';

        //$newurl = $this->link . $this->Encrypt($id);
        $word = array('{{product_name}}', '{{name}}', '{{sender_name}}', '{{action_url}}');
        $replace = array($this->product_name, $name, $this->sender_name, $this->link .$id);
        $html = str_replace($word, $replace, $html);


        $this->mail->msgHTML($html, dirname(__FILE__));
        /* $this->mail->msgHTML('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Renthouse</title>
          </head>

          <body>'.$message.'
          </body>
          </html>
          ',
          dirname(__FILE__)); */

        //Replace the plain text body with one created manually
        $this->mail->AltBody = "Sorry, failed";
        //Attach an image file
        //$this->mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$this->mail->send()) {
            //echo "Mailer Error: " . $this->mail->ErrorInfo;
            return "Mailer Error: " . $this->mail->ErrorInfo;
        } else {
            //echo "Message sent!";
            return true;
        }
    }

}

?>