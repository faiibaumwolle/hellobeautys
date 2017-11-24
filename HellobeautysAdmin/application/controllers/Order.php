<?php

class Order extends MY_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){   
        $this->data["order"] = $this->order->getAllOrder();
        $this->load->template('order/index', $this->data);
    }
    
    function edit($order_id){      
        if(!empty($_POST["payment_status"])){
            $data = array(
                            'status' => $_POST["payment_status"]
                         );

            $this->db->where('order_id', $order_id);
            $this->db->update('payment', $data); 

            $this->data["notify"] = notify_message(true, "อัพเดตข้อมูลการชำระเงินสำเร็จ");
        }
        
        if(!empty($_POST["shipment_status"])){
            $data = array(
                            'status' => $_POST["shipment_status"],
                            'track' => $_POST["track"]
                         );

            $this->db->where('order_id', $order_id);
            $this->db->update('shipment', $data);

            $this->data["notify"] = notify_message(true, "อัพเดตข้อมูลการจัดส่งสำเร็จ");
        }

        $this->data["order"] = $this->order->getOrderByID($order_id);
        if($this->data["order"]->notify == "1"){
            $data = array('notify' => '0');
            $this->db->where('id', $order_id);
            $this->db->update('orders', $data);
            $this->data["order_not_notify"] = $this->order->getNotNotifyOrder();
        }
        $this->data["order_list"] = $this->order->getOrderList($order_id);
        $this->data["active"] = "orders";
        $this->data["price_all"] = 0;

        $template = array();
        array_push($template, 'order/order_tab');
        array_push($template, 'order/order_status');
        array_push($template, 'order/order_list');
        array_push($template, 'order/payment_status');
        array_push($template, 'order/shipment_status');
        
        $this->load->multiple_template($template, $this->data);
    }
    
    function delete($order_id){
        $this->db->delete('orders', array('id' => $order_id));
        $this->db->delete('lineproduct', array('order_id' => $order_id));
        $this->db->delete('payment', array('order_id' => $order_id));
        $this->db->delete('shipment', array('order_id' => $order_id));
        $this->data["notify"] = notify_message(true, "ลบข้อมูล Order สำเร็จ");
        $this->data["order"] = $this->order->getAllOrder();
        $this->load->template('order/index', $this->data);
    }
    
    function notify($order_id){
        header("Content-Type:application/json");
            $data = array(
                            'notify' => '0'
                         );

            $this->db->where('id', $order_id);
            $this->db->update('orders', $data);
            $response["status"] = 0;
            $response["msg"] = "Success";
        
            echo json_encode($response);
    }
    
}
