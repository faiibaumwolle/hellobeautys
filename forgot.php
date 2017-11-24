<?php
include 'service/mailservice.php';
include 'service/customerservice.php';
$email = !empty($_POST['email']);
$status = "";
$errormessage = "";
if($email){
    $customer = new customerservice();
    $data =  $customer->forgotpass($_POST['email']);
 
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
            <h3><b style="color: #FF5675;">FORGOT PASSWORD</b></h3>
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
                <div class="col-md-2"></div>
                <div class="col-md-8" style="color: #848482; margin: 20px 0px 20px 0px;">
                    <form class="form-horizontal" method="post" action="index.php?page=forgot">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3">
                                <b style="color: #FF7493;">อีเมล</b><br><b>(e-mail)</b>
                            </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default">Submit</button>
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