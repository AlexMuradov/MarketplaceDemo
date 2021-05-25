<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Xx\Model\Account as Models;
Use Localization as Localization;

Class Profile {

    public function __construct() {
        global $_Controller;
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_model = new Models\Details();
        $this->_view = new System\View($_Controller);
        $this->_view->Protected();

        $firstname = $http_request->webvar("firstname", _POST, "string", "UpdateInfo");
        $lastname = $http_request->webvar("lastname", _POST, "string", "UpdateInfo");
        $gender = $http_request->webvar("gender", _POST, "int", "UpdateInfo", 1, 2);
        $birthday = $http_request->webvar("birthday", _POST, "date", "UpdateInfo");
        $phone = $http_request->webvar("phone", _POST, "string", "UpdateInfo");


        $http_request->api(
            "UpdateInfo",
            "Xx\Model\Account\Details",
            [$firstname, $lastname, $gender, $birthday, $phone,  $userID],
            FALSE,
            _POST
        );

        // $http_request->api(
        //     "UpdateAddress",
        //     "Xx\Model\Account\Details",
        //     [$country, $city, $street, $building, $appartment, $zip, $userID],
        //     FALSE,
        //     _POST
        // );

        $firstname = $http_request->webvar("Name", _POST, "string", "UpdateCommonInfo");
        $lastname = $http_request->webvar("Surname", _POST, "string", "UpdateCommonInfo");
        $dname = $http_request->webvar("DisplayName", _POST, "string", "UpdateCommonInfo");
        // $gender = $http_request->webvar("gender", _POST, "int", "UpdateCommonInfo", 1, 2);
        $birthday = $http_request->webvar("dateOfBirth", _POST, "date", "UpdateCommonInfo");
        $country = $http_request->webvar("country", _POST, "string", "UpdateCommonInfo", 1, 999999);
        $city = $http_request->webvar("city", _POST, "string", "UpdateCommonInfo", 1, 999999);
        $street = $http_request->webvar("street", _POST, "string", "UpdateCommonInfo");
        $building = $http_request->webvar("building", _POST, "string", "UpdateCommonInfo");
        $appartment = $http_request->webvar("appartment", _POST, "string", "UpdateCommonInfo");
        $zip = $http_request->webvar("zip", _POST, "string", "UpdateCommonInfo");
        
        $http_request->api(
            "UpdateCommonInfo",
            "Xx\Model\Account\Details",
            [$firstname, $lastname, $dname, $birthday, $country, $city, $street, $building, $appartment, $zip, $userID],
            FALSE,
            _POST
        );

        $_POST = array_merge($_POST, $_FILES);

        $http_request->api(
            "AddFront",
            "Xx\Model\Account\Documents",
            [
                $http_request->webvar("api__AddFront", _POST),
                $userID . sha1(time()) . "_front.jpg",
                HOME . "/static/uploads/IDDocuments/",
                $userID,
                1
            ],
            FALSE,
            _POST
        );

        $http_request->api(
            "AddBack",
            "Xx\Model\Account\Documents",
            [
                $http_request->webvar("api__AddBack", _POST),
                $userID . sha1(time()) . "_back.jpg",
                HOME . "/static/uploads/IDDocuments/",
                $userID,
                1
            ],
            FALSE,
            _POST
        );

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "CountryList" => $Language->Import("LngCountry"),
            "CityList" => $Language->Import("LngCity"),
            "Vars" => $Language->Import(["LngCabinetProfile"]),
            //"PersonalInfo" => $http_request->api("getAccountPersonalInfo", "Cabinet", $userID),
            "PersonalInfo" => $this->_model->getPersonalInfo($userID),
            "SecurityInfo" =>  $this->_model->getSecurityInfo($userID)
        );
       
        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}


?>