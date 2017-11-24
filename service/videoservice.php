<?php
class videoservice {
    public function queryvideo($start,$perpage) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM video "
                . "ORDER BY id DESC "
                . "limit $start,$perpage ";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryvideoall() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM video ";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryvideoByname($name) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM video WHERE name = '".$name."'";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
}
