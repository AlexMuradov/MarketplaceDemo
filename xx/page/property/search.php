<?php

Namespace Xx\Page\Property;
Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Models;

Class Search {

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

        $cityId = $http_request->webvar("CityID", "get", "int", "Search", 1, 1000000);
        $DateFrom = $http_request->webvar("checkinDate", "get", "date", "Search");
        $DateTo = $http_request->webvar("checkoutDate", "get", "date", "Search");
        $AdultGuest = $http_request->webvar("AdultGuests", "get", "int", false, 1,12);
        $ChildGuest = $http_request->webvar("ChildGuests","get", "int", false, 0,12);
        $BabyGuest = $http_request->webvar("BabyGuests","get", "int", false, 0,12);
        $Page = $http_request->webvar("Page", "get", "int");
        $minPrice = $http_request->webvar("minPrice", "get");
        $maxPrice = $http_request->webvar("maxPrice", "get");
        $Amenities = $http_request->webvar("amenities", "get");
        $Rules = $http_request->webvar("rules", "get", "int");
        $Bedrooms = $http_request->webvar("Bedrooms", "get");
        $Bathrooms = $http_request->webvar("Bathrooms", "get");
        $Propertytype = $http_request->webvar("propertytype", "post");
        $InstantBooking = $http_request->webvar("InstantBooking", "get", "int");
        $FlexCancel = $http_request->webvar("Flexcancel", "post");
        $Coordinates = $http_request->webvar("coordinates", "get", "float");
        $sorting = $http_request->webvar("sorting", "get", "string");
        $SearchByLocation  = $http_request->webvar("SearchByLocation", "get", "int");
        $Guests = $AdultGuest + $ChildGuest + $BabyGuest;

        $SeachResult = $http_request->api(
            "Search",
            "Xx\Model\Property\Search",
            [
                $cityId,
                $DateFrom,
                $DateTo,
                $Guests,
                $minPrice,
                $maxPrice,
                $Amenities,
                $Rules,
                $Bedrooms,
                $Bathrooms,
                $Propertytype,
                $InstantBooking,
                $FlexCancel,
                $Coordinates,
                $sorting,
                $Page
            ],
            $http_request->webvar("json", "get", "int")
        );

        if($http_request->webvar("Like", "get", "int")) { 
            $this->_model->LikeProperty($http_request->webvar("Like", "get", "int"));
            exit;
        }

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "SearchResult" => $SeachResult,
            "CityLoad" => $this->_modelSearch->CityLoad($DateFrom,$DateTo,$cityId),
            "Amenities" => $Language->Import("LngAmenities"),
            "Rules" => $Language->Import("LngRules"),
            "PropertyType" => $Language->Import("LngPropertyType"),
            "savedDateFrom" => $DateFrom,
            "savedDateTo" => $DateTo,
            "savedGuestAdult" => $AdultGuest,
            "savedGuestChild" => $ChildGuest,
            "savedGuestBaby" => $BabyGuest,
            "savedCity" => $cityId,
            "CurrencyList" => $Language->Import("LngCurrency"),
            "LngCity" => $Language->Import("LngCity"),
            "CCYXRate" => $Language->Import("LngCurrencyXRate"),
            "Vars" => $Language->Import(["LngAmenities","LngRules","LngPropertyType","LngCurrency","LngCurrencyXRate","LngHome","LngFooter", "LngSearch"]),
            "LngBeforeArrive" => $Language->Import("LngBeforeArrive"),
            "LngArriveTime" => $Language->Import("LngArriveTime"),
            "LngTimeInAdvance" => $Language->Import("LngTimeInAdvance"),
            "LngBedType" => $Language->Import("LngBedType"),
            "LngTotalRating" => $Language->Import("LngTotalRating"),
            "userID" => $userID,
            "SearchByLocation" => $SearchByLocation,
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);

        $Titles = $Language->Import("LngTitles");
        $this->_view->set("title", $Titles[$_Controller]);

        $this->_view->output();

    }
    
}

?>