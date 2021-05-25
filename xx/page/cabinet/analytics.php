<?php

Namespace Xx\Page\Cabinet;
Use System as System;
Use Localization as Localization;
Use Xx\Model\Finance as Finance;
Use Xx\Model\Account as Account;

Class Analytics {
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
            "Transactions" => Finance\Finance::ListTransactions($userID),
            "Read" => Account\Details::getPersonalInfo($userID),
            "Vars" =>  $Language->Import(["LngCabinetTransactions"]),
            "Vars2" => $Language->Import(["LngCurrency", "LngTransactionStatus"]),
            "User" => Account\Details::getPersonalInfoCard($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>