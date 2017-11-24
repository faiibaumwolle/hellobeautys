    <div role="tabpanel" class="tab-pane <?=(($active=="productlist")?"active":"")?>" id="productlist">
        <h4>รายละเอียดสินค้า</h4>
        <table class="table table-striped">
            <thead>
              <tr>  
                <th>#</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคา/ชิ้น</th>
                <!--<th></th>-->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($order_list as $key => $value) {
                  $price_all += $value->order_quantity * $value->price;
              ?>
              <tr>
                <td><?=($key + 1)?></td>
                <td><img src="<?=frontend_url().$value->picture?>" width="60px;"/><?=$value->name?></td>
                <td><span style="margin-left: 10px;"><?=$value->order_quantity?></span></td>
                <td><span style="margin-left: 10px;"><?=$value->price?></span></td>
              </tr>
              <?php } ?>
              <tr style="font-size: 15px; font-weight: bold;">
                <td colspan="2"></td>
                <td style="font-size: 13px;">ราคาสินค้าทั้งหมด</td>
                <td><span style="margin-left: 10px;" id="price_all"><?=($price_all + $order->shipment_price)?></span></td>
              </tr>
            </tbody>
        </table>
    </div>