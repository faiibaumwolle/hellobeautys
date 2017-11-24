<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit - Blank Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?=asset_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=asset_url();?>css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?=asset_url();?>css/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?=asset_url();?>css/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?=asset_url();?>css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?=asset_url();?>css/summernote.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?=asset_url();?>css/fileinput.min.css" rel="stylesheet" type="text/css" media="screen">
    <link class="main-stylesheet" href="<?=asset_url();?>css/pages.css" rel="stylesheet" type="text/css" />
    <script src="<?=asset_url();?>js/jquery-1.11.1.min.js" type="text/javascript"></script>
  </head>
  <body class="fixed-header ">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        Hello Beauty
        <div class="sidebar-header-controls">
          
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="<?=index_url()?>order" class="detailed">
              <span class="title">Order</span>
              <span class="details"><?=$order_not_success?> new Orders Pending</span>
            </a>
            <span id="order" class="icon-thumbnail"><i class="fa fa-shopping-basket"></i></span>
          </li>
          <li class="">
            <a href="<?=index_url()?>product" class="detailed">
              <span class="title">Product</span>
            </a>
              <span id="product" class="icon-thumbnail"><i class="fa fa-shopping-bag"></i></span>
          </li>
          <li class="">
            <a href="<?=index_url()?>category" class="detailed">
              <span class="title">Category</span>
            </a>
              <span id="category" class="icon-thumbnail"><i class="fa fa-copyright"></i></span>
          </li>
          <li class="">
            <a href="<?=index_url()?>dealer" class="detailed">
              <span class="title">Dealer</span>
            </a>
              <span id="dealer" class="icon-thumbnail"><i class="fa fa-user"></i></span>
          </li>
          <li class="">
            <a href="<?=index_url()?>blog" class="detailed">
              <span class="title">Blog</span>
            </a>
              <span id="blog" class="icon-thumbnail"><i class="fa fa-file-text"></i></span>
          </li>
          <li class="">
            <a href="<?=index_url()?>video" class="detailed">
              <span class="title">Video</span>
            </a>
              <span id="video" class="icon-thumbnail"><i class="fa fa-video-camera"></i></span>
          </li>
          <li class="">
            <a href="<?=index_url()?>review" class="detailed">
              <span class="title">Review</span>
            </a>
              <span id="review" class="icon-thumbnail"><i class="fa fa-thumbs-up"></i></span>
          </li>
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- LEFT SIDE -->
          <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
                <div class="brand inline" onclick="window.location='<?=frontend_url()?>'">
               Hello Beauty
              </div>
            </div>
          </div>  
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline" style="cursor:pointer;" onclick="window.location='<?=frontend_url()?>'">
              Hello Beautys
            </div>
            <!-- START NOTIFICATION LIST -->
            <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
              <li class="p-r-15 inline">
                <div class="dropdown">
                  <a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
                    <?php if(count($order_not_notify) > 0) { ?>
                    <span class="bubble"></span>
                    <?php } ?>
                  </a>
                  <!-- START Notification Dropdown -->
                  <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                    <!-- START Notification -->
                    <div class="notification-panel">
                      <!-- START Notification Body-->
                      <div class="notification-body scrollable">
                        
                        <!-- START Notification Item-->
                        <?php foreach ($order_not_notify as $key => $value): ?>
                        <div id="order_notify_<?=$value->order_id?>" class="notification-item unread clearfix">
                          <div class="heading">
                            <a href="<?=index_url()?>order/<?=$value->order_id?>" class=" pull-left">
                              <i class="fa fa-shopping-bag m-r-10"></i>
                              <span class="bold"><?=$value->reference?></span>
                              <span class="fs-12 m-l-10"><?=$value->name?></span>
                            </a>
                            <span class="pull-right time"><?=$value->createDate?></span>
                          </div>
                          <!-- START Notification Item Right Side-->
                          <div class="option" onclick="notify('<?=$value->order_id?>')">
                              <a href="#" class="mark"></a>
                          </div>
                          <!-- END Notification Item Right Side-->
                        </div>
                        <?php endforeach; ?>
                        <!-- END Notification Item-->
                      </div>
                      <!-- END Notification Body-->
                      <!-- START Notification Footer-->
                      <?php if(count($order_not_notify) == 0) { ?>
                      <div class="notification-footer text-center">
                        <a href="#" class="">There is no Order</a>
                        <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                          <i class="pg-refresh_new"></i>
                        </a>
                      </div>
                      <?php } ?>
                      <!-- START Notification Footer-->
                    </div>
                    <!-- END Notification -->
                  </div>
                  <!-- END Notification Dropdown -->
                </div>
              </li>
              <li class="p-r-15 inline">
                <a href="#" class="icon-set clip "></a>
              </li>
            </ul>
            <!-- END NOTIFICATIONS LIST -->
            </div>
        </div>
        
       
      </div>
      <!-- END HEADER -->
      
<!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <p>Pages</p>
                  </li>
                  <li><a href="#" class="active">Home</a>
                  </li>
                </ul>
                <!-- END BREADCRUMB -->
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
          <?php if(!empty($notify)) {?>
          <div class="alert <?=$notify["class"]?>" role="alert">
             <button class="close" data-dismiss="alert"></button>
             <strong><?=$notify["action"]?>: </strong><?=$notify["message"]?>
          </div>
          <?php } ?>