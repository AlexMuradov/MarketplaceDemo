<?php

Namespace Xx\Model\Misc;

Class Calendar {

    Public Function EditCalendar($listingId, $DatesRange) {
        global $connection;
        global $userID;

        $connection->delete("PropertyCalendar", "WHERE AccountID = " . $userID . " AND ListingID = " . $listingId . " AND BookingType = 1");
       
        foreach($DatesRange as $k => $v) {
                        
            $date1 = $DatesRange[$k]['startDate'];
            $date2 = $DatesRange[$k]['endDate'];
            
            $data = array(
                "ListingID" => $listingId,
                "BookingType" => 1,
                "DateFrom" => $date1,
                "DateTo" => $date2,
                "AccountID" => $userID
            );
            $connection->insert("PropertyCalendar", $data);
        }
        return TRUE;
    }

    public Function SetCustomPrice($listingId, $dates, $price){
        global $connection;
        global $userID;

        if ($price > 0) {
            global $connection;

            foreach($dates as $k => $v) {
               
                $date = $dates[$k];

                IF($connection->exists_flex("PropertyCustomPrices", FALSE, 
                                                    "WHERE '$date' = Date AND ListingID = $listingId")) {
                    $connection->execute(
                    "UPDATE PropertyCustomPrices tbl, PropertyListings jn1
                        LEFT JOIN tbl ON tbl.ListingId = jn1.id
                        SET tbl.Price =" . $price 
                        . " WHERE jn1.AccountId = 36 AND DATE = '" . $date . "' AND listingid =" .$listingId);
                }
                else {
                    $connection->execute(
                    "INSERT INTO PropertyCustomPrices(ListingID, Date, Price)
                        SELECT " .$listingId . ", '" .$date . "', " .$price .  " FROM PropertyListings
                        WHERE AccountId = 36" . " AND ID = " .$listingId);
               }
              
            }
            
        }
    }

    public Function DeleteCustomPrice($listingId, $dates){
        global $connection;
        global $userID;

        global $connection;

        foreach($dates as $k => $v) {
                
            $date = $dates[$k];
print $date;

            $connection->execute(
           "DELETE PropertyCustomPrices
            FROM PropertyCustomPrices
            LEFT JOIN PropertyListings ON PropertyCustomPrices.ListingId = PropertyListings.id
            WHERE PropertyListings.AccountId = 36 AND DATE= '" . $date ."' AND listingId = " . $listingId);
        }
    }
}

?>