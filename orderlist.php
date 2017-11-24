<?php
include 'service/orderservice.php';
$order = new orderservice();
$data = $order->queryOrderList();
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
        <h3><b style="color: #FF5675;">รายการสั่งซื้อทั้งหมด</b></h3> 
        <table class="table table-striped table-hover">
         <thead style="font-weight: bold; font-size: 12px;">
           <tr>
             <th>Order#</th>
             <th>Payment Status</th>
             <th>Shipment Status</th>
           </tr>
         </thead>
         <tbody>
           <?php for($i = 0; $i < count($data); $i++){ ?>
           <tr style="cursor: pointer;" onclick="openOrder('<?=$data[$i]["reference"]?>')">
             <td><?=$data[$i]["reference"]?></td>
             <td><?=$data[$i]["payment_status"]?></td>
             <td><?=$data[$i]["shipment_status"]?></td>
           </tr>
           <?php } ?>
         </tbody>
       </table>
       
    </div>
</div>
<script>
    function openOrder(ref){
        window.location='index.php?page=order&ref=' + ref;
    }
</script>