<?php

Class Verify {

    protected $asset;
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $_vars = array();
    protected $_modelBaseName;

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngRegistration;
        global $http_request;
        global $lng;

        $this->_controller = ucwords(__CLASS__);
        $this->_modelVerify = new DbVerify();
        $this->_view = new View(strtolower($this->_controller));

        $this->_view->set("formresult", "");
        $this->_view->set("alertplace", "");
        $this->_view->set("URL_Login", "/" . $lng . "/" . strtolower(__CLASS__));
        $this->_view->set("URL_Registration", "/" . $lng . "/" . strtolower(__CLASS__) . "/reg:1");
        
        /*
        if($this->_view->webvar("reg","get")) {
            $this->_view->set("activetabreg", "active");
        } else {
            $this->_view->set("activetablogin", "active");
        }
        
        if($this->_view->webvar("Makeregistration","post")) {

            $_Result = $this->_modelVerify->ValidateNumber(
                $this->_view->webvar("Code","post")
            );
            
            if($_Result[0] == "error") {
                unset($_Result[0]);
                $errors = array();
                foreach($_Result as $Var) {
                    array_push($errors, $LngRegistration[$Var]);
                } 
                $this->_view->set("alertplace", $this->_view->jalert($LngRegistration['Title'],$errors));
            } else {

                header("Location: /ru/verify");

            }
        }*/
        $this->_view->set("activetablogin", "active");
        $this->_view->set("actionlink", "/" . $lng . "/signin");

        $id = $http_request->webvar("id", "get");
        if($id) {
            $this->_view->set(
                "alertplace", 
                $this->_view->jalert(
                    $LngRegistration['Title'],
                    array($LngRegistration[$this->_modelVerify->VerifyEmail($id)])
                )
            );
        }

        $this->_view->output();

    }

}

?>