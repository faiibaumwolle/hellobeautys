<?php

class Category extends MY_Controller {
   
    function __construct() {
        parent::__construct();
        $this->load->model('category_model', 'category');
    }
    
    function index(){   
        $this->data["category"] = $this->category->getAllCategory();
        $this->load->template('category/index', $this->data);
    }
    
    function add(){
        if(!empty($_POST["name"])){
            $data = array(
                            'name' => $_POST["name"]
                         );

            $this->db->insert('productcategory', $data); 
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Category สำเร็จ");
        }

        $this->load->template('category/add', $this->data);
    }
    
    function edit($category_id){
        if(!empty($_POST["name"])){
            $data = array(
                            'name' => $_POST["name"]
                         );

            $this->db->where('id', $category_id);
            $this->db->update('productcategory', $data); 

            $this->data["notify"] = notify_message(true, "แก้ไขข้อมูล Category สำเร็จ");
        }

        $this->data["category"] = $this->category->getCategorybyID($category_id);

        $this->load->template('category/edit', $this->data);
    }
    
    function delete($category_id){
        if($this->category->checkUsedCategory($category_id)){
            $this->data["notify"] = notify_message(false, "Category นี้มี Product ผูกอยู่ไม่สามารถลบได้");
        } else {
            $this->db->delete('productcategory', array('id' => $category_id));
            $this->data["notify"] = notify_message(true, "ลบข้อมูล Category สำเร็จ");
        }
        $this->data["category"] = $this->category->getAllCategory();
        $this->load->template('category/index', $this->data);
    }
    
}
