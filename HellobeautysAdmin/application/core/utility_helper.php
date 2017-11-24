<?php

function asset_url(){
   return base_url().'assets/';
}

function index_url(){
    return base_url().'index.php/';
}

function domain_url(){
    return "http://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER["SERVER_PORT"] . "/";
}

function frontend_url(){
    return domain_url() . "/";
}

function notify_message($success_flag = true, $message){
    $data = array(
      "action" => "",
      "class" => "",
      "message" => $message
    );
    if($success_flag){
        $data["action"] = "Success";
        $data["class"] = "alert-success";
    } else {
        $data["action"] = "Error";
        $data["class"] = "alert-danger";
    }
    return $data;
}

