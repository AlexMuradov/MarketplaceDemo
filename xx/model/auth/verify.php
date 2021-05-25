<?php

Namespace Xx\Model\Auth;

Class Verify { 

    public function CheckAttempt($type , $max = 6) {
        global $connection;

        $userIP = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $array = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $userIP = array_pop($array);
        }

        $Attempts = $connection->select(
            "AccountSecurityAttempts", 
            ["COUNT(ID) `counter`"],
            "WHERE Subtype = $type AND `Timestamp` > DATE_SUB(NOW(), INTERVAL 1 HOUR) AND IP = '" . $userIP ."' AND Active = 1");

        if($Attempts[0]['counter'] > $max) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function AddAttempt($type) {
        global $connection;

        $userIP = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $array = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $userIP = array_pop($array);
        }

        $data = array(
            "IP" => $userIP,
            "Subtype" => $type
        );

        $connection->insert("AccountSecurityAttempts", $data);

    }

    public function ClearAttempt($type) {
        global $connection;

        $userIP = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $array = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $userIP = array_pop($array);
        }

        $data = [
            "Active" => 0
        ];

        $connection->update("AccountSecurityAttempts", $data, "WHERE IP = '" . $userIP ."' AND Subtype = $type AND Active = 1");

    }

    public function createPhoneVerifyStripe($id) {
        global $userID;
        global $connection;

        $vCode = rand(1000, 9999);
        $connection->update(
            "AccountSecurity", 
            [
                "VerificationPhoneCode" => $vCode
            ],
            "WHERE ID = " . $id
        );
        
        return true;
    }


    public function createPhoneVerify($phoneCode, $phone, $id) {
        global $userID;
        global $connection;

        $vCode = rand(1000, 9999);
        $connection->update(
            "AccountSecurity", 
            [
                "VerificationPhoneCode" => $vCode
            ],
            "WHERE ID = " . $id
        );
        $result = $this->sendPhoneVerify($phoneCode.$phone, $vCode);
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }

    public function sendPhoneVerify($number, $vars) {
        global $connection;
        $data = [
            "API_Key" => 5055800212780818,
            "Number" => $number,
            "Variables" => $vars,
            "TemplateID" => 1
        ];

        $connection->insert("SMSAPI", $data);
        return "Sms successfuly sent";
    }

    public function createEmailVerify($id) {
        global $userID;
        global $connection;

        $vCode = rand(100000, 999999);
        $connection->update(
            "AccountSecurity", 
            [
                "VerificationEmailCode" => $vCode
            ],
            "WHERE ID = " . $id
        );
        return $vCode;
    }

    public function VerifyEmail($id, $code) {
        global $connection;

        if($this->CheckAttempt(1)) {
            return FALSE;
        } else {
            if($connection->exists_flex(
                "AccountSecurity", 
                "VerificationCode", 
                "WHERE ID = $id AND VerificationEmailCode = $code"
            )) {
                $connection->update(
                    "AccountSecurity", 
                    ["VerifiedEmail" => 1], 
                    "WHERE ID = " . $id
                );
                $this->ClearAttempt(1);
                return TRUE;
            } else {
                $this->AddAttempt(1);
                return FALSE;
            }
        }
    }

    
    public function VerifyPhone($id, $code) {
        global $connection;

            if($connection->exists_flex(
                "AccountSecurity", 
                "VerificationCode", 
                "WHERE ID = ".$id." AND VerificationPhoneCode = ".$code
            )) {
                $user = $connection->select(
                    "AccountSecurity", 
                    [
                        "TempPhoneCode",
                        "TempPhone"
                    ], 
                    "WHERE ID = " . $id
                );
                $connection->update(
                    "AccountSecurity", 
                    [
                        "PhoneCode" => $user[0]["TempPhoneCode"],
                        "Phone" => $user[0]["TempPhone"],
                        "TempPhone" => null,
                        "TempPhoneCode" => null,
                        "VerifiedPhone" => 1
                    ], 
                    "WHERE ID = " . $id
                );
                $this->ClearAttempt(1);
                return TRUE;
            } else {
                $this->AddAttempt(1);
                return FALSE;
            }
    }
    
    public function VerifyPassword($pass, $id)
    {
        global $connection;

        $crypt = sha1($pass);

        if($connection->exists_flex(
            "AccountSecurity", 
            "ID", 
            "WHERE Password = '".$crypt."' AND ID = " . $id
        )) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    public function VerifyWallet($id, $code) {
        global $connection;

        if($this->CheckAttempt(1)) {
            return FALSE;
        } else {
            $wallet = $connection->select(
                "AccountingAccounts", 
                ["ID"], 
                "WHERE AccountID = ".$id." AND VerificationCode = ".$code
            );
            if($wallet) {
                $connection->update(
                    "AccountingAccounts", 
                    [
                        "Active" => 1,
                        "VerificationCode" => null
                    ], 
                    "WHERE AccountID = " . $id." AND VerificationCode = ".$code
                );
                $this->ClearAttempt(1);
                return $wallet;
            } else {
                $this->AddAttempt(1);
                return FALSE;
            }
        }
    }
}

?>