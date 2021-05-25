<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Models;
Use Xx\Model\Misc as ModelsMisc;
Use Xx\Model\Account as Account;

class ReservationDetails
{
    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_view = new System\View($_Controller);
        $this->_model = new Models\Search();

        $id = $http_request->webvar("id", "get", "int", "Details");
        $tid = $http_request->webvar("tid", "get", "string");
        if(!$tid){
            $this->_view->Protected();
        }

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Reserv" => Models\Request::Details($id, $userID, $tid),
            "Vars" =>  $Language->Import(["LngCabinetRequests", "LngDataTable"]),
            "Vars2" => $Language->Import(["LngCurrency", "LngTransactionStatus"]),
            "User" => Account\Details::getPersonalInfoCard($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>