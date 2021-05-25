<?php

Namespace Xx\Model\Finance;
Use Xx\Model\Auth as modelAuth; 

Class Payment extends modelAuth\Auth {

    public function paymentSuccess($paymentSID) {
        global $connection;

        // $u = "U_" . sha1(time() + rand());
        // $p = "P_" . sha1(time() + rand());
        // parent::CreateAccount($e, $u, $p);
        
        //Change account payment status
        $data = [
            "Status" => 1
        ];
        
        $connection->update(
            "AccountingTransactions",
            $data,
            "WHERE PaymentSID = '" . $paymentSID ."'"
        );

        //Send Email
        $Mailer = new \Api\GoogleMail\Gmail;

        $join = [
            "jn1" => array("AccountSecurity","ID ","tbl.InitiatorID"),
            "jn2" => array("AccountPersonalInfo","AccountID","jn1.ID")
        ];
        $table = "AccountingTransactions";
        $filter = "WHERE tbl.PaymentSID = '" . $paymentSID ."'";
        $data = [
            "tbl.ID",
            "jn2.Name",
            "jn2.Surname",
            "jn1.PhoneCode",
            "jn1.Phone",
            "jn1.Email",
            "jn1.TMP_ID",
            "jn1.ID 'AccountID'"
        ];
        
        $InitiatorInfo = $connection->select($table, $data, $filter, $join);
        // echo('test');
        // $_SESSION['UID'] = $InitiatorInfo[0]['AccountID'];

        $join = [
            "jn1" => array("AccountSecurity","ID ","tbl.ReceiverID"),
            "jn2" => array("AccountPersonalInfo","AccountID","jn1.ID")
        ];
        $table = "AccountingTransactions";
        $filter = "WHERE tbl.PaymentSID = '" . $paymentSID ."'";
        $data = [
            "tbl.ID",
            "jn2.DisplayName",
            "jn1.PhoneCode",
            "jn1.Phone",
            "jn1.Email"
        ];

        $ReceiverInfo = $connection->select($table, $data, $filter, $join);

        $InitiatorVars = $InitiatorInfo[0]['DisplayName'].','.$InitiatorInfo[0]['ID'];
        $ReceiverVars = $ReceiverInfo[0]['DisplayName'].','.$ReceiverInfo[0]['ID'];
        if($InitiatorInfo[0]['TMP_ID']){
            $InitiatorVars = $InitiatorVars.$InitiatorInfo[0]['TMP_ID'];
            $Mailer->SendMail($InitiatorVars, $InitiatorInfo[0]['Email'], 1);
        }
        else{
            $Mailer->SendMail($InitiatorVars, $InitiatorInfo[0]['Email'], 1);
        }

        //Send request to NOKEY api
        
    }

    /*
    public function ListingDetails($id) {
        global $object;
        global $mysqli;

        $object = $mysqli->query("Select ID, DatePublished From PropertyListings ");
        $result = $object->fetch_all(MYSQLI_ASSOC);
        $object->close();
        return $result;
    }

    public function Price($PropertyID, $DateFrom, $DateTo) {
        global $object;
        global $mysqli;
        global $connection;

        $table = "PropertyListings";
        $filter = "WHERE tbl.ID =" . $PropertyID;

        $data = array(
            "tbl.ID", 
            "tbl.BasePrice", 
            "tbl.MinPrice",
            "tbl.MaxPrice"
        );
        $join = array(
            "jn1" => array("PropertyListings","ID","tbl.ListingID"),
            "jn2" => array("AccountAddresses","ListingID","jn1.ID"),
            "jn3" => array("LocationAttractions", "City", "jn2.City")
        );

        return $connection->select($table, $data, $filter);

        return $result;
    }*/

}

?>