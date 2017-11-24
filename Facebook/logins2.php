<?php
require_once 'Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '500422933475064', // Replace {app-id} with your app id
  'app_secret' => '65ab07b1f352df892bbe96119e364ed7',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();
$accessToken = $helper->getAccessToken();

echo __DIR__;