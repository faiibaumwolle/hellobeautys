<?php


class Video_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllVideo(){
        $query = $this->db->query("SELECT * FROM video ORDER BY video.id DESC");
        return $query->result();
    }
 
    public function getVideoByID($video_id){
        $query = $this->db->query("SELECT * FROM video WHERE video.id = '" . $video_id . "'");
        return $query->row();
    }
    
}
