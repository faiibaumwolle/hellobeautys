<?php


class Review_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllBlog(){
        $query = $this->db->query("SELECT * FROM review");
        return $query->result();
    }
    
    public function getBlogbyID($blog_id){
        $query = $this->db->query("SELECT * FROM review  WHERE review.id = '".$blog_id."'");
        return $query->row();
    }
    
    
}
