<?php

class login_c extends Controllers {
    
    public $login_m;
    public function __construct() {
        parent::__construct();
        $this->login_m = $this->loadModel('login_m');
    }
    public function invoke() {
        $error = '';
        $_SESSION['valid'] = 0;                
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $result = $this->login_m->login_select($_POST['username'], $_POST['password']);                                              
                if ($result==true) {                    
                    redirect(ADMIN_DASHBOARD_LINK);
                }
                if ($result == false) {
                    $_SESSION['valid'] = 1;
                } 
                if($result==2){
                    redirect(LOGIN);
                }               
            }                                 
        loadLoginView('login/', 'login.php', $this->data);
    }         
    public function logout() {
        sessionDestroy();
        redirect(LOGIN);
    }    
}

?>