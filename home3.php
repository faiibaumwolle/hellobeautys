<?php
include 'service/productservice.php';
$product = new productservice();
$data = $product->queryproductnew(1,4);
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12" style="margin: 20px 0px 20px 0px;">
                <center>
                    <img src="images/logo-head.jpg" class="img-responsive"  alt="Responsive image" style="">
                    <h3><b style="color: #FF5675;">NEW ARRIVALS</b></h3>
                    <?php
                        for($i = 0; $i < 4; $i++){
                            $id = $data[$i]["id"];
                            $name = $data[$i]["name"];
                            $price = $data[$i]["price"];
                            $discount_price = "";
                            if(!empty($data[$i]["discount_price"]) && $data[$i]["discount_price"] != "0"){
                                $discount_price = $data[$i]["discount_price"];
                            }
                            $picture = $data[$i]["picture"];
                    ?>
                        <?=(($i%4 == 0)?"<div class=\"row\">":"")?>
                        <div class="col-md-3">
                            <center>
                                <a href="index.php?page=productdetail&name=<?=$name?>"><img src="<?=$picture;?>" class="" style="width: 200px; height: 200px;"></a>
                                <br>
                                <a style="color: #848482;"><?php echo $name; ?></a>
                                <?php if($discount_price != "") { ?>
                                <h5 style="text-decoration: line-through; color: grey;"><b><?php echo $price; ?>฿</b></h5>
                                <h5 style="color: #FF5675; margin-left: 3px;"><b><?php echo $discount_price; ?>฿</b></h5>
                                <?php } else { ?>
                                <h5 style="color: #FF5675;"><b><?php echo $price; ?>฿</b></h5>
                                <?php } ?>
                            </center>
                        </div>
                        <?=(($i%4 == 3)?"</div>":"")?>
                    <?php }?>
                    <!--<h3><b style="color: #FF5675;">WHAT'S HOT</b></h3>-->
                    <?php
                        for($i = 0; $i < 0; $i++){
                            $id = $data[$i]["id"];
                            $name = $data[$i]["name"];
                            $price = $data[$i]["price"];
                            $picture = $data[$i]["picture"];
                    ?>
                        <?=(($i%4 == 0)?"<div class=\"row\">":"")?>
                        <div class="col-md-3">
                            <center>
                                <a href="index.php?page=productdetail&name=<?=$name?>"><img src="<?=$picture;?>" class="" style="width: 200px; height: 200px;"></a>
                                <br>
                                <a style="color: #848482;"><?php echo $name; ?></a>
                                <br>
                                <h5 style="color: #FF5675;"><b><?php echo $price; ?>฿</b></h5>
                            </center>
                        </div>
                        <?=(($i%4 == 3)?"</div>":"")?>
                    <?php }?>
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">HELLOBEAUTYS</h4>
      </div>
      <div class="modal-body">
          <img src="images/popup/1.jpg" id="img-pop" class="img-responsive-width" width="580">
          <div style="margin-top: 10px;">
              <button type="button" class="btn btn-default active" id="bt-1" onclick="chg(1)">1</button>
            <button type="button" class="btn btn-default" id="bt-2" onclick="chg(2)">2</button>
            <button type="button" class="btn btn-default" id="bt-3" onclick="chg(3)">3</button>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
    // $("#myModal").modal('show');
    function chg(img){
        if(img == 1){
            $("#bt-1").addClass("active");
            $("#bt-2").removeClass("active");
            $("#img-pop").prop("src", "images/popup/1.jpg");
        } else if (img == 2){
            $("#img-pop").prop("src", "images/popup/2.jpg");
            $("#bt-2").addClass("active");
            $("#bt-1").removeClass("active");
        } else if (img == 3){
            $("#img-pop").prop("src", "images/popup/3.jpg");
            $("#bt-2").addClass("active");
            $("#bt-1").removeClass("active");
        }
    }
</script>
<style>
    .img-responsive-width {
        max-width : 100%;
    }
</style>