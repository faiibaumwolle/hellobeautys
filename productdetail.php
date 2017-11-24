<?php
include 'service/productservice.php';
include 'service/productcatservice.php';

$name = $_GET['name'];
$product = new productservice();
$data = $product->queryproductByname($name);

$productcat = new productcatservice();
$datacat = $productcat->queryproductcat();

$productImage = $product->queryImageByID($data[0]["id"]);
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
        <div class="col-md-9" style="margin-bottom: 30px;">
            <h3><b style="color: #FF5675;">PRODUCT</b></h3>
            <?php
                for($i = 0; $i < count($data); $i++){
                    $id = $data[$i]["id"];
                    $name = $data[$i]["name"];
                    $detail = $data[$i]["detail"];
                    $moredetail = $data[$i]["moredetail"];
                    $price = $data[$i]["price"];
                    $discount_price = "";
                    if(!empty($data[$i]["discount_price"]) && $data[$i]["discount_price"] != "0"){
                        $discount_price = $data[$i]["discount_price"];
                    }
                    $picture = $data[$i]["picture"];
            ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?=$picture;?>" class="" id="img_show" style="width: 100%;">
                </div>
                <div class="col-md-6">
                    <div style="color: #FF7493; margin: 20px 0px 20px 0px;"><h4><b><?php echo $name; ?></b></h4></div>
                    <div style="color: #848482; margin: 20px 0px 20px 0px; text-align: justify;"><?php echo $detail; ?></div>
                    
                    <?php if($discount_price != "") { ?>
                        <div style="font-size: 14px;">ราคา 
                            <span style="color: grey; margin: 20px 0px 20px 0px; text-align: justify; text-decoration: line-through;"><?php echo $price; ?> ฿</span>
                            <span style="color: #FF7493; margin: 20px 0px 20px 0px; text-align: justify;"><?php echo $discount_price; ?> ฿</span>
                        </div>
                        <?php } else { ?>
                        <div style="color: #FF7493; margin: 20px 0px 20px 0px; text-align: justify;"><h5>ราคา <?php echo $price; ?> ฿</h5></div>
                        <?php } ?>
                    <div>
                    <form class="form-horizontal" method="post" action="index.php?page=cart">
                            <div class="form-group">
                            <label for="gender" class="col-sm-4">
                                <b style="color: #FF7493;"><h5>จำนวนสินค้า</h5></b>
                            </label>
                            <div class="col-sm-3">
                                <input type="text" name="quantity" class="form-control" id="quantity" placeholder="">
                                <input type="hidden" name="id" id="id" value="<?=$id?>"/>
                                <input type="hidden" name="name" id="id" value="<?=$name?>"/>
                                <input type="hidden" name="picture" id="id" value="<?=$picture?>"/>
                                <input type="hidden" name="price" id="id" value="<?=(($discount_price != "")?$discount_price:$price)?>"/>
                            </div>
                            </div>
                        <div class="form-group">
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-default" style="width: 100%">หยิบใส่ตระกร้า</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img onclick="changeImg('<?=$picture;?>')" src="<?=$picture;?>" class="" style="width: 100px; height: 100px; cursor: pointer; border:#FF7493 solid 0.1px;">
                    <?php for($j = 0; $j < count($productImage); $j++) { ?>
                    <img onclick="changeImg('<?=$productImage[$j]["picture"];?>')" src="<?=$productImage[$j]["picture"];?>" class="" style="width: 100px; height: 100px; cursor: pointer; border:#FF7493 solid 0.1px;">
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="color: #FF7493; margin: 20px 0px 20px 0px;">
                        <h5><u>PRODUCT DETAIL</u></h5>
                    </div>
                    <div style="color: #848482; margin: 20px 0px 20px 0px;">
                        <?php echo $moredetail; ?>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>
    </div>
    </div>
    <div class="col-md-2"></div>
</div>
<script>
        function changeImg(path){
            $("#img_show").attr("src", path);
        }
</script>