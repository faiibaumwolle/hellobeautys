<?php

class orderservice {

    
    function savePrice($POST){
        header("Content-Type:application/json");
        session_start();
        $price_all = $POST["price_all"];
        $deliver = $POST["deliver"];
        $_SESSION["order_data"] = array();
        $_SESSION["order_data"]["price_all"] = $price_all;
        $_SESSION["order_data"]["deliver"] = $deliver;
        
        $response["status"] = 0;
        $response["msg"] = "Success";
        
        echo json_encode($response);
    }
    
        
    public function saveAddress($POST){
        header("Content-Type:application/json");
        session_start();
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "UPDATE customer SET "
                . "no = '".$POST["no"]."',"
                . "building = '".$POST["building"]."',"
                . "moo = '".$POST["moo"]."',"
                . "soi = '".$POST["soi"]."',"
                . "road = '".$POST["road"]."',"
                . "subdistrict = '".$POST["subdistrict"]."',"
                . "district = '".$POST["subdistrict"]."',"
                . "province = '".$POST["province"]."',"
                . "tel = '".$POST["tel"]."',"
                . "postcode = '".$POST["postcode"]."' "
                . "WHERE id = '".$_SESSION["customer"]["id"]."'";
                
        $_SESSION["customer"]["no"] = $POST["no"];
        $_SESSION["customer"]["building"] = $POST["building"];
        $_SESSION["customer"]["moo"] = $POST["moo"];
        $_SESSION["customer"]["soi"] = $POST["soi"];
        $_SESSION["customer"]["road"] = $POST["road"];
        $_SESSION["customer"]["subdistrict"] = $POST["subdistrict"];
        $_SESSION["customer"]["district"] = $POST["district"];
        $_SESSION["customer"]["province"] = $POST["province"];
        $_SESSION["customer"]["postcode"] = $POST["postcode"];
        $_SESSION["customer"]["tel"] = $POST["tel"];

        $db->justQuery($sql);
        $response["status"] = 0;
        $response["msg"] = $sql;
        echo json_encode($response);
    }
    
    function getBank(){
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM bank";
        
        return $db->querySQL($sql);
    }
    
    function updatePayment($POST){
        
    $root = __DIR__;
    $root = explode("/", $root);
    $root_dir = "";
    for($i = 0; $i < (count($root) - 1); $i++){
        $root_dir .= $root[$i] . "/";
    }
    $root_dir .= "images/payment/";
        
        $image = "";
        $upload = move_uploaded_file($POST["files"]["image"]["tmp_name"], $root_dir.$POST["order_ref"]."-".$POST["files"]["image"]["name"]);

        if($upload){
            $image = $POST["order_ref"]."-".$POST["files"]["image"]["name"];
        }

        require_once 'config/DB.php';
        $db = new DB();
        
        $date = date("Y-m-d", strtotime($POST["payment_date"]));
            
        $sql = "UPDATE payment SET "
                . "status = 'Progress', "
                . "bank_id = '".$POST["bank_id"]."', "
                . "payment_date = '".$date."', "
                . "hour = '".$POST["hour"]."', "
                . "minute = '".$POST["minute"]."', "
                . "balance = '".$POST["balance"]."', "
                . "image = '".$image."', "
                . "detail = '".$POST["detail"]."', "
                . "update_date = NOW()"
                . " WHERE order_id = (SELECT id FROM orders WHERE reference = '".$POST["order_ref"]."' LIMIT 1)";
        $db->justQuery($sql);
        
        $this->sendEmailPayment($POST["order_ref"]);
    }
    
    public function updateAddress($POST){
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "UPDATE shipment SET "
                . "no = '".$POST["no"]."',"
                . "building = '".$POST["building"]."',"
                . "moo = '".$POST["moo"]."',"
                . "soi = '".$POST["soi"]."',"
                . "road = '".$POST["road"]."',"
                . "subdistrict = '".$POST["subdistrict"]."',"
                . "district = '".$POST["subdistrict"]."',"
                . "province = '".$POST["province"]."',"
                . "postcode = '".$POST["postcode"]."', "
                . "update_date = NOW() "
                . " WHERE order_id = (SELECT id FROM orders WHERE reference = '".$POST["order_ref"]."' LIMIT 1)";

        $db->justQuery($sql);
    }
    
