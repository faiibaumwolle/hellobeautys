<?php
class customerservice {
    
    public function register($email,$pass,$cfpass,$name,$surname,$gender,$tel) {
        
        $email = trim($email);
        $pass = trim($pass);
        $cfpass = trim($cfpass);
        $name = trim($name);
        $surname = trim($surname);
        $gender = trim($gender);
        $tel = trim($tel);
        $error_message = "";
        if($email == ""){
            $error_message = "Missing e-mail address. Please correct and try again.";
        } else if($pass == ""){
            $error_message = "Please enter your password.";
        } else if($pass != $cfpass){
            $error_message = "Please check that your passwords match and try again.";
        } else if($name == ""){
            $error_message = "You must provide a name.";
        } else if($surname == ""){
            $error_message = "You must provide a lastname.";
        } else if($gender == ""){
            $error_message = "You must choose a gender.";
        } else if($tel == ""){
            $error_message = "You must provide a telephone.";
        }
        
        if($error_message == ""){
            require_once 'config/DB.php';
            $db = new DB();
            $sql = "INSERT INTO customer (email, password, name, surname, gender, tel, created_date, updated_date) VALUE('".$email."', '".md5($pass)."', '".$name."', '".$surname."', '".$gender."', '".$tel."', NOW(), NOW())";

            $last_id = $db->insert($sql);

            if($last_id != ""){
                $data["message"] = "success";
                $data["status"] = "0";
            } else {
                $data["message"] = "There was a problem. Please try again.";
                $data["status"] = "-1";
            }
        } else {
            $data["message"] = $error_message;
            $data["status"] = "-1";
        }
        return $data;
    }
    
    public function login($email, $password) {
        require_once 'config/DB.php';
        
        $db = new DB();
        $sql = "SELECT * FROM customer WHERE email = '". $email ."' AND password = '". md5($password) ."'";
            
        $data = $db->querySQL($sql);
        
        if(count($data) == 1){
            $data["message"] = "success";
            $data["status"] = "0";
        } else {
            $data["message"] = "Your email or password was incorrect. Please try again.";
            $data["status"] = "-1";
        }
            
        return $data;
    }
    
    public function update($POST){
        $error_message = "";
        
        if($POST["action"] == "account"){
            $error_message = $this->updateAccount($POST);
        } else if($POST["action"] == "profile"){
            $error_message = $this->updateProfile($POST);
        } else if($POST["action"] == "address"){
            $error_message = $this->updateAddress($POST);
        }
        
        if($error_message == ""){
            $data["message"] = "Update Profiles Success";
            $data["status"] = "0";
            $data["class"] = "alert-success";
        } else {
            $data["message"] = $error_message;
            $data["status"] = "-1";
            $data["class"] = "alert-danger";
        }
        return $data;
    }
    
    private function updateAccount($POST){
        
        require_once 'config/DB.php';
        $error_message = "";
        $db = new DB();
        $email = trim($POST["email"]);
        $pass = trim($POST["password"]);
        $cfpass = trim($POST["password2"]);
        if($email == ""){
            $error_message = "Missing e-mail address. Please correct and try again.";
        } else if($pass == ""){
            $error_message = "Please enter your password.";
        } else if($pass != $cfpass){
            $error_message = "Please check that your passwords match and try again.";
        } else {
            $sql = "UPDATE customer SET email = '".$email."' , password = '".  md5($pass)."', updated_date = NOW() WHERE id = '".$_SESSION["customer"]["id"]."'";
            $db->justQuery($sql);
            $_SESSION["customer"]["email"] = $email;
        }
        return $error_message;
    }
    
    private function updateProfile($POST){
        
        require_once 'config/DB.php';
        $error_message = "";
        $db = new DB();
        $name = trim($POST["name"]);
        $surname = trim($POST["surname"]);
        $gender = trim($POST["gender"]);
        $tel = trim($POST["tel"]);
        $error_message = "";
        
        if($name == ""){
            $error_message = "You must provide a name.";
        } else if($surname == ""){
            $error_message = "You must provide a lastname.";
        } else if($gender == ""){
            $error_message = "You must choose a gender.";
        } else if($tel == ""){
            $error_message = "You must provide a telephone.";
        } else {
            $sql = "UPDATE customer SET name = '".$name."' , surname = '".  $surname."' , gender = '".$gender."' , tel = '".$tel."', updated_date = NOW() WHERE id = '".$_SESSION["customer"]["id"]."'";
            $db->justQuery($sql);
            $_SESSION["customer"]["name"] = $name;
            $_SESSION["customer"]["surname"] = $surname;
            $_SESSION["customer"]["gender"] = $gender;
            $_SESSION["customer"]["tel"] = $tel;
        }
        return $error_message;
    }
    
