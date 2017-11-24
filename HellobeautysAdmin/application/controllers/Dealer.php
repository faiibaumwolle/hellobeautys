<?php

class Dealer extends MY_Controller {
   
    function __construct() {
        parent::__construct();
        $this->load->model('dealer_model', 'dealer');
    }
    
    function index(){   
        $this->data["dealer"] = $this->dealer->getAllDealer();
        $this->load->template('dealer/index', $this->data);
    }
    
    function add(){
        if(!empty($_POST["shop"])){
            $data = array(
                            'shop' => $_POST["shop"] ,
                            'address' => $_POST["address"] ,
                            'telephone' => $_POST["telephone"],
                            'province_id' => $_POST["province"]
                         );

            $this->db->insert('dealer', $data); 
            $this->data["notify"] = notify_message(true, "บันทึกข้อมูล Dealer สำเร็จ");
        }

        $this->data["dealerprovince"] = $this->dealer->getAllDealerProvince();

        $this->load->template('dealer/add', $this->data);
    }
    
    function edit($dealer_id){
        if(!empty($_POST["shop"])){
            $data = array(
                            'shop' => $_POST["shop"] ,
                            'address' => $_POST["address"] ,
                            'telephone' => $_POST["telephone"],
                            'province_id' => $_POST["province"]
                         );

            $this->db->where('id', $dealer_id);
            $this->db->update('dealer', $data); 

            $this->data["notify"] = notify_message(true, "แก้ไขข้อมูล Dealer สำเร็จ");
        }

        $this->data["dealerprovince"] = $this->dealer->getAllDealerProvince();
        $this->data["dealer"] = $this->dealer->getDealerbyID($dealer_id);

        $this->load->template('dealer/edit', $this->data);
    }
    
    function delete($dealer_id){
        $this->db->delete('dealer', array('id' => $dealer_id));
        $this->data["notify"] = notify_message(true, "ลบข้อมูล Dealer สำเร็จ");
        $this->data["dealer"] = $this->dealer->getAllDealer();
        $this->load->template('dealer/index', $this->data);
    }
    
}
