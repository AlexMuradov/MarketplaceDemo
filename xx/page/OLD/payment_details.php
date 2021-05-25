<?php

Class Payment_Details {
    
    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $LngPayment;
        global $PropertyRulesList;
        global $lng;
        global $Urls;

        $this->_controller = strtolower(__CLASS__);
        $this->_model_payment = new DbPayment();
        $this->_model_property = new DbProperty();
        $this->_model_search = new DbSearch();


        $id = $http_request->webvar("id", "get", "int", true);
        $DateFrom = $http_request->webvar("dateFrom", "get", "date", true);
        $DateTo = $http_request->webvar("dateTo", "get", "date", true);
        $AdultGuests = $http_request->webvar("AdultGuests", "get", "int", true, 0, 20);
        $ChildGuests = $http_request->webvar("ChildGuests", "get", "int", true, 0, 20);
        
        $this->_view = new View($this->_controller);

        /*$From = strtotime($this->_view_step->webvar("fromDate","post"));  
        $To = strtotime($this->_view_step->webvar("todate","post"));  

        $ApptID = $this->_view_step->webvar("id","get");
        $Guests = $this->_view_step->webvar("guests","post");
        $TotalNights = abs($From - $To) / (60*60*24);
        $DayOfTheWeekFrom = date("w", $From);
        $DayOfTheWeekTo = date("w", $To);
        $DayOfTheMonthFrom = date("n", $From);
        $DayOfTheMonthTo = date("n", $To);
        $DayOfTheDayFrom = date("j", $From);
        $DayOfTheDayTo = date("j", $To);
        $this->_controller = strtolower(__CLASS__);
*/

        $ProgramLocalVars = array(
            "ListingInfo" => $this->_model_property->GetListingInfo("WHERE ID = " . $id, "PropertyListings", array("*")),
            "Amenities" => $this->_model_property->GetListingInfo("WHERE ListingID = " . $id, "PropertyAmenities", array("*")),
            "Rules" => $this->_model_property->GetListingInfo("WHERE ListingID = " . $id, "PropertyRules", array("*")),
            "PropertyAvailable" => $this->_model_search->PropertyAvilabile($id, $DateFrom, $DateTo),
            "DateFrom" => $DateFrom,
            "DateTo" => $DateTo,
            "AdultGuests" => $AdultGuests,
            "ChildGuests" => $ChildGuests,
            "Lng" => $lng
        );

        $this->_view->CreateLocalVars("LngPayment",$ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);

        $this->_view->output();

    }

}

?>