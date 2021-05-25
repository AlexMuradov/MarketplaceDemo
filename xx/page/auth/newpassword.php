<?php

Namespace Xx\Page\Auth;
Use System as System;
Use Xx\Model as Models;
Use Localization as Localization;

Class NewPassword {

    protected $_controller;
    protected $_view;

    public function __construct() {
        global $_Controller;
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $Language;
        global $userID;
        global $lng;
        global $connection;
        // global $mailer;

        $this->_modelAuth = new Models\Auth\Auth();
        $this->_modelVerify = new Models\Auth\Verify();
        $this->_view = new System\View($_Controller);
        $mailer = new System\Email();

        
        $urlCode = $http_request->webvar("ucode", _GET, "int", FALSE);
        if(!$urlCode){
            exit();
        }
        
        $code = $http_request->webvar("code", _POST, "int", "SetNewPassword");
        $password = $http_request->webvar("Password", _POST, "string", "SetNewPassword");
        $_Result = $http_request->api(
            "SetNewPassword",
            "Xx\Model\Auth\Restore",
            [$code, $password],
            FALSE,
            _POST
        );

        if($_Result){
            header("Location: /".$lng.'/auth.signin');
        }

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome", "LngRegistration"]),
            "Code" => $urlCode
        );

        // Cоздание переменных на фронте
        $this->_view->CreateLocalVars($ProgramLocalVars);
        // Создание JS скрипта (e.g. home_ru.js)
        $this->_view->CreateLocalScript($_Controller);
        

        $this->_view->output();

    }

}

?>