<?php
class blogservice {
    public function queryblog($start,$perpage) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM blog "
                . "ORDER BY id DESC "
                . "limit $start,$perpage ";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryblogall() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM blog ";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryblogByname($name) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM blog WHERE name = '".$name."'";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function querycustomerreview($start,$perpage) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM review "
                . "ORDER BY id DESC "
                . "limit $start,$perpage ";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function querycustomerreviewall() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM review ";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function querycustomerreviewByname($name) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM review WHERE name = '".$name."'";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
}
