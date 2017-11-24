<?php 
$presub = "ตำบล";
$predis = "อำเภอ";
$province = mb_substr(strtolower($_SESSION["customer"]["province"]), 0, 3,'UTF-8'); 
if($province == "กรุ" || $province == "ban" || $province == "กทม" || $province == "ก.ท"){
    $presub = "แขวง";
    $predis = "เขต";
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
        
        <div style="margin: 40px 0px;" class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <button onclick="window.location='index.php?page=order_item'" type="button" class="btn btn-default pink-back-button">รายละเอียดสินค้า</button>
            </div>
            <div class="btn-group" role="group">
              <button onclick="window.location='index.php?page=order_address'" type="button" class="btn btn-default pink-back-button">ที่อยู่ในการจัดส่ง</button>
            </div>
            <div class="btn-group" role="group">
              <button onclick="window.location='index.php?page=order_verify'" type="button" class="btn btn-default pink-button">ตรวจสอบรายการสั่งซื้อ</button>
            </div>
            <div class="btn-group" role="group">
              <button disabled type="button" class="btn btn-default">สั่งซื้อเสร็จสมบูรณ์</button>
            </div>
        </div>
        
        <h3><b style="color: #FF5675;">ตรวจสอบรายการสั่งซื้อ</b></h3>
        กรุณาตรวจสอบรายการสินค้าและข้อมูลการจัดส่งว่าถูกต้องครบถ้วน จากนั้นกดปุ่ม “ยืนยันการสั่งซื้อ”<br/><br/><br/><br/><br/>
        
        <h4><b style="color: #FF5675;">ที่อยู่สำหรับจัดส่ง</b></h4>
        
        <table class="table table-bordered" style="font-size: 13px;">
            <tr>
              <td width="20%">ชื่อสกุล</td>
              <td width="80%"><?=($_SESSION["customer"]["name"]. " ". $_SESSION["customer"]["surname"])?></td>
            </tr>
            <tr>
                <td>ที่อยู่</td>
                <td><?=((($_SESSION["customer"]["no"] != "")?$_SESSION["customer"]["no"]:""). " " .
                        $_SESSION["customer"]["building"]. " " .
                        (($_SESSION["customer"]["moo"] != "")?"หมู่ ".$_SESSION["customer"]["moo"]:""). " " .
                        (($_SESSION["customer"]["soi"] != "")?"ซอย".$_SESSION["customer"]["soi"]:""). " " .
                        (($_SESSION["customer"]["road"] != "")?"ถนน".$_SESSION["customer"]["road"]:""). " " .
                        (($_SESSION["customer"]["subdistrict"] != "")?$presub.$_SESSION["customer"]["subdistrict"]:""). " " .
                        (($_SESSION["customer"]["district"] != "")?$predis.$_SESSION["customer"]["district"]:""). " " .
                        (($_SESSION["customer"]["province"] != "")?$_SESSION["customer"]["province"]:""). " " .
                        (($_SESSION["customer"]["postcode"] != "")?$_SESSION["customer"]["postcode"]:""). " "
                        )?></td>
            </tr>
            <tr>
                <td>เบอร์โทรศัพท์</td>
                <td><?=($_SESSION["customer"]["tel"])?></td>
            </tr>
            <tr>
                <td>อีเมล</td>
                <td><?=($_SESSION["customer"]["email"])?></td>
            </tr>
        </table><br/><br/>
        
        <h4><b style="color: #FF5675;">วิธีการจัดส่ง</b></h4>
        <table class="table table-hover" style="font-size: 15px; margin-bottom: 60px;">
            <tr <?=(($_SESSION["order_data"]["deliver"]=="30")?"":"style='display:none;'")?>>
              <td width="10%"></td>
              <td width="65%">พัสดุลงทะเบียน</td>
              <td width="25%">30 บาท</td>
            </tr>
            <tr <?=(($_SESSION["order_data"]["deliver"]=="50")?"":"style='display:none;'")?>>
              <td></td>
              <td>พัสดุ EMS</td>
              <td>50 บาท</td>
            </tr>
        </table>
        
        <?php if(count($_SESSION["product_data"]) > 0) { ?>
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
              <?php for($i = 0; $i < count($_SESSION["product_data"]); $i++){ 
                  $price_all += $_SESSION["product_data"][$i]["quantity"] * $_SESSION["product_data"][$i]["price"];
              ?>
              <tr>
                <td><?=($i + 1)?></td>
                <td><img src="<?=$_SESSION["product_data"][$i]["picture"]?>" width="60px;"/><?=$_SESSION["product_data"][$i]["name"]?></td>
                <td><span style="margin-left: 10px;"><?=$_SESSION["product_data"][$i]["quantity"]?></span></td>
                <td><span style="margin-left: 10px;"><?=$_SESSION["product_data"][$i]["price"]?></span></td>
              </tr>
              <?php } ?>
              <tr style="font-size: 15px; font-weight: bold;">
                <td colspan="2"></td>
                <td style="font-size: 13px;">ราคาสินค้าทั้งหมด</td>
                <td><span style="margin-left: 10px;" id="price_all"><?=$price_all?></span></td>
              </tr>
            </tbody>
        </table>
        <?php } ?>
        <br/><br/>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><button type="button" class="btn btn-default" onclick="window.location='index.php?page=order_address'">ที่อยู่ในการจัดส่ง</button></div>
            <div class="col-md-7"></div>
            <div class="col-md-1"><button type="button" id="next-button" class="btn btn-success next-button" onclick="next()">ยืนยันการสั่งซื้อ</button></div>
        </div>
        <br><br>
    </div>
</div>
<script>
    function addDeliver(deliver_price){
        if(deliver_price != ""){
            var price_all = "<?=$price_all?>";
            $("#price_all").html(parseInt(price_all) + parseInt(deliver_price));
            $("#deliver[value='"+deliver_price+"']").prop("checked", true);
        }
    }
    
    function next(){
        $("#next-button").prop("disabled", true);
        $.ajax({
              method: "POST",
              url: 'proxy.php',
              data: {
                action : "saveOrder"
              }
        })
        .done(function( response ) {
            if(response["status"] == "0"){
                window.location='index.php?page=order_success&ref=' + response["ref"] + '&price=' + response['price'];
            } else {
                alert(response["errormessage"]);
                window.location='index.php?page=order_member';
            }
            $("#next-button").prop("disabled", false);
        });
    }
    addDeliver("<?=$_SESSION["order_data"]["deliver"]?>");
</script>