<?php
class productcatservice {
    public function queryproductcat() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM productcategory";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
}
