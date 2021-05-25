<?php

Namespace Xx\Page\Cabinet;
Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Model;
Use Xx\Model\Communication as Communication;
Use Xx\Model\Account as Account;

Class Listings {
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
            "Vars" => $Language->Import(["LngCurrency", "LngTransactionStatus", "LngCabinetListings"]),
            "Notifications" => Communication\Notification::ShowNotifications($userID),
            "User" => Account\Details::getPersonalInfoCard($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>