<?php
class registerservice {
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
            $sql = "INSERT INTO customer (email, password, name, surname, gender, tel) VALUE('".$email."', '".md5($pass)."', '".$name."', '".$surname."', '".$gender."', '".$tel."')";

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
}
