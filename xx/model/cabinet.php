<?php

Namespace XX\Model;

Class Cabinet {

    public function GetBookings($UserID) {
        global $mysqli;
        global $connection;
        global $lng;

        $filter = "WHERE tbl.BookingType=1 AND tbl.AccountID=" . $UserID;
        $table = "PropertyCalendar";
        $data = array(
            "tbl.ID", 
            "tbl.Status", 
            "jn1.Description",
            "tbl.Price",
            "DATEDIFF(tbl.DateTo, tbl.DateFrom) `Duration`",
            "jn2.Country",
            "jn2.City",
            "jn2.Street",
            "jn2.Building",
            "jn2.Appartement",
            "jn2.Zip",
            "jn3.Longitude `long1`",
            "jn3.Latitude `lat1`",
            "jn4.Filename",
            "jn1.Currency",
            "jn1.ID `PropID`"
        );
        $join = array(
            "jn1" => array("PropertyListings","ID","tbl.ListingID"),
            "jn2" => array("AccountAddresses","ListingID","jn1.ID"),
            "jn3" => array("LocationAttractions", "City", "jn2.City"),
            "jn4" => array("AccountImages", "ListingID", "jn1.ID and jn4.Type=1 and jn4.Active=1")
        );

        return $connection->select($table, $data, $filter, $join);

    }

    public function doReview($id, $cleanness, $location, $price, $communication, $liked, $notliked) {
        global $mysqli;
        global $connection;
        global $lng;

        $PropID = $connection->select("PropertyCalendar", array("ListingID"), "WHERE ID = " . $id . " AND AccountID = " . $_SESSION['UID']);

        $data = array(
            "AccountID" => $_SESSION['UID'],
            "ListingID" => $PropID[0]['ListingID'],
            "Cleanliness" => $cleanness,
            "Communication" => $communication,
            "Location" => $location,
            "Price" => $price,
            "liked" => $liked,
            "notliked" => $notliked
        );

        $connection->insert("PropertyReviews", $data);
    }

    public function listMessages($userId) {
        global $mysqli;
        global $connection;
        global $lng;

        return $connection->select_flex("select DISTINCT(acc) `accs`,
        COALESCE(
            (select message from CommunicationMessages Where AccTo = ".$userId." and AccFrom = acc ORDER BY ID DESC LIMIT 1),
            (select message from CommunicationMessages Where AccFrom = ".$userId." and AccTo = acc ORDER BY ID DESC LIMIT 1)
        ) `msg`,
            (select Status from CommunicationMessages WHERE AccTo = ".$userId." and AccFrom = acc and Status = 2 ORDER BY ID DESC LIMIT 1)
        `NewMsg`
        From 
            (select 
                ID `ids`, 
                message, 
                AccFrom `acc` 
            From CommunicationMessages 
            WHERE AccTo = ".$userId." 
        UNION ALL 
        select 
            ID `ids`, 
            message, 
            AccTo `acc` 
        From CommunicationMessages 
        WHERE AccFrom = ".$userId.") as TB1 LEFT JOIN AccountPersonalInfo ap on ap.ID = TB1.acc");

    }

    public function TotalUserNotifications() {
        global $mysqli;
        global $connection;
        global $lng;
        
        if(isset($_SESSION['UID'])) {
            $UserID = $_SESSION['UID'];
            
            return $connection::select(
                "(SELECT ID `ids`, message, AccFrom `acc` From CommunicationMessages where (AccTo = ".$UserID." OR AccFrom = ".$UserID.") and Status = 2)",
                array("COUNT(DISTINCT(acc)) `accs`"),
                ""
            );
            
        } else {
            return false;
        }

    }

    public function showMessages($Me, $Sender) {
        global $mysqli;
        global $connection;
        global $lng;
        
        $data = array("Status" => 1);
        $filter = "WHERE (AccTo = " . $Me . " AND AccFrom = " . $Sender . ") OR (AccFrom = " . $Me . " AND AccTo = " . $Sender . ")";
        $connection->update("CommunicationMessages", $data, $filter);

        return $connection->select(
            "CommunicationMessages", 
            array("*"),
            "WHERE (AccTo = " . $Me . " AND AccFrom = " . $Sender . ") OR (AccFrom = " . $Me . ") ORDER BY ID"
        );

    }

    public function LastOnline($userID) {
        global $connection;
        
        $data = array("Status" => 1);
        $filter = "WHERE (AccTo = " . $Me . " AND AccFrom = " . $Sender . ") OR (AccFrom = " . $Me . " AND AccTo = " . $Sender . ")";
        $connection->update("CommunicationMessages", $data, $filter);

        return $connection->select(
            "CommunicationMessages", 
            array("DateCreated"),
            "WHERE (AccTo = " . $Me . " AND AccFrom = " . $Sender . ") OR (AccFrom = " . $Me . ") ORDER BY ID LIMIT 1"
        );
    }

    // public function LastOnline($userID) {
    //     global $connection;
        
    //     $data = array("Status" => 1);
    //     $filter = "WHERE (AccTo = " . $Me . " AND AccFrom = " . $Sender . ") OR (AccFrom = " . $Me . " AND AccTo = " . $Sender . ")";
    //     $connection->update("CommunicationMessages", $data, $filter);

    //     return $connection->select(
    //         "CommunicationMessages", 
    //         array("DateCreated"),
    //         "WHERE (AccTo = " . $Me . " AND AccFrom = " . $Sender . ") OR (AccFrom = " . $Me . ") ORDER BY ID LIMIT 1"
    //     );

    // }

    public function UpdatePersonalInfo($d, $f) {
        global $mysqli;
        global $connection;
        global $lng;
        $yyyy = substr($d['birthday'],-4);
        $mm = substr($d['birthday'],5,-7);
        $dd = substr($d['birthday'],0,2);
        $date = (int)$yyyy."-".(int)$mm."-".(int)$dd;

        $data = array(
            "Name" => $d['firstname'],
            "Surname" => $d['lastname'],
            "Gender" => $d['hiddenGender'],
            "Birthday" => $date,
            "Country" => $d['hiddenCountry'],
            "City" => $d['city'],
            "Street" => $d['street'],
            "Building" => $d['building'],
            "Appartement" => $d['appartement'],
            "Zip" => $d['zip']
        );

        $ids = $_SESSION['UID'];
        $connection->update("AccountPersonalInfo", $data, "WHERE AccountID = " . $ids);

        if(isset($f['passport_front'])) {

            $filename = sha1(time()) . ".jpg";
            $Folder = HOME . "/static/uploads/identification/";
            $tempFile = $_FILES['passport_front']['tmp_name'];
            $targetFile = $Folder . $filename;

            move_uploaded_file(
                $tempFile,
                $targetFile
            );

            $data = array(
                "AccountId" => $ids,
                "Filename" => $filename,
                "Type" => 61
            );
            $connection->update("AccountImages", array("Active"=>0), "WHERE AccountID = " . $ids);
            $connection->insert("AccountImages", $data);
            $connection->update("AccountPersonalInfo", array("Passport_Front" => 1), "WHERE AccountID = " . $ids);
            
        }

        if(isset($f['passport_back'])) {

            $filename = sha1(time()) . ".jpg";
            $Folder = HOME . "/static/uploads/identification/";
            $tempFile = $_FILES['passport_back']['tmp_name'];
            $targetFile = $Folder . $filename;

            move_uploaded_file(
                $tempFile,
                $targetFile
            );

            $data = array(
                "AccountId" => $ids,
                "Filename" => $filename,
                "Type" => 62
            );
            $connection->update("AccountImages", array("Active"=>0), "WHERE AccountID = " . $ids);
            $connection->insert("AccountImages", $data);
            $connection->update("AccountPersonalInfo", array("Passport_Back" => 1), "WHERE AccountID = " . $ids);
        }
        //print_r($_FILES);
        //print_r($d);
    }

    public function getFinancialReport($AccountID) {
        global $connection;
        
        $table = "AccountPayments";
        $filter = "WHERE tbl.paidTo =" .$AccountID;
        $data = array(
            "jn1.name",
            "jn1.surname",
            "tbl.amount", 
            "tbl.datestamp",
            "tbl.status",
            "jn2.listingId", 
            "jn2.datefrom", 
            "jn2.dateto"
        );
        $join = array(
            "jn1" => array("AccountPersonalInfo","AccountID ","tbl.paidfrom"),
            "jn2" => array("PropertyCalendar", "eventID", "tbl.eventID")
        );

        return $connection->select($table, $data, $filter, $join);
    }

    public function getSavedListings($AccountID) {
        global $connection;
    
        $table = "PropertySaved";
        $filter = "WHERE tbl.AccountID =" . $AccountID;
        $data = array(
            "jn1.Description",
            "jn1.Area",
            "jn1.MaxGuests", 
            "tbl.TimeStamp",
            "tbl.Status",
            "jn2.Country", 
            "jn2.City", 
            "jn2.Street",
            "jn2.Building", 
            "jn2.Appartement", 
            "jn2.Latitude",
            "jn2.Longitude",
        );
        $join = array(
            "jn1" => array("PropertyListings","ID ","tbl.PropertyID"),
            "jn2" => array("AccountAddresses", "ListingID", "jn1.ID"),
        );

        return $connection->select($table, $data, $filter, $join);
    }

    public function deleteSavedListing($id, $AccountID) {
        global $connection;
        $connection->delete("PropertySaved", "WHERE PropertyID = $id AND AccountID = $AccountID");
    }

    public function AddToSavedListings($id, $AccountID) {
        global $connection;

        $data = array(
            "AccountID" => $AccountID,
            "PropertyID" => $id,
            "Status" => 1
        );

        $connection->insert("PropertySaved", $data);
    }

    public function getBookingRequests($AccountID) {
        global $connection;
    
        $table = "PropertyCalendar";
        $filter = "WHERE jn1.AccountID =" . $AccountID . " AND tbl.BookingType = 3 AND jn2.Type = 1";

        $data = array(
            "tbl.ID",
            "tbl.ListingID",
            "tbl.DateFrom",
            "tbl.DateTo",
            "tbl.AccountID",
            "jn3.Name",
            "jn3.Surname",
            "jn2.Filename"
        );

        $join = array(
            "jn1" => array("PropertyListings","ID ","tbl.ListingID"),
            "jn2" => array("AccountImages","ListingID ","tbl.ListingID"),
            "jn3" => array("AccountPersonalInfo","ID ","tbl.AccountID"),
        );

        return $connection->select($table, $data, $filter, $join);
    }

    public function confirmBookingRequest($id, $AccountID) {
        global $connection;

        $connection->execute(
            "UPDATE `PropertyCalendar` AS PC 
                INNER JOIN `PropertyListings`AS PL ON PC.ListingID = PL.ID 
            SET PC.STATUS = 1 
            WHERE PC.ID = $id AND PL.AccountID = $AccountID"
        );
    }

    public function cancelBookingRequest($id, $AccountID) {
        global $connection;

        $connection->execute(
            "UPDATE `PropertyCalendar` AS PC 
                INNER JOIN `PropertyListings`AS PL ON PC.ListingID = PL.ID 
            SET PC.STATUS = 0 
            WHERE PC.ID = $id AND PL.AccountID = $AccountID"
        );

        // $connection->execute(
        //     "INSERT INTO `AccountActionLogs` (`AcountID`, `ActionID`, `Description`, `Timestamp`)
        //     "VALUES($AccountID, 1, )
        // );
    }

    public function getBookingRequestStatus ($id, $AccountID) {
        global $connection;
    
        $table = "PropertyCalendar";
        $filter = "WHERE jn1.AccountID =" . $AccountID . " AND tbl.BookingType = 3 AND tbl.ID = " . $id;
        $data = array(
            "tbl.Status",
        );
        $join = array(
            "jn1" => array("PropertyListings","ID ","tbl.ListingID"),
        );
        return $connection->select($table, $data, $filter, $join);
    }

    public function UpdateAddress() {
        
    }
    
    public function getAccountPersonalInfo ($AccountID) {
        global $connection;
    
        $table = "AccountPersonalInfo";
        $filter = "WHERE tbl.AccountID =" . $AccountID;
        $data = array(
            "tbl.*"
        );
       
        return $connection->select($table, $data, $filter);
    }

    public function getAccountSecurityInfo ($AccountID) {
        global $connection;
    
        $table = "AccountSecurity";
        $filter = "WHERE tbl.ID =" . $AccountID;
        $data = array(
            "tbl.Email",
            "tbl.Phone",
            "tbl.Verified"
        );
       
        return $connection->select($table, $data, $filter);
    }



    public function GetPersonalInfo($t, $c, $f) {
        global $connection;
        //$ids = $_SESSION['UID'];
        return $connection->select($t, $c, $f);
    }
}

?>