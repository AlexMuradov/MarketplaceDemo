<?php

Namespace Xx\Page\Property;
Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Models;

Class Display {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $lng;
        global $Language;
        global $userID;
        global $_Controller;

        $this->_view = new System\View($_Controller);
        $this->_model = new Models\Main();
        $this->_modelSearch = new Models\Search();
        
        $AccountID = $http_request->webvar("AccountID", "get", "int", "getPersonalInfoCard", 1, 1000000);
        $http_request->api(
            "getPersonalInfoCard",
            "Xx\Model\Account\Details",
            [
                $AccountID
            ],
            _JSON,
            _GET
        );

        $propertyID = $http_request->webvar("id", "get", "int", "Required");
        $_GCP_MONTH = $http_request->webvar("month", "get", "date", "GetCalendarPrices");
        $http_request->api(
            "GetCalendarPrices",
            "Xx\Model\Property\Main",
            [
                $_GCP_MONTH,
                $propertyID
            ],
            _JSON,
            _GET
        );

        $DateFrom = $http_request->webvar("checkinDate", "get", "date", "Required");
        $DateTo = $http_request->webvar("checkoutDate", "get", "date", "Required");
        $AdultGuest = $http_request->webvar("AdultGuests", "get", "int", false, 1,10);
        $ChildGuest = $http_request->webvar("ChildGuests","get", "int", false, 0,10);
        $BabyGuest = $http_request->webvar("BabyGuests","get", "int", false, 0,10);
        $SearchResult = $this->_modelSearch->SingleSearch($DateFrom,$DateTo,$propertyID);

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "SearchResult" => $SearchResult,
            "DisplayResult" => $this->_model->Display($propertyID),
            "CalendarPrices" => $this->_model->GetCalendarPrices($DateFrom,$propertyID),
            "Amenities" => $Language->Import("LngAmenities"),
            "Rules" => $Language->Import("LngRules"),
            "PropertyType" => $Language->Import("LngPropertyType"),
            "savedDateFrom" => $DateFrom,
            "savedDateTo" => $DateTo,
            "savedGuestAdult" => $AdultGuest,
            "savedGuestChild" => $ChildGuest,
            "savedGuestBaby" => $BabyGuest,
            "CurrencyList" => $Language->Import("LngCurrency"),
            "LngCity" => $Language->Import("LngCity"),
            "CCYXRate" => $Language->Import("LngCurrencyXRate"),
            "Vars" => $Language->Import(["LngAmenities","LngRules","LngPropertyType","LngCurrency","LngCurrencyXRate","LngHome","LngFooter", "LngDisplay"]),
            "LngBeforeArrive" => $Language->Import("LngBeforeArrive"),
            "LngArriveTime" => $Language->Import("LngArriveTime"),
            "LngTimeInAdvance" => $Language->Import("LngTimeInAdvance"),
            "LngBedType" => $Language->Import("LngBedType"),
            "LngTotalRating" => $Language->Import("LngTotalRating"),
            "CalendarDates" => $this->_model->GetListingInfo(
                "WHERE ListingID=" . $propertyID . " AND Active=1",
                "PropertyCalendar",
                array("*")),
            "userID" => $userID,
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);

        $Titles = $Language->Import("LngTitles");
        $this->_view->set("title", $SearchResult[0][0]['Description'] . $Titles[$_Controller]);
        
        $this->_view->output();

    }
    
}

?>