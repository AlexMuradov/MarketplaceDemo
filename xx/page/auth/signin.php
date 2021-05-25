<?php

Namespace Xx\Page\Auth;
Use System as System;
Use Xx\Model as Models;
Use Localization as Localization;

Class Signin {

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
        global $mailer;
        global $_Result;
        global $errors;

        $this->_modelAuth = new Models\Auth\Auth();
        $this->_modelVerify = new Models\Auth\Verify();
        $this->_view = new System\View($_Controller);
        $mailer = new System\Email();

        $email = $http_request->webvar("Email", _POST, "string", "Login");
        $password = $http_request->webvar("Password", _POST, "string", "Login");
        $PostRedirect = $http_request->webvar("redirect", _POST, "string");
        if ($PostRedirect) $_SESSION['redirect'] = $PostRedirect;
        $_Result = $http_request->api(
            "Login",
            "Xx\Model\Auth\Auth",
            [$email, $password],
            FALSE,
            _POST
        );

        if($_Result){
            if($_Result[0] != "error") {
                if(isset($_SESSION['redirect'])) {
                    $redirect = $_SESSION['redirect'];
                    unset($_SESSION['redirect']);
                    header("Location: $redirect");
                } else {
                    header("Location: /");
                }
            } 
        }

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome", "LngRegistration","LngLogin"]),
            "ControllerResult" => $_Result
        );

        // Cоздание переменных на фронте
        $this->_view->CreateLocalVars($ProgramLocalVars);
        // Создание JS скрипта (e.g. home_ru.js)
        $this->_view->CreateLocalScript($_Controller);
        

        $this->_view->output();

    }

}

?>