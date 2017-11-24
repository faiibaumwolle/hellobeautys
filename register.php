<?php
include 'service/customerservice.php';

$response["status"] = "0";
//$server = $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["PHP_SELF"];

if(!empty($_POST["email"])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cfpass = $_POST['cfpass'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $tel = $_POST['tel'];

    $customer = new customerservice();
    $response = $customer->register($email, $pass, $cfpass, $name, $surname, $gender, $tel);
    
    if($response["status"] == "0"){
        $response_login = $customer->login($email, $pass);
 
        if($response_login["status"] == 0){
//            echo $server."?page=home";
            $_SESSION["customer"] = $response_login[0];
//            header('Location: '.$server."?page=home");
            echo '<script type="text/javascript">
                    window.location = "index.php?page=home"
                  </script>';
        }
    }
}

//echo '<script language="javascript">';
//echo 'alert(" '.$response.' ")';
//echo '</script>';

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
            <h3><b style="color: #FF5675;">REGISTER</b></h3>
            <br>
             <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="color: #848482; margin: 20px 0px 20px 0px;">
                    <form class="form-horizontal" method="post" action="index.php?page=register">
                        <div class="form-group">
                            <label for="email" class="col-sm-3">
                                <b style="color: #FF7493;">อีเมล</b><br><b>(e-mail)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value="<?=$_POST["email"]?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-3">
                                <b style="color: #FF7493;">รหัสผ่าน</b><br><b>(password)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cfpass" class="col-sm-3">
                                <b style="color: #FF7493;">ยืนยันรหัสผ่าน</b><br><b>(confirm)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="cfpass" name="cfpass" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3">
                                <b style="color: #FF7493;">ชื่อ</b><br><b>(name)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="<?=$_POST["name"]?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surname" class="col-sm-3">
                                <b style="color: #FF7493;">นามสกุล</b><br><b>(surname)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="surname" name="surname" value="<?=$_POST["surname"]?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-sm-3">
                                <b style="color: #FF7493;">เพศ</b><br><b>(gender)</b>
                            </label>
                            <div class="col-sm-9">
                                <select id="gender" name="gender" class="form-control">
                                    <option value="">-----gender select-----</option>
                                    <option value="male" <?=(($_POST["gender"] == "male")?"selected":"")?>>ชาย</option>
                                    <option value="female" <?=(($_POST["gender"] == "female")?"selected":"")?>>หญิง</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-sm-3">
                                <b style="color: #FF7493;">เบอร์โทร</b><br><b>(tel.)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tel" name="tel" value="<?=$_POST["tel"]?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default">Register</button>
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