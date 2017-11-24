<?php
class mailservice {
    public function sendmail($name,$mail,$tel,$subject,$message) {
        $response = "";
        $to = "baumwolle.faii@hotmail.com";
        $flgSend = mail($to,"","","From:baumwolle.faii@hotmail.com");
	if($flgSend){
            $response = "Mail sending.";
	}else{
            $response = "Mail cannot send.";
	}
        return $response;
    }
}
