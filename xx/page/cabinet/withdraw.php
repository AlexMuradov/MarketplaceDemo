<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Models;
Use Xx\Model\Misc as ModelsMisc;
Use Xx\Model\Account as Account;
Use Xx\Model\Finance as Finance;

class Withdraw
{
    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_view = new System\View($_Controller);
        $this->_view->Protected();

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Reservations" => Models\Request::Requests($userID),
            "Vars" =>  $Language->Import(["LngCabinetRequests", "LngDataTable", "LngCurrency", "LngCurrencyXRate"]),
            "Vars2" => $Language->Import(["LngCurrency", "LngTransactionStatus"]),
            "User" => Account\Details::getPersonalInfoCard($userID),
            "FiatAccounts" => Finance\Finance::ListFiatAccounts($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>