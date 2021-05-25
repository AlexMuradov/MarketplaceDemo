<?php

Namespace Xx\Page\Page;
Use System as System;
Use Xx\Model\Account as Model;
Use Localization as Localization;

Class EmailSent {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $lng;
        global $Language;
        global $userID;
        global $_Controller;

        $Details = "";

        $this->_view = new System\View($_Controller);
        $this->_modelDetail = new Model\Details();

        if($userID){
            $Details = $this->_modelDetail->getSecurityInfo($userID);
        }

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome","LngFooter", "LngPageEmailSent"]),
            "Details" => $Details,
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