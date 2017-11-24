<?php

class MY_Controller extends CI_Controller {

   protected $data = array();
           
   function __construct() {
       parent::__construct();
       $this->load->helper('url');
       $this->load->model('order_model', 'order');
       $this->data["order_not_success"] = $this->order->countOrdernotSuccess();
       $this->data["order_not_notify"] = $this->order->getNotNotifyOrder();
       session_start();
       if(!empty($_SESSION["customer"])) {
           if($_SESSION["customer"]["admin"] != 1){
           redirect(frontend_url());
           }
       } else {
           redirect(frontend_url());
       }
   }
}
