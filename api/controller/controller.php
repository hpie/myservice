<?PHP

/* include_once("../model/model.php"); */

class Controller extends Controllers {

    public function __construct() {
        parent::__construct();
        $this->model = new Model();
    }
//*********************************************************************************************//  
//******************************************** add data common ********************************//
//********************************************************************************************// 
    public function addData($params, $table) {
        return $this->model->addData($params, $table);
    }          
    public function getSingleRecordById($table,$id) {
        return $this->model->getSingleRecordById($table,$id);
    }    
//    public function getTaxTypeAll($table) {
//        return $this->model->getTaxTypeAll($table);
//    }    
//    public function getCommodityList($table,$taxId) {       
//        return $this->model->getCommodityList($table,$taxId);
//    }    
//    public function getTransactionListSearch($params) {        
//        return $this->model->getTransactionListSearch($params);
//    }    
//    public function addUpdateTransaction($params, $table) { 
//        if($this->model->getExistTransaction($params['tax_challan_id'])){
//            return FALSE;
//        }
//        else{
//            return $this->model->addTransaction($params, $table);
//        }              
//    }
    
    //****************************************************//
    public function getExist($table,$column,$id) { 
        if($this->model->getExist($table,$column,$id)){
            return TRUE;
        }
        else{
            return FALSE;
        }              
    }
    public function addCustomer($params, $table) {
        return $this->model->addData($params, $table);
    }          
    
}

?>