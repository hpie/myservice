<?PHP

//include_once("model/categories_m.php");

class home_c extends Controllers {

    public $home_m;

    public function __construct() {
        //sessionCheck();       
        $this->home_m = $this->loadModel('home_m');
        $this->admin_m = $this->loadModel('admin_m');
    }

    /*     * ****************************************** Shop Details *********************************** */

    public function invoke() {
        redirect(BASE_URL);
    }

    public function home() {
        $this->data['TITLE'] = HOME;
        loadviewClient('client/', 'home.php', $this->data);
    }

    public function postComplian() {
        if (isset($_POST['submit'])) {
            $_POST['appointment_time_range'] = $_POST['appointment_time_range1'] . '-' . $_POST['appointment_time_range2'];
            unset($_POST['appointment_time_range1']);
            unset($_POST['submit']);
            unset($_POST['appointment_time_range2']);
            if ($this->admin_m->getExist('service_customer', 'customer_mobile_number', $_POST['customer_mobile_number'])) {
                
            } else {
                $params1 = array();
                $params1['customer_mobile_number'] = $_POST['customer_mobile_number'];
                $this->admin_m->addCustomer($params1, 'service_customer');
            }
            $res = $this->admin_m->addTicket($_POST);
            if (!empty($res)) {
                $_SESSION['addData'] = 1;
                redirect(BASE_URL);
            }
        }
        $serviceItem = $this->admin_m->getServiceItem();
        $serviceItemMake = $this->admin_m->getServiceItemMake();
        $serviceType = $this->admin_m->getServiceType();
        $this->data['serviceItem'] = $serviceItem;
        $this->data['serviceItemMake'] = $serviceItemMake;
        $this->data['serviceType'] = $serviceType;
        $this->data['TITLE'] = CLIENT_COMPLAIN_POST_TITLE;
        loadviewClient('client/', 'postcomplain.php', $this->data);
    }

}