    function saveOrder($POST){
        header("Content-Type:application/json");
        session_start();
        if(count($_SESSION["customer"]) > 0){
            require_once 'config/DB.php';
            $db = new DB();

            $reference = "HB" . date("dmYHis");

            $sql_order = "INSERT INTO orders (customer_id, reference, originalprice, totalprice, status, created_date, update_date, notify) "
                    . "VALUES ('".$_SESSION["customer"]["id"]."', '".$reference."', "
                    . "'".($_SESSION["order_data"]["price_all"])."', "
                    . "'".($_SESSION["order_data"]["price_all"] + $_SESSION["order_data"]["deliver"])."', "
                    . "'Pending', NOW(), NOW(), '1')";

            $order_id = $db->insert($sql_order);

            for($i = 0; $i < count($_SESSION["product_data"]); $i++){ 
            $sql_order_list = "INSERT INTO lineproduct (product_id, order_id, quantity, price) "
                    . "VALUES ('".$_SESSION["product_data"][$i]["id"]."', "
                    . "'".$order_id."', "
                    . "'".$_SESSION["product_data"][$i]["quantity"]."', "
                    . "'".$_SESSION["product_data"][$i]["price"]."') ";

            $lineproduct_id = $db->insert($sql_order_list);
            }

            $sql_payment = "INSERT INTO payment (order_id, status, update_date) VALUES ('".$order_id."', 'Pending', NOW())";
            $payment_id = $db->insert($sql_payment);

            if($_SESSION["order_data"]["deliver"] == "30") $shipment_type_id = "1";
            else $shipment_type_id = "2";

            $sql_shipment = "INSERT INTO shipment (order_id, status, shipment_type_id, update_date, no, building, moo, soi, road,"
                    . "subdistrict, district, province, postcode) VALUES ("
                    . "'".$order_id."', "
                    . "'Pending', "
                    . "'".$shipment_type_id."', "
                    . "NOW(), "
                    . "'".$_SESSION["customer"]["no"]."', "
                    . "'".$_SESSION["customer"]["building"]."', "
                    . "'".$_SESSION["customer"]["moo"]."', "
                    . "'".$_SESSION["customer"]["soi"]."', "
                    . "'".$_SESSION["customer"]["road"]."', "
                    . "'".$_SESSION["customer"]["subdistrict"]."', "
                    . "'".$_SESSION["customer"]["district"]."', "
                    . "'".$_SESSION["customer"]["province"]."', "
                    . "'".$_SESSION["customer"]["postcode"]."')";
            $shipment_id = $db->insert($sql_shipment);

            $this->sendEmail($reference, $order_id);

            $response["status"] = 0;
            $response["errormessage"] = "success";
            $response["ref"] = $reference;
            $response["price"] = $_SESSION["order_data"]["price_all"] + $_SESSION["order_data"]["deliver"];

            unset($_SESSION["order_data"]);
            unset($_SESSION["product_data"]);
        } else {
            $response["status"] = -1;
            $response["errormessage"] = "กรุณา Login เข้ามาใหม่";
        }
        
        echo json_encode($response);
    }
    
    function sendEmail($order_ref, $order_id){
        require_once 'service/mailservice.php';
        date_default_timezone_set('Asia/Bangkok');

        require 'PHPMailer/PHPMailerAutoload.php';
        
        $email = "hellobeautys_official@hotmail.com";
        // $email = "hibarikyoyaa@hotmail.com";
        
        $body =  '<a href="http://www.hellobeautys.com/HellobeautysAdmin/index.php/order/'.$order_id.'">ดูรายละเอียดออเดอร์</a><br/><br/>';
        $body .= '<table  cellspacing="0" cellpadding="5" width="100%" border="0">';
        $body .=  '<thead>';
        $body .=  '<tr style="color:white;background-color:#ff80b3">';
        $body .=  '<th width="10%">#</th>';
        $body .=  '<th width="50%">ชื่อสินค้า</th>';
        $body .=  '<th width="20%">จำนวน</th>';
        $body .=  '<th width="20%">ราคา/ชิ้น</th>';
        $body .=  '</tr>';
        $body .=  '</thead>';
        $body .=  '<tbody>';
        for($i = 0; $i < count($_SESSION["product_data"]); $i++){
            $price_all += $_SESSION["product_data"][$i]["quantity"] * $_SESSION["product_data"][$i]["price"];
         
              $body .=  '<tr style="background-color:#f2f2f2; text-align:center;">';
              $body .=  '<td>'.($i + 1).'</td>';
              $body .=  '<td><img src="http://www.hellobeautys.com/'.$_SESSION["product_data"][$i]["picture"].'" width="60px;"/>'.$_SESSION["product_data"][$i]["name"].'</td>';
              $body .=  '<td><span style="margin-left: 10px;">'.$_SESSION["product_data"][$i]["quantity"].'</span></td>';
              $body .=  '<td><span style="margin-left: 10px;">'.$_SESSION["product_data"][$i]["price"].'</span></td>';
              $body .=  '</tr>';
        } 
              $body .=  '<tr>';
              $body .=  '<td colspan="2"></td>';
              $body .=  '<td style="background-color:#f2f2f2; text-align:center; font-size: 13px;">ราคาสินค้าทั้งหมด</td>';
              $body .=  '<td style="background-color:#f2f2f2; text-align:center; font-size: 13px;"><span style="margin-left: 10px;">'.$price_all.'</span></td>';
              $body .=  '</tr>';
              $body .=  '</tbody>';
              $body .=  '</table><br/><br/><br/>';

        $mail = new PHPMailer(); // สร้าง object class ครับ
        $mail->CharSet = "utf-8";
        $mail->IsSMTP(); // กำหนดว่าเป็น SMTP นะ
        $mail->Host = 'ssl://smtp.gmail.com'; // กำหนดค่าเป็นที่ gmail ได้เลยครับ
        $mail->Port = 465; // กำหนด port เป็น 465 ตามที่ google บอกครับ
        $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
        $mail->Username = 'hellobeautys.official@gmail.com'; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
        $mail->Password = 'smile07041992'; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
        $mail->From = 'hellobeautys_official@hotmail.com'; // ใครเป็นผู้ส่ง
        $mail->FromName = 'HELLOBEAUTYS Co.,ltd.'; // ชื่อผู้ส่งสักนิดครับ
        $mail->Subject  = 'Order #'. $order_ref .' Item Summary'; // กำหนด subject ครับ
        $mail->Body     =  $body;
        $mail->IsHTML(true);
        $mail->AltBody =  "HELLOBEAUTYS";
        $mail->AddAddress($email); // ส่งไปที่ใครดีครับ
        if($mail->Send()){
            $data["status"] = "0";
            $data["errormessage"] = "ส่งข้อความสำเร็จ";
            $data["class"] = "alert-success";
        } else {
            $data["status"] = "-1";
            $data["errormessage"] = "ไม่สามารถทำการส่ง Email ได้";
            $data["class"] = "alert-danger";
        }
    }
    
