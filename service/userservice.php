<?php

        header("Content-Type:application/json");
        
require '../sdk/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '500422933475064',
  'secret' => '65ab07b1f352df892bbe96119e364ed7',
));

$id = "";
$url = "";

$user = $facebook->getUser();
//echo $facebook->getUser();
if ($user) {
  try {
    $user_profile = $facebook->api('/me', array('fields' => 'id, email, first_name, last_name, gender'));
    //$user_profile["id"], $user_profile["email"], $user_profile["first_name"], $user_profile["last_name"], $user_profile["gender"]
  $id = $user_profile["id"];
    
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
} else {
    $loginUrl = $facebook->getLoginUrl();
    $url = $loginUrl;
}
        
        $username = $POST["username"];
        $password = $POST["password"];

        
        $response["status"] = 0;
        $response["msg"] = "Success";
        //$response["id"] = $id;
        $response["url"] = $url;
        $response["id"] = "";
        $response["email"] = "test@gmail.com";
        $response["firstname"] = "Test";
        $response["lastname"] = "Example";
        $response["gender"] = "Male";
        
        echo json_encode($response);
    