<?php


class Category_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllCategory(){
        $query = $this->db->query("SELECT * FROM productcategory");
        return $query->result();
    }
    
    public function getCategorybyID($category_id){
        $query = $this->db->query("SELECT * FROM productcategory WHERE id = '".$category_id."'");
        return $query->row();
    }
    
    public function checkUsedCategory($category_id){
        $query = $this->db->query("SELECT * FROM product WHERE catagory = '".$category_id."'");
        return (count($query->result()) > 0)?true:false;
    }
    
}
