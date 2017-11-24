<?php

class Video extends MY_Controller {
   
    function __construct() {
        parent::__construct();
        $this->load->model('video_model', 'video');
    }
    
    function index(){   
        $this->data["video"] = $this->video->getAllVideo();
        $this->load->template('video/index', $this->data);
    }
    
    function add(){
        if(!empty($_POST["name"])){
            $youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","http://www.youtube.com/embed/$1",$_POST["source"]);
            $data = array(
                            'name' => $_POST["name"] ,
                            'source' => $youtube,
                            'create_date' => "NOW()",
                            'update_date' => "NOW()"
                         );

            $this->db->insert('video', $data); 
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Video สำเร็จ");
        }
        
        $this->load->template('video/add', $this->data);
    }
    
    function edit($video_id){
        if(!empty($_POST["name"])){
            $youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","http://www.youtube.com/embed/$1",$_POST["source"]);
            $data = array(
                            'name' => $_POST["name"] ,
                            'source' => $youtube,
                            'update_date' => "NOW()"
                         );

            $this->db->where('id', $video_id);
            $this->db->update('video', $data); 

            $this->data["notify"] = notify_message(true, "แก้ไขข้อมูล Video สำเร็จ");
        }
        $this->data["video"] = $this->video->getVideoByID($video_id);

        $this->load->template('video/edit', $this->data);
    }
    
    function delete($video_id){
        $this->db->delete('video', array('id' => $video_id));
        $this->data["notify"] = notify_message(true, "ลบข้อมูล Video สำเร็จ");
        $this->data["video"] = $this->video->getAllVideo();
        $this->load->template('video/index', $this->data);
    }
    
}
