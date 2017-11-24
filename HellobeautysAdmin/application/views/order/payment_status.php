    <div role="tabpanel" class="tab-pane <?=(($active=="payment")?"active":"")?>" id="payment">
        <h4>รายละเอียดการจ่ายเงิน</h4>
        <table class="table table-bordered" style="font-size: 15px;">
            <tr>
              <td width="20%">วันที่ชำระเงิน</td>
              <td width="80%"><?=$order->payment_date?></td>
            </tr>
            <tr>
                <td>เวลาโดยประมาณ</td>
                <td><?=($order->hour . ":" . $order->minute)?></td>
            </tr>
            <tr>
                <td>จำนวนเงิน</td>
                <td><?=($order->balance)?> บาท</td>
            </tr>
            <?php if(!empty($order->bank)) { ?>
            <tr>
                <td>ธนาคาร</td>
                <td><img width="25" height="24 "src="<?=frontend_url()."images/bank/".$order->bank->image?>"/> <?=($order->bank->name)." (".$order->bank->account_no.")"?></td>
            </tr>
            <?php } ?>
            <tr>
                <td>หลักฐานการโอน</td>
                <td><img style="cursor: pointer;" onclick="window.open('<?=frontend_url()."images/payment/".$order->image?>')" src="<?=frontend_url()."images/payment/".$order->image?>" width="100"/></td>
            </tr>
             <tr>
                <td>รายละเอียดเพิ่มเติม</td>
                <td><?=$order->detail?></td>
            </tr>
            <tr>
                <td>สถานะการจ่ายเงิน</td>
                <td>
                    <form  action="<?=index_url()?>order/<?=$order->orderID?>" id="payment_form" method="POST" class="" role="form">
                        <div class="radio radio-success">
                          <input type="radio" value="Pending" name="payment_status" id="PaymentPending" <?=($order->payment_status == "Pending")?"checked":""?>>
                          <label for="PaymentPending">รอการชำระเงิน</label><br/>
                          <input type="radio" value="Progress" name="payment_status" id="PaymentProgress"<?=($order->payment_status == "Progress")?"checked":""?>>
                          <label for="PaymentProgress">รอการตรวจสอบชำระเงิน</label><br/>
                          <input type="radio" value="Success" name="payment_status" id="PaymentSuccess"<?=($order->payment_status == "Success")?"checked":""?>>
                          <label for="PaymentSuccess">การชำระเงินเสร็จสมบูรณ์</label>
                        </div>
                        <button class="btn btn-success btn-cons" onclick="Paymentsubmit()">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> เปลี่ยนสถานะการชำระเงิน
                        </button>
                    </form>
                </td>
            </tr>
        </table>
        <script>
            function Paymentsubmit(){
                $("#payment_form").submit();
            }
        </script>
    </div>