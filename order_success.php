<?php
include 'service/orderservice.php';
$order = new orderservice();
$data = $order->getBank();
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
              <button type="button" class="btn btn-default pink-back-button">รายละเอียดสินค้า</button>
            </div>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default pink-back-button">ที่อยู่ในการจัดส่ง</button>
            </div>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default pink-back-button">ตรวจสอบรายการสั่งซื้อ</button>
            </div>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default pink-button">สั่งซื้อเสร็จสมบูรณ์</button>
            </div>
        </div>
        
        <h3><b style="color: #FF5675;">สั่งซื้อเสร็จสมบูรณ์</b></h3>
        <div class="row">
            <div class="col-md-12">
                <span style="font-size:15px;">รายการสั่งซื้อของคุณคือ <strong>#<?=$_GET["ref"]?></strong></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="normal-text">จำนวนเงินที่ต้องชำระ <span class="highlight-text"><?=$_GET["price"]?> บาท</span></div>
                <div class="normal-text">เลือกวิธีการชำระเงินด้านล่าง</div>
            </div>
        </div>
        
        <br/>
        <div class="row">
            <div class="col-md-12" style="background:#f9bcce; text-align:center;"></div>
        </div><br/>
        
        
        <h4><b style="color: #FF5675;">ชำระเงินผ่านธนาคาร</b></h4>
        <div class="row">
            <div class="col-md-12">
                <div class="small-text">ลูกค้าสามารถชำระเงินผ่านทางธนาคารด้านล่างได้เลยคะ หลังจากชำระเงินแล้วรบกวนแจ้งชำระเงินผ่านทางหน้าเว็บไซต์ได้เลยนะคะ</div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
              <tr>
                <th>ธนาคาร</th>
                <th>เลขบัญชี</th>
                <th>สาขา</th>
                <th>ประเภทบัญชี</th>
                <th>ชื่อบัญชี</th>
              </tr>
            </thead>
            <tbody>
              <?php for($b = 0; $b < count($data); $b++) { ?>
              <tr>
                <td><img width="25" height="24 "src="images/bank/<?=$data[$b]["image"]?>"/> ธ.ไทยพาณิชย์</td>
                <td><?=$data[$b]["account_no"]?></td>
                <td><?=$data[$b]["branch"]?></td>
                <td><?=$data[$b]["type"]?></td>
                <td><?=$data[$b]["owner"]?></td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
        
        <div class="row">
            <div class="col-md-1"></div>
            <!--<div class="col-md-1"><button type="button" class="btn btn-default" onclick="window.location='index.php?page=order_address'">ที่อยู่ในการจัดส่ง</button></div>-->
            <div class="col-md-8"></div>
            <div class="col-md-1"><button type="button" class="btn btn-success next-button" onclick="next()">ไปหน้าแจ้งชำระเงิน</button></div>
        </div>
       
    </div>
</div>
<script>
    function next(){
        window.location='index.php?page=order&ref=<?=$_GET["ref"]?>';
    }
</script>