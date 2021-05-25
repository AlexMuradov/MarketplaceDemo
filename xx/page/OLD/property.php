<?php
Namespace Xx\Page;
Use Xx\Model as Model;
Use System as System;
Use Xx\Model\Property as ModelP;
Class Property {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $lng;
        global $Urls;
        global $_Controller;
        global $Language;
        global $LngMerged;

        $this->_controller = strtolower(__CLASS__);
        $this->_model = new Model\Home();
        $this->_modelProperty = new ModelP\Main();
        $this->_view = new System\View($_Controller);

        $LngHome = $Language->Import("LngHome");

        foreach($LngHome as $key => $val) {
            $this->_view->set($key, $LngHome[$key]);
        }

        $temp_listing_id = $this->_view->webvar("id","get");
        if($temp_listing_id == FALSE) {
            header("Location: /");
        }

        $LngCountry = $Language->Import("LngCountry");
        $LngCity = $Language->Import("LngCity");
        $LngBeforeArrive = $Language->Import("LngBeforeArrive");
        $LngArriveTime = $Language->Import("LngArriveTime");
        $LngTimeInAdvance = $Language->Import("LngTimeInAdvance");
        $LngCurrency = $Language->Import("LngCurrency");
        $LngPayment = $Language->Import("LngPayment");
        //$LngMerged = $Language->Import("LngMerged");
        $LngProperty = $Language->Import("LngProperty");
        $LngBedType = $Language->Import("LngBedType");
        $LngAmenities = $Language->Import("LngAmenities") ;
        $LngRules = $Language->Import("LngRules");
        $LngPropertyType = $Language->Import("LngPropertyType");


// Массивные переменные писать сюда
    $ProgramLocalVars = array(
        "PropertyType" => $LngPropertyType,
        "CountryList" => $LngCountry,
        "CityList" => $LngCity,
        "BedTypes" => $LngBedType,
        "BeforeArriveList" => $LngBeforeArrive,
        "ArriveTime" => $LngArriveTime,
        "TimeInAdvance" => $LngTimeInAdvance,
        "Currency" => $LngCurrency,
        "Amenities" => $LngAmenities,
        "Rules" => $LngRules,
        "Page_Data_Rules" => $this->_modelProperty->GetListingInfo(
            "WHERE ListingID=" . $temp_listing_id,
            "PropertyRules",
            array("*")),
        "Page_Data_Listings" => $this->_modelProperty->GetListingInfo(
            "WHERE ID=" . $temp_listing_id,
            "PropertyListings",
            array("*")),
        "Page_Data_Amenities" => $this->_modelProperty->GetListingInfo(
            "WHERE ListingID=" . $temp_listing_id,
            "PropertyAmenities",
            array("*")),
        "Page_Data_Rooms" => $this->_modelProperty->GetListingInfo(
            "WHERE ListingID=" . $temp_listing_id,
            "PropertyRooms",
            array("*")),
        "Page_Data_Beds" => $this->_modelProperty->GetListingInfo(
            "WHERE ListingID=" . $temp_listing_id,
            "PropertyBeds",
            array("*")),
        "Page_Data_Addresses" => $this->_modelProperty->GetListingInfo(
            "WHERE ListingID=" . $temp_listing_id,
            "AccountAddresses",
            array("*")),
        "PropertyReviews" => $this->_modelProperty->GetListingInfo(
            "WHERE ListingID=" . $temp_listing_id,
            "PropertyReviews",
            array("*")),
        "CurrentTime" => date('d/m/Y H:i:s'),
        "CalendarDates" => $this->_modelProperty->GetListingInfo(
            "WHERE ListingID=" . $temp_listing_id . " AND Active=1",
            "PropertyCalendar",
            array("*"))
    );

        // Где нужно выводить по одному писать сюда
    $LngMerged = array_merge([
        $LngHome,
        $LngPayment,
        $LngProperty
    ]);


    $this->_view->CreateLocalVars_OLD($LngMerged, $ProgramLocalVars);
    $this->_view->CreateLocalScript($_Controller);
    $this->_view->output();

    }
    
}

?>