

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
                                <tr><td><h5><b>HELLO REVIEW</b></h5></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=blogreview" style="color: #FF5675;">BLOG REVIEW</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=videoreview">VIDEO REVIEW</a></td></tr>
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
        <div class="col-md-9">
            <h3><b style="color: #FF5675;">HELLO REVIEW |</b> <b style="color: #B6B6B4;">BLOG REVIEW</b></h3>
            <br>
            <?php
                for($i = 0; $i < count($data); $i++){
                    $name = $data[$i]["name"];
                    $content = $data[$i]["text"];
                    $credit = $data[$i]["credit"];
            ?>
                    <div class="row">
                        <div class="col-md-12" style="margin: 10px 0px 10px 0px; text-align: justify;">
                            <div style="margin-top: 10px; color: #FF7493;">
                                <h4><b><?php echo $name; ?></b></h4>
                            </div>
                            <div style="margin-top: 10px;">
                                <p style="text-align: justify;"><?php echo $content; ?></p>
                            </div>
                            <div style="margin-top: 10px; color: #FF7493;">
                                <h5><b>Credit :: <a href="<?=$credit;?>" class="credit" target="_blank"><?php echo $credit; ?></a></b></h5>
                            </div>
                        </div>
                    </div>
            <?php  }?>
        </div>
        </div>
        <br>
        <br>
    </div>
    </div>
    <div class="col-md-2"></div>
</div>

