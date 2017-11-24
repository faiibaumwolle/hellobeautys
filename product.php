<?php
include 'service/productservice.php';
include 'service/productcatservice.php';

$product = new productservice();

$perpage = 12;

if(!empty($_GET["namecat"])){
    $dataall = $product->queryproductBycatall($_GET["namecat"]);
}else{
    $dataall = $product->queryproductall();
}
$total_record = count($dataall);
$total_page = ceil($total_record / $perpage);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 1;
}
$start = ($p - 1) * $perpage;

if(!empty($_GET["namecat"])){
    $data = $product->queryproductBycat($_GET["namecat"],$start,$perpage);
}else{
    $data = $product->queryproduct($start,$perpage);
}

$productcat = new productcatservice();
$datacat = $productcat->queryproductcat();
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
            <div class="row">
            <?php
                for($i = 0; $i < count($data); $i++){
                    $id = $data[$i]["id"];
                    $name = $data[$i]["name"];
                    $price = $data[$i]["price"];
                    $discount_price = "";
                    if(!empty($data[$i]["discount_price"]) && $data[$i]["discount_price"] != "0"){
                        $discount_price = $data[$i]["discount_price"];
                    }
                    $picture = $data[$i]["picture"];
            ?>
                <?=(($i%3 == 0)?"<div class=\"row\">":"")?>
                <div class="col-md-4">
                    <center>
                        <a href="index.php?page=productdetail&name=<?=$name?>"><img src="<?=$picture;?>" class="" style="width: 200px; height: 200px;"></a>
                        <br>
                        <a style="color: #848482;"><?php echo $name; ?></a>
                        <br>
                        <?php if($discount_price != "") { ?>
                        <h5 style="text-decoration: line-through; color: grey;"><b><?php echo $price; ?>฿</b></h5>
                        <h5 style="color: #FF5675; margin-left: 3px;"><b><?php echo $discount_price; ?>฿</b></h5>
                        <?php } else { ?>
                        <h5 style="color: #FF5675;"><b><?php echo $price; ?>฿</b></h5>
                        <?php } ?>
                    </center>
                </div>
                <?=(($i%3 == 2)?"</div>":"")?>
            <?php }?>
            </div>
            <br>
            <center><nav style="">
                <ul class="pagination">
                <li>
                    <a href="index.php?page=product&p=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li>
                    <a href="index.php?page=product&p=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <li>
                    <a href="index.php?page=product&p=<?php echo $total_page;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                </ul>
            </nav></center>
            <br>
        </div>
    </div>
    </div>
    <div class="col-md-2"></div>
</div>