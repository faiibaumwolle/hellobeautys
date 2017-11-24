<?php


class Dealer_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllDealer(){
        $query = $this->db->query("SELECT dealer.id, shop, address, telephone, dealerprovince.id as province_id,dealerprovince.province FROM dealer
                          LEFT JOIN dealerprovince ON dealer.province_id = dealerprovince.id ORDER BY dealer.id DESC");
        return $query->result();
    }
    
    public function getAllDealerProvince(){
        $query = $this->db->query("SELECT * FROM dealerprovince");
        return $query->result();
    }
    
    public function getDealerbyID($dealer_id){
        $query = $this->db->query("SELECT dealer.id, shop, address, telephone, dealerprovince.id as province_id, dealerprovince.province FROM dealer
                          LEFT JOIN dealerprovince ON dealer.province_id = dealerprovince.id WHERE dealer.id = '" . $dealer_id . "'");
        return $query->row();
    }
    
}
