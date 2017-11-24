<?php
include 'service/mailservice.php';
include 'service/contractservice.php';
$name = !empty($_POST['name']);
$email = !empty($_POST['email']);
$tel = !empty($_POST['tel']);
$subject = !empty($_POST['subject']);
$msg = !empty($_POST['msg']);
$status = "";
$errormessage = "";
if($msg){
    $contract = new contractservice();
    $data = $contract->contractus($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['subject'], $_POST['msg']);
    $status = $data["status"];
    $errormessage = $data["errormessage"];
    $class = $data["class"];
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
                    <div class="row" style="background-color: #FDD7E4; width: 100%;">
                        <div class="col-md-12">
                            <table class="table" >
                                <tr><td><h5><b>ABOUT US</b></h5></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=aboutus">HELLOBEAUTYS</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=contactus" style="color: #FF5675;">CONTACT US</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=ourshop">OUR SHOP</a></td></tr>
                            </table>
                        </div>
                    </div>
                    <br>
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
            <h3><b style="color: #FF5675;">ABOUT US |</b> <b style="color: #B6B6B4;">CONTACT US</b></h3>
            <?php if($status != "") { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert <?=$class?>" style="margin-top: 30px;">
                        <span style="font-size: 15px;"><?=$errormessage?></span>
                    </div>
                </div>
            </div>
            <?php } ?>
            <br>
            <div class="row">
                <div class="col-md-6" style="color: #848482; margin: 20px 0px 20px 0px;">
                    <form class="form-horizontal" method="post" action="index.php?page=contactus">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 ">
                                <b style="color: #FF7493;">ชื่อ</b><br><b>(name)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 ">
                                <b style="color: #FF7493;">อีเมล</b><br><b>(e-mail)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-sm-3 ">
                                <b style="color: #FF7493;">เบอร์โทร</b><br><b>(tel.)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tel" name="tel" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="col-sm-3 ">
                                <b style="color: #FF7493;">เรื่อง</b><br><b>(subject)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="msg" class="col-sm-3 ">
                                <b style="color: #FF7493;">ข้อความ</b><br><b>(message)</b>
                            </label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="msg" name="msg" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div style="color: #FF7493; margin: 20px 0px 20px 0px;"><h4><b>HELLOBEAUTY CO.,LTD.</b></h4></div>
                    <div style="color: #848482; margin: 20px 0px 20px 0px;">776/263  หมู่บ้าน เดอะคอนเน็ค ซอยพัฒนาการ 38  <br/>แขวง สวนหลวง เขต สวนหลวง  กรุงเทพ 1025</div>
                    <div style="color: #848482; margin: 20px 0px 20px 0px;">Tel: 06-3416-9946, 02-102-4947</div>
                    <div style="color: #848482; margin: 20px 0px 20px 0px;">E-mail: hellobeautys_official@hotmail.com</div>
                    <div style="color: #848482; margin: 20px 0px 20px 0px;">
                        FOLLOW US<br><br>
                        <a href="https://www.facebook.com/smilecosmetics/?fref=ts" target="_blank"><img src="images/facebook-transparent.png" height="25" width="25"></a>
                        <a href="https://www.instagram.com/HELLOBEAUTYS_OFFICIAL/" target="_blank"><img src="images/instagram-transparent.png" height="25" width="25"></a>
                        <a href="https://twitter.com/hellobeautysss" target="_blank"><img src="images/twitter-transparent.png" height="25" width="25"></a>
                        <a href="http://line.me/ti/p/%40hellobeautys" target="_blank"><img src="images/line-transparent.png" height="25" width="25"></a>
                        <a href="https://www.youtube.com/channel/UCdHCBemfgzcsdrKtYV8Hkqg?nohtml5=False" target="_blank"><img src="images/youtube-transparent.png" height="25" width="25"></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>