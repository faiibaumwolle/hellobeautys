        <div role="tabpanel" class="tab-pane <?=(($active=="shipment")?"active":"")?>" id="shipment">
        <h4>รายละเอียดการจัดส่ง</h4>
        <form  action="<?=index_url()?>order/<?=$order->orderID?>" id="shipment_form" method="POST" class="" role="form">
        <table class="table table-bordered" style="font-size: 15px;">
            <tr>
                <td width="20%">Tracking Number</td>
                <td width="80%">
                <div class="form-group form-group-default required">
                        <label>Tracking Number</label>
                        <input type="text" name="track" value="<?=$order->track?>" class="form-control" required="">
                </div>
                </td>
            </tr>
            <tr>
                <td>สถานะการจ่ายเงิน</td>
                <td>
                        <div class="radio radio-success">
                          <input type="radio" value="Pending" name="shipment_status" id="ShipmentPending" <?=($order->shipment_status == "Pending")?"checked":""?>>
                          <label for="ShipmentPending">รอการจัดส่ง</label><br/>
                          <input type="radio" value="Success" name="shipment_status" id="ShipmentSuccess"<?=($order->shipment_status == "Success")?"checked":""?>>
                          <label for="ShipmentSuccess">การจัดส่งเสร็จสมบูรณ์</label>
                        </div>
                </td>
            </tr>
        </table>
        <button class="btn btn-success btn-cons" onclick="Shipmentsubmit()">
            <i class="fa fa-floppy-o" aria-hidden="true"></i> เปลี่ยนสถานะการจัดส่ง
        </button>
        </form>
        <script>
            function Shipmentsubmit(){
                $("#shipment_form").submit();
            }
            $("#order").addClass("bg-success");
        </script>
        </div>
</div>