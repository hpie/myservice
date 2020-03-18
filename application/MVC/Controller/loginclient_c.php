<?PHP

class loginclient_c extends Controllers {

    public $login_m;

    public function __construct() {
        parent::__construct();
        $this->login_m = $this->loadModel('loginclient_m');
    }     
    public function login() {           
        if (isset($_POST['email']) && isset($_POST['password'])) {                                           
            $result = $this->login_m->userLogin($_POST['email'], $_POST['password']);
            if ($result == true) {                 
                $_SESSION['loginsuccess'] = 1;
                redirect(BASE_URL);                
            }
            if ($result == false) {
                $_SESSION['valid'] = 1;
            }
        }
        $this->data['TITLE'] = CLIENT_LOGIN_TITLE;
        loadviewClient('client/', 'account.php', $this->data);
    }    
    public function register() {         
        if(isset($_POST['user_email']) && !empty($_POST['user_email'])) {
            $_POST['user_password']= promocode();
            $result = $this->login_m->register($_POST);                        
            if ($result) {                                
                $_SESSION['registersuccess'] = 1;
                redirect(BASE_URL);                
            }
        }
        $this->data['TITLE'] = 'REGISTER';
        loadviewClient('client/', 'register.php', $this->data);
    }
    public function logoutClient() {
        sessionDestroy();
        redirect(BASE_URL);
    }   
}

?>