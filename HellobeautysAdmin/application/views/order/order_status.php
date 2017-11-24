        <div role="tabpanel" class="tab-pane <?=(($active=="orders")?"active":"")?>" id="orders">
        <h4>รายละเอียดออเดอร์</h4>
        <table class="table table-bordered" style="font-size: 15px;">
            <tr>
              <td width="20%">ชื่อสกุลผู้รับ</td>
              <td width="80%"><?=($order->name. " ". $order->surname)?></td>
            </tr>
            <tr>
                <td>ที่อยู่ผู้รับ</td>
                <td><?=($order->no. " " .
                        $order->building. " " .
                        $order->moo. " " .
                        $order->soi. " " .
                        $order->road. " " .
                        $order->subdistrict. " " .
                        $order->district. " " .
                        $order->province. " " .
                        $order->postcode. " "
                        )?>
                </td>
            </tr>
            <tr>
                <td>เบอร์โทรศัพท์ผู้รับ</td>
                <td><?=($order->tel)?></td>
            </tr>
            <tr>
                <td>อีเมลผู้ซื้อ</td>
                <td><?=($order->email)?></td>
            </tr>
            <tr>
                <td>วันที่สร้างออเดอร์</td>
                <td><?=$order->dateCreate?></td>
            </tr>
            <tr>
                <td>วิธีการจัดส่ง</td>
                <td><?=$order->shipment_name?> (<?=$order->shipment_price?> บาท)</td>
            </tr>
            <tr>
                <td>สถานะการจ่ายเงิน</td>
                <td><?=$order->payment_status_display?> 
                </td>
            </tr>
            <tr>
                <td>สถานะการจัดส่ง</td>
                <td><?=$order->shipment_status_display?></td>
            </tr>
        </table>
        </div>