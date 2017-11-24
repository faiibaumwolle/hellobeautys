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
              <button onclick="window.location='index.php?page=order_item'" type="button" class="btn btn-default pink-button">รายละเอียดสินค้า</button>
            </div>
            <div class="btn-group" role="group">
              <button onclick="window.location='index.php?page=order_address'" disabled type="button" class="btn btn-default">ที่อยู่ในการจัดส่ง</button>
            </div>
            <div class="btn-group" role="group">
              <button disabled type="button" class="btn btn-default">ตรวจสอบรายการสั่งซื้อ</button>
            </div>
            <div class="btn-group" role="group">
              <button disabled type="button" class="btn btn-default">สั่งซื้อเสร็จสมบูรณ์</button>
            </div>
        </div>
        <h3><b style="color: #FF5675;">เลือกวิธีการจัดส่ง</b></h3>
        <table class="table table-hover" style="font-size: 15px; margin-bottom: 60px;">
            <tr onclick="addDeliver(30)">
              <td width="10%"><input <?=(($_SESSION["order_data"]["deliver"]=="30")?"checked":"")?> type="radio" id="deliver" name="deliver" value="30" onclick="addDeliver(30)"/></td>
              <td width="65%">พัสดุลงทะเบียน</td>
              <td width="25%">30 บาท</td>
            </tr>
            <tr onclick="addDeliver(50)">
                <td><input <?=(($_SESSION["order_data"]["deliver"]=="50")?"checked":"")?> type="radio" name="deliver" id="deliver" value="50" onclick="addDeliver(50)"/></td>
              <td>พัสดุ EMS</td>
              <td>50 บาท</td>
            </tr>
        </table>
        <?php if(count($_SESSION["product_data"]) > 0) { ?>
        <h3><b style="color: #FF5675;">รายละเอียดสินค้า</b></h3>
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

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><button type="button" class="btn btn-default" onclick="window.location='index.php?page=product'">ซื้อสินค้าต่อ</button></div>
            <div class="col-md-7"></div>
            <div class="col-md-1"><button type="button" class="btn btn-success next-button" onclick="next()">ไปหน้าถัดไป</button></div>
        </div>
        <?php } ?>
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
        if($("#deliver:checked").length == 0){
            alert("กรุณาเลือกวิธีการจัดส่ง")
        } else {
            $.ajax({
                  method: "POST",
                  url: 'proxy.php',
                  data: {
                    action : "savePrice",
                    price_all : "<?=$price_all?>",
                    deliver : $("#deliver:checked").val()
                  }
            })
            .done(function( response ) {
              window.location='index.php?page=order_address';
            });
        }
    }
    addDeliver("<?=$_SESSION["order_data"]["deliver"]?>");
</script>