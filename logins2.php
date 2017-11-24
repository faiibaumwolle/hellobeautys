<?php
session_start();

include 'service/customerservice.php';

require_once __DIR__ . '/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '500422933475064', // Replace {app-id} with your app id
  'app_secret' => '65ab07b1f352df892bbe96119e364ed7',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();


try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email,first_name,last_name,gender', $accessToken->getValue());

    $user_profile = $response->getGraphUser();

    $customer = new customerservice();
    $response = $customer->checkFB($user_profile["id"], $user_profile["email"], $user_profile["first_name"], $user_profile["last_name"], $user_profile["gender"]);
    $_SESSION["customer"] = $response[0];
    $_SESSION["customer"]["url"] = "index.php?page=logins&logout=true";
    echo '<script type="text/javascript">
                    window.location = "index.php?page=home"
              </script>';

} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$_SESSION['fb_access_token'] = (string) $accessToken;


