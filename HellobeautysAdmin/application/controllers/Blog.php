<?php

class Blog extends MY_Controller {
   
    function __construct() {
        parent::__construct();
        $this->load->model('blog_model', 'blog');
    }
    
    function index(){   
        $this->data["blog"] = $this->blog->getAllBlog();
        $this->load->template('blog/index', $this->data);
    }
    
    function add(){
        if(!empty($_POST)){
            $data = array(
                            'name' => $_POST["name"] ,
                            'text' => $_POST["text"] ,
                            'credit' => $_POST["credit"]
                         );

            $this->db->insert('blog', $data); 
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Blog สำเร็จ");
        }
        
        $this->load->template('blog/add', $this->data);
    }
    
    function edit($blog_id){
        if(!empty($_POST)){
            $data = array(
                            'name' => $_POST["name"] ,
                            'text' => $_POST["text"] ,
                            'credit' => $_POST["credit"]
                         );

            $this->db->where('id', $blog_id);
            $this->db->update('blog', $data);
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Blog สำเร็จ");
        }
        
        $this->data["blog"] = $this->blog->getBlogbyID($blog_id);
        $this->data["blog"]->text = trim(preg_replace('/\s\s+/', ' ', $this->data["blog"]->text));
        $this->data["blog"]->text = str_replace("'",'"', $this->data["blog"]->text);
        $this->data["blog"]->text = str_replace(PHP_EOL,' ', $this->data["blog"]->text);
        $this->load->template('blog/edit', $this->data);
    }
    
    function delete($blog_id){
        $this->db->delete('blog', array('id' => $blog_id));
        $this->data["notify"] = notify_message(true, "ลบข้อมูล Blog สำเร็จ");
        $this->data["blog"] = $this->blog->getAllBlog();
        $this->load->template('blog/index', $this->data);
    }
}
