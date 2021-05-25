<?php

Namespace Xx\Model\Auth;

Class Restore { 
    public function Password($email) {
        global $connection;
        
        $result = array();
        $reply = array();

        // if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        //     array_push($reply, "RegistrationInvalidEmail"); 
        // }

        $CheckEmailExists = $connection->exists("AccountSecurity", "Email", $email);

        if(!($CheckEmailExists)) {
            $reply[0] = "error";
            array_push($reply, "RegistrationEmailIsNotExists");
        }
        $vCode = 0;
        if(empty($reply)) {
            $vCode = rand(1000000, 99999999);
            $connection->update(
                "AccountSecurity", 
                ["RestorePasswordCode" => $vCode],
                "WHERE Email = '" . $email."'");
        }
        array_push($result, $vCode);
        array_push($result, $reply);
        return $result;
    }

    public function SetNewPassword($code, $pass){
        global $connection;
        $crypt = sha1($pass);
        echo($pass);
        if($connection->exists_flex(
            "AccountSecurity", 
            "ID", 
            "WHERE RestorePasswordCode = ". $code
        )) {
            $connection->update(
                "AccountSecurity", 
                ["Password" => $crypt,
                "RestorePasswordCode" => null], 
                "WHERE RestorePasswordCode = " . $code
            );
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

?>