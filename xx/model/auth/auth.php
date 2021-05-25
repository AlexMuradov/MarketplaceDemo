<?php

Namespace Xx\Model\Auth;

Class Auth { 

    public function GenerateHash($salt) {
        $key = rand();
        $time = time();
        $hash = sha1($salt . $time . $key);
        return $hash;
    }

    public function Login($login, $password) {
        global $mysqli;

        $crypt = sha1($password);
        $reply = array();
        $result = 0;

        if(!filter_var($login, FILTER_VALIDATE_EMAIL)) { 
            array_push($reply, "LoginInvalidEmail"); 
        }

        if(strlen($password) < 6) { 
            array_push($reply, "LoginShortPassword"); 
        }

        if(empty($reply)){
            $Query = "
            SELECT ID
            FROM `AccountSecurity`
            WHERE Email = ? AND Password = ? AND VerifiedEmail = 1";
            $stmt = $mysqli->prepare($Query);
            $stmt->bind_param("ss", $login, $crypt);
            $stmt->execute();
            $stmt->bind_result($id);
            $result = $stmt->fetch();
            $res = $stmt->num_rows;
            $stmt->close();
        }

        if($id) {
            $dbreply = "success";
            $_SESSION['UID'] = $id;
            $deviceID = sha1($login . time(). rand());
            $deviceHASH = self::GenerateHash($password);
            $userIP = $_SERVER['REMOTE_ADDR'];
            if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
                $array = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $userIP = array_pop($array);
            }
            if(!isset($_COOKIE['XX_DEVICE_ID'])) {
                setcookie('XX_DEVICE_ID', $deviceID, time() + (86400*30), "/");
                $mysqli->query("
                    INSERT INTO
                        AccountSecurityLogs 
                    (userID, deviceID, hashID, IP, Status)
                        VALUES
                    ('$userID[0]', '$deviceID', '$deviceHASH', '$userIP', 1);
                ");
            }
            setcookie("XX_HASH", $deviceHASH, time() + (86400*30), "/");

        } else {
            $dbreply = "error";
            array_push($reply, "LoginWrongDetails"); 
        }
        //$object->close();
        
        return array($dbreply, $reply);
    }

    public function Logout(){
        session_destroy();
        setcookie("XX_HASH", $deviceHASH, time() + 1, "/");
        setcookie("XX_DEVICE_ID", $deviceHASH, time() + 1, "/");
    }

}

?>