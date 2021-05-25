<?php

Namespace Xx\Page\Page;
Use System as System;
Use Localization as Localization;

Class Terms {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $Language;
        global $userID;
        global $lng;
        global $_Controller;

        $this->_view = new System\View($_Controller);

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome","LngFooter", "LngPageTerms"]),
            "userID" => $userID
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);

        $Titles = $Language->Import("LngTitles");
        $this->_view->set("title", $Titles[$_Controller]);
        
        $this->_view->output();

    }
    
}
?>