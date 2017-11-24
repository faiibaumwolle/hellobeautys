<?php 

    $response["status"] = "";
    $response["message"] = "";
    $active = "home";
    if(!empty($_POST["action"])){
    $active = $_POST["action"];
    include 'service/customerservice.php';
    $customer = new customerservice();
    $response = $customer->update($_POST);
    
        if($response["status"] == 0){
            
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
            <h3><b style="color: #FF5675;">Profile</b></h3>
            <?php if($response["status"] != "") { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert <?=$response["class"]?>" style="margin-top: 30px;">
                        <span style="font-size: 15px;"><?=$response["message"]?></span>
                    </div>
                </div>
            </div>
            <?php } ?>
             <div class="row">
                <div class="col-md-12" style="color: #848482; margin: 20px 0px 20px 0px;">
                    <div>
                    <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" <?=(($active=="home")?"class='active'":"")?>>
                                <a href="#home" class="normal" aria-controls="home" role="tab" data-toggle="tab"><h6><b>ข้อมูลส่วนตัว</b></h6></a>
                            </li>
                            <li role="presentation" <?=(($active=="account")?"class='active'":"")?>>
                                <a href="#profile" class="normal" aria-controls="profile" role="tab" data-toggle="tab"><h6><b>แก้ไขการเข้าสู่ระบบ</b></h6></a>
                            </li>
                            <li role="presentation" <?=(($active=="profile")?"class='active'":"")?>>
                                <a href="#messages" class="normal" aria-controls="messages" role="tab" data-toggle="tab"><h6><b>แก้ไขข้อมูล</b></h6></a>
                            </li>
                            <li role="presentation" <?=(($active=="address")?"class='active'":"")?>>
                                <a href="#settings" class="normal" aria-controls="settings" role="tab" data-toggle="tab"><h6><b>แก้ไขที่อยู่</b></h6></a>
                            </li>
                        </ul>
                    <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane <?=(($active=="home")?"active":"")?>" id="home">
                                <div class="row" style="margin: 20px 0px 20px 0px;">
                                    <div class="col-md-6">
                                        <center>
                                            <img class="thumbnail" src="images/logo.png" height="200" width="200">
                                        </center>
                                        <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                        <form  class="form-horizontal">
                                            <div class="form-group">
                                                <div class="col-sm-8">
                                                    <input id="uploadImage" type="file" accept="image/*" name="files" />
                                                </div>
                                                <div class="col-sm-4">
                                                    <input id="button" type="submit" value="Upload">
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <div class="col-md-4"><h5>ชื่อ</h5></div>
                                            <div class="col-md-8"><h5><?=($_SESSION["customer"]["name"]. " " . $_SESSION["customer"]["surname"])?></h5></div>   
                                        </div>
                                        <div>
                                            <div class="col-md-4"><h5>เพศ</h5></div>
                                            <div class="col-md-8"><h5><?=($_SESSION["customer"]["gender"] == "male")?"ชาย":"หญิง"?></h5></div>   
                                        </div>
                                        <div>
                                            <div class="col-md-4"><h5>เบอร์โทร</h5></div>
                                            <div class="col-md-8"><h5><?=$_SESSION["customer"]["tel"]?></h5></div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div role="tabpanel" class="tab-pane <?=(($active=="account")?"active":"")?>" id="profile">
                                <div class="col-md-2"></div>
                                <div class="col-md-8" style="margin: 20px 0px 20px 0px;">
                                    <form class="form-horizontal" method="post" action="index.php?page=profile">
                                        <div class="form-group">
                                            <input type="hidden" name="action" value="account"/>
                                            <label for="inputEmail3" class="col-sm-3">
                                                <b style="color: #FF7493;">อีเมล</b><br><b>(e-mail)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" value="<?=$_SESSION["customer"]["email"]?>" class="form-control" id="inputEmail3" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3">
                                                <b style="color: #FF7493;">รหัสผ่าน</b><br><b>(password)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="password" id="pasword" name="password" class="form-control" id="inputPassword3" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3">
                                                <b style="color: #FF7493;">ยืนยันรหัสผ่าน</b><br><b>(confirm)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password2" id="password2" class="form-control" id="inputPassword3" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-default">แก้ไขการเข้าสู่ระบบ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            
                            <div role="tabpanel" class="tab-pane <?=(($active=="profile")?"active":"")?>" id="messages">
                                <div class="col-md-2"></div>
                                <div class="col-md-8" style="margin: 20px 0px 20px 0px;">
                                    <form class="form-horizontal" method="post" action="index.php?page=profile">
                                        <div class="form-group">
                                            <input type="hidden" name="action" value="profile"/>
                                            <label for="inputPassword3" class="col-sm-3">
                                                <b style="color: #FF7493;">ชื่อ</b><br><b>(name)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input value="<?=$_SESSION["customer"]["name"]?>" name="name" type="text" class="form-control" id="inputPassword3" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3">
                                                <b style="color: #FF7493;">นามสกุล</b><br><b>(surname)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input value="<?=$_SESSION["customer"]["surname"]?>" name="surname" type="text" class="form-control" id="inputPassword3" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect" class="col-sm-3">
                                                <b style="color: #FF7493;">เพศ</b><br><b>(gender)</b>
                                            </label>
                                            <div class="col-sm-9">
                                            <select id="disabledSelect" class="form-control" name="gender">
                                                <option>-----gender select-----</option>
                                                <option value="male" <?=(($_SESSION["customer"]["gender"] == "male")?"selected":"")?>>ชาย</option>
                                                <option value="female" <?=(($_SESSION["customer"]["gender"] == "female")?"selected":"")?>>หญิง</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3">
                                                <b style="color: #FF7493;">เบอร์โทร</b><br><b>(tel.)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input value="<?=$_SESSION["customer"]["tel"]?>" name="tel" type="text" class="form-control" id="inputPassword3" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-default">แก้ไขข้อมูล</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            
                            <div role="tabpanel" class="tab-pane <?=(($active=="address")?"active":"")?>" id="settings">
                                <div class="col-md-1"></div>
                                <div class="col-md-9" style="margin: 20px 0px 20px 0px;">
                                    <form class="form-horizontal" method="post" action="index.php?page=profile">
                                        <div class="form-group">
                                            <input type="hidden" name="action" value="address"/>
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">เลขที่ *</b><br><b>(no.)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no" value="<?=$_SESSION["customer"]["no"]?>" id="no" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">หมู่บ้าน/อาคาร</b><br><b>(building/land)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="building" name="building" value="<?=$_SESSION["customer"]["building"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">หมู่</b><br><b>(moo)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="moo" name="moo" value="<?=$_SESSION["customer"]["moo"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">ซอย</b><br><b>(soi)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="soi" name="soi" value="<?=$_SESSION["customer"]["soi"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">ถนน</b><br><b>(road)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="road" name="road" value="<?=$_SESSION["customer"]["road"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">แขวง/ตำบล *</b><br><b>(subdistrict)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="subdistrict" name="subdistrict" value="<?=$_SESSION["customer"]["subdistrict"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">เขต/อำเภอ *</b><br><b>(district)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="district" name="district" value="<?=$_SESSION["customer"]["district"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">จังหวัด *</b><br><b>(province)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="province" name="province" value="<?=$_SESSION["customer"]["province"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">รหัสไปรษณีย์ *</b><br><b>(postcode)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="postcode" name="postcode" value="<?=$_SESSION["customer"]["postcode"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-default">แก้ไขที่อยู่</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>


