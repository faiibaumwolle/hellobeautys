<?php

class Review extends MY_Controller {
   
    function __construct() {
        parent::__construct();
        $this->load->model('review_model', 'review');
    }
    
    function index(){   
        $this->data["blog"] = $this->review->getAllBlog();
        $this->load->template('review/index', $this->data);
    }
    
    function add(){
        if(!empty($_POST)){
            print_r($_FILES);
            $file_name = '';
            if($_FILES["image"]["error"] == "0"){
                $file_name = getFileName($_FILES["image"]["name"]);
                $config['remove_spaces'] = FALSE;
                $config['upload_path'] = frontend_path().'images/review/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('image')){
                    $error = array('error' => $this->upload->display_errors());
                }
            } else {
                unset($data["image"]);
            }

            $data = array(
                            'name' => $_POST["name"] ,
                            'text' => $_POST["text"] ,
                            'credit' => $_POST["credit"],
                            'image' => $file_name
                         );

            $this->db->insert('review', $data); 
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Customer Review สำเร็จ");
        }
        
        $this->load->template('review/add', $this->data);
    }
    
    function edit($blog_id){
        if(!empty($_POST)){
            $data = array(
                            'name' => $_POST["name"] ,
                            'text' => $_POST["text"] ,
                            'credit' => $_POST["credit"]
                         );

                if($_FILES["image"]["error"] == "0"){
                    
                    $config['remove_spaces'] = FALSE;
                    $config['upload_path'] = frontend_path().'images/review/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $file_name;
//echo $config['upload_path'];
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('image')){
                        $error = array('error' => $this->upload->display_errors());
                        unset($data["picture"]);
                        $this->data["notify"] = notify_message(false, $error["error"]);
                    }
                } else {
                    unset($data["picture"]);
                }

            $this->db->where('id', $blog_id);
            $this->db->update('review', $data);
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Customer Review สำเร็จ");
        }
        
        $this->data["blog"] = $this->review->getBlogbyID($blog_id);
        $this->data["blog"]->text = trim(preg_replace('/\s\s+/', ' ', $this->data["blog"]->text));
        $this->data["blog"]->text = str_replace("'",'"', $this->data["blog"]->text);
        $this->data["blog"]->text = str_replace(PHP_EOL,' ', $this->data["blog"]->text);
        $this->load->template('review/edit', $this->data);
    }
    
    function delete($blog_id){
        $this->db->delete('review', array('id' => $blog_id));
        $this->data["notify"] = notify_message(true, "ลบข้อมูล Customer Review สำเร็จ");
        $this->data["blog"] = $this->review->getAllBlog();
        $this->load->template('review/index', $this->data);
    }
}
