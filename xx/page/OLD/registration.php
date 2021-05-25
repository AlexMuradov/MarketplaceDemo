<?php

Class Registration {

    protected $asset;
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $_vars = array();
    protected $_modelBaseName;

    public function __construct() {
        #global $urlvars;
        #extract($urlvars); // Enable URL GET Vars
        global $LngRegistration;

        $this->_controller = ucwords(__CLASS__);
        //$this->_modelRegistration = new DbRegistration();
        $this->_view = new View(strtolower($this->_controller));

        $this->_view->set("formresult", "");
        $this->_view->set("alertplace", "");

        if($this->_view->webvar("Makeregistration","post")) {

            /*$_Result = $this->_modelRegistration->CreateAccount(
                $this->_view->webvar("Login","post"), 
                $this->_view->webvar("Number","post"), 
                $this->_view->webvar("Password","post")
            );*/
            
            $this->_view->set("formresult", $LngRegistration[$_Result]);
            $this->_view->set("alertplace", $this->_view->jalert($LngRegistration[$_Result]));

            #if($_Result == "RegistrationSuccess") { header("Location: /ru/login"); }
        }

        $this->_view->output();

    }

}

?>