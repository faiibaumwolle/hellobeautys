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
              <button onclick="window.location='index.php?page=order_address'" type="button" class="btn btn-default pink-button">ที่อยู่ในการจัดส่ง</button>
            </div>
            <div class="btn-group" role="group">
              <button disabled type="button" class="btn btn-default">ตรวจสอบรายการสั่งซื้อ</button>
            </div>
            <div class="btn-group" role="group">
              <button disabled type="button" class="btn btn-default">สั่งซื้อเสร็จสมบูรณ์</button>
            </div>
        </div>
        <h3><b style="color: #FF5675;">ที่อยู่ในการจัดส่ง</b></h3>
        <div class="row">
            <div class="col-md-1"></div>
                                <div class="col-md-9" style="margin: 20px 0px 20px 0px;">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">เบอร์โทรศัพท์ *</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" value="<?=$_SESSION["customer"]["tel"]?>" id="tel" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">เลขที่ *</b><br><b>(no.)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" value="<?=$_SESSION["customer"]["no"]?>" id="no" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">หมู่บ้าน/อาคาร</b><br><b>(building/land)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="building" value="<?=$_SESSION["customer"]["building"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">หมู่</b><br><b>(moo)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="moo" value="<?=$_SESSION["customer"]["moo"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">ซอย</b><br><b>(soi)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="soi" value="<?=$_SESSION["customer"]["soi"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">ถนน</b><br><b>(road)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="road" value="<?=$_SESSION["customer"]["road"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">แขวง/ตำบล *</b><br><b>(subdistrict)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="subdistrict" value="<?=$_SESSION["customer"]["subdistrict"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">เขต/อำเภอ *</b><br><b>(district)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="district" value="<?=$_SESSION["customer"]["district"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">จังหวัด *</b><br><b>(province)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="province" value="<?=$_SESSION["customer"]["province"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-3">
                                                <b style="color: #FF7493;">รหัสไปรษณีย์ *</b><br><b>(postcode)</b>
                                            </label>
                                            <div class="col-sm-9">
                                                <input id="postcode" value="<?=$_SESSION["customer"]["postcode"]?>" type="text" class="form-control"  placeholder="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-1"></div>
        </div>
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><button type="button" class="btn btn-default" onclick="window.location='index.php?page=order_item'">รายละเอียดสินค้า</button></div>
            <div class="col-md-6"></div>
            <div class="col-md-1"><button type="button" class="btn btn-success next-button" onclick="next()">ไปหน้าถัดไป</button></div>
        </div>
    </div>
</div>
<script>
    function addDeliver(deliver_price){
        var price_all = "<?=$price_all?>";
        $("#price_all").html(parseInt(price_all) + parseInt(deliver_price));
        $("#deliver[value='"+deliver_price+"']").prop("checked", true);
    }
    
    function next(){
       if(jQuery.trim($("#tel").val()) == ""){
           alert("กรุณากรอกหมายเลขโทรศัพท์");
       } else if(jQuery.trim($("#no").val()) == ""){
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
            $.ajax({
                  method: "POST",
                  url: 'proxy.php',
                  data: {
                    action : "saveAddress",
                    no : $("#no").val(),
                    building : $("#building").val(),
                    soi : $("#soi").val(),
                    moo : $("#moo").val(),
                    subdistrict : $("#subdistrict").val(),
                    district : $("#district").val(),
                    road : $("#road").val(),
                    province : $("#province").val(),
                    postcode : $("#postcode").val(),
                    tel : $("#tel").val()
                  }
            })
            .done(function( response ) {
              window.location='index.php?page=order_verify';
            });
        }
    }

</script>