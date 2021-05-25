<?php

Class C_savedlistings {
    
    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $lng;
        global $http_request;
        global $LngMerged;
        global $LngFooter;

        $this->_controller = strtolower(__CLASS__);
        $this->_modelCabinet = new DbCabinet();
        $this->_view = new View($this->_controller);

        $this->_view->Protected();

        $doAdd = $http_request->webvar("doAdd", "get", "int", false, 0, 1);

        if ($doAdd) {
            $listing_id = $http_request->webvar("listing", "get", "int", true);
            $this->_modelCabinet->AddToSavedListings($listing_id, $_SESSION['UID']);
        }

        $doDelete = $http_request->webvar("doDelete", "get", "int", false, 0, 1);
        if ($doDelete) {
            $listing_id = $http_request->webvar("listing", "get", "int", true);
            $this->_modelCabinet->deleteSavedListing($listing_id, $_SESSION['UID']);
        }

        $ProgramLocalVars = array(
            "SavedListing" => $this->_modelCabinet->getSavedListings($_SESSION['UID'])
        );

        foreach($LngFooter as $key => $val) {
            $this->_view->set($key, $LngFooter[$key]);
        }

        $LngMerged = array_merge(
            $LngFooter
        );

        $this->_view->CreateLocalVars("LngMerged", $ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);
        $this->_view->output();

    }
}

?>