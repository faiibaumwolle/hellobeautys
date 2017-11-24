<?php
include 'service/blogservice.php';
$blog = new blogservice();

$perpage = 10;

$dataall = $blog->querycustomerreviewall();
$total_record = count($dataall);
$total_page = ceil($total_record / $perpage);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 1;
}
$start = ($p - 1) * $perpage;
$data = $blog->querycustomerreview($start,$perpage);

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
                                <tr><td><a class="menu-left" href="index.php?page=blogreview">BLOG REVIEW</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=videoreview">VIDEO REVIEW</a></td></tr>
                                <tr><td><a class="menu-left" href="index.php?page=customerreivew" style="color: #FF5675;">CUSTOMER REVIEW</a></td></tr>
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
            <div class="row">
            <h3><b style="color: #FF5675;">HELLO REVIEW |</b> <b style="color: #B6B6B4;">CUSTOMER REVIEW</b></h3>
            <br>
            <?php
                for($i = 0; $i < count($data); $i++){
                    $id = $data[$i]["id"];
                    $name = $data[$i]["name"];
                    $content = substr(strip_tags($data[$i]["text"]), 0, 500);
                    $image = "/images/review/" . $data[$i]["image"];
            ?>
                    <?=(($i%2 == 0)?"<div class=\"row\">":"")?>
                    <div class="col-md-6" style="margin: 10px 0px 10px 0px;">
                        <div style="height: 300px; margin: 10px 0px 10px 0px; cursor:pointer" class="frame">
                            <center><img onclick="location.href='index.php?page=blogreviewread&name=<?=$name?>'" src="<?=$image?>" class="img"></center>
                        </div>
                    </div>
                    <?=(($i%2 != 0)?"</div>":"")?>
            <?php  }?>
            </div>
            <center><nav style="">
                <ul class="pagination">
                <li>
                    <a href="index.php?page=customerreview&p=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li>
                    <a href="index.php?page=customerreview&p=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <li>
                    <a href="index.php?page=customerreview&p=<?php echo $total_page;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                </ul>
            </nav></center>
        </div>
        </div>
        <br>
        <br>
    </div>
    </div>
    <div class="col-md-2"></div>
</div>

