<?php
    if(count($_SESSION["customer"]) > 0){
    echo '<script type="text/javascript">
                    window.location = "index.php?page=order_item"
          </script>';
    }
    
    require 'sdk/facebook.php';

    $facebook = new Facebook(array(
      'appId'  => '500422933475064',
      'secret' => '65ab07b1f352df892bbe96119e364ed7',
    ));
    
$user = $facebook->getUser();

if ($user) {
  try {
    include 'service/customerservice.php';
    $user_profile = $facebook->api('/me', array('fields' => 'id, email, first_name, last_name, gender'));
    $customer = new customerservice();
    $response = $customer->checkFB($user_profile["id"], $user_profile["email"], $user_profile["first_name"], $user_profile["last_name"], $user_profile["gender"]);
    $_SESSION["customer"] = $response[0];
    $_SESSION["customer"]["url"] = "index.php?page=login&logout=true";
    echo '<script type="text/javascript">
                    window.location = "index.php?page=order_item"
              </script>';
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="row">
        <!--left menu-->
        <div class="col-md-3">
            <br>
            <br>
            <div class="row visible-lg visible-md">
                <div class="col-md-12">
                    <div class="row">
                        <a href="http://line.me/ti/p/%40hellobeautys" target="_blank"><img src="images/menu-left-line.png" class="img-thumbnail" style=""></a>
                    </div>
                    <br>
                    <div class="row">
                        <a href="index.php?page=howtoorder" target="_blank"><img src="images/menu-left-order.jpg" class="img-thumbnail" style=""></a>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <!--content-->
    <div class="col-md-9">
        <?php if(count($_SESSION["customer"]) == 0) { ?>
        <h3><b style="color: #FF5675;">เข้าสู่ระบบ</b></h3><br/>
        <div class="row">
            <div class="col-md-6">
                <button type="button" style="border-color: #ff0080;background-color: #FF0066;width: 100%;"class="btn btn-success" onclick="window.location='index.php?page=login'">Login with HELLOBEAUTYS ACCOUNT</button>
            </div>
            <div class="col-md-6">
                <button type="button" style="border: 1px solid #324a7f;background-color: #3c5a96;width: 100%;"class="btn btn-success" onclick="window.location='<?=$facebook->getLoginUrl()?>'">Login with FACEBOOK</button>
            </div>
        </div>
        <br/><br/><h3><b style="color: #FF5675;">สมัครสมาชิกใหม่</b></h3><br/>
         <div class="row">
            <div class="col-md-12">
                <span>ถ้ายังไม่มีบัญชี ใช้เวลาสมัครไม่เกิน 5 นาที</span>
                <button type="button" style="border-color: #ff0080;background-color: #ff80b3;width: 100%;"class="btn btn-success" onclick="window.location='index.php?page=register'">สมัครสมาชิก HELLOBEAUTYS ACCOUNT</button>
            </div>
        </div>
        <?php } else { ?>
        <h3><b style="color: #FF5675;">เข้าสู่ระบบ</b></h3>
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
        <?php } ?>
    </div>
</div>