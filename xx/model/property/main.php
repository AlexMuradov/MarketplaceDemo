<?php

namespace Xx\Model\Property;

Class Main {

    public function GetListingInfo($filter, $table, $data, $join = FALSE) {
        global $mysqli;
        global $connection;
        global $lng;

        return $connection->select($table, $data, $filter);
        
    }

    public function GetOwnerInfo($id) {
        global $connection;

        $data = ["*"];
        $filter = "WHERE ID = " . $id;

        return $connection->select(
            "PropertyListings",
            $data,
            $filter
        );
    }

    public function GetPropertyRules($id) {
        global $object;
        global $mysqli;

        $object = $mysqli->query("
        SELECT 
            RuleID
        FROM `PropertyRules` pr
        WHERE pr.ListingID = '$id'
        ");

        $result = $object->fetch_all(MYSQLI_ASSOC);

        $object->close();
        return $result;
    }

    public function Favorites($propertyID, $uid, $action) {
        global $connection;
        if($uid) {
            $data = [
                "AccountID" => $uid,
                "PropertyID" => $propertyID
            ];
            $connection->delete("PropertySaved", "WHERE AccountID = $uid AND PropertyID = $propertyID");
            if($action) {
                $connection->insert("PropertySaved", $data);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ShowFavorites($uid) {
        global $connection;
        return $connection->select("PropertySaved", ["*"], "WHERE AccountID = $uid");
    }

    public function Display($propertyID) {
        global $connection;

        $join = [
            "jn1" => ["PropertyRules", "ID", "tbl.ID = jn1.ListingID"],
            "jn2" => ["PropertyAmenities", "ID", "tbl.ID = jn2.ListingID"],
            "jn3" => ["PropertyRooms", "ID", "tbl.ID = jn3.ListingID"],
            "jn4" => ["PropertyBeds", "ID", "tbl.ID = jn4.ListingID"],
            "jn5" => ["PropertyReviews", "ID", "tbl.ID = jn5.ListingID"],
        ];

        $join2 = [
            "jn1" => ["AccountPersonalInfo", "AccountID", "tbl.AccountID"]
        ];
 
        $result = [
            "Page_Data_Listings" => $connection->select("PropertyListings",["*"],"WHERE tbl.ID = " . $propertyID),
            "Page_Data_Amenities" => $connection->select("PropertyAmenities",["*"],"WHERE ListingID = " . $propertyID),
            "Page_Data_Rooms" => $connection->select("PropertyRooms",["*"],"WHERE ListingID = " . $propertyID),
            "Page_Data_Rules" => $connection->select("PropertyRules",["*"],"WHERE ListingID = " . $propertyID),
            "Page_Data_Beds" => $connection->select("PropertyBeds",["*"],"WHERE ListingID = " . $propertyID),
            "PropertyReviews" => $connection->select("PropertyReviews",["tbl.ID","tbl.liked","tbl.notliked","jn1.Name","jn1.Surname","tbl.Cleanliness","tbl.Accuracy","tbl.Price","tbl.Location","tbl.Communication"],"WHERE ListingID = " . $propertyID,$join2)
        ];

        return $result;

    }

    public function PropetyList($uid) {
        global $connection;

        $join = [
            "jn1" => ["AccountImages", "ListingID", "tbl.ID"]
        ];

        $data = ["*"];
        $filter = "WHERE tbl.AccountID = $uid and tbl.Deleted = 0 and jn1.Type = 1 and jn1.Active = 1";
        return $connection->select_flex("
            SELECT *, 
                (SELECT ai.Filename FROM AccountImages as ai WHERE ai.Type = 1 and ai.Active = 1 and ai.ListingID = tbl.ID) as Filename 
            FROM PropertyListings as tbl
            WHERE tbl.AccountID = $uid and tbl.Deleted = 0");
    }

    public function Visit($propertyID, $uid) {
        global $connection;
        $data = [
            "AccountID" => $uid,
            "PropertyID" => $id
        ];
        $connection->insert("PropertySaved", $data);
        return TRUE;
    }

    public function GetUserImages($userID, $ALL = FALSE) {
        global $connection;
        if($ALL) {
            $filter = "WHERE AccountID = $userID AND Active = 1";
        } else {
            $filter = "WHERE AccountID = $userID AND Active = 1 AND Type = 1";
        }
        return $connection->select(
            "AccountImages",
            ["ListingID", "Filename"],
            $filter
        );
    }

    public function GetCalendarPrices($Date, $ListingID) {
        global $connection;

        $connection->execute("
            CREATE TEMPORARY TABLE IF NOT EXISTS TempDateTable(
                _date datetime,
                _price decimal(10,2),
                _pid int
            );"
        );
        $From = date("Y-m-01", strtotime($Date));
        $To = date("Y-m-t", strtotime($Date));
        $connection->execute("
            call filldates('$From','$To', $ListingID);"
        );
            
        return $connection->select_flex("
            SELECT 
                 tdt._date,
                 CASE WHEN pl.IntelligentPricing = 1 THEN 
                    (CASE WHEN COALESCE(pl.PropertyLoad,0) > COALESCE(cl.Percent,0) THEN 
                    COALESCE(pcp.Price, COALESCE(pl.PropertyLoad,0)/100 * (pl.MaxPrice-pl.MinPrice)+pl.MinPrice)
                 else COALESCE(pcp.Price,COALESCE(cl.Percent,0)/100 * (pl.MaxPrice-pl.MinPrice) + pl.MinPrice)
                 END)
                 else pl.BasePrice END `price`
             from TempDateTable tdt
             left join PropertyListings pl on pl.ID = tdt._pid
             left join AccountAddresses aa on aa.ListingID = pl.ID and aa.Active = 1
             left join CityLoad cl on cl.CityID = aa.City and cl.LoadDate = tdt._date
             left join PropertyCustomPrices pcp on pcp.ListingID = pl.ID and pcp.Date = tdt._date ORDER BY tdt._date"
        );
    }

    public function DeleteListing($lid, $uid){
        global $connection;

        if($connection->exists_flex(
            "PropertyListings", 
            "ID", 
            "WHERE AccountID = ".$uid." AND ID = ".$lid
        )) {
            $connection->update(
                "PropertyListings", 
                [
                    "Deleted" => 1
                ], 
                "WHERE ID = " . $lid
            );
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ChangeListingStatus($lid, $status, $uid){
        global $connection;

        if($connection->exists_flex(
            "PropertyListings", 
            "ID", 
            "WHERE AccountID = ".$uid." AND ID = ".$lid
        )) {
            $connection->update(
                "PropertyListings", 
                [
                    "Status" => $status
                ], 
                "WHERE ID = " . $lid
            );
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function AddReview($liked, $notLiked, $cleanliness, $communication, $location, $accuracy, $price, $listingID, $uid)
    {
        global $connection;
        if($uid) {
            $data = [
                "AccountID" => $uid,
                "liked" => $liked,
                "notliked" => $notLiked,
                "Cleanliness" => $cleanliness,
                "Communication" => $communication,
                "Location" => $location,
                "Accuracy" => $accuracy,
                "Price" => $price,
                "ListingID" => $listingID
            ];
            
            $connection->insert("PropertyReviews", $data);

            $ar = ($cleanliness * $communication * $location * $accuracy * $price) / 5;
            $data = [
                "AverageReview" => $ar
            ];
            
            $connection->insert("PropertyListings", $data, "WHERE ID = ".$listingID);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function CreatePropertyCalendar($lid, $dfrom, $dto, $accountID, $tid = null)
    {
        global $connection;

        $data = array(
            "ListingID" => $lid,
            "DateFrom" => $dfrom,
            "DateTo" => $dto,
            "BookingType" => 1,
            "Status" => 0,
            "Active" => 0,
            "AccountID" => $accountID,
            "TransactionID" => $tid
        ); 

        $connection->insert("PropertyCalendar", $data);
        return $connection->id();
    }

}

?>