    function sendEmailPayment($order_ref){
        require_once 'service/mailservice.php';
        date_default_timezone_set('Asia/Bangkok');

        require 'PHPMailer/PHPMailerAutoload.php';
        
        $email = "hellobeautys_official@hotmail.com";
        
        $orders = $this->getOrderList($order_ref);
        
        $body =  '<a href="http://www.hellobeautys.com/HellobeautysAdmin/index.php/order/'.$orders[0]["id"].'">ดูรายละเอียดออเดอร์</a><br/><br/>';
        $body .= '<table  cellspacing="0" cellpadding="5" width="100%" border="0">';
        $body .=  '<thead>';
        $body .=  '<tr style="color:white;background-color:#ff80b3">';
        $body .=  '<th width="10%">#</th>';
        $body .=  '<th width="50%">ชื่อสินค้า</th>';
        $body .=  '<th width="20%">จำนวน</th>';
        $body .=  '<th width="20%">ราคา/ชิ้น</th>';
        $body .=  '</tr>';
        $body .=  '</thead>';
        $body .=  '<tbody>';
        for($i = 0; $i < count($orders); $i++){
         
              $body .=  '<tr style="background-color:#f2f2f2; text-align:center;">';
              $body .=  '<td>'.($i + 1).'</td>';
              $body .=  '<td><img src="http://www.hellobeautys.com/'.$orders[$i]["picture"].'" width="60px;"/>'.$orders[$i]["name"].'</td>';
              $body .=  '<td><span style="margin-left: 10px;">'.$orders[$i]["quantity"].'</span></td>';
              $body .=  '<td><span style="margin-left: 10px;">'.$orders[$i]["price"].'</span></td>';
              $body .=  '</tr>';
        } 
              $body .=  '<tr>';
              $body .=  '<td colspan="2"></td>';
              $body .=  '<td style="background-color:#f2f2f2; text-align:center; font-size: 13px;">ราคาสินค้าทั้งหมด</td>';
              $body .=  '<td style="background-color:#f2f2f2; text-align:center; font-size: 13px;"><span style="margin-left: 10px;">'.$orders[0]["totalprice"].'</span></td>';
              $body .=  '</tr>';
              $body .=  '</tbody>';
              $body .=  '</table><br/><br/><br/>';

        $mail = new PHPMailer(); // สร้าง object class ครับ
        $mail->CharSet = "utf-8";
        $mail->IsSMTP(); // กำหนดว่าเป็น SMTP นะ
        $mail->Host = 'ssl://smtp.gmail.com'; // กำหนดค่าเป็นที่ gmail ได้เลยครับ
        $mail->Port = 465; // กำหนด port เป็น 465 ตามที่ google บอกครับ
        $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
        $mail->Username = 'hellobeautys.official@gmail.com'; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
        $mail->Password = 'smile07041992'; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
        $mail->From = 'hellobeautys_official@hotmail.com'; // ใครเป็นผู้ส่ง
        $mail->FromName = 'HELLOBEAUTYS Co.,ltd.'; // ชื่อผู้ส่งสักนิดครับ
        $mail->Subject  = 'Order #'. $order_ref .' แจ้งการชำระเงินเข้ามา'; // กำหนด subject ครับ
        $mail->Body     =  $body;
        $mail->IsHTML(true);
        $mail->AltBody =  "HELLOBEAUTYS";
        $mail->AddAddress($email); // ส่งไปที่ใครดีครับ
        if($mail->Send()){
            $data["status"] = "0";
            $data["errormessage"] = "ส่งข้อความสำเร็จ";
            $data["class"] = "alert-success";
        } else {
            $data["status"] = "-1";
            $data["errormessage"] = "ไม่สามารถทำการส่ง Email ได้";
            $data["class"] = "alert-danger";
        }
    }
    
