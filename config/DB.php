<?php

class DB {
//    private $username = "root";
//    private $password = "";
//    private $database = "hellobeauty";
//    private $host = "localhost";
//    private $port = "3306";
    
//    private $username = "u234185511_hello";
//    private $password = "faii7103";
//    private $database = "u234185511_hello";
//    private $host = "mysql.hostinger.in.th";
//    private $port = "3306";
    
    private $username = "root";
    private $password = "szxcajcAX0";
    private $database = "hellobeauty";
    private $host = "127.0.0.1";
    private $port = "3306";

    public function connectDB(){
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        $mysqli->query("SET NAMES UTF8");
        return $mysqli;
    }
    
    public function connectmySQL(){
        mysql_connect($this->host,$this->username,$this->password);
	mysql_select_db($this->database);
    }

//     $param = array( array("type" => t, "value" => v))
    public function query($sql, $param = array()){
        $mysqli = $this->connectDB();
        $arr_value = array();
        if ($stmt = $mysqli->prepare($sql)) {

            if(count($param) > 0){
                $type = "";
                $value = array();
                foreach ($param as $where) {
                    $type .= $where["type"];
                    array_push($value, $where["value"]);
                }

                call_user_func_array('mysqli_stmt_bind_param', array_merge (array($stmt, $type), $this->refValues($value)));
            }
            $stmt->execute();
            $result = $stmt->get_result();
            
            while($objResult = $result->fetch_assoc()){
                array_push($arr_value, $objResult);
            }            

            $stmt->close();
            $mysqli->close();
            return $arr_value;
        }
    }
    
    public function querySQL($sql){
        $mysqli = $this->connectDB();
        $arr_value = array();
        
        $objQuery =  $mysqli->query($sql);
        while($objResult = $objQuery->fetch_assoc()){
            array_push($arr_value, $objResult);
        }
        
        return $arr_value;
    }
    
    public function justQuery($sql){
        $mysqli = $this->connectDB();
        $mysqli->query($sql);
    }

    public function insert($sql){
        $mysqli = $this->connectDB();
        
        $mysqli->query($sql);
        
        return $mysqli->insert_id;
    }

    public function refValues($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0)
        {
            $refs = array();
            foreach($arr as $key => $value){
                $refs[$key] = &$arr[$key];
            }
            return $refs;
        }
        return $arr;
    }
}

?>