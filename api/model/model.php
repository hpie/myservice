<?PHP

class Model extends Models {

    public function __construct() {
        parent::__construct();
    }
    
    public function getExist($table,$column,$id) {        
        $res=$this->checkRecord("$table","$column","$id");        
        if ($res)
            return true;
        return false;
    }   
//*******************************//  
//*** Common insert function with table name *****//
//*****************************//
    public function addData($params, $table) {      
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO $table($columns) VALUES($values)";
            $id = $this->query->insert($q);              
            if ($id) {               
                return $id;
            }
        }
        return false;
    }
    
//*******************************//  
//***Get Single record by id*****//
//*****************************// 
//    public function getSingleRecordById($table,$id) {
//        $field_id=$table.'_id';
//        $query = "SELECT * FROM $table WHERE $field_id='$id'";
//        $result = $this->query->select($query);
//        if ($row = $this->query->fetch($result))
//            return $row;
//        return false;
//    }
            
//*******************************//  
//***Get all record by*****//
//*****************************// 
//    public function getTaxTypeAll($table) {        
//        $query = "SELECT * FROM $table";
//        $result = $this->query->select($query);
//        if ($data = $this->query->fetch_array($result))
//            return $data;
//        return false;
//    }        
//*******************************//  
//***Get commodity list based on tax type*****//
//*****************************// 
//    public function getCommodityList($table,$taxId) {        
//        $query = "SELECT tax_commodity_id,tax_commodity_name FROM $table WHERE tax_type_id='$taxId'";
//        $result = $this->query->select($query);
//        if ($data = $this->query->fetch_array($result))
//            return $data;
//        return false;
//    }  
}

?>