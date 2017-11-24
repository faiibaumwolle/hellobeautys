<?php
class productservice {
    public function queryproduct($start,$perpage) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM product "
                . "ORDER BY id ASC "
                . "limit $start,$perpage";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryImageByID($product_id){
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM productpicture WHERE product = '".$product_id."'";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproductall() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM product "
                . "ORDER BY id DESC";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproductnew($start,$perpage) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM product "
                . "ORDER BY id DESC "
                . "limit $start,$perpage";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproductnewall() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM product "
                . "ORDER BY id DESC";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproducthot($start,$perpage) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT p.* FROM product p, lineproduct lp "
                . "WHERE p.id = lp.product_id "
                . "GROUP BY lp.product_id "
                . "ORDER BY count(*) DESC "
                . "limit $start,$perpage";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproducthotall() {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT p.* FROM product p, lineproduct lp "
                . "WHERE p.id = lp.product_id "
                . "GROUP BY lp.product_id "
                . "ORDER BY count(*) DESC";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproductBycat($namecat,$start,$perpage) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT p.* FROM product p, productcategory pc "
                . "WHERE pc.name = '".$namecat."' "
                . "and p.catagory = pc.id "
                . "ORDER BY id DESC "
                . "limit $start,$perpage";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproductBycatall($namecat) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT p.* FROM product p, productcategory pc "
                . "WHERE pc.name = '".$namecat."' "
                . "and p.catagory = pc.id "
                . "ORDER BY id DESC";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
    
    public function queryproductByname($name) {
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM product WHERE name = '".$name."'";
            
        $data = $db->querySQL($sql);
            
        return $data;
    }
}
