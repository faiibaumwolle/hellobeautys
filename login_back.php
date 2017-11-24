<?php
include 'service/customerservice.php';

require 'sdk/facebook.php';

$response["status"] = "0";
$facebook = new Facebook(array(
  'appId'  => '500422933475064',
  'secret' => '65ab07b1f352df892bbe96119e364ed7',
));

if(!empty($_GET["logout"])){
   $facebook->destroySession();
   unset($_SESSION["customer"]);
   echo '<script type="text/javascript">
                    window.location = "index.php?page=home"
        </script>';
}

if(!empty($_SESSION["customer"])){
        echo '<script type="text/javascript">
                         window.location = "index.php?page=home"
             </script>';
}

$user = $facebook->getUser();
//echo $facebook->getUser();
if ($user) {
  try {
    $user_profile = $facebook->api('/me', array('fields' => 'id, email, first_name, last_name, gender'));
    $customer = new customerservice();
    $response = $customer->checkFB($user_profile["id"], $user_profile["email"], $user_profile["first_name"], $user_profile["last_name"], $user_profile["gender"]);
    $_SESSION["customer"] = $response[0];
    $_SESSION["customer"]["url"] = "index.php?page=login&logout=true";
    echo '<script type="text/javascript">
                    window.location = "index.php?page=home"
              </script>';
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
} else {
    $loginUrl = $facebook->getLoginUrl();
}
//$facebook->destroySession();

if(!empty($_POST["email"])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $customer = new customerservice();
    $response = $customer->login($email, $pass);
 
    if($response["status"] == 0){
        $_SESSION["customer"] = $response[0];
        $_SESSION["customer"]["url"] = "index.php?page=home&logout=true";
        echo '<script type="text/javascript">
                    window.location = "index.php?page=home"
              </script>';
    }
}

?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php if($response["status"] != "0") { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> <?=$response["message"]?>
        </div>
        <?php } ?>
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
            <h3><b style="color: #FF5675;">LOGIN</b></h3>
            <br>
             <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="color: #848482; margin: 20px 0px 20px 0px;">
                    <form class="form-horizontal" method="post" action="index.php?page=login">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3">
                                <b style="color: #FF7493;">อีเมล</b><br><b>(e-mail)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="<?=$_POST["email"]?>" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3">
                                <b style="color: #FF7493;">รหัสผ่าน</b><br><b>(password)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default">Sign in</button>
                                <button type="button" style="border: 1px solid #324a7f;background-color: #3c5a96;"class="btn btn-success" onclick="window.location='<?php echo $loginUrl; ?>'">Login with FACEBOOK</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <label>
                                    <a href="index.php?page=forgot">ลืมรหัสผ่าน</a> | <a href="index.php?page=register">สมัครสมาชิก</a>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
             </div>
        </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>