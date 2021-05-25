<?php

Namespace Xx\Page\Cabinet;
Use System as System;
Use Localization as Localization;
Use Xx\Model\Finance as Finance;
Use Xx\Model\Account as Account;

Class Invoice {
    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_view = new System\View($_Controller);
        $this->_view->Protected();
        
        $id = $http_request->webvar("id", _GET, "int", "InvoiceDetails", 1, 1000000);

        $invoice = $http_request->api(
            "InvoiceDetails",
            "Xx\Model\Finance\Finance",
            [
                $id,
                $userID
            ],
            FALSE,
            _GET
        );

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "InfoTo" => Account\Details::getPersonalInfo($userID),
            "Invoice" => $invoice,
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