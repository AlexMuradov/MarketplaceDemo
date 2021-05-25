<?php

Namespace Xx\Model\Property;

Class Request {

    public function Requests($AccountID){
        global $connection;
        
        $table = "PropertyCalendar";
        // $filter = "WHERE jn3.AccountID =" . $AccountID . " AND tbl.BookingType = 1 and jn6.Type=1 and jn6.Active=1 AND jn5.DocumentSide=1 and jn5.Status=1";

        // $data = array(
        //     "tbl.ID",
        //     "tbl.ListingID",
        //     "tbl.DateFrom",
        //     "tbl.DateTo",
        //     "tbl.AccountID",
        //     "tbl.Price",
        //     "tbl.Currency",
        //     "jn1.Description",
        //     "jn3.Name",
        //     "jn3.Surname",
        //     "jn4.City",
        //     "jn4.Street",
        //     "jn4.Building",
        //     "jn5.Verified",
        //     "jn6.Filename"
        // );

        // $join = array(
        //     "jn1" => array("PropertyListings","ID ","tbl.ListingID"),
        //     "jn2" => array("AccountPersonalInfo","AccountID","jn1.AccountID"),
        //     "jn3" => array("AccountPersonalInfo","AccountID","tbl.AccountID"),
        //     "jn4" => array("AccountAddresses", "ListingID", "tbl.ListingID"),
        //     "jn5" => array("AccountDocuments", "AccountID", "jn3.AccountID"),
        //     "jn6" => array("AccountImages", "ListingID", "tbl.ListingID")
        // );

        $filter = "WHERE jn3.AccountID =" . $AccountID . " AND tbl.BookingType = 1 AND tbl.Active = 1 and jn6.Type=1 and jn6.Active=1";

        $data = array(
            "tbl.ID",
            "tbl.ListingID",
            "DATE_FORMAT(tbl.DateFrom, '%d/%m/%Y') `DateFrom`",
            "DATE_FORMAT(tbl.DateTo, '%d/%m/%Y') `DateTo`",
            "tbl.AccountID",
            "tbl.Price",
            "tbl.Currency",
            "jn1.Description",
            "jn3.Name",
            "jn3.Surname",
            "jn4.City",
            "jn4.Street",
            "jn4.Building",
            "jn6.Filename"
        );

        $join = array(
            "jn1" => array("PropertyListings","ID ","tbl.ListingID"),
            "jn2" => array("AccountPersonalInfo","AccountID","jn1.AccountID"),
            "jn3" => array("AccountPersonalInfo","AccountID","tbl.AccountID"),
            "jn4" => array("AccountAddresses", "ListingID", "tbl.ListingID"),
            "jn6" => array("AccountImages", "ListingID", "tbl.ListingID")
        );

       return $connection->select($table, $data, $filter, $join);
    }

    public function Archive($AccountID){
        global $connection;

        $table = "PropertyCalendar";
        $filter = "WHERE jn2.AccountID =" . $AccountID . " AND tbl.BookingType = 0 AND tbl.Status <> 0 AND jn5.DocumentSide=1 and jn5.Status=1";

        $data = array(
            "tbl.ID",
            "tbl.ListingID",
            "tbl.DateFrom",
            "tbl.DateTo",
            "tbl.AccountID",
            "tbl.Price",
            "tbl.Currency",
            "tbl.Status",
            "jn1.Description",
            "jn3.Name",
            "jn3.Surname",
            "jn4.City",
            "jn4.Street",
            "jn4.Building",
            "jn5.Verified"
        );

        $join = array(
            "jn1" => array("PropertyListings","ID ","tbl.ListingID"),
            "jn2" => array("AccountPersonalInfo","AccountID","jn1.AccountID"),
            "jn3" => array("AccountPersonalInfo","AccountID","tbl.AccountID"),
            "jn4" => array("AccountAddresses", "ListingID", "tbl.ListingID"),
            "jn5" => array("AccountDocuments", "AccountID", "jn3.AccountID")
        );

       return $connection->select($table, $data, $filter, $join);
    }

    public function Confirm($id, $AccountID){
        global $connection;

        $connection->execute(
            "UPDATE `PropertyCalendar` AS PC 
                INNER JOIN `PropertyListings`AS PL ON PC.ListingID = PL.ID 
            SET PC.STATUS = 1 
            WHERE PC.ID = $id AND PL.AccountID = $AccountID AND PC.STATUS = 0"
        );
    }

    public function Reject($id, $AccountID){
        global $connection;

        $connection->execute(
            "UPDATE `PropertyCalendar` AS PC 
                INNER JOIN `PropertyListings`AS PL ON PC.ListingID = PL.ID 
            SET PC.STATUS = 2 
            WHERE PC.ID = $id AND PL.AccountID = $AccountID  AND PC.STATUS = 0"
        );
    }

    public function Details($id, $userID = false, $tid = false){
        global $connection;
        $City = new \Xx\Model\Misc\Autocomplete;

        // $filter = "WHERE jn3.AccountID =" . $userID . " AND tbl.BookingType = 1 AND tbl.Status = 0 AND jn5.DocumentSide=1 and jn5.Status=1 and jn6.Type=1 and jn6.Active=1 and tbl.ID = ".$id;
        if($tid){
            $table = "AccountSecurity";
            $filter = "WHERE tbl.TMP_ID = '" . $tid ."'";
            $data = [
                "tbl.ID"
            ];
    
            $aid = $connection->select($table, $data, $filter);
            $_SESSION['UID'] = $aid[0]['ID'];
            $filter = "WHERE jn3.AccountID =" . $aid[0]['ID'] . " AND tbl.BookingType = 1 and jn6.Type=1 and jn6.Active=1 and tbl.ID = ".$id;
        }
        else{
            $filter = "WHERE jn3.AccountID =" . $userID . " AND tbl.BookingType = 1 and jn6.Type=1 and jn6.Active=1 and tbl.ID = ".$id;
        }

        $table = "PropertyCalendar";
        $data = array(
            "tbl.ID",
            "tbl.ListingID",
            "tbl.DateFrom",
            "tbl.DateTo",
            "tbl.AccountID",
            "tbl.Price",
            "tbl.Currency",
            "tbl.Status",
            "jn1.Description",
            "jn3.Name",
            "jn3.Surname",
            "jn4.City",
            "jn4.Street",
            "jn4.Building",
            "jn5.Verified",
            "jn6.Filename",
            "jn7.Email",
            "jn7.PhoneCode",
            "jn7.Phone",
            "jn8.Latitude",
            "jn8.Longitude",
            "jn9.VerifiedID"
        );

        $join = array(
            "jn1" => array("PropertyListings","ID ","tbl.ListingID"),
            "jn2" => array("AccountPersonalInfo","AccountID","jn1.AccountID"),
            "jn3" => array("AccountPersonalInfo","AccountID","tbl.AccountID"),
            "jn4" => array("AccountAddresses", "ListingID", "tbl.ListingID"),
            "jn5" => array("AccountDocuments", "AccountID", "jn3.AccountID"),
            "jn6" => array("AccountImages", "ListingID", "tbl.ListingID"),
            "jn7" => array("AccountSecurity", "ID", "jn1.AccountID"),
            "jn8" => array("AccountAddresses", "ListingID", "tbl.ListingID"),
            "jn9" => array("AccountSecurity", "ID", "jn3.AccountID")
        );
        $reserv = $connection->select($table, $data, $filter, $join);
        $reserv[0]['City'] = $City->GetCity($reserv[0]['City'])[0]['City'];

        return $reserv;

    }

}

?>