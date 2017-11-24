<?php


class Order_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllOrder(){
        $query = $this->db->query("SELECT od.id AS id, cm.name, cm.surname, od.reference, pm.status AS payment_status, sm.status AS shipment_status FROM orders od "
                . "LEFT JOIN payment pm ON pm.order_id = od.id "
                . "LEFT JOIN customer cm ON cm.id = od.customer_id "
                . "LEFT JOIN shipment sm ON sm.order_id = od.id ORDER BY od.id DESC");
        foreach ($query->result() as $key => $value) {
            $value->payment_status_display = $this->translatePaymentStatus($value->payment_status);
            $value->shipment_status_display = $this->translateShipmentStatus($value->shipment_status);
        }
        return $query->result();
    }
    
    public function getNotNotifyOrder(){
        $query = $this->db->query("SELECT od.created_date AS createDate, od.id AS order_id, reference, cm.name, cm.surname FROM orders od "
                . "LEFT JOIN customer cm ON cm.id = od.customer_id WHERE notify = 1");
        foreach ($query->result() as $key => $value) {
            $value->createDate = ($value->createDate == "0000-00-00")?"-":date("d/m/Y H:i:s", strtotime($value->createDate));
        }
        return $query->result();
    }
    
    public function countOrdernotSuccess(){
        $query = $this->db->query("SELECT * FROM shipment RIGHT JOIN orders ON shipment.order_id = orders.id WHERE shipment.status != 'Success'");
        return count($query->result());
    }
    
    public function getOrderByID($order_id){
        $query = $this->db->query("SELECT convert_tz(od.created_date, @@session.time_zone,'+07:00') AS dateCreate ,od.id AS orderID, cm.name, cm.surname,cm.email, cm.tel, od.*, pm.*, sm.*, pm.status AS payment_status, sm.status AS shipment_status, "
                . "(SELECT name FROM shipment_type WHERE id = sm.shipment_type_id) AS shipment_name, "
                . "(SELECT price FROM shipment_type WHERE id = sm.shipment_type_id) AS shipment_price "
                . "FROM orders od "
                . "LEFT JOIN payment pm ON pm.order_id = od.id "
                . "LEFT JOIN shipment sm ON sm.order_id = od.id "
                . "INNER JOIN customer cm ON cm.id = od.customer_id "
                . "WHERE od.id = '".$order_id."'");
        $value = $query->row(0);
        $value->payment_status_display = $this->translatePaymentStatus($value->payment_status);
        $value->shipment_status_display = $this->translateShipmentStatus($value->shipment_status);
        $value->payment_date = ($value->payment_date == "0000-00-00")?"-":date("d/m/Y", strtotime($value->payment_date));
        $value->dateCreate = ($value->dateCreate == "0000-00-00")?"-":date("d/m/Y h:i:s", strtotime($value->dateCreate));
        $value->image = ($value->image == "")?"default.jpg":$value->image;
        $value->hour = ($value->hour == "")?"00":$value->hour;
        $value->minute = ($value->minute == "")?"00":$value->minute;
        $value->bank = $this->getBankInformation($value->bank_id);
        return $value;
    }
    
    public function getOrderList($order_id){
        $query = $this->db->query("SELECT odl.*, pd.*, odl.quantity AS order_quantity FROM lineproduct odl "
                . "LEFT JOIN orders od ON od.id = odl.order_id "
                . "LEFT JOIN product pd ON pd.id = odl.product_id "
                . "WHERE od.id = '".$order_id."'");
        
        return $query->result();
    }
    
    public function getBankInformation($bank_id){
        $query = $this->db->query("SELECT * FROM bank WHERE id = '".$bank_id  ."'");
        return $query->row(0);
    }
    
    private function translatePaymentStatus($status){
        if($status == "Pending"){
            return "<span style='color:red;'>รอการชำระเงิน</span>";
        } else if($status == "Progress"){
            return "<span style='color:blue;'>รอการตรวจสอบการชำระเงิน</span>";
        } else if($status == "Success"){
            return "<span style='color:green; font-weight:bold;'>การชำระเงินเสร็จสมบูรณ์</span>";
        }
    }
    
    private function translateShipmentStatus($status){
        if($status == "Pending"){
            return "<span style='color:blue;'>รอการจัดส่ง</span>";
        } else if($status == "Success"){
            return "<span style='color:green; font-weight:bold;'>การส่งเสร็จสมบูรณ์</span>";
        }
    }
    
}