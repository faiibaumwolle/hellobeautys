<?php
    include 'service/productcatservice.php';
    $productcat = new productcatservice();
    $datacat = $productcat->queryproductcat();

    $price_all = 0;
    if(!empty($_POST["id"])){
        $product_data = $_POST;
        if(!is_numeric($product_data["quantity"])) {$product_data["quantity"] = "1";}
        if(!isset($_SESSION["product_data"])){
            $_SESSION["product_data"] = array();
            array_push($_SESSION["product_data"], $product_data);
        } else {
            $count_exist = 0;
            for($i = 0; $i < count($_SESSION["product_data"]); $i++){
                if($_SESSION["product_data"][$i]["id"] == $product_data["id"]){
                    $count_exist++;
                    $_SESSION["product_data"][$i] = $product_data;
                }
            }
            if($count_exist == 0){
                array_push($_SESSION["product_data"], $product_data);
            }
        }
        session_write_close();
    } else if(!empty($_GET["id"])){
        for($i = 0; $i < count($_SESSION["product_data"]); $i++){
                if($_SESSION["product_data"][$i]["id"] == $_GET["id"]){
                    unset($_SESSION["product_data"][$i]);
                }
        }
    }
    
//    session_destroy();
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
                    <br>
                    <div class="row" style="width: 100%;">
                        <div class="col-md-12">
                            <table class="table" >
                            <?php
                                for($i = 0; $i < count($datacat); $i++){
                                    $idcat = $datacat[$i]["id"];
                                    $namecat = $datacat[$i]["name"];
                            ?>
                                <tr><td>
                                    <img src="images/bullet_footer.png">
                                    &nbsp;
                                    <a class="productcat" href="index.php?page=product&namecat=<?=$namecat?>"><?php echo $namecat; ?></a>
                                </td></tr>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
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
        <h3><b style="color: #FF5675;">รายการสินค้าในตะกร้า</b></h3>
        <?php if(count($_SESSION["product_data"]) > 0) { ?>
        <table class="table table-striped">
            <thead>
              <tr>  
                <th>#</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคา/ชิ้น</th>
                <th></th>
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
                <td><button type="button" onclick="window.location='index.php?page=cart&id=<?=$_SESSION["product_data"][$i]["id"]?>'" class="btn btn-danger cart-button">-</button></td>
              </tr>
              <?php } ?>
              <tr>
                <td colspan="2"></td>
                <td style="font-size: 13px;">ราคาสินค้าทั้งหมด</td>
                <td><span style="margin-left: 10px;"><?=$price_all?></span></td>
                <td></td>
              </tr>
            </tbody>
        </table>
        <div style="float: right;">
            <button type="button" class="btn btn-default" onclick="window.location='index.php?page=product'">ซื้อสินค้าต่อ</button>
            <button type="button" class="btn btn-success" onclick="window.location='index.php?page=order_member'">สั่งซื้อสินค้า</button>
        </div>
        <?php } else { ?>
              <div class="alert alert-danger" style="margin-top: 30px;">
                <span style="font-size: 15px;">ไม่มีสินค้าในตะกร้า</span>
              </div>
        <?php } ?>
    </div>
</div>