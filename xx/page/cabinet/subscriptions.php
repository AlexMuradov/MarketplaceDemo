<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Models;
Use Xx\Model\Misc as ModelsMisc;
Use Xx\Model\Account as Account;

class Subscriptions
{
    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;


        $this->_model = new Models\Request();
        $this->_modelMain = new Models\Main();
        $this->_view = new System\View($_Controller);
        $this->_view->Protected();


        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngDataTable", "LngCabinetSubscriptions"]),
            "Vars2" => $Language->Import(["LngCurrency"]),
            "User" => Account\Details::getPersonalInfoCard($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>