    private function updateAddress($POST){
        
        require_once 'config/DB.php';
        $error_message = "";
        $db = new DB();
        $no = trim($POST["no"]);
        $subdistrict = trim($POST["subdistrict"]);
        $district = trim($POST["district"]);
        $province = trim($POST["province"]);
        $postcode = trim($POST["postcode"]);
        $road = trim($POST["road"]);
        $moo = trim($POST["moo"]);
        $soi = trim($POST["soi"]);
        $building = trim($POST["building"]);
        $error_message = "";
        
        if($no == ""){
            $error_message = "You must provide a house number.";
        } else if($subdistrict == ""){
            $error_message = "You must provide a sub district.";
        } else if($district == ""){
            $error_message = "You must choose a district.";
        } else if($province == ""){
            $error_message = "You must provide a province.";
        } else if($postcode == ""){
            $error_message = "You must provide a postcode.";
        } else {
            $sql = "UPDATE customer SET no = '".$no."' , "
                    . "subdistrict = '".  $subdistrict."' , "
                    . "district = '".$district."' , "
                    . "province = '".$province."' , "
                    . "postcode = '".$postcode."' , "
                    . "road = '".$road."' , "
                    . "moo = '".$moo."' , "
                    . "soi = '".$soi."' , "
                    . "building = '".$building."' ,"
                    . "updated_date = NOW() "
                    . "WHERE id = '".$_SESSION["customer"]["id"]."'";
            $db->justQuery($sql);
            $_SESSION["customer"]["no"] = $no;
            $_SESSION["customer"]["subdistrict"] = $subdistrict;
            $_SESSION["customer"]["district"] = $district;
            $_SESSION["customer"]["province"] = $province;
            $_SESSION["customer"]["postcode"] = $postcode;
            $_SESSION["customer"]["road"] = $road;
            $_SESSION["customer"]["moo"] = $moo;
            $_SESSION["customer"]["soi"] = $soi;
            $_SESSION["customer"]["building"] = $building;
        }
        return $error_message;
    }
    
    private function updatePassword($email,$pass){
        
        require_once 'config/DB.php';
        $error_message = "";
        $db = new DB();
        $email = trim($email);
        
        $sql = "UPDATE customer SET password = '".  md5($pass)."', updated_date = NOW() WHERE email = '".$email."'";
        $db->justQuery($sql);
    }
    
    public function checkFB($fb_id, $email, $name, $surname, $gender){
         require_once 'config/DB.php';
        
        $db = new DB();
        $sql = "SELECT * FROM customer WHERE fb_id = '". $fb_id ."'";
            
        $data = $db->querySQL($sql);
        
        if(count($data) == 1){
            $data[0]["message"] = "success";
            $data[0]["status"] = "0";
            $sql = "UPDATE customer SET email = '".$email."' , name = '".$name."' , surname = '".  $surname."' , gender = '".$gender."', updated_date = NOW() WHERE fb_id = '".$fb_id."'";
            $db->justQuery($sql);
        } else {
            $sql = "INSERT INTO customer (fb_id, email, name, surname, gender, created_date, updated_date) VALUE('".$fb_id."', '".$email."', '".$name."', '".$surname."', '".$gender."', NOW(), NOW())";
            $last_id = $db->insert($sql);
            $data[0]["message"] = "success";
            $data[0]["status"] = "0";
            $data[0]["id"] = $last_id;
            $data[0]["fb_id"] = $fb_id;
            $data[0]["name"] = $name;
            $data[0]["surname"] = $surname;
            $data[0]["gender"] = $gender;
            $data[0]["email"] = $email;
        }
            
        return $data;       
    }
    
    public function forgotpass($email){
        require_once 'config/DB.php';
        $db = new DB();
        $sql = "SELECT * FROM customer WHERE email = '". $email ."' ";
            
        $datacus = $db->querySQL($sql);
        
        if(empty($datacus)){
            $data["status"] = "-1";
            $data["errormessage"] = "ไม่พบ Email นี้ในระบบ";
            $data["class"] = "alert-danger";
            
            return $data;
        }
        
        require_once 'service/mailservice.php';
        date_default_timezone_set('Asia/Bangkok');

        require 'PHPMailer/PHPMailerAutoload.php';
        
        $passran = $this->randompass();
        $link = "index.php?page=login";
        
        $this->updatePassword($email, $passran);
      
        $body = "HELLOBEAUTYS Co.,ltd. <br/><br/>"
              . "รหัสผ่านใหม่ในการเข้าระบบของคุณคือ " .$passran. "<br/><br/>"
              . "คุณสามารถเข้าสู่ระบบได้โดยคลิกที่นี้ "
              . "<a href = 'http://www.hellobeautys.com/index.php?page=login'>HELLOBEAUTYS</a>";

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
        $mail->Subject  = 'แจ้งรหัสผ่านจาก HELLOBEAUTYS'; // กำหนด subject ครับ
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
            
        return $data;
    }
    
    private function randompass() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
