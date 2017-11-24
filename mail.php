 <?php
 
      date_default_timezone_set('Asia/Bangkok');

      require 'PHPMailer/PHPMailerAutoload.php';

      $mail = new PHPMailer(); // สร้าง object class ครับ
      $mail->IsSMTP(); // กำหนดว่าเป็น SMTP นะ
      $mail->SMTPDebug = 2;
      $mail->Host = 'ssl://smtp.gmail.com'; // กำหนดค่าเป็นที่ gmail ได้เลยครับ
      $mail->Port = 465; // กำหนด port เป็น 465 ตามที่ google บอกครับ
      $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
      $mail->Username = 'hibarikyoyaa@gmail.com'; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
      $mail->Password = 'wasannoom'; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
      $mail->From = "hibarikyoyaa@gmail.com"; // ใครเป็นผู้ส่ง
      $mail->FromName = $_POST["name"]; // ชื่อผู้ส่งสักนิดครับ
      $mail->Subject  = $_POST["subject"]; // กำหนด subject ครับ
      $mail->Body     =  $_POST["email"] . " " . $_POST["tel"] . " " . $_POST["msg"]; // ใส่ข้อความเข้าไปครับ
      $mail->AltBody =  "test";
      $mail->AddAddress("hibarikyoyaa@gmail.com"); // ส่งไปที่ใครดีครับ
      $mail->Send();   