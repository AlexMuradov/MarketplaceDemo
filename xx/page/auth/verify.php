<?php

Namespace Xx\Page\Auth;
Use System as System;
Use Xx\Model as Models;
Use Localization as Localization;

Class Verify {

    public function __construct() {
        global $_Controller;
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $Language;
        global $userID;
        global $lng;
        global $connection;
        
        $this->_modelAuth = new Models\Auth\Auth();
        $this->_modelVerify = new Models\Auth\Verify();
        $this->_view = new System\View($_Controller);
        $mailer = new System\Email();
        
        $uid = $http_request->webvar("uid", "get", "int", "VerifyEmail");
        $code = $http_request->webvar("code", "get", "int", "VerifyEmail");

        if(
            $http_request->api(
            "VerifyEmail",
            "Xx\Model\Auth\Verify",
            [$uid, $code],
            FALSE,
            _GET
            )
        ) $Verified = TRUE; else $Verified = FALSE;

        
        $uidPhone = $http_request->webvar("uid", "get", "int", "VerifyPhone");
        $codePhone = $http_request->webvar("code", "get", "int", "VerifyPhone");
        if(
            $http_request->api(
            "VerifyPhone",
            "Xx\Model\Auth\Verify",
            [$uidPhone, $codePhone],
            FALSE,
            _GET
            )
        ) $Verified = TRUE; else $Verified = FALSE;

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome", "LngRegistration"]),
            "Verified" => $Verified
        );

        // Cоздание переменных на фронте
        $this->_view->CreateLocalVars($ProgramLocalVars);
        // Создание JS скрипта (e.g. home_ru.js)
        $this->_view->CreateLocalScript($_Controller);
        
        $Titles = $Language->Import("LngTitles");
        $this->_view->set("title", $Titles[$_Controller]);

        $this->_view->output();

    }

}

?>