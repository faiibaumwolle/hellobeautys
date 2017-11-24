<?php
include 'service/blogservice.php';
$blog = new blogservice();
$data = $blog->queryblog();

function getImage($html){
    preg_match_all('/<img[^>]+>/i',$html, $result); 

    if(count($result[0]) == 0){
        return "default.jpg";
    } else { 
        $start = explode('src="',$result[0][0]);
        $path_img = explode('"',$start[1]);
        return $path_img[0];
    }
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
                                <tr><td><h5><b>HELLO REVIEW</b></h5></td></tr>
                                <tr><td style="color: #B6B6B4;">BLOG REVIEW</td></tr>
                                <tr><td style="color: #B6B6B4;">VIDEO REVIEW</td></tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <img src="images/add-line.png" class="img-thumbnail" style="width: 180px; height: 180px;">
                    </div>
                    <br>
                    <div class="row">
                        <img src="images/how-to-buy.png" class="img-thumbnail" style="width: 180px; height: 180px;">
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
                    $content = substr(strip_tags($data[$i]["text"]), 0, 500);
                    $image = getImage($data[$i]["text"]);
            ?>
                    <?=(($i%2 == 0)?"<div class=\"row\">":"")?>
                    <div class="col-md-6" style="margin: 10px 0px 10px 0px; text-align: justify;">
                        <div style="height: 40px; margin-top: 10px; color: #FF7493;">
                            <h5><b><?php echo $name; ?></b></h5>
                        </div>
                        <div style="height: 300px; margin: 10px 0px 10px 0px;">
                            <center><img src="<?=$image?>" class="img-thumbnail" style="width: 300px; height: 300px;"></center>
                        </div>
                        <div style="height: 80px; margin-top: 10px; color: #848482;">
                            <p style="text-align: justify;"><?php echo $content; ?></p>
                        </div>
                        <div style="height: 20px; color: #E77471; text-align: right;">
                            <a class="blog" href="index.php?page=helloreviewread&id=<?=$name?>"><h6><b>อ่านต่อ...</b></h6></a>
                        </div>
                    </div>
                    <?=(($i%2 != 0)?"</div>":"")?>
            <?php  }?>
        </div>
        </div>
        <br>
        <br>
    </div>
    </div>
    <div class="col-md-2"></div>
</div>

