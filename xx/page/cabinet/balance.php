<?php

Namespace Xx\Page\Cabinet;
Use System as System;
Use Localization as Localization;
Use Xx\Model\Finance as Finance;
Use Xx\Model\Account as Account;

Class Balance {
    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_view = new System\View($_Controller);
        $this->_view->Protected();

        $accountID = $http_request->webvar("withdraw-accountID", _POST, "int", "ConfirmWithdraw");
        $amount = $http_request->webvar("bs-amount", _POST, "int", "ConfirmWithdraw");
        $paymethod = $http_request->webvar("bs-method", _POST, "int", "ConfirmWithdraw");
        
        $http_request->api(
            "ConfirmWithdraw",
            "Xx\ServiceFacades\Cabinet\BalanceFacade",
            [$accountID, $amount, $paymethod, $userID],
            FALSE,
            _POST
        );

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngCurrency", "LngTransactionStatus", "LngCurrencyXRate", "LngCabinetBalance"]),
            "User" => Account\Details::getPersonalInfoCard($userID),
            "TotalBalance" => Finance\Finance::AccountBalance($userID),
            "FiatAccounts" => Finance\Finance::ListFiatAccounts($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>