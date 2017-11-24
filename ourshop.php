<?php
include 'service/dealerservice.php';
$dealer = new dealerservice();
$data = $dealer->querydealer();
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
                                <tr><td><a class="menu-left" href="index.php?page=contactus">CONTACT US</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=ourshop" style="color: #FF5675;">OUR SHOP</a></td></tr>
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
            <h3><b style="color: #FF5675;">ABOUT US |</b> <b style="color: #B6B6B4;">OUR SHOP</b></h3>
            <br>
            <h5><b style="color: #FF7493;">กรุงเทพและปริมณฑล</b></h5>
            <br>
            <table class="table hidden-xs">
                <tr>
                    <td style="text-align: left; width: 30%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Shop</b></h5></td>
                    <td style="text-align: left; width: 50%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Address</b></h5></td>
                    <td style="text-align: left; width: 20%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Telephone</b></h5></td>
                </tr>
                <?php for($i = 0; $i < count($data); $i++){
                    if($data[$i]["province_id"] == "1"){
                ?>
                <tr>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["shop"]?></td>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["address"]?></td>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["telephone"]?></td>
                </tr>
                <?php } }?>
            </table>
        
            <table class="table visible-xs-block">
                <?php for($i = 0; $i < count($data); $i++){
                    if($data[$i]["province_id"] == "1"){
                ?>
                <tr >
                    <td style="text-align: left; color: #FFFFFF; background-color: #FDD7E4; width: 100%;" colspan="2"><h5><b><?php echo $data[$i]["shop"]?></b></h5></td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 30%; color: #848482"><b>Address</b></td>
                    <td style="text-align: left; width: 70%; color: #848482"><?php echo $data[$i]["address"]?></td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 30%; color: #848482"><b>Telephone</b></td>
                    <td style="text-align: left; width: 70%; color: #848482"><?php echo $data[$i]["telephone"]?></td>
                </tr>
                <?php } }?>
            </table>
        
            <br>
            <h5><b style="color: #FF7493;">ต่างจังหวัด</b></h5>
            <br>
            <br>
            <table class="table hidden-xs">
                <tr>
                    <td style="text-align: left; width: 30%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Shop</b></h5></td>
                    <td style="text-align: left; width: 50%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Address</b></h5></td>
                    <td style="text-align: left; width: 20%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Telephone</b></h5></td>
                </tr>
                <?php for($i = 0; $i < count($data); $i++){
                    if($data[$i]["province_id"] == "2"){
                ?>
                <tr>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["shop"]?></td>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["address"]?></td>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["telephone"]?></td>
                </tr>
                <?php } }?>
            </table>
        
            <table class="table visible-xs-block">
                <?php for($i = 0; $i < count($data); $i++){
                    if($data[$i]["province_id"] == "2"){
                ?>
                <tr >
                    <td style="text-align: left; color: #FFFFFF; background-color: #FDD7E4; width: 100%;" colspan="2"><h5><b><?php echo $data[$i]["shop"]?></b></h5></td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 30%; color: #848482;"><b>Address</b></td>
                    <td style="text-align: left; width: 70%; color: #848482;"><?php echo $data[$i]["address"]?></td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 30%; color: #848482;"><b>Telephone</b></td>
                    <td style="text-align: left; width: 70%; color: #848482;"><?php echo $data[$i]["telephone"]?></td>
                </tr>
                <?php } }?>
            </table>
        
            <br>
            <h5><b style="color: #FF7493;">ต่างประเทศ</b></h5>
            <br>
            <br>
            <table class="table hidden-xs">
                <tr>
                    <td style="text-align: left; width: 30%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Shop</b></h5></td>
                    <td style="text-align: left; width: 50%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Address</b></h5></td>
                    <td style="text-align: left; width: 20%; color: #FFFFFF; background-color: #FDD7E4;"><h5><b>Telephone</b></h5></td>
                </tr>
                <?php for($i = 0; $i < count($data); $i++){
                    if($data[$i]["province_id"] == "3"){
                ?>
                <tr>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["shop"]?></td>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["address"]?></td>
                    <td style="text-align: left; color: #848482;"><?php echo $data[$i]["telephone"]?></td>
                </tr>
                <?php } }?>
            </table>
        
            <table class="table visible-xs-block">
                <?php for($i = 0; $i < count($data); $i++){
                    if($data[$i]["province_id"] == "3"){
                ?>
                <tr >
                    <td style="text-align: left; color: #FFFFFF; background-color: #FDD7E4;" colspan="2"><h5><b><?php echo $data[$i]["shop"]?></b></h5></td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 30%; color: #848482;"><b>Address</b></td>
                    <td style="text-align: left; width: 70%; color: #848482;"><?php echo $data[$i]["address"]?></td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 30%; color: #848482;"><b>Telephone</b></td>
                    <td style="text-align: left; width: 70%; color: #848482;"><?php echo $data[$i]["telephone"]?></td>
                </tr>
                <?php } }?>
            </table>
        </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

