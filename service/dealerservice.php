<?php
class dealerservice {
    public function querydealer() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM dealer";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
}
