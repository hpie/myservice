<?PHP

class loginclient_c extends Controllers {

    public $login_m;

    public function __construct() {
        parent::__construct();
        $this->login_m = $this->loadModel('loginclient_m');
        $this->admin_m = $this->loadModel('admin_m');
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
        if (isset($_POST['customer_mobile_number']) && !empty($_POST['customer_mobile_number'])) {
            if ($this->admin_m->getExist('service_customer', 'customer_mobile_number', $_POST['customer_mobile_number'])) {    
                $_SESSION['exitUser'] = 1;                
            }
            elseif ($this->admin_m->getExist('service_customer', 'customer_email', $_POST['customer_email'])) {    
                $_SESSION['exitUserEmail'] = 1;                
            }
            else {
                $result = $this->login_m->register($_POST);
                if ($result) {
                    $_SESSION['registersuccess'] = 1;
                    redirect(BASE_URL);
                }
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