<?php
class contractservice {
    public function contractus($name,$email,$tel,$subject,$msg){
        date_default_timezone_set('Asia/Bangkok');

        require 'PHPMailer/PHPMailerAutoload.php';

        $body = "จากคุณ " . $name . "<br/><br/>"
                . "Email : " . $email . "<br/><br/>"
                . "Tel : " . $tel . "<br/><br/>"
                . $msg;

        $mail = new PHPMailer(); // สร้าง object class ครับ
        $mail->CharSet = "utf-8";
        $mail->IsSMTP(); // กำหนดว่าเป็น SMTP นะ
        $mail->Host = 'ssl://smtp.gmail.com'; // กำหนดค่าเป็นที่ gmail ได้เลยครับ
        $mail->Port = 465; // กำหนด port เป็น 465 ตามที่ google บอกครับ
        $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
        $mail->Username = 'hibarikyoyaa@gmail.com'; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
        $mail->Password = 'wasannoom'; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
        $mail->From = $email; // ใครเป็นผู้ส่ง
        $mail->FromName = $name; // ชื่อผู้ส่งสักนิดครับ
        $mail->Subject  = $subject; // กำหนด subject ครับ
        $mail->Body     =  $body;
        $mail->AltBody =  "HELLOBEAUTYS";
        $mail->AddAddress("hellobeautys_official@hotmail.com"); // ส่งไปที่ใครดีครับ
        if($mail->Send()){
            $data["status"] = "0";
            $data["errormessage"] = "ส่งข้อความสำเร็จ";
            $data["class"] = "alert-success";
        } else {
            $data["status"] = "-1";
            $data["errormessage"] = "ไม่สามารถทำการส่ง Email ได้";
            $data["class"] = "alert-danger";
        }
        
        return $data;
    }
}
