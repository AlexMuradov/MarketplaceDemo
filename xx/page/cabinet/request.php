<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Models;
Use Xx\Model\Misc as ModelsMisc;
Use Xx\Model\Account as Account;

class Request
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

        // print ($userID);

        // $Requests = $http_request->api(
        //     "Requests",
        //     "Xx\Model\Property\Request",
        //     [$userID]
        // );

        // print_r($_POST);

        $Confirm = $http_request->webvar("id", _POST, "int", "Confirm", 1, 999999); 
        $Reject = $http_request->webvar("id", _POST, "int", "Reject", 1, 999999); 

        $http_request->api(
            "Confirm",
            "Xx\Model\Property\Request",
            [$Confirm, $userID],
            FALSE,
            _POST
        );

        $http_request->api(
            "Reject",
            "Xx\Model\Property\Request",
            [$Reject, $userID],
            FALSE,
            _POST
        );

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Requests" => Models\Request::Requests($userID),
            "Vars" => $Language->Import(["LngCabinetRequests", "LngDataTable"]),
            "Vars2" => $Language->Import(["LngCurrency"]),
            "Photos" => $this->_modelMain->GetUserImages($userID),
            "User" => Account\Details::getPersonalInfoCard($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>