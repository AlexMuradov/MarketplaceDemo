<?php

Namespace Xx\Page;
Use System as System;
Use Localization as Localization;
Use Xx\Model as Models;

Class Cabinet {

    protected $_view;
    protected $_vars = array();

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $LngRegistration;
        global $lng;
        global $LngPersonalInfo;
        global $Language;
        global $userID;

        $this->_controller = strtolower(str_replace(__NAMESPACE__ . '\\', '', __CLASS__));
        $this->_model = new Models\Cabinet();
       // $this->_view = new System\View($this->_controller);

        //print $this->_mtest->send();
        // 0 => Access for All, 1 => Access only for Hosts
        $Access = array(
            1 => array("cabinet_analytics", 1),
            2 => array("cabinet_chat", 0),
            3 => array("cabinet_finace", 1),
            4 => array("cabinet_profile", 0),
            5 => array("cabinet_welcome", 0)
        );

        $Section = $http_request->webvar("section","get","int", true, 1, count($Access));
        $ViewFile = $Access[$Section][0];

        $GlobalProgramVars = array(
            4 => array(
                "Lng" => $lng,
                "CountryList" => $Language->Import("LngCountry"),
                "CityList" => $Language->Import("LngCity"),
                //"PersonalInfo" => $http_request->api("getAccountPersonalInfo", "Cabinet", $userID),
                "PersonalInfo" => $this->_model->getAccountPersonalInfo($userID),
                
                //"SecurityInfo" => $this->_model->GetPersonalInfo("AccountSecurity", array("Email", "Phone", "Verified"),"WHERE ID = " . $userID)
            ),
            2 => array(
                $CountryList = $Language->Import("LngCountry"),
                $CityList = $Language->Import("LngCity"),
                "MessageList" => $http_request->api("listMessages", "DbCabinet", array($userID)),
                "MessageDisplay" => $http_request->api("showMessages", "DbCabinet", array($userID, $http_request->webvar("Party", "get", "int")))
            )
        );

        $ProgramLocalVars = $GlobalProgramVars[$Section];

       

        $this->_view = new System\View($ViewFile);
        $this->_view->Protected();

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($ViewFile . "_" . $lng);
        $this->_view->output();

    }

}

?>