    function getOrderList($order_ref){
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT lineproduct.*, product.name, product.picture, orders.totalprice FROM lineproduct "
                . "LEFT JOIN product ON product.id = lineproduct.product_id "
                . "LEFT JOIN orders ON orders.id = lineproduct.order_id "
                . "WHERE orders.reference = '".$order_ref."'";

        return $db->querySQL($sql);

    }
    
    function queryOrderList(){
        session_start();
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT od.reference, pm.status AS payment_status, sm.status AS shipment_status FROM orders od "
                . "LEFT JOIN payment pm ON pm.order_id = od.id "
                . "LEFT JOIN shipment sm ON sm.order_id = od.id "
                . "WHERE od.customer_id = '".$_SESSION["customer"]["id"]."'";

        $data = $db->querySQL($sql);
        
        for($i = 0; $i < count($data); $i++){
            $data[$i]["payment_status"] = $this->translatePaymentStatus($data[$i]["payment_status"]);
            $data[$i]["shipment_status"] = $this->translateShipmentStatus($data[$i]["shipment_status"]);
        }
            
        return $data;
    }
    
    function queryOrder($order_ref){
        session_start();
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT cm.name, cm.surname,cm.email, cm.tel, od.*, pm.*, sm.*, pm.status AS payment_status, sm.status AS shipment_status FROM orders od "
                . "LEFT JOIN payment pm ON pm.order_id = od.id "
                . "LEFT JOIN shipment sm ON sm.order_id = od.id "
                . "INNER JOIN customer cm ON cm.id = od.customer_id "
                . "WHERE od.customer_id = '".$_SESSION["customer"]["id"]."' "
                . "AND od.reference = '".$order_ref."'";

        $data = $db->querySQL($sql);
        
        $data["order"] = $data[0];
        $data["order"]["actual_payment_status"] = $data["order"]["payment_status"];
        $data["order"]["actual_shipment_status"] = $data["order"]["payment_status"];
        $data["order"]["payment_status"] = $this->translatePaymentStatus($data["order"]["payment_status"]);
        $data["order"]["shipment_status"] = $this->translateShipmentStatus($data["order"]["shipment_status"]);
            
        $sql = "SELECT name, price FROM shipment_type WHERE id = '".$data["order"]["shipment_type_id"]."'";
        $shipment_data = $db->querySQL($sql);
        
        $data["order"]["shipment_name"] = $shipment_data[0]["name"];
        $data["order"]["shipment_price"] = $shipment_data[0]["price"];
        
        $sql = "SELECT odl.*, pd.*, odl.quantity AS order_quantity FROM lineproduct odl "
                . "LEFT JOIN orders od ON od.id = odl.order_id "
                . "LEFT JOIN product pd ON pd.id = odl.product_id "
                . "WHERE od.reference = '".$order_ref."'";
        
        $data["order_list"] = $db->querySQL($sql);

        return $data;
    }
    
    private function translatePaymentStatus($status){
        if($status == "Pending"){
            return "<span style='color:blue;'>รอการชำระเงิน</span>";
        } else if($status == "Progress"){
            return "<span style='color:blue;'>รอการตรวจสอบการชำระเงิน</span>";
        } else if($status == "Success"){
            return "<span style='color:green;'>การชำระเงินเสร็จสมบูรณ์</span>";
        }
    }
    
    private function translateShipmentStatus($status){
        if($status == "Pending"){
            return "<span style='color:blue;'>รอการจัดส่ง</span>";
        } else if($status == "Success"){
            return "<span style='color:green;'>การส่งเสร็จสมบูรณ์</span>";
        }
    }
    
}
