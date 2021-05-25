<?php

Namespace Xx\Page\Auth;
Use System as System;
Use Xx\Model as Models;
Use Localization as Localization;

Class Registration {

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

        $this->_modelAuth = new Models\Auth\Create();
        $this->_modelVerify = new Models\Auth\Verify();
        $this->_view = new System\View($_Controller);
        $EmailAPI = new \Api\GoogleMail\Gmail;
        
        //Новый метод - bind
        $email = $http_request->webvar("Email", _POST, "string", "CreateAccount");
        $name = $http_request->webvar("Name", _POST, "string", "CreateAccount");
        $password = $http_request->webvar("Password", _POST, "string", "CreateAccount");

        $_Result = $http_request->api(
            "CreateAccount",
            "Xx\Model\Auth\Create",
            [$email, $name, $password],
            FALSE,
            _POST
        );

        if($_Result){
            if($_Result[0] != "error") {

                $Code = $this->_modelVerify->createEmailVerify($_Result[0]);
                $vars = $lng.','.$name.','.$_Result[0].','.$Code;
                
                $EmailAPI->SendMail(
                    $vars,
                    $email,
                    'rv17702421CF1CDB607D0FB403B6E89DF87C635006'
                );
                
                header("Location: /".$lng.'/page.emailsent');
            }
        }

        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome", "LngRegistration"]),
            "ControllerResult" => $_Result
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