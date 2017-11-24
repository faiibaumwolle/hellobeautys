<?php


class Blog_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllBlog(){
        $query = $this->db->query("SELECT * FROM blog");
        return $query->result();
    }
    
    public function getBlogbyID($blog_id){
        $query = $this->db->query("SELECT * FROM blog  WHERE blog.id = '".$blog_id."'");
        return $query->row();
    }
    
    
}
