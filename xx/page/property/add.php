<?php

Namespace Xx\Page\Property;

Use System as System;
Use Xx\Model\Property as Models;
Use Localization as Localization;

Class Add {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $lng;
        global $http_request;
        global $Language;
        global $_Controller;

        if(!isset($step)) $step = 1;
        else
        {
            $step = $http_request->webvar("step","get", "int", false, 1, 13);
            $step = ceil($step);
        }

        $this->_modelProperty = new Models\Create();
        $this->_modelMain = new Models\Main();
        $this->_view = new System\View($_Controller . $step);

        $this->_view->Protected();

        $temp_listing_id = $http_request->webvar("listing","get", "int");

        if(!$temp_listing_id) {
            $temp_listing_id = -1;
        }
        
        $finish = $http_request->webvar("finish", "post", "int");
        if(!$finish){
            $finish = 0;
        }
   
        // Массивные переменные писать сюда
        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngAddProperty", "LngFooter"]),
            "CityList" => $Language->Import("LngCity"),
            "CountryList" => $Language->Import("LngCountry"),
            "BedTypes" => $Language->Import("LngBedType"),
            "BeforeArriveList" => $Language->Import("LngBeforeArrive"),
            "ArriveTime" => $Language->Import("LngArriveTime"),
            "TimeInAdvance" => $Language->Import("LngTimeInAdvance"),
            "Currency" => $Language->Import("LngCurrency"),
            "PropertyType" => $Language->Import("LngPropertyType"),
            "Amenities" => $Language->Import("LngAmenities"),
            "Rules" => $Language->Import("LngRules"),
            "Page_Data_Rules" => $this->_modelMain->GetListingInfo(
                "WHERE ListingID=" . $temp_listing_id,
                "PropertyRules",
                array("*")),
            "Page_Data_Listings" => $this->_modelMain->GetListingInfo(
                "WHERE ID=" . $temp_listing_id,
                "PropertyListings",
                array("*")),
            "Page_Data_Amenities" => $this->_modelMain->GetListingInfo(
                "WHERE ListingID=" . $temp_listing_id,
                "PropertyAmenities",
                array("*")),
            "Page_Data_Rooms" => $this->_modelMain->GetListingInfo(
                "WHERE ListingID=" . $temp_listing_id,
                "PropertyRooms",
                array("*")),
            "Page_Data_Beds" => $this->_modelMain->GetListingInfo(
                "WHERE ListingID=" . $temp_listing_id,
                "PropertyBeds",
                array("*")),
            "Page_Data_Addresses" => $this->_modelMain->GetListingInfo(
                "WHERE ListingID=" . $temp_listing_id,
                "AccountAddresses",
                array("*")),
            "CalendarDates" => $this->_modelMain->GetListingInfo(
                "WHERE ListingID=" . $temp_listing_id . " AND AccountID = " . $_SESSION['UID'] . " AND Active=1",
                "PropertyCalendar",
                array("*")),
            "CurrentTime" => date('d/m/Y H:i:s'),
            "ListingID" => $http_request->webvar("listing","get", "int")
        );

        // Где нужно выводить по одному писать сюда
        // $LngMerged = array_merge(
        //     $LngHome,
        //     $LngPayment,
        //     $LngAddProperty,
        //     $LngFooter
        // );

        if($step == 10) $data = $_GET; else $data = $_POST; // temp workaround

        $this->_modelProperty->CreateListing(
            $temp_listing_id,
            $step,
            $data,
            $finish
        );

       // $this->_view->set("CalendarSaveButton", XX . $lng . XX . "property.add/step:" . 7 . "/listing:" . $http_request->webvar("listing","get"));
        $this->_view->set("CalendarButton", XX . $lng . XX . "addproperty/step:" . 10 . "/listing:" . $http_request->webvar("listing","get"));
        $this->_view->set("BackButton", XX . $lng . XX . "property.add/step:" . ($step - 1) . "/listing:" . $http_request->webvar("listing","get"));
        $this->_view->set("ListingID", $http_request->webvar("listing","get"));
        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller . $step);
        $this->_view->output();
    }

}

?>