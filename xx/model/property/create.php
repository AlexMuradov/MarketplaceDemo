<?php

namespace Xx\Model\Property;

Class Create { 

    public function CreateListing($i, $s, $d, $f) {
        global $mysqli;
        global $connection;
        global $lng;
        global $Language;
       
        $LngBedType = $Language->Import("LngBedType");
        $LngAmenities = $Language->Import("LngAmenities");
        $LngRules = $Language->Import("LngRules");


        if($connection->exists("PropertyListings", "ID", $i)) { 

            // Continue adding property
            if($s == 1) {
                if(isset($d['step1_submit'])) {
                    $data = array(
                        "PropertyType" => $d['PropertyType'],
                        "PlaceType" => $d['PlaceType'],
                        "Description" => $d['Description'],
                        "Title" => $d['Title']
                    );
                    $connection->update("PropertyListings", $data, "WHERE ID=$i");
                    if($f == 1){
                        header("Location: /$lng/cabinet.listings");
                    }
                    else{

                        header("Location: /$lng/property.add/step:". 2 ."/listing:$i");
                    }
                }
            }
            elseif($s == 2) {
                if(isset($d['step2_submit'])) {
                    $data = array(
                        "MaxGuests" => $d['MaxGuests'],
                        "Bathrooms" => $d['Bathrooms'],
                        "Bedrooms" => $d['Bedrooms']
                    );
                    // Write Max Guests, Bathrooms, Bedrooms
                    $connection->update("PropertyListings", $data, "WHERE ID=$i");

                    // Creating rooms
                    $connection->delete("PropertyRooms", "WHERE ListingID=$i");
                    $connection->delete("PropertyBeds", "WHERE ListingID=$i");
                    for($c=0; $c < $d['Bedrooms']; $c++) {
                        $Counter = $c + 1;
                        $data = array(
                            "ListingID" => $i,
                            "RoomType" => 1
                        );
                        // Creating Bedrooms
                        $connection->insert("PropertyRooms", $data);
                        $last_ids = $mysqli->insert_id;
                        
                        // Creating Beds
                        // Looping Bed Types
                        foreach($LngBedType as $k => $v) {
                            $data = array(
                                "ListingID" => $i,
                                "RoomID" => $last_ids,
                                "BedType" => $k
                            );
                            // Creating beds
                            for($x=0; $x < $d[$v[1] . $Counter ]; $x++) {
                                $connection->insert("PropertyBeds", $data);
                            }
                        }
                    }
                    // Creating common space
                    $data = array(
                        "ListingID" => $i,
                        "RoomType" => 2
                    );
                    $connection->insert("PropertyRooms", $data);
                    $last_id_2 = $mysqli->insert_id;
                    foreach($LngBedType as $k => $v) {
                        $data = array(
                            "ListingID" => $i,
                            "RoomID" => $last_id_2,
                            "BedType" => $k
                        );
                        // Creating beds
                        for($x=0; $x < $d[$v[1] . "_CS" ]; $x++) {
                            $connection->insert("PropertyBeds", $data);
                        }
                    }
                    if($f == 1){
                        header("Location: /$lng/cabinet.listings");
                    }
                    else{
                        header("Location: /$lng/property.add/step:3/listing:$i");
                    }
                }
            } 
            elseif($s == 3) {
                if(isset($d['step3_submit'])) {

                    $data = array(
                        "Country" => $d['CountryID'],
                        "City" => $d['CityID'],
                        "Street" => $d['Street'],
                        "Appartment" => $d['Appartment'],
                        "Zip" => $d['Zip'],
                        "Latitude" => $d['Latitude'],
                        "Longitude" => $d['Longitude'],
                        "Timezone" => $d['TimeZone']
                    );
                    
                    $connection->update("AccountAddresses", $data, "WHERE ListingID=$i");
                    
                    $data = array(
                        "Area" => $d['Area'],
                        "CurrentFloor" => $d['currentFloor'],
                        "TotalFloor" => $d['totalFloors']
                    );
                    $connection->update("PropertyListings", $data, "WHERE ID=$i");
                    if($f == 1){
                        header("Location: /$lng/cabinet.listings");
                    }
                    else{
                        header("Location: /$lng/property.add/step:". ($s+1) ."/listing:$i");
                    }
                }
            }
            elseif($s == 4) {
                if(isset($d['step4_submit'])) {
                    $connection->delete("PropertyAmenities", "WHERE ListingID=$i");
                    foreach($LngAmenities as $k => $v) {
                        if(isset($d[$v[1]])) {
                            $data = array(
                                "ListingID" => $i,
                                "AmenityID" => $k
                            );
                            $connection->insert("PropertyAmenities", $data);
                        }
                    }
                    if($f == 1){
                        header("Location: /$lng/cabinet.listings");
                    }
                    else{
                        header("Location: /$lng/property.add/step:". ($s+1) ."/listing:$i");
                    }
                }
            }
            elseif($s == 5) {
                if(isset($d['step5_submit'])) {
                    $data = array(
                        "GovernmentID" => $d['GovernmentID']
                    );
                    $connection->update("PropertyListings", $data, "WHERE ID=$i");
                    if($f == 1){
                        header("Location: /$lng/cabinet.listings");
                    }
                    else{
                        header("Location: /$lng/property.add/step:". ($s+1) ."/listing:$i");
                    }
                }
            }
            elseif($s == 6) {
                if(isset($d['step6_submit'])) {
                    $connection->delete("PropertyRules", "WHERE ListingID=$i");
                    foreach($LngRules as $k => $v) {
                        if(isset($d[$v[1]])) {
                            $data = array(
                                "ListingID" => $i,
                                "RuleID" => $k,
                                "Value" => $d[$v[1]]
                            );
                            $connection->insert("PropertyRules", $data);
                            
                            if($f == 1){
                                header("Location: /$lng/cabinet.listings");
                            }
                            else{
                                    header("Location: /$lng/property.add/step:". ($s+1) ."/listing:$i");
                            }
                        }
                    }
                }
            }
            elseif($s == 7) {
                if(isset($d['calendar'])) {
                    print $i;
                    $connection->delete("PropertyCalendar", "WHERE AccountID = " . $_SESSION['UID'] . " AND ListingID = " . $i . " AND BookingType = 1");
                    $InsertListing = $i;
                    foreach($d['ResultDateRanges'] as $k => $v) {
                        
                        $date1 = $d['ResultDateRanges'][$k]['startDate'];
                        $date2 = $d['ResultDateRanges'][$k]['endDate'];
                        print "saved->" . $date1;
                        $data = array(
                            "ListingID" => $InsertListing,
                            "BookingType" => 1,
                            "DateFrom" => $date1,
                            "DateTo" => $date2,
                            "AccountID" => $_SESSION['UID']
                        );
                        
                        $connection->insert("PropertyCalendar", $data);

                    }
                    exit();
                } 
                elseif(isset($d['step7_submit'])) {
                    $data = array(
                        "RequestWindow" => $d['RequestWindow'],
                        "AdvanceWindow" => $d['AdvanceWindow'],
                        "CheckInTime" => $d['CheckInTime'],
                        "CheckOutTime" => $d['CheckOutTime'],
                        "MinNightsStay" => $d['MinNightsStay'],
                        "MaxNightsStay" => $d['MaxNightsStay'],
                        "InstantBooking" => $d['InstantBooking']
                    );
                    $connection->update("PropertyListings", $data, "WHERE ID=$i");
                    if($f == 1){
                        header("Location: /$lng/cabinet.listings");
                    }
                    else{
                        header("Location: /$lng/property.add/step:". ($s+1) ."/listing:$i");
                    }
                }
            }
            elseif($s == 8) {
                if(isset($d['step8_submit'])) {
                    $data = array(
                        "IntelligentPricing" => $d['IntelligentPricing'],
                        "Currency" => $d['Currency'],
                        "BasePrice" => $d['BasePrice'],
                        "MinPrice" => $d['MinPrice'],
                        "MaxPrice" => $d['MaxPrice'],
                        "PromoDiscount" => $d['PromoDiscount'],
                        "WeeklyDiscount" => $d['WeeklyDiscount'],
                        "MonthlyDiscount" => $d['MonthlyDiscount']
                    );
                    $connection->update("PropertyListings", $data, "WHERE ID=$i");
                    
                    if($f == 1){
                        header("Location: /$lng/cabinet.listings");
                    }
                    else{
                        header("Location: /$lng/property.add/step:". ($s+1) ."/listing:$i");
                    }
                }
            }
            elseif($s == 9) {
                if(isset($d['step9_submit'])) {
                    $data = array(
                    );
                    //$connection->update("PropertyListings", $data, "WHERE ID=$i");
                    //header("Location: /$lng/addproperty/step:". ($s+1) ."/listing:$i");
                }
            }
            elseif($s == 10) {
                if(isset($d['step8_submit'])) {
                    $data = array(
                        "ListingID" => $i,
                        "DateFrom" => $d['dateFrom'],
                        "DateTo" => $d['dateTo']
                        
                    ); 
                    $connection->insert("PropertyCalendar", $data);
                }
            }
        } else {
            // Create new property

            if(isset($d['step1_submit'])) { 

                $ListingData = array(
                    "AccountID" => $_SESSION['UID'],
                    "PropertyType" => $d['PropertyType'],
                    "PlaceType" => $d['PlaceType'],
                    "Description" => $d['Description']
                ); 
                $connection->insert("PropertyListings", $ListingData);
                $last_id = $mysqli->insert_id;

                
                $AddressData = array(
                    "AccountID" => $_SESSION['UID'],
                    "ListingID" => $last_id
                );
                $connection->insert("AccountAddresses", $AddressData);
                
                if($f == 1){
                    header("Location: /$lng/cabinet.listings");
                }
                else{
                    header("Location: /$lng/property.add/step:" . 2 ."/listing:$last_id");
                }

            }
            if($s != 1) {
                
                if($f == 1){
                    header("Location: /$lng/cabinet.listings");
                }
                else{
                    header("Location: /$lng/property.add/step:1");
                }
            }

        }
    }

}

?>