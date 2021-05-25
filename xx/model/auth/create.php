<?php

Namespace Xx\Model\Auth;

Class Create { 

    public function CreateAccount($email, $name, $pass, $tmpacc = false, $phonecode = null, $phone = null) {
        global $connection;

        $crypt = sha1($pass);
        $reply = array();

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationInvalidEmail"); 
        }
        if(strlen($pass) < 6) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationShortPassword"); 
        }
        
        if(strlen($name) < 3) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationShortName"); 
        }

        if(strlen($name) >= 25) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationLongName"); 
        }

        $CheckEmailExists = $connection->exists_flex(
            "AccountSecurity", 
            "ID", 
            "WHERE Email = '".$email."' AND TMP_ID IS NULL AND VerifiedEmail = 1"
        );
        if($CheckEmailExists) {
            $reply[0] = "error";
            array_push($reply, "RegistrationEmailExists");
        }
       

        // $CheckIDVerified = $connection->exists_flex(
        //     "AccountSecurity", 
        //     "ID", 
        //     "WHERE Email = '".$email."' AND TMP_ID = NULL AND VerifiedID = 1"
        // );

        // if($CheckEmailVerified) {
        //     $reply[0] = "error";
        //     array_push($reply, "IDIsVerified");
        // }

        if($phonecode != null) $phonecode =  "$phonecode"; //workaround
        if($phone != null) $phone =  "$phone"; //workaround

        if(empty($reply)) {

            if($tmpacc) {
                $data = [
                    "TMP_ID" => $tmpacc,
                    "Email" => $email,
                    "Password" => $crypt
                ];
            } else {
                $data = [
                    "Email" => $email,
                    "Password" => $crypt
                ];
            }
            
            $connection->insert("AccountSecurity", $data);
            $reply[0] = $connection->id();

            $data = [
                "AccountID" => $connection->id(),
                "DisplayName" => $name
            ];
            $connection->insert("AccountPersonalInfo", $data);

            
            array_push($reply, "RegistrationSuccess");
            return $reply;
        } else {
            return $reply;
        }
    }

    public function CreateTransactionAccount($email, $name, $pass, $tmpacc = false, $phonecode = null, $phone = null) 
    {
        global $connection;

        $crypt = sha1($pass);
        $reply = array();

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationInvalidEmail"); 
        }
        if(strlen($pass) < 6) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationShortPassword"); 
        }
        
        if(strlen($name) < 3) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationShortName"); 
        }

        if(strlen($name) >= 25) { 
            $reply[0] = "error";
            array_push($reply, "RegistrationLongName"); 
        }

        $CheckEmailExists = $connection->exists_flex(
            "AccountSecurity", 
            "ID", 
            "WHERE Email = '".$email."' AND TMP_ID IS NULL"
        );

        if($CheckEmailExists) {
            $reply[0] = "error";
            array_push($reply, "RegistrationEmailExists");
        }

        $CheckEmailVerified = $connection->select(
            "AccountSecurity", 
            ["ID"], 
            "WHERE Email = '".$email."' AND VerifiedEmail = 1"
        );

        if($CheckEmailVerified) {
            $reply[0] = $CheckEmailVerified[0]['ID'];
            array_push($reply, "EmailIsVerified");
        }

        // $CheckIDVerified = $connection->exists_flex(
        //     "AccountSecurity", 
        //     "ID", 
        //     "WHERE Email = '".$email."' AND TMP_ID = NULL AND VerifiedID = 1"
        // );

        // if($CheckEmailVerified) {
        //     $reply[0] = "error";
        //     array_push($reply, "IDIsVerified");
        // }

        if($phonecode != null) $phonecode =  "$phonecode"; //workaround
        if($phone != null) $phone =  "$phone"; //workaround

        if(empty($reply)) {

            if($tmpacc) {
                $data = [
                    "TMP_ID" => $tmpacc,
                    "Email" => $email,
                    "Password" => $crypt
                ];
            } else {
                $data = [
                    "Email" => $email,
                    "Password" => $crypt
                ];
            }
            
            $connection->insert("AccountSecurity", $data);
            $reply[0] = $connection->id();

            $data = [
                "AccountID" => $connection->id(),
                "DisplayName" => $name
            ];
            $connection->insert("AccountPersonalInfo", $data);

            
            array_push($reply, "RegistrationSuccess");
            return $reply;
        } else {
            return $reply;
        }
    }

}

?>