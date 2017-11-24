<?php
include 'service/orderservice.php';
$order = new orderservice();
$data = $order->queryOrder($_GET["ref"]);
if(empty($_SESSION["customer"])){
    echo '<script type="text/javascript">
                    window.location = "index.php?page=home"
          </script>';
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
        
        <h3><b style="color: #FF5675;">รายการสั่งซื้อ #<?=$_GET["ref"]?></b></h3><br/>
        <?php if(count($data["order_list"]) > 0) { ?>
        
    <h4><b style="color: #FF5675;">รายละเอียดการสั่งซื้อ</b></h4>
        
        <table class="table table-bordered" style="font-size: 13px;">
            <tr>
              <td width="20%">ชื่อสกุล</td>
              <td width="80%"><?=($data["order"]["name"]. " ". $data["order"]["surname"])?></td>
            </tr>
            <tr>
                <td>ที่อยู่</td>
                <td><?=($data["order"]["no"]. " " .
                        $data["order"]["building"]. " " .
                        $data["order"]["moo"]. " " .
                        $data["order"]["soi"]. " " .
                        $data["order"]["road"]. " " .
                        $data["order"]["subdistrict"]. " " .
                        $data["order"]["district"]. " " .
                        $data["order"]["province"]. " " .
                        $data["order"]["postcode"]. " "
                        )?>
                <?php if($data["order"]["actual_shipment_status"] == "Pending"){ ?>
                    <span class="link-text" onclick="window.location='index.php?page=edit_address&ref=<?=$_GET["ref"]?>'">(แก้ไขที่อยู่ผู้รับ คลิกที่นี้)</span>
                <?php } ?>
                </td>
            </tr>
            <tr>
                <td>เบอร์โทรศัพท์</td>
                <td><?=($data["order"]["tel"])?></td>
            </tr>
            <tr>
                <td>อีเมล</td>
                <td><?=($data["order"]["email"])?></td>
            </tr>
            <tr>
                <td>การจัดส่ง</td>
                <td><?=$data["order"]["shipment_name"]?> (<?=$data["order"]["shipment_price"]?> บาท)</td>
            </tr>
            <tr>
                <td>สถานะการจ่ายเงิน</td>
                <td><?=$data["order"]["payment_status"]?> 
                    <?php if($data["order"]["actual_payment_status"] == "Pending"){ ?>
                    <span class="link-text" onclick="window.location='index.php?page=order_payment&ref=<?=$_GET["ref"]?>'">(แจ้งการชำระเงิน คลิกที่นี้)</span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>สถานะการจัดส่ง</td>
                <td><?=$data["order"]["shipment_status"]?></td>
            </tr>
            <?php if($data["order"]["track"] != "") { ?>
            <tr>
                <td>เลขติดตาม</td>
                <td><?=$data["order"]["track"]?></td>
            </tr>
            <?php } ?>
        </table><br/><br/>
        
        <h4><b style="color: #FF5675;">รายละเอียดสินค้า</b></h4>
        <table class="table table-striped">
            <thead>
              <tr>  
                <th>#</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคา/ชิ้น</th>
                <!--<th></th>-->
              </tr>
            </thead>
            <tbody>
              <?php for($i = 0; $i < count($data["order_list"]); $i++){ 
                  $price_all += $data["order_list"][$i]["order_quantity"] * $data["order_list"][$i]["price"];
              ?>
              <tr>
                <td><?=($i + 1)?></td>
                <td><img src="<?=$data["order_list"][$i]["picture"]?>" width="60px;"/><?=$data["order_list"][$i]["name"]?></td>
                <td><span style="margin-left: 10px;"><?=$data["order_list"][$i]["order_quantity"]?></span></td>
                <td><span style="margin-left: 10px;"><?=$data["order_list"][$i]["price"]?></span></td>
              </tr>
              <?php } ?>
              <tr style="font-size: 15px; font-weight: bold;">
                <td colspan="2"></td>
                <td style="font-size: 13px;">ราคาสินค้าทั้งหมด</td>
                <td><span style="margin-left: 10px;" id="price_all"><?=($price_all + $data["order"]["shipment_price"])?></span></td>
              </tr>
            </tbody>
        </table>
        <?php } ?>
       
    </div>
</div>
<script>
   
</script>