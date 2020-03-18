<?PHP

//include_once("model/categories_m.php");

class home_c extends Controllers {
    public $home_m;     
    public function __construct() {
        //sessionCheck();       
        $this->home_m = $this->loadModel('home_m');
        $this->admin_m = $this->loadModel('admin_m');
    }
    /******************************************** Shop Details *********************************** */
    public function invoke() {
        redirect(BASE_URL);
    }    
    public function home() {
        $this->data['TITLE'] = HOME;          
        loadviewClient('client/', 'home.php', $this->data);
    }
    public function postComplian() { 
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