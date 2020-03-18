<?PHP

//include_once("db/classes.php");
class loginclient_m extends Models {

    public $query;
   
    public function __construct() {
        $this->query = new Query();
    }       
    public function userLogin($email, $password) {
        $password= md5($password);
        $q = "SELECT * FROM service_customer WHERE (customer_email='$email' OR customer_mobile_number='$email') AND customer_password='$password'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {                                                
            if (($email == $row['customer_email'] || $email == $row['customer_mobile_number'])&& $password == $row['customer_password']) {                                               
                unset($row['user_password']);
                sessionUser($row);
                return true;
            }
        }
        return false;
    }     
    public function register($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO  user($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
}

?>