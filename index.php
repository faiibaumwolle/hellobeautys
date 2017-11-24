<?php session_start(); ?>
<?php
    if(!empty($_GET["logout"])){
        unset($_SESSION["customer"]);
    }
?>
<!doctype html>
<html>
<head>
    <?php
        if(empty($_GET['page'])){
                echo '<title>HELLOBEAUTYS All Beauty For You</title>';
               echo '<meta name="Description" content="Helloeyetape จัดให้!!
                        กับเทปไฟเบอร์ตาข่ายรูปแบบใหม่ที่จะมาช่วยเพิ่มชั้นตาให้กับสาวๆตาชั้นเดียว /สองชั้นหลบใน หรือจะเป็นสอวชั้น ไม่เท่ากัน ด้วยวัสดุที่ไม่เหมือนใครทำให้ติดแล้ว สวยสมใจ เนียนเป๊ะไม่โบ๊ะ เดินสวยๆธรรมชาติสร้าง ออกจากบ้านอย่างมั่นใจได้เลยจ้า">';
         } else if ($_GET['page'] == 'blogreviewread'){
            include 'service/blogservice.php';
            $name = $_GET['name'];
            $blog = new blogservice();
            $data = $blog->queryblogByname($name);
            echo '<title>HELLOBEAUTYS All Beauty For You - ' . $name . '</title>';
            echo '<meta name="Description" content="' . substr(strip_tags($data[0]["text"]), 0, 200) . '"';
        } else if ($_GET['page'] == 'customerreviewread'){
            include 'service/blogservice.php';
            $name = $_GET['name'];
            $blog = new blogservice();
            $data = $blog->querycustomerreviewByname($name);
            echo '<title>HELLOBEAUTYS All Beauty For You - ' . $name . '</title>';
            echo '<meta name="Description" content="' . substr(strip_tags($data[0]["text"]), 0, 200) . '"';
        } else {
                echo '<title>HELLOBEAUTYS All Beauty For You</title>';
                echo '<meta name="Description" content="Helloeyetape จัดให้!!
                        กับเทปไฟเบอร์ตาข่ายรูปแบบใหม่ที่จะมาช่วยเพิ่มชั้นตาให้กับสาวๆตาชั้นเดียว /สองชั้นหลบใน หรือจะเป็นสอวชั้น ไม่เท่ากัน ด้วยวัสดุที่ไม่เหมือนใครทำให้ติดแล้ว สวยสมใจ เนียนเป๊ะไม่โบ๊ะ เดินสวยๆธรรมชาติสร้าง ออกจากบ้านอย่างมั่นใจได้เลยจ้า">';           
         }
    ?>

    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/jquery.bxslider.min.css" />
   
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <meta name="Keywords" content="helloeyetape, เทปติดตา, เทปติดตาสองชั้น, เทปติดตาสองชั้นแบบตาข่าย">
    <meta name="google-site-verification" content="2buFka2rVnk0fXSOgE87NTmc1htwXQ8DLdluRoNPdMY" />
</head>

<body>
    <script src="js/jquery-1.12.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <?php include 'analyticstracking.php'; ?>
    <!--Header-->
    <div class="row">
        <div class="col-md-12">
            <?php include 'header.php'; ?>
        </div>
    </div>
    
     <div class="row">
    <div class="col-md-2"></div>
<nav class="navbar navbar-default" style="background: #FDD7E4;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php?page=home" class="top-menu">HOME</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle top-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT US<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=aboutus">HELLOBEAUTYS</a></li>
            <li><a href="index.php?page=contactus">CONTACT US</a></li>
            <li><a href="index.php?page=ourshop">OUR SHOP</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle top-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCT<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="index.php?page=product">PRODUCT</a></li>
            <li><a href="index.php?page=productnew">NEW ARRIVALS</a></li>
            <li><a href="index.php?page=producthot">WHAT'S HOT</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle top-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HELLO REVIEW<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=blogreview">BLOG REVIEW</a></li>
            <li><a href="index.php?page=videoreview">VIDEO REVIEW</a></li>
            <li><a href="index.php?page=customerreview">CUSTOMER REVIEW</a></li>
          </ul>
        </li>
        <li><a href="#" onclick="window.location.href ='index.php?page=hellobeautys'" class="top-menu">HELLO UPDATE</a></li>
        <?php if(count($_SESSION["customer"]) > 0) { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle top-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HELLO <?php echo $_SESSION["customer"]["name"]?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if($_SESSION["customer"]["admin"] == 1) { ?>
            <li><a href="/HellobeautysAdmin">ADMIN</a></li>
            <?php } ?>
            <li><a href="index.php?page=profile">YOUR ACCOUNT</a></li>
            <li><a href="index.php?page=cart">YOUR CART (<?=(count($_SESSION["product_data"]))?>)</a></li>
            <li><a href="index.php?page=orderlist">YOUR ORDER</a></li>
            <li><a href="<?=$_SESSION["customer"]["url"]?>">LOGOUT</a></li>
          </ul>
        </li>
        <?php } else {?>
        <li><a href="#" onclick="window.location.href ='index.php?page=login'" class="top-menu">LOGIN</a></li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
     </div>
    <!--Menu-->
<!--    <div class="row" style="background: #FDD7E4; height:50px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="col-md-2" onclick="window.location.href ='index.php?page=home'" style="color: #FFFFFF; text-align: center;">
                <h5><b>HOME</b></h5>
            </div>
            <div class="col-md-2" onclick="window.location.href ='index.php?page=ourshop'" style="color: #FFFFFF; text-align: center;">
                <h5><b>ABOUT US</b></h5>
            </div>
            <div class="col-md-2" onclick="window.location.href ='index.php?page=product'" style="color: #FFFFFF; text-align: center;">
                <h5><b>PRODUCT</b></h5>
            </div>
            <div class="col-md-2" onclick="window.location.href ='index.php?page=helloreview'" style="color: #FFFFFF; text-align: center;">
                <h5><b>HELLO REVIEW</b></h5>
            </div>
            <div class="col-md-2" onclick="window.location.href ='index.php?page=hellobeautys'" style="color: #FFFFFF; text-align: center;">
                <h5><b>HELLOBEAUTYS</b></h5>
            </div>
            <div class="col-md-2" onclick="window.location.href ='index.php?page=login'" style="color: #FFFFFF; text-align: center;">
                <h5><b>LOGIN</b></h5>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>-->
    <!--content-->
    <div class="row">
        <div class="col-md-12">
            <?php 
            if(!empty($_GET['page'])){
                include $_GET['page'] . '.php';
            }else{
                include 'home.php';
            }
            ?>
        </div>
    </div>
    <!--border-->
    <div class="row">
        <div class="col-md-12" style="background:#f9bcce; text-align:center;"></div>
    </div>
    <!--footer-->
    <div class="row">
        <div class="col-md-12">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WMLPTD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WMLPTD');</script>
<!-- End Google Tag Manager -->
</html>