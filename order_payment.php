<?php
include 'service/orderservice.php';
$order = new orderservice();
$data = $order->queryOrder($_GET["ref"]);
$bank_data = $order->getBank();

if(!empty($_POST["bank_id"])){
    $_POST["files"] = $_FILES;
    $order->updatePayment($_POST);
    echo '<script type="text/javascript">
                    window.location = "index.php?page=order&ref='.$_POST["order_ref"].'"
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
        
        <h4><b style="color: #FF5675;">แจ้งการชำระเงิน</b></h4>
        <form id="submit-form" class="form-horizontal" method="post" action="order_payment.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover" style="font-size: 15px; margin-bottom: 60px;">
                    <?php for($b = 0; $b < count($bank_data); $b++) { ?>
                    <tr onclick="chooseBank('<?=$bank_data[$b]["id"]?>')">
                        <td><input type="radio" id="bank" name="bank_id" value="<?=$bank_data[$b]["id"]?>"></td>
                        <td><img width="25" height="24 "src="images/bank/<?=$bank_data[$b]["image"]?>"/> ธ.ไทยพาณิชย์</td>
                        <td><?=$bank_data[$b]["account_no"]?></td>
                        <td><?=$bank_data[$b]["owner"]?></td>

                      </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
            <input type="hidden" name="order_ref" value="<?=$_GET["ref"]?>"/>
            <div class="form-group">
                <label  class="col-sm-3">
                    <b style="color: #FF7493;">วันที่ชำระเงิน</b></b>
                </label>
                <div class="col-sm-4">
                    <input type="text" readonly="" name="payment_date" value="" id="payment_date" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3">
                    <b style="color: #FF7493;">เวลา(โดยประมาณ)</b></b>
                </label>
                <div class="col-sm-4">
                    <select name="hour" id="hours">
                        <option value="0">- ชั่วโมง -</option>
                        <?php for($h = 0; $h <= 23; $h++){ ?>
                            <option value="<?=sprintf('%02d', $h)?>"><?=sprintf('%02d', $h)?></option>
                        <?php } ?>
                    </select>
                    
                    <select name="minute" id="minute">
                        <option value="0">- นาที -</option>
                        <?php for($m = 0; $m <= 59; $m++){ ?>
                            <option value="<?=sprintf('%02d', $m)?>"><?=sprintf('%02d', $m)?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3">
                    <b style="color: #FF7493;">จำนวนเงิน</b></b>
                </label>
                <div class="col-sm-4">
                    <input type="text" name="balance" value="" id="balance" class="form-control" placeholder="0.00 บาท">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3">
                    <b style="color: #FF7493;">หลักฐานการโอน</b></b>
                </label>
                <div class="col-sm-8">
                    <input type="file" name="image" value="" id="image"  placeholder="">
                    <br/>[ ไฟล์ jpg,gif,png,pdf ไม่เกิน2MB] การแนบหลักฐานจะช่วยทำให้ตรวจสอบได้เร็วขึ้น
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3">
                    <b style="color: #FF7493;">รายละเอียดเพิ่มเติม</b></b>
                </label>
                <div class="col-sm-4">
                    <textarea name="detail" class="form-control"></textarea>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1">
                    <!--<button type="button" class="btn btn-success next-button" onclick="next()">แจ้งการชำระเงิน</button>-->
                    <input onclick="beforeSubmit()" type="button" value="แจ้งการชำระเงิน" class="btn btn-success next-button"/>
                </div>
            </div>
        </form>
            
        <?php } ?>
       
    </div>
</div>
<script>
   function chooseBank(bank){
       $("#bank[value='"+bank+"']").prop("checked", true);
   }
   
   function beforeSubmit(){
       if($("#bank:checked").length == 0){
           alert("กรุณาเลือกธนาคาร");
       } else if($("#payment_date").val() == ""){
           alert("กรุณาเลือกวันที่ชำระเงิน");
       } else if($("#hours").val() == "0"){
           alert("กรุณาเลือกเวลา");
       } else if($("#minute").val() == "0"){
           alert("กรุณาเลือกเวลา");
       } else if($("#balance").val() == ""){
           alert("กรุณาใส่จำนวนเงิน");
       } else if(!$.isNumeric($("#balance").val())){
           alert("กรุณาใส่จำนวนเงินให้ถูกต้อง");
       } else {
        $("#submit-form").submit();
       }
   }
   
   $("#payment_date").datepicker();
</script>