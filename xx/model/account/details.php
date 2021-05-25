<?php

Namespace XX\Model\Account;

Class Details {
    
    public function getPersonalInfo ($AccountID) {
        global $connection;
    
        $table = "AccountPersonalInfo";
        $filter = "WHERE tbl.AccountID =" . $AccountID;
        $data = array(
            "tbl.*"
        );
        return $connection->select($table, $data, $filter);
    }

    public function getPersonalInfoCard ($AccountID) {
        global $connection;
    

        $join = [
            "jn1" => ["AccountSecurity", "ID", "tbl.AccountID"]
        ];
        $table = "AccountPersonalInfo";
        $filter = "WHERE tbl.AccountID =" . $AccountID;
        $data = [
            "tbl.DisplayName",
            "jn1.Role",
            "jn1.PhoneCode",
            "jn1.Phone",
            "jn1.Email",
            "jn1.TMP_ID"
        ];
        
        return $connection->select($table, $data, $filter, $join);
    }

    public function getAllUsers() {
        global $connection;

        $join = [
            "jn1" => ["AccountSecurity", "ID", "tbl.AccountID"]
        ];
        $table = "AccountPersonalInfo";
        $filter = "ORDER BY jn1.DateCreated DESC LIMIT 100";
        $data = [
            "jn1.ID",
            "tbl.DisplayName",
            "tbl.Name",
            "tbl.Surname",
            "tbl.Country",
            "tbl.City",
            "tbl.Street",
            "tbl.Building",
            "tbl.Appartment",
            "tbl.ZIP",
            "jn1.PhoneCode",
            "jn1.Phone",
            "jn1.Email",
            "jn1.DateCreated",
            "jn1.DateModified",
            "jn1.VerifiedEmail"
        ];
        
        return $connection->select($table, $data, $filter, $join);
    }

    public function getSecurityInfo ($AccountID) {
        global $connection;
        
        $table = "AccountSecurity";
        $filter = "WHERE tbl.ID =" . $AccountID;
        $data = array(
            "tbl.Email",
            "tbl.PhoneCode",
            "tbl.Phone",
            "tbl.VerifiedEmail",
            "tbl.VerifiedPhone",
            "tbl.VerifiedID"
        );
        return $connection->select($table, $data, $filter);
    }

    public function getAddress ($AccountID) {

    }

    public function UpdateInfo ($firstname, $lastname, $gender, $birthday, $phone, $AccountID) {
        global $connection;

        $data = array(
            "Name" => $firstname,
            "Surname" => $lastname,
            "Gender" =>  $gender,
            "Birthday" => $birthday,
            "Phone" => $phone
        );

        $connection->update("AccountPersonalInfo", $data, "WHERE AccountID = " . $AccountID);
        return true;
    }

    public function UpdateCommonInfo ($firstname, $lastname, $dname, $birthday, $country, $city, $street, $building, $appartment, $zip, $AccountID) {
        global $connection;
        print_r($birthday);
        $data = array(
            "Name" => $firstname,
            "Surname" => $lastname,
            "DisplayName" =>  $dname,
            "Birthday" => $birthday
        );

        $connection->update("AccountPersonalInfo", $data, "WHERE AccountID = " . $AccountID);
        $address = $this->UpdateAddress($country, $city, $street, $building, $appartment, $zip, $AccountID);
        if($address){
            return true;
        }
        else{
            return false;
        }
    }

    public function UpdateAddress ($country, $city, $street, $building, $appartment, $zip, $AccountID) {
        global $connection;
        
        $data = array(
            "Country" => $country,
            "City" => $city,
            "Street" => $street,
            "Building" => $building,
            "Appartment" => $appartment,
            "Zip" => $zip
        );

        $connection->update("AccountPersonalInfo", $data, "WHERE AccountID = " . $AccountID);
        return true;
    }

    public function CreateTempPhone($code, $number, $messCode, $AccountID)
    {
        global $connection;
        global $lng;
        
        $EmailAPI = new \Api\GoogleMail\Gmail;
        
        $table = "AccountSecurity";
        $filter = "WHERE tbl.ID =" . $AccountID;
        $data = array(
            "tbl.VerificationPhoneCode"
        );

        $vCode = $connection->select($table, $data, $filter);
        if($messCode == $vCode[0]['VerificationPhoneCode']){
            $data = array(
                "TempPhoneCode" => $code,
                "TempPhone" => $number
            );
    
            $connection->update("AccountSecurity", $data, "WHERE ID = " . $AccountID);

            $join = [
                "jn1" => ["AccountSecurity", "ID", "tbl.AccountID"]
            ];
            $table = "AccountPersonalInfo";
            $filter = "WHERE tbl.AccountID =" . $AccountID;
            $data = [
                "tbl.DisplayName",
                "jn1.TempPhoneCode",
                "jn1.TempPhone",
                "jn1.Email"
            ];

            $user = $connection->select($table, $data, $filter, $join);
                
            $vars = $lng.','.$user[0]['DisplayName'].','.$AccountID.','.$vCode[0]['VerificationPhoneCode'];
            $EmailAPI->SendMail(
                $vars,
                $user[0]['Email'],
                'pvA604CCC0083DD3EB07935204FEA5EA478D9CB653'
            );

            return true;
        }
        else{
            return false;
        }

    }
    
    public function updateDocuments ($data, $AccountID) {

    }

    public function deleteDocuments ($data, $AccountID) {

    }


    public function UpdatePassword($newPass, $AccountID) {
        global $connection;

        $crypt = sha1($newPass);
        $data = array(
            "Password" => $crypt
        );
        $connection->update("AccountSecurity", $data, "WHERE ID = " . $AccountID);
        return true;
    }

    public function SetPassTempAcc($newPass, $AccountID) {
        global $connection;

        $crypt = sha1($newPass);
        $data = array(
            "Password" => $crypt,
            "TMP_ID" => null,
            "VerifiedID" => "1"
        );
        $connection->update("AccountSecurity", $data, "WHERE ID = " . $AccountID);
        return true;
    }

}

?>
