<?php

class Product extends MY_Controller {
   
    function __construct() {
        parent::__construct();
        $this->load->model('product_model', 'product');
    }
    
    function index(){   
        $this->data["product"] = $this->product->getAllProduct();
        $this->load->template('product/index', $this->data);
    }
    
    function add(){
        if(!empty($_POST)){
            $file_name = getFileName($_FILES["image"]["name"]);
            $data = array(
                'name' => $_POST["name"] ,
                'catagory' => $_POST["catagory"] ,
                'detail' => $_POST["detail"],
                'moredetail' => $_POST["moredetail"],
                'picture' => 'images/product/'. $file_name,
                'price' => $_POST["price"],
                'discount_price' => $_POST["discount_price"],
                'quantity' => $_POST["quantity"],
                'created_date' => "NOW()",
                'updated_date' => "NOW()"
            );

            if($_FILES["image"]["error"] == "0"){
                $config['remove_spaces'] = FALSE;
                $config['upload_path'] = frontend_path().'images/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;
//                echo $config['upload_path'];
		$this->load->library('upload', $config);
                $this->upload->initialize($config);
                
		if (!$this->upload->do_upload('image')){
			$error = array('error' => $this->upload->display_errors());
                        print_r($error);
		}
            } else {
                unset($data["picture"]);
            }
            
            $this->db->insert('product', $data); 
            $insert_id = $this->db->insert_id();
            
                if($_FILES["img"]["error"][0] == "0"){
                    for($ig = 0; $ig < count($_FILES["img"]["name"]); $ig++){
                        
                        $_FILES['imgall']['name'] = $_FILES['img']['name'][$ig];
                        $_FILES['imgall']['type'] = $_FILES['img']['type'][$ig];
                        $_FILES['imgall']['tmp_name'] = $_FILES['img']['tmp_name'][$ig];
                        $_FILES['imgall']['error'] = $_FILES['img']['error'][$ig];
                        $_FILES['imgall']['size'] = $_FILES['img']['size'][$ig];
                        
                        $file_name = getFileName($_FILES["img"]["name"][$ig]);
                        $config['remove_spaces'] = FALSE;
                        $config['upload_path'] = frontend_path().'images/product/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['file_name'] = $file_name;

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('imgall')){
                            $img = array("picture" => 'images/product/'.$file_name, "product" => $insert_id);
                            $this->db->insert('productpicture', $img); 
                        }
                    }
                }
            
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Product สำเร็จ");
        }

        $this->data["productcategory"] = $this->product->getAllCategory();

        $this->load->template('product/add', $this->data);
    }
    
    function edit($product_id){
        if(!empty($_POST)){
//            print_r($_FILES);
                $file_name = getFileName($_FILES["image"]["name"]);
                $data = array(
                    'name' => $_POST["name"] ,
                    'catagory' => $_POST["catagory"] ,
                    'detail' => $_POST["detail"],
                    'moredetail' => $_POST["moredetail"],
                    'picture' => 'images/product/'.$file_name,
                    'price' => $_POST["price"],
                    'discount_price' => $_POST["discount_price"],
                    'quantity' => $_POST["quantity"],
                    'updated_date' => "NOW()"
                );
            
                if($_FILES["image"]["error"] == "0"){
                    
                    $config['remove_spaces'] = FALSE;
                    $config['upload_path'] = frontend_path().'images/product/';
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
                
                if($_FILES["img"]["error"][0] == "0"){
                    for($ig = 0; $ig < count($_FILES["img"]["name"]); $ig++){
                        
                        $_FILES['imgall']['name'] = $_FILES['img']['name'][$ig];
                        $_FILES['imgall']['type'] = $_FILES['img']['type'][$ig];
                        $_FILES['imgall']['tmp_name'] = $_FILES['img']['tmp_name'][$ig];
                        $_FILES['imgall']['error'] = $_FILES['img']['error'][$ig];
                        $_FILES['imgall']['size'] = $_FILES['img']['size'][$ig];
                        
                        $file_name = getFileName($_FILES["img"]["name"][$ig]);
                        $config['remove_spaces'] = FALSE;
                        $config['upload_path'] = frontend_path().'images/product/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['file_name'] = $file_name;

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('imgall')){
                            $img = array("picture" => 'images/product/'.$file_name, "product" => $product_id);
                            $this->db->insert('productpicture', $img); 
                        }
                    }
                }

                if(empty($this->data["notify"])){
                    $this->db->where('id', $product_id);
                    $this->db->update('product', $data); 
                    $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Product สำเร็จ");
                }
        }

        $this->data["productcategory"] = $this->product->getAllCategory();
        $this->data["product"] = $this->product->getProductbyID($product_id);

        $this->data["product"]->moredetail = trim(preg_replace('/\s\s+/', ' ', $this->data["product"]->moredetail));
        $this->data["product"]->moredetail = str_replace("'",'"', $this->data["product"]->moredetail);
        $this->data["product"]->moredetail = str_replace("\n",'', $this->data["product"]->moredetail);
        $this->load->template('product/edit', $this->data);
    }
    
    function delete($product_id){
        $this->db->delete('product', array('id' => $product_id));
        $this->data["notify"] = notify_message(true, "ลบข้อมูล Product สำเร็จ");
        $this->data["product"] = $this->product->getAllProduct();
        $this->load->template('product/index', $this->data);
    }
    
}
