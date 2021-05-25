<?php

Namespace Xx\Page\Auth;
Use System as System;
Use Xx\Model as Models;
Use Localization as Localization;

Class Restore {

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
        $EmailAPI = new \Api\GoogleMail\Gmail;

        
        $email = $http_request->webvar("Email", _POST, "string", "Password");
        $_Result = $http_request->api(
            "Password",
            "Xx\Model\Auth\Restore",
            [$email],
            FALSE,
            _POST
        );

        if($_Result){
            if($_Result[0] != "error") {
                $vars = $lng.','.$_Result[0];
                
                $EmailAPI->SendMail(
                    $vars,
                    $email,
                    'rs8D442C99E129136FE452FAF72AD331F9EA830D89'
                );
                
                header("Location: /".$lng.'/page.emailsent');
            }
        }

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome", "LngRegistration"]),
            "ControllerResult" => $_Result[1]
        );

        // Cоздание переменных на фронте
        $this->_view->CreateLocalVars($ProgramLocalVars);
        // Создание JS скрипта (e.g. home_ru.js)
        $this->_view->CreateLocalScript($_Controller);
        

        $this->_view->output();

    }

}

?>