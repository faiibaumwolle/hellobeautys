        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" <?=(($active=="orders")?"class='active'":"")?>>
               <a href="#orders" class="normal" aria-controls="orders" role="tab" data-toggle="tab"><h6><b>รายละเอียดออเดอร์</b></h6></a>
            </li>
            <li role="presentation" <?=(($active=="productlist")?"class='active'":"")?>>
               <a href="#productlist" class="normal" aria-controls="productlist" role="tab" data-toggle="tab"><h6><b>รายละเอียดสินค้า</b></h6></a>
            </li>
            <li role="presentation" <?=(($active=="payment")?"class='active'":"")?>>
               <a href="#payment" class="normal" aria-controls="payment" role="tab" data-toggle="tab"><h6><b>รายละเอียดการจ่ายเงิน</b></h6></a>
            </li>
            <li role="presentation" <?=(($active=="shipment")?"class='active'":"")?>>
               <a href="#shipment" class="normal" aria-controls="shipment" role="tab" data-toggle="tab"><h6><b>รายละเอียดการจัดส่ง</b></h6></a>
            </li>
        </ul>
<div class="tab-content">