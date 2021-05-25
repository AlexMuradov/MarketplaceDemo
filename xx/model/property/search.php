<?php

Namespace Xx\Model\Property;

Class Search { 

    protected $model;
    protected $login;
    protected $pass;

    public function Search(
        $City,
        $DateFrom, 
        $DateTo, 
        $Guests, 
        $minPrice = false,
        $maxPrice = false,
        $Amenities = false,
        $Rules = false,
        $Bedrooms = false,
        $Bathrooms = false,
        $Placetype = false,
        $InstantBooking = false,
        $Flexcancel = false,
        $Coordinates = false,
        $Sorting,
        $Page = 1,
        $PerPage = 10
        ) {
            global $mysqli;
            global $connection;

            if($Page) {
                if($Page <= 1) $Page = 1;
                $Limit_end = $Page * $PerPage;
                $Limit_start  = ($Page * $PerPage) - $PerPage;
                $Limit = "LIMIT " . ($Page - 1) * $PerPage . "," . $Page * $PerPage;
            } else {
                $Limit = "LIMIT 0,10";
            }

            if($Amenities) {
                if(is_array($Amenities)) {
                    $list = implode(",", $Amenities);
                } else {
                    $list = $Amenities;
                }
                $filterAmenities = " AND pl.ID IN (SELECT DISTINCT ListingID FROM PropertyAmenities pa WHERE pa.AmenityID IN ($list)) ";
            } else {
                $filterAmenities = "";
            }

            $filterRules = "";
           
            if ($Rules){
                if (is_array($Rules)){
                    $list = implode(",", $Rules);
                    $count = count($Rules);
                }
                else {
                    $list = $Rules;
                    $count = 1;
                }
                $filterRules = " AND pl.ID IN (SELECT ListingID FROM PropertyRules  WHERE RuleID IN ($list) AND VALUE = 1
                        GROUP BY ListingID
                        HAVING COUNT(DISTINCT RuleID) = $count)" ;
            }


            if($Placetype) {
                if(is_array($Placetype)) {
                    $list = implode(",", $Placetype);
                } else {
                    $list = $Placetype;
                }
                $filterPlacetype = " AND pl.PropertyType IN ($list) ";
            } else {
                $filterPlacetype = "";
            }

            if($Coordinates) {
                $filterCoordinates = " AND (aa.Latitude > $Coordinates[0] AND aa.Latitude < $Coordinates[2] AND aa.Longitude > $Coordinates[1] AND aa.Longitude < $Coordinates[3]) ";
            } else {
                $filterCoordinates = "";
            }

            if($minPrice && $maxPrice) {
                $filterPrice = "WHERE Price BETWEEN $minPrice AND $maxPrice ";
            } else {
                $filterPrice = "";
            }

            $sort = "";
            if($Sorting){
                switch($Sorting) {
                    case "expensive":
                        $sort = " ORDER BY Price DESC";
                    break;
                    case "cheap":
                        $sort = " ORDER BY Price";
                    break;
                    case "popular":
                        $sort = " ORDER BY pl.CountReview DESC";
                    break;
                    case "reviews":
                        $sort = " ORDER BY pl.AverageReview DESC";
                    break;
                    default:
                        $sort = " ORDER BY pl.CountReview DESC";
                }  
            }
            
            if($InstantBooking){
                $filterInstantBooking = " AND pl.InstantBooking = " . $InstantBooking;
            } else {
                $filterInstantBooking = "";
            }

            $connection->execute(
                "CREATE TEMPORARY TABLE IF NOT EXISTS TempSearch
                ( INDEX(ID) ) 
                ENGINE=MyISAM AS ( 
                    SELECT
                    pl.ID,
                    pl.CheckInType,
                    pl.PropertyType,
                    pl.PlaceType,
                    pl.MaxGuests,
                    pl.Title,
                    pl.Description,
                    pl.Bathrooms,
                    pl.Bedrooms,
                    pl.InstantBooking,
                    pl.AverageReview,
                    pl.CountReview,
                    pl.Currency,
                    pl.PromoDiscount,
                    aa.Street,
                    aa.Latitude,
                    aa.Longitude,
                    aa.Timezone,
                    CASE 
                    WHEN pl.IntelligentPricing = 1 
                        THEN 
                        (   /* ((AvgCity% * (Max-Min)) + Min) * Days */
                            (
                                (  /* SELECT START AvgCity% */
                                    COALESCE((SELECT 
                                        AVG(
                                            CASE 
                                            WHEN Percent > pl.PropertyLoad 
                                                THEN Percent 
                                                ELSE pl.PropertyLoad 
                                            END
                                            )/100 `pcn`
                                    FROM CityLoad 
                                    WHERE 
                                        LoadDate >= '$DateFrom' AND 
                                        LoadDate < '$DateTo' AND 
                                        LoadDate NOT IN (SELECT Date FROM PropertyCustomPrices WHERE ListingID = pl.ID)
                                    ),0) /* SELECT END */ 
                                    * (pl.MaxPrice - pl.MinPrice) /* * (Max-Min) */
                                ) + pl.MinPrice /* + Min */
                            ) * (DATEDIFF('$DateTo', '$DateFrom') - COALESCE(PCPJoiner.counter,0)) + COALESCE(PCPJoiner.price,0) /* * Days */
                        ) ELSE pl.BasePrice * (DATEDIFF('$DateTo', '$DateFrom'))
                    END `Price`
                    FROM PropertyListings pl 
                    LEFT JOIN AccountAddresses aa on aa.ListingID=pl.ID AND aa.Active = 1
                    LEFT JOIN (SELECT 
                        ListingID `LID`,
                        COUNT(ID) `counter`,
                        SUM(Price) `price`
                        FROM PropertyCustomPrices `PCPJoiner`
                        WHERE Date >= '$DateFrom' AND Date < '$DateTo'
                        GROUP BY ListingID) `PCPJoiner` ON PCPJoiner.LID = pl.ID
                    WHERE 
                    aa.City = $City AND 
                    pl.Title IS NOT NULL AND
                    pl.Status = 1 AND 
                    pl.MaxGuests >= $Guests AND 
                    pl.ID NOT IN (
                        SELECT DISTINCT pc.ListingID FROM `PropertyCalendar` pc WHERE '$DateFrom' <= pc.DateTo AND '$DateTo' >= pc.DateFrom
                    )
                    AND (SELECT COUNT(ai.ID) FROM AccountImages ai WHERE ai.ListingID = pl.ID) >= 5
                    $filterAmenities
                    $filterRules
                    $filterPlacetype
                    $filterCoordinates
                    $sort
                    $filterInstantBooking
                );"
            );

            $connection->execute(
                "CREATE TEMPORARY TABLE IF NOT EXISTS TempSearchLimited
                ( INDEX(ID) ) 
                ENGINE=MyISAM AS ( 
                    Select * From TempSearch 
                    $filterPrice
                    $Limit
                );"
            );

            $query = $mysqli->query("SELECT * FROM TempSearchLimited");
            $Properties = $query->fetch_all(MYSQLI_ASSOC);

            $query = $mysqli->query("SELECT * FROM AccountImages ai WHERE ai.ListingID IN (SELECT ID FROM TempSearchLimited) AND ai.Active=1 ORDER BY ai.Type");
            $Images = $query->fetch_all(MYSQLI_ASSOC);

            $query = $mysqli->query("Select ROUND(Price) `value` From TempSearch");
            $Prices = $query->fetch_all(MYSQLI_ASSOC);

            $query = $mysqli->query("SELECT CEILING(COUNT(*)/$PerPage) as PageCount FROM TempSearch");
            $PageCount = $query->fetch_all(MYSQLI_ASSOC);

            $Result = array($Properties, $Images, $Prices, $PageCount);

            return $Result;
    }

    public function SingleSearch($DateFrom, $DateTo, $pid) {
        global $mysqli;
        global $connection;

        $connection->execute(
            "CREATE TEMPORARY TABLE IF NOT EXISTS TempSearch_single
            ( INDEX(ID) ) 
            ENGINE=MyISAM AS ( 
                SELECT
                pl.ID,
                pl.CheckInType,
                pl.PropertyType,
                pl.PlaceType,
                pl.MaxGuests,
                pl.Title,
                pl.Description,
                pl.Bathrooms,
                pl.Bedrooms,
                pl.InstantBooking,
                pl.AverageReview,
                pl.CountReview,
                pl.Currency,
                pl.PromoDiscount,
                aa.Street,
                aa.Latitude,
                aa.Longitude,
                aa.Timezone,
                CASE 
                WHEN pl.IntelligentPricing = 1 
                    THEN 
                    (   /* ((AvgCity% * (Max-Min)) + Min) * Days */
                        (
                            (  /* SELECT START AvgCity% */
                                COALESCE((SELECT 
                                    AVG(
                                        CASE 
                                        WHEN COALESCE(Percent,0) > pl.PropertyLoad 
                                            THEN COALESCE(Percent,0)
                                            ELSE pl.PropertyLoad 
                                        END
                                        )/100 `pcn`
                                FROM CityLoad 
                                WHERE 
                                    LoadDate >= '$DateFrom' AND 
                                    LoadDate < '$DateTo' AND 
                                    LoadDate NOT IN (SELECT Date FROM PropertyCustomPrices WHERE ListingID = pl.ID)
                                ),0) /* SELECT END */ 
                                * (pl.MaxPrice - pl.MinPrice) /* * (Max-Min) */
                            ) + pl.MinPrice /* + Min */
                        ) * (DATEDIFF('$DateTo', '$DateFrom') - COALESCE(PCPJoiner.counter,0)) + COALESCE(PCPJoiner.price,0) /* * Days */
                    ) ELSE pl.BasePrice 
                END `Price`
                FROM PropertyListings pl 
                LEFT JOIN AccountAddresses aa on aa.ListingID=pl.ID AND aa.Active = 1
                LEFT JOIN (SELECT 
                    ListingID `LID`,
                    COUNT(ID) `counter`,
                    SUM(Price) `price`
                    FROM PropertyCustomPrices `PCPJoiner`
                    WHERE Date >= '$DateFrom' AND Date < '$DateTo'
                    GROUP BY ListingID) `PCPJoiner` ON PCPJoiner.LID = pl.ID
                WHERE 
                pl.ID = $pid
            );"
        );

        $query = $mysqli->query("SELECT * FROM TempSearch_single");
        $Properties = $query->fetch_all(MYSQLI_ASSOC);

        $query = $mysqli->query("SELECT * FROM AccountImages ai WHERE ai.ListingID IN (SELECT ID FROM TempSearch_single) AND ai.Active=1");
        $Images = $query->fetch_all(MYSQLI_ASSOC);

        $Prices = [];

       

        $Result = array($Properties, $Images, $Prices);

        return $Result;

    }

    public function CityLoad($DateFrom, $DateTo, $City) {
        global $mysqli;
        global $connection;

        return $connection->select(
            "CityLoad", 
            array("*"), 
            "WHERE (LoadDate BETWEEN '$DateFrom' AND '$DateTo') AND CityID = $City"
        );

    }

    public function PropertyAvilabile($id, $DateFrom, $DateTo) {
        global $connection;
        IF(
            $connection->exists_flex("PropertyCalendar", FALSE, "WHERE '$DateFrom' <= DateTo AND '$DateTo' >= DateFrom AND ListingID = $id")
        ) {
            return FALSE; 
        } else {
            return TRUE;
        }
    }

    public function GetPrice($id, $DateFrom, $DateTo) {
        global $connection;

        return $connection->select_flex(
            "SELECT
            CASE WHEN pl.IntelligentPricing = 1 THEN (
                (SELECT 
                SUM(
                CASE 
                    WHEN Percent > pl.PropertyLoad THEN Percent ELSE pl.PropertyLoad END)/100 `pcn` from CityLoad
                    ) * (pl.MaxPrice - pl.MinPrice)
                ) ELSE pl.BasePrice
                END `Price`
            FROM PropertyListings pl 
            WHERE ID = $id"
        );

    }

}

?>