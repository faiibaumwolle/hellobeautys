<?php


class Product_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllProduct(){
        $query = $this->db->query("SELECT product.*, productcategory.name AS catagory_name FROM product LEFT JOIN productcategory ON product.catagory = productcategory.id ORDER BY product.id DESC");
        return $query->result();
    }
    
    public function getAllCategory(){
        $query = $this->db->query("SELECT * FROM productcategory");
        return $query->result();
    }
    
    public function getProductbyID($product_id){
        $query = $this->db->query("SELECT product.*, productcategory.name AS catagory_name FROM product LEFT JOIN productcategory ON product.catagory = productcategory.id WHERE product.id = '".$product_id."'");
        return $query->row();
    }
    
}
