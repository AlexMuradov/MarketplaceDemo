<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Localization as Localization;
Use Xx\Model\Property as Models;
Use Xx\Model\Misc as ModelsMisc;
Use Xx\Model\Account as Account;

class Reservations
{
    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_view = new System\View($_Controller);
        $this->_view->Protected();

        $listingID = $http_request->webvar("listingID", _POST, "int", "AddReview");
        $liked = $http_request->webvar("liked", _POST, "string", "AddReview");
        $notLiked = $http_request->webvar("notLiked", _POST, "string", "AddReview");
        $cleanliness = $http_request->webvar("cleanliness", _POST, "int", "AddReview");
        $communication = $http_request->webvar("communication", _POST, "int", "AddReview");
        $location = $http_request->webvar("location", _POST, "int", "AddReview");
        $accuracy = $http_request->webvar("accuracy", _POST, "int", "AddReview");
        $price = $http_request->webvar("price", _POST, "int", "AddReview");
        
        $http_request->api(
            "AddReview",
            "Xx\Model\Property\Main",
            [$liked, $notLiked, $cleanliness, $communication, $location, $accuracy, $price, $listingID, $userID],
            FALSE,
            _POST
        );

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Reservations" => Models\Request::Requests($userID),
            "Vars" =>  $Language->Import(["LngDataTable", "LngCabinetReservations"]),
            "Vars2" => $Language->Import(["LngCurrency", "LngTransactionStatus"]),
            "User" => Account\Details::getPersonalInfoCard($userID)
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}

?>