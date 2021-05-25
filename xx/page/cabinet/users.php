<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Localization as Localization;
Use Xx\Model\Misc as ModelsMisc;
Use Xx\Model\Account as Account;

class Users
{
    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_view = new System\View($_Controller);
        $this->_view->Protected();

        $currentUser = Account\Details::getPersonalInfoCard($userID);
        if($currentUser[0]['Role'] == 3){
            $usersList = Account\Details::getAllUsers();
        }
        // else{
        //     exit();
        // }


        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" =>  $Language->Import(["LngDataTable", "LngCabinetReservations"]),
            "Vars2" => $Language->Import(["LngCurrency", "LngTransactionStatus"]),
            "UsersList" => $usersList,
            "User" => Account\Details::getPersonalInfoCard($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>