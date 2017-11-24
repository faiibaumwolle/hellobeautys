<?php
include 'service/orderservice.php';
$order = new orderservice();
$data = $order->queryOrder($_GET["ref"]);
if(!empty($_POST["no"])){
    $order->updateAddress($_POST);
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
                    <div class="row" style="background-color: #FDD7E4; width: 100%;">
                        <div class="col-md-12">
                            <table class="table" >
                                <tr><td><h5><b>PRODUCT</b></h5></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=product" style="color: #FF5675;">PRODUCT</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=productnew">NEW ARRIVALS</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=producthot">WHAT'S HOT</a></td></tr>
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
                                <div class="col-md-9" style="margin: 20px 0px 20px 0px;">
                                <h3><b style="color: #FF5675;">รายการสั่งซื้อ #<?=$_GET["ref"]?></b></h3><br/>
                                <?php if(count($data["order_list"]) > 0) { ?>

                                <h4><b style="color: #FF5675;">แก้ไขที่อยู่ผู้รับ</b></h4>
                                    <form class="form-horizontal" id="submit-form" method="post" action="index.php?page=edit_address">
                                        <input type="hidden" name="order_ref" value="<?=$_GET["ref"]?>"/>
                                        <div class="form-group">
                                            <input type="hidden" name="action" value="address"/>
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">เลขที่ *</b><br><b>(no.)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no" value="<?=$data[0]["no"]?>" id="no" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">หมู่บ้าน/อาคาร</b><br><b>(building/land)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="building" name="building" value="<?=$data[0]["building"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">หมู่</b><br><b>(moo)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="moo" name="moo" value="<?=$data[0]["moo"];?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">ซอย</b><br><b>(soi)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="soi" name="soi" value="<?=$data[0]["soi"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">ถนน</b><br><b>(road)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="road" name="road" value="<?=$data[0]["road"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">แขวง/ตำบล *</b><br><b>(subdistrict)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="subdistrict" name="subdistrict" value="<?=$data[0]["subdistrict"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">เขต/อำเภอ *</b><br><b>(district)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="district" name="district" value="<?=$data[0]["district"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">จังหวัด *</b><br><b>(province)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="province" name="province" value="<?=$data[0]["province"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">รหัสไปรษณีย์ *</b><br><b>(postcode)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="postcode" name="postcode" value="<?=$data[0]["postcode"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <input onclick="beforeSubmit()" type="button" value="แก้ไขที่อยู่" class="btn btn-success next-button"/>
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
       if(jQuery.trim($("#no").val()) == ""){
           alert("กรุณากรอกเลขที่");
       } else if(jQuery.trim($("#subdistrict").val()) == ""){
           alert("กรุณากรอกแขวง/ตำบล");
       } else if(jQuery.trim($("#district").val()) == ""){
           alert("กรุณากรอกเขต/อำเภอ");
       } else if(jQuery.trim($("#province").val()) == ""){
           alert("กรุณากรอกจังหวัด");
       } else if(jQuery.trim($("#postcode").val()) == ""){
           alert("กรุณากรอกรหัสไปรษณีย์");
       } else {
        $("#submit-form").submit();
       }
   }
   
   $("#payment_date").datepicker();
</script>