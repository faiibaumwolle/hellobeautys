<?php
include 'service/orderservice.php';
if($_POST["action"] == "savePrice"){
    $order = new orderservice();
    $order->savePrice($_POST);
} else if($_POST["action"] == "saveAddress"){
    $order = new orderservice();
    $order->saveAddress($_POST);
} else if($_POST["action"] == "saveOrder"){
    $order = new orderservice();
    $order->saveOrder($_POST);
}
